-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 01:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `id_aturan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basis_aturan`
--

INSERT INTO `basis_aturan` (`id_aturan`, `id_penyakit`) VALUES
(3, 11),
(4, 22),
(5, 33),
(6, 44),
(7, 55),
(9, 66);

-- --------------------------------------------------------

--
-- Table structure for table `detail_basis_aturan`
--

CREATE TABLE `detail_basis_aturan` (
  `id_aturan` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_basis_aturan`
--

INSERT INTO `detail_basis_aturan` (`id_aturan`, `id_gejala`) VALUES
(3, 1),
(3, 2),
(3, 3),
(3, 5),
(3, 6),
(3, 11),
(4, 4),
(4, 5),
(4, 7),
(4, 8),
(4, 10),
(5, 5),
(5, 9),
(5, 10),
(6, 5),
(6, 10),
(6, 11),
(7, 4),
(3, 4),
(3, 7),
(4, 6),
(4, 12),
(5, 11),
(6, 3),
(6, 4),
(6, 6),
(7, 5),
(7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_konsultasi`
--

INSERT INTO `detail_konsultasi` (`id_konsultasi`, `id_gejala`) VALUES
(16, 4),
(16, 5),
(17, 4),
(17, 6),
(17, 11),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(18, 9),
(18, 10),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 11),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(20, 6),
(20, 7),
(20, 11);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `id_konsultasi` int(11) NOT NULL,
  `id_penyakit` int(3) NOT NULL,
  `persentase` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penyakit`
--

INSERT INTO `detail_penyakit` (`id_konsultasi`, `id_penyakit`, `persentase`) VALUES
(16, 11, 17),
(16, 22, 40),
(16, 33, 33),
(16, 44, 25),
(16, 55, 33),
(16, 66, 100),
(17, 11, 33),
(17, 22, 20),
(17, 44, 25),
(17, 55, 100),
(17, 66, 50),
(18, 11, 83),
(18, 22, 60),
(18, 33, 100),
(18, 44, 75),
(18, 55, 67),
(18, 66, 100),
(19, 11, 100),
(19, 22, 57),
(19, 33, 50),
(19, 44, 83),
(19, 55, 67),
(19, 66, 100),
(20, 11, 100),
(20, 22, 57),
(20, 33, 50),
(20, 44, 83),
(20, 55, 67);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
(1, 'Gatal pada liang telinga'),
(2, 'Sakit, terutama saat telinga disentuh atau ditarik'),
(3, 'Keluar cairan bening pada telinga'),
(4, 'Keluar cairan berwarna kuning atau bening dan berbau'),
(5, 'Gangguan pendengaran (Pendengaran menurun)'),
(6, 'Telinga terasa penuh atau tersumbat'),
(7, 'Demam'),
(8, 'Muncul benjolan dileher atau sekitar telinga'),
(9, 'Pusing dan Vertigo'),
(10, 'Telinga Berdenging'),
(11, 'Nyeri Telinga'),
(12, 'Demam disertai pilek');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `tanggal`, `nama_pasien`, `jenis_kelamin`, `umur`) VALUES
(16, '2024-04-02', 'Ekat Rueh Daya Leluni', 'Perempuan', 19),
(17, '2024-04-02', 'Ahsana Azmiara Ahmadiham', 'Perempuan', 19),
(18, '2024-04-30', 'A', 'A', 1),
(19, '2024-04-30', 'Ekat Rueh Daya Leluni', 'Perempuan', 19),
(20, '2024-04-30', 'Ekat Rueh Daya Leluni', 'Perempuan', 19);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `keterangan`, `solusi`) VALUES
(11, 'Otitis eksterna', 'Otitis eksterna (OE) adalah radang liang telinga akut maupun kronik yang disebabkan oleh infeksi bakteri, jamur, dan virus.', 'Tidak mengorek telinga baik dengan cotton bud atau lainnya. Selama pengobatan, telinga tidak boleh kemasukan air. Penyakit dapat berulang sehingga harus menjaga liang telinga agar dalam kondisi kering'),
(22, 'Otitis media', 'Otitis media didefinisikan sebagai infeksi pada ruang telinga tengah. Infeksi telinga tengah dapat disebabkan oleh virus, bakteri, atau koinfeksi.', 'Disarankan untuk menjaga agar liang telinga tidak kemasukan air saat mandi, yang bisa dilakukan dengan menggunakan kapas agar tidak menjadi media pertumbuhan kuman yang dapat memperparah infeksi'),
(33, 'Gendang Telinga Pecah', 'Gendang telinga pecah (perforasi membran timpani) adalah lubang atau robekan pada jaringan tipis yang memisahkan saluran telinga dengan telinga tengah (gendang telinga).', 'Dapatkan pengobatan untuk infeksi telinga tengah. Lindungi telinga Anda selama penerbangan. Jagalah telinga Anda bebas dari benda asing. Lindungi dari suara ledakan.'),
(44, 'Kolesteatoma', 'Kolesteatoma adalah sejenis kista kulit yang terletak di telinga tengah dan tulang mastoid di tengkorak.', 'Kolesteatoma sering kali terus tumbuh jika tidak diangkat. Pembedahan seringkali berhasil. Namun, telinga Anda mungkin perlu dibersihkan oleh penyedia layanan kesehatan dari waktu ke waktu.'),
(55, 'Presbikusis', 'Presbiakusis adalah tuli sensorineural frekuensi tinggi, terjadi pada usia lanjut (biasanya usia 60 tahun), simetris kanan dan kiri, disebabkan oleh proses degenerasi pada telinga dalam. Lebih banyak', 'Jika merasakan ada kelainan pada pendengaran sebaiknya segera memeriksakan diri ke dokter spesialis THT - KL. Jika disertai penyakit lain, maka harus dilakukan penanganan bersama.'),
(66, ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `pass`, `role`) VALUES
(1, 'ahsanaazmiara', '569b35b5cdf579cac8e220e7a398f5f1', 'Pasien'),
(3, 'admin1', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `fk_id_penyakit_basis` (`id_penyakit`);

--
-- Indexes for table `detail_basis_aturan`
--
ALTER TABLE `detail_basis_aturan`
  ADD KEY `fk_id_gejala_detailbasis` (`id_gejala`),
  ADD KEY `fk_id_aturan_detailbasis` (`id_aturan`);

--
-- Indexes for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD KEY `fk_id_konsultasi` (`id_konsultasi`),
  ADD KEY `fk_id_gejala_konsultasi` (`id_gejala`);

--
-- Indexes for table `detail_penyakit`
--
ALTER TABLE `detail_penyakit`
  ADD KEY `fk_id_konsultasi_penyakit` (`id_konsultasi`),
  ADD KEY `fk_id_penyakit_penyakit` (`id_penyakit`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_aturan`
--
ALTER TABLE `basis_aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD CONSTRAINT `fk_id_penyakit_basis` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);

--
-- Constraints for table `detail_basis_aturan`
--
ALTER TABLE `detail_basis_aturan`
  ADD CONSTRAINT `fk_id_aturan_detailbasis` FOREIGN KEY (`id_aturan`) REFERENCES `basis_aturan` (`id_aturan`),
  ADD CONSTRAINT `fk_id_gejala_detailbasis` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);

--
-- Constraints for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD CONSTRAINT `fk_id_gejala_konsultasi` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `fk_id_konsultasi` FOREIGN KEY (`id_konsultasi`) REFERENCES `konsultasi` (`id_konsultasi`);

--
-- Constraints for table `detail_penyakit`
--
ALTER TABLE `detail_penyakit`
  ADD CONSTRAINT `fk_id_konsultasi_penyakit` FOREIGN KEY (`id_konsultasi`) REFERENCES `konsultasi` (`id_konsultasi`),
  ADD CONSTRAINT `fk_id_penyakit_penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
