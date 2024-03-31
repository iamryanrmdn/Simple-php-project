-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2023 pada 05.50
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_booking`
--

CREATE TABLE `tb_booking` (
  `no_booking` int(11) NOT NULL,
  `tgl_booking` date NOT NULL,
  `waktu_booking` varchar(5) NOT NULL,
  `nama_pembooking` varchar(30) NOT NULL,
  `no_hp_pembooking` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_booking`
--

INSERT INTO `tb_booking` (`no_booking`, `tgl_booking`, `waktu_booking`, `nama_pembooking`, `no_hp_pembooking`, `status`) VALUES
(2, '2023-07-27', 'W002', 'Zidan', '082345678905', 'Booking'),
(4, '2023-07-28', 'W004', 'Jawir', '0823456789055', 'Booking'),
(5, '2023-07-28', 'W005', 'Zidan', '0823456789055', 'Booking');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lapangan`
--

CREATE TABLE `tb_lapangan` (
  `kd_lapangan` varchar(5) NOT NULL,
  `nama_lapangan` varchar(20) NOT NULL,
  `harga_lapangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lapangan`
--

INSERT INTO `tb_lapangan` (`kd_lapangan`, `nama_lapangan`, `harga_lapangan`) VALUES
('L001', 'Lapangan 1', 120000),
('L002', 'Lapangan 2', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_waktu`
--

CREATE TABLE `tb_waktu` (
  `kd_waktu` varchar(5) NOT NULL,
  `nama_waktu` varchar(50) NOT NULL,
  `kd_lapangan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_waktu`
--

INSERT INTO `tb_waktu` (`kd_waktu`, `nama_waktu`, `kd_lapangan`) VALUES
('W001', 'Jam 08.00 - 10.00', 'L001'),
('W002', 'Jam 10.00 - 12.00', 'L001'),
('W003', 'Jam 12.00 - 14.00', 'L001'),
('W004', 'Jam 14.00 - 16.00', 'L001'),
('W005', 'Jam 16.00 - 18.00', 'L001'),
('W006', 'Jam 18.00 - 20.00', 'L001'),
('W007', 'Jam 20.00 - 22.00', 'L001'),
('W008', 'Jam 08.00 - 10.00', 'L002'),
('W009', 'Jam 10.00 - 12.00', 'L002'),
('W010', 'Jam 12.00 - 14.00', 'L002'),
('W011', 'Jam 14.00 - 16.00', 'L002'),
('W012', 'Jam 16.00 - 18.00', 'L002'),
('W013', 'Jam 18.00 - 20.00', 'L002'),
('W014', 'Jam 20.00 - 22.00', 'L002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_informasi_booking`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_informasi_booking` (
`kd_waktu` varchar(5)
,`tgl_booking` date
,`nama_pembooking` varchar(30)
,`nama_waktu` varchar(50)
,`nama_lapangan` varchar(20)
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_informasi_booking`
--
DROP TABLE IF EXISTS `view_informasi_booking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_informasi_booking`  AS SELECT DISTINCT `tb_waktu`.`kd_waktu` AS `kd_waktu`, `tb_booking`.`tgl_booking` AS `tgl_booking`, `tb_booking`.`nama_pembooking` AS `nama_pembooking`, `tb_waktu`.`nama_waktu` AS `nama_waktu`, `tb_lapangan`.`nama_lapangan` AS `nama_lapangan`, `tb_booking`.`status` AS `status` FROM ((`tb_waktu` left join `tb_lapangan` on(`tb_waktu`.`kd_lapangan` = `tb_lapangan`.`kd_lapangan`)) left join `tb_booking` on(`tb_waktu`.`kd_waktu` = `tb_booking`.`waktu_booking`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`no_booking`),
  ADD KEY `waktu_booking` (`waktu_booking`);

--
-- Indeks untuk tabel `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  ADD PRIMARY KEY (`kd_lapangan`);

--
-- Indeks untuk tabel `tb_waktu`
--
ALTER TABLE `tb_waktu`
  ADD PRIMARY KEY (`kd_waktu`),
  ADD KEY `kd_lapangan` (`kd_lapangan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `no_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`waktu_booking`) REFERENCES `tb_waktu` (`kd_waktu`);

--
-- Ketidakleluasaan untuk tabel `tb_waktu`
--
ALTER TABLE `tb_waktu`
  ADD CONSTRAINT `tb_waktu_ibfk_1` FOREIGN KEY (`kd_lapangan`) REFERENCES `tb_lapangan` (`kd_lapangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
