-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 04:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data-pmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `balasan_komplain`
--

CREATE TABLE `balasan_komplain` (
  `id_balasan` int(255) NOT NULL,
  `tanggal_balasan` varchar(40) NOT NULL,
  `balasan` text NOT NULL,
  `gambar_balasan` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balasan_komplain`
--

INSERT INTO `balasan_komplain` (`id_balasan`, `tanggal_balasan`, `balasan`, `gambar_balasan`) VALUES
(54, 'Kamis, 29 Desember 2022 pukul 04.27 WIB', 'Mohon maaf atas kesalahannya. Saat ini komplain anda sedang diteruskan ke tim terkait. \r\nTerimakasih.', 'Prayo_1672114522-1737'),
(55, 'Selasa, 27 Desember 2022 pukul 05.21 WIB', 'Terimakasih sudah menunggu. Mohon maaf, saat ini bagian ekspedisi sedang mengalami masalah teknis. \r\n-Admin Y-', NULL),
(56, 'Rabu, 28 Desember 2022 pukul 12.04 WIB', '', 'balasan_1672225031-1639');

-- --------------------------------------------------------

--
-- Table structure for table `catatan_info_harga`
--

CREATE TABLE `catatan_info_harga` (
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan_info_harga`
--

INSERT INTO `catatan_info_harga` (`catatan`) VALUES
('1. Harga BELUM termasuk biaya pengiriman (transportasi).\r\n2. Harga sudah termasuk PPN 11% dan upah.\r\n3. Harga dapat berubah sewaktu-waktu sesuai kondisi pasar (antara lain: harga bahan, kurs, dll).\r\n4. Biaya belum termasuk tarif pekerja atau mandah di LUAR SUMATERA UTARA (luar wilayah).\r\n5. Pemesanan selain PTPN IV harus melalui persetujuan BoM (Board of Management).');

-- --------------------------------------------------------

--
-- Table structure for table `info_harga`
--

CREATE TABLE `info_harga` (
  `id` int(11) NOT NULL,
  `banner_harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_harga`
--

INSERT INTO `info_harga` (`id`, `banner_harga`) VALUES
(1, 'PMT-DOI-10-NOVEMBER-2022.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `id` int(255) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tanggal_komplain` varchar(50) NOT NULL,
  `judul_komplain` varchar(60) NOT NULL,
  `isi_komplain` text NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_balasan` int(255) DEFAULT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`id`, `nama`, `email`, `tanggal_komplain`, `judul_komplain`, `isi_komplain`, `gambar`, `id_balasan`, `is_hidden`) VALUES
(54, 'Prayogi Wiranata', 'prayogi@pmt.id', 'Selasa, 27 Desember 2022 pukul 05.15 WIB', 'Barang Tidak Sesuai', 'Barang yang saya terima tidak sesuai dengan yang saya pesan. Nomor pesanan saya adalah PSP-3221/INV0062381/PMT.\r\nMohon ditindaklanjuti. Terima kasih.', 'Prayo_1672114522-1737', 54, 0),
(55, 'Agus Wijaya', 'aguswijaya@gmail.com', 'Selasa, 27 Desember 2022 pukul 05.18 WIB', 'Barang Belum Sampai', 'Barang yang saya pesan belum sampai. Sudah 1 minggu menunggu.', 'AgusW_1672114692-1128', 55, 1),
(56, 'William Stallings', 'william.stalling@me.id', 'Selasa, 27 Desember 2022 pukul 05.46 WIB', 'Barang Kurang ', 'Barang yang saya terima jumlahnya berbeda dengan yang saya pesan.', NULL, 56, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stok_sparepart_pmt`
--

CREATE TABLE `stok_sparepart_pmt` (
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
-- Dumping data for table `stok_sparepart_pmt`
--

INSERT INTO `stok_sparepart_pmt` (`id`, `tanggal_update`, `lori_rebusan`, `fruit_elevator`, `as_thresher`, `tromol_thresher`, `body_cbc`, `gantungan_cbc`, `pedal_cbc`, `body_polishdrum`, `roll_body_polishdrum`, `roll_bawah_polishdrum`, `gear_polishdrum`, `dewatering_drum`, `bottom_cone_inti`, `bottom_cone_cangkang`, `vortex_finder`, `feed_housing`, `body_cyclone`, `separating_cyclone`, `box_control`, `roda_lori`, `bushing_lori`) VALUES
(1, 'Rabu, 28 Desember 2022 pukul 15.26 WIB', 50, 1, 2, 1, 0, 20, 0, 1, 0, 0, 2, 2, 0, 1, 2, 0, 0, 0, 0, 20, 0),
(2, 'Jumat, 28 Oktober 2022 pukul 11.35 WIB', 92, 21, 21, 2215, 2123, 213, 312, 21, 31, 21, 31, 21, 31, 22, 32, 21, 22, 21, 22, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(160) NOT NULL,
  `profile_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `profile_pic`) VALUES
(2, 'Admin PMT', 'admin_pmt@pmt.ptpn4.co.id', '$2y$05$296w1q0F6vqaYVyxNacMu./h.tJu9iXfsLxfN.S0Jmda5o8wfzdhu', 'profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info_harga`
--
ALTER TABLE `info_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_sparepart_pmt`
--
ALTER TABLE `stok_sparepart_pmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `stok_sparepart_pmt`
--
ALTER TABLE `stok_sparepart_pmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
