-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 11:37 AM
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
-- Database: `roofsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(15) NOT NULL,
  `sender_id` int(15) NOT NULL,
  `receiver_id` int(15) NOT NULL,
  `chat` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('unread','read') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `chat`, `datetime`, `status`) VALUES
(24, 36, 34, '5eZ8EabKQNq+eV63U5/zjTfg2AMgfg/bAjJxB5SYZSCrXBw=', '2021-05-23 13:49:57', 'read'),
(25, 34, 36, '1OZjXbqfe5//dx+yUcv7hnL92QsmOxQ=', '2021-05-23 13:54:15', 'read'),
(26, 36, 34, 'wuhxBOmeYZuxfw0=', '2021-05-23 13:58:42', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `pid` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`id`, `user_id`, `pid`) VALUES
(27, 36, 33),
(29, 33, 38),
(30, 36, 38);

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `type` enum('RENT','SALE') NOT NULL,
  `description` longtext NOT NULL,
  `price` varchar(15) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `map_link` text NOT NULL,
  `status` enum('Pending','Approved') NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`id`, `user_id`, `image`, `name`, `location`, `type`, `description`, `price`, `contact`, `map_link`, `status`, `date`) VALUES
(33, 34, '4ab83b56603cb1a925357bb8f983b5b9.jpg', 'House Gamma', 'Banani', 'RENT', '                                                                <b>1700 square feet</b><br>Room - 3, Washroom - 4, Middle room, Kitchen                                                                ', '55000', '01712563779', '                                                                      <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.8461590137777!2d90.39843251493382!3d23.788491984570598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7131e2be5b3%3A0xe459e62daeaaac6f!2sBanani%20Chairmanbari%20Masjid!5e0!3m2!1sen!2smy!4v1619969048152!5m2!1sen!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>                                                                      ', 'Approved', '2021-05-02 23:24:26'),
(34, 34, '6900d1a017966668789f52f581e46e3d.jpg', 'House Mike', 'Mohakhali', 'RENT', '                                                                <b>2250 square feet</b><br>3 rooms, 4 washroom, drawing-dining, kitchen cabinet, wall cabinet, well ventilated therefore enough light & air circulation for attractive office atmosphere. The 3 storied building is highly secured and well maintained. It has beautiful balconies for overlooking the scenery at Banani.<br>                                                                ', '100000', '01712563779', '                                                                      <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3867.8653188523876!2d90.40465992185322!3d23.790891070230867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x71888489feb4c840!2sBanani%20Jame%20Mosjid!5e0!3m2!1sen!2smy!4v1619969229234!5m2!1sen!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>                                                                      ', 'Approved', '2021-05-02 23:27:30'),
(38, 34, '4d7502145917f302b64b414fea1caf44.jpg', 'House Alpha', 'Uttara', 'SALE', '                                                                <b>2200 square feet</b><br>Room - 4, Washroom - 3, Middle room, Kitchen                                                                ', '17000000', '01968836947', '                                                                      <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.7343740755127!2d90.35327905310481!3d23.792471444452005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0ebcb4fee03%3A0xa3aa9883b114569d!2sJ%20S%20Enterprise!5e0!3m2!1sen!2smy!4v1619971327270!5m2!1sen!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>                                                                      ', 'Approved', '2021-05-03 00:07:51'),
(39, 34, '09eb8687fa794ee829c4c16b3e523e89.jpg', 'House Beta', 'DOHS', 'SALE', '                                                                <b>2150 square feet</b><br>Room - 4, Washroom - 4, Dining room, Kitchen                                                                ', '19000000', '01712563779', '                                                                      <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d861.3221487648613!2d90.41270611402355!3d23.813048789487613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c655751ab4a9%3A0x2b06dbec0a5f00a9!2sZaastex%20House!5e0!3m2!1sen!2smy!4v1619971768980!5m2!1sen!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>                                                                      ', 'Approved', '2021-05-03 00:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_card` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `authtoken` varchar(255) NOT NULL,
  `status` enum('pending','blocked','active') NOT NULL,
  `type` enum('buyer','seller','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `id_card`, `dob`, `phone`, `email`, `password`, `authtoken`, `status`, `type`) VALUES
(33, 'Hazi Md Abdul Ali', '3292983396', '1955-09-11', '01789157962', 'abdulali@gmail.com', '01f8f690c45ff8e04b5e557276be7abe', '', 'active', 'admin'),
(34, 'Shahan Ali Pranto', '6904733430', '1998-02-23', '01793594239', 'shahan@gmail.com', '38b95a55a47de4b7f9175caa2c948673', '', 'active', 'seller'),
(36, 'Saadmann Shadab', '4205549456', '1998-07-23', '01673772379', 'shadab@gmail.com', 'e422ccf13a7198035b509c085111060b', '', 'active', 'buyer'),
(37, 'Farhan Islam', '2855601023', '1998-08-22', '01789223251', 'farhan@gmail.com', 'd1bbb2af69fd350b6d6bd88655757b47', '', 'active', 'seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `fav`
--
ALTER TABLE `fav`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
