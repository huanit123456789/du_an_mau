-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2023 lúc 07:12 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(11) NOT NULL,
  `nd_bl` varchar(250) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `id_hh` int(11) NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `ten_dm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `ten_dm`) VALUES
(5, 'Laptop'),
(6, 'Điện thoại');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `id_hh` int(11) NOT NULL,
  `ten_hh` varchar(50) NOT NULL,
  `gia_hh` double NOT NULL,
  `giamgia_hh` float NOT NULL,
  `anh_hh` varchar(250) NOT NULL,
  `ngaynhap_hh` date NOT NULL,
  `mota_hh` text DEFAULT NULL,
  `dacbiet_hh` tinyint(4) NOT NULL DEFAULT 1,
  `view_hh` int(11) NOT NULL DEFAULT 0,
  `id_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`id_hh`, `ten_hh`, `gia_hh`, `giamgia_hh`, `anh_hh`, `ngaynhap_hh`, `mota_hh`, `dacbiet_hh`, `view_hh`, `id_dm`) VALUES
(2, 'IPHONE', 3000, 0, '1697072032ip14.jpg', '2023-10-11', 'huan hihi hihi hihi hihi hihi', 1, 3, 6),
(4, 'iPhone 14 Pro Max', 140000, 0, '2.jpg', '2023-09-15', 'Những dòng iPhone đến từ nhà Apple đều có sức hút đặc biệt ngay từ thời điểm ra mắt và thế hệ iPhone 14 Pro Max cũng không ngoại lệ. Có thể nói, iPhone 14 Pro Max là sự kết hợp hoàn hảo giữa các yếu tố về thiết kế, cấu hình, tính năng, hệ điều hành,... Nếu bạn tò mò về siêu phẩm này, hãy đọc ngay phần đánh giá chi tiết phiên bản cao cấp nhất trong series iPhone 14 bên dưới nhé.', 1, 93, 6),
(5, 'Laptop Asus VivoBook Go 14', 180000, 0, '3.jpg', '2023-09-15', 'ASUS Vivobook E1404FA-NK186W thuộc dòng Vivobook Go 14, dòng laptop hiệu năng cao giá rẻ giúp bạn làm việc hiệu quả mọi lúc mọi nơi. Với bộ vi xử lý AMD 7000 series mạnh mẽ, trang bị sẵn tới 16GB RAM, 512GB SSD, Vivobook E1404FA sẽ mang đến trải nghiệm làm việc thoải mái, vô cùng mượt mà.', 1, 12, 5),
(6, 'Laptop Lenovo Ideapad 5 Pro', 300000, 0, '4.jpg', '2023-09-15', 'Lenovo Ideapad 5 Pro 16 là chiếc laptop, máy tính xách tay thời đại mới dành cho các bạn trẻ đa nhiệm, năng động với vẻ ngoài hiện đại, mỏng nhẹ nhưng bên trong lại chứa một hiệu năng cực khủng. Bên cạnh đó, chiếc laptop Lenovo - Lenovo Ideapad này cũng được tích hợp nhiều công nghệ hiện đại, tối ưu tốt cho trải nghiệm sử dụng. Chắc chắn, mẫu laptop mỏng nhẹ này sẽ khiến bạn phải bất ngờ đấy. Hãy cùng Laptop88 đánh giá ngay mẫu laptop văn phòng này dưới đây nhé!', 1, 13, 6),
(7, 'Xiaomi Redmi Note 12 Pro', 140000, 0, '5.jpg', '2023-09-15', 'Samsung S23 Ultra là dòng điện thoại cao cấp của Samsung, sở hữu camera độ phân giải 200MP ấn tượng, chip Snapdragon 8 Gen 2 mạnh mẽ, bộ nhớ RAM 8GB mang lại hiệu suất xử lý vượt trội cùng khung viền vuông vức sang trọng. Sản phẩm được ra mắt từ đầu năm 2023.', 1, 11, 6),
(8, 'Macbook Air 15 inch M2 2023', 180000, 0, '6.jpg', '2023-09-15', 'Vận hành doanh nghiệp trên MacBook Air M2. Siêu mạnh mẽ với chip M2 thế hệ tiếp theo, MacBook Air được thiết kế mới nay nhỏ gọn hơn bao giờ hết, kết hợp giữa hiệu năng đáng kinh ngạc và thời lượng pin lên đến 18 giờ trong vỏ nhôm mỏng đầy ấn tượng.1 Nhờ đó, tất cả các bộ phận từ kinh doanh đến tài chính đều có thể làm việc năng suất hơn dù ở bất cứ đâu.', 1, 11, 5),
(9, 'Laptop Lenovo Ideapad 5 Pro', 300000, 0, '7.jpg', '2023-09-15', 'Lenovo Ideapad 5 Pro 16 là chiếc laptop, máy tính xách tay thời đại mới dành cho các bạn trẻ đa nhiệm, năng động với vẻ ngoài hiện đại, mỏng nhẹ nhưng bên trong lại chứa một hiệu năng cực khủng. Bên cạnh đó, chiếc laptop Lenovo - Lenovo Ideapad này cũng được tích hợp nhiều công nghệ hiện đại, tối ưu tốt cho trải nghiệm sử dụng. Chắc chắn, mẫu laptop mỏng nhẹ này sẽ khiến bạn phải bất ngờ đấy. Hãy cùng Laptop88 đánh giá ngay mẫu laptop văn phòng này dưới đây nhé!', 1, 17, 6),
(10, 'Xiaomi Redmi Note 12 Pro', 140000, 0, '8.jpg', '2023-09-15', 'Samsung S23 Ultra là dòng điện thoại cao cấp của Samsung, sở hữu camera độ phân giải 200MP ấn tượng, chip Snapdragon 8 Gen 2 mạnh mẽ, bộ nhớ RAM 8GB mang lại hiệu suất xử lý vượt trội cùng khung viền vuông vức sang trọng. Sản phẩm được ra mắt từ đầu năm 2023.', 1, 19, 5),
(11, 'Macbook Air 15 inch M2 2023', 180000, 0, '9.jpg', '2023-09-15', 'Vận hành doanh nghiệp trên MacBook Air M2. Siêu mạnh mẽ với chip M2 thế hệ tiếp theo, MacBook Air được thiết kế mới nay nhỏ gọn hơn bao giờ hết, kết hợp giữa hiệu năng đáng kinh ngạc và thời lượng pin lên đến 18 giờ trong vỏ nhôm mỏng đầy ấn tượng.1 Nhờ đó, tất cả các bộ phận từ kinh doanh đến tài chính đều có thể làm việc năng suất hơn dù ở bất cứ đâu.', 1, 18, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int(11) NOT NULL,
  `mk_kh` varchar(50) NOT NULL,
  `hoten_kh` varchar(50) NOT NULL,
  `anh_kh` varchar(250) NOT NULL,
  `email_kh` varchar(250) NOT NULL,
  `vaitro_kh` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `mk_kh`, `hoten_kh`, `anh_kh`, `email_kh`, `vaitro_kh`) VALUES
(3, 'Duonghuan24', 'DUONG VAN HUAN', '16970995810c3700b0a702785c2113.jpg', 'huandvph43667@fpt.edu.vn', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`id_hh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `id_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
