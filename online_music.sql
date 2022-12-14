-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2022 lúc 02:28 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `online_music`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
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
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `name`, `priority_id`) VALUES
(1, 'admin', '123456', 'admin@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Bolero'),
(2, 'Pop'),
(3, 'Rock'),
(4, 'Ballad'),
(5, 'Rap');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `comment_content` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `music_list`
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
-- Đang đổ dữ liệu cho bảng `music_list`
--

INSERT INTO `music_list` (`id`, `name`, `singer_id`, `lyrics`, `description`, `vote`, `category_id`, `url`, `image`, `listens`) VALUES
(1, 'Waiting For You', 1, 'lyric của waiting for you', 'Đây là bản nhạc hot nhất của MONO', 5, 2, NULL, '', 100),
(2, 'Chạy Ngay Đi', 2, 'lyric của chạy ngay đi', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, NULL, '', 100),
(3, 'Chạm khẽ tim anh một chút thôi', 3, 'lyric của ckta', 'Bài hát tình cảm nhẹ nhàng', 5, 4, NULL, '', 100),
(4, 'Người Lạ Ơi', 4, 'lyric của người lạ ơi', 'Rap của Karik', 4, 5, NULL, '', 100),
(5, 'Cơn Mơ Băng Giá', 5, 'Lyric của cơn mơ băng giá', 'nhạc của bằng kiều', 5, 1, NULL, '', 100),
(6, 'Đường Tôi Chở Em Về', 6, 'lời bài dtcem', 'nhạc của buitruonglinh', 5, 2, NULL, '', 100),
(7, 'Bên Trên Tầng Lầu', 7, 'lời bài bttl', 'Nhạc của tăngduytân', 5, 2, NULL, '', 100),
(8, 'Khóc một cuộc tình', 8, 'Lời bài kmct', 'Nhạc của Đan Nguyên', 4, 1, NULL, '', 100),
(9, 'Chúng ta không thuộc về nhau', 2, 'lyric của ctktvn', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, NULL, '', 100),
(10,'CUA',9,'lyric của CUA','Bài rap của HIEUTHUHAI',5,5,NULL,'',100),
(11, 'Nơi này có anh', 2, 'lyric của nnca', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, NULL, '', 100),
(12, 'Có chắc yêu là đây', 2, 'lyric của ccyld', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, NULL, '', 100),
(13, 'Đi để trở về', 10, 'lyric của đi để trở về', 'Bài hát tết của Soobin Hoàng Sơn', 5, 2, NULL, '', 100),
(14, 'Tình đầu', 7, 'lời bài tình đầu', 'Nhạc của tăngduytân', 5, 2, NULL, '', 100),
(15, 'Anh nhà ở đâu thê', 11, 'lời bài Anh nhà ở đâu thế', 'Bài hit của Amee', 5, 2, NULL, '', 100),
(16, 'Trời giấu trời mang đi', 11, 'lời bài Anh tgrmđ', 'Bài hit của Amee', 5, 2, NULL, '', 100),
(17, 'Sao anh chưa về', 11, 'lời bài Anh sao anh chưa về', 'Bài hit của Amee', 5, 2, NULL, '', 100),
(18, 'Em là', 1, 'lyric của Em là', 'Đây là bản nhạc hot nhất của MONO', 5, 2, NULL, '', 100),
(19, 'Lạc trôi', 2, 'lyric của lạc trôi', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, NULL, '', 100),
(20, 'Hãy trao cho anh', 2, 'lyric của hãy trao cho anh', 'Đây là một trong các bài hit của Sơn Tùng MTP', 5, 2, NULL, '', 100),
(21,'Nghe như tình yêu',9,'lyric của nghe như tình yêu','Bài rap của HIEUTHUHAI',5,5,NULL,'',100),
(22,'Bật nhạc lên',9,'lyric của bật nhạc lên','Bài rap của HIEUTHUHAI',5,5,NULL,'',100),
(23, 'Nếu ngày ấy', 10, 'lyric của nếu ngày ấy', 'Bài hit của Soobin Hoàng Sơn', 5, 2, NULL, '', 100),
(24, 'Phía sau một cô gái', 10, 'lyric của phía sau một cô gái', 'Bài hit nhất của Soobin Hoàng Sơn', 5, 2, NULL, '', 100),
(25, 'Mình là gì của nhau', 12, 'lyric của mình là gì của nhau', 'Nhạc của Lou Hoàng', 5, 2, NULL, '', 100),
(26, 'Bắt cóc con tim', 12, 'lyric của bắt cóc con tim', 'Nhạc của Lou Hoàng', 5, 2, NULL, '', 100),
(27, 'Cảm giác lúc ấy sẽ ra sao', 12, 'lyric của cglasrs', 'Nhạc của Lou Hoàng', 5, 2, NULL, '', 100),
(28, 'Cạn cả nước mắt', 4, 'lyric của cạn cả nước mắt', 'Bài rap không bao giờ biển diễn của Karik', 5, 5, NULL, '', 100),
(29, 'Suýt nữa thì', 13, 'lyric của suýt nữa thì', 'Bài hát của Andiez', 5, 5, NULL, '', 100),
(30, '1 phút', 13, 'lyric của 1 phút', 'Bài hát của Andiez', 5, 5, NULL, '', 100),
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `playlist`
--

INSERT INTO `playlist` (`id`, `user_id`, `music_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `name` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `priority`
--

INSERT INTO `priority` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `singer`
--

CREATE TABLE `singer` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `singer`
--

INSERT INTO `singer` (`id`, `name`, `image`) VALUES
(1, 'MONO', NULL),
(2, 'Sơn Tùng MTP', NULL),
(3, 'Noo Phước Thịnh', NULL),
(4, 'Karik', NULL),
(5, 'Bằng Kiều', NULL),
(6, 'buitruonglinh', NULL),
(7, 'Tăng Duy Tân', NULL),
(8, 'Đan Nguyên', NULL),
(9, 'HIEUTHUHAI', NULL),
(10, 'Soobin Hoàng sơn', NULL),
(11,'Amee',NULL),
(12,'Lou Hoàng',NULL),
(13,'Andiez',NULL);
--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `music_list`
--
ALTER TABLE `music_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `music_list`
--
ALTER TABLE `music_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `singer`
--
ALTER TABLE `singer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
