-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 08:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuda_2023_5`
--

-- --------------------------------------------------------

--
-- Table structure for table `vest`
--

CREATE TABLE `vest` (
  `id` int(11) NOT NULL,
  `vest_no` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vest`
--

INSERT INTO `vest` (`id`, `vest_no`, `color`, `status`) VALUES
(1, 1, 'Purple', 0),
(2, 2, 'Purple', 1),
(3, 3, 'Purple', 1),
(4, 4, 'Purple', 1),
(5, 5, 'Purple', 1),
(6, 6, 'Purple', 1),
(7, 7, 'Purple', 0),
(8, 8, 'Purple', 1),
(9, 9, 'Purple', 0),
(10, 10, 'Purple', 1),
(11, 11, 'Purple', 0),
(12, 12, 'Purple', 1),
(13, 13, 'Purple', 1),
(14, 14, 'Purple', 1),
(15, 15, 'Purple', 1),
(16, 16, 'Purple', 1),
(17, 17, 'Purple', 0),
(18, 18, 'Purple', 0),
(19, 19, 'Purple', 0),
(20, 20, 'Purple', 1),
(21, 21, 'Purple', 1),
(22, 22, 'Purple', 0),
(23, 23, 'Purple', 0),
(24, 24, 'Purple', 0),
(25, 25, 'Purple', 1),
(26, 26, 'Purple', 1),
(27, 27, 'Purple', 0),
(28, 28, 'Purple', 0),
(29, 29, 'Purple', 1),
(30, 30, 'Purple', 1),
(31, 31, 'Purple', 1),
(32, 32, 'Purple', 1),
(33, 33, 'Purple', 0),
(34, 34, 'Purple', 1),
(35, 35, 'Purple', 1),
(36, 36, 'Purple', 1),
(37, 37, 'Purple', 0),
(38, 38, 'Purple', 1),
(39, 39, 'Purple', 1),
(40, 40, 'Purple', 0),
(41, 41, 'Purple', 1),
(42, 42, 'Purple', 1),
(43, 43, 'Purple', 1),
(44, 44, 'Purple', 0),
(45, 45, 'Purple', 0),
(46, 46, 'Purple', 1),
(47, 47, 'Purple', 1),
(48, 48, 'Purple', 1),
(49, 49, 'Purple', 1),
(50, 50, 'Purple', 1),
(51, 51, 'Purple', 0),
(52, 52, 'Purple', 1),
(53, 53, 'Purple', 1),
(54, 54, 'Purple', 1),
(55, 55, 'Purple', 0),
(56, 56, 'Purple', 1),
(57, 57, 'Purple', 1),
(58, 58, 'Purple', 1),
(59, 59, 'Purple', 1),
(60, 60, 'Purple', 1),
(61, 61, 'Hitam', 0),
(62, 62, 'Hitam', 0),
(63, 63, 'Hitam', 0),
(64, 64, 'Hitam', 0),
(65, 65, 'Hitam', 1),
(66, 66, 'Hitam', 0),
(67, 67, 'Hitam', 1),
(68, 68, 'Hitam', 0),
(69, 69, 'Hitam', 1),
(70, 70, 'Hitam', 1),
(71, 71, 'Hitam', 1),
(72, 72, 'Hitam', 1),
(73, 73, 'Hitam', 1),
(74, 74, 'Hitam', 1),
(75, 75, 'Hitam', 1),
(76, 76, 'Hitam', 1),
(77, 77, 'Hitam', 0),
(78, 78, 'Hitam', 1),
(79, 79, 'Hitam', 0),
(80, 80, 'Hitam', 0),
(81, 81, 'Hitam', 1),
(82, 82, 'Hitam', 1),
(83, 83, 'Hitam', 1),
(84, 84, 'Hitam', 1),
(85, 85, 'Hitam', 1),
(86, 86, 'Hitam', 1),
(87, 87, 'Hitam', 1),
(88, 88, 'Hitam', 0),
(89, 89, 'Hitam', 1),
(90, 90, 'Hitam', 1),
(91, 91, 'Hitam', 1),
(92, 92, 'Hitam', 1),
(93, 93, 'Hitam', 0),
(94, 94, 'Hitam', 0),
(95, 95, 'Hitam', 1),
(96, 96, 'Hitam', 1),
(97, 97, 'Hitam', 1),
(98, 98, 'Hitam', 1),
(99, 99, 'Hitam', 0),
(100, 100, 'Hitam', 1),
(101, 101, 'Baby Blue', 1),
(102, 102, 'Baby Blue', 1),
(103, 103, 'Baby Blue', 0),
(104, 104, 'Baby Blue', 1),
(105, 105, 'Baby Blue', 1),
(106, 106, 'Baby Blue', 1),
(107, 107, 'Baby Blue', 1),
(108, 108, 'Baby Blue', 1),
(109, 109, 'Baby Blue', 1),
(110, 110, 'Baby Blue', 1),
(111, 111, 'Baby Blue', 1),
(112, 112, 'Baby Blue', 1),
(113, 113, 'Baby Blue', 1),
(114, 114, 'Baby Blue', 1),
(115, 115, 'Baby Blue', 1),
(116, 116, 'Baby Blue', 1),
(117, 117, 'Baby Blue', 1),
(118, 118, 'Baby Blue', 1),
(119, 119, 'Baby Blue', 1),
(120, 120, 'Baby Blue', 1),
(121, 121, 'Baby Blue', 1),
(122, 122, 'Baby Blue', 1),
(123, 123, 'Baby Blue', 1),
(124, 124, 'Baby Blue', 1),
(125, 125, 'Baby Blue', 1),
(126, 126, 'Baby Blue', 1),
(127, 127, 'Baby Blue', 1),
(128, 128, 'Baby Blue', 1),
(129, 129, 'Baby Blue', 1),
(130, 130, 'Baby Blue', 1),
(131, 131, 'Baby Blue', 1),
(132, 132, 'Baby Blue', 1),
(133, 133, 'Baby Blue', 1),
(134, 134, 'Baby Blue', 0),
(135, 135, 'Baby Blue', 1),
(136, 136, 'Baby Blue', 1),
(137, 137, 'Baby Blue', 0),
(138, 138, 'Baby Blue', 1),
(139, 139, 'Baby Blue', 1),
(140, 140, 'Baby Blue', 1),
(141, 141, 'Baby Blue', 1),
(142, 142, 'Baby Blue', 1),
(143, 143, 'Baby Blue', 1),
(144, 144, 'Baby Blue', 1),
(145, 145, 'Baby Blue', 1),
(146, 146, 'Baby Blue', 1),
(147, 147, 'Baby Blue', 1),
(148, 148, 'Baby Blue', 1),
(149, 149, 'Baby Blue', 1),
(150, 150, 'Baby Blue', 1),
(151, 151, 'Baby Blue', 1),
(152, 152, 'Baby Blue', 0),
(153, 153, 'Baby Blue', 1),
(154, 154, 'Baby Blue', 0),
(155, 155, 'Baby Blue', 1),
(156, 156, 'Baby Blue', 1),
(157, 157, 'Baby Blue', 1),
(158, 158, 'Baby Blue', 1),
(159, 159, 'Baby Blue', 1),
(160, 160, 'Baby Blue', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vest`
--
ALTER TABLE `vest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vest`
--
ALTER TABLE `vest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
