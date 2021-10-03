CREATE DATABASE IF NOT EXISTS `portal_de_noticias`;

USE `portal_de_noticias`;

CREATE TABLE IF NOT EXISTS `portal_de_noticias`.`noticias` (
    `id`            INT NOT NULL AUTO_INCREMENT,
    `dia_criacao`   DATE NOT NULL,
    `hora_criacao`  VARCHAR(5) NOT NULL,
    `dia_edicao`    DATE,
    `hora_edicao`   VARCHAR(5),
    `titulo`        VARCHAR(120) NOT NULL,
    `conteudo`  BLOB,
    PRIMARY KEY (`id`),
    INDEX `dia_criacao_idx` (`dia_criacao` ASC) VISIBLE,
    INDEX `dia_edicao_idx` (`dia_edicao` ASC) VISIBLE
) DEFAULT CHARACTER SET = utf8mb4;
