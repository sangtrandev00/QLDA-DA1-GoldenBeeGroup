-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 13, 2023 lúc 04:28 PM
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
  `date_end` datetime NOT NULL DEFAULT current_timestamp(),
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `name`, `idsp`, `images`, `noi_dung`, `date_create`, `date_end`, `info`) VALUES
(20, 'i phone 14 pro max', 44, 'IphonePromotion2.png,thumb-IphonePromotion.png', '<p>Sản phẩm khuyến m&atilde;i trong th&aacute;ng 3, gi&aacute; mềm ưu đ&atilde;i cho c&aacute;c kh&aacute;ch h&agrave;ng mới nhất. Nhấn v&agrave;o h&igrave;nh ảnh v&agrave; đặt mua ngay!</p>', '2023-04-09 03:59:53', '2023-04-30 08:41:43', '<p>M&agrave;n h&igrave;nh: OLED6.1 \"Super Retina&nbsp;</p>\r\n<p>Hệ điều h&agrave;nh: iOS 16</p>\r\n<p>Camera sau: Ch&iacute;nh 48 MP</p>\r\n<p>Camera trước: 12 MP</p>\r\n<p>Chip: Apple A16 Bionic&nbsp;</p>\r\n<p>RAM: 6 GB</p>');

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

--
-- Đang đổ dữ liệu cho bảng `tbl_binhluan`
--

INSERT INTO `tbl_binhluan` (`ma_binhluan`, `noi_dung`, `ma_sanpham`, `ma_nguoidung`, `duyet`, `ngay_binhluan`) VALUES
(1, 'Hello World', 3, 46, 0, '2023-04-11 19:04:44'),
(2, 'Ôn áp quá chời', 2, 11, 0, '2023-04-11 21:04:55'),
(3, 'Tuyệt dời, hihi', 2, 11, 0, '2023-04-11 21:04:11'),
(4, 'Oh my god', 2, 11, 0, '2023-04-11 21:04:20'),
(5, '', 59, 11, 0, '2023-04-13 20:04:31');

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

--
-- Đang đổ dữ liệu cho bảng `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `blog_title`, `noi_dung`, `images`, `create_time`, `blogcate_id`, `tags`, `duyet`) VALUES
(1, 'Thông báo Messenger không có âm thanh trên Android, phải xử lý thế nào?', 'Tại sao Messenger không có âm thanh thông báo?\r\n<p>Bị nhỡ thông báo ứng dụng, không nhận được thông báo cuộc gọi, tin nhắn từ Messenger là sự cố mà bất kỳ Messenger-er nào cũng mắc phải. Nguyên nhân gây nên tình huống phiền phức này là bởi:</p>\r\n<ul>\r\n    <li>Đường truyền mạng không ổn định, mạng Wifi yếu, dữ liệu 3G/4G hết. </li>\r\n    <li>Đường truyền mạng không ổn định, mạng Wifi yếu, dữ liệu 3G/4G hết. </li>\r\n    <li>Chế độ thông báo tin nhắn, cuộc gọi trên ứng dụng Messenger bị tắt. </li>\r\n    <li>Điện thoại đang bật chế độ im lặng, chế độ không làm phiền.</li>\r\n    <li>Phiên bản hiện tại của Messenger đã cũ, không còn tương thích với điện thoại.</li>\r\n</ul>\r\n<h1>Cách sửa lỗi thông báo Messenger không có âm thanh trên điện thoại Android</h1>\r\n<h2>Kiểm tra kết nối mạng</h2>\r\n<p>Nếu bạn không nghe thấy chuông báo hoặc thậm chí không nhận được thông báo từ ứng dụng thì vấn đề có thể đến từ kết nối Internet của dế yêu. Bạn nên kiểm tra lại kết nối Wifi hoặc dữ liệu 3G/4G xem đã “cạn kiệt” chưa nhé. Lựa chọn một địa chỉ Wifi khác ít người truy cập hơn, nạp thêm dung lượng 3G/4G sẽ giúp quá trình sử dụng Messenger của bạn trơn tru, mượt mà hơn đấy!</p>\r\n<h2>Bật thông báo ứng dụng Messenger</h2>\r\n<p>Có thể vì một lý do nào đó, bạn đã vô tình tắt thông báo ứng dụng Messenger. Để kiểm tra và bật lại cài đặt thông báo, bạn chỉ cần thực hiện theo 2 bước sau:\r\nBước 1: Truy cập vào ứng dụng Messenger trên điện thoại > Nhấn vào biểu tượng avatar phía trên, bên trái màn hình. \r\nBước 2: Chọn Thông báo & âm thanh > Gạt thanh ngang sang phải để bật thông báo cho ứng dụng. </p>', 'ketnoimang.jpg,thumb-mess.jpg', '2023-03-15 14:13:38', 1, 'Điện Thoại', 1),
(2, 'OPPO Reno8 T 5G có trọng lượng khoảng bao nhiêu?', 'OPPO Reno8 T 5G\r\n<p>Reno8 T 5G trang bị màn hình cong 3D 120Hz đầu tiên trong phân khúc tầm giá của OPPO, cùng mặt lưng cong 3D, mang lại trải nghiệm từ thiết kế, đến khả năng hiển thị khá tốt.</p>\r\n<p>Cải thiện chạm nhầm cảm ứng thường gặp trên màn cong, màn hình Reno8 T 5G có độ cong 56 độ và chiều cao vòng là 1,9mm, cong nhẹ nhàng, cho cảm giác cầm trên tay thoải mái. Màn hình AMOLED 6,7 inch, tỷ lệ hiển thị 93% và viền dưới 2,32 mm mang lại trải nghiệm sống động và đắm chìm.</p>\r\n<p>Với tần số quét màn hình 120Hz và tốc độ lấy mẫu cảm ứng 1000Hz, người dùng có được một màn hình mượt mà. Khả năng hiển thị 1.07 tỷ màu, FHD+. Độ bền cũng được đảm bảo khi màn hình được trang bị kính DT-Star2 chịu lực gấp đôi, trải qua 23 bài kiểm tra độ bền ở tác động khác nhau, cùng 320 bài kiểm tra toàn diện và hơn 110 bài kiểm tra độ bền trong điều kiện khắc nghiệt.</p>\r\n<p>Dải viền camera trên Reno8 T 5G bao gồm mô-đun máy ảnh xếp theo chiều dọc thời thượng. OPPO cung cấp hai tuỳ chọn màu: Vàng và Đen Ánh Sao cả hai đều sử dụng thiết kế OPPO Glow tạo hiệu ứng ánh sáng và tăng khả năng chống vân tay. Kích thước máy mỏng trọng lượng khoảng 171 g và độ dày 7,7 mm.</p>\r\n<p>Reno8 T 5G được trang bị 8GB RAM với hai phiên bản ROM 128GB hoặc 256GB, đồng thời hỗ trợ thẻ nhớ lên đến 1TB. Người dùng có thể bổ sung 8GB RAM mở rộng, đảm bảo trải nghiệm và dung lượng lưu trữ thoải mái. Được hỗ trợ bởi Qualcomm Snapdragon 695 5G, Reno8 T 5G cung cấp khả năng xử lý tốt các nhu cầu sử dụng hàng ngày. Máy được trang bị Loa kép và Chế độ siêu âm lượng mang đến hiệu ứng âm thanh vòm được nâng cao.</p>\r\n<h2>OPPO Reno8 T 4G</h2>\r\n<p>Không kém cạnh, OPPO Reno8 T 4G cũng được trang bị camera chân dung 100 MP, đi kèm với Camera selfie 32MP và Camera macro 2MP với độ phóng đại 40x, cho trải nghiệm chụp ảnh chất lượng. Máy cũng được tích hợp loạt tính AI siêu nét, Chân dung Bokeh Flare, Selfie HDR, Làm đẹp AI và chụp nhanh…\r\nVẫn giữ phong cách thiết kế dòng Reno Series, OPPO giới thiệu hai phiên bản màu trên Reno8 T: Cam với thiết kế da sợi thuỷ tinh, và Đen sử dụng quy trình hoàn thiện Glow cho bề mặt lấp lánh.</p>\r\n<p>Viền đèn trên cụm camera sau cung cấp 5 thiết lập thông báo cá nhân hóa bằng màu sắc. Sở hữu kích thước mỏng nhẹ, phiên bản Đen Ánh Sao mỏng chỉ 7.80mm và nặng 180g, trong khi phiên bản Cam mỏng 7.85mm và nặng 183g. Trải nghiệm sử dụng tổng thể của Reno8 T, được trang bị viên pin 5000mAh đi kèm sạc nhanh SUPERVOOCTM 33W, cho khả năng sạc đầy trong trong 67 phút. Dung lượng với 8GB RAM và 256GB ROM, cùng dung lượng RAM mở rộng 8GB. OPPO đã tích hợp thêm thuật toán tối ưu hiệu năng.</p>\r\n<p>Mang đến trải nghiệm trên Reno8 T là màn hình AMOLED 6,4 inch với 90Hz, kèm loa kép và Chế độ siêu âm lượng giúp tăng âm lượng thêm 40%. Được cài ColorOS 13 mới, Reno8 T Series mang đến trải nghiệm Android mượt mà. Giờ đây, người dùng có thể điều khiển Spotify thông qua màn hình chờ không cần mở khóa điện thoại.</p>\r\n<p>Để năng cao bảo mật chế độ kiểm soát truy cập 5 lớp giúp người dùng kiểm soát chặt chẽ các quyền riêng tư trên Reno8 T 5G. Một trong số các tính năng mới là Pixel hoá tự động, có thể nhận diện tên và ảnh trong ảnh chụp tin nhắn, điện thoại đã được chứng nhận về độ bảo mật bởi các tổ chức ISO, TRUSTe và ePrivacy.</p>\r\n<p>Hy vọng các bạn đã có câu trả lời cho câu hỏi OPPO Reno8 T 5G có trọng lượng khoảng bao nhiêu? Ngoài ra bài viết cũng đã khái quát cho bạn thông tin khá chi tiết của dòng sản phẩm vừa mới được hãng OPPO công bố chính thức này. Hy vọng các bạn sẽ hài lòng với thông tin cung cấp của bài viết.</p>\r\n', 'thumb-blog2.jpg', '2023-03-15 19:47:28', 2, 'Tin Tức, Điện Thoại', 1),
(3, 'Cách chèn chữ vào ảnh trên iPhone cực nhanh, đơn giản, chi tiết', 'Bạn đang tìm kiếm cách viết chữ lên ảnh trên điện thoại iPhone nhưng chưa biết cách thực hiện. Bài viết dưới đây sẽ hướng dẫn cho các bạn cách chèn chữ vào ảnh trên iPhone cực nhanh, đơn giản, chi tiết.\r\n<h1>Cách chèn chữ vào ảnh trên iPhone</h1>\r\n<ul>\r\n<b>Hướng dẫn nhanh</b>\r\n<li>Mở ứng dụng Ảnh trên iPhone.</li>\r\n<li>Chọn ảnh mà bạn muốn viết chữ lên ảnh > Chọn Sửa.</li>\r\n<li>Nhấn vào biểu tượng 3 dấu chấm > Chọn Đánh dấu.</li>\r\n<li>Nhấn vào biểu tượng dấu cộng > Chọn Văn bản.</li>\r\n<li>Nhấn vào chữ Văn bản > Chọn Sửa.</li>\r\n<li>Tiến hành nhập nội dung mà bạn muốn viết chữ lên ảnh.</li>\r\n<li>Chọn Xong ở góc trên bên phải.</li>\r\n</ul>\r\n<p><b>Lưu ý: </b>Những thay đổi mà bạn thực hiện trên ảnh sẽ áp dụng với ảnh gốc mà không tạo ra file ảnh mới.</p>', 'thumb-chenchutreniphone.jpg', '2023-03-16 16:09:15', 3, 'Hướng Dẫn\r\nĐiện Thoại', 1),
(5, 'Sự lạc lõng của iPhone 14 Plus', 'Nhìn vào bản danh sách điện thoại thông minh bán chạy nhất năm 2022 vừa qua, trong khi iPhone 12 ra đời từ năm 2020 còn được xướng tên thì iPhone 14 Plus mới nhất đã không lọt nổi vào top 10.\r\n<h2>Sự lạc lõng của iPhone 14 Plus</h2>\r\n<p>Trên thực tế, bất kỳ điện thoại thông minh nào khác trong tầm giá 900 USD đều có nhiều công nghệ hơn iPhone 14 Plus. Kích thước không phải là vấn đề. Giá cả phải đi đôi với tính năng đáng giá. Và về cơ bản, Apple đang bán một chiếc điện thoại thông minh tầm trung với giá của một chiếc cao cấp.</p>\r\n<p>iPhone 14 Plus là một thiết bị hoàn toàn khác so với iPhone 14 Pro. Nó không có chip A16, không có camera chính 48 megapixel mới hay thậm chí là ống kính macro và không có Dynamic Island, không có màn hình 120Hz hoặc ống kính tele để chụp ảnh hay quay video bằng zoom quang học.</p>\r\n<p>Cuối cùng nhưng không kém phần quan trọng, vẻ ngoài của Plus cũng nhàm chán. Bên cạnh những thay đổi về phần cứng, Apple đã có quyết định đáng chú ý khi thay đổi phần tai thỏ trên iPhone 14 Pro theo dưới hình thái Dynamic Island. Ngược lại, cả iPhone 14 và 14 Plus vẫn chẳng khác gì dòng iPhone 13.</p>\r\n<p>Nếu ai đó muốn mua một chiếc iPhone mới và muốn tiết kiệm một số tiền, người đó có thể sẽ mua iPhone 14 thông thường hoặc thậm chí là iPhone 13. Và những người sẵn sàng trả tiền cho một chiếc điện thoại thông minh cao cấp có thể sẽ chi thêm 100 USD để mua iPhone 14 Pro chứ không lựa chọn iPhone 14 Plus.</p>\r\n<p>Cho dù bạn ghét hay yêu thích các sản phẩm của Apple, thì một sự thật không thể thay đổi là iPhone bán rất chạy. Tuy nhiên, khi buộc phải thanh toán hóa đơn hàng tháng hoặc bỏ ra số tiền tương tự để mua iPhone, bất kỳ ai trên thế giới cũng muốn sở hữu chiếc iPhone mới nhất và tuyệt vời nhất, nhưng với cái giá cũng hợp lý nhất.</p>\r\n<p>Thay thế chiếc mini bằng chiếc Plus và hy vọng chiếc sau sẽ bán chạy hơn, là một tính toán sai lầm của Apple. Lý do rất đơn giản: Chúng rất khác nhau.</p>\r\n<p>Mini nằm ở một thị trường ngách khác biệt so với Plus. Đó là một chiếc điện thoại nhỏ nhắn với hiệu năng cao.</p>\r\n<p>Kích thước của chiếc mini khiến nó trở nên độc nhất vô nhị không chỉ so với những chiếc iPhone khác mà còn trong toàn bộ thị trường điện thoại thông minh nói chung.</p>\r\n<p>Đơn giản là không có điện thoại thông minh nào có thông số kỹ thuật của iPhone 13 mini gói gọn trong hình hài nhỏ bé như vậy.</p>\r\n<p>Điều này khó xảy ra với iPhone 14 Plus. Hầu hết các điện thoại thông minh Android có kích thước bằng hoặc lớn hơn Plus đều có cấu hình vượt trội hơn nhiều. Chưa kể rằng Plus phải đối mặt với sự cạnh tranh từ chính Pro Max.</p>\r\n<p>Tóm lại, bản thân iPhone 14 Plus không phải là một chiếc điện thoại thông minh tồi, nhưng nó thất bại vì giá bán cao, nhu cầu thấp và lạc lõng trước những đối thủ có cái bóng quá lớn.</p>\r\n', 'thumb-blogip14plus.jpg', '2023-03-16 22:21:18', 2, 'Tin Tức \r\nĐiện Thoại', 1),
(6, 'Mẹo tìm iPhone bị mất qua số điện thoại nhanh chóng', 'iPhone đã và đang là dòng điện thoại được người tiêu dùng yêu thích nhất trên thị trường. Nhưng nhiều người mua iPhone đều lo lắng về việc điện thoại quá xịn nên dễ mất. Đừng lo lắng nữa vì nhà Táo đã trang bị rất nhiều cách để giúp bạn tìm lại iPhone. Cùng Blog Chăm Chỉ khám phá mẹo tìm iPhone bị mất qua số điện thoại trong bài viết dưới đây.\r\n<h2>iPhone bị mất làm sao tìm lại?</h2>\r\n<p>Apple đã trang bị rất nhiều phương pháp tìm lại iPhone cho các iFan trong trường hợp này. Nên bạn đừng quá lo lắng nếu chẳng may làm mất iPhone nhé. Sau đây Blog Chăm Chỉ sẽ bật mí một vài mẹo giúp bạn tìm lại dế cưng của mình.</p>\r\n<p>Một trong những tính năng tuyệt vời của nhà Táo đó là Find My iPhone. Đây được coi là một thám tử giúp bạn truy lùng tung tích của iPhone khi bị mất. Tính năng này cho phép bạn tìm địa điểm của iPhone và có thể xóa dữ liệu từ xa.</p>\r\n<h2>Tìm điện thoại iPhone bị mất qua định vị</h2>\r\n<p>Nếu tính năng Find My iPhone không hoạt động, bạn hãy sử dụng tính năng định vị trên iPhone để tìm thiết bị.</p>\r\n<p>Nếu bạn sử dụng tính năng tìm điện thoại iPhone bị mất qua định vị, có 2 cách như sau:</p>\r\n<h2>Định vị bằng iCloud trên điện thoại</h2>\r\n<p>Bước 1: Truy cập vào ứng dụng Tìm > Nhấn chọn Thiết bị đang cần tìm.</p>\r\n<p>Bước 2: Chọn 1 trong các Hình thức tìm kiếm.</p>\r\n<p>Hiện có các hình thức tìm kiếm sau:</p>\r\n<p><b>Phát âm thanh: </b>Tiếng chuông sẽ vang và rung lên trên thiết bị khoảng 1 đến 2 phút. Âm thanh tiếng chuông sẽ lớn dần đều.</p>\r\n<p><b>Chỉ đường: </b>Màn hình sẽ chuyển hướng đến Bản đồ và chỉ cho bạn đến vị trí của iPhone đã mất.</p>\r\n<p><b>Thông báo: </b>Nếu thiết bị bị mất kết nối mạng hoặc tắt nguồn, bạn có thể sử dụng hình thức này. Khi iPhone bị mất xác định được vị trí thì thông báo sẽ được gửi tới cho bạn.</p>\r\n<h2>Định vị bằng iCloud trên máy tính</h2>\r\n<p>Bước 1: Truy cập vào đường dẫn iCloud.com > Đăng nhập iCloud</p>\r\n<p>Bước 2: Nhấn chọn Tìm iPhone.</p>\r\n<p> Bước 3: Tiếp tục chọn Tất Cả Các Thiết bị > Nhấn chọn vào Thiết bị cần tìm.</p>\r\n<p>Sau đó màn hình sẽ xuất hiện vị trí của thiết bị đã mất và các hình thức tìm kiếm sau:</p>\r\n<p><b>Phát Âm: </b>Lúc này điện thoại sẽ có tiếng chuông vang lên (kể cả bạn đang bật chế độ rung).  </p>\r\n<p><b>Chế Độ Mất: </b>Với hình thức này, bạn cần nhập số điện thoại và để lại tin nhắn. Nếu có ai nhặt được iPhone của bạn sẽ thấy được thông tin liên lạc ở trên máy.  Nó sẽ cài đặt khóa màn hình cho bạn nếu thiết bị của bạn chưa được cài.</p>\r\n<p><b>Xóa iPhone: </b>Hình thức này sẽ xóa dữ liệu từ xa khi thiết bị bị mất có kết nối mạng. Nếu muốn bảo mật thông tin quan trọng thì bạn nên chọn hình thức này.</p>\r\n<h2>Tìm điện thoại iPhone bị mất qua số điện thoại</h2>\r\n<p>Nếu bạn không thể tìm lại chiếc iPhone của mình bằng 2 cách trên thì hãy sử dụng cách tìm điện thoại iPhone bị mất qua số điện thoại. Lúc này, bạn cần liên hệ với nhà mạng của mình để tìm lại điện thoại.</p>\r\n<h2>Những lưu ý cần biết khi tìm iPhone bị mất</h2>\r\n<p>Nếu sử dụng tính năng Find My iPhone thì hãy chắc chắn rằng tính năng này đã được kích hoạt ở iPhone bị mất.</p>\r\n<p>Nếu sử dụng tính năng định vị trên iPhone, hãy chắc chắn rằng tính năng này đã được kích hoạt và iCloud đã được cấp quyền truy cập vị trí.</p>\r\n<p>Nếu sử dụng cách tìm iPhone bị mất qua số điện thoại, hãy soạn sẵn những thông tin cần thiết như số điện thoại và IMEI của điện thoại bạn để đọc cho nhà mạng.</p>\r\n<p>Trên đây là tất tần tật những thông tin về mẹo tìm iPhone bị mất qua số điện thoại nhanh chóng. Blog Chăm Chỉ đã cung cấp cho bạn cách tìm điện thoại iphone bị mất qua định vị và tìm điện thoại iphone bị mất qua số điện thoại. Vậy nên nếu ai hỏi bạn iphone bị mất làm sao tìm lại thì hãy chia sẻ bài viết này cho họ ngay nhé. Chúc bạn tìm lại Táo cưng của mình thành công!</p>', 'thumb-blogmeoiphone.jpg', '2023-03-16 22:31:24', 3, 'Hướng Dẫn\r\nĐiện Thoại\r\nIphone', 1),
(8, 'Đánh giá Iphone 14 Pro Max – Gần 1.600 USD có gì?', 'Ra mắt từ hồi đầu tháng 9, cho đến nay, Iphone 14 vẫn chưa ngừng “nóng sốt”. Đặc biệt được mệnh danh là một trong những điện thoại xa xỉ nhất hiện nay, với mức giá cao nhất lên tới gần 1.600 USD thì “ông lớn” Apple đã trang bị cho Iphone 14 Pro Max những gì? Hãy cùng điểm lại những nổi bật của chiếc Iphone 14 Pro Max để xem liệu chúng có xứng đáng với giá tiền này không nhé!\r\n<h2>Đánh giá thiết kế của Iphone 14 Pro Max</h2>\r\n<p>Không hổ danh là chiếc flagship mới nhất, Iphone 14 Pro Max được nhà sản xuất dành cho một thiết kế vô cùng sang trọng và đẳng cấp.</p>\r\n<p>Viền ngoài của máy sử dụng chất liệu thép không gỉ cao cấp, góc cạnh vuông vức nhưng thanh mảnh và mặt lưng bằng kính bảo vệ Ceramic Shield sang trọng. Iphone 14 Pro Max mang lại sự thoải mái khi sử dụng nhờ khả năng chống bụi/nước IP68, ít bị trầy xước và bám vân tay.</p>\r\n<p>Ngoài 3 phiên bản màu cơ bản: trắng bạc, đen, vàng gold thì màu tím Deep Purple thực sự đã tạo nên mới cơn sốt rần rần trong lòng các iFans.</p>\r\n<p>Mách bạn một mẹo nhỏ là thay vì dùng ốp thì chúng ta có thể dán ppf iPhone 14 pro max trong suốt để có thể trải nghiệm chân thân thật nhất của thiết kế trị giá bốn chục củ khoai này. Đặc biệt là đối với chủ nhân của Iphone 14 Pro Max phiên bản màu tím Deep Purple thì đây là 1 cách phù hợp để vừa bảo vệ và vừa “khoe” máy. Lưu ý lựa chọn dán tại các cơ sở uy tín như Cellphones, Azskin,…</p>\r\n<h2>Đánh giá màn hình Iphone 14 Pro Max</h2>\r\n<p>Có thể nói màn hình 6.7 inch của Iphone 14 Pro Max là dòng đứng đầu trên thị trường smartphone hiện nay. </p>\r\n<p>Màn hình có tấm nền độ phân giải OLED Super Retina XDR sắc nét, độ sáng 2.000 nits, tần số quét lên tới 120Hz cho chuyển động mượt mà. Người dùng hoàn toàn có thể bị đắm chìm với các ứng dụng giải trí, xem phim hay gaming chân thực nhất. </p>\r\n<h2>Đánh giá camera Iphone 14 Pro Max</h2>\r\n<p>Người tiêu dùng chính thức bị đổ gục trước mẫu điện thoại mới nhất này của nhà “táo khuyết” trước sự nâng cấp độ phân giải camera từ 12 MP lên 48 MP, mang lại những hình ảnh và thước phim chân thực, sống động hơn gấp 4 lần so với phiên bản trước.</p>\r\n<p>Dù chụp đêm, chụp zoom hay chụp toàn cảnh,… thì hình ảnh cũng không hề bị giảm chất lượng đi chút nào. Tính năng tự động lấy nét của camera trước mang đến những bức ảnh selfie xuất thần.</p>\r\n<h2>Đánh giá hiệu năng của Iphone 14 Pro Max</h2>\r\n<p>Vi xử lý A16 Bionic với con chip LPDDR5X cực mạnh chính là điểm sáng mang lại hiệu năng sử dụng mạnh mẽ cho Iphone 14 Pro Max.</p>\r\n<p>Chip mới có gần 16 tỷ bóng bán dẫn, 6 lõi CPU, 5 lõi GPU, ISP nâng cao mang đến hiệu suất mạnh hơn 40%. Ngoài ra thiết bị còn có khả năng tiết kiệm pin hiệu quả, xử lý hoạt động máy siêu nhanh và phản hồi ngay lập tức mọi tác vụ so với vi xử lý A15 Bionic với con chip LPDDR4X (5nm) trang bị trên iPhone 13 Pro Max.</p>\r\n<p>Do đó nên dù vẫn còn giữ nguyên mức RAM 6 GB ở iphone dòng cũ thì hiệu năng của Iphone 14 Pro Max vẫn được đánh giá cực đỉnh và vượt xa các đối thủ trong ngành.</p>\r\n<h2>Đánh giá dung lượng pin Iphone 14 Pro Max</h2>\r\n<p>Phải nói rằng Iphone 14 Pro Max đã được nâng cấp trang bị bộ pin cực “trâu” với dung lượng 4.323mAh.</p>\r\n<p>Cụ thể, với một bộ pin đầy, bạn có thể cày phim liên tục 29 giờ mà không hề bị gián đoạn phải dừng lại để đi sạc pin. Bên cạnh đó, máy được tích hợp sạc nhanh 20W giúp giảm thời gian sạc đi khá nhiều.</p>\r\n<h2>Dynamic Island – Sự thay đổi bất ngờ và ấn tượng</h2>\r\n<p>Sự xuất hiện của Dynamic Island sau buổi ra mắt thực sự đã khiến người tiêu dùng và đặc biệt là các iFans đang trông ngóng phải mắt chữ O miệng chữ A sau khi đã lỡ tin rằng tai thỏ sẽ trở thành viên thuốc.</p>\r\n<p>Đóng vai trò như một chiếc remote, Dynamic Island mang lại sự tiện dụng khi sử dụng, cung cấp quyền truy cập vào thông tin/ứng dụng bất kể mọi lúc.</p>\r\n<p>Không chỉ thế, người dùng có thể khám phá thêm rất nhiều tính năng thú vị từ “hòn đảo năng động” này nữa đó, tại sao không tự mình trải nghiệm nhỉ?</p>\r\n<p>Với những đánh giá khái quát trên, có thể thấy ông lớn Apple quả thực chưa bao giờ làm các iFan phải thất vọng. IPhone 14 Series công nhận rất đáng để người đầu tư và trải nghiệm.</p>', 'thumb-tintuciphone14.jpg', '2023-03-16 22:43:49', 2, 'Tin Tức\r\nĐiện Thoại \r\nIphone', 1);

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
(1, 'Thủ thuật', 'thuthuat.jpg'),
(2, 'Tin tức điện thoại', 'tintucdienthoai.jpg'),
(3, 'Hướng dẫn', 'huong-dan.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog_comment`
--

DROP TABLE IF EXISTS `tbl_blog_comment`;
CREATE TABLE `tbl_blog_comment` (
  `id_bl` int(11) NOT NULL,
  `ma_kh` int(10) NOT NULL,
  `id_blog` int(3) NOT NULL,
  `noi_dungbl` text COLLATE utf8_unicode_ci NOT NULL,
  `ngay_bl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_blog_comment`
--

INSERT INTO `tbl_blog_comment` (`id_bl`, `ma_kh`, `id_blog`, `noi_dungbl`, `ngay_bl`) VALUES
(10, 35, 8, '123456789', '0000-00-00 00:00:00'),
(12, 35, 8, 'hayy', '0000-00-00 00:00:00'),
(13, 35, 2, 'bài viết rất ý nghĩa', '0000-00-00 00:00:00'),
(14, 35, 2, 'bài viết hay', '0000-00-00 00:00:00'),
(15, 35, 3, 'hay lắm', '0000-00-00 00:00:00'),
(26, 36, 8, 'hay lắm\r\n', '0000-00-00 00:00:00'),
(35, 35, 1, 'hay', '2023-04-07 19:04:26'),
(36, 11, 6, 'Goood To See', '2023-04-12 08:04:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_coupon`
--

DROP TABLE IF EXISTS `tbl_coupon`;
CREATE TABLE `tbl_coupon` (
  `id_coupon` int(3) NOT NULL,
  `coupon_code` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `discount_percent` double(5,2) NOT NULL,
  `min_value` double(10,2) NOT NULL DEFAULT 5000000.00,
  `maximum_use` int(3) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`id_coupon`, `coupon_code`, `discount_percent`, `min_value`, `maximum_use`, `date_start`, `date_end`) VALUES
(2, 'THEPHONER304_15', 19.00, 5000000.00, 99, '2023-03-30 09:35:31', '2023-05-01 14:35:31'),
(3, 'SALEOF_10', 10.00, 4000000.00, 10, '2023-03-30 11:15:03', '2023-04-30 16:15:04'),
(4, 'SALEOFF_15', 15.00, 5000000.00, 99, '2023-03-30 11:44:06', '2023-04-04 16:44:06'),
(5, 'SALEOFF_20', 20.00, 8000000.00, 8, '2023-03-31 04:36:43', '2023-04-19 09:36:43'),
(11, 'SALEOFF_25', 11.00, 50000000.00, 122, '2023-03-31 21:06:00', '2023-04-09 20:09:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhgiasp`
--

DROP TABLE IF EXISTS `tbl_danhgiasp`;
CREATE TABLE `tbl_danhgiasp` (
  `id_review` int(9) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `images_review` text COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `rating_star` float(2,1) NOT NULL,
  `date_create` datetime NOT NULL,
  `iddonhang` int(4) NOT NULL,
  `trangthai_review` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - chưa bình luận, 1 - Đã bình luận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhgiasp`
--

INSERT INTO `tbl_danhgiasp` (`id_review`, `iduser`, `idsanpham`, `images_review`, `noidung`, `rating_star`, `date_create`, `iddonhang`, `trangthai_review`) VALUES
(1, 11, 3, '', 'Sản phẩm đẹp chất lượng tốt', 4.0, '2023-03-28 15:42:50', 63, 1),
(2, 11, 3, '', 'Điện thoại nhìn rất ngầu không uổng công đã đặt hàng và chờ đợi, cảm ơn shop, love you nhiều nhiều ạ.', 5.0, '2023-03-28 15:49:06', 62, 1),
(3, 11, 54, '', 'Chất lượng sản phẩm cao lắm', 5.0, '2023-03-29 10:42:32', 62, 1),
(4, 11, 52, '', 'Chất lượng đến từ nhà Iphone là không thể bàn cãi', 5.0, '2023-03-29 10:47:39', 61, 1),
(5, 11, 54, '', 'Đẹp không thể tưởng tượng được, Mình đã mua lần 2 cho bạn bè sài thử và không thể tin là nó rất ổn nhé. \nMua ủng hộ sho nhé mọi người <3', 5.0, '2023-03-29 11:04:50', 61, 1),
(6, 11, 2, '', 'Oppo Chính hàng quá đã', 5.0, '2023-03-29 11:15:10', 59, 1),
(7, 11, 12, '', 'Oppo Find X3 đúng là tuyệt', 4.0, '2023-03-29 13:04:48', 59, 1),
(8, 11, 73, '', 'Samsung Galaxy A73 (5G) thật là đẹp và đặc trưng cho user', 4.0, '2023-03-29 14:04:52', 59, 1),
(9, 11, 52, '', 'I Phone Đẹp không thể tưởng tượng', 5.0, '2023-03-29 14:09:02', 44, 1),
(10, 11, 53, '', 'I phone 12 pro sài quá phê ^^^', 4.0, '2023-03-29 14:15:05', 44, 1),
(11, 11, 2, '', 'Woww Điện thoại này phải mua nhé mọi người', 4.0, '2023-03-29 14:36:33', 38, 1),
(12, 11, 2, '', 'A16k Oppo này không thể chê một lời nào luôn !!!!\nSố một', 4.0, '2023-03-29 19:22:34', 39, 1),
(13, 11, 5, '', 'A16k Oppo này không thể chê một lời nào luôn !!!!\nSố một', 4.0, '2023-03-29 19:22:34', 38, 1),
(14, 11, 2, 'huong-dan.jpeg,tintucdienthoai.jpg,thuthuat.jpg', 'Điện thoại đẹp giá tốt', 5.0, '2023-04-01 16:02:53', 75, 1),
(15, 11, 3, '', 'Quá đẹp không thể tưởng tượng được luôn', 4.0, '2023-04-01 16:22:27', 73, 1),
(16, 11, 1, '', 'Ok Tốt', 5.0, '2023-04-13 16:09:48', 37, 1),
(17, 11, 17, '', 'Good', 5.0, '2023-04-13 16:32:43', 48, 1),
(18, 51, 53, '', 'Chuẩn không tì vết', 5.0, '2023-04-13 19:59:35', 103, 1);

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
(0, 'Default', 'default.jpg', 'Danh mục mặc định'),
(1, 'Oppo', 'a96-pink-1920.png', 'Danh mục điện thoại Oppo'),
(2, 'Iphone', 'iPhone 14 Pro 128GB _ chinh hang.png', 'Danh mục điện thoại Iphone'),
(3, 'Samsung', 'sam sung galaxy s23 cateogory.jpg', 'Danh mục điện thoại Samsung'),
(4, 'Xiaomi', 'Xiaomi 12T.jpg', 'Danh mục điện thoại Xiaomi'),
(65, 'Laptop', '41669_laptop_lenovo_thinkpad_x1_yoga_gen_6_20xy00e0vn__6_.jpg', 'Laptop màu đẹp'),
(66, 'Nokia chính hãng', 'Nokia G22.jpg', 'Nokia chính hãng chất lượng cao');

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
(4, 2, 'I phone 14', ''),
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
(15, 4, 'Xiaomi Poco', ''),
(47, 65, 'Laptop 3', ''),
(50, 66, 'Nokia chính hãng giá tốt', 'Nokia chính hãng giá tốt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_feedback`
--

DROP TABLE IF EXISTS `tbl_feedback`;
CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `name`, `email`, `phone`, `title`, `content`, `date_create`) VALUES
(1, 'Trần Nhật Sang', 'nhatsang0101@gmail.com', '0937988510', 'KHOng', 'KHông có gì', '2023-04-13 20:40:00'),
(2, 'Lê Văn Luyện', 'sangtnps20227@fpt.edu.vn', '0909129236', 'Gớm máu', 'Có tiền không ?', '2023-04-13 21:16:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nguoidung`
--

DROP TABLE IF EXISTS `tbl_nguoidung`;
CREATE TABLE `tbl_nguoidung` (
  `id` int(10) NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_id` int(9) NOT NULL,
  `sodienthoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `kich_hoat` tinyint(1) NOT NULL DEFAULT 1,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'avatar-user-default.jpg',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vai_tro` tinyint(1) NOT NULL DEFAULT 3,
  `congty` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_payment` varchar(15) COLLATE utf8_unicode_ci DEFAULT 'codpayment',
  `about_me` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nguoidung`
--

INSERT INTO `tbl_nguoidung` (`id`, `mat_khau`, `ho_ten`, `diachi`, `shipping_id`, `sodienthoai`, `kich_hoat`, `hinh_anh`, `email`, `vai_tro`, `congty`, `default_payment`, `about_me`) VALUES
(11, 'edbbd29c9296c096c2c0a72e44bb2035', 'Trần Nhật Sang', '19/7c kp Đông Tác', 1, '0937988510', 1, 'Anh Dai Dien Truong SPKT .jpg', 'nhatsang0101@gmail.com', 1, 'FPT polytechnic', 'vnpaypayment', 'Nothing IMpossible'),
(18, '5c4de0f09520cb4ed088a35ff5746320', 'Tran Nhat Sang', '19/7c', 2, '0937988510', 1, 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80', 'nhatsang0103@gmail.com', 1, NULL, 'codpayment', NULL),
(31, '1f32aa4c9a1d2ea010adcf2348166a04', 'Minh Đan', 'Quan 3, TPHCM', 7, '0988542654', 1, 'minhdan-img.png', 'dan11102003net@gmail.com', 3, NULL, 'codpayment', NULL),
(34, '1f32aa4c9a1d2ea010adcf2348166a04', 'hoang trung', 'Quan 2, TPHCM', 10, '0256877241', 1, 'hoang-trung-avatar.jpg', 'hoangtrung@gmail.com', 3, NULL, 'codpayment', NULL),
(35, '1f32aa4c9a1d2ea010adcf2348166a04', 'Lam Phoi', 'Quan 1, TPHCM', 11, '0989756244', 1, 'lam-phoi-avatar.jpg', 'lamphoi02@gmail.com', 3, NULL, 'codpayment', NULL),
(36, 'e655834059c57c038e12961e16fca2b3', 'Duyên', 'fsdfsdfsdfsd', 12, '0932432432', 1, 'christopher-campbell-rDEOVtE7vOs-unsplash.jpg', 'phoi1@gmail.com', 2, NULL, 'codpayment', NULL),
(37, '2e99bf4e42962410038bc6fa4ce40d97', 'Nguyễn Thị Nam', 'PMQT', 13, '0385766431', 1, 'nguyen-thi-nam-avatar.jpg', 'nguyennam@gmail.com', 3, NULL, 'codpayment', NULL),
(38, 'f4cc399f0effd13c888e310ea2cf5399', 'Sang Tran Dev', 'Yen Bai', 0, '0937988512', 1, 'paul-schaferh.jpg', 'nhatsang0103@gmail.com', 3, 'FPT polytechnic', 'codpayment', 'No thing special'),
(44, 'aec4c5d18273e7508640d9154f53e962', 'Nguyễn Minh Đan', 'fdsfksdjflkds', 0, '0937988510', 1, 'minhdan-img.png', 'dannnmps25450@fpt.edu.vn', 2, NULL, 'codpayment', NULL),
(45, 'edbbd29c9296c096c2c0a72e44bb2035', 'Nguyễn Văn Tèo', 'Bình Định', 0, '0909123456', 0, 'angelika-agibalova-HmFUXQaScPY-unsplash.jpg', 'intelsport22@gmail.com', 3, NULL, 'codpayment', NULL),
(46, 'edbbd29c9296c096c2c0a72e44bb2035', 'SangDev4', 'dfsdfds', 0, '0937988510', 1, 'Anh Bong Da SVD.jpg', 'sangtnps20227@fpt.edu.vn', 3, 'FPT POLY', 'codpayment', NULL),
(47, 'a59faf11f443d5cbee1c1119c463e543', 'David Tran', 'Quan 5, TPHCM', 0, '0754224111', 1, 'david-vo.jpg', 'admin@trannhatsang.com', 3, NULL, 'codpayment', NULL),
(48, 'edbbd29c9296c096c2c0a72e44bb2035', 'Hà Thị Loan', NULL, 0, '', 1, 'avatar-user-default.jpg', 'rosisport910@gmail.com', 3, NULL, 'codpayment', NULL),
(49, '5c4de0f09520cb4ed088a35ff5746320', 'Lê văn tám', 'HCM', 0, '0909129344', 1, 'angelika-agibalova-HmFUXQaScPY-unsplash.jpg', 'vantam@gmail.com', 2, NULL, 'codpayment', NULL),
(50, '32eeb4caa88b14fe821d790cb9556842', 'trungnguyen212900@gmail.com', NULL, 0, '', 1, 'avatar-user-default.jpg', 'trungnguyen212900@gmail.com', 3, NULL, 'codpayment', NULL),
(51, 'edbbd29c9296c096c2c0a72e44bb2035', 'lienhe@trannhatsang.com', NULL, 0, '', 1, 'avatar-user-default.jpg', 'lienhe@trannhatsang.com', 3, NULL, 'codpayment', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order` (
  `id` int(4) NOT NULL,
  `madonhang` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tongdonhang` double(10,0) NOT NULL,
  `shipping_fee` double(10,2) NOT NULL DEFAULT 0.00,
  `vat_fee` double(10,2) NOT NULL DEFAULT 0.00,
  `pttt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `iduser` int(4) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dienThoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timeorder` datetime NOT NULL,
  `trangthai` int(2) DEFAULT 1,
  `thanhtoan` tinyint(1) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reason_destroy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `madonhang`, `tongdonhang`, `shipping_fee`, `vat_fee`, `pttt`, `iduser`, `name`, `dienThoai`, `email`, `address`, `ghichu`, `timeorder`, `trangthai`, `thanhtoan`, `coupon_code`, `reason_destroy`) VALUES
(34, 'THEPHONERSTORE4016544', 109747000, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'nhatsang', '', '2023-03-01 10:49:06', 6, 0, '', NULL),
(35, 'THEPHONERSTORE4178322', 76750000, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'nhatsang', 'Hihi', '2023-02-17 10:48:58', 4, 1, '', NULL),
(37, 'THEPHONERSTORE5665740', 73143350, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c', 'Khong co gi', '2023-02-10 00:00:00', 4, 0, '', NULL),
(38, 'THEPHONERSTORE635432', 63469270, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Sang', '+1 (426) 2', 'qaso@mailinator.com', 'In reiciendis placea', 'Quis anim ut ipsum q', '2023-02-02 10:46:53', 4, 1, '', NULL),
(39, 'THEPHONERSTORE8042153', 28888100, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Nhật Sang', '+1 (958) 7', 'mugyfinisy@mailinator.com', 'Debitis pariatur Vo', 'In distinctio Tempo', '2023-03-18 00:00:00', 4, 1, '', NULL),
(40, 'THEPHONERSTORE3410929', 21582000, 0.00, 0.00, 'Thanh toán khi nhận hàng', 35, 'lamphoi', '0565001856', 'lamphoi02@gmail.com', '1a196 đường Trần Phú Nối Dài Xuân Thanh Long Khánh Đồng Nai', 'ship nhanh cho mình nha shop', '2023-03-09 10:45:39', 4, 1, '', NULL),
(41, 'THEPHONERSTORE552813', 20898100, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'nhatsang', 'goi can than', '2023-01-12 00:00:00', 3, 1, '', NULL),
(42, 'THEPHONERSTORE4708439', 26590500, 0.00, 0.00, 'Thanh toán khi nhận hàng', 37, 'Nguyễn Thị Nam', '0866732171', 'nguyennam@gmail.com', 'Công viên phàn mềm quang trung', '', '2023-01-17 00:00:01', 4, 1, '', NULL),
(43, 'THEPHONERSTORE4344696', 50321500, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Sang Trần', '+1 (433) 7', 'lide@mailinator.com', 'Mollit nulla amet l', 'Exercitation enim cu', '2023-03-13 00:00:00', 4, 1, '', NULL),
(44, 'THEPHONERSTORE7595310', 32281000, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'NSang', '+1 (675) 9', 'welepix@mailinator.com', 'Ratione corporis non', 'Quibusdam vel eos s', '2023-03-14 10:44:07', 4, 1, '', NULL),
(45, 'THEPHONERSTORE4629778', 18439050, 0.00, 0.00, '', 11, 'TNSang', '', 'vikuxil@mailinator.com', 'In culpa qui labori', 'Facere repellendus ', '2023-02-01 00:00:00', 1, 1, '', NULL),
(46, 'THEPHONERSTORE9329905', 44212000, 0.00, 0.00, 'Thanh toán VNpay', 11, 'SangTN', '+1 (249) 3', 'cupojumyf@mailinator.com', 'Tenetur mollitia err', 'Asperiores inventore', '2023-01-09 20:58:12', 3, 1, '', NULL),
(47, 'THEPHONERSTORE628078', 12753000, 0.00, 0.00, 'Thanh toán VNpay', 11, 'SangFPT', '+1 (842) 6', 'muqikuceh@mailinator.com', 'Nulla ut eius non ve', 'Okie VNpay', '2023-01-23 00:00:00', 6, 1, '', NULL),
(48, 'THEPHONERSTORE7562348', 12753000, 0.00, 0.00, 'Thanh toán VNpay', 11, 'SangSang', '+1 (671) 7', 'fiha@mailinator.com', 'Provident cupiditat', 'Vel est aut itaque d', '2023-02-11 00:00:00', 4, 1, '', NULL),
(50, 'THEPHONERSTORE4728114', 18342000, 0.00, 0.00, 'Thanh toán VNpay', 11, 'SangDev', '+1 (846) 7', 'buna@mailinator.com', 'Laborum Nostrud min', 'Ex consequatur Temp', '2023-02-13 21:03:17', 3, 1, '', NULL),
(51, 'THEPHONERSTORE2523927', 32031050, 0.00, 0.00, 'Thanh toán VNpay', 11, 'Sang123', '+1 (828) 6', 'wonikata@mailinator.com', 'Porro reiciendis bea', 'Deserunt voluptate q', '2023-02-01 00:00:00', 2, 1, '', NULL),
(52, 'THEPHONERSTORE738238', 18781000, 0.00, 0.00, 'Thanh toán VNpay', 11, 'BC Sang', '+1 (774) 7', 'mycuvuj@mailinator.com', 'Aut voluptate et et ', 'Mollitia placeat in', '2023-01-02 00:00:00', 1, 1, '', NULL),
(54, 'THEPHONERSTORE7735804', 8811000, 0.00, 0.00, 'Thanh toán VNpay', 11, 'Tran nhat sang', '+1 (211) 6', 'xolyzyqed@mailinator.com', 'Molestiae minus volu', 'Sunt dolor quam qua', '2023-01-05 00:00:00', 1, 1, '', NULL),
(55, 'THEPHONERSTORE7413038', 10440500, 0.00, 0.00, 'Thanh toán VNpay', 11, 'Sang', '+1 (385) 6', 'lusocerak@mailinator.com', 'Ut reprehenderit re', 'Ipsum quisquam mole', '2023-01-06 00:00:00', 2, 1, '', NULL),
(56, 'THEPHONERSTORE4161485', 5510800, 0.00, 0.00, 'Thanh toán VNpay', 11, 'Sang block', '+1 (948) 7', 'docylek@mailinator.com', 'Ullamco provident a', 'Fugiat nisi culpa ', '2023-01-07 00:00:00', 6, 1, '', NULL),
(58, 'THEPHONERSTORE5742023', 9810500, 0.00, 0.00, 'Thanh toán VNpay', 11, 'SangChain', '+1 (299) 9', 'hutefucex@mailinator.com', 'Fuga In praesentium', 'Est doloribus lauda', '2023-03-25 08:03:14', 1, 1, '', NULL),
(59, 'THEPHONERSTORE7862485', 44452000, 0.00, 0.00, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'Di An, Binh Duong 23', 'Thanh toán tối ưu', '2023-03-25 08:23:37', 4, 1, '', NULL),
(60, 'THEPHONERSTORE658476', 71175550, 0.00, 0.00, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'Di An, Binh Duong 23', 'Cẩn thận nhé', '2023-03-26 11:37:42', 6, 1, '', NULL),
(61, 'THEPHONERSTORE8568716', 28481000, 0.00, 0.00, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'Di An, Binh Duong 23', 'Đặt hàng oke', '2023-03-26 01:54:22', 4, 1, '', NULL),
(62, 'THEPHONERSTORE9805268', 27151000, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'Di An, Binh Duong 23', 'Cam on', '2023-03-27 01:10:21', 4, 1, '', NULL),
(63, 'THEPHONERSTORE2626293', 33421000, 0.00, 0.00, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', 'Di An, Binh Duong 23', '123', '2023-03-27 02:04:39', 4, 1, '', NULL),
(64, 'THEPHONERSTORE9484947', 18552145, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'Cẩn thận nhé', '2023-03-28 13:54:02', 1, 0, '', NULL),
(66, 'THEPHONERSTORE5043682', 28688305, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', '', '2023-03-28 14:35:14', 2, 0, '', NULL),
(67, 'THEPHONERSTORE4639571', 50425058, 0.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', '', '2023-03-28 14:49:38', 1, 0, '', NULL),
(68, 'THEPHONERSTORE6646341', 6342350, 52350.00, 0.00, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'Hihi', '2023-03-28 15:00:48', 2, 1, '', NULL),
(70, 'THEPHONERSTORE3967719', 26181553, 151053.00, 0.00, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', '', '2023-03-28 15:02:41', 4, 1, '', NULL),
(71, 'THEPHONERSTORE106605', 56809430, 303430.00, 0.00, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'Hàng dễ vỡ giao hàng cẩn thận', '2023-03-28 15:17:00', 6, 1, '', 'KHong thichs'),
(74, 'THEPHONERSTORE9511207', 8599901, 59692.00, 781809.20, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'Check out!!!!', '2023-03-28 15:42:24', 4, 1, '', NULL),
(76, 'THEPHONERSTORE6865290', 22389293, 144403.00, 2484490.30, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c kp Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', '', '2023-03-30 16:12:35', 5, 0, 'THEPHONER304_15', NULL),
(77, 'THEPHONERSTORE7086402', 8711515, 64105.00, 870510.50, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c kp Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'hàng dễ vỡ giao hàng cẩn thận', '2023-03-30 16:36:18', 4, 1, 'SALEOF_10', NULL),
(81, 'THEPHONERSTORE178214', 53169748, 287835.00, 5367483.50, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c kp Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'Good', '2023-04-01 15:19:07', 5, 1, 'SALEOFF_25', NULL),
(86, 'THEPHONERSTORE9433925', 24435591, 197965.00, 2681096.50, 'Thanh toán VNpay', 46, 'Trần Nhật Sang\nPS20227', '0937988510', 'sangtnps20227@fpt.edu.vn', 'dfsdfsd, , Quận Huyện, Tỉnh - Thành', 'dsfsdfdsfds', '2023-04-06 13:57:10', 6, 1, 'THEPHONER304_15', NULL),
(89, 'THEPHONERSTORE3026054', 32962226, 213660.00, 2996566.00, 'Thanh toán khi nhận hàng', 46, 'SangDev4', '0937988510', 'sangtnps20227@fpt.edu.vn', 'Đông Tân, Xã Hòa Minh, Huyện Tuy Phong, Bình Thuận', 'adfsdfsdf', '2023-04-09 10:23:02', 5, 0, '', NULL),
(90, 'THEPHONERSTORE4082235', 23155335, 169305.00, 2105030.50, 'Thanh toán VNpay', 46, 'SangDev4', '0937988510', 'sangtnps20227@fpt.edu.vn', 'fsdfsd, Xã Muội Nọi, Huyện Thuận Châu, Sơn La', 'fdsfsdfsd', '2023-04-09 10:23:55', 5, 1, '', NULL),
(91, 'THEPHONERSTORE1392870', 14133019, 128499.00, 1284819.90, 'Thanh toán khi nhận hàng', 45, 'Nguyễn Văn Tèo', '0909123456', 'intelsport22@gmail.com', 'dfsdfdsf, Xã Chiềng Sại, Huyện Bắc Yên, Sơn La', 'dsfasdfdsfds', '2023-04-09 10:27:49', 4, 0, '', NULL),
(92, 'THEPHONERSTORE638549', 13188701, 124228.00, 1198972.80, 'Thanh toán khi nhận hàng', 45, 'Nguyễn Văn Tèo', '0909123456', 'intelsport22@gmail.com', 'dsfsdfs, Xã Chiềng Đông, Huyện Tuần Giáo, Điện Biên', 'dfsdfds', '2023-04-09 10:28:47', 4, 1, '', NULL),
(93, 'THEPHONERSTORE242113', 671116765, 3056150.00, 61010615.00, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'dsadsadas', '2023-04-09 14:31:43', 1, 0, '', NULL),
(94, 'THEPHONERSTORE7811798', 122205282, 573511.00, 11109571.10, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'fdsfdsfdsfds', '2023-04-09 15:02:03', 6, 0, '', NULL),
(95, 'THEPHONERSTORE1283327', 12339365, 76605.00, 1121760.50, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'fdsfsdf', '2023-04-09 15:18:03', 5, 0, '', NULL),
(96, 'THEPHONERSTORE8491890', 11564963, 73103.00, 1051360.30, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'fdsfsdfsdf', '2023-04-10 14:45:56', 3, 1, '', NULL),
(97, 'THEPHONERSTORE110726', 33832496, 173815.00, 3075681.50, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'HIhi', '2023-04-11 08:23:24', 5, 1, '', NULL),
(98, 'THEPHONERSTORE3149585', 52967044, 260358.00, 4815185.80, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'Cẩn thận nhé', '2023-04-11 08:28:48', 6, 0, '', NULL),
(99, 'THEPHONERSTORE5326908', 150804899, 702863.00, 13709536.30, 'Thanh toán VNpay', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Phường Tân Đông Hiệp, Thành phố Dĩ An, Bình Dương', 'HIhi', '2023-04-12 09:20:07', 6, 1, '', 'Thêm sản phẩm'),
(100, 'THEPHONERSTORE5197336', 18542758, 126553.00, 1685705.30, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Xã Vinh Quang, Huyện Tiên Lãng, Hải Phòng', 'fsdfsdf', '2023-04-12 11:31:44', 6, 0, '', 'Chưa đủ tiền'),
(101, 'THEPHONERSTORE621193', 31532935, 185305.00, 2866630.50, 'Thanh toán khi nhận hàng', 11, 'Trần Nhật Sang', '0937988510', 'nhatsang0101@gmail.com', '19/7c Đông Tác, Xã Vinh Quang, Huyện Tiên Lãng, Hải Phòng', 'fsdfdsfds', '2023-04-12 11:32:26', 6, 0, '', 'Đổi sản phẩm'),
(102, 'THEPHONERSTORE4111999', 24888135, 188305.00, 2486930.50, 'Thanh toán khi nhận hàng', 51, 'lienhe@trannhatsang.com', '0909129034', 'lienhe@trannhatsang.com', 'Phường Tân Hiệp, Xã Sơn Hải, Huyện Bảo Thắng, Lào Cai', 'HIHI', '2023-04-13 19:49:58', 6, 0, 'SALEOF_10 ', 'KHông thích thế thôi'),
(103, 'THEPHONERSTORE1027136', 27356235, 188305.00, 2486930.50, 'Thanh toán khi nhận hàng', 51, 'lienhe@trannhatsang.com', '0909123452', 'lienhe@trannhatsang.com', 'Phường Tân Hiệp, Xã Sơn Hải, Huyện Bảo Thắng, Lào Cai', 'Bán hàng giá rẻ thôi', '2023-04-13 19:51:32', 4, 1, '', NULL),
(104, 'THEPHONERSTORE6939651', 20690984, 178758.00, 2295025.80, 'Thanh toán VNpay', 51, 'lienhe@trannhatsang.com', '0876453122', 'lienhe@trannhatsang.com', 'Phường Tân Hiệp, Xã Sơn Hải, Huyện Bảo Thắng, Lào Cai', 'ahihi', '2023-04-13 19:55:12', 6, 1, 'SALEOFF_20 ', 'Mắc quá');

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

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `idsanpham`, `iddonhang`, `soluong`, `dongia`, `tensp`, `hinhanh`) VALUES
(4, 1, 31, 3, 10999000, 'Điện thoại OPPO Reno8 T 5G 256GB', 'thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(5, 2, 31, 3, 17590000, 'Điện thoại OPPO Reno8 Z 5G', 'thumb-photo_2022-08-05_09-40-15.jpg'),
(6, 4, 31, 2, 11990000, 'Điện thoại OPPO Reno7 Pro 5G', 'thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(7, 1, 32, 3, 10999000, 'Điện thoại OPPO Reno8 T 5G 256GB', 'thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(8, 2, 32, 3, 17590000, 'Điện thoại OPPO Reno8 Z 5G', 'thumb-photo_2022-08-05_09-40-15.jpg'),
(9, 4, 32, 2, 11990000, 'Điện thoại OPPO Reno7 Pro 5G', 'thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(13, 1, 34, 3, 10999000, 'Điện thoại OPPO Reno8 T 5G 256GB', 'thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(14, 2, 34, 3, 17590000, 'Điện thoại OPPO Reno8 Z 5G', 'thumb-photo_2022-08-05_09-40-15.jpg'),
(15, 4, 34, 2, 11990000, 'Điện thoại OPPO Reno7 Pro 5G', 'thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(16, 2, 35, 3, 17590000, 'Điện thoại OPPO Reno8 Z 5G', 'thumb-photo_2022-08-05_09-40-15.jpg'),
(17, 4, 35, 2, 11990000, 'Điện thoại OPPO Reno7 Pro 5G', 'thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(18, 1, 36, 3, 10999000, 'Điện thoại OPPO Reno8 T 5G 256GB', 'thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(19, 2, 36, 3, 17590000, 'Điện thoại OPPO Reno8 Z 5G', 'thumb-photo_2022-08-05_09-40-15.jpg'),
(20, 4, 36, 2, 11990000, 'Điện thoại OPPO Reno7 Pro 5G', 'thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(21, 2, 36, 1, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(22, 1, 37, 7, 10449050, 'Điện thoại OPPO Reno8 T 5G 256GB', '../uploads/thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(23, 1, 38, 1, 10449050, 'Điện thoại OPPO Reno8 T 5G 256GB', '../uploads/thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(24, 2, 38, 5, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(25, 4, 38, 1, 10791000, 'Điện thoại OPPO Reno7 Pro 5G', '../uploads/thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(26, 97, 38, 1, 20, 'Samsung Galaxy Z Fold3 5G 256GB ', '../uploads/thumb-anhchinh16.jpg'),
(27, 5, 38, 1, 2279200, 'Điện thoại OPPO A16K', '../uploads/thumb-oppo a 16k.jpg'),
(29, 2, 39, 1, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(30, 4, 40, 2, 10791000, 'Điện thoại OPPO Reno7 Pro 5G', '../uploads/thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(31, 1, 41, 2, 10449050, 'Điện thoại OPPO Reno8 T 5G 256GB', '../uploads/thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(32, 44, 42, 1, 26590500, 'iPhone 14 Pro Max ', '../uploads/thumb-iphone14prm-1.jpg'),
(33, 53, 43, 1, 14240500, 'iPhone 12 Pro ', '../uploads/thumb-iphone12pro-1.jpg'),
(34, 52, 43, 2, 18040500, 'iPhone 12 Pro Max', '../uploads/thumb-iphone12prm-2.jpg'),
(35, 52, 44, 1, 18040500, 'iPhone 12 Pro Max', '../uploads/thumb-iphone12prm-2.jpg'),
(36, 53, 44, 1, 14240500, 'iPhone 12 Pro ', '../uploads/thumb-iphone12pro-1.jpg'),
(37, 2, 45, 1, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(38, 1, 45, 1, 10449050, 'Điện thoại OPPO Reno8 T 5G 256GB', '../uploads/thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(39, 4, 46, 1, 10791000, 'Điện thoại OPPO Reno7 Pro 5G', '../uploads/thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(40, 3, 46, 2, 16710500, 'Điện thoại OPPO Reno8 Pro 5G', '../uploads/thumb-oppo_reno8_pro_1_.jpg'),
(41, 17, 47, 1, 3231000, 'Xiaomi Redmi 10C', '../uploads/thumb-xiaomi-redmi-10c.jpeg'),
(42, 18, 47, 1, 3951000, 'Xiaomi Redmi Note 11', '../uploads/thumb-xiaomi-redmi-note-11.jpeg'),
(43, 19, 47, 1, 5571000, 'Xiaomi Redmi Note 11 Pro', '../uploads/thumb-xiaomi-redmi-note-11-pro.jpeg'),
(44, 17, 48, 1, 3231000, 'Xiaomi Redmi 10C', '../uploads/thumb-xiaomi-redmi-10c.jpeg'),
(45, 18, 48, 1, 3951000, 'Xiaomi Redmi Note 11', '../uploads/thumb-xiaomi-redmi-note-11.jpeg'),
(46, 19, 48, 1, 5571000, 'Xiaomi Redmi Note 11 Pro', '../uploads/thumb-xiaomi-redmi-note-11-pro.jpeg'),
(47, 23, 50, 1, 8091000, 'Xiaomi 11T 5G', '../uploads/thumb-xiaomi-11t-xanh-duong.jpeg'),
(48, 22, 50, 1, 10251000, 'Xiaomi 12T 5G', '../uploads/thumb-xiaomi-12t-glr-den.jpeg'),
(49, 1, 51, 1, 10449050, 'Điện thoại OPPO Reno8 T 5G 256GB', '../uploads/thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(50, 4, 51, 2, 10791000, 'Điện thoại OPPO Reno7 Pro 5G', '../uploads/thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(51, 2, 52, 1, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(52, 4, 52, 1, 10791000, 'Điện thoại OPPO Reno7 Pro 5G', '../uploads/thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(53, 20, 54, 1, 5121000, 'Xiaomi Redmi Note 11S', '../uploads/thumb-xiaomi-redmi-note-11s.jpeg'),
(54, 21, 54, 1, 3690000, 'Xiaomi Redmi 10', '../uploads/thumb-xiaomi-redmi-10-2022-xanh.jpeg'),
(55, 54, 55, 1, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(56, 6, 56, 1, 5510800, 'Điện thoại OPPO A96 ', '../uploads/thumb-a96-navigation-pink-v1.png'),
(57, 11, 58, 2, 3200000, 'Điện thoại OPPO A17K', '../uploads/thumb-oppo a17k dien thoai thong minh.png'),
(58, 67, 58, 1, 3410500, 'Samsung Galaxy A04s', '../uploads/thumb-anhchinh1.jpg'),
(59, 2, 59, 1, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(60, 73, 59, 2, 9775500, 'Samsung Galaxy A73 (5G)', '../uploads/thumb-anhchinh7.jpg'),
(61, 12, 59, 1, 16911000, 'OPPO Find X3 Pro 5G', '../uploads/thumb-oppo-find-x3-pro-5g-3_2.jpg'),
(62, 1, 60, 1, 10449050, 'Điện thoại OPPO Reno8 T 5G 256GB', '../uploads/thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(63, 2, 60, 5, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(64, 70, 60, 3, 6925500, 'Samsung Galaxy A23 (4GB 128GB)', '../uploads/thumb-anhchinh4.jpg'),
(65, 52, 61, 1, 18040500, 'iPhone 12 Pro Max', '../uploads/thumb-iphone12prm-2.jpg'),
(66, 54, 61, 1, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(67, 3, 62, 1, 16710500, 'Điện thoại OPPO Reno8 Pro 5G', '../uploads/thumb-oppo_reno8_pro_1_.jpg'),
(68, 54, 62, 1, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(69, 3, 63, 2, 16710500, 'Điện thoại OPPO Reno8 Pro 5G', '../uploads/thumb-oppo_reno8_pro_1_.jpg'),
(70, 2, 64, 1, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(71, 1, 64, 1, 10449050, 'Điện thoại OPPO Reno8 T 5G 256GB', '../uploads/thumb-oppo-reno8t-vang1-thumb-600x600.jpg'),
(72, 54, 66, 1, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(73, 52, 66, 1, 18040500, 'iPhone 12 Pro Max', '../uploads/thumb-iphone12prm-2.jpg'),
(74, 3, 67, 3, 16710500, 'Điện thoại OPPO Reno8 Pro 5G', '../uploads/thumb-oppo_reno8_pro_1_.jpg'),
(76, 7, 68, 1, 6290000, 'Điện thoại OPPO A77s', '../uploads/thumb-combo_a77s-_en_2.jpg'),
(77, 2, 70, 1, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(78, 52, 70, 1, 18040500, 'iPhone 12 Pro Max', '../uploads/thumb-iphone12prm-2.jpg'),
(79, 80, 71, 1, 36090500, 'Samsung Galaxy Z Fold 4', '../uploads/thumb-anhchinh15.jpg'),
(80, 81, 71, 1, 20415500, 'Samsung Galaxy Z Fold3 5G 256GB ', '../uploads/thumb-anhchinh16.jpg'),
(81, 3, 73, 1, 16710500, 'Điện thoại OPPO Reno8 Pro 5G', '../uploads/thumb-oppo_reno8_pro_1_.jpg'),
(82, 4, 73, 1, 10791000, 'Điện thoại OPPO Reno7 Pro 5G', '../uploads/thumb-oppo reno 7 t_i_xu_ng_42__3.png'),
(83, 11, 74, 1, 3200000, 'Điện thoại OPPO A17K', '../uploads/thumb-oppo a17k dien thoai thong minh.png'),
(84, 5, 74, 2, 2279200, 'Điện thoại OPPO A16K', '../uploads/thumb-oppo a 16k.jpg'),
(85, 2, 75, 1, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(86, 3, 75, 1, 16710500, 'Điện thoại OPPO Reno8 Pro 5G', '../uploads/thumb-oppo_reno8_pro_1_.jpg'),
(87, 3, 76, 1, 16710500, 'Điện thoại OPPO Reno8 Pro 5G', '../uploads/thumb-oppo_reno8_pro_1_.jpg'),
(88, 2, 76, 1, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(89, 8, 77, 1, 4851000, 'Điện thoại OPPO A76', '../uploads/thumb-combo_a76_-_black.jpg'),
(90, 10, 77, 1, 3790000, 'Điện thoại OPPO A17', '../uploads/thumb-oppo-a-17b1ppr0nazrpqahyt.jpg'),
(97, 11, 81, 2, 3200000, 'Điện thoại OPPO A17K', '../uploads/thumb-oppo a17k dien thoai thong minh.png'),
(98, 68, 81, 1, 3315500, 'Samsung Galaxy A13 (4G 128GB) ', '../uploads/thumb-anhchinh2.jpg'),
(99, 69, 81, 1, 4740500, 'Samsung Galaxy A14 ', '../uploads/thumb-anhchinh3.png'),
(100, 75, 81, 1, 31340500, 'Samsung Galaxy Note 20 Ultra 5G', '../uploads/thumb-anhchinh9.jpg'),
(101, 59, 81, 1, 7590500, 'iPhone XS Max', '../uploads/thumb-iphonexsm.jpg'),
(102, 2, 89, 1, 7990000, 'Điện thoại OPPO Reno8 Z 5G', '../uploads/thumb-photo_2022-08-05_09-40-15.jpg'),
(103, 8, 89, 1, 4851000, 'Điện thoại OPPO A76', '../uploads/thumb-combo_a76_-_black.jpg'),
(104, 12, 89, 1, 16911000, 'OPPO Find X3 Pro 5G', '../uploads/thumb-oppo-find-x3-pro-5g-3_2.jpg'),
(105, 57, 90, 1, 9490500, 'iPhone 11 Pro ', '../uploads/thumb-iphone11pro1.png'),
(106, 56, 90, 1, 11390500, 'iPhone 11 Pro Max', '../uploads/thumb-iphone11prm1.png'),
(107, 5, 91, 1, 2279200, 'Điện thoại OPPO A16K', '../uploads/thumb-oppo a 16k.jpg'),
(108, 54, 91, 1, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(109, 76, 92, 1, 11865500, 'Samsung Galaxy S21 FE 8GB 128GB ', '../uploads/thumb-anhchinh10.png'),
(110, 6, 93, 95, 5510800, 'Điện thoại OPPO A96 ', '../uploads/thumb-a96-navigation-pink-v1.png'),
(111, 54, 93, 8, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(112, 52, 94, 6, 18040500, 'iPhone 12 Pro Max', '../uploads/thumb-iphone12prm-2.jpg'),
(113, 5, 94, 1, 2279200, 'Điện thoại OPPO A16K', '../uploads/thumb-oppo a 16k.jpg'),
(114, 7, 95, 1, 6290000, 'Điện thoại OPPO A77s', '../uploads/thumb-combo_a77s-_en_2.jpg'),
(115, 8, 95, 1, 4851000, 'Điện thoại OPPO A76', '../uploads/thumb-combo_a76_-_black.jpg'),
(116, 54, 96, 1, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(117, 54, 97, 2, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(118, 8, 97, 2, 4851000, 'Điện thoại OPPO A76', '../uploads/thumb-combo_a76_-_black.jpg'),
(119, 7, 98, 1, 6290000, 'Điện thoại OPPO A77s', '../uploads/thumb-combo_a77s-_en_2.jpg'),
(120, 45, 98, 1, 24690500, 'iPhone 14 Pro ', '../uploads/thumb-iphone14pr-1.jpg'),
(121, 12, 98, 1, 16911000, 'OPPO Find X3 Pro 5G', '../uploads/thumb-oppo-find-x3-pro-5g-3_2.jpg'),
(122, 45, 99, 4, 24690500, 'iPhone 14 Pro ', '../uploads/thumb-iphone14pr-1.jpg'),
(123, 7, 99, 1, 6290000, 'Điện thoại OPPO A77s', '../uploads/thumb-combo_a77s-_en_2.jpg'),
(124, 75, 99, 1, 31340500, 'Samsung Galaxy Note 20 Ultra 5G', '../uploads/thumb-anhchinh9.jpg'),
(125, 7, 100, 1, 6290000, 'Điện thoại OPPO A77s', '../uploads/thumb-combo_a77s-_en_2.jpg'),
(126, 54, 100, 1, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(127, 54, 101, 1, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(128, 52, 101, 1, 18040500, 'iPhone 12 Pro Max', '../uploads/thumb-iphone12prm-2.jpg'),
(129, 53, 102, 1, 14240500, 'iPhone 12 Pro ', '../uploads/thumb-iphone12pro-1.jpg'),
(130, 54, 102, 1, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(131, 53, 103, 1, 14240500, 'iPhone 12 Pro ', '../uploads/thumb-iphone12pro-1.jpg'),
(132, 54, 103, 1, 10440500, 'iPhone 12 Mini', '../uploads/thumb-iphone12mini1.jpg'),
(133, 59, 104, 3, 7590500, 'iPhone XS Max', '../uploads/thumb-iphonexsm.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_reply_blog_comments`
--

DROP TABLE IF EXISTS `tbl_reply_blog_comments`;
CREATE TABLE `tbl_reply_blog_comments` (
  `id` int(9) NOT NULL,
  `id_user` int(9) NOT NULL,
  `id_blog_comment` int(9) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_reply_comments_product`
--

DROP TABLE IF EXISTS `tbl_reply_comments_product`;
CREATE TABLE `tbl_reply_comments_product` (
  `id` int(9) NOT NULL,
  `iduser` int(11) NOT NULL,
  `id_comment` int(9) NOT NULL,
  `content` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_reply_reviews`
--

DROP TABLE IF EXISTS `tbl_reply_reviews`;
CREATE TABLE `tbl_reply_reviews` (
  `id_reply` int(9) NOT NULL,
  `id_user` int(9) NOT NULL,
  `id_review` int(9) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_reply_reviews`
--

INSERT INTO `tbl_reply_reviews` (`id_reply`, `id_user`, `id_review`, `content`, `date_modified`) VALUES
(1, 44, 2, 'Cám ơn bạn đã ủng hộ shop ạ', '2023-04-09 10:31:51'),
(2, 44, 11, 'Cám ơn bạn đã ủng hộ shop, chúc bạn mạnh giỏi hihi', '2023-04-09 16:01:30'),
(3, 44, 15, 'Thank you so much.', '2023-04-09 10:33:49'),
(4, 44, 4, 'Shop cảm ơn nhé', '2023-04-09 16:01:20'),
(5, 11, 10, 'Yeah. Cám ơn bạn. Hihi', '2023-04-11 10:44:07');

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
  `promote` tinyint(1) NOT NULL DEFAULT 0,
  `danhgia` float(1,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`masanpham`, `tensp`, `don_gia`, `ton_kho`, `images`, `giam_gia`, `dac_biet`, `so_luot_xem`, `ngay_nhap`, `date_modified`, `mo_ta`, `ma_danhmuc`, `id_dmphu`, `information`, `promote`, `danhgia`) VALUES
(1, 'Điện thoại OPPO Reno8 T 5G 256GB', 10999000.00, 5, 'oppo - reno 5g 8t den.png,oppo-reno8t-den1-thumb-600x600.jpg,oppo-reno-5g-dep.jpg,638091158554197072_oppo-reno8-t-5g-dd.jpg,Oppo Reno 5G.png,oppo-reno-8t.jpg,thumb-oppo-reno8t-vang1-thumb-600x600.jpg', 5.00, 0, 19, '2023-04-01 09:20:03', '2023-04-11 10:36:49', '<p>OPPO Reno8 T 5G 128GB l&agrave; mẫu điện thoại đầu ti&ecirc;n trong năm 2023 m&agrave; OPPO kinh doanh tại Việt Nam. M&aacute;y nhận được kh&aacute; nhiều sự quan t&acirc;m đến từ cộng đồng c&ocirc;ng nghệ về th&ocirc;ng số kỹ thuật hết sức ấn tượng như: Camera 108 MP, chipset nh&agrave; Qualcomm v&agrave; m&agrave;n h&igrave;nh AMOLED. Ho&agrave;n thiện với chất liệu cao cấp Sở hữu m&agrave;n h&igrave;nh chất lượng với khả năng hiển thị sống động Nổi bật với cụm camera chụp ảnh si&ecirc;u sắc n&eacute;t Hiệu năng tốt sử dụng mượt m&agrave; nhiều t&aacute;c vụ</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', 1, 3, '<ul>\r\n	<li><strong>M&agrave;n h&igrave;nh</strong>: AMOLED6.7&quot;Full HD+</li>\r\n	<li><strong>Hệ điều h&agrave;nh</strong>: Android 13</li>\r\n	<li><strong>Camera sau</strong>: Ch&iacute;nh 108 MP &amp; Phụ 2 MP, 2 MP</li>\r\n	<li><strong>Camera trước</strong>: 32 MP</li>\r\n	<li><strong>Chip</strong>: Snapdragon 695 5G RAM: 8 GB</li>\r\n	<li><strong>Dung lượng lưu trữ</strong>: 128 GB</li>\r\n	<li><strong>SIM</strong>: 2 Nano SIM (SIM 2 chung khe thẻ nhớ)</li>\r\n	<li><strong>Hỗ trợ 5G Pin, Sạc: 4800 mAh67 W</strong></li>\r\n</ul>\r\n<quillbot-extension-portal></quillbot-extension-portal>', 1, 0.0),
(2, 'Điện thoại OPPO Reno8 Z 5G', 7990000.00, 60, 'oppo reno 8z chup anh.jpg,oppo reno 8z dep vang.jpg,oppo reno 8z vang.jpg,oppo reno 8z den.jpg,oppo reno 8z .jpg,photo_2022-08-05_09-40-14.jpg,thumb-photo_2022-08-05_09-40-15.jpg', 0.00, 0, 18, '2023-03-11 08:13:17', '2023-03-14 15:25:01', 'OPPO Reno8 Z 5G đã được giới thiệu tại thị trường Việt Nam vào tháng 8/2022, máy sở hữu một diện mạo đẹp mắt nhờ thừa hưởng thiết kế hiện đại từ thế hệ trước, cùng với đó là sự cải tiến về camera và hiệu năng nhằm mang đến những trải nghiệm tốt hơn trong phân khúc điện thoại tầm trung.\r\nẤn tượng với diện mạo thời trang và màn hình chất lượng\r\nThỏa sức nhiếp ảnh hay sáng tạo video với bộ ba camera\r\nHiệu năng mạnh mẽ trong phân khúc\r\nThời lượng pin đáp ứng cho cả ngày dài\r\n', 1, 3, 'Màn hình:\r\n\r\nAMOLED6.43\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 2 MP, 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 695 5G\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4500 mAh33 W', 0, 0.0),
(3, 'Điện thoại OPPO Reno8 Pro 5G', 17590000.00, 88, 'thumb-oppo_reno8_pro_1_.jpg,oppo reno 8 pro xxx.jpg,oppo _reno 8 _ pro 3.jpg,oppo reno 8 5g pro 2.jpg,oppo reno 8 pro 2.png,oppo_reno8_pro.jpg', 5.00, 0, 14, '2023-03-11 02:25:13', '2023-04-11 10:35:02', '<p>OPPO Reno8 T 5G 128GB l&agrave; mẫu điện thoại đầu ti&ecirc;n trong năm 2023 m&agrave; OPPO kinh doanh tại Việt Nam. M&aacute;y nhận được kh&aacute; nhiều sự quan t&acirc;m đến từ cộng đồng c&ocirc;ng nghệ về th&ocirc;ng số kỹ thuật hết sức ấn tượng như: Camera 108 MP, chipset nh&agrave; Qualcomm v&agrave; m&agrave;n h&igrave;nh AMOLED. Ho&agrave;n thiện với chất liệu cao cấp Sở hữu m&agrave;n h&igrave;nh chất lượng với khả năng hiển thị sống động Nổi bật với cụm camera chụp ảnh si&ecirc;u sắc n&eacute;t Hiệu năng tốt sử dụng mượt m&agrave; nhiều t&aacute;c vụ</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', 1, 3, '<p>M&agrave;n h&igrave;nh: AMOLED6.7&quot;Full HD+ Hệ điều h&agrave;nh: Android 13 Camera sau: Ch&iacute;nh 108 MP &amp; Phụ 2 MP, 2 MP Camera trước: 32 MP Chip: Snapdragon 695 5G RAM: 8 GB Dung lượng lưu trữ: 128 GB SIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G Pin, Sạc: 4800 mAh67 W</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', 1, 0.0),
(4, 'Điện thoại OPPO Reno7 Pro 5G', 11990000.00, 78, 'thumb-oppo reno 7 t_i_xu_ng_42__3.png,oppo reno 7 tot.png,oppo reno 7 chat luong cao.png,oppo reno 7 pro.png,oppo reno 7 dep tot.png,oppo reno 7 t_i_xu_ng_8_.png', 10.00, 0, 7, '2023-03-11 02:40:37', '2023-03-14 15:25:01', 'OPPO Reno7 Pro 5G trình làng với một thiết kế mới lạ đầy bắt mắt, hiệu năng ổn định cùng khả năng chụp ảnh - quay video cực kỳ chất lượng nhờ những nâng cấp đáng giá về thuật toán xử lý trên cảm biến chính IMX766 đến từ Sony\r\nDiện mạo nổi bật chưa từng có\r\nĐã mắt hơn với màn hình chất lượng\r\nChiến game mượt mà trên chipset đến từ MediaTek\r\nThỏa sức chụp ảnh với camera chất lượng', 1, 3, 'Màn hình:\r\n\r\nAMOLED6.5\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 8 MP, 2 MP\r\nCamera trước:\r\n\r\n32 MP\r\nChip:\r\n\r\nMediaTek Dimensity 1200 Max\r\nRAM:\r\n\r\n12 GB\r\nDung lượng lưu trữ:\r\n\r\n256 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n4500 mAh65 W', 0, 0.0),
(5, 'Điện thoại OPPO A16K', 2590000.00, 95, 'thumb-oppo a 16k.jpg,oppo a 16k blue tripple.png,oppo a 16k blue dep lam.jpg,oppo a 16k blue dep.jpg,oppo a 16k blue dep.png,combo_a16k_-_blue.jpg', 12.00, 0, 6, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO chính thức trình làng mẫu smartphone giá rẻ - OPPO A16K sở hữu màu sắc thời thượng, viên pin dung lượng cao, cấu hình khỏe, selfie lung linh, một lựa chọn thú vị cho người tiêu dùng.\r\nHệ thống camera cho bạn tỏa sáng cùng vẻ đẹp tự nhiên\r\nCấu hình tốt trong tầm giá\r\nThiết kế tinh giản, trẻ trung\r\nTận hưởng trải nghiệm xem đã mắt\r\nThời gian giải trí lâu hơn\r\n\r\n', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.52\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\n13 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n3 GB\r\nDung lượng lưu trữ:\r\n\r\n32 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n4230 mAh10 W', 0, 0.0),
(6, 'Điện thoại OPPO A96 ', 5990000.00, 0, 'thumb-a96-navigation-pink-v1.png,a96 pink oppo qua dep.png,a96 pink dien thoai rat dep.png,a 96 pink dien thoai oppo.png,oppo 96 dien thoai.jpg,a96-pink-1920.png', 8.00, 0, 5, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO A96 là cái tên được nhắc đến khá nhiều trên các diễn đàn công nghệ hiện nay, nhờ sở hữu một ngoại hình hết sức bắt mắt cùng hàng loạt các thông số ấn tượng trong phân khúc giá như hiệu năng cao, camera chụp ảnh sắc nét.\r\nNổi bật với diện mạo đầy cuốn hút\r\nHiển thị hình ảnh một cách sinh động\r\nSử dụng lâu hơn nhờ trang bị viên pin lớn\r\nChiến game ổn định nhờ chip xử lý đến từ Qualcomm\r\n', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.59\"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n16 MP\r\nChip:\r\n\r\nSnapdragon 680\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0, 0.0),
(7, 'Điện thoại OPPO A77s', 6290000.00, 98, 'thumb-combo_a77s-_en_2.jpg,oppo a77s dep qua dep.jpg,a77 oppo chuan star.jpg,oppo a77 xanh chuan.jpg,oppo a 77 xanh blue.jpg,combo_a77s-_xanh_1.jpg,oppo-a77s-xanh.jpg', 0.00, 0, 4, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO vừa cho ra mắt mẫu điện thoại tầm trung mới với tên gọi OPPO A77s, máy sở hữu màn hình lớn, thiết kế đẹp mắt, hiệu năng ổn định cùng khả năng mở rộng RAM lên đến 8 GB vô cùng nổi bật trong phân khúc.\r\nLinh hoạt hơn với khả năng xử lý đa tác vụ\r\nVẻ ngoài cao cấp\r\nGiải trí đã mắt với màn hình lớn\r\nTận hưởng vô tư, lo chi gián đoạn', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nSnapdragon 680\r\nRAM:\r\n\r\n8 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0, 0.0),
(8, 'Điện thoại OPPO A76', 5390000.00, 98, 'thumb-combo_a76_-_black.jpg,oppo-a76-3.jpg,a76 combo blue chuan.jpg,combo_a76_blue_dep.jpg,combo_a76_-_blue.jpg,', 10.00, 0, 5, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO A76 4G ra mắt với thiết kế trẻ trung, hiệu năng ổn định, màn hình 90 Hz mượt mà cùng viên pin trâu cho thời gian sử dụng lâu dài phù hợp cho mọi đối tượng người dùng.\nThiết kế OPPO Glow - màu gradient đẹp mắt\nThoải mái dùng cả ngày với pin 5000 mAh và sạc nhanh 33 W\nHiệu năng ổn định với chip Snapdragon 680', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 11\r\nCamera sau:\r\n\r\nChính 13 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nSnapdragon 680\r\nRAM:\r\n\r\n6 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0, 0.0),
(9, 'Điện thoại OPPO A57 128GB', 4290000.00, 100, 'thumb-OPPO A57 4GB 128GB.jpg,couple Oppo A57 12GB.png,Oppo A57 4G 128G blue.jpg,Oppo A57 128Gb .png,oppo a57 128G.jpg,oppo a57 4g.jpg', 0.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO đã bổ sung thêm vào dòng sản phẩm OPPO A giá rẻ một thiết bị mới có tên OPPO A57 128GB. Khác với mẫu A57 5G đã được ra mắt trước đó, điện thoại dòng A mới có màn hình HD+, camera chính 13 MP và pin 5000 mAh.\nThiết kế trẻ trung\nHiệu năng ổn định trong tầm giá\nHỗ trợ chụp ảnh quay phim', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 13 MP & Phụ 2 MP\r\nCamera trước:\r\n\r\n8 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n4 GB\r\nDung lượng lưu trữ:\r\n\r\n128 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh33 W', 0, 0.0),
(10, 'Điện thoại OPPO A17', 3790000.00, 99, 'oppo-a-17t_i_xu_ng_30__3.png,thumb-oppo-a-17b1ppr0nazrpqahyt.jpg,oppo a17 dep khong can cho che.png,oppo a17 blue tao lao.png,oppo 17 dep khong phai che.png,oppo a17 chuan dep blue.png', 0.00, 0, 2, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'Dường như OPPO đang ngày càng quan tâm đến trải nghiệm của người dùng, điều này được minh chứng qua nhiều dòng điện thoại của hãng trong đó có OPPO A17, máy sở hữu màn hình kích thước lớn, camera 50 MP đi cùng viên pin 5000 mAh với thời lượng dùng bền bỉ.\nDiện mạo mới lạ và độc đáo\nBắt trọn khoảnh khắc đẹp với độ chi tiết cao\nKhông gian hiển thị rộng lớn\nMang đến sự ổn định nhờ chipset MediaTek\nThoải mái sử dụng cả ngày nhờ pin lớn', 1, 1, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\nChính 50 MP & Phụ 0.3 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n4 GB\r\nDung lượng lưu trữ:\r\n\r\n64 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh10 W', 0, 0.0),
(11, 'Điện thoại OPPO A17K', 3200000.00, 96, 'thumb-oppo a17k dien thoai thong minh.png,t_i_xu_ng_62__1.png,oppo a17k.png,combo_a17k_-_navy_-_cmyk.jpg,oppo a17 mau kim rat dep.png,Oppo A17 gia re uu dai.jpg', 0.00, 0, 1, '2023-03-12 03:21:43', '2023-03-14 15:25:01', 'OPPO A17K là chiếc điện thoại được kế thừa thiết kế tinh tế của OPPO A16K, được nâng cấp về dung lượng pin, đồng thời cũng sở hữu màn hình chi tiết cùng một hiệu năng ổn định được nhà OPPO cho ra mắt vào những tháng cuối năm 2022.\r\nSử dụng thả ga với viên pin lớn, hiệu năng mượt mà\r\nTrải nghiệm tuyệt hơn trên màn hình lớn\r\nChụp ảnh rõ nét nhờ camera AI\r\n', 1, 11, 'Màn hình:\r\n\r\nIPS LCD6.56\"HD+\r\nHệ điều hành:\r\n\r\nAndroid 12\r\nCamera sau:\r\n\r\n8 MP\r\nCamera trước:\r\n\r\n5 MP\r\nChip:\r\n\r\nMediaTek Helio G35\r\nRAM:\r\n\r\n3 GB\r\nDung lượng lưu trữ:\r\n\r\n64 GB\r\nSIM:\r\n\r\n2 Nano SIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n5000 mAh10 W', 0, 0.0),
(12, 'OPPO Find X3 Pro 5G', 18790000.00, 98, 'thumb-oppo-find-x3-pro-5g-3_2.jpg,Oppo Fnd X3 Pro chuan dep phai manh.jpg,Oppo Find X pro 5g dep mat.jpg,Oppo Find X3 Pro ket hop cung voi nhau.jpg,Oppo Find x3 pro 5g chuan dep.jpg,Oppo find x3 pro 5g.jpg', 10.00, 0, 5, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'Đánh giá Oppo Find X3 Pro 5G – Hiệu năng dẫn đầu, màn hình chiếm trọn\r\nFind X là dòng sản phẩm được OPPO chăm chút nhiều nhất, đặc biệt là những công nghệ hoàn toàn hiện đại. Bằng chứng Find X3 Pro mang đến vẻ ngoài mới, camera selfie được ẩn dưới màn hình, cùng cấu hình mạnh mẽ đến từ chip Snapdragon 865.\r\nHoàn thiện nguyên khối, màn hình 2K rực rỡ\r\nCấu hình mạnh mẽ với bộ vi xử lý Snapdragon 888, 12GB RAM và 256GB bộ nhớ trong\r\nCụm bốn camera sau, cho phép chụp góc siêu rộng, camera selfie ẩn dưới màn hình\r\nViên pin dung lượng 4500 mAh, sạc nhanh 65W\r\nĐiện thoại Oppo Find X3 Pro giá bao nhiêu tiền?\r\nMua OPPO Find X3 Pro 5G chính hãng, giá rẻ tại CellphoneS\r\n', 1, 2, 'Kích thước màn hình\r\n6.7 inches\r\nCông nghệ màn hình\r\nAMOLED\r\nCamera sau\r\nCamera chính: 50 MP, f/1.8, 1/1.56\", 1.0µm, PDAF, OIS\r\nCamera tele: 13 MP, f/2.4, 52mm PDAF, zoom quang 5x\r\nCamera góc rộng: 50 MP, f/2.2, 110˚, 1/1.56\", 1.0µm, omnidirectional PDAF\r\nCamera macro: 3 MP, f/3.0\r\nCamera trước\r\n32 MP, f/2.4, 26mm (wide), 1/2.8\", 0.8µm\r\nChipset\r\nSnapdragon 888 (5 nm)\r\nCông nghệ màn hình\r\nAMOLED\r\nDung lượng RAM\r\n12 GB\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\n4500mAh', 0, 0.0),
(13, 'OPPO Find X', 11990000.00, 100, 'thumb-find_x.jpg,oppo-find-x-dep.jpg,find-x-1_1.jpg,find-x-6.jpg,find-x-5.jpg,oppo-find-x_1.jpg', 0.00, 0, 0, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'OPPO Find X Chính hãng\r\nSau sự thành công của OPPO F7 Youth, OPPO Find 7, hãng điện thoại OPPO đang từng bước khẳng định vị thế của một trong những hãng sản xuất smartphone hàng đầu thế giới. Với chiếc Find X sở hữu thiết kế đột phá, công ty này quyết tâm khẳng định họ hoàn toàn có thể sáng tạo hơn cả Apple lẫn Samsung.\r\n\r\nNgoài ra, khách hàng có thể tham khảo điện thoại Oppo Find X2 với nhiều nâng cấp về cấu hình, camera.\r\nThiết kế OPPO Find X mang lại sự khác biệt\r\nMàn hình OPPO Find X đem đến trải nghiệm hình ảnh sống động\r\nHiệu năng OPPO Find X thuộc top đầu thị trường\r\nOPPO Find X tích hợp công nghệ mở khóa bằng gương mặt hiện đại\r\nOPPO Find X có thời lượng pin ấn tượng và thời gian sạc cũng rất nhanh\r\nCamera OPPO Find X lưu giữ chân thực mọi khoảnh khắc\r\n', 1, 2, 'Công nghệ màn hình\r\n\r\nCảm ứng điện dung AMOLED, 16 triệu màu\r\nKích thước màn hình\r\n\r\n6.42 inches\r\nCamera sau\r\n\r\n16 MP (f/2.0, PDAF, OIS) + 20 MP (f/2.0), tự động lấy nét nhận diện theo giai đoạn, LED flash kép (2 tone)\r\nCamera trước\r\n\r\n2160p@30fps\r\nChipset\r\n\r\nQualcomm SDM845 Snapdragon 845\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\nLi-ion 3730 mAh\r\nThẻ SIM\r\n\r\n2 SIM (Nano-SIM)\r\nHệ điều hành\r\n\r\n8.1 (Oreo)\r\nĐộ phân giải màn hình\r\n\r\n1080 x 2340 pixels (FullHD+)\r\nTrọng lượng\r\n\r\n186 g (6.56 oz)\r\nCảm biến\r\n\r\nFace ID, gia tốc, con quay hồi chuyển, khoảng cách, la bàn', 0, 0.0),
(14, 'OPPO Find X2', 18990000.00, 100, 'thumb-637191049692122812_oppo-find-x2-xanh-1.png,637194498955419635_oppo-find-x2-den-3.png,637194498955464088_oppo-find-x2-den-4.png,637194500600555695_oppo-find-x2-xanh-3.png,Oppo Find X dep gia re.jpg,637194500601105652_oppo-find-x2-xanh-4.png', 10.00, 0, 1, '2023-03-12 09:21:43', '2023-03-14 15:25:01', 'Oppo Find X2 – Hiệu năng đỉnh cao, màn hình chiếm trọn mặt trước\r\nOppo Find X2 và Find X2 Pro là chiếc điện thoại thuộc phân khúc cao cấp vừa được Oppo ra mắt, tiếp nối sự thành công vang dội của người tiền nhiệm Oppo Find X. Đây là mẫu sản phẩm điện thoại Oppo được thừa hưởng những công nghệ mới và tốt nhất ở thời điểm hiện tại so với các đối thủ cùng phân khúc. Ngoài ra, bạn cũng có thể tham khảo điện thoại Oppo Find X3 với nhiều nâng cấp về cấu hình, thiết kế, camera cũng như dung lượng pin.\r\nThiết kế chuyển màu nổi bật, cho cảm giác cực kì nhẹ nhàng\r\nMàn hình OLED 6,7 inchQuad-HD+ cho khả năng hiển thị sắc nét, sống động\r\nCấu hình mạnh mẽ với vi xử lý Snapdragon 865 đi kèm 12GB RAM\r\nDung lượng pin lên đến 4200mAh, có khả năng cho thiết bị khác\r\nBa camera sau 48 MP + 13 MP + 12MP cùng camera selfie 32 MP\r\nMua điện thoại Oppo Find X2 chính hãng, giá rẻ nhất tại CellphoneS', 1, 2, 'Kích thước màn hình\r\n\r\n6.7 inches\r\nCông nghệ màn hình\r\n\r\nAMOLED\r\nCamera sau\r\n\r\nChính 48 MP & Phụ 13 MP, 12 MP\r\nCamera trước\r\n\r\n32 MP\r\nChipset\r\n\r\nQualcomm Snapdragon 865\r\nCông nghệ màn hình\r\n\r\nAmoled\r\nDung lượng RAM\r\n\r\n12 GB\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\n4200 mAh Li-Ion, Hỗ trợ sạc nhanh\r\nThẻ SIM\r\n\r\n2 SIM (Nano-SIM)\r\nHệ điều hành\r\n\r\nAndroid 10.0 , ColorOS 7.0\r\nĐộ phân giải màn hình\r\n\r\n3168 x 1440 pixel\r\nTính năng màn hình\r\n\r\nMàn hình 2K, Tần số quét 120 Hz, Kính cường lực Corning Gorilla Glass 6\r\nCảm biến\r\n\r\n- Vân tay ẩn trong màn hình: Hỗ trợ\r\n- Cảm biến: Cảm biến nhiệt độ màu, Cảm biến ánh sáng, Cảm biến tiệm cận, La Bàn, Con Quay Hồi Chuyển.', 0, 0.0),
(17, 'Xiaomi Redmi 10C', 3590000.00, 98, 'thumb-xiaomi-redmi-10c.jpeg,xiaomi-redmi-10c-1.jpeg, xiaomi-redmi-10c-2.jpeg,xiaomi-redmi-10c-3.jpeg, xiaomi-redmi-10c-4.jpeg', 10.00, 0, 1, '2023-03-13 20:28:03', '2023-03-14 15:25:01', 'Xiaomi Redmi 10C 64GB ra mắt với một cấu hình mạnh mẽ nhờ trang bị con chip 6 nm đến từ Qualcomm, màn hình hiển thị đẹp mắt, pin đáp ứng nhu cầu sử dụng cả ngày, hứa hẹn mang đến trải nghiệm tuyệt vời so với mức giá mà nó trang bị.', 4, 13, 'Màn hình: IPS LCD6.71\"HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 50 MP & Phụ 2 MP \r\nCamera trước: 5 MP \r\nChip: Snapdragon 680 \r\nRAM: 4 GB \r\nDung lượng lưu trữ: 64 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 4G Pin\r\nSạc: 5000 mAh18 W', 0, 0.0),
(18, 'Xiaomi Redmi Note 11', 4390000.00, 98, 'thumb-xiaomi-redmi-note-11.jpeg,xiaomi-redmi-note-11-1.jpeg, xiaomi-redmi-note-11-2.jpeg,xiaomi-redmi-note-11-3.jpeg,xiaomi-redmi-note-11-4.jpeg                                                                ', 10.00, 0, 0, '2023-03-13 20:32:03', '2023-03-14 15:25:01', 'Redmi Note 11 (6GB/128GB) vừa được Xiaomi cho ra mắt, được xem là chiếc smartphone có giá tầm trung ấn tượng, với 1 cấu hình mạnh, cụm camera xịn sò, pin khỏe, sạc nhanh mà giá lại rất phải chăng.Thiết kế bo cong đậm chất Xiaomi,Hiệu năng mạnh mẽ với chip Snapdragon,Màn hình sắc nét, chiến game mượt mà, Bắt trọn từng khoảnh khắc với cụm camera xịn sò.', 4, 13, 'Màn hình: AMOLED6.43\"Full HD+ \r\nHệ điều hành: Android 11      \r\nCamera sau: Chính 50 MP & Phụ 8 MP, 2 MP, 2 MP      \r\nCamera trước: 13 MP      \r\nChip: Snapdragon 680     \r\nRAM: 6 GB       \r\nDung lượng lưu trữ: 128 GB       \r\nSIM: 2 Nano SIM\r\nHỗ trợ 4G      \r\nPin, Sạc: 5000 mAh33 W', 0, 0.0),
(19, 'Xiaomi Redmi Note 11 Pro', 6190000.00, 98, 'thumb-xiaomi-redmi-note-11-pro.jpeg, xiaomi-redmi-note-11-pro-1.jpeg, xiaomi-redmi-note-11-pro-2.jpeg, xiaomi-redmi-note-11-pro-3.jpeg, xiaomi-redmi-note-11-pro-4.jpeg        ', 10.00, 0, 0, '2023-03-13 20:35:08', '2023-03-14 15:25:01', 'Xiaomi Redmi Note 11 Pro 4G mang trong mình khá nhiều những nâng cấp cực kì sáng giá. Là chiếc điện thoại có màn hình lớn, tần số quét 120 Hz, hiệu năng ổn định cùng một viên pin siêu trâu.Thiết kế cứng cáp, cầm nắm rất đầm tay,Hiệu năng ổn định cho mọi tác vụ,Camera AI đến 108 MP,Pin lớn, sạc siêu nhanh.', 4, 13, 'Màn hình: AMOLED6.67\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 108 MP & Phụ 8 MP, 2 MP, 2 MP \r\nCamera trước: 16 MP \r\nChip: MediaTek Helio G96 \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 128 GB \r\nSIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ)\r\nHỗ trợ 4G Pin\r\nSạc: 5000 mAh67 W', 0, 0.0),
(20, 'Xiaomi Redmi Note 11S', 5690000.00, 99, 'thumb-xiaomi-redmi-note-11s.jpeg,xiaomi-redmi-note-11s-1.jpeg,xiaomi-redmi-note-11s-2.jpeg,xiaomi-redmi-note-11s-3.jpeg, xiaomi-redmi-note-11s-4.jpeg         ', 10.00, 0, 0, '2023-03-13 20:37:08', '2023-03-14 15:25:01', 'Điện thoại Xiaomi Redmi Note 11S sẵn sàng đem đến cho bạn những trải nghiệm vô cùng hoàn hảo về chơi game, các tác vụ sử dụng hằng ngày hay sự ấn tượng từ vẻ đẹp bên ngoài.Ấn tượng với màn hình AMOLED 6.43 inch,Ảnh chụp đẹp và siêu rõ nét với hệ thống bốn camera AI 108 MP,Hiệu năng ổn định với MediaTek Helio G96,Thiết kế tối giản nhưng vẫn năng động và mạnh mẽ.', 4, 13, 'Màn hình: AMOLED6.43\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 108 MP & Phụ 8 MP, 2 MP, 2 MP \r\nCamera trước: 16 MP \r\nChip: MediaTek Helio G96 \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 128 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 4G Pin, \r\nSạc: 5000 mAh33 W', 0, 0.0),
(21, 'Xiaomi Redmi 10', 4100000.00, 99, 'thumb-xiaomi-redmi-10-2022-xanh.jpeg, xiaomi-redmi-10-2022-xanh-1.jpeg, xiaomi-redmi-10-2022-xanh-2.jpeg, xiaomi-redmi-10-2022-xanh-3.jpeg, xiaomi-redmi-10-2022-xanh-4.jpeg     ', 10.00, 0, 0, '2023-03-13 20:39:08', '2023-03-14 15:25:01', 'Xiaomi Redmi 10 (2022) được ra mắt vào tháng 05/2022 với những nâng cấp về thuật toán xử lý khi chụp ảnh trên camera nhằm giúp khách hàng có được những bức hình chất lượng hơn trên một thiết bị thuộc phân khúc giá rẻ.Chụp ảnh chất lượng, Màn hình hiển thị sống động, Hiệu suất mạnh mẽ nhờ chipset gaming đến từ MediaTek, Thời lượng sử dụng dài lâu.', 4, 13, 'Màn hình: IPS LCD6.5\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 50 MP & Phụ 8 MP, 2 MP, 2 MP \r\nCamera trước: 8 MP \r\nChip: MediaTek Helio G88 \r\nRAM: 4 GB \r\nDung lượng lưu trữ: 128 GB \r\nSIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ)\r\nHỗ trợ 4G Pin \r\nSạc: 5000 mAh18 W', 0, 0.0),
(22, 'Xiaomi 12T 5G', 11390000.00, 99, 'thumb-xiaomi-12t-glr-den.jpeg, xiaomi-12t-glr-den-1.jpeg, xiaomi-12t-glr-den-2.jpeg, xiaomi-12t-glr-den-3.jpeg, xiaomi-12t-glr-den-4.jpeg      ', 10.00, 0, 0, '2023-03-13 20:42:54', '2023-03-14 15:25:01', 'Xiaomi 12T 5G 256GB là smartphone đầu tiên trên thế giới trang bị con chip Dimensity 8100 Ultra nên máy thu hút được khá nhiều sự chú ý vào thời điểm ra mắt, bộ vi xử lý này không chỉ có hiệu năng mạnh mẽ mà nó còn tối ưu được giá thành cho thiết bị, điều này giúp 12T trở thành chiếc điện thoại quốc dân cực kỳ đáng sắm.', 4, 14, 'Màn hình: AMOLED6.67\"1.5K \r\nHệ điều hành: Android 12 \r\nCamera sau: Chính 108 MP & Phụ 8 MP, 2 MP \r\nCamera trước: 20 MP \r\nChip: MediaTek Dimensity 8100 Ultra 8 nhân \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 256 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 5G Pin\r\nSạc: 5000 mAh120 W', 0, 0.0),
(23, 'Xiaomi 11T 5G', 8990000.00, 99, 'thumb-xiaomi-11t-xanh-duong.jpeg, xiaomi-11t-xanh-duong-1.jpeg, xiaomi-11t-xanh-duong-2.jpeg, xiaomi-11t-xanh-duong-3.jpeg, xiaomi-11t-xanh-duong-4.jpeg  ', 10.00, 0, 0, '2023-03-13 20:45:54', '2023-03-14 15:25:01', 'Xiaomi 11T 5G sở hữu màn hình AMOLED, viên pin siêu khủng cùng camera độ phân giải 108 MP, điện thoại Xiaomi sẽ đáp ứng mọi nhu cầu sử dụng của bạn, từ giải trí đến làm việc đều vô cùng mượt mà. Cho ra những tác phẩm đầy chân thật với camera 108 MP, Sẵn sàng “chiến” mọi tựa game, Màn hình lớn, độ phân giải cao cho hình ảnh sắc nét.\r\n', 4, 14, 'Màn hình: AMOLED6.67\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 108 MP & Phụ 8 MP, 5 MP \r\nCamera trước: 16 MP \r\nChip: MediaTek Dimensity 1200 \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 256 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 5G Pin\r\nSạc: 5000 mAh67 W', 0, 0.0),
(24, 'Xiaomi 13 Pro 5G', 29990000.00, 100, 'thumb-xiaomi-13-pro-trang.jpeg, xiaomi-13-pro-trang-1.jpeg, xiaomi-13-pro-trang-2.jpeg, xiaomi-13-pro-trang-3.jpeg, xiaomi-13-pro-trang-4.jpeg  ', 10.00, 0, 0, '2023-03-13 20:48:54', '2023-03-14 15:25:01', 'Sau biết bao thông tin rò rỉ Xiaomi 13 Pro cũng đã chính thức giới thiệu tại thị trường Việt Nam với sự háo hức đến từ các Mi fan trong nước, đây dự kiến sẽ là mẫu điện thoại quốc dân cho năm 2023 bởi máy sở hữu con chip Snapdragon 8 Gen 2 mạnh mẽ cùng với đó là sự cộng tác với nhà Leica để khiến mọi người dùng đam mê nhiếp ảnh mê hoặc.', 4, 14, 'Màn hình: AMOLED6.73\"Quad HD+ (2K+) \r\nHệ điều hành: Android 13 \r\nCamera sau: Chính 50 MP & Phụ 50 MP, 50 MP \r\nCamera trước: 32 MP \r\nChip: Snapdragon 8 Gen 2 8 nhân \r\nRAM: 12 GB \r\nDung lượng lưu trữ: 256 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 5G Pin \r\nSạc: 4820 mAh120 W', 0, 0.0),
(25, 'Xiaomi 12 5G', 11690000.00, 100, 'thumb-xiaomi-mi-12.jpeg, xiaomi-mi-12-1.jpeg, xiaomi-mi-12-2.jpeg, xiaomi-mi-12-3.jpeg, xiaomi-mi-12-4.jpeg      ', 10.00, 0, 0, '2023-03-13 20:50:54', '2023-03-14 15:25:01', 'Điện thoại Xiaomi đang dần khẳng định chỗ đứng của mình trong phân khúc flagship bằng việc ra mắt Xiaomi 12 với bộ thông số ấn tượng, máy có một thiết kế gọn gàng, hiệu năng mạnh mẽ, màn hình hiển thị chi tiết cùng khả năng chụp ảnh sắc nét nhờ trang bị ống kính đến từ Sony.', 4, 14, 'Màn hình: AMOLED6.28\"Full HD+ \r\nHệ điều hành: Android 12 \r\nCamera sau: Chính 50 MP & Phụ 13 MP, 5 MP \r\nCamera trước: 32 MP \r\nChip: Snapdragon 8 Gen 1 \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 256 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 5G Pin\r\nSạc: 4500 mAh67 W', 0, 0.0),
(26, 'Xiaomi 11 Lite 5G NE', 7090000.00, 100, 'thumb-xiaomi-11-lite-5g-ne.jpeg, xiaomi-11-lite-5g-ne-1.jpeg, xiaomi-11-lite-5g-ne-2.jpeg, xiaomi-11-lite-5g-ne-3.jpeg, xiaomi-11-lite-5g-ne-4.jpeg  ', 10.00, 0, 0, '2023-03-13 20:52:54', '2023-03-14 15:25:01', 'Xiaomi 11 Lite 5G NE một phiên bản có ngoại hình rất giống với Xiaomi Mi 11 Lite được ra mắt trước đây. Chiếc smartphone này của Xiaomi mang trong mình một hiệu năng ổn định, thiết kế sang trọng và màn hình lớn đáp ứng tốt các tác vụ hằng ngày của bạn một cách dễ dàng.', 4, 14, 'Màn hình: AMOLED6.55\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 64 MP & Phụ 8 MP, 5 MP \r\nCamera trước: 20 MP \r\nChip: Snapdragon 778G 5G \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 128 GB \r\nSIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ)\r\nHỗ trợ 5G Pin \r\nSạc: 4250 mAh33 W', 0, 0.0),
(27, 'Xiaomi Poco M4 Pro 5G', 3790000.00, 100, 'thumb-poco-m4-pro-5g.jpeg, xiaomi-poco-m4-pro-1.jpeg, xiaomi-poco-m4-pro-2.jpeg, xiaomi-poco-m4-pro-3.jpeg, xiaomi-poco-m4-pro-4.jpeg   ', 10.00, 0, 0, '2023-03-13 20:54:35', '2023-03-14 15:25:01', 'Poco M4 Pro 5G là một trong những chiếc Smartphone tầm trung đang nhận được nhiều sự quan tâm từ người dùng. Sản phẩm không chỉ có diện mạo đẹp mắt, chiếc máy này còn được trang bị nhiều công nghệ ấn tượng.Poco M4 Pro 5G có thiết kế hiện đại, mặt lưng bóng loáng nổi bật, sở hữu màn hình có kích thước khá lớn , được trang bị con chip Dimensity 810 khá mạnh mẽ.\r\n', 4, 15, 'Hệ điều hành: Android 11, MIUI 12.5 Chipset: MediaTek Dimensity 810 5G (6 nm) Độ phân giải: 1080 x 2400 pixels \r\nMàn hình rộng: 6.6 inches \r\nCamera sau: 50MP + 8MP \r\nRAM: 6 GB \r\nBộ nhớ trong ( Rom): 128GB \r\nCamera trước: 16 MP, f/2.5 \r\nDung lượng pin: 5000 mAh', 0, 0.0),
(28, 'Xiaomi Poco F3', 6990000.00, 100, 'thumb-xiaomi-poco-f3.jpeg, xiaomi-poco-f3-1.jpeg, xiaomi-poco-f3-2.jpeg, xiaomi-poco-f3-3.jpeg, xiaomi-poco-f3-4.jpeg      ', 10.00, 0, 1, '2023-03-13 20:56:35', '2023-03-14 15:25:01', 'Xiaomi Poco F3, còn gọi là Poco F3 chính là phiên bản quốc tế được phân phối toàn cầu của mẫu smartphone tầm trung Xiaomi Redmi K40. Máy sở hữu thiết kế rất sang trọng nhiều phá cách, kết hợp với cấu hình - tính năng vô cùng mạnh mẽ: chip Snapdragon 870, màn hình tần số quét 120Hz, kết nối mạng 5G, sạc nhanh 33W...', 4, 15, 'Hệ điều hành: Android 11, MIUI 12 Chipset: Qualcomm SM8250-AC Snapdragon 870 5G (7 nm) \r\nĐộ phân giải: 1080 x 2400 pixels \r\nMàn hình rộng: 6.67 inches \r\nCamera sau: 3 camera: 48MP + 8MP + 5MP \r\nRAM: 8 GB \r\nBộ nhớ trong ( Rom): 256GB \r\nCamera trước: 20 MP, (wide) \r\nDung lượng pin: 4520 mAh', 0, 0.0),
(29, 'Xiaomi POCO X3 Pro', 6790000.00, 100, 'thumb-xiaomi-poco-x3-pro.jpeg, Xiaomi-Poco-X3-Pro-1.jpeg, Xiaomi-Poco-X3-Pro-2.jpeg, Xiaomi-Poco-X3-Pro-3.jpeg, Xiaomi-Poco-X3-Pro-4.jpeg    ', 10.00, 0, 0, '2023-03-13 20:58:35', '2023-03-14 15:25:01', 'Xiaomi POCO X3 Pro 256GB là chiếc smartphone mạnh mẽ nhất, ngoại hình hoàn thiện tinh xảo nhất trong loạt smartphone tầm giá 6 triệu đồng, Màn hình Xiaomi POCO X3 Pro: Nổi bật với tần số 120Hz, Ấn tượng với cụm camera độc đáo, Mạnh mẽ, vượt trội với Snapdragon 860\r\n', 4, 15, 'Hệ điều hành: Android 11, MIUI 12 for POCO \r\nChipset: Snapdragon 860 \r\nĐộ phân giải: 1080 x 2400 pixels \r\nMàn hình rộng: 6.67 inches \r\nCamera sau: 4 camera: 48MP + 8MP + 2MP + 2MP \r\nRAM: 6 GB \r\nBộ nhớ trong ( Rom): 128 GB \r\nCamera trước: 20 MP, f/2.2, (wide), 1/3.4\", 0.8µm \r\nDung lượng pin: 5160 mAh', 0, 0.0),
(30, 'Xiaomi Poco X4 Pro 5G', 5990000.00, 100, 'thumb-xiaomi-poco-x4-pro.jpeg, xiaomi-poco-x4-pro-1.jpeg, xiaomi-poco-x4-pro-2.jpeg, xiaomi-poco-x4-pro-3.jpeg, xiaomi-poco-x4-pro-4.jpeg  ', 10.00, 0, 0, '2023-03-13 21:00:35', '2023-03-14 15:25:01', 'Xiaomi Poco X4 Pro 5G là chiếc smartphone tầm trung vừa được ra mắt trong khuôn khổ MCW 2022 vừa qua. Đây có lẽ là chiếc smartphone giá rẻ sở hữu màn hình OLED tần số quét 120Hz hiếm hoi trong phân khúc. Ngoài ra máy còn sở hữu các thông số cấu hình cực mạnh.', 4, 15, 'Hệ điều hành: Android 11, MIUI 13 for POCO \r\nChipset: Qualcomm SM6375 Snapdragon 695 5G (6 nm) \r\nĐộ phân giải: 1080 x 2400 pixels \r\nMàn hình rộng: 6.67 inches \r\nCamera sau: 108MP + 8MP + 2MP \r\nRAM: 8 GB \r\nBộ nhớ trong ( Rom): 256GB \r\nCamera trước: 16 MP, f/2.4, (wide) \r\nDung lượng pin: 5000 mAh', 0, 0.0),
(31, 'Xiaomi Poco F4', 7590000.00, 100, 'thumb-xiaomi-poco-f4.jpeg, xiaomi-poco-f4-1.jpeg, xiaomi-poco-f4-2.jpeg, xiaomi-poco-f4-3.jpeg, xiaomi-poco-f4-4.jpeg      ', 10.00, 0, 0, '2023-03-13 21:02:35', '2023-03-14 15:25:01', 'Xiaomi Poco F4 - Smartphone tầm trung, cận cao cấp nhận được sự chào đón nồng nhiệt từ người dùng. Với cấu hình mạnh mẽ, màn hình hiển thị rực rỡ, pin khủng và nhiều công nghệ thông minh, đi kèm đó là giá bán khá hợp lý. Xiaomi Poco F4 nhanh chóng trở thành một cái tên khá HOT và được săn đón nhiều!', 4, 15, 'Hệ điều hành: Android 10; MIUI 11 \r\nChipset: Snapdragon 870 \r\nĐộ phân giải: 1080 x 2400 pixels \r\nMàn hình rộng: 6.67 inches \r\nCamera sau: 3 camera: 64MP + 8MP +5MP \r\nRAM: 6 GB \r\nBộ nhớ trong ( Rom): 128 GB \r\nCamera trước: 20MP \r\nDung lượng pin: 4520 mAh', 0, 0.0),
(32, 'Xiaomi Poco X3 GT', 7290000.00, 100, 'thumb-xiaomi-poco-x3-gt.jpeg, xiaomi-poco-x3-gt-1.jpeg, xiaomi-poco-x3-gt-2.png, xiaomi-poco-x3-gt-3.jpeg, xiaomi-poco-x3-gt-4.jpeg           ', 10.00, 0, 0, '2023-03-13 21:05:35', '2023-03-14 15:25:01', 'POCO – thương hiệu con của Xiaomi đã cho ra mắt một mẫu smartphone mới mang tên Xiaomi POCO X3 GT, được biết đây là phiên bản đổi tên của Redmi Note 10 Pro 5G máy có thiết kế nguyên khối, mặt lưng độc đáo với hiệu ứng đổi màu khá đẹp mắt.', 4, 15, 'Màn hình: IPS LCD6.6\"Full HD+ \r\nHệ điều hành: Android 11 \r\nCamera sau: Chính 64 MP & Phụ 8 MP, 2 MP \r\nCamera trước: 16 MP \r\nChip: MediaTek Dimensity 1100 \r\nRAM: 8 GB \r\nDung lượng lưu trữ: 256 GB \r\nSIM: 2 Nano SIM\r\nHỗ trợ 5G Pin, \r\nSạc: 5000 mAh67 W', 0, 0.0),
(44, 'iPhone 14 Pro Max ', 27990000.00, 99, 'thumb-iphone14prm-1.jpg,iphone14prm-2.jpg,iphone14prm-3.jpg,iphone14prm-4.jpg,iphone14prm-5.jpg', 5.00, 0, 1, '2023-03-13 16:16:32', '2023-03-14 18:40:31', 'Mới đây thì chiếc điện thoại iPhone 14 Pro Max 256GB cũng đã được chính thức lộ diện trên toàn cầu và đập tan bao lời đồn đoán bấy lâu nay, bên trong máy sẽ được trang bị con chip hiệu năng khủng cùng sự nâng cấp về camera đến từ nhà Apple.\r\nDiện mạo đẳng cấp dẫn đầu xu thế\r\nTrang bị cụm 3 camera chất lượng\r\nTrải nghiệm nội dung sinh động trên một màn hình chất lượng\r\nNâng cao khả năng xử lý nhờ chipset khủng', 2, 4, 'Màn hình: OLED6.7\" Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: Chính 48 MP & Phụ 12 MP, 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A16 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 256 GB\r\nSIM: 1 Nano SIM & 1 eSIM Hỗ trợ 5G\r\nPin, Sạc: 4323 mAh 20 W', 0, 0.0),
(45, 'iPhone 14 Pro ', 25990000.00, 100, 'thumb-iphone14pr-1.jpg,iphone14pr-2.jpg,iphone14pr-3.jpg,iphone14pr-4.jpg,iphone14pr-5.jpg', 5.00, 0, 3, '2023-03-13 16:16:32', '2023-03-14 18:40:31', 'Mới đây thì chiếc điện thoại iPhone 14 Pro cũng đã được chính thức lộ diện trên toàn cầu và đập tan bao lời đồn đoán bấy lâu nay, bên trong máy sẽ được trang bị con chip hiệu năng khủng cùng sự nâng cấp về camera đến từ nhà Apple.\r\nDiện mạo đẳng cấp dẫn đầu xu thế\r\nTrang bị cụm 3 camera chất lượng\r\nTrải nghiệm nội dung sinh động trên một màn hình chất lượng\r\nNâng cao khả năng xử lý nhờ chipset khủng', 2, 4, 'Màn hình: OLED6.1 \"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: Chính 48 MP & Phụ 12 MP, 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A16 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 256 GB\r\nSIM: 1 Nano SIM & 1 eSIM Hỗ trợ 5G\r\nPin, Sạc: 3200 mAh 20 W', 0, 0.0),
(46, 'iPhone 14 Plus', 17990000.00, 100, 'thumb-iphone14plus-1.jpg,iphone14plus-2.jpg,iphone14plus-3.jpg,iphone14plus-4.jpg,iphone14plus-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Sau nhiều thế hệ điện thoại của Apple thì cái tên “Plus” cũng đã chính thức trở lại vào năm 2022 và xuất hiện trên chiếc iPhone 14 Plus 128GB, nổi trội với ngoại hình bắt trend cùng màn hình kích thước lớn để đem đến không gian hiển thị tốt hơn cùng cấu hình mạnh mẽ không đổi so với bản tiêu chuẩn.\r\nThân hình thanh mảnh cùng ngoại hình góc cạnh\r\nMàn hình OLED tái hiện nội dung sinh động\r\nDễ dàng bắt trọn mọi khoảnh khắc\r\nHiệu năng cực khủng với Apple A15 Bionic', 2, 4, 'Màn hình: OLED6.7\" Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 4325 mAh20 W', 0, 0.0),
(47, 'iPhone 14 ', 15990000.00, 100, 'thumb-iphone14-1.jpg,iphone14-2.jpg,iphone14-3.jpg,iphone14-4.jpg,iphone14-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Mới đây thì tại sự kiện ra mắt sản phẩm mới thường niên đến từ nhà Apple thì chiếc điện thoại iPhone 14 256GB cũng đã chính thức lộ diện, thiết bị được nâng cấp toàn diện từ camera cho đến hiệu năng và hầu hết là những thông số hàng đầu trong giới smartphone. \r\nĐẳng cấp thiết kế dẫn đầu xu thế\r\nTrang bị công nghệ màn hình tân tiến\r\nHỗ trợ chụp ảnh quay phim chuẩn điện ảnh\r\nVi xử lý mạnh mẽ đến từ nhà Apple', 2, 4, 'Màn hình: OLED6.1\"Super Retina XDR\r\nHệ điều hành: iOS 16\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 256 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3279 mAh 20 W', 0, 0.0),
(48, 'iPhone 13 Pro Max', 24990000.00, 100, 'thumb-iphone13prm-1.jpg,iphone13prm-2.jpg,iphone13prm-3.jpg,iphone13prm-4.jpg,iphone13prm-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'iPhone 13 Pro Max thuộc phân khúc điện thoại cao cấp mà không một iFan nào có thể bỏ qua, với màn hình lớn sắc nét, cấu hình vượt trội, dung lượng lưu trữ \"khủng\", thời gian sử dụng dài, mỗi lần trải nghiệm đều cho bạn cảm giác thỏa mãn đáng ngạc nhiên.\r\nApple A15 Bionic - cấu hình đột phá\r\nTải xuống siêu nhanh cùng mạng 5G\r\nXem nội dung nhiều hơn, rõ nét hơn với màn hình lớn\r\nNâng cấp hệ thống camera \r\nVẻ ngoài sang trọng đặc trưng\r\nDung lượng pin đáp ứng đến 95 giờ nghe nhạc', 2, 5, 'Màn hình: OLED6.7\" Super Retina XDR\r\nHệ điều hành: iOS 15\r\nCamera sau: 3 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 1 TB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 4352 mAh 20 W', 0, 0.0),
(49, 'iPhone 13 Pro', 20990000.00, 100, 'thumb-iphone13pro-1.jpg,iphone13pro-2.jpg,iphone13pro-3.jpg,iphone13pro-4.jpg,iphone13pro-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Cùng trải nghiệm một phiên bản iPhone có bộ nhớ trong lớn nhất từ trước đến nay, \r\ntương tự với các phiên bản khác máy vẫn có một màn hình siêu đẹp cùng hiệu năng vô cùng mạnh mẽ đó chính là iPhone 13 Pro .\r\nHiệu năng tuyệt vời nhờ chip thế hệ mới\r\nKhung hình rực rỡ, tần số quét màn hình 120 Hz\r\nCụm camera thách thức khả năng sáng tạo của bạn\r\nThiết kế sang chảnh, đa sắc màu lựa chọn\r\nCải thiện thời lượng pin thêm 2.5 giờ sử dụng', 2, 5, 'Màn hình: OLED6.1\" Super Retina XDR\r\nHệ điều hành: iOS 15\r\nCamera sau: 3 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nDung lượng lưu trữ: 1 TB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3095 mAh20 W', 0, 0.0),
(50, 'iPhone 13 Mini', 15990000.00, 100, 'thumb-iphone13mini-1.jpg,iphone13mini-2.jpg,iphone13mini-3.jpg,iphone13mini-4.jpg,iphone13mini-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Đánh giá iPhone 13 mini – Phiên bản thu nhỏ hoàn hảo của iPhone 13\r\nTương tự như iPhone 12 Series, iPhone 13 cũng sẽ được trang bị một phiên bản thu nhỏ mang tên iPhone 13 mini. Mẫu iPhone nhỏ gọn với nhiều cải tiến so với iPhone 12 mini tiền nhiệm.\r\nThiết kế nhỏ gọn, khung viền vuông vắn\r\nMàn hình Super Retina XDR\r\nHiệu năng nâng cấp với chip Apple A15 Bionic\r\nDung lượng pin được cải thiện, hỗ trợ sạc nhanh\r\nCamera cảm biến nâng cấp', 2, 5, 'Kích thước màn hình 5.4 inches\r\nCông nghệ màn hình OLED\r\nCamera sau Camera góc rộng: 12MP, f/1.6\r\nCamera góc siêu rộng: 12MP, ƒ/2.4\r\nCamera trước 12MP, f/2.2\r\nChipset Apple A15\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 128 GB\r\nPin 2406mAh\r\nThẻ SIM 2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành iOS15\r\nĐộ phân giải màn hình 1080 x 2340 pixels (FullHD+)', 0, 0.0),
(51, 'iPhone 13 ', 16990000.00, 100, 'thumb-iphone13-1.jpg,iphone13-2.jpg,iphone13-3.jpg,iphone13-4.jpg,iphone13-5.jpg', 5.00, 0, 0, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Apple thỏa mãn sự chờ đón của iFan và người dùng với sự ra mắt của iPhone 13. Dù ngoại hình không có nhiều thay đổi so với iPhone 12 nhưng với cấu hình mạnh mẽ hơn, đặc biệt pin “trâu” hơn và khả năng quay phim chụp ảnh cũng ấn tượng hơn, hứa hẹn mang đến những trải nghiệm thú vị trên phiên bản mới này.\r\nHiệu năng đột phá cùng bộ xử lý Apple A15 Bionic\r\nMàn hình Super Retina XDR sắc nét, siêu sáng\r\nHệ thống camera xuất sắc\r\n“Áo” mới tinh tế hơn\r\nPin khỏe hơn, trải nghiệm tốt hơn', 2, 5, 'Màn hình: OLED6.1\"Super Retina XDR\r\nHệ điều hành: iOS 15\r\nCamera sau: 2 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 4 GB\r\nDung lượng lưu trữ: 256 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc: 3240 mAh20 W', 0, 0.0),
(52, 'iPhone 12 Pro Max', 18990000.00, 86, 'thumb-iphone12prm-2.jpg,iphone12prm-1.jpg,iphone12prm-3.jpg,iphone12prm-4.jpg,iphone12prm-5.jpg', 5.00, 0, 6, '2023-03-13 16:19:19', '2023-03-14 18:40:31', 'Điện thoại iPhone 12 Pro Max: Nâng tầm đẳng cấp sử dụng\r\nCứ mỗi năm, đến dạo cuối tháng 8 và gần đầu tháng 9 thì mọi thông tin sôi sục mới về chiếc iPhone mới lại xuất hiện. Apple năm nay lại ra thêm một chiếc iPhone mới với tên gọi mới là iPhone 12 Pro Max, đây là một dòng điện thoại mới và mạnh mẽ nhất của nhà Apple năm nay. Mời bạn tham khảo thêm một số mô tả sản phẩm bên dưới để bạn có thể ra quyết định mua sắm.\r\nMàn hình 6.7 inches Super Retina XDR\r\nRAM 6GB đa nhiệm thoải mái, bộ nhớ trong dung lượng lớn\r\nCon chip Apple A14 SoC 5nm, RAM 6GB mạnh mẽ\r\nCụm 3 camera sau với độ phân giải 12MP  \r\nCamera trước 12MP hỗ trợ mở FaceiD cùng công nghệ chống nước IP68\r\nViên pin liền cho thời lượng sử dụng lên đến cả ngày cùng công nghệ sạc nhanh ', 2, 6, 'Kích thước màn hình 6.7 inches\r\nCông nghệ màn hình OLED\r\nCamera sau Camera chính: 12 MP, f/1.6, 26mm, 1.4µm, dual pixel PDAF, OIS\r\nCamera tele: 12 MP, f/2.0, 52mm, 1/3.4\", 1.0µm, PDAF, OIS, 2x optical zoom\r\nCamera góc siêu rộng: 12 MP, f/2.4, 120˚, 13mm, 1/3.6\"\r\nCảm biến: TOF 3D LiDAR scanner\r\nCamera trước 12 MP, f/2.2, 23mm (wide), 1/3.6\"\r\nSL 3D, (depth/biometrics sensor)\r\nChipset Apple A14 Bionic (5 nm)\r\nCông nghệ màn hình Super Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone\r\nDung lượng RAM 6 GB\r\nBộ nhớ trong 128 GB\r\nPin Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Power Delivery 2.0\r\nThẻ SIM 2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)', 0, 0.0),
(53, 'iPhone 12 Pro ', 14990000.00, 97, 'thumb-iphone12pro-1.jpg,iphone12pro-2.jpg,iphone12pro-3.jpg,iphone12pro-4.jpg,iphone12pro-5.jpg', 5.00, 0, 4, '2023-03-13 16:19:19', '2023-03-14 18:40:31', '\"Điện thoại iPhone 12 Pro chính hãng (vn/a) – Dung lượng bộ nhớ trong lớn\r\nMẫu iPhone 2020 mới nhất của Apple được thiết kế khung viền vuông sang trọng được nhiều người dùng yêu thích. Trong đó, phiên bản iPhone 12 Pro chính hãng VNA hứa hẹn là một trong những sự lựa chọn lý tưởng.\r\nThiết kế sang trọng, phiên bản VNA chính hãng Việt Nam\"', 2, 6, '\"Công nghệ màn hình Super Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone\r\nKích thước màn hình 6.1 inches\r\nCông nghệ màn hình OLED\r\nCamera sau 12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS\r\n12 MP, f/2.0, 52mm (telephoto), 1/3.4\"\", 1.0µm, PDAF, OIS, 2x optical zoom\r\n12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\"\"\r\nTOF 3D LiDAR scanner (depth)\r\nCamera trước 12 MP, f/2.2, 23mm (wide), 1/3.6\"\"\r\nSL 3D, (depth/biometrics sensor)\r\nChipset Apple A14 Bionic (5 nm)\r\nDung lượng RAM 6 GB\r\nBộ nhớ trong 256 GB\r\nPin Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Power Delivery 2.0\r\nThẻ SIM 2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)\"', 0, 0.0),
(54, 'iPhone 12 Mini', 10990000.00, 85, 'iphone12mini5.jpg,thumb-iphone12mini1.jpg,iphone12mini2.jpg,iphone12mini3.jpg,iphone12mini4.jpg', 5.00, 0, 5, '2023-03-13 16:19:19', '2023-03-14 18:40:31', '\"Đánh giá iPhone 12 Mini - Kích thước nhỏ gọn, hiệu năng đỉnh cao\r\niPhone 12 series hiện nay đang là thế hệ smartphone hiện đại nhất của Apple, vẻ đẹp từ thiết kế, và sức hấp dẫn của các tính năng hiện đại mà dòng máy này sở hữu khiến người dùng công nghệ toàn cầu ‘đứng ngồi không yên”. iPhone 12 Mini tuy là phiên bản thấp nhất, nhưng chiếc smartphone này vẫn sở hữu những ưu điểm vượt trội về sự tiện lợi, linh động khi sử dụng và tính năng sạc nhanh cùng camera chất lượng cao.\r\nViền máy vát phẳng cùng màn hình tai thỏ 5.4 inch\r\nCụm camera 12MP cho khả năng chụp hình sắc nét\r\nTrang bị chip Apple A14 và RAM 4GB, bộ nhớ trong 64GB\r\nPin lithium-ion hỗ trợ sạc nhanh 20W, kể cả sạc không dây\"', 2, 6, '\"Công nghệ màn hình Super Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone\r\nKích thước màn hình 5.4 inches\r\nCông nghệ màn hình OLED\r\nCamera sau 12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS\r\n12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\"\"\r\nCamera trước 12 MP, f/2.2, 23mm (wide), 1/3.6\"\"\r\nSL 3D, (depth/biometrics sensor)\r\nChipset Apple A14 Bionic (5 nm)\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 64 GB\r\nPin Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Power Delivery 2.0\r\nThẻ SIM 2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)\r\nĐộ phân giải màn hình 1080 x 2340 pixels (FullHD+)\"', 0, 0.0),
(55, 'iPhone 12', 12990000.00, 100, 'thumb-iphone12-2.jpg,iphone12-1.jpg,iphone12-3.jpg,iphone12-4.jpg,iphone12-5.jpg', 5.00, 0, 1, '2023-03-13 16:19:19', '2023-03-14 18:40:31', '\"Apple iPhone 12 128GB chính hãng (VN/A) phiên bản bộ nhớ 128GB lưu trữ thoải mái\r\niPhone 12 hiện nay là cái tên “sốt xình xịch” bởi đây là một trong 4 siêu phẩm vừa được ra mắt của Apple với những đột phá về cả thiết kế lẫn cấu hình. Phiên bản Apple iPhone 12 128GB chính là một trong những chiếc iPhone được săn đón nhất bởi dung lượng bộ nhớ khủng, cho phép bạn thoải mái với vô vàn ứng dụng.\r\nDung lượng bộ nhớ trong lên đến 128GB và chip Apple A14 độc quyền\r\nThiết kế độc đáo với viền vát phẳng mạnh mẽ và hỗ trợ sạc nhanh 20W\"', 2, 6, '\"Kích thước màn hình 6.1 inches\r\nCông nghệ màn hình OLED\r\nCamera sau 12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS 12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\"\"\r\nCamera trước 12 MP, f/2.2, 23mm (wide), 1/3.6\"\" SL 3D, (depth/biometrics sensor)\r\nChipset Apple A14 Bionic (5 nm)\r\nCông nghệ màn hình Super Retina XDR OLED, HDR10, Dolby Vision, Wide color gamut, True-tone\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 128 GB\r\nPin Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Power Delivery 2.0\r\nThẻ SIM 2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)\r\nĐộ phân giải màn hình 1170 x 2532 pixels\"', 0, 0.0),
(56, 'iPhone 11 Pro Max', 11990000.00, 99, 'iphone11prm4.png,iphone11prm3.jpg,iphone11prm2.png,thumb-iphone11prm1.png', 5.00, 0, 0, '2023-03-13 16:35:00', '2023-03-14 18:40:31', '\"Điện thoại iPhone 11 Pro Max: Nâng tầm đẳng cấp sử dụng\r\nCứ mỗi năm, đến dạo cuối tháng 8 và gần đầu tháng 9 thì mọi thông tin sôi sục mới về chiếc iPhone mới lại xuất hiện. Apple năm nay lại ra thêm một chiếc iPhone mới với tên gọi mới là iPhone 11 Pro Max, đây là một dòng điện thoại mới và mạnh mẽ nhất của nhà Apple năm nay. Mời bạn tham khảo thêm một số mô tả sản phẩm bên dưới để bạn có thể ra quyết định mua sắm.\r\nMàn hình 6.5 inches Super Retina XDR\r\nRAM 6GB đa nhiệm thoải mái, bộ nhớ trong dung lượng lớn\r\nCon chip Apple A12 SoC 5nm, RAM 6GB mạnh mẽ\r\nCụm 3 camera sau với độ phân giải 12MP  \r\nCamera trước 12MP hỗ trợ mở FaceiD cùng công nghệ chống nước IP68\r\nViên pin liền cho thời lượng sử dụng lên đến cả ngày cùng công nghệ sạc nhanh \"', 2, 7, '\"Công nghệ màn hình Super Retina XDR\r\nKích thước màn hình 6.5 inches\r\nCamera sau\r\n3 Camera 12MP:\r\n- Camera tele: ƒ/2.0 aperture\r\n- Camera góc rộng: ƒ/1.8 aperture\r\n- Camera siêu rộng: ƒ/2.4 aperture\r\nCamera trước 12 MP ƒ/2.2 aperture\r\nChipset A13 Bionic\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 256 GB\r\nPin 3969 mAh\r\nThẻ SIM Nano-SIM + eSIM\r\nHệ điều hành iOS 13 hoặc cao hơn (Tùy vào phiên bản phát hành)\r\nĐộ phân giải màn hình 2688 x 1242 pixels\"', 0, 0.0),
(57, 'iPhone 11 Pro ', 9990000.00, 99, 'iphone11pro4.png,thumb-iphone11pro1.png,iphone11pro2.png,iphone11pro3.png', 5.00, 0, 0, '2023-03-13 16:35:00', '2023-03-14 18:40:31', '\"Điện thoại iPhone 11 Pro chính hãng (vn/a) – Dung lượng bộ nhớ trong lớn\r\nMẫu iPhone 2019 mới nhất của Apple được thiết kế khung viền vuông sang trọng được nhiều người dùng yêu thích. Trong đó, phiên bản iPhone 11 Pro chính hãng VNA hứa hẹn là một trong những sự lựa chọn lý tưởng.\r\nThiết kế sang trọng, phiên bản VNA chính hãng Việt Nam\"', 2, 7, '\"Kích thước màn hình 5.8 inches\r\nCamera sau 3 Camera 12MP:\r\n- Camera tele: ƒ/2.0 aperture\r\n- Camera góc rộng: ƒ/1.8 aperture\r\n- Camera siêu rộng: ƒ/2.4 aperture\r\nCamera trước 12 MP ƒ/2.2 aperture\r\nChipset A13 Bionic\r\nCông nghệ màn hình Super Retina XDR\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 64 GB\r\nPin 3046 mAh\r\nThẻ SIM Nano-SIM + eSIM\r\nHệ điều hành iOS 13 hoặc cao hơn (Tùy vào phiên bản phát hành)\"', 0, 0.0),
(58, 'iPhone 11', 7490000.00, 100, 'thumb-iphone11-1.jpg,iphone11-2.jpg,iphone11-3.jpg,iphone11-4.jpg,iphone11-5.jpg', 5.00, 0, 0, '2023-03-13 16:35:00', '2023-03-14 18:40:31', '\"Apple iPhone 11 128GB chính hãng (VN/A) phiên bản bộ nhớ 128GB lưu trữ thoải mái\r\niPhone 11 hiện nay là cái tên “sốt xình xịch” bởi đây là một trong 4 siêu phẩm vừa được ra mắt của Apple với những đột phá về cả thiết kế lẫn cấu hình. Phiên bản Apple iPhone 11 128GB chính là một trong những chiếc iPhone được săn đón nhất bởi dung lượng bộ nhớ khủng, cho phép bạn thoải mái với vô vàn ứng dụng.\r\nDung lượng bộ nhớ trong lên đến 128GB và chip Apple A13 độc quyền\r\nThiết kế độc đáo với viền vát phẳng mạnh mẽ và hỗ trợ sạc nhanh 20W\"', 2, 7, '\"Kích thước màn hình 6.1 inches\r\nCông nghệ màn hình IPS LCD\r\nCamera sau Camera kép 12MP:\r\n- Camera góc rộng: ƒ/1.8 aperture\r\n- Camera siêu rộng: ƒ/2.4 aperture\r\nCamera trước 12 MP, ƒ/2.2 aperture\r\nChipset A13 Bionic\r\nCông nghệ màn hình IPS LCD\r\nDung lượng RAM 4 GB\r\nBộ nhớ trong 128 GB\r\nPin 3110 mAh\r\nThẻ SIM Nano-SIM + eSIM\r\nHệ điều hành iOS 13 hoặc cao hơn (Tùy vào phiên bản phát hành)\"', 0, 0.0),
(59, 'iPhone XS Max', 7990000.00, 100, 'iphonexsm4.jpg,iphonexsm1.jpg,iphonexsm2.jpg,thumb-iphonexsm.jpg,iphonexsm3.jpg', 5.00, 0, 1, '2023-03-13 16:35:00', '2023-03-14 18:40:31', '\"Apple iPhone XS Max\r\nSau kỷ niệm 10 năm bằng cách ra mắt iPhone X, nhiều người tự hỏi sau đó, Apple sẽ làm gì. Apple đã giải đáp thắc mắc này bằng cách ra mắt ba sản phẩm smartphone cao cấp mới của mình. Trong đó, Apple iPhone XS Max  xứng tầm là chiếc smartphone cao cấp nhất hiện nay. Bạn có thể tham khảo thêm iPhone XS Max 512GB chính hãng VN/A để được bảo hành 12 tháng tại Việt Nam.\r\nThiết kế Apple iPhone XS Max sang trọng, đẳng cấp\r\nMàn hình Apple iPhone XS Max đỉnh cao về màu sắc\r\nHiệu năng Apple iPhone XS Max hàng đầu\"', 2, 8, '\"Công nghệ màn hình Super Retina OLED\r\nKích thước màn hình 6.5 inches\r\nCamera sau 12 MP\r\nCamera trước 7 MP\r\nChipset Apple A12 Bionic 6 nhân\r\nBộ nhớ trong 512 GB\r\nPin Li-ion\r\nThẻ SIM Nano-SIM\r\nHệ điều hành 12\r\nĐộ phân giải màn hình 1242 x 2688 pixel\"', 0, 0.0),
(67, 'Samsung Galaxy A04s', 3590000.00, 0, 'a04-1.jpg,a04-2.png,a04-3.png,a04-4.png,thumb-anhchinh1.jpg', 5.00, 0, 1, '2023-03-17 13:15:06', '2023-03-17 13:59:48', 'Samsung A04s (4GB/64GB) là điện thoại mới phân khúc giá rẻ, sở hữu chip 8 nhân Exynos 850, khả năng đa nhiệm, lưu trữ ổn định, chụp ảnh đẹp. Thêm vào đó, màn hình LCD 6.5 inch có độ phân giải HD+ và tần số quét 90Hz cho trải nghiệm hình ảnh sắc nét, rõ ràng.\r\nNgoại hình Samsung Galaxy A04s năng động, linh hoạt cùng màn hình 6.5 inch HD+\r\nHệ thống camera Samsung A04s ba ống kính chụp ảnh nổi bật\r\n', 3, 11, '\"- Kích thước màn hình: 6.5 inches\r\n- Công nghệ màn hình: IPS LCD\r\n- Camera sau:\r\n+ Camera chính: 50MP, f/1.8\r\n+ Camera Macro: 2MP, f/2.8\r\n+ Camera góc sâu: 2MP, f/2.4\r\n- Camera trước: 5 MP, f/2.2\r\n- Chipset: Exynos 850 8 nhân\r\n- RAM: 4GB\r\n- ROM: 64GB\r\n- Pin: 5,000mAh\r\n- Hệ điều hành: Android 12 One UI\r\n- Độ phân giải màn hình: 1366 x 768 pixels (HD+)\r\n- Tính năng màn hình: Tần số quét 90 Hz, Kính cường lực Corning Gorilla Glass 3\"', 0, 0.0);
INSERT INTO `tbl_sanpham` (`masanpham`, `tensp`, `don_gia`, `ton_kho`, `images`, `giam_gia`, `dac_biet`, `so_luot_xem`, `ngay_nhap`, `date_modified`, `mo_ta`, `ma_danhmuc`, `id_dmphu`, `information`, `promote`, `danhgia`) VALUES
(68, 'Samsung Galaxy A13 (4G 128GB) ', 3490000.00, 100, 'a13-1.jpg,a13-2.png,a13-3.png,a13-4.png,thumb-anhchinh2.jpg', 5.00, 0, 1, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Thảo sức tận hưởng thế giới giải trí sống động - Màn hình TFT LCD, 6.6 inch\r\nHiệu năng ổn định, ấn tượng - Chip Exynos 850 mạnh mẽ, xử lí tốt mọi tác vụ\r\nCamera nâng cấp với nhiều tính năng độc đáo - Cụm 4 camera 50MP, 5MP, 2MP và 2MP\r\nThoải mái trải nghiệm với pin dung lượng 5000 mAh, sạc nhanh 15W', 3, 11, '\"- Kích thước màn hình: 6.6 inches\r\n- Công nghệ màn hình: IPS LCD\r\n- Camera sau: 50MP + 5MP + 2MP + 2MP\r\n- Camera trước: 8 MP\r\n- Chipset: Exynos 850 8 nhân\r\n- RAM: 4GB\r\n- ROM: 128GB\r\n- Pin: Li-po 5,000mAh\r\n- Hệ điều hành: Android 12\r\n- Độ phân giải màn hình: 1080 x 2408 pixels\r\n\"', 0, 0.0),
(69, 'Samsung Galaxy A14 ', 4990000.00, 100, 'a14-1.png,a14-2.png,a14-3.png,a14-4.png,thumb-anhchinh3.png', 5.00, 0, 1, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Giải trí cực đã - Màn hình 6.6\"\" FullHD, tần số quét 90Hz hệ thống loa vòm Dolby Atmos\r\nKết nối nhanh, mượt mà - Dòng sản phẩm hiếm có hỗ trợ 5G trong tầm giá, đi kèm chip Dimensity 700\r\nCamera chụp ảnh đã chế độ - Camera 50MP, chụp toàn cảnh, chụp cận cảnh, chụp xoá phông\r\nSử dụng đến 2.5 ngày - Với Pin 5000mAh, sạc nhanh 15W\r\n', 3, 11, '\"- Kích thước màn hình: 6.5 inches\r\n- Công nghệ màn hình: IPS LCD\r\n- Camera sau:\r\n+ Camera góc rộng: 50MP, f/1.8, 26mm, PDAF\r\n+ Camera macro: 2MP, f/2.4\r\n+ Camera đo độ sâu: 2MP, f/2.4\r\n- Camera trước: 13MP\r\n- Chipset: MediaTek Dimensity 700\r\n- RAM: 4GB\r\n- ROM: 128GB\r\n- Pin: 5,000mAh\r\n- Hệ điều hành: Android 13\r\n- Độ phân giải màn hình: 720 x 1600 pixel\r\n- Tính năng màn hình: Tần số quét 90 Hz\"', 0, 0.0),
(70, 'Samsung Galaxy A23 (4GB 128GB)', 7290000.00, 97, 'a23-1.jpg,a23-2.png,a23-3.png,a23-4.png,thumb-anhchinh4.jpg', 5.00, 0, 1, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Samsung Galaxy A23 gây ấn tượng ban đầu với người dùng nhờ sở hữu ngoại hình đơn giản nhưng vẫn bắt mắt với đa dạng các màu sắc khác nhau. Chiếc smartphone này luôn nằm trong danh sách các dòng điện thoại dưới 5 triệu đáng mua nhất nhờ sở hữu hiệu năng mạnh mẽ, đa dạng các chế độ chụp ảnh, thời lượng sử dụng lâu dài,...\r\n\r\nNăm 2023, Samsung cho ra mắt điện thoại Samsung Galaxy A24 mà quý khách có thể quan tâm!', 3, 11, '\"- Kích thước màn hình: 6.6 inches\r\n- Công nghệ màn hình: TFT LCD\r\n- Camera sau: 50MP + 5MP + 2MP + 2MP\r\n- Camera trước: 8 MP\r\n- Chipset: Snapdragon 680 (SM6225)\r\n- RAM: 4GB\r\n- ROM: 128GB\r\n- Pin: 5,000mAh\r\n- Hệ điều hành: Android 11\r\n- Tính năng màn hình: 1080 pixels FHD+, 90 Hz, Kính cường lực Corning Gorilla Glass 5\"', 0, 0.0),
(71, 'Samsung Galaxy A33 (5G)', 7290000.00, 100, 'a33-1.jpg,a33-2.png,a33-3.png,a33-4.png,thumb-anhchinh5.jpg', 5.00, 0, 0, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Ngay sau khi ra mắt không lâu, điện thoại Galaxy A33 chính hãng đã mặt tại thị trường Việt Nam với giá bán niêm yết là 8.49 triệu đồng. Với mức giá này, sản phẩm sẽ cạnh tranh với các đối thủ như OPPO Reno6 Z 5G, Xiaomi Redmi Note 11 Pro Plus 5G...\r\n\r\nBạn cũng có thể truy cập ngay trang web hoặc đến các cửa hàng của CellphoneS để trải nghiệm. Tại đây, mức giá của Samsung A33 đang vô cùng hấp dẫn cùng nhiều chương trình ưu đãi dành do khách hàng.\r\n\r\nNăm 2023, Samsung ra mắt Samsung Galaxy A34 với nhiều cải tiến như màn hình Super AMOLED 6.6 inch, tần số quét 120Hz, độ sáng lên đến 1.000 nits, pin 5.000mAh với camera sắc nét tích hợp công nghệ chống rung OIS. Mời bạn tham khảo thêm!', 3, 11, '\"- Kích thước màn hình: 6.4 inches\r\n- Công nghệ màn hình: Super AMOLED\r\n- Camera sau:\r\n+ Camera chính: 48 MP, F1.8\r\n+ Camera góc siêu rộng: 8 MP, F2.2\r\n+ Camera macro: 5 MP, F2.4\r\n+ Camera chân dung: 2.0 MP, F2.4\r\n- Camera trước: 13 MP, f/2.2\r\n- Chipset: Vi xử lý 8 nhân Exynos 1280\r\n- RAM: 6GB\r\n- ROM: 128GB\r\n- Pin: 5,000mAh\r\n- Hệ điều hành: Android 12\r\n- Tính năng màn hình: Tần số quét 90 Hz, Kính cường lực Corning Gorilla Glass 5\"', 0, 0.0),
(72, 'Samsung Galaxy A52', 9290000.00, 100, 'a52-1.jpg,a52-2.jpg,a52-3.jpg,a52-4.jpg,thumb-anhchinh6.jpg', 5.00, 0, 0, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Điện thoại Samsung Galaxy A52 – Camera sau nâng cấp, cấu hình mạnh mẽ\r\nSau thành công của Samsung Galaxy A51 với mức doanh số khá tốt thì trong năm 2020, Samsung lại tiếp tục cho ra mắt mẫu smartphone Galaxy A52 với những cải tiến về hệ thống camera cũng như được trang bị cấu hình mạnh mẽ cho trải nghiệm tuyệt vời.\r\n\r\nNgoài ra, bạn cũng có thể tham khảo thêm điện thoại Samsung Galaxy A52s với nhiều nâng cấp về cấu hình và camera.\r\n\r\nThiết kế sang trọng, tinh tế với các màu sắc thời trang', 3, 11, '\"- Kích thước màn hình: 6.5 inches\r\n- Công nghệ màn hình: Super AMOLED\r\n- Camera sau:\r\n+ Camera góc rộng: 64 MP, f/1.8, 26mm, PDAF, OIS\r\n+ Camera góc siêu rộng: 12 MP, f/2.2, 123˚\r\n+Camera cận cảnh: 5 MP, f/2.4\r\n+ Cảm biến chiều sâu: 5 MP, f/2.2\r\n- Camera trước: 32 MP, f/2.2, 26mm, 1/2.8\"\", 0.8µm\r\n- Chipset: Snapdragon 720G (8 nm)\r\n- RAM: 8GB\r\n- ROM: 128GB\r\n- Pin: Li-Po 4500 mAh\r\n- Cảm biến: Cảm biến vân tay, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển\r\n- Tính năng màn hình: Tần số quét 90Hz, độ sáng tối đa 800 nits\"', 0, 0.0),
(73, 'Samsung Galaxy A73 (5G)', 10290000.00, 98, 'a73-1.jpg,a73-2.jpg,a73-3.png,a73-4.png,thumb-anhchinh7.jpg', 5.00, 0, 0, '2023-03-17 13:26:50', '2023-03-17 13:59:48', '5G thần tốc: mang cho bạn trải nghiệm đỉnh cao với tốc độ kết nối mạnh mẽ. Bạn có thể thoải mái tận hưởng và chia sẻ tức thì mọi nội dung giải trí cũng như kết nối với mọi người một cách nhanh chóng.\r\nKhả năng đa nhiệm được tối ưu: Được trang bị Snapdragon® 778G 5G, Galaxy A73 5G thay đổi hoàn toàn nâng tầm thói quen đa nhiệm với khả năng chơi game chuyên nghiệp. AI được tăng tốc để có hiệu suất thông minh hơn và trải nghiệm chụp ảnh cao cấp. Ngoài ra, khi bạn cần nhiều bộ nhớ hơn, RAM Plus  của A73 ngay lập tức cung cấp thêm RAM ảo.\r\nThoải mái lưu giữ mọi khoảnh khắc: Bạn có thể lưu giữ những khoảnh khắc quý giá của mình nhiều hơn nhờ bộ nhớ trong 128GB/256GB.\r\nMàn hình sắc nét: Công nghệ FHD+ Super AMOLED Plus với Màn hình Infinity-O 6,7\" mở rộng, các khung hình được chụp bằng máy ảnh Góc rộng 108MP giữ trọn vẹn các chi tiết sống động như thật. Người dùng có thể tận hưởng khả năng hiển thị ngoài trời sống động lên đến 800 nits¹ hoặc bảo vệ mắt tối ưu với chức năng giảm ánh sáng xanh Eye Comfort Shield². Bạn có thể thoả thích xem mọi nội dung nhờ tần số quét 120Hz công nghệ Super AMOLED Plus để tận hưởng những khung hình mượt mà, không mờ nhoè, siêu chi tiết và độ tương phản sắc nét.', 3, 11, '\"- Kích thước màn hình: 6.7 inches\r\n- Công nghệ màn hình: Super AMOLED\r\n- Camera sau:\r\n+ Camera chính: 108 MP, f/1.8, PDAF, OIS\r\n+ Camera gó siêu rộng: 12 MP, f/2.2\r\n+ Camera macro: 5 MP, f/2.4\r\n+ Camera chân dung: 5 MP, f/2.4\r\n- Camera trước: 32 MP, f/2.2\r\n- Chipset: Snapdragon 778G 5G 8 nhân\r\n- RAM: 8GB\r\n- ROM: 256GB\r\n- Pin: 5,000mAh\r\n- Hệ điều hành: Android 12 One UI 4.1\r\n- Độ phân giải màn hình: 1080 x 2400 pixels (FullHD+)\r\n- Tính năng màn hình: Tần số quét 120 Hz, Kính cường lực Corning Gorilla Glass 5\"', 0, 0.0),
(74, 'Samsung Galaxy M32', 4550000.00, 100, 'm32-1.jpg,m32-2.png,m32-3.png,m32-4.png,thumb-anhchinh8.jpg', 5.00, 0, 0, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Điện thoại Samsung M32 là mẫu điện thoại Samsung thuộc phân khúc giá rẻ mới được ra mắt trên thị trường. Điện thoại Samsung M32 là sản phẩm thuộc series Samsung M được kế thừa nhiều ưu điểm từ dòng Samsung A. Điện thoại được trang bị màn hình 6,4 inch Infinity-U với độ phân giải  FHD+ mang lại khả năng hiển thị ấn tượng. Bên cạnh đó là một hiệu năng ổn định với chip MediaTek Helio G80, bộ nhớ RAM 8GB, dung lượng pin 5000 mAh.\r\n\r\nĐánh giá điện thoại Samsung Galaxy M32 – điện thoại Samsung giá rẻ\r\nMới đây Samsung tiếp tục cho ra mắt mẫu điện thoại giá rẻ Samsung M32. Đây là điện thoại thuộc dòng điện thoại Galaxy M ở phân khúc giá rẻ nhưng được trang bị cấu hình tương đối ổn định. Ngoài ra, bạn cũng có thể tham khảo thêm điện thoại Samsung Galaxy M32s với cấu hình được nâng cấp.', 3, 12, '\"- Kích thước màn hình: 6.4 inches\r\n- Công nghệ màn hình: Super AMOLED\r\n- Camera sau:\r\n+ Camera chính: 64 MP, f/1.8\r\n+ Camera góc siêu rộng: 8 MP, f/2.2\r\n+ Camera cận cảnh: 2 MP, f/2.4\r\n+ Cảm biến độ sâu: 2 MP, f/2.4\r\n- Camera trước: 20 MP, f/2.2\r\n- Chipset: Mediatek Helio G80 (12 nm)\r\n- RAM: 8GB\r\n- ROM: 128GB\r\n- Pin: 5,000mAh\r\n- Hệ điều hành: Android 11, One UI 3.1\r\n- Độ phân giải màn hình: 1080 x 2400 pixels (FullHD+)\r\n- Tính năng màn hình: Độ sáng 800 nits\"', 0, 0.0),
(75, 'Samsung Galaxy Note 20 Ultra 5G', 32990000.00, 100, 'n20u-1.jpg,n20u-2.jpg,n20u-3.jpg,n20u-4.jpg,thumb-anhchinh9.jpg', 5.00, 0, 0, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Điện thoại Samsung Note 20 Ultra 5G - Sang trọng, hiệu năng vượt trội\r\nBên cạnh biên bản Galaxy Note 20 thường, Samsung còn cho ra mắt Note 20 Ultra 5G cho khả năng kết nối dữ liệu cao cùng thiết kế nguyên khối sang trọng, bắt mắt. Đây sẽ là sự lựa chọn hoàn hảo dành cho bạn để sử dụng mà không bị lỗi thời sau thời gian dài ra mắt.\r\n\r\nNgoài ra, bạn có thể tham khảo điện thoại màn hình gập Samsung Fold 3 nếu bạn cần sự khác biệt và khẳng định đẳng cấp.\r\n\r\nThiết kế khung nhôm nguyên khối, mặt sau kính cường lực sang trọng\r\nLà một sản phẩm có kích thước màn hình lớn vì vậy Samsung đã trang bị cho Galaxy Note 20 Ultra 5G  với công nghệ kết nối dữ liệu mạnh mẽ cùng thiết kế nguyên khối. Giúp các linh kiện bên trong điện thoại được cố định chắc chắn đảm bảo mọi thứ bên trong luôn được an toàn. Không những vậy khung nhôm tạo trên những đường viền cực kỳ sang trọng và bắt mắt khi nhìn vào.', 3, 12, '\"- Kích thước màn hình: 6.9 inches\r\n- Công nghệ màn hình: Dynamic AMOLED\r\n- Camera sau:\r\n+ 108 MP, f/1.8, 26mm (wide), 1/1.33\"\", 0.8µm, PDAF, Laser AF, OIS\r\n+ 12 MP, f/3.0, 103mm (periscope telephoto), 1.0µm, PDAF, OIS, 5x optical zoom, 50x hybrid zoom\r\n+ 12 MP, f/2.2, 13mm (ultrawide), 1/2.55\"\", 1.4µm\r\n- Camera trước:10 MP, f/2.2, 26mm (wide), 1/3.2\"\", 1.22µm, Dual Pixel PDAF\r\n- Chipset: Exynos 990 (7 nm+)\r\n- Công nghệ màn hình: Dynamic AMOLED 2X capacitive touchscreen\r\n- RAM: 12 GB\r\n- ROM: 256 GB\r\n- Pin: Non-removable Li-Ion 4500 mAh battery, Fast charging 25W\r\n- Hệ điều hành: Android 10, One UI 2.1\r\n- Độ phân giải màn hình: 1440 x 3088 pixels (QHD+)\r\n- Tính năng màn hình:120Hz, HDR10+, Corning Gorilla Glass Victus\r\n- Cảm biến: Cảm biến vân tay siêu âm, cảm biến gia tốc\"', 0, 0.0),
(76, 'Samsung Galaxy S21 FE 8GB 128GB ', 12490000.00, 99, 's21fe-1.png,s21fe-2.png,s21fe-3.png,s21fe-4.png,thumb-anhchinh10.png', 5.00, 0, 0, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Samsung Galaxy S21 FE (8GB - 128GB) được cung cấp sức mạnh bởi con chip xử lý Exynos 2100 \"cây nhà lá vườn\" kết hợp với 8GB RAM mang đến hiệu suất hoạt động mạnh mẽ cùng bộ nhớ trong 128GB giúp người dùng có thể thoải mái lưu trữ hình ảnh, video dữ liệu.', 3, 10, '\"Kích thước màn hình\r\n\r\n6.4 inches\r\nCông nghệ màn hình\r\n\r\nSuper AMOLED\r\nCamera sau\r\n\r\nCamera góc rộng: 12 MP, f/1.8, PDAF, OIS\r\nCamera tele: 8 MP, f/2.4, 3x optical zoom\r\nCamera góc siêu rộng: 12 MP, f/2.2\r\nCamera trước\r\n\r\n32 MP, f/2.2\r\nChipset\r\n\r\nExynos 2100 (5nm)\r\nDung lượng RAM\r\n\r\n8 GB\r\nBộ nhớ trong\r\n\r\n128 GB\r\nPin\r\n\r\n4500mAh\r\nThẻ SIM\r\n\r\n2 SIM (Nano-SIM)\r\nĐộ phân giải màn hình\r\n\r\n1080 x 2400 pixels (FullHD+)\r\nTính năng màn hình\r\n\r\nTrang bị Spen Pro\"', 0, 0.0),
(77, 'Samsung Galaxy S22 (8GB - 256GB)', 16390000.00, 100, 's22-1.jpg,s22-2.png,s22-3.jpg,s22-4.png,thumb-anhchinh11.jpg', 5.00, 0, 1, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Camera mắt thần bóng đêm Nightography - Ghi lại khoảnh khắc đêm diệu kì\r\nMãn nhãn từng khoảnh khắc - Màn hình 6.1\", Dynamic AMOLED 2X, 120Hz\r\nBứt phá hiệu năng - Snapdragon 8 Gen 1 (4 nm)\r\nThỏa sức trải nghiệm chỉ với một lần sạc - Viên pin 3700 mAh, sạc nhanh 25W, sạc không dây', 3, 10, '\"Kích thước màn hình 6.1 inches\r\nCông nghệ màn hình Dynamic AMOLED 2X \r\nCamera sau \r\nCamera chính: 50MP, f/1.8 \r\nCamera góc siêu rộng: 12MP, f/2.2 \r\nCamera tele: 10MP, f/2.4 \r\nCamera trước 10MP \r\nChipset Chip Snapdragon 8 Gen 1\r\nRAM 8 GB \r\nBộ nhớ trong 256 GB \r\nPin 3700 mAh \r\nThẻ SIM 2 SIM (nano‑SIM và eSIM) \r\nHệ điều hành Android 12, One UI 4.1 \r\nĐộ phân giải màn hình 1080 x 2340 pixels (FullHD+) \r\nTính năng màn hình Corning Gorilla Glass Victus+, HDR10+, 1300 nits\"', 0, 0.0),
(78, 'Samsung Galaxy S23 Plus 8GB 256GB', 24990000.00, 100, 's23p-1.jpg,s23p-2.jpg,s23p-3.jpg,s23p-4.jpg,thumb-anhchinh12.jpg', 5.00, 0, 0, '2023-03-17 07:15:06', '2023-03-17 13:59:48', 'Samsung Galaxy S23 Plus trang bị màn hình 6.6 inch, công nghệ màn hình sắc nét, với cụm camera sau ấn tượng với camera góc siêu rộng 12 MP, camera góc rộng 50MP, ống kính tele 10MP . Bên cạnh đó, với con chipset mạnh mẽ Snapdragon 8 Gen 2, RAM 8GB và phiên bản bộ nhớ trong 256GB/512GB ổn định khi dùng trong thời gian dài. Người dùng sẽ có những khoảnh khắc bên điện thoại cả ngày, chiến game, giải trí với dung lượng pin 4700mAh.\r\n\r\nSo sánh Samsung Galaxy S23 Plus và Samsung Galaxy S22 Plus\r\nSo với Samsung S22 Plus, sản phẩm mới đến từ nhà Samsung đã không làm các tín đồ công nghệ thất vọng bởi cải tiến mới về mặt hiệu năng, dung lượng pin, dung lượng bộ nhớ và tính năng chụp đêm ấn tượng. Xem ngay thông tin sự thay đổi qua bảng sau đây!', 3, 10, '\"Kích thước màn hình\r\n\r\n6.6 inches\r\nCông nghệ màn hình\r\n\r\nDynamic AMOLED 2X\r\nCamera sau\r\n\r\nCamera chính góc rộng: 50 MP, f/1.8, Dual Pixel PDAF, OIS\r\nCamera tele: 10 MP, f/2, 3x optical zoom\r\nCamera góc siêu rộng:12 MP, f/2.2\r\nCamera trước\r\n\r\n12MP, f/2.2\r\nChipset\r\n\r\nSnapdragon 8 Gen 2\r\nDung lượng RAM\r\n\r\n8 GB\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\n4700 mAh\r\nThẻ SIM\r\n\r\n2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành\r\n\r\nAndroid\r\nĐộ phân giải màn hình\r\n\r\n1080 x 2340 pixels (FullHD+)\r\nTính năng màn hình\r\n\r\nTần số quét 120Hz, HDR10+, Kính cường lực Corning® Gorilla® Glass Victus® 2\r\nTương thích\r\n\r\nKhông hỗ trợ bút S-Pen\"', 0, 0.0),
(79, 'Samsung Galaxy Z Flip4 128GB ', 20990000.00, 100, 'thumb-anhchinh14.jpg,zflip4-1.jpg,zflip4-2.png,zflip4-3.png,zflip4-4.png', 5.00, 0, 1, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Tiếp tục là một mẫu smartphone màn hình gập độc đáo, đầy lôi cuốn và mới mẻ từ hãng công nghệ Hàn Quốc, dự kiến sẽ có tên là Samsung Galaxy Z Flip 4 với nhiều nâng cấp. Đây hứa hẹn sẽ là một siêu phẩm bùng nổ trong thời gian tới và thu hút được sự quan tâm của đông đảo người dùng với nhiều cải tiến từ ngoại hình, camera, bộ vi xử lý và viên pin được nâng cấp.', 3, 9, '\"Kích thước màn hình\r\n\r\n6.7 inches\r\nCông nghệ màn hình\r\n\r\nDynamic AMOLED 2X\r\nCamera sau\r\n\r\nCamera góc rộng: 12 MP, f/1.8, PDAF, OIS\r\nCamera góc siêu rộng: 12 MP, f/2.2, 123˚\r\nCamera trước\r\n\r\n10 MP, f/2.4\r\nChipset\r\n\r\nSnapdragon 8+ Gen 1 (4 nm)\r\nDung lượng RAM\r\n\r\n8 GB\r\nBộ nhớ trong\r\n\r\n128 GB\r\nPin\r\n\r\n3700 mAh\r\nThẻ SIM\r\n\r\n2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành\r\n\r\nAndroid 12, One UI 4.1.1\r\nTính năng màn hình\r\n\r\nMàn hình chính: 6.7 inches\r\nMàn hình ngoài: 2.1 inches, Super AMOLED\r\n120Hz, HDR10+, 1200 nits (peak)\"', 0, 0.0),
(80, 'Samsung Galaxy Z Fold 4', 37990000.00, 100, 'thumb-anhchinh15.jpg,zfold4-1.jpg,zfold4-2.jpg,zfold4-3.png,zfold4-4.png', 5.00, 0, 1, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Galaxy Z Fold3 vốn đã rất nổi bật thì mới đây, sự xuất hiện của điện thoại gập mới Samsung Galaxy Z Fold 4 lại càng hấp dẫn nhiều người dùng hơn khi sở hữu thiết kế gập màn hình mới cùng với những cải tiến cho trải nghiệm nhân đôi. Vậy chiếc smartphone màn hình gập cao cấp thế hệ mới có gì mới, giá bao nhiêu và có nên mua không? Cùng tìm hiểu nhé!\r\n\r\nThông tin mới nhất về điện thoại Samsung Z Fold 4\r\nTheo các nguồn thông tin gần đây, điện thoại Galaxy Z Fold 2022sẽ có những điểm mới về màu sắc, phiên bản dung lượng bộ nhớ, hiệu năng, camera cùng thiết kế mới. Dưới đây là những thông tin mới nhất về siêu phẩm màn hình gập Samsung Z Fold 4 vừa được trình làng mới đây.', 3, 9, '\"Kích thước màn hình\r\n\r\n7.6 inches\r\nCông nghệ màn hình\r\n\r\nAMOLED\r\nCamera sau\r\n\r\nCamera chính: 50MP\r\nCamera góc siêu rộng: 12MP\r\nCamera tele: 10MP (3x zoom)\r\nCamera trước\r\n\r\n10MP (bên ngoài) + 4MP (dưới màn hình)\r\nChipset\r\n\r\nSnapdragon 8 Plus Gen 1\r\nDung lượng RAM\r\n\r\n12 GB\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\n4,400 mAh\r\nThẻ SIM\r\n\r\n2 Nano-SIM + eSIM\r\nHệ điều hành\r\n\r\nAndroid 12, One UI 4.1.1\r\nTính năng màn hình\r\n\r\nMàn hình chính: 7,6 inch QXGA + AMOLED, 120Hz\r\nMàn hình phụ: 6.2 inch HD + AMOLED, 120Hz\"', 0, 0.0),
(81, 'Samsung Galaxy Z Fold3 5G 256GB ', 21490000.00, 100, 'thumb-anhchinh16.jpg,zfold3-1.jpg,zfold3-2.jpg,zfold3-3.jpg,zfold3-4.jpg', 0.00, 0, 0, '2023-03-17 13:26:50', '2023-03-17 13:59:48', '', 3, 9, '\"Kích thước màn hình\r\n\r\n7.6 inches\r\nCông nghệ màn hình\r\n\r\nDynamic AMOLED\r\nCamera sau\r\n\r\nCamera góc rộng: 12 MP, f/1.8, 26mm, Dual Pixel PDAF, OIS\r\nCamera tele: 12 MP, f/2.4, 52mm, PDAF, OIS, 2x Zoom quang học\r\nCamera góc siêu rộng: 12 MP, f/2.2\r\nCamera màn hình phụ: 10MP, f/2.2\r\nCamera trước\r\n\r\nCamera ẩn dưới màn hình: 4MP, f/1.8\r\nChipset\r\n\r\nSnapdragon 888 5G (5 nm)\r\nDung lượng RAM\r\n\r\n12 GB\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\nLi-Po 4400 mAh\r\nThẻ SIM\r\n\r\n2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành\r\n\r\nAndroid 11\r\nTính năng màn hình\r\n\r\nMàn hình chính: 7.9\"\" 2208x1768, 374ppi, HDR10+, 120Hz\r\nMàn hình phụ: 6.23\"\" 2268x832, HD+ Dynamic AMOLED 2X (24.5:9) Infinity-O Display, 38ppi, 120Hz\r\nTrọng lượng\r\n\r\n271g\"', 0, 0.0),
(82, 'Samsung Galaxy S23 Ultra ', 26990000.00, 100, 's23u-1.png,s23u-2.png,s23u-3.png,s23u-4.png,thumb-anhchinh13.png', 0.00, 0, 1, '2023-03-17 13:26:50', '2023-03-17 13:59:48', 'Samsung Galaxy S23 Ultra là điện thoại cao cấp của hãng điện thoại Samsung được ra mắt vào đầu năm 2023. Điện thoại Samsung S23 series mới này sở hữu camera độ phân giải 200MP ấn tượng cùng một khung viền vuông vức sang trọng. Cấu hình máy cũng là một điểm nổi bật với con chip Snapdragon 8 Gen 2 mạnh mẽ, bộ nhớ RAM 8GB mang lại hiệu suất xử lý vượt trội.', 3, 10, '\"Kích thước màn hình\r\n\r\n6.8 inches\r\nCông nghệ màn hình\r\n\r\nDynamic AMOLED 2X\r\nCamera sau\r\n\r\nSiêu rộng: 12MP F2.2 (Dual Pixel AF)\r\nChính: 200MP F1.7 OIS ±3° (Super Quad Pixel AF)\r\nTele 1: 10MP F4.9 (10X, Dual Pixel AF) OIS,\r\nTele 2: 10MP F2.4 (3X, Dual Pixel AF) OIS Thu phóng chuẩn không gian 100X\r\nCamera trước\r\n\r\n12MP F2.2 (Dual Pixel AF)\r\nChipset\r\n\r\nSnapdragon 8 Gen 2 (4 nm)\r\nDung lượng RAM\r\n\r\n8 GB\r\nBộ nhớ trong\r\n\r\n256 GB\r\nPin\r\n\r\n5.000mAh\r\nThẻ SIM\r\n\r\n2 Nano-SIM + eSIM\r\nHệ điều hành\r\n\r\nAndroid\r\nĐộ phân giải màn hình\r\n\r\n1440 x 3088 pixels (QHD+)\r\nTính năng màn hình\r\n\r\n120Hz, HDR10+, 1750 nits, Gorilla Glass Victus 2\r\nTương thích\r\n\r\nBút S-Pen\"', 0, 0.0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

DROP TABLE IF EXISTS `tbl_shipping`;
CREATE TABLE `tbl_shipping` (
  `id_shipping` int(9) NOT NULL,
  `id_user` int(3) NOT NULL,
  `province_id` int(2) NOT NULL,
  `district_id` int(5) NOT NULL,
  `ward_id` int(7) NOT NULL,
  `detail_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'GHN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `id_user`, `province_id`, `district_id`, `ward_id`, `detail_address`, `shipping_type`) VALUES
(1, 11, 205, 1540, 440507, '19/7c Đông Tác', 'GHN'),
(2, 38, 263, 2039, 130714, 'Long thành', 'GHN'),
(3, 46, 0, 0, 0, '', 'GHN'),
(4, 51, 269, 2073, 80411, 'Phường Tân Hiệp', 'GHN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE `tbl_slider` (
  `id_slider` int(11) NOT NULL,
  `title_slider` varchar(255) NOT NULL,
  `img_slider` varchar(255) NOT NULL,
  `content_slider` text NOT NULL,
  `date_slider` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`id_slider`, `title_slider`, `img_slider`, `content_slider`, `date_slider`) VALUES
(3, 'Smartphone giá tốt tại cửa hàng', 'thumb-promotion-dummpy-image.png', '<div>\r\n<div>The Phoner Store với nhiều d&ograve;ng điện thoại kh&aacute;c nhau, từ c&aacute;c thương hiệu nổi&nbsp;tiếng, với c&aacute;c ph&acirc;n kh&uacute;c gi&aacute; ph&ugrave; hợp cho nhiều đổi tượng kh&aacute;ch h&agrave;ng, gh&eacute; thăm&nbsp;cửa h&agrave;ng của ch&uacute;ng t&ocirc;i để nhận nhiều ưu đ&atilde;i hấp dẫn!</div>\r\n</div>', '2023-04-08 16:36:18'),
(4, 'Smartphone giá tốt tại cửa hàng', 'thumb-banner-slider-02.jpg', '<div>\r\n<div>The Phoner Store với nhiều d&ograve;ng điện thoại kh&aacute;c nhau, từ c&aacute;c thương hiệu nổi tiếng, với c&aacute;c ph&acirc;n kh&uacute;c gi&aacute; ph&ugrave; hợp cho nhiều đổi tượng kh&aacute;ch h&agrave;ng, gh&eacute; thăm&nbsp;cửa h&agrave;ng của ch&uacute;ng t&ocirc;i để nhận nhiều ưu đ&atilde;i hấp dẫn!</div>\r\n</div>', '2023-04-08 16:57:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vnpay`
--

DROP TABLE IF EXISTS `tbl_vnpay`;
CREATE TABLE `tbl_vnpay` (
  `id_vnpay` int(9) NOT NULL,
  `order_id` int(4) NOT NULL,
  `amount` int(11) NOT NULL,
  `bankcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `banktransno` int(10) NOT NULL,
  `cardtype` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `orderinfo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paydate` datetime NOT NULL,
  `tmncode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_vnpay`
--

INSERT INTO `tbl_vnpay` (`id_vnpay`, `order_id`, `amount`, `bankcode`, `banktransno`, `cardtype`, `orderinfo`, `paydate`, `tmncode`, `transaction_no`) VALUES
(4, 46, 2147483647, 'NCB', 0, 'ATM', 'Asperiores inventore', '2023-03-25 16:30:17', 'ED75PCEI', 13976487),
(5, 47, 1275300000, 'NCB', 0, 'ATM', 'Okie VNpay', '2023-03-25 16:37:43', 'ED75PCEI', 13976491),
(6, 48, 1275300000, 'NCB', 0, 'ATM', 'Vel est aut itaque d', '2023-03-25 17:05:20', 'ED75PCEI', 13976495),
(9, 51, 2147483647, 'NCB', 0, 'ATM', 'Deserunt voluptate q', '2023-03-25 19:34:24', 'ED75PCEI', 13976513),
(10, 52, 1878100000, 'NCB', 0, 'ATM', 'Mollitia placeat in', '2023-03-25 19:37:38', 'ED75PCEI', 13976515),
(12, 54, 881100000, 'NCB', 0, 'ATM', 'Sunt dolor quam qua', '2023-03-25 19:40:19', 'ED75PCEI', 13976517),
(13, 55, 1044050000, 'NCB', 0, 'ATM', 'Ipsum quisquam mole', '2023-03-25 19:41:40', 'ED75PCEI', 13976518),
(14, 56, 551080000, 'NCB', 0, 'ATM', 'Fugiat nisi culpa ', '2023-03-25 19:43:03', 'ED75PCEI', 13976520),
(15, 58, 981050000, 'NCB', 0, 'ATM', 'Est doloribus lauda', '2023-03-25 20:03:29', 'ED75PCEI', 13976522),
(16, 59, 2147483647, 'NCB', 0, 'ATM', 'Thanh toán tối ưu', '2023-03-25 20:23:56', 'ED75PCEI', 13976525),
(17, 60, 2147483647, 'NCB', 0, 'ATM', 'Cẩn thận nhé', '2023-03-26 11:38:28', 'ED75PCEI', 13976581),
(18, 61, 2147483647, 'NCB', 0, 'ATM', 'Đặt hàng oke', '2023-03-26 13:55:47', 'ED75PCEI', 13976599),
(19, 63, 2147483647, 'NCB', 0, 'ATM', '123', '2023-03-27 14:05:04', 'ED75PCEI', 13977097),
(20, 68, 634235000, 'NCB', 0, 'ATM', 'Hihi', '2023-03-28 15:01:19', 'ED75PCEI', 13978081),
(22, 71, 2147483647, 'NCB', 0, 'ATM', 'Hàng dễ vỡ giao hàng cẩn thận', '2023-03-28 15:17:20', 'ED75PCEI', 13978105),
(25, 77, 871151500, 'NCB', 0, 'ATM', 'hàng dễ vỡ giao hàng cẩn thận', '2023-03-30 16:37:51', 'ED75PCEI', 13979867),
(27, 81, 2147483647, 'NCB', 0, 'ATM', 'Good', '2023-04-01 15:20:08', 'ED75PCEI', 13980915),
(29, 90, 2147483647, 'NCB', 0, 'ATM', 'fdsfsdfsd', '2023-04-09 10:24:55', 'ED75PCEI', 13986022),
(30, 96, 1156496300, 'NCB', 0, 'ATM', 'fdsfsdfsdf', '2023-04-10 14:46:18', 'ED75PCEI', 13986666),
(31, 97, 2147483647, 'NCB', 0, 'ATM', 'HIhi', '2023-04-11 08:27:07', 'ED75PCEI', 13987110),
(32, 99, 2147483647, 'NCB', 0, 'ATM', 'HIhi', '2023-04-12 09:21:06', 'ED75PCEI', 13988253),
(33, 104, 2069098300, 'NCB', 0, 'ATM', 'ahihi', '2023-04-13 19:56:34', 'ED75PCEI', 13990019);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD PRIMARY KEY (`ma_binhluan`);

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
  ADD PRIMARY KEY (`id_bl`);

--
-- Chỉ mục cho bảng `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`id_coupon`);

--
-- Chỉ mục cho bảng `tbl_danhgiasp`
--
ALTER TABLE `tbl_danhgiasp`
  ADD PRIMARY KEY (`id_review`);

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
-- Chỉ mục cho bảng `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_reply_blog_comments`
--
ALTER TABLE `tbl_reply_blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_reply_comments_product`
--
ALTER TABLE `tbl_reply_comments_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_reply_reviews`
--
ALTER TABLE `tbl_reply_reviews`
  ADD PRIMARY KEY (`id_reply`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`masanpham`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`),
  ADD KEY `fk_shipping_nguoidung` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD PRIMARY KEY (`id_vnpay`),
  ADD KEY `fk_vnpay_order` (`order_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  MODIFY `ma_binhluan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_blog_cate`
--
ALTER TABLE `tbl_blog_cate`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_blog_comment`
--
ALTER TABLE `tbl_blog_comment`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `id_coupon` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_danhgiasp`
--
ALTER TABLE `tbl_danhgiasp`
  MODIFY `id_review` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `ma_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmucphu`
--
ALTER TABLE `tbl_danhmucphu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT cho bảng `tbl_reply_blog_comments`
--
ALTER TABLE `tbl_reply_blog_comments`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_reply_comments_product`
--
ALTER TABLE `tbl_reply_comments_product`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_reply_reviews`
--
ALTER TABLE `tbl_reply_reviews`
  MODIFY `id_reply` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `masanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  MODIFY `id_vnpay` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD CONSTRAINT `fk_blogcate_blog` FOREIGN KEY (`blogcate_id`) REFERENCES `tbl_blog_cate` (`id`);

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
-- Các ràng buộc cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD CONSTRAINT `fk_shipping_nguoidung` FOREIGN KEY (`id_user`) REFERENCES `tbl_nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD CONSTRAINT `fk_vnpay_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
