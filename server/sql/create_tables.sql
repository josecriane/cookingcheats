SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `CATEGORY`;
CREATE TABLE IF NOT EXISTS `CATEGORY` (
  `CategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CatName` varchar(255) COLLATE utf8_bin NOT NULL,
  `CatDescription` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `CONTAINS`;
CREATE TABLE IF NOT EXISTS `CONTAINS` (
  `RecipeId` int(11) NOT NULL,
  `IngredientId` int(11) NOT NULL,
  `Amount` int(11) NOT NULL COMMENT 'ingredient amount in grams',
  `Optional` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`RecipeId`,`IngredientId`),
  KEY `IngredientId` (`IngredientId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `INGREDIENT`;
CREATE TABLE IF NOT EXISTS `INGREDIENT` (
  `IngredientId` int(11) NOT NULL AUTO_INCREMENT,
  `IngName` varchar(255) COLLATE utf8_bin NOT NULL,
  `IngPhoto` varchar(255) COLLATE utf8_bin NOT NULL,
  `Kcal` int(5) DEFAULT NULL COMMENT 'Kcal to 100g',
  `TypeId` int(11) NOT NULL,
  PRIMARY KEY (`IngredientId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `RECIPE`;
CREATE TABLE IF NOT EXISTS `RECIPE` (
  `RecipeId` int(11) NOT NULL AUTO_INCREMENT,
  `RecName` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `RecDescription` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `RecPhoto` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Time` int(4) NOT NULL,
  `Preparation` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `NumDiners` int(2) NOT NULL,
  `Presentation` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Difficulty` int(1) DEFAULT NULL,
  `Video` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`RecipeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `RECIPE_CATEGORY`;
CREATE TABLE IF NOT EXISTS `RECIPE_CATEGORY` (
  `RecipeId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  PRIMARY KEY (`RecipeId`,`CategoryId`),
  KEY `CategoryId` (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS `TYPE`;
CREATE TABLE IF NOT EXISTS `TYPE` (
  `TypeId` int(11) NOT NULL AUTO_INCREMENT,
  `TypName` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`TypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;


ALTER TABLE `CONTAINS`
  ADD CONSTRAINT `CONTAINS_ibfk_2` FOREIGN KEY (`RecipeId`) REFERENCES `RECIPE` (`RecipeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CONTAINS_ibfk_1` FOREIGN KEY (`IngredientId`) REFERENCES `INGREDIENT` (`IngredientId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `RECIPE_CATEGORY`
  ADD CONSTRAINT `RECIPE_CATEGORY_ibfk_2` FOREIGN KEY (`CategoryId`) REFERENCES `CATEGORY` (`CategoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RECIPE_CATEGORY_ibfk_1` FOREIGN KEY (`RecipeId`) REFERENCES `RECIPE` (`RecipeId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;