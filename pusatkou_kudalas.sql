-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2023 at 12:38 PM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusatkou_kudalas`
--

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
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`id`, `rider_name`, `nric`, `email`, `address`, `phone`, `horse_name`, `horse_dob`, `horse_color`, `horse_gender`, `country_born`, `kelab`, `hadlaju`, `jarak`, `cert_achive`, `status`) VALUES
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
(1, 'admin', 'C2MVODwpL2Zt1J7Li6BSSNRgHSHWDibb', '$2y$13$r.yuLYQSwGEp810WBaRWbuqKEGGIIYa9UfTO4FDFJuzJ/ZZSLOjKu', NULL, 'admin@admin.com', 10, 1648126864, 1648126864, '2m8VJBD85k8hpN2sxVTotMTWj1dasFs7_1648126864');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
