-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 03:12 AM
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
  `user` varchar(255) NOT NULL,
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

INSERT INTO `admin_fileupload` (`id`, `user`, `tracking_no`, `file_name`, `file_description`, `select_date`, `attach_file`, `type_document`) VALUES
(186, '', '3171865830', '', '', '2021-10-26', '8750-', '');

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
(464, 'ICT Department', 'Mancao, Nicole G.', '2021-10-26 16:32:37', 'mancao@gmail.com', 'nicole2000', 'nicole2000', 9754423445, 'C.'),
(466, 'ICT Department', 'Shaina, Shaina D.', '2021-10-26 18:53:04', 'shaina@gmail.com', 'shaina123', 'shaina123', 9756677787, 'cot'),
(467, 'THM Department', 'Dane, Dane A.', '2021-10-26 19:25:26', 'dane@gmail.com', 'dane123', 'dane123', 9387367463, 'cc');

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
(1132, 'Lustre, Nadine L.', 'GE Department', 'Department Head', '2021-10-25 16:24:36', 'nadine@gmail.com', 'nadine123', '', '', 9764455267, 'Philippines'),
(1134, 'Shaina, Shaina D.', 'ICT Department', 'Department Head', '2021-10-27 01:11:22', 'shaina@gmail.com', 'shaina123', 'shaina123', '', 9756677787, ''),
(1138, 'Joseph, Aron B.', 'THM Department', 'Department Head', '2021-10-22 20:00:29', 'aronjosephbra@gmail.com', 'aron123', 'aron123', '', 9515359406, ''),
(1139, 'Dane, Dane A.', 'THM Department', 'Department Head', '2021-10-27 01:36:48', 'dane@gmail.com', 'dane123', 'dane123', '', 9387367463, '');

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE `file_upload` (
  `id` int(50) NOT NULL,
  `user` varchar(255) NOT NULL,
  `tracking_no` text CHARACTER SET utf8 NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_description` varchar(255) NOT NULL,
  `select_date` date NOT NULL,
  `department` varchar(255) NOT NULL,
  `attach_file` varchar(255) NOT NULL,
  `type_document` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`id`, `user`, `tracking_no`, `file_name`, `file_description`, `select_date`, `department`, `attach_file`, `type_document`, `status`) VALUES
(1, 'aron123', '2659067248', 'My file', 'Sample', '2021-10-26', 'THM Department', '7563-18.jpg', 'Aron doc type three', 'Send'),
(2, 'aron123', '6629662597', '', '', '2021-10-26', 'THM Department', '7733-', '', 'Send'),
(3, 'aron123', '8307961900', 'ss', 'dsd', '2021-10-26', 'THM Department', '4930-18.jpg', 'Aron doc type three', 'Send'),
(4, 'aron123', '9588273894', 'ed', 'd', '2021-10-26', 'THM Department', '8948-17.jpg', 'Aron doc type three', 'Send'),
(5, 'aron123', '7526425983', 'tryyyyyyyyyyyy', 'tr', '2021-10-26', 'THM Department', '3912-17.jpg', 'Aron doc type three', 'Send'),
(6, 'aron123', '9790845077', 'try again again', 'hihihihihi', '2021-10-26', 'THM Department', '6108-16.jpg', 'Aron doc type three', 'Send'),
(7, 'aron123', '3673416172', 'df', 'ddd', '2021-10-26', 'THM Department', '9663-18.jpg', 'Aron doc type three', 'Send'),
(8, 'aron123', '661470323', 'vve', 'vvdvd', '2021-10-26', 'THM Department', '1898-18.jpg', 'Aron doc type three', 'Send'),
(9, 'aron123', '1894929781', 'r', 'erreerr', '2021-10-26', 'THM Department', '3978-18.jpg', 'Aron doc type three', 'Send'),
(10, 'aron123', '8063397461', '', '', '2021-10-26', 'THM Department', '7777-', '', 'Send'),
(11, 'aron123', '8201603265', 'sa', 'asss', '2021-10-26', 'THM Department', '7890-18.jpg', 'Aron doc type three', 'Send'),
(12, 'aron123', '8611010597', 'd', 'd', '2021-10-26', 'THM Department', '9289-18.jpg', 'Aron doc type three', 'Send'),
(13, 'aron123', '3909739371', 'd', 'd', '2021-10-26', 'THM Department', '6138-13.jpg', 'Aron doc type three', 'Send'),
(14, 'aron123', '3269154666', 's', 'dsd', '2021-10-26', 'THM Department', '5356-18.jpg', 'Aron doc type three', 'Send'),
(15, 'aron123', '9234007755', 'd', 'd', '2021-10-26', 'THM Department', '1902-11.jpg', 'Aron doc type three', 'Send'),
(16, 'aron123', '2898497823', 'ew', 'e', '2021-10-26', 'THM Department', '6297-18.jpg', 'Aron doc type three', 'Send'),
(17, 'aron123', '8569409371', 'ss', 's', '2021-10-26', 'THM Department', '7382-logo.png', 'Aron doc type three', 'Draft');

-- --------------------------------------------------------

--
-- Table structure for table `receive_file`
--

CREATE TABLE `receive_file` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `docu_type` varchar(255) NOT NULL,
  `attached_file` varchar(255) NOT NULL,
  `office_department` varchar(255) NOT NULL,
  `releaser_name` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receiving_users`
--

CREATE TABLE `receiving_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `bday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiving_users`
--

INSERT INTO `receiving_users` (`id`, `fullname`, `department`, `usertype`, `bday`, `email`, `username`, `password`, `phone_number`, `address`) VALUES
(337, 'Aranas, Kyla Marie', 'THM Department', 'Receiving Officer', '2021-10-26', '@gmail.com', 'kyrie123', '', 9515359406, 'sssss');

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
(325, NULL, NULL, '84553991', 'Joseph, Aron B.', 'THM Department', 'Department Head', '2021-10-22 20:00:29', 'aronjosephbra@gmail.com', 'aron123', 'aron123', '', 9515359406, '', NULL),
(328, NULL, NULL, '42441316', 'Marie, Kyla M.', 'BACOMM Department', 'Employee', '2021-10-22 20:07:04', 'kyla@gmail.com', 'kyla123', 'kyla123', '', 9515359406, '', NULL),
(330, NULL, NULL, '8343490', 'Naku, po', 'THM Department', 'Releasing Officer', '2021-10-24 09:50:06', '@gmail.com', 'naku123', 'naku123', '', 9515359406, '', NULL),
(337, NULL, NULL, '5392318', 'Aranas, Kyla Marie', 'THM Department', 'Receiving Officer', '2021-10-26 16:38:37', '@gmail.com', 'kyrie123', '', '', 9515359406, 'sssss', NULL),
(349, NULL, NULL, '50495196', 'Dane, Dane A.', 'THM Department', 'Department Head', '2021-10-27 01:36:48', 'dane@gmail.com', 'dane123', 'dane123', '', 9387367463, '', NULL);

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

--
-- Dumping data for table `release_file`
--

INSERT INTO `release_file` (`id`, `releaser_id`, `tracking_no`, `sender_name`, `date_time`, `status`) VALUES
(7, 330, '5038251315', 'Naku, po', '2021-10-25 06:00:11', 'Unread'),
(8, 330, '5038251315', 'Naku, po', '2021-10-25 06:03:49', 'Unread'),
(9, 330, '5038251315', 'Naku, po', '2021-10-25 06:04:31', 'Unread'),
(10, 330, '5388304758', 'Naku, po', '2021-10-25 06:38:40', 'Unread'),
(11, 330, '2393923097', 'Naku, po', '\n		<script language=\"javascript\">\n		var today = new Date();\n		var dd = today.getDate();\n		var mm = today.getMonth()+1; //January is 0!\n		var yyyy = today.getFullYear();\n\n		if(dd<10) {\n		    dd=\"0\"+dd\n		} \n\n		if(mm<10) {\n		    mm=\"0\"+mm\n		} \n', 'Unread'),
(12, 335, '9003794146', 'Reid, James F.', '2021-10-25 16:32:37', 'Unread'),
(13, 330, '2659067248', 'Naku, po', '2021-10-26 06:42:21', 'Unread'),
(14, 330, '6629662597', 'Naku, po', '2021-10-26 06:45:05', 'Unread'),
(15, 330, '8307961900', 'Naku, po', '2021-10-26 06:54:34', 'Unread'),
(16, 330, '9588273894', 'Naku, po', '2021-10-26 06:56:58', 'Unread'),
(17, 330, '7526425983', 'Naku, po', '2021-10-26 07:00:42', 'Unread'),
(18, 330, '9790845077', 'Naku, po', '2021-10-26 07:01:44', 'Unread'),
(19, 330, '3673416172', 'Naku, po', '2021-10-26 07:02:20', 'Unread'),
(20, 330, '661470323', 'Naku, po', '2021-10-26 07:02:49', 'Unread'),
(21, 330, '1894929781', 'Naku, po', '2021-10-26 07:03:15', 'Unread'),
(22, 330, '8063397461', 'Naku, po', '2021-10-26 07:04:11', 'Unread'),
(23, 330, '8201603265', 'Naku, po', '2021-10-26 07:05:19', 'Unread'),
(24, 330, '8611010597', 'Naku, po', '2021-10-26 07:05:38', 'Unread'),
(25, 330, '3909739371', 'Naku, po', '2021-10-26 07:05:59', 'Unread'),
(26, 330, '3269154666', 'Naku, po', '2021-10-26 07:07:00', 'Unread'),
(27, 330, '9234007755', 'Naku, po', '2021-10-26 07:10:40', 'Unread'),
(28, 330, '2898497823', 'Naku, po', '2021-10-26 07:12:08', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `releasing_users`
--

CREATE TABLE `releasing_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `bday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `releasing_users`
--

INSERT INTO `releasing_users` (`id`, `fullname`, `department`, `usertype`, `bday`, `email`, `username`, `password`, `phone_number`, `address`) VALUES
(330, 'Naku, po', 'THM Department', 'Releasing Officer', '2021-10-24', '@gmail.com', 'naku123', 'naku123', 9515359406, '');

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
  `department` varchar(255) NOT NULL,
  `type_document` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `doc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_typedocument`
--

INSERT INTO `tbl_typedocument` (`id`, `department`, `type_document`, `description`, `doc_id`) VALUES
(40, 'THM Department', 'Aron doc type three', 'there', NULL),
(41, 'GE Department', 'GE documents', 'not applicable', NULL),
(43, 'admin', 'New admin', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_repositories`
--

CREATE TABLE `user_repositories` (
  `id` int(11) NOT NULL,
  `folder_name` varchar(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_repositories`
--

INSERT INTO `user_repositories` (`id`, `folder_name`, `file_name`) VALUES
(1, '1', 'hehehehe'),
(2, '1', 'huhuhuhu'),
(3, '2', 'sdadasd'),
(4, '2', 'sdadasdasdasd'),
(5, '1', 'adasddsadasd'),
(6, 'hahahaha', '6543-documenttrackingsystem_db (6).sql'),
(7, 'hahahaha', '6035-documenttrackingsystem_db (5).sql'),
(8, 'hahahaha', '3388-aron.pptx'),
(9, 'Nicole fold', '7813-13.png'),
(10, 'Nicole fold', '9706-14.png'),
(11, 'Nicole fold', '8945-15.png'),
(12, 'Shain', '7331-12.png'),
(13, 'Shain', '7748-13.png'),
(14, 'Shain', '1721-14.png'),
(15, 'Folder_1', '5064-12.png'),
(16, 'admin repo', '5779-15.jpg'),
(17, 'New folder', '8732-3.jpg'),
(18, 'New folder', '5473-4.jpg'),
(19, 'New folder', '1842-5.jpg'),
(20, 'New folder', '3913-6.jpg');

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
-- Dumping data for table `user_repo_folder`
--

INSERT INTO `user_repo_folder` (`id`, `user`, `folder_name`) VALUES
(1, 'aron123', 'Sample folder'),
(2, 'aron123', 'folder 2'),
(3, 'aron123', 'haynaa'),
(4, '', 'sanaaaa'),
(5, 'aron123', 'sanaaaaaaaaaaaaaaaaaaa'),
(6, 'aron123', 'ish'),
(7, 'aron123', 'haynalang'),
(8, 'aron123', 'hahahaha'),
(9, 'aron123', 'Nicole folder'),
(10, 'aron123', 'Shain'),
(11, 'nadine123', 'Folder_1'),
(12, 'admin', 'admin repo'),
(13, 'admin', 'New folder');

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
-- Indexes for table `receive_file`
--
ALTER TABLE `receive_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiving_users`
--
ALTER TABLE `receiving_users`
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
-- Indexes for table `releasing_users`
--
ALTER TABLE `releasing_users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `batch_upload`
--
ALTER TABLE `batch_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;

--
-- AUTO_INCREMENT for table `department_users`
--
ALTER TABLE `department_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1140;

--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `receive_file`
--
ALTER TABLE `receive_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receiving_users`
--
ALTER TABLE `receiving_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `release_file`
--
ALTER TABLE `release_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_repositories`
--
ALTER TABLE `user_repositories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_repo_folder`
--
ALTER TABLE `user_repo_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
