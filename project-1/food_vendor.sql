-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2023 at 01:34 AM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wei_peter`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `DishDetails`
-- (See below for the actual view)
--
CREATE TABLE `DishDetails` (
`DishID` int(11)
,`DishName` varchar(255)
,`Description` text
,`IngredientName` varchar(255)
,`IngredientType` varchar(255)
,`SupplierName` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `Dishes`
--

CREATE TABLE `Dishes` (
  `DishID` int(11) NOT NULL,
  `DishName` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Dishes`
--

INSERT INTO `Dishes` (`DishID`, `DishName`, `Description`) VALUES
(101, 'Dish1', 'Description1'),
(102, 'Dish2', 'Description2'),
(103, 'Dish3', 'Description3');

-- --------------------------------------------------------

--
-- Table structure for table `DishIngredients`
--

CREATE TABLE `DishIngredients` (
  `DishID` int(11) NOT NULL,
  `IngredientID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `DishIngredients`
--

INSERT INTO `DishIngredients` (`DishID`, `IngredientID`, `Quantity`) VALUES
(101, 1, 2),
(101, 3, 1),
(102, 1, 2),
(102, 2, 3),
(103, 1, 1),
(103, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Ingredients`
--

CREATE TABLE `Ingredients` (
  `IngredientID` int(11) NOT NULL,
  `IngredientName` varchar(255) DEFAULT NULL,
  `IngredientType` varchar(255) DEFAULT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `PricePerUnit` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Ingredients`
--

INSERT INTO `Ingredients` (`IngredientID`, `IngredientName`, `IngredientType`, `SupplierID`, `PricePerUnit`) VALUES
(1, 'IngredientA', 'Meat', 1, 5.99),
(2, 'IngredientB', 'Vegetables', 2, 3.49),
(3, 'IngredientC', 'Meat', 3, 2.99);

-- --------------------------------------------------------

--
-- Table structure for table `Suppliers`
--

CREATE TABLE `Suppliers` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(255) DEFAULT NULL,
  `SupplierLocation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Suppliers`
--

INSERT INTO `Suppliers` (`SupplierID`, `SupplierName`, `SupplierLocation`) VALUES
(1, 'SupplierA', 'LocationA'),
(2, 'SupplierB', 'LocationB'),
(3, 'SupplierC', 'LocationC');

-- --------------------------------------------------------

--
-- Structure for view `DishDetails`
--
DROP TABLE IF EXISTS `DishDetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`food_vonder`@`%` SQL SECURITY DEFINER VIEW `DishDetails`  AS SELECT `Dishes`.`DishID` AS `DishID`, `Dishes`.`DishName` AS `DishName`, `Dishes`.`Description` AS `Description`, `Ingredients`.`IngredientName` AS `IngredientName`, `Ingredients`.`IngredientType` AS `IngredientType`, `Suppliers`.`SupplierName` AS `SupplierName` FROM (((`Dishes` join `DishIngredients` on(`Dishes`.`DishID` = `DishIngredients`.`DishID`)) join `Ingredients` on(`DishIngredients`.`IngredientID` = `Ingredients`.`IngredientID`)) join `Suppliers` on(`Ingredients`.`SupplierID` = `Suppliers`.`SupplierID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Dishes`
--
ALTER TABLE `Dishes`
  ADD PRIMARY KEY (`DishID`);

--
-- Indexes for table `DishIngredients`
--
ALTER TABLE `DishIngredients`
  ADD PRIMARY KEY (`DishID`,`IngredientID`),
  ADD KEY `IngredientID` (`IngredientID`);

--
-- Indexes for table `Ingredients`
--
ALTER TABLE `Ingredients`
  ADD PRIMARY KEY (`IngredientID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `Suppliers`
--
ALTER TABLE `Suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `DishIngredients`
--
ALTER TABLE `DishIngredients`
  ADD CONSTRAINT `DishIngredients_ibfk_1` FOREIGN KEY (`DishID`) REFERENCES `Dishes` (`DishID`),
  ADD CONSTRAINT `DishIngredients_ibfk_2` FOREIGN KEY (`IngredientID`) REFERENCES `Ingredients` (`IngredientID`);

--
-- Constraints for table `Ingredients`
--
ALTER TABLE `Ingredients`
  ADD CONSTRAINT `Ingredients_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `Suppliers` (`SupplierID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
