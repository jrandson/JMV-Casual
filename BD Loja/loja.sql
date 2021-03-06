SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `loja` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `loja` ;

-- -----------------------------------------------------
-- Table `loja`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `loja`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(100) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `dataCadastro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(); ,
  `id_usuario` INT NOT NULL ,
  PRIMARY KEY (`idUsuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`produto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `loja`.`produto` (
  `idProduto` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(100) NOT NULL ,
  `precoVenda` DOUBLE NULL DEFAULT 0 ,
  `precoCompra` DOUBLE NULL DEFAULT 0 ,
  `estoque` INT NOT NULL DEFAULT 0 ,
  `localizacao` VARCHAR(100) NULL ,
  `id_usuario` INT NULL ,
  PRIMARY KEY (`idProduto`) ,
  INDEX `fk_produto_usuario_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_produto_usuario`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `loja`.`usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`venda`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `loja`.`venda` (
  `idVenda` INT NOT NULL AUTO_INCREMENT ,
  `id_usuario` INT NOT NULL ,
  `dataVenda` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(); ,
  PRIMARY KEY (`idVenda`) ,
  INDEX `fk_venda_usuario_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_venda_usuario`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `loja`.`usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`item_venda`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `loja`.`item_venda` (
  `idItem_venda` INT NOT NULL AUTO_INCREMENT ,
  `id_venda` INT NOT NULL ,
  `id_produto` INT NOT NULL ,
  `quantidade` INT NULL ,
  PRIMARY KEY (`idItem_venda`) ,
  INDEX `fk_item_venda_venda_idx` (`id_venda` ASC) ,
  INDEX `fk_item_venda_produto_idx` (`id_produto` ASC) ,
  CONSTRAINT `fk_item_venda_venda`
    FOREIGN KEY (`id_venda` )
    REFERENCES `loja`.`venda` (`idVenda` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_venda_produto`
    FOREIGN KEY (`id_produto` )
    REFERENCES `loja`.`produto` (`idProduto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`pagamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `loja`.`pagamento` (
  `idPagamento` INT NOT NULL AUTO_INCREMENT ,
  `id_venda` INT NOT NULL ,
  `valor` DOUBLE NULL ,
  PRIMARY KEY (`idPagamento`) ,
  INDEX `fk_pagamento_venda_idx` (`id_venda` ASC) ,
  CONSTRAINT `fk_pagamento_venda`
    FOREIGN KEY (`id_venda` )
    REFERENCES `loja`.`venda` (`idVenda` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `loja`.`cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(100) NULL ,
  `endereco` VARCHAR(100) NULL ,
  `rg` VARCHAR(45) NULL ,
  `cpf` VARCHAR(45) NULL ,
  `data_cadastro` TIMESTAMP NULL DEFAULT current_timestamp(); ,
  `id_usuario` INT NULL ,
  PRIMARY KEY (`idCliente`) ,
  INDEX `fk_cliente_usuario_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_cliente_usuario`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `loja`.`usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`conta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `loja`.`conta` (
  `idConta` INT NOT NULL AUTO_INCREMENT ,
  `id_venda` INT NOT NULL ,
  `id_cliente` INT NULL ,
  `data_abertura` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(); ,
  `id_usuario` INT NOT NULL ,
  `quitada` INT NULL ,
  PRIMARY KEY (`idConta`, `id_venda`) ,
  INDEX `fk_conta_cliente_idx` (`id_cliente` ASC) ,
  INDEX `fk_conta_venda_idx` (`id_venda` ASC) ,
  CONSTRAINT `fk_conta_cliente`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `loja`.`cliente` (`idCliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conta_venda`
    FOREIGN KEY (`id_venda` )
    REFERENCES `loja`.`venda` (`idVenda` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `loja` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
