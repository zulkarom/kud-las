-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2023 at 04:10 PM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusatkou_kudalas`
--

-- --------------------------------------------------------

--
-- Table structure for table `vest`
--

CREATE TABLE `vest` (
  `id` int(11) NOT NULL,
  `vest_no` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vest`
--

INSERT INTO `vest` (`id`, `vest_no`, `color`, `status`) VALUES
(1, 1, 'Purple', 1),
(2, 2, 'Purple', 1),
(3, 3, 'Purple', 1),
(4, 4, 'Purple', 1),
(5, 5, 'Purple', 1),
(6, 6, 'Purple', 1),
(7, 7, 'Purple', 1),
(8, 8, 'Purple', 1),
(9, 9, 'Purple', 1),
(10, 10, 'Purple', 1),
(11, 11, 'Purple', 1),
(12, 12, 'Purple', 1),
(13, 13, 'Purple', 1),
(14, 14, 'Purple', 1),
(15, 15, 'Purple', 1),
(16, 16, 'Purple', 1),
(17, 17, 'Purple', 1),
(18, 18, 'Purple', 1),
(19, 19, 'Purple', 1),
(20, 20, 'Purple', 1),
(21, 21, 'Purple', 1),
(22, 22, 'Purple', 1),
(23, 23, 'Purple', 1),
(24, 24, 'Purple', 1),
(25, 25, 'Purple', 1),
(26, 26, 'Purple', 1),
(27, 27, 'Purple', 1),
(28, 28, 'Purple', 1),
(29, 29, 'Purple', 1),
(30, 30, 'Purple', 1),
(31, 31, 'Purple', 1),
(32, 32, 'Purple', 1),
(33, 33, 'Purple', 1),
(34, 34, 'Purple', 1),
(35, 35, 'Purple', 1),
(36, 36, 'Purple', 1),
(37, 37, 'Purple', 1),
(38, 38, 'Purple', 1),
(39, 39, 'Purple', 1),
(40, 40, 'Purple', 1),
(41, 41, 'Purple', 1),
(42, 42, 'Purple', 1),
(43, 43, 'Purple', 1),
(44, 44, 'Purple', 1),
(45, 45, 'Purple', 1),
(46, 46, 'Purple', 1),
(47, 47, 'Purple', 1),
(48, 48, 'Purple', 1),
(49, 49, 'Purple', 1),
(50, 50, 'Purple', 1),
(51, 1, 'Navy Blue', 1),
(52, 2, 'Navy Blue', 1),
(53, 3, 'Navy Blue', 1),
(54, 4, 'Navy Blue', 1),
(55, 5, 'Navy Blue', 1),
(56, 6, 'Navy Blue', 1),
(57, 7, 'Navy Blue', 1),
(58, 8, 'Navy Blue', 1),
(59, 9, 'Navy Blue', 1),
(60, 10, 'Navy Blue', 1),
(61, 11, 'Navy Blue', 1),
(62, 12, 'Navy Blue', 1),
(63, 13, 'Navy Blue', 1),
(64, 14, 'Navy Blue', 1),
(65, 15, 'Navy Blue', 1),
(66, 16, 'Navy Blue', 1),
(67, 17, 'Navy Blue', 1),
(68, 18, 'Navy Blue', 1),
(69, 19, 'Navy Blue', 1),
(70, 20, 'Navy Blue', 1),
(71, 21, 'Navy Blue', 1),
(72, 22, 'Navy Blue', 1),
(73, 23, 'Navy Blue', 1),
(74, 24, 'Navy Blue', 1),
(75, 25, 'Navy Blue', 1),
(76, 26, 'Navy Blue', 1),
(77, 27, 'Navy Blue', 1),
(78, 28, 'Navy Blue', 1),
(79, 29, 'Navy Blue', 1),
(80, 30, 'Navy Blue', 1),
(81, 31, 'Navy Blue', 1),
(82, 32, 'Navy Blue', 1),
(83, 33, 'Navy Blue', 1),
(84, 34, 'Navy Blue', 1),
(85, 35, 'Navy Blue', 1),
(86, 36, 'Navy Blue', 1),
(87, 37, 'Navy Blue', 1),
(88, 38, 'Navy Blue', 1),
(89, 39, 'Navy Blue', 1),
(90, 40, 'Navy Blue', 1),
(91, 41, 'Navy Blue', 1),
(92, 42, 'Navy Blue', 1),
(93, 43, 'Navy Blue', 1),
(94, 44, 'Navy Blue', 1),
(95, 45, 'Navy Blue', 1),
(96, 46, 'Navy Blue', 1),
(97, 47, 'Navy Blue', 1),
(98, 48, 'Navy Blue', 1),
(99, 49, 'Navy Blue', 1),
(100, 50, 'Navy Blue', 1),
(101, 1, 'Cyan', 1),
(102, 2, 'Cyan', 1),
(103, 3, 'Cyan', 1),
(104, 4, 'Cyan', 1),
(105, 5, 'Cyan', 1),
(106, 6, 'Cyan', 1),
(107, 7, 'Cyan', 1),
(108, 8, 'Cyan', 1),
(109, 9, 'Cyan', 1),
(110, 10, 'Cyan', 1),
(111, 11, 'Cyan', 1),
(112, 12, 'Cyan', 1),
(113, 13, 'Cyan', 1),
(114, 14, 'Cyan', 1),
(115, 15, 'Cyan', 1),
(116, 16, 'Cyan', 1),
(117, 17, 'Cyan', 1),
(118, 18, 'Cyan', 1),
(119, 19, 'Cyan', 1),
(120, 20, 'Cyan', 1),
(121, 21, 'Cyan', 1),
(122, 22, 'Cyan', 1),
(123, 23, 'Cyan', 1),
(124, 24, 'Cyan', 1),
(125, 25, 'Cyan', 1),
(126, 26, 'Cyan', 1),
(127, 27, 'Cyan', 1),
(128, 28, 'Cyan', 1),
(129, 29, 'Cyan', 1),
(130, 30, 'Cyan', 1),
(131, 31, 'Cyan', 1),
(132, 32, 'Cyan', 1),
(133, 33, 'Cyan', 1),
(134, 34, 'Cyan', 1),
(135, 35, 'Cyan', 1),
(136, 36, 'Cyan', 1),
(137, 37, 'Cyan', 1),
(138, 38, 'Cyan', 1),
(139, 39, 'Cyan', 1),
(140, 40, 'Cyan', 1),
(141, 41, 'Cyan', 1),
(142, 42, 'Cyan', 1),
(143, 43, 'Cyan', 1),
(144, 44, 'Cyan', 1),
(145, 45, 'Cyan', 1),
(146, 46, 'Cyan', 1),
(147, 47, 'Cyan', 1),
(148, 48, 'Cyan', 1),
(149, 49, 'Cyan', 1),
(150, 50, 'Cyan', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
