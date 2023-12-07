CREATE DATABASE `number_collect_db`;

USE `number_collect_db`;
CREATE TABLE `records` (
    `record_id` int PRIMARY KEY AUTO_INCREMENT,
    `transaction` int NOT NULL,
    `ary_pick_from` VARCHAR(255) NOT NULL,
    `digit_position` int NOT NULL DEFAULT 5,
    `collect_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);