-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 04:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tekweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_ktg` int(11) NOT NULL,
  `Nama_Kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_ktg`, `Nama_Kategori`) VALUES
(9, 'Makanan'),
(10, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `keterangankeluar`
--

CREATE TABLE `keterangankeluar` (
  `id_kk` int(11) NOT NULL,
  `nama_kk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keterangankeluar`
--

INSERT INTO `keterangankeluar` (`id_kk`, `nama_kk`) VALUES
(1, 'Kadaluwarsa'),
(2, 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `keteranganmasuk`
--

CREATE TABLE `keteranganmasuk` (
  `id_km` int(11) NOT NULL,
  `nama_km` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keteranganmasuk`
--

INSERT INTO `keteranganmasuk` (`id_km`, `nama_km`) VALUES
(1, 'Pembelian');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `satuan` int(50) NOT NULL,
  `kategori` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `satuan`, `kategori`, `harga`, `stok`) VALUES
('CILOK123', 'CILOK CHAWNIMA', 1, 9, 12000, 20),
('KOPI123', 'KOPI Phei', 1, 10, 15000, 80);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'bongkoes'),
(2, 'pcss');

-- --------------------------------------------------------

--
-- Table structure for table `stokkeluar`
--

CREATE TABLE `stokkeluar` (
  `id_sk` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_produk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stokkeluar`
--

INSERT INTO `stokkeluar` (`id_sk`, `tanggal`, `id_produk`, `jumlah`, `id_keterangan`) VALUES
(1, '2023-11-26 03:14:21', 'KOPI123', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stokmasuk`
--

CREATE TABLE `stokmasuk` (
  `id_sm` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_produk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_keterangan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stokmasuk`
--

INSERT INTO `stokmasuk` (`id_sm`, `tanggal`, `id_produk`, `jumlah`, `id_keterangan`) VALUES
(4, '2023-11-26 02:56:47', 'KOPI123', 100, 1),
(5, '2023-11-26 02:58:21', 'CILOK123', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama_lengkap`, `email`, `phone`, `birth`, `address`, `password`) VALUES
('xneine', 'Alan Jonathan Raharjo', 'c14220291@john.petra.ac.id', '12345', '2023-12-12', 'siwalan', '$2y$10$AYqWsV1mNVaLB0MTaHGzwe7n9SAJoaGF8hhAx/mKIZZehcocCNsCa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `NRP` varchar(12) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`NRP`, `nama`, `email`, `password`) VALUES
('C14220036', 'Eric Yoel', 'c14220036@john.petra.ac.id', '$2y$10$fTsH8.yFmF1KzZ9rngymqez2dCLZiGk.7Dok0q8Mv0Aj1AokpogJq'),
('c14220249', 'Fong Fong', 'c14220249@john.petra.ac.id', '$2y$10$gTJ8MBsAa0nSFfcrHpSqe.ShWYLwcjH0jh.s6TWPCtYKjFs6vnxqe'),
('c14220291', 'Alan Jonathan Raharjo', 'c14220291@john.petra.ac.id', '$2y$10$rsgfU1YNEQ3.y31dxoMFYuXePTZor7ZLE9zLpltMtACGuuOvXBvpu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_ktg`),
  ADD UNIQUE KEY `Nama_Kategori` (`Nama_Kategori`);

--
-- Indexes for table `keterangankeluar`
--
ALTER TABLE `keterangankeluar`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `keteranganmasuk`
--
ALTER TABLE `keteranganmasuk`
  ADD PRIMARY KEY (`id_km`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `nama_produk` (`nama_produk`),
  ADD KEY `satuan` (`satuan`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`),
  ADD UNIQUE KEY `nama_satuan` (`nama_satuan`);

--
-- Indexes for table `stokkeluar`
--
ALTER TABLE `stokkeluar`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_keterangan` (`id_keterangan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `stokmasuk`
--
ALTER TABLE `stokmasuk`
  ADD PRIMARY KEY (`id_sm`),
  ADD KEY `id_keterangan` (`id_keterangan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`NRP`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_ktg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `keterangankeluar`
--
ALTER TABLE `keterangankeluar`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keteranganmasuk`
--
ALTER TABLE `keteranganmasuk`
  MODIFY `id_km` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stokkeluar`
--
ALTER TABLE `stokkeluar`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stokmasuk`
--
ALTER TABLE `stokmasuk`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`satuan`) REFERENCES `satuan` (`id_satuan`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_ktg`);

--
-- Constraints for table `stokkeluar`
--
ALTER TABLE `stokkeluar`
  ADD CONSTRAINT `stokkeluar_ibfk_1` FOREIGN KEY (`id_keterangan`) REFERENCES `keterangankeluar` (`id_kk`),
  ADD CONSTRAINT `stokkeluar_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `stokmasuk`
--
ALTER TABLE `stokmasuk`
  ADD CONSTRAINT `stokmasuk_ibfk_1` FOREIGN KEY (`id_keterangan`) REFERENCES `keteranganmasuk` (`id_km`),
  ADD CONSTRAINT `stokmasuk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
