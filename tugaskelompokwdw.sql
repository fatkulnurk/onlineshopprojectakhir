-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jan 2018 pada 16.03
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugaskelompokwdw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `sts` enum('0','1','2') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `sts`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@yahoo.com', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `hp` varchar(14) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `sts_alamat` enum('0','1','2') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alamat`
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
(98, 45, 'azifatin ni\'ayah', '081456787998', 1, 'jl.niagara', '1'),
(102, 51, 'Minjun Ok', '081456787998', 197, 'jl.niagara', '0'),
(103, 51, 'dua puluh dua', '081456787998', 155, 'jl.niaga', '1'),
(104, 52, 'agustia', '0999998', 2, 'jl.niagara', '1'),
(105, 1, 'dwi', '02155566453', 235, 'lamongan brondong', '1'),
(106, 55, 'gggg', '0987654322', 237, 'hjhjhjb ', '1'),
(107, 69, 'Ilham', '08123456789', 265, 'PENS', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl` date NOT NULL,
  `sts` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_produk`, `gambar`, `harga`, `stok`, `keterangan`, `tgl`, `sts`) VALUES
(59, 'iwak BTC', 33, 'iwak_BTC.png', 25000000, 2, '<p>luaraannnnnngggggg</p>', '2018-01-15', '1'),
(44, 'Iwak Arwana', 3, 'Iwak_Arwana.jpg', 25000, 899, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(45, 'Iwak Cupang', 3, 'Iwak_Cupang.jpg', 89000, 989, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(46, 'Iwak Babi', 33, 'Iwak_Babi.jpg', 70000, 9000, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(47, 'Iwak Kaji', 33, 'Iwak_Kaji.jpg', 90000000, 9004, '<p>Ini ikan bagus SPESIAL</p>', '2018-01-09', '1'),
(48, 'Iwak Pitik', 33, 'Iwak_Pitik.jpg', 56000, 8000, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(49, 'Iwak Sapi', 33, 'Iwak_Sapi.jpg', 1000000000, 1, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(50, 'Iwak Tempe', 33, 'Iwak_Tempe.jpg', 2000, 2147483646, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(51, 'Ikan Kakap', 13, 'Ikan_Kakap.jpg', 25000, 191, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(52, 'Ikan Koi', 3, 'Ikan_Koi.jpg', 60000, 832, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(53, 'Ikan Koki', 13, 'Ikan_Koki.jpg', 8000, 90000, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(54, 'Iwak Lele', 14, 'Iwak_Lele.jpg', 4000, 90000, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(55, 'Iwak Mujair', 13, 'Iwak_Mujair.jpg', 90000, 8282, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(56, 'Iwak Nemo', 3, 'Iwak_Nemo.jpg', 999999999, 1, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(57, 'Iwak Nila', 14, 'Iwak_Nila.jpg', 290000, 3242, '<p>Ini ikan bagus</p>', '2018-01-09', '1'),
(58, 'Iwak Tuna', 14, 'Iwak_Tuna.jpg', 43000, 3, '<p>Ini ikan bagus</p>', '2018-01-09', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_bukutamu` int(11) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `komentar` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl` datetime NOT NULL,
  `sts_bukutamu` enum('0','1','2') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_bukutamu`, `nama`, `email`, `komentar`, `tgl`, `sts_bukutamu`) VALUES
(1, 'tia', 'tiavip08@gmail.com', 'saya suka taeyang', '2017-12-15 10:01:58', '2'),
(33, 'koko', 'too@gmail.com', 'kokokoko momomo', '2017-12-16 04:38:08', '2'),
(32, 'jun hyun', 'moon_yoon@yahoo.co.id', 'juminten', '2017-12-16 04:36:18', '2'),
(34, 'taeyoon choi in', 'moon_yoon@yahoo.co.id', 'hai yuuuu', '2017-12-16 04:39:29', '2'),
(36, 'joko', 'tae@ymail.com', 'tidak mau', '2017-12-16 05:57:06', '2'),
(39, 'moon yoon', 'moon_yoon@yahoo.co.id', 'iyaaau', '2017-12-24 23:29:03', '2'),
(44, 'Minjun Ok', 'jujun@yahoo.com', 'd', '2017-12-06 00:12:37', '2'),
(43, 'Minjun Ok', 'jujun@yahoo.com', 'ninjin', '2017-12-06 00:07:59', '2'),
(45, 'tukiyem', 'nonom@tukiyem.com', 'uji coba aja kok', '2018-01-09 21:35:14', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('9e39c6a58976f693f059fb35a20209e2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', 1515985607, 'a:5:{s:13:\"cart_contents\";a:4:{s:32:\"b05635eafb339ede82d31947f24ca8c5\";a:8:{s:5:\"rowid\";s:32:\"b05635eafb339ede82d31947f24ca8c5\";s:2:\"id\";s:2:\"50\";s:3:\"qty\";s:1:\"1\";s:5:\"price\";s:4:\"2000\";s:4:\"name\";s:14:\"Iwak_Tempe.jpg\";s:8:\"stokawal\";s:10:\"2147483647\";s:7:\"options\";a:2:{i:0;s:10:\"Iwak Tempe\";i:1;s:21:\"<p>Ini ikan bagus</p>\";}s:8:\"subtotal\";i:2000;}s:32:\"8347010a0b3a38cf761e3c0806e86342\";a:8:{s:5:\"rowid\";s:32:\"8347010a0b3a38cf761e3c0806e86342\";s:2:\"id\";s:2:\"52\";s:3:\"qty\";s:1:\"1\";s:5:\"price\";s:5:\"60000\";s:4:\"name\";s:12:\"Ikan_Koi.jpg\";s:8:\"stokawal\";s:3:\"833\";s:7:\"options\";a:2:{i:0;s:8:\"Ikan Koi\";i:1;s:21:\"<p>Ini ikan bagus</p>\";}s:8:\"subtotal\";i:60000;}s:11:\"total_items\";i:2;s:10:\"cart_total\";i:62000;}s:5:\"email\";s:15:\"admin@yahoo.com\";s:4:\"user\";s:5:\"admin\";s:12:\"is_logged_in\";b:1;s:8:\"username\";s:5:\"admin\";}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_replay`
--

CREATE TABLE `forum_replay` (
  `id_replay` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `isi_replay` text NOT NULL,
  `tgl_replay` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `forum_replay`
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
-- Struktur dari tabel `forum_topik`
--

CREATE TABLE `forum_topik` (
  `id_topik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `topik` varchar(225) NOT NULL,
  `isi` text NOT NULL,
  `tgl_topik` datetime NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `frei_banned_users`
--

CREATE TABLE `frei_banned_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `frei_chat`
--

CREATE TABLE `frei_chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `from_name` varchar(30) NOT NULL,
  `to` int(11) NOT NULL,
  `to_name` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `time` double(15,4) NOT NULL,
  `GMT_time` bigint(20) NOT NULL,
  `message_type` int(11) NOT NULL DEFAULT '0',
  `room_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `frei_chat`
--

INSERT INTO `frei_chat` (`id`, `from`, `from_name`, `to`, `to_name`, `message`, `sent`, `recd`, `time`, `GMT_time`, `message_type`, `room_id`) VALUES
(3, 66, 'dua puluh dua', 67, 'admin', 'halo..', '2016-07-17 10:01:36', 1, 14687496960.9739, 1468724496886, 0, -1),
(2, 1469084600, 'Guest-a40', 1468983047, 'Guest-1slk', 'j', '2016-07-16 15:58:38', 1, 14686847180.2940, 1468659518218, 0, -1),
(4, 74, 'dua puluh dua', 75, 'admin', 'Hai... <img id=\"smile__75\" src=\"http://localhost/freichat/client/themes/smileys/smile54593.gif\" alt=\"smile\" />', '2016-07-17 11:19:25', 1, 14687543650.1969, 1468729165117, 0, -1),
(5, 75, 'admin', 74, 'dua puluh dua', 'Onok opo?', '2016-07-17 11:19:37', 1, 14687543770.8477, 1468729177757, 0, -1),
(6, 74, 'dua puluh dua', 75, 'admin', 'gk onk po2..', '2016-07-17 11:19:56', 1, 14687543960.5788, 1468729196483, 0, -1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `frei_config`
--

CREATE TABLE `frei_config` (
  `id` int(11) NOT NULL,
  `key` varchar(30) DEFAULT 'NULL',
  `cat` varchar(20) DEFAULT 'NULL',
  `subcat` varchar(20) DEFAULT 'NULL',
  `val` varchar(500) DEFAULT 'NULL'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `frei_config`
--

INSERT INTO `frei_config` (`id`, `key`, `cat`, `subcat`, `val`) VALUES
(1, 'PATH', 'NULL', 'NULL', 'freichat/'),
(2, 'show_name', 'NULL', 'NULL', 'guest'),
(3, 'displayname', 'NULL', 'NULL', 'username'),
(4, 'chatspeed', 'NULL', 'NULL', '5000'),
(5, 'fxval', 'NULL', 'NULL', 'true'),
(6, 'draggable', 'NULL', 'NULL', 'enable'),
(7, 'conflict', 'NULL', 'NULL', ''),
(8, 'msgSendSpeed', 'NULL', 'NULL', '1000'),
(9, 'show_avatar', 'NULL', 'NULL', 'none'),
(10, 'debug', 'NULL', 'NULL', 'false'),
(11, 'freichat_theme', 'NULL', 'NULL', 'basic'),
(12, 'lang', 'NULL', 'NULL', 'english'),
(13, 'load', 'NULL', 'NULL', 'show'),
(14, 'time', 'NULL', 'NULL', '7'),
(15, 'JSdebug', 'NULL', 'NULL', 'false'),
(16, 'busy_timeOut', 'NULL', 'NULL', '500'),
(17, 'offline_timeOut', 'NULL', 'NULL', '1000'),
(18, 'cache', 'NULL', 'NULL', 'enabled'),
(19, 'GZIP_handler', 'NULL', 'NULL', 'ON'),
(20, 'plugins', 'file_sender', 'show', 'true'),
(21, 'plugins', 'file_sender', 'file_size', '2000'),
(22, 'plugins', 'file_sender', 'expiry', '300'),
(23, 'plugins', 'file_sender', 'valid_exts', 'jpeg,jpg,png,gif,zip'),
(24, 'plugins', 'send_conv', 'show', 'true'),
(25, 'plugins', 'send_conv', 'mailtype', 'smtp'),
(26, 'plugins', 'send_conv', 'smtp_server', 'smtp.gmail.com'),
(27, 'plugins', 'send_conv', 'smtp_port', '465'),
(28, 'plugins', 'send_conv', 'smtp_protocol', 'ssl'),
(29, 'plugins', 'send_conv', 'from_address', 'you@domain.com'),
(30, 'plugins', 'send_conv', 'from_name', 'FreiChat'),
(31, 'playsound', 'NULL', 'NULL', 'true'),
(32, 'ACL', 'filesend', 'user', 'allow'),
(33, 'ACL', 'filesend', 'guest', 'noallow'),
(34, 'ACL', 'chatroom', 'user', 'allow'),
(35, 'ACL', 'chatroom', 'guest', 'allow'),
(36, 'ACL', 'mail', 'user', 'allow'),
(37, 'ACL', 'mail', 'guest', 'allow'),
(38, 'ACL', 'save', 'user', 'allow'),
(39, 'ACL', 'save', 'guest', 'allow'),
(40, 'ACL', 'smiley', 'user', 'allow'),
(41, 'ACL', 'smiley', 'guest', 'allow'),
(42, 'polling', 'NULL', 'NULL', 'disabled'),
(43, 'polling_time', 'NULL', 'NULL', '30'),
(44, 'link_profile', 'NULL', 'NULL', 'disabled'),
(46, 'sef_link_profile', 'NULL', 'NULL', 'disabled'),
(47, 'plugins', 'chatroom', 'location', 'left'),
(48, 'plugins', 'chatroom', 'autoclose', 'false'),
(49, 'content_height', 'NULL', 'NULL', '200px'),
(50, 'chatbox_status', 'NULL', 'NULL', 'false'),
(51, 'BOOT', 'NULL', 'NULL', 'yes'),
(52, 'exit_for_guests', 'NULL', 'NULL', 'no'),
(53, 'plugins', 'chatroom', 'offset', '50px'),
(54, 'plugins', 'chatroom', 'label_offset', '0.8%'),
(55, 'addedoptions_visibility', 'NULL', 'NULL', 'HIDDEN'),
(56, 'ug_ids', 'NULL', 'NULL', ''),
(57, 'ACL', 'chat', 'user', 'allow'),
(58, 'ACL', 'chat', 'guest', 'allow'),
(59, 'plugins', 'chatroom', 'override_positions', 'yes'),
(60, 'ACL', 'video', 'user', 'allow'),
(61, 'ACL', 'video', 'guest', 'allow'),
(62, 'ACL', 'chatroom_crt', 'user', 'allow'),
(63, 'ACL', 'chatroom_crt', 'guest', 'noallow'),
(64, 'plugins', 'chatroom', 'chatroom_expiry', '3600'),
(65, 'chat_time_shown_always', 'NULL', 'NULL', 'no'),
(66, 'allow_guest_name_change', 'NULL', 'NULL', 'yes'),
(67, 'ACL', 'groupchat', 'user', 'allow'),
(68, 'ACL', 'groupchat', 'guest', 'noallow');

-- --------------------------------------------------------

--
-- Struktur dari tabel `frei_groupchat`
--

CREATE TABLE `frei_groupchat` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `group_author` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `group_created` int(11) NOT NULL,
  `group_participants` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `frei_rooms`
--

CREATE TABLE `frei_rooms` (
  `id` int(11) NOT NULL,
  `room_author` varchar(100) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `room_type` tinyint(4) NOT NULL,
  `room_password` varchar(100) NOT NULL,
  `room_created` int(11) NOT NULL,
  `room_last_active` int(11) NOT NULL,
  `room_order` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `frei_rooms`
--

INSERT INTO `frei_rooms` (`id`, `room_author`, `room_name`, `room_type`, `room_password`, `room_created`, `room_last_active`, `room_order`) VALUES
(1, 'admin', 'Fun Talk', 0, '', 1373557250, 1373557250, 1),
(2, 'admin', 'Crazy chat', 0, '', 1373557260, 1373557260, 5),
(3, 'admin', 'Think out loud', 0, '', 1373557872, 1373557872, 2),
(4, 'admin', 'Talk to me ', 0, '', 1373558017, 1373558017, 3),
(5, 'admin', 'Talk innovative', 0, '', 1373558039, 1373799404, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `frei_session`
--

CREATE TABLE `frei_session` (
  `id` int(100) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `time` int(100) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `permanent_id` int(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `status_mesg` varchar(100) NOT NULL,
  `guest` tinyint(3) NOT NULL,
  `in_room` int(4) NOT NULL DEFAULT '-1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `frei_session`
--

INSERT INTO `frei_session` (`id`, `username`, `time`, `session_id`, `permanent_id`, `status`, `status_mesg`, `guest`, `in_room`) VALUES
(66, 'Guest-1o0f', 1468755239, '1469009023', 1469009023, 1, 'I am available', 1, -1),
(64, 'Guest-aba', 1468755217, '1469151848', 1469151848, 1, 'I am available', 1, -1),
(65, 'Guest-1o0f', 1468756242, '1469182171', 1469182171, 0, 'I am available', 1, -1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `frei_smileys`
--

CREATE TABLE `frei_smileys` (
  `id` int(11) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `frei_smileys`
--

INSERT INTO `frei_smileys` (`id`, `symbol`, `image_name`) VALUES
(1, ':S', 'worried55231.gif'),
(2, '(wasntme)', 'itwasntme55198.gif'),
(3, 'x(', 'angry55174.gif'),
(4, '(doh)', 'doh55146.gif'),
(5, '|-()', 'yawn55117.gif'),
(6, ']:)', 'evilgrin55088.gif'),
(7, '|(', 'dull55062.gif'),
(8, '|-)', 'sleepy55036.gif'),
(9, '(blush)', 'blush54981.gif'),
(10, ':P', 'tongueout54953.gif'),
(11, '(:|', 'sweat54888.gif'),
(12, ';(', 'crying54854.gif'),
(13, ':)', 'smile54593.gif'),
(14, ':(', 'sad54749.gif'),
(15, ':D', 'bigsmile54781.gif'),
(16, '8)', 'cool54801.gif'),
(17, ':o', 'wink54827.gif'),
(18, '(mm)', 'mmm55255.gif'),
(19, ':x', 'lipssealed55304.gif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `frei_video_session`
--

CREATE TABLE `frei_video_session` (
  `id` int(11) NOT NULL,
  `rid` int(11) DEFAULT NULL COMMENT 'unique room id',
  `from_id` int(11) NOT NULL,
  `msg_type` varchar(10) NOT NULL,
  `msg_label` int(2) NOT NULL,
  `msg_data` varchar(3000) NOT NULL,
  `msg_time` decimal(15,4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `frei_webrtc`
--

CREATE TABLE `frei_webrtc` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `participants_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `nama_informasi` varchar(60) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_pengiriman`
--

CREATE TABLE `jasa_pengiriman` (
  `jasa` int(11) NOT NULL,
  `nama_jasa` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa_pengiriman`
--

INSERT INTO `jasa_pengiriman` (`jasa`, `nama_jasa`) VALUES
(2, 'JNE'),
(3, 'Pandu Logistic'),
(1, 'POS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `komentar` text,
  `tgl_komentar` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_user`, `id_barang`, `komentar`, `tgl_komentar`) VALUES
(39, 40, 36, 'unyuu', '2014-08-26 00:43:10'),
(40, 31, 23, 'bagus...', '2014-08-29 09:06:15'),
(41, 45, 23, 'pinky,.. saya numpang komment', '2014-08-29 09:09:02'),
(29, 27, 14, 'komentar', '2014-05-07 05:53:39'),
(45, 69, 44, 'Ikannya lucu', '2018-01-09 23:52:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `norek`
--

CREATE TABLE `norek` (
  `id_norek` int(11) NOT NULL,
  `norekning` varchar(50) NOT NULL,
  `namarekning` varchar(100) NOT NULL,
  `bankrekning` varchar(25) NOT NULL,
  `sts` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `norek`
--

INSERT INTO `norek` (`id_norek`, `norekning`, `namarekning`, `bankrekning`, `sts`) VALUES
(1, '8240050499', 'Mochammad Ilham Maulana', 'BCA', '0'),
(2, '0177837774', 'PT. Buyfish Indonesia', 'BNI', '0'),
(3, '824 0050499', 'Sri Suwarsi', 'BCA', '0'),
(4, '8240050499', 'Sri Suwarsi', 'BNI', '0'),
(5, '8240050499', 'Sri Suwarsi', 'BNI', '0'),
(6, '8240050499', 'Eko Oktiningrum S', 'BCA', '0'),
(7, '0411-01-003042-53-5', 'Sri Suwarsi', 'BRI', '0'),
(8, 'bd90saiwow9sa0wwq93okbye', 'bitcoin', 'BITCOIN', '0'),
(9, '8034289290', 'PT. Buyfish Indonesia', 'BCA', '1'),
(10, '76546382921', 'PT. Buyfish Indonesia', 'BNI', '1'),
(11, '909922231233', 'PT. Buyfish Indonesia', 'BRI', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
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
  `id_alamat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `total_pesanan`, `tgl_pesanan`, `tgl_konfirm`, `gambar`, `nominal`, `tgl_transfer`, `catatan`, `no_resi`, `tgl_kirim`, `jasa`, `sts`, `id_alamat`) VALUES
('150118034815', 1, 62000, '2018-01-15 03:48:15', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 105),
('181217022648', 52, 103000, '2017-12-18 02:26:48', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 104),
('181217042443', 52, 175000, '2017-12-18 04:24:43', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 104),
('060118133236', 1, 80000, '2018-01-06 13:32:36', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 105),
('090118235819', 69, 37000, '2018-01-09 23:58:19', '0000-00-00 00:00:00', '', 0, '0000-00-00', '', '', '0000-00-00', 0, '0', 107);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_det`
--

CREATE TABLE `pesanan_det` (
  `id_pesanan` varchar(12) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_det`
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
('310814193903', 37, 1),
('170416034858', 39, 1),
('170416045614', 36, 1),
('170416045614', 1, 1),
('030616004703', 36, 1),
('030616004808', 36, 1),
('030616004808', 35, 2),
('150716185244', 43, 1),
('181217022648', 38, 1),
('181217042443', 38, 1),
('181217042443', 35, 1),
('060118133236', 38, 1),
('090118235819', 44, 1),
('150118034815', 50, 1),
('150118034815', 52, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `polling_jawaban`
--

CREATE TABLE `polling_jawaban` (
  `nomor` int(11) NOT NULL,
  `idtanya` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `polling_jawaban`
--

INSERT INTO `polling_jawaban` (`nomor`, `idtanya`, `jawaban`, `jumlah`) VALUES
(53, 50, 'tidak', 1),
(52, 50, 'iya', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `polling_pertanyaan`
--

CREATE TABLE `polling_pertanyaan` (
  `idtanya` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `polling_pertanyaan`
--

INSERT INTO `polling_pertanyaan` (`idtanya`, `pertanyaan`, `tanggal`) VALUES
(50, '<p>Apakah webnya lengkap</p>', '2018-01-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polling_vote`
--

CREATE TABLE `polling_vote` (
  `nomor` int(11) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `polling_vote`
--

INSERT INTO `polling_vote` (`nomor`, `ip`, `tgl`) VALUES
(51, '::1', '2016-01-16'),
(53, '::1', '2018-01-10'),
(0, '::1', '2017-12-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`) VALUES
(3, 'Ikan Hias'),
(14, 'Ikan Ternak'),
(13, 'Ikan Tambak'),
(33, 'Ikan Unik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `propinsi`
--

CREATE TABLE `propinsi` (
  `propinsi_id` int(4) NOT NULL,
  `propinsi` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `propinsi`
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
-- Struktur dari tabel `propinsi_kota`
--

CREATE TABLE `propinsi_kota` (
  `kota_id` int(11) NOT NULL,
  `kota_kabupaten` varchar(100) NOT NULL,
  `propinsi_id` int(4) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `propinsi_kota`
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `tgl_registrasi` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama_user`, `password`, `tgl_registrasi`) VALUES
(50, '22@yahoo.com', 'dua puluh dua', '25d55ad283aa400af464c76d713c07ad', '2014-08-31 19:45:10'),
(1, 'admin@yahoo.com', 'admin', '25d55ad283aa400af464c76d713c07ad', '2014-01-07 21:35:26'),
(7, 'tiavip0878@yahoo.com', 'moon yoon', 'e10adc3949ba59abbe56e057f20f883e', '2014-03-05 03:18:12'),
(26, 'kooo90@yahoo.com', 'lim seulong', 'e10adc3949ba59abbe56e057f20f883e', '2014-04-25 01:40:57'),
(31, 'taeyang@ymail.com', 'yunyun lee', 'e10adc3949ba59abbe56e057f20f883e', '2014-08-08 23:26:16'),
(52, 'tiavip8@yahoo.com', 'agustia', 'e10adc3949ba59abbe56e057f20f883e', '2014-09-06 17:22:38'),
(45, 'azifatin@yahoo.com', 'azifatin ni\'ayah', 'e10adc3949ba59abbe56e057f20f883e', '2014-08-28 22:03:19'),
(51, 'jujun@yahoo.com', 'Minjun Ok', 'e10adc3949ba59abbe56e057f20f883e', '2014-09-06 00:03:36'),
(53, 'kliwonline@gmail.com', 'AAAA YYYY', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-15 18:35:58'),
(54, 'dff@dmnjil.com', 'dddd ddffff', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-15 18:51:14'),
(55, 'kliwonline@gmail.com', 'gggg', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-15 18:52:44'),
(56, 'kliwonliner@gmail.com', 'jh ghg', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-15 18:54:07'),
(57, 'fffff@gmskl.com', 'ghghhh ddffff', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 02:55:15'),
(58, 'kliwonligne@gmail.com', 'dddde ddffff', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 03:12:19'),
(59, 'kliwonlreine@gmail.com', 'jh ', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 03:14:44'),
(60, 'kliwonlinsse@gmail.com', 'gww ', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 03:30:08'),
(61, 'kliwonlinffe@gmail.com', 'dddddd ', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 04:01:51'),
(62, 'kliwoSnline@gmail.com', 'AAAS ', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 04:13:48'),
(63, 'kliwonlin3e@gmail.com', 'dddd ', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 04:23:19'),
(64, 'kliwonlinee@gmail.com', 'dddde ', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 04:31:34'),
(65, 'kliwonlinjje@gmail.com', 'dddd ', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 04:36:08'),
(66, 'kliwweline@gmail.com', 'ddddew ', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 16:31:44'),
(67, 'kliwonliAAne@gmail.com', 'Ken ', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 17:26:24'),
(68, 'kliwonliWne@gmail.com', 'jh ', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-16 17:26:56'),
(69, 'fatkulnurk@gmail.com', 'Ilham Maulana', 'c68059ff9075a67037d15000881f9ae4', '2018-01-09 23:50:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `id` int(2) NOT NULL,
  `user` varchar(15) NOT NULL,
  `avatar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`id`, `user`, `avatar`) VALUES
(77, 'agustia', ''),
(93, 'admin', ''),
(94, 'admin', ''),
(95, 'admin', ''),
(96, 'admin', ''),
(97, 'admin', ''),
(98, 'admin', ''),
(99, 'admin', ''),
(100, 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_bukutamu`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `forum_replay`
--
ALTER TABLE `forum_replay`
  ADD PRIMARY KEY (`id_replay`);

--
-- Indexes for table `forum_topik`
--
ALTER TABLE `forum_topik`
  ADD PRIMARY KEY (`id_topik`);

--
-- Indexes for table `frei_banned_users`
--
ALTER TABLE `frei_banned_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `frei_chat`
--
ALTER TABLE `frei_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frei_config`
--
ALTER TABLE `frei_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frei_groupchat`
--
ALTER TABLE `frei_groupchat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frei_rooms`
--
ALTER TABLE `frei_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_name` (`room_name`);

--
-- Indexes for table `frei_session`
--
ALTER TABLE `frei_session`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permanent_id` (`permanent_id`);

--
-- Indexes for table `frei_smileys`
--
ALTER TABLE `frei_smileys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frei_video_session`
--
ALTER TABLE `frei_video_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frei_webrtc`
--
ALTER TABLE `frei_webrtc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jasa_pengiriman`
--
ALTER TABLE `jasa_pengiriman`
  ADD PRIMARY KEY (`jasa`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `norek`
--
ALTER TABLE `norek`
  ADD PRIMARY KEY (`id_norek`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `polling_jawaban`
--
ALTER TABLE `polling_jawaban`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `polling_pertanyaan`
--
ALTER TABLE `polling_pertanyaan`
  ADD PRIMARY KEY (`idtanya`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `propinsi`
--
ALTER TABLE `propinsi`
  ADD PRIMARY KEY (`propinsi_id`);

--
-- Indexes for table `propinsi_kota`
--
ALTER TABLE `propinsi_kota`
  ADD PRIMARY KEY (`kota_id`),
  ADD KEY `kota_id` (`propinsi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_bukutamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_replay`
--
ALTER TABLE `forum_replay`
  MODIFY `id_replay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `forum_topik`
--
ALTER TABLE `forum_topik`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `frei_banned_users`
--
ALTER TABLE `frei_banned_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frei_chat`
--
ALTER TABLE `frei_chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `frei_config`
--
ALTER TABLE `frei_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `frei_groupchat`
--
ALTER TABLE `frei_groupchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `frei_rooms`
--
ALTER TABLE `frei_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `frei_session`
--
ALTER TABLE `frei_session`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `frei_smileys`
--
ALTER TABLE `frei_smileys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `frei_video_session`
--
ALTER TABLE `frei_video_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frei_webrtc`
--
ALTER TABLE `frei_webrtc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `norek`
--
ALTER TABLE `norek`
  MODIFY `id_norek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `polling_jawaban`
--
ALTER TABLE `polling_jawaban`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `polling_pertanyaan`
--
ALTER TABLE `polling_pertanyaan`
  MODIFY `idtanya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `propinsi_kota`
--
ALTER TABLE `propinsi_kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
