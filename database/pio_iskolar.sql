-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 11, 2024 at 01:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pio_iskolar`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announce_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `doc_id` int(11) NOT NULL,
  `scholar_id` int(11) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `doc_type` varchar(20) NOT NULL,
  `doc_status` varchar(10) NOT NULL COMMENT 'pending/validated',
  `sub_date` date NOT NULL,
  `year` varchar(10) NOT NULL,
  `sem` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`doc_id`, `scholar_id`, `doc_name`, `doc_type`, `doc_status`, `sub_date`, `year`, `sem`) VALUES
(3, 27004, '[Form] FORM 3 - 3rd Consultation.pdf', 'COR', 'PENDING', '2024-04-10', '2023-2024', 2),
(4, 27004, '[softdev] FSD + DIAGRAMS.pdf', 'TCG', 'PENDING', '2024-04-10', '2023-2024', 2),
(6, 27004, 'WEEKLY TIMELINE.pdf', 'COR', 'PENDING', '2024-04-10', '2023-2024', 2),
(8, 27004, 'Intan Herlina_3421021_Artikel sosiologi done.pdf', 'SCF', 'PENDING', '2024-04-10', '2023-2024', 2),
(9, 27004, '6032-22735-2-PB.pdf', 'COR', 'PENDING', '2024-04-10', '2023-2024', 2),
(10, 27004, '2459-11918-1-PB.pdf', 'TCG', 'PENDING', '2024-04-10', '2023-2024', 2),
(11, 27004, 'Bookshelf_NBK214568.pdf', 'SCF', 'PENDING', '2024-04-10', '2023-2024', 2);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `record_id` varchar(20) NOT NULL COMMENT 'B#SID/YYYY-YYYY/S',
  `scholar_id` int(11) NOT NULL COMMENT 'B#SID',
  `year` varchar(10) NOT NULL COMMENT 'YYYY-YYYY',
  `sem` int(1) NOT NULL COMMENT 'S',
  `status` int(11) NOT NULL COMMENT 'status ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `description`) VALUES
(1, 'admin', 'Scholarship Coordinator'),
(2, 'scholar', 'Dr Pio Valenzuela Scholarship Program Grantee');

-- --------------------------------------------------------

--
-- Table structure for table `scholar`
--

CREATE TABLE `scholar` (
  `scholar_id` int(11) NOT NULL COMMENT 'B#SID',
  `batch_num` int(11) NOT NULL COMMENT 'B#',
  `user_id` int(11) NOT NULL COMMENT 'user table',
  `status_id` int(11) NOT NULL COMMENT 'status table',
  `last_name` varchar(30) NOT NULL COMMENT 'CAPS LOCK',
  `first_name` varchar(100) NOT NULL COMMENT 'CAPS LOCK',
  `middle_name` varchar(20) NOT NULL COMMENT 'CAPS LOCK',
  `school` varchar(100) NOT NULL COMMENT 'CAPS LOCK',
  `course` varchar(150) NOT NULL COMMENT 'CAPS LOCK',
  `_address` text NOT NULL COMMENT 'CAPS LOCK',
  `contact` varchar(20) NOT NULL COMMENT 'phone number',
  `email` varchar(320) NOT NULL COMMENT 'example@provider.com',
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholar`
--

INSERT INTO `scholar` (`scholar_id`, `batch_num`, `user_id`, `status_id`, `last_name`, `first_name`, `middle_name`, `school`, `course`, `_address`, `contact`, `email`, `remarks`) VALUES
(27001, 27, 242, 1, 'ADRIANO', 'JESSICA RAYE', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27002, 27, 243, 1, 'HIDALGO', 'MAIKA JASMINE', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27003, 27, 244, 1, 'MARCOS', 'DANNAH LEI', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27004, 27, 245, 1, 'JACINTO', 'ALEXIS ROVIC JOHN', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27005, 27, 246, 1, 'ECHANES', 'ANNE LOUSSE', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27006, 27, 247, 1, 'MACAPAGAL', 'KYLA MAE', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27007, 27, 248, 1, 'GONZALES', 'RYAN ANTHONY', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27008, 27, 249, 1, 'PINLAC', 'KENDRICK', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27009, 27, 258, 1, 'TOLENTINO', 'MELROSE ANNE', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27010, 27, 259, 1, 'MACALDO', 'RAIN MYCA', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27011, 27, 260, 1, 'MARTIN', 'YVOSH CAILA', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27012, 27, 261, 1, 'PARUNGAO', 'KEN ANGELO', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27013, 27, 262, 1, 'PATANI', 'MARK KEVIN', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27014, 27, 263, 1, 'ROME', 'RAY VINCENT ROME', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27015, 27, 264, 1, 'ARZADON', 'KURT ANTHONY', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL),
(27016, 27, 265, 1, 'ZIPAGAN', 'FRANKLIN', 'N/A', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'MAYSAN CAMPUS, TONGCO ST., MAYSAN, VALENZUELA CITY', '+6.39694E+11', 'testemail123@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `description`) VALUES
(1, 'ACTIVE', 'Grantee is availing full benefits and responsibilities of scholarship program'),
(2, 'PROBATION', 'Grantee has unsatisfactory performance or disciplinary action, but is not enough for forfeiture'),
(3, 'LOA', 'Grantee has \'availed\' Leave of Absence'),
(4, 'DROPPED', 'Grantee has forfeited scholarship'),
(5, 'GRADUATE', 'Grantee has graduated from tertiary education');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passhash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `username`, `passhash`) VALUES
(1, 1, 'coordinator', 'coordinator'),
(242, 2, 'ADRIANO', 'placeholder'),
(243, 2, 'HIDALGO', 'placeholder'),
(244, 2, 'MARCOS', 'placeholder'),
(245, 2, 'JACINTO', 'placeholder'),
(246, 2, 'ECHANES', 'placeholder'),
(247, 2, 'MACAPAGAL', 'placeholder'),
(248, 2, 'GONZALES', 'placeholder'),
(249, 2, 'PINLAC', 'placeholder'),
(258, 2, 'TOLENTINO', 'placeholder'),
(259, 2, 'MACALDO', 'placeholder'),
(260, 2, 'MARTIN', 'placeholder'),
(261, 2, 'PARUNGAO', 'placeholder'),
(262, 2, 'PATANI', 'placeholder'),
(263, 2, 'ROME', 'placeholder'),
(264, 2, 'ARZADON', 'placeholder'),
(265, 2, 'ZIPAGAN', 'placeholder');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announce_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `document-scholar` (`scholar_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD KEY `record-scholar` (`scholar_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `scholar`
--
ALTER TABLE `scholar`
  ADD PRIMARY KEY (`scholar_id`),
  ADD KEY `scholar_id` (`scholar_id`,`batch_num`,`last_name`),
  ADD KEY `scholar-user` (`user_id`),
  ADD KEY `scholar-status` (`status_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user-role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announce_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document-scholar` FOREIGN KEY (`scholar_id`) REFERENCES `scholar` (`scholar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `record-scholar` FOREIGN KEY (`scholar_id`) REFERENCES `scholar` (`scholar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scholar`
--
ALTER TABLE `scholar`
  ADD CONSTRAINT `scholar-status` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `scholar-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user-role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
