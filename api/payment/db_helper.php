<?php
/**
 * Database Helper & Auto-Migration for Payment & Wallet Engine
 */

if (!function_exists('get_db_connection')) {

    function load_env_file($path) {
        if (!file_exists($path)) {
            return;
        }
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line) || strpos($line, '#') === 0) {
                continue;
            }
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim(trim($value), '"\'');
                if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                    putenv("{$name}={$value}");
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
    }

    // Load .env from root
    $rootDir = dirname(dirname(__DIR__));
    load_env_file($rootDir . '/.env');

    function get_env_val($key, $default = '') {
        $val = getenv($key);
        if ($val !== false && $val !== '') {
            return $val;
        }
        if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
            return $_ENV[$key];
        }
        if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') {
            return $_SERVER[$key];
        }
        return $default;
    }

    function get_db_connection() {
        global $connection;

        if (function_exists('mysqli_report')) {
            @mysqli_report(MYSQLI_REPORT_OFF);
        }

        if (isset($connection) && $connection instanceof mysqli && @mysqli_ping($connection)) {
            ensure_payment_tables($connection);
            return $connection;
        }

        $rootDir = dirname(dirname(__DIR__));

        // 1. Include root config.php first so primary DB connection is loaded
        try {
            ob_start();
            if (file_exists($rootDir . '/config.php')) {
                include_once $rootDir . '/config.php';
            } elseif (file_exists($rootDir . '/admin/config.php')) {
                include_once $rootDir . '/admin/config.php';
            }
            ob_end_clean();
        } catch (Throwable $t) {
            if (ob_get_level() > 0) ob_end_clean();
        }

        if (isset($connection) && $connection instanceof mysqli && @mysqli_ping($connection)) {
            ensure_payment_tables($connection);
            return $connection;
        }

        // 2. Fallback to direct environment / env credentials connection
        $host = get_env_val('DB_HOST', 'localhost');
        $user = get_env_val('DB_USER', 'u859332932_usr_nppDB');
        $pass = get_env_val('DB_PASS', 'usr_nppDB2026@#');
        $name = get_env_val('DB_NAME', 'u859332932_nprintportalDB');

        try {
            $conn = @mysqli_connect($host, $user, $pass, $name);
            if ($conn && ($conn instanceof mysqli) && @mysqli_ping($conn)) {
                $connection = $conn;
                ensure_payment_tables($connection);
                return $connection;
            }
        } catch (Throwable $t) {}

        // 3. CLI or Mock testing environment fallback
        if (PHP_SAPI === 'cli' || get_env_val('MOCK_DB', '') === 'true') {
            $connection = create_sqlite_cli_db();
            return $connection;
        }

        return false;
    }

    function create_sqlite_cli_db() {
        static $cliDb = null;
        if ($cliDb !== null) {
            return $cliDb;
        }
        $dbFile = __DIR__ . '/cli_mock.sqlite';
        $pdo = new PDO('sqlite:' . $dbFile);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

        $pdo->exec("CREATE TABLE IF NOT EXISTS payment_accounts (id INTEGER PRIMARY KEY AUTOINCREMENT, upi_id TEXT, paytm_mid TEXT, status TEXT, created_at DATETIME);");
        $pdo->exec("CREATE TABLE IF NOT EXISTS payments (id INTEGER PRIMARY KEY AUTOINCREMENT, txn_id TEXT UNIQUE, user_id INTEGER, amount REAL, status TEXT, method TEXT, verified_at DATETIME, created_at DATETIME);");
        $pdo->exec("CREATE TABLE IF NOT EXISTS wallets (wallet_id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER UNIQUE, balance REAL DEFAULT 0.00, currency TEXT, status TEXT, updated_at DATETIME);");
        $pdo->exec("CREATE TABLE IF NOT EXISTS wallet_transactions (id INTEGER PRIMARY KEY AUTOINCREMENT, wallet_id INTEGER, transaction_type TEXT, amount REAL, balance_before REAL, balance_after REAL, reference_id TEXT, description TEXT, status TEXT, transaction_date DATETIME);");
        $pdo->exec("CREATE TABLE IF NOT EXISTS tbluser (userid INTEGER PRIMARY KEY, findwallet REAL DEFAULT 0.00, walletamount REAL DEFAULT 0.00);");
        $pdo->exec("CREATE TABLE IF NOT EXISTS usertable (id INTEGER PRIMARY KEY, emailid TEXT, walletamount REAL DEFAULT 0.00);");

        $stmt = $pdo->query("SELECT id FROM payment_accounts WHERE status = 'active' LIMIT 1");
        if (!$stmt || count($stmt->fetchAll()) == 0) {
            $pdo->exec("INSERT INTO payment_accounts (upi_id, paytm_mid, status) VALUES ('paytm.s1ljhtn@pty', 'qrjSKt09165732556386', 'active');");
        }

        $cliDb = $pdo;
        return $cliDb;
    }

    function db_query($conn, $sql) {
        if ($conn instanceof mysqli) {
            return mysqli_query($conn, $sql);
        }
        if ($conn instanceof PDO) {
            $sqlConv = str_replace(['NOW()', 'FOR UPDATE', 'SHOW TABLES LIKE'], ["datetime('now')", '', 'SELECT name FROM sqlite_master WHERE type="table" AND name='], $sql);
            $stmt = $conn->query($sqlConv);
            if (!$stmt) return false;
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return new Class($rows) {
                private $r; public function __construct($r){$this->r=$r;}
                public function num_rows(){return count($this->r);}
                public function fetch_assoc(){return array_shift($this->r);}
            };
        }
        return false;
    }

    function db_prepare($conn, $sql) {
        if ($conn instanceof mysqli) {
            return mysqli_prepare($conn, $sql);
        }
        if ($conn instanceof PDO) {
            $sqlConv = str_replace(['NOW()', 'FOR UPDATE'], ["datetime('now')", ''], $sql);
            $stmt = $conn->prepare($sqlConv);
            return new Class($stmt, $conn) {
                private $s; private $p; private $types; private $vals;
                public function __construct($s, $p){$this->s=$s; $this->p=$p;}
                public function bind_param($types, ...$args){$this->types=$types; $this->vals=$args;}
                public function execute(){
                    try {
                        return $this->s->execute($this->vals ? $this->vals : []);
                    } catch(Throwable $e){ return false; }
                }
                public function get_result(){
                    $rows = $this->s->fetchAll(PDO::FETCH_ASSOC);
                    return new Class($rows) {
                        private $r; public function __construct($r){$this->r=$r;}
                        public function num_rows(){return count($this->r);}
                        public function fetch_assoc(){return array_shift($this->r);}
                    };
                }
                public function close(){}
            };
        }
        return false;
    }

    function db_execute($stmt) {
        if ($stmt instanceof mysqli_stmt) {
            return mysqli_stmt_execute($stmt);
        }
        if (is_object($stmt) && method_exists($stmt, 'execute')) {
            return $stmt->execute();
        }
        return false;
    }

    function db_get_result($stmt) {
        if ($stmt instanceof mysqli_stmt) {
            return mysqli_stmt_get_result($stmt);
        }
        if (is_object($stmt) && method_exists($stmt, 'get_result')) {
            return $stmt->get_result();
        }
        return false;
    }

    function db_fetch_assoc($res) {
        if ($res instanceof mysqli_result) {
            return mysqli_fetch_assoc($res);
        }
        if (is_object($res) && method_exists($res, 'fetch_assoc')) {
            return $res->fetch_assoc();
        }
        return false;
    }

    function db_num_rows($res) {
        if ($res instanceof mysqli_result) {
            return mysqli_num_rows($res);
        }
        if (is_object($res) && method_exists($res, 'num_rows')) {
            return $res->num_rows();
        }
        return 0;
    }

    function db_insert_id($conn) {
        if ($conn instanceof mysqli) {
            return mysqli_insert_id($conn);
        }
        if ($conn instanceof PDO) {
            return $conn->lastInsertId();
        }
        return 0;
    }

    function db_begin_transaction($conn) {
        if ($conn instanceof mysqli) {
            mysqli_begin_transaction($conn);
        } elseif ($conn instanceof PDO) {
            if (!$conn->inTransaction()) $conn->beginTransaction();
        }
    }

    function db_commit($conn) {
        if ($conn instanceof mysqli) {
            mysqli_commit($conn);
        } elseif ($conn instanceof PDO) {
            if ($conn->inTransaction()) $conn->commit();
        }
    }

    function db_rollback($conn) {
        if ($conn instanceof mysqli) {
            mysqli_rollback($conn);
        } elseif ($conn instanceof PDO) {
            if ($conn->inTransaction()) $conn->rollBack();
        }
    }

    function ensure_payment_tables($conn) {
        static $tables_checked = false;
        if ($tables_checked || !$conn || !($conn instanceof mysqli)) {
            return;
        }

        $q1 = "CREATE TABLE IF NOT EXISTS `payment_accounts` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `upi_id` VARCHAR(255) NOT NULL,
            `paytm_mid` VARCHAR(255) NOT NULL,
            `status` ENUM('active', 'inactive') DEFAULT 'active',
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $q2 = "CREATE TABLE IF NOT EXISTS `payments` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `txn_id` VARCHAR(100) UNIQUE NOT NULL,
            `user_id` INT NOT NULL,
            `amount` DECIMAL(10,2) NOT NULL,
            `status` ENUM('pending', 'paid', 'failed') DEFAULT 'pending',
            `method` VARCHAR(50) DEFAULT 'upi_qr',
            `verified_at` DATETIME NULL,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            INDEX `idx_user_id` (`user_id`),
            INDEX `idx_status` (`status`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $q3 = "CREATE TABLE IF NOT EXISTS `wallets` (
            `wallet_id` INT AUTO_INCREMENT PRIMARY KEY,
            `user_id` INT UNIQUE NOT NULL,
            `balance` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
            `currency` VARCHAR(10) DEFAULT 'INR',
            `status` ENUM('active', 'inactive', 'locked') DEFAULT 'active',
            `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX `idx_user_id` (`user_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $q4 = "CREATE TABLE IF NOT EXISTS `wallet_transactions` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `wallet_id` INT NOT NULL,
            `transaction_type` ENUM('credit', 'debit') NOT NULL,
            `amount` DECIMAL(10,2) NOT NULL,
            `balance_before` DECIMAL(10,2) NOT NULL,
            `balance_after` DECIMAL(10,2) NOT NULL,
            `reference_id` VARCHAR(100) NULL,
            `description` TEXT NULL,
            `status` ENUM('success', 'pending', 'failed') DEFAULT 'success',
            `transaction_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
            INDEX `idx_wallet_id` (`wallet_id`),
            INDEX `idx_reference` (`reference_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        @mysqli_query($conn, $q1);
        @mysqli_query($conn, $q2);
        @mysqli_query($conn, $q3);
        @mysqli_query($conn, $q4);

        // Ensure default merchant record exists
        $check = @mysqli_query($conn, "SELECT id FROM `payment_accounts` WHERE `status` = 'active' LIMIT 1");
        if ($check && mysqli_num_rows($check) == 0) {
            $defaultUpi = get_env_val('PAYTM_UPI_ID', 'paytm.s1ljhtn@pty');
            $defaultMid = get_env_val('PAYTM_MID', 'qrjSKt09165732556386');
            $stmt = @mysqli_prepare($conn, "INSERT INTO `payment_accounts` (`upi_id`, `paytm_mid`, `status`) VALUES (?, ?, 'active')");
            if ($stmt) {
                @mysqli_stmt_bind_param($stmt, "ss", $defaultUpi, $defaultMid);
                @mysqli_stmt_execute($stmt);
                @mysqli_stmt_close($stmt);
            }
        }

        $tables_checked = true;
    }

    function send_json_response($data, $code = 200) {
        global $isTestRunner;
        if (!headers_sent()) {
            http_response_code($code);
            header('Content-Type: application/json; charset=utf-8');
            header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        }
        echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        if (isset($isTestRunner) && $isTestRunner === true) {
            return $data;
        }
        exit;
    }

    /** Return the currently logged-in portal user, or 0 when no session is authenticated. */
    function payment_current_user_id() {
        if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
            session_start();
        }

        return isset($_SESSION['userid']) ? (int) $_SESSION['userid'] : 0;
    }

    /**
     * Credit a confirmed payment exactly once and maintain both the new wallet
     * ledger and the legacy balances used throughout this portal.
     */
    function credit_confirmed_payment($conn, $txnId, $providerReference = '') {
        db_begin_transaction($conn);

        try {
            $paymentStmt = db_prepare($conn, 'SELECT id, user_id, amount, status FROM payments WHERE txn_id = ? FOR UPDATE');
            if (!$paymentStmt) {
                throw new RuntimeException('Unable to lock the payment record.');
            }
            $paymentStmt->bind_param('s', $txnId);
            if (!db_execute($paymentStmt)) {
                throw new RuntimeException('Unable to read the payment record.');
            }
            $payment = db_fetch_assoc(db_get_result($paymentStmt));
            if (method_exists($paymentStmt, 'close')) { $paymentStmt->close(); }

            if (!$payment) {
                throw new RuntimeException('Transaction reference not found.');
            }
            if ($payment['status'] === 'paid') {
                db_commit($conn);
                return ['already_paid' => true, 'user_id' => (int) $payment['user_id']];
            }
            if ($payment['status'] !== 'pending') {
                throw new RuntimeException('This payment cannot be credited.');
            }

            $userId = (int) $payment['user_id'];
            $amount = (float) $payment['amount'];
            $walletStmt = db_prepare($conn, 'SELECT wallet_id, balance FROM wallets WHERE user_id = ? FOR UPDATE');
            $walletStmt->bind_param('i', $userId);
            if (!db_execute($walletStmt)) {
                throw new RuntimeException('Unable to read the wallet.');
            }
            $wallet = db_fetch_assoc(db_get_result($walletStmt));
            if (method_exists($walletStmt, 'close')) { $walletStmt->close(); }

            if (!$wallet) {
                $createWallet = db_prepare($conn, "INSERT INTO wallets (user_id, balance, currency, status) VALUES (?, 0.00, 'INR', 'active')");
                $createWallet->bind_param('i', $userId);
                if (!db_execute($createWallet)) {
                    throw new RuntimeException('Unable to create the wallet.');
                }
                if (method_exists($createWallet, 'close')) { $createWallet->close(); }
                $wallet = ['wallet_id' => (int) db_insert_id($conn), 'balance' => 0.00];
            }

            $walletId = (int) $wallet['wallet_id'];
            $balanceBefore = (float) $wallet['balance'];
            $balanceAfter = $balanceBefore + $amount;

            $updateWallet = db_prepare($conn, 'UPDATE wallets SET balance = ? WHERE wallet_id = ?');
            $updateWallet->bind_param('di', $balanceAfter, $walletId);
            if (!db_execute($updateWallet)) {
                throw new RuntimeException('Unable to update the wallet.');
            }
            if (method_exists($updateWallet, 'close')) { $updateWallet->close(); }

            $markPaid = db_prepare($conn, "UPDATE payments SET status = 'paid', verified_at = NOW() WHERE txn_id = ? AND status = 'pending'");
            $markPaid->bind_param('s', $txnId);
            if (!db_execute($markPaid)) {
                throw new RuntimeException('Unable to complete the payment.');
            }
            if (method_exists($markPaid, 'close')) { $markPaid->close(); }

            $description = 'UPI payment' . ($providerReference !== '' ? ' (' . $providerReference . ')' : '');
            $ledger = db_prepare($conn, "INSERT INTO wallet_transactions (wallet_id, transaction_type, amount, balance_before, balance_after, reference_id, description, status, transaction_date) VALUES (?, 'credit', ?, ?, ?, ?, ?, 'success', NOW())");
            $ledger->bind_param('idddss', $walletId, $amount, $balanceBefore, $balanceAfter, $txnId, $description);
            if (!db_execute($ledger)) {
                throw new RuntimeException('Unable to write the wallet ledger.');
            }
            if (method_exists($ledger, 'close')) { $ledger->close(); }

            // Existing service pages read findwallet; keep it synchronized.
            $legacy = db_prepare($conn, 'UPDATE tbluser SET findwallet = findwallet + ?, walletamount = walletamount + ? WHERE userid = ?');
            if ($legacy) {
                $legacy->bind_param('ddi', $amount, $amount, $userId);
                db_execute($legacy);
                if (method_exists($legacy, 'close')) { $legacy->close(); }
            }

            db_commit($conn);
            return ['already_paid' => false, 'user_id' => $userId, 'new_balance' => $balanceAfter];
        } catch (Throwable $error) {
            db_rollback($conn);
            throw $error;
        }
    }
}
