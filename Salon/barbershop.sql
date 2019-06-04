-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Apr 2019 pada 20.40
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barbershop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(7) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenkel` char(1) NOT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `level` varchar(10) NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id_user`, `fullname`, `email`, `password`, `jenkel`, `no_hp`, `level`, `foto`) VALUES
(1, 'Rahma Purnama', 'purwantiaibuku@gmail.com', 'abc', 'L', '4234', 'owner', ''),
(81, 'Putri Wahyu Ocata', 'cobavoba17@gmail.com', 'sssvcxv', 'L', '2147483647', 'admin', ''),
(87, 'Kimmi', 'cobavoba17@gmail.com', 'xxxxsfd', 'P', '2147483647', 'admin', ''),
(104, 'Kimmi Himme', 'cobavoba17@gmail.com', 'xxxxsaa', 'P', '2147483647', 'admin', ''),
(109, 'Kimmi', 'cobavoba17@gmail.com', 'xxxxsfd', 'P', '2147483647', 'admin', ''),
(110, 'Suhono', 'cobavoba17@gmail.comXX', '123xvxcv', 'L', '2147483647', 'member', ''),
(112, 'Rahma Andita Purnama', 'cobavoba17@gmail.com', 'aavxcv', 'L', '2147483647', 'admin', ''),
(113, 'Putri Wahyu Ocata', 'cobavoba17@gmail.com', 'sss123', 'L', '2147483647', 'admin', ''),
(114, 'Kimmi Himme', 'cobavoba17@gmail.com', 'xxxxsaa', 'P', '2147483647', 'admin', ''),
(125, 'RahmaX Sangar', 'purwantiibuku@gmail.com', '123456', 'L', '089669413260', 'member', '5caf7c8fcc3f2.jpg'),
(126, 'Sito Karuniawan', 'cobavobaxz17@gmail.com', '123456', 'L', '08966941322160', 'admin', ''),
(129, 'Kimmi Hore', 'rahmaanditap@gmail.com', '123456', 'L', '089631413260', 'member', ''),
(130, 'Putri Wahyu Ocata', 'cobavoba17@gmail.com', 'sssvcxv', 'L', '2147483647', 'admin', ''),
(131, 'Kimmi', 'cobavoba17@gmail.com', 'xxxxsfd', 'P', '2147483647', 'admin', ''),
(132, 'Suhono', 'cobavoba17@gmail.comXX', '123xvxcva', 'L', '2147483647', 'member', ''),
(133, 'Kimmi Himme', 'cobavoba17@gmail.com', 'xxxxsaa', 'P', '2147483647', 'admin', ''),
(135, 'Kimmi', 'cobavoba17@gmail.com', 'xxxxsfd', 'P', '2147483647', 'admin', ''),
(136, 'Suhono CX', 'cobavoba17@gmail.comXX', '123xvxcv', 'L', '2147483647', 'member', ''),
(138, 'Putri Wahyu Ocata', 'cobavoba17@gmail.com', 'sss123', 'L', '2147483647', 'admin', ''),
(139, 'Kimmi Himme', 'cobavoba17@gmail.com', 'xxxxsaa', 'P', '2147483647', 'admin', ''),
(143, 'Rahma Andita Purnama', 'tes@tes', 'tes', 'L', '2147483647', 'admin', '5cade514da93c.jpg'),
(145, 'Sito Karuniawans', 'purwancxzztiibuku@gmail.com', '111111', 'L', '08966941326230', 'member', ''),
(146, 'Riski Sudian', 'riski@gmail.com', 'abc123456', 'L', '', 'member', ''),
(147, 'Rahma Purnama', 'purwantiibukcxcu@gmail.com', 'asd111', 'P', '089669413260', 'member', '5cacc9fc52e66.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_harga`
--

CREATE TABLE `paket_harga` (
  `id_paket` int(7) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `harga_paket` int(20) NOT NULL,
  `ket_paket` varchar(100) NOT NULL,
  `detail_paket` text NOT NULL,
  `diskon_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data untuk tabel `paket_harga`
--

INSERT INTO `paket_harga` (`id_paket`, `nama_paket`, `harga_paket`, `ket_paket`, `detail_paket`, `diskon_harga`) VALUES
(24, 'Paket MAX', 12000, 'Ini dapat menambah kegantengan anda menjadi maxsimal', 'AK,CA', 0),
(27, 'Paket 3', 9000, 'Harga Untuk Mahasiswa', 'AK,AZ,DE', 0),
(28, 'Paket MAX', 12000, 'Ini dapat menambah kegantengan anda menjadi maxsimal', 'AK,CA', 0),
(44, 'Coba 1', 777, 'hhh', 'AK', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `paket_harga`
--
ALTER TABLE `paket_harga`
  ADD PRIMARY KEY (`id_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `paket_harga`
--
ALTER TABLE `paket_harga`
  MODIFY `id_paket` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
