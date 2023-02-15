-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 09:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moni_cex_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_nama_pks`
--

CREATE TABLE `daftar_nama_pks` (
  `id_pks` int(11) NOT NULL DEFAULT 0,
  `nama_pks` varchar(20) NOT NULL,
  `singkatan` varchar(5) NOT NULL,
  `distrik` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id_progress` tinyint(2) NOT NULL,
  `nama_progress` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `uraian_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `id_user` tinyint(3) NOT NULL,
  `id_pks` tinyint(3) NOT NULL,
  `id_progress` tinyint(2) NOT NULL,
  `uraian_pekerjaan` text NOT NULL DEFAULT ' ',
  `persentase_progress` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uraian_pekerjaan`
--

INSERT INTO `uraian_pekerjaan` (`id_pekerjaan`, `id_user`, `id_pks`, `id_progress`, `uraian_pekerjaan`, `persentase_progress`) VALUES
(1, 0, 11, 1, 'tekpol', 0),
(2, 0, 8, 3, 'Update Lori', 0),
(3, 0, 1, 2, 'Memperbaiki Lori Rusak', 0),
(4, 0, 1, 1, 'Input Data 1', 0),
(5, 0, 1, 4, 'Input Data', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `id_pks` varchar(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(240) NOT NULL,
  `foto_profil` varchar(50) NOT NULL DEFAULT 'default.png',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_pks`, `username`, `nama`, `password`, `foto_profil`, `date_created`, `last_active`) VALUES
(0, '0', 'admin_cex', 'Admin Cex', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'admin.jpeg', '2023-02-15 08:14:07', 1676448847),
(1, '1', 'pks_ado', 'PKS Adolina', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(2, '2', 'pks_baj', 'PKS Bah Jambi', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '2023-02-14 01:57:50', 1676339870),
(3, '3', 'pks_doi', 'PKS Dolok Ilir', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(4, '4', 'pks_tim', 'PKS Timur', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(5, '5', 'pks_dos', 'PKS Dolok Sinumbah', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(6, '6', 'pks_gub', 'PKS Gunung Bayu', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(7, '7', 'pks_may', 'PKS Mayang', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(8, '8', 'pks_aba', 'PKS Air Batu', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(9, '9', 'pks_pur', 'PKS Pulu Raja', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(10, '10', 'pks_ber', 'PKS Berangir', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(11, '11', 'pks_aja', 'PKS Ajamu', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(12, '12', 'pks_osa', 'PKS Sosa', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
(13, '13', 'pks_sal', 'PKS Sawit Langkat', '$2y$05$fCcvSizE5k/L9RtM1yzGieAZoSitbSj3VCYURayRLimj3FCblxlfe', 'default.png', '0000-00-00 00:00:00', 0),
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
-- AUTO_INCREMENT for table `uraian_pekerjaan`
--
ALTER TABLE `uraian_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
