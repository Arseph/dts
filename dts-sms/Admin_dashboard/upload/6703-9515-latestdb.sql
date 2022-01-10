-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 07:56 AM
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
(6, '543268120', 'Department Head', 'THM Department', 'THM Department', 'Ali, Noria K.', 'Ventrusa, Shaina Mae O.', 'Files', '01/05/2022', '04:29 PM', 0);

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
(2, 'THM Department', '507306795', 'Ventrusa, Shaina Mae O.', '', '01/03/2022', '03:52 PM', 1);

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
(7, '543268120', 13, 'Ventrusa, Shaina Mae O. (THM Department)', '01/05/2022', '04:31 PM', 0);

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
(8, '543268120', 'Releasing Officer', 'THM Department', 'Ventrusa, Shaina Mae O.', 13, '', '01/05/2022', '04:30 PM', 0);

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
(2, '507306795', 'Ventrusa, Shaina Mae O.', '01/03/2022 03:52 PM', 'Read');

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
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`id`, `user`, `phone_number`, `tracking_no`, `file_name`, `file_description`, `select_date`, `department`, `attach_file`, `type_document`, `routedTo`, `pleaseNote`, `forYour`, `status`) VALUES
(1, 'kaliman', '', '112264505', 'Covivor', 'covid', '12/14/2021 11:23 AM', 'BSSW Department', '3836-COVIVOR_MobileGame_PT (Autosaved).docx', 'video type', 'BTLED Depeartment', '', 'watch video', 'Send'),
(2, 'kaliman', '', '8044106207', 'Cyber Security Agenda', 'Good day! Pls send this sheet to Admin and all receiving officers for updates and clarifications. Thank you', '12/17/2021 01:13 PM', 'BSSW Department', '7273-p2.png', 'video type', 'Administrative Section', '', 'watch video', 'Send'),
(3, 'noria123', '', '507306795', 'Happy new year', 'Hi, forward this document to all departments including the adminstrator.', '01/03/2022 03:51 PM', 'THM Department', '9912-06 Laboratory Exercise Levels.docx', 'New year 2022', 'All Departments', '', 'Holliday season', 'Send'),
(8, 'smith', '', '2898420545', 'Multipart', 'Multiple uploads of files', '01/04/2022 07:49 AM', 'ICT Department', '8489-l.png', '', 'All Departments', '', 'action', 'Send'),
(9, 'smith', '', '6830469020', 'Final', 'defense', '01/04/2022 02:59 PM', 'ICT Department', '4216-', 'final type', 'BSSW Department', '', 'action', 'Send'),
(11, 'noria123', '', '728627859', 'ddf', 'dfdf', '01/05/2022 03:43 PM', 'THM Department', '3984-', 'dd', '', '', '', 'Draft'),
(12, '', '', '', '', '', '01/05/2022 03:43 PM', 'Administrator', '2269-', '', '', '', '', 'Send'),
(13, 'noria123', '', '543268120', 'Files', 'Good day! This file is for mr. Abdullah from ms. Shai. For further info, kindly check and download this file.', '01/05/2022 04:29 PM', 'THM Department', '1463-David - 2022.01.04 - 01.56.27pm.jpg', 'rer', 'ICT Department', '', 'Holiday', 'Send'),
(14, 'noria123', '', '1461863218', '', '', '01/05/2022 04:34 PM', 'THM Department', '1643-', '', '', '', '', 'Draft');

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
(2, '507306795', '', 'Administrator', '01/03/2022', '03:53 PM', 0);

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
(6, '', 'ICT Department', 13, '', '01/05/2022', '03:52 PM', 0),
(7, '543268120', 'ICT Department', 13, 'Ventrusa, Shaina Mae O. (THM Department)', '01/05/2022', '04:31 PM', 1);

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
(10, 'THM Department', 0, 'Ventrusa, Shaina Mae O.', 'Bayao, Manot B.', '543268120', '', '01/05/2022', '04:30 PM', 1);

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
(2, 13, 77, 'BSSW Department', 'Taboada, Alfred', '8044106207', '', '12/17/2021', '01:16 PM', 1),
(3, 17, 77, 'BSSW Department', 'Taboada, Alfred', '8044106207', '', '12/17/2021', '01:16 PM', 0),
(4, 76, 77, 'BSSW Department', 'Taboada, Alfred', '8044106207', '', '12/17/2021', '01:16 PM', 0),
(5, 13, 16, 'THM Department', 'Ventrusa, Shaina Mae O.', '507306795', '', '01/03/2022', '03:52 PM', 1),
(6, 76, 16, 'THM Department', 'Ventrusa, Shaina Mae O.', '507306795', '', '01/03/2022', '03:52 PM', 0),
(7, 78, 16, 'THM Department', 'Ventrusa, Shaina Mae O.', '507306795', '', '01/03/2022', '03:52 PM', 0),
(8, 0, 0, 'Administrator', 'Administrator', '7333485158', '', '01/03/2022', '11:04 PM', 0),
(9, 0, 0, 'Administrator', 'Administrator', '', '', '01/03/2022', '11:04 PM', 0),
(10, 78, 0, 'Administrator', 'Administrator', '', '', '01/05/2022', '03:43 PM', 0),
(11, 76, 0, 'Administrator', 'Administrator', '', '', '01/05/2022', '03:43 PM', 0),
(12, 17, 0, 'Administrator', 'Administrator', '', '', '01/05/2022', '03:43 PM', 0),
(13, 13, 0, 'Administrator', 'Administrator', '', '', '01/05/2022', '03:43 PM', 1),
(14, 13, 16, 'THM Department', 'Ventrusa, Shaina Mae O.', '543268120', '', '01/05/2022', '04:30 PM', 1);

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
(7, 16, '', 'ICT Department', 'Bayao, Manot B. ', '543268120', '01/05/2022', '04:31 PM', 1);

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
(3, 16, 'Ali, Noria K.', '507306795', 'THM Department', 'Happy new year', '01/03/2022', '03:51 PM', 1),
(4, 14, 'Smith, David A.', '2898420545', 'ICT Department', 'Multipart', '01/04/2022', '07:49 AM', 0),
(5, 14, 'Smith, David A.', '6830469020', 'ICT Department', 'Final', '01/04/2022', '02:59 PM', 0),
(6, 16, 'Ali, Noria K.', '543268120', 'THM Department', 'Files', '01/05/2022', '04:29 PM', 1);

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
(14, 13, 16, '543268120', 'Ventrusa, Shaina Mae O.', '', 'Read');

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
(79, NULL, NULL, '1887487', 'Mancao, Nicole Haylynn G.', 'Nurullajie Abdullah - 2022.01.04 - 01.49.59pm.jpg', 'ICT Department', 'Department Head', '2022-01-05 15:18:05', 'nicolehaylynn@gmail.com', 'nicole22', 'Nicole_00', '', '527e7bb906b4559e243be233dc0aad96', 9756634444, '', NULL, 0, '', '');

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
(6, 16, '543268120', 'Ali, Noria K.', '01/05/2022 04:29 PM', 'Read');

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
(7, 'new folder', '3259-Nurullajie Abdullah - 2022.01.04 - 01.49.59pm.jpg');

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
(3, 'smith', 'new folder');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_notif_received_file`
--
ALTER TABLE `admin_notif_received_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_notif_receiver`
--
ALTER TABLE `admin_notif_receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_notif_releaser`
--
ALTER TABLE `admin_notif_releaser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_outgoing_file`
--
ALTER TABLE `admin_outgoing_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_receive_file`
--
ALTER TABLE `admin_receive_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `notif_head_send_receive`
--
ALTER TABLE `notif_head_send_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notif_head_send_release`
--
ALTER TABLE `notif_head_send_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notif_receive`
--
ALTER TABLE `notif_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notif_receive_released`
--
ALTER TABLE `notif_receive_released`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notif_release`
--
ALTER TABLE `notif_release`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `receive_file`
--
ALTER TABLE `receive_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `release_file`
--
ALTER TABLE `release_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_repo_folder`
--
ALTER TABLE `user_repo_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
