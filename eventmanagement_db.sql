-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2016 at 05:45 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventmanagement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `em_activitiesuser`
--

CREATE TABLE `em_activitiesuser` (
  `id` int(11) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `item_id` varchar(256) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_activitiesuser`
--

INSERT INTO `em_activitiesuser` (`id`, `id_user`, `description`, `item_id`, `date`) VALUES
(1, 'ECD2FD56BAAA7D522748DB3BA18CB79B', 'Sign out', NULL, '2016-10-04 10:26:14'),
(2, 'ECD2FD56BAAA7D522748DB3BA18CB79B', 'signin', NULL, '2016-10-04 10:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `em_user`
--

CREATE TABLE `em_user` (
  `id` int(11) NOT NULL,
  `idsdm` varchar(256) NOT NULL,
  `nik` int(11) NOT NULL,
  `id_user_group` int(11) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(256) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `reset_password` varchar(11) DEFAULT NULL,
  `forgot_pass_code` int(11) DEFAULT NULL,
  `forgot_pass_date` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `kode_cabang` varchar(256) DEFAULT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `kode_fingerprint` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_user`
--

INSERT INTO `em_user` (`id`, `idsdm`, `nik`, `id_user_group`, `username`, `fullname`, `email`, `reset_password`, `forgot_pass_code`, `forgot_pass_date`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_active`, `kode_cabang`, `foto`, `kode_fingerprint`) VALUES
(1, 'ECD2FD56BAAA7D522748DB3BA18CB79B', 93190615, 00000000001, 'IHidayat0808', 'Ilham Hidayat', 'ilham_ild@pnm.co.id', NULL, NULL, NULL, 0, '2016-10-03 14:47:40', NULL, NULL, 'active', NULL, 'http://192.168.10.171/pnm/sunfish5upload/ehrm/photo/ILHAM HIDAYAT.jpg', NULL),
(2, 'A8F5FDAC44E0DC347C5D7AABCA0A101E', 890600, 00000000000, 'AIrnawati0628', 'Andi Irnawati', 'andi@pnm.co.id', NULL, NULL, NULL, 0, '2016-10-03 16:08:15', NULL, NULL, 'active', NULL, 'http://192.168.10.171/pnm/sunfish5upload/ehrm/photo/ANDI2.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_usergroup`
--

CREATE TABLE `em_usergroup` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `definisi` varchar(256) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_usergroup`
--

INSERT INTO `em_usergroup` (`id`, `definisi`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(00000000001, 'Officer', 0, '2016-10-03 00:00:00', NULL, NULL, 'active'),
(00000000002, 'admin', 0, '2016-10-03 00:00:00', NULL, NULL, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `em_activitiesuser`
--
ALTER TABLE `em_activitiesuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_user`
--
ALTER TABLE `em_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_usergroup`
--
ALTER TABLE `em_usergroup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `em_activitiesuser`
--
ALTER TABLE `em_activitiesuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `em_user`
--
ALTER TABLE `em_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `em_usergroup`
--
ALTER TABLE `em_usergroup`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
