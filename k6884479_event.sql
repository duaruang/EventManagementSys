-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 10, 2016 at 02:19 AM
-- Server version: 5.5.52-cll
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k6884479_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `em_activitiesuser`
--

CREATE TABLE IF NOT EXISTS `em_activitiesuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `item_id` varchar(256) DEFAULT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

--
-- Dumping data for table `em_activitiesuser`
--

INSERT INTO `em_activitiesuser` (`id`, `id_user`, `description`, `item_id`, `date`, `ip_address`) VALUES
(7, '93190615', 'Tambah Cabang', 'jghjghrt', '2016-10-06 18:43:04', ''),
(8, '93190615', 'Tambah Cabang', 'bilangan', '2016-10-06 18:51:22', ''),
(10, '93190615', 'Edit Cabang', 'bilangan', '2016-10-06 19:11:01', ''),
(11, '93190615', 'Edit Cabang', 'bilangan', '2016-10-06 19:11:07', ''),
(12, '93190615', 'Edit Cabang', 'bilangan 123123', '2016-10-06 19:11:25', ''),
(13, '93190615', 'Tambah Cabang', 'werw4343', '2016-10-06 19:17:58', ''),
(14, '93190615', 'Edit Cabang', 'fasfaf', '2016-10-06 19:23:10', ''),
(15, '93190615', 'Edit Cabang', '123123', '2016-10-06 19:24:03', ''),
(16, '93190615', 'Edit Cabang', '123123', '2016-10-06 19:24:08', ''),
(17, '93190615', 'Edit Cabang', '123123 12313123', '2016-10-06 19:24:11', ''),
(18, '93190615', 'Edit Cabang', '123123 12313123', '2016-10-06 19:24:13', ''),
(19, '93190615', 'Edit Cabang', '123123 12313123', '2016-10-06 19:24:16', ''),
(20, '93190615', 'Edit Cabang', 'asdad', '2016-10-06 19:26:01', ''),
(21, '93190615', 'Edit Cabang', 'asdad', '2016-10-06 19:26:07', ''),
(22, '93190615', 'Edit Cabang', 'asdad tggggsd', '2016-10-06 19:27:16', ''),
(23, '93190615', 'Edit Cabang', 'asdad tggggsd ererer', '2016-10-06 19:27:20', ''),
(24, '93190615', 'Edit Cabang', 'asdad tggggsd ererer', '2016-10-06 19:27:24', ''),
(25, '93190615', 'Edit Cabang', 'asdad tggggsd ererer', '2016-10-06 19:27:27', ''),
(26, '93190615', 'Edit Cabang', 'asdad tggggsd ererer', '2016-10-06 19:27:30', ''),
(27, '93190615', 'Edit Cabang', 'asdad tggggsd ererer', '2016-10-06 19:27:32', ''),
(28, '93190615', 'Menghapus Cabang', 'asdad tggggsd ererer', '2016-10-06 19:47:30', ''),
(29, '93190615', 'Menghapus Cabang', 'fasfaf', '2016-10-06 19:53:04', ''),
(30, '93190615', 'Menghapus Cabang', 'fdgdfgd', '2016-10-06 19:54:48', ''),
(31, '93190615', 'Menghapus Cabang', 'jghjghrt', '2016-10-06 19:56:27', ''),
(32, '93190615', 'Menghapus Cabang', '123123 12313123', '2016-10-06 19:56:36', ''),
(33, '93190615', 'Tambah Cabang', 'coba lagi', '2016-10-06 19:58:13', ''),
(34, '93190615', 'Edit Cabang', 'afasfasfasfa', '2016-10-06 19:58:36', ''),
(35, '93190615', 'Menghapus Cabang', 'jghjghj', '2016-10-06 19:59:02', ''),
(36, '93190615', 'Menghapus Cabang', 'coba', '2016-10-06 20:02:27', ''),
(37, '93190615', 'Menghapus Cabang', 'coba lagi', '2016-10-06 20:02:33', ''),
(38, '93190615', 'Menghapus Cabang', 'coba satu dua', '2016-10-06 20:02:36', ''),
(39, '93190615', 'Edit Cabang', 'afasfasfasfa', '2016-10-06 20:03:57', ''),
(40, '93190615', 'Sign out', '', '2016-10-06 22:33:17', ''),
(41, '93190615', 'Sign in', '', '2016-10-06 22:33:24', ''),
(42, '93190615', 'Sign out', '', '2016-10-06 22:34:50', ''),
(43, '93190615', 'Sign in', '', '2016-10-06 22:35:04', ''),
(44, '93190615', 'Sign out', '', '2016-10-06 22:35:19', ''),
(45, '93190615', 'Sign in', '', '2016-10-06 22:35:24', ''),
(46, '93190615', 'Sign in', '', '2016-10-06 22:47:17', ''),
(47, '93190615', 'Sign out', '', '2016-10-06 22:47:26', ''),
(48, '890600', 'Sign in', '', '2016-10-06 22:47:32', ''),
(49, '890600', 'Sign out', '', '2016-10-06 22:47:57', ''),
(50, '96490815', 'Sign in', '', '2016-10-06 22:48:03', ''),
(51, '96490815', 'Sign in', '', '2016-10-07 09:26:14', '::1'),
(52, '96490815', 'Tambah Menu', 'User', '2016-10-07 09:28:19', '::1'),
(53, '96490815', 'Tambah Menu', 'User Group', '2016-10-07 09:28:40', '::1'),
(54, '96490815', 'Tambah Menu', 'Matriks Program & Anggaran', '2016-10-07 09:29:06', '::1'),
(55, '96490815', 'Tambah Menu', 'Trainer', '2016-10-07 09:29:24', '::1'),
(56, '96490815', 'Tambah Menu', 'Materi', '2016-10-07 09:29:53', '::1'),
(57, '96490815', 'Tambah Menu', 'Kategori Event', '2016-10-07 09:30:08', '::1'),
(58, '96490815', 'Tambah Menu', 'Tipe Pelatihan', '2016-10-07 09:30:28', '::1'),
(59, '96490815', 'Tambah Menu', 'Cabang', '2016-10-07 09:30:41', '::1'),
(60, '96490815', 'Tambah Menu', 'Divisi', '2016-10-07 09:31:00', '::1'),
(61, '96490815', 'Tambah Menu', 'Pengajuan Event', '2016-10-07 09:31:22', '::1'),
(62, '96490815', 'Tambah Menu', 'Persetujuan Memo Event', '2016-10-07 09:31:44', '::1'),
(63, '96490815', 'Tambah Menu', 'Data Validasi & Persetujuan Event', '2016-10-07 09:32:08', '::1'),
(64, '96490815', 'Tambah Menu', 'Realisasi Event', '2016-10-07 09:32:28', '::1'),
(65, '96490815', 'Tambah Menu', 'Persetujuan Pertanggung Jawaban', '2016-10-07 09:32:57', '::1'),
(66, '96490815', 'Tambah Menu', 'Verifikasi Pertanggung Jawaban', '2016-10-07 09:33:23', '::1'),
(67, '96490815', 'Tambah Menu', 'Kegiatan', '2016-10-07 09:33:51', '::1'),
(68, '96490815', 'Tambah Menu', 'Materi Feedback', '2016-10-07 09:34:50', '::1'),
(69, '96490815', 'Tambah Menu', 'Realisasi Event & RKAP', '2016-10-07 09:35:17', '::1'),
(70, '96490815', 'Tambah Menu', 'Feedback', '2016-10-07 09:35:31', '::1'),
(71, '96490815', 'Tambah Menu', 'Trainer s', '2016-10-07 09:45:39', '::1'),
(72, '96490815', 'Tambah Menu', 'Trainer s', '2016-10-07 09:47:30', '::1'),
(73, '96490815', 'Tambah Menu', 'Trainer suka', '2016-10-07 09:47:44', '::1'),
(74, '96490815', 'Tambah Menu', 'Hola', '2016-10-07 09:50:59', '::1'),
(75, '96490815', 'Tambah Menu', 'Hola', '2016-10-07 09:52:09', '::1'),
(76, '96490815', 'Menghapus menu', 'Hola', '2016-10-07 09:52:19', '::1'),
(77, '96490815', 'Tambah Menu', 'Trainer', '2016-10-07 09:54:01', '::1'),
(78, '96490815', 'Tambah Divisi', 'PPL', '2016-10-07 11:07:22', '::1'),
(79, '96490815', 'Tambah Divisi', 'PPI', '2016-10-07 11:07:31', '::1'),
(80, '96490815', 'Edit Divisi', 'PPL 1', '2016-10-07 11:10:24', '::1'),
(81, '96490815', 'Tambah Divisi', 'Coba 123', '2016-10-07 11:10:37', '::1'),
(82, '96490815', 'Menghapus divisi', 'Coba 123', '2016-10-07 11:11:13', '::1'),
(83, '96490815', 'Sign out', '', '2016-10-07 11:22:40', '::1'),
(84, '890600', 'Sign in', '', '2016-10-07 11:22:48', '::1'),
(85, '890600', 'Tambah Trainer', 'Trainer A', '2016-10-07 13:17:51', '::1'),
(86, '890600', 'Tambah Trainer', 'Joko Priambodo', '2016-10-07 13:33:59', '::1'),
(87, '890600', 'Edit Trainer', 'Joko Priambodo 1', '2016-10-07 13:36:17', '::1'),
(88, '890600', 'Edit Trainer', 'Joko Priambodo 1', '2016-10-07 13:36:30', '::1'),
(89, '890600', 'Edit Trainer', 'Joko Priambodo', '2016-10-07 13:36:44', '::1'),
(90, '890600', 'Edit Trainer', 'Joko Priambodo', '2016-10-07 13:39:02', '::1'),
(91, '890600', 'Edit Trainer', 'Joko Priambodo', '2016-10-07 13:41:50', '::1'),
(92, '890600', 'Edit Trainer', 'Joko Priambodo', '2016-10-07 13:41:54', '::1'),
(93, '890600', 'Edit Trainer', 'Joko Priambodo 1', '2016-10-07 13:42:00', '::1'),
(94, '890600', 'Tambah Trainer', 'Joko Priambodo', '2016-10-07 13:43:21', '::1'),
(95, '890600', 'Edit Trainer', 'Joko Priambodo 1', '2016-10-07 13:43:52', '::1'),
(96, '890600', 'Edit Trainer', 'Joko Priambodo 123', '2016-10-07 13:44:45', '::1'),
(97, '890600', 'Edit Trainer', 'Joko Priambodo 123', '2016-10-07 13:44:48', '::1'),
(98, '890600', 'Tambah Trainer', 'Lisa Maruntu', '2016-10-07 13:49:20', '::1'),
(99, '890600', 'Menghapus trainer', 'Joko Priambodo 123', '2016-10-07 13:49:33', '::1'),
(100, '890600', 'Edit Cabang', 'Pekanbaru', '2016-10-07 13:50:32', '::1'),
(101, '890600', 'Edit Cabang', 'Riau', '2016-10-07 13:50:54', '::1'),
(102, '890600', 'Edit Cabang', 'Balikpapan', '2016-10-07 13:51:18', '::1'),
(103, '890600', 'Edit Cabang', 'Bandung', '2016-10-07 13:51:48', '::1'),
(104, '890600', 'Tambah Divisi', 'IT', '2016-10-07 13:52:12', '::1'),
(105, '890600', 'Tambah klasifikasi', 'Materi Public Speaking', '2016-10-07 14:10:27', '::1'),
(106, '890600', 'Edit klasifikasi', 'Materi Public Speaking 1', '2016-10-07 14:10:54', '::1'),
(107, '890600', 'Edit klasifikasi', 'Materi Public Speaking 1', '2016-10-07 14:10:56', '::1'),
(108, '890600', 'Tambah klasifikasi', 'Materi Untuk Dihapus', '2016-10-07 14:11:11', '::1'),
(109, '890600', 'Menghapus klasifikasi', 'Materi Untuk Dihapus', '2016-10-07 14:11:18', '::1'),
(110, '890600', 'Edit Divisi', 'IT', '2016-10-07 14:35:00', '::1'),
(111, '890600', 'Tambah materi', 'Materi Pengantar Seminar', '2016-10-07 14:38:48', '::1'),
(112, '890600', 'Tambah materi', 'Contoh Materi', '2016-10-07 14:52:26', '::1'),
(113, '890600', 'Tambah materi', 'Inner Beauty', '2016-10-07 14:52:55', '::1'),
(115, '890600', 'Edit materi', 'Materi Pengantar Seminar', '2016-10-07 14:57:29', '::1'),
(116, '890600', 'Edit materi', 'Contoh Materi', '2016-10-07 14:59:35', '::1'),
(117, '890600', 'Menghapus materi', 'Inner Beauty', '2016-10-07 15:05:27', '::1'),
(121, '890600', 'Tambah Tipe Pelatihan', 'asdasdasdsadsa', '2016-10-07 15:34:33', '::1'),
(122, '890600', 'Tambah Tipe Pelatihan', 'asdasdasdsadsa', '2016-10-07 15:36:16', '::1'),
(123, '890600', 'Tambah Tipe Pelatihan', 'asdasdasdsadsa', '2016-10-07 15:36:29', '::1'),
(125, '890600', 'Tambah Tipe Pelatihan', 'External Training', '2016-10-07 15:37:56', '::1'),
(126, '890600', 'Tambah Tipe Pelatihan', 'Pelatihan Mekar', '2016-10-07 15:45:56', '::1'),
(127, '890600', 'Tambah Tipe Pelatihan', 'sertifikasi', '2016-10-07 15:46:17', '::1'),
(128, '890600', 'Tambah Tipe Pelatihan', 'Knowledge Sharing', '2016-10-07 15:46:45', '::1'),
(134, '890600', 'Edit tipe pelatihan', 'Knowledge Sharing', '2016-10-07 15:48:03', '::1'),
(135, '890600', 'Edit tipe pelatihan', 'Knowledge Sharing', '2016-10-07 15:48:09', '::1'),
(136, '890600', 'Edit tipe pelatihan', 'Knowledge Sharing', '2016-10-07 15:48:16', '::1'),
(137, '890600', 'Tambah Tipe Pelatihan', 'Sembarang', '2016-10-07 15:48:48', '::1'),
(138, '890600', 'Edit tipe pelatihan', 'Sembarang', '2016-10-07 15:48:56', '::1'),
(139, '890600', 'Menghapus tipe_pelatihan', 'Sembarang', '2016-10-07 15:49:05', '::1'),
(140, '890600', 'Tambah Tipe Pelatihan', 'Percobaan', '2016-10-07 15:49:54', '::1'),
(141, '890600', 'Menghapus tipe_pelatihan', 'Percobaan', '2016-10-07 15:50:03', '::1'),
(142, '93190615', 'Sign in', '', '2016-10-07 16:48:19', '61.247.37.155'),
(143, '93190615', 'Sign out', '', '2016-10-07 16:48:28', '61.247.37.155'),
(144, '93190615', 'Sign in', '', '2016-10-07 16:50:39', '61.247.37.155'),
(145, '93190615', 'Sign out', '', '2016-10-07 16:50:43', '61.247.37.155'),
(146, '93190615', 'Sign in', '', '2016-10-07 16:51:06', '61.247.37.155'),
(147, '93190615', 'Tambah Divisi', 'Coba 123', '2016-10-07 16:51:25', '61.247.37.155'),
(148, '93190615', 'Menghapus divisi', 'Coba 123', '2016-10-07 16:51:30', '61.247.37.155'),
(149, '93190615', 'Sign out', '', '2016-10-07 16:51:57', '61.247.37.155'),
(150, '93190615', 'Sign in', '', '2016-10-07 18:49:39', '139.0.26.59'),
(151, '93190615', 'Sign out', '', '2016-10-07 18:50:11', '139.0.26.59'),
(152, '83521114', 'Sign in', '', '2016-10-07 18:50:35', '139.0.26.59'),
(153, '83521114', 'Tambah Divisi', 'Coba divisi', '2016-10-07 18:53:45', '139.0.26.59'),
(154, '83521114', 'Edit Divisi', 'Coba divisi 1', '2016-10-07 18:54:13', '139.0.26.59'),
(155, '83521114', 'Tambah Cabang', 'test nama cabang', '2016-10-07 18:54:51', '139.0.26.59'),
(156, '83521114', 'Tambah Tipe Pelatihan', 'coba tipe pelatihan', '2016-10-07 18:56:14', '139.0.26.59'),
(157, '83521114', 'Menghapus tipe_pelatihan', 'coba tipe pelatihan', '2016-10-07 18:56:27', '139.0.26.59'),
(158, '83521114', 'Tambah Trainer', 'yudhi', '2016-10-07 19:01:23', '139.0.26.59'),
(159, '83521114', 'Sign out', '', '2016-10-07 19:17:04', '139.0.26.59'),
(160, '93190615', 'Sign in', '', '2016-10-07 21:43:12', '180.251.220.90'),
(161, '93190615', 'Sign in', '', '2016-10-07 21:49:13', '64.233.173.4'),
(162, '93190615', 'Sign out', '', '2016-10-07 21:49:28', '64.233.173.8'),
(163, '93190615', 'Tambah Tipe Pelatihan', 'On Class Training Call Center', '2016-10-07 21:50:58', '180.251.220.90');

-- --------------------------------------------------------

--
-- Table structure for table `em_cabang`
--

CREATE TABLE IF NOT EXISTS `em_cabang` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(256) NOT NULL,
  `alamat_cabang` text NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `wilayah` enum('kantor pusat','wilayah barat','wilayah timur') NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `em_cabang`
--

INSERT INTO `em_cabang` (`id`, `nama_cabang`, `alamat_cabang`, `no_telp`, `wilayah`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(0000000003, 'coba', 'datacoba', '123123', 'kantor pusat', 'deleted', 93190615, '2016-10-06 17:57:36', 93190615, '2016-10-06 20:02:27'),
(0000000004, 'asdad tggggsd ererer', 'asdasd', '1231323323', 'kantor pusat', 'deleted', 93190615, '2016-10-06 17:59:05', 93190615, '2016-10-06 19:47:30'),
(0000000005, 'Pekanbaru', 'Jalan Sawangan Raya no.5', '123123', 'wilayah timur', 'active', 93190615, '2016-10-06 18:01:17', 890600, '2016-10-07 13:50:32'),
(0000000006, 'Riau', 'Jalan Riau Estate ', '55522133', 'wilayah barat', 'active', 93190615, '2016-10-06 18:01:59', 890600, '2016-10-07 13:50:54'),
(0000000007, 'fdgdfgd', 'asdasd', '213123', 'kantor pusat', 'deleted', 93190615, '2016-10-06 18:02:50', 93190615, '2016-10-06 19:54:47'),
(0000000008, '123123 12313123', 'adasdasd  asdasd sdfsdfs', '1123', 'wilayah barat', 'deleted', 93190615, '2016-10-06 18:07:16', 93190615, '2016-10-06 19:56:36'),
(0000000009, 'fasfaf', 'asdsad', '123123', 'wilayah timur', 'deleted', 93190615, '2016-10-06 18:07:41', 93190615, '2016-10-06 19:53:04'),
(0000000010, 'jghjghj', 'asdasd', '123123', 'wilayah barat', 'deleted', 93190615, '2016-10-06 18:14:23', 93190615, '2016-10-06 19:59:02'),
(0000000011, 'coba satu dua', '123123', '123123', 'wilayah barat', 'deleted', 93190615, '2016-10-06 18:40:49', 93190615, '2016-10-06 20:02:36'),
(0000000012, 'jghjghrt', 'dad', '123123', 'wilayah timur', 'deleted', 93190615, '2016-10-06 18:43:04', 93190615, '2016-10-06 19:56:27'),
(0000000013, 'Bandung', 'Jl. Setiabudi No.2', '66299212', 'wilayah timur', 'active', 93190615, '2016-10-06 18:51:22', 890600, '2016-10-07 13:51:48'),
(0000000014, 'Balikpapan', 'Jalan Balikpapan Raya no.24', '8833234', 'wilayah barat', 'disabled', 93190615, '2016-10-06 19:17:58', 890600, '2016-10-07 13:51:18'),
(0000000015, 'coba lagi', '1231231', '123123', 'wilayah timur', 'deleted', 93190615, '2016-10-06 19:58:13', 93190615, '2016-10-06 20:02:33'),
(0000000016, 'test nama cabang', 'jalan', '12313123123', 'wilayah barat', 'active', 83521114, '2016-10-07 18:54:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_divisi`
--

CREATE TABLE IF NOT EXISTS `em_divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(256) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `em_divisi`
--

INSERT INTO `em_divisi` (`id`, `nama_divisi`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'PPL 1', 'active', 96490815, '2016-10-07 11:07:21', 96490815, '2016-10-07 11:10:23'),
(2, 'PPI', 'active', 96490815, '2016-10-07 11:07:31', NULL, NULL),
(3, 'Coba 123', 'deleted', 96490815, '2016-10-07 11:10:36', 96490815, '2016-10-07 11:11:13'),
(4, 'IT', 'disabled', 890600, '2016-10-07 13:52:12', 890600, '2016-10-07 14:35:00'),
(5, 'Coba 123', 'deleted', 93190615, '2016-10-07 16:51:25', 93190615, '2016-10-07 16:51:30'),
(6, 'Coba divisi 1', 'active', 83521114, '2016-10-07 18:53:45', 83521114, '2016-10-07 18:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `em_klasifikasimateri`
--

CREATE TABLE IF NOT EXISTS `em_klasifikasimateri` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama_klasifikasi` varchar(256) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `em_klasifikasimateri`
--

INSERT INTO `em_klasifikasimateri` (`id`, `nama_klasifikasi`, `is_active`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(0000000001, 'materi pengantar', 'active', '2016-10-05 00:00:00', 1, NULL, NULL),
(0000000002, 'materi pokok', 'active', '2016-10-05 00:00:00', 1, NULL, NULL),
(0000000003, 'Materi Public Speaking 1', 'disabled', '2016-10-07 14:10:27', 890600, '2016-10-07 14:10:56', 890600),
(0000000004, 'Materi Untuk Dihapus', 'deleted', '2016-10-07 14:11:11', 890600, '2016-10-07 14:11:18', 890600);

-- --------------------------------------------------------

--
-- Table structure for table `em_materi`
--

CREATE TABLE IF NOT EXISTS `em_materi` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id_materi` varchar(255) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `id_klasifikasi_materi` int(11) unsigned zerofill NOT NULL,
  `nilai_minimum` int(11) DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `em_materi`
--

INSERT INTO `em_materi` (`id`, `id_materi`, `nama_materi`, `id_klasifikasi_materi`, `nilai_minimum`, `is_active`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(00000000001, 'md2a-23', 'Materi Pengantar Seminar', 00000000001, 50, 'disabled', '2016-10-07 14:38:48', 890600, '2016-10-07 14:57:29', 890600),
(00000000002, 'aa9x-23', 'Contoh Materi', 00000000002, 65, 'active', '2016-10-07 14:52:26', 890600, '2016-10-07 14:59:35', 890600),
(00000000003, 'ss9c-00', 'Inner Beauty', 00000000002, 75, 'deleted', '2016-10-07 14:52:55', 890600, '2016-10-07 15:05:27', 890600);

-- --------------------------------------------------------

--
-- Table structure for table `em_navigationmenu`
--

CREATE TABLE IF NOT EXISTS `em_navigationmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(255) NOT NULL,
  `nama_modul` varchar(255) NOT NULL,
  `menu_parent` varchar(255) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `em_navigationmenu`
--

INSERT INTO `em_navigationmenu` (`id`, `nama_menu`, `nama_modul`, `menu_parent`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'User', 'user', 'privilage', 'active', 96490815, '2016-10-07 09:28:19', NULL, NULL),
(2, 'User Group', 'user-group', 'privilage', 'active', 96490815, '2016-10-07 09:28:40', NULL, NULL),
(3, 'Matriks Program & Anggaran', 'matriks', 'master Data', 'active', 96490815, '2016-10-07 09:29:06', NULL, NULL),
(4, 'Trainer suka', 'trainer', 'master Data', 'active', 96490815, '2016-10-07 09:29:24', 96490815, '2016-10-07 09:47:44'),
(5, 'Materi', 'materi', 'master Data', 'active', 96490815, '2016-10-07 09:29:53', NULL, NULL),
(6, 'Kategori Event', 'kategori-event', 'master Data', 'active', 96490815, '2016-10-07 09:30:08', NULL, NULL),
(7, 'Tipe Pelatihan', 'tipe-pelatihan', 'master Data', 'active', 96490815, '2016-10-07 09:30:28', NULL, NULL),
(8, 'Cabang', 'cabang', 'master Data', 'active', 96490815, '2016-10-07 09:30:40', NULL, NULL),
(9, 'Divisi', 'divisi', 'master Data', 'active', 96490815, '2016-10-07 09:31:00', NULL, NULL),
(10, 'Pengajuan Event', 'pengajuan-event', 'event', 'active', 96490815, '2016-10-07 09:31:22', NULL, NULL),
(11, 'Persetujuan Memo Event', 'persetujuan-memo', 'event', 'active', 96490815, '2016-10-07 09:31:44', NULL, NULL),
(12, 'Data Validasi & Persetujuan Event', 'data-validasi', 'event', 'active', 96490815, '2016-10-07 09:32:08', NULL, NULL),
(13, 'Realisasi Event', 'realisasi-event', 'realisasi', 'active', 96490815, '2016-10-07 09:32:28', NULL, NULL),
(14, 'Persetujuan Pertanggung Jawaban', 'persetujuan-pertanggungjawaban', 'realisasi', 'active', 96490815, '2016-10-07 09:32:56', NULL, NULL),
(15, 'Verifikasi Pertanggung Jawaban', 'verifikasi-pertanggungjawaban', 'realisasi', 'active', 96490815, '2016-10-07 09:33:23', NULL, NULL),
(16, 'Kegiatan', 'kegiatan', 'feedback', 'active', 96490815, '2016-10-07 09:33:51', NULL, NULL),
(17, 'Materi Feedback', 'materi-feedback', 'feedback', 'active', 96490815, '2016-10-07 09:34:50', NULL, NULL),
(18, 'Realisasi Event & RKAP', 'realisasi-eventRkap', 'feedback', 'active', 96490815, '2016-10-07 09:35:17', NULL, NULL),
(19, 'Feedback', 'feedback', 'feedback', 'active', 96490815, '2016-10-07 09:35:31', NULL, NULL),
(20, 'Trainer', 'trainer', 'master Data', 'active', 0, '0000-00-00 00:00:00', 96490815, '2016-10-07 09:54:00'),
(21, 'Hola', 'hola', 'privilage', 'deleted', 96490815, '2016-10-07 09:50:58', 96490815, '2016-10-07 09:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `em_tipepelatihan`
--

CREATE TABLE IF NOT EXISTS `em_tipepelatihan` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `tipe_pelatihan` varchar(255) NOT NULL,
  `inisial_pelatihan` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `em_tipepelatihan`
--

INSERT INTO `em_tipepelatihan` (`id`, `tipe_pelatihan`, `inisial_pelatihan`, `deskripsi`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(0000000001, 'External Training', 'External Cabang', 'Pelatihan dari pihak external', 'active', 890600, '2016-10-07 15:37:56', NULL, NULL),
(0000000002, 'Pelatihan Mekar', 'Mekar', 'Mekar', 'active', 890600, '2016-10-07 15:45:56', NULL, NULL),
(0000000003, 'sertifikasi', 'sertifikasi', 'penjelasan mengenai sertifikasi', 'disabled', 890600, '2016-10-07 15:46:17', NULL, NULL),
(0000000004, 'Knowledge Sharing', 'KS Kantor Pusat', 'penjelasan KS Kantor Pusat 1', 'active', 890600, '2016-10-07 15:46:45', 890600, '2016-10-07 15:48:16'),
(0000000005, 'Sembarang', 'Sembarang Berita', 'Penjelsan mengenai sembarang berita', 'deleted', 890600, '2016-10-07 15:48:48', 890600, '2016-10-07 15:49:05'),
(0000000006, 'Percobaan', 'percobaan Inisial', 'sedang dicoba', 'deleted', 890600, '2016-10-07 15:49:54', 890600, '2016-10-07 15:50:03'),
(0000000007, 'coba tipe pelatihan', 'CTP', 'desckripsi', 'deleted', 83521114, '2016-10-07 18:56:14', 83521114, '2016-10-07 18:56:27'),
(0000000008, 'On Class Training Call Center', 'OCT - CC', 'Pelatihan kelas Call Center', 'active', 93190615, '2016-10-07 21:50:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_trainer`
--

CREATE TABLE IF NOT EXISTS `em_trainer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) NOT NULL,
  `nama_pemateri` varchar(255) NOT NULL,
  `inisial` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `em_trainer`
--

INSERT INTO `em_trainer` (`id`, `nik`, `nama_pemateri`, `inisial`, `jabatan`, `id_cabang`, `id_divisi`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, '123123', 'Trainer A', 'TA', 'Officer', 13, 2, 'active', 890600, '2016-10-07 13:17:51', NULL, NULL),
(2, '543221', 'Joko Priambodo 123', 'JP', 'Head Operation', 6, 2, 'deleted', 890600, '2016-10-07 13:33:59', 890600, '2016-10-07 13:49:33'),
(3, '5432212', 'Joko Priambodo', 'eg', 'Head Operation', 6, 1, 'disabled', 890600, '2016-10-07 13:43:21', NULL, NULL),
(4, '5432211', 'Lisa Maruntu', 'LM', 'Officer', 5, 1, 'disabled', 890600, '2016-10-07 13:49:20', NULL, NULL),
(5, '188383', 'yudhi', 'Y', 'IT OFFICER', 6, 2, 'active', 83521114, '2016-10-07 19:01:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_url_host`
--

CREATE TABLE IF NOT EXISTS `em_url_host` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `em_url_host`
--

INSERT INTO `em_url_host` (`id`, `url`) VALUES
(1, 'http://182.23.52.249/Dummy/SSO_WebService/login.php');

-- --------------------------------------------------------

--
-- Table structure for table `em_user`
--

CREATE TABLE IF NOT EXISTS `em_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsdm` varchar(255) NOT NULL,
  `nik` int(11) NOT NULL,
  `id_user_group` int(11) unsigned zerofill NOT NULL,
  `username` varchar(256) NOT NULL,
  `date_birth` date DEFAULT NULL,
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
  `id_cabang` varchar(256) DEFAULT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `finger_print` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `em_user`
--

INSERT INTO `em_user` (`id`, `idsdm`, `nik`, `id_user_group`, `username`, `date_birth`, `fullname`, `email`, `reset_password`, `forgot_pass_code`, `forgot_pass_date`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_active`, `id_cabang`, `foto`, `finger_print`) VALUES
(1, '', 93190615, 00000000000, 'IHidayat0808', NULL, 'Ilham Hidayat', 'ilham_ild@pnm.co.id', NULL, NULL, NULL, 0, '2016-10-06 22:39:42', NULL, NULL, 'active', NULL, 'http://182.23.52.249/Dummy/SSO/image/foto/ILHAM HIDAYAT.jpg', NULL),
(2, '', 96490815, 00000000000, 'APPPurba0812', NULL, 'Andika Permana Putra Purba', 'andika_ppp@pnm.co.id', NULL, NULL, NULL, 0, '2016-10-06 22:40:50', NULL, NULL, 'active', NULL, 'http://182.23.52.249/Dummy/SSO/image/foto/ANDIKA2.jpg', NULL),
(3, '', 890600, 00000000000, 'AIrnawati0628', NULL, 'Andi Irnawati', 'andi@pnm.co.id', NULL, NULL, NULL, 0, '2016-10-06 22:41:15', NULL, NULL, 'active', NULL, 'http://182.23.52.249/Dummy/SSO/image/foto/ANDI2.jpg', NULL),
(4, '', 18951012, 00000000000, 'DWApriani0415', NULL, 'Dewi Wulan Apriani', '', NULL, NULL, NULL, 0, '2016-10-06 22:42:03', NULL, NULL, 'active', 'BKS', 'http://182.23.52.249/Dummy/SSO/image/foto/img-610131445-0001.jpg', NULL),
(6, '', 99450915, 00000000000, 'HNAWicaksono0909', NULL, 'Hario Nur Agung Wicaksono', 'hario0987@pnm.co.id', NULL, NULL, NULL, 0, '2016-10-06 22:42:59', NULL, NULL, 'active', NULL, 'http://182.23.52.249/Dummy/SSO/image/foto/19.hario nur agung.jpg', NULL),
(7, '', 83521114, 00000000000, 'EEnawaty0724', NULL, 'Emik Enawaty', 'emik@pnm.co.id', NULL, NULL, NULL, 0, '2016-10-06 22:43:37', NULL, NULL, 'active', NULL, 'http://182.23.52.249/Dummy/SSO/image/foto/EMIK.jpg', NULL),
(8, '', 108470416, 00000000000, 'HSaputra0208', NULL, 'Hendra Saputra', 'hsaputra0208@pnm.co.id', NULL, NULL, NULL, 0, '2016-10-06 22:44:06', NULL, NULL, 'active', NULL, 'http://182.23.52.249/Dummy/SSO/image/foto/HENDRA4.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_usergroup`
--

CREATE TABLE IF NOT EXISTS `em_usergroup` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `definisi` varchar(256) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `em_usergroup`
--

INSERT INTO `em_usergroup` (`id`, `definisi`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(00000000001, 'admin pusat', 93190615, '2016-10-03 00:00:00', NULL, NULL, 'active'),
(00000000002, 'administrator', 93190615, '2016-10-03 00:00:00', NULL, NULL, 'active'),
(00000000003, 'admin cabang', 93190615, '2016-10-05 00:00:00', NULL, NULL, 'active'),
(00000000004, 'kepala divisi', 93190615, '2016-10-05 00:00:00', NULL, NULL, 'active'),
(00000000005, 'admin divisi', 93190615, '2016-10-05 00:00:00', NULL, NULL, 'active'),
(00000000006, 'kepala cabang', 93190615, '2016-10-05 00:00:00', NULL, NULL, 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
