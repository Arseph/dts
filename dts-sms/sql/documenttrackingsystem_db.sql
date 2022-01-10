-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 09:36 AM
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

--
-- Dumping data for table `admin_notif_dept_sent`
--

INSERT INTO `admin_notif_dept_sent` (`id`, `tracking_no`, `position`, `dept_sender`, `dept_releaser`, `name_sender`, `name_releaser`, `document`, `date`, `time`, `status`) VALUES
(1, '6047613430', 'Department Head', 'Finance Department', 'Finance Department', 'Anthon C. Benedic', 'Samantha B. De Jesus', 'Account Balance', '12/12/2021', '11:12 AM', 1),
(2, '2542696389', 'Department Head', 'Finance Department', 'Finance Department', 'Anthon C. Benedic', 'Samantha B. De Jesus', 'employee_sheet', '12/12/2021', '12:56 PM', 1),
(3, '4030445851', 'Department Head', 'THM Department', 'THM Department', 'Ali, Noria K.', 'Ventrusa, Shaina Mae O.', 'Employee sheet', '12/12/2021', '01:10 PM', 1),
(4, '5805873927', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', 'Abdullah, Nurullajie S.', 'Configuration', '12/12/2021', '01:28 PM', 1),
(5, '415149974', 'Department Head', 'THM Department', 'THM Department', 'Ali, Noria K.', 'Ventrusa, Shaina Mae O.', 'Pre-defense', '12/12/2021', '01:55 PM', 1),
(6, '7676897667', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', 'Abdullah, Nurullajie S.', 'Action Department Head', '12/12/2021', '02:28 PM', 1),
(7, '227598812', 'Department Head', 'Statiscal Department', 'Statiscal Department', 'Cabal, John J.', 'Connor, Susan A.', 'Calendar of Activities', '12/13/2021', '03:42 PM', 1),
(8, '1044376190', 'Department Head', 'Statiscal Department', 'Statiscal Department', 'Cabal, John J.', 'Connor, Susan A.', 'Memorandum for Employees', '12/13/2021', '03:57 PM', 1);

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

--
-- Dumping data for table `admin_notif_received_file`
--

INSERT INTO `admin_notif_received_file` (`id`, `department`, `tracking_no`, `name`, `document`, `date`, `time`, `status`) VALUES
(1, 'Finance Department', '6047613430', 'Samantha B. De Jesus', '', '12/12/2021', '11:13 AM', 1),
(2, 'Finance Department', '2542696389', 'Samantha B. De Jesus', '', '12/12/2021', '12:58 PM', 1),
(3, 'THM Department', '4030445851', 'Ventrusa, Shaina Mae O.', '', '12/12/2021', '01:13 PM', 1),
(4, 'ICT Department', '5805873927', 'Abdullah, Nurullajie S.', '', '12/12/2021', '02:07 PM', 1),
(5, 'ICT Department', '7676897667', 'Abdullah, Nurullajie S.', '', '12/12/2021', '02:29 PM', 1),
(6, 'Statiscal Department', '227598812', 'Connor, Susan A.', '', '12/13/2021', '03:45 PM', 1),
(7, 'Statiscal Department', '1044376190', 'Connor, Susan A.', '', '12/13/2021', '03:58 PM', 1);

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

--
-- Dumping data for table `admin_notif_receiver`
--

INSERT INTO `admin_notif_receiver` (`id`, `tracking_no`, `receiver_id`, `releaser`, `date`, `time`, `status`) VALUES
(1, '4030445851', 53, 'Ventrusa, Shaina Mae O. (THM Department)', '12/12/2021', '01:19 PM', 1),
(2, '', 72, '', '12/13/2021', '04:10 PM', 0);

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

--
-- Dumping data for table `admin_notif_releaser`
--

INSERT INTO `admin_notif_releaser` (`id`, `tracking_no`, `position`, `dept_releaser`, `name_releaser`, `receiver_id`, `document`, `date`, `time`, `status`) VALUES
(1, '6047613430', 'Releasing Officer', 'Finance Department', 'Samantha B. De Jesus', 0, '', '12/12/2021', '11:13 AM', 1),
(2, '2542696389', 'Releasing Officer', 'Finance Department', 'Samantha B. De Jesus', 0, '', '12/12/2021', '12:58 PM', 1),
(3, '4030445851', 'Releasing Officer', 'THM Department', 'Ventrusa, Shaina Mae O.', 53, '', '12/12/2021', '01:13 PM', 1),
(4, '415149974', 'Releasing Officer', 'THM Department', 'Ventrusa, Shaina Mae O.', 53, '', '12/12/2021', '02:02 PM', 1),
(5, '5805873927', 'Releasing Officer', 'ICT Department', 'Abdullah, Nurullajie S.', 17, '', '12/12/2021', '02:07 PM', 1),
(6, '7676897667', 'Releasing Officer', 'ICT Department', 'Abdullah, Nurullajie S.', 17, '', '12/12/2021', '02:29 PM', 1),
(7, '7676897667', 'Releasing Officer', 'ICT Department', 'Abdullah, Nurullajie S.', 53, '', '12/12/2021', '02:29 PM', 1),
(8, '227598812', 'Releasing Officer', 'Statiscal Department', 'Connor, Susan A.', 0, '', '12/13/2021', '03:45 PM', 1),
(9, '1044376190', 'Releasing Officer', 'Statiscal Department', 'Connor, Susan A.', 0, '', '12/13/2021', '03:58 PM', 1);

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

--
-- Dumping data for table `admin_outgoing_file`
--

INSERT INTO `admin_outgoing_file` (`id`, `tracking_no`, `receiver_id`, `date`, `time`, `status`) VALUES
(1, '8087290822', 53, '12/12/2021', '01:07 PM', 1),
(2, '7848209670', 13, '12/12/2021', '02:23 PM', 1),
(3, '9224810136', 53, '12/12/2021', '02:40 PM', 1),
(4, '7610068087', 72, '12/13/2021', '04:07 PM', 1),
(5, '2336562561', 72, '12/13/2021', '04:16 PM', 1);

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

--
-- Dumping data for table `admin_receive_file`
--

INSERT INTO `admin_receive_file` (`id`, `tracking_no`, `releaser_name`, `date_time`, `status`) VALUES
(1, '6047613430', 'Samantha B. De Jesus', '12/12/2021 11:13 AM', 'Read'),
(2, '2542696389', 'Samantha B. De Jesus', '12/12/2021 12:58 PM', 'Read'),
(3, '4030445851', 'Ventrusa, Shaina Mae O.', '12/12/2021 01:13 PM', 'Read'),
(4, '5805873927', 'Abdullah, Nurullajie S.', '12/12/2021 02:07 PM', 'Read'),
(5, '7676897667', 'Abdullah, Nurullajie S.', '12/12/2021 02:29 PM', 'Read'),
(6, '227598812', 'Connor, Susan A.', '12/13/2021 03:45 PM', 'Unread'),
(7, '1044376190', 'Connor, Susan A.', '12/13/2021 03:58 PM', 'Unread');

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
(15, 'THM Department', 'Ali, Noria K.', '2021-10-28 15:50:31', 'noria@gmail.com', 'noria123', '123456', 11111111111, 'x'),
(16, 'GE Department', 'Nicole G. Mancao', '2021-11-05 00:52:27', 'mancaonicole320@yahoo.com', 'nicole123', 'nicole123', 9756678900, 'Village'),
(17, 'GE Department', 'Caster G. Mancao', '2021-11-05 00:53:39', 'caster@gmail.com', 'caster123', 'caster123', 9877676666, 'village'),
(18, 'Finance Department', 'Anthon C. Benedic', '2021-11-06 23:56:25', 'anthon@gmail.com', 'athon', 'anthon123', 22222222222, 'yyy'),
(19, 'Finance Department', 'Samantha B. De Jesus', '2021-11-06 23:57:23', 'sam@gmail.com', 'samantha', 'samantha123', 22222222222, 'yyy'),
(20, 'Finance Department', 'Adrian L. Lopez', '2021-11-06 23:57:59', 'adrian@gmail.com', 'adrian', 'adrian123', 22222222222, 'yyy'),
(44, 'Finance Department', 'Mahalia', '2021-11-28 00:47:02', 'mahalia@gmail.com', 'mahalia', 'N8AYHA&3$Y', 9456733546, 'ccc'),
(45, 'Marketing Section', 'Reid, James A.', '2021-12-12 14:45:54', 'james@gmail.com', 'james', '', 93456778898, 'Sa Puso ni Shaina'),
(46, 'Marketing Department', 'Bernardo, Kath L.', '2021-12-12 14:49:25', 'kath@gmail.com', 'kathrine', 'ZZWFCMBO#V', 9123456789, 'Sa Puso ni Nicole'),
(48, 'GE Department', 'Tom, Thomson P.', '2021-12-13 12:52:57', 'tom@gmail.com', 'tom', 'Q2N9WQ', 9756788989, 'tom'),
(50, 'Finance Department', 'Uy, Jade Allysa C.', '2021-12-13 15:05:41', 'jade@gmail.com', 'jade123', '', 9756677889, 'parang road'),
(54, 'Statiscal Department', 'Green, Leo R.', '2021-12-13 15:35:05', 'leo@gmail.com', 'leo_green', '', 9678997654, 'Mindano, Philippines'),
(55, 'Statiscal Department', 'Cabal, John J.', '2021-12-13 15:35:05', 'john@gmail.com', 'john_cabal', '', 9765545454, 'Mindano, Philippines'),
(56, 'Statiscal Department', 'Connor, Susan A.', '2021-12-13 15:35:05', 'susan@gmail.com', 'susan_connor', '', 9786678899, 'Mindano, Philippines');

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
(35, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(36, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(42, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(43, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(44, 'Nicole G. Mancao', 'GE Department', 'Department Head', '2021-11-14 20:23:22', 'mancaonicole320@yahoo.com', 'nicole123', 'nicole123', '', 9756678900, ''),
(45, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(46, '', 'GE Department', 'Department Head', '2021-11-23 14:28:09', 'mancaonicole320@yahoo.com', 'nicole123', '', '', 9756678900, ''),
(47, 'Nicole G. Mancao', 'GE Department', 'Department Head', '2021-11-14 20:23:22', 'mancaonicole320@yahoo.com', 'nicole123', 'nicole123', '', 9756678900, ''),
(48, 'Anthon C. Benedic', 'Finance Department', 'Department Head', '2021-11-21 00:17:10', 'anthon@gmail.com', 'athon', 'anthon123', '', 22222222222, ''),
(49, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(50, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(51, 'Nicole G. Mancao', 'GE Department', 'Department Head', '2021-11-23 14:28:09', 'mancaonicole320@yahoo.com', 'nicole123', '', '', 9756678900, ''),
(52, '', 'Finance Department', 'Department Head', '2021-12-12 05:47:47', '@gmail.com', 'samantha', '', '', 9217324736, ''),
(53, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(54, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(55, 'Nicole G. Mancao', 'GE Department', 'Department Head', '2021-11-23 14:28:09', 'mancaonicole320@yahoo.com', 'nicole123', '', '', 9756678900, ''),
(56, 'Anthon C. Benedic', 'Finance Department', 'Department Head', '2021-11-28 13:12:24', 'anthon@gmail.com', 'athon', 'anthon123', '', 22222222222, ''),
(57, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(58, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(59, 'Nicole G. Mancao', 'GE Department', 'Department Head', '2021-11-23 14:28:09', 'mancaonicole320@yahoo.com', 'nicole123', '', '', 9756678900, ''),
(60, 'Anthon C. Benedic', 'Finance Department', 'Department Head', '2021-11-28 13:12:24', 'anthon@gmail.com', 'athon', 'anthon123', '', 22222222222, ''),
(61, 'Bernardo, Kath L.', 'Marketing Department', 'Department Head', '2021-12-12 14:49:57', 'kath@gmail.com', 'kathrine', 'ZZWFCMBO#V', '', 9123456789, ''),
(62, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(63, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(64, 'Nicole G. Mancao', 'GE Department', 'Department Head', '2021-11-23 14:28:09', 'mancaonicole320@yahoo.com', 'nicole123', '', '', 9756678900, ''),
(65, 'Anthon C. Benedic', 'Finance Department', 'Department Head', '2021-11-28 13:12:24', 'anthon@gmail.com', 'athon', 'anthon123', '', 22222222222, ''),
(66, 'Bernardo, Kath L.', 'Marketing Department', 'Department Head', '2021-12-12 14:49:57', 'kath@gmail.com', 'kathrine', 'ZZWFCMBO#V', '', 9123456789, ''),
(67, 'Uy, Jade Allysa C.', 'Finance Department', 'Department Head', '2021-12-13 15:06:02', 'jade@gmail.com', 'jade123', 'GTLMF8', '', 9756677889, ''),
(69, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(70, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(71, 'Nicole G. Mancao', 'GE Department', 'Department Head', '2021-11-23 14:28:09', 'mancaonicole320@yahoo.com', 'nicole123', '', '', 9756678900, ''),
(72, 'Anthon C. Benedic', 'Finance Department', 'Department Head', '2021-11-28 13:12:24', 'anthon@gmail.com', 'athon', 'anthon123', '', 22222222222, ''),
(73, 'Bernardo, Kath L.', 'Marketing Department', 'Department Head', '2021-12-12 14:49:57', 'kath@gmail.com', 'kathrine', 'ZZWFCMBO#V', '', 9123456789, ''),
(74, 'Uy, Jade Allysa C.', 'Finance Department', 'Department Head', '2021-12-13 15:06:02', 'jade@gmail.com', 'jade123', 'GTLMF8', '', 9756677889, ''),
(76, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(77, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(78, 'Nicole G. Mancao', 'GE Department', 'Department Head', '2021-11-23 14:28:09', 'mancaonicole320@yahoo.com', 'nicole123', '', '', 9756678900, ''),
(79, 'Anthon C. Benedic', 'Finance Department', 'Department Head', '2021-11-28 13:12:24', 'anthon@gmail.com', 'athon', 'anthon123', '', 22222222222, ''),
(80, 'Bernardo, Kath L.', 'Marketing Department', 'Department Head', '2021-12-12 14:49:57', 'kath@gmail.com', 'kathrine', 'ZZWFCMBO#V', '', 9123456789, ''),
(81, 'Uy, Jade Allysa C.', 'Finance Department', 'Department Head', '2021-12-13 15:11:14', 'jade@gmail.com', 'jade123', '', '', 9756677889, ''),
(83, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(84, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(85, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(86, 'Nicole G. Mancao', 'GE Department', 'Department Head', '2021-11-23 14:28:09', 'mancaonicole320@yahoo.com', 'nicole123', '', '', 9756678900, ''),
(87, 'Anthon C. Benedic', 'Finance Department', 'Department Head', '2021-11-28 13:12:24', 'anthon@gmail.com', 'athon', 'anthon123', '', 22222222222, ''),
(88, 'Bernardo, Kath L.', 'Marketing Department', 'Department Head', '2021-12-12 14:49:57', 'kath@gmail.com', 'kathrine', 'ZZWFCMBO#V', '', 9123456789, ''),
(89, 'Cabal, John J.', 'Statiscal Department', 'Department Head', '2021-12-13 15:36:41', 'john@gmail.com', 'john_cabal', '5V@0XU', '', 9765545454, '');

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

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`id`, `user`, `phone_number`, `tracking_no`, `file_name`, `file_description`, `select_date`, `department`, `attach_file`, `type_document`, `routedTo`, `pleaseNote`, `forYour`, `status`) VALUES
(1, 'athon', '', '6047613430', 'Account Balance', 'Account balance sheet from Ms. Ellaine to Mr. Admin. Pls be guided.', '12/12/2021 11:12 AM', 'Finance Department', '8464-9110-04.11.2020_09.35.09_REC.png', 'Financial Reports and Documents', 'HR Development Section', '', 'Transactional Documents', 'Send'),
(2, 'athon', '', '2542696389', 'employee_sheet', 'Kindly send this sheet to Mr. Juan Dela Cruz (Admin) for further notice. Tnx', '12/12/2021 12:56 PM', 'Finance Department', '8194-Employee-data-sheet (4).xlsx', 'Business Letters', 'HR Development Section', '', 'Business Letters', 'Send'),
(4, 'noria123', '', '4030445851', 'Employee sheet', 'employee sheet', '12/12/2021 01:10 PM', 'THM Department', '5211-Employee-data-sheet (4).xlsx', 'thm', 'Personnel Records Section', '', 'Appropriate Action', 'Send'),
(5, 'smith', '', '5805873927', 'Configuration', 'Configuration', '12/12/2021 01:28 PM', 'ICT Department', '5525-Employee-data-sheet (4).xlsx', '', 'Personnel Records Section', '', 'Comment / Recommendation', 'Send'),
(6, 'noria123', '', '415149974', 'Pre-defense', 'Preparation for pre-defense', '12/12/2021 01:55 PM', 'THM Department', '4037-6035-reg (1).png', 'thm', 'Retirement Section', '', 'For Review', 'Send'),
(8, 'smith', '', '7676897667', 'Action Department Head', 'Good day! This document is from ms. Shaina Qtie, kindly send it to mr. Abdullah Cutie. Thanks', '12/12/2021 02:28 PM', 'ICT Department', '2460-Employee-data-sheet (4).xlsx', '', 'Reclassification Section', '', 'Comment / Recommendation', 'Send'),
(19, 'noria123', '', '1325022848', 'dffdf', 'ffgfgfg', '12/12/2021 03:21 PM', 'THM Department', '5533-2460-Employee-data-sheet (4).xlsx', 'thm', 'Reclassification Section', '', 'File', 'Send'),
(21, 'john_cabal', '', '227598812', 'Calendar of Activities', 'Good day Ms. Shai, I am sending you our CoA for your reference and copy. Pls notify me via SMS. Tnx', '12/13/2021 03:42 PM', 'Statiscal Department', '7268-CALENDAR OF ACTIVITIES.docx', '', 'Personnel Records Section', '', 'For Review', 'Send'),
(22, 'john_cabal', '', '1044376190', 'Memorandum for Employees', 'Kindly remind your employees that tomorrow is our defense. Thanks', '12/13/2021 03:57 PM', 'Statiscal Department', '3137-Document Tracking System - Revision List.docx', '', 'Retirement Section', '', 'Appropriate Action', 'Send'),
(23, '', '', '7610068087', 'Record of Sales', 'Attached here is your template for your record of sales. Pls be guided.', '12/13/2021 04:01 PM', 'Administrator', '6770-8464-9110-04.11.2020_09.35.09_REC.png', 'one more', 'Marketing Department', '', 'hakdog', 'Draft'),
(26, '', '', '2336562561', 'try', 'try', '12/13/2021 04:15 PM', 'Administrator', '7538-8464-9110-04.11.2020_09.35.09_REC.png', 'Tae tubol', 'Statistical Department', '', 'hakdog', 'Draft');

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

--
-- Dumping data for table `notif_admin_receive_head`
--

INSERT INTO `notif_admin_receive_head` (`id`, `tracking_no`, `department`, `name`, `date`, `time`, `status`) VALUES
(1, '6047613430', '', 'Administrator', '12/12/2021', '11:30 AM', 0),
(2, '2542696389', '', 'Administrator', '12/12/2021', '01:01 PM', 0),
(3, '4030445851', '', 'Administrator', '12/12/2021', '01:15 PM', 0),
(4, '5805873927', '', 'Administrator', '12/12/2021', '02:09 PM', 0),
(5, '7676897667', '', 'Administrator', '12/12/2021', '02:31 PM', 0);

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

--
-- Dumping data for table `notif_admin_receive_release`
--

INSERT INTO `notif_admin_receive_release` (`id`, `tracking_no`, `department`, `name`, `date`, `time`, `status`) VALUES
(1, '6047613430', '', 'Administrator', '12/12/2021', '11:30 AM', 0),
(2, '2542696389', '', 'Administrator', '12/12/2021', '01:01 PM', 0),
(3, '4030445851', '', 'Administrator', '12/12/2021', '01:15 PM', 0),
(4, '5805873927', '', 'Administrator', '12/12/2021', '02:09 PM', 0),
(5, '7676897667', '', 'Administrator', '12/12/2021', '02:31 PM', 0);

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

--
-- Dumping data for table `notif_head_send_receive`
--

INSERT INTO `notif_head_send_receive` (`id`, `tracking_no`, `department`, `receiver_id`, `releaser`, `date`, `time`, `status`) VALUES
(1, '4030445851', 'Finance Department', 53, 'Ventrusa, Shaina Mae O. (THM Department)', '12/12/2021', '01:19 PM', 1),
(2, '', 'Statiscal Department', 72, '', '12/13/2021', '04:10 PM', 0);

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

--
-- Dumping data for table `notif_head_send_release`
--

INSERT INTO `notif_head_send_release` (`id`, `department`, `releaser_id`, `releaser_name`, `receiver_name`, `tracking_no`, `document`, `date`, `time`, `status`) VALUES
(1, 'Finance Department', 52, 'Samantha B. De Jesus', 'Administrator', '6047613430', '', '12/12/2021', '11:13 AM', 1),
(2, 'Finance Department', 0, 'Samantha B. De Jesus', '', '6047613430', '', '12/12/2021', '11:13 AM', 1),
(3, 'Finance Department', 52, 'Samantha B. De Jesus', 'Administrator', '2542696389', '', '12/12/2021', '12:58 PM', 1),
(4, 'Finance Department', 0, 'Samantha B. De Jesus', '', '2542696389', '', '12/12/2021', '12:58 PM', 1),
(5, 'THM Department', 16, 'Ventrusa, Shaina Mae O.', 'Administrator', '4030445851', '', '12/12/2021', '01:13 PM', 1),
(6, 'THM Department', 0, 'Ventrusa, Shaina Mae O.', 'Adrian L. Lopez', '4030445851', '', '12/12/2021', '01:13 PM', 1),
(7, 'THM Department', 0, 'Ventrusa, Shaina Mae O.', 'Adrian L. Lopez', '415149974', '', '12/12/2021', '02:02 PM', 1),
(8, 'ICT Department', 14, 'Abdullah, Nurullajie S.', 'Administrator', '5805873927', '', '12/12/2021', '02:07 PM', 1),
(9, 'ICT Department', 0, 'Abdullah, Nurullajie S.', 'Bagundang, Zarah Mae G.', '5805873927', '', '12/12/2021', '02:07 PM', 1),
(10, 'ICT Department', 14, 'Abdullah, Nurullajie S.', 'Administrator', '7676897667', '', '12/12/2021', '02:29 PM', 1),
(11, 'ICT Department', 0, 'Abdullah, Nurullajie S.', 'Bagundang, Zarah Mae G.', '7676897667', '', '12/12/2021', '02:29 PM', 1),
(12, 'ICT Department', 0, 'Abdullah, Nurullajie S.', 'Adrian L. Lopez', '7676897667', '', '12/12/2021', '02:29 PM', 1),
(13, 'Statiscal Department', 71, 'Connor, Susan A.', 'Administrator', '227598812', '', '12/13/2021', '03:45 PM', 0),
(14, 'Statiscal Department', 0, 'Connor, Susan A.', '', '227598812', '', '12/13/2021', '03:45 PM', 0),
(15, 'Statiscal Department', 71, 'Connor, Susan A.', 'Administrator', '1044376190', '', '12/13/2021', '03:58 PM', 0),
(16, 'Statiscal Department', 0, 'Connor, Susan A.', '', '1044376190', '', '12/13/2021', '03:58 PM', 0);

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

--
-- Dumping data for table `notif_receive`
--

INSERT INTO `notif_receive` (`id`, `receiver_id`, `releaser_id`, `department`, `releaser_name`, `tracking_no`, `document`, `date`, `time`, `status`) VALUES
(1, 0, 52, 'Finance Department', 'Samantha B. De Jesus', '6047613430', '', '12/12/2021', '11:13 AM', 0),
(2, 0, 52, 'Finance Department', 'Samantha B. De Jesus', '2542696389', '', '12/12/2021', '12:58 PM', 0),
(3, 53, 0, 'Administrator', 'Administrator', '8087290822', 'Prototype', '12/12/2021', '01:06 PM', 0),
(4, 17, 0, 'Administrator', 'Administrator', '8087290822', 'Prototype', '12/12/2021', '01:06 PM', 0),
(5, 53, 16, 'THM Department', 'Ventrusa, Shaina Mae O.', '4030445851', '', '12/12/2021', '01:13 PM', 0),
(6, 53, 16, 'THM Department', 'Ventrusa, Shaina Mae O.', '415149974', '', '12/12/2021', '02:02 PM', 0),
(7, 17, 14, 'ICT Department', 'Abdullah, Nurullajie S.', '5805873927', '', '12/12/2021', '02:07 PM', 0),
(8, 13, 0, 'Administrator', 'Administrator', '7848209670', 'References', '12/12/2021', '02:19 PM', 0),
(9, 17, 0, 'Administrator', 'Administrator', '7848209670', 'References', '12/12/2021', '02:19 PM', 0),
(10, 53, 0, 'Administrator', 'Administrator', '7848209670', 'References', '12/12/2021', '02:19 PM', 0),
(11, 17, 14, 'ICT Department', 'Abdullah, Nurullajie S.', '7676897667', '', '12/12/2021', '02:29 PM', 0),
(12, 53, 14, 'ICT Department', 'Abdullah, Nurullajie S.', '7676897667', '', '12/12/2021', '02:29 PM', 0),
(13, 0, 0, 'Administrator', 'Administrator', '2680432605', '', '12/12/2021', '02:36 PM', 0),
(14, 53, 0, 'Administrator', 'Administrator', '', '', '12/12/2021', '02:37 PM', 0),
(15, 53, 0, 'Administrator', 'Administrator', '9224810136', 'Powerpoint', '12/12/2021', '02:38 PM', 0),
(16, 61, 0, 'Administrator', 'Administrator', '', '', '12/12/2021', '03:17 PM', 0),
(17, 61, 0, 'Administrator', 'Administrator', '495268649', '', '12/12/2021', '03:17 PM', 0),
(18, 61, 0, 'Administrator', 'Administrator', '359058404', '', '12/12/2021', '03:18 PM', 0),
(19, 0, 0, 'Administrator', 'Administrator', '9635933744', '', '12/12/2021', '03:18 PM', 0),
(20, 0, 0, 'Administrator', 'Administrator', '8469875567', '', '12/12/2021', '03:18 PM', 0),
(21, 61, 0, 'Administrator', 'Administrator', '1840083034', '', '12/12/2021', '03:18 PM', 0),
(22, 0, 0, 'Administrator', 'Administrator', '', '', '12/12/2021', '03:19 PM', 0),
(23, 0, 0, 'Administrator', 'Administrator', '1650943989', '', '12/13/2021', '01:33 PM', 0),
(24, 0, 71, 'Statiscal Department', 'Connor, Susan A.', '227598812', '', '12/13/2021', '03:45 PM', 0),
(25, 0, 71, 'Statiscal Department', 'Connor, Susan A.', '1044376190', '', '12/13/2021', '03:58 PM', 0),
(26, 72, 0, 'Administrator', 'Administrator', '7610068087', 'Record of Sales', '12/13/2021', '04:01 PM', 1),
(27, 72, 0, 'Administrator', 'Administrator', '', '', '12/13/2021', '04:09 PM', 1),
(28, 0, 0, 'Administrator', 'Administrator', '', '', '12/13/2021', '04:11 PM', 0),
(29, 72, 0, 'Administrator', 'Administrator', '2336562561', 'try', '12/13/2021', '04:15 PM', 1);

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

--
-- Dumping data for table `notif_receive_released`
--

INSERT INTO `notif_receive_released` (`id`, `releaser_id`, `name`, `department`, `receiver_name`, `tracking_no`, `date`, `time`, `status`) VALUES
(1, 16, '', 'Finance Department', 'Adrian L. Lopez ', '4030445851', '12/12/2021', '01:19 PM', 1),
(2, 0, '', 'Statiscal Department', 'Green, Leo R. ', '', '12/13/2021', '04:10 PM', 0);

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

--
-- Dumping data for table `notif_release`
--

INSERT INTO `notif_release` (`id`, `releaser_id`, `name`, `tracking_no`, `department`, `document`, `date`, `time`, `status`) VALUES
(1, 52, 'Anthon C. Benedic', '6047613430', 'Finance Department', 'Account Balance', '12/12/2021', '11:12 AM', 0),
(2, 52, 'Anthon C. Benedic', '2542696389', 'Finance Department', 'employee_sheet', '12/12/2021', '12:56 PM', 0),
(3, 16, 'Ali, Noria K.', '4030445851', 'THM Department', 'Employee sheet', '12/12/2021', '01:10 PM', 0),
(4, 14, 'Smith, David A.', '5805873927', 'ICT Department', 'Configuration', '12/12/2021', '01:28 PM', 0),
(5, 16, 'Ali, Noria K.', '415149974', 'THM Department', 'Pre-defense', '12/12/2021', '01:55 PM', 0),
(6, 14, 'Smith, David A.', '7676897667', 'ICT Department', 'Action Department Head', '12/12/2021', '02:28 PM', 0),
(7, 71, 'Cabal, John J.', '227598812', 'Statiscal Department', 'Calendar of Activities', '12/13/2021', '03:42 PM', 1),
(8, 71, 'Cabal, John J.', '1044376190', 'Statiscal Department', 'Memorandum for Employees', '12/13/2021', '03:57 PM', 1);

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

--
-- Dumping data for table `receive_file`
--

INSERT INTO `receive_file` (`id`, `receiver_id`, `releaser_id`, `tracking_no`, `releaser_name`, `date_time`, `status`) VALUES
(1, 0, 52, '6047613430', 'Samantha B. De Jesus', '', 'Unread'),
(2, 0, 52, '2542696389', 'Samantha B. De Jesus', '', 'Unread'),
(3, 53, 0, '8087290822', 'Administrator', '12/12/2021 01:06 PM', 'Read'),
(4, 17, 0, '8087290822', 'Administrator', '12/12/2021 01:06 PM', 'Unread'),
(5, 53, 16, '4030445851', 'Ventrusa, Shaina Mae O.', '', 'Read'),
(6, 53, 16, '415149974', 'Ventrusa, Shaina Mae O.', '', 'Unread'),
(7, 17, 14, '5805873927', 'Abdullah, Nurullajie S.', '', 'Unread'),
(8, 13, 0, '7848209670', 'Administrator', '12/12/2021 02:19 PM', 'Read'),
(9, 17, 0, '7848209670', 'Administrator', '12/12/2021 02:19 PM', 'Unread'),
(10, 53, 0, '7848209670', 'Administrator', '12/12/2021 02:19 PM', 'Unread'),
(11, 17, 14, '7676897667', 'Abdullah, Nurullajie S.', '', 'Unread'),
(12, 53, 14, '7676897667', 'Abdullah, Nurullajie S.', '', 'Unread'),
(13, 0, 0, '2680432605', 'Administrator', '12/12/2021 02:36 PM', 'Unread'),
(14, 53, 0, '', 'Administrator', '12/12/2021 02:37 PM', 'Unread'),
(15, 53, 0, '9224810136', 'Administrator', '12/12/2021 02:38 PM', 'Read'),
(16, 61, 0, '', 'Administrator', '12/12/2021 03:17 PM', 'Unread'),
(17, 61, 0, '495268649', 'Administrator', '12/12/2021 03:17 PM', 'Unread'),
(18, 61, 0, '359058404', 'Administrator', '12/12/2021 03:18 PM', 'Unread'),
(19, 0, 0, '9635933744', 'Administrator', '12/12/2021 03:18 PM', 'Unread'),
(20, 0, 0, '8469875567', 'Administrator', '12/12/2021 03:18 PM', 'Unread'),
(21, 61, 0, '1840083034', 'Administrator', '12/12/2021 03:18 PM', 'Unread'),
(22, 0, 0, '', 'Administrator', '12/12/2021 03:19 PM', 'Unread'),
(23, 0, 0, '1650943989', 'Administrator', '12/13/2021 01:33 PM', 'Unread'),
(24, 0, 71, '227598812', 'Connor, Susan A.', '', 'Unread'),
(25, 0, 71, '1044376190', 'Connor, Susan A.', '', 'Unread'),
(26, 72, 0, '7610068087', 'Administrator', '12/13/2021 04:01 PM', 'Read'),
(27, 72, 0, '', 'Administrator', '12/13/2021 04:09 PM', 'Read'),
(28, 0, 0, '', 'Administrator', '12/13/2021 04:11 PM', 'Unread'),
(29, 72, 0, '2336562561', 'Administrator', '12/13/2021 04:15 PM', 'Read');

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
(16, NULL, NULL, '2257042', 'Ventrusa, Shaina Mae O.', '', 'THM Department', 'Releasing Officer', '2021-10-28 15:52:08', '@gmail.com', 'shainaventrusa05', 'shainaventrusa05', '', 97655454545, '', NULL, 0, '2021-11-30 16:54:15', ''),
(17, NULL, NULL, '2513208', 'Bagundang, Zarah Mae G.', '', 'THM Department', 'Receiving Officer', '2021-10-28 15:52:15', '@gmail.com', 'zarahbagundang06', 'zarahbagundang06', '', 9765546778, '', NULL, 0, '2021-12-01 21:56:36', ''),
(46, NULL, NULL, '45966939', 'Nicole G. Mancao', '', 'GE Department', 'Department Head', '2021-11-23 14:28:09', 'mancaonicole320@yahoo.com', 'nicole123', '', '', 9756678900, '', NULL, 0, '', ''),
(47, NULL, NULL, '7076768', 'Caster G. Mancao', '', 'GE Department', 'Releasing Officer', '2021-11-14 20:23:39', '@gmail.com', 'caster123', 'caster123', '', 9877676666, '', NULL, 0, '', ''),
(51, NULL, NULL, '90428182', 'Anthon C. Benedic', '', 'Finance Department', 'Department Head', '2021-11-28 13:12:24', 'anthon@gmail.com', 'athon', 'anthon123', '', 22222222222, '', NULL, 0, '', ''),
(52, NULL, NULL, '278069', 'Samantha B. De Jesus', '', 'Finance Department', 'Releasing Officer', '2021-12-12 05:47:47', '@gmail.com', 'samantha', 'samantha123', '', 9217324736, '', NULL, 0, '', ''),
(53, NULL, NULL, '6132287', 'Adrian L. Lopez', '', 'Finance Department', 'Receiving Officer', '2021-11-28 13:16:14', '@gmail.com', 'adrian', 'adrian123', '', 22222222222, '', NULL, 0, '2021-12-01 21:54:57', ''),
(60, NULL, NULL, '70121507', 'Bernardo, Kath L.', '', 'Marketing Department', 'Department Head', '2021-12-12 14:49:57', 'kath@gmail.com', 'kathrine', 'ZZWFCMBO#V', '', 9123456789, '', NULL, 0, '', ''),
(66, NULL, NULL, '1101185', 'Reid, James A.', '', 'Marketing Department', 'Releasing Officer', '2021-12-13 02:03:54', 'james@gmail.com', 'employee1', 'RKI0OK', '', 93456778898, '', NULL, 0, '', ''),
(70, NULL, NULL, '29638634', 'Cabal, John J.', '', 'Statiscal Department', 'Department Head', '2021-12-13 15:36:41', 'john@gmail.com', 'john_cabal', '5V@0XU', '', 9765545454, '', NULL, 0, '', ''),
(71, NULL, NULL, '3485166', 'Connor, Susan A.', '', 'Statiscal Department', 'Releasing Officer', '2021-12-13 15:38:37', 'susan@gmail.com', 'susan_connor', 'T0RGLP', '', 9786678899, '', NULL, 0, '', ''),
(72, NULL, NULL, '4457335', 'Green, Leo R.', '', 'Statiscal Department', 'Receiving Officer', '2021-12-13 15:39:53', 'leo@gmail.com', 'leo_green', 'L5BE3P', '', 9678997654, '', NULL, 0, '', '');

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
(1, 52, '6047613430', 'Anthon C. Benedic', '12/12/2021 11:12 AM', 'Read'),
(2, 52, '2542696389', 'Anthon C. Benedic', '12/12/2021 12:56 PM', 'Read'),
(3, 16, '4030445851', 'Ali, Noria K.', '12/12/2021 01:10 PM', 'Read'),
(4, 14, '5805873927', 'Smith, David A.', '12/12/2021 01:28 PM', 'Read'),
(5, 16, '415149974', 'Ali, Noria K.', '12/12/2021 01:55 PM', 'Read'),
(6, 14, '7676897667', 'Smith, David A.', '12/12/2021 02:28 PM', 'Read'),
(7, 16, '1325022848', 'Ventrusa, Shaina Mae O.', '12/12/2021 03:21 PM', 'Unread'),
(8, 71, '227598812', 'Cabal, John J.', '12/13/2021 03:42 PM', 'Read'),
(9, 71, '1044376190', 'Cabal, John J.', '12/13/2021 03:57 PM', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_action`
--

CREATE TABLE `tbl_action` (
  `id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `action_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_action`
--

INSERT INTO `tbl_action` (`id`, `action`, `action_description`) VALUES
(1, 'kuyaw', ''),
(2, 'kuyawa', ''),
(3, 'hakdog', '');

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
(92, 'GE Department'),
(104, 'Marketing Department'),
(108, 'Statistical Department');

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
(1, 'admin', 'Admin Docu Type', 'aa', NULL),
(2, 'THM Department', 'thm', 'thm', NULL),
(4, 'GE Department', 'GE doctype', 'none', NULL),
(7, 'Finance Department', 'Business Letters', 'Business details and other information', NULL),
(8, 'Finance Department', 'Transactional Documents', 'Transactional Documents', NULL),
(9, 'Finance Department', 'Financial Reports and Documents', 'Financial Reports and Documents.', NULL),
(20, 'admin', 'isa pa', '', NULL),
(21, 'admin', 'one more', '', NULL),
(22, 'admin', 'lasttttttttttt', '', NULL),
(23, 'admin', 'New document type', '', NULL),
(24, 'admin', 'Tae tubol', '', NULL),
(25, 'THM Department', 'huy', 'hoy', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_notif_received_file`
--
ALTER TABLE `admin_notif_received_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_notif_receiver`
--
ALTER TABLE `admin_notif_receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_notif_releaser`
--
ALTER TABLE `admin_notif_releaser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_outgoing_file`
--
ALTER TABLE `admin_outgoing_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_receive_file`
--
ALTER TABLE `admin_receive_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notif_admin_receive_head`
--
ALTER TABLE `notif_admin_receive_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notif_admin_receive_release`
--
ALTER TABLE `notif_admin_receive_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notif_head_send_receive`
--
ALTER TABLE `notif_head_send_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notif_head_send_release`
--
ALTER TABLE `notif_head_send_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notif_receive`
--
ALTER TABLE `notif_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notif_receive_released`
--
ALTER TABLE `notif_receive_released`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notif_release`
--
ALTER TABLE `notif_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receive_file`
--
ALTER TABLE `receive_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `release_file`
--
ALTER TABLE `release_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_action`
--
ALTER TABLE `tbl_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `des_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_typedocument`
--
ALTER TABLE `tbl_typedocument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- Constraints for table `tbl_typedocument`
--
ALTER TABLE `tbl_typedocument`
  ADD CONSTRAINT `doc_type` FOREIGN KEY (`doc_id`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
