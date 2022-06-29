SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `sisconteiner` ;
CREATE SCHEMA IF NOT EXISTS `sisconteiner` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `sisconteiner` ;

-- -----------------------------------------------------
-- Table `sisconteiner`.`conteiner`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sisconteiner`.`conteiner` ;

CREATE  TABLE IF NOT EXISTS `sisconteiner`.`conteiner` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `numero_conteiner` VARCHAR(12) NULL ,
  `tipo` INT NULL ,
  `status1` VARCHAR(6) NULL ,
  `categoria` VARCHAR(13) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisconteiner`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sisconteiner`.`cliente` ;

CREATE  TABLE IF NOT EXISTS `sisconteiner`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `razao_social` VARCHAR(200) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisconteiner`.`movimentacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sisconteiner`.`movimentacao` ;

CREATE  TABLE IF NOT EXISTS `sisconteiner`.`movimentacao` (
  `cliente_id` INT NOT NULL ,
  `conteiner_id` INT NOT NULL ,
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo_movimentacao` VARCHAR(17) NULL ,
  `data_hora_inicio` DATETIME NULL ,
  `data_hora_fim` DATETIME NULL ,
  PRIMARY KEY (`id`, `cliente_id`, `conteiner_id`) ,
  INDEX `fk_cliente_has_conteiner_conteiner1` (`conteiner_id` ASC) ,
  CONSTRAINT `fk_cliente_has_conteiner_cliente`
    FOREIGN KEY (`cliente_id` )
    REFERENCES `sisconteiner`.`cliente` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_has_conteiner_conteiner1`
    FOREIGN KEY (`conteiner_id` )
    REFERENCES `sisconteiner`.`conteiner` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
