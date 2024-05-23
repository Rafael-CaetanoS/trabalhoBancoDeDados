-- MySQL Script generated by MySQL Workbench
-- Wed May 22 23:35:59 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema farmacia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema farmacia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `farmacia` DEFAULT CHARACTER SET utf8 COLLATE utf8_estonian_ci ;
USE `farmacia` ;

-- -----------------------------------------------------
-- Table `farmacia`.`Cat_produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Cat_produto` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Cat_produto` (
  `idCat_produto` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCat_produto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Promocao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Promocao` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Promocao` (
  `idPromocao` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `valor` DOUBLE NOT NULL,
  PRIMARY KEY (`idPromocao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Produto` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Produto` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `idCat_produto` INT NOT NULL,
  `idPromocao` INT NOT NULL,
  PRIMARY KEY (`idProduto`),
  INDEX `fk_produto_cat_produto1_idx` (`idCat_produto` ASC) VISIBLE,
  INDEX `fk_produto_promocao1_idx` (`idPromocao` ASC) VISIBLE,
  CONSTRAINT `fk_produto_cat_produto1`
    FOREIGN KEY (`idCat_produto`)
    REFERENCES `farmacia`.`Cat_produto` (`idCat_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_promocao1`
    FOREIGN KEY (`idPromocao`)
    REFERENCES `farmacia`.`Promocao` (`idPromocao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Fornecedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Fornecedor` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Fornecedor` (
  `cnpj` INT NOT NULL,
  `nome_empresa` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`cnpj`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Cliente` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Cliente` (
  `cpf` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `rg` INT NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`cpf`),
  UNIQUE INDEX `rg_UNIQUE` (`rg` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Cargo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Cargo` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Cargo` (
  `idCargo` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NOT NULL,
  `salario` DOUBLE NOT NULL,
  PRIMARY KEY (`idCargo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Funcionario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Funcionario` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Funcionario` (
  `cpf` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `rg` INT NOT NULL,
  `idCargo` INT NOT NULL,
  PRIMARY KEY (`cpf`),
  INDEX `fk_funcionario_cargo1_idx` (`idCargo` ASC) VISIBLE,
  UNIQUE INDEX `rg_UNIQUE` (`rg` ASC) VISIBLE,
  CONSTRAINT `fk_funcionario_cargo1`
    FOREIGN KEY (`idCargo`)
    REFERENCES `farmacia`.`Cargo` (`idCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Desconto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Desconto` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Desconto` (
  `idDesconto` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `valor` DOUBLE NOT NULL,
  PRIMARY KEY (`idDesconto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Venda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Venda` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Venda` (
  `idVenda` INT NOT NULL AUTO_INCREMENT,
  `dt_venda` DATE NOT NULL,
  `cpfFuncionario` INT NOT NULL,
  `cpfCliente` INT NOT NULL,
  `idProduto` INT NOT NULL,
  `idDesconto` INT NOT NULL,
  PRIMARY KEY (`idVenda`),
  INDEX `fk_venda_funcionario1_idx` (`cpfFuncionario` ASC) VISIBLE,
  INDEX `fk_venda_cliente1_idx` (`cpfCliente` ASC) VISIBLE,
  INDEX `fk_venda_produto1_idx` (`idProduto` ASC) VISIBLE,
  INDEX `fk_venda_Desconto1_idx` (`idDesconto` ASC) VISIBLE,
  CONSTRAINT `fk_venda_funcionario1`
    FOREIGN KEY (`cpfFuncionario`)
    REFERENCES `farmacia`.`Funcionario` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_cliente1`
    FOREIGN KEY (`cpfCliente`)
    REFERENCES `farmacia`.`Cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_produto1`
    FOREIGN KEY (`idProduto`)
    REFERENCES `farmacia`.`Produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_Desconto1`
    FOREIGN KEY (`idDesconto`)
    REFERENCES `farmacia`.`Desconto` (`idDesconto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Nota_fiscal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Nota_fiscal` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Nota_fiscal` (
  `idNota_fiscal` INT NOT NULL AUTO_INCREMENT,
  `idVenda` INT NOT NULL,
  PRIMARY KEY (`idNota_fiscal`),
  INDEX `fk_nota_fiscal_venda1_idx` (`idVenda` ASC) VISIBLE,
  CONSTRAINT `fk_nota_fiscal_venda1`
    FOREIGN KEY (`idVenda`)
    REFERENCES `farmacia`.`Venda` (`idVenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Compra_produtos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Compra_produtos` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Compra_produtos` (
  `idCompra` INT NOT NULL AUTO_INCREMENT,
  `dt_compra` DATE NOT NULL,
  PRIMARY KEY (`idCompra`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Item_compra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Item_compra` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Item_compra` (
  `idItem` INT NOT NULL AUTO_INCREMENT,
  `qtde` INT NOT NULL,
  `nome_produto` VARCHAR(45) NOT NULL,
  `idCompra` INT NOT NULL,
  PRIMARY KEY (`idItem`),
  INDEX `fk_item_compra_compra_produtos1_idx` (`idCompra` ASC) VISIBLE,
  CONSTRAINT `fk_item_compra_compra_produtos1`
    FOREIGN KEY (`idCompra`)
    REFERENCES `farmacia`.`Compra_produtos` (`idCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Movimentacao_estoque`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Movimentacao_estoque` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Movimentacao_estoque` (
  `idMovimentacao` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `idProduto` INT NOT NULL,
  `idCompra` INT NOT NULL,
  PRIMARY KEY (`idMovimentacao`),
  INDEX `fk_movimentacao_estoque_produto1_idx` (`idProduto` ASC) VISIBLE,
  INDEX `fk_movimentacao_estoque_compra_produtos1_idx` (`idCompra` ASC) VISIBLE,
  CONSTRAINT `fk_movimentacao_estoque_produto1`
    FOREIGN KEY (`idProduto`)
    REFERENCES `farmacia`.`Produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimentacao_estoque_compra_produtos1`
    FOREIGN KEY (`idCompra`)
    REFERENCES `farmacia`.`Compra_produtos` (`idCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Estoque`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Estoque` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Estoque` (
  `idEstoque` INT NOT NULL AUTO_INCREMENT,
  `qtde` INT NOT NULL,
  `idProduto` INT NOT NULL,
  PRIMARY KEY (`idEstoque`),
  INDEX `fk_estoque_produto1_idx` (`idProduto` ASC) VISIBLE,
  CONSTRAINT `fk_estoque_produto1`
    FOREIGN KEY (`idProduto`)
    REFERENCES `farmacia`.`Produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Receita`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Receita` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Receita` (
  `idReceita` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `cpfCliente` INT NOT NULL,
  PRIMARY KEY (`idReceita`),
  INDEX `fk_receita_cliente1_idx` (`cpfCliente` ASC) VISIBLE,
  CONSTRAINT `fk_receita_cliente1`
    FOREIGN KEY (`cpfCliente`)
    REFERENCES `farmacia`.`Cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Forma_pagamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Forma_pagamento` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Forma_pagamento` (
  `idForma_pagamento` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idForma_pagamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Tipo_Entrega`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Tipo_Entrega` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Tipo_Entrega` (
  `idTipo_entrega` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipo_entrega`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Status_Entrega`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Status_Entrega` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Status_Entrega` (
  `idStatus_entrega` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idStatus_entrega`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Entrega`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Entrega` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Entrega` (
  `idEntrega` INT NOT NULL,
  `idVenda` INT NOT NULL,
  `idTipo_Entrega` INT NOT NULL,
  `idStatusEntrega` INT NOT NULL,
  PRIMARY KEY (`idEntrega`),
  INDEX `fk_Entrega_venda1_idx` (`idVenda` ASC) VISIBLE,
  INDEX `fk_Entrega_Tipo_Entrega1_idx` (`idTipo_Entrega` ASC) VISIBLE,
  INDEX `fk_Entrega_Status_Entrega1_idx` (`idStatusEntrega` ASC) VISIBLE,
  CONSTRAINT `fk_Entrega_venda1`
    FOREIGN KEY (`idVenda`)
    REFERENCES `farmacia`.`Venda` (`idVenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entrega_Tipo_Entrega1`
    FOREIGN KEY (`idTipo_Entrega`)
    REFERENCES `farmacia`.`Tipo_Entrega` (`idTipo_entrega`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entrega_Status_Entrega1`
    FOREIGN KEY (`idStatusEntrega`)
    REFERENCES `farmacia`.`Status_Entrega` (`idStatus_entrega`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Pagamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Pagamento` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Pagamento` (
  `idPagamento` INT NOT NULL,
  `idVenda` INT NOT NULL,
  `idForma_pagamento` INT NOT NULL,
  PRIMARY KEY (`idPagamento`),
  INDEX `fk_Pagamento_venda1_idx` (`idVenda` ASC) VISIBLE,
  INDEX `fk_Pagamento_forma_pagamento1_idx` (`idForma_pagamento` ASC) VISIBLE,
  CONSTRAINT `fk_Pagamento_venda1`
    FOREIGN KEY (`idVenda`)
    REFERENCES `farmacia`.`Venda` (`idVenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pagamento_forma_pagamento1`
    FOREIGN KEY (`idForma_pagamento`)
    REFERENCES `farmacia`.`Forma_pagamento` (`idForma_pagamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`compra_produtos_has_fornecedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`compra_produtos_has_fornecedor` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`compra_produtos_has_fornecedor` (
  `compra_produtos_idcompra` INT NOT NULL,
  `fornecedor_cnpj` INT NOT NULL,
  PRIMARY KEY (`compra_produtos_idcompra`, `fornecedor_cnpj`),
  INDEX `fk_compra_produtos_has_fornecedor_fornecedor1_idx` (`fornecedor_cnpj` ASC) VISIBLE,
  INDEX `fk_compra_produtos_has_fornecedor_compra_produtos1_idx` (`compra_produtos_idcompra` ASC) VISIBLE,
  CONSTRAINT `fk_compra_produtos_has_fornecedor_compra_produtos1`
    FOREIGN KEY (`compra_produtos_idcompra`)
    REFERENCES `farmacia`.`Compra_produtos` (`idCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_produtos_has_fornecedor_fornecedor1`
    FOREIGN KEY (`fornecedor_cnpj`)
    REFERENCES `farmacia`.`Fornecedor` (`cnpj`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farmacia`.`Endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `farmacia`.`Endereco` ;

CREATE TABLE IF NOT EXISTS `farmacia`.`Endereco` (
  `idEndereco` INT NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `cep` INT NOT NULL,
  `numero` INT NOT NULL,
  `cpfCliente` INT NOT NULL,
  PRIMARY KEY (`idEndereco`),
  INDEX `fk_Endereco_cliente1_idx` (`cpfCliente` ASC) VISIBLE,
  CONSTRAINT `fk_Endereco_cliente1`
    FOREIGN KEY (`cpfCliente`)
    REFERENCES `farmacia`.`Cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
