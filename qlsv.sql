-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2024 lúc 03:46 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlsv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangdiem`
--

CREATE TABLE `bangdiem` (
  `madiem` int(11) NOT NULL,
  `mahp` int(11) NOT NULL,
  `malhp` int(11) NOT NULL,
  `magv` int(11) NOT NULL,
  `masv` int(11) NOT NULL,
  `quatrinh` float DEFAULT NULL,
  `cuoiky` float DEFAULT NULL,
  `diemthilai` int(11) NOT NULL,
  `sua` int(11) NOT NULL,
  `thilai` int(11) NOT NULL,
  `ngay_tao` varchar(255) NOT NULL,
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bangdiem`
--

INSERT INTO `bangdiem` (`madiem`, `mahp`, `malhp`, `magv`, `masv`, `quatrinh`, `cuoiky`, `diemthilai`, `sua`, `thilai`, `ngay_tao`, `ngay_sua`) VALUES
(52, 10012, 10016, 1, 10000005, 8, 8, 8, 1, 1, '2024-12-02 22:12:25', '2024-12-02 15:12:29'),
(53, 10013, 10017, 60, 10000001, NULL, NULL, 0, 0, 0, '2024-12-02 22:12:39', '2024-12-02 15:12:41'),
(56, 10013, 10017, 60, 10000002, NULL, NULL, 0, 0, 0, '2024-12-02 22:13:51', '2024-12-02 15:13:56'),
(60, 10014, 10027, 1, 10000001, 8, 5, 0, 1, 0, '2024-12-02 22:17:16', '2024-12-02 15:17:17'),
(62, 10013, 10017, 60, 10000003, NULL, NULL, 0, 0, 0, '2024-12-02 22:18:14', '2024-12-02 15:18:17'),
(63, 10014, 10027, 1, 10000002, 9, 9, 0, 1, 0, '2024-12-02 22:18:21', '2024-12-02 15:18:23'),
(64, 10014, 10027, 1, 10000003, 8, 0, 8, 1, 0, '2024-12-02 22:18:25', '2024-12-02 15:18:28'),
(65, 10014, 10027, 1, 10000004, 0, 0, 0, 1, 0, '2024-12-02 22:18:30', '2024-12-02 15:18:33'),
(66, 10014, 10027, 1, 10000005, 7, 8, 0, 1, 0, '2024-12-02 22:18:35', '2024-12-02 15:18:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlhocphan`
--

CREATE TABLE `qlhocphan` (
  `mahp` int(11) NOT NULL,
  `tenhp` varchar(255) NOT NULL,
  `sotinchi` int(11) NOT NULL,
  `makhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qlhocphan`
--

INSERT INTO `qlhocphan` (`mahp`, `tenhp`, `sotinchi`, `makhoa`) VALUES
(10012, 'Mã nguồn mở', 3, 10000),
(10013, 'kinh tế vĩ mô', 2, 10001),
(10014, 'Thị giác máy tính', 3, 10000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlkhoa`
--

CREATE TABLE `qlkhoa` (
  `idkhoa` int(11) NOT NULL,
  `tenkhoa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qlkhoa`
--

INSERT INTO `qlkhoa` (`idkhoa`, `tenkhoa`) VALUES
(10000, 'Công Nghệ Thông Tin'),
(10001, 'Kinh Tế\r\n'),
(71, 'Sư Phạm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qllophanhchinh`
--

CREATE TABLE `qllophanhchinh` (
  `idlhc` int(11) NOT NULL,
  `tenlop` varchar(255) NOT NULL,
  `makhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qllophanhchinh`
--

INSERT INTO `qllophanhchinh` (`idlhc`, `tenlop`, `makhoa`) VALUES
(2, '62k4', 10000),
(4, '62k1', 10001),
(5, '62k1', 10000),
(10, '62k2', 10001),
(11, '62k3', 10001),
(15, '62k1', 71),
(26, '62k2', 10000),
(27, '62k3', 10000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qllophocphan`
--

CREATE TABLE `qllophocphan` (
  `malhp` int(11) NOT NULL,
  `tenlhp` varchar(255) NOT NULL,
  `mahp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `qllophocphan`
--

INSERT INTO `qllophocphan` (`malhp`, `tenlhp`, `mahp`) VALUES
(10016, 'mã nguồn mở_LT_01', 10012),
(10017, 'Kinh tế vĩ mô LT_01', 10013),
(10027, 'Thị giác máy tính LT_01', 10014),
(10028, 'Thị giác máy tính LT_02', 10014),
(10039, 'mã nguồn mở_LT_01', 10012);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `usergv`
--

CREATE TABLE `usergv` (
  `idgv` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `usergv`
--

INSERT INTO `usergv` (`idgv`, `username`, `password`, `email`, `sdt`, `diachi`, `created_at`) VALUES
(1, 'Cao Thanh Sơn', '827ccb0eea8a706c4c34a16891f84e7b', 'caotson@gmail.com', 0, '', '2024-10-07 14:04:46'),
(59, 'Minh Tâm', '1a96ece6850142624bedd2dc945a5a7d', 'tam@gmail.com', 0, NULL, '2024-11-26 03:28:41'),
(60, 'Trần Hào', '91c1a90501a2aa848558fbb344972df7', 'hao@gmail.com', 0, NULL, '2024-11-26 03:28:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin123@gmail.com', '2024-10-07 10:21:57'),
(3, 'admin2', '202cb962ac59075b964b07152d234b70', 'ad2@gmail.com', '2024-10-07 10:21:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `usersv`
--

CREATE TABLE `usersv` (
  `idsv` int(11) NOT NULL,
  `usernamesv` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `congviec` varchar(255) NOT NULL,
  `gioithieu` text NOT NULL,
  `quoctich` varchar(255) NOT NULL,
  `malhc` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `usersv`
--

INSERT INTO `usersv` (`idsv`, `usernamesv`, `password`, `email`, `sdt`, `diachi`, `congviec`, `gioithieu`, `quoctich`, `malhc`, `created_at`) VALUES
(10000001, 'Nguyễn Thị Hà', '77b739f053b15ca87459935c7737f982', 'ha@gmail.com', 0, '', '', '', '', 4, '2024-12-09 09:53:11'),
(10000002, 'Nguyễn Thị Hằng', '43877af5a41f0253c8fcd83ef24ce409', 'hang@gmail.com', 0, '', '', '', '', 15, '2024-12-09 09:53:11'),
(10000003, 'Nguyễn Cảnh Kiên', '223f7b4d78d5bd24bdefae47675cb41d', 'kien@gmail.com', 0, '', '', '', '', 5, '2024-12-09 09:53:11'),
(10000004, 'Nguyễn Thị Uyên', 'cfcf85840f42a5034aa05b3ae4bf547e', 'uyen@gmail.com', 0, '', '', '', '', 4, '2024-12-09 09:53:11'),
(10000005, 'Nguyễn Cảnh Huy', '5a68458df2a597484068506410e57b02', 'huy@gmail.com', 0, '', '', '', '', 2, '2024-12-09 09:53:11'),
(10000006, 'Hoang Đăng Hải', 'c9251ab98cabbb157b092567936bf6a8', 'hai@gmail.com', 0, '', '', '', '', 5, '2024-12-09 09:53:11'),
(10000007, 'Lê Đình Hoàng', '9045edb59645cfe6b3fd2eb3f63716e6', 'hoang@gmail.com', 0, '', '', '', '', 2, '2024-12-09 09:53:11'),
(10000008, 'Lê Văn Quyến', '414502bd2e40afe295c73f8e86b4d425', 'quyen@gmail.com', 0, '', '', '', '', 5, '2024-12-09 09:53:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `viewusergv_khoa`
--

CREATE TABLE `viewusergv_khoa` (
  `id` int(11) NOT NULL,
  `magv` int(11) NOT NULL,
  `makhoa` int(11) NOT NULL,
  `malhc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `viewusergv_khoa`
--

INSERT INTO `viewusergv_khoa` (`id`, `magv`, `makhoa`, `malhc`) VALUES
(46, 1, 10000, 2),
(50, 1, 10001, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `viewusergv_lhp`
--

CREATE TABLE `viewusergv_lhp` (
  `maview` int(11) NOT NULL,
  `magv` int(11) NOT NULL,
  `malhp` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `viewusergv_lhp`
--

INSERT INTO `viewusergv_lhp` (`maview`, `magv`, `malhp`, `time`) VALUES
(3, 1, 10016, '2024-11-25 03:21:38'),
(8, 1, 10027, '2024-11-25 03:55:04'),
(33, 60, 10028, '2024-11-28 13:12:07'),
(34, 60, 10017, '2024-11-28 13:13:24'),
(36, 1, 10039, '2024-12-05 07:43:21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD PRIMARY KEY (`madiem`),
  ADD KEY `malhp` (`malhp`,`magv`,`masv`),
  ADD KEY `masv` (`masv`),
  ADD KEY `mahp` (`mahp`),
  ADD KEY `magv` (`magv`);

--
-- Chỉ mục cho bảng `qlhocphan`
--
ALTER TABLE `qlhocphan`
  ADD PRIMARY KEY (`mahp`),
  ADD KEY `makhoa` (`makhoa`);

--
-- Chỉ mục cho bảng `qlkhoa`
--
ALTER TABLE `qlkhoa`
  ADD PRIMARY KEY (`idkhoa`),
  ADD UNIQUE KEY `tenkhoa` (`tenkhoa`);

--
-- Chỉ mục cho bảng `qllophanhchinh`
--
ALTER TABLE `qllophanhchinh`
  ADD PRIMARY KEY (`idlhc`),
  ADD KEY `makhoa` (`makhoa`);

--
-- Chỉ mục cho bảng `qllophocphan`
--
ALTER TABLE `qllophocphan`
  ADD PRIMARY KEY (`malhp`),
  ADD KEY `malhc` (`mahp`);

--
-- Chỉ mục cho bảng `usergv`
--
ALTER TABLE `usergv`
  ADD PRIMARY KEY (`idgv`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `usersv`
--
ALTER TABLE `usersv`
  ADD PRIMARY KEY (`idsv`),
  ADD UNIQUE KEY `username` (`usernamesv`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `malhc` (`malhc`);

--
-- Chỉ mục cho bảng `viewusergv_khoa`
--
ALTER TABLE `viewusergv_khoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magv` (`magv`,`makhoa`),
  ADD KEY `makhoa` (`makhoa`),
  ADD KEY `malhc` (`malhc`);

--
-- Chỉ mục cho bảng `viewusergv_lhp`
--
ALTER TABLE `viewusergv_lhp`
  ADD PRIMARY KEY (`maview`),
  ADD KEY `magv` (`magv`,`malhp`),
  ADD KEY `malhp` (`malhp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  MODIFY `madiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `qlhocphan`
--
ALTER TABLE `qlhocphan`
  MODIFY `mahp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10021;

--
-- AUTO_INCREMENT cho bảng `qlkhoa`
--
ALTER TABLE `qlkhoa`
  MODIFY `idkhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;

--
-- AUTO_INCREMENT cho bảng `qllophanhchinh`
--
ALTER TABLE `qllophanhchinh`
  MODIFY `idlhc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `qllophocphan`
--
ALTER TABLE `qllophocphan`
  MODIFY `malhp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10040;

--
-- AUTO_INCREMENT cho bảng `usergv`
--
ALTER TABLE `usergv`
  MODIFY `idgv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `usersv`
--
ALTER TABLE `usersv`
  MODIFY `idsv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000010;

--
-- AUTO_INCREMENT cho bảng `viewusergv_khoa`
--
ALTER TABLE `viewusergv_khoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `viewusergv_lhp`
--
ALTER TABLE `viewusergv_lhp`
  MODIFY `maview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD CONSTRAINT `bangdiem_ibfk_2` FOREIGN KEY (`malhp`) REFERENCES `qllophocphan` (`malhp`),
  ADD CONSTRAINT `bangdiem_ibfk_3` FOREIGN KEY (`masv`) REFERENCES `usersv` (`idsv`),
  ADD CONSTRAINT `bangdiem_ibfk_5` FOREIGN KEY (`mahp`) REFERENCES `qlhocphan` (`mahp`),
  ADD CONSTRAINT `bangdiem_ibfk_6` FOREIGN KEY (`magv`) REFERENCES `usergv` (`idgv`);

--
-- Các ràng buộc cho bảng `qlhocphan`
--
ALTER TABLE `qlhocphan`
  ADD CONSTRAINT `qlhocphan_ibfk_1` FOREIGN KEY (`makhoa`) REFERENCES `qlkhoa` (`idkhoa`);

--
-- Các ràng buộc cho bảng `qllophanhchinh`
--
ALTER TABLE `qllophanhchinh`
  ADD CONSTRAINT `qllophanhchinh_ibfk_1` FOREIGN KEY (`makhoa`) REFERENCES `qlkhoa` (`idkhoa`);

--
-- Các ràng buộc cho bảng `qllophocphan`
--
ALTER TABLE `qllophocphan`
  ADD CONSTRAINT `qllophocphan_ibfk_1` FOREIGN KEY (`mahp`) REFERENCES `qlhocphan` (`mahp`);

--
-- Các ràng buộc cho bảng `usersv`
--
ALTER TABLE `usersv`
  ADD CONSTRAINT `usersv_ibfk_1` FOREIGN KEY (`malhc`) REFERENCES `qllophanhchinh` (`idlhc`);

--
-- Các ràng buộc cho bảng `viewusergv_khoa`
--
ALTER TABLE `viewusergv_khoa`
  ADD CONSTRAINT `viewusergv_khoa_ibfk_2` FOREIGN KEY (`magv`) REFERENCES `usergv` (`idgv`),
  ADD CONSTRAINT `viewusergv_khoa_ibfk_3` FOREIGN KEY (`makhoa`) REFERENCES `qlkhoa` (`idkhoa`),
  ADD CONSTRAINT `viewusergv_khoa_ibfk_4` FOREIGN KEY (`malhc`) REFERENCES `qllophanhchinh` (`idlhc`);

--
-- Các ràng buộc cho bảng `viewusergv_lhp`
--
ALTER TABLE `viewusergv_lhp`
  ADD CONSTRAINT `viewusergv_lhp_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `usergv` (`idgv`),
  ADD CONSTRAINT `viewusergv_lhp_ibfk_2` FOREIGN KEY (`malhp`) REFERENCES `qllophocphan` (`malhp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
