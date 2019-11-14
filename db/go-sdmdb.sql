-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 10:47 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go-sdmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `genre` varchar(255) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `rating` varchar(10) DEFAULT NULL,
  `duration` int(10) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `description`, `genre`, `director`, `rating`, `duration`, `cover`) VALUES
(2, 'Cinta Itu Buta', 'Diah (Shandy Aulia) bekerja di Busan, Korea Selatan, sebagai pemandu wisata. Sudah tiga tahun ia berstatus sebagai tunangan pria lokal bernama Jun-ho (Chae In-woo), seorang fotografer. Suatu malam, ia menemukan tunangannya berselingkuh dengan Sandra (Gemilang Shinatria), sesama orang Indonesia yang tinggal bersama Diah.', 'Drama Komedi', 'Rachmania Arunita', '8.5', 0, ''),
(3, 'Perempuan Tanah Jahanam', 'Maya (Tarao Basro) berusaha bertahan di kota tanpa keluarga. Hanya sahabat baiknya Dini (Marissa Anita), yang bersama dirinya jatuh bangun mencoba memperbaiki hidup. Ketika Maya mendapatkan informasi bahwa dia mungkin memiliki harta warisan dari keluarga Maya yang kaya di sebuah desa, Maya dan Dini langsung ke sana tanpa menyadari bahaya yang menanti.', '', '', '', 0, ''),
(4, 'Susi Susanti: Love All', 'Susi Susanti (Laura Basuki) sudah jadi sensasi bulutangkis pada usia 14 tahun dan berkembang menjadi atlet paling dicintai di Indonesia. Di bawah bimbingan pelatihnya, Liang Chiu Sia (Jenny Chang) dan didorong oleh janji kepada ayahnya, Susi berhasil mendapatkan pengakuan Internasional karena memenangkan medali emas Olimpiade pertama untuk Indonesia.', '', '', '', 0, ''),
(5, 'Danur 3: Sunyaruri ', 'Maromi (Beddu), orang kaya Madura perlente tapi norak, menemukan sendal slop sebelah yang dia yakini bahwa pemilik pasangan sendal itu adalah Cinderela-nya. Inem (Jelita Callebaut), si pemilik sendal slop, adalah asisten rumah tangga keluarga Ida (Meriam Bellina) dan Moko (Mathias Muchus), karyawan Maromi. Kegigihan pencarian Maromi membuat dirinya bertemu dengan Inem. ', '', '', '', 0, ''),
(6, 'Pretty Boys', 'Rahmat (Deddy Mahendra Desta) dan Anugerah (Vincent Rompies), dua sahabat sejak kecil, bercita-cita ingin terkenal. Anugerah selalu mendapat tentangan dari ayahnya, Pak Jono (Roy Marten), karena dianggapnya dunia entertainment dekat dengan hal-hal yang buruk. Karena kesal, Anugerah kabur dari rumahnya dan mengadu nasib ke Jakarta bersama Rahmat. ', '', '', '', 0, ''),
(7, 'Warkop DKI Reborn', 'Warkop DKI–Dono (Aliando Syarief), Kasino (Adipati Dolken), Indro (Randy Danistha)–kali ini mendapat tugas sebagai agen polisi rahasia. Mereka dibawah komando Komandan Cok (Indro Warkop), yang kehilangan tangankanannya, Karman (Mandra), saat mensinyalir adanya pencucian uang di dunia perfilman Indonesia. Tepatnya di sebuah rumah produksi milik Amir Muka (Ganindra Bimo).', '', '', '', 0, ''),
(8, 'Kapal Goyang Kapten', 'Tiga pembajak amatir membajak kapal wisata yang sedang berlayar di Laut Maluku yang berisi beberapa turis lokal dan Kapten Gomgom, nahkoda. Mereka adalah Daniel (Ge Pamungkas) yang ingin membuktikan kepada orangtuanya bahwa anak orang kaya pun bisa bekerja, Cakka (Muhadkly Acho) yang butuh biaya untuk ibunya yang sakit, dan Bertus (Mamat Alkatiri), pengangguran.', '', '', '', 0, ''),
(9, 'Bumi Manusia ', 'Inilah kisah Minke (Iqbaal Ramadhan ) dan Annelies (Mawar De Jongh) di di atas pentas pergelutan tanah kolonial awal abad 20. Minke, pemuda pribumi, Jawa totok. Annelies, gadis Indo Belanda, anak Nyai Ontosoroh (Sha Ine Febriyanti). Bapak Minke yang baru saja diangkat jadi Bupati, tak pernah setuju Minke dekat dengan keluarga Nyai.', '', '', '', 0, ''),
(10, 'Dua Garis Biru', 'Dara (Zara JKT48) dan Bima (Angga Yunanda) melanggar batas tanpa tahu konsekuensinya. Mereka berusaha menjalani tanggung jawab atas pilihan mereka. Mereka pikir mereka siap jadi dewasa untuk menghadapi segala konsekuensinya. Keluguan mereka langsung diuji saat keluarga yang amat mencintai mereka tahu, lalu memaksa masuk dalam perjalanan pilihan mereka.', '', '', '', 0, ''),
(12, 'Dilan 1991', 'Dilan 1991 adalah sebuah film Indonesia tahun 2019 yang disutradarai oleh Fajar Bustomi dan Pidi Baiq. Film ini adalah sekuel dari Dilan 1990 yang tayang Januari 2018. Film tersebut pertama tayang pada 24 Februari 2019 dalam \"Hari Dilan\" di Bandung, sebelum resmi tayang di seluruh Indonesia empat hari kemudian. Syutingnya digelar di Bandung pada November 2018.', '', '', '', 0, ''),
(13, 'Keluarga Cemara', 'Sebuah keluarga inti yang tinggal di Jakarta harus menghadapi kenyataan bahwa harta benda mereka ludes akibat ditipu salah satu anggota keluarga besar mereka. Pindah ke desa di Kabupaten Bogor, Abah dan keluarga harus beradaptasi dengan segala ketidaknyamanan yang tak pernah dialami sebelumnya. Permasalahan datang silih berganti, tetapi keluarga ini tetap bertahan dalam keadaan gegar budaya.', '', '', '', 0, ''),
(14, 'BEBAS ', 'Bebas adalah film Indonesia 2019 yang disutradarai Riri Riza dan diproduseri Mira Lesmana. Film ini akan ditayangkan pada 3 Oktober 2019.', 'Drama Komedi', 'Riri Riza', '7', NULL, ''),
(15, 'JUDUL', NULL, 'GENRE', NULL, NULL, NULL, NULL),
(16, 'Pengabdi Setan', NULL, 'Horor', NULL, NULL, NULL, NULL),
(17, 'Suzzanna: Bernapas dalam Kubur', NULL, 'Horor', NULL, NULL, NULL, NULL),
(18, 'Si Doel The Movie', NULL, 'Drama', NULL, NULL, NULL, NULL),
(19, 'Rampage', NULL, 'Action', NULL, NULL, NULL, NULL),
(20, 'Robin Hood', NULL, 'Action', NULL, NULL, NULL, NULL),
(21, 'Alpha', NULL, 'Action', NULL, NULL, NULL, NULL),
(22, 'Venom', NULL, 'Action', NULL, NULL, NULL, NULL),
(23, 'Deadpool 2', NULL, 'Action', NULL, NULL, NULL, NULL),
(24, 'Predator', NULL, 'Action', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `born` varchar(255) NOT NULL,
  `birth_day` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `hobby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `username`, `password`, `born`, `birth_day`, `gender`, `address`, `hobby`) VALUES
(1, 'yusufrizalh', 'Rizal2019', 'Malang', '1992-07-20', 'Laki-Laki', 'Surabaya', NULL),
(2, 'aplikom', 'Rizal', '', '0000-00-00', 'Perempuan', 'Surabaya', ''),
(3, 'inix2019', 'Inix2019', '', '0000-00-00', 'Laki-Laki', 'Jakarta', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `room` varchar(25) NOT NULL,
  `quota` int(5) NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `movie_id`, `start`, `room`, `quota`, `price`, `status`) VALUES
(1, 10, '2019-11-15 13:00:46', '1', 30, 75000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `role`) VALUES
(1, 'admin', '6ZOhQ-Ow_vuwvrekcC_Gd851w1D92SjR', '$2y$13$QOKKXCt2uWusqinRj0or0..uykXgJ1Z03syk6igXC0zF1ZnxPQtSS', NULL, 'admin@email.com', 1, 0, 0, NULL, 'admin'),
(2, 'customer', 'Y5B5uQa4EU5qREu1cM-dRa47qP6cnywC', '$2y$13$6mCFxpEIuQqtqim9XtvVEubQGjYxL6WZLMiBugu59vx9PN9pzkwU6', NULL, 'customer@email.com', 1, 0, 0, NULL, 'customer'),
(3, 'yusufrizalh', 'EkkGJl_PXQg4224toPBiigktW-4wDi7W', '$2y$13$j/N8Qrk.yhFKT18yRY52uebyA11.17SIvMUcZKe4j0hjxMqracoVG', NULL, 'rizal@email.com', 1, 0, 0, NULL, 'customer'),
(4, 'customer1', '4jhLzv5cExOwtGEkl5P0VdQdqb1sXk0f', '$2y$13$HbQX01KVk/ztT99xpO47leR2CRUO8UjlzMNPKkVB.QL2Dg6X3dyoS', NULL, 'customer1@email.com', 1, 0, 0, NULL, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_schedule_id` (`schedule_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_movie_id` (`movie_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_schedule_id` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
