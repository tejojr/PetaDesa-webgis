-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2018 at 12:08 PM
-- Server version: 10.0.24-MariaDB-7
-- PHP Version: 7.1.15-1+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `uname`, `pass`) VALUES
(8, 'sds', 'a', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galerry`
--

CREATE TABLE `tbl_galerry` (
  `id` int(3) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `caption` varchar(120) NOT NULL,
  `galery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_galerry`
--

INSERT INTO `tbl_galerry` (`id`, `id_lokasi`, `caption`, `galery`) VALUES
(9, 8, 'Tampak Depan', 'Screenshot from 2018-03-13 10-03-37.png'),
(10, 8, 'Tampak Samping', 'lamp1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header`
--

CREATE TABLE `tbl_header` (
  `id` int(5) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `url_kml` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_header`
--

INSERT INTO `tbl_header` (`id`, `nama_desa`, `url_kml`) VALUES
(1, 'Desa Beku', 'http://petakehidupan.atwebpages.com/desa_beku.kml');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id` int(11) NOT NULL,
  `id_desa` int(5) NOT NULL,
  `id_marker` int(3) NOT NULL,
  `nama_lokasi` varchar(60) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id`, `id_desa`, `id_marker`, `nama_lokasi`, `lat`, `lng`, `alamat`, `no_hp`, `foto`, `deskripsi`, `url`) VALUES
(8, 1, 3, 'Masjid Al falah', -7.651570, 110.641495, 'Beku, Karanganom, Klaten Regency, Central Java 57475', '086713456789', 'lamp4.png', '<h1>Sejarah</h1>\r\n<p align="justify"><span style="color: #000000;"><span style="font-family: \'Open Sans\', Arial, sans-serif;"><span style="font-size: small;"><strong>Lorem Ipsum</strong></span></span></span><span style="color: #000000;">&nbsp;</span><span style="color: #000000;"><span style="font-family: \'Open Sans\', Arial, sans-serif;"><span style="font-size: small;">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></span></span></p>\r\n<h1>Pendiri</h1>\r\n<p align="justify"><span style="color: #000000;"><span style="font-family: \'Open Sans\', Arial, sans-serif;"><span style="font-size: small;"><strong>Lorem Ipsum</strong></span></span></span><span style="color: #000000;">&nbsp;</span><span style="color: #000000;"><span style="font-family: \'Open Sans\', Arial, sans-serif;"><span style="font-size: small;">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></span></span></p>', 'www.onodasakamichi.blogspot.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marker`
--

CREATE TABLE `tbl_marker` (
  `id` int(3) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `gbr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_marker`
--

INSERT INTO `tbl_marker` (`id`, `nama`, `gbr`) VALUES
(1, 'Pemerintahan', 'citywalls.png'),
(3, 'Masjid', 'mosquee.png'),
(4, 'Sekolah', 'school.png'),
(5, 'UMKM', 'oilrig2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_galerry`
--
ALTER TABLE `tbl_galerry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `tbl_header`
--
ALTER TABLE `tbl_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_desa_2` (`id_desa`),
  ADD KEY `id_marker` (`id_marker`);

--
-- Indexes for table `tbl_marker`
--
ALTER TABLE `tbl_marker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_galerry`
--
ALTER TABLE `tbl_galerry`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_header`
--
ALTER TABLE `tbl_header`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_marker`
--
ALTER TABLE `tbl_marker`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_galerry`
--
ALTER TABLE `tbl_galerry`
  ADD CONSTRAINT `tbl_galerry_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `tbl_lokasi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD CONSTRAINT `tbl_lokasi_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `tbl_header` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_lokasi_ibfk_2` FOREIGN KEY (`id_marker`) REFERENCES `tbl_marker` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
