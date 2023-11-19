-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 04:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi_hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `EMAIL_ADMIN` varchar(40) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAMA_ADMIN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `ID_DETAIL` int(11) NOT NULL,
  `ID_KAMAR` int(11) NOT NULL,
  `ID_PEMESANAN` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `JUMLAH_KAMAR` int(11) NOT NULL,
  `TAMU_ANAK` int(11) NOT NULL,
  `TAMU_DEWASA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `ID_FASILITAS` int(11) NOT NULL,
  `NAMA_FASILITAS` int(30) NOT NULL,
  `GAMBAR_FASILITAS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID_FEEDBACK` int(11) NOT NULL,
  `EMAIL_TAMU` varchar(30) NOT NULL,
  `DESKRIPSI` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `ID_HOTEL` int(11) NOT NULL,
  `EMAIL_HOTEL` varchar(40) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAMA_HOTEL` varchar(35) NOT NULL,
  `TLP_HOTEL` varchar(15) NOT NULL,
  `ALAMAT` varchar(30) NOT NULL,
  `RATING` decimal(5,0) NOT NULL,
  `ULASAN` varchar(100) NOT NULL,
  `GAMBAR_HOTEL` varchar(255) NOT NULL,
  `DESKRIPSI` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`ID_HOTEL`, `EMAIL_HOTEL`, `PASSWORD`, `NAMA_HOTEL`, `TLP_HOTEL`, `ALAMAT`, `RATING`, `ULASAN`, `GAMBAR_HOTEL`, `DESKRIPSI`) VALUES
(1, 'hotelsky@gmail.com', '$2y$10$isPTRJog.Hd/miYh0LIFyeRPDjepUIojQQmi1F.rFXIo.3wqU33zm', 'Hotel Sky Flutter', '089543567321', 'Gubeng, Surabaya', 0, '', '2.png', 'Located in the East of Bandung, Shakti Hotel Bandung is a great accommodation with an outdoor swimming pool and sun loungers. For an additional charge, guests can enjoy spa treatments at the hotel’s spa centre. Free WiFi is accessible throughout the hotel. The modern-style rooms at Shakti Hotel Bandung have wooden floors with a mixture of white and green walls. Every room has an air conditioner, a flat-screen TV and an electric kettle. Every bathroom has a shower, a hairdryer and free toiletries');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `ID_KAMAR` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `ID_TIPE_KAMAR` int(11) NOT NULL,
  `HARGA_KAMAR` decimal(10,0) NOT NULL,
  `STATUS_KAMAR` enum('Available','Unavailable') NOT NULL,
  `GAMBAR_KAMAR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`ID_KAMAR`, `ID_HOTEL`, `ID_TIPE_KAMAR`, `HARGA_KAMAR`, `STATUS_KAMAR`, `GAMBAR_KAMAR`) VALUES
(13, 1, 2, 12000000, 'Available', '02.png'),
(14, 1, 2, 12000000, 'Available', '03.png'),
(15, 1, 4, 12000000, 'Available', '03.png');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `ID_METODE_PEMBAYARAN` int(11) NOT NULL,
  `NAMA_METODE_PEMBAYARAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` int(11) NOT NULL,
  `ID_METODE_PEMBAYARAN` int(11) NOT NULL,
  `ID_PEMESANAN` int(11) NOT NULL,
  `TANGGAL_PEMBAYARAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `JUMLAH_PEMBAYARAN` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PEMESANAN` int(11) NOT NULL,
  `EMAIL_TAMU` varchar(40) NOT NULL,
  `TGL_PEMESANAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TGL_CEKIN` datetime NOT NULL,
  `TGL_CEKOUT` datetime NOT NULL,
  `TOTAL_BIAYA` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `EMAIL_TAMU` varchar(40) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAMA_TAMU` varchar(50) NOT NULL,
  `ALAMAT` varchar(50) NOT NULL,
  `NO_TELEPON_TAMU` varchar(15) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`EMAIL_TAMU`, `PASSWORD`, `NAMA_TAMU`, `ALAMAT`, `NO_TELEPON_TAMU`, `TANGGAL_LAHIR`) VALUES
('ahmad12@gmail.com', '$2y$10$k2bnP/xFcXa8v9D1fNixr.h.ZPsTHKyGiDnzmvmomznx20.WOhioq', 'Ahmad Nasrudin Jamil', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `ID_TIPE_KAMAR` int(11) NOT NULL,
  `TIPE_KAMAR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`ID_TIPE_KAMAR`, `TIPE_KAMAR`) VALUES
(1, 'Single Bed Room'),
(2, 'Double Bed Room'),
(3, 'Twin Room'),
(4, 'Trple Room'),
(5, 'Quad Room');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_favorit`
--

CREATE TABLE `wishlist_favorit` (
  `ID_WISHLIST` int(11) NOT NULL,
  `EMAIL_TAMU` varchar(40) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`EMAIL_ADMIN`);

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`ID_DETAIL`),
  ADD KEY `ID_KAMAR` (`ID_KAMAR`),
  ADD KEY `ID_PEMESANNAN` (`ID_PEMESANAN`),
  ADD KEY `ID_PEMESANAN` (`ID_PEMESANAN`),
  ADD KEY `ID_HOTEL` (`ID_HOTEL`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`ID_FASILITAS`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID_FEEDBACK`),
  ADD KEY `EMAIL_TAMU` (`EMAIL_TAMU`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`ID_HOTEL`),
  ADD UNIQUE KEY `EMAIL_HOTEL` (`EMAIL_HOTEL`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`ID_KAMAR`),
  ADD KEY `ID_HOTEL` (`ID_HOTEL`),
  ADD KEY `ID_TIPE_KAMAR` (`ID_TIPE_KAMAR`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`ID_METODE_PEMBAYARAN`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `ID_METODE_PEMBAYARAN` (`ID_METODE_PEMBAYARAN`),
  ADD KEY `ID_PEMESANAN` (`ID_PEMESANAN`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_PEMESANAN`),
  ADD KEY `EMAIL_TAMU` (`EMAIL_TAMU`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`EMAIL_TAMU`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`ID_TIPE_KAMAR`);

--
-- Indexes for table `wishlist_favorit`
--
ALTER TABLE `wishlist_favorit`
  ADD PRIMARY KEY (`ID_WISHLIST`),
  ADD KEY `EMAIL_TAMU` (`EMAIL_TAMU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `ID_DETAIL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `ID_FASILITAS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID_FEEDBACK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `ID_HOTEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `ID_KAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `ID_METODE_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `ID_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID_PEMESANAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `ID_TIPE_KAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist_favorit`
--
ALTER TABLE `wishlist_favorit`
  MODIFY `ID_WISHLIST` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD CONSTRAINT `detail_pembayaran_ibfk_1` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `detail_pembayaran_ibfk_2` FOREIGN KEY (`ID_KAMAR`) REFERENCES `kamar` (`ID_KAMAR`),
  ADD CONSTRAINT `detail_pembayaran_ibfk_3` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `kamar_ibfk_2` FOREIGN KEY (`ID_TIPE_KAMAR`) REFERENCES `tipe_kamar` (`ID_TIPE_KAMAR`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`ID_METODE_PEMBAYARAN`) REFERENCES `metode_pembayaran` (`ID_METODE_PEMBAYARAN`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`);

--
-- Constraints for table `wishlist_favorit`
--
ALTER TABLE `wishlist_favorit`
  ADD CONSTRAINT `wishlist_favorit_ibfk_1` FOREIGN KEY (`EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
