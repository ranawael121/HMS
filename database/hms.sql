-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 04:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

CREATE TABLE `adress` (
  `user_id` bigint(14) NOT NULL,
  `apartment` int(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`user_id`, `apartment`, `street`, `city`, `country`) VALUES
(33, 0, 'egypt', 'suez', 'Egypt'),
(699, 0, 'egypt', 'suez', 'Egypt'),
(255555555558, 5, 'egypt', 'suez', 'Egypt'),
(2888888888888, 0, 'egypt', 'suez', 'Egypt'),
(11111111111111, 0, 'egypt', 'suez', 'Egypt'),
(11223344556677, 5, 'egypt', 'suez', 'Egypt'),
(29608030400144, 5, 'egypt', 'suez', 'Egypt'),
(29608030400148, 5, 'egypt', 'suez', 'Egypt'),
(29608030405141, 5, 'egypt', 'suez', 'Egypt'),
(88888888888888, 5, 'egypt', 'suez', 'Egypt');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `patient_Id` bigint(14) NOT NULL,
  `doctor_id` bigint(14) NOT NULL,
  `consultation_type` varchar(15) NOT NULL,
  `booked_online` tinyint(1) NOT NULL,
  `state` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `datetime`, `patient_Id`, `doctor_id`, `consultation_type`, `booked_online`, `state`) VALUES
(2, '2023-02-27 00:00:00', 2664, 29608030400141, 'bv', 1, 'hjgh '),
(7, '2023-03-01 00:00:00', 29608030400141, 29608030400141, 'reapp', 0, 'done'),
(31, '2023-03-01 00:00:00', 29608030400141, 29608030400141, 'reapp2', 0, 'confirm'),
(86, '2023-03-03 20:39:00', 29608030400141, 29608030400141, 're-examination', 0, ''),
(87, '0000-00-00 00:00:00', 29608030400141, 29608030400141, 'examination', 1, 'draft'),
(88, '0000-00-00 00:00:00', 29608030400141, 29608030400141, 'examination', 1, 'draft'),
(89, '0000-00-00 00:00:00', 29608030400141, 29608030400141, 'examination', 1, 'draft'),
(97, '2023-03-04 10:15:44', 2888888888888, 29608030400141, 'examination', 0, ''),
(99, '2023-03-11 12:54:00', 29608030400141, 255555555558, 're-examination', 0, 'Done'),
(104, '2023-03-07 09:33:00', 29608030400141, 255555555558, 're-examination', 1, 'draft'),
(106, '2023-03-06 09:45:36', 2888888888888, 255555555558, 'examination', 0, 'Confirm'),
(107, '2023-03-06 01:38:07', 2888888888888, 255555555558, 're-examination', 0, 'Draft'),
(108, '2023-03-10 13:43:00', 33, 255555555558, 're-examination', 1, 'draft'),
(110, '2023-03-01 14:12:00', 29608030400141, 255555555558, 're-examination', 1, 'draft'),
(112, '2023-03-07 03:28:55', 33, 255555555558, 're-examination', 0, 'Draft'),
(122, '2023-03-07 03:58:35', 33, 255555555558, 'examination', 0, 'Draft'),
(123, '2023-03-07 03:58:35', 33, 255555555558, 'examination', 0, 'Draft'),
(124, '2023-03-07 03:58:35', 33, 255555555558, 'examination', 0, 'Draft'),
(125, '2023-03-07 04:05:29', 33, 255555555558, 'examination', 1, 'Draft'),
(126, '2023-03-07 04:08:11', 33, 255555555558, 'examination', 0, 'Draft'),
(127, '2023-03-07 04:09:22', 33, 255555555558, 'examination', 0, 'Draft'),
(128, '2023-03-07 04:09:58', 33, 255555555558, 'examination', 0, 'Draft'),
(129, '2023-03-07 04:14:03', 33, 255555555558, 'examination', 0, 'Draft'),
(130, '2023-03-07 04:15:09', 33, 255555555558, 'examination', 0, 'Draft'),
(131, '2023-03-07 04:23:28', 33, 255555555558, 'examination', 0, 'Draft'),
(132, '2023-03-07 04:23:51', 33, 255555555558, 'examination', 0, 'Draft'),
(133, '2023-03-07 04:28:36', 33, 255555555558, 'examination', 0, 'Draft'),
(134, '2023-03-07 04:30:15', 33, 255555555558, 'examination', 0, 'Draft'),
(135, '2023-03-07 04:30:00', 33, 255555555558, 'examination', 0, 'Draft'),
(137, '2023-03-07 04:35:09', 33, 255555555558, 'examination', 0, 'Draft'),
(139, '2023-03-07 04:36:01', 33, 255555555558, 'examination', 0, 'Draft'),
(140, '2023-03-07 04:36:01', 33, 255555555558, 'examination', 0, 'Draft'),
(142, '2023-03-07 04:37:11', 33, 255555555558, 'examination', 0, 'Draft'),
(143, '2023-03-07 04:37:30', 33, 255555555558, 'examination', 0, 'Draft'),
(147, '2023-03-08 23:39:00', 29608030400141, 255555555558, 'examination', 1, 'draft'),
(150, '2023-03-08 09:27:46', 29608030400144, 255555555558, 're-examination', 0, 'In-consultation'),
(151, '2023-03-08 09:36:48', 33, 255555555558, 'examination', 0, 'In-consultation'),
(154, '0000-00-00 00:00:00', 29608030400141, 29608030400141, 're-examination', 1, 'draft'),
(155, '0000-00-00 00:00:00', 29608030400141, 29608030400141, 'examination', 1, 'draft'),
(156, '0000-00-00 00:00:00', 29608030400141, 29608030400141, 'examination', 1, 'draft'),
(157, '0000-00-00 00:00:00', 29608030400141, 255555555558, 'examination', 1, 'draft'),
(158, '0000-00-00 00:00:00', 29608030400141, 29608030400141, 'examination', 1, 'draft'),
(159, '2023-03-10 21:40:00', 29608030400141, 29608030400141, 'examination', 1, 'draft'),
(160, '2023-03-10 22:41:00', 29608030400141, 255555555558, 'examination', 1, 'draft'),
(161, '2023-03-12 12:09:00', 29608030400141, 29608030400148, 'examination', 1, 'draft'),
(162, '2023-03-11 22:46:00', 29608030400141, 29608030400148, 'examination', 1, 'Draft');

-- --------------------------------------------------------

--
-- Stand-in structure for view `appointmentusers`
-- (See below for the actual view)
--
CREATE TABLE `appointmentusers` (
`id` int(11)
,`patientId` bigint(14)
,`patienName` varchar(40)
,`birthDate` date
,`docId` bigint(14)
,`doctorName` varchar(40)
,`depId` int(11)
,`departmentName` varchar(20)
,`datetime` datetime
,`consultation_type` varchar(15)
,`booked_online` tinyint(1)
,`state` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'surgery'),
(2, 'paediatrics'),
(3, 'dental'),
(4, 'Gastroenterologists');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `user_id` bigint(14) NOT NULL,
  `department_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`user_id`, `department_id`) VALUES
(2664, 1),
(29608030400141, 1),
(255555555558, 3),
(88888888888888, 1),
(11111111111111, 2),
(1111, 3),
(29608030400148, 3),
(11223344556677, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctorschedule`
-- (See below for the actual view)
--
CREATE TABLE `doctorschedule` (
`docId` bigint(14)
,`docName` varchar(40)
,`depName` varchar(20)
,`depId` int(11)
,`sId` int(11)
,`sDate` date
,`startHour` time
,`endHour` time
);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `user_id` bigint(14) NOT NULL,
  `company` varchar(10) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `blood_type` char(3) NOT NULL,
  `chronic_disease` text NOT NULL,
  `past_surgery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`user_id`, `company`, `employee_id`, `blood_type`, `chronic_disease`, `past_surgery`) VALUES
(33, 'sugarCanel', 1, 'AB', 'no', 'no'),
(2664, 'fd', 2, 'o', 'nlk', 'jbh'),
(2888888888888, 'Department', 123, 'B', 'no', 'no'),
(29608030400141, 'suez canal', 2, 'o', 'no', 'no'),
(29608030400144, 'sugarCanel', 2, 'A', 'no', 'egypt'),
(29608030405141, 'sugarCanel', 1, 'A', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `appointment_id` int(11) NOT NULL,
  `prescription_time` datetime NOT NULL,
  `disease` text NOT NULL,
  `medical_test` text NOT NULL,
  `x_rays` text NOT NULL,
  `followup_date` datetime NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`appointment_id`, `prescription_time`, `disease`, `medical_test`, `x_rays`, `followup_date`, `notes`) VALUES
(150, '2023-03-08 09:29:39', 'diseasemnjh', 'MedicalTest', 'X-Rays', '2023-03-08 09:29:39', 'ooooooooooooooo'),
(151, '2023-03-10 12:22:33', '', '', '', '2023-03-10 12:22:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_line`
--

CREATE TABLE `prescription_line` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medicine_name` varchar(30) NOT NULL,
  `dosage_detail` varchar(100) NOT NULL,
  `allow_subsistuation` tinyint(1) NOT NULL,
  `comment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription_line`
--

INSERT INTO `prescription_line` (`id`, `prescription_id`, `medicine_name`, `dosage_detail`, `allow_subsistuation`, `comment`) VALUES
(119, 150, 'd4', '', 0, ''),
(120, 150, 'd4', '', 0, ''),
(121, 150, 'd4', '', 0, ''),
(122, 150, 'd4', '', 0, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `presusers`
-- (See below for the actual view)
--
CREATE TABLE `presusers` (
`appointment_id` int(11)
,`prescription_time` datetime
,`followup_date` datetime
,`patienName` varchar(40)
,`pID` bigint(14)
,`doctorName` varchar(40)
,`docId` bigint(14)
,`departmentName` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `dayDate` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `doctor_id` bigint(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `dayDate`, `start`, `end`, `doctor_id`) VALUES
(5, '2023-03-07', '20:20:00', '20:20:00', 255555555558),
(7, '2023-03-10', '22:21:00', '22:21:00', 255555555558),
(8, '2023-03-15', '20:26:00', '12:22:00', 255555555558),
(9, '2023-03-09', '21:24:00', '12:24:00', 255555555558),
(10, '2023-03-10', '23:24:00', '12:24:00', 255555555558),
(12, '2023-03-10', '21:34:00', '22:34:00', 1111),
(13, '2023-03-13', '23:34:00', '14:34:00', 1111),
(14, '2023-03-12', '22:34:00', '12:35:00', 1111),
(16, '2023-03-09', '12:58:00', '12:58:00', 255555555558),
(17, '2023-03-30', '01:10:00', '01:10:00', 255555555558),
(18, '2023-04-05', '02:10:00', '07:10:00', 255555555558),
(19, '2023-03-12', '22:09:00', '12:09:00', 29608030400148);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `national_id` bigint(14) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `type` varchar(15) NOT NULL,
  `birthDate` date NOT NULL,
  `gender` char(1) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`national_id`, `name`, `email`, `password`, `type`, `birthDate`, `gender`, `mobile`, `createDate`) VALUES
(0, 'sad', 'zeinab3handoum@gmail.com', '123', 'Doctor', '2023-03-02', 'M', '01000', '2023-03-11 15:48:20'),
(33, 'external', 'zeinab3handoum@gmail.com', '', 'Patient', '2023-03-01', 'F', '1020797704', '2023-03-11 15:48:20'),
(699, 'zoza', 'adminnnnnn@adn', '123', 'Patient', '0000-00-00', '', '699', '2023-03-11 15:48:20'),
(1111, 'zaynabDoctor', 'zay', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'doctor', '1996-08-03', 'F', '01020797704', '2023-03-11 15:48:20'),
(2222, 'zaynabReciptionast', 'zayn', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'receptionist', '1996-08-03', 'F', '01020797704', '2023-03-11 15:48:20'),
(2664, 'ali', ',mnkjl', ',mnkjl', 'k', '2023-02-16', 'f', '142', '2023-03-11 15:48:20'),
(255555555558, 'hoda', 'zeinab3handoum@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'doctor', '2005-02-02', '$', '1020797704', '2023-03-11 15:48:20'),
(2888888888888, 'ahmed', 'admin@gh', 'admin', 'Patient', '2009-02-02', '', '+20122222222', '2023-03-11 15:48:20'),
(11111111111111, 'gad', 'zeinab3handoum@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'doctor', '2023-03-02', 'M', '01020797755', '2023-03-11 15:48:20'),
(11223344556677, 'sondos', 'zeinab3handoum@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'doctor', '2023-03-01', 'F', '01020797704', '2023-03-11 15:49:15'),
(29608030400141, 'zaynab', 'zaynab3handoum@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', '1996-08-03', 'F', '1020797704', '2023-03-11 15:48:20'),
(29608030400144, 'mohammed ali', 'zeinab3handoum@gmail.com', '', 'Patient', '2000-07-08', 'M', '01020797755', '2023-03-11 15:48:20'),
(29608030400148, 'zaynab ibrahim', 'zeinab3handoum@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'doctor', '1996-08-03', 'F', '01020797704', '2023-03-11 15:48:20'),
(29608030405141, 'zaynab ibrahim', 'zeinab3handoum@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'patient', '2008-10-30', 'F', '01020797755', '2023-03-11 17:26:45'),
(88888888888888, 'soha', 'zeinab3handoum@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'doctor', '2023-03-02', 'F', '01020797704', '2023-03-11 15:48:20');

-- --------------------------------------------------------

--
-- Structure for view `appointmentusers`
--
DROP TABLE IF EXISTS `appointmentusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `appointmentusers`  AS SELECT `a`.`id` AS `id`, `p`.`national_id` AS `patientId`, `p`.`name` AS `patienName`, `p`.`birthDate` AS `birthDate`, `d`.`national_id` AS `docId`, `d`.`name` AS `doctorName`, `dep`.`id` AS `depId`, `dep`.`name` AS `departmentName`, `a`.`datetime` AS `datetime`, `a`.`consultation_type` AS `consultation_type`, `a`.`booked_online` AS `booked_online`, `a`.`state` AS `state` FROM ((((`appointment` `a` join `users` `p` on(`a`.`patient_Id` = `p`.`national_id`)) join `users` `d` on(`a`.`doctor_id` = `d`.`national_id`)) join `doctor` `doc` on(`doc`.`user_id` = `d`.`national_id`)) join `department` `dep` on(`dep`.`id` = `doc`.`department_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `doctorschedule`
--
DROP TABLE IF EXISTS `doctorschedule`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctorschedule`  AS SELECT `u`.`national_id` AS `docId`, `u`.`name` AS `docName`, `dep`.`name` AS `depName`, `dep`.`id` AS `depId`, `s`.`id` AS `sId`, `s`.`dayDate` AS `sDate`, `s`.`start` AS `startHour`, `s`.`end` AS `endHour` FROM (((`users` `u` join `doctor` `d` on(`d`.`user_id` = `u`.`national_id`)) join `department` `dep` on(`d`.`department_id` = `dep`.`id`)) join `schedule` `s` on(`s`.`doctor_id` = `d`.`user_id`)) ORDER BY `s`.`dayDate` DESC, `u`.`name` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `presusers`
--
DROP TABLE IF EXISTS `presusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `presusers`  AS SELECT `pre`.`appointment_id` AS `appointment_id`, `pre`.`prescription_time` AS `prescription_time`, `pre`.`followup_date` AS `followup_date`, `a`.`patienName` AS `patienName`, `a`.`patientId` AS `pID`, `a`.`doctorName` AS `doctorName`, `a`.`docId` AS `docId`, `a`.`departmentName` AS `departmentName` FROM (`prescription` `pre` left join `appointmentusers` `a` on(`a`.`id` = `pre`.`appointment_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKappointmenDoctor` (`doctor_id`),
  ADD KEY `FKappointmenPatient` (`patient_Id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD KEY `FKdoctorDepartment` (`department_id`),
  ADD KEY `FKdoctorUser` (`user_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `prescription_line`
--
ALTER TABLE `prescription_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prelinePre` (`prescription_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKScheduleDoctor` (`doctor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`national_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescription_line`
--
ALTER TABLE `prescription_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `FKadressUsers` FOREIGN KEY (`user_id`) REFERENCES `users` (`national_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `FKappointmenDoctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKappointmenPatient` FOREIGN KEY (`patient_Id`) REFERENCES `patient` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `FKdoctorDepartment` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `FKdoctorUser` FOREIGN KEY (`user_id`) REFERENCES `users` (`national_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `FKpatientUser` FOREIGN KEY (`user_id`) REFERENCES `users` (`national_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `FK_prescriptioAppointment` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescription_line`
--
ALTER TABLE `prescription_line`
  ADD CONSTRAINT `FK_prelinePre` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`appointment_id`) ON DELETE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `FKScheduleDoctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
