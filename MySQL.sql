CREATE DATABASE IF NOT EXISTS `newsportal`;

USE `newsportal`;

CREATE TABLE IF NOT EXISTS `newsportal`.`news` (
    `id`        INT NOT NULL AUTO_INCREMENT,
    `date`      DATE NOT NULL,
    `time`      VARCHAR(8) NOT NULL,
    `title`     VARCHAR(120) NOT NULL,
    `content`   BLOB,
    PRIMARY KEY (`id`),
    INDEX `date_idx` (`date` ASC) VISIBLE
) DEFAULT CHARACTER SET = utf8mb4;
