-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2018 at 01:38 PM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `session_example`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `current` varchar(50) DEFAULT NULL,
  `author` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `isbn`, `owner`, `current`, `author`, `genre`, `location`) VALUES
(1, 'To Kill a Mockingbird', 'IS24332', 'maa4', 'another', 'Harper Lee', 'fiction', 'DCC 319'),
(2, 'Rita Hayworth and Shawshank Redemption', 'ISCsad2', 'sds', 'toniu', 'Stephen King', 'fiction', 'DCC 322'),
(3, 'Dreams from My Father', 'ISfsds', 'toniu', 'sds', 'Barack Obama', 'non-fiction', 'WestHall'),
(4, 'Looking for Alaska', 'AISDAS', 'toniu', 'toniu', 'John Green', 'fiction', 'asdasd'),
(5, 'Odyssey', 'IS232323', 'toniu', 'another', 'Homer', 'Epic poetry', 'AE 218'),
(6, 'Macbeth', 'ISBNasdasd', 'toniu', 'toniu', 'Shakespeare', 'Tragedy', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'manohr', '', 'manohr@rpi.edu'),
(2, 'maa5', '', 'maa5@rpi.edu'),
(3, 'serebn', '', 'serebn@rpi.edu'),
(4, 'sample', '7b376e0e2f31a7c5953d2ce96ff33218f3b0e92e6367ac6bc1981df627c3f7b0', 'sample@rpi.edu'),
(6, 'sds', '08f62907a455dade60cf0a10a794c92c1e6a94d970b3df56aae6de80486275f0', 'sds@rpi.edu'),
(7, 'another', '$2y$10$sBcQs2gNf1fNKZLud0sRR.9GER4hxaO32sBJyqNyPXe6zcfRDBqPu', 'another@rpi.edu'),
(8, 'manohrm', '$2y$10$nqNsKvKaBSf1hY90Vfn73e3BGtxQu71XIjybzVkSPzqoLgnrQd82C', 'manohrm@rpi.edu'),
(9, 'maa4', '$2y$10$zdruopTjIVQZyWQRCLd5yeCb8qqoLzRfuqGWTSYGEBkxcCjf8cGyu', 'maa4@rpi.edu'),
(10, 'toniu', '$2y$10$GUXn82Z9I5jy/jG1zNO1Dub2fj6jh1nzUv4xIs.VPeBdjq.Y5eMQ.', 'toniu@rpi.edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`),
  ADD KEY `current` (`current`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`current`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;