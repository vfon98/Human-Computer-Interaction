-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 12:00 PM
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
(40, 'captain', 'ab334feeb31c05124cb73fa12571c2f6', 'student'),
(42, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'student'),
(41, 'dmmchau', 'f635d7d6800a199e035c98457582603e', 'student'),
(7, 'dungrua', 'cfbabadf4ac3d677ef3972dff9fad18e', 'student'),
(23, 'hqnghi', 'f23842d328c526c9c463f2b5cc2a4b59', 'teacher'),
(22, 'hxhiep', 'f602de1cc3d1bac4897f4ef257d1d29f', 'teacher'),
(30, 'ltkbinh', '17e66d2461c981a472fbcb5cc181167b', 'student'),
(32, 'ltminh', 'ce507cc68d27d3713990eb3d18864392', 'student'),
(3, 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager'),
(8, 'manager2', '8df5127cd164b5bc2d2b78410a7eea0c', 'manager'),
(37, 'nbnhat', '2469e8ec14d57446b647e94a5f54af44', 'student'),
(2, 'nguyenvan', 'e7fab94348aa85c3043f077a75d2f395', 'student'),
(9, 'nmnhat', '73c4eade589a95de502b2ad0db9f61e9', 'student'),
(11, 'ntthanh', '2c0813259df4854e1cbe0b61bff8b5d5', 'student'),
(33, 'nvtuan', '6be80cfdde24a2b17b5878a707f34e53', 'student'),
(24, 'pnquyen', 'e3a63fb1b4d787383ad0608409ddc19e', 'teacher'),
(34, 'sjfl', '70c53e7d4ffc3d77b565bb3dcdb2d6b4', 'student'),
(29, 'student', 'cd73502828457d15655bbd7a63fb0bc8', 'student'),
(18, 'student2', '213ee683360d88249109c2f92789dbc3', 'student'),
(26, 'student3', '8e4947690532bc44a8e41e9fb365b76a', 'student'),
(38, 'tcan', '7fca4e2331b1068a3f4fe6d143590c3e', 'teacher'),
(6, 'teacher', '8d788385431273d11e8b43bb78f3aa41', 'teacher'),
(36, 'testacc', '098f6bcd4621d373cade4e832627b4f6', 'student'),
(39, 'thanos', '2c6c2b29fa7a56495478e7198ce1d1ef', 'student'),
(21, 'tmthai', '582ef9be8355765f866662a651fc60c7', 'teacher'),
(31, 'vfon', 'ce02d3432b2e141028715cd66d55ce88', 'student'),
(5, 'vhtram', 'e901c4278258ad9166619d017fe4fea0', 'teacher'),
(28, 'vtsang', '2b8cdaa23b4b7307c2124037fd515cb5', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `begin_at` date DEFAULT curdate(),
  `end_at` date DEFAULT curdate(),
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `begin_at`, `end_at`, `student_id`, `created_at`) VALUES
(5, 'Kỹ năng mềm', '2015-01-01', '2016-01-01', 14, '2019-09-09 08:14:59'),
(6, 'Kỹ năng cứng', '2015-01-01', '2016-01-01', 14, '2019-09-09 08:21:10'),
(7, 'Lập trình căn bản', '2015-02-17', '2016-01-05', 14, '2019-09-09 08:21:44'),
(8, 'Kỹ năng mềm', '2015-01-01', '2016-01-01', 15, '2019-09-10 09:40:17'),
(9, 'Kỹ năng mềm', '2015-01-01', '2016-01-01', 17, '2019-09-11 03:52:17'),
(10, 'Kỹ năng cứng', '2015-01-01', '2016-01-01', 17, '2019-09-11 03:52:20'),
(11, 'Kỹ năng mềm', '2015-01-01', '2016-01-01', 18, '2019-09-11 04:02:40'),
(15, 'Kỹ năng mềm', '2015-01-01', '2016-01-01', 23, '2019-10-01 15:00:28'),
(17, 'Kỹ năng mềm', '2015-01-01', '2016-01-01', 30, '2019-10-02 02:19:17'),
(18, 'Kỹ năng cứng', '2015-01-01', '2016-01-01', 30, '2019-10-02 02:19:39'),
(19, 'Kỹ năng mềm', '2015-01-01', '2016-01-01', 33, '2019-10-02 03:04:08');

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
(7, 'Lập trình viên Android', '4.5 năm', '2019-08-31', '7000000', 'manager'),
(8, 'Lập trình viên IOS', '4 năm', '2019-08-31', '7000000', 'manager'),
(9, 'Lập trình viên Web', '4 năm', '2019-08-31', '7000000', 'manager'),
(12, 'Lập trình viên quốc tế', '4.5 năm', '2019-08-25', '6000000', 'manager2'),
(13, 'Lập trình viên Python', '4.5 năm', '2019-06-25', '6000000', 'manager');

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
  `is_graduated` bit(1) DEFAULT b'0',
  `avg_mark` float DEFAULT NULL
) ;

--
-- Dumping data for table `program_student`
--

INSERT INTO `program_student` (`id`, `program_id`, `student_id`, `status`, `is_paid`, `is_extra`, `is_graduated`, `avg_mark`, `created_at`) VALUES
(1, 1, 1, 'Đăng ký', b'0', b'0', b'0', NULL, '2019-09-11 14:54:43'),
(3, 4, 7, 'Đăng ký', b'0', b'0', b'0', NULL, '2019-09-11 14:54:43'),
(16, 2, 16, 'Đăng ký', b'0', b'0', b'0', NULL, '2019-09-11 14:54:43'),
(20, 3, 18, 'Đăng ký', b'1', b'0', b'0', NULL, '2019-09-11 14:54:43'),
(32, 5, 18, 'Tạm hoãn', b'1', b'1', b'0', NULL, '2019-09-12 03:02:34'),
(33, 3, 20, 'Đăng ký', b'0', b'0', b'0', NULL, '2019-09-12 03:03:41'),
(34, 2, 18, 'Tạm hoãn', b'1', b'1', b'0', NULL, '2019-09-12 03:35:39'),
(35, 3, 21, 'Đăng ký', b'1', b'0', b'1', 7.08, '2019-09-14 12:18:08'),
(36, 3, 22, 'Đăng ký', b'0', b'0', b'0', NULL, '2019-09-14 12:18:50'),
(37, 4, 23, 'Tạm hoãn', b'1', b'0', b'0', NULL, '2019-09-18 01:43:29'),
(38, 8, 23, 'Tạm hoãn', b'1', b'1', b'0', NULL, '2019-09-18 01:46:41'),
(39, 3, 23, 'Đăng ký', b'1', b'1', b'1', 7.43, '2019-09-18 01:47:35'),
(40, 5, 24, 'Đăng ký', b'0', b'0', b'0', NULL, '2019-09-18 02:05:05'),
(41, 2, 25, 'Đăng ký', b'0', b'0', b'0', NULL, '2019-09-18 02:06:38'),
(42, 6, 21, 'Tạm hoãn', b'1', b'1', b'0', NULL, '2019-09-21 04:38:48'),
(43, 1, 26, 'Đăng ký', b'0', b'0', b'0', NULL, '2019-09-27 08:41:13'),
(45, 12, 28, 'Tạm hoãn', b'1', b'0', b'0', NULL, '2019-09-27 08:46:31'),
(46, 3, 28, 'Tạm hoãn', b'1', b'1', b'0', NULL, '2019-09-27 08:49:16'),
(47, 4, 28, 'Tạm hoãn', b'1', b'1', b'0', NULL, '2019-09-27 08:50:45'),
(48, 5, 28, 'Đăng ký', b'1', b'1', b'0', NULL, '2019-09-27 08:52:04'),
(49, 1, 28, 'Tạm hoãn', b'1', b'1', b'0', NULL, '2019-09-27 08:59:43'),
(50, 2, 28, 'Tạm hoãn', b'1', b'1', b'0', NULL, '2019-09-27 09:04:16'),
(51, 8, 28, 'Tạm hoãn', b'0', b'1', b'0', NULL, '2019-09-27 09:15:37'),
(52, 5, 29, 'Có ý thích', b'0', b'0', b'0', NULL, '2019-09-28 09:24:52'),
(53, 13, 30, 'Tạm hoãn', b'1', b'0', b'0', NULL, '2019-10-02 01:40:47'),
(54, 12, 30, 'Đăng ký', b'1', b'1', b'1', 6.13, '2019-10-02 01:49:50'),
(55, 7, 30, 'Có ý thích', b'0', b'1', b'0', NULL, '2019-10-02 02:23:22'),
(56, 8, 31, 'Có ý thích', b'0', b'0', b'0', NULL, '2019-10-02 02:28:25'),
(57, 13, 32, 'Có ý thích', b'0', b'0', b'0', NULL, '2019-10-02 02:31:12'),
(58, 9, 33, 'Đăng ký', b'1', b'0', b'1', 7, '2019-10-02 03:02:34'),
(59, 3, 33, 'Có ý thích', b'0', b'1', b'0', NULL, '2019-10-02 03:04:16');

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
(40, 3, 6),
(41, 8, 8),
(42, 8, 9),
(43, 8, 10),
(44, 8, 11),
(45, 13, 6),
(46, 13, 7),
(47, 13, 10),
(48, 13, 11);

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
(21, 'Nguyễn Học Sinh', '1999-10-03', 'nhsinh@gmail.com', 'Đồng Tháp', 'student', '2019-09-14 12:18:08'),
(22, 'Lê T.K Bình', '1998-01-01', 'example@mail.com', 'Sóc Trăng', 'ltkbinh', '2019-09-14 12:18:50'),
(23, 'Nguyễn Văn B', '1999-04-25', 'nvb@mail.com', 'Bến Tre', 'vfon', '2019-09-18 01:43:29'),
(24, 'Lê Tuệ Minh', '1999-01-01', 'ltminh@mail.com', 'Cà Mau', 'ltminh', '2019-09-18 02:05:04'),
(25, 'Nguyễn Văn Tuấn', '1997-01-01', 'ngc@mail.com', 'Cần Thơ', 'nvtuan', '2019-09-18 02:06:37'),
(26, 'sfjklj', '1999-01-01', 'example@mail.com', 'dflj', 'sjfl', '2019-09-27 08:41:13'),
(28, 'Test', '1999-01-01', 'example@mail.com', 'klj', 'testacc', '2019-09-27 08:46:30'),
(29, 'Nguyễn Bá Nhật', '1999-01-01', 'nbnaht@mail.com', 'An Giang', 'nbnhat', '2019-09-28 09:24:52'),
(30, 'Tha Văn Nốt', '1990-01-01', 'thanos@mail.com', 'Titan', 'thanos', '2019-10-02 01:40:47'),
(31, 'Cáp Văn Tần', '1999-01-01', 'captain@mail.com', 'America', 'captain', '2019-10-02 02:28:24'),
(32, 'D.M Minh Châu', '1999-01-01', 'dmmchau@mail.com', 'Bến Tre', 'dmmchau', '2019-10-02 02:31:12'),
(33, 'De Van MO', '1999-01-01', 'demo@mail.com', 'Vietnam', 'demo', '2019-10-02 03:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `mark` float DEFAULT NULL
) ;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`id`, `student_id`, `subject_id`, `mark`, `count`) VALUES
(1, 18, 2, 1, 1),
(2, 21, 2, 6.5, 1),
(3, 22, 2, 7, 1),
(4, 18, 5, 7, 1),
(6, 22, 5, 8, 1),
(7, 18, 1, 0, 1),
(8, 21, 1, 5.4, 2),
(9, 22, 1, 8, 1),
(10, 18, 3, 2, 1),
(12, 22, 3, 4, 1),
(13, 18, 6, 4, 1),
(14, 21, 6, 5.5, 2),
(15, 22, 6, 6.3, 1),
(16, 23, 1, 5.5, 2),
(17, 23, 6, 6.4, 1),
(25, 25, 2, 6, 1),
(26, 24, 2, 7, 1),
(27, 23, 2, 8, 1),
(28, 21, 5, 7, 1),
(29, 23, 5, 5.5, 2),
(38, 25, 3, 4, 1),
(39, 21, 3, 5.5, 2),
(40, 23, 3, 5.5, 2),
(41, 24, 3, 7, 1),
(48, 24, 4, 6, 1),
(50, 23, 4, 5.5, 2),
(51, 21, 4, 5.5, 2),
(60, 25, 1, 5, 1),
(61, 24, 1, 6, 1),
(110, 20, 5, 6, 1),
(114, 1, 6, 2.6, 1),
(125, 26, 6, 3.6, 1),
(155, 30, 2, 6, 1),
(163, 30, 1, 7, 1),
(169, 30, 4, 5.5, 2),
(178, 33, 1, 5.5, 2),
(184, 33, 4, 5.5, 2),
(194, 33, 3, 5.5, 2),
(198, 33, 2, 5.5, 2);

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
(10, 'CT010', 'Lập trình di động', 2, '2019-09-12'),
(11, 'CT011', 'Lập trình Python', 6, '2019-09-28');

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
(2, 'Ths. Nguyễn Giáo Viên', 'ngv@ctu.edu.vn', 'teacher', '2019-08-31'),
(3, 'TS. Trương Minh Thái', 'tmthai@ctu.edu.vn', 'tmthai', '2019-09-11'),
(4, 'PGs. TS. Huỳnh Xuân Hiệp', 'hxhiep@ctu.edu.vn', 'hxhiep', '2019-09-11'),
(5, 'TS. Huỳnh Quang Nghi', 'hqnghi@ctu.edu.vn', 'hqnghi', '2019-09-11'),
(6, 'Ths. Phạm Ngọc Quyền', 'pnquyen@ctu.edu.vn', 'pnquyen', '2019-09-11'),
(7, 'Ts. Trần Công Án', 'tcan@ctu.edu.vn', 'tcan', '2019-09-28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_registars_list`
-- (See below for the actual view)
--
CREATE TABLE `v_registars_list` (
`st_id` int(11)
,`st_name` varchar(50)
,`birthday` date
,`email` varchar(100)
,`address` varchar(200)
,`p_name` varchar(100)
,`created_at` timestamp
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_registars_list`
--
DROP TABLE IF EXISTS `v_registars_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_registars_list`  AS  select `st`.`id` AS `st_id`,`st`.`name` AS `st_name`,`st`.`birthday` AS `birthday`,`st`.`email` AS `email`,`st`.`address` AS `address`,`p`.`name` AS `p_name`,`st`.`created_at` AS `created_at`,`ps`.`status` AS `status` from ((`students` `st` join `program_student` `ps`) join `programs` `p` on(`st`.`id` = `ps`.`student_id` and `ps`.`program_id` = `p`.`id`)) where `ps`.`status` = 'Có ý thích' ;

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
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD KEY `id` (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `program_student`
--
ALTER TABLE `program_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_subject`
--
ALTER TABLE `program_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
