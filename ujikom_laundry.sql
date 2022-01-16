-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2022 pada 03.07
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `paket_id` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `transaksi_id`, `paket_id`, `qty`, `total_harga`, `keterangan`, `total_bayar`) VALUES
(9, 33, 4, 10, 150000, NULL, 200000),
(10, 34, 4, 5, 75000, NULL, 80000),
(11, 35, 4, 3, 45000, NULL, 40000),
(12, 36, 4, 10, 150000, NULL, 160000),
(13, 37, 4, 10, 150000, NULL, 160000),
(14, 38, 4, 20, 300000, NULL, 310000),
(15, 39, 4, 10, 150000, NULL, 160000),
(16, 40, 4, 10, 150000, NULL, 200000),
(17, 43, 4, 10, 150000, NULL, NULL),
(18, 45, 4, 10, 150000, NULL, 160000),
(19, 46, 4, 12, 90000, NULL, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) DEFAULT NULL,
  `alamat_member` text DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telp_member` varchar(15) DEFAULT NULL,
  `no_ktp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `alamat_member`, `jenis_kelamin`, `telp_member`, `no_ktp`) VALUES
(5, 'Abang Fikri', 'Ciamis', 'L', '0821340411', '123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama_outlet` varchar(100) DEFAULT NULL,
  `alamat_outlet` text DEFAULT NULL,
  `telp_outlet` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `outlet`
--

INSERT INTO `outlet` (`id_outlet`, `nama_outlet`, `alamat_outlet`, `telp_outlet`) VALUES
(26, 'Outlet Mawar', 'Jalan Mawar', '081243555656'),
(27, 'Outlet SawoJajar', 'Danau Ranau', '085155228237');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `jenis_paket` enum('kiloan','selimut','bedcover','kaos','lain') DEFAULT NULL,
  `nama_paket` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `outlet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `jenis_paket`, `nama_paket`, `harga`, `outlet_id`) VALUES
(4, 'kiloan', 'Paket Kering Wangi', 15000, 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `outlet_id` int(11) DEFAULT NULL,
  `kode_invoice` varchar(100) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `batas_waktu` datetime DEFAULT NULL,
  `tgl_pembayaran` datetime DEFAULT NULL,
  `biaya_tambahan` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `status` enum('baru','proses','selesai','diambil') DEFAULT NULL,
  `status_bayar` enum('dibayar','belum') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `outlet_id`, `kode_invoice`, `member_id`, `tgl`, `batas_waktu`, `tgl_pembayaran`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `status_bayar`, `user_id`) VALUES
(33, 26, 'DRY202003213927', 5, '2020-03-21 02:27:48', '2020-03-28 12:00:00', '2020-03-21 02:28:03', 0, 0, 0, 'diambil', 'dibayar', 11),
(34, 26, 'DRY202201155857', 5, '2022-01-15 12:58:37', '2022-01-22 12:00:00', '2022-01-15 12:59:42', 0, 0, 0, 'diambil', 'dibayar', 1),
(35, 26, 'DRY202201152038', 5, '2022-01-15 01:38:35', '2022-01-22 12:00:00', '2022-01-15 01:48:55', 0, 0, 0, 'diambil', 'dibayar', 1),
(36, 26, 'DRY202201152623', 5, '2022-01-15 03:23:45', '2022-01-22 12:00:00', '2022-01-15 03:24:35', 0, 0, 0, 'diambil', 'dibayar', 1),
(37, 26, 'DRY202201152316', 5, '2022-01-15 04:16:30', '2022-01-22 12:00:00', '2022-01-15 04:16:50', 0, 0, 0, 'diambil', 'dibayar', 1),
(38, 26, 'DRY202201152554', 5, '2022-01-15 10:54:30', '2022-01-22 12:00:00', '2022-01-15 10:54:49', 0, 0, 0, 'diambil', 'dibayar', 1),
(39, 26, 'DRY202201155856', 5, '2022-01-15 10:57:29', '2022-01-22 12:00:00', '2022-01-15 10:57:55', 0, 50, 0, 'diambil', 'dibayar', 1),
(40, 26, 'DRY202201153020', 5, '2022-01-15 11:20:41', '2022-01-22 12:00:00', '2022-01-15 11:41:05', 0, 50, 0, 'diambil', 'dibayar', 1),
(41, 26, 'DRY202201153621', 5, '2022-01-15 11:21:43', '2022-01-22 12:00:00', NULL, 0, 50, 0, 'baru', 'belum', 1),
(42, 26, 'DRY202201151022', 5, '2022-01-15 11:22:13', '2022-01-22 12:00:00', NULL, 0, 50, 0, 'baru', 'belum', 1),
(43, 26, 'DRY202201154422', 5, '2022-01-15 11:22:47', '2022-01-22 12:00:00', NULL, 0, 50, 0, 'baru', 'belum', 1),
(44, 26, 'DRY202201151423', 5, '2022-01-15 11:23:18', '2022-01-22 12:00:00', NULL, 0, 0, 0, 'baru', 'belum', 1),
(45, 26, 'DRY202201153923', 5, '2022-01-15 11:23:44', '2022-01-22 12:00:00', '2022-01-15 11:43:33', 0, 50, 0, 'diambil', 'dibayar', 1),
(46, 26, 'DRY202201151027', 5, '2022-01-15 11:27:16', '2022-01-22 12:00:00', '2022-01-15 11:28:42', 0, 50, 0, 'diambil', 'dibayar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `outlet_id` int(11) DEFAULT NULL,
  `role` enum('admin','kasir','owner') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `outlet_id`, `role`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 26, 'admin'),
(10, 'Bapak Mawar', 'mawar', 'bd117502364227fd8c09098d31e11313', 26, 'owner'),
(11, 'kasirmawar', 'kasirmawar', 'b1890f61964dde27871070f0853cc72f', 26, 'kasir'),
(13, 'Bapak SawoJajar', 'sawo', 'ad4e008e15e6e37f0cd6de8010aed4af', 27, 'owner'),
(14, 'Kasir SawoJajar', 'kasirsawo', 'eb3eb0c22b71e910147c97d5bf43360e', 27, 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `outlet_id` (`outlet_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id_paket`);

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`id_outlet`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`id_outlet`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id_member`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`id_outlet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
