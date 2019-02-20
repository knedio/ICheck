-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 02:41 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icheck`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_building`
--

CREATE TABLE `tbl_building` (
  `bldg_id` int(11) NOT NULL,
  `bldg_no` int(11) DEFAULT NULL,
  `bldg_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_building`
--

INSERT INTO `tbl_building` (`bldg_id`, `bldg_no`, `bldg_name`) VALUES
(1, 9, 'ICT'),
(2, 13, 'DRW');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`) VALUES
(2, 'CIT'),
(3, 'CITC'),
(4, 'COT\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_device`
--

CREATE TABLE `tbl_device` (
  `device_id` int(11) NOT NULL,
  `rpi_mac_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_device`
--

INSERT INTO `tbl_device` (`device_id`, `rpi_mac_address`) VALUES
(1, 'b8:27:eb:62:d0:04'),
(2, 'b8:27:eb:62:d0:05\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `position_id` int(11) NOT NULL,
  `position_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`position_id`, `position_type`) VALUES
(3, 'Instructor'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `request_id` int(11) NOT NULL,
  `timelogs_id` int(11) DEFAULT NULL,
  `requestor_note` text NOT NULL,
  `date_submitted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted_by` varchar(255) DEFAULT NULL,
  `request_response` text,
  `request_status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `timelogs_id`, `requestor_note`, `date_submitted`, `accepted_by`, `request_response`, `request_status`) VALUES
(4, 2, 'we have a seminar in our department', '2018-01-24 07:42:09', 'Karl Naio U. Edio', 'aw', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `room_id` int(11) NOT NULL,
  `bldg_id` int(11) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  `room_no` varchar(20) NOT NULL,
  `pin_no` int(50) NOT NULL,
  `pin_status` enum('Passive','Active') NOT NULL DEFAULT 'Passive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`room_id`, `bldg_id`, `device_id`, `room_no`, `pin_no`, `pin_status`) VALUES
(1, 1, 1, '101', 3, 'Passive'),
(2, 1, 1, '102', 2, 'Passive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `sched_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `section` varchar(50) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `day` char(11) NOT NULL,
  `SY_from` int(20) NOT NULL,
  `SY_to` int(20) NOT NULL,
  `semester` enum('1st','2nd','3rd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`sched_id`, `user_id`, `room_id`, `section`, `time_from`, `time_to`, `day`, `SY_from`, `SY_to`, `semester`) VALUES
(225, 1, 2, '1R1', '07:30:00', '10:30:00', 'Tuesday', 2017, 2018, '2nd'),
(228, 2, 2, '1R1', '07:30:00', '10:30:00', 'Tuesday', 2017, 2018, '1st'),
(229, 1, 1, '4R3', '10:30:00', '12:30:00', 'Tuesday', 2017, 2018, '1st'),
(230, 2, 2, '3R3', '10:30:00', '12:00:00', 'Tuesday', 2017, 2018, '1st'),
(231, 1, 1, '2R2', '13:30:00', '13:31:00', 'Tuesday', 2017, 2018, '1st'),
(232, 1, 1, '4R3', '07:30:00', '10:30:00', 'Wednesday', 2017, 2018, '1st'),
(233, 6, 1, '2R2', '20:00:00', '21:30:00', 'Thursday', 2017, 2018, '2nd'),
(234, 1, 1, '1R6', '10:30:00', '12:00:00', 'Friday', 2017, 2018, '1st'),
(235, 1, 1, '3R3', '12:00:00', '12:30:00', 'Saturday', 2017, 2018, '1st'),
(236, 2, 1, '3R1', '12:30:00', '12:34:00', 'Saturday', 2017, 2018, '2nd'),
(237, 1, 1, '1R1', '08:30:00', '08:35:00', 'Monday', 2017, 2018, '1st');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timelogs`
--

CREATE TABLE `tbl_timelogs` (
  `timelogs_id` int(11) NOT NULL,
  `sched_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_timelogs`
--

INSERT INTO `tbl_timelogs` (`timelogs_id`, `sched_id`, `date`, `status`) VALUES
(2, 225, '2018-01-16', 'Present'),
(3, 228, '2018-01-16', 'Present'),
(4, 229, '2018-01-16', 'Late'),
(5, 230, '2018-01-16', 'Absent'),
(16, 234, '2018-01-19', 'Present'),
(17, 235, '2018-01-20', 'Present'),
(18, 236, '2018-01-20', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timelogs_temp`
--

CREATE TABLE `tbl_timelogs_temp` (
  `temp_id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_timelogs_temp`
--

INSERT INTO `tbl_timelogs_temp` (`temp_id`, `sched_id`, `time_in`, `time_out`, `date`) VALUES
(11, 225, '07:24:00', '07:26:00', '2018-01-16'),
(12, 228, '07:37:40', '07:38:11', '2018-01-16'),
(13, 225, '07:38:22', '07:38:52', '2018-01-16'),
(14, 225, '07:39:17', '07:40:01', '2018-01-16'),
(15, 228, '07:40:01', '07:40:44', '2018-01-16'),
(16, 225, '07:40:28', '07:41:40', '2018-01-16'),
(17, 228, '07:41:25', '07:42:50', '2018-01-16'),
(18, 229, '10:46:41', '10:48:12', '2018-01-16'),
(19, 229, '10:48:21', '10:49:02', '2018-01-16'),
(27, 234, '10:30:00', '10:30:39', '2018-01-19'),
(28, 235, '12:00:00', '12:01:58', '2018-01-20'),
(30, 236, '12:33:19', '12:34:00', '2018-01-20'),
(31, 225, '07:34:00', '07:36:00', '2018-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_no` int(20) NOT NULL,
  `tags_id` varchar(254) NOT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `mname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `user_status` char(15) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_no`, `tags_id`, `fname`, `mname`, `lname`, `password`, `department_id`, `position_id`, `user_status`) VALUES
(1, 2014100018, 'e200001621130139', 'Jhimson Rayz', 'Raboy', 'Pamisa', '202cb962ac59075b964b07152d234b70', 2, 3, 'Active'),
(2, 2014100240, 'e200001621130159', 'Sharmine', 'Ruizol', 'Obsioma', '202cb962ac59075b964b07152d234b70', 2, 3, 'Active'),
(3, 2014100117, 'e200001621130169', 'Karl Naio', 'U.', 'Edio', '202cb962ac59075b964b07152d234b70', 2, 4, 'Active'),
(6, 2014100016, 'e200001621130179', 'Xenia', 'B.', 'Labis', '202cb962ac59075b964b07152d234b70', 2, 3, 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_hrsworkpersched`
-- (See below for the actual view)
--
CREATE TABLE `view_hrsworkpersched` (
`sched_id` int(11)
,`date` date
,`hrswork` time
);

-- --------------------------------------------------------

--
-- Structure for view `view_hrsworkpersched`
--
DROP TABLE IF EXISTS `view_hrsworkpersched`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hrsworkpersched`  AS  select `tt`.`sched_id` AS `sched_id`,`tt`.`date` AS `date`,sec_to_time((sum((case when (`tt`.`time_in` >= `s`.`time_from`) then (time_to_sec(`tt`.`time_out`) - time_to_sec(`tt`.`time_in`)) else 0 end)) + sum((case when ((`tt`.`time_in` < `s`.`time_from`) and (`tt`.`time_out` > `s`.`time_from`)) then (time_to_sec(`tt`.`time_out`) - time_to_sec(`s`.`time_from`)) else 0 end)))) AS `hrswork` from (`tbl_timelogs_temp` `tt` join `tbl_schedule` `s`) where (`tt`.`sched_id` = `s`.`sched_id`) group by `tt`.`sched_id`,`tt`.`date` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_building`
--
ALTER TABLE `tbl_building`
  ADD PRIMARY KEY (`bldg_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_device`
--
ALTER TABLE `tbl_device`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `tbl_request_ibfk_1` (`timelogs_id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `bldg_id` (`bldg_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`sched_id`),
  ADD KEY `user_scheduleFK` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `tbl_timelogs`
--
ALTER TABLE `tbl_timelogs`
  ADD PRIMARY KEY (`timelogs_id`),
  ADD KEY `sched_id` (`sched_id`);

--
-- Indexes for table `tbl_timelogs_temp`
--
ALTER TABLE `tbl_timelogs_temp`
  ADD PRIMARY KEY (`temp_id`),
  ADD KEY `templogs_schedFK` (`sched_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `tags_id` (`tags_id`),
  ADD UNIQUE KEY `user_no` (`user_no`),
  ADD KEY `tbl_users_ibfk_1` (`position_id`),
  ADD KEY `tbl_users_ibfk_2` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_building`
--
ALTER TABLE `tbl_building`
  MODIFY `bldg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_device`
--
ALTER TABLE `tbl_device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
--
-- AUTO_INCREMENT for table `tbl_timelogs`
--
ALTER TABLE `tbl_timelogs`
  MODIFY `timelogs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_timelogs_temp`
--
ALTER TABLE `tbl_timelogs_temp`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD CONSTRAINT `tbl_request_ibfk_1` FOREIGN KEY (`timelogs_id`) REFERENCES `tbl_timelogs` (`timelogs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD CONSTRAINT `tbl_rooms_ibfk_1` FOREIGN KEY (`bldg_id`) REFERENCES `tbl_building` (`bldg_id`),
  ADD CONSTRAINT `tbl_rooms_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `tbl_device` (`device_id`);

--
-- Constraints for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD CONSTRAINT `tbl_schedule_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `tbl_rooms` (`room_id`),
  ADD CONSTRAINT `user_scheduleFK` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_timelogs`
--
ALTER TABLE `tbl_timelogs`
  ADD CONSTRAINT `tbl_timelogs_ibfk_1` FOREIGN KEY (`sched_id`) REFERENCES `tbl_schedule` (`sched_id`);

--
-- Constraints for table `tbl_timelogs_temp`
--
ALTER TABLE `tbl_timelogs_temp`
  ADD CONSTRAINT `tbl_timelogs_temp_ibfk_1` FOREIGN KEY (`sched_id`) REFERENCES `tbl_schedule` (`sched_id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `tbl_position` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_users_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
