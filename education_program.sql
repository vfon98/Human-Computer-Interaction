-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 10:45 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education_program`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `role`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(7, 'dungrua', 'cfbabadf4ac3d677ef3972dff9fad18e', 'student'),
(23, 'hqnghi', 'f23842d328c526c9c463f2b5cc2a4b59', 'teacher'),
(22, 'hxhiep', 'f602de1cc3d1bac4897f4ef257d1d29f', 'teacher'),
(30, 'ltkbinh', '17e66d2461c981a472fbcb5cc181167b', 'student'),
(32, 'ltminh', 'ce507cc68d27d3713990eb3d18864392', 'student'),
(3, 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager'),
(8, 'manager2', '8df5127cd164b5bc2d2b78410a7eea0c', 'manager'),
(2, 'nguyenvan', 'e7fab94348aa85c3043f077a75d2f395', 'student'),
(9, 'nmnhat', '73c4eade589a95de502b2ad0db9f61e9', 'student'),
(11, 'ntthanh', '2c0813259df4854e1cbe0b61bff8b5d5', 'student'),
(33, 'nvtuan', '6be80cfdde24a2b17b5878a707f34e53', 'student'),
(24, 'pnquyen', 'e3a63fb1b4d787383ad0608409ddc19e', 'teacher'),
(29, 'student', 'cd73502828457d15655bbd7a63fb0bc8', 'student'),
(18, 'student2', '213ee683360d88249109c2f92789dbc3', 'student'),
(26, 'student3', '8e4947690532bc44a8e41e9fb365b76a', 'student'),
(6, 'teacher', '8d788385431273d11e8b43bb78f3aa41', 'teacher'),
(21, 'tmthai', '582ef9be8355765f866662a651fc60c7', 'teacher'),
(31, 'vfon', 'ce02d3432b2e141028715cd66d55ce88', 'student'),
(5, 'vhtram', 'e901c4278258ad9166619d017fe4fea0', 'teacher'),
(28, 'vtsang', '2b8cdaa23b4b7307c2124037fd515cb5', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `duration` varchar(50) DEFAULT '4 năm',
  `begin_at` date DEFAULT curdate(),
  `tuition` decimal(12,0) DEFAULT 0,
  `manager_acc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `duration`, `begin_at`, `tuition`, `manager_acc`) VALUES
(1, 'Kỹ sư công nghệ thông tin', '4 năm', '2019-08-31', '5600000', 'manager'),
(2, 'Kỹ sư phần cứng', '4 năm', '2019-08-31', '5500000', 'manager2'),
(3, 'Kỹ sư phần mềm', '4 năm', '2019-08-31', '5700000', 'manager'),
(4, 'Kỹ sư an toàn thông tin', '4 năm', '2019-08-31', '5800000', 'manager2'),
(5, 'Kỹ sư mạng máy tính', '4 năm', '2019-08-31', '5900000', 'manager'),
(6, 'Kỹ sư hệ thống thông tin', '4 năm', '2019-08-31', '6000000', 'manager2'),
(7, 'Lập trình viên Android', '4 năm', '2019-08-31', '7000000', 'manager'),
(8, 'Lập trình viên IOS', '4 năm', '2019-08-31', '7000000', 'manager'),
(9, 'Lập trình viên Web', '4 năm', '2019-08-31', '7000000', 'manager'),
(12, 'Lập trình viên quốc tế', '4.5 năm', '2019-08-25', '6000000', 'manager2');

-- --------------------------------------------------------

--
-- Table structure for table `program_student`
--

CREATE TABLE `program_student` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'Có ý thích',
  `is_paid` bit(1) DEFAULT b'0',
  `is_extra` bit(1) DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_student`
--

INSERT INTO `program_student` (`id`, `program_id`, `student_id`, `status`, `is_paid`, `is_extra`, `created_at`) VALUES
(1, 1, 1, 'Tạm hoãn', b'0', b'0', '2019-09-11 14:54:43'),
(3, 4, 7, 'Tạm hoãn', b'0', b'0', '2019-09-11 14:54:43'),
(16, 2, 16, 'Tạm hoãn', b'0', b'0', '2019-09-11 14:54:43'),
(20, 3, 18, 'Tạm hoãn', b'1', b'0', '2019-09-11 14:54:43'),
(32, 5, 18, 'Tạm hoãn', b'1', b'1', '2019-09-12 03:02:34'),
(33, 3, 20, 'Có ý thích', b'0', b'0', '2019-09-12 03:03:41'),
(34, 2, 18, 'Có ý thích', b'1', b'1', '2019-09-12 03:35:39'),
(35, 3, 21, 'Đăng ký', b'1', b'0', '2019-09-14 12:18:08'),
(36, 3, 22, 'Tạm hoãn', b'0', b'0', '2019-09-14 12:18:50'),
(37, 4, 23, 'Tạm hoãn', b'1', b'0', '2019-09-18 01:43:29'),
(38, 8, 23, 'Tạm hoãn', b'1', b'1', '2019-09-18 01:46:41'),
(39, 3, 23, 'Đăng ký', b'1', b'1', '2019-09-18 01:47:35'),
(40, 5, 24, 'Đăng ký', b'0', b'0', '2019-09-18 02:05:05'),
(41, 2, 25, 'Đăng ký', b'0', b'0', '2019-09-18 02:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `program_subject`
--

CREATE TABLE `program_subject` (
  `id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_subject`
--

INSERT INTO `program_subject` (`id`, `program_id`, `subject_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 2),
(5, 2, 1),
(6, 5, 1),
(7, 5, 2),
(8, 3, 3),
(9, 6, 4),
(10, 6, 1),
(11, 6, 2),
(13, 9, 1),
(14, 9, 2),
(15, 9, 3),
(16, 9, 4),
(17, 5, 3),
(18, 5, 4),
(20, 1, 4),
(21, 7, 3),
(22, 7, 4),
(24, 7, 2),
(25, 1, 6),
(32, 12, 1),
(33, 12, 2),
(34, 12, 2),
(35, 12, 4),
(36, 3, 1),
(37, 3, 2),
(38, 3, 4),
(39, 3, 5),
(40, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `birthday`, `email`, `address`, `username`, `created_at`) VALUES
(1, 'Nguyễn Văn A', '1998-04-25', 'mail@mail.com', 'Cần Thơ', 'nguyenvan', '2019-08-31 09:22:07'),
(4, 'Nguyễn Trung Dũng', '1996-12-24', 'dung@mail.com', 'Hậu Giang', 'dungrua', '2019-09-02 02:42:48'),
(5, 'Nguyễn Minh Nhật', '1999-08-25', 'mail@mail.com', 'An Giang', 'nmnhat', '2019-09-07 13:05:48'),
(7, 'Nguyễn Tấn Thành', '1996-08-25', 'thanh@mail.com', 'Cà Mau', 'ntthanh', '2019-09-07 13:34:57'),
(16, 'Nguyễn Học Sinh', '1999-01-01', 'mail@mail.com', 'Vĩnh Long', 'student2', '2019-09-10 10:22:46'),
(17, 'Nguyễn Trường An', '1999-01-01', 'an@mail.com', 'Hậu Giang', 'truongan', '2019-09-11 03:50:51'),
(18, 'Tô Vủ Phong', '1999-01-01', 'vfon98@gmail.com', 'Can Tho', 'student3', '2019-09-11 04:01:28'),
(20, 'Võ Tấn Sang', '1999-01-01', 'vts@mail.com', 'Đồng Tháp', 'vtsang', '2019-09-12 03:03:41'),
(21, 'Nguyễn Học Sinh', '1999-01-01', 'nhsinh@mail.com', 'Long An', 'student', '2019-09-14 12:18:08'),
(22, 'Lê T.K Bình', '1998-01-01', 'example@mail.com', 'Sóc Trăng', 'ltkbinh', '2019-09-14 12:18:50'),
(23, 'Nguyễn Văn B', '1999-04-25', 'nvb@mail.com', 'Bến Tre', 'vfon', '2019-09-18 01:43:29'),
(24, 'Lê Tuệ Minh', '1999-01-01', 'ltminh@mail.com', 'Cà Mau', 'ltminh', '2019-09-18 02:05:04'),
(25, 'Nguyễn Văn Tuấn', '1997-01-01', 'ngc@mail.com', 'Cần Thơ', 'nvtuan', '2019-09-18 02:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `sub_id` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sub_id`, `name`, `teacher_id`, `created_at`) VALUES
(1, 'CT001', 'Lập trình C', 1, '2019-09-01'),
(2, 'CT002', 'Lập trình C++', 2, '2019-09-01'),
(3, 'CT003', 'Lập trình C#', 1, '2019-09-01'),
(4, 'CT004', 'Lập trình Java', 1, '2019-09-02'),
(5, 'CT005', 'Lập trình OOP', 2, '2019-09-05'),
(6, 'CT006', 'Lập trình nhúng', 1, '2019-09-05'),
(7, 'CT007', 'Cấu trúc dữ liệu', 4, '2019-09-11'),
(8, 'CT008', 'Lý thuyết đồ thị', 2, '2019-09-12'),
(9, 'CT009', 'Lập trình mạng', 2, '2019-09-12'),
(10, 'CT010', 'Lập trình di động', 2, '2019-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `username`, `created_at`) VALUES
(1, 'Võ Huỳnh Trâm', 'vhtram@ctu.edu.vn', 'vhtram', '2019-08-31'),
(2, 'Nguyễn Giáo Viên', 'gv@ctu.edu.vn', 'teacher', '2019-08-31'),
(3, 'TS. Trương Minh Thái', 'tmthai@ctu.edu.vn', 'tmthai', '2019-09-11'),
(4, 'PGs. TS. Huỳnh Xuân Hiệp', 'hxhiep@ctu.edu.vn', 'hxhiep', '2019-09-11'),
(5, 'TS. Huỳnh Quang Nghi', 'hqnghi@ctu.edu.vn', 'hqnghi', '2019-09-11'),
(6, 'Ths. Phạm Ngọc Quyền', 'pnquyen@ctu.edu.vn', 'pnquyen', '2019-09-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD KEY `id` (`id`);

--
-- Indexes for table `program_student`
--
ALTER TABLE `program_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_subject`
--
ALTER TABLE `program_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `program_student`
--
ALTER TABLE `program_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `program_subject`
--
ALTER TABLE `program_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
