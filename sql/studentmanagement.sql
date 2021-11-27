-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 11:06 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `studentmanagement`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply`
--

CREATE TABLE `apply` (
  `id` int(11) NOT NULL,
  `aspiration` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `apply`
--

INSERT INTO `apply` (`id`, `aspiration`, `id_student`, `id_company`) VALUES
(12, 2, 1, 1),
(14, 1, 9, 3),
(15, 3, 9, 1),
(16, 2, 9, 2),
(17, 1, 1, 2),
(18, 3, 1, 3),
(19, 1, 8, 1),
(20, 2, 8, 2),
(21, 3, 8, 3),
(22, 3, 10, 1),
(23, 2, 10, 2),
(24, 1, 10, 3),
(25, 1, 7, 1),
(26, 3, 7, 2),
(27, 2, 7, 3),
(31, 3, 11, 1),
(32, 1, 11, 2),
(33, 2, 11, 3),
(34, 1, 48, 4),
(35, 3, 48, 5),
(36, 2, 48, 6),
(37, 2, 55, 4),
(38, 3, 55, 5),
(39, 1, 55, 6),
(40, 3, 46, 7),
(41, 2, 46, 8),
(42, 1, 46, 9),
(43, 4, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`id`, `class_id`, `class_name`, `id_department`) VALUES
(1, 'D18CQCN-01', 'Công nghệ thông tin 1', 1),
(3, 'D18CQCN-02', 'Công nghệ thông tin 2', 1),
(4, 'D18CQVT-01', 'Điện tử viễn thông 1', 2),
(5, 'D18CQVT-02', 'Điện tử viễn thông 2', 2),
(8, 'D18CQAT-01', 'An toàn thông tin 1', 3),
(9, 'D18CQAT-02', 'An toàn thông tin 2', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `standard_gpa` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`id`, `name`, `standard_gpa`, `quantity`, `id_department`) VALUES
(1, 'VIETTEL', 3.2, 4, 1),
(2, 'VNPT', 3, 4, 1),
(3, 'FPT Software', 2.5, 4, 1),
(4, 'Vietnamobile', 2.8, 3, 2),
(5, 'Mobifone', 2.6, 3, 2),
(6, 'FPT Telecom', 3, 3, 2),
(7, 'BKAV', 3.2, 3, 3),
(8, 'TPBank', 2.9, 3, 3),
(9, 'Techcombank', 2.6, 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `department_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`id`, `department_id`, `department_name`) VALUES
(1, 'CNTT1', 'Công nghệ thông tin'),
(2, 'DTVT1', 'Điện tử - Viễn thông'),
(3, 'ATTT1', 'An toàn thông tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gpa` float DEFAULT NULL,
  `role` int(11) NOT NULL,
  `id_class` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`id`, `student_id`, `username`, `password`, `fullname`, `dob`, `gender`, `address`, `gpa`, `role`, `id_class`) VALUES
(1, 'B18DCCN001', 'B18DCCN001', '20000101', 'Nguyễn Đình Tuấn Anh', '2000-01-01', 'Nam', 'Hà Đông - Hà Nội', 3.2, 0, 1),
(5, '', 'admin', '123456', 'Đào Quang Huy', '1995-02-27', 'Nam', 'Hà Đông - Hà Nội', 0, 1, NULL),
(7, 'B18DCCN002', 'B18DCCN002', '20000102', 'Vũ Thế Anh', '2000-01-02', 'Nam', 'Hà Đông - Hà Nội', 3.2, 0, 1),
(8, 'B18DCCN003', 'B18DCCN003', '20000103', 'Nguyễn Hải Châu', '2000-01-03', 'Nam', 'Hà Đông - Hà Nội', 3.1, 0, 1),
(9, 'B18DCCN004', 'B18DCCN004', '20000104', 'Vũ Ngọc Cương', '2000-01-04', 'Nam', 'Hà Đông - Hà Nội', 3.15, 0, 1),
(10, 'B18DCCN005', 'B18DCCN005', '20000105', 'Đặng Ngọc Cường', '2000-01-05', 'Nam', 'Cầu Giấy - Hà Nội', 3.21, 0, 1),
(11, 'B18DCCN006', 'B18DCCN006', '20000106', 'Bùi Quang Đảm', '2000-01-06', 'Nam', 'Mỹ Đình - Hà Nội', 3.17, 0, 3),
(26, 'B18DCCN007', 'B18DCCN007', '20000107', 'Nguyễn Duy Đạt', '2000-01-07', 'Nam', 'Cầu Giấy - Hà Nội', 3.21, 0, 3),
(27, 'B18DCCN008', 'B18DCCN008', '20000108', 'Nguyễn Văn Đạt', '2000-01-08', 'Nam', 'Hà Đông - Hà Nội', 3.1, 0, 3),
(29, 'B18DCCN010', 'B18DCCN010', '20000110', 'Vũ Minh Đăng', '2000-01-10', 'Nam', 'Cầu Giấy - Hà Nội', 2.95, 0, 3),
(31, 'B18DCVT001', 'B18DCVT001', '20000112', 'Nguyễn Minh Đức', '2000-01-12', 'Nam', 'Nam Từ Liêm - Hà Nội', 3.3, 0, 4),
(32, 'B18DCVT002', 'B18DCVT002', '20000113', 'Hoàng Hải', '2000-01-13', 'Nam', 'Hà Đông - Hà Nội', 2.45, 0, 4),
(34, 'B18DCVT003', 'B18DCVT003', '20000114', 'Nguyễn Đức Hải', '2000-01-14', 'Nam', 'Cầu Giấy - Hà Nội', 2.32, 0, 4),
(36, 'B18DCCN009', 'B18DCCN009', '20000109', 'Viết Minh Hiếu', '2000-01-09', 'Nam', 'Hà Đông - Hà Nội', 3.15, 0, 3),
(37, 'B18DCVT004', 'B18DCVT004', '20000117', 'Vương Mạnh Hùng', '2000-01-17', 'Nam', 'Hà Đông - Hà Nội', 2.75, 0, 5),
(39, 'B18DCAT111', 'B18DCAT111', '20000120', 'Hoàng Quang Huy', '2000-01-20', 'Nam', 'Mỹ Đình - Hà Nội', 3.22, 0, 8),
(40, 'B18DCAT211', 'B18DCAT211', '20000121', 'Trương Tuấn Huy', '2000-01-21', 'Nam', 'Mỹ Đình - Hà Nội', 3.05, 0, 8),
(41, 'B18DCAT007', 'B18DCAT007', '20000107', 'Lê Việt Hưng', '2000-01-07', 'Nam', 'Cầu Giấy - Hà Nội', 3.11, 0, 8),
(43, 'B18DCAT009', 'B18DCAT009', '20000125', 'Nguyễn Thị Thu Hường', '2000-01-25', 'Nữ', 'Cầu Giấy - Hà Nội', 2.95, 0, 8),
(45, 'B18DCAT123', 'B18DCAT123', '20000113', 'Phạm Ngọc Long', '2000-01-13', 'Nam', 'Hà Đông - Hà Nội', 2.25, 0, 9),
(46, 'B18DCAT712', 'B18DCAT712', '20000115', 'Phùng Nguyễn Thanh Long', '2000-01-15', 'Nam', 'Cầu Giấy - Hà Nội', 3.27, 0, 9),
(47, 'B18DCAT145', 'B18DCAT145', '20000104', 'Ngô Thị Mai', '2000-01-04', 'Nữ', 'Hà Đông - Hà Nội', 3.05, 0, 9),
(48, 'B18DCVT113', 'B18DCVT113', '20000127', 'Đào Quang Huy', '2000-01-27', 'Nam', 'Hà Đông - Hà Nội', 3.18, 0, 5),
(50, 'B18DCVT071', 'B18DCVT071', '20000113', 'Đinh Quốc Mạnh', '2000-01-13', 'Nam', 'Hà Đông - Hà Nội', 2.35, 0, 5),
(55, 'B18DCVT224', 'B18DCVT224', '20000123', 'Vũ Đức Minh', '2000-01-23', 'Nam', 'Cầu Giấy - Hà Nội', 3.1, 0, 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_company` (`id_company`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_id` (`class_id`),
  ADD KEY `id_department` (`id_department`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_department` (`id_department`);

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_id` (`department_id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `company` (`id`);

--
-- Các ràng buộc cho bảng `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_department`) REFERENCES `department` (`id`);

--
-- Các ràng buộc cho bảng `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`id_department`) REFERENCES `department` (`id`);

--
-- Các ràng buộc cho bảng `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
