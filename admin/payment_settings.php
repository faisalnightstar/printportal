<?php
include('userHeader.php');

// Access Control: Only ADMIN or MASTER ADMIN can manage payment merchant credentials
if ($fetch['usertype'] !== 'ADMIN' && $fetch['usertype'] !== 'MASTER ADMIN' && $_SESSION['userid'] != 1) {
    echo "<div class='p-6 max-w-xl mx-auto mt-10 bg-red-50 border border-red-200 text-red-700 rounded-2xl text-center font-bold'>Access Denied: Only Super Admin can manage payment merchant credentials.</div>";
    include('userFooter.php');
    exit();
}

$conn = get_db_connection();
$msg = "";
$msgType = "";

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_payment_config'])) {
    $upi_id = trim($_POST['upi_id']);
    $paytm_mid = trim($_POST['paytm_mid']);
    $status = isset($_POST['status']) && $_POST['status'] === 'inactive' ? 'inactive' : 'active';

    if (empty($upi_id) || empty($paytm_mid)) {
        $msg = "Both UPI ID and Paytm Merchant ID (MID) are required.";
        $msgType = "error";
    } else {
        // Check if record exists
        $checkRes = db_query($conn, "SELECT id FROM payment_accounts LIMIT 1");
        if ($checkRes && db_num_rows($checkRes) > 0) {
            $row = db_fetch_assoc($checkRes);
            $rowId = (int)$row['id'];
            $stmt = db_prepare($conn, "UPDATE payment_accounts SET upi_id = ?, paytm_mid = ?, status = ? WHERE id = ?");
            if ($stmt) {
                $stmt->bind_param("sssi", $upi_id, $paytm_mid, $status, $rowId);
                db_execute($stmt);
                if (method_exists($stmt, 'close')) { $stmt->close(); }
                $msg = "Payment Merchant credentials updated successfully in database!";
                $msgType = "success";
            }
        } else {
            $stmt = db_prepare($conn, "INSERT INTO payment_accounts (upi_id, paytm_mid, status) VALUES (?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sss", $upi_id, $paytm_mid, $status);
                db_execute($stmt);
                if (method_exists($stmt, 'close')) { $stmt->close(); }
                $msg = "New Payment Merchant account configured successfully!";
                $msgType = "success";
            }
        }

        // Also update .env file if writable
        $envFile = dirname(__DIR__) . '/.env';
        if (file_exists($envFile) && is_writable($envFile)) {
            $envContent = file_get_contents($envFile);
            $envContent = preg_replace('/PAYTM_MID=.*/', "PAYTM_MID={$paytm_mid}", $envContent);
            $envContent = preg_replace('/PAYTM_UPI_ID=.*/', "PAYTM_UPI_ID={$upi_id}", $envContent);
            file_put_contents($envFile, $envContent);
        }
    }
}

// Fetch Current Merchant Credentials
$currentRes = db_query($conn, "SELECT * FROM payment_accounts WHERE status = 'active' ORDER BY id DESC LIMIT 1");
$currentAccount = null;
if ($currentRes && db_num_rows($currentRes) > 0) {
    $currentAccount = db_fetch_assoc($currentRes);
} else {
    // Fallback query without status filter
    $fallbackRes = db_query($conn, "SELECT * FROM payment_accounts ORDER BY id DESC LIMIT 1");
    if ($fallbackRes && db_num_rows($fallbackRes) > 0) {
        $currentAccount = db_fetch_assoc($fallbackRes);
    }
}

$activeUpi = $currentAccount ? $currentAccount['upi_id'] : get_env_val('PAYTM_UPI_ID', 'paytm.s1ljhtn@pty');
$activeMid = $currentAccount ? $currentAccount['paytm_mid'] : get_env_val('PAYTM_MID', 'qrjSKt09165732556386');
$activeStatus = $currentAccount ? $currentAccount['status'] : 'active';
?>

<div class="max-w-3xl mx-auto space-y-6">

    <!-- Page Title -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Payment Gateway Settings</h1>
            <p class="text-xs text-slate-500 mt-1">Configure your active Paytm Merchant ID (MID) and UPI VPA ID for dynamic QR code generation.</p>
        </div>
        <span class="px-3 py-1.5 bg-blue-50 text-blue-700 text-xs font-bold rounded-full border border-blue-200 flex items-center gap-1.5">
            <i data-lucide="shield" class="w-3.5 h-3.5 text-blue-600"></i> Super Admin Mode
        </span>
    </div>

    <!-- Alert Notifications -->
    <?php if (!empty($msg)) { ?>
        <div class="p-4 rounded-xl font-medium text-xs border flex items-center gap-3 <?php echo ($msgType === 'success') ? 'bg-emerald-50 border-emerald-200 text-emerald-800' : 'bg-red-50 border-red-200 text-red-800'; ?>">
            <i data-lucide="<?php echo ($msgType === 'success') ? 'check-circle-2' : 'alert-triangle'; ?>" class="w-5 h-5 flex-shrink-0"></i>
            <span><?php echo htmlspecialchars($msg); ?></span>
        </div>
    <?php } ?>

    <!-- Settings Card Form -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">
        
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <div class="flex items-center gap-3">
                <img src="https://www.logo.wine/a/logo/Paytm/Paytm-Logo.wine.svg" alt="Paytm" class="h-8 w-auto">
                <div>
                    <h3 class="font-bold text-sm text-slate-900">Paytm Merchant API & UPI Config</h3>
                    <p class="text-xs text-slate-500">Live payments will be credited directly to this merchant VPA.</p>
                </div>
            </div>
            <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full <?php echo ($activeStatus === 'active') ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700'; ?>">
                <?php echo strtoupper($activeStatus); ?>
            </span>
        </div>

        <form method="POST" action="payment_settings.php" class="space-y-5">
            <input type="hidden" name="update_payment_config" value="1">

            <!-- Paytm Merchant ID (MID) Field -->
            <div class="space-y-1.5">
                <label for="paytm_mid" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                    Paytm Merchant ID (MID) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="building-2" class="w-4 h-4"></i>
                    </div>
                    <input type="text" id="paytm_mid" name="paytm_mid" required value="<?php echo htmlspecialchars($activeMid); ?>" placeholder="e.g. qrjSKt09165732556386" class="w-full pl-10 pr-4 py-2.5 text-sm font-semibold bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                </div>
                <p class="text-[11px] text-slate-400">Your official 20-character Paytm Merchant ID used for status verification calls.</p>
            </div>

            <!-- Merchant UPI VPA ID Field -->
            <div class="space-y-1.5">
                <label for="upi_id" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                    Merchant UPI VPA ID <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="qr-code" class="w-4 h-4"></i>
                    </div>
                    <input type="text" id="upi_id" name="upi_id" required value="<?php echo htmlspecialchars($activeUpi); ?>" placeholder="e.g. paytm.s1ljhtn@pty" class="w-full pl-10 pr-4 py-2.5 text-sm font-semibold bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                </div>
                <p class="text-[11px] text-slate-400">UPI ID that will be encoded into dynamic QR codes (e.g. `yourname@paytm` or `paytm.merchant@pty`).</p>
            </div>

            <!-- Account Status Select -->
            <div class="space-y-1.5">
                <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-700">Account Status</label>
                <select id="status" name="status" class="w-full px-4 py-2.5 text-sm font-semibold bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                    <option value="active" <?php echo ($activeStatus === 'active') ? 'selected' : ''; ?>>Active (Enabled for all payments)</option>
                    <option value="inactive" <?php echo ($activeStatus === 'inactive') ? 'selected' : ''; ?>>Inactive (Disable UPI top-up temporary)</option>
                </select>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-md shadow-blue-500/20 transition-all flex items-center gap-2">
                    <i data-lucide="save" class="w-4 h-4"></i> Save Merchant Credentials
                </button>
            </div>
        </form>

    </div>

    <!-- Security & Testing Info -->
    <div class="p-4 bg-slate-100 rounded-2xl border border-slate-200 text-xs text-slate-600 space-y-1">
        <h4 class="font-bold text-slate-800 flex items-center gap-1.5">
            <i data-lucide="info" class="w-4 h-4 text-blue-600"></i> Verification Tip
        </h4>
        <p>After saving new credentials, navigate to <a href="findwallet.php" class="text-blue-600 font-bold underline">Add Money</a> and test generating a ₹100 QR code to verify your new UPI ID displays on screen.</p>
    </div>

</div>

<?php include('userFooter.php'); ?>
