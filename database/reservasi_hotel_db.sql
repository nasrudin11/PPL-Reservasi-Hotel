-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 02:12 AM
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
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `ID_DETAIL` int(11) NOT NULL,
  `ID_KAMAR` int(11) NOT NULL,
  `ID_PEMESANAN` int(11) NOT NULL,
  `NAMA_PEMESAN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`ID_DETAIL`, `ID_KAMAR`, `ID_PEMESANAN`, `NAMA_PEMESAN`) VALUES
(42, 21, 34, 'Ahmad Nasrudin'),
(43, 22, 35, 'ajes'),
(44, 22, 36, 'ahjesss'),
(45, 22, 37, 'ajestot'),
(46, 31, 38, 'jandro'),
(47, 31, 38, 'alex'),
(48, 32, 39, 'cici'),
(49, 25, 40, 'raden'),
(50, 25, 40, 'sasmita'),
(51, 32, 41, 'satria'),
(52, 32, 41, 'raihan'),
(53, 20, 42, 'pina'),
(54, 26, 43, 'syayid'),
(55, 26, 43, 'al'),
(56, 23, 44, 'putri'),
(57, 21, 45, 'surya'),
(58, 25, 46, 'zamilkun'),
(59, 20, 47, 'zamilkun');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `ID_FASILITAS` int(11) NOT NULL,
  `NAMA_FASILITAS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`ID_FASILITAS`, `NAMA_FASILITAS`) VALUES
(1, 'Breakfast'),
(2, 'Free Wifi'),
(3, 'Spa'),
(4, 'Gym'),
(5, 'Swimming Pool');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `ID_FASILITAS_HOTEL` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `ID_FASILITAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`ID_FASILITAS_HOTEL`, `ID_HOTEL`, `ID_FASILITAS`) VALUES
(9, 1, 1),
(10, 1, 2),
(11, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID_FEEDBACK` int(11) NOT NULL,
  `NAMA` varchar(35) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `DESKRIPSI` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID_FEEDBACK`, `NAMA`, `EMAIL`, `DESKRIPSI`) VALUES
(1, 'Ahmad Nasrudin Jamil', 'nasrudinj2@gmail.com', 'ghf yuf yfuyfuy ');

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
  `RATING` decimal(5,1) NOT NULL,
  `ULASAN` varchar(100) NOT NULL,
  `GAMBAR_HOTEL` varchar(255) NOT NULL,
  `DESKRIPSI` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`ID_HOTEL`, `EMAIL_HOTEL`, `PASSWORD`, `NAMA_HOTEL`, `TLP_HOTEL`, `ALAMAT`, `RATING`, `ULASAN`, `GAMBAR_HOTEL`, `DESKRIPSI`) VALUES
(1, 'hotelsky@gmail.com', '$2y$10$isPTRJog.Hd/miYh0LIFyeRPDjepUIojQQmi1F.rFXIo.3wqU33zm', 'Hotel Sky Flutter', '089543567321', 'Surabaya', 0.0, '', '2.png', 'Located in the East of Bandung, Shakti Hotel Bandung is a great accommodation with an outdoor swimming pool and sun loungers. For an additional charge, guests can enjoy spa treatments at the hotel’s spa centre. Free WiFi is accessible throughout the hotel. The modern-style rooms at Shakti Hotel Bandung have wooden floors with a mixture of white and green walls. Every room has an air conditioner, a flat-screen TV and an electric kettle. Every bathroom has a shower, a hairdryer and free toiletries'),
(2, 'starcenter@gmail.com', '$2y$10$fwcu6N1hpXdzSq1EoP1pYOg5yCqC8X5J.o0rZs6LvIVnE4gYeaVga', 'Hotel Star Center', '0812636221', 'Surabaya', 0.0, '', '2.png', 'Strategically located only 5 minutes’ drive from Bogor Train Station, Hotel Semeru Bogor offers a 2-star accommodation with a free parking facility and a 24-hour front desk. Free WiFi is accessible in public areas. Fitted with warm lighting, the air-conditioned rooms are simply furnished with a flat-screen TV and a desk. The en suite bathrooms are equipped with a shower facility, towels and free toiletries. Some rooms have a more spacious living space with a seating area. Daily buffet breakfast '),
(3, 'archotel@gmail.com', '$2y$10$YQYMip0AoafSmvb2zjvK..s7wRqWi2fpDKEviOTN1ImoOgZb7CHZW', 'Arch Hotel', '089224532111', 'Batu. Malang', 0.0, '', '3.png', 'Hotel Syariah 99 is located on Jl. Maj. Gen. Panjaitan No. 191, Penanggungan, Kec. Klojen, Malang City, East Java 65113 A sharia hotel with a modern design has several facilities, including parking area, lobby area, receptionist, wifi and many others. Suitable for your business or vacation needs'),
(4, 'hotelsyariah@gmail.com', '$2y$10$SWIMHaK6beNadV0dHSo3euCzHDEy1SGMfN0.VXXUfXOL9.HjvK1hm', 'Hotel Syariah', '08253561222', 'Gubeng, Surabaya', 0.0, '', '3.png', 'Hotel Syariah 99 is located on Jl. Maj. Gen. Panjaitan No. 191, Penanggungan, Kec. Klojen, Malang City, East Java 65113 A sharia hotel with a modern design has several facilities, including parking area, lobby area, receptionist, wifi and many others. Suitable for your business or vacation needs'),
(5, 'hilton89@gmail.com', '$2y$10$KEoJTEe/IZ/TQDxfIo2KaetLNHfszGni5vIFItuuc9YcAckWB9hCq', 'Hilton Bandung', '11', 'Bandung', 0.0, '', 'hilton1.webp', 'Berlokasi strategis di jantung kota Bandung, hanya 10 menit berkendara dari Bandara Husein Sastranegara dan 5 menit berkendara dari stasiun kereta api Bandung, Hilton Bandung menawarkan kamar-kamar yang luas dengan koneksi WiFi berkecepatan tinggi. Hotel ini juga menawarkan pusat kebugaran dengan peralatan lengkap dan kolam renang di puncak gedung yang menghadap ke Gunung Tangkuban Perahu. Pusat Perbelanjaan 23 Paskal yang terkenal dapat dijangkau dengan berjalan kaki selama 5 menit dari hotel. '),
(6, 'gpchotel@gmail.com', '$2y$10$OhnXysufgOaDZr8XWrf9L.oOG6u7jzm3wrqmK4IiI1GyWC4dl4ZVa', 'Grand Pasundan Convention Hotel', '12', 'Bandung', 5.0, '', 'gpc.webp', 'Berlokasi strategis dengan jarak 15 menit berkendara dari Bandara Husein Sastranegara dan Stasiun Kereta Api Bandung, Grand Pasundan Convention Hotel memiliki kolam renang outdoor, pusat kebugaran dan spa. Akses WiFi gratis tersedia di seluruh area hotel.\r\nKamar-kamar ber-AC hotel ini dilengkapi dengan TV layar datar dengan saluran internasional, lemari es mini dan ketel listrik. Kamar mandi dalam dilengkapi dengan shower, handuk dan peralatan mandi. Beberapa kamar menawarkan pemandangan kota at'),
(7, 'courtyardbd@gmail.com', '$2y$10$4VVyXyl9U4xh42ytNhLJRuQgQFGFS4UuibAVafoyAaQTPYOA9QvJm', 'Courtyard Bandung Dago', '13', 'Bandung', 4.3, '', 'c.webp', 'Berlokasi di Bandung Wetan, Bandung, Courtyard by Marriott Bandung Dago, merupakan hotel bintang 4 yang menawarkan akomodasi nyaman yang dilengkapi dengan fasilitas ramah disabilitas.\r\nKamar-kamar ber-AC yang ditawarkan dilengkapi dengan fasilitas Wifi, meja kerja, dan tempat tidur yang nyaman. Kamar mandi dilengkapi dengan shower dan wastafel bercermin. beberapa kamar juga memiliki bathtub.\r\nRestoran hotel menyediakan berbagai hidangan lezat untuk para tamu. Pilihan restoran lain yang berada de'),
(8, 'favebraga@gmail.com', '$2y$10$k1yazwyzuY72TQU.XXKe1.8wxDvxCE89CTL4FdKza5GmSQx4tF48O', 'favehotel Braga', '14', 'Bandung', 5.0, '', 'fa.webp', 'Terletak di Jalan Braga, favehotel Braga adalah pilihan yang sangat baik untuk menginap di Bandung. Fasilitas yang tersedia di hotel ini termasuk perawatan pijat di Whales Spa dan minimarket 24 jam di lobi hotel. Hotel bergaya modern ini menyediakan akses WiFi gratis di seluruh area hotel.      Setiap kamar didekorasi dengan lukisan yang indah di dinding dan bantal yang unik di tempat tidur. AC, TV layar datar dengan saluran lokal dan internasional, meja kerja, brankas dan ketel listrik tersedia'),
(9, 'shaktihotel@gmail.com', '$2y$10$YCdP0.dUnfQh5qsr4ScI6uEEn.GjyttZhX1ngqIB2X.B3Dgu0H5hC', 'Shakti Hotel Bandung', '15', 'Bandung', 5.0, '', 's.webp', 'Terletak di sebelah timur Bandung, Shakti Hotel Bandung adalah akomodasi yang nyaman dengan kolam renang outdoor dan kursi berjemur. Dengan biaya tambahan, kamu bisa menikmati perawatan spa di pusat spa hotel. WiFi gratis dapat diakses di seluruh area hotel. Kamar-kamar di Shakti Hotel Bandung yang bergaya modern berlantai kayu dengan perpaduan warna putih dan hijau. Setiap kamar dilengkapi dengan AC, TV layar datar dan ketel listrik. Setiap kamar mandi dilengkapi dengan shower, pengering rambut'),
(10, 'papandayan11@gmail.com', '$2y$10$j2FlY1onfdQBjmTPZoro8ObuJOogOuB24DZb7HDNI.HpJOWHFA3c6', 'The Papandayan', '16', 'Bandung', 0.0, '', 'p.webp', 'Liburan mewah di Bandung menanti Anda di The Papandayan, yang terletak hanya 5 menit berkendara dari Museum Konferensi Asia Afrika yang bersejarah. Hotel ini juga menawarkan kolam renang outdoor di puncak gedung, spa dan fasilitas rapat/perjamuan. Akses WiFi gratis tersedia di seluruh area hotel.  Menampilkan interior yang elegan dengan nuansa warna krem, kamar-kamar ber-AC di The Papandayan juga dilengkapi dengan TV kabel layar datar. Brankas, fasilitas pembuat kopi/teh dan area tempat duduk de'),
(11, 'amaroossa@gmail.com', '$2y$10$oRPna2D.Yh/nNF.WRSzNx.8nUWPhGaptNgjplpFqL1qxcjf2her.6', 'Amaroossa Hotel Bandung', '16', 'Bandung', 4.3, '', 'a.webp', 'Berlokasi strategis di Jalan Aceh, Amaroossa Hotel Bandung Indonesia berjarak 5 menit berjalan kaki dari factory outlet di Jalan Riau dan 9 menit berjalan kaki dari Gedung Sate. Hotel bintang 4 ini menawarkan kolam renang outdoor dan pilihan bersantap di tempat. Akses WiFi gratis tersedia di area umum hotel. Setiap kamar ber-AC dilengkapi dengan lantai berkarpet, TV kabel layar datar, brankas, minibar dan fasilitas pembuat teh/kopi. Kamar mandi dalam memiliki bathtub dan shower, lengkap dengan h'),
(12, 'phtebu@gmail.com', '$2y$10$rbH5Q9rjESxs4OxraFbaY.D5eSf/1Quf1nd1QP7QKR4OKaQnR4udu', 'Panen Hotel by TEBU', '17', 'Bandung', 4.0, '', 'pa.webp', 'Berlokasi di Riau, Bandung, Panen Hotel by TEBU merupakan akomodasi yang menawarkan akomodasi nyaman, dilengkapi dengan resepsionis 24 jam dan fasilitas ramah penyandang disabilitas.\r\nKamar-kamar ber-AC dengan desain yang simpel dilengkapi dengan TV layar datar, meja kerja dan kasur yang nyaman. Kamar mandi dalam dilengkapi dengan shower dan wastafel bercermin.\r\nRestoran hotel menyediakan berbagai pilihan hidangan yang lezat dan bervariasi. Pilihan restoran yang berada dekat dengan akomodasi ada'),
(13, 'woodhotel@gmail.com', '$2y$10$PAqCK9cX0iH86I4zI73qN.c33Fsov28cKQCcZZyOHmrVDU/2Y.no2', 'Wood Hotel Bandung', '18', 'Bandung', 0.0, '', 'wo.webp', 'A 5-minute drive from Cihampelas Walk, Wood Hotel Bandung is located in Lower Ground Terrace of Parahyangan Residences Apartment, featuring spacious rooms, a swimming pool and a gym. Free WiFi access is available throughout the property.\r\nThe modern rooms at Wood Hotel Bandung are fully air-conditioned and fitted with light wood furnishing. Each room features a seating area, a work desk, a flat-screen TV and a coffee/tea maker along with complimentary bottled waters. A shower, as well as ameniti'),
(14, 'rizh99@gmail.com', '$2y$10$NXEiNHI92GL5BBGCIkSnhO65q25emTXNVAFgDOYHVR710.L0A8b/W', 'Rizh Hotel Bandung', '18', 'Bandung', 0.0, '', 'r.webp', 'Rizh Hotel is one of the hotels in Bandung \r\nwhich is equipped with various \r\nfacilities to support comfort, such as; \r\nnon-smoking room, Wifi, LED TV, 24-hour front desk, \r\nmineral water, toiletries, and parking area, \r\n24-hour room service\r\n\r\n\r\nLocated in a strategic location, \r\nclose to Jaya Plaza (1.6 km), \r\nBandung City Square (1.8 km), \r\nMuseum of the Asian-African Conference (1.8 km), \r\nTrans Studio Mall (2.1 km), \r\nYou can access Marka Coffee and Kitchen (170 m), \r\nand Ayam Goreng Suhart'),
(15, 'lenorabdg@gmail.com', '$2y$10$2V/oaJCBNhq/XSJl9nCfluGlTPZ5jkr87Vcoe2floX0YahoA8f99y', 'Lenora Hotel', '19', 'Bandung', 0.0, '', 'l.webp', 'Located within 10 minutes’ drive from Paskal Hyper Square, Lenora Hotel offers a 2-star accommodation with a shared lounge and a free parking facility. Guests staying in this hotel can enjoy free WiFi access in all areas to help them stay connected during their stay. Decorated with a minimalist design and bright coloured wooden furnishings, the air-conditioned rooms come with a flat-screen TV and a desk. Guests are also provided with free bottled water. The en suite bathrooms have a hot shower, '),
(16, 'klapa@gmail.com', '$2y$10$uHvMHuMgymriji/hXWLYxO6bF2MDYIlzKY7Cd21MOKfXsWEX3rFeG', 'klaparesort', '20', 'Bali', 0.0, '', 'b1.webp', 'Nestled on the edge of Pecatu Hill adjacent to New Kuta Golf Course and directly accessible to Dreamland Beach, Klapa Resort features 5-star services and rooms overlooking the vast Indian Ocean. This hotel has a rooftop swimming pool, gym and free WiFi access throughout. Decorated with wooden furnishings, the spacious air-conditioned rooms have a private balcony/terrace with seating area. There is also an LED TV with international channels and a personal safe. The en suite marble bathroom comes '),
(17, 'legianhotel@gmail.com', '$2y$10$rHa1kNZ0/Y/fIZIa0tw8AubqA9kX1LZVoiplVfv7Xg3HoIE8xoymG', 'Britshlegian', '211', 'Bali', 4.0, '', 'b3.webp', 'Enter a Gate of Hospitality, discover your Simply Elegant 4-star premium hotel with a modern concept. Strategically located on Sunset Road as main road to access Kuta, Legian and Seminyak area, we are just an easy 20-minute drive from NgurahRai International Airport. This Hotel is a newly built hotel in Kuta, Bali, ideal for both business and leisure travellers. We invite guests to experience the comfort of 150 modern furnished rooms, each with a balcony and day bed. Satisfy your desires for bot'),
(18, 'atria@gmail.com', '$2y$10$EQ9KPCC.yxhXwUkF65SSk.K46MKjTUrNpoq7F7prx5yb1vPCQvLuW', 'AtriaHotel', '222', 'Malang', 4.0, '', 'b5.webp', 'Located in the main street of Malang City, the 4-star Atria Hotel Malang features 2 restaurants, a co-working space, a swimming pool and free WiFi access throughout the hotel. The hotel is 15 minutes drive from Brawijaya University and 5 km from Malang Town Square Mall. The air-conditioned rooms are fitted with a flat-screen cable TV, a personal safe, a desk, a seating area and an electric kettle. The en-suite bathroom comes with a shower, a hairdryer and a set of free toiletries. Atria Hotel Ma'),
(19, 'kartika@gmail.com', '$2y$10$FUJ4vNEnCuJq89KAEQ3fgehkhUdTsKojJ3c5IpK8rJzVXmIuHGRVS', 'kartikawijaya', '233', 'Malang', 0.0, '', 'b7.webp', 'éL Hotel Kartika Wijaya Batu offers a 4-star accommodation in the city of Batu. This hotel features a spacious garden and a large swimming pool. Free WiFi is available throughout the hotel for staying guests. The air-conditioned rooms at éL Hotel Kartika Wijaya Batu are equipped with a seating area. Room amenities include a coffee and tea maker, a flat-screen TV with cable channels and a mini fridge. The en suite bathroom comes with a shower and free toiletries. Some rooms have a garden view and');

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
  `GAMBAR_KAMAR` varchar(255) NOT NULL,
  `JUMLAH_RUANGAN` int(20) NOT NULL,
  `DEWASA` int(11) NOT NULL,
  `ANAK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`ID_KAMAR`, `ID_HOTEL`, `ID_TIPE_KAMAR`, `HARGA_KAMAR`, `STATUS_KAMAR`, `GAMBAR_KAMAR`, `JUMLAH_RUANGAN`, `DEWASA`, `ANAK`) VALUES
(13, 1, 2, 12000000, 'Available', '02.png', 10, 2, 0),
(14, 1, 2, 12000000, 'Available', '03.png', 10, 0, 0),
(16, 3, 1, 230000, 'Available', '04.png', 23, 0, 0),
(17, 2, 1, 322000, 'Available', '01.png', 10, 0, 0),
(18, 4, 1, 430000, 'Available', '03.png', 11, 0, 0),
(19, 5, 2, 500000, 'Available', 'hilton.webp', 16, 0, 0),
(20, 6, 2, 800000, 'Available', 'gbpc.webp', 19, 0, 0),
(21, 7, 3, 750000, 'Available', 'courty.webp', 20, 0, 0),
(22, 8, 2, 475000, 'Available', 'fav.webp', 21, 0, 0),
(23, 9, 2, 5000000, 'Available', 'shakti.webp', 9, 0, 0),
(24, 10, 2, 1100000, 'Available', 'papan.webp', 19, 0, 0),
(25, 11, 3, 7360000, 'Available', 'amora.webp', 20, 0, 0),
(26, 12, 3, 435000, 'Available', 'panen.webp', 11, 0, 0),
(27, 13, 2, 450000, 'Available', 'wood.webp', 9, 0, 0),
(28, 14, 2, 350000, 'Available', 'rizh.webp', 21, 0, 0),
(29, 15, 3, 363000, 'Available', 'lenora.webp', 18, 0, 0),
(30, 16, 2, 967000, 'Available', 'b2.webp', 10, 0, 0),
(31, 17, 3, 1100000, 'Available', 'b4.webp', 20, 0, 0),
(32, 18, 2, 644000, 'Available', 'b6.webp', 18, 0, 0),
(33, 19, 2, 485000, 'Available', 'b8.webp', 17, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `ID_METODE_PEMBAYARAN` int(11) NOT NULL,
  `NAMA_METODE_PEMBAYARAN` enum('BCA Virtual Account','Credit Card','Mandiri Virtual Account') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`ID_METODE_PEMBAYARAN`, `NAMA_METODE_PEMBAYARAN`) VALUES
(1, 'BCA Virtual Account'),
(2, 'Credit Card'),
(3, 'Mandiri Virtual Account');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `ID_NOTIFIKASI` int(11) NOT NULL,
  `ID_HOTEL` int(11) DEFAULT NULL,
  `EMAIL_TAMU` varchar(40) NOT NULL,
  `JUDUL_NOTIF` varchar(30) NOT NULL,
  `PESAN_NOTIF` varchar(200) NOT NULL,
  `TGL_NOTIF` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`ID_NOTIFIKASI`, `ID_HOTEL`, `EMAIL_TAMU`, `JUDUL_NOTIF`, `PESAN_NOTIF`, `TGL_NOTIF`) VALUES
(30, NULL, 'ahmad12@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 07:49:53'),
(33, NULL, 'ahmad12@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada Courtyard Bandung Dago', '2023-12-10 09:32:00'),
(34, NULL, 'ajes87@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:42:13'),
(35, NULL, 'zamiludinkece12@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:43:05'),
(36, NULL, 'syayid88@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:43:32'),
(37, NULL, 'sera11@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:45:24'),
(38, NULL, 'aljora@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:45:58'),
(39, NULL, 'kairul@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:46:45'),
(40, NULL, 'cici33@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:47:18'),
(41, NULL, 'basro@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:47:32'),
(42, NULL, 'igun77@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:51:29'),
(43, NULL, 'lestari@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:54:16'),
(44, NULL, 'raditsetia@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:54:35'),
(45, NULL, 'santosa@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:55:28'),
(46, NULL, 'satria1@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:56:10'),
(47, NULL, 'radenper@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:57:27'),
(48, NULL, 'larasan@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:57:54'),
(49, NULL, 'dikah@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 14:59:31'),
(50, NULL, 'farahayu@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 15:00:53'),
(51, NULL, 'surya12@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 15:01:07'),
(52, NULL, 'braman@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 15:01:45'),
(53, NULL, 'jerem@gmail.com', 'Selamat Datang Pengguna Baru!', 'Terima kasih sudah bergabung di platform kami. Banyak hal yang bisa kamu eksplore disini dan jangan lupa segera lengkapi bidoata akun profilmu untuk keperluan lebih lanjut.', '2023-12-10 15:02:41'),
(54, NULL, 'ajes87@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada favehotel Braga', '2023-12-10 15:15:20'),
(55, NULL, 'ajes87@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada favehotel Braga', '2023-12-10 15:18:30'),
(56, NULL, 'ajes87@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada favehotel Braga', '2023-12-10 17:24:32'),
(57, NULL, 'aljora@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada Britshlegian', '2023-12-10 17:30:18'),
(58, NULL, 'cici33@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada AtriaHotel', '2023-12-10 17:38:29'),
(59, NULL, 'radenper@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada Amaroossa Hotel Bandung', '2023-12-10 17:45:32'),
(60, NULL, 'satria1@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada AtriaHotel', '2023-12-10 17:58:00'),
(61, NULL, 'sera11@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada Grand Pasundan Convention Hotel', '2023-12-10 18:28:56'),
(62, NULL, 'syayid88@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada Panen Hotel by TEBU', '2023-12-10 18:30:42'),
(63, NULL, 'larasan@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada Shakti Hotel Bandung', '2023-12-10 18:32:37'),
(64, NULL, 'surya12@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada Courtyard Bandung Dago', '2023-12-10 18:44:26'),
(65, NULL, 'zamiludinkece12@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada Amaroossa Hotel Bandung', '2023-12-10 18:51:45'),
(66, NULL, 'zamiludinkece12@gmail.com', 'Pemesanan Kamar Berhasil', 'Kamu telah berhasil melakukan booking dan pembayaran kamar pada Grand Pasundan Convention Hotel', '2023-12-10 18:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` int(11) NOT NULL,
  `ID_METODE_PEMBAYARAN` int(11) NOT NULL,
  `ID_PEMESANAN` int(11) NOT NULL,
  `TANGGAL_PEMBAYARAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `JUMLAH_PEMBAYARAN` decimal(10,0) NOT NULL,
  `BUKTI_TRANSFER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`ID_PEMBAYARAN`, `ID_METODE_PEMBAYARAN`, `ID_PEMESANAN`, `TANGGAL_PEMBAYARAN`, `JUMLAH_PEMBAYARAN`, `BUKTI_TRANSFER`) VALUES
(42, 1, 34, '2023-12-10 09:32:00', 2250000, 'Screenshot (1).png'),
(43, 1, 35, '2023-12-10 15:15:20', 950000, 'bukti.jpg'),
(44, 1, 36, '2023-12-10 15:18:30', 950000, 'bukti.jpg'),
(45, 1, 37, '2023-12-10 17:24:32', 950000, 'bukti.jpg'),
(46, 1, 38, '2023-12-10 17:30:18', 17600000, 'bukti.jpg'),
(47, 1, 39, '2023-12-10 17:38:29', 644000, 'bukti.jpg'),
(48, 1, 40, '2023-12-10 17:45:32', 14720000, 'bukti.jpg'),
(49, 1, 41, '2023-12-10 17:58:00', 3864000, 'bukti.jpg'),
(50, 1, 42, '2023-12-10 18:28:56', 2400000, 'bukti.jpg'),
(51, 1, 43, '2023-12-10 18:30:42', 1740000, 'bukti.jpg'),
(52, 2, 44, '2023-12-10 18:32:37', 15000000, 'bukti.jpg'),
(53, 1, 45, '2023-12-10 18:44:26', 2250000, 'bukti.jpg'),
(54, 1, 46, '2023-12-10 18:51:45', 7360000, 'bukti.jpg'),
(55, 1, 47, '2023-12-10 18:54:58', 3200000, 'bukti.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PEMESANAN` int(11) NOT NULL,
  `EMAIL_TAMU` varchar(40) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `ID_METODE_PEMBAYARAN` int(11) NOT NULL,
  `TGL_PEMESANAN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TGL_CEKIN` datetime NOT NULL,
  `TGL_CEKOUT` datetime NOT NULL,
  `TOTAL_BIAYA` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`ID_PEMESANAN`, `EMAIL_TAMU`, `ID_HOTEL`, `ID_METODE_PEMBAYARAN`, `TGL_PEMESANAN`, `TGL_CEKIN`, `TGL_CEKOUT`, `TOTAL_BIAYA`) VALUES
(34, 'ahmad12@gmail.com', 7, 1, '2023-12-10 09:31:52', '2023-12-11 00:00:00', '2023-12-14 00:00:00', 2250000),
(35, 'ajes87@gmail.com', 8, 1, '2023-12-10 15:13:36', '2023-12-19 00:00:00', '2023-12-21 00:00:00', 950000),
(36, 'ajes87@gmail.com', 8, 1, '2023-12-10 15:18:23', '2023-12-11 00:00:00', '2023-12-13 00:00:00', 950000),
(37, 'ajes87@gmail.com', 8, 1, '2023-12-10 17:24:26', '2023-12-12 00:00:00', '2023-12-14 00:00:00', 950000),
(38, 'aljora@gmail.com', 17, 1, '2023-12-10 17:30:09', '2024-01-09 00:00:00', '2024-01-17 00:00:00', 17600000),
(39, 'cici33@gmail.com', 18, 1, '2023-12-10 17:38:09', '2024-01-11 00:00:00', '2024-01-12 00:00:00', 644000),
(40, 'radenper@gmail.com', 11, 1, '2023-12-10 17:45:25', '2024-02-28 00:00:00', '2024-02-29 00:00:00', 14720000),
(41, 'satria1@gmail.com', 18, 1, '2023-12-10 17:57:55', '2024-01-30 00:00:00', '2024-02-02 00:00:00', 3864000),
(42, 'sera11@gmail.com', 6, 1, '2023-12-10 18:28:45', '2023-12-25 00:00:00', '2023-12-28 00:00:00', 2400000),
(43, 'syayid88@gmail.com', 12, 1, '2023-12-10 18:30:36', '2023-12-27 00:00:00', '2023-12-29 00:00:00', 1740000),
(44, 'larasan@gmail.com', 9, 2, '2023-12-10 18:32:30', '2023-12-15 00:00:00', '2023-12-18 00:00:00', 15000000),
(45, 'surya12@gmail.com', 7, 1, '2023-12-10 18:43:33', '2023-12-24 00:00:00', '2023-12-27 00:00:00', 2250000),
(46, 'zamiludinkece12@gmail.com', 11, 1, '2023-12-10 18:51:37', '2024-02-16 00:00:00', '2024-02-17 00:00:00', 7360000),
(47, 'zamiludinkece12@gmail.com', 6, 1, '2023-12-10 18:54:52', '2023-12-13 00:00:00', '2023-12-17 00:00:00', 3200000);

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `ID_PROMOSI` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `PROMOSI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`ID_PROMOSI`, `ID_HOTEL`, `PROMOSI`) VALUES
(2, 1, 'promo1.png');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_detail_pemesanan`
--

CREATE TABLE `riwayat_detail_pemesanan` (
  `ID_RIWAYAT_DTL` int(11) NOT NULL,
  `ID_KAMAR` int(11) NOT NULL,
  `ID_RIWAYAT` int(11) NOT NULL,
  `NAMA_PEMESAN` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_detail_pemesanan`
--

INSERT INTO `riwayat_detail_pemesanan` (`ID_RIWAYAT_DTL`, `ID_KAMAR`, `ID_RIWAYAT`, `NAMA_PEMESAN`) VALUES
(2, 21, 8, 'Ahmad Nasrudin'),
(3, 22, 11, 'ajestot'),
(4, 31, 12, 'jandro'),
(5, 31, 12, 'alex'),
(6, 32, 13, 'cici'),
(7, 25, 14, 'raden'),
(8, 25, 14, 'sasmita'),
(9, 32, 15, 'satria'),
(10, 32, 15, 'raihan'),
(11, 20, 16, 'pina'),
(12, 26, 17, 'syayid'),
(13, 26, 17, 'al'),
(14, 23, 18, 'putri'),
(15, 21, 19, 'surya'),
(16, 25, 20, 'zamilkun'),
(17, 20, 21, 'zamilkun');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pemesanan`
--

CREATE TABLE `riwayat_pemesanan` (
  `ID_RIWAYAT` int(11) NOT NULL,
  `EMAIL_TAMU` varchar(40) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `ID_METODE_PEMBAYARAN` int(11) NOT NULL,
  `TGL_PEMESANAN` timestamp NOT NULL DEFAULT current_timestamp(),
  `TGL_CEKIN` datetime NOT NULL,
  `TGL_CEKOUT` datetime NOT NULL,
  `TOTAL_BIAYA` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_pemesanan`
--

INSERT INTO `riwayat_pemesanan` (`ID_RIWAYAT`, `EMAIL_TAMU`, `ID_HOTEL`, `ID_METODE_PEMBAYARAN`, `TGL_PEMESANAN`, `TGL_CEKIN`, `TGL_CEKOUT`, `TOTAL_BIAYA`) VALUES
(8, 'ahmad12@gmail.com', 7, 1, '2023-12-10 09:31:52', '2023-12-11 00:00:00', '2023-12-14 00:00:00', 2250000),
(11, 'ajes87@gmail.com', 8, 1, '2023-12-10 17:24:26', '2023-12-12 00:00:00', '2023-12-14 00:00:00', 950000),
(12, 'aljora@gmail.com', 17, 1, '2023-12-10 17:30:09', '2024-01-09 00:00:00', '2024-01-17 00:00:00', 17600000),
(13, 'cici33@gmail.com', 18, 1, '2023-12-10 17:38:09', '2024-01-11 00:00:00', '2024-01-12 00:00:00', 644000),
(14, 'radenper@gmail.com', 11, 1, '2023-12-10 17:45:25', '2024-02-28 00:00:00', '2024-02-29 00:00:00', 14720000),
(15, 'satria1@gmail.com', 18, 1, '2023-12-10 17:57:55', '2024-01-30 00:00:00', '2024-02-02 00:00:00', 3864000),
(16, 'sera11@gmail.com', 6, 1, '2023-12-10 18:28:46', '2023-12-25 00:00:00', '2023-12-28 00:00:00', 2400000),
(17, 'syayid88@gmail.com', 12, 1, '2023-12-10 18:30:36', '2023-12-27 00:00:00', '2023-12-29 00:00:00', 1740000),
(18, 'larasan@gmail.com', 9, 2, '2023-12-10 18:32:30', '2023-12-15 00:00:00', '2023-12-18 00:00:00', 15000000),
(19, 'surya12@gmail.com', 7, 1, '2023-12-10 18:43:33', '2023-12-24 00:00:00', '2023-12-27 00:00:00', 2250000),
(20, 'zamiludinkece12@gmail.com', 11, 1, '2023-12-10 18:51:37', '2024-02-16 00:00:00', '2024-02-17 00:00:00', 7360000),
(21, 'zamiludinkece12@gmail.com', 6, 1, '2023-12-10 18:54:52', '2023-12-13 00:00:00', '2023-12-17 00:00:00', 3200000);

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
  `TANGGAL_LAHIR` date NOT NULL,
  `FOTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`EMAIL_TAMU`, `PASSWORD`, `NAMA_TAMU`, `ALAMAT`, `NO_TELEPON_TAMU`, `TANGGAL_LAHIR`, `FOTO`) VALUES
('ahmad12@gmail.com', '$2y$10$nty7wThujjWMgYmP2Jlvyu/GUPK3hVxjupzWYUOnWiutR1JU7oF.u', 'Ahmad Nasrudin Jamil', 'Lamongan', '081323934832', '0000-00-00', ''),
('ajes87@gmail.com', '$2y$10$anKU.e1zg2lDWniZ3B5aCuNuqlFJfji9XeJMRrgpwr5ou4Y9H3bZO', 'Ahjes', 'pucuk dunyo', '0898374937', '1981-06-24', ''),
('aljora@gmail.com', '$2y$10$zixBU96jkXSKQ.KoTlFulOfBlR0aQd/XjjEYKhOVYqJzU8hObw1Va', 'Sebastian Alejandro Raphael', '', '', '0000-00-00', ''),
('basro@gmail.com', '$2y$10$ok/.vpBeWUyXbaVfvfZcd.03h4PABFOcmyKyiKjUP7N8AzpfY1f/y', 'ahmad basrori', '', '', '0000-00-00', ''),
('braman@gmail.com', '$2y$10$zR86GSMZoajeu7e2kdy/4e1y0lhU2TjhvMIbreMVQaWpoprt1dPCe', 'Bramantyo Adiningrat', '', '', '0000-00-00', ''),
('cici33@gmail.com', '$2y$10$T9Xmx9k/3zuRgGIknSPKeuI2JVbX43XTpv3zwKVJbnuo6C/4xddBy', 'Ciliandra Fangiono', '', '', '0000-00-00', ''),
('dikah@gmail.com', '$2y$10$NyoyCzpTiDQ5Dy8IQs8Oye/.Yv8m0wY2J6kgG5mhOHBD6Iq9aMZ7q', 'Andhika Hartanto', '', '', '0000-00-00', ''),
('farahayu@gmail.com', '$2y$10$aGfyPvVLpKPp3XujXEf9QuzUHZxOc.onQVnWfqcRN79.Xfq0MQizi', 'Faradiba Rahayu', '', '', '0000-00-00', ''),
('igun77@gmail.com', '$2y$10$elpUYoaW/64SZBj9ibbc6.EQVWw/KNUubFYMuXdZ7ESNKYTinlTjG', 'Putra Gunawan', '', '', '0000-00-00', ''),
('jerem@gmail.com', '$2y$10$QK4aIB05AJJuXSG.tBGEhuxooMLqSySEyVyMz75.XRcGJV1JscyvS', 'Jeremiah Ezekiel Nathanael', '', '', '0000-00-00', ''),
('kairul@gmail.com', '$2y$10$S2drG.H0LQTDcOtHrhMmruSzdyY3u1y8t/IzVeYL0foGbr6xVdQlu', 'Chairul Tanjung', '', '', '0000-00-00', ''),
('larasan@gmail.com', '$2y$10$ykjJRa9f518YWYg934aWCu6i9frHbmwSj3znK0KiqVP8u/0UshH9G', 'Laras Putri', '', '', '0000-00-00', ''),
('lestari@gmail.com', '$2y$10$Z/yRMG/RDuFVpL38FtdokeklAlefalcVet5.3Yjc4uaFrd3.GH/NS', 'Lestari Widjaja', '', '', '0000-00-00', ''),
('radenper@gmail.com', '$2y$10$hcZLLkD9XOXahwBeStIi6eWxYAIUhFlun9KRIYQ57dVFwpN9ECnnO', 'Raden Permadi', '', '', '0000-00-00', ''),
('raditsetia@gmail.com', '$2y$10$hntKXSvXgcU3QmlnB16JxeyfkECt4MPEXlAhBIuSPNLBJRvunBU7e', 'Raditya Utama', '', '', '0000-00-00', ''),
('santosa@gmail.com', '$2y$10$xvEm0aOsO7IzoNPoQC2kTejUK/R/ZnDGuhZT45M/c57pX9.gncFHm', 'Farizal Santosa', '', '', '0000-00-00', ''),
('satria1@gmail.com', '$2y$10$CItm137mKaC4eGSxnarOV.G159qp3/pH/DnBMk7vpcom/3tDsJ/HO', 'Satria cogil', '', '', '0000-00-00', ''),
('sera11@gmail.com', '$2y$10$7lsVhj3GDkpMIGl606kdjeuKvJkM4/zY6ovay1pLq177jkDGC11Vy', 'Seraphina Penelope Aurelia', '', '', '0000-00-00', ''),
('surya12@gmail.com', '$2y$10$2Rn7NMzz0ZN.wr81eRU71.m9qdDF25d7R6wwm52KSiaaRavfpqR4q', 'Wiratama Surya', '', '', '0000-00-00', ''),
('syayid88@gmail.com', '$2y$10$4aCCNv6CHp9hCvAY0rdC3uE90hNJgWOiPHzDREZWIpmSasxdMbV1K', 'syayid hamdalah', '', '', '0000-00-00', ''),
('zamiludinkece12@gmail.com', '$2y$10$tAiFGArtj3DIvRXFXCdyJuClkJOnEoI9CS8evfrJPxAdsZBi3rKPS', 'Zamil hartono', '', '', '0000-00-00', '');

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
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ID_ULASAN` int(11) NOT NULL,
  `ID_HOTEL` int(11) NOT NULL,
  `EMAIL_TAMU` varchar(40) NOT NULL,
  `RATING` float(5,1) NOT NULL,
  `KOMENTAR` varchar(100) NOT NULL,
  `TGL_REVIEW` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`ID_ULASAN`, `ID_HOTEL`, `EMAIL_TAMU`, `RATING`, `KOMENTAR`, `TGL_REVIEW`) VALUES
(12, 7, 'ahmad12@gmail.com', 5.0, 'Pelayanannya sangat memuaskan', '2023-12-10 09:32:30'),
(13, 7, 'ajes87@gmail.com', 4.0, 'lumanyun kamarnya bagus selamat pagi', '2023-12-10 15:17:10'),
(14, 8, 'ajes87@gmail.com', 5.0, 'goodjob sir', '2023-12-10 17:24:50'),
(15, 17, 'aljora@gmail.com', 4.0, 'lumanyun\r\n', '2023-12-10 17:31:19'),
(16, 18, 'cici33@gmail.com', 5.0, 'hotel yang sangat amat nyaman buat saya dan keluarga. karena kami berlibur hanya sehari jadi saya me', '2023-12-10 17:39:50'),
(17, 11, 'radenper@gmail.com', 4.0, 'saya sangat suka karena saya dan istri saya bisa vacatioin', '2023-12-10 17:46:23'),
(18, 18, 'satria1@gmail.com', 3.0, 'kamar bersih this is cogil', '2023-12-10 17:58:23'),
(19, 6, 'sera11@gmail.com', 5.0, 'tempat sangat aman dan nyaman', '2023-12-10 18:29:26'),
(20, 12, 'syayid88@gmail.com', 4.0, 'lumayan sesuai dengan harga', '2023-12-10 18:31:09'),
(21, 9, 'larasan@gmail.com', 5.0, 'luxury hotel bagus ', '2023-12-10 18:32:55'),
(22, 7, 'surya12@gmail.com', 4.0, 'bagus tempatnya ingin saya kunjungin lagi', '2023-12-10 18:46:03'),
(23, 11, 'zamiludinkece12@gmail.com', 5.0, 'pelayanan bagus -zamil', '2023-12-10 18:52:10'),
(24, 11, 'zamiludinkece12@gmail.com', 4.0, 'saya ingin kembali lagi suatu saat kalau punya uang', '2023-12-10 18:55:56'),
(25, 6, 'zamiludinkece12@gmail.com', 5.0, 'saya ingin kembali lagi jika saya tidak lupa ingatan', '2023-12-10 18:56:54');

--
-- Triggers `ulasan`
--
DELIMITER $$
CREATE TRIGGER `update_average_rating` AFTER INSERT ON `ulasan` FOR EACH ROW BEGIN
    DECLARE total_rating FLOAT;
    DECLARE total_reviews INT;

    -- Menghitung total rating dan jumlah ulasan baru untuk hotel tertentu
    SELECT SUM(rating), COUNT(*) INTO total_rating, total_reviews
    FROM ulasan
    WHERE id_hotel = NEW.id_hotel;

    -- Menghitung rata-rata rating
    SET @avg_rating := IF(total_reviews > 0, total_rating / total_reviews, 0);

    -- Memperbarui nilai rata-rata rating di tabel hotel
    UPDATE hotel
    SET rating = @avg_rating
    WHERE id_hotel = NEW.id_hotel;
END
$$
DELIMITER ;

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
-- Dumping data for table `wishlist_favorit`
--

INSERT INTO `wishlist_favorit` (`ID_WISHLIST`, `EMAIL_TAMU`, `ID_HOTEL`) VALUES
(9, 'ahmad12@gmail.com', 1),
(10, 'ahmad12@gmail.com', 2),
(20, 'surya12@gmail.com', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`EMAIL_ADMIN`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`ID_DETAIL`),
  ADD KEY `ID_KAMAR` (`ID_KAMAR`),
  ADD KEY `ID_PEMESANNAN` (`ID_PEMESANAN`),
  ADD KEY `ID_PEMESANAN` (`ID_PEMESANAN`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`ID_FASILITAS`);

--
-- Indexes for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`ID_FASILITAS_HOTEL`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_FASILITAS`),
  ADD KEY `ID_HOTEL` (`ID_HOTEL`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID_FEEDBACK`);

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
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`ID_NOTIFIKASI`),
  ADD KEY `ID_HOTEL` (`ID_HOTEL`),
  ADD KEY `EMAIL_TAMU` (`EMAIL_TAMU`);

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
  ADD KEY `EMAIL_TAMU` (`EMAIL_TAMU`),
  ADD KEY `ID_METODE_PEMBAYARAN` (`ID_METODE_PEMBAYARAN`),
  ADD KEY `ID_HOTEL` (`ID_HOTEL`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`ID_PROMOSI`),
  ADD KEY `ID_HOTEL` (`ID_HOTEL`);

--
-- Indexes for table `riwayat_detail_pemesanan`
--
ALTER TABLE `riwayat_detail_pemesanan`
  ADD PRIMARY KEY (`ID_RIWAYAT_DTL`),
  ADD KEY `ID_KAMAR` (`ID_KAMAR`),
  ADD KEY `ID_RIWAYAT_PEMESANAN` (`ID_RIWAYAT`),
  ADD KEY `ID_RIWAYAT` (`ID_RIWAYAT`);

--
-- Indexes for table `riwayat_pemesanan`
--
ALTER TABLE `riwayat_pemesanan`
  ADD PRIMARY KEY (`ID_RIWAYAT`);

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
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ID_ULASAN`),
  ADD KEY `EMAIL_TAMU` (`EMAIL_TAMU`),
  ADD KEY `ID_HOTEL` (`ID_HOTEL`);

--
-- Indexes for table `wishlist_favorit`
--
ALTER TABLE `wishlist_favorit`
  ADD PRIMARY KEY (`ID_WISHLIST`),
  ADD KEY `EMAIL_TAMU` (`EMAIL_TAMU`),
  ADD KEY `ID_HOTEL` (`ID_HOTEL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `ID_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `ID_FASILITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `ID_FASILITAS_HOTEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID_FEEDBACK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `ID_HOTEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `ID_KAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `ID_METODE_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `ID_NOTIFIKASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `ID_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `ID_PEMESANAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
  MODIFY `ID_PROMOSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riwayat_detail_pemesanan`
--
ALTER TABLE `riwayat_detail_pemesanan`
  MODIFY `ID_RIWAYAT_DTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `riwayat_pemesanan`
--
ALTER TABLE `riwayat_pemesanan`
  MODIFY `ID_RIWAYAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `ID_TIPE_KAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ID_ULASAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `wishlist_favorit`
--
ALTER TABLE `wishlist_favorit`
  MODIFY `ID_WISHLIST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`ID_KAMAR`) REFERENCES `kamar` (`ID_KAMAR`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_3` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`);

--
-- Constraints for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD CONSTRAINT `fasilitas_hotel_ibfk_1` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `fasilitas_hotel_ibfk_2` FOREIGN KEY (`ID_FASILITAS`) REFERENCES `fasilitas` (`ID_FASILITAS`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `kamar_ibfk_2` FOREIGN KEY (`ID_TIPE_KAMAR`) REFERENCES `tipe_kamar` (`ID_TIPE_KAMAR`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`);

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
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`ID_METODE_PEMBAYARAN`) REFERENCES `metode_pembayaran` (`ID_METODE_PEMBAYARAN`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`);

--
-- Constraints for table `promosi`
--
ALTER TABLE `promosi`
  ADD CONSTRAINT `promosi_ibfk_1` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`);

--
-- Constraints for table `riwayat_detail_pemesanan`
--
ALTER TABLE `riwayat_detail_pemesanan`
  ADD CONSTRAINT `riwayat_detail_pemesanan_ibfk_1` FOREIGN KEY (`ID_KAMAR`) REFERENCES `kamar` (`ID_KAMAR`),
  ADD CONSTRAINT `riwayat_detail_pemesanan_ibfk_2` FOREIGN KEY (`ID_RIWAYAT`) REFERENCES `riwayat_pemesanan` (`ID_RIWAYAT`);

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`),
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`);

--
-- Constraints for table `wishlist_favorit`
--
ALTER TABLE `wishlist_favorit`
  ADD CONSTRAINT `wishlist_favorit_ibfk_1` FOREIGN KEY (`EMAIL_TAMU`) REFERENCES `tamu` (`EMAIL_TAMU`),
  ADD CONSTRAINT `wishlist_favorit_ibfk_2` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
