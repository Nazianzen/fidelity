CREATE TABLE users (
    `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(150) NOT NULL UNIQUE,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(256) NOT NULL,
    `firstname` VARCHAR(150) NOT NULL,
    `lastname` VARCHAR(150) NOT NULL,
    `referrer_id` INT,
    FOREIGN KEY (`referrer_id`) REFERENCES users(`user_id`) ON DELETE SET NULL ON UPDATE CASCADE
);
CREATE TABLE accounts(
    `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `balance` FLOAT NOT NULL DEFAULT 0.0,
    `earnings` FLOAT NOT NULL DEFAULT 0.0,
    `referral_bonus` FLOAT NOT NULL DEFAULT 0.0, 
    FOREIGN KEY (`user_id`) REFERENCES users(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE withdrawals (
	`withdrawal_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `amount` FLOAT NOT NULL DEFAULT 0.0,
    `payment_method` VARCHAR(24) NOT NULL,
    `wallet_address` VARCHAR(255) NOT NULL,
    `is_pending` BOOLEAN NOT NULL DEFAULT TRUE,
    `request_date` TIMESTAMP,
    `approval_date` TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES accounts(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE deposits (
	`deposit_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `amount` FLOAT NOT NULL DEFAULT 0.0,
    `is_approved` BOOLEAN NOT NULL DEFAULT FALSE,
    `deposit_date` TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (`user_id`) REFERENCES accounts(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE investments (
	`investment_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `plan` VARCHAR(150) NOT NULL,
    `amount` FLOAT NOT NULL DEFAULT 0.0,
    `is_active` BOOLEAN NOT NULL DEFAULT TRUE,
    `investment_date` TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (`user_id`) REFERENCES accounts(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE earnings (
	`earning_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `plan` VARCHAR(150) NOT NULL,
    `invested_amount` FLOAT NOT NULL,
    `earned_amount` FLOAT NOT NULL,
    `earning_date` TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (`user_id`) REFERENCES accounts(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE proofs_of_deposit(
	`proof_of_deposit_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `deposit_id` INT NOT NULL,
    `file_url` VARCHAR(255) NOT NULL,
    FOREIGN KEY (`deposit_id`) REFERENCES deposits(`deposit_id`) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE admin(
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL
);
INSERT INTO `admin`(`username`, `password`) VALUES ('admin','admin');