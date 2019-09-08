-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 01:31 PM
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
(3, 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager'),
(8, 'manager2', '8df5127cd164b5bc2d2b78410a7eea0c', 'manager'),
(2, 'nguyenvan', 'e7fab94348aa85c3043f077a75d2f395', 'student'),
(9, 'nmnhat', '73c4eade589a95de502b2ad0db9f61e9', 'student'),
(11, 'ntthanh', '2c0813259df4854e1cbe0b61bff8b5d5', 'student'),
(17, 'student', 'cd73502828457d15655bbd7a63fb0bc8', 'student'),
(6, 'teacher', '8d788385431273d11e8b43bb78f3aa41', 'teacher'),
(5, 'vhtram', 'e901c4278258ad9166619d017fe4fea0', 'teacher');

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
  `is_paid` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_student`
--

INSERT INTO `program_student` (`id`, `program_id`, `student_id`, `status`, `is_paid`) VALUES
(1, 1, 1, 'Có ý thích', b'0'),
(3, 4, 7, 'Đăng ký', b'0'),
(10, 3, 14, 'Đăng ký', b'1');

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
(34, 12, 3),
(35, 12, 4);

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
(14, 'student', '1999-01-01', 'mail@mail.com', 'Cần Thơ', 'student', '2019-09-08 08:45:50');

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
(6, 'CT006', 'Lập trình nhúng', 1, '2019-09-05');

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
(2, 'Nguyễn Giáo Viên', 'gv@ctu.edu.vn', 'teacher', '2019-08-31');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `program_student`
--
ALTER TABLE `program_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `program_subject`
--
ALTER TABLE `program_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
