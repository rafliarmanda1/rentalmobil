-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 04:43 PM
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
(16, 19, 'brio', 4, 'f 1027 sa', '2013', 'BISMILLAH.jpg', 1, 2, 300000, 0, 1674571044, 1674572350);

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
(19, 'lcgc', 1674571013, 1674571013);

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
(3, 'BCA', 123456789, 1659777225, 1659777225);

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
(13, 1, 2, 16, 3, 1674572467, 0, '', 1674572493, 'hmif1.jpg', 1674572849, 1674572430, 1674572849);

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
(1, 'dwifahriza', 'dwifahriza@gmail.com', 'IMG_3991.jpg', '089612313', '$2y$10$9lDKCahuwi2RwjRMih6zSu0IScaaPNwqjmY/eWNm6vMkJsHIyw2/e', 1, '', '', 1, 1655677533, 1674570310),
(2, 'Rafli Armanda', 'rafli@gmail.com', 'rafli.jpg', '08914442', '$2y$10$4ffZxrMsr8li0XKu5eJb/u5LUDlrdj5pguWApMLLIVRM1.4avFvum', 2, 'Jln cijangkar RT 02 RW 02', 'ktp.jpg', 1, 1655677824, 1674235852),
(13, 'razif', 'razif@gmail.com', 'default.jpg', '08123456789', '$2y$10$gf0FKqSP5HSd61IU1vfC5ufHh9uTVgrspcpJD.Rme9yGK6l8fxrZm', 2, 'Jln Otista', 'pngtree-yellow-crown-king-crown-png-image_5323922.png', 1, 1658158111, 1662693313),
(14, 'nazmi', 'nazmi@gmail.com', 'default.jpg', '089123455', '$2y$10$EN.IK05kOxtnrzoTJna2GeeqNL547gRukSyNmidbDtGT2M6plpneW', 2, 'asdasdsd', '3135715.png', 1, 1662683487, 1666336616),
(15, 'ucup', 'ucup@gmail.com', 'default.jpg', '', '$2y$10$b9dLgVmgGXCDBWE228rFaOVsu61kQDpD93FiQbpuv0s4jprrq9dA.', 2, '', '', 1, 1666336476, 1666336476),
(16, 'dawed', 'dawed@gmail.com', 'default.jpg', '', '$2y$10$O/wMyzyQFLI4wxwya43jM.eMWu00XUqfU4EKJuuY7Xti9L6h7PMXW', 2, '', '', 1, 1674473660, 1674473660),
(17, 'dawegan', 'dawegan@gmail.com', 'default.jpg', '', '$2y$10$4gmg.f.Zp3XOxATAWvek0O9RV70Qp7Qs4Kz.U63ZBx0lHHyt1fnK2', 2, '', '', 1, 1674473713, 1674473713),
(18, 'ezafahriza', 'ezafahriza@gmail.com', 'default.jpg', '', '$2y$10$QcXjl6cOdpc0T2c1vNIaY.5pSBTCOQwp/qgMWcIwGSksQP2yV2yAi', 2, '', '', 1, 1674473802, 1674473802);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
