-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2019 pada 10.41
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sierad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `kode`) VALUES
('admin', 'admin', 0),
('user', 'user', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id_app` int(11) NOT NULL,
  `visio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `av` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photoshop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ax` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vdi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lain` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aplikasi`
--

INSERT INTO `aplikasi` (`id_app`, `visio`, `av`, `photoshop`, `pdf`, `ax`, `vdi`, `lain`) VALUES
(3, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `hostname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_monitor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_inv` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_license` int(11) NOT NULL,
  `id_app` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_reparasi`
--

CREATE TABLE `histori_reparasi` (
  `id_detail` int(11) NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `batch` varchar(11) NOT NULL,
  `fpu` varchar(11) NOT NULL,
  `sparepart` varchar(100) NOT NULL,
  `btb` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_user`
--

CREATE TABLE `histori_user` (
  `id_detail` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `tgl_penyerahan` date NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id_inv` int(11) NOT NULL,
  `merk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processor` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hardisk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_asset` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id_inv`, `merk`, `type`, `processor`, `hardisk`, `ram`, `serial_number`, `tanggal`, `jumlah`, `status_asset`) VALUES
(3, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_asset`
--

CREATE TABLE `jenis_asset` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_asset`
--

INSERT INTO `jenis_asset` (`id_jenis`, `jenis`) VALUES
(1, 'ACCESS POINT'),
(2, 'IP PHONE'),
(3, 'KVM SWITCH'),
(4, 'NOTEBOOK'),
(5, 'PC DESKTOP'),
(6, 'PRINTER'),
(7, 'PROJECTOR'),
(8, 'ROUTER'),
(9, 'SCANNER'),
(10, 'SERVER FISIK'),
(11, 'SWITCH'),
(12, 'STORAGE'),
(13, 'THIN CLIENT'),
(14, 'UPS'),
(15, 'MONITOR'),
(16, 'CCTV'),
(17, 'SERVER VIRTUAL'),
(18, 'SMARTPHONE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `license`
--

CREATE TABLE `license` (
  `id_license` int(11) NOT NULL,
  `type_license` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `os` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sn_os` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sn_office` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sn_project` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `esqiel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sn_sql` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `license`
--

INSERT INTO `license` (`id_license`, `type_license`, `os`, `sn_os`, `office`, `sn_office`, `project`, `sn_project`, `esqiel`, `sn_sql`) VALUES
(3, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
(1, 'Jabon'),
(2, 'Feed Balaraja'),
(3, 'pams');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Corporate'),
(2, 'Balaraja'),
(3, 'Sidoarjo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_ad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id_app`);

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_inv` (`id_inv`),
  ADD KEY `id_license` (`id_app`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_jenis` (`id_jenis`,`id_user`),
  ADD KEY `id_unit` (`id_unit`),
  ADD KEY `id_license_2` (`id_license`);

--
-- Indeks untuk tabel `histori_reparasi`
--
ALTER TABLE `histori_reparasi`
  ADD KEY `id_detail` (`id_detail`);

--
-- Indeks untuk tabel `histori_user`
--
ALTER TABLE `histori_user`
  ADD KEY `id_detail` (`id_detail`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inv`);

--
-- Indeks untuk tabel `jenis_asset`
--
ALTER TABLE `jenis_asset`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id_license`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis_asset`
--
ALTER TABLE `jenis_asset`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `license`
--
ALTER TABLE `license`
  MODIFY `id_license` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `detail_ibfk_3` FOREIGN KEY (`id_inv`) REFERENCES `inventory` (`id_inv`),
  ADD CONSTRAINT `detail_ibfk_6` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_asset` (`id_jenis`),
  ADD CONSTRAINT `detail_ibfk_7` FOREIGN KEY (`id_license`) REFERENCES `license` (`id_license`),
  ADD CONSTRAINT `detail_ibfk_8` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`),
  ADD CONSTRAINT `detail_ibfk_9` FOREIGN KEY (`id_app`) REFERENCES `aplikasi` (`id_app`);

--
-- Ketidakleluasaan untuk tabel `histori_reparasi`
--
ALTER TABLE `histori_reparasi`
  ADD CONSTRAINT `histori_reparasi_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `detail` (`id_detail`);

--
-- Ketidakleluasaan untuk tabel `histori_user`
--
ALTER TABLE `histori_user`
  ADD CONSTRAINT `histori_user_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `detail` (`id_detail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
