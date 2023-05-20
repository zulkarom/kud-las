-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2023 at 07:56 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `is_enabled`) VALUES
(1, 'Amatur 36 KM', 0),
(2, 'National CEN 40KM', 1),
(3, 'Amatur 35KM', 1),
(4, 'VIP/Veteran 20KM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `id` int(11) NOT NULL,
  `kejohanan_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `horse_id` int(11) DEFAULT NULL,
  `rider_address` text,
  `rider_phone` varchar(50) DEFAULT NULL,
  `rider_kelab` varchar(200) DEFAULT NULL,
  `hadlaju` double NOT NULL DEFAULT '0',
  `jarak` double NOT NULL DEFAULT '0',
  `cert_achive` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `register_at` datetime DEFAULT NULL,
  `register_status` int(11) NOT NULL DEFAULT '0',
  `rider_size` varchar(10) DEFAULT NULL,
  `deposit_paid` tinyint(1) NOT NULL DEFAULT '0',
  `vest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`id`, `kejohanan_id`, `category_id`, `rider_id`, `horse_id`, `rider_address`, `rider_phone`, `rider_kelab`, `hadlaju`, `jarak`, `cert_achive`, `status`, `register_at`, `register_status`, `rider_size`, `deposit_paid`, `vest_id`) VALUES
(2, 1, 1, 2, 2, NULL, NULL, NULL, 10.06, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(3, 1, 1, 3, 3, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(5, 1, 1, 5, 5, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(6, 1, 1, 6, 6, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(7, 1, 1, 7, 7, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(8, 1, 1, 8, 8, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(9, 1, 1, 9, 9, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(10, 1, 1, 10, 10, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(12, 1, 1, 12, 12, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(13, 1, 1, 13, 13, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(16, 1, 1, 16, 16, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(19, 1, 1, 19, 19, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(22, 1, 1, 22, 22, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(24, 1, 1, 24, 24, NULL, NULL, NULL, 8.07, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(25, 1, 1, 25, 25, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(27, 1, 1, 27, 27, NULL, NULL, NULL, 0, 36, 0, 10, NULL, 100, NULL, 0, NULL),
(28, 1, 1, 28, 28, NULL, NULL, NULL, 12.84, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(29, 1, 1, 29, 29, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(33, 1, 1, 33, 33, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(37, 1, 1, 37, 37, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(38, 1, 1, 38, 38, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(39, 1, 1, 39, 39, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(40, 1, 1, 40, 40, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(42, 1, 1, 42, 42, NULL, NULL, NULL, 8.11, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(43, 1, 1, 43, 43, NULL, NULL, NULL, 0, 0, 0, 10, '2023-05-01 07:19:37', 100, NULL, 0, NULL),
(45, 1, 1, 45, 45, NULL, NULL, NULL, 0, 36, 0, 10, NULL, 100, NULL, 0, NULL),
(46, 1, 1, 46, 46, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(47, 1, 1, 47, 47, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(48, 1, 1, 48, 48, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(49, 1, 1, 49, 49, NULL, NULL, NULL, 15.23, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(50, 1, 1, 50, 50, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(51, 1, 1, 51, 51, NULL, NULL, NULL, 10.3, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(52, 1, 1, 52, 52, NULL, NULL, NULL, 11.74, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(53, 1, 1, 53, 53, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(54, 1, 1, 54, 54, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(55, 1, 1, 55, 55, NULL, NULL, NULL, 11.13, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(56, 1, 1, 56, 56, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(59, 1, 1, 59, 59, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(60, 1, 1, 60, 60, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(61, 1, 1, 61, 61, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(62, 1, 1, 62, 62, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(63, 1, 1, 63, 63, NULL, NULL, NULL, 14.68, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(64, 1, 1, 64, 64, NULL, NULL, NULL, 0, 36, 0, 10, NULL, 100, NULL, 0, NULL),
(65, 1, 1, 65, 65, NULL, NULL, NULL, 12.85, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(66, 1, 1, 66, 66, NULL, NULL, NULL, 11.43, 36, 1, 10, NULL, 100, NULL, 0, NULL),
(67, 1, 1, 67, 67, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(68, 1, 1, 68, 68, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(69, 1, 1, 69, 69, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(70, 1, 1, 70, 70, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(71, 1, 1, 71, 71, NULL, NULL, NULL, 0, 0, 0, 10, NULL, 100, NULL, 0, NULL),
(77, 2, 2, 76, 45, 'Fakulti Keusahawanan dan Perniagaan\r\nUniversiti Malaysia Kelantan\r\n16100 Kota Bharu\r\nKelantan.', '0136301461', 'Kelab Ekuin UMK', 0, 0, 0, 0, '2023-05-19 07:04:27', 100, 'S', 0, NULL),
(80, 2, 3, 49, 76, '9054 Taman geliga intan 2 ', '0139286117', 'PERSATUAN EKUIN TERENGGANU(MZ STABLE)', 0, 0, 0, 0, '2023-05-14 15:40:50', 100, 'S', 0, NULL),
(82, 2, 3, 78, 49, '78A KAMPUNG BANGGOL \r\nTOK JIRING\r\n21060 KUALA TERENGGANU', '0139286117', 'PERSATUAN EKUIN TERENGGANU(MZ STABLE)', 0, 0, 0, 0, '2023-05-14 15:45:43', 100, 'S', 0, NULL),
(84, 2, 3, 79, 79, 'Kandang Kuda Gong badak Kuala Terengganu', '01161030907', 'PET (Syed Stable )', 0, 0, 0, 0, '2023-05-15 20:38:28', 100, 'XS', 0, NULL),
(85, 2, 3, 80, 80, 'Kandang Kuda Gong Badak Kuala Terengganu', '01161030907', 'PET ( Syed Stable )', 0, 0, 0, 0, '2023-05-16 07:30:33', 100, 'S', 0, NULL),
(86, 2, 3, 81, 84, 'PT 5068 kg Panchor,Kemumin, Pengkalan Chepa\r\nKota Bharu, 16100 kelantan', '0105422884', 'RnR stable', 0, 0, 0, 0, '2023-05-16 16:28:55', 100, 'S', 0, NULL),
(87, 2, 3, 82, 81, '8662 G Kg banggol tok jiring 21060 kuala terengganu', '0139169911', 'HKRC Terengganu', 0, 0, 0, 0, '2023-05-16 16:16:37', 100, 'M', 0, NULL),
(88, 2, 3, 83, 82, '8662 G kg banggol tok jiring 21060 kuala terengganu', '0139169911', 'Persatuan Ekuin Trg', 0, 0, 0, 0, '2023-05-16 16:22:03', 100, 'S', 0, NULL),
(89, 2, 3, 84, 85, '8662 G kg banggol tok jiring 21060 kuala terengganu', '0139169911', 'Persatuan Ekuin Terengganu', 0, 0, 0, 0, '2023-05-16 16:28:24', 100, 'S', 0, NULL),
(93, 2, 3, 86, 87, 'Lot.2563 Kg.Alor Jeringgau\r\n16300 Bachok.\r\nKelantan.', '01152893340', '8682 STABLE', 0, 0, 0, 0, '2023-05-19 21:44:42', 100, 'XXL', 0, NULL),
(95, 2, 2, 88, 88, 'KAMPUNG PERALLA 2,\n17500 TANAH MERAH\nKELANTAN', '0182135358', 'AA GROUP STABLE', 0, 0, 0, 0, '2023-05-18 14:22:01', 100, 'S', 0, NULL),
(96, 2, 3, 89, 90, 'Kg tok jaring ktrg', '0139718798', 'Zaki stable', 0, 0, 0, 0, '2023-05-18 18:28:37', 100, 'S', 0, NULL),
(98, 2, 3, 90, 91, 'No 144,madrasah muhamadiah,kg beta hilir,16450,kota bharu,kelantan', '01159093082', 'Persatuan empayar sunnah berkuda kebangsaan(PESBUK)', 0, 0, 0, 0, '2023-05-19 00:14:34', 100, 'L', 0, NULL),
(100, 2, 2, 91, 92, 'Lot 529, Kg Gong Gajah, Kemudi, 16300 Bachok, Kelantan', '0139233887', 'Kemudi Stud Farm', 0, 0, 0, 0, '2023-05-20 14:48:57', 100, 'XL', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(5) NOT NULL,
  `country_code` char(2) NOT NULL DEFAULT '',
  `country_name` varchar(45) NOT NULL DEFAULT '',
  `currency_code` char(3) DEFAULT NULL,
  `country_order` int(11) NOT NULL DEFAULT '100'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_code`, `country_name`, `currency_code`, `country_order`) VALUES
(1, 'AD', 'Andorra', 'EUR', 100),
(2, 'AE', 'United Arab Emirates', 'AED', 100),
(3, 'AF', 'Afghanistan', 'AFN', 100),
(4, 'AG', 'Antigua and Barbuda', 'XCD', 100),
(5, 'AI', 'Anguilla', 'XCD', 100),
(6, 'AL', 'Albania', 'ALL', 100),
(7, 'AM', 'Armenia', 'AMD', 100),
(8, 'AO', 'Angola', 'AOA', 100),
(9, 'AQ', 'Antarctica', '', 100),
(10, 'AR', 'Argentina', 'ARS', 7),
(11, 'AS', 'American Samoa', 'USD', 100),
(12, 'AT', 'Austria', 'EUR', 100),
(13, 'AU', 'Australia', 'AUD', 5),
(14, 'AW', 'Aruba', 'AWG', 100),
(15, 'AX', 'Åland', 'EUR', 100),
(16, 'AZ', 'Azerbaijan', 'AZN', 100),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM', 100),
(18, 'BB', 'Barbados', 'BBD', 100),
(19, 'BD', 'Bangladesh', 'BDT', 100),
(20, 'BE', 'Belgium', 'EUR', 100),
(21, 'BF', 'Burkina Faso', 'XOF', 100),
(22, 'BG', 'Bulgaria', 'BGN', 100),
(23, 'BH', 'Bahrain', 'BHD', 100),
(24, 'BI', 'Burundi', 'BIF', 100),
(25, 'BJ', 'Benin', 'XOF', 100),
(26, 'BL', 'Saint Barthélemy', 'EUR', 100),
(27, 'BM', 'Bermuda', 'BMD', 100),
(28, 'BN', 'Brunei', 'BND', 3),
(29, 'BO', 'Bolivia', 'BOB', 100),
(30, 'BQ', 'Bonaire', 'USD', 100),
(31, 'BR', 'Brazil', 'BRL', 100),
(32, 'BS', 'Bahamas', 'BSD', 100),
(33, 'BT', 'Bhutan', 'BTN', 100),
(34, 'BV', 'Bouvet Island', 'NOK', 100),
(35, 'BW', 'Botswana', 'BWP', 100),
(36, 'BY', 'Belarus', 'BYR', 100),
(37, 'BZ', 'Belize', 'BZD', 100),
(38, 'CA', 'Canada', 'CAD', 100),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD', 100),
(40, 'CD', 'Democratic Republic of the Congo', 'CDF', 100),
(41, 'CF', 'Central African Republic', 'XAF', 100),
(42, 'CG', 'Republic of the Congo', 'XAF', 100),
(43, 'CH', 'Switzerland', 'CHF', 100),
(44, 'CI', 'Ivory Coast', 'XOF', 100),
(45, 'CK', 'Cook Islands', 'NZD', 100),
(46, 'CL', 'Chile', 'CLP', 100),
(47, 'CM', 'Cameroon', 'XAF', 100),
(48, 'CN', 'China', 'CNY', 100),
(49, 'CO', 'Colombia', 'COP', 100),
(50, 'CR', 'Costa Rica', 'CRC', 100),
(51, 'CU', 'Cuba', 'CUP', 100),
(52, 'CV', 'Cape Verde', 'CVE', 100),
(53, 'CW', 'Curacao', 'ANG', 100),
(54, 'CX', 'Christmas Island', 'AUD', 100),
(55, 'CY', 'Cyprus', 'EUR', 100),
(56, 'CZ', 'Czech Republic', 'CZK', 100),
(57, 'DE', 'Germany', 'EUR', 100),
(58, 'DJ', 'Djibouti', 'DJF', 100),
(59, 'DK', 'Denmark', 'DKK', 100),
(60, 'DM', 'Dominica', 'XCD', 100),
(61, 'DO', 'Dominican Republic', 'DOP', 100),
(62, 'DZ', 'Algeria', 'DZD', 100),
(63, 'EC', 'Ecuador', 'USD', 100),
(64, 'EE', 'Estonia', 'EUR', 100),
(65, 'EG', 'Egypt', 'EGP', 100),
(66, 'EH', 'Western Sahara', 'MAD', 100),
(67, 'ER', 'Eritrea', 'ERN', 100),
(68, 'ES', 'Spain', 'EUR', 100),
(69, 'ET', 'Ethiopia', 'ETB', 100),
(70, 'FI', 'Finland', 'EUR', 100),
(71, 'FJ', 'Fiji', 'FJD', 100),
(72, 'FK', 'Falkland Islands', 'FKP', 100),
(73, 'FM', 'Micronesia', 'USD', 100),
(74, 'FO', 'Faroe Islands', 'DKK', 100),
(75, 'FR', 'France', 'EUR', 100),
(76, 'GA', 'Gabon', 'XAF', 100),
(77, 'GB', 'United Kingdom', 'GBP', 100),
(78, 'GD', 'Grenada', 'XCD', 100),
(79, 'GE', 'Georgia', 'GEL', 100),
(80, 'GF', 'French Guiana', 'EUR', 100),
(81, 'GG', 'Guernsey', 'GBP', 100),
(82, 'GH', 'Ghana', 'GHS', 100),
(83, 'GI', 'Gibraltar', 'GIP', 100),
(84, 'GL', 'Greenland', 'DKK', 100),
(85, 'GM', 'Gambia', 'GMD', 100),
(86, 'GN', 'Guinea', 'GNF', 100),
(87, 'GP', 'Guadeloupe', 'EUR', 100),
(88, 'GQ', 'Equatorial Guinea', 'XAF', 100),
(89, 'GR', 'Greece', 'EUR', 100),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP', 100),
(91, 'GT', 'Guatemala', 'GTQ', 100),
(92, 'GU', 'Guam', 'USD', 100),
(93, 'GW', 'Guinea-Bissau', 'XOF', 100),
(94, 'GY', 'Guyana', 'GYD', 100),
(95, 'HK', 'Hong Kong', 'HKD', 100),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD', 100),
(97, 'HN', 'Honduras', 'HNL', 100),
(98, 'HR', 'Croatia', 'HRK', 100),
(99, 'HT', 'Haiti', 'HTG', 100),
(100, 'HU', 'Hungary', 'HUF', 100),
(101, 'ID', 'Indonesia', 'IDR', 4),
(102, 'IE', 'Ireland', 'EUR', 100),
(103, 'IL', 'Israel', 'ILS', 100),
(104, 'IM', 'Isle of Man', 'GBP', 100),
(105, 'IN', 'India', 'INR', 100),
(106, 'IO', 'British Indian Ocean Territory', 'USD', 100),
(107, 'IQ', 'Iraq', 'IQD', 100),
(108, 'IR', 'Iran', 'IRR', 100),
(109, 'IS', 'Iceland', 'ISK', 100),
(110, 'IT', 'Italy', 'EUR', 100),
(111, 'JE', 'Jersey', 'GBP', 100),
(112, 'JM', 'Jamaica', 'JMD', 100),
(113, 'JO', 'Jordan', 'JOD', 100),
(114, 'JP', 'Japan', 'JPY', 100),
(115, 'KE', 'Kenya', 'KES', 100),
(116, 'KG', 'Kyrgyzstan', 'KGS', 100),
(117, 'KH', 'Cambodia', 'KHR', 100),
(118, 'KI', 'Kiribati', 'AUD', 100),
(119, 'KM', 'Comoros', 'KMF', 100),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD', 100),
(121, 'KP', 'North Korea', 'KPW', 100),
(122, 'KR', 'South Korea', 'KRW', 100),
(123, 'KW', 'Kuwait', 'KWD', 100),
(124, 'KY', 'Cayman Islands', 'KYD', 100),
(125, 'KZ', 'Kazakhstan', 'KZT', 100),
(126, 'LA', 'Laos', 'LAK', 100),
(127, 'LB', 'Lebanon', 'LBP', 100),
(128, 'LC', 'Saint Lucia', 'XCD', 100),
(129, 'LI', 'Liechtenstein', 'CHF', 100),
(130, 'LK', 'Sri Lanka', 'LKR', 100),
(131, 'LR', 'Liberia', 'LRD', 100),
(132, 'LS', 'Lesotho', 'LSL', 100),
(133, 'LT', 'Lithuania', 'LTL', 100),
(134, 'LU', 'Luxembourg', 'EUR', 100),
(135, 'LV', 'Latvia', 'EUR', 100),
(136, 'LY', 'Libya', 'LYD', 100),
(137, 'MA', 'Morocco', 'MAD', 100),
(138, 'MC', 'Monaco', 'EUR', 100),
(139, 'MD', 'Moldova', 'MDL', 100),
(140, 'ME', 'Montenegro', 'EUR', 100),
(141, 'MF', 'Saint Martin', 'EUR', 100),
(142, 'MG', 'Madagascar', 'MGA', 100),
(143, 'MH', 'Marshall Islands', 'USD', 100),
(144, 'MK', 'Macedonia', 'MKD', 100),
(145, 'ML', 'Mali', 'XOF', 100),
(146, 'MM', 'Myanmar', 'MMK', 10),
(147, 'MN', 'Mongolia', 'MNT', 100),
(148, 'MO', 'Macao', 'MOP', 100),
(149, 'MP', 'Northern Mariana Islands', 'USD', 100),
(150, 'MQ', 'Martinique', 'EUR', 100),
(151, 'MR', 'Mauritania', 'MRO', 100),
(152, 'MS', 'Montserrat', 'XCD', 100),
(153, 'MT', 'Malta', 'EUR', 100),
(154, 'MU', 'Mauritius', 'MUR', 100),
(155, 'MV', 'Maldives', 'MVR', 100),
(156, 'MW', 'Malawi', 'MWK', 100),
(157, 'MX', 'Mexico', 'MXN', 100),
(158, 'MY', 'Malaysia', 'MYR', 1),
(159, 'MZ', 'Mozambique', 'MZN', 100),
(160, 'NA', 'Namibia', 'NAD', 100),
(161, 'NC', 'New Caledonia', 'XPF', 100),
(162, 'NE', 'Niger', 'XOF', 100),
(163, 'NF', 'Norfolk Island', 'AUD', 100),
(164, 'NG', 'Nigeria', 'NGN', 100),
(165, 'NI', 'Nicaragua', 'NIO', 100),
(166, 'NL', 'Netherlands', 'EUR', 100),
(167, 'NO', 'Norway', 'NOK', 100),
(168, 'NP', 'Nepal', 'NPR', 100),
(169, 'NR', 'Nauru', 'AUD', 100),
(170, 'NU', 'Niue', 'NZD', 100),
(171, 'NZ', 'New Zealand', 'NZD', 100),
(172, 'OM', 'Oman', 'OMR', 100),
(173, 'PA', 'Panama', 'PAB', 100),
(174, 'PE', 'Peru', 'PEN', 100),
(175, 'PF', 'French Polynesia', 'XPF', 100),
(176, 'PG', 'Papua New Guinea', 'PGK', 100),
(177, 'PH', 'Philippines', 'PHP', 9),
(178, 'PK', 'Pakistan', 'PKR', 100),
(179, 'PL', 'Poland', 'PLN', 100),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR', 100),
(181, 'PN', 'Pitcairn Islands', 'NZD', 100),
(182, 'PR', 'Puerto Rico', 'USD', 100),
(183, 'PS', 'Palestine', 'ILS', 100),
(184, 'PT', 'Portugal', 'EUR', 100),
(185, 'PW', 'Palau', 'USD', 100),
(186, 'PY', 'Paraguay', 'PYG', 100),
(187, 'QA', 'Qatar', 'QAR', 100),
(188, 'RE', 'Réunion', 'EUR', 100),
(189, 'RO', 'Romania', 'RON', 100),
(190, 'RS', 'Serbia', 'RSD', 100),
(191, 'RU', 'Russia', 'RUB', 100),
(192, 'RW', 'Rwanda', 'RWF', 100),
(193, 'SA', 'Saudi Arabia', 'SAR', 100),
(194, 'SB', 'Solomon Islands', 'SBD', 100),
(195, 'SC', 'Seychelles', 'SCR', 100),
(196, 'SD', 'Sudan', 'SDG', 100),
(197, 'SE', 'Sweden', 'SEK', 100),
(198, 'SG', 'Singapore', 'SGD', 8),
(199, 'SH', 'Saint Helena', 'SHP', 100),
(200, 'SI', 'Slovenia', 'EUR', 100),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK', 100),
(202, 'SK', 'Slovakia', 'EUR', 100),
(203, 'SL', 'Sierra Leone', 'SLL', 100),
(204, 'SM', 'San Marino', 'EUR', 100),
(205, 'SN', 'Senegal', 'XOF', 100),
(206, 'SO', 'Somalia', 'SOS', 100),
(207, 'SR', 'Suriname', 'SRD', 100),
(208, 'SS', 'South Sudan', 'SSP', 100),
(209, 'ST', 'São Tomé and Príncipe', 'STD', 100),
(210, 'SV', 'El Salvador', 'USD', 100),
(211, 'SX', 'Sint Maarten', 'ANG', 100),
(212, 'SY', 'Syria', 'SYP', 100),
(213, 'SZ', 'Swaziland', 'SZL', 100),
(214, 'TC', 'Turks and Caicos Islands', 'USD', 100),
(215, 'TD', 'Chad', 'XAF', 100),
(216, 'TF', 'French Southern Territories', 'EUR', 100),
(217, 'TG', 'Togo', 'XOF', 100),
(218, 'TH', 'Thailand', 'THB', 2),
(219, 'TJ', 'Tajikistan', 'TJS', 100),
(220, 'TK', 'Tokelau', 'NZD', 100),
(221, 'TL', 'East Timor', 'USD', 100),
(222, 'TM', 'Turkmenistan', 'TMT', 100),
(223, 'TN', 'Tunisia', 'TND', 100),
(224, 'TO', 'Tonga', 'TOP', 100),
(225, 'TR', 'Turkey', 'TRY', 100),
(226, 'TT', 'Trinidad and Tobago', 'TTD', 100),
(227, 'TV', 'Tuvalu', 'AUD', 100),
(228, 'TW', 'Taiwan', 'TWD', 100),
(229, 'TZ', 'Tanzania', 'TZS', 100),
(230, 'UA', 'Ukraine', 'UAH', 100),
(231, 'UG', 'Uganda', 'UGX', 100),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD', 100),
(233, 'US', 'United States', 'USD', 100),
(234, 'UY', 'Uruguay', 'UYU', 100),
(235, 'UZ', 'Uzbekistan', 'UZS', 100),
(236, 'VA', 'Vatican City', 'EUR', 100),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD', 100),
(238, 'VE', 'Venezuela', 'VEF', 100),
(239, 'VG', 'British Virgin Islands', 'USD', 100),
(240, 'VI', 'U.S. Virgin Islands', 'USD', 100),
(241, 'VN', 'Vietnam', 'VND', 6),
(242, 'VU', 'Vanuatu', 'VUV', 100),
(243, 'WF', 'Wallis and Futuna', 'XPF', 100),
(244, 'WS', 'Samoa', 'WST', 100),
(245, 'XK', 'Kosovo', 'EUR', 100),
(246, 'YE', 'Yemen', 'YER', 100),
(247, 'YT', 'Mayotte', 'EUR', 100),
(248, 'ZA', 'South Africa', 'ZAR', 100),
(249, 'ZM', 'Zambia', 'ZMW', 100),
(250, 'ZW', 'Zimbabwe', 'ZWL', 100);

-- --------------------------------------------------------

--
-- Table structure for table `horse`
--

CREATE TABLE `horse` (
  `id` int(11) NOT NULL,
  `eam_id` varchar(255) DEFAULT NULL,
  `horse_code` varchar(255) DEFAULT NULL,
  `horse_name` varchar(200) DEFAULT NULL,
  `horse_dob` date DEFAULT NULL,
  `horse_color` varchar(200) DEFAULT NULL,
  `horse_gender` tinyint(2) DEFAULT NULL,
  `country_born` varchar(200) DEFAULT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `horse`
--

INSERT INTO `horse` (`id`, `eam_id`, `horse_code`, `horse_name`, `horse_dob`, `horse_color`, `horse_gender`, `country_born`, `is_confirmed`) VALUES
(2, NULL, 'J02', 'JABADIL', '2016-02-13', 'hitam', 1, 'MY', 1),
(3, NULL, 'M03', 'Murtaji', '2015-06-14', 'Chesnut Gelap', 2, NULL, 1),
(5, NULL, 'K05', 'KERIS', '2018-01-01', 'CHESTNUT', 2, NULL, 1),
(6, NULL, 'M06', 'MISS ALLYYA', '2017-02-01', 'CHESTNUT', 2, 'TH', 1),
(7, NULL, 'P07', 'PRINCESS BETTY', '2016-09-01', 'POLOMINO', 2, 'MY', 1),
(8, NULL, 'L08', 'LUNA MAYA', '2017-01-01', 'PINTO', 2, NULL, 1),
(9, NULL, 'L09', 'LOLA', '2017-03-24', 'Chestnut', 2, 'MY', 1),
(10, NULL, 'R10', 'Rizki Tiger Boss', '2015-01-09', 'Bay', 3, 'AU', 1),
(12, NULL, 'H12', 'HANA', '2014-10-01', 'Chestnut', 2, 'MY', 1),
(13, NULL, 'H13', 'HANG TUAH', '2018-01-01', 'BAY', 1, 'MY', 1),
(16, NULL, 'S16', 'SPIRIT', '2017-11-10', 'BAY', 1, NULL, 1),
(19, NULL, 'T19', 'Tiara', '2017-04-13', 'Bay', 2, 'MY', 1),
(22, NULL, 'M22', 'MELISA', '2015-10-10', 'Palomino', 2, NULL, 1),
(24, NULL, 'S24', 'SUZZY', '2016-06-26', 'CHESTNUT', 2, 'MY', 1),
(25, NULL, 'B25', 'BB (AROBIYAH)', '2012-04-17', 'Koko', 2, 'MY', 1),
(27, NULL, 'S27', 'SYIKIN', '2013-08-31', 'BAY', 2, 'MY', 1),
(28, NULL, 'B28', 'BETTY', '2016-01-01', 'Bay', 2, 'MY', 1),
(29, NULL, 'N29', 'NIFTY', '1994-01-01', 'BAY', 3, NULL, 1),
(33, NULL, 'M33', 'MAR MUSTANG', '2018-02-02', 'GREY', 3, 'MY', 1),
(37, NULL, 'B37', 'BOBOY', '2016-03-16', 'OREN', 1, 'MY', 1),
(38, NULL, 'B38', 'BARIQ AR-RUMI', '2015-01-20', 'GREY', 2, 'MY', 1),
(39, NULL, 'I39', 'ISABELLA ALBAYAD', '2016-02-29', 'Grey', 2, 'MY', 1),
(40, NULL, 'A40', 'ALI BOIKA', '2016-01-01', 'CHESTNUT', 1, 'MY', 1),
(42, NULL, 'O42', 'OMA', '2018-01-01', 'GREY', 3, 'MY', 1),
(43, NULL, 'K43', 'KHABIB PETRA', '2016-02-16', 'Bay', 3, NULL, 1),
(45, 'TIADA', 'B45', 'BLACK PUTRA', '2018-01-01', 'HITAM', 1, 'MY', 1),
(46, NULL, 'L46', 'Lyrica khizae', '2015-02-28', 'Chesnut', 3, 'SG', 1),
(47, NULL, 'F47', 'FILICKA', '2016-02-20', 'PINTO', 2, 'MY', 1),
(48, NULL, 'R48', 'REID RIVER AKWAYSHINE', '2012-09-14', 'grey', 2, 'AU', 1),
(49, 'EAM/HR/G.083', 'G49', 'GIANT', '2015-09-09', 'Backskin', 3, 'AR', 1),
(50, NULL, 'F50', 'FIONA', '2017-08-16', 'black', 2, 'MY', 1),
(51, NULL, 'C51', 'CALISTA AL SAGOF', '2015-05-24', 'Putih ', 2, 'TH', 1),
(52, NULL, 'J52', 'JULIA', '2013-01-01', 'Bay', 2, 'MY', 1),
(53, NULL, 'K53', 'KIKI ADYAT', '2013-01-01', 'CHESTNUT', 2, 'MY', 1),
(54, NULL, 'M54', 'MAYA', '2014-07-07', 'Grey', 2, 'MY', 1),
(55, NULL, 'E55', 'ESTRELLA', '2015-01-01', 'PINTO', 2, NULL, 1),
(56, NULL, 'L56', 'Lady Gashina', '2013-01-01', 'PINTO', 2, NULL, 1),
(59, NULL, 'S59', 'SHEVAL', '2018-01-01', 'HITAM', 1, NULL, 1),
(60, NULL, 'L60', 'LELA AMANDA', '2018-05-10', 'Dapple grey', 2, 'MY', 1),
(61, NULL, 'A61', 'ALIA', '2019-02-20', 'Tapong', 2, 'MY', 1),
(62, NULL, 'H62', 'HALIMAS JABADI', '2013-01-01', 'GREY', 1, 'AU', 1),
(63, NULL, 'R63', 'RTES SABAHA', NULL, 'BAY', 2, NULL, 1),
(64, NULL, 'V64', 'VV COCO', NULL, 'GRAY', 3, NULL, 1),
(65, NULL, 'V65', 'VICO', '2017-02-16', 'TAPUNG', 1, NULL, 1),
(66, NULL, 'S66', 'SABILI', '2019-02-19', 'ALBINO', 1, NULL, 1),
(67, NULL, 'A67', 'AS SAKAF', '2019-02-20', 'TAPUNG', 1, NULL, 1),
(68, NULL, 'K68', 'KAKAK', '2017-04-19', 'TAPUNG', 2, NULL, 1),
(69, NULL, 'L69', 'LIZAZ', '2018-05-28', 'BUCKSKIN', 1, NULL, 1),
(70, NULL, 'A70', 'AL LEZAZ ', '2017-04-23', 'BAY', 1, NULL, 1),
(71, NULL, 'P71', 'PUTRI', '2016-02-02', 'CHESTNUT', 2, 'MY', 1),
(76, 'EAM/HR/M.189', 'M76', 'MZ LILY', '2016-12-25', 'BAY', 2, 'MY', 0),
(77, NULL, 'D77', 'DALI\'', '2014-09-06', 'Chesnut', 2, 'TH', 0),
(78, NULL, 'P78', 'PUTEH', '1999-01-01', 'Puteh', 2, 'MY', 0),
(79, NULL, 'P79', 'PUTEH', '1999-01-01', 'Puteh', 2, 'MY', 0),
(80, NULL, 'D80', 'DAZZY', '2020-01-01', 'Pinto', 2, 'MY', 0),
(81, NULL, 'A81', 'AL-HAMBRA', '2015-07-11', 'Chesnut', 2, 'MY', 0),
(82, NULL, 'M82', 'MEX QUIN', '2015-02-20', 'Chesnut', 2, 'MY', 0),
(83, NULL, 'L83', 'LATTE', '2017-01-01', 'Putih bersepuh hitam', 2, '', 0),
(84, NULL, 'L84', 'LATTE', '2017-01-01', 'Putih bersepuh hitam', 2, 'MY', 0),
(85, NULL, 'M85', 'MOROCCO', '2017-02-17', 'Bay', 3, 'MY', 0),
(86, NULL, 'T86', 'TOMATO', '2017-01-29', 'Skewbalb', 1, 'MY', 0),
(87, NULL, 'T87', 'TOMATO', '2017-01-29', 'Skewbalb', 1, 'MY', 0),
(88, NULL, 'M88', 'MALIKA', '2017-09-09', 'PINTO', 2, 'MY', 0),
(89, NULL, 'M89', 'MEMBER J', '2019-05-18', 'Bay', 3, 'MY', 0),
(90, NULL, 'M90', 'MEMBER J', '2019-05-18', 'Bay', 3, 'MY', 0),
(91, NULL, 'D91', 'DALI\'', '2015-05-19', 'Quaterhorse', 2, 'MY', 0),
(92, NULL, 'J92', 'JANE', '2015-01-22', 'Kelabu/Putih', 2, 'MY', 0);

-- --------------------------------------------------------

--
-- Table structure for table `horse_gender`
--

CREATE TABLE `horse_gender` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `horse_gender`
--

INSERT INTO `horse_gender` (`id`, `gender_name`, `description`) VALUES
(1, 'Stallion', 'Jantan'),
(2, 'Mare', 'Betina'),
(3, 'Gelding', 'Kasi');

-- --------------------------------------------------------

--
-- Table structure for table `kejohanan`
--

CREATE TABLE `kejohanan` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kejohanan`
--

INSERT INTO `kejohanan` (`id`, `name`, `date_start`, `date_end`, `location`, `is_active`) VALUES
(1, 'KEJOHANAN KUDA LASAK UMK/K4 PIALA NAIB CANSELOR 2022', '2022-03-25', '2022-03-26', 'PANTAI SERI NIPAH RESORT BACHOK, KELANTAN', 0),
(2, 'KEJOHANAN KUDA LASAK - UMK NC CUP 2023', '2023-06-09', '2023-06-10', 'Pantai Seri Nipah Resort, Bachok, Kelantan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1648121990),
('m130524_201442_init', 1648121999),
('m190124_110200_add_verification_token_column_to_user_table', 1648121999);

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `id` int(11) NOT NULL,
  `rider_name` varchar(200) DEFAULT NULL,
  `nric` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `kelab` varchar(200) DEFAULT NULL,
  `is_confirmed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`id`, `rider_name`, `nric`, `email`, `address`, `phone`, `kelab`, `is_confirmed`) VALUES
(2, 'AIMAN HAKIM BIN MOHD ROSLI', '050922030341', 'drrosli@yahoo.com', 'lot 3081-ky Chabang Tiga Melawi,bachok, Kelantan', '0139277701', 'Melawi Stable', 1),
(3, 'MUHAMMAD BIN MOHD AFANDI', '000621030801', 'Nurmuhammad99.n9@gmail.com', 'Lot 2865 kampung kemubu 16450 ketereh kelantan', '01125466369', 'PESBUK', 1),
(5, 'RUDY SYAHMIN BIN MAZLAN', '820919035799', 'rudysyah@yahoo.com', 'KAMPUNG LEMBAH SEMERAK, PASIR PUTEH', '01137507408', 'RS EQUIN', 1),
(6, 'FARIS NASRULLAH BIN RUDY SYAHMIN', '080228030373', 'rudysyah@yahoo.com', 'KAMPUNG LEMBAH SEMERAK, PASIR PUTEH', '01137507408', 'RS EQUIN', 1),
(7, 'FARID NASRUDIN BIN RUDY SYAHMIN', '090928031093', 'rudysyah@yahoo.com', 'KAMPUNG LEMBAH SEMERAK, PASIR PUTEH', '01137507408', 'RS EQUIN', 1),
(8, 'ZAINUDDIN YUSOF', NULL, 'rudysyah@yahoo.com', 'KAMPUNG LEMBAH SEMERAK, PASIR PUTEH', '01137507408', 'RS EQUIN', 1),
(9, 'MUHAMMAD \'AIZAT SOLIHIN BIN CHE AZHA', '020324030651', 'aizatsolihin24@gmail.com ', 'Lot 837 C Bt 7 1/4 Jalan Sabak,Pengkalan Chepa,16100 Kota Bharu,Kelantan', '01125439349', 'NAJWA STABLE & FARM', 1),
(10, 'AHMAD FAIZ BIN YUSOF', '900509036385', 'Ahmadfaiz90', '129 Kg Gunung 16090 Bachok Kelantan', '0133663173', 'KETC ', 1),
(12, 'MUHAMMAD HAZIQ AZAHARI BIN MOHD ARMAN', '090528070579', 'kudakudi4@gmail.com', 'PT 625 Kampung Banggol Lepah, 16450 Ketereh', '0199564358', 'PESBUK', 1),
(13, 'MOHD SALMAN BIN MOHD KAMEL', '870922035285', '', 'KG TITIAN LUNAS, MELAWI, BACHOK, KELANTAN', '0137636652', 'SL STABLE INTERNATIONAL CHAMP', 1),
(16, 'MOHD AQIL FARIS BIN IBRAHIM', '110830030979', '', 'KAMPUNG TITIAN LUNAS, MELAWI, BACHOK, KELANTAN', '0195001448', 'SL STABLE INTERNATIONAL CHAMP', 1),
(19, 'MUHD SUPIAN BIN AWANG', '890709035065', '', 'Lot1317,kg Rengas Badak,Jalan Changgong,Bachok,kelantan', '01129476857', 'SUNGAI 2 STABLE', 1),
(22, 'MOHD QAYYIM NIZAR BIN SARIMI', '980907035399', 'Mohdqayyim123@gmail.com', 'Lot 188 kampung talang kadok 16450 kota bharu kelantan', '0186634591', 'Pesbuk', 1),
(24, 'SITI NUR FATIHAH BINTI MOHD ARMAN', '020308070194', '', 'No23,kampung pachakan,22300 kuala besut,terengganu darul iman', '0199564358', 'PESBUK', 1),
(25, 'MUHAMMAD UTHMAN BIN MOHD KAMIL', '021002031111', 'zulhafiyrakiah@gmail.com', 'PT272 LORONG PAKAT 2 JALAN PASIR MAS SALOR', '0113685759', 'ASHABUL RADEN FATTAH STABLE', 1),
(27, 'MOHD FAIZAL BIN JUSOH', '860126035293', '', 'CHABANG EMPAT REPEK JALAN KUBUR MUNDU 16300 BACHOK KELANTAN ', '0179444246', 'BADAK STABLE', 1),
(28, 'NUR HAFY YUMNI BT MOHD HAFIFZI', '080725030366', '', 'LOT 11827 KG.CHAWAS,17500 TANAH MERAH,KEL', '01171744604', 'PCM STABLE', 1),
(29, 'AHMAD TAQIYUDDIN BIN MOHD SALEH', '910925035209', 'mshahrul03@hotmail.com', 'LOT 1291 KAMPUNG BERIS TENGAH NERIS KUBUR BESAR 16050 BACHOK KELANTAN', '0132732782', 'CWT HORSE STABLE , LOT 1291 KAMPUNG BERIS TENGAH NERIS KUBUR BESAR 16050 BACHOK KELANTAN', 1),
(33, 'JAZMI BIN HASSAN', '660101035813', 'jazmihassan6666@gmail.com', 'LOT 2482, TMN. HJH. UMI KALTHOM, 16450 KOTA BHARU, KELANTAN.', '0109162181', 'JAZ STABLE', 1),
(37, 'NOR FAIQDANISH BIN NOR SHAFRI', '071018030979', '', 'DBUSTAN STABLE, KETEREH', '0169232044', 'DBUSTAN STABLE, KETEREH', 1),
(38, 'NURUL FATIMAH AZZAHRA MOHD KASMALI', '011111110098', 'Kasmali5975@gmail.com', 'NO.823 BATU 7 1/2 BUKIT PAYONG 21400 MARANG TERENGGANU.', '0199846466', 'PERSATUAN EKUIN TERENGGANU', 1),
(39, 'MOHD KASMALI BIN GHANI', '750115065975', 'Kasmali5975@gmail.com', 'NO.823 BATU 7 1/2 KG. BUKIT PAYONG ,21400 MARANG TERENGGANU.', '0199846466', 'PERSATUAN EKUIN TERENGGANU', 1),
(40, 'AHMAD SYAKIR IRFAN BIN SYARIEFIE', '060303030819', '', 'DBUSTAN STABLE, KETEREH', '0139000231', 'DBUSTAN STABLE, KETEREH', 1),
(42, 'MYSARAH BINTI URSILAN AFANDI', '000927101342', '', 'DBUSTAN STABLE, KETEREH', '0139000231', 'D\'BUSTAN STABLE', 1),
(43, 'WAN ZAL AIDI AWWAB BIN WAN AHMAD TARMIZI ', '020222030255', 'zalaidi22@icloud.com', 'DBustan Stable, Ketereh', '0137204479', 'D\'Bustan Stable, Ketereh', 1),
(45, 'W MS NORZIHAN', '690118030000', 'mnazri@umk.edu.my', 'BUKIT AJIL STABLE', '0136301461', 'BUKIT AJIL STABLE', 1),
(46, 'Milia Haamiyah Mohamed ', '850228115308', 'Mdmihsan@gmail.com ', 'Lot 10299 kg wakaf tengah 21030 Kuala Terengganu ', '0139807015', 'PERSATUAN EKUIN TERENGGANU', 1),
(47, 'NOOR NERINA ERNIE BINTI HASIM', '950220115520', 'Noornerina@gmail.com', '8662 G Kg Banggol ToK Jiring', '0139169911', 'PERSATUAN EKUIN TERENGGANU', 1),
(48, 'MUHAMMAD IRFAN ISKANDAR BIN MOHD ZAKI', '010708110037', 'Noornerina@gmail.com', '8662 G Kg banggol tok jiring', '0139169911', 'PERSATUAN EKUIN TERENGGANU', 1),
(49, 'NURIN AMANIE BADRINA BT MOHD TARMIZI', '111225110086', 'mztarmizi86@gmail.com', '9054 Taman geliga intan 2 ', '0139286117', 'PERSATUAN EKUIN TERENGGANU(MZ STABLE)', 1),
(50, 'MUHAMMAD AIFAN DANIAL BIN SUNKIPLI', '060513110171', 'noornerina@gmail.com', '8662 G Kg banggol tok jiring', '0139169911', 'PERSATUAN EKUIN TERENGGANU', 1),
(51, 'TUAN SHARIFAH AMIRAH BINTI SYED ROSLAN', '940524115416', '', 'Lot 28906 A tingkat bawah taman Sri gelang jalan Gong Badak 21300 ', '0148287425', 'PERSATUAN EKUIN TERENGGANU', 1),
(52, 'MOHAMMMAD ZULHILMI HAZIQ BIN ZAINAL ABIDIN', '060209010141', 'Zulhilmiabey06@gmail.com', '12313', '01133510032', 'PERSATUAN EKUIN TERENGGANU', 1),
(53, 'MUHAMMAD AZEEM BIN SAIFUL BAHRI', '790308035517', 'ahmadmarwan9103@gmail.com ', 'Pt 4472 Tmn Wadi Iman Kok Lanas 16450 Kelantan', '0199494736', 'UMW Stable ', 1),
(54, 'SHAHRUL HANAFI BIN KHAIRUL ANUAR', '020811110229', '', 'LOT 822 C MENGABANG TENGAH 20400 KUALA TERENGGANU', '0168167071', 'PERSATUAN EKUIN TERENGGANU', 1),
(55, 'M. SHAZMIN BIN SYAMSUAR ', '010525110229', 'shazminrembo@icloud.com', '1524 B JALAM IBRAHNIM BUKIT BESOR 21100 KUALA TERENAGGANU TERENGGANU ', '0199298816', 'PERSATUAN EKUIN TERENGGANU', 1),
(56, 'MOHD FARIS SYAFIQ MOHD BIN HASSAN SA\'ARI', '941125115261', '', '1613 JALAN PANJI ALAM 21100 KUALA TERENGGANU, TERENGGANU', '0127046459', 'PERSATUAN EKUIN TERENGGANU', 1),
(59, 'MOHAMAD AMIR BIN SUHAIMI', '960112035581', '', 'KPG PDG PAK UMAR, SELISING, PASIR PUTEH', '0148004252', 'VILLA DANIALLA STABLE, MELAWI', 1),
(60, 'MUHAMMAD KHAIRUL IRFAN BIN MOHD TARMIZI', '070125030873', '', 'Lot 408 kampung teluk kitang,jalan sabak,16100 kota bharu', '0172698344', 'Najwa Stable & Farm', 1),
(61, 'AHMAD MUIZZ HAKIM BIN CHE JAAFFAR', '080329030663', '', 'KG,RENGAS BADAK,JALAN CHANGGONG 16300 Bachok Kelantan', '0179198122', 'BADAK STABLE', 1),
(62, 'FAIZAL BIN ISMAIL', '850803035831', 'Villaungugroup@gmail.com', '2895, JALAN TOK KENALI, KUBANG KERIAN, 16150 KB, KEL', '0139128588', 'VILLA UNGU STABLE', 1),
(63, 'JASRYN BIN JAFFLY', '900630126315', '', '', '', 'ROYAL TERENGGANU ENDURANCE STABLE', 1),
(64, 'MOHD YUNUS BIN ABDULLAH', NULL, '', '', '', 'PERSATUAN EKUIN TERENGGANU', 1),
(65, 'MOHAMED IRFAN HAKIM BIN MOHAMED NAWI', '010726030233', '', '', '0139504502', 'KEMUDI STABLE', 1),
(66, 'MUHAMAD ZABARULAH IZZAT BIN SAMSUDDIN', '041221070709', '', '', '', 'Marbath Stable', 1),
(67, 'MUHAMMAD ARIF AIMAN BIN SAIFUL RAHIM ', '070316070579', '', '', '0136411741', 'MARBATH STABLE', 1),
(68, 'MUHAMMAD NAJMI BIN AHMAD RADZI ', '990108075529', '', '', '0124652596', 'MARBATH STABLE', 1),
(69, 'ABDULLAH UMMAIR BIN MAHAMAD SHUKOR', '970226025081', '', '', '0135251196', 'MARBATH STABLE', 1),
(70, 'MUHAMMAD MUNIR ULYA BIN ABDUL MUTALIB ', '040805070353', '', '', '01140799177', 'MARBATH STABLE', 1),
(71, 'MOHD DANISH BIN KAMARUL AZHAR', '990421035179', '', '', '0105141694', 'PESBUK', 1),
(76, 'DR. MOHD NAZRI BIN MUHAYIDDIN', '690118035489', 'mnazri22@gmail.com', 'Fakulti Keusahawanan dan Perniagaan\r\nUniversiti Malaysia Kelantan\r\n16100 Kota Bharu\r\nKelantan.', '0136301461', 'Kelab Ekuin UMK', 0),
(78, 'MUHAMMAD AMINUDDIN BIN MUSYARAFI', '041024110097', 'mztarmizi86@gmail.com', '78A KAMPUNG BANGGOL \r\nTOK JIRING\r\n21060 KUALA TERENGGANU', '0139286117', 'PERSATUAN EKUIN TERENGGANU(MZ STABLE)', 0),
(79, 'SHARIFAH NUR DAMIA DHAMIRAH BT SYED AHMAD ROSIDI', '091205110462', 'zanagstol92@gmail.com', 'Kandang Kuda Gong badak Kuala Terengganu', '01161030907', 'PET (Syed Stable )', 0),
(80, 'NUR MAIDATUL NASUHA BT MOHAMMAD ARIFFIN', '080720110316', 'zanagstol92@gmail.com', 'Kandang Kuda Gong Badak Kuala Terengganu', '01161030907', 'PET ( Syed Stable )', 0),
(81, 'MOHAMAD AL IMRAN BIN KAMARUZZAMAN', '840802106213', 'Chean363t9@gmail.com', 'PT 5068 kg Panchor,Kemumin, Pengkalan Chepa\r\nKota Bharu, 16100 kelantan', '0105422884', 'RnR stable', 0),
(82, 'MUHD HAFIZUDDIN BIN ZAMRI', '060725110587', 'noornerina@gmail.com', '8662 G Kg banggol tok jiring 21060 kuala terengganu', '0139169911', 'HKRC Terengganu', 0),
(83, 'MUHAMMAD NAFIS AL-MUQRI BIN MOHD ASRI ', '061022110147', 'noornerina@gmail.com', '8662 G kg banggol tok jiring 21060 kuala terengganu', '0139169911', 'Persatuan Ekuin Trg', 0),
(84, 'MUHAMMAD SYAFIQ BIN ABDUL ADI', '950217115933', 'noornerina@gmail.com', '8662 G kg banggol tok jiring 21060 kuala terengganu', '0139169911', 'Persatuan Ekuin Terengganu', 0),
(86, 'SAARI BIN AB. GHANI', '590120035391', 'saaribachok2014@gmail.com.my', 'Lot.2563 Kg.Alor Jeringgau\r\n16300 Bachok.\r\nKelantan.', '01152893340', '8682 STABLE', 0),
(88, 'MOHD RIDZUAN BIN ARIFIN', '801127035981', 'Wansatsing80@gmail.com', 'KAMPUNG PERALLA 2,\r\n17500 TANAH MERAH\r\nKELANTAN', '0182135358', 'AA GROUP STABLE', 0),
(89, 'MUHAMMAD HAIRIE FITRI BIN MOHD HUSAINI', '031128110199', '', 'Kg tok jaring ktrg', '0139718798', 'Zaki stable', 0),
(90, 'NOORUL HAFIEZ AIMAN BIN NOORUL ASMADI', '020326030479', 'hafiezaiman673@gmail.com', 'No 144,madrasah muhamadiah,kg beta hilir,16450,kota bharu,kelantan', '01159093082', 'Persatuan empayar sunnah berkuda kebangsaan(PESBUK)', 0),
(91, 'MOHD AMIN B MOHD DAUD', '731206035057', 'aminmdnor@yahoo.com', 'Lot 529, Kg Gong Gajah, Kemudi, 16300 Bachok, Kelantan', '0139233887', 'Kemudi Stud Farm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rider_bc`
--

CREATE TABLE `rider_bc` (
  `id` int(11) NOT NULL,
  `rider_name` varchar(200) DEFAULT NULL,
  `nric` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `horse_name` varchar(200) DEFAULT NULL,
  `horse_dob` date DEFAULT NULL,
  `horse_color` varchar(200) DEFAULT NULL,
  `horse_gender` varchar(200) DEFAULT NULL,
  `country_born` varchar(200) DEFAULT NULL,
  `kelab` varchar(200) DEFAULT NULL,
  `hadlaju` double NOT NULL DEFAULT '0',
  `jarak` double NOT NULL DEFAULT '0',
  `cert_achive` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rider_bc`
--

INSERT INTO `rider_bc` (`id`, `rider_name`, `nric`, `email`, `address`, `phone`, `horse_name`, `horse_dob`, `horse_color`, `horse_gender`, `country_born`, `kelab`, `hadlaju`, `jarak`, `cert_achive`, `status`) VALUES
(2, 'AIMAN HAKIM BIN MOHD ROSLI', '050922030341', 'drrosli@yahoo.com', 'lot 3081-ky Chabang Tiga Melawi,bachok, Kelantan', '0139277701', 'JABADIL', '2016-02-13', 'hitam', 'Stallion (Jantan)', 'malaysia', 'Melawi Stable', 10.06, 36, 1, 10),
(3, 'Muhammad Bin Mohd Afandi', '000621030801', 'Nurmuhammad99.n9@gmail.com', 'Lot 2865 kampung kemubu 16450 ketereh kelantan', '01125466369', 'Murtaji', '2015-06-14', 'Chesnut Gelap', 'Mare (Betina)', '', 'PESBUK', 0, 0, 0, 10),
(5, 'RUDY SYAHMIN BIN MAZLAN', '820919035799', 'rudysyah@yahoo.com', 'KAMPUNG LEMBAH SEMERAK, PASIR PUTEH', '01137507408', 'KERIS', '2018-01-01', 'CHESTNUT', 'Mare (Betina)', '', 'RS EQUIN', 0, 0, 0, 10),
(6, 'FARIS NASRULLAH BIN RUDY SYAHMIN', '080228030373', 'rudysyah@yahoo.com', 'KAMPUNG LEMBAH SEMERAK, PASIR PUTEH', '01137507408', 'MISS ALLYYA', '2017-02-01', 'CHESTNUT', 'Mare (Betina)', 'THAILAND', 'RS EQUIN', 0, 0, 0, 10),
(7, 'FARID NASRUDIN BIN RUDY SYAHMIN', '090928031093', 'rudysyah@yahoo.com', 'KAMPUNG LEMBAH SEMERAK, PASIR PUTEH', '01137507408', 'PRINCESS BETTY', '2016-09-01', 'POLOMINO', 'Mare (Betina)', 'MALAYSIA', 'RS EQUIN', 0, 0, 0, 10),
(8, 'ZAINUDDIN YUSOF', '', 'rudysyah@yahoo.com', 'KAMPUNG LEMBAH SEMERAK, PASIR PUTEH', '01137507408', 'LUNA MAYA', '2017-01-01', 'PINTO', 'Mare (Betina)', '', 'RS EQUIN', 0, 0, 0, 10),
(9, 'MUHAMMAD \'AIZAT SOLIHIN BIN CHE AZHA', '020324030651', 'aizatsolihin24@gmail.com ', 'Lot 837 C Bt 7 1/4 Jalan Sabak,Pengkalan Chepa,16100 Kota Bharu,Kelantan', '01125439349', 'LOLA', '2017-03-24', 'Chestnut', 'Mare (Betina)', 'Perak', 'NAJWA STABLE & FARM', 0, 0, 0, 10),
(10, 'AHMAD FAIZ BIN YUSOF', '900509036385', 'Ahmadfaiz90', '129 Kg Gunung 16090 Bachok Kelantan', '0133663173', 'Rizki Tiger Boss', '2015-01-09', 'Bay', 'Gelding (Kasi)', 'AUS', 'KETC ', 0, 0, 0, 10),
(12, 'MUHAMMAD HAZIQ AZAHARI BIN MOHD ARMAN', '090528070579', 'kudakudi4@gmail.com', 'PT 625 Kampung Banggol Lepah, 16450 Ketereh', '0199564358', 'HANA', '2014-10-01', 'Chestnut', 'Mare (Betina)', 'Malaysia', 'PESBUK', 0, 0, 0, 10),
(13, 'MOHD SALMAN BIN MOHD KAMEL', '870922035285', '', 'KG TITIAN LUNAS, MELAWI, BACHOK, KELANTAN', '0137636652', 'HANG TUAH', '2018-01-01', 'BAY', 'Stallion (Jantan)', 'MALAYSIA (JOHOR)', 'SL STABLE INTERNATIONAL CHAMP', 0, 0, 0, 10),
(16, 'MOHD AQIL FARIS BIN IBRAHIM', '110830030979', '', 'KAMPUNG TITIAN LUNAS, MELAWI, BACHOK, KELANTAN', '0195001448', 'SPIRIT', '2017-11-10', 'BAY', 'Stallion (Jantan)', '', 'SL STABLE INTERNATIONAL CHAMP', 0, 0, 0, 10),
(19, 'MUHD SUPIAN BIN AWANG', '890709035065', '', 'Lot1317,kg Rengas Badak,Jalan Changgong,Bachok,kelantan', '01129476857', 'Tiara', '2017-04-13', 'Bay', 'Mare (Betina)', 'Malaysia', 'SUNGAI 2 STABLE', 0, 0, 0, 10),
(22, 'Mohd Qayyim Nizar Bin Sarimi', '980907035399', 'Mohdqayyim123@gmail.com', 'Lot 188 kampung talang kadok 16450 kota bharu kelantan', '0186634591', 'MELISA', '2015-10-10', 'Palomino', 'Mare (Betina)', '', 'Pesbuk', 0, 0, 0, 10),
(24, 'SITI NUR FATIHAH BINTI MOHD ARMAN', '020308070194', '', 'No23,kampung pachakan,22300 kuala besut,terengganu darul iman', '0199564358', 'SUZZY', '2016-06-26', 'CHESTNUT', 'Mare (Betina)', 'KELANTAN', 'PESBUK', 8.07, 36, 1, 10),
(25, 'MUHAMMAD UTHMAN BIN MOHD KAMIL', '021002031111', 'zulhafiyrakiah@gmail.com', 'PT272 LORONG PAKAT 2 JALAN PASIR MAS SALOR', '0113685759', 'BB (AROBIYAH)', '2012-04-17', 'Koko', 'Mare (Betina)', 'Malaysia', 'ASHABUL RADEN FATTAH STABLE', 0, 0, 0, 10),
(27, 'MOHD FAIZAL BIN JUSOH', '860126035293', '', 'CHABANG EMPAT REPEK JALAN KUBUR MUNDU 16300 BACHOK KELANTAN ', '0179444246', 'SYIKIN', '2013-08-31', 'BAY', 'Mare (Betina)', 'MALAYSIA', 'BADAK STABLE', 0, 36, 0, 10),
(28, 'NUR HAFY YUMNI BT MOHD HAFIFZI', '080725030366', '', 'LOT 11827 KG.CHAWAS,17500 TANAH MERAH,KEL', '01171744604', 'BETTY', '2016-01-01', 'Bay', 'Mare (Betina)', 'MALAYSIA', 'PCM STABLE', 12.84, 36, 1, 10),
(29, 'AHMAD TAQIYUDDIN BIN MOHD SALEH', '910925035209', 'mshahrul03@hotmail.com', 'LOT 1291 KAMPUNG BERIS TENGAH NERIS KUBUR BESAR 16050 BACHOK KELANTAN', '0132732782', 'NIFTY', '1994-01-01', 'BAY', 'Gelding (Kasi)', '', 'CWT HORSE STABLE , LOT 1291 KAMPUNG BERIS TENGAH NERIS KUBUR BESAR 16050 BACHOK KELANTAN', 0, 0, 0, 10),
(33, 'JAZMI BIN HASSAN', '660101035813', 'jazmihassan6666@gmail.com', 'LOT 2482, TMN. HJH. UMI KALTHOM, 16450 KOTA BHARU, KELANTAN.', '0109162181', 'MAR MUSTANG', '2018-02-02', 'GREY', 'Gelding (Kasi)', 'MALAYSIA', 'JAZ STABLE', 0, 0, 0, 10),
(37, 'NOR FAIQDANISH BIN NOR SHAFRI', '071018030979', '', 'DBUSTAN STABLE, KETEREH', '0169232044', 'BOBOY', '2016-03-16', 'OREN', 'Stallion (Jantan)', 'KELANTAN', 'DBUSTAN STABLE, KETEREH', 0, 0, 0, 10),
(38, 'NURUL FATIMAH AZZAHRA MOHD KASMALI', '011111110098', 'Kasmali5975@gmail.com', 'NO.823 BATU 7 1/2 BUKIT PAYONG 21400 MARANG TERENGGANU.', '0199846466', 'BARIQ AR-RUMI', '2015-01-20', 'GREY', 'Mare (Betina)', 'MALAYSIA', 'PERSATUAN EKUIN TERENGGANU', 0, 0, 0, 10),
(39, 'MOHD KASMALI BIN GHANI', '750115065975', 'Kasmali5975@gmail.com', 'NO.823 BATU 7 1/2 KG. BUKIT PAYONG ,21400 MARANG TERENGGANU.', '0199846466', 'ISABELLA ALBAYAD', '2016-02-29', 'Grey', 'Mare (Betina)', 'MALAYSIA', 'PERSATUAN EKUIN TERENGGANU', 0, 0, 0, 10),
(40, 'AHMAD SYAKIR IRFAN BIN SYARIEFIE', '060303030819', '', 'DBUSTAN STABLE, KETEREH', '0139000231', 'ALI BOIKA', '2016-01-01', 'CHESTNUT', 'Stallion (Jantan)', 'KELANTAN', 'DBUSTAN STABLE, KETEREH', 0, 0, 0, 10),
(42, 'MYSARAH BINTI URSILAN AFANDI', '000927101342', '', 'DBUSTAN STABLE, KETEREH', '0139000231', 'OMA', '2018-01-01', 'GREY', 'Gelding (Kasi)', 'KELANTAN', 'D\'BUSTAN STABLE', 8.11, 36, 1, 10),
(43, 'WAN ZAL AIDI AWWAB BIN WAN AHMAD TARMIZI ', '020222030255', 'zalaidi22@icloud.com', 'D?Bustan Stable, Ketereh', '0137204479', 'KHABIB PETRA', '2016-02-16', 'Bay', 'Gelding (Kasi)', '', 'D?Bustan Stable, Ketereh', 0, 0, 0, 10),
(45, 'W MS NORZIHAN BIN HJ. WAN ISMAIL', '690118035489', '', 'BUKIT AJIL STABLE', '0136301461', 'BLACK PUTERA', '2018-01-01', 'HITAM', 'Stallion (Jantan)', 'KELANTAN', 'BUKIT AJIL STABLE', 0, 36, 0, 10),
(46, 'Milia Haamiyah Mohamed ', '850228115308', 'Mdmihsan@gmail.com ', 'Lot 10299 kg wakaf tengah 21030 Kuala Terengganu ', '0139807015', 'Lyrica khizae', '2015-02-28', 'Chesnut', 'Gelding (Kasi)', 'Singapore', 'PERSATUAN EKUIN TERENGGANU', 0, 0, 0, 10),
(47, 'NOOR NERINA ERNIE BINTI HASIM', '950220115520', 'Noornerina@gmail.com', '8662 G Kg Banggol ToK Jiring', '0139169911', 'FILICKA', '2016-02-20', 'PINTO', 'Mare (Betina)', 'MALAYSIA', 'PERSATUAN EKUIN TERENGGANU', 0, 0, 0, 10),
(48, 'MUHAMMAD IRFAN ISKANDAR BIN MOHD ZAKI', '010708110037', 'Noornerina@gmail.com', '8662 G Kg banggol tok jiring', '0139169911', 'REID RIVER AKWAYSHINE', '2012-09-14', 'grey', 'Mare (Betina)', 'Australia', 'PERSATUAN EKUIN TERENGGANU', 0, 0, 0, 10),
(49, 'NURIN AMANIE BADRINA BT MOHD TARMIZI', '111225110086', 'noornerina@gmail.com', '9054 Taman geliga intan 2 ', '0139286117', 'GIANT', '2015-09-09', 'Backskin', 'Gelding (Kasi)', 'Argentina', 'PERSATUAN EKUIN TERENGGANU', 15.23, 36, 1, 10),
(50, 'MUHAMMAD AIFAN DANIAL BIN SUNKIPLI', '060513110171', 'noornerina@gmail.com', '8662 G Kg banggol tok jiring', '0139169911', 'FIONA', '2017-08-16', 'black', 'Mare (Betina)', 'Malaysia', 'PERSATUAN EKUIN TERENGGANU', 0, 0, 0, 10),
(51, 'TUAN SHARIFAH AMIRAH BINTI SYED ROSLAN', '940524115416', '', 'Lot 28906 A tingkat bawah taman Sri gelang jalan Gong Badak 21300 ', '0148287425', 'CALISTA AL SAGOF', '2015-05-24', 'Putih ', 'Mare (Betina)', 'Thailand', 'PERSATUAN EKUIN TERENGGANU', 10.3, 36, 1, 10),
(52, 'MOHAMMMAD ZULHILMI HAZIQ BIN ZAINAL ABIDIN', '060209010141', 'Zulhilmiabey06@gmail.com', '12313', '01133510032', 'JULIA', '2013-01-01', 'Bay', 'Mare (Betina)', 'Malaysia', 'PERSATUAN EKUIN TERENGGANU', 11.74, 36, 1, 10),
(53, 'MUHAMMAD AZEEM BIN SAIFUL BAHRI', '790308035517', 'ahmadmarwan9103@gmail.com ', 'Pt 4472 Tmn Wadi Iman Kok Lanas 16450 Kelantan', '0199494736', 'KIKI ADYAT', '2013-01-01', 'CHESTNUT', 'Mare (Betina)', 'Malaysia', 'UMW Stable ', 0, 0, 0, 10),
(54, 'SHAHRUL HANAFI BIN KHAIRUL ANUAR', '020811110229', '', 'LOT 822 C MENGABANG TENGAH 20400 KUALA TERENGGANU', '0168167071', 'MAYA', '2014-07-07', 'Grey', 'Mare (Betina)', 'MALAYSIA', 'PERSATUAN EKUIN TERENGGANU', 0, 0, 0, 10),
(55, 'M. SHAZMIN BIN SYAMSUAR ', '010525110229', 'shazminrembo@icloud.com', '1524 B JALAM IBRAHNIM BUKIT BESOR 21100 KUALA TERENAGGANU TERENGGANU ', '0199298816', 'ESTRELLA', '2015-01-01', 'PINTO', 'Mare (Betina)', '', 'PERSATUAN EKUIN TERENGGANU', 11.13, 36, 1, 10),
(56, 'MOHD FARIS SYAFIQ MOHD BIN HASSAN SA\'ARI', '941125115261', '', '1613 JALAN PANJI ALAM 21100 KUALA TERENGGANU, TERENGGANU', '0127046459', 'Lady Gashina', '2013-01-01', 'PINTO', 'MARE', '', 'PERSATUAN EKUIN TERENGGANU', 0, 0, 0, 10),
(59, 'MOHAMAD AMIR BIN SUHAIMI', '960112035581', '', 'KPG PDG PAK UMAR, SELISING, PASIR PUTEH', '0148004252', 'SHEVAL', '2018-01-01', 'HITAM', 'Stallion (Jantan)', '', 'VILLA DANIALLA STABLE, MELAWI', 0, 0, 0, 10),
(60, 'MUHAMMAD KHAIRUL IRFAN BIN MOHD TARMIZI', '070125030873', '', 'Lot 408 kampung teluk kitang,jalan sabak,16100 kota bharu', '0172698344', 'LELA AMANDA', '2018-05-10', 'Dapple grey', 'Mare (Betina)', 'Kelantan', 'Najwa Stable & Farm', 0, 0, 0, 10),
(61, 'AHMAD MUIZZ HAKIM BIN CHE JAAFFAR', '080329030663', '', 'KG,RENGAS BADAK,JALAN CHANGGONG 16300 Bachok Kelantan', '0179198122', 'ALIA', '2019-02-20', 'Tapong', 'Mare (Betina)', 'Malaysia', 'BADAK STABLE', 0, 0, 0, 10),
(62, 'FAIZAL BIN ISMAIL', '850803035831', 'Villaungugroup@gmail.com', '2895, JALAN TOK KENALI, KUBANG KRIAN, 16150 KUBANG KRIAN, KB, KEL', '0139128588', 'HALIMAS JABADI', '2013-01-01', 'GREY', 'Stallion (Jantan)', 'AUSTRALIA', 'ViLLA UNGU STABLE', 0, 0, 0, 10),
(63, 'JASRYN BIN JAFFLY', '900630126315', '', '', '', 'RTES SABAHA', NULL, 'BAY', 'MARE', '', 'ROYAL TERENGGANU ENDURANCE STABLE', 14.68, 36, 1, 10),
(64, 'MOHD YUNUS BIN ABDULLAH', '', '', '', '', 'VV COCO', NULL, 'GRAY', 'GELDING', '', 'PERSATUAN EKUIN TERENGGANU', 0, 36, 0, 10),
(65, 'MOHAMED IRFAN HAKIM BIN MOHAMED NAWI', '010726030233', '', '', '0139504502', 'VICO', '2017-02-16', 'TAPUNG', 'STALLION', '', 'KEMUDI STABLE', 12.85, 36, 1, 10),
(66, 'MUHAMAD ZABARULAH IZZAT BIN SAMSUDDIN', '041221070709', '', '', '', 'SABILI', '2019-02-19', 'ALBINO', 'STALLION', '', 'Marbath Stable', 11.43, 36, 1, 10),
(67, 'MUHAMMAD ARIF AIMAN BIN SAIFUL RAHIM ', '070316070579', '', '', '0136411741', 'AS SAKAF', '2019-02-20', 'TAPUNG', 'STALLION', '', 'MARBATH STABLE', 0, 0, 0, 10),
(68, 'MUHAMMAD NAJMI BIN AHMAD RADZI ', '990108075529', '', '', '0124652596', 'KAKAK', '2017-04-19', 'TAPUNG', 'MARE', '', 'MARBATH STABLE', 0, 0, 0, 10),
(69, 'ABDULLAH UMMAIR BIN MAHAMAD SHUKOR', '970226025081', '', '', '0135251196', 'LIZAZ', '2018-05-28', 'BUCKSKIN', 'STALLION', '', 'MARBATH STABLE', 0, 0, 0, 10),
(70, 'MUHAMMAD MUNIR ULYA BIN ABDUL MUTALIB ', '040805070353', '', '', '01140799177', 'AL LEZAZ ', '2017-04-23', 'BAY', 'STALLION', '', 'MARBATH STABLE', 0, 0, 0, 10),
(71, 'MOHD DANISH BIN KAMARUL AZHAR', '990421035179', '', '', '0105141694', 'PUTRI', '2016-02-02', 'CHESTNUT', 'MARE', 'KELANTAN', 'PESBUK', 0, 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'C2MVODwpL2Zt1J7Li6BSSNRgHSHWDibb', '$2y$13$Oc0a8LOPgFtkGDRKXlynnOMoVGfQRKo4es2tGTi6THsP7PE8zegPK', NULL, 'admin@admin.com', 10, 1648126864, 1648126864, '2m8VJBD85k8hpN2sxVTotMTWj1dasFs7_1648126864');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vest_id` (`vest_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `rider_id` (`rider_id`),
  ADD KEY `horse_id` (`horse_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_code` (`country_code`);

--
-- Indexes for table `horse`
--
ALTER TABLE `horse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eam_id` (`eam_id`),
  ADD UNIQUE KEY `horse_code` (`horse_code`);

--
-- Indexes for table `horse_gender`
--
ALTER TABLE `horse_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kejohanan`
--
ALTER TABLE `kejohanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nric` (`nric`);

--
-- Indexes for table `rider_bc`
--
ALTER TABLE `rider_bc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `vest`
--
ALTER TABLE `vest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `horse`
--
ALTER TABLE `horse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `horse_gender`
--
ALTER TABLE `horse_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kejohanan`
--
ALTER TABLE `kejohanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `rider_bc`
--
ALTER TABLE `rider_bc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vest`
--
ALTER TABLE `vest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `competition_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `competition_ibfk_2` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`id`),
  ADD CONSTRAINT `competition_ibfk_3` FOREIGN KEY (`horse_id`) REFERENCES `horse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
