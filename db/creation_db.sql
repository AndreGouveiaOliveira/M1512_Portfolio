-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema M152
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `M152` DEFAULT CHARACTER SET utf8 ;
USE `M152` ;

-- -----------------------------------------------------
-- Table `M152`.`Post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `M152`.`Post` (
  `idPost` INT NOT NULL AUTO_INCREMENT,
  `commentaire` VARCHAR(45) NULL,
  `creationDate` TIMESTAMP NULL,
  `modificationDate` TIMESTAMP NULL,
  PRIMARY KEY (`idPost`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `M152`.`Media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `M152`.`Media` (
  `idMedia` INT NOT NULL AUTO_INCREMENT,
  `typeMedia` VARCHAR(45) NULL,
  `nomMedia` VARCHAR(45) NULL,
  `creationDate` TIMESTAMP NULL,
  `modificationDate` TIMESTAMP NULL,
  `Post_idPost` INT NOT NULL,
  PRIMARY KEY (`idMedia`, `Post_idPost`),
  INDEX `fk_Media_Post_idx` (`Post_idPost` ASC) ,
  CONSTRAINT `fk_Media_Post`
    FOREIGN KEY (`Post_idPost`)
    REFERENCES `M152`.`Post` (`idPost`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
