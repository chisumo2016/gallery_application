-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3310
-- Generation Time: Feb 19, 2019 at 06:20 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `title`, `description`, `filename`, `type`, `size`) VALUES
(1, 'Photo from Mountain', 'Basic code completion helps you complete the names of classes, methods, and keywords within the visibility scope. When you invoke code completion, PhpStorm analyses the context and suggests the choices that are reachable from the current caret position (suggestions also include Live ', 'image.jpg', 'image', 11),
(2, 'Just Some Test', 'something weared', 'image.png', 'image', 13),
(3, 'Just Some Test', 'something weared', 'image.png', 'image', 13),
(4, 'test', 'test', 'test.jpg', 'any', 2),
(5, 'wadda', '', '_large_image_1.jpg', 'image/jpeg', 479843),
(6, 'wadda', '', '_large_image_1.jpg', 'image/jpeg', 479843),
(7, 'rrr', '', '_large_image_1.jpg', 'image/jpeg', 479843),
(8, 'ttt', '', '_large_image_4.jpg', 'image/jpeg', 554659),
(9, 'gggggggggggg', '', '_large_image_1.jpg', 'image/jpeg', 479843);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, 'rico', '123', 'John', 'Doe'),
(2, 'juma', 'password', 'Juma', 'Don'),
(3, '{value}', '{value}', 'Bernard1', 'Bernard1'),
(5, 'Tanzania1', 'Tanzania1', 'Tanzania', 'Tanzania'),
(7, 'Sue  200', '', '', ''),
(8, 'Sue  200', '', '', ''),
(9, 'Blair', 'admin', 'Tony', 'Blair'),
(10, 'Sudent', 'something weared', 'SOL', 'Don\'t Know'),
(11, 'NEW USER', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
