-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 05:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_kos`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `nama`, `email`, `subjek`, `pesan`) VALUES
(1, 'ANGGA PUTRA PRATAMA', 'anggaputra200601@gmail.com', 'web', 'terimakasih atas adanya web ini sangat membantu'),
(2, 'Wafii', 'wafi@gmail.com', 'web', 'terimakasih telah dibuatkan web ini. sangat membantu!'),
(3, 'Wafii', 'wafi@gmail.com', 'web', 'terimakasih telah dibuatkan web ini. sangat membantu!'),
(4, 'repi', 'repi@pondok.ac.id', 'web', 'keren ni web');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kos`
--

CREATE TABLE `daftar_kos` (
  `id_kos` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `domisili` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_kos` varchar(100) NOT NULL,
  `link_map` varchar(255) NOT NULL,
  `harga_harian` decimal(10,2) DEFAULT NULL,
  `harga_mingguan` decimal(10,2) DEFAULT NULL,
  `harga_bulanan` decimal(10,2) DEFAULT NULL,
  `whatsapp` varchar(30) NOT NULL,
  `status` enum('dipending','disetujui','ditolak') DEFAULT 'dipending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_kos`
--

INSERT INTO `daftar_kos` (`id_kos`, `gambar`, `domisili`, `alamat`, `nama_kos`, `link_map`, `harga_harian`, `harga_mingguan`, `harga_bulanan`, `whatsapp`, `status`) VALUES
(1, '../uploads/WhatsApp Image 2023-10-22 at 09.55.45_c872daf6.jpg', 'purbalingga', 'belakang uin', 'Fardhandi ', 'https://maps.app.goo.gl/jND9uHHoV4fs4RCy8', 10000.00, 50000.00, 700000.00, '+6288298283728', 'disetujui'),
(2, '../uploads/naruto-shippuuden-uchiha-itachi-sharingan-anime-wallpaper-preview.jpg', 'purbalingga', 'cilongok', 'hilmi', 'https://maps.app.goo.gl/jND9uHHoV4fs4RCy8', 20000.00, 300000.00, 1000000.00, '+6288298283728', 'disetujui'),
(22, 'uploads/ft keluarga 2.jpg', 'purbalingga', 'belakang uin', 'turimin', 'https://maps.app.goo.gl/jND9uHHoV4fs4RCy8', 10000.00, 50000.00, 300000.00, '6288298283828', 'dipending'),
(23, '../uploads/WhatsApp Image 2023-02-14 at 16.35.46.jpg', 'purbalingga', 'belakang uin', 'tsabit', 'https://maps.app.goo.gl/jND9uHHoV4fs4RCy8', 10000.00, 70000.00, 300000.00, '6288298283828', 'dipending'),
(25, '../uploads/ehsan.jpg', 'purbalingga', 'belakang uin', 'kost hasna', 'https://maps.app.goo.gl/jND9uHHoV4fs4RCy8', 10000.00, 50000.00, 180000.00, '6285866457668', 'disetujui'),
(26, '../uploads/WIN_20240604_23_06_32_Pro.jpg', 'purbalingga', 'belakang uin', 'pardandi', 'https://maps.app.goo.gl/jND9uHHoV4fs4RCy8', 10000.00, 50000.00, 150000.00, '6282138852926', 'disetujui'),
(27, '../uploads/WIN_20240604_23_07_45_Pro.jpg', 'purbalingga', 'belakang uin', 'pondok', 'https://maps.app.goo.gl/jND9uHHoV4fs4RCy8', 10000.00, 50000.00, 150000.00, '6288298283828', 'dipending'),
(28, '../uploads/WIN_20240604_23_07_57_Pro.jpg', 'Banyumas', 'Baturraden', 'Angga', 'https://maps.app.goo.gl/jND9uHHoV4fs4RCy8', 20000.00, 120000.00, 450000.00, '6288298283828', 'dipending');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin123@gmail.com', '$2y$10$gicq/kLYQydbqJa6UziHiuw4cNGj6GMm/oVydZCNi5Wv2jKitbcUy', 'admin'),
(2, 'hilmi@gmail.com', '$2y$10$xq0qF8LQvQU/aQ30bGZ4c.uiDdigM7RLWnuNwkFBhqNerV3Z4TchO', 'user'),
(3, 'user1@gmail.com', '$2y$10$7qRq/LR7Q/eLh7bDM2rNXOgoNaAF0VQyTpUQpVKixnd4CD4JsxI9q', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_kos`, `pesan`, `tanggal`) VALUES
(1, 1, 'kosan baguss, hanya saja jauh dari alfamart', '2024-12-03 20:20:25'),
(2, 25, 'bagus kosanya, harganya terjangkau', '2024-12-04 22:54:25'),
(3, 2, 'kosan bagus tapi kecil', '2024-12-05 01:23:24'),
(4, 25, 'bagus', '2024-12-05 01:25:10'),
(5, 2, 'keren', '2024-12-05 16:24:05'),
(6, 25, 'kerennnn', '2024-12-05 16:27:49'),
(7, 26, 'keren kosannya', '2024-12-08 15:06:56'),
(8, 26, 'bagus, murah', '2024-12-08 15:07:50'),
(9, 2, 'kosannya bintang lima', '2024-12-08 15:11:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `daftar_kos`
--
ALTER TABLE `daftar_kos`
  ADD PRIMARY KEY (`id_kos`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_kos` (`id_kos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daftar_kos`
--
ALTER TABLE `daftar_kos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
