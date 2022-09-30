CREATE DATABASE sendglobal;
USE sendglobal;

CREATE TABLE `users`(
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `currency` VARCHAR(10) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `balance` DOUBLE(10, 2) NOT NULL DEFAULT 0.00
);

CREATE TABLE `transactions`(
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `type` VARCHAR(50) NOT NULL,
    `transaction_time` DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `balance_updates`(
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT NOT NULL REFERENCES `users`(`id`),
    `transaction_id` INT NOT NULL REFERENCES `transactions`(`id`),
    `amount` VARCHAR(50) NOT NULL,
    `currency` VARCHAR(10) NOT NULL
);
