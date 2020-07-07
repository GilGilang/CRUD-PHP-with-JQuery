-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 02:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `kode` varchar(255) NOT NULL,
  `nama` text NOT NULL,
  `umur` int(11) NOT NULL,
  `golongan` char(2) NOT NULL,
  `gaji` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`kode`, `nama`, `umur`, `golongan`, `gaji`, `alamat`) VALUES
('P01', 'GILANG', 26, 'D', 3400000, 'Jl. Jalan 012'),
('P02', 'Ifan', 20, 'B', 3000000, 'Jl. Mawar 02'),
('P03', 'Budi', 20, 'A', 2500000, 'Jl. Jalan'),
('P04', 'Gagu', 20, 'V', 34000000, 'Jl. Tulip'),
('P05', 'Dedi', 20, 'A', 2800000, 'Jl. Raflesia 88'),
('P06', 'Bunga', 20, 'A', 2600000, 'Jl. Delima 20'),
('P07', 'Agus', 48, 'A', 150000000, 'Jl. Apel 20'),
('P08', 'Puji', 25, 'A', 4000000, 'Jl. Durian 20'),
('P09', 'Bunga', 20, 'A', 3400000, 'Jl. Jalan 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
