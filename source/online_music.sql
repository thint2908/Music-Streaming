-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2022 at 10:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_music`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(40) NOT NULL,
  `priority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `name`, `priority_id`) VALUES
(1, 'admin', '123456', 'admin@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Bolero'),
(2, 'Pop'),
(3, 'Rock'),
(4, 'Ballad'),
(5, 'Rap');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `comment_content` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `music_list`
--

CREATE TABLE `music_list` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `singer_id` int(11) NOT NULL,
  `lyrics` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `vote` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `url` char(40) DEFAULT NULL,
  `image` char(50) NOT NULL,
  `listens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music_list`
--

INSERT INTO `music_list` (`id`, `name`, `singer_id`, `lyrics`, `description`, `vote`, `category_id`, `url`, `image`, `listens`) VALUES
(1, 'Em Của Ngày Hôm Qua', 2, 'lyric của waiting for you', 'Đây là bản nhạc hot nhất của MONO', 5, 2, 'emcuangayhomqua.mp3', '', 100),
(2, 'Anh sai rồi!', 2, 'lyric của chạy ngay đi', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, 'asairoi.mp3', '', 100),
(3, 'Năm ấy', 15, 'lyric của ckta', 'Bài hát tình cảm nhẹ nhàng', 5, 4, 'namay.mp3', '', 100),
(4, 'Nói hoặc không nói', 11, 'lyric của người lạ ơi', 'Rap của Karik', 4, 5, 'noihoackhongnoi.mp3', '', 100),
(5, 'Em ngủ chưa', 16, 'Lyric của cơn mơ băng giá', 'nhạc của bằng kiều', 5, 1, 'emnguchua.mp3', '', 100),
(6, 'Người Ấy', 16, 'lời bài dtcem', 'nhạc của buitruonglinh', 5, 2, 'nguoiay.mp3', '', 100),
(7, 'Vô Tận', 16, 'lời bài bttl', 'Nhạc của tăngduytân', 5, 2, 'votan.mp3', '', 100),
(8, 'Khác biệt to lớn', 16, 'Lời bài kmct', 'Nhạc của Đan Nguyên', 4, 1, 'khacbiettolon.mp3', '', 100),
(10, 'Câu hẹn câu thề', 14, 'lyric của CUA', 'Bài rap của HIEUTHUHAI', 5, 5, 'cauhencauthe.mp3', '', 100),
(11, 'Khuôn mặt đáng thương', 2, 'lyric của nnca', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, 'khuonmatdangthuong.mp3', '', 100),
(12, 'Muộn rồi mà sao còn', 2, 'lyric của ccyld', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, 'muonroimasaocon.mp3', '', 100),
(13, 'Đừng hẹn kiếp sau', 14, 'lyric của đi để trở về', 'Bài hát tết của Soobin Hoàng Sơn', 5, 2, 'dunghenkiepsau.mp3', '', 100),
(14, 'Sao ta ngược lối', 14, 'lời bài tình đầu', 'Nhạc của tăngduytân', 5, 2, 'saotanguocloi.mp3', '', 100),
(15, 'Nàng thơ', 11, 'lời bài Anh nhà ở đâu thế', 'Bài hit của Amee', 5, 2, 'nangtho.mp3', '', 100),
(16, 'Shay nắng', 11, 'lời bài Anh tgrmđ', 'Bài hit của Amee', 5, 2, 'shaynang.mp3', '', 100),
(17, 'Thấy một cô gái yêu anh', 11, 'lời bài Anh sao anh chưa về', 'Bài hit của Amee', 5, 2, 'thaymoicogaiiuanh.mp3', '', 100),
(18, 'Nắng ấm xa dần', 2, 'lyric của Em là', 'Đây là bản nhạc hot nhất của Sơn Tùng MTP', 5, 2, 'nangamxadan.mp3', '', 100),
(19, 'Lạc trôi', 2, 'lyric của lạc trôi', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, 'lactroi.mp3', '', 100),
(20, 'Hãy trao cho anh', 2, 'lyric của hãy trao cho anh', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, 'haytraochoanh.mp3', '', 100),
(21, 'Đế Vương', 14, 'lyric của nghe như tình yêu', 'Bài rap của HIEUTHUHAI', 5, 5, 'devuong.mp3', '', 100),
(22, 'Cứ yêu đi', 15, 'lyric của bật nhạc lên', 'Bài rap của HIEUTHUHAI', 5, 5, 'cuyeudi.mp3', '', 100),
(23, 'Gửi ngàn lời yêu', 15, 'lyric của nếu ngày ấy', 'Bài hit của Soobin Hoàng Sơn', 5, 2, 'guinganloiyeu.mp3', '', 100),
(24, 'Ngày đầu tiên', 15, 'lyric của phía sau một cô gái', 'Bài hit nhất của Soobin Hoàng Sơn', 5, 2, 'ngaydautien.mp3', '', 100),
(25, 'Trái đất đẹp khi có em', 15, 'lyric của mình là gì của nhau', 'Nhạc của Lou Hoàng', 5, 2, 'traidatdepnhatkhicoem.mp3', '', 100),
(26, 'Em của ngày hôm qua', 2, 'lyric của bắt cóc con tim', 'Nhạc của Lou Hoàng', 5, 2, 'emcuangayhomqua.mp3', '', 100),
(28, 'Shay nắng', 4, 'lyric của cạn cả nước mắt', 'Bài rap không bao giờ biển diễn của Karik', 5, 5, 'shaynang.mp3', '', 100),
(29, 'Nắng ấm xa dần', 13, 'lyric của suýt nữa thì', 'Bài hát của Andiez', 5, 5, 'nangamxadan.mp3', '', 100),
(30, 'Gửi ngàn lời yêu', 13, 'lyric của 1 phút', 'Bài hát của Andiez', 5, 5, 'guinganloiyeu.mp3', '', 100),
(31, 'waiting for you', 1, 'lyric của waiting for you', 'Đây là bản nhạc hot nhất của MONO', 5, 2, 'waitingforyou.mp3', '', 100),
(32, 'Em là', 1, 'lyric của em là', 'Đây là bản nhạc hot của MONO', 5, 2, 'emla.mp3', '', 100),
(33, 'Quên anh đi', 1, 'lyric của quên anh đi', 'Đây là bản nhạc hot của MONO', 5, 2, 'quenanhdi.mp3', '', 100),
(34, 'CUA', 9, 'lyric của CUA', 'Bài rap của HIEUTHUHAI', 5, 5, 'cua.mp3', '', 100),
(35, 'Bật nhạc lên', 9, 'lyric của bật nhạc lên', 'Bài rap của HIEUTHUHAI', 5, 5, 'batnhaclen.mp3', '', 100),
(36, 'Hướng dương', 9, 'lyric của hướng dương', 'Bài rap của HIEUTHUHAI', 5, 5, 'huongduong.mp3', '', 100),
(37, 'Cảm giác lúc ấy sẽ ra sao', 9, 'Lời bài hát của cảm giác lúc ấy sẽ ra sao', 'Bài nhạc hot của Lou Hoàng', 5, 2, 'camgiaclucayserasao.mp3', '', 100),
(38, 'Bắt cóc con tim', 9, 'lyric của bắt cóc con tim', 'Bài rap của Lou Hoàng', 5, 5, 'batcoccontim.mp3', '', 100),
(39, 'Là bạn không thể yêu', 9, 'lyric của là bạn không thể yêu', 'Bài hit của Lou Hoàng', 5, 2, 'labankhongtheyeu.mp3', '', 100),
(40, 'Tình đầu', 7, 'lời bài tình đầu', 'Nhạc của tăng duy tân', 5, 2, 'tinhdau.mp3', '', 100),
(41, 'Bên trên tầng lầu', 7, 'lời bài hát bên trên tầng lầu', 'bài rap của tăng duy tân', 5, 5, 'bentrentanglau.mp3', '', 100),
(42, 'Em ơi đừng khóc', 7, 'lời bài hát em ơi đừng khóc', 'bài rap của tăng duy tân', 5, 5, 'emoidungkhoc.mp3', '', 100),
(43, 'Suýt nữa thì', 13, 'lyric của suýt nữa thì', 'Bài hát của Andiez', 5, 2, 'suytnuathi.mp3', '', 100),
(44, '1 phút', 13, 'lyric của 1 phút', 'Bài hát của Andiez', 5, 2, '1phut.mp3', '', 100),
(45, 'Quá khứ chỉ nên là quá khứ', 13, 'lyric của Quá khứ chỉ nên là quá khứ', 'Bài hát của Andiez', 5, 2, 'quakhuchinenlaquakhu.mp3', '', 100),
(46, 'Đi để trở về', 10, 'lyric của đi để trở về', 'Bài hát tết của Soobin Hoàng Sơn', 5, 2, 'didetrove.mp3', '', 100),
(47, 'Anh đã quen với cô đơn', 10, 'lyric của Anh đã quen với cô đơn', 'Bài hát tết của Soobin Hoàng Sơn', 5, 2, 'anhdaquenvoicodon.mp3', '', 100),
(48, 'Phía sau một cô gái', 10, 'lyric của Phía sau một cô gái', 'Bài hát tết của Soobin Hoàng Sơn', 5, 2, 'phiasaumotcogai.mp3', '', 100);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `user_id`, `music_id`) VALUES
(1, 1, 1),
(2, 1, 14),
(3, 1, 6),
(4, 1, 11),
(5, 1, 28),
(6, 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `name` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `singer`
--

CREATE TABLE `singer` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `singer`
--

INSERT INTO `singer` (`id`, `name`, `image`) VALUES
(1, 'MONO', NULL),
(2, 'Sơn Tùng MTP', NULL),
(7, 'Tăng Duy Tân', NULL),
(9, 'HIEUTHUHAI', NULL),
(10, 'Soobin Hoàng sơn', NULL),
(11, 'Amee', NULL),
(12, 'Lou Hoàng', NULL),
(13, 'Andiez', NULL),
(14, 'Đình Dũng', NULL),
(15, 'Đức Phúc', NULL),
(16, 'Trịnh Thăng Bình', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music_list`
--
ALTER TABLE `music_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `music_list`
--
ALTER TABLE `music_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `singer`
--
ALTER TABLE `singer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
