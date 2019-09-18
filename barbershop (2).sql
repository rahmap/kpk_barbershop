-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jul 2019 pada 19.11
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
-- Struktur dari tabel `barberman`
--

CREATE TABLE `barberman` (
  `id_barberman` int(11) NOT NULL,
  `nama_barberman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data untuk tabel `barberman`
--

INSERT INTO `barberman` (`id_barberman`, `nama_barberman`) VALUES
(1, 'Sileh'),
(2, 'Atmoko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `boking`
--

CREATE TABLE `boking` (
  `id_boking` int(11) NOT NULL,
  `id_pesan` varchar(20) NOT NULL,
  `id_paket` int(7) NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `id_barberman` int(11) NOT NULL,
  `id_user` int(7) NOT NULL,
  `waktu_order` varchar(50) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data untuk tabel `boking`
--

INSERT INTO `boking` (`id_boking`, `id_pesan`, `id_paket`, `id_waktu`, `hari`, `id_barberman`, `id_user`, `waktu_order`, `pembayaran`, `status`) VALUES
(67, 'KPK-vXCG-377', 27, 12, 'Jul 09, 2019', 1, 143, 'July 8, 2019 21:29:49', 'MANDIRI', 'success'),
(68, 'KPK-1UZT-821', 45, 21, 'Jul 24, 2019', 2, 143, 'July 8, 2019 21:30:17', 'MANDIRI', 'success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `boking_manual`
--

CREATE TABLE `boking_manual` (
  `id_manual` int(11) NOT NULL,
  `id_pesan` varchar(20) NOT NULL,
  `id_paket` int(7) NOT NULL,
  `waktu_transaksi` varchar(20) NOT NULL,
  `id_barberman` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `boking_manual`
--

INSERT INTO `boking_manual` (`id_manual`, `id_pesan`, `id_paket`, `waktu_transaksi`, `id_barberman`, `nama_pelanggan`, `pembayaran`, `status`) VALUES
(26, 'KPK-KhdB-219', 28, 'Jul 8, 2019 21:31', 1, 'Wana', 'MANDIRI', 'success'),
(27, 'KPK-BP0v-935', 27, 'Jul 8, 2019 23:22', 1, 'Waskn', 'BRI', 'success'),
(28, 'KPK-QkXx-836', 47, 'Jul 8, 2019 23:24', 1, 'Yuanita', 'BCA', 'success'),
(29, 'KPK-4mBd-323', 24, 'Jul 8, 2019 23:50', 1, 'Rizti', 'Uang Cash', 'success');

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
(1, 'Rahma Purnama', 'owner@owner', 'abc', 'L', '089669413260', 'owner', '5cff29c370079.jpg'),
(104, 'Kimmi Himme', 'admin@admin', 'abc', 'P', '2147483647', 'admin', '5cf607dfcf30c.jpg'),
(143, 'Rahma Purnama', 'tes@tes', 'tes', 'L', '089669413260', 'member', '5cf375e3b82ce.jpg'),
(149, 'Aku Siap', 'member@member', 'abc12345', 'L', '', 'member', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_pesan` varchar(20) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `tgl_acc` varchar(50) NOT NULL,
  `pendapatan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_pesan`, `jenis_transaksi`, `admin`, `tgl_acc`, `pendapatan`) VALUES
('KPK-1UZT-821', 'Online', 'Rahma Purnama', '08 July, 2019', 20000),
('KPK-4mBd-323', 'Offline', 'Rahma Purnama', '08 July, 2019', 11400),
('KPK-BP0v-935', 'Offline', 'Rahma Purnama', '08 July, 2019', 9000),
('KPK-KhdB-219', 'Offline', 'Rahma Purnama', '08 July, 2019', 12000),
('KPK-QkXx-836', 'Offline', 'Rahma Purnama', '08 July, 2019', 13000),
('KPK-vXCG-377', 'Online', 'Rahma Purnama', '08 July, 2019', 8100);

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
(24, 'Max', 12000, 'Ini dapat menambah kegantengan anda menjadi maxsimal', 'Cukur, Keramas', 5),
(27, 'Hemat', 9000, 'Harga Untuk Mahasiswa', 'Cukur', 10),
(28, 'Ganteng', 12000, 'Ini dapat menambah kegantengan anda menjadi maxsimal', 'Hair Tatto, Cukur', 10),
(44, 'Axis (HOT)', 15000, 'Paket terkini untuk rambut buluk anda', 'Semir,Semir Special, Cukur', 0),
(45, 'Final', 20000, 'Paket Baru KPK Barbershop', 'Pijat,Semir Special,Styling Pomade', 0),
(46, 'Baru', 6000, 'Paket ini adalah paket super baru', 'Cukur,Semir', 0),
(47, 'Paket Ansi', 13000, 'Paket ini di buat untuk FP ansi minggu depan.', 'Semir,Styling Pomade,Hair Tatto,Perawatan Jenggot', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_boking`
--

CREATE TABLE `waktu_boking` (
  `id_waktu` int(11) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data untuk tabel `waktu_boking`
--

INSERT INTO `waktu_boking` (`id_waktu`, `jam`) VALUES
(1, '17:30'),
(2, '17:00'),
(3, '18:00'),
(4, '18:30'),
(5, '19:00'),
(6, '19:30'),
(7, '20:00'),
(8, '20:30'),
(12, '16:00'),
(13, '16:30'),
(14, '15:00'),
(15, '15:30'),
(16, '14:00'),
(17, '14:30'),
(18, '13:00'),
(19, '13:30'),
(20, '12:30'),
(21, '21:00'),
(22, '21:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barberman`
--
ALTER TABLE `barberman`
  ADD PRIMARY KEY (`id_barberman`);

--
-- Indexes for table `boking`
--
ALTER TABLE `boking`
  ADD PRIMARY KEY (`id_boking`),
  ADD KEY `id_barberman` (`id_barberman`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_waktu` (`id_waktu`);

--
-- Indexes for table `boking_manual`
--
ALTER TABLE `boking_manual`
  ADD PRIMARY KEY (`id_manual`),
  ADD KEY `boking_manual_ibfk_1` (`id_barberman`),
  ADD KEY `boking_manual_ibfk_2` (`id_paket`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `paket_harga`
--
ALTER TABLE `paket_harga`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `waktu_boking`
--
ALTER TABLE `waktu_boking`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barberman`
--
ALTER TABLE `barberman`
  MODIFY `id_barberman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `boking`
--
ALTER TABLE `boking`
  MODIFY `id_boking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `boking_manual`
--
ALTER TABLE `boking_manual`
  MODIFY `id_manual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `paket_harga`
--
ALTER TABLE `paket_harga`
  MODIFY `id_paket` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `waktu_boking`
--
ALTER TABLE `waktu_boking`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `boking`
--
ALTER TABLE `boking`
  ADD CONSTRAINT `boking_ibfk_1` FOREIGN KEY (`id_barberman`) REFERENCES `barberman` (`id_barberman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boking_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boking_ibfk_4` FOREIGN KEY (`id_waktu`) REFERENCES `waktu_boking` (`id_waktu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `boking_manual`
--
ALTER TABLE `boking_manual`
  ADD CONSTRAINT `boking_manual_ibfk_1` FOREIGN KEY (`id_barberman`) REFERENCES `barberman` (`id_barberman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boking_manual_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket_harga` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
