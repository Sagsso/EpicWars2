SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema epicwars_mmorpg
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema epicwars_mmorpg
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `epicwars_mmorpg` DEFAULT CHARACTER SET utf8 ;
USE `epicwars_mmorpg` ;

-- -----------------------------------------------------
-- Table `epicwars_mmorpg`.`CharacterClass`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epicwars_mmorpg`.`CharacterClass` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epicwars_mmorpg`.`Character`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epicwars_mmorpg`.`Character` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `level` VARCHAR(45) NOT NULL,
  `characterClassId` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Character_CharacterClass`
    FOREIGN KEY (`characterClassId`)
    REFERENCES `epicwars_mmorpg`.`CharacterClass` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Character_CharacterClass_idx` ON `epicwars_mmorpg`.`Character` (`characterClassId` ASC);


-- -----------------------------------------------------
-- Table `epicwars_mmorpg`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epicwars_mmorpg`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `username_UNIQUE` ON `epicwars_mmorpg`.`User` (`username` ASC);


-- -----------------------------------------------------
-- Table `epicwars_mmorpg`.`User_has_Character`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epicwars_mmorpg`.`User_has_Character` (
  `Userid` INT NOT NULL,
  `Characterid` INT NOT NULL,
  PRIMARY KEY (`Userid`, `Characterid`),
  CONSTRAINT `fk_User_has_Character_User1`
    FOREIGN KEY (`Userid`)
    REFERENCES `epicwars_mmorpg`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Character_Character1`
    FOREIGN KEY (`Characterid`)
    REFERENCES `epicwars_mmorpg`.`Character` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_User_has_Character_Character1_idx` ON `epicwars_mmorpg`.`User_has_Character` (`Characterid` ASC);

CREATE INDEX `fk_User_has_Character_User1_idx` ON `epicwars_mmorpg`.`User_has_Character` (`Userid` ASC);


-- -----------------------------------------------------
-- Table `epicwars_mmorpg`.`History`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epicwars_mmorpg`.`History` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userid` INT NOT NULL,
  `duelo` VARCHAR(45) NOT NULL,
  `result` TINYINT(1) NOT NULL,
  `detail` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_History_User1`
    FOREIGN KEY (`userid`)
    REFERENCES `epicwars_mmorpg`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_History_User1_idx` ON `epicwars_mmorpg`.`History` (`userid` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `epicwars_mmorpg`.`CharacterClass`
-- -----------------------------------------------------
START TRANSACTION;
USE `epicwars_mmorpg`;
INSERT INTO `epicwars_mmorpg`.`CharacterClass` (`id`, `name`) VALUES (1, 'Mage');
INSERT INTO `epicwars_mmorpg`.`CharacterClass` (`id`, `name`) VALUES (2, 'Warrior');
INSERT INTO `epicwars_mmorpg`.`CharacterClass` (`id`, `name`) VALUES (3, 'Rogue');

COMMIT;