-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Sep 2016 pada 10.15
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.4

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
-- Struktur dari tabel `em_activitiesuser`
--

CREATE TABLE `em_activitiesuser` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` varchar(256) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `em_user`
--

CREATE TABLE `em_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED ZEROFILL NOT NULL,
  `id_user_group` int(11) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `reset_password` varchar(11) DEFAULT NULL,
  `forgot_pass_code` int(11) DEFAULT NULL,
  `forgot_pass_date` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `em_usergroup`
--

CREATE TABLE `em_usergroup` (
  `id` int(11) NOT NULL,
  `definisi` varchar(256) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `em_user`
--
ALTER TABLE `em_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `em_usergroup`
--
ALTER TABLE `em_usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
