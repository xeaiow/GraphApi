-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-09-14 13:03:15
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `graph_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `interest`
--

CREATE TABLE `interest` (
  `id` int(11) NOT NULL COMMENT '編號',
  `likes_id` bigint(20) NOT NULL COMMENT '興趣',
  `username` varchar(40) NOT NULL COMMENT '使用者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `interest`
--

INSERT INTO `interest` (`id`, `likes_id`, `username`) VALUES
(1, 977579985596354, 'xeee'),
(2, 159425621565, 'xeee'),
(3, 380991205305014, 'xeee'),
(4, 374027017617, 'opspeed'),
(5, 172835866095977, 'opspeed'),
(6, 977579985596354, 'opspeed');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL COMMENT '編號',
  `username` varchar(40) NOT NULL COMMENT '帳號',
  `password` varchar(40) NOT NULL COMMENT '密碼',
  `email` varchar(60) NOT NULL COMMENT 'email',
  `gender` int(1) NOT NULL COMMENT '性別',
  `school` int(5) NOT NULL COMMENT '學校',
  `NowLives` varchar(60) NOT NULL COMMENT '現居',
  `birthday` date NOT NULL COMMENT '生日',
  `cover` varchar(150) NOT NULL COMMENT '封面',
  `UserImg` varchar(150) NOT NULL COMMENT '頭像'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `email`, `gender`, `school`, `NowLives`, `birthday`, `cover`, `UserImg`) VALUES
(1, 'xeaiow', '8256b0d92cde39fe9b8962535f9ad64d5495adde', 'xeaiow@gmail.com', 1, 1, 'Chungli', '1995-06-01', 'https://scontent.xx.fbcdn.net/t31.0-8/s720x720/11895002_121693201509225_5155515730903285211_o.jpg', 'https://graph.facebook.com/273272719684605/picture?width=300&height=300'),
(2, 'opspeed', 'b1f199680a3b2edd9c8c941915b6d779507227ca', 'opspeed@gmail.com', 0, 2, 'Taoyuan', '1995-03-08', 'https://scontent.xx.fbcdn.net/t31.0-8/s720x720/11895002_121693201509225_5155515730903285211_o.jpg', 'https://graph.facebook.com/273272719684605/picture?width=300&height=300');

-- --------------------------------------------------------

--
-- 資料表結構 `user_likes`
--

CREATE TABLE `user_likes` (
  `id` int(11) NOT NULL,
  `code` bigint(20) NOT NULL COMMENT '編號',
  `name` varchar(50) NOT NULL COMMENT '名稱',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `user_likes`
--

INSERT INTO `user_likes` (`id`, `code`, `name`, `created_time`) VALUES
(1, 977579985596354, 'Sudo 找工作', '2016-05-25 17:39:46'),
(2, 526175220750138, '特急件小周的人渣文本', '2016-04-14 01:52:24'),
(3, 380991205305014, 'TOP HOOD', '2016-03-16 02:46:24'),
(4, 133665993321331, '紀老師電腦教學網', '2016-05-25 17:37:12'),
(5, 374027017617, '軟體開發團隊工具心得分享', '2016-05-25 17:37:14'),
(6, 1519555461595640, '網站製作學習雜記', '2016-04-14 18:04:21'),
(7, 329104687277834, 'STARK HOUSE', '2016-03-14 23:19:38'),
(8, 161283787297006, 'Engadget 中文版', '2016-03-14 20:22:51'),
(9, 108887732538742, '癮科技', '2016-03-14 20:22:53'),
(10, 454209351284336, '轉聯會', '2016-05-29 20:07:42'),
(11, 159425621565, 'Inside 硬塞的網路趨勢觀察', '2016-02-24 08:17:06'),
(12, 1057917687569856, 'Modern Web', '2016-01-06 06:26:38'),
(13, 465575046946997, 'CinemaCity', '2016-02-14 00:47:48'),
(14, 172835866095977, '我是中壢人', '2015-11-14 04:56:48'),
(15, 490452597801819, 'Selene', '2015-12-08 00:48:02'),
(16, 656850087687351, '去流浪。', '2016-01-04 09:40:50'),
(17, 439022049466782, '輔仁大學資管系學會', '2015-10-13 01:25:25'),
(18, 889647427782399, '皇佳綿綿冰團', '2015-09-02 10:26:37'),
(19, 1436751363253696, 'Laravel 道場', '2015-09-02 10:26:18'),
(20, 1529686803975150, 'Colorgy', '2015-08-15 09:24:43');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `interest`
--
ALTER TABLE `interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `user_likes`
--
ALTER TABLE `user_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
