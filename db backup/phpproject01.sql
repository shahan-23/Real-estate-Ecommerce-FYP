-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 12:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpproject01`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersID` int(11) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersNid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersID`, `usersEmail`, `usersName`, `usersNid`, `usersPwd`) VALUES
(2, 'shahan@gmail.com', 'Shahan Ali Pranto', 'BR0526449', '$2y$10$SD00Vb3h2JsfykkbISL29.lQErRMOBgDIsEGhaeAjxHWIVyynFnbW'),
(21, 'priyanka@gmail.com', 'Priyanka Ali', 'GR111222', '$2y$10$hclaTasfltpT7WbDiR7s/uDeMO7Oma/9oWmIuEhpXcY.NwROKQZfy'),
(26, 'rukon@gmail.com', 'Rukon Fahim', 'BR123123', '$2y$10$G1ma2nAvcw3GD2DZy0HaW.LuHub5zXe.IYYyqFLI.NdkSBvIkY/nm'),
(28, 'mira@gmail.com', 'Rabeya Mira', 'BR333666', '$2y$10$bd9vKWwMJNoqatIfFFMigubnODEvhi.0pzvxVIwfbBCk5/vYRYl2m'),
(29, 'third@gmail.com', 'Third Person', 'BR333444', '$2y$10$tLRqnUgzgvIxBUp45lloYu3KVXjhQoHHH2lcFM/Qv6xWu5RS0rb/u'),
(33, 'fahad@gmail.com', 'Fahad Ali', 'SD111222', '$2y$10$MhiD.WLiGBJSwzcLvSgPfuwgMHIELydchf5cl45YwwaMw/MMK4AhO'),
(34, 'someone@gmail.com', 'Some One', 'SO111222', '$2y$10$yRZUqLTASfrtWtTDxtwul.SV0HJta9Zzn.YTL61a.fEOtD87cd6VC'),
(35, 'demo@gmail.com', 'Demo Person', 'DB111222', '$2y$10$w9m4.fmztrN.vm13iPvGwuqaIIMymVzJpm8Uu9eIS8v2ymh2Dbq86'),
(38, 'first@gmail.com', 'First Person', '111222', '$2y$10$jVaTuovRnnNbIDRV.P99o.v9aecEAsaiH7VaIY5J9OxxHsUjGovhe'),
(39, 'second@gmail.com', 'Second Person', '222333', '$2y$10$f0oKYbINlaslHKY6IZ1Xheh9A33uNBRfV4bkwYgClcY2jnKppysoy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
