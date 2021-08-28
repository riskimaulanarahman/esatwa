-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 05:57 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lingkungan_hidup`
--

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_wisata`
--

CREATE TABLE `lokasi_wisata` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(45) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lokasi_wisata`
--

INSERT INTO `lokasi_wisata` (`id`, `nama_lokasi`, `alamat`) VALUES
(1, 'kep seribu', 'kep seribu'),
(2, 'kep seribu', 'kep seribu');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_satwa`
--

CREATE TABLE `pengaduan_satwa` (
  `id` int(11) NOT NULL,
  `gambar` varchar(45) DEFAULT NULL,
  `alasan` varchar(1000) DEFAULT NULL,
  `lokasi_satwa` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaduan_satwa`
--

INSERT INTO `pengaduan_satwa` (`id`, `gambar`, `alasan`, `lokasi_satwa`) VALUES
(10, 'gambar42.jpg', 'Anjing jatuh ditabrak motor, diduga kabur dari rumah', 'Surabaya Barat, jalan tokyo no 22');

-- --------------------------------------------------------

--
-- Table structure for table `satwa`
--

CREATE TABLE `satwa` (
  `idSatwa` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `spesies` varchar(45) DEFAULT NULL,
  `asal` varchar(45) DEFAULT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `gambar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satwa`
--

INSERT INTO `satwa` (`idSatwa`, `nama`, `spesies`, `asal`, `deskripsi`, `gambar`) VALUES
(1, 'Rhinoceros sondaicus sondaicus', 'Rhinoceros ', 'Jawa', 'Rhinoceros sondaicus sondaicus, tipe subspesies yang diketahui sebagai badak Jawa Indonesia\' yang pernah hidup di Pulau Jawa dan Sumatra. Kini populasinya hanya sekitar 40-50 di Taman Nasional Ujung Kulon yang terletak di ujung barat Pulau Jawa.', 'anjing.jpg'),
(2, 'Rhinoceros sondaicus sondaicus', 'Rhinoceros ', 'Jawa', 'Rhinoceros sondaicus sondaicus, tipe subspesies yang diketahui sebagai badak Jawa Indonesia\' yang pernah hidup di Pulau Jawa dan Sumatra. Kini populasinya hanya sekitar 40-50 di Taman Nasional Ujung Kulon yang terletak di ujung barat Pulau Jawa.', 'badal.jpg'),
(5, 'sadasdas', 'dasdas', 'dasdasdas', 'dasdasdasf', 'satwa958.jpg'),
(6, 'dsadsa', 'fghfjghfjgf', 'hfhgf', 'hfghgfgfhgf', 'satwa46.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `hakakses` varchar(45) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telp` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `hakakses`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
('Admin', 'admin@gmail.com', '$2y$10$oB0TTy3Kf/dUmTzN.alpg.U8HCeQslmS9B3RGLkPAiuop4ow7I6bS', 'admin', NULL, NULL, '2021-07-06 10:45:27', '2021-07-06 10:45:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lokasi_wisata`
--
ALTER TABLE `lokasi_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan_satwa`
--
ALTER TABLE `pengaduan_satwa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satwa`
--
ALTER TABLE `satwa`
  ADD PRIMARY KEY (`idSatwa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lokasi_wisata`
--
ALTER TABLE `lokasi_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengaduan_satwa`
--
ALTER TABLE `pengaduan_satwa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `satwa`
--
ALTER TABLE `satwa`
  MODIFY `idSatwa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
