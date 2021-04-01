-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2021 pada 07.27
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_parking`
--

CREATE TABLE `tr_parking` (
  `KodeTiket` varchar(10) NOT NULL,
  `JenisKendaraan` varchar(50) NOT NULL,
  `PlatNo` varchar(50) NOT NULL,
  `JamMasuk` datetime NOT NULL,
  `JamKeluar` datetime DEFAULT NULL,
  `Durasi` time DEFAULT NULL,
  `TarifParkir` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tr_parking`
--

INSERT INTO `tr_parking` (`KodeTiket`, `JenisKendaraan`, `PlatNo`, `JamMasuk`, `JamKeluar`, `Durasi`, `TarifParkir`) VALUES
('PC001', 'Mobil', 'A 0001 BB', '2021-03-30 10:09:00', '2021-03-31 10:09:00', '23:59:46', '72000'),
('PC002', 'Mobil', 'N 3444 WF', '2021-03-30 11:10:00', '2021-03-31 11:10:00', '23:59:19', 'Rp. 72.000'),
('PC003', 'Mobil', 'KH2828 DF', '2021-03-30 11:32:33', '2021-04-02 11:32:00', '71:59:26', 'Rp. 216.000'),
('PC004', 'Motor', 'N 2728 BB', '2021-03-30 11:47:24', '0000-00-00 00:00:00', '00:00:00', ''),
('PC005', 'Motor', 'B 4566 DAF', '2021-03-30 12:20:33', '2021-03-31 12:20:00', '23:59:27', 'Rp. 48.000,00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tr_parking`
--
ALTER TABLE `tr_parking`
  ADD PRIMARY KEY (`KodeTiket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
