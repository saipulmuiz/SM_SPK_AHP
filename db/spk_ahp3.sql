-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2020 pada 10.31
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_ahp3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pw_kriteria`
--

CREATE TABLE `pw_kriteria` (
  `id` int(2) NOT NULL,
  `pw1` varchar(5) NOT NULL,
  `pw2` varchar(5) NOT NULL,
  `pw3` varchar(5) NOT NULL,
  `pw4` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id_alternatif` varchar(7) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
('alt-001', 'Usaha Makanan Beku'),
('alt-002', 'Bertani Hidroponik'),
('alt-003', 'Usaha Cemilan Pedas'),
('alt-004', 'Usaha Masker dan Alkes'),
('alt-005', 'Usaha Fashion');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` varchar(7) NOT NULL,
  `kd_kriteria` varchar(7) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `kd_kriteria`, `nama_kriteria`) VALUES
('krt-001', 'C1', 'Peluang Pasar dan Pelanggan'),
('krt-002', 'C2', 'Modal Awal'),
('krt-003', 'C3', 'Analisis Keuntungan'),
('krt-004', 'C4', 'Biaya Operasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `ket_nilai` varchar(150) DEFAULT NULL,
  `jml_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `ket_nilai`, `jml_nilai`) VALUES
(1, 'Sama penting dengan', 1),
(2, 'Mendekati sedikit lebih penting dari', 2),
(3, 'Sedikit lebih penting dari', 3),
(4, 'Mendekati lebih penting dari', 4),
(5, 'Lebih penting dari', 5),
(6, 'Mendekati sangat penting dari', 6),
(7, 'Sangat penting dari', 7),
(8, 'Mendekati mutlak dari', 8),
(9, 'Mutlak sangat penting dari', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perb_alternatif`
--

CREATE TABLE `tb_perb_alternatif` (
  `id_alternatif` varchar(5) NOT NULL,
  `nm_banding` varchar(30) NOT NULL,
  `nb_db` int(5) NOT NULL,
  `alternatif1` varchar(30) NOT NULL,
  `alternatif2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_perb_alternatif`
--

INSERT INTO `tb_perb_alternatif` (`id_alternatif`, `nm_banding`, `nb_db`, `alternatif1`, `alternatif2`) VALUES
('A01', '1. Sama penting dengan', 1, 'Usaha Makanan Beku', 'Usaha Makanan Beku'),
('A02', '1. Sama penting dengan', 1, 'Bertani Hidroponik', 'Bertani Hidroponik'),
('A03', '1. Sama penting dengan', 1, 'Usaha Cemilan Pedas', 'Usaha Cemilan Pedas'),
('A04', '1. Sama penting dengan', 1, 'Usaha Masker dan Alkes', 'Usaha Masker dan Alkes'),
('A05', '1. Sama penting dengan', 1, 'Usaha Fashion', 'Usaha Fashion');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perb_kriteria`
--

CREATE TABLE `tb_perb_kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nilai_banding` int(5) NOT NULL,
  `kriteria1` varchar(30) NOT NULL,
  `nm_banding` varchar(30) NOT NULL,
  `kriteria2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_perb_kriteria`
--

INSERT INTO `tb_perb_kriteria` (`id_kriteria`, `nilai_banding`, `kriteria1`, `nm_banding`, `kriteria2`) VALUES
('B01', 1, 'Peluang Pasar dan Pelanggan', '1. Sama penting dengan', 'Peluang Pasar dan Pelanggan'),
('B02', 1, 'Modal Awal', '1. Sama penting dengan', 'Modal Awal'),
('B03', 1, 'Analisis Keuntungan', '1. Sama penting dengan', 'Analisis Keuntungan'),
('B04', 1, 'Biaya Operasional', '1. Sama penting dengan', 'Biaya Operasional');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pw_kriteria`
--
ALTER TABLE `pw_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tb_perb_alternatif`
--
ALTER TABLE `tb_perb_alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indeks untuk tabel `tb_perb_kriteria`
--
ALTER TABLE `tb_perb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pw_kriteria`
--
ALTER TABLE `pw_kriteria`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
