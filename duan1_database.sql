-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 13, 2023 lúc 03:59 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


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
(6, 2, 'I phone 14', ''),
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
  `mo_ta` text COLLATE utf8_unicode_ci NOT NULL,
  `ma_danhmuc` int(11) NOT NULL,
  `id_dmphu` int(3) NOT NULL,
  `information` text COLLATE utf8_unicode_ci NOT NULL,
  `promote` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`masanpham`, `tensp`, `don_gia`, `ton_kho`, `images`, `giam_gia`, `dac_biet`, `so_luot_xem`, `ngay_nhap`, `mo_ta`, `ma_danhmuc`, `id_dmphu`, `information`, `promote`) VALUES
(1, 'Điện thoại OPPO Reno8 T 5G 256GB', 10999000.00, 10, 'oppo - reno 5g 8t den.png,oppo-reno8t-den1-thumb-600x600.jpg,oppo-reno-5g-dep.jpg,638091158554197072_oppo-reno8-t-5g-dd.jpg,Oppo Reno 5G.png,oppo-reno-8t.jpg,thumb-oppo-reno8t-vang1-thumb-600x600.jpg', 5.00, 0, 0, '2023-03-11 07:55:23', 'OPPO Reno8 T 5G 128GB là mẫu điện thoại đầu tiên trong năm 2023 mà OPPO kinh doanh tại Việt Nam. Máy nhận được khá nhiều sự quan tâm đến từ cộng đồng công nghệ về thông số kỹ thuật hết sức ấn tượng như: Camera 108 MP, chipset nhà Qualcomm và màn hình AMOLED.\r\nHoàn thiện với chất liệu cao cấp\r\nSở hữu màn hình chất lượng với khả năng hiển thị sống động\r\nNổi bật với cụm camera chụp ảnh siêu sắc nét\r\nHiệu năng tốt sử dụng mượt mà nhiều tác vụ', 1, 3, 'Màn hình:\r\n\r\nAMOLED6.7\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 13\r\nCamera sau:\r\n\r\nChính 108 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 695 5G\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4800 mAh67 W', 0),
(2, 'Điện thoại OPPO Reno8 Z 5G', 7990000.00, 100, 'oppo reno 8z chup anh.jpg,oppo reno 8z dep vang.jpg,oppo reno 8z vang.jpg,oppo reno 8z den.jpg,oppo reno 8z .jpg,photo_2022-08-05_09-40-14.jpg,thumb-photo_2022-08-05_09-40-15.jpg', 0.00, 0, 0, '2023-03-11 08:13:17', 'OPPO Reno8 Z 5G đã được giới thiệu tại thị trường Việt Nam vào tháng 8/2022, máy sở hữu một diện mạo đẹp mắt nhờ thừa hưởng thiết kế hiện đại từ thế hệ trước, cùng với đó là sự cải tiến về camera và hiệu năng nhằm mang đến những trải nghiệm tốt hơn trong phân khúc điện thoại tầm trung.\r\nẤn tượng với diện mạo thời trang và màn hình chất lượng\r\nThỏa sức nhiếp ảnh hay sáng tạo video với bộ ba camera\r\nHiệu năng mạnh mẽ trong phân khúc\r\nThời lượng pin đáp ứng cho cả ngày dài\r\n', 1, 3, 'Màn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 695 5G\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4500 mAh33 W', 0),
(3, 'Điện thoại OPPO Reno8 Pro 5G', 17590000.00, 100, 'thumb-oppo_reno8_pro_1_.jpg,oppo reno 8 pro xxx.jpg,oppo _reno 8 _ pro 3.jpg,oppo reno 8 5g pro 2.jpg,oppo reno 8 pro 2.png,oppo_reno8_pro.jpg', 5.00, 0, 0, '2023-03-11 02:25:13', 'OPPO Reno8 T 5G 128GB là mẫu điện thoại đầu tiên trong năm 2023 mà OPPO kinh doanh tại Việt Nam. Máy nhận được khá nhiều sự quan tâm đến từ cộng đồng công nghệ về thông số kỹ thuật hết sức ấn tượng như: Camera 108 MP, chipset nhà Qualcomm và màn hình AMOLED.\r\nHoàn thiện với chất liệu cao cấp\r\nSở hữu màn hình chất lượng với khả năng hiển thị sống động\r\nNổi bật với cụm camera chụp ảnh siêu sắc nét\r\nHiệu năng tốt sử dụng mượt mà nhiều tác vụ', 1, 3, 'Màn hình:\r\n\r\nAMOLED6.7\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 13\r\nCamera sau:\r\n\r\nChính 108 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nSnapdragon 695 5G\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4800 mAh67 W', 0),
(4, 'Điện thoại OPPO Reno7 Pro 5G', 11990000.00, 100, 'thumb-oppo reno 7 t_i_xu_ng_42__3.png,oppo reno 7 tot.png,oppo reno 7 chat luong cao.png,oppo reno 7 pro.png,oppo reno 7 dep tot.png,oppo reno 7 t_i_xu_ng_8_.png', 10.00, 0, 0, '2023-03-11 02:40:37', 'OPPO Reno7 Pro 5G trình làng với một thiết kế mới lạ đầy bắt mắt, hiệu năng ổn định cùng khả năng chụp ảnh - quay video cực kỳ chất lượng nhờ những nâng cấp đáng giá về thuật toán xử lý trên cảm biến chính IMX766 đến từ Sony\r\nDiện mạo nổi bật chưa từng có\r\nĐã mắt hơn với màn hình chất lượng\r\nChiến game mượt mà trên chipset đến từ MediaTek\r\nThỏa sức chụp ảnh với camera chất lượng', 1, 3, 'Màn hình:\r\n\r\nAMOLED6.5\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nMediaTek Dimensity 1200 Max\r\nRAM:\r\n\r\n12 GB\r\nDung lượng lưu trữ:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4500 mAh65 W', 0),
(5, 'Điện thoại OPPO A16K', 2590000.00, 100, 'thumb-oppo a 16k.jpg,oppo a 16k blue tripple.png,oppo a 16k blue dep lam.jpg,oppo a 16k blue dep.jpg,oppo a 16k blue dep.png,combo_a16k_-_blue.jpg', 12.00, 0, 0, '2023-03-12 09:21:43', 'OPPO chính thức trình làng mẫu smartphone giá rẻ - OPPO A16K sở hữu màu sắc thời thượng, viên pin dung lượng cao, cấu hình khỏe, selfie lung linh, một lựa chọn thú vị cho người tiêu dùng.\r\nHệ thống camera cho bạn tỏa sáng cùng vẻ đẹp tự nhiên\r\nCấu hình tốt trong tầm giá\r\nThiết kế tinh giản, trẻ trung\r\nTận hưởng trải nghiệm xem đã mắt\r\nThời gian giải trí lâu hơn\r\n\r\n', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.52\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\n13 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n3 GB\r\nDung lượng lưu trữ:\r\n\r\n32 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4230 mAh10 W', 0),
(6, 'Điện thoại OPPO A96 ', 5990000.00, 100, 'thumb-a96-navigation-pink-v1.png,a96 pink oppo qua dep.png,a96 pink dien thoai rat dep.png,a 96 pink dien thoai oppo.png,oppo 96 dien thoai.jpg,a96-pink-1920.png', 8.00, 0, 0, '2023-03-12 09:21:43', 'OPPO A96 là cái tên được nhắc đến khá nhiều trên các diễn đàn công nghệ hiện nay, nhờ sở hữu một ngoại hình hết sức bắt mắt cùng hàng loạt các thông số ấn tượng trong phân khúc giá như hiệu năng cao, camera chụp ảnh sắc nét.\r\nNổi bật với diện mạo đầy cuốn hút\r\nHiển thị hình ảnh một cách sinh động\r\nSử dụng lâu hơn nhờ trang bị viên pin lớn\r\nChiến game ổn định nhờ chip xử lý đến từ Qualcomm\r\n', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.59\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 680\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0),
(7, 'Điện thoại OPPO A77s', 6290000.00, 100, 'thumb-combo_a77s-_en_2.jpg,oppo a77s dep qua dep.jpg,a77 oppo chuan star.jpg,oppo a77 xanh chuan.jpg,oppo a 77 xanh blue.jpg,combo_a77s-_xanh_1.jpg,oppo-a77s-xanh.jpg', 0.00, 0, 0, '2023-03-12 09:21:43', 'OPPO vừa cho ra mắt mẫu điện thoại tầm trung mới với tên gọi OPPO A77s, máy sở hữu màn hình lớn, thiết kế đẹp mắt, hiệu năng ổn định cùng khả năng mở rộng RAM lên đến 8 GB vô cùng nổi bật trong phân khúc.\r\nLinh hoạt hơn với khả năng xử lý đa tác vụ\r\nVẻ ngoài cao cấp\r\nGiải trí đã mắt với màn hình lớn\r\nTận hưởng vô tư, lo chi gián đoạn', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nSnapdragon 680\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0),
(8, 'Điện thoại OPPO A76', 5390000.00, 100, 'thumb-combo_a76_-_black.jpg,oppo-a76-3.jpg,a76 combo blue chuan.jpg,combo_a76_blue_dep.jpg,combo_a76_-_blue.jpg,', 10.00, 0, 0, '2023-03-12 09:21:43', 'OPPO A76 4G ra mắt với thiết kế trẻ trung, hiệu năng ổn định, màn hình 90 Hz mượt mà cùng viên pin trâu cho thời gian sử dụng lâu dài phù hợp cho mọi đối tượng người dùng.\nThiết kế OPPO Glow - màu gradient đẹp mắt\nThoải mái dùng cả ngày với pin 5000 mAh và sạc nhanh 33 W\nHiệu năng ổn định với chip Snapdragon 680', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 13 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nSnapdragon 680\r\nRAM:\r\n\r\n6 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0),
(9, 'Điện thoại OPPO A57 128GB', 4290000.00, 100, 'thumb-OPPO A57 4GB 128GB.jpg,couple Oppo A57 12GB.png,Oppo A57 4G 128G blue.jpg,Oppo A57 128Gb .png,oppo a57 128G.jpg,oppo a57 4g.jpg', 0.00, 0, 0, '2023-03-12 09:21:43', 'OPPO đã bổ sung thêm vào dòng sản phẩm OPPO A giá rẻ một thiết bị mới có tên OPPO A57 128GB. Khác với mẫu A57 5G đã được ra mắt trước đó, điện thoại dòng A mới có màn hình HD+, camera chính 13 MP và pin 5000 mAh.\nThiết kế trẻ trung\nHiệu năng ổn định trong tầm giá\nHỗ trợ chụp ảnh quay phim', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 13 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n4 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0),
(10, 'Điện thoại OPPO A17', 3790000.00, 100, 'oppo-a-17t_i_xu_ng_30__3.png,thumb-oppo-a-17b1ppr0nazrpqahyt.jpg,oppo a17 dep khong can cho che.png,oppo a17 blue tao lao.png,oppo 17 dep khong phai che.png,oppo a17 chuan dep blue.png', 0.00, 0, 0, '2023-03-12 09:21:43', 'Dường như OPPO đang ngày càng quan tâm đến trải nghiệm của người dùng, điều này được minh chứng qua nhiều dòng điện thoại của hãng trong đó có OPPO A17, máy sở hữu màn hình kích thước lớn, camera 50 MP đi cùng viên pin 5000 mAh với thời lượng dùng bền bỉ.\nDiện mạo mới lạ và độc đáo\nBắt trọn khoảnh khắc đẹp với độ chi tiết cao\nKhông gian hiển thị rộng lớn\nMang đến sự ổn định nhờ chipset MediaTek\nThoải mái sử dụng cả ngày nhờ pin lớn', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 0.3 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n4 GB\r\nDung lượng lưu trữ:\r\n\r\n64 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh10 W', 0),
(11, 'Điện thoại OPPO A17K', 0.00, 100, 'thumb-oppo a17k dien thoai thong minh.png,t_i_xu_ng_62__1.png,oppo a17k.png,combo_a17k_-_navy_-_cmyk.jpg,oppo a17 mau kim rat dep.png,Oppo A17 gia re uu dai.jpg', 0.00, 0, 0, '2023-03-12 03:21:43', 'OPPO A17K là chiếc điện thoại được kế thừa thiết kế tinh tế của OPPO A16K, được nâng cấp về dung lượng pin, đồng thời cũng sở hữu màn hình chi tiết cùng một hiệu năng ổn định được nhà OPPO cho ra mắt vào những tháng cuối năm 2022.\r\nSử dụng thả ga với viên pin lớn, hiệu năng mượt mà\r\nTrải nghiệm tuyệt hơn trên màn hình lớn\r\nChụp ảnh rõ nét nhờ camera AI\r\n', 1, 11, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\n8 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n3 GB\r\nDung lượng lưu trữ:\r\n\r\n64 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh10 W', 0),
(12, 'OPPO Find X3 Pro 5G', 18790000.00, 100, 'thumb-oppo-find-x3-pro-5g-3_2.jpg,Oppo Fnd X3 Pro chuan dep phai manh.jpg,Oppo Find X pro 5g dep mat.jpg,Oppo Find X3 Pro ket hop cung voi nhau.jpg,Oppo Find x3 pro 5g chuan dep.jpg,Oppo find x3 pro 5g.jpg', 10.00, 0, 0, '2023-03-12 09:21:43', 'Đánh giá Oppo Find X3 Pro 5G – Hiệu năng dẫn đầu, màn hình chiếm trọn\r\nFind X là dòng sản phẩm được OPPO chăm chút nhiều nhất, đặc biệt là những công nghệ hoàn toàn hiện đại. Bằng chứng Find X3 Pro mang đến vẻ ngoài mới, camera selfie được ẩn dưới màn hình, cùng cấu hình mạnh mẽ đến từ chip Snapdragon 865.\r\nHoàn thiện nguyên khối, màn hình 2K rực rỡ\r\nCấu hình mạnh mẽ với bộ vi xử lý Snapdragon 888, 12GB RAM và 256GB bộ nhớ trong\r\nCụm bốn camera sau, cho phép chụp góc siêu rộng, camera selfie ẩn dưới màn hình\r\nViên pin dung lượng 4500 mAh, sạc nhanh 65W\r\nĐiện thoại Oppo Find X3 Pro giá bao nhiêu tiền?\r\nMua OPPO Find X3 Pro 5G chính hãng, giá rẻ tại CellphoneS\r\n', 1, 2, 'Kích thước màn hình\r\n6.7 inches\r\nCông nghệ màn hình\r\nAMOLED\r\nCamera sau\r\nCamera chính: 50 MP, f/1.8, 1/1.56\", 1.0µm, PDAF, OIS\r\nCamera tele: 13 MP, f/2.4, 52mm PDAF, zoom quang 5x\r\nCamera góc rộng: 50 MP, f/2.2, 110˚, 1/1.56\", 1.0µm, omnidirectional PDAF\r\nCamera macro: 3 MP, f/3.0\r\nCamera trước\r\n32 MP, f/2.4, 26mm (wide), 1/2.8\", 0.8µm\r\nChipset\r\nSnapdragon 888 (5 nm)\r\nCông nghệ màn hình\r\nAMOLED\r\nDung lượng RAM\r\n12 GB\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\n4500mAh', 0),
(13, 'OPPO Find X', 11990000.00, 100, 'thumb-find_x.jpg,oppo-find-x-dep.jpg,find-x-1_1.jpg,find-x-6.jpg,find-x-5.jpg,oppo-find-x_1.jpg', 0.00, 0, 0, '2023-03-12 09:21:43', 'OPPO Find X Chính hãng\r\nSau sự thành công của OPPO F7 Youth, OPPO Find 7, hãng điện thoại OPPO đang từng bước khẳng định vị thế của một trong những hãng sản xuất smartphone hàng đầu thế giới. Với chiếc Find X sở hữu thiết kế đột phá, công ty này quyết tâm khẳng định họ hoàn toàn có thể sáng tạo hơn cả Apple lẫn Samsung.\r\n\r\nNgoài ra, khách hàng có thể tham khảo điện thoại Oppo Find X2 với nhiều nâng cấp về cấu hình, camera.\r\nThiết kế OPPO Find X mang lại sự khác biệt\r\nMàn hình OPPO Find X đem đến trải nghiệm hình ảnh sống động\r\nHiệu năng OPPO Find X thuộc top đầu thị trường\r\nOPPO Find X tích hợp công nghệ mở khóa bằng gương mặt hiện đại\r\nOPPO Find X có thời lượng pin ấn tượng và thời gian sạc cũng rất nhanh\r\nCamera OPPO Find X lưu giữ chân thực mọi khoảnh khắc\r\n', 1, 2, 'Công nghệ màn hình\r\n\r\nCảm ứng điện dung AMOLED, 16 triệu màu\r\nKích thước màn hình\r\n\r\n6.42 inches\r\nCamera sau\r\n\r\n16 MP (f/2.0, PDAF, OIS) + 20 MP (f/2.0), tự động lấy nét nhận diện theo giai đoạn, LED flash kép (2 tone)\r\nCamera trước\r\n\r\n2160p@30fps\r\nChipset\r\n\r\nQualcomm SDM845 Snapdragon 845\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\nLi-ion 3730 mAh\r\nThẻ SIM\r\n\r\n2 SIM (Nano-SIM)\r\nHệ điều hành\r\n\r\n8.1 (Oreo)\r\nĐộ phân giải màn hình\r\n\r\n1080 x 2340 pixels (FullHD+)\r\nTrọng lượng\r\n\r\n186 g (6.56 oz)\r\nCảm biến\r\n\r\nFace ID, gia tốc, con quay hồi chuyển, khoảng cách, la bàn', 0),
(14, 'OPPO Find X2', 18990000.00, 100, 'thumb-637191049692122812_oppo-find-x2-xanh-1.png,637194498955419635_oppo-find-x2-den-3.png,637194498955464088_oppo-find-x2-den-4.png,637194500600555695_oppo-find-x2-xanh-3.png,Oppo Find X dep gia re.jpg,637194500601105652_oppo-find-x2-xanh-4.png', 10.00, 0, 0, '2023-03-12 09:21:43', 'Oppo Find X2 – Hiệu năng đỉnh cao, màn hình chiếm trọn mặt trước\r\nOppo Find X2 và Find X2 Pro là chiếc điện thoại thuộc phân khúc cao cấp vừa được Oppo ra mắt, tiếp nối sự thành công vang dội của người tiền nhiệm Oppo Find X. Đây là mẫu sản phẩm điện thoại Oppo được thừa hưởng những công nghệ mới và tốt nhất ở thời điểm hiện tại so với các đối thủ cùng phân khúc. Ngoài ra, bạn cũng có thể tham khảo điện thoại Oppo Find X3 với nhiều nâng cấp về cấu hình, thiết kế, camera cũng như dung lượng pin.\r\nThiết kế chuyển màu nổi bật, cho cảm giác cực kì nhẹ nhàng\r\nMàn hình OLED 6,7 inchQuad-HD+ cho khả năng hiển thị sắc nét, sống động\r\nCấu hình mạnh mẽ với vi xử lý Snapdragon 865 đi kèm 12GB RAM\r\nDung lượng pin lên đến 4200mAh, có khả năng cho thiết bị khác\r\nBa camera sau 48 MP + 13 MP + 12MP cùng camera selfie 32 MP\r\nMua điện thoại Oppo Find X2 chính hãng, giá rẻ nhất tại CellphoneS', 1, 2, 'Kích thước màn hình\r\n\r\n6.7 inches\r\nCông nghệ màn hình\r\n\r\nAMOLED\r\nCamera sau\r\n\r\nChính 48 MP & Phụ 13 MP, 12 MP\r\nCamera trước\r\n\r\n32 MP\r\nChipset\r\n\r\nQualcomm Snapdragon 865\r\nCông nghệ màn hình\r\n\r\nAmoled\r\nDung lượng RAM\r\n\r\n12 GB\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\n4200 mAh Li-Ion, Hỗ trợ sạc nhanh\r\nThẻ SIM\r\n\r\n2 SIM (Nano-SIM)\r\nHệ điều hành\r\n\r\nAndroid 10.0 , ColorOS 7.0\r\nĐộ phân giải màn hình\r\n\r\n3168 x 1440 pixel\r\nTính năng màn hình\r\n\r\nMàn hình 2K, Tần số quét 120 Hz, Kính cường lực Corning Gorilla Glass 6\r\nCảm biến\r\n\r\n- Vân tay ẩn trong màn hình: Hỗ trợ\r\n- Cảm biến: Cảm biến nhiệt độ màu, Cảm biến ánh sáng, Cảm biến tiệm cận, La Bàn, Con Quay Hồi Chuyển.', 0);

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `ma_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmucphu`
--
ALTER TABLE `tbl_danhmucphu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `masanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
