-- Database Migration Schema for UPI QR Code Payment & Wallet System

CREATE TABLE IF NOT EXISTS `payment_accounts` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `upi_id` VARCHAR(255) NOT NULL,
  `paytm_mid` VARCHAR(255) NOT NULL,
  `status` ENUM('active', 'inactive') DEFAULT 'active',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `payments` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `wallets` (
  `wallet_id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT UNIQUE NOT NULL,
  `balance` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `currency` VARCHAR(10) DEFAULT 'INR',
  `status` ENUM('active', 'inactive', 'locked') DEFAULT 'active',
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `wallet_transactions` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Initial Seed for active payment credentials if table is empty
INSERT INTO `payment_accounts` (`upi_id`, `paytm_mid`, `status`)
SELECT 'paytm.s1ljhtn@pty', 'xFkDPB70886589695723', 'active'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `payment_accounts` LIMIT 1);
