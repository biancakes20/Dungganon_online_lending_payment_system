-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2025 at 12:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dungganon_online_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `id`, `name`, `address`, `contact`, `amount`, `status`, `date`) VALUES
(34, 2, 'bianca', 'Bais', 2147483647, 4000, 'declined', '2025-12-17'),
(35, 2, 'jera', 'cambagroy', 2147483647, 3000, 'approved', '2025-12-17'),
(36, 2, 'juvi', 'cambagroy', 2147483647, 1000, 'pending', '2025-12-18'),
(37, 8, 'Ferdinand', 'Manuyod', 2147483647, 2000, 'approved', '2025-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `date`) VALUES
(1, 'juvi@gmail.com', '$2y$10$Ck0fZ/ReDoHL6.QYxBucXe29exy7f03aLAhPP405KQ1j69VtZeuYu', '2025-11-24'),
(2, 'bianca@gmail.com', '$2y$10$OPvfz20zjlGPxm1XeMsXfO.EaJkrNK9DoJOjwmn0bY7hE9hTrVQEa', '2025-11-24'),
(3, 'james@gmail.com', '$2y$10$y6Ov5rLH/1lT5fST9YNtI.UjnwImi4sfq35w99bcjxYr6cAF2DgC2', '2025-11-24'),
(4, 'hgsgj@gmail.com', '$2y$10$arXIL9ihY4P7mu25pgdQ9OoS2Hn22TpsZqM6QJXjiSoxHx8jbfJru', '2025-11-24'),
(5, 'jer@gmail.com', '$2y$10$x5h0yRAnwp0HoSIlAQ2GROBT5vbgRuNNklfuMsIa62fgvMKMGld9e', '2025-11-24'),
(6, 'rose@gmail.com', '$2y$10$J9YPZLjmnTLDXzjwkPuI.ejC0ouvzC4/HFO9UgFR9a/dbVvPuNEgu', '2025-12-05'),
(7, 'jera@gmail.com', '$2y$10$UfWbGMPfJB4djqxfytp4hO3FL4TZaKNT8EXU3xqnxNcmbaC5ZBvFe', '2025-12-19'),
(8, 'blando@gmail.com', '$2y$10$hRuN.S7gX/sqqlzgeKvmJO3.RGoc3GQgAwA1eDBChXbbKYuEIF7tS', '2025-12-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
