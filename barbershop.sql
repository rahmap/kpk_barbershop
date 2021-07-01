-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Jul 2021 pada 21.57
-- Versi server: 8.0.25
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id_barberman` int NOT NULL,
  `nama_barberman` varchar(50) NOT NULL,
  `barberman_deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data untuk tabel `barberman`
--

INSERT INTO `barberman` (`id_barberman`, `nama_barberman`, `barberman_deleted_at`) VALUES
(1, 'Sileh', NULL),
(2, 'Atmoko', NULL),
(3, 'Yuanita A', NULL),
(4, 'Padang Perwira', NULL),
(5, 'Test', '2021-07-01 13:48:08'),
(6, 'Alhamdulillah Gan', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `boking`
--

CREATE TABLE `boking` (
  `id_boking` int NOT NULL,
  `id_pesan` varchar(20) NOT NULL,
  `id_paket` int NOT NULL,
  `id_waktu` int NOT NULL,
  `hari` varchar(50) NOT NULL,
  `id_barberman` int DEFAULT NULL,
  `id_user` int NOT NULL,
  `waktu_order` varchar(50) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data untuk tabel `boking`
--

INSERT INTO `boking` (`id_boking`, `id_pesan`, `id_paket`, `id_waktu`, `hari`, `id_barberman`, `id_user`, `waktu_order`, `pembayaran`, `status`) VALUES
(74, 'ALDYS-NM2B-379', 48, 12, 'Jul 03, 2021', 3, 155, 'July 2, 2021 01:28:25', 'Uang Cash', 'success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `boking_manual`
--

CREATE TABLE `boking_manual` (
  `id_manual` int NOT NULL,
  `id_pesan` varchar(20) NOT NULL,
  `id_paket` int NOT NULL,
  `waktu_transaksi` varchar(20) NOT NULL,
  `id_barberman` int DEFAULT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_kasir` int DEFAULT NULL,
  `status_member` varchar(10) DEFAULT NULL,
  `total_bayar` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `boking_manual`
--

INSERT INTO `boking_manual` (`id_manual`, `id_pesan`, `id_paket`, `waktu_transaksi`, `id_barberman`, `nama_pelanggan`, `pembayaran`, `status`, `id_kasir`, `status_member`, `total_bayar`) VALUES
(41, 'ALDYS-Ovqw-440', 44, 'Jul 2, 2021 01:23', 1, 'Putri Wahyu', 'BRI', 'success', 154, 'member', 12000),
(42, 'ALDYS-kawM-191', 48, 'Jul 2, 2021 01:24', 4, 'Dipay', 'Uang Cash', 'success', 154, 'umum', 37050);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int NOT NULL,
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
(1, 'Owner Aldys Barbershop', 'owner@owner.com', 'abc', 'L', '089669413260', 'owner', '5cff29c370079.jpg'),
(143, 'Rahma Purnama', 'tes@tes', 'tes', 'L', '089669413260', 'member', '5cf375e3b82ce.jpg'),
(149, 'Aku Admin', 'admin@admin', 'tes', 'L', '978987978', 'admin', '605c8ecf14fd7.png'),
(150, 'Rahma Purnama', 'purwantiibuku@gmail.com', 'asdasdasd', 'L', '08982002040', 'member', '605c88587ae9b.png'),
(152, 'Kamu Member', 'member@member', 'abc12345', 'L', '978987978', 'member', ''),
(154, 'Kasir Satu', 'cobavoba17@gmail.com', 'abc12345', 'L', '089669413260', 'kasir', '60da0f4719d42.png'),
(155, 'Tohomas Refaldy', 'thomas@demo.com', 'asdasdasd', 'L', '08982002040', 'member', '60de0934b4081.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_pesan` varchar(20) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `tgl_acc` varchar(50) NOT NULL,
  `pendapatan` int NOT NULL,
  `laporan_created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_pesan`, `jenis_transaksi`, `admin`, `tgl_acc`, `pendapatan`, `laporan_created_at`) VALUES
('ALDYS-kawM-191', 'Offline', 'Kasir Satu', '02 July, 2021', 37050, '2021-07-02 00:21:15'),
('ALDYS-NM2B-379', 'Online', 'Owner Aldys Barbershop', '02 July, 2021', 37050, '2021-07-02 01:31:14'),
('ALDYS-Ovqw-440', 'Offline', 'Kasir Satu', '02 July, 2021', 12000, '2021-07-02 01:32:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_harga`
--

CREATE TABLE `paket_harga` (
  `id_paket` int NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `harga_paket` int NOT NULL,
  `harga_paket_member` int DEFAULT NULL,
  `ket_paket` varchar(100) NOT NULL,
  `detail_paket` text NOT NULL,
  `diskon_harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data untuk tabel `paket_harga`
--

INSERT INTO `paket_harga` (`id_paket`, `nama_paket`, `harga_paket`, `harga_paket_member`, `ket_paket`, `detail_paket`, `diskon_harga`) VALUES
(24, 'Max', 12000, 10000, 'Ini dapat menambah kegantengan anda menjadi maxsimal', 'Cukur, Keramas', 15),
(27, 'Hemat', 9000, 7000, 'Harga Untuk Mahasiswa', 'Cukur', 10),
(28, 'Ganteng', 12000, 10000, 'Ini dapat menambah kegantengan anda menjadi maxsimal', 'Hair Tatto, Cukur', 10),
(44, 'Axis (HOT)', 15000, 12000, 'Paket terkini untuk rambut buluk anda', 'Semir,Semir Special, Cukur', 0),
(45, 'Final', 20000, 16000, 'Paket Baru Aldys Barbershop', 'Pijat,Semir Special,Styling Pomade', 0),
(46, 'Baru', 6000, 5000, 'Paket ini adalah paket super baru', 'Cukur,Semir', 0),
(47, 'Paket Ansi', 13000, 9000, 'Paket ini di buat untuk FP ansi minggu depan.', 'Semir,Styling Pomade,Hair Tatto,Perawatan Jenggot', 20),
(48, 'Paket New', 39000, 35000, 'Paket baru dari Barbershop Kami', 'Semir,Pijat,Keramas', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_boking`
--

CREATE TABLE `waktu_boking` (
  `id_waktu` int NOT NULL,
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
-- Indeks untuk tabel `barberman`
--
ALTER TABLE `barberman`
  ADD PRIMARY KEY (`id_barberman`);

--
-- Indeks untuk tabel `boking`
--
ALTER TABLE `boking`
  ADD PRIMARY KEY (`id_boking`),
  ADD KEY `id_barberman` (`id_barberman`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_waktu` (`id_waktu`);

--
-- Indeks untuk tabel `boking_manual`
--
ALTER TABLE `boking_manual`
  ADD PRIMARY KEY (`id_manual`),
  ADD KEY `boking_manual_ibfk_1` (`id_barberman`),
  ADD KEY `boking_manual_ibfk_2` (`id_paket`),
  ADD KEY `id_kasir` (`id_kasir`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `paket_harga`
--
ALTER TABLE `paket_harga`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `waktu_boking`
--
ALTER TABLE `waktu_boking`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barberman`
--
ALTER TABLE `barberman`
  MODIFY `id_barberman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `boking`
--
ALTER TABLE `boking`
  MODIFY `id_boking` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `boking_manual`
--
ALTER TABLE `boking_manual`
  MODIFY `id_manual` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT untuk tabel `paket_harga`
--
ALTER TABLE `paket_harga`
  MODIFY `id_paket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `waktu_boking`
--
ALTER TABLE `waktu_boking`
  MODIFY `id_waktu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `boking`
--
ALTER TABLE `boking`
  ADD CONSTRAINT `boking_ibfk_1` FOREIGN KEY (`id_barberman`) REFERENCES `barberman` (`id_barberman`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `boking_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boking_ibfk_4` FOREIGN KEY (`id_waktu`) REFERENCES `waktu_boking` (`id_waktu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `boking_manual`
--
ALTER TABLE `boking_manual`
  ADD CONSTRAINT `boking_manual_ibfk_1` FOREIGN KEY (`id_barberman`) REFERENCES `barberman` (`id_barberman`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `boking_manual_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket_harga` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boking_manual_ibfk_3` FOREIGN KEY (`id_kasir`) REFERENCES `data_user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
