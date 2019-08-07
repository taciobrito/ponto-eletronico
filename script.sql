-- -----------------------------------------------------
-- Schema ponto_eletronico
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ponto_eletronico` DEFAULT CHARACTER SET utf8 ;
USE `ponto_eletronico` ;

-- -----------------------------------------------------
-- Table `ponto_eletronico`.`funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto_eletronico`.`funcionarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `telefone` VARCHAR(45) NULL,
  `endereco` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ponto_eletronico`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto_eletronico`.`empresas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `razao_social` VARCHAR(100) NOT NULL,
  `cnpj` VARCHAR(20) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ponto_eletronico`.`cargos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto_eletronico`.`cargos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `empresas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`empresas_id`)
    REFERENCES `ponto_eletronico`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `ponto_eletronico`.`contratos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto_eletronico`.`contratos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `horario_trabalho` TIME NOT NULL,
  `banco_horas` TINYINT(1) NOT NULL DEFAULT 1,
  `data_entrada` DATE NOT NULL,
  `data_saida` DATE NULL,
  `funcionario_id` INT NOT NULL,
  `empresa_id` INT NOT NULL,
  `cargo_id` INT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted-at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),

    FOREIGN KEY (`funcionario_id`)
    REFERENCES `ponto_eletronico`.`funcionarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,

    FOREIGN KEY (`empresa_id`)
    REFERENCES `ponto_eletronico`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,

    FOREIGN KEY (`cargo_id`)
    REFERENCES `ponto_eletronico`.`cargos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `ponto_eletronico`.`registros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto_eletronico`.`registros` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_hora` DATETIME NOT NULL,
  `observacoes` TEXT NULL,
  `comprovante` VARCHAR(100) NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `contrato_id` INT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`contrato_id`)
    REFERENCES `ponto_eletronico`.`contratos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `ponto_eletronico`.`ocorrencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto_eletronico`.`ocorrencias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `observacoes` TEXT NULL,
  `banco_horas` TINYINT(1) NOT NULL DEFAULT 1,
  `hora_inicio` TIME NOT NULL,
  `hora_fim` TIME NOT NULL,
  `contrato_id` INT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
    FOREIGN KEY (`contrato_id`)
    REFERENCES `ponto_eletronico`.`contratos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);