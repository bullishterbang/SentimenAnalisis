-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Agu 2021 pada 11.52
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penelitian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_coba`
--

CREATE TABLE `tb_coba` (
  `tes` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kata`
--

CREATE TABLE `tb_kata` (
  `kata` varchar(300) NOT NULL,
  `positif` int(11) NOT NULL,
  `negatif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_normalisasi`
--

CREATE TABLE `tb_normalisasi` (
  `ulasantesting` varchar(300) NOT NULL,
  `positif` int(11) NOT NULL,
  `negatif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_training`
--

CREATE TABLE `tb_training` (
  `ulasan` varchar(300) NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_coba`
--
ALTER TABLE `tb_coba`
  ADD PRIMARY KEY (`tes`);

--
-- Indeks untuk tabel `tb_kata`
--
ALTER TABLE `tb_kata`
  ADD PRIMARY KEY (`kata`);

--
-- Indeks untuk tabel `tb_normalisasi`
--
ALTER TABLE `tb_normalisasi`
  ADD PRIMARY KEY (`ulasantesting`);

--
-- Indeks untuk tabel `tb_training`
--
ALTER TABLE `tb_training`
  ADD PRIMARY KEY (`ulasan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
