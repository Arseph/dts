-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 02:03 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `documenttrackingsystem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `bday` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `department`, `firstname`, `lastname`, `usertype`, `bday`, `email`, `username`, `password`, `confirm_password`, `phone_number`, `address`) VALUES
(142, 'BACOMM Department', 'Juan', 'Dela Cruz', 'Administrator', '1998-05-22 00:00:00', 'juan.delacruz@gmail.com', 'admin', 'admin123', '@Admin123', 9765544556, 'Cot');

-- --------------------------------------------------------

--
-- Table structure for table `admin_fileupload`
--

CREATE TABLE `admin_fileupload` (
  `id` int(50) NOT NULL,
  `tracking_no` text CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_description` varchar(255) NOT NULL,
  `select_date` date NOT NULL,
  `attach_file` varchar(255) NOT NULL,
  `type_document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_fileupload`
--

INSERT INTO `admin_fileupload` (`id`, `tracking_no`, `file_name`, `file_description`, `select_date`, `attach_file`, `type_document`) VALUES
(162, '2560290783', 'icon', 'light bulb', '2021-10-17', '9172-lightbulb.png', 'Unclassified'),
(165, '3000302132', 'file2', 'file2', '2021-10-17', '8892-Cartoon Buttons Set Game_.jpg', 'Unclassified'),
(166, '797640697', 'file3', 'file3', '2021-10-17', '5661-lightbulb.png', 'Unclassified'),
(167, '432757458', 'file4', 'file4', '2021-10-17', '3396-Remini20211013222113234.jpg', 'Excuse Letter'),
(168, '8961832415', 'file10', 'file10', '2021-10-17', '2794-Home Screen Done Right — David and Leanna.jpg', 'Unclassified'),
(183, '2852186494', 's', 's', '2021-10-20', '6372-logo.png', 'eee');

-- --------------------------------------------------------

--
-- Table structure for table `batch_upload`
--

CREATE TABLE `batch_upload` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `bday` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch_upload`
--

INSERT INTO `batch_upload` (`id`, `department`, `fullname`, `bday`, `email`, `username`, `password`, `phone_number`, `address`) VALUES
(150, 'THM Department', 'Bagundang, Zarah Mae G.', '0000-00-00 00:00:00', 'zarah@gmail.com', 'bagundang123', 'bagundang123', 9751777788, 'Brgy. RH-10 Maguindanao'),
(151, 'ICT Department', 'Daud, Sitty-Nor Shaina D.', '0000-00-00 00:00:00', 'shaina@gmail.com', 'daud123', 'daud123', 9653211456, 'Brgy. RH-10 Maguindanao'),
(152, 'GE Department', 'Lim, Danielle A.', '0000-00-00 00:00:00', 'danielle@gmail.com', 'lim123', 'lim123', 9851123415, 'Brgy. RH-10 Maguindanao'),
(153, 'SSW Department', 'Maghanoy, Sheena Jean A.', '0000-00-00 00:00:00', 'sheena@gmail.com', 'maghanoy123', 'maghanoy123', 9665544332, 'Brgy. RH-10 Maguindanao'),
(154, 'BCE Department', 'Bayao, Manot K.', '0000-00-00 00:00:00', 'manot@gmail.com', 'bayao123', 'bayao123', 9891278990, 'Brgy. RH-10 Maguindanao'),
(155, 'Finance Department', 'Ventrusa, Shaina Mae O.', '0000-00-00 00:00:00', 'shaina.mae@gmail.com', 'ventrusa123', 'ventrusa123', 9886652134, 'Brgy. RH-10 Maguindanao'),
(156, 'BACOMM Department', 'Abdullah, Nurullajie A.', '0000-00-00 00:00:00', 'nurullajie@gmail.com', 'abdullah123', 'abdullah123', 9765622450, 'Brgy. RH-10 Maguindanao'),
(157, 'THM Department', 'Peterson, Collin C.', '0000-00-00 00:00:00', 'peterson@gmail.com', 'employee1', 'employee1', 9751777788, 'Brgy. RH-10 Maguindanao'),
(158, 'ICT Department', 'Smith, Joanna K.', '0000-00-00 00:00:00', 'smith@gmail.com', 'employee2', 'employee2', 9653211456, 'Brgy. RH-10 Maguindanao'),
(159, 'GE Department', 'Miller, Ashley J.', '0000-00-00 00:00:00', 'miller@gmail.com', 'employee3', 'employee3', 9851123415, 'Brgy. RH-10 Maguindanao'),
(160, 'SSW Department', 'Clark, Melody K.', '0000-00-00 00:00:00', 'clark@gmail.com', 'employee4', 'employee4', 9665544332, 'Brgy. RH-10 Maguindanao'),
(161, 'BCE Department', 'Jimmy, Frank S.', '0000-00-00 00:00:00', 'jimmy@gmail.com', 'employee5', 'employee5', 9891278990, 'Brgy. RH-10 Maguindanao'),
(162, 'Finance Department', 'Malinda, Roselynn A.', '0000-00-00 00:00:00', 'malinda@gmail.com', 'employee6', 'employee6', 9886652134, 'Brgy. RH-10 Maguindanao'),
(163, 'BACOMM Department', 'Cabayao, Grace L.', '0000-00-00 00:00:00', 'cabayao@gmail.com', 'employee7', 'employee7', 9765622450, 'Brgy. RH-10 Maguindanao'),
(164, 'SSW Department', 'Thomas, Johnson F.', '2034-09-02 00:00:00', 'thomas@gmail.com', 'employee8', 'employee8', 9057780809, 'Brgy. RH-10 Maguindanao'),
(165, 'THM Department', 'Butler, Jimmy B.', '0000-00-00 00:00:00', 'butler@gmail.com', 'employee9', 'employee9', 9067442119, 'Brgy. RH-10 Maguindanao'),
(166, 'ICT Department', 'Curtis, Bella P.', '0000-00-00 00:00:00', 'curtis@gmail.com', 'employee10', 'employee10', 9653676089, 'Brgy. RH-10 Maguindanao'),
(167, 'GE Department', 'Norris, Hermoso A.', '0000-00-00 00:00:00', 'norris@gmail.com', 'employee11', 'employee11', 9754321220, 'Brgy. RH-10 Maguindanao'),
(168, 'BACOMM Department', 'Coleman, Kennet V.', '2035-06-06 00:00:00', 'coleman@gmail.com', 'employee12', 'employee12', 9609080701, 'Brgy. RH-10 Maguindanao');

-- --------------------------------------------------------

--
-- Table structure for table `department_users`
--

CREATE TABLE `department_users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `bday` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_users`
--

INSERT INTO `department_users` (`user_id`, `fullname`, `department`, `usertype`, `bday`, `email`, `username`, `password`, `confirm_password`, `phone_number`, `address`) VALUES
(1016, 'Coleman, Kennet V.', 'BACOMM Department', 'Department Head', '2021-10-10 11:21:58', 'coleman@gmail.com', 'employee12', 'employee12', '', 9609080701, ''),
(1017, 'Maghanoy, Sheena Jean A.', 'SSW Department', 'Department Head', '2021-10-10 11:27:30', 'sheena@gmail.com', 'maghanoy123', 'maghanoy123', '', 9665544332, ''),
(1018, 'Abdullah, Nurullajie A.', 'ICT Department', 'Department Head', '2021-10-12 23:06:06', 'nurullajie@gmail.com', 'abdullah123', 'abdullah123', '', 9765622450, ''),
(1019, 'Bagundang, Zarah Mae G.', 'THM Department', 'Department Head', '2021-10-13 14:15:24', 'zarah@gmail.com', 'bagundang123', 'bagundang123', '', 9751777788, ''),
(1020, 'Daud, Sitty-Nor Shaina D.', 'GE Department', 'Department Head', '2021-10-15 14:02:45', 'shaina@gmail.com', 'daud123', 'daud123', '', 9653211456, ''),
(1022, 'Ventrusa, Shaina Mae O.', 'Finance Department', 'Department Head', '2021-10-17 01:07:55', 'shaina.mae@gmail.com', 'ventrusa123', 'ventrusa123', '', 9886652134, ''),
(1023, 'Bayao, Manot K.', 'BCE Department', 'Department Head', '2021-10-17 13:52:53', 'manot@gmail.com', 'bayao123', 'bayao123', '', 9891278990, ''),
(1024, 'Bayao, Manot K.', 'BCE Department', 'Department Head', '2021-10-17 13:52:53', 'manot@gmail.com', 'bayao123', 'bayao123', '', 9891278990, ''),
(1025, 'Ventrusa, Shaina Mae O.', 'Finance Department', 'Department Head', '2021-10-17 13:53:01', 'shaina.mae@gmail.com', 'ventrusa123', 'ventrusa123', '', 9886652134, ''),
(1027, 'Bayao, Manot K.', 'BCE Department', 'Department Head', '2021-10-17 13:52:53', 'manot@gmail.com', 'bayao123', 'bayao123', '', 9891278990, ''),
(1028, 'Ventrusa, Shaina Mae O.', 'Finance Department', 'Department Head', '2021-10-17 13:53:01', 'shaina.mae@gmail.com', 'ventrusa123', 'ventrusa123', '', 9886652134, ''),
(1030, 'Butler, Jimmy B.', 'THM Department', 'Department Head', '2021-10-17 13:58:47', 'butler@gmail.com', 'employee9', 'employee9', '', 9067442119, ''),
(1031, 'Butler, Jimmy B.', 'THM Department', 'Department Head', '2021-10-17 13:58:47', 'butler@gmail.com', 'employee9', 'employee9', '', 9067442119, ''),
(1032, 'Bayao, Manot K.', 'BCE Department', 'Department Head', '2021-10-17 13:58:55', 'manot@gmail.com', 'bayao123', 'bayao123', '', 9891278990, ''),
(1034, 'Butler, Jimmy B.', 'THM Department', 'Department Head', '2021-10-17 13:58:47', 'butler@gmail.com', 'employee9', 'employee9', '', 9067442119, ''),
(1035, 'Bayao, Manot K.', 'BCE Department', 'Department Head', '2021-10-17 13:58:55', 'manot@gmail.com', 'bayao123', 'bayao123', '', 9891278990, ''),
(1036, 'Bagundang, Zarah Mae G.', 'GE Department', 'Department Head', '2021-10-17 13:59:05', 'zarah@gmail.com', 'bagundang123', 'bagundang123', '', 9751777788, ''),
(1037, 'Butler, Jimmy B.', 'THM Department', 'Department Head', '2021-10-17 13:58:47', 'butler@gmail.com', 'employee9', 'employee9', '', 9067442119, ''),
(1038, 'Bayao, Manot K.', 'BCE Department', 'Department Head', '2021-10-17 13:58:55', 'manot@gmail.com', 'bayao123', 'bayao123', '', 9891278990, ''),
(1039, 'Bagundang, Zarah Mae G.', 'GE Department', 'Department Head', '2021-10-17 13:59:05', 'zarah@gmail.com', 'bagundang123', 'bagundang123', '', 9751777788, ''),
(1040, 'Clark, Melody K.', 'SSW Department', 'Department Head', '2021-10-17 13:59:12', 'clark@gmail.com', 'employee4', 'employee4', '', 9665544332, ''),
(1041, 'Butler, Jimmy B.', 'THM Department', 'Department Head', '2021-10-17 13:58:47', 'butler@gmail.com', 'employee9', 'employee9', '', 9067442119, ''),
(1042, 'Butler, Jimmy B.', 'THM Department', 'Department Head', '2021-10-17 13:58:47', 'butler@gmail.com', 'employee9', 'employee9', '', 9067442119, ''),
(1043, 'Butler, Jimmy B.', 'THM Department', 'Department Head', '2021-10-17 13:58:47', 'butler@gmail.com', 'employee9', 'employee9', '', 9067442119, ''),
(1044, 'Ventrusa, Shaina Mae O.', 'Finance Department', 'Department Head', '2021-10-19 12:18:26', 'shaina.mae@gmail.com', 'ventrusa123', 'ventrusa123', '', 9886652134, ''),
(1045, 'Butler, Jimmy B.', 'THM Department', 'Department Head', '2021-10-17 13:58:47', 'butler@gmail.com', 'employee9', 'employee9', '', 9067442119, ''),
(1046, 'Ventrusa, Shaina Mae O.', 'Finance Department', 'Department Head', '2021-10-19 12:18:26', 'shaina.mae@gmail.com', 'ventrusa123', 'ventrusa123', '', 9886652134, ''),
(1047, 'Daud, Sitty-Nor Shaina D.', 'ICT Department', 'Department Head', '2021-10-20 13:12:46', 'shaina@gmail.com', 'daud123', 'daud123', '', 9653211456, '');

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE `file_upload` (
  `id` int(50) NOT NULL,
  `tracking_no` text CHARACTER SET utf8 NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_description` varchar(255) NOT NULL,
  `select_date` date NOT NULL,
  `department` varchar(255) NOT NULL,
  `attach_file` varchar(255) NOT NULL,
  `type_document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`id`, `tracking_no`, `file_name`, `file_description`, `select_date`, `department`, `attach_file`, `type_document`) VALUES
(105, '6539586830', 'Assessment', 'Evaluation', '2021-08-24', 'bacomm', '1813-', 'moa'),
(144, '4166683720', 'Mancao', 'Assignment in physics', '2021-08-30', '', '6504-logo.png', 'Social Science'),
(146, '2844121801', 'musika', 'n/a', '2021-09-17', '', '6873-logo.png', 'Unclassified'),
(147, '8826353833', 'dw', 'dwdw', '2021-09-18', '', '3754-logo.png', 'Approval of document'),
(149, '8774457573', 'dsd', 'dsd', '2021-09-18', '', '3778-2.png', 'Certificate of Service'),
(154, '3240987408', 'wd', 'ede', '2021-09-18', '', '7762-1.jpg', 'Memorandum of Agreement'),
(159, '2065506749', 'w', 'w', '2021-10-20', '', '8541-logo.png', 'eee'),
(160, '727046405', 'w', 'w', '2021-10-20', '', '4453-logo.png', 'ssf');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employee_code` text CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `bday` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `doc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `dept_id`, `user_id`, `employee_code`, `fullname`, `department`, `usertype`, `bday`, `email`, `username`, `password`, `confirm_password`, `phone_number`, `address`, `doc_id`) VALUES
(310, NULL, NULL, '47613476', 'Butler, Jimmy B.', 'THM Department', 'Department Head', '2021-10-17 13:58:47', 'butler@gmail.com', 'employee9', 'employee9', '', 9067442119, '', NULL),
(314, NULL, NULL, '69092830', 'Bagundang, Zarah Mae G.', 'THM Department', 'Employee', '2021-10-17 18:06:58', 'zarah@gmail.com', 'bagundang123', 'bagundang123', '', 9751777788, '', NULL),
(315, NULL, NULL, '40654662', 'Miller, Ashley J.', 'GE Department', 'Employee', '2021-10-17 18:07:42', 'miller@gmail.com', 'employee3', 'employee3', '', 9851123415, '', NULL),
(316, NULL, NULL, '15120759', 'Ventrusa, Shaina Mae O.', 'Finance Department', 'Department Head', '2021-10-19 12:18:26', 'shaina.mae@gmail.com', 'ventrusa123', 'ventrusa123', '', 9886652134, '', NULL),
(317, NULL, NULL, '13992161', 'Daud, Sitty-Nor Shaina D.', 'ICT Department', 'Department Head', '2021-10-20 13:12:46', 'shaina@gmail.com', 'daud123', 'daud123', '', 9653211456, '', NULL),
(318, NULL, NULL, '544786', 'Abdullah, Nurullajie A.', 'BACOMM Department', 'Receiving Officer', '2021-10-20 13:29:25', '@gmail.com', 'abdullah123', 'abdullah123', '', 9765622450, '', NULL),
(319, NULL, NULL, '5589573', 'Cabayao, Grace L.', 'ICT Department', 'Receiving Officer', '2021-10-20 13:30:39', '@gmail.com', 'employee7', 'employee7', '', 9765622450, '', NULL),
(320, NULL, NULL, '9293885', 'Curtis, Bella P.', 'ICT Department', 'Receiving Officer', '2021-10-20 13:31:45', '@gmail.com', 'employee10', 'employee10', '', 9653676089, '', NULL),
(322, NULL, NULL, '808481', 'Norris, Hermoso A.', 'ICT Department', 'Releasing Officer', '2021-10-20 14:54:02', '@gmail.com', 'employee11', 'employee11', '', 9754321220, '', NULL),
(323, NULL, NULL, '272998', 'Bayao, Manot K.', 'ICT Department', 'Releasing Officer', '2021-10-20 15:17:47', '@gmail.com', 'bayao123', 'bayao123', '', 9891278990, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dept_id` int(11) NOT NULL,
  `department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_id`, `department`) VALUES
(1, 'THM Department'),
(2, 'BACOMM Department'),
(3, 'ICT Department'),
(5, 'BCE Department'),
(6, 'SSW Department'),
(79, 'Finance Department'),
(92, 'GE Department');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `des_id` int(11) NOT NULL,
  `designation` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`des_id`, `designation`) VALUES
(1, 'Receiving Officer'),
(2, 'Releasing Officer'),
(3, 'Employee'),
(9, 'Department Head');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_typedocument`
--

CREATE TABLE `tbl_typedocument` (
  `id` int(11) NOT NULL,
  `type_document` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `doc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_typedocument`
--

INSERT INTO `tbl_typedocument` (`id`, `type_document`, `description`, `doc_id`) VALUES
(5, 'Financial Reports and Documents', 'finance', NULL),
(6, 'Business Letters', 'bus letters', NULL),
(7, 'Excuse Letter', 'No excuse letter = AWOL', NULL),
(8, 'Unclassified', 'unclassified document, files, images', NULL),
(20, 'Budget Plan', 'budget', NULL),
(21, 'ss', 'ss', NULL),
(23, 'ddd', 'ddd', NULL),
(24, 'eee', 'eee', NULL),
(25, 'ssf', 'ss', NULL),
(26, 's', 's', NULL),
(27, 'sdff', 'ffffg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_fileupload`
--
ALTER TABLE `admin_fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_upload`
--
ALTER TABLE `batch_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_users`
--
ALTER TABLE `department_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`des_id`);

--
-- Indexes for table `tbl_typedocument`
--
ALTER TABLE `tbl_typedocument`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_type` (`doc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `admin_fileupload`
--
ALTER TABLE `admin_fileupload`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `batch_upload`
--
ALTER TABLE `batch_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `department_users`
--
ALTER TABLE `department_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1048;

--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `des_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_typedocument`
--
ALTER TABLE `tbl_typedocument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `tbl_department` (`dept_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `department_users` (`user_id`),
  ADD CONSTRAINT `register_ibfk_3` FOREIGN KEY (`doc_id`) REFERENCES `tbl_typedocument` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_typedocument`
--
ALTER TABLE `tbl_typedocument`
  ADD CONSTRAINT `doc_type` FOREIGN KEY (`doc_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
