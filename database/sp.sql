-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 06:32 PM
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
-- Database: `sp`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `status`) VALUES
(1, 'fahim@gmail.com', '$2y$10$3FK.6ZTM./bnbQG1pmLVduizwo3kMtCt.kHqM6bPSEV1vEwAz7XNO', 'Active'),
(4, 'fahimd@gmail.com', '$2y$10$Mi8gzc9CgeFVYniCqEtw6e79DHu9vouvtZDj8KdacFZbSlyaOVRu2', 'Active'),
(6, 'fahidmd@gmail.com', '$2y$10$zjxZIUX6pdp5tOwdfZOiTulSxs04Q7vQ7k4yJCjkLt7FkX2h50TFq', 'Active'),
(8, 'fahisfm@gmail.com', '$2y$10$l7REGuk6ZUldlWxrPePcAufyHmRcduza9TN.AzM1OZMpFNWm6eal.', 'Active'),
(9, 'jam@gmail.com', '$2y$10$0sfGwumfV6lUk4YCye858uJqGZEy6KCRXiClapwfO2HQa4DwIEb/W', 'Active'),
(10, 'alan@gmail.com', '$2y$10$F87ND/r8TKJNi7YD.r5jLOZBwJUvAAVAp85Rax1pppzhXZ15ksL.6', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `county`, `status`) VALUES
(1, 'Fahim', 'f@gmail.com', '$2y$10$SFAWv9B3vf3/E1uXdZ29zObtsqIU2YnSpaH11ddb6rPebzleQmmG.', 'Wajir', 'Active'),
(3, 'Fahim', 'alsan@gmail.com', '$2y$10$ASIm68wtVYZaam.eQ4QNJ.rMD1ZPVYlvCi/e/wFgfsGD2cCsIwXnO', 'Garissa', 'Active'),
(4, 'Fahim', 'alssan@gmail.com', '$2y$10$kplG5wtM7or6lVkDjyWuM.p2kBxJpqVBzLpqfmL34XhAHJaNUpseK', 'Garissa', 'Active'),
(5, 'jamse', 'fi@gmail.com', '$2y$10$OLfqoW6euIgvG.3nwvpVHelYhc7Ywsgs1iZ6jZSqmOSBMaxT8FzvK', 'Garissa', 'Active'),
(6, 'jamse', 'fii@gmail.com', '$2y$10$9JQ8IZ2JYz42FFmu7gK1y.3hNEYYIW6uhrYQ24W4DjtPorFapXrTe', 'Garissa', 'Active'),
(7, 'Fahim', 'fq@gmail.com', '$2y$10$uwm0q9EUx3vopSqdZQFsq.uvdvLHUBTb97i/P2/9vPoo24PzFEWCW', 'Garissa', 'Active'),
(10, 'Fahim', 'tf@gmail.com', '$2y$10$9UE7KSNtXEKn1OXdOTYHDOePGbYqgT5zUrLj3lrgCZwayVYjHWN/O', 'Garissa', 'Active'),
(11, 'Fahim', 'q@gmail.com', '$2y$10$xNdCluX.EPDhOGA3XOSfB.x/tNswi.ZcNysKfxEkPysehhaQqj4uC', 'Wajir', 'Active'),
(14, 'Fahim', 'fg@gmail.com', '$2y$10$bkO.zXUHYrcsu/b63PGOHurzrOBv9cT8B61s/qgyEkSa2R79USTPa', 'Garissa', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
