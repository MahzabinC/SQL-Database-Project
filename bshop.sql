-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 10:09 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addon_1`
--

DROP TABLE IF EXISTS `addon_1`;
CREATE TABLE `addon_1` (
  `item_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `admin_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addon_1`
--

INSERT INTO `addon_1` (`item_name`, `price`, `admin_id`) VALUES
('bacon', 70, 'mc@gmail.com'),
('baloney', 60, 'mc@gmail.com'),
('mushroom', 10, 'mc@gmail.com'),
('salami', 30, 'anime.suhit@gmail.com'),
('sausage', 25, 'mc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email_id`, `password`, `date_of_birth`, `address`) VALUES
('Suhit', 'anime.suhit@gmail.com', 'Suhit12345', '2001-10-11', 'A-3/4, Block- A , Banasree, Rampura, Dhaka-1000'),
('Mahzabin', 'mc@gmail.com', '123', '2021-09-01', 'mirpur, dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `bun`
--

DROP TABLE IF EXISTS `bun`;
CREATE TABLE `bun` (
  `item_name` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `admin_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bun`
--

INSERT INTO `bun` (`item_name`, `price`, `admin_id`) VALUES
('Bagel Bun', 25, 'anime.suhit@gmail.com'),
('Beefy Special Bun', 30, 'anime.suhit@gmail.com'),
('Brioche Bun', 20, 'mc@gmail.com'),
('Sesame Seed Bun', 20, 'mc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `ordered_by` varchar(50) NOT NULL,
  `bun` varchar(20) NOT NULL,
  `patty` varchar(20) NOT NULL,
  `addon_1` varchar(200) NOT NULL,
  `addon_2` varchar(200) NOT NULL,
  `salad` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `delivery` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `ordered_by`, `bun`, `patty`, `addon_1`, `addon_2`, `salad`, `quantity`, `bill`, `delivery`, `total`, `date`) VALUES
(12, 543639, 'shifa@gmail.com', 'Sesame Seed Bun', 'Double Chicken Patty', 'baloney', 'Cheese', 'Coleslaw', 1, 275, 80, 355, '2021-12-11'),
(15, 740332, 'aurko2002@gmail.com', 'Sesame Seed Bun', 'Vegan Patty', 'salami', 'Cheese', 'Pickled Cucumber', 1, 225, 80, 305, '2021-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `patty`
--

DROP TABLE IF EXISTS `patty`;
CREATE TABLE `patty` (
  `item_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `admin_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patty`
--

INSERT INTO `patty` (`item_name`, `price`, `admin_id`) VALUES
('Beef Patty', 80, 'mc@gmail.com'),
('Beef&Chicken Patty', 140, 'mc@gmail.com'),
('Chicken Patty', 70, 'mc@gmail.com'),
('Double Beef Patty', 150, 'anime.suhit@gmail.com'),
('Double Beef&Chicken Patty', 250, 'anime.suhit@gmail.com'),
('Double Chicken Patty', 130, 'anime.suhit@gmail.com'),
('Vegan Patty', 120, 'mc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `salad`
--

DROP TABLE IF EXISTS `salad`;
CREATE TABLE `salad` (
  `item_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `admin_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salad`
--

INSERT INTO `salad` (`item_name`, `price`, `admin_id`) VALUES
('Coleslaw', 40, 'anime.suhit@gmail.com'),
('Letuuce', 5, 'mc@gmail.com'),
('Pickled Cucumber', 30, 'mc@gmail.com'),
('Tomatos ', 10, 'mc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `password`, `email_id`, `date_of_birth`, `address`) VALUES
('twasin chowdhury', '90876', 'aurka@gmail.com', '2002-01-07', 'kallyanpur,Dhaka'),
('Twasin Chowdhury', 'asdfqwerty', 'aurko2002@gmail.com', '2002-01-07', 'Kallyanpur, Dhaka'),
('Asaka Shifa', '123', 'shifa@gmail.com', '2000-01-01', 'Uttara,Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon_1`
--
ALTER TABLE `addon_1`
  ADD PRIMARY KEY (`item_name`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `bun`
--
ALTER TABLE `bun`
  ADD PRIMARY KEY (`item_name`),
  ADD KEY `updated_by` (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patty`
--
ALTER TABLE `patty`
  ADD PRIMARY KEY (`item_name`),
  ADD KEY `patty_ibfk_1` (`admin_id`);

--
-- Indexes for table `salad`
--
ALTER TABLE `salad`
  ADD PRIMARY KEY (`item_name`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addon_1`
--
ALTER TABLE `addon_1`
  ADD CONSTRAINT `addon_1_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`email_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `bun`
--
ALTER TABLE `bun`
  ADD CONSTRAINT `updated_by` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patty`
--
ALTER TABLE `patty`
  ADD CONSTRAINT `patty_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`email_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `salad`
--
ALTER TABLE `salad`
  ADD CONSTRAINT `salad_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`email_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
