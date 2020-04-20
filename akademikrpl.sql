-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 08:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademikrpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `id_admin`, `username`, `nama`, `nip`, `alamat`, `email`, `telepon`, `gender`, `tgl_lahir`, `password`, `level`) VALUES
(2, 'ADM-1900', 'zulfa', 'Khaizuddin Zulfa S.Kom, M.Si', '1900', 'Candiroto, RT 17 RW 1 Kec. Kendal Kab Kendal', 'khaizulfa18@gmail.com', '2147483647', 'Laki-laki', '20-11-2019', 'admin', 1),
(3, 'ADM-120079', 'admin', 'Admin', '1200790129902', 'Brangsong', 'xhaipotter18@gmail.com', '879100689', 'Perempuan', '05-11-2019', 'admin1', 1),
(4, 'ADM-129201', 'khai zulfa', 'Khai Zulfa', '1292010020', 'Kendal Jawa Tengah', 'tesemail@gmail.com', '089710020', 'Laki-laki', '18-07-2019', 'khaizulfa', 1),
(5, 'ADM-200023', 'billy', 'Bill Gates', '200023000899', 'Colorado', 'xhaipotter18@gmail.com', '0897695578', 'Perempuan', '04-11-2019', 'billy', 1),
(6, 'ADM-210882', 'sdasd', 'asas', '210882', 'asaa', 'member2@email.com', '08912002', 'Laki-laki', '11-11-2019', 'xasxa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `pengirim` int(100) NOT NULL,
  `wkt_terkirim` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `id_guru` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `id_guru`, `username`, `nama`, `nip`, `alamat`, `email`, `telepon`, `gender`, `tgl_lahir`, `password`, `level`) VALUES
(2, 'GR-19000206890079', 'zulfa', 'Khaizuddin Zulfa S.Kom, M.Pd', '19000206890079', 'Candiroto, RT 17 RW 1 Kec. Kendal Kab Kendal', 'khaizulfa18@gmail.com', '0897066747', 'Laki-laki', '20-11-2019', 'khaizulfa', 2),
(3, 'GR-121003001202', 'soekarno', 'Soekarno S.Pd', '121003001202', 'Kendalnesia, Indonesia', 'member2@email.com', '0892120320', 'Laki-laki', '17-08-1945', 'soekarno', 2),
(4, 'GR-2089001299', 'guru', 'Guru', '2089001299', 'SMK N 4 KENDAL', 'xhaipotter18@gmail.com', '089120023', 'Perempuan', '20-11-2019', 'guru123', 2),
(5, 'GR-912193120', 'Jo', 'Jonathan Liandi S.Kom', '912193120', 'Palembang', 'jojonathan@gmail.com', '0897001202', 'Laki-laki', '04-11-2019', 'jojojo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `singkatan` varchar(20) NOT NULL,
  `kejuruan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `singkatan`, `kejuruan`) VALUES
(4, 'Jasa Boga', 'JSB', '3'),
(5, 'Rekayasa Perangkat Lunak', 'RPL', '2');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `nama` varchar(10) NOT NULL,
  `kelas` enum('10','11','12') NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `wali_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `id_kelas`, `nama`, `kelas`, `jurusan`, `wali_kelas`) VALUES
(7, 'klsxrpl1', 'X RPL 1', '10', '3', '5'),
(8, 'klsxijsb1', 'XI JSB 1', '11', '4', '5');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` enum('admin','guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masukkan`
--

CREATE TABLE `masukkan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `masukan` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masukkan`
--

INSERT INTO `masukkan` (`id`, `nama`, `email`, `subjek`, `masukan`, `waktu`) VALUES
(1, 'ads', 'ad', 'adsa', 'asdsad', '2020-01-16 19:37:26'),
(2, 'ASA', 'sada', 'dasddd', 'asdasd', '2020-01-16 19:40:20'),
(3, 'adsad', 'asdas', 'asdsa', 'adsddd', '2020-01-16 19:40:42'),
(4, 'khai zulfa', 'khaizulfa18@gmail.com', 'Saran', 'Bagusin Lagi Gan', '2020-01-16 19:47:41'),
(5, 'Briliant', 'pianutt18@gmail.com', 'Tes', 'Halo', '2020-01-16 19:51:09'),
(6, 'KkKLLL', 'ASAD', 'DSDS', 'SADAS', '2020-01-16 19:52:34'),
(8, 'Iqbal', 'a', '', 'sad', '2020-01-16 19:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_guru` varchar(30) NOT NULL,
  `mtk` int(2) NOT NULL,
  `b_indo` int(2) NOT NULL,
  `b_inggris` int(2) NOT NULL,
  `rerata` tinyint(1) NOT NULL,
  `waktu` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `id_siswa`, `id_guru`, `mtk`, `b_indo`, `b_inggris`, `rerata`, `waktu`) VALUES
(1, 6, '4', 90, 90, 80, 87, '2020-01-26 22:53:14.923918'),
(2, 7, '4', 70, 70, 70, 70, '2020-02-07 19:56:28.153008');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nisn` int(5) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nisn`, `kelas`, `gender`, `tgl_lahir`, `email`, `telepon`, `alamat`) VALUES
(6, 'Khaizuddin Zulfa', 4655, '7', 'Laki-laki', '16-07-2014', 'khaizulfa18@gmail.com', '08900892032', 'Kendal'),
(7, 'Boa Hancock', 2147483647, '8', 'Perempuan', '09-02-2016', 'member2@email.com', '0890012002', 'Jakarta'),
(8, 'Monkey D. Luffy', 2147483647, '7', 'Laki-laki', '25-06-2019', 'khaizulfa18@gmail.com', '08970002012', 'Kendal');

-- --------------------------------------------------------

--
-- Table structure for table `web_slider`
--

CREATE TABLE `web_slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `picture` text NOT NULL,
  `status` int(2) NOT NULL,
  `waktu` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_slider`
--

INSERT INTO `web_slider` (`id`, `judul`, `picture`, `status`, `waktu`) VALUES
(10, 'Kegiatan Class Meeting di Lapangan Futsal SMK N 4 ', 'IMG_20180815_111819.jpg', 1, '2020-02-01 12:56:07.179528');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masukkan`
--
ALTER TABLE `masukkan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_slider`
--
ALTER TABLE `web_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masukkan`
--
ALTER TABLE `masukkan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `web_slider`
--
ALTER TABLE `web_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
