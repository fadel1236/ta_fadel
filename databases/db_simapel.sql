-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Jul 2022 pada 04.39
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simapel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ajar`
--

CREATE TABLE `tbl_ajar` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ajar`
--

INSERT INTO `tbl_ajar` (`id`, `id_mapel`, `id_guru`) VALUES
(58, 2, 25),
(59, 2, 26),
(60, 3, 27),
(61, 4, 28),
(62, 5, 29),
(74, 8, 30),
(75, 8, 31),
(76, 6, 30),
(77, 6, 31),
(78, 6, 32),
(79, 6, 33),
(83, 9, 30),
(84, 9, 31),
(85, 9, 32),
(86, 9, 34),
(87, 10, 30),
(88, 10, 31),
(91, 12, 32),
(92, 12, 33),
(93, 13, 32),
(94, 13, 33),
(95, 14, 38),
(138, 7, 30),
(139, 7, 31),
(140, 7, 32),
(141, 7, 35),
(142, 7, 36),
(143, 7, 37),
(146, 48, 49),
(147, 48, 50),
(148, 48, 51),
(149, 48, 52),
(151, 50, 55),
(155, 54, 57),
(172, 59, 58),
(173, 59, 59),
(176, 61, 58),
(177, 61, 59),
(178, 47, 44),
(179, 47, 7),
(180, 62, 58),
(181, 62, 59),
(182, 63, 60),
(183, 64, 61),
(184, 65, 62),
(185, 65, 63),
(188, 67, 62),
(189, 67, 63),
(190, 68, 62),
(191, 68, 63),
(230, 69, 66),
(231, 69, 67),
(232, 70, 75),
(233, 71, 80),
(234, 72, 81),
(235, 46, 1),
(236, 46, 2),
(237, 46, 3),
(238, 46, 41),
(239, 46, 42),
(240, 46, 64),
(241, 11, 4),
(242, 11, 5),
(243, 11, 43),
(244, 11, 65),
(245, 15, 6),
(246, 15, 7),
(247, 15, 8),
(248, 16, 9),
(249, 16, 10),
(250, 16, 11),
(251, 16, 12),
(252, 16, 45),
(253, 16, 46),
(254, 16, 68),
(255, 16, 69),
(256, 17, 13),
(257, 17, 14),
(258, 17, 5),
(259, 18, 15),
(260, 18, 22),
(261, 18, 23),
(262, 18, 24),
(269, 20, 18),
(270, 20, 19),
(271, 21, 20),
(272, 21, 21),
(273, 19, 16),
(274, 19, 17),
(275, 19, 15),
(276, 19, 48),
(277, 73, 72),
(278, 73, 73),
(281, 74, 70),
(282, 74, 71),
(283, 74, 83),
(284, 75, 55),
(285, 76, 78),
(286, 76, 79),
(287, 77, 78),
(288, 77, 79),
(289, 78, 82),
(290, 79, 82),
(291, 49, 54),
(292, 51, 56),
(293, 51, 74),
(294, 52, 56),
(295, 52, 74),
(296, 53, 56),
(297, 53, 74),
(315, 58, 35),
(316, 58, 36),
(317, 58, 37),
(318, 58, 34),
(319, 58, 76),
(320, 58, 77),
(321, 55, 35),
(322, 55, 36),
(323, 55, 37),
(324, 55, 34),
(325, 55, 76),
(326, 55, 77),
(327, 56, 35),
(328, 56, 36),
(329, 56, 37),
(330, 56, 34),
(331, 56, 76),
(332, 56, 77),
(333, 57, 35),
(334, 57, 36),
(335, 57, 37),
(336, 57, 34),
(337, 57, 76),
(338, 57, 77),
(342, 60, 58),
(343, 60, 59),
(344, 60, 78),
(345, 60, 79),
(346, 66, 62),
(347, 66, 63),
(348, 66, 82);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aktivitas`
--

CREATE TABLE `tbl_aktivitas` (
  `id` int(11) NOT NULL,
  `id_ajar` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_aktivitas`
--

INSERT INTO `tbl_aktivitas` (`id`, `id_ajar`, `id_kelas`) VALUES
(240, 123, 44),
(241, 89, 44),
(242, 96, 44),
(243, 99, 44),
(244, 132, 44),
(245, 110, 44),
(246, 112, 44),
(247, 122, 44),
(248, 108, 44),
(249, 85, 44),
(250, 79, 44),
(251, 92, 44),
(252, 94, 44),
(253, 143, 44),
(254, 124, 45),
(255, 89, 45),
(256, 96, 45),
(257, 101, 45),
(258, 130, 45),
(259, 106, 45),
(260, 110, 45),
(261, 112, 45),
(262, 121, 45),
(263, 78, 45),
(264, 140, 45),
(265, 91, 45),
(266, 93, 45),
(267, 85, 45),
(268, 124, 46),
(269, 90, 46),
(270, 96, 46),
(271, 101, 46),
(272, 131, 46),
(273, 106, 46),
(274, 110, 46),
(275, 112, 46),
(276, 121, 46),
(277, 77, 46),
(278, 139, 46),
(279, 75, 46),
(280, 84, 46),
(281, 88, 46),
(282, 124, 47),
(283, 90, 47),
(284, 96, 47),
(285, 101, 47),
(286, 131, 47),
(287, 110, 47),
(288, 112, 47),
(289, 122, 47),
(290, 109, 47),
(291, 76, 47),
(292, 138, 47),
(293, 74, 47),
(294, 83, 47),
(295, 87, 47),
(309, 123, 34),
(310, 89, 34),
(311, 96, 34),
(312, 100, 34),
(313, 130, 34),
(314, 111, 34),
(315, 113, 34),
(316, 122, 34),
(317, 107, 34),
(318, 58, 34),
(319, 60, 34),
(320, 61, 34),
(321, 62, 34),
(322, 95, 34),
(323, 125, 33),
(324, 89, 33),
(325, 98, 33),
(326, 100, 33),
(327, 111, 33),
(328, 113, 33),
(329, 122, 33),
(330, 107, 33),
(331, 58, 33),
(332, 60, 33),
(333, 61, 33),
(334, 62, 33),
(335, 95, 33),
(336, 130, 33),
(337, 125, 40),
(338, 89, 40),
(339, 97, 40),
(340, 102, 40),
(341, 111, 40),
(342, 113, 40),
(343, 122, 40),
(344, 109, 40),
(345, 59, 40),
(346, 60, 40),
(347, 61, 40),
(348, 62, 40),
(349, 95, 40),
(350, 130, 40),
(351, 125, 41),
(352, 89, 41),
(353, 97, 41),
(354, 102, 41),
(355, 111, 41),
(356, 113, 41),
(357, 122, 41),
(358, 109, 41),
(359, 59, 41),
(360, 60, 41),
(361, 61, 41),
(362, 62, 41),
(363, 95, 41),
(364, 130, 41),
(365, 123, 36),
(366, 89, 36),
(367, 98, 36),
(368, 100, 36),
(369, 111, 36),
(370, 113, 36),
(371, 122, 36),
(372, 107, 36),
(373, 58, 36),
(374, 60, 36),
(375, 61, 36),
(376, 62, 36),
(377, 95, 36),
(378, 130, 36),
(379, 125, 37),
(380, 89, 37),
(381, 98, 37),
(382, 100, 37),
(383, 106, 37),
(384, 111, 37),
(385, 113, 37),
(386, 122, 37),
(387, 59, 37),
(388, 60, 37),
(389, 61, 37),
(390, 62, 37),
(391, 95, 37),
(392, 130, 37),
(393, 125, 38),
(394, 89, 38),
(395, 98, 38),
(396, 100, 38),
(397, 106, 38),
(398, 111, 38),
(399, 113, 38),
(400, 122, 38),
(401, 59, 38),
(402, 60, 38),
(403, 61, 38),
(404, 62, 38),
(405, 95, 38),
(406, 130, 38),
(448, 125, 35),
(449, 89, 35),
(450, 98, 35),
(451, 100, 35),
(452, 111, 35),
(453, 113, 35),
(454, 122, 35),
(455, 107, 35),
(456, 58, 35),
(457, 60, 35),
(458, 61, 35),
(459, 62, 35),
(460, 95, 35),
(461, 131, 35),
(501, 123, 39),
(502, 89, 39),
(503, 97, 39),
(504, 102, 39),
(505, 111, 39),
(506, 113, 39),
(507, 122, 39),
(508, 108, 39),
(509, 59, 39),
(510, 60, 39),
(511, 61, 39),
(512, 62, 39),
(513, 95, 39),
(514, 131, 39),
(515, 124, 42),
(516, 90, 42),
(517, 98, 42),
(518, 99, 42),
(519, 111, 42),
(520, 112, 42),
(521, 121, 42),
(522, 108, 42),
(523, 79, 42),
(524, 92, 42),
(525, 94, 42),
(526, 86, 42),
(527, 132, 42),
(528, 130, 42),
(543, 124, 43),
(544, 89, 43),
(545, 96, 43),
(546, 99, 43),
(547, 132, 43),
(548, 111, 43),
(549, 112, 43),
(550, 121, 43),
(551, 108, 43),
(552, 85, 43),
(553, 79, 43),
(554, 92, 43),
(555, 94, 43),
(556, 142, 43);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` int(11) NOT NULL,
  `guru_kode` varchar(50) NOT NULL,
  `guru_nip` varchar(255) NOT NULL,
  `guru_nama` varchar(100) NOT NULL,
  `guru_jam_ajar` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `guru_kode`, `guru_nip`, `guru_nama`, `guru_jam_ajar`) VALUES
(1, 'G01', '', 'Sulyani Sukarno Mardan, S.PdI', '4'),
(2, 'G02', '', 'Nurlaela, S.Pd, M.PdI', '5'),
(3, 'G03', '', 'Safiudin, S.PdI', '6'),
(4, 'G04', '', 'Syamsinar Kadir, S.Pd', '12'),
(5, 'G05', '', 'Yuni Rozalia, S.Pd', '3'),
(6, 'G06', '', 'Syahrir, S.Pd', '6'),
(7, 'G07', '', 'Vini Elfi Yunita, S.Pd', '3'),
(8, 'G08', '', 'Ristawati, S.Pd', '6'),
(9, 'G09', '', 'Fajarudin Nor Syarif, S.Pd', '3'),
(10, 'G10', '', 'Siti Arabiah, S. Pd', '4'),
(11, 'G11', '', 'Sari Mulyawarni, S.Pd', '3'),
(12, 'G12', '', 'Misrawati, S.Pd', '3'),
(13, 'G13', '', 'Harsa, SP, MP', '9'),
(14, 'G14', '', 'Samsadar, S.Pd', '4'),
(15, 'G16', '', 'Firda Ariyanti, S.Pd, M.Pd', '4'),
(16, 'G17', '', 'Hasmira, S.Pd', '4'),
(17, 'G18', '', 'Aswira Bahidin, S.Pd, M.Pd', '11'),
(18, 'G19', '', 'Drs. Jufri', '0'),
(19, 'G20', '', 'Abd. Salam, S.Pd', '0'),
(20, 'G21', '', 'Dra. Nurbaya', '0'),
(21, 'G22', '', 'Sumarni Sirait, S.Pd, M.Pd', '0'),
(22, 'G23', '', 'Drs. H. Abd. Asis', '0'),
(23, 'G24', '', 'Rahmiati Lasantu, S.Pd', '0'),
(24, 'G26', '', 'Kalina, S.Pd', '0'),
(25, 'G27', '', 'Muh. Rijali, S.Pd', '0'),
(26, 'G28', '', 'Nani Usman, S.Pd', '0'),
(27, 'G30', '', 'Kartina, S.Pd', '0'),
(28, 'G31', '', 'Hasnawati, S.Pd', '0'),
(29, 'G32', '', 'Waode Aliyati, A.Md Com', '0'),
(30, 'G33', '', 'Satrio Pangestu', '0'),
(31, 'G34', '', 'Junizar. S.Pd', '0'),
(32, 'G35', '', 'Mursalin, S.Pd, M.Pd', '0'),
(33, 'G36', '', 'Misna, S.Pd', '0'),
(34, 'G37', '', 'Drs. Muh. Basri, M.Pd', '0'),
(35, 'G38', '', 'Dra. Rahmawati, M.Pd', '0'),
(36, 'G39', '', 'Dra. Hj. Asni, M.Si', '0'),
(37, 'G40', '', 'Dra. Hj. St Aisyah Dasir, M.Pd', '0'),
(38, 'G41', '', 'La Sumpu Pustapa, S.Si', '0'),
(41, 'G42', '-', 'La Haluma, S.Ag', '0'),
(42, 'G43', '-', 'St. Nur Ida, S.Ag', '0'),
(43, 'G44', '-', 'Dra. Nurhaeri', '0'),
(44, 'G45', '-', 'Hamsiah Saudin, S.Pd', '0'),
(45, 'G46', '-', 'Munaria, S.Pd', '0'),
(46, 'G47', '-', 'Wa Ode Dina, S.Pd', '0'),
(47, 'G48', '-', 'Firda Ariyanti, S.Pd, M.Pd', '0'),
(48, 'G49', '-', 'St. Nurmalia, S.Pd', '0'),
(49, 'G50', '-', 'Murniati, S.Pd', '0'),
(50, 'G51', '-', 'Ahmad Risal. S.Kom', '0'),
(51, 'G52', '-', 'Agus Salim, S.Pd', '0'),
(52, 'G35', '-', 'Wa Ode Nur Arfiani, S.Pd', '0'),
(53, 'G54', '-', 'Drs. Abdurrahman', '0'),
(54, 'G55', '-', 'Muh. Masykur. S, S.Kom', '0'),
(55, 'G56', '-', 'Febriadi Usnawi, Si.Kom', '0'),
(56, 'G57', '-', 'Lallo, S.Pd.', '0'),
(57, 'G58', '-', 'Amiluddin, S.Pd', '0'),
(58, 'G59', '-', 'La Malino, S.Kom', '0'),
(59, 'G60', '-', 'Muh. Ilham Nusi, S.Pd', '0'),
(60, 'G61', '-', 'Lidya Rahayu Ningrum, S.Si', '0'),
(61, 'G62', '-', 'Dewi Puspita Sari, S.Pd', '0'),
(62, 'G63', '-', 'Alfin, S.Pd', '0'),
(63, 'G64', '-', 'Muh. Wahyu Fadillah', '0'),
(64, 'G65', '-', 'Norma, S.Ag', '0'),
(65, 'G66', '-', 'Dra. Rosdiana', '0'),
(66, 'G67', '-', 'Hj.Waode Zalmama, S.Pd', '0'),
(67, 'G68', '-', 'Jamlia Jamaa, S.Pd', '0'),
(68, 'G69', '-', 'St. Hasmah, S.Pd', '0'),
(69, 'G70', '-', 'Sur Rasyid, S.Pd', '0'),
(70, 'G71', '-', 'Elisabeth, S.Pd', '0'),
(71, 'G72', '-', 'Ervina, S.Pd, MM', '0'),
(72, 'G73', '-', 'Dra. Dahlia Surahmawati', '0'),
(73, 'G74', '-', 'Rahmawati Nusi, S.Pd, MA', '0'),
(74, 'G75', '-', 'Jumadil A. S.Pd, M.Pd', '0'),
(75, 'G75', '-', 'Muh. Indra Faisal, ST', '0'),
(76, 'G76', '-', 'Dra. Tasma, M.Pd', '0'),
(77, 'G77', '-', 'Dra. Ummi, M.Pd', '0'),
(78, 'G78', '-', 'Muhlis', '0'),
(79, 'G79', '-', 'Muh. Akbar Al Ma\'ruf', '0'),
(80, 'G80', '-', 'Mutasrim, S.Kom', '0'),
(81, 'G81', '-', 'Iswuri Handayani, M.Kom', '0'),
(82, 'G82', '-', 'Akbar, S.ST', '0'),
(83, 'G15', '-', 'Titin Mekuo, S.Pd', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id_hak_akses`, `id_user_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(13, 4, 17),
(15, 4, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hari`
--

CREATE TABLE `tbl_hari` (
  `hari_id` int(10) NOT NULL,
  `hari_nama` varchar(100) NOT NULL,
  `hari_jam_aktif` varchar(100) NOT NULL,
  `hari_jam_istirahat` varchar(100) NOT NULL,
  `hari_total_jam` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_hari`
--

INSERT INTO `tbl_hari` (`hari_id`, `hari_nama`, `hari_jam_aktif`, `hari_jam_istirahat`, `hari_total_jam`) VALUES
(2, 'Senin', '1', '6', 9),
(3, 'Senin', '2', '6', 9),
(4, 'Senin', '3', '6', 9),
(5, 'Senin', '4', '6', 9),
(6, 'Senin', '5', '6', 9),
(7, 'Senin', '7', '6', 9),
(8, 'Senin', '8', '6', 9),
(9, 'Senin', '9', '6', 9),
(10, 'Senin', '10', '6', 9),
(11, 'Selasa', '1', '7', 10),
(12, 'Selasa', '2', '7', 10),
(13, 'Selasa', '3', '7', 10),
(14, 'Selasa', '4', '7', 10),
(15, 'Selasa', '5', '7', 10),
(16, 'Selasa', '6', '7', 10),
(17, 'Selasa', '8', '7', 10),
(18, 'Selasa', '9', '7', 10),
(19, 'Selasa', '10', '7', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jam`
--

CREATE TABLE `tbl_jam` (
  `jam_id` int(11) NOT NULL,
  `jam_ke` varchar(100) NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  `jam_selesai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jam`
--

INSERT INTO `tbl_jam` (`jam_id`, `jam_ke`, `jam_mulai`, `jam_selesai`) VALUES
(1, '1', '08.00', '08.45'),
(2, '2', '08.45', '09.30'),
(3, '3', '09.30', '10.15'),
(4, '4', '10.15', '11.00'),
(5, '5', '11.00', '11.45'),
(6, '6', '11.45', '13.00'),
(7, '7', '13.00', '13.45'),
(8, '8', '13.45', '14.30'),
(9, '9', '14.30', '15.15'),
(10, '10', '15.15', '16.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id` int(11) NOT NULL,
  `kelas_level` int(5) NOT NULL,
  `kelas_nama` varchar(100) NOT NULL,
  `kelas_alias` varchar(10) NOT NULL,
  `kelas_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `kelas_level`, `kelas_nama`, `kelas_alias`, `kelas_jenis`) VALUES
(33, 10, 'TEKNIK KOMPUTER JARINGAN (A)', 'TKJA', 'Teknologi'),
(34, 10, 'TEKNIK KOMPUTER JARINGAN (B)', 'TKJB', 'Teknologi'),
(35, 10, 'TEKNIK KOMPUTER JARINGAN (C)', 'TKJC', 'Teknologi'),
(36, 10, 'MULTI MEDIA (A)', 'MLTA', 'Teknologi'),
(37, 10, 'MULTI MEDIA (B)', 'MLTB', 'Teknologi'),
(38, 10, 'MULTI MEDIA (C)', 'MLTC', 'Teknologi'),
(39, 10, 'REKAYASA PERANGKAT LUNAK (A)', 'RPLA', 'Teknologi'),
(40, 10, 'REKAYASA PERANGKAT LUNAK (B)', 'RPLB', 'Teknologi'),
(41, 10, 'REKAYASA PERANGKAT LUNAK (C)', 'RPLC', 'Teknologi'),
(42, 10, 'KRIYA TEKSTIL (A)', 'KTA', 'Kriya'),
(43, 10, 'KRIYA TEKSTIL (B)', 'KTB', 'Kriya'),
(44, 10, 'KRIYA TEKSTIL (C)', 'KTC', 'Kriya'),
(45, 10, 'KRIYA KAYU', 'KK', 'Kriya'),
(46, 10, 'DESAIN KOMUNIKASI VISUAL (A)', 'DKVA', 'Kriya'),
(47, 10, 'DESAIN KOMUNIKASI VISUAL (B)', 'DKVB', 'Kriya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id` int(11) NOT NULL,
  `mapel_kode` varchar(50) NOT NULL DEFAULT '-',
  `mapel_nama` varchar(100) NOT NULL,
  `mapel_jp` int(11) NOT NULL,
  `mapel_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id`, `mapel_kode`, `mapel_nama`, `mapel_jp`, `mapel_jenis`) VALUES
(2, 'M10', 'Fisika', 3, 'kejuruan'),
(3, 'M11', 'Sistem Komputer', 2, 'kejuruan'),
(4, 'M12', 'Pemrograman Dasar', 3, 'kejuruan'),
(5, 'M13', 'Dasar Desain Grafis', 3, 'kejuruan'),
(6, 'M15', 'Tinjauan Seni', 2, 'kejuruan'),
(7, 'M16', 'Dasar2 Kreatifitas', 2, 'kejuruan'),
(8, 'M17', 'Dasar2 Seni Rupa', 3, 'kejuruan'),
(9, 'M18', 'Gambar', 4, 'kejuruan'),
(10, 'M19', 'Sketsa ', 4, 'kejuruan'),
(11, 'M02', 'PKn', 2, 'umum'),
(12, 'M20', 'Dasar2 Desain', 3, 'kejuruan'),
(13, 'M21', 'Desain Produk ', 4, 'kejuruan'),
(14, 'M22', 'Komputer & Jaringan Dasar', 3, 'kejuruan'),
(15, 'M03', 'Bahasa Indonesia (X)', 4, 'umum'),
(16, 'M04', 'Matematika', 4, 'umum'),
(17, 'M05', 'Sejarah Indonesia', 3, 'umum'),
(18, 'M06', 'Simulasi Digital', 3, 'umum'),
(19, 'M07', 'Bahasa Inggris (X & XI)', 3, 'umum'),
(20, 'M08', 'Seni Budaya', 3, 'umum'),
(21, 'M09', 'Penjas Kes', 2, 'umum'),
(46, 'M01', 'Pendais', 3, 'umum'),
(47, 'M23', 'Bhs. Indonesia (XI)', 3, ''),
(48, 'M24', 'Produk Kreatif & KWU', 7, ''),
(49, 'M25', 'Desain Publikasi', 9, ''),
(50, 'M26', 'Fotografi', 9, ''),
(51, 'M27', 'Teknik Kerja Mesin', 6, ''),
(52, 'M28', 'Teknik Kerja Ukir', 6, ''),
(53, 'M29', 'Finishing', 4, ''),
(54, 'M30', 'Teknik Kerja Bangku', 5, ''),
(55, 'M31', 'Batik', 6, ''),
(56, 'M32', 'Jahit', 6, ''),
(57, 'M33', 'Tenun', 4, ''),
(58, 'M34', 'Sablon', 5, ''),
(59, 'M35', 'Tek Jaringan berbasis luas', 6, ''),
(60, 'M36', 'Adm Infrastruktur Jaringan', 6, ''),
(61, 'M37', 'Adm Sistem Jaringan', 4, ''),
(62, 'M38', 'Teknik Layanan Jaringan ', 5, ''),
(63, 'M39', 'Desain Grafis Percetakan', 9, ''),
(64, 'M40', 'Animasi 2D dan 3D', 9, ''),
(65, 'M41', 'Pemodelan Perangkat Lunak', 6, ''),
(66, 'M42', 'Basis Data', 6, ''),
(67, 'M43', 'Pemrograman Berorientasi Objek', 4, ''),
(68, 'M44', 'Pemrograman Web & Pemrograman Bergerak', 5, ''),
(69, 'M45', 'Bahasa Indonesia (XII)', 2, ''),
(70, 'M46', 'Komputer Grafis', 7, ''),
(71, 'M47', 'Desain Media Interaktif', 9, ''),
(72, 'M48', 'Tek. Peng. Audio Vidio', 9, ''),
(73, 'M49', 'Bahasa Inggris (XII)', 4, ''),
(74, 'M50', 'Produk Kreatif & KWU (XII)', 8, ''),
(75, 'M51', 'Fotografi (XII)', 4, ''),
(76, 'M52', 'Adm Sistem Jaringan (XII)', 7, ''),
(77, 'M53', 'Teknik Layanan Jaringan (XII)', 3, ''),
(78, 'M54', 'Pemrograman Berorientasi Objek (XII)', 7, ''),
(79, 'M55', 'Pemrograman Web & Pemrograman Bergerak (XII)', 7, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` char(1) NOT NULL COMMENT 'y=yes, n=no',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`, `date_created`) VALUES
(1, 'Kelola Pengguna', 'superadmin/user', 'fas fa-user-tie', 0, 'y', '2021-10-31 10:01:15'),
(2, 'Kelola Level Pengguna', 'superadmin/user/user_level', 'fas fa-users-cog', 0, 'y', '2021-10-31 10:01:15'),
(3, 'Kelola Menu', 'superadmin/menu', 'fas fa-ellipsis-v', 0, 'y', '2021-10-31 10:01:15'),
(4, 'Kelola Hak Akses', 'superadmin/access', 'fab fa-accessible-icon', 0, 'y', '2021-10-31 10:01:15'),
(14, 'Mata Pelajaran', 'admin/mapel', 'fas fa-book', 17, 'y', '2021-11-03 05:19:56'),
(15, 'Guru', 'admin/guru', 'fas fa-user-tie', 17, 'y', '2021-11-03 05:21:24'),
(16, 'Kelas', 'admin/kelas', 'fas fa-school', 17, 'y', '2021-11-03 05:22:34'),
(17, 'Data Input', '-', 'fas fa-archive', 0, 'y', '2021-11-03 09:15:03'),
(18, 'Penjadwalan', 'admin/jadwal', 'fas fa-calendar', 0, 'y', '2021-12-06 02:32:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL DEFAULT 'namapengguna',
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `date_registration` timestamp NOT NULL DEFAULT current_timestamp(),
  `picture_profile` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `nama_pengguna`, `password`, `user_level`, `date_registration`, `picture_profile`) VALUES
(1, 'superadmin', 'MFYS', 'admin', 1, '2021-10-31 06:14:31', 'b9f85df67f85fe05c3768a826ad20952.jpg'),
(10, 'adminakademik', 'Akademik', '$2y$10$ab.PAnHmGnWS6aWMwjWMOeklI1ttbIz39TqmDHkYn5HT3iXmmYnn6', 4, '2021-11-03 05:24:16', '7fb9134919ff83cc2e1b2da4891e2aae.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modificate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id`, `nama`, `date_created`, `date_modificate`) VALUES
(1, 'Super Admin', '2021-10-31 05:38:30', '2021-10-31 05:38:30'),
(4, 'Wakil Kepala Sekolah (Kurikulum)', '2021-11-01 09:52:20', '2021-11-01 09:52:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_ajar`
--
ALTER TABLE `tbl_ajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_aktivitas`
--
ALTER TABLE `tbl_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indeks untuk tabel `tbl_hari`
--
ALTER TABLE `tbl_hari`
  ADD PRIMARY KEY (`hari_id`);

--
-- Indeks untuk tabel `tbl_jam`
--
ALTER TABLE `tbl_jam`
  ADD PRIMARY KEY (`jam_id`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_ajar`
--
ALTER TABLE `tbl_ajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT untuk tabel `tbl_aktivitas`
--
ALTER TABLE `tbl_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563;

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_hari`
--
ALTER TABLE `tbl_hari`
  MODIFY `hari_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_jam`
--
ALTER TABLE `tbl_jam`
  MODIFY `jam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
