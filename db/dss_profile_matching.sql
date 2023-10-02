-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 02:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss_profile_matching`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_wwc` int(100) NOT NULL,
  `nama_pelamar` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jadwal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_pelamar`
--

CREATE TABLE `master_pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `nama_pelamar` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_pelamar`
--

INSERT INTO `master_pelamar` (`id_pelamar`, `nama_pelamar`, `no_hp`, `email`) VALUES
(1, 'Farhan Muhammad', '081212678712', 'FarhanMuhammad@gmail.com'),
(4, 'Randi Agus Revaldi', '081212678712', 'RandiAgusRevaldi@gmail.com'),
(5, 'Sulthan Aldi Budiono', '081212678712', 'SulthanAldiBudiono@gmail.com'),
(10, 'Fauzan', '086562565568', 'fauzan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `diubah_oleh` int(11) NOT NULL,
  `tgl_diubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id_user`, `username`, `nama`, `password`, `level`, `dibuat_oleh`, `tgl_dibuat`, `diubah_oleh`, `tgl_diubah`) VALUES
(1, 'HRD', 'Muhamad Fikri Rahmat', 'e00cf25ad42683b3df678c61f42c6bda', 1, 1, '2020-08-25 22:05:05', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pm_aspek`
--

CREATE TABLE `pm_aspek` (
  `id_aspek` tinyint(3) UNSIGNED NOT NULL,
  `aspek` varchar(100) NOT NULL,
  `prosentase` float NOT NULL,
  `bobot_core` float NOT NULL,
  `bobot_secondary` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_aspek`
--

INSERT INTO `pm_aspek` (`id_aspek`, `aspek`, `prosentase`, `bobot_core`, `bobot_secondary`) VALUES
(1, 'kecerdasan', 40, 60, 40),
(2, 'wawancara', 30, 60, 40),
(3, 'Sikap Kerja', 30, 60, 40);

-- --------------------------------------------------------

--
-- Table structure for table `pm_bobot`
--

CREATE TABLE `pm_bobot` (
  `selisih` tinyint(3) NOT NULL,
  `bobot` float NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_bobot`
--

INSERT INTO `pm_bobot` (`selisih`, `bobot`, `keterangan`) VALUES
(0, 5, 'Tidak ada selisih (kompetensi sesuai dgn yg dibutuhkan)'),
(1, 4.5, 'Kompetensi individu kelebihan 1 tingkat'),
(-1, 4, 'Kompetensi individu kekurangan 1 tingkat'),
(2, 3.5, 'Kompetensi individu kelebihan 2 tingkat'),
(-2, 3, 'Kompetensi individu kekurangan 2 tingkat'),
(3, 2.5, 'Kompetensi individu  kelebihan 3 tingkat'),
(-3, 2, 'Kompetensi individu  kekurangan 3 tingkat'),
(4, 1.5, 'Kompetensi individu kelebihan 4 tingkat'),
(-4, 1, 'Kompetensi individu kekurangan 4 tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `pm_faktor`
--

CREATE TABLE `pm_faktor` (
  `id_faktor` tinyint(3) UNSIGNED NOT NULL,
  `id_aspek` tinyint(3) UNSIGNED NOT NULL,
  `faktor` varchar(30) NOT NULL,
  `target` tinyint(3) NOT NULL,
  `type` set('core','secondary') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_faktor`
--

INSERT INTO `pm_faktor` (`id_faktor`, `id_aspek`, `faktor`, `target`, `type`) VALUES
(1, 1, 'Penguasaan Bahasa Pemprograman', 4, 'core'),
(2, 1, 'Kreatif', 4, 'secondary'),
(3, 1, 'Logika', 4, 'core'),
(4, 1, 'Inovatif', 3, 'secondary'),
(5, 2, 'Kejujuran', 4, 'core'),
(6, 2, 'Pengetahuan Tentang pekerjaan', 4, 'secondary'),
(7, 2, 'Pengalaman', 3, 'core'),
(8, 2, 'Karakter', 3, 'secondary'),
(9, 3, 'Kecepatan', 4, 'core'),
(10, 3, 'Ketelitian', 3, 'core'),
(11, 3, 'Inisiatif', 3, 'secondary'),
(12, 3, 'Percaya Diri', 3, 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `pm_ranking`
--

CREATE TABLE `pm_ranking` (
  `id_pelamar` int(11) NOT NULL,
  `nilai_akhir` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_ranking`
--

INSERT INTO `pm_ranking` (`id_pelamar`, `nilai_akhir`) VALUES
(8, 1.84),
(9, 4.03),
(2, 3.50),
(3, 3.53),
(1, 4.17),
(4, 4.31),
(5, 4.42),
(10, 1.84);

-- --------------------------------------------------------

--
-- Table structure for table `pm_sample`
--

CREATE TABLE `pm_sample` (
  `id_sample` int(11) UNSIGNED NOT NULL,
  `id_pelamar` tinyint(3) UNSIGNED NOT NULL,
  `id_faktor` tinyint(3) UNSIGNED NOT NULL,
  `value` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_sample`
--

INSERT INTO `pm_sample` (`id_sample`, `id_pelamar`, `id_faktor`, `value`) VALUES
(532, 5, 8, 4),
(559, 9, 11, 3),
(556, 5, 12, 4),
(531, 5, 7, 4),
(530, 5, 6, 4),
(529, 5, 5, 2),
(528, 4, 8, 3),
(527, 4, 7, 4),
(584, 10, 4, 1),
(555, 5, 11, 3),
(526, 4, 6, 4),
(554, 5, 10, 4),
(525, 4, 5, 2),
(524, 3, 8, 3),
(553, 5, 9, 3),
(583, 10, 3, 1),
(552, 4, 12, 4),
(523, 3, 7, 4),
(560, 9, 12, 3),
(557, 9, 9, 3),
(522, 3, 6, 2),
(521, 3, 5, 4),
(534, 9, 6, 3),
(551, 4, 11, 3),
(520, 2, 8, 4),
(536, 9, 8, 3),
(519, 2, 7, 4),
(582, 10, 2, 1),
(550, 4, 10, 3),
(518, 2, 6, 4),
(517, 2, 5, 4),
(549, 4, 9, 4),
(548, 3, 12, 3),
(516, 1, 8, 3),
(515, 1, 7, 3),
(514, 1, 6, 3),
(547, 3, 11, 3),
(513, 1, 5, 2),
(546, 3, 10, 3),
(581, 10, 1, 1),
(580, 5, 4, 4),
(545, 3, 9, 3),
(579, 5, 3, 3),
(578, 5, 2, 4),
(544, 2, 12, 4),
(577, 5, 1, 4),
(576, 4, 4, 4),
(543, 2, 11, 3),
(575, 4, 3, 2),
(574, 4, 2, 2),
(542, 2, 10, 4),
(573, 4, 1, 4),
(572, 3, 4, 4),
(541, 2, 9, 4),
(571, 3, 3, 2),
(570, 3, 2, 4),
(558, 9, 10, 3),
(540, 1, 12, 2),
(569, 3, 1, 4),
(568, 2, 4, 4),
(567, 2, 3, 3),
(539, 1, 11, 3),
(566, 2, 2, 4),
(565, 2, 1, 2),
(533, 9, 5, 3),
(538, 1, 10, 2),
(564, 1, 4, 3),
(563, 1, 3, 2),
(535, 9, 7, 2),
(537, 1, 9, 4),
(562, 1, 2, 3),
(561, 1, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_wwc`);

--
-- Indexes for table `master_pelamar`
--
ALTER TABLE `master_pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pm_aspek`
--
ALTER TABLE `pm_aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `pm_bobot`
--
ALTER TABLE `pm_bobot`
  ADD PRIMARY KEY (`selisih`);

--
-- Indexes for table `pm_faktor`
--
ALTER TABLE `pm_faktor`
  ADD PRIMARY KEY (`id_faktor`);

--
-- Indexes for table `pm_sample`
--
ALTER TABLE `pm_sample`
  ADD PRIMARY KEY (`id_sample`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_wwc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_pelamar`
--
ALTER TABLE `master_pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pm_aspek`
--
ALTER TABLE `pm_aspek`
  MODIFY `id_aspek` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pm_faktor`
--
ALTER TABLE `pm_faktor`
  MODIFY `id_faktor` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pm_sample`
--
ALTER TABLE `pm_sample`
  MODIFY `id_sample` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
