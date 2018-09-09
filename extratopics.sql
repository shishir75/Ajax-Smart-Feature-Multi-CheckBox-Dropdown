-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 12:19 PM
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
-- Database: `extratopics`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(1, 'php'),
(2, 'java'),
(3, 'JavaScript'),
(4, 'React'),
(5, 'Android'),
(6, 'Go'),
(7, 'c'),
(8, 'Android'),
(9, 'Android'),
(10, 'React'),
(11, 'C++'),
(12, 'React'),
(13, 'C++'),
(14, 'Android'),
(15, 'React'),
(16, 'C++'),
(17, 'React'),
(18, 'Bango'),
(19, 'A'),
(20, 'B'),
(21, 'C'),
(22, 'Android'),
(23, 'React'),
(24, 'C++'),
(25, 'React'),
(26, 'Android'),
(27, 'C++'),
(28, 'Shishir Sarder'),
(29, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `status`) VALUES
(8, 'shishir75', 'shishir sarder', 'published'),
(15, 'shishir75', 'shishir sarder', 'published'),
(16, 'shishir75', 'shishir sarder', 'published'),
(17, 'shishir75', 'shishir sarder', 'draft'),
(18, 'shishir75', 'shishir sarder', 'published'),
(19, 'shishir75', 'shishir sarder', 'published'),
(20, 'shishir75', 'shishir sarder', 'draft'),
(21, 'shishir75', 'shishir sarder', 'draft'),
(22, 'shishir75', 'shishir sarder', 'draft'),
(23, 'shishir75', 'shishir sarder', 'draft'),
(24, 'shishir75', 'shishir sarder', 'draft'),
(25, 'shishir75', 'shishir sarder', 'draft'),
(26, 'shishir75', 'shishir sarder', 'draft'),
(27, 'shishir75', 'shishir sarder', 'draft'),
(28, 'shishir75', 'shishir sarder', 'draft');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
