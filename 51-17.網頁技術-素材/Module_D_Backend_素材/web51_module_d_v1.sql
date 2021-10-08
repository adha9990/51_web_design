-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 09:07 PM
-- Server version: 10.4.6-MariaDB-log
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web51_module_d`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `ad_request_id` int(10) UNSIGNED DEFAULT NULL COMMENT '精選申請ID',
  `house_id` int(10) UNSIGNED NOT NULL COMMENT '房屋ID',
  `publish_start_date` timestamp NULL DEFAULT NULL COMMENT '發布起始時間',
  `publish_end_date` timestamp NULL DEFAULT NULL COMMENT '發布截止時間',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新時間',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='精選房屋';

-- --------------------------------------------------------

--
-- Table structure for table `ad_requests`
--

CREATE TABLE `ad_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `house_id` int(10) UNSIGNED NOT NULL COMMENT '房屋ID',
  `reviewer_id` int(10) UNSIGNED DEFAULT NULL COMMENT '審核者ID',
  `review_status` enum('REVIEWING','APPROVE','REJECT') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'REVIEWING' COMMENT '審核狀態',
  `reviewed_at` timestamp NULL DEFAULT NULL COMMENT '審核日期',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='精選房屋申請';

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL COMMENT '縣市ID',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '鄉鎮市區'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='鄉鎮市區';

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `city_id`, `name`) VALUES
(27, 1, '士林區'),
(28, 1, '大同區'),
(29, 1, '大安區'),
(30, 1, '中山區'),
(31, 1, '中正區'),
(32, 1, '內湖區'),
(33, 1, '文山區'),
(34, 1, '北投區'),
(35, 1, '松山區'),
(36, 1, '信義區'),
(37, 1, '南港區'),
(38, 1, '萬華區'),
(39, 2, '七堵區'),
(40, 2, '中山區'),
(41, 2, '中正區'),
(42, 2, '仁愛區'),
(43, 2, '安樂區'),
(44, 2, '信義區'),
(45, 2, '暖暖區'),
(46, 3, '八里區'),
(47, 3, '三芝區'),
(48, 3, '三重區'),
(49, 3, '三峽區'),
(50, 3, '土城區'),
(51, 3, '中和區'),
(52, 3, '五股區'),
(53, 3, '平溪區'),
(54, 3, '永和區'),
(55, 3, '石門區'),
(56, 3, '石碇區'),
(57, 3, '汐止區'),
(58, 3, '坪林區'),
(59, 3, '板橋區'),
(60, 3, '林口區'),
(61, 3, '金山區'),
(62, 3, '泰山區'),
(63, 3, '烏來區'),
(64, 3, '貢寮區'),
(65, 3, '淡水區'),
(66, 3, '深坑區'),
(67, 3, '新店區'),
(68, 3, '新莊區'),
(69, 3, '瑞芳區'),
(70, 3, '萬里區'),
(71, 3, '樹林區'),
(72, 3, '雙溪區'),
(73, 3, '蘆洲區'),
(74, 3, '鶯歌區'),
(75, 4, '八德區'),
(76, 4, '大園區'),
(77, 4, '大溪區'),
(78, 4, '中壢區'),
(79, 4, '平鎮區'),
(80, 4, '桃園區'),
(81, 4, '復興區'),
(82, 4, '新屋區'),
(83, 4, '楊梅區'),
(84, 4, '龍潭區'),
(85, 4, '龜山區'),
(86, 4, '蘆竹區'),
(87, 4, '觀音區'),
(88, 5, '北區'),
(89, 5, '東區'),
(90, 5, '香山區'),
(91, 6, '五峰鄉'),
(92, 6, '北埔鄉'),
(93, 6, '尖石鄉'),
(94, 6, '竹北市'),
(95, 6, '竹東鎮'),
(96, 6, '芎林鄉'),
(97, 6, '峨眉鄉'),
(98, 6, '湖口鄉'),
(99, 6, '新埔鎮'),
(100, 6, '新豐鄉'),
(101, 6, '橫山鄉'),
(102, 6, '關西鎮'),
(103, 6, '寶山鄉'),
(104, 7, '三義鄉'),
(105, 7, '三灣鄉'),
(106, 7, '大湖鄉'),
(107, 7, '公館鄉'),
(108, 7, '竹南鎮'),
(109, 7, '西湖鄉'),
(110, 7, '卓蘭鎮'),
(111, 7, '南庄鄉'),
(112, 7, '後龍鎮'),
(113, 7, '苑裡鎮'),
(114, 7, '苗栗市'),
(115, 7, '泰安鄉'),
(116, 7, '通霄鎮'),
(117, 7, '造橋鄉'),
(118, 7, '獅潭鄉'),
(119, 7, '銅鑼鄉'),
(120, 7, '頭份市'),
(121, 7, '頭屋鄉'),
(122, 8, '大甲區'),
(123, 8, '大安區'),
(124, 8, '大肚區'),
(125, 8, '大里區'),
(126, 8, '大雅區'),
(127, 8, '中區'),
(128, 8, '太平區'),
(129, 8, '北屯區'),
(130, 8, '北區'),
(131, 8, '外埔區'),
(132, 8, '石岡區'),
(133, 8, '后里區'),
(134, 8, '西屯區'),
(135, 8, '西區'),
(136, 8, '沙鹿區'),
(137, 8, '和平區'),
(138, 8, '東區'),
(139, 8, '東勢區'),
(140, 8, '南屯區'),
(141, 8, '南區'),
(142, 8, '烏日區'),
(143, 8, '神岡區'),
(144, 8, '梧棲區'),
(145, 8, '清水區'),
(146, 8, '新社區'),
(147, 8, '潭子區'),
(148, 8, '龍井區'),
(149, 8, '豐原區'),
(150, 8, '霧峰區'),
(151, 9, '二水鄉'),
(152, 9, '二林鎮'),
(153, 9, '大村鄉'),
(154, 9, '大城鄉'),
(155, 9, '北斗鎮'),
(156, 9, '永靖鄉'),
(157, 9, '田中鎮'),
(158, 9, '田尾鄉'),
(159, 9, '竹塘鄉'),
(160, 9, '伸港鄉'),
(161, 9, '秀水鄉'),
(162, 9, '和美鎮'),
(163, 9, '社頭鄉'),
(164, 9, '芬園鄉'),
(165, 9, '花壇鄉'),
(166, 9, '芳苑鄉'),
(167, 9, '員林市'),
(168, 9, '埔心鄉'),
(169, 9, '埔鹽鄉'),
(170, 9, '埤頭鄉'),
(171, 9, '鹿港鎮'),
(172, 9, '溪州鄉'),
(173, 9, '溪湖鎮'),
(174, 9, '彰化市'),
(175, 9, '福興鄉'),
(176, 9, '線西鄉'),
(177, 10, '中寮鄉'),
(178, 10, '仁愛鄉'),
(179, 10, '水里鄉'),
(180, 10, '名間鄉'),
(181, 10, '竹山鎮'),
(182, 10, '信義鄉'),
(183, 10, '南投市'),
(184, 10, '埔里鎮'),
(185, 10, '草屯鎮'),
(186, 10, '國姓鄉'),
(187, 10, '魚池鄉'),
(188, 10, '鹿谷鄉'),
(189, 10, '集集鎮'),
(190, 11, '二崙鄉'),
(191, 11, '口湖鄉'),
(192, 11, '土庫鎮'),
(193, 11, '大埤鄉'),
(194, 11, '元長鄉'),
(195, 11, '斗六市'),
(196, 11, '斗南鎮'),
(197, 11, '水林鄉'),
(198, 11, '北港鎮'),
(199, 11, '古坑鄉'),
(200, 11, '四湖鄉'),
(201, 11, '西螺鎮'),
(202, 11, '東勢鄉'),
(203, 11, '林內鄉'),
(204, 11, '虎尾鎮'),
(205, 11, '崙背鄉'),
(206, 11, '麥寮鄉'),
(207, 11, '莿桐鄉'),
(208, 11, '臺西鄉'),
(209, 11, '褒忠鄉'),
(210, 12, '西區'),
(211, 12, '東區'),
(212, 13, '大林鎮'),
(213, 13, '大埔鄉'),
(214, 13, '中埔鄉'),
(215, 13, '六腳鄉'),
(216, 13, '太保市'),
(217, 13, '水上鄉'),
(218, 13, '布袋鎮'),
(219, 13, '民雄鄉'),
(220, 13, '朴子市'),
(221, 13, '竹崎鄉'),
(222, 13, '東石鄉'),
(223, 13, '阿里山鄉'),
(224, 13, '梅山鄉'),
(225, 13, '鹿草鄉'),
(226, 13, '番路鄉'),
(227, 13, '新港鄉'),
(228, 13, '溪口鄉'),
(229, 13, '義竹鄉'),
(230, 14, '七股區'),
(231, 14, '下營區'),
(232, 14, '大內區'),
(233, 14, '山上區'),
(234, 14, '中西區'),
(235, 14, '仁德區'),
(236, 14, '六甲區'),
(237, 14, '北門區'),
(238, 14, '北區'),
(239, 14, '左鎮區'),
(240, 14, '永康區'),
(241, 14, '玉井區'),
(242, 14, '白河區'),
(243, 14, '安平區'),
(244, 14, '安定區'),
(245, 14, '安南區'),
(246, 14, '西港區'),
(247, 14, '佳里區'),
(248, 14, '官田區'),
(249, 14, '東山區'),
(250, 14, '東區'),
(251, 14, '南化區'),
(252, 14, '南區'),
(253, 14, '後壁區'),
(254, 14, '柳營區'),
(255, 14, '將軍區'),
(256, 14, '麻豆區'),
(257, 14, '善化區'),
(258, 14, '新化區'),
(259, 14, '新市區'),
(260, 14, '新營區'),
(261, 14, '楠西區'),
(262, 14, '學甲區'),
(263, 14, '龍崎區'),
(264, 14, '歸仁區'),
(265, 14, '關廟區'),
(266, 14, '鹽水區'),
(267, 15, '三民區'),
(268, 15, '大社區'),
(269, 15, '大寮區'),
(270, 15, '大樹區'),
(271, 15, '小港區'),
(272, 15, '仁武區'),
(273, 15, '內門區'),
(274, 15, '六龜區'),
(275, 15, '左營區'),
(276, 15, '永安區'),
(277, 15, '田寮區'),
(278, 15, '甲仙區'),
(279, 15, '杉林區'),
(280, 15, '那瑪夏區'),
(281, 15, '岡山區'),
(282, 15, '東沙群島'),
(283, 15, '林園區'),
(284, 15, '阿蓮區'),
(285, 15, '前金區'),
(286, 15, '前鎮區'),
(287, 15, '南沙群島'),
(288, 15, '美濃區'),
(289, 15, '苓雅區'),
(290, 15, '茂林區'),
(291, 15, '茄萣區'),
(292, 15, '桃源區'),
(293, 15, '梓官區'),
(294, 15, '鳥松區'),
(295, 15, '湖內區'),
(296, 15, '新興區'),
(297, 15, '楠梓區'),
(298, 15, '路竹區'),
(299, 15, '鼓山區'),
(300, 15, '旗山區'),
(301, 15, '旗津區'),
(302, 15, '鳳山區'),
(303, 15, '橋頭區'),
(304, 15, '燕巢區'),
(305, 15, '彌陀區'),
(306, 15, '鹽埕區'),
(307, 16, '九如鄉'),
(308, 16, '三地門鄉'),
(309, 16, '內埔鄉'),
(310, 16, '竹田鄉'),
(311, 16, '牡丹鄉'),
(312, 16, '車城鄉'),
(313, 16, '里港鄉'),
(314, 16, '佳冬鄉'),
(315, 16, '來義鄉'),
(316, 16, '東港鎮'),
(317, 16, '枋山鄉'),
(318, 16, '枋寮鄉'),
(319, 16, '林邊鄉'),
(320, 16, '長治鄉'),
(321, 16, '南州鄉'),
(322, 16, '屏東市'),
(323, 16, '恆春鎮'),
(324, 16, '春日鄉'),
(325, 16, '崁頂鄉'),
(326, 16, '泰武鄉'),
(327, 16, '琉球鄉'),
(328, 16, '高樹鄉'),
(329, 16, '新埤鄉'),
(330, 16, '新園鄉'),
(331, 16, '獅子鄉'),
(332, 16, '萬丹鄉'),
(333, 16, '萬巒鄉'),
(334, 16, '滿州鄉'),
(335, 16, '瑪家鄉'),
(336, 16, '潮州鎮'),
(337, 16, '霧臺鄉'),
(338, 16, '麟洛鄉'),
(339, 16, '鹽埔鄉'),
(340, 17, '大武鄉'),
(341, 17, '太麻里鄉'),
(342, 17, '成功鎮'),
(343, 17, '池上鄉'),
(344, 17, '卑南鄉'),
(345, 17, '延平鄉'),
(346, 17, '東河鄉'),
(347, 17, '金峰鄉'),
(348, 17, '長濱鄉'),
(349, 17, '海端鄉'),
(350, 17, '鹿野鄉'),
(351, 17, '達仁鄉'),
(352, 17, '綠島鄉'),
(353, 17, '臺東市'),
(354, 17, '關山鎮'),
(355, 17, '蘭嶼鄉'),
(356, 18, '玉里鎮'),
(357, 18, '光復鄉'),
(358, 18, '吉安鄉'),
(359, 18, '秀林鄉'),
(360, 18, '卓溪鄉'),
(361, 18, '花蓮市'),
(362, 18, '富里鄉'),
(363, 18, '新城鄉'),
(364, 18, '瑞穗鄉'),
(365, 18, '萬榮鄉'),
(366, 18, '壽豐鄉'),
(367, 18, '鳳林鎮'),
(368, 18, '豐濱鄉'),
(369, 19, '三星鄉'),
(370, 19, '大同鄉'),
(371, 19, '五結鄉'),
(372, 19, '冬山鄉'),
(373, 19, '壯圍鄉'),
(374, 19, '宜蘭市'),
(375, 19, '南澳鄉'),
(376, 19, '員山鄉'),
(377, 19, '釣魚臺'),
(378, 19, '頭城鎮'),
(379, 19, '礁溪鄉'),
(380, 19, '羅東鎮'),
(381, 19, '蘇澳鎮'),
(382, 20, '七美鄉'),
(383, 20, '白沙鄉'),
(384, 20, '西嶼鄉'),
(385, 20, '馬公市'),
(386, 20, '望安鄉'),
(387, 20, '湖西鄉'),
(388, 21, '金沙鎮'),
(389, 21, '金城鎮'),
(390, 21, '金湖鎮'),
(391, 21, '金寧鄉'),
(392, 21, '烈嶼鄉'),
(393, 21, '烏坵鄉'),
(394, 22, '北竿鄉'),
(395, 22, '東引鄉'),
(396, 22, '南竿鄉'),
(397, 22, '莒光鄉'),
(398, 23, '釣魚臺'),
(399, 24, '東沙群島'),
(400, 24, '南沙群島'),
(401, 25, '東區'),
(402, 25, '西區');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名稱',
  `order` int(11) NOT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='縣市';

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `order`) VALUES
(1, '臺北市', 1),
(2, '基隆市', 17),
(3, '新北市', 2),
(4, '桃園市', 3),
(5, '新竹市', 18),
(6, '新竹縣', 7),
(7, '苗栗縣', 8),
(8, '臺中市', 4),
(9, '彰化縣', 9),
(10, '南投縣', 10),
(11, '雲林縣', 11),
(12, '嘉義市', 19),
(13, '嘉義縣', 12),
(14, '臺南市', 5),
(15, '高雄市', 6),
(16, '屏東縣', 13),
(17, '臺東縣', 14),
(18, '花蓮縣', 15),
(19, '宜蘭縣', 16),
(20, '澎湖縣', 20),
(21, '金門縣', 21),
(22, '連江縣', 22),
(23, '教育部', 23),
(24, '科技部', 24),
(25, '測試縣', 25);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `house_id` int(10) UNSIGNED NOT NULL COMMENT '房屋ID',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '加入時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='收藏列表';

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '使用者編號',
  `area_id` int(10) UNSIGNED NOT NULL COMMENT '鄉鎮市區ID',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '標題',
  `thumbnail_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '圖片',
  `price` decimal(10,0) NOT NULL COMMENT '價格',
  `total_area` decimal(10,2) NOT NULL COMMENT '全部坪數',
  `public_area` decimal(10,2) NOT NULL COMMENT '公設坪數',
  `bedroom_count` int(10) UNSIGNED NOT NULL COMMENT '寢室數量',
  `living_room_count` int(10) UNSIGNED NOT NULL COMMENT '客廳數量',
  `dining_room_count` int(10) UNSIGNED NOT NULL COMMENT '飯廳數量',
  `kitchen_count` int(10) UNSIGNED NOT NULL COMMENT '廚房數量',
  `license_date` date NOT NULL COMMENT '取得使用執照日',
  `floor` int(10) DEFAULT NULL COMMENT '樓層',
  `bathroom_count` int(10) NOT NULL COMMENT '衛浴數量',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新時間',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '刪除時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='房屋';

-- --------------------------------------------------------

--
-- Table structure for table `houses_extra`
--

CREATE TABLE `houses_extra` (
  `house_id` int(10) UNSIGNED NOT NULL COMMENT '房屋ID',
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `full_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '完整地址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='房屋額外資訊';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '密碼',
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '暱稱',
  `token` char(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Login Token',
  `role` enum('NORMAL','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NORMAL' COMMENT '身分',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='使用者';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nickname`, `token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin@localhost', '$2y$12$qgQuxp1wGMvFAm93Kk0KpuXxK3KT4fVRW87GPcayWmqfCp4F84jJq', 'admin', '7ba684f146c9445720e4b9a8d6ed775de4804bc2dbe01fb6490b8cce05db9f43', 'ADMIN', '2021-05-28 08:46:32', NULL),
(2, 'provider@localhost', '$2y$11$X7axSOlW5WX7tHHWfoMPveayXu4A9ZIt3YW4WBxwIwPeFU6m7Hepu', 'provider', NULL, 'NORMAL', '2021-05-28 08:47:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_request_id` (`ad_request_id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `ad_requests`
--
ALTER TABLE `ad_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`),
  ADD KEY `reviewer_id` (`reviewer_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `houses_ibfk_2` (`area_id`),
  ADD KEY `price` (`price`),
  ADD KEY `total_area` (`total_area`),
  ADD KEY `public_area` (`public_area`),
  ADD KEY `bedroom_count` (`bedroom_count`),
  ADD KEY `living_room_count` (`living_room_count`),
  ADD KEY `dining_room_count` (`dining_room_count`),
  ADD KEY `kitchen_count` (`kitchen_count`),
  ADD KEY `bathroom_count` (`bathroom_count`),
  ADD KEY `floor` (`floor`),
  ADD KEY `license_date` (`license_date`);

--
-- Indexes for table `houses_extra`
--
ALTER TABLE `houses_extra`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_requests`
--
ALTER TABLE `ad_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`ad_request_id`) REFERENCES `ad_requests` (`id`),
  ADD CONSTRAINT `ads_ibfk_2` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`);

--
-- Constraints for table `ad_requests`
--
ALTER TABLE `ad_requests`
  ADD CONSTRAINT `ad_requests_ibfk_2` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`),
  ADD CONSTRAINT `ad_requests_ibfk_3` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `collections_ibfk_2` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`);

--
-- Constraints for table `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `houses_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`);

--
-- Constraints for table `houses_extra`
--
ALTER TABLE `houses_extra`
  ADD CONSTRAINT `houses_extra_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
