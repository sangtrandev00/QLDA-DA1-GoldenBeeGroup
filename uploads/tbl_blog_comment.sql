-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 21, 2023 lúc 09:38 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog_comment`
--

CREATE TABLE `tbl_blog_comment` (
  `id` int(11) NOT NULL,
  `ma_kh` int(10) NOT NULL,
  `id_blog` int(3) NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngay_bl` datetime NOT NULL,
  `ten_kh` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_blog_comment`
--

INSERT INTO `tbl_blog_comment` (`id`, `ma_kh`, `id_blog`, `noi_dung`, `ngay_bl`, `ten_kh`) VALUES
(3, 35, 2, '1234', '2023-03-21 07:57:24', 'phoi'),
(1, 18, 0, '123', '2023-03-21 08:04:34', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_blog_comment`
--
ALTER TABLE `tbl_blog_comment`
  ADD KEY `fk_commentblog_user` (`id_blog`),
  ADD KEY `fk_commentblog_user2` (`ma_kh`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_blog_comment`
--
ALTER TABLE `tbl_blog_comment`
  ADD CONSTRAINT `fk_commentblog_blog` FOREIGN KEY (`id_blog`) REFERENCES `tbl_blog` (`blog_id`),
  ADD CONSTRAINT `fk_commentblog_user2` FOREIGN KEY (`ma_kh`) REFERENCES `tbl_nguoidung` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
