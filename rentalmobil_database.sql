-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 11:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `merk_id` int(1) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `jml_kursi` int(1) NOT NULL,
  `plat_nomer` varchar(10) NOT NULL,
  `thn_mobil` varchar(4) NOT NULL,
  `image_mobil` varchar(100) NOT NULL,
  `nomor_tnkb_id` int(1) NOT NULL,
  `transmisi_id` int(1) NOT NULL,
  `harga` int(6) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `merk_id`, `warna`, `jml_kursi`, `plat_nomer`, `thn_mobil`, `image_mobil`, `nomor_tnkb_id`, `transmisi_id`, `harga`, `is_active`, `created_at`, `updated_at`) VALUES
(17, 52, 'Toyota All New Rush', 6, 'F 1586 OY', '2021', 'allnewrush.jpg', 1, 2, 450000, 1, 1674588618, 1674589127),
(18, 52, 'Daihatsu All New Terios', 6, 'F 1598 OI', '2020', 'daihatsuteriosnew.jpg', 1, 2, 450000, 1, 1674588738, 1674589135),
(19, 52, 'Mithsubitshi X-Pander', 6, 'F 2297 OK', '2022', 'xpander.jpg', 2, 1, 450000, 1, 1674588934, 1674589111),
(20, 53, 'Honda B-RV', 6, 'F 1779 OI', '2020', 'BRV.jpg', 1, 2, 400000, 1, 1674589098, 1674589158),
(21, 53, 'Honda Mobilio', 6, 'F 1897 OY', '2020', 'hondamobilio.jpg', 1, 2, 400000, 1, 1674589256, 1674589286),
(22, 53, 'Toyota Raize', 6, 'F 1587 OP', '2020', 'raize.jpg', 1, 2, 400000, 1, 1674589393, 1674590132),
(27, 53, 'Suzuki All New Ertiga', 6, 'F 2579 OI', '2018', 'Suzuki_All_New_Ertiga.png', 2, 2, 400000, 1, 1674589786, 1674589841),
(28, 54, 'Toyota All New Avanza', 6, 'F 1587 TU', '2017', 'Toyota-Avanza-F1.jpg', 1, 1, 350000, 1, 1674590239, 1674590265),
(29, 54, 'Daihatsu All New Xenia', 6, 'F 2579 SV', '2017', 'Toyota-Avanza-F2.jpg', 2, 1, 350000, 1, 1674590333, 1674590369),
(30, 54, 'Toyota Calya', 6, 'F 1079 OI', '2019', 'Daihatsu_Sigra.jpg', 1, 1, 350000, 1, 1674590437, 1674590468),
(31, 54, 'Daihatsu Sigra', 6, 'F 2688 PU', '2018', 'Daihatsu_Sigra1.jpg', 2, 1, 350000, 1, 1674590557, 1674590569),
(32, 54, 'Suzuki Ertiga', 6, 'F 2579 XP', '2016', 'Suzuki_Ertiga.jpg', 2, 1, 350000, 1, 1674590649, 1674590660),
(33, 55, 'Honda Brio', 4, 'F 1027 SA', '2020', 'Honda_Brio.png', 1, 2, 300000, 1, 1674590722, 1674590849),
(34, 55, 'Toyota All New Agya', 4, 'F 1598 OY', '2019', 'Toyota_Agya.png', 1, 2, 300000, 1, 1674590838, 1674590892),
(35, 55, 'Daihatsu All New Ayla', 4, 'F 2579 OJ', '2019', 'Toyota_Agya1.png', 2, 1, 300000, 1, 1674590960, 1674590971),
(36, 56, 'BMW', 4, 'F 1027 SA', '2023', 'mercedes-benz.jpg', 1, 2, 500000, 0, 1674619789, 1674626806),
(39, 56, 'Tesla', 4, 'F 1111 RFS', '2022', 'TESLA.jpg', 1, 2, 300000, 1, 1674624821, 1674626876),
(40, 56, 'Mercedes-Benz C 200', 4, 'F 1010 RFP', '2020', 'mercedes-benz2.jpg', 1, 2, 200000, 0, 1674624961, 1674625032);

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `merk`, `created_at`, `updated_at`) VALUES
(52, 'Luxury Car / SUV - Transmisi A.T / M.T', 1674588409, 1674588409),
(53, 'Mobil Keluarga / MPV - Transmisi A.T', 1674588436, 1674588436),
(54, 'Mobil Keluarga / MPV - Transmisi M.T', 1674588455, 1674588455),
(55, 'City Car / LCGC - Transmisi A.T / M.T', 1674588469, 1674588469),
(56, 'Super Luxury Car Transmisi A.T', 1674619755, 1674624590);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `bank` varchar(15) NOT NULL,
  `norek` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `bank`, `norek`, `created_at`, `updated_at`) VALUES
(3, 'BCA', 381055409, 1659777225, 1659777225);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `admin_id` int(1) DEFAULT NULL,
  `user_id` int(1) NOT NULL,
  `mobil_id` int(1) NOT NULL,
  `hari` int(2) NOT NULL,
  `accepted_at` int(11) NOT NULL,
  `rejected_at` int(11) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `pay_at` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `pay_confirm_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `admin_id`, `user_id`, `mobil_id`, `hari`, `accepted_at`, `rejected_at`, `keterangan`, `pay_at`, `bukti`, `pay_confirm_at`, `created_at`, `updated_at`) VALUES
(15, 29, 32, 39, 2, 1674625310, 0, '', 1674625456, '', 1674625806, 1674625233, 1674625806),
(16, 29, 32, 39, 3, 0, 1674627363, 'sudah disewa oleh orang lain\r\n', 0, '', 0, 1674627284, 1674627363),
(17, 29, 32, 40, 3, 1674627601, 0, '', 1674627782, 'tanda-tangan-rafli.png', 1674627831, 1674627467, 1674627831);

-- --------------------------------------------------------

--
-- Table structure for table `status_mobil`
--

CREATE TABLE `status_mobil` (
  `id_status` int(1) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_mobil`
--

INSERT INTO `status_mobil` (`id_status`, `status`) VALUES
(0, 'tidak aktif'),
(1, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tnkb`
--

CREATE TABLE `tnkb` (
  `id_tnkb` int(1) NOT NULL,
  `tnkb` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tnkb`
--

INSERT INTO `tnkb` (`id_tnkb`, `tnkb`) VALUES
(1, 'Ganjil'),
(2, 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `transmisi`
--

CREATE TABLE `transmisi` (
  `id_transmisi` int(11) NOT NULL,
  `transmisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transmisi`
--

INSERT INTO `transmisi` (`id_transmisi`, `transmisi`) VALUES
(1, 'Manual'),
(2, 'Matic');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `is_activate` int(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `no_hp`, `password`, `role_id`, `alamat`, `ktp`, `is_activate`, `created_at`, `updated_at`) VALUES
(29, 'admin', 'admindvm@gmail.com', 'fotoformal4.jpg', '085216641062', '$2y$10$wfSeOc7aiQh/GvdS6A3Sau4xasacr1LT6jcqcBlJy5SugwIs.Bvsu', 1, '', '', 1, 1674584069, 1674624234),
(30, 'Deni Irawan. S.H,. M.H.', 'denimanagerdvm@gmail.com', 'fotoformal2.jpg', '085216641062', '$2y$10$qTmNSa/QScE0FvdKvdeVsO1x.3hJ0OrXabiGEF8aRhTZpmVGtqYte', 1, '', '', 1, 1674584197, 1674624398),
(31, 'Rizki Kurnia Apriansyah. S.Kom.', 'rizkiadmindvm@gmail.com', 'default.jpg', '', '$2y$10$hZS8cCcQLUu0FOqkHhoNxeeApW0Iu2xXNUF0dx.fVpiZYjxuIhthC', 1, '', '', 1, 1674584220, 1674584220),
(32, 'userdvm', 'userdvm@gmail.com', 'fotoformal41.jpg', '085216641062', '$2y$10$VmC7KlTezzzB6UUYT5nOOOMaBLQK/YxZRUBj8jhufYqPcj9rnl8rm', 2, 'Jl. Rh. Didi Sukardi, Citamiang, Kec. Citamiang, Kota Sukabumi, Jawa Barat 43143.', 'ktp.png', 1, 1674585312, 1674626597);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_merk_id_foreign` (`merk_id`),
  ADD KEY `car_is_active_foreign` (`is_active`),
  ADD KEY `car_transmisi_foreign` (`transmisi_id`),
  ADD KEY `car_tnkb_foreign` (`nomor_tnkb_id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `sewa_admin_id_foreign` (`admin_id`),
  ADD KEY `sewa_user_id_foreign` (`user_id`),
  ADD KEY `sewa_mobil_id_foreign` (`mobil_id`);

--
-- Indexes for table `status_mobil`
--
ALTER TABLE `status_mobil`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tnkb`
--
ALTER TABLE `tnkb`
  ADD PRIMARY KEY (`id_tnkb`);

--
-- Indexes for table `transmisi`
--
ALTER TABLE `transmisi`
  ADD PRIMARY KEY (`id_transmisi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `status_mobil`
--
ALTER TABLE `status_mobil`
  MODIFY `id_status` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tnkb`
--
ALTER TABLE `tnkb`
  MODIFY `id_tnkb` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transmisi`
--
ALTER TABLE `transmisi`
  MODIFY `id_transmisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_is_active_foreign` FOREIGN KEY (`is_active`) REFERENCES `status_mobil` (`id_status`),
  ADD CONSTRAINT `car_merk_id_foreign` FOREIGN KEY (`merk_id`) REFERENCES `merk` (`id_merk`),
  ADD CONSTRAINT `car_tnkb_foreign` FOREIGN KEY (`nomor_tnkb_id`) REFERENCES `tnkb` (`id_tnkb`),
  ADD CONSTRAINT `car_transmisi_foreign` FOREIGN KEY (`transmisi_id`) REFERENCES `transmisi` (`id_transmisi`);

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `sewa_mobil_id_foreign` FOREIGN KEY (`mobil_id`) REFERENCES `car` (`id`),
  ADD CONSTRAINT `sewa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
