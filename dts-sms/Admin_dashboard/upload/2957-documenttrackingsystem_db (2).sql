-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 03:18 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(142, 'green.png', 'BACOMM Department', 'Admin', 'Administrator', 'Administrator', '1998-05-22 00:00:00', 'juan.delacruz@gmail.com', 'admin', 'admin123', '@Admin123', 111, 'Cot');

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
(1, '112264505', 'Department Head', 'BSSW Department', 'BSSW Department', 'Kaliman, Ezriel', 'Taboada, Alfred', 'Covivor', '12/14/2021', '11:23 AM', 1),
(2, '8044106207', 'Department Head', 'BSSW Department', 'BSSW Department', 'Kaliman, Ezriel', 'Taboada, Alfred', 'Cyber Security Agenda', '12/17/2021', '01:13 PM', 1),
(3, '507306795', 'Department Head', 'THM Department', 'THM Department', 'Ali, Noria K.', 'Ventrusa, Shaina Mae O.', 'Happy new year', '01/03/2022', '03:51 PM', 1),
(4, '2898420545', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', 'Abdullah, Nurullajie S.', 'Multipart', '01/04/2022', '07:49 AM', 1),
(5, '6830469020', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', 'Abdullah, Nurullajie S.', 'Final', '01/04/2022', '02:59 PM', 1),
(6, '543268120', 'Department Head', 'THM Department', 'THM Department', 'Ali, Noria K.', 'Ventrusa, Shaina Mae O.', 'Files', '01/05/2022', '04:29 PM', 1),
(7, '8851439047', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', '', 'Mari', '01/08/2022', '02:17 PM', 0),
(8, '4204058140', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', '', 'Marie', '01/08/2022', '04:36 PM', 0),
(9, '1695220236', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', '', 'KyMarie', '01/08/2022', '05:11 PM', 0),
(10, '6846307368', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', '', 'May Final na Docu', '01/09/2022', '10:05 AM', 0),
(11, '8742645962', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', '', 'Haynalamang', '01/09/2022', '11:38 AM', 0),
(12, '9744991365', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', '', 'The last is you', '01/09/2022', '02:18 PM', 0),
(13, '8755935858', 'Department Head', 'ICT Department', 'ICT Department', 'Smith, David A.', '', 'This is the last docu ive send', '01/09/2022', '02:48 PM', 0);

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
(1, 'BSSW Department', '8044106207', 'Taboada, Alfred', '', '12/17/2021', '01:16 PM', 1),
(2, 'THM Department', '507306795', 'Ventrusa, Shaina Mae O.', '', '01/03/2022', '03:52 PM', 1),
(3, 'THM Department', '', 'Bagundang, Zarah Mae G.', '', '01/08/2022', '04:56 PM', 0);

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
(1, '112264505', 76, 'Taboada, Alfred (BSSW Department)', '12/14/2021', '11:31 AM', 1),
(2, '8044106207', 76, 'Taboada, Alfred (BSSW Department)', '12/17/2021', '01:21 PM', 1),
(3, '8044106207', 17, 'Taboada, Alfred (BSSW Department)', '01/03/2022', '07:28 PM', 1),
(4, '507306795', 13, 'Ventrusa, Shaina Mae O. (THM Department)', '01/03/2022', '07:32 PM', 1),
(5, '8044106207', 13, 'Taboada, Alfred (BSSW Department)', '01/03/2022', '07:32 PM', 1),
(6, '', 13, '', '01/05/2022', '03:52 PM', 1),
(7, '543268120', 13, 'Ventrusa, Shaina Mae O. (THM Department)', '01/05/2022', '04:31 PM', 1),
(8, '1695220236', 17, 'Aron Joseph (ICT Department)', '01/08/2022', '05:13 PM', 0),
(9, '6846307368', 76, 'Aron Joseph (ICT Department)', '01/09/2022', '11:36 AM', 0),
(10, '8742645962', 17, 'Aron Joseph (ICT Department)', '01/09/2022', '11:45 AM', 0),
(11, '8742645962', 76, 'Aron Joseph (ICT Department)', '01/09/2022', '02:13 PM', 0),
(12, '9744991365', 17, 'Aron Joseph (ICT Department)', '01/09/2022', '02:21 PM', 0),
(13, '8755935858', 17, 'Aron Joseph (ICT Department)', '01/09/2022', '02:49 PM', 0),
(14, '8755935858', 76, 'Aron Joseph (ICT Department)', '01/09/2022', '02:52 PM', 0),
(15, '1695220236', 81, 'Bagundang, Zarah Mae G. (ICT Department)', '01/09/2022', '06:35 PM', 0);

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
(1, '112264505', 'Releasing Officer', 'BSSW Department', 'Taboada, Alfred', 76, '', '12/14/2021', '11:29 AM', 1),
(2, '8044106207', 'Releasing Officer', 'BSSW Department', 'Taboada, Alfred', 13, '', '12/17/2021', '01:16 PM', 1),
(3, '8044106207', 'Releasing Officer', 'BSSW Department', 'Taboada, Alfred', 17, '', '12/17/2021', '01:16 PM', 1),
(4, '8044106207', 'Releasing Officer', 'BSSW Department', 'Taboada, Alfred', 76, '', '12/17/2021', '01:16 PM', 1),
(5, '507306795', 'Releasing Officer', 'THM Department', 'Ventrusa, Shaina Mae O.', 13, '', '01/03/2022', '03:52 PM', 1),
(6, '507306795', 'Releasing Officer', 'THM Department', 'Ventrusa, Shaina Mae O.', 76, '', '01/03/2022', '03:52 PM', 1),
(7, '507306795', 'Releasing Officer', 'THM Department', 'Ventrusa, Shaina Mae O.', 78, '', '01/03/2022', '03:52 PM', 1),
(8, '543268120', 'Releasing Officer', 'THM Department', 'Ventrusa, Shaina Mae O.', 13, '', '01/05/2022', '04:30 PM', 1),
(9, '', 'Releasing Officer', 'THM Department', 'Bagundang, Zarah Mae G.', 13, '', '01/08/2022', '04:56 PM', 1),
(10, '', 'Releasing Officer', 'THM Department', 'Bagundang, Zarah Mae G.', 76, '', '01/08/2022', '04:56 PM', 1),
(11, '', 'Releasing Officer', 'THM Department', 'Bagundang, Zarah Mae G.', 78, '', '01/08/2022', '04:56 PM', 1),
(12, '4204058140', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 17, '', '01/08/2022', '05:02 PM', 1),
(13, '4204058140', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 76, '', '01/08/2022', '05:02 PM', 1),
(14, '4204058140', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 78, '', '01/08/2022', '05:02 PM', 1),
(15, '1695220236', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 17, '', '01/08/2022', '05:12 PM', 1),
(16, '1695220236', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 76, '', '01/08/2022', '05:12 PM', 1),
(17, '1695220236', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 78, '', '01/08/2022', '05:12 PM', 1),
(18, '1695220236', 'Releasing Officer', 'THM Department', 'Bagundang, Zarah Mae G.', 81, '', '01/08/2022', '05:14 PM', 1),
(19, '507306795', 'Releasing Officer', '<br />\r\n<b>Notice</b>:  Undefined variable: department in <b>C:xampphtdocsdtsdts-smsAdmin_dashboard\receive_docu.php</b> on line <b>280</b><br />\r\n', 'Administrator', 0, '', '01/08/2022', '06:35 PM', 0),
(20, '507306795', 'Releasing Officer', '', 'Administrator', 13, '', '01/08/2022', '06:40 PM', 0),
(21, '507306795', 'Releasing Officer', '', 'Administrator', 17, '', '01/08/2022', '06:40 PM', 0),
(22, '507306795', 'Releasing Officer', '', 'Administrator', 13, '', '01/08/2022', '06:42 PM', 0),
(23, '507306795', 'Releasing Officer', '', 'Administrator', 17, '', '01/08/2022', '06:42 PM', 0),
(24, '507306795', 'Releasing Officer', '', 'Administrator', 13, '', '01/08/2022', '06:45 PM', 0),
(25, '507306795', 'Releasing Officer', '', 'Administrator', 17, '', '01/08/2022', '06:45 PM', 0),
(26, '507306795', 'Releasing Officer', 'Administrator', 'Administrator', 13, '', '01/08/2022', '06:45 PM', 0),
(27, '507306795', 'Releasing Officer', 'Administrator', 'Administrator', 17, '', '01/08/2022', '06:45 PM', 0),
(28, '507306795', 'Releasing Officer', 'Administrator', 'Administrator', 13, '', '01/08/2022', '06:46 PM', 0),
(29, '507306795', 'Releasing Officer', 'Administrator', 'Administrator', 17, '', '01/08/2022', '06:46 PM', 0),
(30, '507306795', 'Releasing Officer', 'Administrator', 'Administrator', 78, '', '01/08/2022', '06:52 PM', 0),
(31, '507306795', 'Releasing Officer', 'Administrator', 'Administrator', 81, '', '01/08/2022', '06:52 PM', 0),
(32, '6846307368', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 17, '', '01/09/2022', '10:18 AM', 0),
(33, '6846307368', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 76, '', '01/09/2022', '10:18 AM', 0),
(34, '6846307368', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 78, '', '01/09/2022', '10:18 AM', 0),
(35, '8742645962', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 17, '', '01/09/2022', '11:41 AM', 0),
(36, '8742645962', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 76, '', '01/09/2022', '11:41 AM', 0),
(37, '8851439047', 'Releasing Officer', 'ICT Department', 'Abdullah, Nurullajie S.', 17, '', '01/09/2022', '01:59 PM', 0),
(38, '8851439047', 'Releasing Officer', 'ICT Department', 'Abdullah, Nurullajie S.', 76, '', '01/09/2022', '01:59 PM', 0),
(39, '9744991365', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 17, '', '01/09/2022', '02:19 PM', 0),
(40, '9744991365', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 76, '', '01/09/2022', '02:19 PM', 0),
(41, '9744991365', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 78, '', '01/09/2022', '02:19 PM', 0),
(42, '8755935858', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 17, '', '01/09/2022', '02:48 PM', 0),
(43, '8755935858', 'Releasing Officer', 'ICT Department', 'Aron Joseph', 76, '', '01/09/2022', '02:48 PM', 0),
(44, '8755935858', 'Releasing Officer', 'THM Department', 'Bagundang, Zarah Mae G.', 13, '', '01/09/2022', '02:49 PM', 0);

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

--
-- Dumping data for table `admin_receive_file`
--

INSERT INTO `admin_receive_file` (`id`, `tracking_no`, `releaser_name`, `date_time`, `status`) VALUES
(1, '8044106207', 'Taboada, Alfred', '12/17/2021 01:16 PM', 'Read'),
(2, '507306795', 'Ventrusa, Shaina Mae O.', '01/03/2022 03:52 PM', 'Read'),
(3, '', 'Bagundang, Zarah Mae G.', '01/08/2022 04:56 PM', 'Unread');

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
(57, 'BTLED Depeartment', 'Luna, Irish Bianca A.', '2021-12-14 10:45:40', 'luna.@example.com', 'lunairish', '', 9111111111, 'cotabato city'),
(58, 'BSSW Department', 'Taboada, Alfred', '2021-12-14 10:48:51', 'taboada@example.com', 'taboada', '', 9263726373, 'cot'),
(59, 'BTLED Depeartment', 'Kapina, Mohammad', '2021-12-14 10:49:39', 'Kapina@gmail.com', 'kapina', '', 9123713271, 'cot'),
(60, 'BTLED Depeartment', 'Nunez, Rachelle', '2021-12-14 10:51:12', 'Nunez@example.com', 'nunezz', '', 9127371322, 'cot'),
(61, 'BSSW Department', 'Kaliman, Ezriel', '2021-12-14 10:52:14', 'kaliman@example.com', 'kaliman', '', 9127382322, 'cot'),
(62, 'BSSW Department', 'Ching, Jenelyn ', '2021-12-14 10:53:14', 'ching@example.com', 'chingj', '', 9213767232, 'cot'),
(63, 'ICT Department', 'Mancao, Nicole Haylynn G.', '2022-01-05 15:17:21', 'nicolehaylynn@gmail.com', 'nicole22', '', 9756634444, 'ss');

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
(90, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(91, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(92, 'Kapina, Mohammad', 'BTLED Depeartment', 'Department Head', '2021-12-14 10:54:18', 'Kapina@gmail.com', 'kapina', '6S6G8O', '', 9123713271, ''),
(93, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(94, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(95, 'Kapina, Mohammad', 'BTLED Depeartment', 'Department Head', '2021-12-14 10:54:18', 'Kapina@gmail.com', 'kapina', '6S6G8O', '', 9123713271, ''),
(96, 'Kaliman, Ezriel', 'BSSW Department', 'Department Head', '2021-12-14 10:54:54', 'kaliman@example.com', 'kaliman', '07W4LF', '', 9127382322, ''),
(97, 'Smith, David A.', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'abc@yahoo.con', 'smith', '123456', '', 11111111111, ''),
(98, 'Ali, Noria K.', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria123', '123456', '', 11111111111, ''),
(99, 'Kapina, Mohammad', 'BTLED Depeartment', 'Department Head', '2021-12-14 10:54:18', 'Kapina@gmail.com', 'kapina', '6S6G8O', '', 9123713271, ''),
(100, 'Kaliman, Ezriel', 'BSSW Department', 'Department Head', '2021-12-14 10:54:54', 'kaliman@example.com', 'kaliman', '07W4LF', '', 9127382322, ''),
(101, 'Mancao, Nicole Haylynn G.', 'ICT Department', 'Department Head', '2022-01-05 15:18:05', 'nicolehaylynn@gmail.com', 'nicole22', 'UDSU@W', '', 9756634444, '');

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
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`id`, `user`, `phone_number`, `tracking_no`, `file_name`, `file_description`, `select_date`, `department`, `attach_file`, `type_document`, `routedTo`, `pleaseNote`, `forYour`, `status`, `created_at`) VALUES
(1, 'kaliman', '', '112264505', 'Covivor', 'covid', '12/14/2021 11:23 AM', 'BSSW Department', '3836-COVIVOR_MobileGame_PT (Autosaved).docx', 'video type', 'BTLED Depeartment', '', 'watch video', 'Send', '0000-00-00 00:00:00'),
(2, 'kaliman', '', '8044106207', 'Cyber Security Agenda', 'Good day! Pls send this sheet to Admin and all receiving officers for updates and clarifications. Thank you', '12/17/2021 01:13 PM', 'BSSW Department', '7273-p2.png', 'video type', 'Administrative Section', '', 'watch video', 'Send', '0000-00-00 00:00:00'),
(3, 'noria123', '', '507306795', 'Happy new year', 'Hi, forward this document to all departments including the adminstrator.', '01/03/2022 03:51 PM', 'THM Department', '9912-06 Laboratory Exercise Levels.docx', 'New year 2022', 'All Departments', '', 'Holliday season', 'Send', '0000-00-00 00:00:00'),
(8, 'smith', '', '2898420545', 'Multipart', 'Multiple uploads of files', '01/04/2022 07:49 AM', 'ICT Department', '8489-l.png', '', 'All Departments', '', 'action', 'Send', '0000-00-00 00:00:00'),
(9, 'smith', '', '6830469020', 'Final', 'defense', '01/04/2022 02:59 PM', 'ICT Department', '4216-', 'final type', 'BSSW Department', '', 'action', 'Send', '0000-00-00 00:00:00'),
(11, 'noria123', '', '728627859', 'ddf', 'dfdf', '01/05/2022 03:43 PM', 'THM Department', '3984-', 'dd', '', '', '', 'Draft', '0000-00-00 00:00:00'),
(12, '', '', '', '', '', '01/05/2022 03:43 PM', 'Administrator', '2269-', '', '', '', '', 'Send', '0000-00-00 00:00:00'),
(13, 'noria123', '', '543268120', 'Files', 'Good day! This file is for mr. Abdullah from ms. Shai. For further info, kindly check and download this file.', '01/05/2022 04:29 PM', 'THM Department', '1463-David - 2022.01.04 - 01.56.27pm.jpg', 'rer', 'ICT Department', '', 'Holiday', 'Send', '0000-00-00 00:00:00'),
(14, 'noria123', '', '1461863218', '', '', '01/05/2022 04:34 PM', 'THM Department', '1643-', '', '', '', '', 'Draft', '0000-00-00 00:00:00'),
(15, '', '', '9178631020', 'Kyla ', 'Kyla', '01/08/2022 12:44 PM', 'Administrator', '5011-8489-l.png', 'dd', '', '', 'Information / References', 'Send', '0000-00-00 00:00:00'),
(16, 'smith', '', '8851439047', 'Mari', 'Mari', '01/08/2022 02:17 PM', 'ICT Department', '3990-', 'bago', 'THM Department', '', 'xxx', 'Send', '0000-00-00 00:00:00'),
(17, 'smith', '', '4204058140', 'Marie', 'Marie', '01/08/2022 04:36 PM', 'ICT Department', '4926-', 'bago', 'THM Department', '', 'www', 'Send', '0000-00-00 00:00:00'),
(18, 'smith', '', '1695220236', 'KyMarie', 'KyMarie', '01/08/2022 05:11 PM', 'ICT Department', '4359-', 'bago', 'THM Department', '', 'xxx', 'Send', '2022-01-08 17:11:00'),
(19, 'smith', '', '6846307368', 'May Final na Docu', 'May Final na Docu', '01/09/2022 10:05 AM', 'ICT Department', '1175-', 'bago', 'Administrative Section', '', 'action', 'Send', '0000-00-00 00:00:00'),
(20, 'smith', '', '8742645962', 'Haynalamang', 'Haynalamang', '01/09/2022 11:38 AM', 'ICT Department', '7660-8489-l.png', 'bago', 'THM Department', '', 'action', 'Send', '0000-00-00 00:00:00'),
(21, 'smith', '', '9744991365', 'The last is you', 'The last is you', '01/09/2022 02:18 PM', 'ICT Department', '4139-login-removebg-preview.png', 'final type', 'THM Department', '', 'ddd', 'Send', '0000-00-00 00:00:00'),
(22, 'smith', '', '8755935858', 'This is the last docu ive send', 'This is the last docu ive send', '01/09/2022 02:48 PM', 'ICT Department', '2239-8489-l.png', 'bago', 'THM Department', '', 'action', 'Send', '0000-00-00 00:00:00'),
(23, '', '', '3341879440', 'Ngiiiiiiiiiiiiiiiiii', 'Ngiiiiiiiiiiiiiiiiii', '01/09/2022 03:01 PM', 'Administrator', '6703-9515-latestdb.sql', 'dd', '', '', 'xxx', 'Draft', '0000-00-00 00:00:00'),
(24, '', '', '4813579468', 'HEHEHEH', 'HEHEHEH', '01/09/2022 03:02 PM', 'Administrator', '8621-', 'dd', '', '', 'www', 'Send', '0000-00-00 00:00:00'),
(25, '', '', '3953314137', 'KUha kana', 'adada', '01/09/2022 03:03 PM', 'Administrator', '7686-8489-l (1).png', 'dd', '', '', 'xxx', 'Send', '0000-00-00 00:00:00'),
(26, '', '', '2459150321', 'dasdasdasdasd', 'dsasdasd', '01/09/2022 03:03 PM', 'Administrator', '3299-', 'dd', '', '', 'xxx', 'Send', '0000-00-00 00:00:00'),
(27, '', '', '8795039595', 'mmomo', 'mmomo', '01/09/2022 03:05 PM', 'Administrator', '6122-doh_trs.sql', 'dd', '', '', 'www', 'Send', '0000-00-00 00:00:00'),
(28, '', '', '9238121812', 'bbbbb', 'dadasd', '01/09/2022 03:14 PM', 'Administrator', '7984-9515-latestdb.sql', 'dd', '', '', 'xxx', 'Draft', '0000-00-00 00:00:00'),
(29, '', '', '7438330164', 'aaaaa', 'aaa', '01/09/2022 03:22 PM', 'Administrator', '3328-', 'dd', '', '', 'xxx', 'Send', '0000-00-00 00:00:00'),
(30, '', '', '1829456387', 'sdasdasdasd', 'asdasd', '01/09/2022 03:22 PM', 'Administrator', '2919-', 'dd', '', '', 'xxx', 'Send', '0000-00-00 00:00:00'),
(31, '', '', '5933136683', 'aaadasdadfaefqe', 'adad', '01/09/2022 03:22 PM', 'Administrator', '7384-', 'dd', '', '', 'xxx', 'Draft', '0000-00-00 00:00:00'),
(32, '', '', '', '', '', '01/09/2022 03:23 PM', 'Administrator', '7231-', '', '', '', '', 'Draft', '0000-00-00 00:00:00'),
(33, 'smith', '', '3986590421', 'This is the last docu ive draft', 'This is the last docu ive draft', '01/09/2022 03:25 PM', 'ICT Department', '7648-', 'bago', 'THM Department', '', 'action', 'Send', '0000-00-00 00:00:00'),
(34, 'smith', '', '83324133', 'ffffffffffff', 'ffffffffffff', '01/09/2022 03:26 PM', 'ICT Department', '5376-', 'bago', 'Regulation Section', '', 'action', 'Draft', '0000-00-00 00:00:00'),
(35, '', '', '2179654671', 'HAHA', 'aaa', '01/09/2022 03:30 PM', 'Administrator', '5980-', 'dd', '', '', 'xxx', 'Send', '0000-00-00 00:00:00'),
(36, '', '', '7419506913', 'aaa', 'dsd', '01/09/2022 03:31 PM', 'Administrator', '7056-', 'dd', '', '', 'xxx', 'Draft', '0000-00-00 00:00:00');

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
(2, '507306795', '', 'Administrator', '01/03/2022', '03:53 PM', 1);

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
(1, '8044106207', '', 'Administrator', '12/17/2021', '01:19 PM', 0),
(2, '507306795', '', 'Administrator', '01/03/2022', '03:53 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notif_head_receive_receive`
--

CREATE TABLE `notif_head_receive_receive` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `releaser_name` varchar(255) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif_head_receive_receive`
--

INSERT INTO `notif_head_receive_receive` (`id`, `receiver_id`, `department`, `releaser_name`, `tracking_no`, `document`, `date`, `time`, `status`) VALUES
(1, 13, 'Administrator', 'Administrator', '9178631020', 'Kyla ', '01/08/2022', '12:44 PM', 1),
(2, 17, 'Administrator', 'Administrator', '9178631020', 'Kyla ', '01/08/2022', '12:44 PM', 1),
(3, 13, 'Administrator', 'Administrator', '3341879440', 'Ngiiiiiiiiiiiiiiiiii', '01/09/2022', '03:01 PM', 0),
(4, 13, 'Administrator', 'Administrator', '4813579468', 'HEHEHEH', '01/09/2022', '03:02 PM', 0),
(5, 17, 'Administrator', 'Administrator', '4813579468', 'HEHEHEH', '01/09/2022', '03:02 PM', 0),
(6, 13, 'Administrator', 'Administrator', '3953314137', 'KUha kana', '01/09/2022', '03:03 PM', 0),
(7, 13, 'Administrator', 'Administrator', '2459150321', 'dasdasdasdasd', '01/09/2022', '03:03 PM', 0),
(8, 17, 'Administrator', 'Administrator', '2459150321', 'dasdasdasdasd', '01/09/2022', '03:03 PM', 0),
(9, 0, 'Administrator', 'Administrator', '8795039595', 'mmomo', '01/09/2022', '03:05 PM', 0),
(10, 13, 'Administrator', 'Administrator', '9238121812', 'bbbbb', '01/09/2022', '03:14 PM', 0),
(11, 13, 'Administrator', 'Administrator', '7438330164', 'aaaaa', '01/09/2022', '03:22 PM', 0),
(12, 13, 'Administrator', 'Administrator', '1829456387', 'sdasdasdasd', '01/09/2022', '03:22 PM', 0),
(13, 17, 'Administrator', 'Administrator', '1829456387', 'sdasdasdasd', '01/09/2022', '03:22 PM', 0),
(14, 0, 'Administrator', 'Administrator', '5933136683', 'aaadasdadfaefqe', '01/09/2022', '03:22 PM', 0),
(15, 13, 'Administrator', 'Administrator', '', '', '01/09/2022', '03:23 PM', 0),
(16, 0, 'Administrator', 'Administrator', '2179654671', 'HAHA', '01/09/2022', '03:30 PM', 0),
(17, 0, 'Administrator', 'Administrator', '7419506913', 'aaa', '01/09/2022', '03:31 PM', 0);

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
(6, '', 'ICT Department', 13, '', '01/05/2022', '03:52 PM', 1),
(7, '543268120', 'ICT Department', 13, 'Ventrusa, Shaina Mae O. (THM Department)', '01/05/2022', '04:31 PM', 1),
(8, '1695220236', 'THM Department', 17, 'Aron Joseph (ICT Department)', '01/08/2022', '05:13 PM', 0),
(9, '6846307368', 'BTLED Depeartment', 76, 'Aron Joseph (ICT Department)', '01/09/2022', '11:36 AM', 0),
(10, '8742645962', 'THM Department', 17, 'Aron Joseph (ICT Department)', '01/09/2022', '11:45 AM', 0),
(11, '8742645962', 'BTLED Depeartment', 76, 'Aron Joseph (ICT Department)', '01/09/2022', '02:13 PM', 0),
(12, '9744991365', 'THM Department', 17, 'Aron Joseph (ICT Department)', '01/09/2022', '02:21 PM', 0),
(13, '8755935858', 'THM Department', 17, 'Aron Joseph (ICT Department)', '01/09/2022', '02:49 PM', 0),
(14, '8755935858', 'BTLED Depeartment', 76, 'Aron Joseph (ICT Department)', '01/09/2022', '02:52 PM', 0),
(15, '1695220236', 'ICT Department', 81, 'Bagundang, Zarah Mae G. (ICT Department)', '01/09/2022', '06:35 PM', 0);

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
(1, 'BSSW Department', 0, 'Taboada, Alfred', 'Nunez, Rachelle', '112264505', '', '12/14/2021', '11:29 AM', 1),
(2, 'BSSW Department', 77, 'Taboada, Alfred', 'Administrator', '8044106207', '', '12/17/2021', '01:16 PM', 1),
(3, 'BSSW Department', 0, 'Taboada, Alfred', 'Bayao, Manot B.', '8044106207', '', '12/17/2021', '01:16 PM', 1),
(4, 'BSSW Department', 0, 'Taboada, Alfred', 'Bagundang, Zarah Mae G.', '8044106207', '', '12/17/2021', '01:16 PM', 1),
(5, 'BSSW Department', 0, 'Taboada, Alfred', 'Nunez, Rachelle', '8044106207', '', '12/17/2021', '01:16 PM', 1),
(6, 'THM Department', 16, 'Ventrusa, Shaina Mae O.', 'Administrator', '507306795', '', '01/03/2022', '03:52 PM', 1),
(7, 'THM Department', 0, 'Ventrusa, Shaina Mae O.', 'Bayao, Manot B.', '507306795', '', '01/03/2022', '03:52 PM', 1),
(8, 'THM Department', 0, 'Ventrusa, Shaina Mae O.', 'Nunez, Rachelle', '507306795', '', '01/03/2022', '03:52 PM', 1),
(9, 'THM Department', 0, 'Ventrusa, Shaina Mae O.', 'Ching, Jenelyn ', '507306795', '', '01/03/2022', '03:52 PM', 1),
(10, 'THM Department', 0, 'Ventrusa, Shaina Mae O.', 'Bayao, Manot B.', '543268120', '', '01/05/2022', '04:30 PM', 1),
(11, 'THM Department', 17, 'Bagundang, Zarah Mae G.', 'Administrator', '', '', '01/08/2022', '04:56 PM', 1),
(12, 'THM Department', 0, 'Bagundang, Zarah Mae G.', 'Bayao, Manot B.', '', '', '01/08/2022', '04:56 PM', 1),
(13, 'THM Department', 0, 'Bagundang, Zarah Mae G.', 'Nunez, Rachelle', '', '', '01/08/2022', '04:56 PM', 1),
(14, 'THM Department', 0, 'Bagundang, Zarah Mae G.', 'Ching, Jenelyn ', '', '', '01/08/2022', '04:56 PM', 1),
(15, 'ICT Department', 0, 'Aron Joseph', 'Bagundang, Zarah Mae G.', '4204058140', '', '01/08/2022', '05:02 PM', 1),
(16, 'ICT Department', 0, 'Aron Joseph', 'Nunez, Rachelle', '4204058140', '', '01/08/2022', '05:02 PM', 1),
(17, 'ICT Department', 0, 'Aron Joseph', 'Ching, Jenelyn ', '4204058140', '', '01/08/2022', '05:02 PM', 1),
(18, 'ICT Department', 0, 'Aron Joseph', 'Bagundang, Zarah Mae G.', '1695220236', '', '01/08/2022', '05:12 PM', 0),
(19, 'ICT Department', 0, 'Aron Joseph', 'Nunez, Rachelle', '1695220236', '', '01/08/2022', '05:12 PM', 0),
(20, 'ICT Department', 0, 'Aron Joseph', 'Ching, Jenelyn ', '1695220236', '', '01/08/2022', '05:12 PM', 0),
(21, 'THM Department', 0, 'Bagundang, Zarah Mae G.', 'Kyla Marie', '1695220236', '', '01/08/2022', '05:14 PM', 0),
(22, '<br />\r\n<b>Notice</b>:  Undefined variable: department in <b>C:xampphtdocsdtsdts-smsAdmin_dashboard\receive_docu.php</b> on line <b>280</b><br />\r\n', 0, 'Administrator', '', '507306795', '', '01/08/2022', '06:35 PM', 0),
(23, '', 0, 'Administrator', 'Bayao, Manot B.', '507306795', '', '01/08/2022', '06:40 PM', 0),
(24, '', 0, 'Administrator', 'Bagundang, Zarah Mae G.', '507306795', '', '01/08/2022', '06:40 PM', 0),
(25, '', 0, 'Administrator', 'Bayao, Manot B.', '507306795', '', '01/08/2022', '06:42 PM', 0),
(26, '', 0, 'Administrator', 'Bagundang, Zarah Mae G.', '507306795', '', '01/08/2022', '06:42 PM', 0),
(27, '', 0, 'Administrator', 'Bayao, Manot B.', '507306795', '', '01/08/2022', '06:45 PM', 0),
(28, '', 0, 'Administrator', 'Bagundang, Zarah Mae G.', '507306795', '', '01/08/2022', '06:45 PM', 0),
(29, 'Administrator', 0, 'Administrator', 'Bayao, Manot B.', '507306795', '', '01/08/2022', '06:45 PM', 0),
(30, 'Administrator', 0, 'Administrator', 'Bagundang, Zarah Mae G.', '507306795', '', '01/08/2022', '06:45 PM', 0),
(31, 'Administrator', 0, 'Administrator', 'Bayao, Manot B.', '507306795', '', '01/08/2022', '06:46 PM', 0),
(32, 'Administrator', 0, 'Administrator', 'Bagundang, Zarah Mae G.', '507306795', '', '01/08/2022', '06:46 PM', 0),
(33, 'Administrator', 0, 'Administrator', 'Ching, Jenelyn ', '507306795', '', '01/08/2022', '06:52 PM', 0),
(34, 'Administrator', 0, 'Administrator', 'Kyla Marie', '507306795', '', '01/08/2022', '06:52 PM', 0),
(35, 'ICT Department', 0, 'Aron Joseph', 'Bagundang, Zarah Mae G.', '6846307368', '', '01/09/2022', '10:18 AM', 0),
(36, 'ICT Department', 0, 'Aron Joseph', 'Nunez, Rachelle', '6846307368', '', '01/09/2022', '10:18 AM', 0),
(37, 'ICT Department', 0, 'Aron Joseph', 'Ching, Jenelyn ', '6846307368', '', '01/09/2022', '10:18 AM', 0),
(38, 'ICT Department', 0, 'Aron Joseph', 'Bagundang, Zarah Mae G.', '8742645962', '', '01/09/2022', '11:41 AM', 0),
(39, 'ICT Department', 0, 'Aron Joseph', 'Nunez, Rachelle', '8742645962', '', '01/09/2022', '11:41 AM', 0),
(40, 'ICT Department', 0, 'Abdullah, Nurullajie S.', 'Bagundang, Zarah Mae G.', '8851439047', '', '01/09/2022', '01:59 PM', 0),
(41, 'ICT Department', 0, 'Abdullah, Nurullajie S.', 'Nunez, Rachelle', '8851439047', '', '01/09/2022', '01:59 PM', 0),
(42, 'ICT Department', 0, 'Aron Joseph', 'Bagundang, Zarah Mae G.', '9744991365', '', '01/09/2022', '02:19 PM', 0),
(43, 'ICT Department', 0, 'Aron Joseph', 'Nunez, Rachelle', '9744991365', '', '01/09/2022', '02:19 PM', 0),
(44, 'ICT Department', 0, 'Aron Joseph', 'Ching, Jenelyn ', '9744991365', '', '01/09/2022', '02:19 PM', 0),
(45, 'ICT Department', 0, 'Aron Joseph', 'Bagundang, Zarah Mae G.', '8755935858', '', '01/09/2022', '02:48 PM', 0),
(46, 'ICT Department', 0, 'Aron Joseph', 'Nunez, Rachelle', '8755935858', '', '01/09/2022', '02:48 PM', 0),
(47, 'THM Department', 0, 'Bagundang, Zarah Mae G.', 'Bayao, Manot B.', '8755935858', '', '01/09/2022', '02:49 PM', 0);

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
(1, 76, 77, 'BSSW Department', 'Taboada, Alfred', '112264505', '', '12/14/2021', '11:29 AM', 0),
(2, 13, 77, 'BSSW Department', 'Taboada, Alfred', '8044106207', '', '12/17/2021', '01:16 PM', 0),
(3, 17, 77, 'BSSW Department', 'Taboada, Alfred', '8044106207', '', '12/17/2021', '01:16 PM', 0),
(4, 76, 77, 'BSSW Department', 'Taboada, Alfred', '8044106207', '', '12/17/2021', '01:16 PM', 0),
(5, 13, 16, 'THM Department', 'Ventrusa, Shaina Mae O.', '507306795', '', '01/03/2022', '03:52 PM', 0),
(6, 76, 16, 'THM Department', 'Ventrusa, Shaina Mae O.', '507306795', '', '01/03/2022', '03:52 PM', 0),
(7, 78, 16, 'THM Department', 'Ventrusa, Shaina Mae O.', '507306795', '', '01/03/2022', '03:52 PM', 0),
(8, 0, 0, 'Administrator', 'Administrator', '7333485158', '', '01/03/2022', '11:04 PM', 0),
(9, 0, 0, 'Administrator', 'Administrator', '', '', '01/03/2022', '11:04 PM', 0),
(10, 78, 0, 'Administrator', 'Administrator', '', '', '01/05/2022', '03:43 PM', 0),
(11, 76, 0, 'Administrator', 'Administrator', '', '', '01/05/2022', '03:43 PM', 0),
(12, 17, 0, 'Administrator', 'Administrator', '', '', '01/05/2022', '03:43 PM', 0),
(13, 13, 0, 'Administrator', 'Administrator', '', '', '01/05/2022', '03:43 PM', 0),
(14, 13, 16, 'THM Department', 'Ventrusa, Shaina Mae O.', '543268120', '', '01/05/2022', '04:30 PM', 0),
(15, 13, 0, 'Administrator', 'Administrator', '9178631020', 'Kyla ', '01/08/2022', '12:44 PM', 0),
(16, 17, 0, 'Administrator', 'Administrator', '9178631020', 'Kyla ', '01/08/2022', '12:44 PM', 0),
(17, 13, 17, 'THM Department', 'Bagundang, Zarah Mae G.', '', '', '01/08/2022', '04:56 PM', 0),
(18, 76, 17, 'THM Department', 'Bagundang, Zarah Mae G.', '', '', '01/08/2022', '04:56 PM', 0),
(19, 78, 17, 'THM Department', 'Bagundang, Zarah Mae G.', '', '', '01/08/2022', '04:56 PM', 0),
(20, 17, 80, 'ICT Department', 'Aron Joseph', '4204058140', '', '01/08/2022', '05:02 PM', 0),
(21, 76, 80, 'ICT Department', 'Aron Joseph', '4204058140', '', '01/08/2022', '05:02 PM', 0),
(22, 78, 80, 'ICT Department', 'Aron Joseph', '4204058140', '', '01/08/2022', '05:02 PM', 0),
(23, 17, 80, 'ICT Department', 'Aron Joseph', '1695220236', '', '01/08/2022', '05:12 PM', 0),
(24, 76, 80, 'ICT Department', 'Aron Joseph', '1695220236', '', '01/08/2022', '05:12 PM', 0),
(25, 78, 80, 'ICT Department', 'Aron Joseph', '1695220236', '', '01/08/2022', '05:12 PM', 0),
(26, 81, 17, 'THM Department', 'Bagundang, Zarah Mae G.', '1695220236', '', '01/08/2022', '05:14 PM', 1),
(27, 0, 0, '<br />\r\n<b>Notice</b>:  Undefined variable: department in <b>C:xampphtdocsdtsdts-smsAdmin_dashboard\receive_docu.php</b> on line <b>280</b><br />\r\n', 'Administrator', '507306795', '', '01/08/2022', '06:35 PM', 0),
(28, 13, 0, '', 'Administrator', '507306795', '', '01/08/2022', '06:40 PM', 0),
(29, 17, 0, '', 'Administrator', '507306795', '', '01/08/2022', '06:40 PM', 0),
(30, 13, 0, '', 'Administrator', '507306795', '', '01/08/2022', '06:42 PM', 0),
(31, 17, 0, '', 'Administrator', '507306795', '', '01/08/2022', '06:42 PM', 0),
(32, 13, 0, '', 'Administrator', '507306795', '', '01/08/2022', '06:45 PM', 0),
(33, 17, 0, '', 'Administrator', '507306795', '', '01/08/2022', '06:45 PM', 0),
(34, 13, 0, 'Administrator', 'Administrator', '507306795', '', '01/08/2022', '06:45 PM', 0),
(35, 17, 0, 'Administrator', 'Administrator', '507306795', '', '01/08/2022', '06:45 PM', 0),
(36, 13, 0, 'Administrator', 'Administrator', '507306795', '', '01/08/2022', '06:46 PM', 0),
(37, 17, 0, 'Administrator', 'Administrator', '507306795', '', '01/08/2022', '06:46 PM', 0),
(38, 78, 0, 'Administrator', 'Administrator', '507306795', '', '01/08/2022', '06:52 PM', 0),
(39, 81, 0, 'Administrator', 'Administrator', '507306795', '', '01/08/2022', '06:52 PM', 1),
(40, 17, 80, 'ICT Department', 'Aron Joseph', '6846307368', '', '01/09/2022', '10:18 AM', 0),
(41, 76, 80, 'ICT Department', 'Aron Joseph', '6846307368', '', '01/09/2022', '10:18 AM', 0),
(42, 78, 80, 'ICT Department', 'Aron Joseph', '6846307368', '', '01/09/2022', '10:18 AM', 0),
(43, 17, 80, 'ICT Department', 'Aron Joseph', '8742645962', '', '01/09/2022', '11:41 AM', 0),
(44, 76, 80, 'ICT Department', 'Aron Joseph', '8742645962', '', '01/09/2022', '11:41 AM', 0),
(45, 17, 14, 'ICT Department', 'Abdullah, Nurullajie S.', '8851439047', '', '01/09/2022', '01:59 PM', 0),
(46, 76, 14, 'ICT Department', 'Abdullah, Nurullajie S.', '8851439047', '', '01/09/2022', '01:59 PM', 0),
(47, 17, 80, 'ICT Department', 'Aron Joseph', '9744991365', '', '01/09/2022', '02:19 PM', 0),
(48, 76, 80, 'ICT Department', 'Aron Joseph', '9744991365', '', '01/09/2022', '02:19 PM', 0),
(49, 78, 80, 'ICT Department', 'Aron Joseph', '9744991365', '', '01/09/2022', '02:19 PM', 0),
(50, 17, 80, 'ICT Department', 'Aron Joseph', '8755935858', '', '01/09/2022', '02:48 PM', 0),
(51, 76, 80, 'ICT Department', 'Aron Joseph', '8755935858', '', '01/09/2022', '02:48 PM', 0),
(52, 13, 0, 'THM Department', 'Bagundang, Zarah Mae G.', '8755935858', '', '01/09/2022', '02:49 PM', 0),
(53, 13, 0, 'Administrator', 'Administrator', '3341879440', 'Ngiiiiiiiiiiiiiiiiii', '01/09/2022', '03:01 PM', 0),
(54, 13, 0, 'Administrator', 'Administrator', '4813579468', 'HEHEHEH', '01/09/2022', '03:02 PM', 0),
(55, 17, 0, 'Administrator', 'Administrator', '4813579468', 'HEHEHEH', '01/09/2022', '03:02 PM', 0),
(56, 13, 0, 'Administrator', 'Administrator', '3953314137', 'KUha kana', '01/09/2022', '03:03 PM', 0),
(57, 13, 0, 'Administrator', 'Administrator', '2459150321', 'dasdasdasdasd', '01/09/2022', '03:03 PM', 0),
(58, 17, 0, 'Administrator', 'Administrator', '2459150321', 'dasdasdasdasd', '01/09/2022', '03:03 PM', 0),
(59, 0, 0, 'Administrator', 'Administrator', '8795039595', 'mmomo', '01/09/2022', '03:05 PM', 0),
(60, 13, 0, 'Administrator', 'Administrator', '9238121812', 'bbbbb', '01/09/2022', '03:14 PM', 0),
(61, 13, 0, 'Administrator', 'Administrator', '7438330164', 'aaaaa', '01/09/2022', '03:22 PM', 0),
(62, 13, 0, 'Administrator', 'Administrator', '1829456387', 'sdasdasdasd', '01/09/2022', '03:22 PM', 0),
(63, 17, 0, 'Administrator', 'Administrator', '1829456387', 'sdasdasdasd', '01/09/2022', '03:22 PM', 0),
(64, 0, 0, 'Administrator', 'Administrator', '5933136683', 'aaadasdadfaefqe', '01/09/2022', '03:22 PM', 0),
(65, 13, 0, 'Administrator', 'Administrator', '', '', '01/09/2022', '03:23 PM', 0),
(66, 0, 0, 'Administrator', 'Administrator', '2179654671', 'HAHA', '01/09/2022', '03:30 PM', 0),
(67, 0, 0, 'Administrator', 'Administrator', '7419506913', 'aaa', '01/09/2022', '03:31 PM', 0);

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
(1, 77, '', 'BTLED Depeartment', 'Nunez, Rachelle ', '112264505', '12/14/2021', '11:31 AM', 1),
(2, 77, '', 'BTLED Depeartment', 'Nunez, Rachelle ', '8044106207', '12/17/2021', '01:21 PM', 1),
(3, 77, '', 'THM Department', 'Bagundang, Zarah Mae G. ', '8044106207', '01/03/2022', '07:28 PM', 0),
(4, 16, '', 'ICT Department', 'Bayao, Manot B. ', '507306795', '01/03/2022', '07:32 PM', 1),
(5, 77, '', 'ICT Department', 'Bayao, Manot B. ', '8044106207', '01/03/2022', '07:32 PM', 0),
(6, 0, '', 'ICT Department', 'Bayao, Manot B. ', '', '01/05/2022', '03:52 PM', 0),
(7, 16, '', 'ICT Department', 'Bayao, Manot B. ', '543268120', '01/05/2022', '04:31 PM', 1),
(8, 80, '', 'THM Department', 'Bagundang, Zarah Mae G. ', '1695220236', '01/08/2022', '05:13 PM', 0),
(9, 80, '', 'BTLED Depeartment', 'Nunez, Rachelle ', '6846307368', '01/09/2022', '11:36 AM', 0),
(10, 80, '', 'THM Department', 'Bagundang, Zarah Mae G. ', '8742645962', '01/09/2022', '11:45 AM', 0),
(11, 80, '', 'BTLED Depeartment', 'Nunez, Rachelle ', '8742645962', '01/09/2022', '02:13 PM', 0),
(12, 80, '', 'THM Department', 'Bagundang, Zarah Mae G. ', '9744991365', '01/09/2022', '02:21 PM', 0),
(13, 80, '', 'THM Department', 'Bagundang, Zarah Mae G. ', '8755935858', '01/09/2022', '02:49 PM', 0),
(14, 80, '', 'BTLED Depeartment', 'Nunez, Rachelle ', '8755935858', '01/09/2022', '02:52 PM', 0),
(15, 17, '', 'ICT Department', 'Kyla Marie ', '1695220236', '01/09/2022', '06:35 PM', 0);

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
(1, 77, 'Kaliman, Ezriel', '112264505', 'BSSW Department', 'Covivor', '12/14/2021', '11:23 AM', 0),
(2, 77, 'Kaliman, Ezriel', '8044106207', 'BSSW Department', 'Cyber Security Agenda', '12/17/2021', '01:13 PM', 0),
(3, 16, 'Ali, Noria K.', '507306795', 'THM Department', 'Happy new year', '01/03/2022', '03:51 PM', 0),
(4, 14, 'Smith, David A.', '2898420545', 'ICT Department', 'Multipart', '01/04/2022', '07:49 AM', 0),
(5, 14, 'Smith, David A.', '6830469020', 'ICT Department', 'Final', '01/04/2022', '02:59 PM', 0),
(6, 16, 'Ali, Noria K.', '543268120', 'THM Department', 'Files', '01/05/2022', '04:29 PM', 0),
(7, 14, 'Smith, David A.', '8851439047', 'ICT Department', 'Mari', '01/08/2022', '02:17 PM', 0),
(8, 14, 'Smith, David A.', '4204058140', 'ICT Department', 'Marie', '01/08/2022', '04:36 PM', 0),
(9, 80, 'Smith, David A.', '4204058140', 'ICT Department', 'Marie', '01/08/2022', '04:36 PM', 1),
(10, 14, 'Smith, David A.', '1695220236', 'ICT Department', 'KyMarie', '01/08/2022', '05:11 PM', 0),
(11, 80, 'Smith, David A.', '1695220236', 'ICT Department', 'KyMarie', '01/08/2022', '05:11 PM', 1),
(12, 14, 'Smith, David A.', '6846307368', 'ICT Department', 'May Final na Docu', '01/09/2022', '10:05 AM', 0),
(13, 80, 'Smith, David A.', '6846307368', 'ICT Department', 'May Final na Docu', '01/09/2022', '10:05 AM', 0),
(14, 14, 'Smith, David A.', '8742645962', 'ICT Department', 'Haynalamang', '01/09/2022', '11:38 AM', 0),
(15, 80, 'Smith, David A.', '8742645962', 'ICT Department', 'Haynalamang', '01/09/2022', '11:38 AM', 0),
(16, 14, 'Smith, David A.', '9744991365', 'ICT Department', 'The last is you', '01/09/2022', '02:18 PM', 0),
(17, 80, 'Smith, David A.', '9744991365', 'ICT Department', 'The last is you', '01/09/2022', '02:18 PM', 0),
(18, 14, 'Smith, David A.', '8755935858', 'ICT Department', 'This is the last docu ive send', '01/09/2022', '02:48 PM', 0),
(19, 80, 'Smith, David A.', '8755935858', 'ICT Department', 'This is the last docu ive send', '01/09/2022', '02:48 PM', 0);

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
(1, 76, 77, '112264505', 'Taboada, Alfred', '', 'Read'),
(2, 13, 77, '8044106207', 'Taboada, Alfred', '', 'Read'),
(3, 17, 77, '8044106207', 'Taboada, Alfred', '', 'Read'),
(4, 76, 77, '8044106207', 'Taboada, Alfred', '', 'Read'),
(5, 13, 16, '507306795', 'Ventrusa, Shaina Mae O.', '', 'Read'),
(6, 76, 16, '507306795', 'Ventrusa, Shaina Mae O.', '', 'Unread'),
(7, 78, 16, '507306795', 'Ventrusa, Shaina Mae O.', '', 'Unread'),
(8, 0, 0, '7333485158', 'Administrator', '01/03/2022 11:04 PM', 'Unread'),
(9, 0, 0, '', 'Administrator', '01/03/2022 11:04 PM', 'Unread'),
(10, 78, 0, '', 'Administrator', '01/05/2022 03:43 PM', 'Unread'),
(11, 76, 0, '', 'Administrator', '01/05/2022 03:43 PM', 'Unread'),
(12, 17, 0, '', 'Administrator', '01/05/2022 03:43 PM', 'Unread'),
(13, 13, 0, '', 'Administrator', '01/05/2022 03:43 PM', 'Read'),
(14, 13, 16, '543268120', 'Ventrusa, Shaina Mae O.', '', 'Read'),
(15, 13, 0, '9178631020', 'Administrator', '01/08/2022 12:44 PM', 'Unread'),
(16, 17, 0, '9178631020', 'Administrator', '01/08/2022 12:44 PM', 'Unread'),
(17, 13, 17, '', 'Bagundang, Zarah Mae G.', '', 'Unread'),
(18, 76, 17, '', 'Bagundang, Zarah Mae G.', '', 'Unread'),
(19, 78, 17, '', 'Bagundang, Zarah Mae G.', '', 'Unread'),
(20, 17, 80, '4204058140', 'Aron Joseph', '', 'Unread'),
(21, 76, 80, '4204058140', 'Aron Joseph', '', 'Unread'),
(22, 78, 80, '4204058140', 'Aron Joseph', '', 'Unread'),
(23, 17, 80, '1695220236', 'Aron Joseph', '', 'Read'),
(24, 76, 80, '1695220236', 'Aron Joseph', '', 'Unread'),
(25, 78, 80, '1695220236', 'Aron Joseph', '', 'Unread'),
(26, 81, 17, '1695220236', 'Bagundang, Zarah Mae G.', '', 'Read'),
(27, 0, 0, '507306795', 'Administrator', '', 'Unread'),
(28, 13, 0, '507306795', 'Administrator', '', 'Unread'),
(29, 17, 0, '507306795', 'Administrator', '', 'Unread'),
(30, 13, 0, '507306795', 'Administrator', '', 'Unread'),
(31, 17, 0, '507306795', 'Administrator', '', 'Unread'),
(32, 13, 0, '507306795', 'Administrator', '', 'Unread'),
(33, 17, 0, '507306795', 'Administrator', '', 'Unread'),
(34, 13, 0, '507306795', 'Administrator', '', 'Unread'),
(35, 17, 0, '507306795', 'Administrator', '', 'Unread'),
(36, 13, 0, '507306795', 'Administrator', '', 'Unread'),
(37, 17, 0, '507306795', 'Administrator', '', 'Unread'),
(38, 78, 0, '507306795', 'Administrator', '01/08/2022 06:52 PM', 'Unread'),
(39, 81, 0, '507306795', 'Administrator', '01/08/2022 06:52 PM', 'Unread'),
(40, 17, 80, '6846307368', 'Aron Joseph', '', 'Unread'),
(41, 76, 80, '6846307368', 'Aron Joseph', '', 'Read'),
(42, 78, 80, '6846307368', 'Aron Joseph', '', 'Unread'),
(43, 17, 80, '8742645962', 'Aron Joseph', '', 'Read'),
(44, 76, 80, '8742645962', 'Aron Joseph', '', 'Read'),
(45, 17, 14, '8851439047', 'Abdullah, Nurullajie S.', '', 'Unread'),
(46, 76, 14, '8851439047', 'Abdullah, Nurullajie S.', '', 'Unread'),
(47, 17, 80, '9744991365', 'Aron Joseph', '', 'Read'),
(48, 76, 80, '9744991365', 'Aron Joseph', '', 'Unread'),
(49, 78, 80, '9744991365', 'Aron Joseph', '', 'Unread'),
(50, 17, 80, '8755935858', 'Aron Joseph', '', 'Read'),
(51, 76, 80, '8755935858', 'Aron Joseph', '', 'Read'),
(52, 13, 0, '8755935858', 'Bagundang, Zarah Mae G.', '', 'Unread'),
(53, 13, 0, '3341879440', 'Administrator', '01/09/2022 03:01 PM', 'Unread'),
(54, 13, 0, '4813579468', 'Administrator', '01/09/2022 03:02 PM', 'Unread'),
(55, 17, 0, '4813579468', 'Administrator', '01/09/2022 03:02 PM', 'Unread'),
(56, 13, 0, '3953314137', 'Administrator', '01/09/2022 03:03 PM', 'Unread'),
(57, 13, 0, '2459150321', 'Administrator', '01/09/2022 03:03 PM', 'Unread'),
(58, 17, 0, '2459150321', 'Administrator', '01/09/2022 03:03 PM', 'Unread'),
(59, 0, 0, '8795039595', 'Administrator', '01/09/2022 03:05 PM', 'Unread'),
(60, 13, 0, '9238121812', 'Administrator', '01/09/2022 03:14 PM', 'Unread'),
(61, 13, 0, '7438330164', 'Administrator', '01/09/2022 03:22 PM', 'Unread'),
(62, 13, 0, '1829456387', 'Administrator', '01/09/2022 03:22 PM', 'Unread'),
(63, 17, 0, '1829456387', 'Administrator', '01/09/2022 03:22 PM', 'Unread'),
(64, 0, 0, '5933136683', 'Administrator', '01/09/2022 03:22 PM', 'Unread'),
(65, 13, 0, '', 'Administrator', '01/09/2022 03:23 PM', 'Unread'),
(66, 0, 0, '2179654671', 'Administrator', '01/09/2022 03:30 PM', 'Unread'),
(67, 0, 0, '7419506913', 'Administrator', '01/09/2022 03:31 PM', 'Unread');

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
  `password_token` varchar(255) NOT NULL,
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

INSERT INTO `register` (`id`, `dept_id`, `user_id`, `employee_code`, `fullname`, `imageProfile`, `department`, `usertype`, `bday`, `email`, `username`, `password`, `confirm_password`, `password_token`, `phone_number`, `address`, `doc_id`, `status`, `login_time`, `logout_time`) VALUES
(12, NULL, NULL, '78923125', 'Smith, David A.', 'nicole.JPG', 'ICT Department', 'Department Head', '2021-10-28 15:14:37', 'smith@email.com', 'smith', '123456', '', '', 9756678899, '', NULL, 0, '', ''),
(13, NULL, NULL, '7214681', 'Bayao, Manot B.', 'avatar.jpg', 'ICT Department', 'Receiving Officer', '2021-11-24 15:53:48', 'manot@gmail.com', 'manotbayao01', 'manotbayao01', '', '', 9751777788, '', NULL, 0, '', ''),
(14, NULL, NULL, '8008354', 'Abdullah, Nurullajie S.', 'Nurullajie Abdullah - 2022.01.04 - 01.49.59pm.jpg', 'ICT Department', 'Releasing Officer', '2021-11-24 15:48:44', '@gmail.com', 'nurullajieabdullah04', 'nurullajieabdullah04', '', '', 9891278990, '', NULL, 0, '', ''),
(15, NULL, NULL, '38611229', 'Ali, Noria K.', 'yellow.png', 'THM Department', 'Department Head', '2021-10-28 15:50:50', 'noria@gmail.com', 'noria', '123456', '', '', 9756678900, '', NULL, 0, '', ''),
(16, NULL, NULL, '2257042', 'Ventrusa, Shaina Mae O.', 'images.png', 'THM Department', 'Releasing Officer', '2021-12-13 14:51:32', 'shainaventrusa@gmail.com', 'shainaventrusa05', 'shainaventrusa05', '', '', 97655454545, '', NULL, 0, '2021-11-30 16:54:15', ''),
(17, NULL, NULL, '2513208', 'Bagundang, Zarah Mae G.', 'Nurullajie Abdullah - 2022.01.04 - 01.49.59pm.jpg', 'THM Department', 'Receiving Officer', '2021-10-28 15:52:15', '@gmail.com', 'zarahbagundang06', 'zarahbagundang06', '', '', 9765546778, '', NULL, 0, '2021-12-01 21:56:36', ''),
(73, NULL, NULL, '4941193', 'Kapina, Mohammad', 'user2.png', 'BTLED Depeartment', 'Department Head', '2021-12-14 10:54:18', 'Kapina@gmail.com', 'kapina', 'kapina', '', '', 9123713271, '', NULL, 0, '', ''),
(74, NULL, NULL, '671630', 'Kaliman, Ezriel', 's1.png', 'BSSW Department', 'Department Head', '2021-12-14 10:54:54', 'kaliman@example.com', 'kaliman', '07W4LF', '', '', 9127382322, '', NULL, 0, '', ''),
(75, NULL, NULL, '6416828', 'Luna, Irish Bianca A.', 'Nurullajie Abdullah - 2022.01.04 - 01.49.59pm.jpg', 'BTLED Depeartment', 'Releasing Officer', '2021-12-14 11:00:21', 'luna.@example.com', 'lunairish', 'BWGO18', '', '', 9111111111, '', NULL, 0, '', ''),
(76, NULL, NULL, '854585', 'Nunez, Rachelle', 'Nurullajie Abdullah - 2022.01.04 - 01.49.59pm.jpg', 'BTLED Depeartment', 'Receiving Officer', '2021-12-14 11:00:45', 'Nunez@example.com', 'nunezz', 'PKL@I5', '', '', 9127371322, '', NULL, 0, '', ''),
(77, NULL, NULL, '2470386', 'Taboada, Alfred', 'Nurullajie Abdullah - 2022.01.04 - 01.49.59pm.jpg', 'BSSW Department', 'Releasing Officer', '2021-12-14 11:05:13', 'taboada@example.com', 'taboada', 'I9QCUB', '', '', 9263726373, '', NULL, 0, '', ''),
(78, NULL, NULL, '8551330', 'Ching, Jenelyn ', 'Nurullajie Abdullah - 2022.01.04 - 01.49.59pm.jpg', 'BSSW Department', 'Receiving Officer', '2021-12-14 11:06:17', 'ching@example.com', 'chingj', 'IIPHB5', '', '', 9213767232, '', NULL, 0, '', ''),
(79, NULL, NULL, '1887487', 'Mancao, Nicole Haylynn G.', 'Nurullajie Abdullah - 2022.01.04 - 01.49.59pm.jpg', 'ICT Department', 'Department Head', '2022-01-05 15:18:05', 'nicolehaylynn@gmail.com', 'nicole22', 'Nicole_00', '', '527e7bb906b4559e243be233dc0aad96', 9756634444, '', NULL, 0, '', ''),
(80, NULL, NULL, '9972767', 'Aron Joseph', '', 'ICT Department', 'Releasing Officer', '2022-01-08 13:28:01', 'ajb@gmail.com', 'aronjoseph', 'aronjoseph', '', '', 911, '', NULL, 0, '', ''),
(81, NULL, NULL, '6828410', 'Kyla Marie', '', 'ICT Department', 'Receiving Officer', '2022-01-08 17:00:48', 'kylamarie@gmail.com', 'kylamarie', 'kylamarie', '', '', 911, '', NULL, 0, '', '');

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
(1, 77, '112264505', 'Kaliman, Ezriel', '12/14/2021 11:23 AM', 'Read'),
(2, 77, '8044106207', 'Kaliman, Ezriel', '12/17/2021 01:13 PM', 'Read'),
(3, 16, '507306795', 'Ali, Noria K.', '01/03/2022 03:51 PM', 'Read'),
(4, 14, '2898420545', 'Smith, David A.', '01/04/2022 07:49 AM', 'Unread'),
(5, 14, '6830469020', 'Smith, David A.', '01/04/2022 02:59 PM', 'Unread'),
(6, 16, '543268120', 'Ali, Noria K.', '01/05/2022 04:29 PM', 'Read'),
(7, 14, '8851439047', 'Smith, David A.', '01/08/2022 02:17 PM', 'Read'),
(8, 14, '4204058140', 'Smith, David A.', '01/08/2022 04:36 PM', 'Read'),
(9, 80, '4204058140', 'Smith, David A.', '01/08/2022 04:36 PM', 'Read'),
(10, 14, '1695220236', 'Smith, David A.', '01/08/2022 05:11 PM', 'Read'),
(11, 80, '1695220236', 'Smith, David A.', '01/08/2022 05:11 PM', 'Read'),
(12, 14, '6846307368', 'Smith, David A.', '01/09/2022 10:05 AM', 'Read'),
(13, 80, '6846307368', 'Smith, David A.', '01/09/2022 10:05 AM', 'Read'),
(14, 14, '8742645962', 'Smith, David A.', '01/09/2022 11:38 AM', 'Read'),
(15, 80, '8742645962', 'Smith, David A.', '01/09/2022 11:38 AM', 'Read'),
(16, 14, '9744991365', 'Smith, David A.', '01/09/2022 02:18 PM', 'Read'),
(17, 80, '9744991365', 'Smith, David A.', '01/09/2022 02:18 PM', 'Read'),
(18, 14, '8755935858', 'Smith, David A.', '01/09/2022 02:48 PM', 'Read'),
(19, 80, '8755935858', 'Smith, David A.', '01/09/2022 02:48 PM', 'Read'),
(20, 80, '3986590421', 'Aron Joseph', '01/09/2022 03:25 PM', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `date_and_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `tracking_no`, `receiver_name`, `date_and_time`) VALUES
(1, '1695220236', 'Kyla Marie ', '01/09/2022 06:35 PM');

-- --------------------------------------------------------

--
-- Table structure for table `status_document`
--

CREATE TABLE `status_document` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_document`
--

INSERT INTO `status_document` (`id`, `tracking_no`, `user_id`, `status`, `description`, `date_time`) VALUES
(1, '6846307368', '14', 'Released', 'Bagundang, Zarah Mae G.|Nunez, Rachelle', '01/09/2022 01:59 PM'),
(2, '6846307368', '80', 'Released', 'Bagundang, Zarah Mae G.|Nunez, Rachelle', '01/09/2022 02:48 PM'),
(3, '4673263195', '17', 'Received', NULL, '01/09/2022 11:45 AM'),
(4, '4673263195', '76', 'Received', 'Aron Joseph (ICT Department)', '01/09/2022 02:13 PM'),
(5, '4673263195', '78', 'Pending', NULL, '01/09/2022 10:18 AM'),
(6, '8742645962', '14', 'Released', 'Bagundang, Zarah Mae G.|Nunez, Rachelle', '01/09/2022 01:59 PM'),
(7, '8742645962', '80', 'Released', 'Bagundang, Zarah Mae G.|Nunez, Rachelle', '01/09/2022 02:48 PM'),
(8, '8742645962', '17', 'Received', NULL, '01/09/2022 11:45 AM'),
(9, '8742645962', '76', 'Received', 'Aron Joseph (ICT Department)', '01/09/2022 02:13 PM'),
(10, '8851439047', '17', 'Pending', NULL, '01/09/2022 01:59 PM'),
(11, '8851439047', '76', 'Received', 'Aron Joseph (ICT Department)', '01/09/2022 02:13 PM'),
(12, '9744991365', '14', 'Pending', NULL, '01/09/2022 02:18 PM'),
(13, '9744991365', '80', 'Released', 'Bagundang, Zarah Mae G.|Nunez, Rachelle', '01/09/2022 02:48 PM'),
(14, '9744991365', '17', 'Received', 'Aron Joseph (ICT Department)', '01/09/2022 02:21 PM'),
(15, '9744991365', '76', 'Pending', NULL, '01/09/2022 02:19 PM'),
(16, '9744991365', '78', 'Pending', NULL, '01/09/2022 02:19 PM'),
(17, '8755935858', '14', 'Pending', NULL, '01/09/2022 02:48 PM'),
(18, '8755935858', '80', 'Released', 'Bagundang, Zarah Mae G.|Nunez, Rachelle', '01/09/2022 02:48 PM'),
(19, '8755935858', '17', 'Received', 'Aron Joseph (ICT Department)', '01/09/2022 02:49 PM'),
(20, '8755935858', '76', 'Received', 'Aron Joseph (ICT Department)', '01/09/2022 02:52 PM');

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
(4, 'For Review', '', NULL, ''),
(5, 'watch video', '', NULL, 'BSSW Department'),
(7, 'action', '', NULL, 'ICT Department'),
(9, 'sss', '', NULL, 'ICT Department'),
(10, 'ddd', '', NULL, 'ICT Department'),
(11, 'www', '', NULL, 'ICT Department'),
(12, 'xxx', '', NULL, 'ICT Department'),
(13, 'fdf', '', NULL, 'ICT Department'),
(14, 'moba2', '', NULL, 'ICT Department'),
(18, 'Holiday', 'season', NULL, 'THM Department'),
(19, 'dwdf', 'dfdfd', NULL, 'THM Department'),
(22, 'Revision', '', NULL, 'THM Department');

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
(114, 'Regulation Section'),
(115, 'BSSW Department'),
(116, 'BTLED Depeartment'),
(117, 'All Departments'),
(118, 'New year');

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
(94, 'ICT Department', 'final type', '', NULL),
(108, 'THM Department', 'rer', 'rr', NULL),
(110, 'ICT Department', 'bago', '', NULL),
(111, 'admin', 'dd', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `updateprofile`
--

CREATE TABLE `updateprofile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updateprofile`
--

INSERT INTO `updateprofile` (`id`, `name`, `image`) VALUES
(1, 'Nurullajie Abdullah', 'ajie.jpg');

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
(6, 'new folder', '6411-David - 2021.12.18 - 02.50.51pm.jpg'),
(7, 'new folder', '3259-Nurullajie Abdullah - 2022.01.04 - 01.49.59pm.jpg'),
(8, 'try', '8948-inbound7444771214144451281.pptx'),
(9, 'try', '2388-contemporary world.pptx'),
(10, 'tryee', '9767-latestdb.sql'),
(11, 'tryee', '5568-inbound7444771214144451281.pptx'),
(12, '6', '9515-latestdb.sql'),
(13, '6', '5832-prof.png'),
(14, '6', '2578-'),
(15, '6', '7037-'),
(16, '6', '4584-'),
(17, '6', '6032-doh_trs.sql'),
(18, '7', '8750-7273-p2.png'),
(19, '7', '6776-8489-l (1).png'),
(20, '7', '1499-'),
(21, '7', '7263-doh_trs.sql'),
(22, '8', '1575-7273-p2.png'),
(23, '8', '9910-8489-l (1).png'),
(24, '8', '4883-login.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_repo_folder`
--

CREATE TABLE `user_repo_folder` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `void` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_repo_folder`
--

INSERT INTO `user_repo_folder` (`id`, `user`, `folder_name`, `void`) VALUES
(3, 'smith', 'new folder', 0),
(4, 'admin', 'try', 0),
(5, 'admin', 'tryee', 0),
(6, 'admin', 'Niceeee', 1),
(7, 'admin', 'Aron Repository', 1),
(8, 'admin', 'Repo dawwwwww', 1);

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
-- Indexes for table `notif_head_receive_receive`
--
ALTER TABLE `notif_head_receive_receive`
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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_document`
--
ALTER TABLE `status_document`
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
-- Indexes for table `updateprofile`
--
ALTER TABLE `updateprofile`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin_notif_received_file`
--
ALTER TABLE `admin_notif_received_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_notif_receiver`
--
ALTER TABLE `admin_notif_receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin_notif_releaser`
--
ALTER TABLE `admin_notif_releaser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `admin_outgoing_file`
--
ALTER TABLE `admin_outgoing_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_receive_file`
--
ALTER TABLE `admin_receive_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `batch_upload`
--
ALTER TABLE `batch_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `department_users`
--
ALTER TABLE `department_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notif_admin_receive_head`
--
ALTER TABLE `notif_admin_receive_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notif_admin_receive_release`
--
ALTER TABLE `notif_admin_receive_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notif_head_receive_receive`
--
ALTER TABLE `notif_head_receive_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notif_head_send_receive`
--
ALTER TABLE `notif_head_send_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notif_head_send_release`
--
ALTER TABLE `notif_head_send_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `notif_receive`
--
ALTER TABLE `notif_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `notif_receive_released`
--
ALTER TABLE `notif_receive_released`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notif_release`
--
ALTER TABLE `notif_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `receive_file`
--
ALTER TABLE `receive_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `release_file`
--
ALTER TABLE `release_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status_document`
--
ALTER TABLE `status_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_action`
--
ALTER TABLE `tbl_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `des_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_typedocument`
--
ALTER TABLE `tbl_typedocument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `updateprofile`
--
ALTER TABLE `updateprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_repositories`
--
ALTER TABLE `user_repositories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_repo_folder`
--
ALTER TABLE `user_repo_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
