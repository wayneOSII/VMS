-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 04 月 09 日 16:40
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `VMS`
--
CREATE DATABASE IF NOT EXISTS `VMS` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `VMS`;

-- --------------------------------------------------------

--
-- 資料表結構 `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `activity_id` varchar(10) NOT NULL,
  `a_name` varchar(10) NOT NULL,
  `modify_at` varchar(50) NOT NULL,
  `max_people` varchar(20) NOT NULL,
  `creat_at` varchar(50) NOT NULL,
  `a_content` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 資料表新增資料前，先清除舊資料 `activity`
--

TRUNCATE TABLE `activity`;
-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `ad_no` int(11) NOT NULL,
  `ad_id` varchar(30) NOT NULL,
  `ad_pwd` varchar(200) NOT NULL,
  `ad_name` varchar(30) NOT NULL,
  `ad_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 資料表新增資料前，先清除舊資料 `admin`
--

TRUNCATE TABLE `admin`;
--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`ad_no`, `ad_id`, `ad_pwd`, `ad_name`, `ad_email`) VALUES
(1, 'temp', '$2y$10$opx/7h.iaAEaDGUpVtKCX.E8anYSApf0pXepzXb6wT.mdys/tT2HW', 'temp0324', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `attendanc`
--

DROP TABLE IF EXISTS `attendanc`;
CREATE TABLE `attendanc` (
  `s_no` int(11) NOT NULL,
  `ymd` varchar(10) NOT NULL,
  `hms` varchar(10) NOT NULL,
  `RealAttendancTimes` varchar(15) NOT NULL,
  `leaveing` varchar(1) NOT NULL,
  `creat_at` varchar(50) NOT NULL,
  `modify_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 資料表新增資料前，先清除舊資料 `attendanc`
--

TRUNCATE TABLE `attendanc`;
-- --------------------------------------------------------

--
-- 資料表結構 `enroll`
--

DROP TABLE IF EXISTS `enroll`;
CREATE TABLE `enroll` (
  `s_no` varchar(10) NOT NULL,
  `activity_id` varchar(10) NOT NULL,
  `creat_at` varchar(50) NOT NULL,
  `note` varchar(50) NOT NULL,
  `modify_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 資料表新增資料前，先清除舊資料 `enroll`
--

TRUNCATE TABLE `enroll`;
-- --------------------------------------------------------

--
-- 資料表結構 `expectattendanc`
--

DROP TABLE IF EXISTS `expectattendanc`;
CREATE TABLE `expectattendanc` (
  `s_no` int(11) NOT NULL,
  `hms` time NOT NULL,
  `ExpectYMD` varchar(10) NOT NULL,
  `ExpectAttendancTimes` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 資料表新增資料前，先清除舊資料 `expectattendanc`
--

TRUNCATE TABLE `expectattendanc`;
-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` varchar(10) NOT NULL,
  `p_title` varchar(30) NOT NULL,
  `p_contend` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 資料表新增資料前，先清除舊資料 `post`
--

TRUNCATE TABLE `post`;
-- --------------------------------------------------------

--
-- 資料表結構 `reserve`
--

DROP TABLE IF EXISTS `reserve`;
CREATE TABLE `reserve` (
  `s_no` int(11) NOT NULL,
  `r_date` varchar(50) NOT NULL,
  `r_period` varchar(50) NOT NULL,
  `r_location` varchar(50) NOT NULL,
  `create_at` varchar(50) NOT NULL,
  `modified_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 資料表新增資料前，先清除舊資料 `reserve`
--

TRUNCATE TABLE `reserve`;
--
-- 傾印資料表的資料 `reserve`
--

INSERT INTO `reserve` (`s_no`, `r_date`, `r_period`, `r_location`, `create_at`, `modified_at`) VALUES
(1, '2023-04-05', '12:30-13:25', 'D', '2023-04-04 15:24:09', '2023-04-04 15:24:09'),
(2, '2023-04-10', '12:30-13:25', 'G', '2023-04-09 17:19:17', '2023-04-09 17:19:17');

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `s_no` int(11) NOT NULL,
  `s_id` varchar(30) NOT NULL,
  `s_pwd` varchar(200) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `s_class` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_estonian_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 資料表新增資料前，先清除舊資料 `student`
--

TRUNCATE TABLE `student`;
--
-- 傾印資料表的資料 `student`
--

INSERT INTO `student` (`s_no`, `s_id`, `s_pwd`, `s_name`, `s_class`, `email`) VALUES
(1, 'tempstu', '$2y$10$01X/ZPLCJ7e7sd5sY7yC.eGXG2brzXJjLg7pQYKEWLYo0JudHGM.O', 'tempstu0324', NULL, NULL),
(2, '1110831000', '$2y$10$xR5BBJzCUm.EQepDJcx0i.EbHJk2Rk/DLfYHd9NHOe36w0/65tjLq', '張三', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `t_no` int(11) NOT NULL,
  `t_id` varchar(30) NOT NULL,
  `t_pwd` varchar(200) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 資料表新增資料前，先清除舊資料 `teacher`
--

TRUNCATE TABLE `teacher`;
--
-- 傾印資料表的資料 `teacher`
--

INSERT INTO `teacher` (`t_no`, `t_id`, `t_pwd`, `t_name`, `email`) VALUES
(1, 'tempteacher', '$2y$10$HWs4QhmZyZxGFjeD1oRUheGtJDXAvAqKL/oKb2iAI7IjK0xWtOhM2', 'teacher0324', NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_no`);

--
-- 資料表索引 `attendanc`
--
ALTER TABLE `attendanc`
  ADD PRIMARY KEY (`s_no`);

--
-- 資料表索引 `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`s_no`,`activity_id`);

--
-- 資料表索引 `expectattendanc`
--
ALTER TABLE `expectattendanc`
  ADD PRIMARY KEY (`s_no`);

--
-- 資料表索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- 資料表索引 `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`s_no`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_no`);

--
-- 資料表索引 `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_no`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `attendanc`
--
ALTER TABLE `attendanc`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `expectattendanc`
--
ALTER TABLE `expectattendanc`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `student`
--
ALTER TABLE `student`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
