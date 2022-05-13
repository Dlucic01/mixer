-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2022 at 01:05 PM
-- Server version: 10.5.10-MariaDB-debug
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sound_vib`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `user` varchar(80) NOT NULL,
  `artist` varchar(80) NOT NULL,
  `song_name` varchar(80) NOT NULL,
  `songfile_path` varchar(100) NOT NULL,
  `songfile_name` varchar(80) NOT NULL,
  `albumart_path` varchar(100) NOT NULL,
  `albumart_name` varchar(80) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `user`, `artist`, `song_name`, `songfile_path`, `songfile_name`, `albumart_path`, `albumart_name`, `upload_time`) VALUES
(11, 'Europe', 'Đorđe Balašević', 'Olelole', '/srv/www/apache/public/jukebox/music/Djordje Balasevic - Olelole - (Audio 1991) HD.mp3', 'Djordje Balasevic - Olelole - (Audio 1991) HD.mp3', '/srv/www/apache/public/jukebox/album-art/cover (copy 1).jpg', 'cover (copy 1).jpg', '2022-05-12 11:35:09'),
(12, 'Europe', 'Black Sabbath', 'Paranoid', '/srv/www/apache/public/jukebox/music/ Black Sabbath - Paranoid (HQ).mp3', ' Black Sabbath - Paranoid (HQ).mp3', '/srv/www/apache/public/jukebox/album-art/Folder.jpg', 'Folder.jpg', '2022-05-12 18:43:54'),
(13, 'Europe', 'Daft Punk', 'Giorgio By Moroder', '/srv/www/apache/public/jukebox/music/Daft Punk Giorgio By Moroder_320kbps.mp3', 'Daft Punk Giorgio By Moroder_320kbps.mp3', '/srv/www/apache/public/jukebox/album-art/daft-punk.jpg', 'daft-punk.jpg', '2022-05-12 18:45:50'),
(15, 'Europe', 'Rush', '2112', '/srv/www/apache/public/jukebox/music/Rush - 2112 [HD FULL SONG]-.mp3', 'Rush - 2112 [HD FULL SONG]-.mp3', '/srv/www/apache/public/jukebox/album-art/folder.jpg', 'folder.jpg', '2022-05-12 18:56:01'),
(17, 'Europe', 'Emerson, Lake & Palmer', 'Tarkus', '/srv/www/apache/public/jukebox/music/Tarkus - Emerson, Lake & Palmer .mp3', 'Tarkus - Emerson, Lake & Palmer .mp3', '/srv/www/apache/public/jukebox/album-art/tarkus.jpg', 'tarkus.jpg', '2022-05-12 18:59:28'),
(18, 'Europe', 'Pink Floyd', 'Fat Old Sun', '/srv/www/apache/public/jukebox/music/Fat Old Sun.mp3', 'Fat Old Sun.mp3', '/srv/www/apache/public/jukebox/album-art/atom-heart-mother.jpg', 'atom-heart-mother.jpg', '2022-05-12 19:00:21'),
(19, 'Europe', 'Dream Theater', 'Dance of Eternity', '/srv/www/apache/public/jukebox/music/Scene Seven I. The Dance of Eternity.mp3', 'Scene Seven I. The Dance of Eternity.mp3', '/srv/www/apache/public/jukebox/album-art/cover.png', 'cover.png', '2022-05-12 19:01:37'),
(20, 'Europe', 'King Crimson', 'The Court Of The Crimson King', '/srv/www/apache/public/jukebox/music/King Crimson - The Court Of The Crimson King.mp3', 'King Crimson - The Court Of The Crimson King.mp3', '/srv/www/apache/public/jukebox/album-art/cover (copy 3).jpg', 'cover (copy 3).jpg', '2022-05-12 19:04:01'),
(21, 'Europe', 'Rainbow', 'Stargazer', '/srv/www/apache/public/jukebox/music/Stargazer.mp3', 'Stargazer.mp3', '/srv/www/apache/public/jukebox/album-art/proxy-image.jpg', 'proxy-image.jpg', '2022-05-12 19:05:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
