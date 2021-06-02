-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 08:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pal`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `nama`, `merek`, `tipe`, `harga`, `jumlah`, `foto`) VALUES
(1, ' Kamera ', 'Canon ', 'Canon EOS 3000D ', 300000, 25, 'Canon_EOS_3000D.jpg'),
(2, ' Kameraa', 'Nikkon ', 'Nikkon D3100 ', 250000, 30, 'Nikon_DSLR_D3100_kit__L_1.jpg'),
(3, ' Lensaa', 'Cannon ', 'Lensaa 50mm ', 100000, 15, 'lensa-kamera-canon.jpg'),
(9, 'Tripod', 'Takara', 'Stand Tripod', 50000, 60, 'TAKARA-Tripod-Kamera-ECO-196A-Min.jpg'),
(10, 'Tas Kamera', 'Canon', 'Slempang', 20000, 30, 'tas_kamera.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idcustomer`, `nama`, `NIK`, `alamat`, `notelp`) VALUES
(1, 'Anna', '1234', 'Jl. Kelapa No 1', '0812345678'),
(2, 'Bob', '1122', 'Jl. Mangga No 6', '0812987663'),
(3, 'Charlie', '4567', 'Jl. Semangka No 9', '0816785942'),
(4, 'Doni', '3245', 'Jl. Rambutan No 5', '0283936443'),
(5, 'Emma', '0098', 'Jl. Anggrek No 7', '0813641022'),
(6, 'Pak Yo', '12345', 'Jl. Babarsari', '081234567');

-- --------------------------------------------------------

--
-- Table structure for table `detailpemb`
--

CREATE TABLE `detailpemb` (
  `iddetailpemb` int(20) NOT NULL,
  `idpenyewaan` int(20) NOT NULL,
  `idpembayaran` int(20) NOT NULL,
  `idpromo` int(20) NOT NULL,
  `totalpembayaran` int(50) NOT NULL,
  `jumlahsewa` int(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tanggalpeminjaman` date NOT NULL,
  `tanggalpengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailpemb`
--

INSERT INTO `detailpemb` (`iddetailpemb`, `idpenyewaan`, `idpembayaran`, `idpromo`, `totalpembayaran`, `jumlahsewa`, `bayar`, `kembalian`, `tanggalpeminjaman`, `tanggalpengembalian`) VALUES
(11, 0, 0, 0, 2560000, 23, 2600000, 40000, '2021-06-02', '2021-06-04'),
(12, 0, 0, 0, 1260000, 16, 1300000, 40000, '2021-06-02', '2021-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `nama`, `alamat`, `notelp`) VALUES
(6, 'Jess', 'Jl. Rose No 3', '0987654321'),
(7, 'Melli', 'Jl. Manggis No 8', '7654893021'),
(8, 'Vio', 'Jl. Orchid No 2', '8264274692'),
(9, 'El', 'Jl. Donat No 4', '3947346932');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `idpengembalian` int(20) NOT NULL,
  `iddetailpemb` int(20) DEFAULT NULL,
  `totalpembayaran` int(50) DEFAULT NULL,
  `jumlahsewa` int(50) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `tanggalpeminjaman` date DEFAULT NULL,
  `tanggalpengembalian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`idpengembalian`, `iddetailpemb`, `totalpembayaran`, `jumlahsewa`, `bayar`, `kembalian`, `tanggalpeminjaman`, `tanggalpengembalian`) VALUES
(1, 11, 2560000, 23, 2600000, 40000, '2021-06-02', '2021-06-04'),
(2, 12, 1260000, 16, 1300000, 40000, '2021-06-02', '2021-06-03'),
(3, 12, 1260000, 16, 1300000, 40000, '2021-06-02', '2021-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `idpenyewaan` int(10) NOT NULL,
  `idbarang` int(20) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`idpenyewaan`, `idbarang`, `nama_barang`, `harga`, `quantity`) VALUES
(5, 1, '  Kamera  ', 300000, 2),
(6, 9, ' Tripod ', 50000, 2),
(8, 10, ' Tas Kamera  ', 20000, 3),
(19, 10, 'Tas Kamera ', 20000, 5),
(21, 3, ' Lensaa ', 100000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `idpromo` int(20) NOT NULL,
  `harga` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`idpromo`, `harga`, `nama`, `jenis`) VALUES
(1, 50, 'Ulang Tahun Customer', 'Tahunan'),
(2, 30, 'Hari Raya', 'Tahunan'),
(3, 80, 'Anniversary PAL', 'Tahunan'),
(4, 10, 'Event', 'Bulanan'),
(5, 20, 'Member', 'Harian');

-- --------------------------------------------------------

--
-- Table structure for table `transaksipembayaran`
--

CREATE TABLE `transaksipembayaran` (
  `idpembayaran` int(20) NOT NULL,
  `idpenyewaan` int(20) NOT NULL,
  `biayakerusakan` int(50) NOT NULL,
  `biayakehilangan` int(50) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `statuspemb` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksipembayaran`
--

INSERT INTO `transaksipembayaran` (`idpembayaran`, `idpenyewaan`, `biayakerusakan`, `biayakehilangan`, `tgltransaksi`, `statuspemb`) VALUES
(1, 1, 0, 0, '2021-04-26', 'Lunas'),
(2, 2, 50000, 0, '2021-04-26', 'DP 50%'),
(3, 3, 0, 3000000, '2021-04-27', 'Lunas'),
(4, 4, 0, 0, '2021-04-27', 'DP 50%'),
(5, 5, 400000, 0, '2021-04-28', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `transaksipenyewaan`
--

CREATE TABLE `transaksipenyewaan` (
  `idpenyewaan` int(20) NOT NULL,
  `idbarang` int(20) NOT NULL,
  `idcustomer` int(20) NOT NULL,
  `tglpenyewaan` date NOT NULL,
  `tglpengembalian` date NOT NULL,
  `buktipenyewaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksipenyewaan`
--

INSERT INTO `transaksipenyewaan` (`idpenyewaan`, `idbarang`, `idcustomer`, `tglpenyewaan`, `tglpengembalian`, `buktipenyewaan`) VALUES
(1, 1, 1, '2021-04-26', '2021-04-30', 'Approved'),
(2, 2, 2, '2021-04-26', '2021-04-29', 'Approved'),
(3, 3, 3, '2021-04-27', '2021-04-29', 'Approved'),
(4, 4, 4, '2021-04-27', '2021-04-30', 'Approved'),
(5, 5, 5, '2021-04-28', '2021-04-30', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `role`) VALUES
(13, 'asu', '123', 'pegawai'),
(14, 'hehe', '123', 'pegawai'),
(15, 'aw', '12321', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indexes for table `detailpemb`
--
ALTER TABLE `detailpemb`
  ADD PRIMARY KEY (`iddetailpemb`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`idpengembalian`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`idpenyewaan`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`idpromo`);

--
-- Indexes for table `transaksipembayaran`
--
ALTER TABLE `transaksipembayaran`
  ADD PRIMARY KEY (`idpembayaran`);

--
-- Indexes for table `transaksipenyewaan`
--
ALTER TABLE `transaksipenyewaan`
  ADD PRIMARY KEY (`idpenyewaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detailpemb`
--
ALTER TABLE `detailpemb`
  MODIFY `iddetailpemb` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `idpengembalian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `idpenyewaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `idpromo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksipembayaran`
--
ALTER TABLE `transaksipembayaran`
  MODIFY `idpembayaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

--
-- AUTO_INCREMENT for table `transaksipenyewaan`
--
ALTER TABLE `transaksipenyewaan`
  MODIFY `idpenyewaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
