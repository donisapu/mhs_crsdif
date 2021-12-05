-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 06:15 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan_pes_evie`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_angsuran_bangunan`
--

CREATE TABLE `detail_angsuran_bangunan` (
  `id_detail_angsuran_bangunan` int(11) NOT NULL,
  `id_pembayaran_bangunan` char(15) NOT NULL,
  `nominal_angsur` int(11) NOT NULL,
  `bukti_bayar_bangunan` varchar(25) DEFAULT NULL,
  `status_bayar_bangunan` enum('Belum Bayar','Tunggu Konfirmasi','Sudah Bayar') NOT NULL,
  `sisa_angsuran` int(3) NOT NULL,
  `id_pengguna` int(3) DEFAULT NULL,
  `tgl_bayar` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='dibuatkan dlu oleh bendahara';

--
-- Dumping data for table `detail_angsuran_bangunan`
--

INSERT INTO `detail_angsuran_bangunan` (`id_detail_angsuran_bangunan`, `id_pembayaran_bangunan`, `nominal_angsur`, `bukti_bayar_bangunan`, `status_bayar_bangunan`, `sisa_angsuran`, `id_pengguna`, `tgl_bayar`) VALUES
(1, 'PBA280521001', 1000000, 'buk1622175150.png', 'Sudah Bayar', 4, 2, '2021-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran_bulanan`
--

CREATE TABLE `detail_pembayaran_bulanan` (
  `id_detail_pembayaran_bulanan` char(15) NOT NULL,
  `id_pembayaran_bulanan` int(11) NOT NULL,
  `id_santri` char(5) NOT NULL,
  `nominal_bayar` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `bukti_bayar_bulanan` varchar(25) DEFAULT NULL,
  `status_bayar_bulanan` enum('Belum Bayar','Tunggu Konfirmasi','Sudah Bayar') NOT NULL,
  `id_pengguna` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='dibuatkan dlu oleh bendahara';

--
-- Dumping data for table `detail_pembayaran_bulanan`
--

INSERT INTO `detail_pembayaran_bulanan` (`id_detail_pembayaran_bulanan`, `id_pembayaran_bulanan`, `id_santri`, `nominal_bayar`, `tgl_pembayaran`, `bukti_bayar_bulanan`, `status_bayar_bulanan`, `id_pengguna`) VALUES
('PBU280521001', 1, 'ST001', 75000, '2021-05-28', 'bul1622224109.png', 'Sudah Bayar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengeluaran`
--

CREATE TABLE `detail_pengeluaran` (
  `id_detail_pengeluaran` int(11) NOT NULL,
  `id_pengeluaran` varchar(15) NOT NULL,
  `nama_barang` varchar(55) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pengeluaran`
--

INSERT INTO `detail_pengeluaran` (`id_detail_pengeluaran`, `id_pengeluaran`, `nama_barang`, `harga_satuan`, `jumlah`, `subtotal`) VALUES
(1, 'PEN280521001', 'Iqro 1', 25000, 15, 375000),
(2, 'PEN280521001', 'Jus Ama', 20000, 5, 100000),
(3, 'PEN280521001', 'Meja Ngaji', 50000, 5, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `judul_informasi` varchar(100) NOT NULL,
  `isi_info` text NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `status_publish` enum('Tidak','Publish') NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul_informasi`, `isi_info`, `gambar`, `status_publish`, `id_pengguna`, `updated`) VALUES
(1, 'Ayo Segera ikuti lomba dakwah pesantren', 'Segera daftar kan diri kamu agar menjadi dai pesantren yang terpandang dan berguna bagi nusa bangsa dan agama serta membanggakan orang tua dan tetangga.', 'gbr1622110420.png', 'Publish', 1, '2021-05-27 10:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_bangunan`
--

CREATE TABLE `pembayaran_bangunan` (
  `id_pembayaran_bangunan` char(15) NOT NULL,
  `id_santri` char(5) NOT NULL,
  `biaya_bangunan` int(11) NOT NULL,
  `banyak_angsuran` int(3) NOT NULL,
  `id_pengguna` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran_bangunan`
--

INSERT INTO `pembayaran_bangunan` (`id_pembayaran_bangunan`, `id_santri`, `biaya_bangunan`, `banyak_angsuran`, `id_pengguna`) VALUES
('PBA280521001', 'ST001', 5000000, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_bulanan`
--

CREATE TABLE `pembayaran_bulanan` (
  `id_pembayaran_bulanan` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` year(4) NOT NULL,
  `biaya_bulanan` int(11) NOT NULL,
  `id_pengguna` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran_bulanan`
--

INSERT INTO `pembayaran_bulanan` (`id_pembayaran_bulanan`, `bulan`, `tahun`, `biaya_bulanan`, `id_pengguna`) VALUES
(1, 'Juni', 2021, 75000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` char(15) NOT NULL,
  `nama_pengeluaran` varchar(55) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `nama_pengeluaran`, `tgl_pengeluaran`, `id_pengguna`) VALUES
('PEN280521001', 'Perlengkapan Mengaji', '2021-05-28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(3) NOT NULL,
  `nama_pengguna` varchar(55) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `level` enum('Admin','Bendahara') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `no_telp`, `alamat`, `username`, `password`, `level`) VALUES
(1, 'Evie Sapaya Mbuh', '08578090921', 'Cilacap', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'Ana Indrayanti S', '085678334899', 'Cilacap', 'bendahara1', '6055f5e3a07e8afbe2c365a4a89a4cc2', 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` char(5) NOT NULL,
  `nama_santri` varchar(55) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(55) NOT NULL,
  `alamat_san` text NOT NULL,
  `no_telp_san` varchar(15) NOT NULL,
  `ktp_wali` varchar(25) NOT NULL,
  `nama_wali` varchar(55) NOT NULL,
  `username_san` varchar(55) NOT NULL,
  `password_san` varchar(55) NOT NULL,
  `status_santri` enum('Aktif','Tidak aktif') NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id_santri`, `nama_santri`, `jenis_kelamin`, `tgl_lahir`, `tempat_lahir`, `alamat_san`, `no_telp_san`, `ktp_wali`, `nama_wali`, `username_san`, `password_san`, `status_santri`, `id_pengguna`, `updated`) VALUES
('ST001', 'Hinayah Andriani', 'Perempuan', '2002-02-02', 'Cilacap', 'Cilacap Lor banget adohe sumpah', '08578090921', 'ktp1622107734.jpg', 'Sarniah', 'hinayah', 'hinayah', 'Aktif', 1, '2021-05-28 15:50:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_angsuran_bangunan`
--
ALTER TABLE `detail_angsuran_bangunan`
  ADD PRIMARY KEY (`id_detail_angsuran_bangunan`);

--
-- Indexes for table `detail_pembayaran_bulanan`
--
ALTER TABLE `detail_pembayaran_bulanan`
  ADD PRIMARY KEY (`id_detail_pembayaran_bulanan`);

--
-- Indexes for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  ADD PRIMARY KEY (`id_detail_pengeluaran`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `pembayaran_bangunan`
--
ALTER TABLE `pembayaran_bangunan`
  ADD PRIMARY KEY (`id_pembayaran_bangunan`);

--
-- Indexes for table `pembayaran_bulanan`
--
ALTER TABLE `pembayaran_bulanan`
  ADD PRIMARY KEY (`id_pembayaran_bulanan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_angsuran_bangunan`
--
ALTER TABLE `detail_angsuran_bangunan`
  MODIFY `id_detail_angsuran_bangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  MODIFY `id_detail_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran_bulanan`
--
ALTER TABLE `pembayaran_bulanan`
  MODIFY `id_pembayaran_bulanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
