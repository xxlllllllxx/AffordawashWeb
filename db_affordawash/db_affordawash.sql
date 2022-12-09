-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 09:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_affordawash`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_transact`
--

CREATE TABLE `tbl_customer_transact` (
  `id` int(11) NOT NULL,
  `customer_alias` text NOT NULL,
  `employee_id` int(11) NOT NULL,
  `machine_id_list` text NOT NULL,
  `item_id_list` text NOT NULL,
  `transaction_payment` double NOT NULL,
  `transaction_datetime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer_transact`
--

INSERT INTO `tbl_customer_transact` (`id`, `customer_alias`, `employee_id`, `machine_id_list`, `item_id_list`, `transaction_payment`, `transaction_datetime`) VALUES
(1, 'Diero', 1, '1 200', '1 3 30:2 5 60', 159, '12/07/2022 11:48:38 am'),
(2, 'Diero', 5, '1 200', '1 3 30:4 5 60', 159, '12/07/2022 11:48:39 am'),
(3, 'Diero', 1, '1 200', '1 3 30:2 5 60', 159, '12/07/2022 11:48:40 am'),
(4, 'Diero', 1, '1 200', '1 3 30:2 5 60', 159, '12/07/2022 11:48:41 am'),
(5, 'Diero', 1, '1 200', '1 3 30:2 5 60', 159, '12/07/2022 11:55:35 am'),
(6, 'Diero', 1, '1 200', '1 3 30:2 5 60', 159, '12/07/2022 11:56:55 am'),
(7, 'Diero', 1, '6 200', '1 3 30:2 5 60', 159, '12/07/2022 12:34:06 pm'),
(8, 'Diero', 1, '1 200', '1 3 30:2 5 60', 159, '12/07/2022 01:53:24 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `employee_username` text NOT NULL,
  `employee_password` text NOT NULL,
  `name` text NOT NULL,
  `employee_salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `employee_username`, `employee_password`, `name`, `employee_salary`) VALUES
(1, 'lewis', '1234', 'Lewis Masallo', 222),
(5, 'trial', '1234', 'My trial employee', 550),
(27, 'lewismasallo', '1234', 'Lewis', 55034),
(28, 'gf', '1234', 'dfs', 55),
(29, '23', '123', '123', 123),
(30, '213', '213', '213', 23),
(31, 'fsd', 'sdf', 'fdsdf', 550),
(32, '1234', '1234', 'calim', 124),
(33, '123', '213', 'dfs', 123),
(34, 'fds', 'fdsdf', 'fddsf', 550),
(35, 'dfs', 'dfsd', 'fdsf', 550),
(36, 'll', 'll', 'll', 550);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_cost` double NOT NULL,
  `item_lowest_price` double NOT NULL,
  `item_selling_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `item_name`, `item_quantity`, `item_cost`, `item_lowest_price`, `item_selling_price`) VALUES
(1, 'Surf', 38, 81, 95, 43),
(2, 'Surfa', 504, 6, 8, 0),
(3, 'Surfing', 50, 6, 8, 0),
(4, 'Surfings', 50, 6, 8, 8),
(5, 'Surfd', 50, 6, 8, 8),
(6, 'Surf12', 12, 12, 12, 0),
(7, 'Surf333', 333, 33, 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_machine`
--

CREATE TABLE `tbl_machine` (
  `id` int(11) NOT NULL,
  `service_name` text NOT NULL DEFAULT '0',
  `washing` varchar(5) NOT NULL,
  `drying` varchar(5) NOT NULL,
  `washing_price` double NOT NULL,
  `drying_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_machine`
--

INSERT INTO `tbl_machine` (`id`, `service_name`, `washing`, `drying`, `washing_price`, `drying_price`) VALUES
(1, 'MyService', 'true', 'false', 20, 20),
(2, 'Super', 'true', 'true', 33, 22),
(3, 'Supert', 'false', 'true', 0, 545),
(4, '214', 'true', 'true', 44, 545),
(5, 'rreer', 'true', 'false', 3424, 0),
(6, 'gggg', 'false', 'true', 0, 54),
(7, 'fggfgf', 'true', 'false', 56, 0),
(8, 'er', 'true', 'false', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manager`
--

CREATE TABLE `tbl_manager` (
  `id` int(11) NOT NULL,
  `manager_username` text NOT NULL,
  `manager_password` text NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_manager`
--

INSERT INTO `tbl_manager` (`id`, `manager_username`, `manager_password`, `name`, `title`) VALUES
(1, 'Admin1234', 'Admin1234', 'Real Proceso', 'CEO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer_transact`
--
ALTER TABLE `tbl_customer_transact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_username` (`employee_username`) USING HASH;

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_name` (`item_name`) USING HASH;

--
-- Indexes for table `tbl_machine`
--
ALTER TABLE `tbl_machine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_name` (`service_name`) USING HASH;

--
-- Indexes for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manager_username` (`manager_username`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer_transact`
--
ALTER TABLE `tbl_customer_transact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_machine`
--
ALTER TABLE `tbl_machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
