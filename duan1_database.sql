-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 14, 2023 lúc 12:46 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

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
-- Cấu trúc bảng cho bảng `tbl_banner`
--

DROP TABLE IF EXISTS `tbl_banner`;
CREATE TABLE `tbl_banner` (
  `id` int(3) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idsp` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_binhluan`
--

DROP TABLE IF EXISTS `tbl_binhluan`;
CREATE TABLE `tbl_binhluan` (
  `ma_binhluan` int(10) NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_sanpham` int(11) NOT NULL,
  `ma_nguoidung` int(11) NOT NULL,
  `duyet` tinyint(4) DEFAULT 0,
  `ngay_binhluan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog`
--

DROP TABLE IF EXISTS `tbl_blog`;
CREATE TABLE `tbl_blog` (
  `blog_id` int(9) NOT NULL,
  `blog_title` text COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `blogcate_id` int(3) NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duyet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog_cate`
--

DROP TABLE IF EXISTS `tbl_blog_cate`;
CREATE TABLE `tbl_blog_cate` (
  `id` int(3) NOT NULL,
  `blog_catename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_blog_cate`
--

INSERT INTO `tbl_blog_cate` (`id`, `blog_catename`, `hinh_anh`) VALUES
(1, 'Thủ thuật', ''),
(2, 'Tin tức điện thoại', ''),
(3, 'Hướng dẫn', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog_comment`
--

DROP TABLE IF EXISTS `tbl_blog_comment`;
CREATE TABLE `tbl_blog_comment` (
  `id` int(11) NOT NULL,
  `ma_kh` int(10) NOT NULL,
  `id_blog` int(3) NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngay_bl` datetime NOT NULL,
  `ten_kh` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

DROP TABLE IF EXISTS `tbl_danhmuc`;
CREATE TABLE `tbl_danhmuc` (
  `ma_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`ma_danhmuc`, `ten_danhmuc`, `hinh_anh`, `mo_ta`) VALUES
(1, 'Oppo', 'a96-pink-1920.png', ''),
(2, 'Iphone', 'iPhone 14 Pro 128GB _ chinh hang.png', ''),
(3, 'Samsung', 'sam sung galaxy s23 cateogory.jpg', ''),
(4, 'Xiaomi', 'Xiaomi 12T.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmucphu`
--

DROP TABLE IF EXISTS `tbl_danhmucphu`;
CREATE TABLE `tbl_danhmucphu` (
  `id` int(3) NOT NULL,
  `iddm` int(9) NOT NULL,
  `ten_danhmucphu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmucphu`
--

INSERT INTO `tbl_danhmucphu` (`id`, `iddm`, `ten_danhmucphu`, `mo_ta`) VALUES
(1, 1, 'Oppo A', ''),
(2, 1, 'Oppo Find X', ''),
(3, 1, 'Oppo Reno', ''),
(4, 2, 'Iphone 14', ''),
(5, 2, 'I phone 13', ''),
(6, 2, 'I phone 12', ''),
(7, 2, 'I phone 11', ''),
(8, 2, 'I phone X', ''),
(9, 3, 'Galaxy Z', ''),
(10, 3, 'Galaxy S', ''),
(11, 3, 'Galaxy A', ''),
(12, 3, 'Galaxy M', ''),
(13, 4, 'Xiaomi Redmi', ''),
(14, 4, 'Xiaomi Mi', ''),
(15, 4, 'Xiaomi Poco', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nguoidung`
--

DROP TABLE IF EXISTS `tbl_nguoidung`;
CREATE TABLE `tbl_nguoidung` (
  `id` int(10) NOT NULL,
  `tai_khoan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `kich_hoat` tinyint(1) NOT NULL DEFAULT 1,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vai_tro` tinyint(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nguoidung`
--

INSERT INTO `tbl_nguoidung` (`id`, `tai_khoan`, `mat_khau`, `ho_ten`, `diachi`, `sodienthoai`, `kich_hoat`, `hinh_anh`, `email`, `vai_tro`) VALUES
(11, 'trannhatsang', '827ccb0eea8a706c4c34a16891f84e7b', 'Trần Nhât Sang', '19/7c', '0937988510', 1, 'https://images.unsplash.com/photo-1639149888905-fb39731f2e6c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80', 'nhatsang0102@gmail.com', 3),
(18, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Tran Nhat Sang', '19/7c', '0937988510', 1, 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80', 'nhatsang0101@gmail.com', 1),
(19, 'vannam123', '202cb962ac59075b964b07152d234b70', 'Vo Van Nam', '19/7c khu phố Đông Tác, phường Tân Đông Hiệp, thành phố Dĩ An, tỉnh Bình Dương', '0937988512', 1, 'content/dong-ho-nu-tissot-t122-210-11-159-00-day-thep-khong-gi-30mm-mau-bac-hong-6392ef7493975-0912202215190 - 2.jpg', 'vannam@gmail.com', 2),
(20, 'thiloan123', '7363a0d0604902af7b70b271a0b96480', 'Ha Thi Loan', '19/7c khu phố Đông Tác, phường Tân Đông Hiệp, thành phố Dĩ An, tỉnh Bình Dương', '0937988513', 1, 'content/Dong ho nu  Tissot T122.210.11.159.00 day thep khong gi.jpg', 'thiloan@gmail.com', 2),
(21, 'vanba123', 'd9b1d7db4cd6e70935368a1efb10e377', 'Cao Văn Bá', '19/7c khu phố Đông Tác, phường Tân Đông Hiệp, thành phố Dĩ An, tỉnh Bình Dương', '0937988512', 1, 'content/solidity-dau-tu-crypto.jpg', 'vanba123@gmail.com', 3),
(22, 'vannam123', 'd9b1d7db4cd6e70935368a1efb10e377', 'Vo Van Nam', '19/7c khu phố Đông Tác, phường Tân Đông Hiệp, thành phố Dĩ An, tỉnh Bình Dương', '0937988512', 1, 'content/quan-short-the-thao-adidas-training-short-intelsport-pts.png', 'vannam@gmail.com', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order` (
  `id` int(4) NOT NULL,
  `madonhang` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tongdonhang` double(10,0) NOT NULL,
  `pttt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `iduser` int(4) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dienThoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timeorder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `madonhang`, `tongdonhang`, `pttt`, `iduser`, `name`, `dienThoai`, `email`, `address`, `ghichu`, `timeorder`, `trangthai`) VALUES
(11, 'YOURORDER9776835', 12600000, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'nhatsang', '23423', '12/15/2022 10:03:20 am', 4),
(14, 'YOURORDER5670552', 41676804, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'nhatsang', 'fàdứd', '01/09/2023 01:43:51 pm', 4),
(15, 'YOURORDER821914', 2112000, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'nhatsang', '', '01/28/2023 02:46:28 pm', 4),
(17, 'YOURORDER5230564', 110130000, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'nhatsang', '', '02/01/2023 09:34:14 am', 5),
(21, 'YOURORDER1588613', 938080144, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'nhatsang', '', '02/08/2023 10:36:53 am', 2),
(22, 'YOURORDER7457491', 19200000, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'nhatsang', 'No thank you', '02/08/2023 04:27:26 pm', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

DROP TABLE IF EXISTS `tbl_order_detail`;
CREATE TABLE `tbl_order_detail` (
  `id` int(4) NOT NULL,
  `idsanpham` int(4) NOT NULL,
  `iddonhang` int(4) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 1,
  `dongia` double(10,0) NOT NULL DEFAULT 0,
  `tensp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

DROP TABLE IF EXISTS `tbl_sanpham`;
CREATE TABLE `tbl_sanpham` (
  `masanpham` int(11) NOT NULL,
  `tensp` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `don_gia` double(11,2) NOT NULL DEFAULT 0.00,
  `ton_kho` int(3) NOT NULL DEFAULT 100,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `giam_gia` double(10,2) NOT NULL DEFAULT 0.00,
  `dac_biet` tinyint(1) NOT NULL DEFAULT 0,
  `so_luot_xem` int(11) NOT NULL DEFAULT 0,
  `ngay_nhap` datetime NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp(),
  `mo_ta` text COLLATE utf8_unicode_ci NOT NULL,
  `ma_danhmuc` int(11) NOT NULL,
  `id_dmphu` int(3) NOT NULL,
  `information` text COLLATE utf8_unicode_ci NOT NULL,
  `promote` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`masanpham`, `tensp`, `don_gia`, `ton_kho`, `images`, `giam_gia`, `dac_biet`, `so_luot_xem`, `ngay_nhap`, `date_modified`, `mo_ta`, `ma_danhmuc`, `id_dmphu`, `information`, `promote`) VALUES
(1, 'Điện thoại OPPO Reno8 T 5G 256GB', 10999000.00, 10, 'oppo - reno 5g 8t den.png,oppo-reno8t-den1-thumb-600x600.jpg,oppo-reno-5g-dep.jpg,638091158554197072_oppo-reno8-t-5g-dd.jpg,Oppo Reno 5G.png,oppo-reno-8t.jpg,thumb-oppo-reno8t-vang1-thumb-600x600.jpg', 5.00, 0, 0, '2023-03-11 07:55:23', '2023-03-14 15:25:01', 'OPPO Reno8 T 5G 128GB là mẫu điện thoại đầu tiên trong năm 2023 mà OPPO kinh doanh tại Việt Nam. Máy nhận được khá nhiều sự quan tâm đến từ cộng đồng công nghệ về thông số kỹ thuật hết sức ấn tượng như: Camera 108 MP, chipset nhà Qualcomm và màn hình AMOLED.\r\nHoàn thiện với chất liệu cao cấp\r\nSở hữu màn hình chất lượng với khả năng hiển thị sống động\r\nNổi bật với cụm camera chụp ảnh siêu sắc nét\r\nHiệu năng tốt sử dụng mượt mà nhiều tác vụ', 1, 3, 'Màn hình:\r\n\r\nAMOLED6.7\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 13\r\nCamera sau:\r\n\r\nChính 108 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 695 5G\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4800 mAh67 W', 0),
(2, 'Điện thoại OPPO Reno8 Z 5G', 7990000.00, 100, 'oppo reno 8z chup anh.jpg,oppo reno 8z dep vang.jpg,oppo reno 8z vang.jpg,oppo reno 8z den.jpg,oppo reno 8z .jpg,photo_2022-08-05_09-40-14.jpg,thumb-photo_2022-08-05_09-40-15.jpg', 0.00, 0, 0, '2023-03-11 08:13:17', '2023-03-14 15:25:01', 'OPPO Reno8 Z 5G đã được giới thiệu tại thị trường Việt Nam vào tháng 8/2022, máy sở hữu một diện mạo đẹp mắt nhờ thừa hưởng thiết kế hiện đại từ thế hệ trước, cùng với đó là sự cải tiến về camera và hiệu năng nhằm mang đến những trải nghiệm tốt hơn trong phân khúc điện thoại tầm trung.\r\nẤn tượng với diện mạo thời trang và màn hình chất lượng\r\nThỏa sức nhiếp ảnh hay sáng tạo video với bộ ba camera\r\nHiệu năng mạnh mẽ trong phân khúc\r\nThời lượng pin đáp ứng cho cả ngày dài\r\n', 1, 3, 'Màn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 695 5G\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4500 mAh33 W', 0),
(3, 'Điện thoại OPPO Reno8 Pro 5G', 17590000.00, 100, 'thumb-oppo_reno8_pro_1_.jpg,oppo reno 8 pro xxx.jpg,oppo _reno 8 _ pro 3.jpg,oppo reno 8 5g pro 2.jpg,oppo reno 8 pro 2.png,oppo_reno8_pro.jpg', 5.00, 0, 0, '2023-03-11 02:25:13', '2023-03-14 15:25:01', 'OPPO Reno8 T 5G 128GB là mẫu điện thoại đầu tiên trong năm 2023 mà OPPO kinh doanh tại Việt Nam. Máy nhận được khá nhiều sự quan tâm đến từ cộng đồng công nghệ về thông số kỹ thuật hết sức ấn tượng như: Camera 108 MP, chipset nhà Qualcomm và màn hình AMOLED.\r\nHoàn thiện với chất liệu cao cấp\r\nSở hữu màn hình chất lượng với khả năng hiển thị sống động\r\nNổi bật với cụm camera chụp ảnh siêu sắc nét\r\nHiệu năng tốt sử dụng mượt mà nhiều tác vụ', 1, 3, 'Màn hình:\r\n\r\nAMOLED6.7\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 13\r\nCamera sau:\r\n\r\nChính 108 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 695 5G\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4800 mAh67 W', 0),
(4, 'Điện thoại OPPO Reno7 Pro 5G', 11990000.00, 100, 'thumb-oppo reno 7 t_i_xu_ng_42__3.png,oppo reno 7 tot.png,oppo reno 7 chat luong cao.png,oppo reno 7 pro.png,oppo reno 7 dep tot.png,oppo reno 7 t_i_xu_ng_8_.png', 10.00, 0, 0, '2023-03-11 02:40:37', '2023-03-14 15:25:01', 'OPPO Reno7 Pro 5G trình làng với một thiết kế mới lạ đầy bắt mắt, hiệu năng ổn định cùng khả năng chụp ảnh - quay video cực kỳ chất lượng nhờ những nâng cấp đáng giá về thuật toán xử lý trên cảm biến chính IMX766 đến từ Sony\r\nDiện mạo nổi bật chưa từng có\r\nĐã mắt hơn với màn hình chất lượng\r\nChiến game mượt mà trên chipset đến từ MediaTek\r\nThỏa sức chụp ảnh với camera chất lượng', 1, 3, 'Màn hình:\r\n\r\nAMOLED6.5\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nMediaTek Dimensity 1200 Max\r\nRAM:\r\n\r\n12 GB\r\nDung lượng lưu trữ:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4500 mAh65 W', 0),
(5, 'Điện thoại OPPO A16K', 2590000.00, 100, 'thumb-oppo a 16k.jpg,oppo a 16k blue tripple.png,oppo a 16k blue dep lam.jpg,oppo a 16k blue dep.jpg,oppo a 16k blue dep.png,combo_a16k_-_blue.jpg', 12.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO chính thức trình làng mẫu smartphone giá rẻ - OPPO A16K sở hữu màu sắc thời thượng, viên pin dung lượng cao, cấu hình khỏe, selfie lung linh, một lựa chọn thú vị cho người tiêu dùng.\r\nHệ thống camera cho bạn tỏa sáng cùng vẻ đẹp tự nhiên\r\nCấu hình tốt trong tầm giá\r\nThiết kế tinh giản, trẻ trung\r\nTận hưởng trải nghiệm xem đã mắt\r\nThời gian giải trí lâu hơn\r\n\r\n', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.52\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\n13 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n3 GB\r\nDung lượng lưu trữ:\r\n\r\n32 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4230 mAh10 W', 0),
(6, 'Điện thoại OPPO A96 ', 5990000.00, 100, 'thumb-a96-navigation-pink-v1.png,a96 pink oppo qua dep.png,a96 pink dien thoai rat dep.png,a 96 pink dien thoai oppo.png,oppo 96 dien thoai.jpg,a96-pink-1920.png', 8.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO A96 là cái tên được nhắc đến khá nhiều trên các diễn đàn công nghệ hiện nay, nhờ sở hữu một ngoại hình hết sức bắt mắt cùng hàng loạt các thông số ấn tượng trong phân khúc giá như hiệu năng cao, camera chụp ảnh sắc nét.\r\nNổi bật với diện mạo đầy cuốn hút\r\nHiển thị hình ảnh một cách sinh động\r\nSử dụng lâu hơn nhờ trang bị viên pin lớn\r\nChiến game ổn định nhờ chip xử lý đến từ Qualcomm\r\n', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.59\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 680\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0),
(7, 'Điện thoại OPPO A77s', 6290000.00, 100, 'thumb-combo_a77s-_en_2.jpg,oppo a77s dep qua dep.jpg,a77 oppo chuan star.jpg,oppo a77 xanh chuan.jpg,oppo a 77 xanh blue.jpg,combo_a77s-_xanh_1.jpg,oppo-a77s-xanh.jpg', 0.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO vừa cho ra mắt mẫu điện thoại tầm trung mới với tên gọi OPPO A77s, máy sở hữu màn hình lớn, thiết kế đẹp mắt, hiệu năng ổn định cùng khả năng mở rộng RAM lên đến 8 GB vô cùng nổi bật trong phân khúc.\r\nLinh hoạt hơn với khả năng xử lý đa tác vụ\r\nVẻ ngoài cao cấp\r\nGiải trí đã mắt với màn hình lớn\r\nTận hưởng vô tư, lo chi gián đoạn', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nSnapdragon 680\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0),
(8, 'Điện thoại OPPO A76', 5390000.00, 100, 'thumb-combo_a76_-_black.jpg,oppo-a76-3.jpg,a76 combo blue chuan.jpg,combo_a76_blue_dep.jpg,combo_a76_-_blue.jpg,', 10.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO A76 4G ra mắt với thiết kế trẻ trung, hiệu năng ổn định, màn hình 90 Hz mượt mà cùng viên pin trâu cho thời gian sử dụng lâu dài phù hợp cho mọi đối tượng người dùng.\nThiết kế OPPO Glow - màu gradient đẹp mắt\nThoải mái dùng cả ngày với pin 5000 mAh và sạc nhanh 33 W\nHiệu năng ổn định với chip Snapdragon 680', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 13 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nSnapdragon 680\r\nRAM:\r\n\r\n6 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0),
(9, 'Điện thoại OPPO A57 128GB', 4290000.00, 100, 'thumb-OPPO A57 4GB 128GB.jpg,couple Oppo A57 12GB.png,Oppo A57 4G 128G blue.jpg,Oppo A57 128Gb .png,oppo a57 128G.jpg,oppo a57 4g.jpg', 0.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO đã bổ sung thêm vào dòng sản phẩm OPPO A giá rẻ một thiết bị mới có tên OPPO A57 128GB. Khác với mẫu A57 5G đã được ra mắt trước đó, điện thoại dòng A mới có màn hình HD+, camera chính 13 MP và pin 5000 mAh.\nThiết kế trẻ trung\nHiệu năng ổn định trong tầm giá\nHỗ trợ chụp ảnh quay phim', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 13 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n4 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0),
(10, 'Điện thoại OPPO A17', 3790000.00, 100, 'oppo-a-17t_i_xu_ng_30__3.png,thumb-oppo-a-17b1ppr0nazrpqahyt.jpg,oppo a17 dep khong can cho che.png,oppo a17 blue tao lao.png,oppo 17 dep khong phai che.png,oppo a17 chuan dep blue.png', 0.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'Dường như OPPO đang ngày càng quan tâm đến trải nghiệm của người dùng, điều này được minh chứng qua nhiều dòng điện thoại của hãng trong đó có OPPO A17, máy sở hữu màn hình kích thước lớn, camera 50 MP đi cùng viên pin 5000 mAh với thời lượng dùng bền bỉ.\nDiện mạo mới lạ và độc đáo\nBắt trọn khoảnh khắc đẹp với độ chi tiết cao\nKhông gian hiển thị rộng lớn\nMang đến sự ổn định nhờ chipset MediaTek\nThoải mái sử dụng cả ngày nhờ pin lớn', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 0.3 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n4 GB\r\nDung lượng lưu trữ:\r\n\r\n64 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh10 W', 0),
(11, 'Điện thoại OPPO A17K', 3200000.00, 100, 'thumb-oppo a17k dien thoai thong minh.png,t_i_xu_ng_62__1.png,oppo a17k.png,combo_a17k_-_navy_-_cmyk.jpg,oppo a17 mau kim rat dep.png,Oppo A17 gia re uu dai.jpg', 0.00, 0, 0, '2023-03-12 03:21:43', '2023-03-14 15:25:01', 'OPPO A17K là chiếc điện thoại được kế thừa thiết kế tinh tế của OPPO A16K, được nâng cấp về dung lượng pin, đồng thời cũng sở hữu màn hình chi tiết cùng một hiệu năng ổn định được nhà OPPO cho ra mắt vào những tháng cuối năm 2022.\r\nSử dụng thả ga với viên pin lớn, hiệu năng mượt mà\r\nTrải nghiệm tuyệt hơn trên màn hình lớn\r\nChụp ảnh rõ nét nhờ camera AI\r\n', 1, 11, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\n8 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n3 GB\r\nDung lượng lưu trữ:\r\n\r\n64 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh10 W', 0),
(12, 'OPPO Find X3 Pro 5G', 18790000.00, 100, 'thumb-oppo-find-x3-pro-5g-3_2.jpg,Oppo Fnd X3 Pro chuan dep phai manh.jpg,Oppo Find X pro 5g dep mat.jpg,Oppo Find X3 Pro ket hop cung voi nhau.jpg,Oppo Find x3 pro 5g chuan dep.jpg,Oppo find x3 pro 5g.jpg', 10.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'Đánh giá Oppo Find X3 Pro 5G – Hiệu năng dẫn đầu, màn hình chiếm trọn\r\nFind X là dòng sản phẩm được OPPO chăm chút nhiều nhất, đặc biệt là những công nghệ hoàn toàn hiện đại. Bằng chứng Find X3 Pro mang đến vẻ ngoài mới, camera selfie được ẩn dưới màn hình, cùng cấu hình mạnh mẽ đến từ chip Snapdragon 865.\r\nHoàn thiện nguyên khối, màn hình 2K rực rỡ\r\nCấu hình mạnh mẽ với bộ vi xử lý Snapdragon 888, 12GB RAM và 256GB bộ nhớ trong\r\nCụm bốn camera sau, cho phép chụp góc siêu rộng, camera selfie ẩn dưới màn hình\r\nViên pin dung lượng 4500 mAh, sạc nhanh 65W\r\nĐiện thoại Oppo Find X3 Pro giá bao nhiêu tiền?\r\nMua OPPO Find X3 Pro 5G chính hãng, giá rẻ tại CellphoneS\r\n', 1, 2, 'Kích thước màn hình\r\n6.7 inches\r\nCông nghệ màn hình\r\nAMOLED\r\nCamera sau\r\nCamera chính: 50 MP, f/1.8, 1/1.56\", 1.0µm, PDAF, OIS\r\nCamera tele: 13 MP, f/2.4, 52mm PDAF, zoom quang 5x\r\nCamera góc rộng: 50 MP, f/2.2, 110˚, 1/1.56\", 1.0µm, omnidirectional PDAF\r\nCamera macro: 3 MP, f/3.0\r\nCamera trước\r\n32 MP, f/2.4, 26mm (wide), 1/2.8\", 0.8µm\r\nChipset\r\nSnapdragon 888 (5 nm)\r\nCông nghệ màn hình\r\nAMOLED\r\nDung lượng RAM\r\n12 GB\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\n4500mAh', 0),
(13, 'OPPO Find X', 11990000.00, 100, 'thumb-find_x.jpg,oppo-find-x-dep.jpg,find-x-1_1.jpg,find-x-6.jpg,find-x-5.jpg,oppo-find-x_1.jpg', 0.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO Find X Chính hãng\r\nSau sự thành công của OPPO F7 Youth, OPPO Find 7, hãng điện thoại OPPO đang từng bước khẳng định vị thế của một trong những hãng sản xuất smartphone hàng đầu thế giới. Với chiếc Find X sở hữu thiết kế đột phá, công ty này quyết tâm khẳng định họ hoàn toàn có thể sáng tạo hơn cả Apple lẫn Samsung.\r\n\r\nNgoài ra, khách hàng có thể tham khảo điện thoại Oppo Find X2 với nhiều nâng cấp về cấu hình, camera.\r\nThiết kế OPPO Find X mang lại sự khác biệt\r\nMàn hình OPPO Find X đem đến trải nghiệm hình ảnh sống động\r\nHiệu năng OPPO Find X thuộc top đầu thị trường\r\nOPPO Find X tích hợp công nghệ mở khóa bằng gương mặt hiện đại\r\nOPPO Find X có thời lượng pin ấn tượng và thời gian sạc cũng rất nhanh\r\nCamera OPPO Find X lưu giữ chân thực mọi khoảnh khắc\r\n', 1, 2, 'Công nghệ màn hình\r\n\r\nCảm ứng điện dung AMOLED, 16 triệu màu\r\nKích thước màn hình\r\n\r\n6.42 inches\r\nCamera sau\r\n\r\n16 MP (f/2.0, PDAF, OIS) + 20 MP (f/2.0), tự động lấy nét nhận diện theo giai đoạn, LED flash kép (2 tone)\r\nCamera trước\r\n\r\n2160p@30fps\r\nChipset\r\n\r\nQualcomm SDM845 Snapdragon 845\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\nLi-ion 3730 mAh\r\nThẻ SIM\r\n\r\n2 SIM (Nano-SIM)\r\nHệ điều hành\r\n\r\n8.1 (Oreo)\r\nĐộ phân giải màn hình\r\n\r\n1080 x 2340 pixels (FullHD+)\r\nTrọng lượng\r\n\r\n186 g (6.56 oz)\r\nCảm biến\r\n\r\nFace ID, gia tốc, con quay hồi chuyển, khoảng cách, la bàn', 0),
(14, 'OPPO Find X2', 18990000.00, 100, 'thumb-637191049692122812_oppo-find-x2-xanh-1.png,637194498955419635_oppo-find-x2-den-3.png,637194498955464088_oppo-find-x2-den-4.png,637194500600555695_oppo-find-x2-xanh-3.png,Oppo Find X dep gia re.jpg,637194500601105652_oppo-find-x2-xanh-4.png', 10.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'Oppo Find X2 – Hiệu năng đỉnh cao, màn hình chiếm trọn mặt trước\r\nOppo Find X2 và Find X2 Pro là chiếc điện thoại thuộc phân khúc cao cấp vừa được Oppo ra mắt, tiếp nối sự thành công vang dội của người tiền nhiệm Oppo Find X. Đây là mẫu sản phẩm điện thoại Oppo được thừa hưởng những công nghệ mới và tốt nhất ở thời điểm hiện tại so với các đối thủ cùng phân khúc. Ngoài ra, bạn cũng có thể tham khảo điện thoại Oppo Find X3 với nhiều nâng cấp về cấu hình, thiết kế, camera cũng như dung lượng pin.\r\nThiết kế chuyển màu nổi bật, cho cảm giác cực kì nhẹ nhàng\r\nMàn hình OLED 6,7 inchQuad-HD+ cho khả năng hiển thị sắc nét, sống động\r\nCấu hình mạnh mẽ với vi xử lý Snapdragon 865 đi kèm 12GB RAM\r\nDung lượng pin lên đến 4200mAh, có khả năng cho thiết bị khác\r\nBa camera sau 48 MP + 13 MP + 12MP cùng camera selfie 32 MP\r\nMua điện thoại Oppo Find X2 chính hãng, giá rẻ nhất tại CellphoneS', 1, 2, 'Kích thước màn hình\r\n\r\n6.7 inches\r\nCông nghệ màn hình\r\n\r\nAMOLED\r\nCamera sau\r\n\r\nChính 48 MP & Phụ 13 MP, 12 MP\r\nCamera trước\r\n\r\n32 MP\r\nChipset\r\n\r\nQualcomm Snapdragon 865\r\nCông nghệ màn hình\r\n\r\nAmoled\r\nDung lượng RAM\r\n\r\n12 GB\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\n4200 mAh Li-Ion, Hỗ trợ sạc nhanh\r\nThẻ SIM\r\n\r\n2 SIM (Nano-SIM)\r\nHệ điều hành\r\n\r\nAndroid 10.0 , ColorOS 7.0\r\nĐộ phân giải màn hình\r\n\r\n3168 x 1440 pixel\r\nTính năng màn hình\r\n\r\nMàn hình 2K, Tần số quét 120 Hz, Kính cường lực Corning Gorilla Glass 6\r\nCảm biến\r\n\r\n- Vân tay ẩn trong màn hình: Hỗ trợ\r\n- Cảm biến: Cảm biến nhiệt độ màu, Cảm biến ánh sáng, Cảm biến tiệm cận, La Bàn, Con Quay Hồi Chuyển.', 0),
(17, 'Xiaomi Redmi 10C', 3590000.00, 100, 'thumb-xiaomi-redmi-10c.jpeg,xiaomi-redmi-10c-1.jpeg, xiaomi-redmi-10c-2.jpeg,xiaomi-redmi-10c-3.jpeg, xiaomi-redmi-10c-4.jpeg', 10.00, 0, 0, '2023-03-13 20:28:03', '2023-03-14 15:25:01', 'Xiaomi Redmi 10C 64GB ra mắt với một cấu hình mạnh mẽ nhờ trang bị con chip 6 nm đến từ Qualcomm, màn hình hiển thị đẹp mắt, pin đáp ứng nhu cầu sử dụng cả ngày, hứa hẹn mang đến trải nghiệm tuyệt vời so với mức giá mà nó trang bị.', 4, 13, 'Màn hình: IPS LCD6.71\"HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 50 MP & Phụ 2 MP \r\nCamera trước: 5 MP \r\nChip: Snapdragon 680 \r\nRAM: 4 GB \r\nDung lượng lưu trữ: 64 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 4G Pin\r\nSạc: 5000 mAh18 W', 0),
(18, 'Xiaomi Redmi Note 11', 4390000.00, 100, 'thumb-xiaomi-redmi-note-11.jpeg,xiaomi-redmi-note-11-1.jpeg, xiaomi-redmi-note-11-2.jpeg,xiaomi-redmi-note-11-3.jpeg,xiaomi-redmi-note-11-4.jpeg                                                                ', 10.00, 0, 0, '2023-03-13 20:32:03', '2023-03-14 15:25:01', 'Redmi Note 11 (6GB/128GB) vừa được Xiaomi cho ra mắt, được xem là chiếc smartphone có giá tầm trung ấn tượng, với 1 cấu hình mạnh, cụm camera xịn sò, pin khỏe, sạc nhanh mà giá lại rất phải chăng.Thiết kế bo cong đậm chất Xiaomi,Hiệu năng mạnh mẽ với chip Snapdragon,Màn hình sắc nét, chiến game mượt mà, Bắt trọn từng khoảnh khắc với cụm camera xịn sò.', 4, 13, 'Màn hình: AMOLED6.43\"Full HD+ \r\nHệ điều hành: Android 11      \r\nCamera sau: Chính 50 MP & Phụ 8 MP, 2 MP, 2 MP      \r\nCamera trước: 13 MP      \r\nChip: Snapdragon 680     \r\nRAM: 6 GB       \r\nDung lượng lưu trữ: 128 GB       \r\nSIM: 2 Nano SIM\r\nHỗ trợ 4G      \r\nPin, Sạc: 5000 mAh33 W', 0),
(19, 'Xiaomi Redmi Note 11 Pro', 6190000.00, 100, 'thumb-xiaomi-redmi-note-11-pro.jpeg, xiaomi-redmi-note-11-pro-1.jpeg, xiaomi-redmi-note-11-pro-2.jpeg, xiaomi-redmi-note-11-pro-3.jpeg, xiaomi-redmi-note-11-pro-4.jpeg        ', 10.00, 0, 0, '2023-03-13 20:35:08', '2023-03-14 15:25:01', 'Xiaomi Redmi Note 11 Pro 4G mang trong mình khá nhiều những nâng cấp cực kì sáng giá. Là chiếc điện thoại có màn hình lớn, tần số quét 120 Hz, hiệu năng ổn định cùng một viên pin siêu trâu.Thiết kế cứng cáp, cầm nắm rất đầm tay,Hiệu năng ổn định cho mọi tác vụ,Camera AI đến 108 MP,Pin lớn, sạc siêu nhanh.', 4, 13, 'Màn hình: AMOLED6.67\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 108 MP & Phụ 8 MP, 2 MP, 2 MP \r\nCamera trước: 16 MP \r\nChip: MediaTek Helio G96 \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 128 GB \r\nSIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ)\r\nHỗ trợ 4G Pin\r\nSạc: 5000 mAh67 W', 0),
(20, 'Xiaomi Redmi Note 11S', 5690000.00, 100, 'thumb-xiaomi-redmi-note-11s.jpeg,xiaomi-redmi-note-11s-1.jpeg,xiaomi-redmi-note-11s-2.jpeg,xiaomi-redmi-note-11s-3.jpeg, xiaomi-redmi-note-11s-4.jpeg         ', 10.00, 0, 0, '2023-03-13 20:37:08', '2023-03-14 15:25:01', 'Điện thoại Xiaomi Redmi Note 11S sẵn sàng đem đến cho bạn những trải nghiệm vô cùng hoàn hảo về chơi game, các tác vụ sử dụng hằng ngày hay sự ấn tượng từ vẻ đẹp bên ngoài.Ấn tượng với màn hình AMOLED 6.43 inch,Ảnh chụp đẹp và siêu rõ nét với hệ thống bốn camera AI 108 MP,Hiệu năng ổn định với MediaTek Helio G96,Thiết kế tối giản nhưng vẫn năng động và mạnh mẽ.', 4, 13, 'Màn hình: AMOLED6.43\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 108 MP & Phụ 8 MP, 2 MP, 2 MP \r\nCamera trước: 16 MP \r\nChip: MediaTek Helio G96 \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 128 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 4G Pin, \r\nSạc: 5000 mAh33 W', 0),
(21, 'Xiaomi Redmi 10', 4100000.00, 100, 'thumb-xiaomi-redmi-10-2022-xanh.jpeg, xiaomi-redmi-10-2022-xanh-1.jpeg, xiaomi-redmi-10-2022-xanh-2.jpeg, xiaomi-redmi-10-2022-xanh-3.jpeg, xiaomi-redmi-10-2022-xanh-4.jpeg     ', 10.00, 0, 0, '2023-03-13 20:39:08', '2023-03-14 15:25:01', 'Xiaomi Redmi 10 (2022) được ra mắt vào tháng 05/2022 với những nâng cấp về thuật toán xử lý khi chụp ảnh trên camera nhằm giúp khách hàng có được những bức hình chất lượng hơn trên một thiết bị thuộc phân khúc giá rẻ.Chụp ảnh chất lượng, Màn hình hiển thị sống động, Hiệu suất mạnh mẽ nhờ chipset gaming đến từ MediaTek, Thời lượng sử dụng dài lâu.', 4, 13, 'Màn hình: IPS LCD6.5\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 50 MP & Phụ 8 MP, 2 MP, 2 MP \r\nCamera trước: 8 MP \r\nChip: MediaTek Helio G88 \r\nRAM: 4 GB \r\nDung lượng lưu trữ: 128 GB \r\nSIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ)\r\nHỗ trợ 4G Pin \r\nSạc: 5000 mAh18 W', 0),
(22, 'Xiaomi 12T 5G', 11390000.00, 100, 'thumb-xiaomi-12t-glr-den.jpeg, xiaomi-12t-glr-den-1.jpeg, xiaomi-12t-glr-den-2.jpeg, xiaomi-12t-glr-den-3.jpeg, xiaomi-12t-glr-den-4.jpeg      ', 10.00, 0, 0, '2023-03-13 20:42:54', '2023-03-14 15:25:01', 'Xiaomi 12T 5G 256GB là smartphone đầu tiên trên thế giới trang bị con chip Dimensity 8100 Ultra nên máy thu hút được khá nhiều sự chú ý vào thời điểm ra mắt, bộ vi xử lý này không chỉ có hiệu năng mạnh mẽ mà nó còn tối ưu được giá thành cho thiết bị, điều này giúp 12T trở thành chiếc điện thoại quốc dân cực kỳ đáng sắm.', 4, 14, 'Màn hình: AMOLED6.67\"1.5K \r\nHệ điều hành: Android 12 \r\nCamera sau: Chính 108 MP & Phụ 8 MP, 2 MP \r\nCamera trước: 20 MP \r\nChip: MediaTek Dimensity 8100 Ultra 8 nhân \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 256 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 5G Pin\r\nSạc: 5000 mAh120 W', 0),
(23, 'Xiaomi 11T 5G', 8990000.00, 100, 'thumb-xiaomi-11t-xanh-duong.jpeg, xiaomi-11t-xanh-duong-1.jpeg, xiaomi-11t-xanh-duong-2.jpeg, xiaomi-11t-xanh-duong-3.jpeg, xiaomi-11t-xanh-duong-4.jpeg  ', 10.00, 0, 0, '2023-03-13 20:45:54', '2023-03-14 15:25:01', 'Xiaomi 11T 5G sở hữu màn hình AMOLED, viên pin siêu khủng cùng camera độ phân giải 108 MP, điện thoại Xiaomi sẽ đáp ứng mọi nhu cầu sử dụng của bạn, từ giải trí đến làm việc đều vô cùng mượt mà. Cho ra những tác phẩm đầy chân thật với camera 108 MP, Sẵn sàng “chiến” mọi tựa game, Màn hình lớn, độ phân giải cao cho hình ảnh sắc nét.\r\n', 4, 14, 'Màn hình: AMOLED6.67\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 108 MP & Phụ 8 MP, 5 MP \r\nCamera trước: 16 MP \r\nChip: MediaTek Dimensity 1200 \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 256 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 5G Pin\r\nSạc: 5000 mAh67 W', 0),
(24, 'Xiaomi 13 Pro 5G', 29990000.00, 100, 'thumb-xiaomi-13-pro-trang.jpeg, xiaomi-13-pro-trang-1.jpeg, xiaomi-13-pro-trang-2.jpeg, xiaomi-13-pro-trang-3.jpeg, xiaomi-13-pro-trang-4.jpeg  ', 10.00, 0, 0, '2023-03-13 20:48:54', '2023-03-14 15:25:01', 'Sau biết bao thông tin rò rỉ Xiaomi 13 Pro cũng đã chính thức giới thiệu tại thị trường Việt Nam với sự háo hức đến từ các Mi fan trong nước, đây dự kiến sẽ là mẫu điện thoại quốc dân cho năm 2023 bởi máy sở hữu con chip Snapdragon 8 Gen 2 mạnh mẽ cùng với đó là sự cộng tác với nhà Leica để khiến mọi người dùng đam mê nhiếp ảnh mê hoặc.', 4, 14, 'Màn hình: AMOLED6.73\"Quad HD+ (2K+) \r\nHệ điều hành: Android 13 \r\nCamera sau: Chính 50 MP & Phụ 50 MP, 50 MP \r\nCamera trước: 32 MP \r\nChip: Snapdragon 8 Gen 2 8 nhân \r\nRAM: 12 GB \r\nDung lượng lưu trữ: 256 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 5G Pin \r\nSạc: 4820 mAh120 W', 0),
(25, 'Xiaomi 12 5G', 11690000.00, 100, 'thumb-xiaomi-mi-12.jpeg, xiaomi-mi-12-1.jpeg, xiaomi-mi-12-2.jpeg, xiaomi-mi-12-3.jpeg, xiaomi-mi-12-4.jpeg      ', 10.00, 0, 0, '2023-03-13 20:50:54', '2023-03-14 15:25:01', 'Điện thoại Xiaomi đang dần khẳng định chỗ đứng của mình trong phân khúc flagship bằng việc ra mắt Xiaomi 12 với bộ thông số ấn tượng, máy có một thiết kế gọn gàng, hiệu năng mạnh mẽ, màn hình hiển thị chi tiết cùng khả năng chụp ảnh sắc nét nhờ trang bị ống kính đến từ Sony.', 4, 14, 'Màn hình: AMOLED6.28\"Full HD+ \r\nHệ điều hành: Android 12 \r\nCamera sau: Chính 50 MP & Phụ 13 MP, 5 MP \r\nCamera trước: 32 MP \r\nChip: Snapdragon 8 Gen 1 \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 256 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 5G Pin\r\nSạc: 4500 mAh67 W', 0),
(26, 'Xiaomi 11 Lite 5G NE', 7090000.00, 100, 'thumb-xiaomi-11-lite-5g-ne.jpeg, xiaomi-11-lite-5g-ne-1.jpeg, xiaomi-11-lite-5g-ne-2.jpeg, xiaomi-11-lite-5g-ne-3.jpeg, xiaomi-11-lite-5g-ne-4.jpeg  ', 10.00, 0, 0, '2023-03-13 20:52:54', '2023-03-14 15:25:01', 'Xiaomi 11 Lite 5G NE một phiên bản có ngoại hình rất giống với Xiaomi Mi 11 Lite được ra mắt trước đây. Chiếc smartphone này của Xiaomi mang trong mình một hiệu năng ổn định, thiết kế sang trọng và màn hình lớn đáp ứng tốt các tác vụ hằng ngày của bạn một cách dễ dàng.', 4, 14, 'Màn hình: AMOLED6.55\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 64 MP & Phụ 8 MP, 5 MP \r\nCamera trước: 20 MP \r\nChip: Snapdragon 778G 5G \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 128 GB \r\nSIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ)\r\nHỗ trợ 5G Pin \r\nSạc: 4250 mAh33 W', 0),
(27, 'Xiaomi Poco M4 Pro 5G', 3790000.00, 100, 'thumb-poco-m4-pro-5g.jpeg, xiaomi-poco-m4-pro-1.jpeg, xiaomi-poco-m4-pro-2.jpeg, xiaomi-poco-m4-pro-3.jpeg, xiaomi-poco-m4-pro-4.jpeg   ', 10.00, 0, 0, '2023-03-13 20:54:35', '2023-03-14 15:25:01', 'Poco M4 Pro 5G là một trong những chiếc Smartphone tầm trung đang nhận được nhiều sự quan tâm từ người dùng. Sản phẩm không chỉ có diện mạo đẹp mắt, chiếc máy này còn được trang bị nhiều công nghệ ấn tượng.Poco M4 Pro 5G có thiết kế hiện đại, mặt lưng bóng loáng nổi bật, sở hữu màn hình có kích thước khá lớn , được trang bị con chip Dimensity 810 khá mạnh mẽ.\r\n', 4, 15, 'Hệ điều hành: Android 11, MIUI 12.5 Chipset: MediaTek Dimensity 810 5G (6 nm) Độ phân giải: 1080 x 2400 pixels \r\nMàn hình rộng: 6.6 inches \r\nCamera sau: 50MP + 8MP \r\nRAM: 6 GB \r\nBộ nhớ trong ( Rom): 128GB \r\nCamera trước: 16 MP, f/2.5 \r\nDung lượng pin: 5000 mAh', 0),
(28, 'Xiaomi Poco F3', 6990000.00, 100, 'thumb-xiaomi-poco-f3.jpeg, xiaomi-poco-f3-1.jpeg, xiaomi-poco-f3-2.jpeg, xiaomi-poco-f3-3.jpeg, xiaomi-poco-f3-4.jpeg      ', 10.00, 0, 0, '2023-03-13 20:56:35', '2023-03-14 15:25:01', 'Xiaomi Poco F3, còn gọi là Poco F3 chính là phiên bản quốc tế được phân phối toàn cầu của mẫu smartphone tầm trung Xiaomi Redmi K40. Máy sở hữu thiết kế rất sang trọng nhiều phá cách, kết hợp với cấu hình - tính năng vô cùng mạnh mẽ: chip Snapdragon 870, màn hình tần số quét 120Hz, kết nối mạng 5G, sạc nhanh 33W...', 4, 15, 'Hệ điều hành: Android 11, MIUI 12 Chipset: Qualcomm SM8250-AC Snapdragon 870 5G (7 nm) \r\nĐộ phân giải: 1080 x 2400 pixels \r\nMàn hình rộng: 6.67 inches \r\nCamera sau: 3 camera: 48MP + 8MP + 5MP \r\nRAM: 8 GB \r\nBộ nhớ trong ( Rom): 256GB \r\nCamera trước: 20 MP, (wide) \r\nDung lượng pin: 4520 mAh', 0),
(29, 'Xiaomi POCO X3 Pro', 6790000.00, 100, 'thumb-xiaomi-poco-x3-pro.jpeg, Xiaomi-Poco-X3-Pro-1.jpeg, Xiaomi-Poco-X3-Pro-2.jpeg, Xiaomi-Poco-X3-Pro-3.jpeg, Xiaomi-Poco-X3-Pro-4.jpeg    ', 10.00, 0, 0, '2023-03-13 20:58:35', '2023-03-14 15:25:01', 'Xiaomi POCO X3 Pro 256GB là chiếc smartphone mạnh mẽ nhất, ngoại hình hoàn thiện tinh xảo nhất trong loạt smartphone tầm giá 6 triệu đồng, Màn hình Xiaomi POCO X3 Pro: Nổi bật với tần số 120Hz, Ấn tượng với cụm camera độc đáo, Mạnh mẽ, vượt trội với Snapdragon 860\r\n', 4, 15, 'Hệ điều hành: Android 11, MIUI 12 for POCO \r\nChipset: Snapdragon 860 \r\nĐộ phân giải: 1080 x 2400 pixels \r\nMàn hình rộng: 6.67 inches \r\nCamera sau: 4 camera: 48MP + 8MP + 2MP + 2MP \r\nRAM: 6 GB \r\nBộ nhớ trong ( Rom): 128 GB \r\nCamera trước: 20 MP, f/2.2, (wide), 1/3.4\", 0.8µm \r\nDung lượng pin: 5160 mAh', 0),
(30, 'Xiaomi Poco X4 Pro 5G', 5990000.00, 100, 'thumb-xiaomi-poco-x4-pro.jpeg, xiaomi-poco-x4-pro-1.jpeg, xiaomi-poco-x4-pro-2.jpeg, xiaomi-poco-x4-pro-3.jpeg, xiaomi-poco-x4-pro-4.jpeg  ', 10.00, 0, 0, '2023-03-13 21:00:35', '2023-03-14 15:25:01', 'Xiaomi Poco X4 Pro 5G là chiếc smartphone tầm trung vừa được ra mắt trong khuôn khổ MCW 2022 vừa qua. Đây có lẽ là chiếc smartphone giá rẻ sở hữu màn hình OLED tần số quét 120Hz hiếm hoi trong phân khúc. Ngoài ra máy còn sở hữu các thông số cấu hình cực mạnh.', 4, 15, 'Hệ điều hành: Android 11, MIUI 13 for POCO \r\nChipset: Qualcomm SM6375 Snapdragon 695 5G (6 nm) \r\nĐộ phân giải: 1080 x 2400 pixels \r\nMàn hình rộng: 6.67 inches \r\nCamera sau: 108MP + 8MP + 2MP \r\nRAM: 8 GB \r\nBộ nhớ trong ( Rom): 256GB \r\nCamera trước: 16 MP, f/2.4, (wide) \r\nDung lượng pin: 5000 mAh', 0),
(31, 'Xiaomi Poco F4', 7590000.00, 100, 'thumb-xiaomi-poco-f4.jpeg, xiaomi-poco-f4-1.jpeg, xiaomi-poco-f4-2.jpeg, xiaomi-poco-f4-3.jpeg, xiaomi-poco-f4-4.jpeg      ', 10.00, 0, 0, '2023-03-13 21:02:35', '2023-03-14 15:25:01', 'Xiaomi Poco F4 - Smartphone tầm trung, cận cao cấp nhận được sự chào đón nồng nhiệt từ người dùng. Với cấu hình mạnh mẽ, màn hình hiển thị rực rỡ, pin khủng và nhiều công nghệ thông minh, đi kèm đó là giá bán khá hợp lý. Xiaomi Poco F4 nhanh chóng trở thành một cái tên khá HOT và được săn đón nhiều!', 4, 15, 'Hệ điều hành: Android 10; MIUI 11 \r\nChipset: Snapdragon 870 \r\nĐộ phân giải: 1080 x 2400 pixels \r\nMàn hình rộng: 6.67 inches \r\nCamera sau: 3 camera: 64MP + 8MP +5MP \r\nRAM: 6 GB \r\nBộ nhớ trong ( Rom): 128 GB \r\nCamera trước: 20MP \r\nDung lượng pin: 4520 mAh', 0),
(32, 'Xiaomi Poco X3 GT', 7290000.00, 100, 'thumb-xiaomi-poco-x3-gt.jpeg, xiaomi-poco-x3-gt-1.jpeg, xiaomi-poco-x3-gt-2.png, xiaomi-poco-x3-gt-3.jpeg, xiaomi-poco-x3-gt-4.jpeg           ', 10.00, 0, 0, '2023-03-13 21:05:35', '2023-03-14 15:25:01', 'POCO – thương hiệu con của Xiaomi đã cho ra mắt một mẫu smartphone mới mang tên Xiaomi POCO X3 GT, được biết đây là phiên bản đổi tên của Redmi Note 10 Pro 5G máy có thiết kế nguyên khối, mặt lưng độc đáo với hiệu ứng đổi màu khá đẹp mắt.', 4, 15, 'Màn hình: IPS LCD6.6\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 64 MP & Phụ 8 MP, 2 MP \r\nCamera trước: 16 MP \r\nChip: MediaTek Dimensity 1100 \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 256 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 5G Pin, \r\nSạc: 5000 mAh67 W', 0),
(44, 'iPhone 14 Pro Max ', 27990000.00, 100, 'thumb-iphone14prm-1.jpg,iphone14prm-2.jpg,iphone14prm-3.jpg,iphone14prm-4.jpg,iphone14prm-5.jpg', 5.00, 0, 0, '2023-03-13 16:16:32', '2023-03-14 18:40:31', 'Mới đây thì chiếc điện thoại iPhone 14 Pro Max 256GB cũng đã được chính thức lộ diện trên toàn cầu và đập tan bao lời đồn đoán bấy lâu nay, bên trong máy sẽ được trang bị con chip hiệu năng khủng cùng sự nâng cấp về camera đến từ nhà Apple.\r\nDiện mạo đẳng cấp dẫn đầu xu thế\r\nTrang bị cụm 3 camera chất lượng\r\nTrải nghiệm nội dung sinh động trên một màn hình chất lượng\r\nNâng cao khả năng xử lý nhờ chipset khủng', 2, 4, 'Màn hình: OLED6.7\" Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: Chính 48 MP & Phụ 12 MP, 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A16 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 256 GB\r\nSIM: 1 Nano SIM & 1 eSIM Hỗ trợ 5G\r\nPin, Sạc: 4323 mAh 20 W', 0),
(45, 'iPhone 14 Pro ', 25990000.00, 100, 'thumb-iphone14pr-1.jpg,iphone14pr-2.jpg,iphone14pr-3.jpg,iphone14pr-4.jpg,iphone14pr-5.jpg', 5.00, 0, 0, '2023-03-13 16:16:32', '2023-03-14 18:40:31', 'Mới đây thì chiếc điện thoại iPhone 14 Pro cũng đã được chính thức lộ diện trên toàn cầu và đập tan bao lời đồn đoán bấy lâu nay, bên trong máy sẽ được trang bị con chip hiệu năng khủng cùng sự nâng cấp về camera đến từ nhà Apple.\r\nDiện mạo đẳng cấp dẫn đầu xu thế\r\nTrang bị cụm 3 camera chất lượng\r\nTrải nghiệm nội dung sinh động trên một màn hình chất lượng\r\nNâng cao khả năng xử lý nhờ chipset khủng', 2, 4, 'Màn hình: OLED6.1 \"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: Chính 48 MP & Phụ 12 MP, 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A16 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 256 GB\r\nSIM: 1 Nano SIM & 1 eSIM Hỗ trợ 5G\r\nPin, Sạc: 3200 mAh 20 W', 0),
(46, 'iPhone 14 Plus', 17990000.00, 100, 'thumb-iphone14plus-1.jpg,iphone14plus-2.jpg,iphone14plus-3.jpg,iphone14plus-4.jpg,iphone14plus-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Sau nhiều thế hệ điện thoại của Apple thì cái tên “Plus” cũng đã chính thức trở lại vào năm 2022 và xuất hiện trên chiếc iPhone 14 Plus 128GB, nổi trội với ngoại hình bắt trend cùng màn hình kích thước lớn để đem đến không gian hiển thị tốt hơn cùng cấu hình mạnh mẽ không đổi so với bản tiêu chuẩn.\r\nThân hình thanh mảnh cùng ngoại hình góc cạnh\r\nMàn hình OLED tái hiện nội dung sinh động\r\nDễ dàng bắt trọn mọi khoảnh khắc\r\nHiệu năng cực khủng với Apple A15 Bionic', 2, 4, 'Màn hình: OLED6.7\" Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 4325 mAh20 W', 0),
(47, 'iPhone 14 ', 15990000.00, 100, 'thumb-iphone14-1.jpg,iphone14-2.jpg,iphone14-3.jpg,iphone14-4.jpg,iphone14-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Mới đây thì tại sự kiện ra mắt sản phẩm mới thường niên đến từ nhà Apple thì chiếc điện thoại iPhone 14 256GB cũng đã chính thức lộ diện, thiết bị được nâng cấp toàn diện từ camera cho đến hiệu năng và hầu hết là những thông số hàng đầu trong giới smartphone. \r\nĐẳng cấp thiết kế dẫn đầu xu thế\r\nTrang bị công nghệ màn hình tân tiến\r\nHỗ trợ chụp ảnh quay phim chuẩn điện ảnh\r\nVi xử lý mạnh mẽ đến từ nhà Apple', 2, 4, 'Màn hình: OLED6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 256 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh 20 W', 0),
(48, 'iPhone 13 Pro Max', 24990000.00, 100, 'thumb-iphone13prm-1.jpg,iphone13prm-2.jpg,iphone13prm-3.jpg,iphone13prm-4.jpg,iphone13prm-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'iPhone 13 Pro Max thuộc phân khúc điện thoại cao cấp mà không một iFan nào có thể bỏ qua, với màn hình lớn sắc nét, cấu hình vượt trội, dung lượng lưu trữ \"khủng\", thời gian sử dụng dài, mỗi lần trải nghiệm đều cho bạn cảm giác thỏa mãn đáng ngạc nhiên.\r\nApple A15 Bionic - cấu hình đột phá\r\nTải xuống siêu nhanh cùng mạng 5G\r\nXem nội dung nhiều hơn, rõ nét hơn với màn hình lớn\r\nNâng cấp hệ thống camera \r\nVẻ ngoài sang trọng đặc trưng\r\nDung lượng pin đáp ứng đến 95 giờ nghe nhạc', 2, 5, 'Màn hình: OLED6.7\" Super Retina XDR\r\nHệ điều hành: iOS 15\r\nCamera sau: 3 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 1 TB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 4352 mAh 20 W', 0),
(49, 'iPhone 13 Pro', 20990000.00, 100, 'thumb-iphone13pro-1.jpg,iphone13pro-2.jpg,iphone13pro-3.jpg,iphone13pro-4.jpg,iphone13pro-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Cùng trải nghiệm một phiên bản iPhone có bộ nhớ trong lớn nhất từ trước đến nay, \r\ntương tự với các phiên bản khác máy vẫn có một màn hình siêu đẹp cùng hiệu năng vô cùng mạnh mẽ đó chính là iPhone 13 Pro .\r\nHiệu năng tuyệt vời nhờ chip thế hệ mới\r\nKhung hình rực rỡ, tần số quét màn hình 120 Hz\r\nCụm camera thách thức khả năng sáng tạo của bạn\r\nThiết kế sang chảnh, đa sắc màu lựa chọn\r\nCải thiện thời lượng pin thêm 2.5 giờ sử dụng', 2, 5, 'Màn hình: OLED6.1\" Super Retina XDR\r\nHệ điều hành: iOS 15\r\nCamera sau: 3 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 1 TB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3095 mAh20 W', 0),
(50, 'iPhone 13 Mini', 15990000.00, 100, 'thumb-iphone13mini-1.jpg,iphone13mini-2.jpg,iphone13mini-3.jpg,iphone13mini-4.jpg,iphone13mini-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Đánh giá iPhone 13 mini – Phiên bản thu nhỏ hoàn hảo của iPhone 13\r\nTương tự như iPhone 12 Series, iPhone 13 cũng sẽ được trang bị một phiên bản thu nhỏ mang tên iPhone 13 mini. Mẫu iPhone nhỏ gọn với nhiều cải tiến so với iPhone 12 mini tiền nhiệm.\r\nThiết kế nhỏ gọn, khung viền vuông vắn\r\nMàn hình Super Retina XDR\r\nHiệu năng nâng cấp với chip Apple A15 Bionic\r\nDung lượng pin được cải thiện, hỗ trợ sạc nhanh\r\nCamera cảm biến nâng cấp', 2, 5, 'Kích thước màn hình 5.4 inches\r\nCông nghệ màn hình OLED\r\nCamera sau Camera góc rộng: 12MP, f/1.6\r\nCamera góc siêu rộng: 12MP, ƒ/2.4\r\nCamera trước 12MP, f/2.2\r\nChipset Apple A15\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 128 GB\r\nPin 2406mAh\r\nThẻ SIM 2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành iOS15\r\nĐộ phân giải màn hình 1080 x 2340 pixels (FullHD+)', 0),
(51, 'iPhone 13 ', 16990000.00, 100, 'thumb-iphone13-1.jpg,iphone13-2.jpg,iphone13-3.jpg,iphone13-4.jpg,iphone13-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Apple thỏa mãn sự chờ đón của iFan và người dùng với sự ra mắt của iPhone 13. Dù ngoại hình không có nhiều thay đổi so với iPhone 12 nhưng với cấu hình mạnh mẽ hơn, đặc biệt pin “trâu” hơn và khả năng quay phim chụp ảnh cũng ấn tượng hơn, hứa hẹn mang đến những trải nghiệm thú vị trên phiên bản mới này.\r\nHiệu năng đột phá cùng bộ xử lý Apple A15 Bionic\r\nMàn hình Super Retina XDR sắc nét, siêu sáng\r\nHệ thống camera xuất sắc\r\n“Áo” mới tinh tế hơn\r\nPin khỏe hơn, trải nghiệm tốt hơn', 2, 5, 'Màn hình: OLED6.1\"Super Retina XDR\r\nHệ điều hành: iOS 15\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 4 GB\r\nDung lượng lưu trữ: 256 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3240 mAh20 W', 0),
(52, 'iPhone 12 Pro Max', 18990000.00, 100, 'thumb-iphone12prm-2.jpg,iphone12prm-1.jpg,iphone12prm-3.jpg,iphone12prm-4.jpg,iphone12prm-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Điện thoại iPhone 12 Pro Max: Nâng tầm đẳng cấp sử dụng\r\nCứ mỗi năm, đến dạo cuối tháng 8 và gần đầu tháng 9 thì mọi thông tin sôi sục mới về chiếc iPhone mới lại xuất hiện. Apple năm nay lại ra thêm một chiếc iPhone mới với tên gọi mới là iPhone 12 Pro Max, đây là một dòng điện thoại mới và mạnh mẽ nhất của nhà Apple năm nay. Mời bạn tham khảo thêm một số mô tả sản phẩm bên dưới để bạn có thể ra quyết định mua sắm.\r\nMàn hình 6.7 inches Super Retina XDR\r\nRAM 6GB đa nhiệm thoải mái, bộ nhớ trong dung lượng lớn\r\nCon chip Apple A14 SoC 5nm, RAM 6GB mạnh mẽ\r\nCụm 3 camera sau với độ phân giải 12MP  \r\nCamera trước 12MP hỗ trợ mở FaceiD cùng công nghệ chống nước IP68\r\nViên pin liền cho thời lượng sử dụng lên đến cả ngày cùng công nghệ sạc nhanh ', 2, 6, 'Kích thước màn hình 6.7 inches\r\nCông nghệ màn hình OLED\r\nCamera sau Camera chính: 12 MP, f/1.6, 26mm, 1.4µm, dual pixel PDAF, OIS\r\nCamera tele: 12 MP, f/2.0, 52mm, 1/3.4\", 1.0µm, PDAF, OIS, 2x optical zoom\r\nCamera góc siêu rộng: 12 MP, f/2.4, 120˚, 13mm, 1/3.6\"\r\nCảm biến: TOF 3D LiDAR scanner\r\nCamera trước 12 MP, f/2.2, 23mm (wide), 1/3.6\"\r\nSL 3D, (depth/biometrics sensor)\r\nChipset Apple A14 Bionic (5 nm)\r\nCông nghệ màn hình Super Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone\r\nDung lượng RAM 6 GB\r\nBộ nhớ trong 128 GB\r\nPin Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Power Delivery 2.0\r\nThẻ SIM 2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)', 0),
(53, 'iPhone 12 Pro ', 14990000.00, 100, 'thumb-iphone12pro-1.jpg,iphone12pro-2.jpg,iphone12pro-3.jpg,iphone12pro-4.jpg,iphone12pro-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', '\"Điện thoại iPhone 12 Pro chính hãng (vn/a) – Dung lượng bộ nhớ trong lớn\r\nMẫu iPhone 2020 mới nhất của Apple được thiết kế khung viền vuông sang trọng được nhiều người dùng yêu thích. Trong đó, phiên bản iPhone 12 Pro chính hãng VNA hứa hẹn là một trong những sự lựa chọn lý tưởng.\r\nThiết kế sang trọng, phiên bản VNA chính hãng Việt Nam\"', 2, 6, '\"Công nghệ màn hình Super Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone\r\nKích thước màn hình 6.1 inches\r\nCông nghệ màn hình OLED\r\nCamera sau 12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS\r\n12 MP, f/2.0, 52mm (telephoto), 1/3.4\"\", 1.0µm, PDAF, OIS, 2x optical zoom\r\n12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\"\"\r\nTOF 3D LiDAR scanner (depth)\r\nCamera trước 12 MP, f/2.2, 23mm (wide), 1/3.6\"\"\r\nSL 3D, (depth/biometrics sensor)\r\nChipset Apple A14 Bionic (5 nm)\r\nDung lượng RAM 6 GB\r\nBộ nhớ trong 256 GB\r\nPin Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Power Delivery 2.0\r\nThẻ SIM 2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)\"', 0),
(54, 'iPhone 12 Mini', 10990000.00, 100, 'iphone12mini5.jpg,thumb-iphone12mini1.jpg,iphone12mini2.jpg,iphone12mini3.jpg,iphone12mini4.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', '\"Đánh giá iPhone 12 Mini - Kích thước nhỏ gọn, hiệu năng đỉnh cao\r\niPhone 12 series hiện nay đang là thế hệ smartphone hiện đại nhất của Apple, vẻ đẹp từ thiết kế, và sức hấp dẫn của các tính năng hiện đại mà dòng máy này sở hữu khiến người dùng công nghệ toàn cầu ‘đứng ngồi không yên”. iPhone 12 Mini tuy là phiên bản thấp nhất, nhưng chiếc smartphone này vẫn sở hữu những ưu điểm vượt trội về sự tiện lợi, linh động khi sử dụng và tính năng sạc nhanh cùng camera chất lượng cao.\r\nViền máy vát phẳng cùng màn hình tai thỏ 5.4 inch\r\nCụm camera 12MP cho khả năng chụp hình sắc nét\r\nTrang bị chip Apple A14 và RAM 4GB, bộ nhớ trong 64GB\r\nPin lithium-ion hỗ trợ sạc nhanh 20W, kể cả sạc không dây\"', 2, 6, '\"Công nghệ màn hình Super Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone\r\nKích thước màn hình 5.4 inches\r\nCông nghệ màn hình OLED\r\nCamera sau 12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS\r\n12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\"\"\r\nCamera trước 12 MP, f/2.2, 23mm (wide), 1/3.6\"\"\r\nSL 3D, (depth/biometrics sensor)\r\nChipset Apple A14 Bionic (5 nm)\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 64 GB\r\nPin Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Power Delivery 2.0\r\nThẻ SIM 2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)\r\nĐộ phân giải màn hình 1080 x 2340 pixels (FullHD+)\"', 0),
(55, 'iPhone 12', 12990000.00, 100, 'thumb-iphone12-2.jpg,iphone12-1.jpg,iphone12-3.jpg,iphone12-4.jpg,iphone12-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', '\"Apple iPhone 12 128GB chính hãng (VN/A) phiên bản bộ nhớ 128GB lưu trữ thoải mái\r\niPhone 12 hiện nay là cái tên “sốt xình xịch” bởi đây là một trong 4 siêu phẩm vừa được ra mắt của Apple với những đột phá về cả thiết kế lẫn cấu hình. Phiên bản Apple iPhone 12 128GB chính là một trong những chiếc iPhone được săn đón nhất bởi dung lượng bộ nhớ khủng, cho phép bạn thoải mái với vô vàn ứng dụng.\r\nDung lượng bộ nhớ trong lên đến 128GB và chip Apple A14 độc quyền\r\nThiết kế độc đáo với viền vát phẳng mạnh mẽ và hỗ trợ sạc nhanh 20W\"', 2, 6, '\"Kích thước màn hình 6.1 inches\r\nCông nghệ màn hình OLED\r\nCamera sau 12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS 12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\"\"\r\nCamera trước 12 MP, f/2.2, 23mm (wide), 1/3.6\"\" SL 3D, (depth/biometrics sensor)\r\nChipset Apple A14 Bionic (5 nm)\r\nCông nghệ màn hình Super Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 128 GB\r\nPin Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Power Delivery 2.0\r\nThẻ SIM 2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)\r\nĐộ phân giải màn hình 1170 x 2532 pixels\"', 0),
(56, 'iPhone 11 Pro Max', 11990000.00, 100, 'iphone11prm4.png,iphone11prm3.jpg,iphone11prm2.png,thumb-iphone11prm1.png', 5.00, 0, 0, '2023-03-13 16:35:00', '2023-03-14 18:40:31', '\"Điện thoại iPhone 11 Pro Max: Nâng tầm đẳng cấp sử dụng\r\nCứ mỗi năm, đến dạo cuối tháng 8 và gần đầu tháng 9 thì mọi thông tin sôi sục mới về chiếc iPhone mới lại xuất hiện. Apple năm nay lại ra thêm một chiếc iPhone mới với tên gọi mới là iPhone 11 Pro Max, đây là một dòng điện thoại mới và mạnh mẽ nhất của nhà Apple năm nay. Mời bạn tham khảo thêm một số mô tả sản phẩm bên dưới để bạn có thể ra quyết định mua sắm.\r\nMàn hình 6.5 inches Super Retina XDR\r\nRAM 6GB đa nhiệm thoải mái, bộ nhớ trong dung lượng lớn\r\nCon chip Apple A12 SoC 5nm, RAM 6GB mạnh mẽ\r\nCụm 3 camera sau với độ phân giải 12MP  \r\nCamera trước 12MP hỗ trợ mở FaceiD cùng công nghệ chống nước IP68\r\nViên pin liền cho thời lượng sử dụng lên đến cả ngày cùng công nghệ sạc nhanh \"', 2, 7, '\"Công nghệ màn hình Super Retina XDR\r\nKích thước màn hình 6.5 inches\r\nCamera sau\r\n3 Camera 12MP:\r\n- Camera tele: ƒ/2.0 aperture\r\n- Camera góc rộng: ƒ/1.8 aperture\r\n- Camera siêu rộng: ƒ/2.4 aperture\r\nCamera trước 12 MP ƒ/2.2 aperture\r\nChipset A13 Bionic\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 256 GB\r\nPin 3969 mAh\r\nThẻ SIM Nano-SIM + eSIM\r\nHệ điều hành iOS 13 hoặc cao hơn (Tùy vào phiên bản phát hành)\r\nĐộ phân giải màn hình 2688 x 1242 pixels\"', 0),
(57, 'iPhone 11 Pro ', 9990000.00, 100, 'iphone11pro4.png,thumb-iphone11pro1.png,iphone11pro2.png,iphone11pro3.png', 5.00, 0, 0, '2023-03-13 16:35:00', '2023-03-14 18:40:31', '\"Điện thoại iPhone 11 Pro chính hãng (vn/a) – Dung lượng bộ nhớ trong lớn\r\nMẫu iPhone 2019 mới nhất của Apple được thiết kế khung viền vuông sang trọng được nhiều người dùng yêu thích. Trong đó, phiên bản iPhone 11 Pro chính hãng VNA hứa hẹn là một trong những sự lựa chọn lý tưởng.\r\nThiết kế sang trọng, phiên bản VNA chính hãng Việt Nam\"', 2, 7, '\"Kích thước màn hình 5.8 inches\r\nCamera sau 3 Camera 12MP:\r\n- Camera tele: ƒ/2.0 aperture\r\n- Camera góc rộng: ƒ/1.8 aperture\r\n- Camera siêu rộng: ƒ/2.4 aperture\r\nCamera trước 12 MP ƒ/2.2 aperture\r\nChipset A13 Bionic\r\nCông nghệ màn hình Super Retina XDR\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 64 GB\r\nPin 3046 mAh\r\nThẻ SIM Nano-SIM + eSIM\r\nHệ điều hành iOS 13 hoặc cao hơn (Tùy vào phiên bản phát hành)\"', 0),
(58, 'iPhone 11', 7490000.00, 100, 'thumb-iphone11-1.jpg,iphone11-2.jpg,iphone11-3.jpg,iphone11-4.jpg,iphone11-5.jpg', 5.00, 0, 0, '2023-03-13 16:35:00', '2023-03-14 18:40:31', '\"Apple iPhone 11 128GB chính hãng (VN/A) phiên bản bộ nhớ 128GB lưu trữ thoải mái\r\niPhone 11 hiện nay là cái tên “sốt xình xịch” bởi đây là một trong 4 siêu phẩm vừa được ra mắt của Apple với những đột phá về cả thiết kế lẫn cấu hình. Phiên bản Apple iPhone 11 128GB chính là một trong những chiếc iPhone được săn đón nhất bởi dung lượng bộ nhớ khủng, cho phép bạn thoải mái với vô vàn ứng dụng.\r\nDung lượng bộ nhớ trong lên đến 128GB và chip Apple A13 độc quyền\r\nThiết kế độc đáo với viền vát phẳng mạnh mẽ và hỗ trợ sạc nhanh 20W\"', 2, 7, '\"Kích thước màn hình 6.1 inches\r\nCông nghệ màn hình IPS LCD\r\nCamera sau Camera kép 12MP:\r\n- Camera góc rộng: ƒ/1.8 aperture\r\n- Camera siêu rộng: ƒ/2.4 aperture\r\nCamera trước 12 MP, ƒ/2.2 aperture\r\nChipset A13 Bionic\r\nCông nghệ màn hình IPS LCD\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 128 GB\r\nPin 3110 mAh\r\nThẻ SIM Nano-SIM + eSIM\r\nHệ điều hành iOS 13 hoặc cao hơn (Tùy vào phiên bản phát hành)\"', 0),
(59, 'iPhone XS Max', 7990000.00, 100, 'iphonexsm4.jpg,iphonexsm1.jpg,iphonexsm2.jpg,thumb-iphonexsm.jpg,iphonexsm3.jpg', 5.00, 0, 0, '2023-03-13 16:35:00', '2023-03-14 18:40:31', '\"Apple iPhone XS Max\r\nSau kỷ niệm 10 năm bằng cách ra mắt iPhone X, nhiều người tự hỏi sau đó, Apple sẽ làm gì. Apple đã giải đáp thắc mắc này bằng cách ra mắt ba sản phẩm smartphone cao cấp mới của mình. Trong đó, Apple iPhone XS Max  xứng tầm là chiếc smartphone cao cấp nhất hiện nay. Bạn có thể tham khảo thêm iPhone XS Max 512GB chính hãng VN/A để được bảo hành 12 tháng tại Việt Nam.\r\nThiết kế Apple iPhone XS Max sang trọng, đẳng cấp\r\nMàn hình Apple iPhone XS Max đỉnh cao về màu sắc\r\nHiệu năng Apple iPhone XS Max hàng đầu\"', 2, 8, '\"Công nghệ màn hình Super Retina OLED\r\nKích thước màn hình 6.5 inches\r\nCamera sau 12 MP\r\nCamera trước 7 MP\r\nChipset Apple A12 Bionic 6 nhân\r\nBộ nhớ trong 512 GB\r\nPin Li-ion\r\nThẻ SIM Nano-SIM\r\nHệ điều hành 12\r\nĐộ phân giải màn hình 1242 x 2688 pixel\"', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_banner_sanpham` (`idsp`);

--
-- Chỉ mục cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD KEY `fk_binhluan_nguoidung` (`ma_nguoidung`),
  ADD KEY `fk_binhluan_sanpham` (`ma_sanpham`);

--
-- Chỉ mục cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `fk_blogcate_blog` (`blogcate_id`);

--
-- Chỉ mục cho bảng `tbl_blog_cate`
--
ALTER TABLE `tbl_blog_cate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_blog_comment`
--
ALTER TABLE `tbl_blog_comment`
  ADD KEY `fk_commentblog_user` (`id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`ma_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_danhmucphu`
--
ALTER TABLE `tbl_danhmucphu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dmphu_dmchinh` (`iddm`);

--
-- Chỉ mục cho bảng `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_nguoidung` (`iduser`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD KEY `fk_orderdetail_order` (`iddonhang`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`masanpham`),
  ADD KEY `fk_sanpham_danhmuc` (`ma_danhmuc`),
  ADD KEY `fk_sanpham_dmphu` (`id_dmphu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_blog_cate`
--
ALTER TABLE `tbl_blog_cate`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `ma_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmucphu`
--
ALTER TABLE `tbl_danhmucphu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `masanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD CONSTRAINT `fk_banner_sanpham` FOREIGN KEY (`idsp`) REFERENCES `tbl_sanpham` (`masanpham`);

--
-- Các ràng buộc cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD CONSTRAINT `fk_binhluan_nguoidung` FOREIGN KEY (`ma_nguoidung`) REFERENCES `tbl_nguoidung` (`id`),
  ADD CONSTRAINT `fk_binhluan_sanpham` FOREIGN KEY (`ma_sanpham`) REFERENCES `tbl_sanpham` (`masanpham`);

--
-- Các ràng buộc cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD CONSTRAINT `fk_blogcate_blog` FOREIGN KEY (`blogcate_id`) REFERENCES `tbl_blog_cate` (`id`);

--
-- Các ràng buộc cho bảng `tbl_blog_comment`
--
ALTER TABLE `tbl_blog_comment`
  ADD CONSTRAINT `fk_commentblog_blog` FOREIGN KEY (`id`) REFERENCES `tbl_blog` (`blog_id`),
  ADD CONSTRAINT `fk_commentblog_user` FOREIGN KEY (`id`) REFERENCES `tbl_nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `tbl_danhmucphu`
--
ALTER TABLE `tbl_danhmucphu`
  ADD CONSTRAINT `fk_dmphu_dmchinh` FOREIGN KEY (`iddm`) REFERENCES `tbl_danhmuc` (`ma_danhmuc`);

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_order_nguoidung` FOREIGN KEY (`iduser`) REFERENCES `tbl_nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `fk_orderdetail_order` FOREIGN KEY (`iddonhang`) REFERENCES `tbl_order` (`id`);

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`ma_danhmuc`) REFERENCES `tbl_danhmuc` (`ma_danhmuc`),
  ADD CONSTRAINT `fk_sanpham_dmphu` FOREIGN KEY (`id_dmphu`) REFERENCES `tbl_danhmucphu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
