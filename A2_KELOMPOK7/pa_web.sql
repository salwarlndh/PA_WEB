-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 02:03 PM
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
-- Database: `pa_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

CREATE TABLE `concerts` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`id`, `name`, `category`, `description`, `location`, `image`, `date`) VALUES
('231116192729', 'Bruno Mars', 'festival', 'Experience a soulful sensation as Bruno Mars serenades the crowd with his smooth vocals and heartfelt lyrics.', 'Convention Hall', '6555fc9d4798e.jpg', '2024-04-17'),
('231116194398', 'Little Mix', 'festival', 'A Little Mix concert promises an unforgettable night filled with music, dancing, and pure entertainment.', 'Madison Square Garden, New York City', '6556004f99a24.jpeg', '2023-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `lineups`
--

CREATE TABLE `lineups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `concert` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lineups`
--

INSERT INTO `lineups` (`id`, `name`, `description`, `image`, `concert`) VALUES
(42, 'One Direction', 'One Direction showcase', '65560000a38c3.jpeg', '231116192729'),
(43, 'Adele', 'Spectacular Lights and Effects with Adele', '6555fff36e946.jpeg', '231116192729'),
(44, 'Rihanna', 'Rihannas genuine connection with her fans', '6556007b496ad.jpeg', '231116194398'),
(45, 'Ed Sheeran', 'The concert is a visual spectable with spectacular lights', '6556009d61104.jpeg', '231116194398'),
(46, 'Beyonce', 'Experience the reign of Queen Bey', '655600b340166.jpeg', '231116194398'),
(47, 'Taylor Swift', 'Taylor`s performance exudes fierceness and fearlessness', '655600d935fff.jpeg', '231116194398');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `concert_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `category`, `payment`, `concert_id`) VALUES
('20231116270', 'salwa', 'salwa@email.com', 'vip', 'credit', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'salwarlndh', '$2y$10$seSMqmJAbJGe6nAXUlXE5O2Ls0SI9e7iSunIU1ykjc2TV2tiHMVvW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lineups`
--
ALTER TABLE `lineups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concert` (`concert`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lineups`
--
ALTER TABLE `lineups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
