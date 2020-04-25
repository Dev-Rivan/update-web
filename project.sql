-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 12:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Rivan', 'administrator@gmail.com', 'logovan.png', '$2y$10$BqTvkHdyYT/t8x1Jttjx7u9jNtni7lWh7VSNI9SZOMzEZXZQQMUFK', 1, 1, 1580071788),
(2, 'user', 'user@gmail.com', 'default.jpg', '$2y$10$SHoMr3QKtpSR9rsI/CLx4OFIMFK4.COPQU7op5bK.bqGdzXM7gnrK', 2, 1, 1580072660),
(11, 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$UfdYGjKHphI2/13fMYUWzuZyWXZLmF0mGNITM5E/qVwhOS7kGNyF2', 3, 1, 1582188425),
(14, 'rivan', 'huntrs84@gmail.com', 'default.jpg', '$2y$10$j3SFBOPTsK7G69UVdwWrGuObZwrFJcbekBHjeNtzF9tjOZklN1Fse', 2, 1, 1584025500),
(16, 'test', 'test2@gmail.com', 'default.jpg', '$2y$10$0VRPhi7LRym86sQtJ1.T2uysKrLmUFCg3xBIBCQpE8hmb0OGK4YRS', 3, 0, 1584028589),
(17, 'test', 'test@gmail.com', 'default.jpg', '$2y$10$2ydWWX3jO3BvyLvhiOhQ3OeCVjJUCiDMgSGHlOVBTxpB/OAfKYCzy', 3, 0, 1584322212),
(18, 'asd', 'test3@gmail.com', 'default.jpg', '$2y$10$XtysYQdmOWuFcCR7VOymmOTxlbmMeVwtx7bmhPP1MqSAY0IJUab4W', 2, 0, 1584322240);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(20, 1, 2),
(21, 1, 6),
(27, 3, 2),
(35, 1, 4),
(36, 1, 5),
(38, 3, 3),
(39, 2, 3),
(41, 3, 5),
(42, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_active`
--

CREATE TABLE `user_active` (
  `id` int(11) NOT NULL,
  `active` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_active`
--

INSERT INTO `user_active` (`id`, `active`) VALUES
(0, 'Nonactive'),
(1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Admin'),
(3, 'User'),
(4, 'Menu'),
(5, 'User_management'),
(15, 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'administrator', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'DashBoard', 'user', 'fas fa-fw fa-user-tie', 1),
(4, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 4, 'SubMenu Management', 'menu/submenu', 'fa fa-fw fa-folder-open', 1),
(6, 1, 'User Access Menu', 'administrator/useraccess', 'fas fa-fw fa-user-tie', 1),
(11, 2, 'Admin', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(14, 5, 'User Management', 'user_management', 'fas fa-fw fa-users', 1),
(25, 15, 'test1', 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(10, 'adminuser@gmail.com', 'P/9QNL5jnWIyD5nQmYBvNQ09ih3Mn6dJz+coV3nQ+eo52uI=', 1582188425),
(11, 'huntrs84@gmail.com', 'L4Ne2lur4F6IHYbOPbCbuQ4mAs108W8Jpr06K59fAuePZ5c=', 1584025516);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_active`
--
ALTER TABLE `user_active`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_active`
--
ALTER TABLE `user_active`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
