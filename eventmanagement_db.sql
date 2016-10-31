-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2016 at 03:15 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventmanagement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `em_activitiesuser`
--

CREATE TABLE IF NOT EXISTS `em_activitiesuser` (
`id` int(11) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `item_id` varchar(256) DEFAULT NULL,
  `date` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=408 DEFAULT CHARSET=latin1;

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
(163, '93190615', 'Tambah Tipe Pelatihan', 'On Class Training Call Center', '2016-10-07 21:50:58', '180.251.220.90'),
(164, '93190615', 'Sign out', '', '2016-10-11 13:44:49', '::1'),
(165, '93190615', 'Sign in', '', '2016-10-11 13:44:57', '::1'),
(166, '93190615', 'Sign out', '', '2016-10-11 13:45:01', '::1'),
(167, '93190615', 'Sign in', '', '2016-10-11 13:45:20', '::1'),
(168, '                         ECD2FD56BAAA7D522748DB3BA18CB79B', 'Sign in', '', '2016-10-11 19:11:15', '::1'),
(169, '                         ECD2FD56BAAA7D522748DB3BA18CB79B', 'Sign in', '', '2016-10-11 19:11:26', '::1'),
(170, '00000000002', 'Sign in', '', '2016-10-11 19:14:11', '::1'),
(171, '00000000002', 'Sign in', '', '2016-10-12 11:39:45', '::1'),
(172, '00000000002', 'Sign in', '', '2016-10-13 14:36:58', '::1'),
(173, '00000000002', 'Tambah User Group', 'test user group matrix', '2016-10-13 14:39:04', '::1'),
(174, '00000000002', 'Tambah User Group', 'test user group matrix', '2016-10-13 15:06:32', '::1'),
(175, '00000000002', 'Tambah User Group', 'test user group matrix', '2016-10-13 15:07:29', '::1'),
(176, '00000000002', 'Tambah User Group', 'test user group matrix', '2016-10-13 15:08:16', '::1'),
(177, '00000000002', 'Edit User Group', 'test user group matrix1', '2016-10-13 17:15:32', '::1'),
(178, '00000000002', 'Tambah User Group', 'test untuk hapus', '2016-10-13 17:16:44', '::1'),
(179, '00000000002', 'Edit User Group', 'kepala_divisi', '2016-10-13 17:44:42', '::1'),
(180, '00000000002', 'Edit User Group', 'kepala_divisi', '2016-10-13 17:45:49', '::1'),
(181, '00000000002', 'Edit User Group', 'test untuk hapus', '2016-10-13 17:45:58', '::1'),
(182, '00000000002', 'Edit User Group', 'kepala_divisi', '2016-10-13 17:46:19', '::1'),
(183, '00000000002', 'Edit User Group', 'kepala_divisi', '2016-10-13 18:04:05', '::1'),
(184, '00000000002', 'Edit User Group', 'test user group matrix1', '2016-10-13 18:06:55', '::1'),
(185, '00000000002', 'Sign out', '', '2016-10-14 09:21:45', '::1'),
(186, '00000000002', 'Sign in', '', '2016-10-14 09:32:11', '::1'),
(187, '00000000002', 'Tambah User', 'Hario Nur Agung Wicaksono', '2016-10-14 09:57:23', '::1'),
(188, '00000000002', 'Sign out', '', '2016-10-14 09:57:45', '::1'),
(189, '00000000011', 'Sign in', '', '2016-10-14 09:57:50', '::1'),
(190, '00000000011', 'Menghapus user', 'Ilham Hidayat', '2016-10-14 09:57:57', '::1'),
(191, '00000000011', 'Tambah User', 'Ilham Hidayat', '2016-10-14 09:58:10', '::1'),
(192, '00000000011', 'Edit User', 'Ilham Hidayat', '2016-10-14 09:58:20', '::1'),
(193, '00000000011', 'Sign out', '', '2016-10-14 09:58:26', '::1'),
(194, '00000000011', 'Sign in', '', '2016-10-14 09:59:09', '::1'),
(195, '00000000011', 'Tambah Event', '', '2016-10-14 13:48:26', '::1'),
(196, '00000000011', 'Tambah Event', '', '2016-10-14 13:58:06', '::1'),
(197, '00000000011', 'Sign in', '', '2016-10-14 13:59:31', '::1'),
(198, '00000000011', 'Tambah Event', 'Coba', '2016-10-14 14:04:40', '::1'),
(199, '00000000011', 'Tambah Event', 'Coba', '2016-10-14 14:04:51', '::1'),
(200, '00000000011', 'Tambah Event', '', '2016-10-14 14:04:55', '::1'),
(201, '00000000011', 'Tambah Event', 'Learning by Doing', '2016-10-14 14:06:38', '::1'),
(202, '00000000011', 'Tambah Event', '', '2016-10-14 14:06:52', '::1'),
(203, '00000000011', 'Tambah Event', 'dsfsdfsd', '2016-10-14 14:08:34', '::1'),
(204, '00000000011', 'Tambah Event', '', '2016-10-14 14:12:13', '::1'),
(205, '00000000011', 'Tambah Event', 'sfdsdfdsgfd', '2016-10-14 14:12:47', '::1'),
(206, '00000000011', 'Tambah Event', 'sfdhghfgh', '2016-10-14 14:14:08', '::1'),
(207, '00000000011', 'Tambah Event', '', '2016-10-14 14:14:14', '::1'),
(208, '00000000011', 'Tambah Event', 'sdfdfgdfgfd', '2016-10-14 14:16:06', '::1'),
(209, '00000000011', 'Tambah Event', '', '2016-10-14 14:18:13', '::1'),
(210, '00000000011', 'Tambah Event', 'sdfsdfsd', '2016-10-14 14:22:08', '::1'),
(211, '00000000011', 'Tambah Event', '', '2016-10-14 14:22:20', '::1'),
(212, '00000000011', 'Tambah Event', 'fdgdfhgjghs sdfsdfs', '2016-10-14 14:24:46', '::1'),
(213, '00000000011', 'Tambah Event', 'sfsdfsdfsdfsdfsdf', '2016-10-14 14:25:42', '::1'),
(214, '00000000011', 'Tambah Event', '', '2016-10-14 14:28:48', '::1'),
(215, '00000000011', 'Tambah Event', 'COBA EVENT', '2016-10-14 14:33:26', '::1'),
(216, '00000000011', 'Tambah Event', 'Event Oracle', '2016-10-14 14:51:30', '::1'),
(217, '00000000011', 'Tambah Event', 'TEST EVENT', '2016-10-14 15:09:45', '::1'),
(218, '00000000011', 'Sign out', '', '2016-10-14 15:10:03', '::1'),
(219, '00000000011', 'Sign in', '', '2016-10-14 15:15:08', '::1'),
(220, '00000000011', 'Tambah Trainer Eksternal', 'Hola Test', '2016-10-14 15:18:43', '::1'),
(221, '00000000011', 'Tambah User Group', 'test ug2', '2016-10-14 15:24:30', '::1'),
(222, '00000000002', 'Sign in', '', '2016-10-18 11:44:27', '::1'),
(223, '00000000002', 'Tambah Event', '', '2016-10-18 12:40:10', '::1'),
(224, '00000000002', 'Tambah Event', '', '2016-10-18 13:58:59', '::1'),
(225, '00000000002', 'Tambah Event', '', '2016-10-18 13:59:15', '::1'),
(226, '00000000002', 'Tambah Event', '', '2016-10-18 14:00:11', '::1'),
(227, '00000000002', 'Tambah Event', '', '2016-10-18 14:01:19', '::1'),
(228, '00000000002', 'Tambah Event', '', '2016-10-18 14:01:25', '::1'),
(229, '00000000002', 'Tambah Event', '', '2016-10-18 14:03:04', '::1'),
(230, '00000000002', 'Tambah Event', '', '2016-10-18 14:04:01', '::1'),
(231, '00000000002', 'Tambah Event', '', '2016-10-18 14:04:33', '::1'),
(232, '00000000002', 'Tambah Event', '', '2016-10-18 14:04:37', '::1'),
(233, '00000000002', 'Tambah Event', '', '2016-10-18 14:12:43', '::1'),
(234, '00000000002', 'Tambah Event', '', '2016-10-18 14:13:56', '::1'),
(235, '00000000002', 'Tambah Event', '', '2016-10-18 14:15:22', '::1'),
(236, '00000000002', 'Tambah Event', '', '2016-10-18 14:15:25', '::1'),
(237, '00000000002', 'Tambah Event', 'asdasdasd', '2016-10-18 14:18:49', '::1'),
(238, '00000000002', 'Tambah Event', 'asdasdasd', '2016-10-18 14:21:20', '::1'),
(239, '00000000002', 'Tambah Event', 'asdasdasd', '2016-10-18 14:31:34', '::1'),
(240, '00000000002', 'Tambah Event', 'asdasdasd', '2016-10-18 14:35:50', '::1'),
(241, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:40:02', '::1'),
(242, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:41:00', '::1'),
(243, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:41:42', '::1'),
(244, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:43:36', '::1'),
(245, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:43:37', '::1'),
(246, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:43:51', '::1'),
(247, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:44:03', '::1'),
(248, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:44:09', '::1'),
(249, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:44:10', '::1'),
(250, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:44:30', '::1'),
(251, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:44:49', '::1'),
(252, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:45:10', '::1'),
(253, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:45:40', '::1'),
(254, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:45:55', '::1'),
(255, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:46:06', '::1'),
(256, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:46:52', '::1'),
(257, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:47:23', '::1'),
(258, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:47:32', '::1'),
(259, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:48:34', '::1'),
(260, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:49:38', '::1'),
(261, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:49:52', '::1'),
(262, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:50:15', '::1'),
(263, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:51:05', '::1'),
(264, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:51:06', '::1'),
(265, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:52:16', '::1'),
(266, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:52:32', '::1'),
(267, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:52:46', '::1'),
(268, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:52:53', '::1'),
(269, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:53:20', '::1'),
(270, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:53:27', '::1'),
(271, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:53:46', '::1'),
(272, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:54:12', '::1'),
(273, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:55:16', '::1'),
(274, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:55:29', '::1'),
(275, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:55:40', '::1'),
(276, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:55:57', '::1'),
(277, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:58:37', '::1'),
(278, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 14:59:55', '::1'),
(279, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 15:02:12', '::1'),
(280, '00000000002', 'Tambah Event', 'asdasdas', '2016-10-18 15:02:40', '::1'),
(281, '00000000002', 'Tambah Event', '', '2016-10-18 15:07:04', '::1'),
(282, '00000000002', 'Tambah Event', '', '2016-10-18 15:07:15', '::1'),
(283, '00000000002', 'Tambah Event', '', '2016-10-18 15:07:56', '::1'),
(284, '00000000002', 'Tambah Event', '', '2016-10-18 15:08:49', '::1'),
(285, '00000000002', 'Tambah Event', '', '2016-10-18 15:09:26', '::1'),
(286, '00000000002', 'Tambah Event', '', '2016-10-18 15:09:51', '::1'),
(287, '00000000002', 'Tambah Event', '', '2016-10-18 15:10:05', '::1'),
(288, '00000000002', 'Tambah Event', '', '2016-10-18 15:10:32', '::1'),
(289, '00000000002', 'Tambah Event', '', '2016-10-18 15:10:33', '::1'),
(290, '00000000002', 'Tambah Event', '', '2016-10-18 15:10:42', '::1'),
(291, '00000000002', 'Tambah Event', '', '2016-10-18 15:11:04', '::1'),
(292, '00000000002', 'Tambah Event', '', '2016-10-18 15:12:19', '::1'),
(293, '00000000002', 'Tambah Event', '', '2016-10-18 15:12:24', '::1'),
(294, '00000000002', 'Tambah Event', '', '2016-10-18 15:12:28', '::1'),
(295, '00000000002', 'Tambah Event', '', '2016-10-18 15:16:14', '::1'),
(296, '00000000002', 'Tambah Event', '', '2016-10-18 15:17:07', '::1'),
(297, '00000000002', 'Tambah Event', '', '2016-10-18 15:17:10', '::1'),
(298, '00000000002', 'Tambah Event', '', '2016-10-18 15:17:14', '::1'),
(299, '00000000002', 'Tambah Event', '', '2016-10-18 15:17:18', '::1'),
(300, '00000000002', 'Tambah Event', '', '2016-10-18 15:20:20', '::1'),
(301, '00000000002', 'Tambah Event', '', '2016-10-18 15:20:28', '::1'),
(302, '00000000002', 'Tambah Event', '', '2016-10-18 15:20:32', '::1'),
(303, '00000000002', 'Tambah Event', '', '2016-10-18 15:21:46', '::1'),
(304, '00000000002', 'Tambah Event', '', '2016-10-18 15:23:19', '::1'),
(305, '00000000002', 'Tambah Event', '', '2016-10-18 15:23:29', '::1'),
(306, '00000000002', 'Tambah Event', '', '2016-10-18 15:23:57', '::1'),
(307, '00000000002', 'Tambah Event', '', '2016-10-18 15:25:09', '::1'),
(308, '00000000002', 'Tambah Event', '', '2016-10-18 15:25:45', '::1'),
(309, '00000000002', 'Tambah Event', '', '2016-10-18 15:26:40', '::1'),
(310, '00000000002', 'Tambah Event', '', '2016-10-18 15:27:09', '::1'),
(311, '00000000002', 'Tambah Event', '', '2016-10-18 15:27:58', '::1'),
(312, '00000000002', 'Tambah Event', '', '2016-10-18 15:28:46', '::1'),
(313, '00000000002', 'Tambah Event', '', '2016-10-18 15:28:52', '::1'),
(314, '00000000002', 'Tambah Event', '', '2016-10-18 15:29:55', '::1'),
(315, '00000000002', 'Tambah Event', '', '2016-10-18 15:30:16', '::1'),
(316, '00000000002', 'Tambah Event', '', '2016-10-18 15:32:02', '::1'),
(317, '00000000002', 'Tambah Event', '', '2016-10-18 15:32:38', '::1'),
(318, '00000000002', 'Tambah Event', 'sfdsfsdfs', '2016-10-18 15:32:59', '::1'),
(319, '00000000002', 'Tambah Event', '', '2016-10-18 15:33:02', '::1'),
(320, '00000000002', 'Tambah Event', '', '2016-10-18 15:33:12', '::1'),
(321, '00000000002', 'Tambah Event', 'sfdsfsdfs', '2016-10-18 15:33:30', '::1'),
(322, '00000000002', 'Tambah Event', '', '2016-10-18 15:33:33', '::1'),
(323, '00000000002', 'Tambah Event', 'sfdsfsdfs', '2016-10-18 15:34:09', '::1'),
(324, '00000000002', 'Tambah Event', '', '2016-10-18 15:34:17', '::1'),
(325, '00000000002', 'Tambah Event', '', '2016-10-18 15:34:24', '::1'),
(326, '00000000002', 'Tambah Event', 'sfdsfsdfs', '2016-10-18 15:34:45', '::1'),
(327, '00000000002', 'Tambah Event', '', '2016-10-18 15:35:10', '::1'),
(328, '00000000002', 'Tambah Event', '', '2016-10-18 15:35:49', '::1'),
(329, '00000000002', 'Tambah Event', '', '2016-10-18 15:36:00', '::1'),
(330, '00000000002', 'Tambah Event', '', '2016-10-18 15:36:07', '::1'),
(331, '00000000002', 'Tambah Event', '', '2016-10-18 15:36:25', '::1'),
(332, '00000000002', 'Tambah Event', 'sfdsfsdfs', '2016-10-18 15:36:31', '::1'),
(333, '00000000002', 'Tambah Event', '', '2016-10-18 15:37:30', '::1'),
(334, '00000000002', 'Tambah Event', '', '2016-10-18 15:37:40', '::1'),
(335, '00000000002', 'Tambah Event', 'sfdsfsdfs', '2016-10-18 15:39:11', '::1'),
(336, '00000000002', 'Tambah Event', '', '2016-10-18 15:43:13', '::1'),
(337, '00000000002', 'Tambah Event', '', '2016-10-18 15:47:09', '::1'),
(338, '00000000002', 'Tambah Event', '', '2016-10-18 15:48:34', '::1'),
(339, '00000000002', 'Tambah Event', '', '2016-10-18 15:48:50', '::1'),
(340, '00000000002', 'Tambah Event', '', '2016-10-18 15:53:11', '::1'),
(341, '00000000002', 'Tambah Event', 'asdasdsa', '2016-10-18 15:54:57', '::1'),
(342, '00000000002', 'Tambah Event', 'COBACOBA', '2016-10-18 15:56:38', '::1'),
(343, '00000000002', 'Tambah Event', 'Nama Event A', '2016-10-18 17:35:46', '::1'),
(344, '00000000002', 'Tambah Event', 'Event Dasawarsa', '2016-10-18 17:44:16', '::1'),
(345, '00000000002', 'Tambah Event', 'Event Alakadarnya', '2016-10-18 17:47:38', '::1'),
(346, '00000000002', 'Sign in', '', '2016-10-19 13:05:33', '::1'),
(347, '00000000002', 'Sign in', '', '2016-10-20 14:54:12', '::1'),
(348, '00000000002', 'Sign in', '', '2016-10-20 14:56:12', '::1'),
(349, '00000000002', 'Sign in', '', '2016-10-20 18:31:22', '::1'),
(350, '00000000002', 'Sign in', '', '2016-10-26 14:49:09', '::1'),
(351, '00000000002', 'Tambah Trainer', 'Achmad Barlian', '2016-10-26 14:49:54', '::1'),
(352, '00000000002', 'Menghapus user', 'Ilham Hidayat', '2016-10-26 14:51:53', '::1'),
(353, '00000000002', 'Tambah User', 'Ilham Hidayat', '2016-10-26 14:52:07', '::1'),
(354, '00000000013', 'Sign in', '', '2016-10-27 11:48:45', '::1'),
(355, '00000000013', 'Tambah Event', 'asdasfas', '2016-10-27 12:04:10', '::1'),
(356, '00000000013', 'Tambah Event', 'yyyyy erterte tfdgdfgdg', '2016-10-27 12:14:38', '::1'),
(357, '00000000013', 'Tambah Event', 'vbnvnvbnvbn', '2016-10-27 12:26:05', '::1'),
(358, '00000000013', 'Tambah Event', 'event a', '2016-10-27 12:50:16', '::1'),
(359, '00000000013', 'Tambah Event', '546456456456', '2016-10-27 12:54:30', '::1'),
(360, '00000000013', 'Tambah Event', 'gfhbfghfghfgh', '2016-10-27 13:03:36', '::1'),
(361, '00000000013', 'Tambah Event', 'gfhbfghfghfgh', '2016-10-27 13:08:10', '::1'),
(362, '00000000013', 'Tambah Event', 'gfhbfghfghfgh', '2016-10-27 13:08:29', '::1'),
(363, '00000000013', 'Tambah Event', 'gfhbfghfghfgh', '2016-10-27 13:10:01', '::1'),
(364, '00000000013', 'Tambah Event', 'sdfsdfggfhfg', '2016-10-27 13:11:12', '::1'),
(365, '00000000013', 'Tambah Event', 'dfgbdfbgnfgntre th rtetgyfdg', '2016-10-27 13:14:20', '::1'),
(366, '00000000013', 'Tambah Event', 'dgdgdfg', '2016-10-27 13:16:34', '::1'),
(367, '00000000013', 'Tambah Event', 'dgdgdfg', '2016-10-27 13:17:30', '::1'),
(368, '00000000013', 'Tambah Event', 'gfhgfhgfhfgh', '2016-10-27 13:20:19', '::1'),
(369, '00000000013', 'Tambah Event', 'dfgdfgjtj rthuyru7567', '2016-10-27 13:22:49', '::1'),
(370, '00000000013', 'Tambah Event', 'fdgdfgdfg', '2016-10-27 13:28:08', '::1'),
(371, '00000000013', 'Tambah Event', 'fdsdfsfsdfgtgn bv nvb dfgd g 57u865', '2016-10-27 13:31:32', '::1'),
(372, '00000000013', 'Tambah Event', 'sfsdfs', '2016-10-27 13:35:11', '::1'),
(373, '00000000013', 'Tambah Event', 'sdfsdf', '2016-10-27 13:38:39', '::1'),
(374, '00000000013', 'Tambah Event', 'sdgsdgsdf sdfsd fsdf sfsd fs fsf sfsdf sdf sf', '2016-10-27 13:43:47', '::1'),
(375, '00000000013', 'Tambah Event', 'sdfsdfsdf dsfsd fwerwer wer', '2016-10-27 13:46:26', '::1'),
(376, '00000000013', 'Tambah Event', 'sdfsgsdg sd vcb c rw', '2016-10-27 14:00:16', '::1'),
(377, '00000000013', 'Tambah Event', 'Event versi lengkap', '2016-10-27 18:13:55', '::1'),
(378, '00000000013', 'Tambah Event', 'Gathering 2016', '2016-10-27 18:19:28', '::1'),
(379, '00000000013', 'Tambah Event', 'Outbound Road to Sukabumi', '2016-10-27 18:25:36', '::1'),
(380, '00000000013', 'Tambah Event', 'Training Character Building', '2016-10-27 18:29:47', '::1'),
(381, '00000000013', 'Tambah Event', 'Event Turoning', '2016-10-27 18:42:22', '::1'),
(382, '00000000013', 'Sign in', '', '2016-10-28 09:57:37', '::1'),
(383, '00000000013', 'Tambah Event', 'Event Hari Jumat', '2016-10-28 10:36:01', '::1'),
(384, '00000000013', 'Tambah Event', 'Event ABCD', '2016-10-28 10:40:08', '::1'),
(385, '00000000013', 'Tambah Event', '546456456456', '2016-10-28 10:43:19', '::1'),
(386, '00000000013', 'Tambah Event', 'Gathering ABCD', '2016-10-28 10:50:04', '::1'),
(387, '00000000013', 'Tambah Event', 'Event ABCD', '2016-10-28 10:54:53', '::1'),
(388, '00000000011', 'Tambah Event', 'Test 1 DBN', '2016-10-28 11:47:05', '::1'),
(389, '00000000011', 'Tambah Event', 'test baru', '2016-10-28 12:33:09', '::1'),
(390, '00000000011', 'Tambah Event', 'bachjdfgg', '2016-10-28 12:42:26', '::1'),
(391, '00000000011', 'Tambah Event', 'Nama Event Contoh', '2016-10-28 12:48:41', '::1'),
(392, '00000000011', 'Proses Approval Event Nama Event Contoh dengan no.memo', 'No. Memo 123', '2016-10-28 13:31:08', '::1'),
(393, '00000000011', 'Tambah Event', 'Nama Event XYZ', '2016-10-28 14:01:58', '::1'),
(394, '00000000011', 'Proses Approval Event Nama Event XYZ dengan no.memo', 'A-123/PNM-ABC/AF/1233', '2016-10-28 14:02:58', '::1'),
(395, '00000000011', 'Proses Approval Event Nama Event XYZ dengan no.memo', 'A-123/PNM-ABC/AF/1233', '2016-10-28 14:03:25', '::1'),
(396, '00000000011', 'Proses Approval Event Nama Event XYZ dengan no.memo', 'A-123/PNM-ABC/AF/1233', '2016-10-28 14:04:08', '::1'),
(397, '00000000011', 'Proses Approval Event Nama Event XYZ dengan no.memo', 'A-123/PNM-ABC/AF/1233', '2016-10-28 14:09:04', '::1'),
(398, '00000000011', 'Tambah materi', 'Materi Nama', '2016-10-28 14:38:46', '::1'),
(399, '00000000011', 'Tambah Matriks Program & Anggaran (lv1)', 'Test Parent 3', '2016-10-28 14:39:31', '::1'),
(400, '00000000011', 'Sign out', '', '2016-10-28 15:49:30', '::1'),
(401, '00000000013', 'Sign in', '', '2016-10-28 15:57:09', '::1'),
(402, '00000000013', 'Tambah Matriks Program & Anggaran (lv1)', 'bisnis unit level 1', '2016-10-28 15:58:31', '::1'),
(403, '00000000013', 'Tambah Matriks Program & Anggaran (lv2)', 'bisnis unit level 2 (dari level 1)', '2016-10-28 15:59:10', '::1'),
(404, '00000000013', 'Tambah Event', 'Event Test ABCD', '2016-10-28 16:06:18', '::1'),
(405, '00000000013', 'Tambah Event', 'EVENT COBA', '2016-10-28 16:12:42', '::1'),
(406, '00000000013', 'Proses Approval Event Event Test ABCD dengan no.memo', 'A-222/PNM-PPP/XI/2016', '2016-10-28 16:18:08', '::1'),
(407, '00000000013', 'Proses Approval Event Event Test ABCD dengan no.memo', 'A-222/PNM-PPP/XI/2016', '2016-10-28 16:20:38', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `em_bisnis_unit`
--

CREATE TABLE IF NOT EXISTS `em_bisnis_unit` (
`id` int(11) unsigned zerofill NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_bisnis_unit`
--

INSERT INTO `em_bisnis_unit` (`id`, `deskripsi`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(00000000001, 'test bisnis unit 1', 'active', 00000000011, '2016-10-26 15:24:08', NULL, NULL),
(00000000002, 'test bisnis unit 2', 'active', 00000000011, '2016-10-26 15:26:45', NULL, NULL),
(00000000003, 'test bisnis unit 3', 'deleted', 00000000011, '2016-10-26 15:33:18', 00000000011, '2016-10-26 18:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `em_bisnis_unit_jabatan`
--

CREATE TABLE IF NOT EXISTS `em_bisnis_unit_jabatan` (
`id` int(11) NOT NULL,
  `id_bisnis_unit` int(11) unsigned zerofill NOT NULL,
  `nama_jabatan` varchar(256) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_bisnis_unit_jabatan`
--

INSERT INTO `em_bisnis_unit_jabatan` (`id`, `id_bisnis_unit`, `nama_jabatan`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 00000000001, 'test jabatan 1.1', 'active', 00000000011, '2016-10-26 15:26:05', NULL, NULL),
(2, 00000000001, 'test jabatan 1.2', 'active', 00000000011, '2016-10-26 15:26:36', NULL, NULL),
(3, 00000000003, 'test jabatan 2.1awdasd', 'deleted', 00000000011, '2016-10-26 15:26:58', 00000000011, '2016-10-26 18:19:09'),
(4, 00000000002, 'test jabatan 2.2', 'deleted', 00000000011, '2016-10-26 15:33:41', 00000000011, '2016-10-26 18:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `em_cabang`
--

CREATE TABLE IF NOT EXISTS `em_cabang` (
`id` int(10) unsigned zerofill NOT NULL,
  `nama_cabang` varchar(256) NOT NULL,
  `alamat_cabang` text NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `wilayah` enum('kantor pusat','wilayah barat','wilayah timur') NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_cabang`
--

INSERT INTO `em_cabang` (`id`, `nama_cabang`, `alamat_cabang`, `no_telp`, `wilayah`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(0000000003, 'coba', 'datacoba', '123123', 'kantor pusat', 'deleted', 00093190615, '2016-10-06 17:57:36', 00093190615, '2016-10-06 20:02:27'),
(0000000004, 'asdad tggggsd ererer', 'asdasd', '1231323323', 'kantor pusat', 'deleted', 00093190615, '2016-10-06 17:59:05', 00093190615, '2016-10-06 19:47:30'),
(0000000005, 'Pekanbaru', 'Jalan Sawangan Raya no.5', '123123', 'wilayah timur', 'active', 00093190615, '2016-10-06 18:01:17', 00000890600, '2016-10-07 13:50:32'),
(0000000006, 'Riau', 'Jalan Riau Estate ', '55522133', 'wilayah barat', 'active', 00093190615, '2016-10-06 18:01:59', 00000890600, '2016-10-07 13:50:54'),
(0000000007, 'fdgdfgd', 'asdasd', '213123', 'kantor pusat', 'deleted', 00093190615, '2016-10-06 18:02:50', 00093190615, '2016-10-06 19:54:47'),
(0000000008, '123123 12313123', 'adasdasd  asdasd sdfsdfs', '1123', 'wilayah barat', 'deleted', 00093190615, '2016-10-06 18:07:16', 00093190615, '2016-10-06 19:56:36'),
(0000000009, 'fasfaf', 'asdsad', '123123', 'wilayah timur', 'deleted', 00093190615, '2016-10-06 18:07:41', 00093190615, '2016-10-06 19:53:04'),
(0000000010, 'jghjghj', 'asdasd', '123123', 'wilayah barat', 'deleted', 00093190615, '2016-10-06 18:14:23', 00093190615, '2016-10-06 19:59:02'),
(0000000011, 'coba satu dua', '123123', '123123', 'wilayah barat', 'deleted', 00093190615, '2016-10-06 18:40:49', 00093190615, '2016-10-06 20:02:36'),
(0000000012, 'jghjghrt', 'dad', '123123', 'wilayah timur', 'deleted', 00093190615, '2016-10-06 18:43:04', 00093190615, '2016-10-06 19:56:27'),
(0000000013, 'Bandung', 'Jl. Setiabudi No.2', '66299212', 'wilayah timur', 'active', 00093190615, '2016-10-06 18:51:22', 00000890600, '2016-10-07 13:51:48'),
(0000000014, 'Balikpapan', 'Jalan Balikpapan Raya no.24', '8833234', 'wilayah barat', 'disabled', 00093190615, '2016-10-06 19:17:58', 00000890600, '2016-10-07 13:51:18'),
(0000000015, 'coba lagi', '1231231', '123123', 'wilayah timur', 'deleted', 00093190615, '2016-10-06 19:58:13', 00093190615, '2016-10-06 20:02:33'),
(0000000016, 'test nama cabang', 'jalan', '12313123123', 'wilayah barat', 'active', 00083521114, '2016-10-07 18:54:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_divisi`
--

CREATE TABLE IF NOT EXISTS `em_divisi` (
`id` int(11) NOT NULL,
  `nama_divisi` varchar(256) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_divisi`
--

INSERT INTO `em_divisi` (`id`, `nama_divisi`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'PPL 1', 'active', 00096490815, '2016-10-07 11:07:21', 00096490815, '2016-10-07 11:10:23'),
(2, 'PPI', 'active', 00096490815, '2016-10-07 11:07:31', NULL, NULL),
(3, 'Coba 123', 'deleted', 00096490815, '2016-10-07 11:10:36', 00096490815, '2016-10-07 11:11:13'),
(4, 'IT', 'disabled', 00000890600, '2016-10-07 13:52:12', 00000890600, '2016-10-07 14:35:00'),
(5, 'Coba 123', 'deleted', 00093190615, '2016-10-07 16:51:25', 00093190615, '2016-10-07 16:51:30'),
(6, 'Coba divisi 1', 'active', 00083521114, '2016-10-07 18:53:45', 00083521114, '2016-10-07 18:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `em_email_template`
--

CREATE TABLE IF NOT EXISTS `em_email_template` (
`id` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `tipe` enum('temp_feedback') NOT NULL,
  `email_subject` varchar(256) NOT NULL,
  `email_body` text NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_email_template`
--

INSERT INTO `em_email_template` (`id`, `judul`, `tipe`, `email_subject`, `email_body`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Title Email Feedback', 'temp_feedback', 'Subject Email Feedback', '<p>Keterangan Nama: {fullname}</p>												<br>										<p>Keterangan Event: {event}</p>														<br>										<p>Keterangan URL Feedback: {url}</p>', 'active', 0000000001, '2016-10-22 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_event`
--

CREATE TABLE IF NOT EXISTS `em_event` (
`id` int(10) unsigned zerofill NOT NULL,
  `id_event` varchar(256) NOT NULL,
  `nomor_memo` varchar(256) NOT NULL,
  `nama_event` varchar(256) NOT NULL,
  `topik_event` varchar(256) NOT NULL,
  `lokasi_kerja` varchar(256) DEFAULT NULL,
  `mulai_tanggal_pelaksanaan` date NOT NULL,
  `selesai_tanggal_pelaksanaan` date NOT NULL,
  `id_kategori_tempat_pelaksanaan` int(10) unsigned zerofill NOT NULL COMMENT 'kategori tempat pelaksanaannya. seperti hotel, dsb.',
  `nama_tempat` text NOT NULL COMMENT 'nama tempat pelaksanaannya',
  `latitude` varchar(256) DEFAULT NULL,
  `longitude` varchar(256) DEFAULT NULL,
  `target_sasaran` varchar(256) NOT NULL,
  `id_kategori_event` int(10) unsigned zerofill NOT NULL COMMENT 'jenis event yang ingin diajukan. contoh : exam/training/dsb.',
  `id_tipe_exam` varchar(256) DEFAULT NULL COMMENT 'tipe exam (post test/pretest)',
  `id_tipe_pelatihan` int(10) unsigned zerofill DEFAULT NULL COMMENT 'tipe pelatihan apabila memilih event kategori training',
  `dengan_exam` varchar(10) DEFAULT NULL COMMENT 'jika memilih event training, menggunakan exam atau tidak',
  `jumlah_peserta` int(11) DEFAULT NULL,
  `id_exam` int(10) unsigned zerofill DEFAULT NULL COMMENT 'id exam',
  `id_jadwal_exam` int(10) unsigned zerofill DEFAULT NULL COMMENT 'id jadwal exam untuk mendapatkan list peserta ',
  `uang_muka` bigint(20) DEFAULT NULL,
  `total_rab` bigint(20) DEFAULT NULL,
  `is_active` enum('active','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `status_event` enum('draft','submitted','cancelled by user','approved_atasan','aprroved_valid','approved_pusat','rejected_atasan','rejected_valid','rejected_pusat') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_event`
--

INSERT INTO `em_event` (`id`, `id_event`, `nomor_memo`, `nama_event`, `topik_event`, `lokasi_kerja`, `mulai_tanggal_pelaksanaan`, `selesai_tanggal_pelaksanaan`, `id_kategori_tempat_pelaksanaan`, `nama_tempat`, `latitude`, `longitude`, `target_sasaran`, `id_kategori_event`, `id_tipe_exam`, `id_tipe_pelatihan`, `dengan_exam`, `jumlah_peserta`, `id_exam`, `id_jadwal_exam`, `uang_muka`, `total_rab`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`, `status_event`) VALUES
(0000000001, 'IKOUYKFXDP1477587600', 'No. Memo 123', 'Nama Event Contoh', 'Topik Event Contoh', '', '2016-11-09', '2016-11-11', 0000000002, 'le meridien indonesia', '-6.20139745550722', '106.82212829589844', 'target peserta contoh', 0000000001, 'post test|pre test', 0000000004, 'ya', 2, 0000000001, 0000000001, 0, 0, 'active', 11, '2016-10-28 12:48:41', 11, '2016-10-28 13:31:08', 'approved_atasan'),
(0000000002, '9NZ8Z2HRK01477587600', 'A-123/PNM-ABC/AF/1233', 'Nama Event XYZ', 'Topik Avent ABC', '', '2016-11-15', '2016-11-16', 0000000003, 'Villa Pakde', '-0.8169788378632366', '114.13839359767735', 'target 123', 0000000002, 'post test|pre test', 0000000000, '', 2, 0000000001, 0000000004, 0, 0, 'active', 11, '2016-10-28 14:01:58', 11, '2016-10-28 14:09:04', 'rejected_pusat'),
(0000000003, 'HTYBVXWID81477587600', 'A-222/PNM-PPP/XI/2016', 'Event Test ABCD', 'TOPIK KKK', '', '2016-11-01', '2016-11-04', 0000000002, 'hotel milenium, jakarta', '-6.1825071', '106.81676229999994', 'MKU', 0000000002, 'post test|pre test', 0000000000, '', 3, 0000000001, 0000000007, 0, 0, 'active', 13, '2016-10-28 16:06:18', 13, '2016-10-28 16:20:38', 'approved_pusat'),
(0000000004, 'WVHPKK7ZEL1477587600', 'A-222/PNM-PPI/XI/2000', 'EVENT COBA', 'ABC', '', '2016-11-02', '2016-11-10', 0000000002, 'Indonesia', '-0.789275', '113.92132700000002', 'KKU', 0000000002, 'pre test', 0000000000, '', 2, 0000000001, 0000000001, 0, 0, 'active', 13, '2016-10-28 16:12:42', NULL, NULL, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `em_event_approval`
--

CREATE TABLE IF NOT EXISTS `em_event_approval` (
`id` int(11) NOT NULL,
  `id_approval` varchar(255) DEFAULT NULL,
  `id_event` varchar(255) NOT NULL,
  `tingkat_approval` enum('atasan','pusat') NOT NULL,
  `rab_disetujui` bigint(20) DEFAULT NULL,
  `catatan` text NOT NULL,
  `persetujuan` enum('approved','rejected') NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_event_approval`
--

INSERT INTO `em_event_approval` (`id`, `id_approval`, `id_event`, `tingkat_approval`, `rab_disetujui`, `catatan`, `persetujuan`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, NULL, 'IKOUYKFXDP1477587600', 'atasan', NULL, '<p>disetujui oleh atasan</p>\r\n', 'approved', 'active', 0000000011, '2016-10-28 13:31:08', NULL, NULL),
(2, NULL, 'IKOUYKFXDP1477587600', 'pusat', 123123123, '<p>disetujui oleh pusat</p>\r\n', '', 'active', 0000000011, '2016-10-28 13:54:43', NULL, NULL),
(3, NULL, 'IKOUYKFXDP1477587600', 'pusat', 123123123, '<p>disetujui oleh pusat</p>\r\n', '', 'active', 0000000011, '2016-10-28 13:55:58', NULL, NULL),
(4, NULL, 'IKOUYKFXDP1477587600', 'pusat', 42344324, '<p>divalidasi dan disetujui pusat</p>\r\n', '', 'active', 0000000011, '2016-10-28 13:56:34', NULL, NULL),
(5, 'ap-1', '9NZ8Z2HRK01477587600', 'atasan', NULL, '<p>OK oleh atasan</p>\r\n', 'approved', 'active', 0000000011, '2016-10-28 14:02:58', NULL, NULL),
(6, 'ap-1', '9NZ8Z2HRK01477587600', 'atasan', NULL, '<p>OK oleh atasan</p>\r\n', 'approved', 'active', 0000000011, '2016-10-28 14:03:25', NULL, NULL),
(7, '9NZ8Z2HRK01477587600ap-1', '9NZ8Z2HRK01477587600', 'atasan', NULL, '<p>OK oleh atasan</p>\r\n', 'approved', 'active', 0000000011, '2016-10-28 14:04:08', NULL, NULL),
(8, '9NZ8Z2HRK01477587600ap-2', '9NZ8Z2HRK01477587600', 'pusat', 4332345, '<p>OK oleh pusat</p>\r\n', '', 'active', 0000000011, '2016-10-28 14:05:42', NULL, NULL),
(9, '9NZ8Z2HRK01477587600ap-2', '9NZ8Z2HRK01477587600', 'pusat', 231321, '<p>OK oleh pusat</p>\r\n', '', 'active', 0000000011, '2016-10-28 14:06:34', NULL, NULL),
(10, '9NZ8Z2HRK01477587600ap-2', '9NZ8Z2HRK01477587600', 'pusat', 583547264, '<p>OK oleh pusat</p>\r\n', '', 'active', 0000000011, '2016-10-28 14:09:04', NULL, NULL),
(11, 'HTYBVXWID81477587600ap-1', 'HTYBVXWID81477587600', 'atasan', NULL, '<p>test a</p>\r\n', 'approved', 'active', 0000000013, '2016-10-28 16:18:08', NULL, NULL),
(12, 'HTYBVXWID81477587600ap-2', 'HTYBVXWID81477587600', 'pusat', 100000, '<p>ooh</p>\r\n', 'approved', 'active', 0000000013, '2016-10-28 16:20:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_event_approval_files`
--

CREATE TABLE IF NOT EXISTS `em_event_approval_files` (
`id` int(11) NOT NULL,
  `id_event_approval` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `jenis_file` varchar(100) NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_event_approval_files`
--

INSERT INTO `em_event_approval_files` (`id`, `id_event_approval`, `nama_file`, `jenis_file`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(1, '9NZ8Z2HRK01477587600ap-2', '9NZ8Z2HRK01477587600ap-2_20161028at140904_Program-Management-PNM.pdf', 'application/pdf', 0000000011, '2016-10-28 14:09:04', NULL, NULL, 'active'),
(2, 'HTYBVXWID81477587600ap-2', 'HTYBVXWID81477587600ap-2_20161028at162038_Program-Management-PNM.pdf', 'application/pdf', 0000000013, '2016-10-28 16:20:38', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `em_event_listpeserta`
--

CREATE TABLE IF NOT EXISTS `em_event_listpeserta` (
`id` int(10) unsigned zerofill NOT NULL,
  `id_event` varchar(256) NOT NULL,
  `idsdm` varchar(256) NOT NULL,
  `nik` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `posisi` varchar(256) NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_event_listpeserta`
--

INSERT INTO `em_event_listpeserta` (`id`, `id_event`, `idsdm`, `nik`, `nama`, `posisi`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(0000000001, 'IKOUYKFXDP1477587600', '38B636D94B1CA3B1F2532DB740DA446C', '9649.08.15', 'Andika Permana Putra Purba', 'Officer Aplication Developer', 0000000011, '2016-10-28', NULL, NULL),
(0000000002, 'IKOUYKFXDP1477587600', 'ECD2FD56BAAA7D522748DB3BA18CB79B', '9319.06.15', 'Ilham Hidayat', 'Officer IT Development', 0000000011, '2016-10-28', NULL, NULL),
(0000000003, '9NZ8Z2HRK01477587600', '38B636D94B1CA3B1F2532DB740DA446C', '9649.08.15', 'Andika Permana Putra Purba', 'Officer Aplication Developer', 0000000011, '2016-10-28', NULL, NULL),
(0000000004, '9NZ8Z2HRK01477587600', 'ECD2FD56BAAA7D522748DB3BA18CB79B', '9319.06.15', 'Ilham Hidayat', 'Officer IT Development', 0000000011, '2016-10-28', NULL, NULL),
(0000000005, 'HTYBVXWID81477587600', '2F2AAF373D2C6AB25E75C3D118A052DC', '8352.11.14', 'Emik Enawaty', 'Spesialis IT Planner', 0000000013, '2016-10-28', NULL, NULL),
(0000000006, 'HTYBVXWID81477587600', 'ECD2FD56BAAA7D522748DB3BA18CB79B', '9319.06.15', 'Ilham Hidayat', 'Officer IT Development', 0000000013, '2016-10-28', NULL, NULL),
(0000000007, 'HTYBVXWID81477587600', '8A0486E3033592DEDC224A7E6C83DE9D', '9643.08.15', 'Maryati', 'Officer Dokumentasi Teknis IT', 0000000013, '2016-10-28', NULL, NULL),
(0000000008, 'WVHPKK7ZEL1477587600', '38B636D94B1CA3B1F2532DB740DA446C', '9649.08.15', 'Andika Permana Putra Purba', 'Officer Aplication Developer', 0000000013, '2016-10-28', NULL, NULL),
(0000000009, 'WVHPKK7ZEL1477587600', 'ECD2FD56BAAA7D522748DB3BA18CB79B', '9319.06.15', 'Ilham Hidayat', 'Officer IT Development', 0000000013, '2016-10-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_event_materikm`
--

CREATE TABLE IF NOT EXISTS `em_event_materikm` (
`id` int(11) NOT NULL,
  `id_event` varchar(256) NOT NULL,
  `nama_file` varchar(256) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `em_event_pic`
--

CREATE TABLE IF NOT EXISTS `em_event_pic` (
`id` int(11) NOT NULL,
  `id_event` varchar(255) NOT NULL,
  `id_karyawan` varchar(255) DEFAULT NULL,
  `nama_pic` varchar(255) NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `em_event_rab`
--

CREATE TABLE IF NOT EXISTS `em_event_rab` (
`id` int(11) NOT NULL,
  `id_event` varchar(256) NOT NULL,
  `id_rab` int(11) NOT NULL,
  `id_rab_parent` int(11) DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_cost` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `em_event_rundown`
--

CREATE TABLE IF NOT EXISTS `em_event_rundown` (
`id` int(11) NOT NULL,
  `id_event` varchar(256) NOT NULL,
  `nama_file` varchar(256) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `em_event_trainer`
--

CREATE TABLE IF NOT EXISTS `em_event_trainer` (
`id` int(11) NOT NULL,
  `id_event` varchar(255) NOT NULL,
  `kategori_trainer` enum('internal','eksternal') NOT NULL,
  `id_kategori_trainer` int(11) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `em_feedback`
--

CREATE TABLE IF NOT EXISTS `em_feedback` (
`id` int(11) NOT NULL,
  `id_event` varchar(256) NOT NULL,
  `url_feedback` varchar(255) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_feedback`
--

INSERT INTO `em_feedback` (`id`, `id_event`, `url_feedback`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(5, '9NZ8Z2HRK01477587600', 'http://pnm.co.id', 'active', 0000000000, '2016-10-28 14:45:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_feedback_detail`
--

CREATE TABLE IF NOT EXISTS `em_feedback_detail` (
`id` int(11) NOT NULL,
  `id_feedback` int(11) NOT NULL,
  `idsdm` varchar(256) NOT NULL,
  `nik` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `status` enum('success','failed') NOT NULL,
  `sent_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_feedback_detail`
--

INSERT INTO `em_feedback_detail` (`id`, `id_feedback`, `idsdm`, `nik`, `nama`, `email`, `status`, `sent_datetime`) VALUES
(1, 1, '4F4D5D8D6F769359B5421A939A4214C7', '4F4D5D8D6F769359B5421A939A4214C7', 'FITRIANI SULAEMAN', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:53:38'),
(2, 1, '20D6EB8F2A2C270F51A28297FEC61440', '20D6EB8F2A2C270F51A28297FEC61440', 'IRWAN ZACKY', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:53:38'),
(3, 1, 'EE6C13783F449DB5489DCABC60436E2F', 'EE6C13783F449DB5489DCABC60436E2F', 'YAYANG IQBAL', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:53:39'),
(4, 2, '08379D4E957B887E2368C69951D396AB', '08379D4E957B887E2368C69951D396AB', 'ADI SETIA HARMAWAN', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:03'),
(5, 2, '38B636D94B1CA3B1F2532DB740DA446C', '38B636D94B1CA3B1F2532DB740DA446C', 'Andika Permana Putra Purba', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:03'),
(6, 2, 'C0A40529E71FAB0CF898BE05EFAEF8B8', 'C0A40529E71FAB0CF898BE05EFAEF8B8', 'Cecem Taufik', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:03'),
(7, 2, '847D05E1340EDFA68E01B450D299B878', '847D05E1340EDFA68E01B450D299B878', 'Dwi Retno Sari', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:04'),
(8, 2, '4F4D5D8D6F769359B5421A939A4214C7', '4F4D5D8D6F769359B5421A939A4214C7', 'FITRIANI SULAEMAN', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:04'),
(9, 2, 'ECD2FD56BAAA7D522748DB3BA18CB79B', 'ECD2FD56BAAA7D522748DB3BA18CB79B', 'Ilham Hidayat', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:04'),
(10, 2, '20D6EB8F2A2C270F51A28297FEC61440', '20D6EB8F2A2C270F51A28297FEC61440', 'IRWAN ZACKY', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:05'),
(11, 2, '48BD28C62468F88CE63FA6C09AE53EBF', '48BD28C62468F88CE63FA6C09AE53EBF', 'Risky Handayani', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:05'),
(12, 2, '256EC73DA11A6F7EF3309C2B98888D56', '256EC73DA11A6F7EF3309C2B98888D56', 'Shany Cindy Riana', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:05'),
(13, 2, 'DA272D7FCB7ADEFF251E1C52760506C7', 'DA272D7FCB7ADEFF251E1C52760506C7', 'SOVENDA SEPTA HASTOYO', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:05'),
(14, 2, 'EE6C13783F449DB5489DCABC60436E2F', 'EE6C13783F449DB5489DCABC60436E2F', 'YAYANG IQBAL', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 22:56:05'),
(15, 3, '847D05E1340EDFA68E01B450D299B878', '847D05E1340EDFA68E01B450D299B878', 'Dwi Retno Sari', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 23:02:53'),
(16, 3, '256EC73DA11A6F7EF3309C2B98888D56', '256EC73DA11A6F7EF3309C2B98888D56', 'Shany Cindy Riana', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 23:02:53'),
(17, 4, '38B636D94B1CA3B1F2532DB740DA446C', '38B636D94B1CA3B1F2532DB740DA446C', 'Andika Permana Putra Purba', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 23:05:14'),
(18, 4, 'ECD2FD56BAAA7D522748DB3BA18CB79B', 'ECD2FD56BAAA7D522748DB3BA18CB79B', 'Ilham Hidayat', 'deby.natazha@yahoo.co.id', 'success', '2016-10-22 23:05:14'),
(19, 5, '08379D4E957B887E2368C69951D396AB', '08379D4E957B887E2368C69951D396AB', 'ADI SETIA HARMAWAN', 'deby.natazha@yahoo.co.id', 'success', '2016-10-28 14:45:06'),
(20, 5, '38B636D94B1CA3B1F2532DB740DA446C', '38B636D94B1CA3B1F2532DB740DA446C', 'Andika Permana Putra Purba', 'deby.natazha@yahoo.co.id', 'success', '2016-10-28 14:45:06'),
(21, 5, 'C0A40529E71FAB0CF898BE05EFAEF8B8', 'C0A40529E71FAB0CF898BE05EFAEF8B8', 'Cecem Taufik', 'deby.natazha@yahoo.co.id', 'success', '2016-10-28 14:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `em_kategori_event`
--

CREATE TABLE IF NOT EXISTS `em_kategori_event` (
`id` int(10) unsigned zerofill NOT NULL,
  `kategori_event` varchar(256) NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_kategori_event`
--

INSERT INTO `em_kategori_event` (`id`, `kategori_event`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(0000000001, 'Training', 00000000001, '0000-00-00 00:00:00', 00000000002, '2016-10-12 13:56:02', 'active'),
(0000000002, 'Exam', 00000000001, '0000-00-00 00:00:00', NULL, NULL, 'active'),
(0000000004, 'others', 00000000002, '2016-10-12 13:36:06', NULL, NULL, 'active'),
(0000000005, 'asd', 00000000002, '2016-10-12 13:37:09', NULL, '2016-10-12 13:45:16', 'deleted'),
(0000000006, 'Coba event', 00000000002, '2016-10-12 13:45:54', NULL, '2016-10-12 13:45:58', 'deleted'),
(0000000007, 'asda', 00000000002, '2016-10-12 13:47:36', NULL, '2016-10-12 13:47:41', 'deleted'),
(0000000008, 'gggg', 00000000002, '2016-10-12 13:49:24', 00000000002, '2016-10-12 13:49:27', 'deleted'),
(0000000009, 'asdasd', 00000000002, '2016-10-12 16:51:42', 00000000002, '2016-10-12 17:50:39', 'deleted'),
(0000000010, 'adasd', 00000000002, '2016-10-12 17:08:21', 00000000002, '2016-10-12 17:50:34', 'deleted'),
(0000000011, 'sfff', 00000000002, '2016-10-12 17:23:13', 00000000002, '2016-10-12 17:51:20', 'disabled'),
(0000000012, 'kta', 00000000002, '2016-10-12 17:27:07', 00000000002, '2016-10-12 17:50:44', 'deleted'),
(0000000013, 'coba kategori 1', 00000000002, '2016-10-12 17:50:52', 00000000002, '2016-10-12 17:51:11', 'disabled'),
(0000000014, 'asdasd', 00000000002, '2016-10-12 17:57:10', NULL, NULL, 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `em_kategori_rab`
--

CREATE TABLE IF NOT EXISTS `em_kategori_rab` (
`id` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL COMMENT 'Diisi jika merupakan judul, jika bukan maka kosongkan',
  `deskripsi` varchar(255) NOT NULL,
  `jumlah_unit` varchar(20) DEFAULT NULL,
  `frekwensi` varchar(20) DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_kategori_rab`
--

INSERT INTO `em_kategori_rab` (`id`, `id_parent`, `deskripsi`, `jumlah_unit`, `frekwensi`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, NULL, 'Honor', '', '', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(2, 1, 'Pelatih Internal', 'jam', 'hari', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(3, 1, 'Pelatih Eksternal', 'kali', 'hari', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(4, 1, 'Vendor (EO)', 'event', 'kali', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(5, NULL, 'Akomodasi dan Konsumsi', '', '', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(6, 5, 'Peserta', 'pax', 'hari', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(7, 5, 'PIC Training', 'pax', 'hari', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(8, 5, 'Trainer', 'pax', 'hari', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(9, 5, 'Laundry', 'pax', 'hari', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(10, 5, 'Konsumsi Lain-lain', 'pax', 'hari', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(11, 5, 'Ruang Meeting', 'unit', 'hari', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(12, 5, 'Hotel', 'unit', 'hari', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(13, NULL, 'Transportasi', '', '', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(14, 13, 'SPD Peserta', 'pax', '', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(15, 13, 'SPD PIC dan Trainer', 'pcs', '', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(16, 13, 'Tiket PP', 'pcs', '', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(17, 13, 'Transportasi Utama', 'unit', '', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(18, NULL, 'Perlengkapan', '', '', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(19, 18, 'Fotocopy Materi', 'pax', 'kali', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(20, 18, 'Spanduk/Banner', 'pcs', 'kali', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(21, 18, 'ATK/Training Kit', 'pcs', 'kali', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(22, 18, 'Bus', 'unit', 'kali', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(23, 18, 'Kaos', 'pcs', 'kali', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(24, 18, 'Obat-obatan', 'pcs', 'kali', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(25, 18, 'Extra Bed', 'unit', 'hari', 'active', 0000000001, '2016-10-07 09:28:19', NULL, NULL),
(26, NULL, 'Uang Muka', '', '', 'deleted', 0000000001, '2016-10-07 09:28:19', NULL, '2016-10-21 11:30:52'),
(27, NULL, 'test kategori rab', '', '', 'deleted', 0000000011, '2016-10-18 16:07:17', NULL, '2016-10-21 13:38:10'),
(28, 27, 'test child dari test kategori awal', '', '', 'deleted', 0000000011, '2016-10-18 16:08:34', NULL, '2016-10-21 13:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `em_kategori_tempat`
--

CREATE TABLE IF NOT EXISTS `em_kategori_tempat` (
`id` int(11) NOT NULL,
  `kategori_tempat` varchar(256) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_kategori_tempat`
--

INSERT INTO `em_kategori_tempat` (`id`, `kategori_tempat`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(2, 'Hotel', 99450915, '2016-10-11 19:27:18', NULL, NULL, 'active'),
(3, 'Villa', 99450915, '2016-10-11 19:27:52', NULL, NULL, 'active'),
(4, 'coba tempat kategori a', 99450915, '2016-10-11 19:29:42', 00000000002, '2016-10-12 18:31:26', 'deleted'),
(5, 'coba lagi a', 99450915, '2016-10-11 19:30:46', 00000000002, '2016-10-12 18:31:15', 'deleted'),
(6, 'coba tempat kategor sadi', 2, '2016-10-12 16:55:55', 00000000002, '2016-10-12 17:00:00', 'deleted'),
(7, '', 2, '2016-10-12 17:01:12', 00000000002, '2016-10-12 17:03:14', 'deleted'),
(8, 'coba tempat kategori', 2, '2016-10-12 17:02:39', 00000000002, '2016-10-12 18:31:30', 'deleted'),
(9, 'asd sda', 2, '2016-10-12 17:03:21', 00000000002, '2016-10-12 18:31:10', 'deleted'),
(10, '', 2, '2016-10-12 17:04:05', 00000000002, '2016-10-12 17:07:00', 'deleted'),
(11, 'coba tempat kategori asdasdsa', 2, '2016-10-12 17:07:12', 00000000002, '2016-10-12 18:31:03', 'deleted'),
(12, '', 2, '2016-10-12 17:07:18', 00000000011, '2016-10-12 17:11:20', 'deleted'),
(13, 'coba tempat kategor sadi', 11, '2016-10-12 17:11:27', 00000000002, '2016-10-12 18:31:33', 'deleted'),
(14, 'coba tempat kategor sadi hgfjgjh', 11, '2016-10-12 17:13:03', 00000000002, '2016-10-12 18:31:13', 'deleted'),
(15, '', 11, '2016-10-12 17:13:09', 00000000011, '2016-10-12 17:19:41', 'deleted'),
(16, 'hahaha', 11, '2016-10-12 17:20:08', 00000000002, '2016-10-12 18:31:18', 'deleted'),
(17, 'coba html', 2, '2016-10-12 17:23:37', 00000000002, '2016-10-12 18:31:07', 'deleted'),
(18, 'kategori magrib', 2, '2016-10-12 17:53:35', 00000000002, '2016-10-12 18:31:37', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `em_klasifikasimateri`
--

CREATE TABLE IF NOT EXISTS `em_klasifikasimateri` (
`id` int(10) unsigned zerofill NOT NULL,
  `nama_klasifikasi` varchar(256) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_klasifikasimateri`
--

INSERT INTO `em_klasifikasimateri` (`id`, `nama_klasifikasi`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(0000000001, 'materi pengantar', 'active', 00000000001, '2016-10-05 00:00:00', NULL, NULL),
(0000000002, 'materi pokok', 'active', 00000000001, '2016-10-05 00:00:00', NULL, NULL),
(0000000003, 'Materi Public Speaking 1', 'disabled', 00000890600, '2016-10-07 14:10:27', 00000890600, '2016-10-07 14:10:56'),
(0000000004, 'Materi Untuk Dihapus', 'deleted', 00000890600, '2016-10-07 14:11:11', 00000890600, '2016-10-07 14:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `em_materi`
--

CREATE TABLE IF NOT EXISTS `em_materi` (
`id` int(11) unsigned zerofill NOT NULL,
  `id_materi` varchar(255) NOT NULL,
  `nama_materi` varchar(255) NOT NULL,
  `id_klasifikasi_materi` int(11) unsigned zerofill NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_materi`
--

INSERT INTO `em_materi` (`id`, `id_materi`, `nama_materi`, `id_klasifikasi_materi`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(00000000001, 'md2a-23', 'Materi Pengantar Seminar', 00000000001, 'disabled', 00000890600, '2016-10-07 14:38:48', 00000890600, '2016-10-07 14:57:29'),
(00000000002, 'aa9x-23', 'Contoh Materi', 00000000002, 'active', 00000890600, '2016-10-07 14:52:26', 00000890600, '2016-10-07 14:59:35'),
(00000000003, 'ss9c-00', 'Inner Beauty', 00000000002, 'deleted', 00000890600, '2016-10-07 14:52:55', 00000890600, '2016-10-07 15:05:27'),
(00000000004, 'AB1C-20', 'Materi Nama', 00000000001, 'active', 00000000011, '2016-10-28 14:38:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_navigationmenu`
--

CREATE TABLE IF NOT EXISTS `em_navigationmenu` (
`id` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL COMMENT 'Jika di merupakan sub-menu dari menu lain. Jika bukan, kosongkan',
  `id_systemactive` int(11) NOT NULL COMMENT 'Penanda menubar aktif di sistem yang mana (relasi ke DB em_systemactive)',
  `icon_menu` varchar(255) DEFAULT NULL COMMENT 'Class untuk icon yang digunakan di menu parent dan di munculkan di menubar',
  `nama_menu` varchar(255) NOT NULL,
  `nama_modul` varchar(255) DEFAULT NULL COMMENT 'link tujuan',
  `modul_homepage` tinyint(4) NOT NULL COMMENT '1=link redirect to home ; 0=link to modul',
  `is_displayed` tinyint(4) NOT NULL COMMENT '1=muncul di user group matrix; 0=tidak muncul',
  `sort_parent` tinyint(4) DEFAULT NULL COMMENT 'Urutan parent menu',
  `sort_child` tinyint(4) DEFAULT NULL COMMENT 'Urutan sub-menu (dan jika ada ada sub dari sub-menu tsb, dst.)',
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_navigationmenu`
--

INSERT INTO `em_navigationmenu` (`id`, `id_parent`, `id_systemactive`, `icon_menu`, `nama_menu`, `nama_modul`, `modul_homepage`, `is_displayed`, `sort_parent`, `sort_child`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, NULL, 1, 'zmdi zmdi-view-dashboard', 'Dashboard', NULL, 1, 0, 1, NULL, 'active', 00000000001, '2016-10-07 09:28:19', NULL, NULL),
(2, NULL, 1, 'zmdi zmdi-collection-text', 'Privilege', NULL, 0, 1, 2, NULL, 'active', 00000000001, '2016-10-07 09:28:19', NULL, NULL),
(3, 2, 1, NULL, 'User', 'users', 0, 1, NULL, 1, 'active', 00000000001, '2016-10-07 09:28:19', NULL, NULL),
(4, 2, 1, NULL, 'User Group', 'user-group', 0, 1, NULL, 2, 'active', 00000000001, '2016-10-07 09:28:40', NULL, NULL),
(5, NULL, 1, 'zmdi zmdi-collection-text', 'Master Data', NULL, 0, 1, 3, NULL, 'active', 00000000001, '2016-10-07 09:28:19', NULL, NULL),
(6, 5, 1, NULL, 'Matriks Program & Anggaran', 'matriks-program-anggaran', 0, 1, NULL, 1, 'active', 00000000001, '2016-10-07 09:29:06', NULL, NULL),
(7, 5, 1, NULL, 'Trainer', 'trainer', 0, 1, NULL, 2, 'active', 00000000001, '2016-10-07 09:29:24', 00000000001, '2016-10-07 09:47:44'),
(8, 5, 1, NULL, 'Materi', 'materi', 0, 1, NULL, 5, 'active', 00000000001, '2016-10-07 09:29:53', NULL, NULL),
(9, 5, 1, NULL, 'Kategori Event', 'kategori-event', 0, 1, NULL, 6, 'active', 00000000001, '2016-10-07 09:30:08', NULL, NULL),
(10, 5, 1, NULL, 'Tipe Pelatihan', 'tipe-pelatihan', 0, 1, NULL, 10, 'active', 00000000001, '2016-10-07 09:30:28', NULL, NULL),
(11, 5, 1, NULL, 'Cabang', 'cabang', 0, 0, NULL, 12, 'disabled', 00000000001, '2016-10-07 09:30:40', NULL, NULL),
(12, 5, 1, NULL, 'Divisi', 'divisi', 0, 0, NULL, 13, 'disabled', 00000000001, '2016-10-07 09:31:00', NULL, NULL),
(13, 5, 1, NULL, 'Klasifikasi Materi', 'klasifikasi-materi', 0, 1, NULL, 4, 'active', 00000000001, '2016-10-07 09:35:31', 00000000001, '2016-10-07 09:54:00'),
(14, NULL, 1, 'zmdi zmdi-collection-text', 'Event', NULL, 0, 1, 4, NULL, 'active', 00000000001, '2016-10-07 09:31:22', NULL, NULL),
(15, 14, 1, NULL, 'Pengajuan Event', 'pengajuan-event', 0, 1, NULL, 1, 'active', 00000000001, '2016-10-07 09:31:22', NULL, NULL),
(16, 14, 1, NULL, 'Persetujuan Memo Event', 'pengajuan-event/list-approval-atasan', 0, 1, NULL, 2, 'active', 00000000001, '2016-10-07 09:31:44', NULL, NULL),
(17, 14, 1, NULL, 'Data Validasi & Persetujuan Event', 'pengajuan-event/list-approval-pusat', 0, 1, NULL, 3, 'active', 00000000001, '2016-10-07 09:32:08', NULL, NULL),
(18, NULL, 1, 'zmdi zmdi-format-list-bulleted', 'Realisasi', NULL, 0, 1, 5, NULL, 'active', 00000000001, '2016-10-07 09:32:08', NULL, NULL),
(19, 18, 1, NULL, 'Realisasi Event', 'realisasi-event', 0, 1, NULL, 1, 'active', 00000000001, '2016-10-07 09:32:28', NULL, NULL),
(20, 18, 1, NULL, 'Persetujuan Pertanggung Jawaban', 'persetujuan-pertanggungjawaban', 0, 1, NULL, 2, 'active', 00000000001, '2016-10-07 09:32:56', NULL, NULL),
(21, 18, 1, NULL, 'Verifikasi Pertanggung Jawaban', 'verifikasi-pertanggungjawaban', 0, 1, NULL, 3, 'active', 00000000001, '2016-10-07 09:33:23', NULL, NULL),
(22, NULL, 1, 'zmdi zmdi-chart', 'Feedback', NULL, 0, 1, 6, NULL, 'active', 00000000001, '2016-10-07 09:33:23', NULL, NULL),
(23, 22, 1, NULL, 'Kirim Feedback', 'kirim-feedback', 0, 1, NULL, 1, 'active', 00000000001, '2016-10-07 09:33:51', NULL, NULL),
(24, 22, 1, NULL, 'List Feedback', 'list-feedback', 0, 1, NULL, 2, 'active', 00000000001, '2016-10-07 09:34:50', NULL, NULL),
(27, NULL, 1, 'zmdi zmdi-collection-item', 'Audit Trail', 'audit-trail', 0, 0, 7, NULL, 'active', 00000000001, '2016-10-07 09:35:31', NULL, NULL),
(28, NULL, 2, 'zmdi zmdi-collection-text', 'Registrasi Event', 'registrasi-event', 1, 1, 0, NULL, 'active', 00000000001, '2016-10-07 09:35:31', NULL, NULL),
(29, 5, 1, NULL, 'Tipe Exam', 'tipe-exam', 0, 1, NULL, 9, 'active', 00000000001, '2016-10-14 09:45:45', NULL, NULL),
(30, 5, 1, NULL, 'Kategori Tempat Event', 'kategori-tempat', 0, 1, NULL, 7, 'active', 00000000001, '2016-10-14 11:33:49', NULL, NULL),
(31, 5, 1, NULL, 'Trainer Eksternal', 'trainer-eksternal', 0, 1, NULL, 3, 'active', 00000000001, '2016-10-07 09:29:24', 00000000001, '2016-10-07 09:47:44'),
(32, 14, 1, NULL, 'List Event', 'event', 0, 1, NULL, 4, 'active', 00000000001, '2016-10-07 09:31:22', NULL, NULL),
(33, 5, 1, NULL, 'Kategori RAB', 'kategori-rab', 0, 1, NULL, 8, 'active', 00000000001, '2016-10-07 09:29:24', 00000000001, '2016-10-07 09:47:44'),
(35, NULL, 2, 'zmdi zmdi-collection-item', 'List Peserta Event', 'list-peserta-event', 0, 0, 2, NULL, 'active', 00000000001, '2016-10-07 09:35:31', NULL, NULL),
(36, 5, 1, NULL, 'Bisnis Unit & Jabatan', 'bisnis-unit-jabatan', 0, 1, NULL, 11, 'active', 00000000001, '2016-10-07 09:30:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_program_anggaran`
--

CREATE TABLE IF NOT EXISTS `em_program_anggaran` (
`id` int(11) NOT NULL,
  `id_root` int(11) DEFAULT NULL COMMENT 'Its parent root ID, if NULL then it is a root',
  `id_parent` int(11) DEFAULT NULL COMMENT 'Jika NULL, maka dia root nya (setelah RKAP)',
  `level` int(11) NOT NULL COMMENT '1=bisnis unit;2=kategori program;3=program',
  `deskripsi` varchar(256) NOT NULL,
  `budget` varchar(50) DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_program_anggaran`
--

INSERT INTO `em_program_anggaran` (`id`, `id_root`, `id_parent`, `level`, `deskripsi`, `budget`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, NULL, NULL, 1, 'Test Parent 1aa', '1314', 'active', 0000000011, '2016-10-27 20:04:23', 0000000011, '2016-10-28 06:58:35'),
(2, 8, 8, 2, 'Test Child 1.1aaaa', '25445', 'deleted', 0000000011, '2016-10-27 20:04:55', 0000000011, '2016-10-28 08:39:27'),
(3, 1, 7, 3, 'Test Child 1.1.1 bbbbb', NULL, 'deleted', 0000000011, '2016-10-27 20:05:11', 0000000011, '2016-10-28 08:39:10'),
(7, 1, 1, 2, 'Test Child 1.2', NULL, 'active', 0000000011, '2016-10-27 20:04:55', NULL, NULL),
(8, NULL, NULL, 1, 'Test Parent 2', '23131232', 'deleted', 0000000011, '2016-10-28 01:56:33', 0000000011, '2016-10-28 08:39:27'),
(9, NULL, 8, 2, 'Test Child 2.1', '35234324', 'active', 0000000011, '2016-10-28 01:59:52', NULL, NULL),
(10, 8, 8, 2, 'Test Child 2.2', NULL, 'deleted', 0000000011, '2016-10-28 02:02:06', 0000000011, '2016-10-28 08:39:27'),
(11, 1, 2, 3, 'Test Child 1.1.1', NULL, 'deleted', 0000000011, '2016-10-28 02:03:13', 0000000011, '2016-10-28 08:39:19'),
(12, 8, 9, 3, 'Test Child 2.1.1', NULL, 'deleted', 0000000011, '2016-10-28 02:03:54', 0000000011, '2016-10-28 08:39:27'),
(13, NULL, NULL, 1, 'Test Parent 3', '7654363', 'active', 0000000011, '2016-10-28 14:39:31', NULL, NULL),
(14, NULL, NULL, 1, 'bisnis unit level 1', '300000000', 'active', 0000000013, '2016-10-28 15:58:31', NULL, NULL),
(15, 14, 14, 2, 'bisnis unit level 2 (dari level 1)', NULL, 'active', 0000000013, '2016-10-28 15:59:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_registrasi`
--

CREATE TABLE IF NOT EXISTS `em_registrasi` (
`id` int(10) unsigned zerofill NOT NULL,
  `id_event` varchar(256) NOT NULL,
  `idsdm` varchar(256) NOT NULL,
  `nik` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `idsdm_replaced` varchar(256) DEFAULT NULL,
  `nik_replaced` varchar(256) DEFAULT NULL,
  `nama_replaced` varchar(256) DEFAULT NULL,
  `email_replaced` varchar(256) DEFAULT NULL,
  `alasan_replaced` text,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_registrasi`
--

INSERT INTO `em_registrasi` (`id`, `id_event`, `idsdm`, `nik`, `nama`, `email`, `idsdm_replaced`, `nik_replaced`, `nama_replaced`, `email_replaced`, `alasan_replaced`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(0000000001, '9NZ8Z2HRK01477587600', '20D6EB8F2A2C270F51A28297FEC61440', '20D6EB8F2A2C270F51A28297FEC61440', 'IRWAN ZACKY', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-18 17:44:15', NULL, NULL),
(0000000002, '9NZ8Z2HRK01477587600', 'EE6C13783F449DB5489DCABC60436E2F', 'EE6C13783F449DB5489DCABC60436E2F', 'YAYANG IQBAL', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-19 17:44:15', NULL, NULL),
(0000000003, '9NZ8Z2HRK01477587600', 'DA272D7FCB7ADEFF251E1C52760506C7', 'DA272D7FCB7ADEFF251E1C52760506C7', 'SOVENDA SEPTA HASTOYO', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-20 17:44:15', NULL, NULL),
(0000000004, '9NZ8Z2HRK01477587600', '4F4D5D8D6F769359B5421A939A4214C7', '4F4D5D8D6F769359B5421A939A4214C7', 'FITRIANI SULAEMAN', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-21 17:44:15', NULL, NULL),
(0000000005, '9NZ8Z2HRK01477587600', '08379D4E957B887E2368C69951D396AB', '08379D4E957B887E2368C69951D396AB', 'ADI SETIA HARMAWAN', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-22 17:44:15', NULL, NULL),
(0000000006, '9NZ8Z2HRK01477587600', '48BD28C62468F88CE63FA6C09AE53EBF', '48BD28C62468F88CE63FA6C09AE53EBF', 'Risky Handayani', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-23 17:44:15', NULL, NULL),
(0000000007, '9NZ8Z2HRK01477587600', 'C0A40529E71FAB0CF898BE05EFAEF8B8', 'C0A40529E71FAB0CF898BE05EFAEF8B8', 'Cecem Taufik', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-24 17:44:15', NULL, NULL),
(0000000008, '9NZ8Z2HRK01477587600', '847D05E1340EDFA68E01B450D299B878', '847D05E1340EDFA68E01B450D299B878', 'Dwi Retno Sari', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-25 17:44:15', NULL, NULL),
(0000000009, '9NZ8Z2HRK01477587600', '256EC73DA11A6F7EF3309C2B98888D56', '256EC73DA11A6F7EF3309C2B98888D56', 'Shany Cindy Riana', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-26 17:44:15', NULL, NULL),
(0000000010, '9NZ8Z2HRK01477587600', '38B636D94B1CA3B1F2532DB740DA446C', '38B636D94B1CA3B1F2532DB740DA446C', 'Andika Permana Putra Purba', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-27 17:44:15', NULL, NULL),
(0000000011, '9NZ8Z2HRK01477587600', 'ECD2FD56BAAA7D522748DB3BA18CB79B', 'ECD2FD56BAAA7D522748DB3BA18CB79B', 'Ilham Hidayat', 'deby.natazha@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, 0000000002, '2016-10-28 17:44:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_settings`
--

CREATE TABLE IF NOT EXISTS `em_settings` (
`id` int(11) NOT NULL,
  `tipe` enum('email_from_address','email_from_description') NOT NULL,
  `konten` text NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_settings`
--

INSERT INTO `em_settings` (`id`, `tipe`, `konten`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'email_from_address', 'no-reply@pnm.co.id', 'active', 00000000001, '2016-10-22 03:07:07', NULL, NULL),
(2, 'email_from_description', 'PNM Event Management System', 'active', 00000000001, '2016-10-22 04:10:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_systemactive`
--

CREATE TABLE IF NOT EXISTS `em_systemactive` (
`id` int(11) NOT NULL,
  `definisi` varchar(255) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `login_only` tinyint(4) NOT NULL COMMENT '1=hanya akses login(tidak ada CRUD di usergroup privilege);0=ada CRUD di usergroup privilege',
  `is_displayed` tinyint(4) NOT NULL COMMENT '1=ditampilkan di usergroup privilege;0=tidak ditampilkan',
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_systemactive`
--

INSERT INTO `em_systemactive` (`id`, `definisi`, `sort`, `login_only`, `is_displayed`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Sistem Utama', 1, 0, 1, 'active', 0000000001, '2016-10-12 10:00:00', NULL, NULL),
(2, 'Sistem Registrasi Event', 2, 1, 1, 'active', 0000000001, '2016-10-12 10:00:00', NULL, NULL),
(3, 'Sistem Registrasi User', 3, 1, 0, 'active', 0000000001, '2016-10-12 10:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_tipepelatihan`
--

CREATE TABLE IF NOT EXISTS `em_tipepelatihan` (
`id` int(10) unsigned zerofill NOT NULL,
  `tipe_pelatihan` varchar(255) NOT NULL,
  `inisial_pelatihan` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_tipepelatihan`
--

INSERT INTO `em_tipepelatihan` (`id`, `tipe_pelatihan`, `inisial_pelatihan`, `deskripsi`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(0000000001, 'External Training', 'External Cabang', 'Pelatihan dari pihak external', 'active', 00000890600, '2016-10-07 15:37:56', NULL, NULL),
(0000000002, 'Pelatihan Mekar', 'Mekar', 'Mekar', 'active', 00000890600, '2016-10-07 15:45:56', NULL, NULL),
(0000000003, 'sertifikasi', 'sertifikasi', 'penjelasan mengenai sertifikasi', 'disabled', 00000890600, '2016-10-07 15:46:17', NULL, NULL),
(0000000004, 'Knowledge Sharing', 'KS Kantor Pusat', 'penjelasan KS Kantor Pusat 1', 'active', 00000890600, '2016-10-07 15:46:45', 00000890600, '2016-10-07 15:48:16'),
(0000000005, 'Sembarang', 'Sembarang Berita', 'Penjelsan mengenai sembarang berita', 'deleted', 00000890600, '2016-10-07 15:48:48', 00000890600, '2016-10-07 15:49:05'),
(0000000006, 'Percobaan', 'percobaan Inisial', 'sedang dicoba', 'deleted', 00000890600, '2016-10-07 15:49:54', 00000890600, '2016-10-07 15:50:03'),
(0000000007, 'coba tipe pelatihan', 'CTP', 'desckripsi', 'deleted', 00083521114, '2016-10-07 18:56:14', 00083521114, '2016-10-07 18:56:27'),
(0000000008, 'On Class Training Call Center', 'OCT - CC', 'Pelatihan kelas Call Center', 'active', 00093190615, '2016-10-07 21:50:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_tipe_exam`
--

CREATE TABLE IF NOT EXISTS `em_tipe_exam` (
`id` int(10) unsigned zerofill NOT NULL,
  `tipe_exam` varchar(256) NOT NULL,
  `created_by` int(10) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(10) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_tipe_exam`
--

INSERT INTO `em_tipe_exam` (`id`, `tipe_exam`, `created_by`, `created_date`, `modified_by`, `modified_date`, `is_active`) VALUES
(0000000001, 'pre test', 0000000001, '2016-10-12 00:00:00', 0000000002, '2016-10-12 18:10:16', 'active'),
(0000000002, 'post test', 0000000002, '2016-10-12 18:08:48', 0000000002, '2016-10-12 18:14:12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `em_trainer`
--

CREATE TABLE IF NOT EXISTS `em_trainer` (
`id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_pemateri` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `unit_kerja` varchar(256) DEFAULT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_trainer`
--

INSERT INTO `em_trainer` (`id`, `nik`, `nama_pemateri`, `posisi`, `unit_kerja`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, '012.07.99', 'Achmad Barlian', 'Wakil Pemimpin Cabang', 'Cabang Madiun', 'active', 00000000002, '2016-10-26 14:49:54', NULL, NULL),
(6, '017.08.99', 'Farida', 'Pj. Pemimpin Cabang', 'Cabang Magelang', 'deleted', 00000000002, '2016-10-26 13:52:03', 00000000002, '2016-10-26 14:00:00'),
(7, '10009.09.15', 'Damar Wicaksana', 'Kolektor Unit', 'Cabang Madiun - ULaMM Madiun Caruban', 'active', 00000000002, '2016-10-26 13:59:44', NULL, NULL),
(8, 'MKR3548.09.16', 'LIDYA FEBRIANINGSIH', 'Account Officer Mekaar', 'Cabang Ciracas', 'active', 00000000002, '2016-10-26 14:04:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_trainereksternal`
--

CREATE TABLE IF NOT EXISTS `em_trainereksternal` (
`id` int(10) unsigned zerofill NOT NULL,
  `nama_pemateri` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_trainereksternal`
--

INSERT INTO `em_trainereksternal` (`id`, `nama_pemateri`, `nama_perusahaan`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(0000000001, 'naama baru 213', 'nama baru 7586', 'active', 00000000011, '2016-10-17 20:43:36', NULL, '2016-10-24 16:00:05'),
(0000000003, 'nama baru pemateri', 'nama baru perusahaan', 'deleted', 00000000011, '2016-10-18 11:10:03', 00000000011, '2016-10-18 12:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `em_trainereksternal_files`
--

CREATE TABLE IF NOT EXISTS `em_trainereksternal_files` (
`id` int(11) NOT NULL,
  `id_pemateri` int(10) unsigned zerofill NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `is_active` enum('active','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_trainereksternal_files`
--

INSERT INTO `em_trainereksternal_files` (`id`, `id_pemateri`, `nama_file`, `tipe_file`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 0000000001, '1_20161017at204336_c608480b5bf700081f77ab6930b1c64d.jpg', 'image/jpeg', 'deleted', 00000000011, '2016-10-17 20:43:36', 00000000011, '2016-10-18 11:57:49'),
(2, 0000000001, '1_20161017at204336_Quotation-308081602_MajalahAGRINA.pdf', 'application/pdf', 'deleted', 00000000011, '2016-10-17 20:43:36', 00000000011, '2016-10-18 11:57:49'),
(3, 0000000001, '0000000001_20161018at120040_ScreenShot2016-10-18at10.23.01AM.png', 'image/png', 'deleted', 00000000011, '2016-10-18 12:00:40', 00000000011, '2016-10-18 12:01:16'),
(4, 0000000001, '0000000001_20161018at140912_Program-Management-PNM.pdf', 'application/pdf', 'deleted', 00000000011, '2016-10-18 14:09:12', 00000000011, '2016-10-18 14:09:33'),
(5, 0000000001, '0000000001_20161018at140933_Program-Management-PNM.png', 'image/png', 'active', 00000000011, '2016-10-18 14:09:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_url_host`
--

CREATE TABLE IF NOT EXISTS `em_url_host` (
`id` int(11) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
`id` int(11) unsigned zerofill NOT NULL,
  `idsdm` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `id_user_group` int(11) unsigned zerofill DEFAULT NULL,
  `username` varchar(256) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `organisasi_name` varchar(256) DEFAULT NULL,
  `organisasi_desc` varchar(256) DEFAULT NULL,
  `reset_password` varchar(11) DEFAULT NULL,
  `forgot_pass_code` int(11) DEFAULT NULL,
  `forgot_pass_date` datetime DEFAULT NULL,
  `is_administrator` tinyint(4) NOT NULL COMMENT '1=main administrator punya privilege apus dari DB;0=bukan main administrator',
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `finger_print` varchar(256) DEFAULT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_user`
--

INSERT INTO `em_user` (`id`, `idsdm`, `nik`, `id_user_group`, `username`, `fullname`, `email`, `organisasi_name`, `organisasi_desc`, `reset_password`, `forgot_pass_code`, `forgot_pass_date`, `is_administrator`, `is_active`, `finger_print`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(00000000001, NULL, NULL, NULL, 'administrator', 'ADMINISTRATOR', 'admin@admin.co.id', NULL, NULL, NULL, NULL, NULL, 1, 'active', NULL, 00000000001, '2016-10-06 22:39:42', NULL, NULL),
(00000000002, 'ECD2FD56BAAA7D522748DB3BA18CB79B                ', '93190615', 00000000000, 'IHidayat0808', 'Ilham Hidayat', 'ilham_ild@pnm.co.id', NULL, NULL, NULL, NULL, NULL, 0, 'deleted', NULL, 00000000001, '2016-10-06 22:39:42', 00000000002, '2016-10-26 14:51:53'),
(00000000011, '00A15C24F05EEAA69C2E701F365741F0', '99450915', 00000000001, 'HNAWicaksono0909', 'Hario Nur Agung Wicaksono', 'hario0987@pnm.co.id', '', '', NULL, NULL, NULL, 0, 'active', NULL, 00000000002, '2016-10-14 09:57:23', NULL, NULL),
(00000000012, 'ECD2FD56BAAA7D522748DB3BA18CB79B', '93190615', 00000000001, 'IHidayat0808', 'Ilham Hidayat', 'ilham_ild@pnm.co.id', 'itd', 'it strategic development', NULL, NULL, NULL, 0, 'deleted', NULL, 00000000011, '2016-10-14 09:58:10', 00000000002, '2016-10-26 14:51:53'),
(00000000013, '', '93190615', 00000000001, 'IHidayat0808', 'Ilham Hidayat', 'ilham_ild@pnm.co.id', 'itd', 'it strategic development', NULL, NULL, NULL, 0, 'active', NULL, 00000000002, '2016-10-26 14:52:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_usergroup`
--

CREATE TABLE IF NOT EXISTS `em_usergroup` (
`id` int(11) unsigned zerofill NOT NULL,
  `definisi` varchar(256) NOT NULL,
  `is_active` enum('active','disabled','deleted') NOT NULL,
  `created_by` int(11) unsigned zerofill NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) unsigned zerofill DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_usergroup`
--

INSERT INTO `em_usergroup` (`id`, `definisi`, `is_active`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(00000000001, 'administrator', 'active', 00000000001, '2016-10-03 00:00:00', NULL, NULL),
(00000000002, 'admin_pusat', 'active', 00000000001, '2016-10-03 00:00:00', NULL, NULL),
(00000000003, 'admin_cabang', 'active', 00000000001, '2016-10-05 00:00:00', NULL, NULL),
(00000000004, 'admin_divisi', 'active', 00000000001, '2016-10-05 00:00:00', NULL, NULL),
(00000000005, 'kepala_cabang', 'active', 00000000001, '2016-10-05 00:00:00', NULL, NULL),
(00000000006, 'kepala_divisi', 'active', 00000000001, '2016-10-05 00:00:00', 00000000002, '2016-10-13 18:04:05'),
(00000000014, 'test user group matrix1', 'disabled', 00000000002, '2016-10-13 15:08:16', 00000000002, '2016-10-13 18:06:55'),
(00000000015, 'test untuk hapus', 'deleted', 00000000002, '2016-10-13 17:16:44', NULL, NULL),
(00000000016, 'test ug2', 'active', 00000000011, '2016-10-14 15:24:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `em_usergroup_matrix`
--

CREATE TABLE IF NOT EXISTS `em_usergroup_matrix` (
`id` int(11) NOT NULL,
  `id_usergroup` int(10) unsigned zerofill NOT NULL,
  `id_menu` int(11) NOT NULL,
  `action_create` tinyint(4) NOT NULL COMMENT '1=active;0=inactive',
  `action_read` tinyint(4) NOT NULL COMMENT '1=active;0=inactive',
  `action_update` tinyint(4) NOT NULL COMMENT '1=active;0=inactive',
  `action_delete` tinyint(4) NOT NULL COMMENT '1=active;0=inactive',
  `action_login` tinyint(4) NOT NULL COMMENT 'Hak akses login (tidak ada CRUD), sesuai flag login_only di em_navigationmenu'
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_usergroup_matrix`
--

INSERT INTO `em_usergroup_matrix` (`id`, `id_usergroup`, `id_menu`, `action_create`, `action_read`, `action_update`, `action_delete`, `action_login`) VALUES
(1, 0000000014, 3, 0, 0, 0, 0, 0),
(2, 0000000014, 4, 0, 0, 0, 0, 0),
(3, 0000000014, 6, 0, 1, 0, 0, 0),
(4, 0000000014, 7, 0, 0, 0, 0, 0),
(5, 0000000014, 13, 0, 0, 0, 0, 0),
(6, 0000000014, 8, 0, 0, 0, 0, 0),
(7, 0000000014, 9, 0, 0, 0, 0, 0),
(8, 0000000014, 10, 0, 0, 0, 0, 0),
(9, 0000000014, 11, 0, 0, 0, 0, 0),
(10, 0000000014, 12, 0, 0, 1, 0, 0),
(11, 0000000014, 15, 0, 0, 0, 0, 0),
(12, 0000000014, 16, 0, 0, 0, 0, 0),
(13, 0000000014, 17, 0, 0, 0, 0, 0),
(14, 0000000014, 19, 0, 0, 0, 0, 0),
(15, 0000000014, 20, 0, 0, 0, 0, 0),
(16, 0000000014, 21, 0, 0, 0, 0, 0),
(17, 0000000014, 23, 0, 0, 0, 0, 0),
(18, 0000000014, 24, 0, 0, 0, 0, 0),
(19, 0000000014, 25, 0, 0, 0, 0, 0),
(20, 0000000014, 26, 0, 0, 0, 0, 0),
(21, 0000000014, 28, 0, 0, 0, 0, 1),
(22, 0000000015, 3, 0, 0, 0, 0, 0),
(23, 0000000015, 4, 0, 0, 0, 0, 0),
(24, 0000000015, 6, 0, 0, 0, 0, 0),
(25, 0000000015, 7, 0, 0, 0, 0, 0),
(26, 0000000015, 13, 0, 0, 0, 0, 0),
(27, 0000000015, 8, 0, 0, 0, 0, 0),
(28, 0000000015, 9, 0, 0, 0, 0, 0),
(29, 0000000015, 10, 0, 0, 0, 0, 0),
(30, 0000000015, 11, 0, 0, 0, 0, 0),
(31, 0000000015, 12, 0, 0, 0, 0, 0),
(32, 0000000015, 15, 0, 0, 0, 0, 0),
(33, 0000000015, 16, 0, 0, 0, 0, 0),
(34, 0000000015, 17, 0, 0, 0, 0, 0),
(35, 0000000015, 19, 0, 0, 0, 0, 0),
(36, 0000000015, 20, 0, 0, 0, 0, 0),
(37, 0000000015, 21, 0, 0, 0, 0, 0),
(38, 0000000015, 23, 0, 0, 0, 0, 0),
(39, 0000000015, 24, 0, 0, 0, 0, 0),
(40, 0000000015, 25, 0, 0, 0, 0, 0),
(41, 0000000015, 26, 0, 0, 0, 0, 0),
(42, 0000000015, 28, 0, 0, 0, 0, 0),
(43, 0000000006, 3, 1, 0, 0, 1, 0),
(44, 0000000006, 4, 1, 1, 1, 1, 0),
(45, 0000000006, 6, 1, 1, 1, 1, 0),
(46, 0000000006, 7, 1, 1, 1, 1, 0),
(47, 0000000006, 13, 1, 1, 1, 1, 0),
(48, 0000000006, 8, 1, 1, 1, 1, 0),
(49, 0000000006, 9, 1, 1, 1, 1, 0),
(50, 0000000006, 10, 1, 1, 1, 1, 0),
(51, 0000000006, 11, 1, 1, 1, 1, 0),
(52, 0000000006, 12, 1, 1, 1, 1, 0),
(53, 0000000006, 15, 1, 1, 0, 1, 0),
(54, 0000000006, 16, 1, 0, 0, 1, 0),
(55, 0000000006, 17, 1, 1, 1, 1, 0),
(56, 0000000006, 19, 1, 1, 1, 1, 0),
(57, 0000000006, 20, 1, 1, 1, 1, 0),
(58, 0000000006, 21, 1, 1, 1, 1, 0),
(59, 0000000006, 23, 1, 1, 1, 1, 0),
(60, 0000000006, 24, 1, 1, 1, 1, 0),
(61, 0000000006, 25, 1, 1, 1, 1, 0),
(62, 0000000006, 26, 1, 1, 1, 1, 0),
(63, 0000000006, 28, 0, 0, 0, 0, 0),
(64, 0000000016, 3, 1, 1, 1, 1, 0),
(65, 0000000016, 4, 1, 1, 0, 1, 0),
(66, 0000000016, 6, 1, 1, 0, 1, 0),
(67, 0000000016, 7, 1, 1, 1, 1, 0),
(68, 0000000016, 31, 1, 0, 1, 1, 0),
(69, 0000000016, 13, 1, 1, 1, 1, 0),
(70, 0000000016, 8, 1, 0, 1, 1, 0),
(71, 0000000016, 9, 1, 1, 1, 1, 0),
(72, 0000000016, 10, 1, 1, 1, 1, 0),
(73, 0000000016, 29, 1, 1, 1, 1, 0),
(74, 0000000016, 30, 1, 1, 1, 1, 0),
(75, 0000000016, 15, 1, 1, 1, 1, 0),
(76, 0000000016, 16, 1, 1, 1, 1, 0),
(77, 0000000016, 17, 1, 1, 0, 1, 0),
(78, 0000000016, 32, 1, 1, 1, 1, 0),
(79, 0000000016, 19, 1, 1, 1, 1, 0),
(80, 0000000016, 20, 1, 1, 1, 1, 0),
(81, 0000000016, 21, 1, 1, 1, 1, 0),
(82, 0000000016, 23, 1, 1, 1, 1, 0),
(83, 0000000016, 24, 1, 1, 1, 1, 0),
(84, 0000000016, 25, 1, 1, 1, 1, 0),
(85, 0000000016, 26, 1, 1, 1, 1, 0),
(86, 0000000016, 28, 0, 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `em_activitiesuser`
--
ALTER TABLE `em_activitiesuser`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_bisnis_unit`
--
ALTER TABLE `em_bisnis_unit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_bisnis_unit_jabatan`
--
ALTER TABLE `em_bisnis_unit_jabatan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_cabang`
--
ALTER TABLE `em_cabang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_divisi`
--
ALTER TABLE `em_divisi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_email_template`
--
ALTER TABLE `em_email_template`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_event`
--
ALTER TABLE `em_event`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_event_approval`
--
ALTER TABLE `em_event_approval`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_event_approval_files`
--
ALTER TABLE `em_event_approval_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_event_listpeserta`
--
ALTER TABLE `em_event_listpeserta`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_event_materikm`
--
ALTER TABLE `em_event_materikm`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_event_pic`
--
ALTER TABLE `em_event_pic`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_event_rab`
--
ALTER TABLE `em_event_rab`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_event_rundown`
--
ALTER TABLE `em_event_rundown`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_event_trainer`
--
ALTER TABLE `em_event_trainer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_feedback`
--
ALTER TABLE `em_feedback`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_feedback_detail`
--
ALTER TABLE `em_feedback_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_kategori_event`
--
ALTER TABLE `em_kategori_event`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_kategori_rab`
--
ALTER TABLE `em_kategori_rab`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_kategori_tempat`
--
ALTER TABLE `em_kategori_tempat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_klasifikasimateri`
--
ALTER TABLE `em_klasifikasimateri`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_materi`
--
ALTER TABLE `em_materi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_navigationmenu`
--
ALTER TABLE `em_navigationmenu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_program_anggaran`
--
ALTER TABLE `em_program_anggaran`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_registrasi`
--
ALTER TABLE `em_registrasi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_settings`
--
ALTER TABLE `em_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_systemactive`
--
ALTER TABLE `em_systemactive`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_tipepelatihan`
--
ALTER TABLE `em_tipepelatihan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_tipe_exam`
--
ALTER TABLE `em_tipe_exam`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_trainer`
--
ALTER TABLE `em_trainer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_trainereksternal`
--
ALTER TABLE `em_trainereksternal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_trainereksternal_files`
--
ALTER TABLE `em_trainereksternal_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_url_host`
--
ALTER TABLE `em_url_host`
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
-- Indexes for table `em_usergroup_matrix`
--
ALTER TABLE `em_usergroup_matrix`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `em_activitiesuser`
--
ALTER TABLE `em_activitiesuser`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=408;
--
-- AUTO_INCREMENT for table `em_bisnis_unit`
--
ALTER TABLE `em_bisnis_unit`
MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `em_bisnis_unit_jabatan`
--
ALTER TABLE `em_bisnis_unit_jabatan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `em_cabang`
--
ALTER TABLE `em_cabang`
MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `em_divisi`
--
ALTER TABLE `em_divisi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `em_email_template`
--
ALTER TABLE `em_email_template`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `em_event`
--
ALTER TABLE `em_event`
MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `em_event_approval`
--
ALTER TABLE `em_event_approval`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `em_event_approval_files`
--
ALTER TABLE `em_event_approval_files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `em_event_listpeserta`
--
ALTER TABLE `em_event_listpeserta`
MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `em_event_materikm`
--
ALTER TABLE `em_event_materikm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `em_event_pic`
--
ALTER TABLE `em_event_pic`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `em_event_rab`
--
ALTER TABLE `em_event_rab`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `em_event_rundown`
--
ALTER TABLE `em_event_rundown`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `em_event_trainer`
--
ALTER TABLE `em_event_trainer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `em_feedback`
--
ALTER TABLE `em_feedback`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `em_feedback_detail`
--
ALTER TABLE `em_feedback_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `em_kategori_event`
--
ALTER TABLE `em_kategori_event`
MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `em_kategori_rab`
--
ALTER TABLE `em_kategori_rab`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `em_kategori_tempat`
--
ALTER TABLE `em_kategori_tempat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `em_klasifikasimateri`
--
ALTER TABLE `em_klasifikasimateri`
MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `em_materi`
--
ALTER TABLE `em_materi`
MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `em_navigationmenu`
--
ALTER TABLE `em_navigationmenu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `em_program_anggaran`
--
ALTER TABLE `em_program_anggaran`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `em_registrasi`
--
ALTER TABLE `em_registrasi`
MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `em_settings`
--
ALTER TABLE `em_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `em_systemactive`
--
ALTER TABLE `em_systemactive`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `em_tipepelatihan`
--
ALTER TABLE `em_tipepelatihan`
MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `em_tipe_exam`
--
ALTER TABLE `em_tipe_exam`
MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `em_trainer`
--
ALTER TABLE `em_trainer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `em_trainereksternal`
--
ALTER TABLE `em_trainereksternal`
MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `em_trainereksternal_files`
--
ALTER TABLE `em_trainereksternal_files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `em_url_host`
--
ALTER TABLE `em_url_host`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `em_user`
--
ALTER TABLE `em_user`
MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `em_usergroup`
--
ALTER TABLE `em_usergroup`
MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `em_usergroup_matrix`
--
ALTER TABLE `em_usergroup_matrix`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
