-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 07:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcv`
--

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `dishID` int(11) NOT NULL,
  `dishName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`dishID`, `dishName`, `price`) VALUES
(1, 'corn', '2.99'),
(2, 'Tomato', '3.99');

-- --------------------------------------------------------

--
-- Table structure for table `dishingredients`
--

CREATE TABLE `dishingredients` (
  `dishingredientsID` int(11) NOT NULL AUTO_INCREMENT,
  `dishingredientsName` varchar(255) NOT NULL,
  `dishID` int(11) NOT NULL,
  `supplierID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  PRIMARY KEY (`dishingredientsID`)) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dishingredients`
--

INSERT INTO `dishingredients` (`dishingredientsID`, `dishingredientsName`, `dishID`, `supplierID`, `ingredientID`) VALUES
(1, 'accessory ingredient', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredientID` int(11) NOT NULL,
  `ingredientName` varchar(255) NOT NULL,
  `IngredientType` varchar(255) DEFAULT NULL,
  `PricePerUnit` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredientID`, `ingredientName`, `IngredientType`, `PricePerUnit`) VALUES
(1, 'Honey ', 'sweet', 3.99),
(3, 'CoCo', 'sweet', 3.99),
(6, 'banana', 'sweet', 3.99);

-- --------------------------------------------------------

--
-- Table structure for table `sppliers`
--

CREATE TABLE `suppliers` (
  `supplierID` int(11) NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(255) DEFAULT NULL,
  `supplierLocation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`supplierID`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sppliers`
--

INSERT INTO `sppliers` (`supplierID`, `supplierName`, `supplierLocation`) VALUES
(0, 'walmart', '1000 Chemin'),
(1, 'costco', '100 rue montreal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`dishID`);

--
-- Indexes for table `dishingredients`
--
ALTER TABLE `dishingredients`
  ADD PRIMARY KEY (`dishingredientsID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredientID`);

--
-- Indexes for table `sppliers`
--
ALTER TABLE `sppliers`
  ADD PRIMARY KEY (`supplierID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `dishID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dishingredients`
--
ALTER TABLE `dishingredients`
  MODIFY `dishingredientsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
