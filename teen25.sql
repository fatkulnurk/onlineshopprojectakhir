-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2016 at 10:32 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teen25`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `sts` enum('0','1','2') NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `sts`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@yahoo.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE IF NOT EXISTS `alamat` (
  `id_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `hp` varchar(14) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `sts_alamat` enum('0','1','2') NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `nama`, `hp`, `kota_id`, `alamat`, `sts_alamat`) VALUES
(49, 26, 'mumin jun', '081999123', 272, 'jl.saja terus lagi yaaaa', '0'),
(47, 26, 'koko', '09998566', 154, 'jl.saja terus lagi yaaaa', '0'),
(46, 26, 'do jun hyun', '081999123', 1, 'jl.saja terus 1', '1'),
(82, 31, 'seo in guk', '0999998', 58, 'jl. saja', '0'),
(81, 31, 'mandi jane', '081456787998', 267, 'jl.niagara', '1'),
(83, 31, 'seo inguk', '0999998', 58, 'jl. saja', '0'),
(101, 50, 'dua pu', '081456787998', 17, 'jl. saja', '0'),
(100, 50, 'dua puluh dua', '2222222', 271, 'jl.niaga', '1'),
(98, 45, 'azifatin ni''ayah', '081456787998', 1, 'jl.niagara', '1'),
(102, 51, 'Minjun Ok', '081456787998', 197, 'jl.niagara', '0'),
(103, 51, 'dua puluh dua', '081456787998', 155, 'jl.niaga', '1'),
(104, 52, 'agustia', '0999998', 2, 'jl.niagara', '1');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(25) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl` date NOT NULL,
  `sts` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_produk`, `gambar`, `harga`, `stok`, `keterangan`, `tgl`, `sts`) VALUES
(1, '40319', 14, '40319.jpg', 48000, 12, '<p>etnic owl</p>\r\n<p>bahan spandek fit L mdl batwing</p>', '2014-01-09', '1'),
(2, '010325', 33, 'myfile.jpg', 51000, 28, '<p>Lynda blouse&nbsp; spandek, fit l kcl</p>\r\n<p>(bajunya tidak 2pc,hanya nempel)</p>', '2014-02-21', '1'),
(21, '1028', 14, '1028.jpg', 48000, 2, '<p>salur brukat spandex, fit L</p>', '2014-05-02', '1'),
(14, '012804', 13, '012804.jpg', 108000, 30, '<p>HERMES BLACK AWASH,</p>\r\n<p>sz 27-30</p>', '2014-02-14', '1'),
(17, '30402', 14, 'myfile1.jpg', 44000, 8, '<p>Houndstooth Leging</p>\r\n<p>bahan Spandex Korea fit to L</p>', '2014-02-21', '1'),
(22, '1035', 33, '1035.jpg', 55000, 4, '<p>Tshirt panda</p>\r\n<p>matt spandex</p>', '2014-05-10', '1'),
(23, '2397', 5, '2397.jpg', 120000, 10, '<p>Dafina Dress,</p>\r\n<p>Maxydress Kutung Spandex KOREA Asli dilapisi Tile</p>\r\n<p>Manset Spandex KOREA juga,</p>\r\n<p>Fit&nbsp; to L, NO Pasmina.</p>', '2014-06-05', '1'),
(24, '9081', 5, '9081.jpg', 147000, 1, '<p>Viendi Brokat Maxi, Maxydress&nbsp; Lengan panjang (Terusan)</p>\r\n<p>Bahan Spandex KOREA Combi Brokat Susun free Pasmina,</p>\r\n<p>Fit to L Besar.</p>', '2014-06-05', '1'),
(25, '2955', 5, '2955.jpg', 123000, 4, '<p>Tiara Hijabers Bahan Spandex</p>\r\n<p>Atasan Lengan Panjang + Legging+Cardi Motif+Belt,</p>\r\n<p>Fit to L</p>', '2014-06-24', '1'),
(27, '1055', 14, '1055.jpg', 93000, 0, '<p>two tone jeans vest&nbsp;</p>\r\n<p>matt jeansss, fit L</p>', '2014-07-03', '1'),
(29, '1085', 14, '1085.jpg', 76000, 9, '<p>Bahan katun rayon, warna navy</p>\r\n<p>(no inner)</p>', '2014-07-05', '1'),
(30, '1100', 14, '1100.jpg', 65000, 0, '<p>Kyoko blus, bahan twistcon,</p>\r\n<p>digital print</p>', '2014-08-01', '1'),
(31, '1086', 4, '1086.jpg', 76000, 30, '<p>1086, Victoria oneset, atasan spandex+rok twiscon</p>', '2014-08-01', '1'),
(32, '2667', 3, '2667.jpg', 61000, 0, '<p>NU-Jaket Doraemon (Hodie),</p>\r\n<p>&nbsp;Bahan Babyterry,</p>\r\n<p>Resleting, Hodie, Fit to L</p>', '2014-08-08', '1'),
(33, '1089', 4, '1089.jpg', 58000, 0, '<p>Diamond dress, atas spandex+bwh twiscon</p>', '2014-08-10', '1'),
(34, '1169', 4, '1169.jpg', 82000, 18, '<p>Red Mini Flare Dres</p>\r\n<p>bahan twiscone veronica (HighQuality) free belt,</p>\r\n<p>karet belakang, ada sleting samping</p>', '2014-08-10', '1'),
(35, '0252', 3, '0252.jpg', 72000, 81, '<p>Jaket CARBIE bahan babyterry</p>', '2014-08-24', '1'),
(36, '1230', 14, '1230.jpg', 63000, 13, '<p>1230 ungu brukat bahan rayon, fit L</p>', '2014-08-24', '1'),
(37, '1439', 33, '1439.jpg', 56000, 9, '<p>1439, Kalong owl, bahan spandex</p>', '2014-08-24', '1'),
(38, '1486', 4, '1486.jpg', 80000, 7, '<p>1486, HKDENIM, denim dobi</p>', '2014-08-24', '1'),
(39, '2245', 13, '2245.jpg', 65000, 19, '<p>2245, barbie set,</p>', '2014-08-24', '1'),
(40, '2251', 13, '2251.jpg', 64000, 20, '<p>2251 Pooh Kuping Stelan,</p>\r\n<p>Bahan Kaos, Ada Hodie Kuping, Fit to L</p>', '2014-08-24', '1'),
(41, '2257', 5, '2257.jpg', 120000, 31, '<p>2275 Alexandra Longdress, bonus @117, ecer @120</p>\r\n<p>Bahan Woolpeach Printed,</p>\r\n<p>Blkg Karet+Belt,Fit to L, Pjg 135-</p>', '2014-08-24', '1'),
(42, '2305', 13, '2305.jpg', 66000, 30, '<p>2305 Greynita Blouse, bonus @64, ecer @66</p>\r\n<p>bahan Katun Rayoon, Fit to L, NO Belt</p>', '2014-08-24', '1'),
(43, '2371', 14, '2371.jpg', 64000, 31, '<p>Tinkerbel Stelan,bonus&nbsp; Bahan Kaos, Fit to L...</p>', '2014-08-24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id_bukutamu` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `komentar` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl` datetime NOT NULL,
  `sts_bukutamu` enum('0','1','2') NOT NULL,
  PRIMARY KEY (`id_bukutamu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_bukutamu`, `nama`, `email`, `komentar`, `tgl`, `sts_bukutamu`) VALUES
(1, 'tia', 'tiavip08@gmail.com', 'saya suka taeyang', '2013-12-15 10:01:58', '1'),
(33, 'koko', 'too@gmail.com', 'kokokoko momomo', '2014-03-16 04:38:08', '0'),
(32, 'jun hyun', 'moon_yoon@yahoo.co.id', 'juminten', '2014-03-16 04:36:18', '0'),
(34, 'taeyoon choi in', 'moon_yoon@yahoo.co.id', 'hai yuuuu', '2014-03-16 04:39:29', '1'),
(36, 'joko', 'tae@ymail.com', 'tidak mau', '2014-03-16 05:57:06', '0'),
(39, 'moon yoon', 'moon_yoon@yahoo.co.id', 'iyaaau', '2014-04-24 23:29:03', '1'),
(44, 'Minjun Ok', 'jujun@yahoo.com', 'd', '2014-09-06 00:12:37', '0'),
(43, 'Minjun Ok', 'jujun@yahoo.com', 'ninjin', '2014-09-06 00:07:59', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1a4d805987a78d1a60a83f78a227c0be', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:35.0) Gecko/20100101 Firefox/35.0', 1452902854, 'a:3:{s:9:"user_data";s:0:"";s:8:"username";s:5:"admin";s:12:"is_logged_in";b:1;}'),
('4e5005bce9b8036f3ff81e18bd10407e', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:35.0) Gecko/20100101 Firefox/35.0', 1452899836, '');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE IF NOT EXISTS `diskon` (
  `id_diskon` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id_diskon`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `diskon`
--


-- --------------------------------------------------------

--
-- Table structure for table `forum_replay`
--

CREATE TABLE IF NOT EXISTS `forum_replay` (
  `id_replay` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `isi_replay` text NOT NULL,
  `tgl_replay` datetime NOT NULL,
  PRIMARY KEY (`id_replay`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `forum_replay`
--

INSERT INTO `forum_replay` (`id_replay`, `id_user`, `id_topik`, `isi_replay`, `tgl_replay`) VALUES
(2, 7, 2, 'komen coba lagi', '2014-04-11 20:27:06'),
(3, 26, 2, 'komen coba lagi ya', '2014-04-11 20:38:47'),
(4, 7, 1, 'comen', '2014-04-11 21:05:18'),
(10, 1, 5, '<p>komentarku</p>', '2014-09-05 19:05:01'),
(6, 7, 2, 'iyouu', '2014-05-04 22:46:07'),
(7, 1, 4, '<p>komen</p>', '2014-05-07 05:16:58'),
(8, 27, 4, 'balasan', '2014-05-07 05:19:26'),
(9, 31, 6, 'tak commeni sendiri', '2014-08-29 02:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topik`
--

CREATE TABLE IF NOT EXISTS `forum_topik` (
  `id_topik` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `topik` varchar(225) NOT NULL,
  `isi` text NOT NULL,
  `tgl_topik` datetime NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id_topik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `forum_topik`
--

INSERT INTO `forum_topik` (`id_topik`, `id_user`, `topik`, `isi`, `tgl_topik`, `count`) VALUES
(1, 26, 'Coba', 'ini hanya coba-coba saja', '2014-03-23 15:31:26', 1),
(2, 7, 'coba lagi', 'mencoba yang kedua', '2014-03-23 20:30:50', 5),
(4, 1, 'coba-cobaan', '<p>ini saya mau mencoba lagi ya</p>\r\n<p>sekedar mencoba saja</p>', '2014-05-06 05:29:23', 2),
(5, 1, 'cooobbaa', '<p>ini saya mencoba</p>', '2014-05-06 05:35:30', 1),
(6, 31, 'iseng aja', 'ini hanya sekedar iseng loh. okkee', '2014-08-29 02:13:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
  `id_informasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_informasi` varchar(60) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `informasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `jasa_pengiriman`
--

CREATE TABLE IF NOT EXISTS `jasa_pengiriman` (
  `jasa` int(11) NOT NULL,
  `nama_jasa` varchar(25) NOT NULL,
  PRIMARY KEY (`jasa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa_pengiriman`
--

INSERT INTO `jasa_pengiriman` (`jasa`, `nama_jasa`) VALUES
(2, 'JNE'),
(3, 'Pandu Logistic'),
(0, '-'),
(1, 'POS');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `komentar` text,
  `tgl_komentar` datetime NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_user`, `id_barang`, `komentar`, `tgl_komentar`) VALUES
(44, 51, 35, 'yeei aku kommnet lagi', '2014-09-06 00:09:29'),
(43, 51, 35, 'komen lagi ah', '2014-09-06 00:09:18'),
(42, 51, 35, 'hahaha', '2014-09-06 00:09:08'),
(37, 26, 2, 'jjjj', '2014-05-09 14:40:24'),
(38, 26, 2, 'lolololop', '2014-05-09 14:40:35'),
(39, 40, 36, 'unyuu', '2014-08-26 00:43:10'),
(40, 31, 23, 'bagus...', '2014-08-29 09:06:15'),
(41, 45, 23, 'pinky,.. saya numpang komment', '2014-08-29 09:09:02'),
(29, 27, 14, 'komentar', '2014-05-07 05:53:39'),
(27, 7, 2, 'mau ya???', '2014-03-07 04:53:36'),
(28, 7, 1, 'mau', '2014-04-24 23:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `norek`
--

CREATE TABLE IF NOT EXISTS `norek` (
  `id_norek` int(11) NOT NULL AUTO_INCREMENT,
  `norekning` varchar(50) NOT NULL,
  `namarekning` varchar(100) NOT NULL,
  `bankrekning` varchar(25) NOT NULL,
  `sts` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_norek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `norek`
--

INSERT INTO `norek` (`id_norek`, `norekning`, `namarekning`, `bankrekning`, `sts`) VALUES
(1, '8240050499', 'Sri Suwarsi', 'BCA', '1'),
(2, '0177837774', 'Eko Oktiningrum S', 'BNI', '1'),
(3, '824 0050499', 'Sri Suwarsi', 'BCA', '0'),
(4, '8240050499', 'Sri Suwarsi', 'BNI', '0'),
(5, '8240050499', 'Sri Suwarsi', 'BNI', '0'),
(6, '8240050499', 'Eko Oktiningrum S', 'BCA', '0'),
(7, '0411-01-003042-53-5', 'Sri Suwarsi', 'BRI', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` varchar(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  `tgl_pesanan` datetime NOT NULL,
  `tgl_konfirm` datetime NOT NULL,
  `gambar` varchar(60) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_transfer` date NOT NULL,
  `catatan` text NOT NULL,
  `no_resi` varchar(25) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `jasa` int(11) NOT NULL,
  `sts` enum('0','1','2') NOT NULL,
  `id_alamat` int(11) NOT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `total_pesanan`, `tgl_pesanan`, `tgl_konfirm`, `gambar`, `nominal`, `tgl_transfer`, `catatan`, `no_resi`, `tgl_kirim`, `jasa`, `sts`, `id_alamat`) VALUES
('060914000445', 51, 65000, '2014-09-06 00:04:45', '2014-09-06 07:11:15', '060914000445.png', 491000, '2014-08-01', '', '9090', '2014-09-02', 2, '1', 103),
('310814193903', 45, 141000, '2014-08-31 19:39:03', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 98),
('300814232151', 31, 140000, '2014-08-30 23:21:51', '2014-09-01 01:14:26', '300814232151.jpg', 491000, '2014-09-02', '', '', '0000-00-00', 0, '0', 81),
('300814231756', 31, 135000, '2014-08-30 23:17:56', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 81),
('300814232011', 31, 200000, '2014-08-30 23:20:11', '2014-09-05 18:22:57', '300814232011.png', 491000, '2014-09-01', '', '', '0000-00-00', 0, '0', 81),
('300814143051', 26, 119000, '2014-08-30 14:30:51', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 49),
('060914000336', 51, 128000, '2014-09-06 00:03:36', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 102),
('310814205720', 50, 64000, '2014-08-31 20:57:20', '2014-09-06 17:25:31', '310814205720.png', 64000, '2014-09-05', '', '', '0000-00-00', 0, '0', 100),
('310814200628', 50, 80000, '2013-08-30 20:06:28', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 101),
('310814194510', 50, 129000, '2014-08-31 19:45:10', '2014-08-31 23:43:42', '310814194510.png', 387000, '2014-08-01', '', '909090', '2014-09-01', 2, '1', 100),
('060914000649', 51, 63000, '2014-09-06 00:06:49', '2014-09-06 00:07:11', '060914000649.png', 491000, '2014-08-25', '', '', '0000-00-00', 0, '0', 0),
('060914172238', 52, 103000, '2014-09-06 17:22:38', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 104),
('160116054857', 50, 72000, '2016-01-16 05:48:57', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 100);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_det`
--

CREATE TABLE IF NOT EXISTS `pesanan_det` (
  `id_pesanan` varchar(12) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_det`
--

INSERT INTO `pesanan_det` (`id_pesanan`, `id_barang`, `qty`) VALUES
('160116054857', 35, 1),
('060914172238', 38, 1),
('060914000649', 36, 1),
('060914000445', 39, 1),
('060914000336', 39, 1),
('060914000336', 36, 1),
('310814205720', 40, 1),
('310814200628', 38, 1),
('310814194510', 40, 1),
('310814194510', 39, 1),
('310814193903', 39, 1),
('310814193237', 38, 1),
('310814193237', 34, 1),
('310814015750', 36, 1),
('310814015750', 35, 1),
('310814011006', 35, 1),
('300814232151', 34, 1),
('300814232151', 33, 1),
('300814232011', 40, 1),
('300814232011', 38, 1),
('300814232011', 37, 1),
('300814231756', 35, 1),
('300814143051', 37, 1),
('310814193903', 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `polling_jawaban`
--

CREATE TABLE IF NOT EXISTS `polling_jawaban` (
  `nomor` int(11) NOT NULL AUTO_INCREMENT,
  `idtanya` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `polling_jawaban`
--

INSERT INTO `polling_jawaban` (`nomor`, `idtanya`, `jawaban`, `jumlah`) VALUES
(51, 49, 'Jelek', 34),
(50, 49, 'Sedang', 22),
(49, 49, 'Bagus', 12),
(48, 47, 'jawab coba 1', 44),
(46, 47, 'jawab coba 2', 33),
(47, 47, 'jawab coba 3', 22);

-- --------------------------------------------------------

--
-- Table structure for table `polling_pertanyaan`
--

CREATE TABLE IF NOT EXISTS `polling_pertanyaan` (
  `idtanya` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`idtanya`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `polling_pertanyaan`
--

INSERT INTO `polling_pertanyaan` (`idtanya`, `pertanyaan`, `tanggal`) VALUES
(49, '<p>Bagaimana pendapat anda website ini?</p>', '2014-08-16'),
(47, '<p>polling coba 2</p>', '2014-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `polling_vote`
--

CREATE TABLE IF NOT EXISTS `polling_vote` (
  `nomor` int(11) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polling_vote`
--

INSERT INTO `polling_vote` (`nomor`, `ip`, `tgl`) VALUES
(51, '::1', '2016-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(30) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`) VALUES
(3, 'Jaket'),
(4, 'Mini Dress'),
(5, 'Long Dress'),
(14, 'Blouse'),
(12, 'Kemeja'),
(13, 'Celana'),
(15, 'Rok'),
(33, 'Kaos');

-- --------------------------------------------------------

--
-- Table structure for table `propinsi`
--

CREATE TABLE IF NOT EXISTS `propinsi` (
  `propinsi_id` int(4) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  PRIMARY KEY (`propinsi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propinsi`
--

INSERT INTO `propinsi` (`propinsi_id`, `propinsi`) VALUES
(1, 'Aceh'),
(2, 'Sumatera Utara'),
(3, 'Bengkulu'),
(4, 'Jambi'),
(5, 'Riau'),
(6, 'Sumatera Barat'),
(7, 'Sumatera Selatan'),
(8, 'Lampung'),
(9, 'Kepulauan Bangka Belitung'),
(10, 'Kepulauan Riau'),
(11, 'Banten'),
(12, 'Jawa Barat'),
(13, 'DKI Jakarta'),
(14, 'Jawa Tengah'),
(15, 'Jawa Timur'),
(16, 'Daerah Istimewa Yogyakarta'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Selatan'),
(22, 'Kalimantan Tengah'),
(23, 'Kalimantan Timur'),
(24, 'Gorontalo'),
(25, 'Sulawesi Selatan'),
(26, 'Sulawesi Tenggara'),
(27, 'Sulawesi Tengah'),
(28, 'Sulawesi Utara'),
(29, 'Sulawesi Barat'),
(30, 'Maluku'),
(31, 'Maluku Utara'),
(32, 'Papua'),
(33, 'Papua Barat');

-- --------------------------------------------------------

--
-- Table structure for table `propinsi_kota`
--

CREATE TABLE IF NOT EXISTS `propinsi_kota` (
  `kota_id` int(11) NOT NULL AUTO_INCREMENT,
  `kota_kabupaten` varchar(100) NOT NULL,
  `propinsi_id` int(4) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`kota_id`),
  KEY `kota_id` (`propinsi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=499 ;

--
-- Dumping data for table `propinsi_kota`
--

INSERT INTO `propinsi_kota` (`kota_id`, `kota_kabupaten`, `propinsi_id`, `tarif`) VALUES
(1, 'Kabupaten Aceh Barat', 1, 20000),
(2, 'Kabupaten Aceh Barat Daya', 1, 23000),
(3, 'Kabupaten Aceh Besar', 1, 0),
(4, 'Kabupaten Aceh Jaya', 1, 0),
(5, 'Kabupaten Aceh Selatan', 1, 0),
(6, 'Kabupaten Aceh Singkil', 1, 0),
(7, 'Kabupaten Aceh Tamiang', 1, 120000),
(8, 'Kabupaten Aceh Tengah', 1, 0),
(9, 'Kabupaten Aceh Tenggara', 1, 0),
(10, 'Kabupaten Aceh Timur', 1, 0),
(11, 'Kabupaten Aceh Utara', 1, 0),
(12, 'Kabupaten Bener Meriah', 1, 0),
(13, 'Kabupaten Bireuen', 1, 0),
(14, 'Kabupaten Gayo Lues', 1, 90000),
(15, 'Kabupaten Nagan Raya', 1, 90000),
(16, 'Kabupaten Pidie', 1, 0),
(17, 'Kabupaten Pidie Jaya', 1, 0),
(18, 'Kabupaten Simeulue', 1, 0),
(19, 'Kota Banda Aceh', 1, 0),
(20, 'Kota Langsa', 1, 0),
(21, 'Kota Lhokseumawe', 1, 0),
(22, 'Kota Sabang', 1, 0),
(23, 'Kota Subulussalam', 1, 0),
(24, 'Kabupaten Asahan', 2, 0),
(25, 'Kabupaten Batu Bara', 2, 0),
(26, 'Kabupaten Dairi', 2, 0),
(27, 'Kabupaten Deli Serdang', 2, 0),
(28, 'Kabupaten Humbang Hasundutan', 2, 0),
(29, 'Kabupaten Karo', 2, 0),
(30, 'Kabupaten Labuhanbatu', 2, 0),
(31, 'Kabupaten Labuhanbatu Selatan', 2, 0),
(32, 'Kabupaten Labuhanbatu Utara', 2, 0),
(33, 'Kabupaten Langkat', 2, 0),
(34, 'Kabupaten Mandailing Natal', 2, 0),
(35, 'Kabupaten Nias', 2, 0),
(36, 'Kabupaten Nias Barat', 2, 0),
(37, 'Kabupaten Nias Selatan', 2, 0),
(38, 'Kabupaten Nias Utara', 2, 0),
(39, 'Kabupaten Padang Lawas', 2, 0),
(40, 'Kabupaten Padang Lawas Utara', 2, 0),
(41, 'Kabupaten Pakpak Bharat', 2, 0),
(42, 'Kabupaten Samosir', 2, 0),
(43, 'Kabupaten Serdang Bedagai', 2, 0),
(44, 'Kabupaten Simalungun', 2, 0),
(45, 'Kabupaten Tapanuli Selatan', 2, 0),
(46, 'Kabupaten Tapanuli Tengah', 2, 0),
(47, 'Kabupaten Tapanuli Utara', 2, 0),
(48, 'Kabupaten Toba Samosir', 2, 0),
(49, 'Kota Binjai', 2, 0),
(50, 'Kota Gunung Sitoli', 2, 0),
(51, 'Kota Medan', 2, 0),
(52, 'Kota Padang Sidempuan', 2, 0),
(53, 'Kota Pematangsiantar', 2, 0),
(54, 'Kota Sibolga', 2, 0),
(55, 'Kota Tanjung Balai', 2, 0),
(56, 'Kota Tebing Tinggi', 2, 0),
(57, 'Kabupaten Bengkulu Selatan', 3, 0),
(58, 'Kabupaten Bengkulu Tengah', 3, 0),
(59, 'Kabupaten Bengkulu Utara', 3, 0),
(60, 'Kabupaten Benteng', 3, 0),
(61, 'Kabupaten Kaur', 3, 0),
(62, 'Kabupaten Kepahiang', 3, 0),
(63, 'Kabupaten Lebong', 3, 0),
(64, 'Kabupaten Mukomuko', 3, 0),
(65, 'Kabupaten Rejang Lebong', 3, 0),
(66, 'Kabupaten Seluma', 3, 0),
(67, 'Kota Bengkulu', 3, 0),
(68, 'Kabupaten Batang Hari', 4, 0),
(69, 'Kabupaten Bungo', 4, 0),
(70, 'Kabupaten Kerinci', 4, 0),
(71, 'Kabupaten Merangin', 4, 0),
(72, 'Kabupaten Muaro Jambi', 4, 0),
(73, 'Kabupaten Sarolangun', 4, 0),
(74, 'Kabupaten Tanjung Jabung Barat', 4, 0),
(75, 'Kabupaten Tanjung Jabung Timur', 4, 0),
(76, 'Kabupaten Tebo', 4, 0),
(77, 'Kota Jambi', 4, 0),
(78, 'Kota Sungai Penuh', 4, 0),
(79, 'Kabupaten Bengkalis', 5, 0),
(80, 'Kabupaten Indragiri Hilir', 5, 0),
(81, 'Kabupaten Indragiri Hulu', 5, 0),
(82, 'Kabupaten Kampar', 5, 0),
(83, 'Kabupaten Kuantan Singingi', 5, 0),
(84, 'Kabupaten Pelalawan', 5, 0),
(85, 'Kabupaten Rokan Hilir', 5, 0),
(86, 'Kabupaten Rokan Hulu', 5, 0),
(87, 'Kabupaten Siak', 5, 0),
(88, 'Kota Pekanbaru', 5, 0),
(89, 'Kota Dumai', 5, 0),
(90, 'Kabupaten Kepulauan Meranti', 5, 0),
(91, 'Kabupaten Agam', 6, 0),
(92, 'Kabupaten Dharmasraya', 6, 0),
(93, 'Kabupaten Kepulauan Mentawai', 6, 0),
(94, 'Kabupaten Lima Puluh Kota', 6, 0),
(95, 'Kabupaten Padang Pariaman', 6, 0),
(96, 'Kabupaten Pasaman', 6, 0),
(97, 'Kabupaten Pasaman Barat', 6, 0),
(98, 'Kabupaten Pesisir Selatan', 6, 0),
(99, 'Kabupaten Sijunjung', 6, 0),
(100, 'Kabupaten Solok', 6, 0),
(101, 'Kabupaten Solok Selatan', 6, 0),
(102, 'Kabupaten Tanah Datar', 6, 0),
(103, 'Kota Bukittinggi', 6, 0),
(104, 'Kota Padang', 6, 0),
(105, 'Kota Padangpanjang', 6, 0),
(106, 'Kota Pariaman', 6, 0),
(107, 'Kota Payakumbuh', 6, 0),
(108, 'Kota Sawahlunto', 6, 0),
(109, 'Kota Solok', 6, 0),
(110, 'Kabupaten Banyuasin', 7, 0),
(111, 'Kabupaten Empat Lawang', 7, 0),
(112, 'Kabupaten Lahat', 7, 0),
(113, 'Kabupaten Muara Enim', 7, 0),
(114, 'Kabupaten Musi Banyuasin', 7, 0),
(115, 'Kabupaten Musi Rawas', 7, 0),
(116, 'Kabupaten Ogan Ilir', 7, 0),
(117, 'Kabupaten Ogan Komering Ilir', 7, 0),
(118, 'Kabupaten Ogan Komering Ulu', 7, 0),
(119, 'Kabupaten Ogan Komering Ulu Selatan', 7, 0),
(120, 'Kabupaten Ogan Komering Ulu Timur', 7, 0),
(121, 'Kota Lubuklinggau', 7, 0),
(122, 'Kota Pagar Alam', 7, 0),
(123, 'Kota Palembang', 7, 0),
(124, 'Kota Prabumulih', 7, 0),
(125, 'Kabupaten Lampung Barat', 8, 0),
(126, 'Kabupaten Lampung Selatan', 8, 0),
(127, 'Kabupaten Lampung Tengah', 8, 0),
(128, 'Kabupaten Lampung Timur', 8, 0),
(129, 'Kabupaten Lampung Utara', 8, 0),
(130, 'Kabupaten Mesuji', 8, 0),
(131, 'Kabupaten Pesawaran', 8, 0),
(132, 'Kabupaten Pringsewu', 8, 0),
(133, 'Kabupaten Tanggamus', 8, 0),
(134, 'Kabupaten Tulang Bawang', 8, 0),
(135, 'Kabupaten Tulang Bawang Barat', 8, 0),
(136, 'Kabupaten Way Kanan', 8, 0),
(137, 'Kota Bandar Lampung', 8, 0),
(138, 'Kota Metro', 8, 0),
(139, 'Kabupaten Bangka', 9, 0),
(140, 'Kabupaten Bangka Barat', 9, 0),
(141, 'Kabupaten Bangka Selatan', 9, 0),
(142, 'Kabupaten Bangka Tengah', 9, 0),
(143, 'Kabupaten Belitung', 9, 0),
(144, 'Kabupaten Belitung Timur', 9, 0),
(145, 'Kota Pangkal Pinang', 9, 0),
(146, 'Kabupaten Bintan', 10, 0),
(147, 'Kabupaten Karimun', 10, 0),
(148, 'Kabupaten Kepulauan Anambas', 10, 0),
(149, 'Kabupaten Lingga', 10, 0),
(150, 'Kabupaten Natuna', 10, 0),
(151, 'Kota Batam', 10, 0),
(152, 'Kota Tanjung Pinang', 10, 0),
(153, 'Kabupaten Lebak', 11, 0),
(154, 'Kabupaten Pandeglang', 11, 0),
(155, 'Kabupaten Serang', 11, 0),
(156, 'Kabupaten Tangerang', 11, 0),
(157, 'Kota Cilegon', 11, 0),
(158, 'Kota Serang', 11, 0),
(159, 'Kota Tangerang', 11, 0),
(160, 'Kota Tangerang Selatan', 11, 0),
(161, 'Kabupaten Bandung', 12, 0),
(162, 'Kabupaten Bandung Barat', 12, 0),
(163, 'Kabupaten Bekasi', 12, 0),
(164, 'Kabupaten Bogor', 12, 0),
(165, 'Kabupaten Ciamis', 12, 0),
(166, 'Kabupaten Cianjur', 12, 0),
(167, 'Kabupaten Cirebon', 12, 0),
(168, 'Kabupaten Garut', 12, 0),
(169, 'Kabupaten Indramayu', 12, 0),
(170, 'Kabupaten Karawang', 12, 0),
(171, 'Kabupaten Kuningan', 12, 0),
(172, 'Kabupaten Majalengka', 12, 0),
(173, 'Kabupaten Purwakarta', 12, 0),
(174, 'Kabupaten Subang', 12, 0),
(175, 'Kabupaten Sukabumi', 12, 0),
(176, 'Kabupaten Sumedang', 12, 0),
(177, 'Kabupaten Tasikmalaya', 12, 0),
(178, 'Kota Bandung', 12, 0),
(179, 'Kota Banjar', 12, 0),
(180, 'Kota Bekasi', 12, 0),
(181, 'Kota Bogor', 12, 0),
(182, 'Kota Cimahi', 12, 0),
(183, 'Kota Cirebon', 12, 0),
(184, 'Kota Depok', 12, 0),
(185, 'Kota Sukabumi', 12, 0),
(186, 'Kota Tasikmalaya', 12, 0),
(187, 'Kabupaten Administrasi Kepulauan Seribu', 13, 0),
(188, 'Kota Administrasi Jakarta Barat', 13, 0),
(189, 'Kota Administrasi Jakarta Pusat', 13, 0),
(190, 'Kota Administrasi Jakarta Selatan', 13, 0),
(191, 'Kota Administrasi Jakarta Timur', 13, 0),
(192, 'Kota Administrasi Jakarta Utara', 13, 0),
(193, 'Kabupaten Banjarnegara', 14, 0),
(194, 'Kabupaten Banyumas', 14, 0),
(195, 'Kabupaten Batang', 14, 0),
(196, 'Kabupaten Blora', 14, 0),
(197, 'Kabupaten Boyolali', 14, 0),
(198, 'Kabupaten Brebes', 14, 0),
(199, 'Kabupaten Cilacap', 14, 0),
(200, 'Kabupaten Demak', 14, 0),
(201, 'Kabupaten Grobogan', 14, 0),
(202, 'Kabupaten Jepara', 14, 0),
(203, 'Kabupaten Karanganyar', 14, 0),
(204, 'Kabupaten Kebumen', 14, 0),
(205, 'Kabupaten Kendal', 14, 0),
(206, 'Kabupaten Klaten', 14, 0),
(207, 'Kabupaten Kudus', 14, 0),
(208, 'Kabupaten Magelang', 14, 0),
(209, 'Kabupaten Pati', 14, 0),
(210, 'Kabupaten Pekalongan', 14, 0),
(211, 'Kabupaten Pemalang', 14, 0),
(212, 'Kabupaten Purbalingga', 14, 0),
(213, 'Kabupaten Purworejo', 14, 0),
(214, 'Kabupaten Rembang', 14, 0),
(215, 'Kabupaten Semarang', 14, 0),
(216, 'Kabupaten Sragen', 14, 0),
(217, 'Kabupaten Sukoharjo', 14, 0),
(218, 'Kabupaten Tegal', 14, 0),
(219, 'Kabupaten Temanggung', 14, 0),
(220, 'Kabupaten Wonogiri', 14, 0),
(221, 'Kabupaten Wonosobo', 14, 0),
(222, 'Kota Magelang', 14, 0),
(223, 'Kota Pekalongan', 14, 0),
(224, 'Kota Salatiga', 14, 0),
(225, 'Kota Semarang', 14, 0),
(226, 'Kota Surakarta', 14, 0),
(227, 'Kota Tegal', 14, 0),
(228, 'Kabupaten Bangkalan', 15, 0),
(229, 'Kabupaten Banyuwangi', 15, 0),
(230, 'Kabupaten Blitar', 15, 0),
(231, 'Kabupaten Bojonegoro', 15, 0),
(232, 'Kabupaten Bondowoso', 15, 0),
(233, 'Kabupaten Gresik', 15, 0),
(234, 'Kabupaten Jember', 15, 0),
(235, 'Kabupaten Jombang', 15, 0),
(236, 'Kabupaten Kediri', 15, 0),
(237, 'Kabupaten Lamongan', 15, 0),
(238, 'Kabupaten Lumajang', 15, 0),
(239, 'Kabupaten Madiun', 15, 0),
(240, 'Kabupaten Magetan', 15, 0),
(241, 'Kabupaten Malang', 15, 0),
(242, 'Kabupaten Mojokerto', 15, 0),
(243, 'Kabupaten Nganjuk', 15, 0),
(244, 'Kabupaten Ngawi', 15, 0),
(245, 'Kabupaten Pacitan', 15, 0),
(246, 'Kabupaten Pamekasan', 15, 0),
(247, 'Kabupaten Pasuruan', 15, 0),
(248, 'Kabupaten Ponorogo', 15, 0),
(249, 'Kabupaten Probolinggo', 15, 0),
(250, 'Kabupaten Sampang', 15, 0),
(251, 'Kabupaten Sidoarjo', 15, 0),
(252, 'Kabupaten Situbondo', 15, 0),
(253, 'Kabupaten Sumenep', 15, 0),
(254, 'Kabupaten Trenggalek', 15, 0),
(255, 'Kabupaten Tuban', 15, 10000),
(256, 'Kabupaten Tulungagung', 15, 0),
(257, 'Kota Batu', 15, 0),
(258, 'Kota Blitar', 15, 0),
(259, 'Kota Kediri', 15, 0),
(260, 'Kota Madiun', 15, 0),
(261, 'Kota Malang', 15, 0),
(262, 'Kota Mojokerto', 15, 0),
(263, 'Kota Pasuruan', 15, 0),
(264, 'Kota Probolinggo', 15, 0),
(265, 'Kota Surabaya', 15, 12000),
(266, 'Kabupaten Bantul', 16, 0),
(267, 'Kabupaten Gunung Kidul', 16, 0),
(268, 'Kabupaten Kulon Progo', 16, 0),
(269, 'Kabupaten Sleman', 16, 0),
(270, 'Kota Yogyakarta', 16, 0),
(271, 'Kabupaten Badung', 17, 0),
(272, 'Kabupaten Bangli', 17, 0),
(273, 'Kabupaten Buleleng', 17, 0),
(274, 'Kabupaten Gianyar', 17, 0),
(275, 'Kabupaten Jembrana', 17, 0),
(276, 'Kabupaten Karangasem', 17, 0),
(277, 'Kabupaten Klungkung', 17, 0),
(278, 'Kabupaten Tabanan', 17, 0),
(279, 'Kota Denpasar', 17, 0),
(280, 'Kabupaten Bima', 18, 0),
(281, 'Kabupaten Dompu', 18, 0),
(282, 'Kabupaten Lombok Barat', 18, 0),
(283, 'Kabupaten Lombok Tengah', 18, 0),
(284, 'Kabupaten Lombok Timur', 18, 0),
(285, 'Kabupaten Lombok Utara', 18, 0),
(286, 'Kabupaten Sumbawa', 18, 0),
(287, 'Kabupaten Sumbawa Barat', 18, 0),
(288, 'Kota Bima', 18, 0),
(289, 'Kota Mataram', 18, 0),
(290, 'Kabupaten Kupang', 19, 0),
(291, 'Kabupaten Timor Tengah Selatan', 19, 0),
(292, 'Kabupaten Timor Tengah Utara', 19, 0),
(293, 'Kabupaten Belu', 19, 0),
(294, 'Kabupaten Alor', 19, 0),
(295, 'Kabupaten Flores Timur', 19, 0),
(296, 'Kabupaten Sikka', 19, 0),
(297, 'Kabupaten Ende', 19, 0),
(298, 'Kabupaten Ngada', 19, 0),
(299, 'Kabupaten Manggarai', 19, 0),
(300, 'Kabupaten Sumba Timur', 19, 0),
(301, 'Kabupaten Sumba Barat', 19, 0),
(302, 'Kabupaten Lembata', 19, 0),
(303, 'Kabupaten Rote Ndao', 19, 0),
(304, 'Kabupaten Manggarai Barat', 19, 0),
(305, 'Kabupaten Nagekeo', 19, 0),
(306, 'Kabupaten Sumba Tengah', 19, 0),
(307, 'Kabupaten Sumba Barat Daya', 19, 0),
(308, 'Kabupaten Manggarai Timur', 19, 0),
(309, 'Kabupaten Sabu Raijua', 19, 0),
(310, 'Kota Kupang', 19, 0),
(311, 'Kabupaten Bengkayang', 20, 0),
(312, 'Kabupaten Kapuas Hulu', 20, 0),
(313, 'Kabupaten Kayong Utara', 20, 0),
(314, 'Kabupaten Ketapang', 20, 0),
(315, 'Kabupaten Kubu Raya', 20, 0),
(316, 'Kabupaten Landak', 20, 0),
(317, 'Kabupaten Melawi', 20, 0),
(318, 'Kabupaten Pontianak', 20, 0),
(319, 'Kabupaten Sambas', 20, 0),
(320, 'Kabupaten Sanggau', 20, 0),
(321, 'Kabupaten Sekadau', 20, 0),
(322, 'Kabupaten Sintang', 20, 0),
(323, 'Kota Pontianak', 20, 0),
(324, 'Kota Singkawang', 20, 0),
(325, 'Kabupaten Balangan', 21, 0),
(326, 'Kabupaten Banjar', 21, 0),
(327, 'Kabupaten Barito Kuala', 21, 0),
(328, 'Kabupaten Hulu Sungai Selatan', 21, 0),
(329, 'Kabupaten Hulu Sungai Tengah', 21, 0),
(330, 'Kabupaten Hulu Sungai Utara', 21, 0),
(331, 'Kabupaten Kotabaru', 21, 0),
(332, 'Kabupaten Tabalong', 21, 0),
(333, 'Kabupaten Tanah Bumbu', 21, 0),
(334, 'Kabupaten Tanah Laut', 21, 0),
(335, 'Kabupaten Tapin', 21, 0),
(336, 'Kota Banjarbaru', 21, 0),
(337, 'Kota Banjarmasin', 21, 0),
(338, 'Kabupaten Barito Selatan', 22, 0),
(339, 'Kabupaten Barito Timur', 22, 0),
(340, 'Kabupaten Barito Utara', 22, 0),
(341, 'Kabupaten Gunung Mas', 22, 0),
(342, 'Kabupaten Kapuas', 22, 0),
(343, 'Kabupaten Katingan', 22, 0),
(344, 'Kabupaten Kotawaringin Barat', 22, 0),
(345, 'Kabupaten Kotawaringin Timur', 22, 0),
(346, 'Kabupaten Lamandau', 22, 0),
(347, 'Kabupaten Murung Raya', 22, 0),
(348, 'Kabupaten Pulang Pisau', 22, 0),
(349, 'Kabupaten Sukamara', 22, 0),
(350, 'Kabupaten Seruyan', 22, 0),
(351, 'Kota Palangka Raya', 22, 0),
(352, 'Kabupaten Berau', 23, 0),
(353, 'Kabupaten Bulungan', 23, 0),
(354, 'Kabupaten Kutai Barat', 23, 0),
(355, 'Kabupaten Kutai Kartanegara', 23, 0),
(356, 'Kabupaten Kutai Timur', 23, 0),
(357, 'Kabupaten Malinau', 23, 0),
(358, 'Kabupaten Nunukan', 23, 0),
(359, 'Kabupaten Paser', 23, 0),
(360, 'Kabupaten Penajam Paser Utara', 23, 0),
(361, 'Kabupaten Tana Tidung', 23, 0),
(362, 'Kota Balikpapan', 23, 0),
(363, 'Kota Bontang', 23, 0),
(364, 'Kota Samarinda', 23, 0),
(365, 'Kota Tarakan', 23, 0),
(366, 'Kabupaten Boalemo', 24, 0),
(367, 'Kabupaten Bone Bolango', 24, 0),
(368, 'Kabupaten Gorontalo', 24, 0),
(369, 'Kabupaten Gorontalo Utara', 24, 0),
(370, 'Kabupaten Pohuwato', 24, 0),
(371, 'Kota Gorontalo', 24, 0),
(372, 'Kabupaten Bantaeng', 25, 0),
(373, 'Kabupaten Barru', 25, 0),
(374, 'Kabupaten Bone', 25, 0),
(375, 'Kabupaten Bulukumba', 25, 0),
(376, 'Kabupaten Enrekang', 25, 0),
(377, 'Kabupaten Gowa', 25, 0),
(378, 'Kabupaten Jeneponto', 25, 0),
(379, 'Kabupaten Kepulauan Selayar', 25, 0),
(380, 'Kabupaten Luwu', 25, 0),
(381, 'Kabupaten Luwu Timur', 25, 0),
(382, 'Kabupaten Luwu Utara', 25, 0),
(383, 'Kabupaten Maros', 25, 0),
(384, 'Kabupaten Pangkajene dan Kepulauan', 25, 0),
(385, 'Kabupaten Pinrang', 25, 0),
(386, 'Kabupaten Sidenreng Rappang', 25, 0),
(387, 'Kabupaten Sinjai', 25, 0),
(388, 'Kabupaten Soppeng', 25, 0),
(389, 'Kabupaten Takalar', 25, 0),
(390, 'Kabupaten Tana Toraja', 25, 0),
(391, 'Kabupaten Toraja Utara', 25, 0),
(392, 'Kabupaten Wajo', 25, 0),
(393, 'Kota Makassar', 25, 0),
(394, 'Kota Palopo', 25, 0),
(395, 'Kota Parepare', 25, 0),
(396, 'Kabupaten Bombana', 26, 0),
(397, 'Kabupaten Buton', 26, 0),
(398, 'Kabupaten Buton Utara', 26, 0),
(399, 'Kabupaten Kolaka', 26, 0),
(400, 'Kabupaten Kolaka Utara', 26, 0),
(401, 'Kabupaten Konawe', 26, 0),
(402, 'Kabupaten Konawe Selatan', 26, 0),
(403, 'Kabupaten Konawe Utara', 26, 0),
(404, 'Kabupaten Muna', 26, 0),
(405, 'Kabupaten Wakatobi', 26, 0),
(406, 'Kota Bau-Bau', 26, 0),
(407, 'Kota Kendari', 26, 0),
(408, 'Kabupaten Banggai', 27, 0),
(409, 'Kabupaten Banggai Kepulauan', 27, 0),
(410, 'Kabupaten Buol', 27, 0),
(411, 'Kabupaten Donggala', 27, 0),
(412, 'Kabupaten Morowali', 27, 0),
(413, 'Kabupaten Parigi Moutong', 27, 0),
(414, 'Kabupaten Poso', 27, 0),
(415, 'Kabupaten Tojo Una-Una', 27, 0),
(416, 'Kabupaten Toli-Toli', 27, 0),
(417, 'Kabupaten Sigi', 27, 0),
(418, 'Kota Palu', 27, 0),
(419, 'Kabupaten Bolaang Mongondow', 28, 0),
(420, 'Kabupaten Bolaang Mongondow Selatan', 28, 0),
(421, 'Kabupaten Bolaang Mongondow Timur', 28, 0),
(422, 'Kabupaten Bolaang Mongondow Utara', 28, 0),
(423, 'Kabupaten Kepulauan Sangihe', 28, 0),
(424, 'Kabupaten Kepulauan Siau Tagulandang Biaro', 28, 0),
(425, 'Kabupaten Kepulauan Talaud', 28, 0),
(426, 'Kabupaten Minahasa', 28, 0),
(427, 'Kabupaten Minahasa Selatan', 28, 0),
(428, 'Kabupaten Minahasa Tenggara', 28, 0),
(429, 'Kabupaten Minahasa Utara', 28, 0),
(430, 'Kota Bitung', 28, 0),
(431, 'Kota Kotamobagu', 28, 0),
(432, 'Kota Manado', 28, 0),
(433, 'Kota Tomohon', 28, 0),
(434, 'Kabupaten Majene', 29, 0),
(435, 'Kabupaten Mamasa', 29, 0),
(436, 'Kabupaten Mamuju', 29, 0),
(437, 'Kabupaten Mamuju Utara', 29, 0),
(438, 'Kabupaten Polewali Mandar', 29, 0),
(439, 'Kabupaten Buru', 30, 0),
(440, 'Kabupaten Buru Selatan', 30, 0),
(441, 'Kabupaten Kepulauan Aru', 30, 0),
(442, 'Kabupaten Maluku Barat Daya', 30, 0),
(443, 'Kabupaten Maluku Tengah', 30, 0),
(444, 'Kabupaten Maluku Tenggara', 30, 0),
(445, 'Kabupaten Maluku Tenggara Barat', 30, 0),
(446, 'Kabupaten Seram Bagian Barat', 30, 0),
(447, 'Kabupaten Seram Bagian Timur', 30, 0),
(448, 'Kota Ambon', 30, 0),
(449, 'Kota Tual', 30, 0),
(450, 'Kabupaten Halmahera Barat', 31, 0),
(451, 'Kabupaten Halmahera Tengah', 31, 0),
(452, 'Kabupaten Halmahera Utara', 31, 0),
(453, 'Kabupaten Halmahera Selatan', 31, 0),
(454, 'Kabupaten Kepulauan Sula', 31, 0),
(455, 'Kabupaten Halmahera Timur', 31, 0),
(456, 'Kabupaten Pulau Morotai', 31, 0),
(457, 'Kota Ternate', 31, 0),
(458, 'Kota Tidore Kepulauan', 31, 0),
(459, 'Kabupaten Asmat', 32, 0),
(460, 'Kabupaten Biak Numfor', 32, 0),
(461, 'Kabupaten Boven Digoel', 32, 0),
(462, 'Kabupaten Deiyai', 32, 0),
(463, 'Kabupaten Dogiyai', 32, 0),
(464, 'Kabupaten Intan Jaya', 32, 0),
(465, 'Kabupaten Jayapura', 32, 0),
(466, 'Kabupaten Jayawijaya', 32, 0),
(467, 'Kabupaten Keerom', 32, 0),
(468, 'Kabupaten Kepulauan Yapen', 32, 0),
(469, 'Kabupaten Lanny Jaya', 32, 0),
(470, 'Kabupaten Mamberamo Raya', 32, 0),
(471, 'Kabupaten Mamberamo Tengah', 32, 0),
(472, 'Kabupaten Mappi', 32, 0),
(473, 'Kabupaten Merauke', 32, 0),
(474, 'Kabupaten Mimika', 32, 0),
(475, 'Kabupaten Nabire', 32, 0),
(476, 'Kabupaten Nduga', 32, 0),
(477, 'Kabupaten Paniai', 32, 0),
(478, 'Kabupaten Pegunungan Bintang', 32, 0),
(479, 'Kabupaten Puncak', 32, 0),
(480, 'Kabupaten Puncak Jaya', 32, 0),
(481, 'Kabupaten Sarmi', 32, 0),
(482, 'Kabupaten Supiori', 32, 0),
(483, 'Kabupaten Tolikara', 32, 0),
(484, 'Kabupaten Waropen', 32, 0),
(485, 'Kabupaten Yahukimo', 32, 0),
(486, 'Kabupaten Yalimo', 32, 0),
(487, 'Kota Jayapura', 32, 0),
(488, 'Kabupaten Fakfak', 33, 0),
(489, 'Kabupaten Kaimana', 33, 0),
(490, 'Kabupaten Manokwari', 33, 0),
(491, 'Kabupaten Maybrat', 33, 0),
(492, 'Kabupaten Raja Ampat', 33, 0),
(493, 'Kabupaten Sorong', 33, 0),
(494, 'Kabupaten Sorong Selatan', 33, 0),
(495, 'Kabupaten Tambrauw', 33, 0),
(496, 'Kabupaten Teluk Bintuni', 33, 0),
(497, 'Kabupaten Teluk Wondama', 33, 0),
(498, 'Kota Sorong', 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `tgl_registrasi` datetime NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama_user`, `password`, `tgl_registrasi`) VALUES
(50, '22@yahoo.com', 'dua puluh dua', '827ccb0eea8a706c4c34a16891f84e7b', '2014-08-31 19:45:10'),
(1, 'admin@yahoo.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2014-01-07 21:35:26'),
(7, 'tiavip0878@yahoo.com', 'moon yoon', 'e10adc3949ba59abbe56e057f20f883e', '2014-03-05 03:18:12'),
(26, 'kooo90@yahoo.com', 'lim seulong', 'e10adc3949ba59abbe56e057f20f883e', '2014-04-25 01:40:57'),
(31, 'taeyang@ymail.com', 'yunyun lee', 'e10adc3949ba59abbe56e057f20f883e', '2014-08-08 23:26:16'),
(52, 'tiavip8@yahoo.com', 'agustia', 'e10adc3949ba59abbe56e057f20f883e', '2014-09-06 17:22:38'),
(45, 'azifatin@yahoo.com', 'azifatin ni''ayah', 'e10adc3949ba59abbe56e057f20f883e', '2014-08-28 22:03:19'),
(51, 'jujun@yahoo.com', 'Minjun Ok', 'e10adc3949ba59abbe56e057f20f883e', '2014-09-06 00:03:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
