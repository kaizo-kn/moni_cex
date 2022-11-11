-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2022 at 11:35 AM
-- Server version: 5.7.38-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humasptpn_data-pmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `stok_sparepart_PMT`
--

CREATE TABLE `stok_sparepart_PMT` (
  `id` int(11) NOT NULL,
  `tanggal_update` varchar(50) NOT NULL,
  `lori_rebusan` int(10) NOT NULL,
  `fruit_elevator` int(10) NOT NULL,
  `as_thresher` int(10) NOT NULL,
  `tromol_thresher` int(10) NOT NULL,
  `body_cbc` int(10) NOT NULL,
  `gantungan_cbc` int(10) NOT NULL,
  `pedal_cbc` int(10) NOT NULL,
  `body_polishdrum` int(10) NOT NULL,
  `roll_body_polishdrum` int(10) NOT NULL,
  `roll_bawah_polishdrum` int(10) NOT NULL,
  `gear_polishdrum` int(10) NOT NULL,
  `dewatering_drum` int(10) NOT NULL,
  `bottom_cone_inti` int(10) NOT NULL,
  `bottom_cone_cangkang` int(10) NOT NULL,
  `vortex_finder` int(10) NOT NULL,
  `feed_housing` int(10) NOT NULL,
  `body_cyclone` int(10) NOT NULL,
  `separating_cyclone` int(10) NOT NULL,
  `box_control` int(10) NOT NULL,
  `roda_lori` int(11) NOT NULL,
  `bushing_lori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_sparepart_PMT`
--

INSERT INTO `stok_sparepart_PMT` (`id`, `tanggal_update`, `lori_rebusan`, `fruit_elevator`, `as_thresher`, `tromol_thresher`, `body_cbc`, `gantungan_cbc`, `pedal_cbc`, `body_polishdrum`, `roll_body_polishdrum`, `roll_bawah_polishdrum`, `gear_polishdrum`, `dewatering_drum`, `bottom_cone_inti`, `bottom_cone_cangkang`, `vortex_finder`, `feed_housing`, `body_cyclone`, `separating_cyclone`, `box_control`, `roda_lori`, `bushing_lori`) VALUES
(1, 'Senin, 07 November 2022 pukul 08.23 WIB', 101, 12, 212, 54, 65, 12, 333, 12, 53, 71, 66, 97, 44, 22, 86, 21, 22, 21, 50, 202, 30),
(2, 'Jumat, 28 Oktober 2022 pukul 11.35 WIB', 92, 21, 21, 2215, 2123, 213, 312, 21, 31, 21, 31, 21, 31, 22, 32, 21, 22, 21, 22, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stok_sparepart_PMT`
--
ALTER TABLE `stok_sparepart_PMT`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stok_sparepart_PMT`
--
ALTER TABLE `stok_sparepart_PMT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
