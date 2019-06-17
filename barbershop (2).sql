-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jun 2019 pada 18.55
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
(24, 'KPK-1GbA-188', 27, 1, 'May 31, 2019', 1, 143, 'June 3, 2019 07:01:36', 'BRI', 'expired'),
(25, 'KPK-FuQe-985', 27, 1, 'Jan 27, 0004', 1, 143, 'June 3, 2019 07:05:07', 'BRI', 'expired'),
(28, 'KPK-Aear-643', 27, 2, 'Jun 13, 2019', 1, 110, 'June 4, 2019 09:45:10', 'BRI', 'expired'),
(29, 'KPK-fi2Z-563', 44, 1, 'Jun 22, 2019', 1, 110, 'June 4, 2019 10:51:30', 'BCA', 'expired'),
(30, 'KPK-Cvfm-722', 24, 19, 'Jan 16, 2019', 1, 110, 'June 4, 2019 10:53:20', 'BRI', 'pending'),
(31, 'KPK-Nk3y-018', 27, 12, 'Jun 29, 2019', 1, 104, 'June 4, 2019 12:55:59', 'BRI', 'expired'),
(32, 'KPK-S26t-472', 44, 19, 'Jun 29, 2019', 1, 143, 'June 4, 2019 14:57:05', 'BRI', 'expired'),
(33, 'KPK-NUSU-054', 27, 17, 'Jun 10, 2019', 2, 143, 'June 9, 2019 00:14:17', 'BRI', 'expired'),
(36, 'KPK-nYWb-392', 24, 17, 'Jan 16, 0005', 2, 143, 'June 9, 2019 02:13:33', 'BRI', 'expired'),
(38, 'KPK-KQ4Z-573', 28, 19, 'Jan 03, 0005', 1, 143, 'June 9, 2019 02:22:03', 'BRI', 'expired'),
(43, 'KPK-zV1Q-763', 44, 19, 'Jun 29, 2019', 2, 143, 'June 9, 2019 02:24:50', 'MANDIRI', 'expired'),
(45, 'KPK-D0x5-130', 28, 20, 'Jun 29, 2019', 2, 143, 'June 9, 2019 02:27:01', 'MANDIRI', 'expired'),
(47, 'KPK-bqyo-371', 44, 12, 'Jun 29, 2019', 1, 143, 'June 9, 2019 02:28:30', 'BCA', 'expired'),
(50, 'KPK-88nC-045', 27, 20, 'Jun 29, 2019', 1, 143, 'June 9, 2019 02:29:06', 'MANDIRI', 'expired'),
(51, 'KPK-XIPX-564', 24, 22, 'Jun 29, 2019', 2, 143, 'June 9, 2019 02:32:07', 'MANDIRI', 'expired'),
(52, 'KPK-lq2s-296', 28, 5, 'Jul 17, 2019', 1, 143, 'June 9, 2019 02:33:27', 'BCA', 'expired'),
(53, 'KPK-CMrv-515', 27, 22, 'Jun 29, 2019', 1, 143, 'June 12, 2019 19:10:07', 'MANDIRI', 'expired'),
(54, 'KPK-hkW9-970', 27, 7, 'Jun 13, 2019', 2, 1, 'June 12, 2019 19:45:46', 'MANDIRI', 'expired'),
(55, 'KPK-pOXS-209', 27, 6, 'Jul 11, 2019', 1, 143, 'June 13, 2019 19:01:38', 'BCA', 'expired');

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
(3, 'KPK-i9Tm-641', 24, 'Jun 16, 2019 21:43', 1, 'Rahma', 'BRI', 'success'),
(4, 'KPK-D9UF-753', 28, 'Jun 16, 2019 21:44', 1, 'Rahma Ap', 'Uang Cash', 'success'),
(5, 'KPK-Hf62-808', 28, 'Jun 16, 2019 22:35', 2, 'hoho', 'Uang Cash', 'success'),
(12, 'KPK-qAOV-311', 24, 'Jun 17, 2019 22:52', 2, 'fdsf', 'MANDIRI', 'success'),
(13, 'KPK-3KgH-331', 24, 'Jun 17, 2019 22:58', 2, 'wkwk', 'BCA', 'success'),
(14, 'KPK-k5LM-291', 44, 'Jun 17, 2019 23:08', 1, 'alhamdulillah', 'Uang Cash', 'success');

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
(1, 'Rahma Purnama', 'purwantiibuku@gmail.com', 'abc', 'L', '089669413260', 'owner', '5cff29c370079.jpg'),
(104, 'Kimmi Himme', 'cobavoba17@gmail.com', 'abc', 'P', '2147483647', 'admin', '5cf607dfcf30c.jpg'),
(110, 'Suhono Hono', 'cobavoba17@gmail.comXX', '123xvxcv', 'L', '2147483647', 'member', '5cf5dae20b147.jpg'),
(125, 'RahmaX Sangar', 'yahuu@gmail.com', '123456', 'L', '089669413260', 'member', '5caf7c8fcc3f2.jpg'),
(143, 'Rahma Purnama', 'tes@tes', 'tes', 'L', '089669413260', 'member', '5cf375e3b82ce.jpg'),
(146, 'Riski Sudian', 'riski@gmail.com', 'abc123456', 'L', '', 'member', '5cb98eb38e0a7.docx'),
(147, 'Rahma Purnama', 'purwantiibukcxcu@gmail.com', 'asd111', 'P', '089669413260', 'member', '5cacc9fc52e66.jpg'),
(148, 'Yogi Darma', 'yogidarma@gmail.com', 'abc123', 'L', '', 'member', '5d00ed0a3af2c.jpg');

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
(27, 'Paket Hemat', 9000, 'Harga Untuk Mahasiswa', 'AK,AZ,DE', 0),
(28, 'Paket Ganteng', 12000, 'Ini dapat menambah kegantengan anda menjadi maxsimal', 'AK,CA', 0),
(44, 'Paket Axis (HOT)', 15000, 'Paket terkini untuk rambut anda', 'AK', 5);

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
  ADD KEY `id_barberman` (`id_barberman`),
  ADD KEY `id_paket` (`id_paket`);

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
  MODIFY `id_boking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `boking_manual`
--
ALTER TABLE `boking_manual`
  MODIFY `id_manual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `paket_harga`
--
ALTER TABLE `paket_harga`
  MODIFY `id_paket` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  ADD CONSTRAINT `boking_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket_harga` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boking_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boking_ibfk_4` FOREIGN KEY (`id_waktu`) REFERENCES `waktu_boking` (`id_waktu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `boking_manual`
--
ALTER TABLE `boking_manual`
  ADD CONSTRAINT `boking_manual_ibfk_1` FOREIGN KEY (`id_barberman`) REFERENCES `barberman` (`id_barberman`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `boking_manual_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket_harga` (`id_paket`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
