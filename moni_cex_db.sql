-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 04:43 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moni_cex_db`
--
CREATE DATABASE IF NOT EXISTS `moni_cex_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `moni_cex_db`;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_nama_pks`
--
-- Creation: Feb 23, 2023 at 02:03 AM
--

DROP TABLE IF EXISTS `daftar_nama_pks`;
CREATE TABLE `daftar_nama_pks` (
  `id_pks` int(11) NOT NULL DEFAULT 0,
  `nama_pks` varchar(20) NOT NULL,
  `singkatan` varchar(5) NOT NULL,
  `distrik` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `daftar_nama_pks`:
--

--
-- Dumping data for table `daftar_nama_pks`
--

INSERT INTO `daftar_nama_pks` (`id_pks`, `nama_pks`, `singkatan`, `distrik`) VALUES
(0, 'Admin', 'admin', 0),
(1, 'Adolina', 'ado', 3),
(2, 'Bah Jambi', 'baj', 1),
(3, 'Dolok Ilir', 'doi', 3),
(4, 'Timur', 'tim', 2),
(5, 'Dolok Sinumbah', 'dos', 1),
(6, 'Gunung Bayu', 'gub', 1),
(7, 'Mayang', 'may', 1),
(8, 'Air Batu', 'aba', 2),
(9, 'Pulu Raja', 'pur', 2),
(10, 'Berangir', 'ber', 2),
(11, 'Ajamu', 'aja', 2),
(12, 'Sosa', 'osa', 2),
(13, 'Sawit Langkat', 'sal', 3),
(14, 'Tinjowan', 'tin', 3),
(15, 'Pasir Mandoge', 'pam', 1),
(16, 'Pabatu', 'pab', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--
-- Creation: Feb 23, 2023 at 02:03 AM
-- Last update: Mar 06, 2023 at 03:41 AM
--

DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen` (
  `id_pekerjaan` int(11) NOT NULL,
  `folder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `dokumen`:
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--
-- Creation: Mar 02, 2023 at 07:05 AM
-- Last update: Mar 06, 2023 at 03:41 AM
--

DROP TABLE IF EXISTS `dokumentasi`;
CREATE TABLE `dokumentasi` (
  `id_pekerjaan` int(11) NOT NULL,
  `rta` varchar(100) DEFAULT NULL,
  `k3sp` varchar(100) DEFAULT NULL,
  `komis` varchar(100) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `dokumentasi`:
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--
-- Creation: Mar 01, 2023 at 08:49 AM
-- Last update: Mar 06, 2023 at 03:41 AM
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_progress` tinyint(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `history`:
--

-- --------------------------------------------------------

--
-- Table structure for table `persentase_progress`
--
-- Creation: Apr 12, 2023 at 03:40 PM
-- Last update: Mar 06, 2023 at 03:41 AM
--

DROP TABLE IF EXISTS `persentase_progress`;
CREATE TABLE `persentase_progress` (
  `id_persentase` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp(),
  `minggu` tinyint(1) DEFAULT NULL,
  `persentase` tinyint(3) DEFAULT NULL,
  `bukti` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `persentase_progress`:
--

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--
-- Creation: Feb 23, 2023 at 02:03 AM
--

DROP TABLE IF EXISTS `progress`;
CREATE TABLE `progress` (
  `id_progress` tinyint(2) NOT NULL,
  `nama_progress` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `progress`:
--

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id_progress`, `nama_progress`) VALUES
(1, 'PKS'),
(2, 'TEKPOL'),
(3, 'HPS'),
(4, 'PENGADAAN'),
(5, 'SPPBJ');

-- --------------------------------------------------------

--
-- Table structure for table `uraian_pekerjaan`
--
-- Creation: Apr 12, 2023 at 03:39 PM
-- Last update: Mar 06, 2023 at 03:41 AM
--

DROP TABLE IF EXISTS `uraian_pekerjaan`;
CREATE TABLE `uraian_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `id_pks` tinyint(3) NOT NULL,
  `id_progress` tinyint(2) NOT NULL DEFAULT 1,
  `id_dokumen` int(11) DEFAULT NULL,
  `uraian_pekerjaan` text DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `max_persentase` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `uraian_pekerjaan`:
--

--
-- Triggers `uraian_pekerjaan`
--
DROP TRIGGER IF EXISTS `delete_up_dokumen`;
DELIMITER $$
CREATE TRIGGER `delete_up_dokumen` AFTER DELETE ON `uraian_pekerjaan` FOR EACH ROW BEGIN
DELETE FROM  `dokumen` WHERE `id_pekerjaan` = OLD.id_pekerjaan;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `delete_up_dokumentasi`;
DELIMITER $$
CREATE TRIGGER `delete_up_dokumentasi` AFTER DELETE ON `uraian_pekerjaan` FOR EACH ROW BEGIN
   DELETE FROM `dokumentasi` WHERE `id_pekerjaan` = OLD.id_pekerjaan;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `delete_up_history`;
DELIMITER $$
CREATE TRIGGER `delete_up_history` AFTER DELETE ON `uraian_pekerjaan` FOR EACH ROW BEGIN
DELETE FROM  `history` WHERE `id_pekerjaan` = OLD.id_pekerjaan;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `delete_up_persentase`;
DELIMITER $$
CREATE TRIGGER `delete_up_persentase` AFTER DELETE ON `uraian_pekerjaan` FOR EACH ROW BEGIN
   DELETE FROM `persentase_progress` WHERE `id_pekerjaan` = OLD.id_pekerjaan;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_up_dokumen`;
DELIMITER $$
CREATE TRIGGER `insert_up_dokumen` AFTER INSERT ON `uraian_pekerjaan` FOR EACH ROW BEGIN
    INSERT INTO `dokumen`(`id_pekerjaan`) VALUES (NEW.id_pekerjaan);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_up_dokumentasi`;
DELIMITER $$
CREATE TRIGGER `insert_up_dokumentasi` AFTER INSERT ON `uraian_pekerjaan` FOR EACH ROW BEGIN
   INSERT INTO `dokumentasi`(`id_pekerjaan`) VALUES (NEW.id_pekerjaan);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_up_history`;
DELIMITER $$
CREATE TRIGGER `insert_up_history` AFTER INSERT ON `uraian_pekerjaan` FOR EACH ROW BEGIN
    INSERT INTO `history`(`id_pekerjaan`,`id_progress`,`keterangan`) VALUES (NEW.id_pekerjaan,1,'Uraian Pekerjaan Dibuat');
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_up_persentase`;
DELIMITER $$
CREATE TRIGGER `insert_up_persentase` AFTER INSERT ON `uraian_pekerjaan` FOR EACH ROW BEGIN
   INSERT INTO `persentase_progress`(`id_pekerjaan`,`tanggal`, `persentase`, `minggu`) VALUES (NEW.id_pekerjaan,NEW.tanggal,0, (SELECT WEEK(CURRENT_DATE) - WEEK(DATE_FORMAT(CURRENT_DATE, '%Y-%m-01')) + 1));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Feb 23, 2023 at 02:03 AM
-- Last update: Mar 06, 2023 at 03:43 AM
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `id_pks` varchar(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(240) NOT NULL,
  `foto_profil` varchar(50) NOT NULL DEFAULT 'default.png',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_pks`, `username`, `nama`, `password`, `foto_profil`, `date_created`, `last_active`) VALUES
(0, '0', 'admin_cex', 'Admin', '$2y$05$TPX./TKJQbCW1LiJDPN0EuzoIjoQJ7EfkI7qbIRE0RWm.R4bx0a7O', 'admin.png', '2023-03-06 03:43:12', 1678074192),
(1, '1', 'pks_ado', 'PKS Adolina', '$2y$05$OrKBL6uohN9IPdAbhfLT8eoHS/4yjQ47Vc6sCQUBEz8tJ6BpJouMm', 'ado.jpeg', '2023-03-06 02:38:37', 1678070302),
(2, '2', 'pks_baj', 'PKS Bah Jambi', '$2y$05$OrKBL6uohN9IPdAbhfLT8eoHS/4yjQ47Vc6sCQUBEz8tJ6BpJouMm', 'default.png', '2023-03-05 05:00:42', 1677992427),
(3, '3', 'pks_doi', 'PKS Dolok Ilir', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(4, '4', 'pks_tim', 'PKS Timur', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(5, '5', 'pks_dos', 'PKS Dolok Sinumbah', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(6, '6', 'pks_gub', 'PKS Gunung Bayu', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(7, '7', 'pks_may', 'PKS Mayang', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(8, '8', 'pks_aba', 'PKS Air Batu', '$2y$05$OrKBL6uohN9IPdAbhfLT8eoHS/4yjQ47Vc6sCQUBEz8tJ6BpJouMm', 'default.png', '2023-03-01 12:04:17', 0),
(9, '9', 'pks_pur', 'PKS Pulu Raja', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(10, '10', 'pks_ber', 'PKS Berangir', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(11, '11', 'pks_aja', 'PKS Ajamu', '$2y$05$OrKBL6uohN9IPdAbhfLT8eoHS/4yjQ47Vc6sCQUBEz8tJ6BpJouMm', 'default.png', '2023-03-01 12:04:17', 0),
(12, '12', 'pks_osa', 'PKS Sosa', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(13, '13', 'pks_sal', 'PKS Sawit Langkat', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '2023-03-02 04:59:40', 0),
(14, '14', 'pks_tin', 'PKS Tinjowan', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(15, '15', 'pks_pam', 'PKS Pasir Mandoge', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(16, '16', 'pks_pab', 'PKS Pabatu', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_nama_pks`
--
ALTER TABLE `daftar_nama_pks`
  ADD PRIMARY KEY (`id_pks`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `persentase_progress`
--
ALTER TABLE `persentase_progress`
  ADD PRIMARY KEY (`id_persentase`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id_progress`);

--
-- Indexes for table `uraian_pekerjaan`
--
ALTER TABLE `uraian_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `persentase_progress`
--
ALTER TABLE `persentase_progress`
  MODIFY `id_persentase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uraian_pekerjaan`
--
ALTER TABLE `uraian_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table daftar_nama_pks
--

--
-- Metadata for table dokumen
--

--
-- Metadata for table dokumentasi
--

--
-- Metadata for table history
--

--
-- Metadata for table persentase_progress
--

--
-- Metadata for table progress
--

--
-- Metadata for table uraian_pekerjaan
--

--
-- Metadata for table user
--

--
-- Metadata for database moni_cex_db
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;