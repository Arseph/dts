-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 03:13 PM
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
  `imageProfile` varchar(255) NOT NULL,
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

INSERT INTO `admin_account` (`id`, `imageProfile`, `department`, `firstname`, `lastname`, `usertype`, `bday`, `email`, `username`, `password`, `confirm_password`, `phone_number`, `address`) VALUES
(142, '', 'BACOMM Department', 'Juan', 'Dela Cruz', 'Administrator', '1998-05-22 00:00:00', 'juan.delacruz@gmail.com', 'admin', 'admin123', '@Admin123', 9765544556, 'Cot');

-- --------------------------------------------------------

--
-- Table structure for table `admin_fileupload`
--

CREATE TABLE `admin_fileupload` (
  `id` int(50) NOT NULL,
  `user` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `tracking_no` text CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_description` varchar(255) NOT NULL,
  `select_date` date NOT NULL,
  `attach_file` varchar(255) NOT NULL,
  `type_document` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_notif_dept_sent`
--

CREATE TABLE `admin_notif_dept_sent` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `dept_sender` varchar(255) NOT NULL,
  `dept_releaser` varchar(255) NOT NULL,
  `name_sender` varchar(255) NOT NULL,
  `name_releaser` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_notif_received_file`
--

CREATE TABLE `admin_notif_received_file` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_notif_receiver`
--

CREATE TABLE `admin_notif_receiver` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `releaser` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_notif_releaser`
--

CREATE TABLE `admin_notif_releaser` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `dept_releaser` varchar(255) NOT NULL,
  `name_releaser` varchar(255) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `document` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_outgoing_file`
--

CREATE TABLE `admin_outgoing_file` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_receive_file`
--

CREATE TABLE `admin_receive_file` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `releaser_name` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 'Finance Department', 'xxx', '2021-10-28 15:06:41', 'xyz@yahoo.com', 'aaaaaa', '123456', 11111111111, 'x'),
(8, 'ICT Department', 'Smith, David A.', '2021-10-28 15:08:31', 'abc@yahoo.con', 'smith', '123456', 11111111111, 'x'),
(9, 'BACOMM Department', 'Kamid, Junaidin A.', '2021-10-28 15:10:01', 'kamid@gmail.com', 'kamid', '123456', 11111111111, 'x'),
(10, 'ICT Department', 'Abdullah, Nurullajie S.', '2021-10-28 15:24:03', 'ajie@gmail.com', 'nurullajieabdullah04', 'nurullajieabdullah04', 9891278990, 'Sultan Kudarat'),
(11, 'ICT Department', 'Bayao, Manot B.', '2021-10-28 15:24:04', 'bayao@gmail.com', 'manotbayao01', 'manotbayao01', 9751777788, 'Mother Bagua, RH12 Cotabato City'),
(12, 'ICT Department', 'Maghanoy, Sheena Jean L.', '2021-10-28 15:24:04', 'shee@gmail.com', 'sheenamaghanoy03', 'sheenamaghanoy03', 9851123415, 'Brgy. RH-10 Maguindanao'),
(13, 'THM Department', 'Ventrusa, Shaina Mae O.', '2021-10-28 15:24:04', 'shaina@gmail.com', 'shainaventrusa05', 'shainaventrusa05', 97655454545, 'Brgy. RH-12 Maguindanao'),
(14, 'THM Department', 'Bagundang, Zarah Mae G.', '2021-10-28 15:24:04', 'zarah@gmail.com', 'zarahbagundang06', 'zarahbagundang06', 9765546778, 'Brgy. RH-8 Maguindanao'),
(15, 'THM Department', 'Ali, Noria K.', '2021-10-28 15:50:31', 'noria@gmail.com', 'noria123', '123456', 11111111111, 'x');

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

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE `file_upload` (
  `id` int(50) NOT NULL,
  `user` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `tracking_no` text CHARACTER SET utf8 NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_description` varchar(255) NOT NULL,
  `select_date` varchar(250) NOT NULL,
  `department` varchar(255) NOT NULL,
  `attach_file` varchar(255) NOT NULL,
  `type_document` varchar(255) NOT NULL,
  `routedTo` varchar(255) NOT NULL,
  `pleaseNote` varchar(255) NOT NULL,
  `forYour` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notif_admin_receive_head`
--

CREATE TABLE `notif_admin_receive_head` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif_admin_receive_release`
--

CREATE TABLE `notif_admin_receive_release` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif_head_send_receive`
--

CREATE TABLE `notif_head_send_receive` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `releaser` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif_head_send_release`
--

CREATE TABLE `notif_head_send_release` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `releaser_id` int(11) NOT NULL,
  `releaser_name` varchar(255) DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif_receive`
--

CREATE TABLE `notif_receive` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `releaser_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `releaser_name` varchar(255) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif_receive_released`
--

CREATE TABLE `notif_receive_released` (
  `id` int(11) NOT NULL,
  `releaser_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif_release`
--

CREATE TABLE `notif_release` (
  `id` int(11) NOT NULL,
  `releaser_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receive_file`
--

CREATE TABLE `receive_file` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `releaser_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `releaser_name` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `imageProfile` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `bday` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `status` int(10) NOT NULL,
  `login_time` varchar(40) NOT NULL,
  `logout_time` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `dept_id`, `user_id`, `employee_code`, `fullname`, `imageProfile`, `department`, `usertype`, `bday`, `email`, `username`, `password`, `confirm_password`, `phone_number`, `address`, `doc_id`, `status`, `login_time`, `logout_time`) VALUES
(12, NULL, NULL, '78923125', 'Smith, David A.', '', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, '', NULL, 0, '', ''),
(13, NULL, NULL, '7214681', 'Bayao, Manot B.', '', 'ICT Department', 'Receiving Officer', '2021-11-24 15:53:48', '@gmail.com', 'manotbayao01', 'manotbayao01', '', 9751777788, '', NULL, 0, '', ''),
(14, NULL, NULL, '8008354', 'Abdullah, Nurullajie S.', '', 'ICT Department', 'Releasing Officer', '2021-11-24 15:48:44', '@gmail.com', 'nurullajieabdullah04', 'nurullajieabdullah04', '', 9891278990, '', NULL, 0, '', ''),
(15, NULL, NULL, '38611229', 'Ali, Noria K.', '', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, '', NULL, 0, '', ''),
(16, NULL, NULL, '2257042', 'Ventrusa, Shaina Mae O.', '', 'THM Department', 'Releasing Officer', '2021-12-13 14:51:32', '@gmail.com', 'shainaventrusa05', 'shainaventrusa05', '', 97655454545, '', NULL, 0, '2021-11-30 16:54:15', ''),
(17, NULL, NULL, '2513208', 'Bagundang, Zarah Mae G.', '', 'THM Department', 'Receiving Officer', '2021-10-28 15:52:15', '@gmail.com', 'zarahbagundang06', 'zarahbagundang06', '', 9765546778, '', NULL, 0, '2021-12-01 21:56:36', '');

-- --------------------------------------------------------

--
-- Table structure for table `release_file`
--

CREATE TABLE `release_file` (
  `id` int(11) NOT NULL,
  `releaser_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_action`
--

CREATE TABLE `tbl_action` (
  `id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `action_description` varchar(255) NOT NULL,
  `action_id` int(11) DEFAULT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_action`
--

INSERT INTO `tbl_action` (`id`, `action`, `action_description`, `action_id`, `department`) VALUES
(1, 'Information / References', '', NULL, ''),
(2, 'Comment / Recommendation', '', NULL, ''),
(3, 'Appropriate Action', '', NULL, ''),
(4, 'For Review', '', NULL, '');

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
(3, 'ICT Department'),
(79, 'Finance Department'),
(110, 'Administrative Section'),
(112, 'Registration Section'),
(113, 'Cooperative Research Information & Training Section (CRITS)'),
(114, 'Regulation Section');

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
(9, 'Department Head');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_routedto`
--

CREATE TABLE `tbl_routedto` (
  `id` int(11) NOT NULL,
  `routedTo` varchar(255) NOT NULL,
  `routed_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_typedocument`
--

CREATE TABLE `tbl_typedocument` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `type_document` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `doc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_typedocument`
--

INSERT INTO `tbl_typedocument` (`id`, `department`, `type_document`, `description`, `doc_id`) VALUES
(33, 'admin', 'Research Reports', '', NULL),
(34, 'admin', 'Budgets', '', NULL),
(35, 'admin', 'Annual Reports', '', NULL),
(36, 'admin', 'Pamphlets', '', NULL),
(37, 'admin', 'Statistical Publication', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_repositories`
--

CREATE TABLE `user_repositories` (
  `id` int(11) NOT NULL,
  `folder_name` varchar(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_repo_folder`
--

CREATE TABLE `user_repo_folder` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `folder_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `admin_notif_dept_sent`
--
ALTER TABLE `admin_notif_dept_sent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notif_received_file`
--
ALTER TABLE `admin_notif_received_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notif_receiver`
--
ALTER TABLE `admin_notif_receiver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notif_releaser`
--
ALTER TABLE `admin_notif_releaser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_outgoing_file`
--
ALTER TABLE `admin_outgoing_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_receive_file`
--
ALTER TABLE `admin_receive_file`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_number` (`phone_number`);

--
-- Indexes for table `notif_admin_receive_head`
--
ALTER TABLE `notif_admin_receive_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_admin_receive_release`
--
ALTER TABLE `notif_admin_receive_release`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_head_send_receive`
--
ALTER TABLE `notif_head_send_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_head_send_release`
--
ALTER TABLE `notif_head_send_release`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_receive`
--
ALTER TABLE `notif_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_receive_released`
--
ALTER TABLE `notif_receive_released`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_release`
--
ALTER TABLE `notif_release`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_file`
--
ALTER TABLE `receive_file`
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
-- Indexes for table `release_file`
--
ALTER TABLE `release_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_action`
--
ALTER TABLE `tbl_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action` (`action_id`);

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
-- Indexes for table `tbl_routedto`
--
ALTER TABLE `tbl_routedto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_typedocument`
--
ALTER TABLE `tbl_typedocument`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_type` (`doc_id`);

--
-- Indexes for table `user_repositories`
--
ALTER TABLE `user_repositories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_repo_folder`
--
ALTER TABLE `user_repo_folder`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_notif_dept_sent`
--
ALTER TABLE `admin_notif_dept_sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_notif_received_file`
--
ALTER TABLE `admin_notif_received_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_notif_receiver`
--
ALTER TABLE `admin_notif_receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_notif_releaser`
--
ALTER TABLE `admin_notif_releaser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_outgoing_file`
--
ALTER TABLE `admin_outgoing_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_receive_file`
--
ALTER TABLE `admin_receive_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch_upload`
--
ALTER TABLE `batch_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `department_users`
--
ALTER TABLE `department_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notif_admin_receive_head`
--
ALTER TABLE `notif_admin_receive_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notif_admin_receive_release`
--
ALTER TABLE `notif_admin_receive_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notif_head_send_receive`
--
ALTER TABLE `notif_head_send_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notif_head_send_release`
--
ALTER TABLE `notif_head_send_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notif_receive`
--
ALTER TABLE `notif_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notif_receive_released`
--
ALTER TABLE `notif_receive_released`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notif_release`
--
ALTER TABLE `notif_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receive_file`
--
ALTER TABLE `receive_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `release_file`
--
ALTER TABLE `release_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_action`
--
ALTER TABLE `tbl_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `des_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_typedocument`
--
ALTER TABLE `tbl_typedocument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_repositories`
--
ALTER TABLE `user_repositories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_repo_folder`
--
ALTER TABLE `user_repo_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `tbl_action`
--
ALTER TABLE `tbl_action`
  ADD CONSTRAINT `action` FOREIGN KEY (`action_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_typedocument`
--
ALTER TABLE `tbl_typedocument`
  ADD CONSTRAINT `doc_type` FOREIGN KEY (`doc_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
