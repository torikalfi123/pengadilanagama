-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 07:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengadilan_agama`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `sifat_surat` varchar(20) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `no_urut` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `no_agenda`, `kode_surat`, `sifat_surat`, `tanggal_surat`, `tujuan_surat`, `file_surat`, `no_urut`, `keterangan`, `created_at`) VALUES
(3, '123123123123', '231313', 'Segera', '3231-12-23', '3123e', 'uploads/KERJA PRAKTIK.docx.pdf', '312313', '123213', '2024-12-19 14:18:19'),
(4, '123123123123', '21421', 'Segera', '3213-03-12', '312313', 'uploads/APznzaajUkLdkD4tUxbyvJEBohlIexGcZbWLrvFOgDF5vPUkCKsrRX5WBP2ks_BzCRbpVhR_O6vld13SGLXcOMEX2_XbY3TruOtg-Enpw8HCQXugz0XiY1zCVai5nVDygt2tg9qq3n7vxELJvesnKVi0v4ceB7M7xmzhO1OeECK8ypXTAe9jLkPVKnw_rmVEgwJ-rfq31Bp-wnXeG2icc1.docx', '44214', '231213231', '2024-12-19 14:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `tanggal_disposisi` date NOT NULL,
  `isi_disposisi` text DEFAULT NULL,
  `sifat` varchar(50) DEFAULT NULL,
  `batas_waktu` date DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `kepada`, `tanggal_disposisi`, `isi_disposisi`, `sifat`, `batas_waktu`, `catatan`, `created_at`) VALUES
(1, 'torik', '2025-01-13', '', 'segara', '2025-02-16', '', '2024-11-21 05:18:21'),
(2, 'torik', '2025-01-13', '', 'segara', '2025-02-16', '', '2024-11-21 05:22:12'),
(3, 'torik', '2024-11-11', 'ewad', 'segara', '2024-12-12', '2123123', '2024-11-23 12:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$ThNgGD9shp9ZZknLQyJbLeFY3h5iJ2hTuE3vKxS.pf9RBHPE/CwEW', 'admin', '2024-11-21 04:58:20'),
(4, 'torik', '$2y$10$f.GZBvICTU1iqWKZoVPDp./SCkshBWRC6lZloY6hxwJ8xPDrv4S7W', 'user', '2024-12-19 08:46:29'),
(6, 'atika', '$2y$10$kWaYntvS6BK87yFbDjWNJuw3GbW9HgpoqyjyXga7QpAHLwqjBY7uu', 'staff', '2024-12-19 14:46:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
