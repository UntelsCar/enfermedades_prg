-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-06-2025 a las 23:42:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `enfermedades_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE `atencion` (
  `idatencion` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `fechahora` datetime NOT NULL,
  `resultado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`idatencion`, `idpaciente`, `fechahora`, `resultado`) VALUES
(1, 1, '2025-06-17 13:43:11', 'COVID-19'),
(2, 3, '2025-06-17 15:20:00', 'COVID-19'),
(3, 16, '2025-06-17 15:20:16', 'COVID-19'),
(4, 26, '2025-06-17 15:20:37', 'Mononucleosis Infecciosa'),
(5, 9, '2025-06-17 15:23:31', 'Mononucleosis Infecciosa'),
(6, 15, '2025-06-17 15:23:50', 'Mononucleosis Infecciosa'),
(7, 26, '2025-06-17 15:24:33', 'Dengue Clasico'),
(8, 26, '2025-06-17 15:24:41', 'Dengue Clasico'),
(9, 26, '2025-06-17 15:24:58', 'Dengue Clasico'),
(10, 20, '2025-06-17 15:25:11', 'Dengue Clasico'),
(11, 24, '2025-06-17 15:26:19', 'Sarampion'),
(12, 26, '2025-06-17 15:26:31', 'Sarampion'),
(13, 26, '2025-06-19 22:36:51', 'La informacion no es suficiente'),
(14, 26, '2025-06-19 22:37:30', 'La informacion no es suficiente'),
(15, 26, '2025-06-19 22:38:27', 'nEnfermedad2'),
(16, 26, '2025-06-19 22:39:10', 'nEnfermedad2'),
(17, 26, '2025-06-19 22:39:43', 'nEnfermedad2'),
(18, 26, '2025-06-19 22:39:50', 'La informacion no es suficiente'),
(19, 26, '2025-06-19 22:39:56', 'La informacion no es suficiente'),
(20, 26, '2025-06-19 22:40:03', 'La informacion no es suficiente'),
(21, 26, '2025-06-19 22:40:10', 'nEnfermedad2'),
(22, 26, '2025-06-19 22:40:21', 'nEnfermedad2'),
(23, 26, '2025-06-19 22:40:29', 'nEnfermedad2'),
(24, 26, '2025-06-19 22:46:04', 'nEnfermedad2'),
(25, 26, '2025-06-19 22:46:20', 'nEnfermedad2'),
(26, 26, '2025-06-19 22:47:31', 'nEnfermedad2'),
(27, 26, '2025-06-19 22:47:49', 'Mononucleosis Infecciosa'),
(28, 26, '2025-06-19 22:48:12', 'Mononucleosis Infecciosa'),
(29, 26, '2025-06-19 22:48:45', 'nEnfermedad2'),
(30, 26, '2025-06-19 23:19:20', 'amargo'),
(31, 26, '2025-06-19 23:25:00', 'nEnfermedad2'),
(32, 26, '2025-06-19 23:43:09', 'amargo'),
(33, 26, '2025-06-19 23:43:23', 'La informacion no es suficiente'),
(34, 26, '2025-06-20 15:11:11', 'nEnfermedad2'),
(35, 26, '2025-06-20 15:12:22', 'nEnfermedad2'),
(36, 26, '2025-06-20 15:13:35', 'papu'),
(37, 26, '2025-06-20 15:14:19', 'jalados'),
(38, 26, '2025-06-20 16:07:38', 'probando'),
(39, 26, '2025-06-20 16:17:52', 'COVID-19'),
(40, 26, '2025-06-20 16:18:40', 'Dengue Clasico'),
(41, 26, '2025-06-20 16:19:33', 'Sarampion'),
(42, 26, '2025-06-20 16:22:02', 'prueba dos'),
(43, 26, '2025-06-20 16:34:39', 'enfermedad1'),
(44, 26, '2025-06-20 16:40:12', 'enfermedad2'),
(45, 26, '2025-06-20 16:40:49', 'Mononucleosis Infecciosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion_sintoma`
--

CREATE TABLE `atencion_sintoma` (
  `idatencionsintoma` int(11) NOT NULL,
  `idatencion` int(11) NOT NULL,
  `idsintoma` int(11) NOT NULL,
  `respuesta` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `atencion_sintoma`
--

INSERT INTO `atencion_sintoma` (`idatencionsintoma`, `idatencion`, `idsintoma`, `respuesta`) VALUES
(1, 1, 1, 's'),
(2, 1, 2, 's'),
(3, 1, 3, 'n'),
(4, 1, 4, 'n'),
(5, 1, 5, 'n'),
(6, 1, 6, 'n'),
(7, 1, 7, 'n'),
(8, 1, 8, 'n'),
(9, 1, 9, 'n'),
(10, 1, 10, 'n'),
(11, 1, 11, 'n'),
(12, 2, 1, 's'),
(13, 2, 2, 's'),
(14, 2, 3, 's'),
(15, 2, 4, 's'),
(16, 2, 5, 's'),
(17, 2, 6, 'n'),
(18, 2, 7, 'n'),
(19, 2, 8, 'n'),
(20, 2, 9, 'n'),
(21, 2, 10, 'n'),
(22, 2, 11, 'n'),
(23, 3, 1, 'n'),
(24, 3, 2, 'n'),
(25, 3, 3, 'n'),
(26, 3, 4, 'n'),
(27, 3, 5, 'n'),
(28, 3, 6, 'n'),
(29, 3, 7, 'n'),
(30, 3, 8, 's'),
(31, 3, 9, 's'),
(32, 3, 10, 's'),
(33, 3, 11, 's'),
(34, 4, 1, 's'),
(35, 4, 2, 's'),
(36, 4, 3, 's'),
(37, 4, 4, 'n'),
(38, 4, 5, 'n'),
(39, 4, 6, 's'),
(40, 4, 7, 'n'),
(41, 4, 8, 'n'),
(42, 4, 9, 'n'),
(43, 4, 10, 'n'),
(44, 4, 11, 'n'),
(45, 5, 1, 's'),
(46, 5, 2, 's'),
(47, 5, 3, 's'),
(48, 5, 4, 'n'),
(49, 5, 5, 'n'),
(50, 5, 6, 's'),
(51, 5, 7, 'n'),
(52, 5, 8, 'n'),
(53, 5, 9, 'n'),
(54, 5, 10, 'n'),
(55, 5, 11, 'n'),
(56, 6, 1, 's'),
(57, 6, 2, 's'),
(58, 6, 3, 's'),
(59, 6, 4, 'n'),
(60, 6, 5, 'n'),
(61, 6, 6, 's'),
(62, 6, 7, 'n'),
(63, 6, 8, 'n'),
(64, 6, 9, 'n'),
(65, 6, 10, 'n'),
(66, 6, 11, 'n'),
(67, 7, 1, 's'),
(68, 7, 2, 's'),
(69, 7, 3, 'n'),
(70, 7, 4, 's'),
(71, 7, 5, 's'),
(72, 7, 6, 'n'),
(73, 7, 7, 'n'),
(74, 7, 8, 'n'),
(75, 7, 9, 'n'),
(76, 7, 10, 'n'),
(77, 7, 11, 'n'),
(78, 8, 1, 's'),
(79, 8, 2, 's'),
(80, 8, 3, 'n'),
(81, 8, 4, 's'),
(82, 8, 5, 's'),
(83, 8, 6, 'n'),
(84, 8, 7, 'n'),
(85, 8, 8, 'n'),
(86, 8, 9, 'n'),
(87, 8, 10, 'n'),
(88, 8, 11, 'n'),
(89, 9, 1, 's'),
(90, 9, 2, 's'),
(91, 9, 3, 'n'),
(92, 9, 4, 's'),
(93, 9, 5, 's'),
(94, 9, 6, 'n'),
(95, 9, 7, 'n'),
(96, 9, 8, 'n'),
(97, 9, 9, 'n'),
(98, 9, 10, 'n'),
(99, 9, 11, 'n'),
(100, 10, 1, 's'),
(101, 10, 2, 's'),
(102, 10, 3, 'n'),
(103, 10, 4, 's'),
(104, 10, 5, 's'),
(105, 10, 6, 'n'),
(106, 10, 7, 'n'),
(107, 10, 8, 'n'),
(108, 10, 9, 'n'),
(109, 10, 10, 'n'),
(110, 10, 11, 'n'),
(111, 11, 1, 's'),
(112, 11, 2, 'n'),
(113, 11, 3, 's'),
(114, 11, 4, 's'),
(115, 11, 5, 'n'),
(116, 11, 6, 'n'),
(117, 11, 7, 's'),
(118, 11, 8, 'n'),
(119, 11, 9, 'n'),
(120, 11, 10, 'n'),
(121, 11, 11, 'n'),
(122, 12, 1, 's'),
(123, 12, 2, 'n'),
(124, 12, 3, 's'),
(125, 12, 4, 's'),
(126, 12, 5, 'n'),
(127, 12, 6, 'n'),
(128, 12, 7, 's'),
(129, 12, 8, 'n'),
(130, 12, 9, 'n'),
(131, 12, 10, 'n'),
(132, 12, 11, 'n'),
(133, 13, 1, 's'),
(134, 13, 2, 's'),
(135, 13, 3, 's'),
(136, 13, 4, 'n'),
(137, 13, 5, 'n'),
(138, 13, 6, 'n'),
(139, 13, 7, 'n'),
(140, 13, 8, 'n'),
(141, 13, 9, 'n'),
(142, 13, 10, 'n'),
(143, 13, 11, 'n'),
(144, 13, 12, 'n'),
(145, 13, 13, 'n'),
(146, 14, 1, 's'),
(147, 14, 2, 's'),
(148, 14, 3, 'n'),
(149, 14, 4, 'n'),
(150, 14, 5, 's'),
(151, 14, 6, 'n'),
(152, 14, 7, 'n'),
(153, 14, 8, 'n'),
(154, 14, 9, 'n'),
(155, 14, 10, 'n'),
(156, 14, 11, 'n'),
(157, 14, 12, 'n'),
(158, 14, 13, 'n'),
(159, 15, 1, 'n'),
(160, 15, 2, 'n'),
(161, 15, 3, 'n'),
(162, 15, 4, 'n'),
(163, 15, 5, 'n'),
(164, 15, 6, 'n'),
(165, 15, 7, 'n'),
(166, 15, 8, 'n'),
(167, 15, 9, 'n'),
(168, 15, 10, 'n'),
(169, 15, 11, 'n'),
(170, 15, 12, 's'),
(171, 15, 13, 's'),
(172, 16, 1, 'n'),
(173, 16, 2, 'n'),
(174, 16, 3, 'n'),
(175, 16, 4, 'n'),
(176, 16, 5, 'n'),
(177, 16, 6, 'n'),
(178, 16, 7, 'n'),
(179, 16, 8, 'n'),
(180, 16, 9, 'n'),
(181, 16, 10, 's'),
(182, 16, 11, 'n'),
(183, 16, 12, 's'),
(184, 16, 13, 's'),
(185, 17, 1, 'n'),
(186, 17, 2, 'n'),
(187, 17, 3, 'n'),
(188, 17, 4, 'n'),
(189, 17, 5, 'n'),
(190, 17, 6, 'n'),
(191, 17, 7, 'n'),
(192, 17, 8, 's'),
(193, 17, 9, 'n'),
(194, 17, 10, 'n'),
(195, 17, 11, 'n'),
(196, 17, 12, 's'),
(197, 17, 13, 's'),
(198, 18, 1, 'n'),
(199, 18, 2, 'n'),
(200, 18, 3, 'n'),
(201, 18, 4, 'n'),
(202, 18, 5, 'n'),
(203, 18, 6, 's'),
(204, 18, 7, 's'),
(205, 18, 8, 'n'),
(206, 18, 9, 'n'),
(207, 18, 10, 'n'),
(208, 18, 11, 'n'),
(209, 18, 12, 'n'),
(210, 18, 13, 'n'),
(211, 19, 1, 'n'),
(212, 19, 2, 'n'),
(213, 19, 3, 'n'),
(214, 19, 4, 'n'),
(215, 19, 5, 'n'),
(216, 19, 6, 's'),
(217, 19, 7, 'n'),
(218, 19, 8, 'n'),
(219, 19, 9, 'n'),
(220, 19, 10, 'n'),
(221, 19, 11, 'n'),
(222, 19, 12, 's'),
(223, 19, 13, 'n'),
(224, 20, 1, 'n'),
(225, 20, 2, 'n'),
(226, 20, 3, 'n'),
(227, 20, 4, 'n'),
(228, 20, 5, 'n'),
(229, 20, 6, 'n'),
(230, 20, 7, 'n'),
(231, 20, 8, 'n'),
(232, 20, 9, 'n'),
(233, 20, 10, 'n'),
(234, 20, 11, 'n'),
(235, 20, 12, 'n'),
(236, 20, 13, 's'),
(237, 21, 1, 'n'),
(238, 21, 2, 'n'),
(239, 21, 3, 'n'),
(240, 21, 4, 'n'),
(241, 21, 5, 'n'),
(242, 21, 6, 'n'),
(243, 21, 7, 'n'),
(244, 21, 8, 'n'),
(245, 21, 9, 'n'),
(246, 21, 10, 'n'),
(247, 21, 11, 's'),
(248, 21, 12, 's'),
(249, 21, 13, 's'),
(250, 22, 1, 'n'),
(251, 22, 2, 'n'),
(252, 22, 3, 'n'),
(253, 22, 4, 'n'),
(254, 22, 5, 'n'),
(255, 22, 6, 'n'),
(256, 22, 7, 'n'),
(257, 22, 8, 'n'),
(258, 22, 9, 's'),
(259, 22, 10, 'n'),
(260, 22, 11, 'n'),
(261, 22, 12, 's'),
(262, 22, 13, 's'),
(263, 23, 1, 'n'),
(264, 23, 2, 'n'),
(265, 23, 3, 'n'),
(266, 23, 4, 'n'),
(267, 23, 5, 'n'),
(268, 23, 6, 'n'),
(269, 23, 7, 'n'),
(270, 23, 8, 'n'),
(271, 23, 9, 'n'),
(272, 23, 10, 's'),
(273, 23, 11, 'n'),
(274, 23, 12, 's'),
(275, 23, 13, 's'),
(276, 24, 1, 'n'),
(277, 24, 2, 'n'),
(278, 24, 3, 'n'),
(279, 24, 4, 'n'),
(280, 24, 5, 'n'),
(281, 24, 6, 'n'),
(282, 24, 7, 'n'),
(283, 24, 8, 'n'),
(284, 24, 9, 'n'),
(285, 24, 10, 's'),
(286, 24, 11, 'n'),
(287, 24, 12, 's'),
(288, 24, 13, 's'),
(289, 25, 1, 'n'),
(290, 25, 2, 'n'),
(291, 25, 3, 'n'),
(292, 25, 4, 'n'),
(293, 25, 5, 'n'),
(294, 25, 6, 'n'),
(295, 25, 7, 'n'),
(296, 25, 8, 'n'),
(297, 25, 9, 'n'),
(298, 25, 10, 's'),
(299, 25, 11, 'n'),
(300, 25, 12, 's'),
(301, 25, 13, 's'),
(302, 26, 1, 'n'),
(303, 26, 2, 'n'),
(304, 26, 3, 'n'),
(305, 26, 4, 'n'),
(306, 26, 5, 'n'),
(307, 26, 6, 'n'),
(308, 26, 7, 'n'),
(309, 26, 8, 'n'),
(310, 26, 9, 'n'),
(311, 26, 10, 's'),
(312, 26, 11, 's'),
(313, 26, 12, 's'),
(314, 26, 13, 's'),
(315, 27, 1, 's'),
(316, 27, 2, 's'),
(317, 27, 3, 's'),
(318, 27, 4, 'n'),
(319, 27, 5, 'n'),
(320, 27, 6, 's'),
(321, 27, 7, 'n'),
(322, 27, 8, 'n'),
(323, 27, 9, 'n'),
(324, 27, 10, 'n'),
(325, 27, 11, 'n'),
(326, 27, 12, 'n'),
(327, 27, 13, 'n'),
(328, 28, 1, 's'),
(329, 28, 2, 's'),
(330, 28, 3, 's'),
(331, 28, 4, 'n'),
(332, 28, 5, 'n'),
(333, 28, 6, 's'),
(334, 28, 7, 'n'),
(335, 28, 8, 'n'),
(336, 28, 9, 'n'),
(337, 28, 10, 'n'),
(338, 28, 11, 'n'),
(339, 28, 12, 'n'),
(340, 28, 13, 'n'),
(341, 29, 1, 'n'),
(342, 29, 2, 'n'),
(343, 29, 3, 'n'),
(344, 29, 4, 'n'),
(345, 29, 5, 'n'),
(346, 29, 6, 'n'),
(347, 29, 7, 'n'),
(348, 29, 8, 'n'),
(349, 29, 9, 'n'),
(350, 29, 10, 's'),
(351, 29, 11, 's'),
(352, 29, 12, 's'),
(353, 29, 13, 's'),
(354, 30, 1, 'n'),
(355, 30, 2, 'n'),
(356, 30, 3, 'n'),
(357, 30, 4, 'n'),
(358, 30, 5, 'n'),
(359, 30, 6, 'n'),
(360, 30, 7, 'n'),
(361, 30, 8, 'n'),
(362, 30, 9, 'n'),
(363, 30, 10, 's'),
(364, 30, 11, 's'),
(365, 30, 12, 's'),
(366, 30, 13, 's'),
(367, 31, 1, 'n'),
(368, 31, 2, 'n'),
(369, 31, 3, 'n'),
(370, 31, 4, 'n'),
(371, 31, 5, 'n'),
(372, 31, 6, 'n'),
(373, 31, 7, 'n'),
(374, 31, 8, 'n'),
(375, 31, 9, 'n'),
(376, 31, 10, 's'),
(377, 31, 11, 's'),
(378, 31, 12, 's'),
(379, 31, 13, 's'),
(380, 32, 1, 'n'),
(381, 32, 2, 'n'),
(382, 32, 3, 'n'),
(383, 32, 4, 'n'),
(384, 32, 5, 'n'),
(385, 32, 6, 'n'),
(386, 32, 7, 'n'),
(387, 32, 8, 'n'),
(388, 32, 9, 'n'),
(389, 32, 10, 's'),
(390, 32, 11, 's'),
(391, 32, 12, 's'),
(392, 32, 13, 's'),
(393, 33, 1, 's'),
(394, 33, 2, 'n'),
(395, 33, 3, 'n'),
(396, 33, 4, 'n'),
(397, 33, 5, 'n'),
(398, 33, 6, 'n'),
(399, 33, 7, 'n'),
(400, 33, 8, 'n'),
(401, 33, 9, 'n'),
(402, 33, 10, 'n'),
(403, 33, 11, 'n'),
(404, 33, 12, 'n'),
(405, 33, 13, 'n'),
(406, 34, 1, 'n'),
(407, 34, 2, 's'),
(408, 34, 3, 'n'),
(409, 34, 4, 'n'),
(410, 34, 5, 'n'),
(411, 34, 6, 'n'),
(412, 34, 7, 'n'),
(413, 34, 8, 'n'),
(414, 34, 9, 'n'),
(415, 34, 10, 's'),
(416, 34, 11, 'n'),
(417, 34, 12, 's'),
(418, 34, 13, 's'),
(419, 35, 1, 'n'),
(420, 35, 2, 's'),
(421, 35, 3, 'n'),
(422, 35, 4, 'n'),
(423, 35, 5, 'n'),
(424, 35, 6, 'n'),
(425, 35, 7, 'n'),
(426, 35, 8, 'n'),
(427, 35, 9, 'n'),
(428, 35, 10, 's'),
(429, 35, 11, 'n'),
(430, 35, 12, 's'),
(431, 35, 13, 's'),
(432, 36, 1, 'n'),
(433, 36, 2, 's'),
(434, 36, 3, 'n'),
(435, 36, 4, 'n'),
(436, 36, 5, 'n'),
(437, 36, 6, 'n'),
(438, 36, 7, 'n'),
(439, 36, 8, 'n'),
(440, 36, 9, 'n'),
(441, 36, 10, 's'),
(442, 36, 11, 'n'),
(443, 36, 12, 's'),
(444, 36, 13, 's'),
(445, 37, 1, 's'),
(446, 37, 2, 'n'),
(447, 37, 3, 's'),
(448, 37, 4, 'n'),
(449, 37, 5, 's'),
(450, 37, 6, 'n'),
(451, 37, 7, 'n'),
(452, 37, 8, 'n'),
(453, 37, 9, 'n'),
(454, 37, 10, 'n'),
(455, 37, 11, 'n'),
(456, 37, 12, 'n'),
(457, 37, 13, 's'),
(458, 38, 1, 's'),
(459, 38, 2, 'n'),
(460, 38, 3, 's'),
(461, 38, 4, 'n'),
(462, 38, 5, 'n'),
(463, 38, 6, 'n'),
(464, 38, 7, 'n'),
(465, 38, 8, 'n'),
(466, 38, 9, 'n'),
(467, 38, 11, 'n'),
(468, 38, 13, 'n'),
(469, 38, 14, 's'),
(470, 39, 1, 's'),
(471, 39, 2, 's'),
(472, 39, 3, 's'),
(473, 39, 4, 's'),
(474, 39, 5, 's'),
(475, 39, 6, 's'),
(476, 39, 7, 'n'),
(477, 39, 8, 's'),
(478, 39, 9, 'n'),
(479, 39, 11, 'n'),
(480, 39, 13, 'n'),
(481, 39, 14, 'n'),
(482, 40, 1, 's'),
(483, 40, 2, 's'),
(484, 40, 3, 's'),
(485, 40, 4, 'n'),
(486, 40, 5, 's'),
(487, 40, 6, 'n'),
(488, 40, 7, 'n'),
(489, 40, 8, 'n'),
(490, 40, 9, 'n'),
(491, 40, 11, 'n'),
(492, 40, 13, 'n'),
(493, 40, 14, 'n'),
(494, 41, 1, 's'),
(495, 41, 2, 'n'),
(496, 41, 3, 'n'),
(497, 41, 4, 's'),
(498, 41, 5, 'n'),
(499, 41, 6, 'n'),
(500, 41, 7, 's'),
(501, 41, 8, 'n'),
(502, 41, 9, 'n'),
(503, 41, 11, 'n'),
(504, 41, 13, 'n'),
(505, 41, 14, 'n'),
(506, 42, 1, 'n'),
(507, 42, 2, 'n'),
(508, 42, 3, 'n'),
(509, 42, 4, 'n'),
(510, 42, 5, 'n'),
(511, 42, 6, 's'),
(512, 42, 7, 'n'),
(513, 42, 8, 's'),
(514, 42, 9, 'n'),
(515, 42, 11, 's'),
(516, 42, 13, 'n'),
(517, 42, 14, 's'),
(518, 43, 1, 'n'),
(519, 43, 2, 'n'),
(520, 43, 3, 'n'),
(521, 43, 4, 'n'),
(522, 43, 5, 'n'),
(523, 43, 6, 'n'),
(524, 43, 7, 'n'),
(525, 43, 8, 'n'),
(526, 43, 9, 'n'),
(527, 43, 11, 'n'),
(528, 43, 15, 's'),
(529, 43, 16, 's'),
(530, 44, 1, 'n'),
(531, 44, 2, 'n'),
(532, 44, 3, 'n'),
(533, 44, 4, 'n'),
(534, 44, 5, 'n'),
(535, 44, 6, 'n'),
(536, 44, 7, 'n'),
(537, 44, 8, 'n'),
(538, 44, 9, 's'),
(539, 44, 11, 's'),
(540, 44, 15, 's'),
(541, 44, 16, 's'),
(542, 45, 1, 's'),
(543, 45, 2, 's'),
(544, 45, 3, 'n'),
(545, 45, 4, 'n'),
(546, 45, 5, 'n'),
(547, 45, 6, 's'),
(548, 45, 7, 'n'),
(549, 45, 8, 'n'),
(550, 45, 9, 'n'),
(551, 45, 11, 's'),
(552, 45, 15, 'n'),
(553, 45, 16, 'n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `idmedico` int(11) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `colegiado` varchar(20) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`idmedico`, `apellidos`, `nombres`, `colegiado`, `idusuario`) VALUES
(1, 'Bravo Veintemilla', 'Jorge Alberto', '123456', 1),
(2, 'Peña Chirinos', 'Carlos Joel', '12345', 2),
(3, 'Fernandez Huaman', 'Andre Rafael', '54321', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `idmedico` int(11) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `dni` char(8) NOT NULL,
  `fechahora` datetime NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `idmedico`, `apellidos`, `nombres`, `dni`, `fechahora`, `idusuario`) VALUES
(1, 1, 'diaz', 'carlos', '91048309', '2021-07-18 00:25:10', 2),
(3, 1, 'Bravo Veintemilla', 'Jorge Alberto', '71123093', '2025-06-13 02:51:45', 6),
(5, 1, 'BRAVO', 'ALBERTO', '71123093', '2025-06-13 02:56:30', 8),
(7, 1, 'peña', 'carlos', '12345678', '2025-06-13 17:26:37', 11),
(8, 1, 'moises', 'jose', '12345678', '2025-06-13 17:27:50', 12),
(9, 1, 'torres', 'henry', '12345678', '2025-06-13 17:30:42', 13),
(14, 1, 'herrera', 'hans', '12345678', '2025-06-13 17:36:31', 18),
(15, 1, 'herrera', 'hans', '12345678', '2025-06-13 17:38:03', 19),
(16, 1, 'herrera', 'hans', '12345678', '2025-06-13 17:38:15', 20),
(17, 1, 'caballero', 'diego', '12345678', '2025-06-13 17:38:39', 21),
(18, 1, 'caballero', 'diego', '12345678', '2025-06-13 17:40:20', 22),
(20, 1, 'diego', 'juand', '12345678', '2025-06-13 17:40:46', 24),
(22, 1, 'bravo', 'jose', '12345678', '2025-06-13 17:45:53', 26),
(23, 1, 'calderon', 'jorge', '12345678', '2025-06-13 17:46:34', 27),
(24, 1, 'fernandez', 'luis', '12345678', '2025-06-13 17:46:46', 28),
(25, 2, 'torres', 'henry fabian', '95245865', '2025-06-17 13:42:01', 32),
(26, 2, 'paciente', 'nuevo', '91048309', '2025-06-17 13:42:42', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintoma`
--

CREATE TABLE `sintoma` (
  `idsintoma` int(11) NOT NULL,
  `sintoma` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `sintoma`
--

INSERT INTO `sintoma` (`idsintoma`, `sintoma`, `estado`) VALUES
(1, 'Fiebre', 'a'),
(2, 'Dolor de cabeza', 'a'),
(3, 'Nauseas', 'a'),
(4, 'Tos seca', 'a'),
(5, 'Dolor muscular', 'a'),
(6, 'Fatiga', 'a'),
(7, 'Erupcion cutanea', 'a'),
(8, 'Perdida del olfato y/o gusto', 'a'),
(9, 'Faringitis', 'a'),
(11, 'Hinchazon en los brazos', 'a'),
(15, 'sintoma 1', ''),
(16, 'sintoma 2', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` char(1) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `rol`, `estado`) VALUES
(1, 'jbravo', '$2b$10$.bY8udvfapq.I54fxyByrOrNKG1TZD1iElznG7lui3WrxfFMm7qPC', 'm', 'a'),
(2, 'cpena', '$2b$10$.bY8udvfapq.I54fxyByrOrNKG1TZD1iElznG7lui3WrxfFMm7qPC', 'm', 'a'),
(3, 'afernandez', '$2y$10$UWPj3sbk3waDW1zbbxqfQe0.B7fMIeyM/ctwcMCVv964isAE0rn4K', 'm', 'a'),
(32, 'hfTorres', '$2y$10$OoGNBPleG40waNeZDZ07yecVgPVWC3H.6SfWuFEIRAQUHZnEvCTbC', 'p', 'a'),
(33, 'nupaciente', '$2y$10$iw..W0XFdvnxYOOOffG9Ce2W7I3.f0Tz0waloqOOqbUiOW8Qy71fG', 'p', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`idatencion`);

--
-- Indices de la tabla `atencion_sintoma`
--
ALTER TABLE `atencion_sintoma`
  ADD PRIMARY KEY (`idatencionsintoma`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idmedico`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `sintoma`
--
ALTER TABLE `sintoma`
  ADD PRIMARY KEY (`idsintoma`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atencion`
--
ALTER TABLE `atencion`
  MODIFY `idatencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `atencion_sintoma`
--
ALTER TABLE `atencion_sintoma`
  MODIFY `idatencionsintoma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=554;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `idmedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `sintoma`
--
ALTER TABLE `sintoma`
  MODIFY `idsintoma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
