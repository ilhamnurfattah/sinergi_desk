-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2020 at 01:11 PM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_dept` int(11) NOT NULL,
  `nama_dept` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_dept`, `nama_dept`) VALUES
(4, 'PPIC'),
(5, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `id_dev` varchar(5) NOT NULL,
  `nik` varchar(5) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `point` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`id_dev`, `nik`, `id_kategori`, `status`, `point`) VALUES
('K0001', 'K0003', 5, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `history_feedback`
--

CREATE TABLE `history_feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_ticket` varchar(13) NOT NULL,
  `feedback` int(11) NOT NULL,
  `reported` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_feedback`
--

INSERT INTO `history_feedback` (`id_feedback`, `id_ticket`, `feedback`, `reported`) VALUES
(5, 'T201612020001', 1, 'K0001'),
(6, 'T201612020002', 1, 'K0001'),
(7, 'T201612040003', 1, 'K0001'),
(8, 'T201612040004', 0, 'K0001'),
(9, 'T201612180007', 1, 'K0002'),
(10, 'T201612180006', 0, 'K0002'),
(11, 'T201612190008', 1, 'K0001');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `subject` varchar(35) NOT NULL,
  `pesan` text NOT NULL,
  `status` decimal(2,0) NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `tanggal`, `subject`, `pesan`, `status`, `id_user`) VALUES
(1, '2016-12-04 09:24:28', 'WAJIB MENGISI FEEDBACK', 'FEEDBACK SANGATLAH PENTING GUNA MEMBANTU KAMI DALAM MEMBERIKAN PENILAIAN TERHADAP KINERJA TEKNISI, INI MENYANGKUT DENGAN KEPUASAN ANDA', '1', 'K0001'),
(2, '2016-12-21 13:42:59', 'JIJ', 'NKNJK', '1', 'K0001');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_dept` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `alamat`, `jk`, `id_dept`, `id_posisi`) VALUES
('K0001', 'Administrator', 'jl. mataram', 'L', 5, 1),
('K0002', 'PM', 'jl. mataram', 'L', 5, 5),
('K0003', 'DEV-1', 'Jl. gora no. 1 selagala kota mataram', 'L', 5, 3),
('K0004', 'DEV-2', 'jl.matarm', 'L', 5, 3),
('K0005', 'USER-1', 'jl.mataram', 'L', 5, 2),
('K0006', 'USER-2', 'jl. mataram', 'L', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'HARDWARE'),
(5, 'SOFTWARE');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(30) NOT NULL,
  `waktu_respon` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`, `waktu_respon`) VALUES
(1, 'MENDESAK', '1');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `nama_modul` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `created_at`, `updated_at`) VALUES
(1, 'Tambah Kategori-OPV', '2020-07-11 12:42:36', '2020-07-11 12:42:36'),
(2, 'Input data pegawai', '2020-07-12 13:55:22', '2020-07-12 13:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `nama_posisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `nama_posisi`) VALUES
(1, 'ADMIN'),
(2, 'USER'),
(3, 'DEV'),
(4, 'QA'),
(5, 'PM'),
(6, 'BA');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `nama_project` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `nama_project`, `created_at`, `updated_at`) VALUES
(1, 'Aplikasi Dekstop-OVS', '2020-07-11 12:46:07', '2020-07-11 12:46:07'),
(2, 'PT. Nusa Indah', '2020-07-12 13:55:05', '2020-07-12 13:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_proses` datetime NOT NULL,
  `tanggal_solved` datetime NOT NULL,
  `reported` varchar(5) NOT NULL,
  `problem_summary` varchar(50) NOT NULL,
  `problem_detail` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL,
  `id_dev` varchar(5) DEFAULT NULL,
  `defact_category` varchar(50) DEFAULT NULL,
  `prioriti` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Open',
  `progress` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `tanggal`, `tanggal_proses`, `tanggal_solved`, `reported`, `problem_summary`, `problem_detail`, `project_id`, `modul_id`, `id_dev`, `defact_category`, `prioriti`, `status`, `progress`) VALUES
('T202007120001', '2020-07-12 09:34:43', '2020-07-12 09:40:42', '0000-00-00 00:00:00', 'K0005', 'Error menu', 'Error saat mengakses menu', 1, 1, 'K0001', 'minor', 'medium', 'Open', '45'),
('T202007120002', '2020-07-12 01:56:20', '2020-07-12 01:56:52', '0000-00-00 00:00:00', 'K0005', 'Data tidak di simpan', 'tidak bisa simpan data', 2, 2, 'K0001', 'critical', 'hight', 'Open', '0'),
('T202007130003', '2020-07-13 12:32:28', '2020-07-13 12:33:15', '0000-00-00 00:00:00', 'K0005', 'Error Menu karyawan', 'Terjadi error saat input data karyawan', 2, 2, 'K0001', 'critical', 'hight', 'Fixed', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_ticket` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_ticket`, `tanggal`, `status`, `deskripsi`, `id_user`) VALUES
(1, 'T202007120001', '2020-07-12 09:40:42', 'Open', 'Ticket sudah di teruskan ke developer', 'K0001'),
(2, 'T202007120001', '2020-07-12 09:51:41', 'Open', 'Progress sudah sampai 45 %', 'K0003'),
(3, 'T202007120001', '2020-07-12 09:54:50', 'Open', 'Semangat ya gaees', 'K0005'),
(4, 'T202007120002', '2020-07-12 01:56:52', 'Open', 'Sudah di teruskan ke developer', 'K0001'),
(5, 'T202007130003', '2020-07-13 12:33:15', 'Open', 'Sudah di lanjutkan ke developer', 'K0002'),
(6, 'T202007130003', '2020-07-13 12:33:41', 'Open', 'Oke terima kasih', 'K0005'),
(7, 'T202007130003', '2020-07-13 12:34:28', 'Open', 'Sudah di kerjakan progress 70%', 'K0003'),
(8, 'T202007130003', '2020-07-13 12:34:57', 'Open', 'Mantaaap', 'K0005'),
(9, 'T202007130003', '2020-07-13 12:35:17', 'Fixed', 'Sudah selesai', 'K0003');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(5) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(5, 'K0007', '202cb962ac59075b964b07152d234b70', 'ADMIN'),
(8, 'K0008', '01a5f5db2d97bd6b389e7a20bd889708', 'user'),
(12, 'K0001', '01a5f5db2d97bd6b389e7a20bd889708', 'admin'),
(13, 'K0005', '01a5f5db2d97bd6b389e7a20bd889708', 'user'),
(14, 'K0003', '01a5f5db2d97bd6b389e7a20bd889708', 'dev'),
(15, 'K0002', '01a5f5db2d97bd6b389e7a20bd889708', 'pm'),
(16, 'K0006', '01a5f5db2d97bd6b389e7a20bd889708', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id_dev`);

--
-- Indexes for table `history_feedback`
--
ALTER TABLE `history_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history_feedback`
--
ALTER TABLE `history_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
