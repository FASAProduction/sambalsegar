-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2022 pada 03.26
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sambal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `nama_lengkap`, `jenis_kelamin`, `telepon`) VALUES
(1, 'antanasiusdela@sambalrn.com', '7c222fb2927d828af22f592134e8932480637c0d', 'Antanasius Dela', 'Laki-laki', '081234567890'),
(4, 'fazal@sambalrn.com', '849b0a7dcb9fd41b44d08923b270e9132f42a241', 'Fazal Said', 'Laki-laki', '0192837465'),
(5, 'unknown@sambalrn.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Unknown', 'Laki-laki', '0192837465');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email`, `password`, `nama_lengkap`, `alamat`, `telepon`) VALUES
(3, 'fredianto@sambalrn.com', '7c222fb2927d828af22f592134e8932480637c0d', 'Fredianto', 'Lorem', '081234567890'),
(4, 'fazalsaid@fastechnology.id', '849b0a7dcb9fd41b44d08923b270e9132f42a241', 'Fazal Said', 'Jogja', '123098456789'),
(6, 'andyps@fastechnology.id', '74df3368cfbb67253eac6f78ce728bbf3827e840', 'Andy PS', 'Yogya', '102938475678'),
(7, 'saputradela121@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'adi saputra', 'lahat,sumsel', '081274542808'),
(8, 'saaya@mail.jp', '0aa784d3270f02a8907330fd4b7ea6ed0bc2a73a', 'Yamabuki Saaya', 'Tokyo, Japan', '123098456987');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_admin`, `nama_produk`, `deskripsi`, `stok`, `harga`, `gambar`) VALUES
(11, 1, 'Sambal Bawang Cumi', 'Lorem ipsum', 9, 18000, '0MSGqbCAJB.jpeg'),
(12, 1, 'Sambal Terasi Cumi', 'Lorem ipsum', 10, 18000, 'RmVCNTqldO.jpeg'),
(13, 1, 'Sambal Bawang Original', 'Lorem ipsum', 10, 13000, 'j9eUHvBLDP.jpeg'),
(14, 1, 'Sambal Terasi Original', 'Lorem ipsum', 10, 13000, 'To2Geu9XmM.jpeg'),
(15, 1, 'Sambal Bawang Pete', 'Lorem ipsum', 10, 17000, 'WVSYMm7o6i.jpeg'),
(16, 1, 'Sambal Terasi Pete', 'Lorem ipsum', 9, 17000, '7TElekt83U.jpeg'),
(17, 1, 'Sambal Bawang Teri', 'Lorem ipsum', 10, 16000, 'gCWEnKRPYM.jpeg'),
(18, 1, 'Sambal Terasi Teri', 'Lorem ipsum', 10, 16000, 'iOrM4vEbGX.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `status_bayar` enum('Belum Bayar','Sudah Bayar') NOT NULL,
  `status_kirim` enum('Dikemas','Dikirim','Selesai') NOT NULL,
  `payment_method` varchar(6) NOT NULL,
  `payment` text NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_pelanggan`, `id_produk`, `qty`, `tanggal`, `total`, `status_bayar`, `status_kirim`, `payment_method`, `payment`, `id_admin`) VALUES
(69, 'TR-SRN0001', 4, 12, 3, '2022-02-23', 54000, 'Sudah Bayar', 'Selesai', '', '', 4),
(70, 'TR-SRN0001', 4, 15, 2, '2022-02-23', 34000, 'Sudah Bayar', 'Selesai', '', '', 4),
(71, 'TR-SRN0002', 4, 18, 5, '2022-02-23', 80000, 'Sudah Bayar', 'Dikirim', '', '', 4),
(72, 'TR-SRN0003', 8, 14, 5, '2022-02-24', 65000, 'Sudah Bayar', 'Dikirim', 'BT', 'Evrday.png', 4),
(73, 'TR-SRN0003', 8, 16, 2, '2022-02-24', 34000, 'Sudah Bayar', 'Dikirim', 'BT', 'Evrday.png', 4),
(74, 'TR-SRN0004', 7, 17, 16, '2022-02-24', 256000, 'Sudah Bayar', 'Dikemas', '', '', 4),
(75, 'TR-SRN0005', 8, 18, 2, '2022-02-24', 32000, 'Belum Bayar', 'Dikemas', 'COD', 'ibudananak-removebg-preview.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
