-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 10:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-mysqli`
--

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(0, 'SUCCESS'),
(1, 'FAILED');

-- --------------------------------------------------------

--
-- Table structure for table `viewdata`
--

CREATE TABLE `viewdata` (
  `data_id` int(11) NOT NULL,
  `data_productID` int(11) NOT NULL,
  `data_productName` varchar(50) NOT NULL,
  `data_amount` int(11) NOT NULL,
  `data_customerName` varchar(20) NOT NULL,
  `data_status` int(11) DEFAULT NULL,
  `data_transactionDate` datetime NOT NULL,
  `data_createBy` varchar(20) NOT NULL,
  `data_createOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viewdata`
--

INSERT INTO `viewdata` (`data_id`, `data_productID`, `data_productName`, `data_amount`, `data_customerName`, `data_status`, `data_transactionDate`, `data_createBy`, `data_createOn`) VALUES
(1372, 10005, 'Test 1', 1000, 'abc', 0, '2022-07-10 11:14:52', 'abc', '2022-07-10 11:14:52'),
(1373, 10004, 'Test 4', 2000, 'abcfsefseac', 0, '2022-07-11 13:14:52', 'abcfsefseac', '2022-07-10 13:14:52'),
(1374, 10001, 'Test 1', 1000, 'abc', 0, '2022-08-10 12:14:52', 'abc', '2022-07-10 12:14:52'),
(1375, 10002, 'Test 2', 1000, 'abc', 1, '2022-08-10 13:10:52', 'abc', '2022-07-10 13:10:52'),
(1376, 10001, 'Test 1', 1000, 'abc', 0, '2022-08-10 13:11:52', 'abc', '2022-07-10 13:11:52'),
(1377, 10002, 'Test 2', 2000, 'abc', 0, '2022-08-12 13:14:52', 'abc', '2022-07-10 13:14:52'),
(1378, 10001, 'Test 1', 1000, 'abc', 0, '2022-08-12 14:11:52', 'abc', '2022-07-10 14:11:52'),
(1379, 10003, 'Test 2', 1000, 'abc', 1, '2022-09-13 11:14:52', 'abc', '2022-07-10 11:14:52'),
(1380, 10001, 'Test 1', 1000, 'abc', 0, '2022-09-13 13:14:52', 'abc', '2022-07-10 13:14:52'),
(1381, 10002, 'Test 2', 2000, 'abc', 0, '2022-09-14 09:11:52', 'abc', '2022-07-10 09:11:52'),
(1382, 10001, 'Test 1', 1000, 'abc', 0, '2022-09-14 10:14:52', 'abc', '2022-07-10 10:14:52'),
(1383, 10002, 'Test 2', 1000, 'abc', 1, '2022-08-15 13:14:52', 'abc', '2022-08-15 13:14:52'),
(1384, 2343654, 'afadsfg', 654457, 'sfefyret', 0, '1970-01-01 01:01:03', 'sfefjyt', '1970-01-01 01:01:03'),
(1385, 2343654, 'afadsfg', 654457, 'sfefyret', 0, '1970-01-01 01:01:03', 'sfefjyt', '1970-01-01 01:01:03'),
(1397, 842098404, 'zzzz', 6447, 'zzzz', 1, '2019-05-17 01:00:00', 'zzzz', '2019-06-09 01:00:00'),
(1398, 549834, 'tw3r3fth', 23478, 'gersgsd', 0, '1964-01-01 01:03:00', 'gersgsd', '1978-01-01 01:10:20'),
(1400, 74892572, 'anfawvnajo', 635645, 'wdnanfwanf', 0, '2024-12-04 14:19:55', 'wdnanfwanf', '2024-12-04 14:19:47'),
(1401, 97799, 'nfuwpngu', 234237, 'srgsrg', 1, '2024-12-04 16:02:27', 'srgsrg', '2024-12-04 14:21:24'),
(1402, 423894, 'iuaehfuie', 42600, 'jgahegbae', 1, '2024-12-04 15:06:01', 'jgahegbae', '2024-12-04 15:05:27'),
(1403, 2147483647, 'siapasih', 7892572, 'gatausiapa', 0, '2024-12-04 15:19:02', 'gatausiapa', '2024-12-04 15:18:38'),
(1404, 2147483647, 'qrjwuE9ENG', 748075872, 'wghwuhguwhg', 1, '2024-12-04 15:49:04', 'wghwuhguwhg', '2024-12-04 15:48:48'),
(1405, 2147483647, 'uf8u83ughg', 83280235, 'dj9823j8r34hf', 1, '2024-12-04 16:01:24', 'dj9823j8r34hf', '2024-12-04 16:00:49'),
(1406, 72085025, 'gj8jgj385gj4', 2147483647, '8jgf83qj83v', 0, '2024-12-04 16:23:40', '8jgf83qj83v', '2024-12-04 16:20:48'),
(1407, 58458025, 'j034jg0j3gb', 45927682, 'gj309kg939jh', 0, '2024-12-04 16:30:01', 'gj309kg939jh', '2024-12-04 16:25:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `viewdata`
--
ALTER TABLE `viewdata`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `status_name` (`data_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `viewdata`
--
ALTER TABLE `viewdata`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1408;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `viewdata`
--
ALTER TABLE `viewdata`
  ADD CONSTRAINT `status_name` FOREIGN KEY (`data_status`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
