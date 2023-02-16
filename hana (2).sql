-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 03:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hana`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(255) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_type` varchar(255) NOT NULL,
  `food_price` varchar(255) NOT NULL,
  `food_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_type`, `food_price`, `food_picture`) VALUES
(1, 'ผัดกระเพรา', 'อาหารตามสั่ง', '50', 'ผัดกระเพรา.jpg'),
(2, 'ชานมไข่มุข', 'ของหวาน\r\n', '50', 'ชานม.jpg'),
(3, 'ลอดช่องไทยเเลนเเดนสวรรค์', 'ของหวาน\r\n', '30', 'ลอดช่อง.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `type_id` int(20) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`type_id`, `type_name`) VALUES
(1, 'อาหารตามสั่ง'),
(2, 'เครื่องดื่ม'),
(3, 'ของหวาน\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `user_picture` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_level` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `email`, `name`, `password`, `tel`, `user_picture`, `address`, `user_level`) VALUES
(3, 'boonyakorn@gmail.com', 'Boonyakorn Jitchai', '1', '0955555555', '123.png', NULL, 'M'),
(4, 'waveza@gmail.com', 'wave eiei', '1', '0900000000', '123.png', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `d_id` int(10) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `d_qty` int(11) NOT NULL,
  `d_subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`d_id`, `o_id`, `p_id`, `d_qty`, `d_subtotal`) VALUES
(1, 4, 2, 1, 50),
(2, 4, 1, 1, 50),
(3, 5, 1, 6, 300),
(4, 6, 1, 1, 50),
(5, 6, 2, 1, 50),
(6, 7, 1, 3, 150),
(7, 7, 2, 2, 100),
(8, 8, 1, 1, 50),
(9, 8, 2, 1, 50),
(10, 8, 3, 1, 30),
(11, 9, 1, 1, 50),
(12, 9, 2, 1, 50),
(13, 9, 3, 1, 30),
(14, 10, 1, 3, 150),
(15, 10, 2, 1, 50),
(16, 11, 1, 4, 200),
(17, 11, 3, 2, 60);

-- --------------------------------------------------------

--
-- Table structure for table `order_head`
--

CREATE TABLE `order_head` (
  `o_id` int(10) NOT NULL,
  `o_dttm` datetime NOT NULL,
  `o_name` varchar(100) NOT NULL,
  `o_addr` varchar(500) NOT NULL,
  `o_email` varchar(30) NOT NULL,
  `o_phone` varchar(20) NOT NULL,
  `o_qty` int(11) NOT NULL,
  `o_total` float NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_head`
--

INSERT INTO `order_head` (`o_id`, `o_dttm`, `o_name`, `o_addr`, `o_email`, `o_phone`, `o_qty`, `o_total`, `status`) VALUES
(4, '2023-01-29 11:15:19', 'Sirirod Udomdach', '203/9', 'Mr.sirirod@gmail.com', '0955555555', 1, 100, '4'),
(5, '2023-01-29 11:16:12', 'Boonyakorn Jitchai', 'eiei', 'boonyakorn@gmail.com', '0955555555', 6, 300, '2'),
(6, '2023-02-07 07:38:51', 'Boonyakorn Jitchai', '203/09 ', 'boonyakorn@gmail.com', '0955555555', 1, 100, '5'),
(7, '2023-02-10 13:55:18', 'Boonyakorn Jitchai', '203/09', 'boonyakorn@gmail.com', '0955555555', 2, 250, '5'),
(8, '2023-02-14 20:03:47', 'Boonyakorn Jitchai', 'HELLo barbe', 'boonyakorn@gmail.com', '0955555555', 1, 130, '5'),
(9, '2023-02-14 20:06:10', 'Boonyakorn Jitchai', '203/09 suntrai ', 'boonyakorn@gmail.com', '0955555555', 1, 130, '6'),
(10, '2023-02-14 20:15:41', 'Boonyakorn Jitchai', '203/09 helloworld', 'boonyakorn@gmail.com', '0955555555', 1, 200, '6'),
(11, '2023-02-14 21:29:03', 'Boonyakorn Jitchai', '203/09', 'boonyakorn@gmail.com', '0955555555', 2, 260, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `order_head`
--
ALTER TABLE `order_head`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_type`
--
ALTER TABLE `food_type`
  MODIFY `type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_head`
--
ALTER TABLE `order_head`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
