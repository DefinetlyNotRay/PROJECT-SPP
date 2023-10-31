-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2023 pada 16.01
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_akun`
--

CREATE TABLE `data_akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `level` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_akun`
--

INSERT INTO `data_akun` (`id_akun`, `username`, `password`, `nama`, `level`) VALUES
(1, 'RayAdminD', '123', 'Edgar', 'admin'),
(2, 'RayPetugas', '123', 'Edgar', 'petugas'),
(3, 'RaySiswa', '123', 'Edgar', 'siswa'),
(4, 'Ceyo', '123', 'Ceyo', 'siswa'),
(5, 'Ilham', '123', 'Ilham', 'siswa'),
(6, 'JavaAdmin', '123', 'java', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'RPL XI', 'Programing'),
(2, 'OTKP XI', 'Managemen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pembayaran`
--

CREATE TABLE `data_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(8) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `id_akun_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `id_akun`) VALUES
('231380712', '21132', 'Ilham', 1, 'awddawjiod', '123441', 1, 5),
('3123123323', '23131', 'dawda', 1, 'dawd', 'dawd', 2, 3),
('4903728904', '4234', 'Ceyo', 1, 'awddawkdj', '23471', 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_spp`
--

CREATE TABLE `data_spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_spp`
--

INSERT INTO `data_spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2023, 100000),
(2, 2024, 200000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_akun`
--
ALTER TABLE `data_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_spp_siswa` (`id_spp`),
  ADD KEY `fk_akun` (`id_akun`),
  ADD KEY `fk_akun_siswa_pembayaran` (`id_akun_siswa`),
  ADD KEY `fk_nisn_pembayaran` (`nisn`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `fk_kelas` (`id_kelas`),
  ADD KEY `fk_spp` (`id_spp`),
  ADD KEY `fk_akun_siswa` (`id_akun`);

--
-- Indeks untuk tabel `data_spp`
--
ALTER TABLE `data_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_akun`
--
ALTER TABLE `data_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_spp`
--
ALTER TABLE `data_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD CONSTRAINT `fk_akun` FOREIGN KEY (`id_akun`) REFERENCES `data_akun` (`id_akun`),
  ADD CONSTRAINT `fk_akun_siswa_pembayaran` FOREIGN KEY (`id_akun_siswa`) REFERENCES `data_siswa` (`id_akun`),
  ADD CONSTRAINT `fk_nisn_pembayaran` FOREIGN KEY (`nisn`) REFERENCES `data_siswa` (`nisn`),
  ADD CONSTRAINT `fk_petugas` FOREIGN KEY (`id_akun`) REFERENCES `data_akun` (`id_akun`),
  ADD CONSTRAINT `fk_spp_siswa` FOREIGN KEY (`id_spp`) REFERENCES `data_siswa` (`id_spp`);

--
-- Ketidakleluasaan untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD CONSTRAINT `fk_akun_siswa` FOREIGN KEY (`id_akun`) REFERENCES `data_akun` (`id_akun`),
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `data_kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_spp` FOREIGN KEY (`id_spp`) REFERENCES `data_spp` (`id_spp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
