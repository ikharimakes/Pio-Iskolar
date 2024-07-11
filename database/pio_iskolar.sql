-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 11, 2024 at 06:06 PM
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
  `st_date` date NOT NULL,
  `end_date` date NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announce_id`, `st_date`, `end_date`, `img_name`, `title`, `content`, `_status`) VALUES
(3, '2024-06-02', '2024-06-07', 'pic2.jpg', 'Contract Signing', 'City Mayor REX Gatchalian graces the orientation and contract signing of 212 recipients of the Dr. Pio Valenzuela Scholarship program at the Pamantasan ng Lungsod ng Valenzuela (#PLV) Qualified Grantees are required to report at the Scholarship Office at PLV Maysan Campus, 2nd floor on December 10 to 16, 2023 (except Saturday and Sunday) 8:00 AM to 5:00 PM. Look for Ms. Miko Tongco regarding Contract Signing and Orientation. Thank you! ', 'INACTIVE'),
(6, '2024-05-21', '2024-06-01', 'pic3.jpg', 'Results for Batch 27', ' The results of the Dr. Pio Valenzuela Scholarship Program will be released on Dr. Pio\'s 154th Birth Anniversary on December 11, 2023. \r\n\r\nRightfully deserving of the grant, they are currently getting to know more about their future college journeys as Dr. Pio Valenzuela scholars. \r\n\r\nCongratulations and make us proud, dear students! ', 'ACTIVE'),
(14, '2024-05-15', '2024-05-25', '', 'Portrait', ' Lorem Ipsum', 'INACTIVE'),
(16, '2024-05-29', '2024-05-31', 'image.png', 'Test Announcement', ' This is a test announcement', 'ACTIVE'),
(17, '2024-05-29', '2024-06-02', 'pio-museo.jpg', 'Test', ' Placeholder', 'ACTIVE'),
(18, '2024-05-29', '2024-06-01', 'pio.jpg', 'Capstone', ' Testing', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `batch_year`
--

CREATE TABLE `batch_year` (
  `batch_no` int(11) NOT NULL,
  `acad_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch_year`
--

INSERT INTO `batch_year` (`batch_no`, `acad_year`) VALUES
(1, '1995-1996'),
(2, '1996-1997'),
(3, '1997-1998'),
(4, '1998-1999'),
(5, '1999-2000'),
(6, '2000-2001'),
(7, '2001-2002'),
(8, '2002-2003'),
(9, '2003-2004'),
(10, '2004-2005'),
(11, '2005-2006'),
(12, '2006-2007'),
(13, '2007-2008'),
(14, '2008-2009'),
(15, '2009-2010'),
(16, '2010-2011'),
(17, '2011-2012'),
(18, '2012-2013'),
(19, '2013-2014'),
(20, '2014-2015'),
(21, '2015-2016'),
(22, '2016-2017'),
(23, '2017-2018'),
(24, '2018-2019'),
(25, '2019-2020'),
(26, '2020-2021'),
(27, '2021-2022'),
(28, '2023-2024'),
(29, '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_id`, `user_id`, `date`, `title`, `content`) VALUES
(67, 1, '2024-05-30', '27001-JACINTO DOCUMENT SUBMISSION', 'Documents submitted: <br><br>JACINTO_ALEXIS ROVIC JOHN__Year3_Sem2_COR.pdf'),
(68, 1, '2024-05-30', '27001-JACINTO DOCUMENT SUBMISSION', 'Documents submitted: <br><br>JACINTO_ALEXIS ROVIC JOHN__Year3_Sem2_TOR.pdf<br>JACINTO_ALEXIS ROVIC JOHN__Year3_Sem2_SCF.pdf'),
(69, 301, '2024-05-30', '135-JACINTO DOCUMENT UPDATE', 'Document status updated to: DECLINED<br>Reason: NOT LEGIBLE/READABLE'),
(70, 301, '2024-05-30', '137-JACINTO DOCUMENT APPROVAL', 'Document has been approved.'),
(71, 1, '2024-05-30', '28001-MARCOS DOCUMENT SUBMISSION', 'Documents submitted: <br><br>MARCOS_DANNAH LEI__Year2_Sem2_COR.pdf<br>MARCOS_DANNAH LEI__Year2_Sem2_TOR.pdf<br>MARCOS_DANNAH LEI__Year2_Sem2_SCF.pdf'),
(72, 521, '2024-05-30', '138-MARCOS DOCUMENT UPDATE', 'Document status updated to: APPROVED<br>Reason: '),
(73, 521, '2024-05-30', '139-MARCOS DOCUMENT UPDATE', 'Document status updated to: DECLINED<br>Reason: BLANK');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `batch_no` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `creation_date` date NOT NULL,
  `acad_year` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `batch_no`, `title`, `report_type`, `creation_date`, `acad_year`, `content`) VALUES
(8, 27, 'Scholar Status Report for Batch 27 - S.Y. 2024-2025', 'status', '2024-05-26', 2024, '\r\n                <h3>DR. PIO VALENZUELA SCHOLARSHIP PROGRAM <br>\r\n                SCHOLAR STATUS REPORT<br>\r\n                S.Y. 2024-2025</h3> <br>\r\n                    \r\n                Batch Number: <strong>27</strong>\r\n\r\n                <p> This report provides an overview of the current status of scholars under the Dr. Pio Valenzuela Scholarship Program for the school year <strong>2024-2025</strong>. As of <strong>2024-05-26</strong>, there are a total of <strong>26</strong> scholars enrolled in the program for Batch Number <strong>27</strong>. The table below presents the current status of scholars under the Dr. Pio Valenzuela Scholarship Program, along with the total number of scholars based on their status: </p>\r\n                <br>\r\n                Total Active Scholars: <strong>26</strong> <br>\r\n                Total Dropped Scholars: <strong>0</strong> <br>\r\n                Total Scholars on Leave of Absence: <strong>0</strong> <br>\r\n                Total Graduated Scholars: <strong>0</strong> <br>\r\n                '),
(9, 25, 'Scholar Profile and Requirements Report for Batch 25 - 2 Semester of S.Y. 2024-2025', 'profile', '2024-05-26', 2024, '\r\n                <h3>DR. PIO VALENZUELA SCHOLARSHIP PROGRAM <br>\r\n                SCHOLAR PROFILE AND REQUIREMENTS REPORT<br>\r\n                2 Semester of S.Y. 2024-2025</h3><br>\r\n        \r\n                Batch Number: <strong>25</strong>\r\n        \r\n                <p> This report provides a comprehensive overview of the profile and current requirement status of scholars under the Dr. Pio Valenzuela Scholarship Program for the <strong>2</strong> Semester of S.Y. <strong>2024-2025</strong>. As of <strong>2024-05-26</strong>, there are a total of <strong>0</strong> scholars enrolled in the program for Batch Number <strong>25</strong>. The table below presents the profile of scholars and the current status of their requirements, along with the total number of scholars who have completed their requirements, and the number of scholars with missing requirements. This report is crucial for monitoring the progress of scholars and ensuring that they meet the program\'s criteria and obligation. </p>\r\n                <br>\r\n                    \r\n                Total Number of Scholars: <strong>0</strong> <br>\r\n                Total Number of Scholars with Complete Requirements: <strong>0</strong> <br>\r\n                Total Number of Scholars with Missing Requirements: <strong>0</strong> <br> <br>\r\n                '),
(10, 27, 'Scholar Profile and Requirements Report for Batch 27 - 2 Semester of S.Y. 2024-2025', 'profile', '2024-05-26', 2024, '\r\n                <h3>DR. PIO VALENZUELA SCHOLARSHIP PROGRAM <br>\r\n                SCHOLAR PROFILE AND REQUIREMENTS REPORT<br>\r\n                2 Semester of S.Y. 2024-2025</h3><br>\r\n        \r\n                Batch Number: <strong>27</strong>\r\n        \r\n                <p> This report provides a comprehensive overview of the profile and current requirement status of scholars under the Dr. Pio Valenzuela Scholarship Program for the <strong>2</strong> Semester of S.Y. <strong>2024-2025</strong>. As of <strong>2024-05-26</strong>, there are a total of <strong>20</strong> scholars enrolled in the program for Batch Number <strong>27</strong>. The table below presents the profile of scholars and the current status of their requirements, along with the total number of scholars who have completed their requirements, and the number of scholars with missing requirements. This report is crucial for monitoring the progress of scholars and ensuring that they meet the program\'s criteria and obligation. </p>\r\n                <br>\r\n                    \r\n                Total Number of Scholars: <strong>20</strong> <br>\r\n                Total Number of Scholars with Complete Requirements: <strong>0</strong> <br>\r\n                Total Number of Scholars with Missing Requirements: <strong>2</strong> <br> <br>\r\n                '),
(11, 22, 'Scholar Profile and Requirements Report for Batch 22 - 2 Semester of S.Y. 2024-2025', 'profile', '2024-05-28', 2024, '\r\n                <h3>DR. PIO VALENZUELA SCHOLARSHIP PROGRAM <br>\r\n                SCHOLAR PROFILE AND REQUIREMENTS REPORT<br>\r\n                2 Semester of S.Y. 2024-2025</h3><br>\r\n        \r\n                Batch Number: <strong>22</strong>\r\n        \r\n                <p> This report provides a comprehensive overview of the profile and current requirement status of scholars under the Dr. Pio Valenzuela Scholarship Program for the <strong>2</strong> Semester of S.Y. <strong>2024-2025</strong>. As of <strong>2024-05-28</strong>, there are a total of <strong>0</strong> scholars enrolled in the program for Batch Number <strong>22</strong>. The table below presents the profile of scholars and the current status of their requirements, along with the total number of scholars who have completed their requirements, and the number of scholars with missing requirements. This report is crucial for monitoring the progress of scholars and ensuring that they meet the program\'s criteria and obligation. </p>\r\n                <br>\r\n                    \r\n                Total Number of Scholars: <strong>0</strong> <br>\r\n                Total Number of Scholars with Complete Requirements: <strong>0</strong> <br>\r\n                Total Number of Scholars with Missing Requirements: <strong>0</strong> <br> <br>\r\n                '),
(13, 29, 'Scholar Profile and Requirements Report for Batch 29 - 2 Semester of S.Y. 2024-2025', 'profile', '2024-05-30', 2024, '\r\n                <h3>DR. PIO VALENZUELA SCHOLARSHIP PROGRAM <br>\r\n                SCHOLAR PROFILE AND REQUIREMENTS REPORT<br>\r\n                2 Semester of S.Y. 2024-2025</h3><br>\r\n        \r\n                Batch Number: <strong>29</strong>\r\n        \r\n                <p> This report provides a comprehensive overview of the profile and current requirement status of scholars under the Dr. Pio Valenzuela Scholarship Program for the <strong>2</strong> Semester of S.Y. <strong>2024-2025</strong>. As of <strong>2024-05-30</strong>, there are a total of <strong>21</strong> scholars enrolled in the program for Batch Number <strong>29</strong>. The table below presents the profile of scholars and the current status of their requirements, along with the total number of scholars who have completed their requirements, and the number of scholars with missing requirements. This report is crucial for monitoring the progress of scholars and ensuring that they meet the program\'s criteria and obligation. </p>\r\n                <br>\r\n                    \r\n                Total Number of Scholars: <strong>21</strong> <br>\r\n                Total Number of Scholars with Complete Requirements: <strong>0</strong> <br>\r\n                Total Number of Scholars with Missing Requirements: <strong>0</strong> <br> <br>\r\n                '),
(14, 28, 'Scholar Status Report for Batch 28 - S.Y. 2024-2025', 'status', '2024-05-30', 2024, '\r\n                <h3>DR. PIO VALENZUELA SCHOLARSHIP PROGRAM <br>\r\n                SCHOLAR STATUS REPORT<br>\r\n                S.Y. 2024-2025</h3> <br>\r\n                    \r\n                Batch Number: <strong>28</strong>\r\n\r\n                <p> This report provides an overview of the current status of scholars under the Dr. Pio Valenzuela Scholarship Program for the school year <strong>2024-2025</strong>. As of <strong>2024-05-30</strong>, there are a total of <strong>1</strong> scholars enrolled in the program for Batch Number <strong>28</strong>. The table below presents the current status of scholars under the Dr. Pio Valenzuela Scholarship Program, along with the total number of scholars based on their status: </p>\r\n                <br>\r\n                Total Active Scholars: <strong>1</strong> <br>\r\n                Total Dropped Scholars: <strong>0</strong> <br>\r\n                Total Scholars on Leave of Absence: <strong>0</strong> <br>\r\n                Total Graduated Scholars: <strong>0</strong> <br>\r\n                ');

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
  `status` varchar(20) NOT NULL COMMENT 'status name',
  `last_name` varchar(30) NOT NULL COMMENT 'CAPS LOCK',
  `first_name` varchar(100) NOT NULL COMMENT 'CAPS LOCK',
  `middle_name` varchar(20) DEFAULT NULL COMMENT 'CAPS LOCK',
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

INSERT INTO `scholar` (`scholar_id`, `batch_num`, `user_id`, `status`, `last_name`, `first_name`, `middle_name`, `school`, `course`, `_address`, `contact`, `email`, `remarks`) VALUES
(1, 0, 324, 'ACTIVE', 'AGUILAR', 'ISABELLE SOPHIA', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '123 Sampaguita Street, Malinta, Valenzuela City', '+639345678901', 'isabelle.aguilar@example.com', NULL),
(2, 0, 325, 'ACTIVE', 'AGUILAR', 'PAULINA MARIE', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '45-A Rose Avenue, Gen. T. de Leon, Valenzuela City', '+639591234567', 'paulinamarie.aguilar@example.com', NULL),
(3, 0, 326, 'ACTIVE', 'ALONZO', 'IAN CHRISTOPHER', 'RAMIREZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '12 San Miguel Subdivision, Marulas, Valenzuela City', '+639814567890', 'ianchristopher_ramirez.alonzo@example.com', NULL),
(4, 0, 327, 'ACTIVE', 'ALVAREZ', 'LANCE EMMANUEL', 'FERNANDO', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '89-B Gen. Luis Street, Paso de Blas, Valenzuela City', '+639136789012', 'lanceemmanuel_fernando.alvarez@example.com', NULL),
(5, 0, 328, 'ACTIVE', 'AQUINO', 'LUIS MIGUEL', 'CRUZ', 'ATENEO DE MANILA UNIVERSITY', 'BACHELOR OF SCIENCE IN SOCIAL WORK', '47 Dela Cruz Compound, Mapulang Lupa, Valenzuela City', '+639237890123', 'luis.aquino@example.com', NULL),
(6, 0, 329, 'ACTIVE', 'AQUINO', 'MARIA ISABEL', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '101 Rizal Avenue, Polo, Valenzuela City', '+639358901234', 'maria.aquino@example.com', NULL),
(7, 0, 330, 'ACTIVE', 'AQUINO', 'SOFIA ANGELICA', 'RODRIGUEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '5670 Washington Street, Karuhatan, Valenzuela City', '+639439012345', 'sofia.aquino@example.com', NULL),
(8, 0, 331, 'ACTIVE', 'AQUINO', 'SOPHIA ANDREA', 'FERNANDEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN HUMAN RESOURCE DEVELOPMENT MANAGEMENT', '34 Lopez Street, Malanday, Valenzuela City', '+639430123456', 'sophia.aquino@example.com', NULL),
(9, 0, 332, 'ACTIVE', 'ARCEO', 'JUSTIN DANIEL', 'GARCIA', 'UNIVERSITY OF THE EAST', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '256 Santos Street, Wawang Pulo, Valenzuela City', '+639901234567', 'justindaniel_garcia.arceo@example.com', NULL),
(10, 0, 333, 'ACTIVE', 'BACANI', 'MARK PATRICK', 'ALVAREZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '9 Villa Trinidad Subdivision, Ugong, Valenzuela City', '+639282345678', 'markpatrick_alvarez.bacani@example.com', NULL),
(11, 0, 334, 'ACTIVE', 'BAGONGAHAS', 'MARCUS ELIA', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN SOCIAL WORK', '765 Gomez Street, Dalandanan, Valenzuela City', '+639453456789', 'marcus_elia.bagongahas@example.com', NULL),
(12, 0, 335, 'ACTIVE', 'BASA', 'OLIVIA RUTH', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '890 Morales Street, Maysan, Valenzuela City', '+639734567890', 'oliviaruth.basa@example.com', NULL),
(13, 0, 336, 'ACTIVE', 'BAUTISTA', 'JULIAN MANUEL', 'GARCIA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SCIENCE', '65-C Bustamante Street, Lingunan, Valenzuela City', '+639295678901', 'julianmanuel_garcia.bautista@example.com', NULL),
(14, 0, 337, 'ACTIVE', 'BAUTISTA', 'SOFIA MARIE', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN SOCIAL WORK', '400 Rivera Compound, Canumay East, Valenzuela City', '+639476789012', 'sofia.bautista@example.com', NULL),
(15, 0, 338, 'ACTIVE', 'BUENAVENTURA', 'LUIS MIGUEL', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '178 Lopez Jaena Street, Parada, Valenzuela City', '+639877890123', 'luis.buenaventura@example.com', NULL),
(16, 0, 339, 'ACTIVE', 'BULALACAO', 'ALLISON FAITH', 'RIVERA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '92-D Freedom Street, Gen. T. de Leon, Valenzuela City', '+639998901234', 'allisonfaith_rivera.bulalacao@example.com', NULL),
(17, 0, 340, 'ACTIVE', 'CARLOS', 'JENNY ROSE', 'DE GUZMAN', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SCIENCE', '333 E. Rodriguez Street, Malinta, Valenzuela City', '+639479012345', 'jennyrose_deguzman.carlos@example.com', NULL),
(18, 0, 341, 'ACTIVE', 'CASTILLO', 'MARIA ISABELLA', 'SANTOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '8765 Bayani Street, Rincon, Valenzuela City', '+639530123456', 'maria.castillo@example.com', NULL),
(19, 0, 342, 'ACTIVE', 'CASTRO', 'ANGELA PATRICIA', 'CRUZ', 'LYCEUM OF THE PHILIPPINES UNIVERSITY', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '1289 San Juan Street, Arkong Bato, Valenzuela City', '+639941234567', 'angela.castro@example.com', NULL),
(20, 0, 343, 'ACTIVE', 'CASTRO', 'MARIANNE JOY', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '47-B Greenfields Subdivision, Malanday, Valenzuela City', '+639352345678', 'mariannejoy_cruz.castro@example.com', NULL),
(21, 0, 344, 'ACTIVE', 'CAVILES', 'JOHN MICHAEL', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '501 Valenzuela Street, Tagalag, Valenzuela City', '+639953456789', 'johnmichael.caviles@example.com', NULL),
(22, 0, 345, 'ACTIVE', 'CAYETANO', 'PATRICK LOUIE', 'MENDOZA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '1002 Ta?ong Street, Bignay, Valenzuela City', '+639894567890', 'patricklouie_mendoza.cayetano@example.com', NULL),
(23, 0, 346, 'ACTIVE', 'CHUA', 'JUAN CARLOS', 'MARTINEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '2000 A. Bonifacio Street, Palasan, Valenzuela City', '+639435678901', 'juan.chua@example.com', NULL),
(24, 0, 347, 'ACTIVE', 'CHUA', 'RAFAEL ANTONIO', 'CRUZ', 'ADAMSON UNIVERSITY', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT', '3456 S. Hernandez Street, Lawang Bato, Valenzuela City', '+639556789012', 'rafael.chua@example.com', NULL),
(25, 0, 348, 'ACTIVE', 'CHUA', 'SOFIA PATRICIA', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '432 J.P. Rizal Avenue, Malinta, Valenzuela City', '+639637890123', 'sofia.chua@example.com', NULL),
(26, 0, 349, 'ACTIVE', 'CONCEPCION', 'GRACE ISABELLE', 'PEREZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '17 Goldenville Subdivision, Ugong, Valenzuela City', '+639768901234', 'graceisabelle_perez.concepcion@example.com', NULL),
(27, 0, 350, 'ACTIVE', 'CORONEL', 'SOFIA PATRICIA', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '4561 Felix Avenue, Coloong, Valenzuela City', '+639549012345', 'sofia.coronel@example.com', NULL),
(28, 0, 351, 'ACTIVE', 'CORTEZ', 'ANTONIO MARCUS', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN SOCIAL WORK', '98-B Sto. Ni?o Street, Dalandanan, Valenzuela City', '+639830123456', 'antoniomarcus_reyes.cortez@example.com', NULL),
(29, 0, 352, 'ACTIVE', 'CORTEZ', 'MARIA CAMILLE', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '300-B Reparo Street, Karuhatan, Valenzuela City', '+639271234567', 'maria.cortez@example.com', NULL),
(30, 0, 353, 'ACTIVE', 'CRUZ', 'DANIEL JAMES', 'ALVAREZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '2904 Arnaldo Highway, Parada, Valenzuela City', '+639932345678', 'danieljames_alvarez.cruz@example.com', NULL),
(31, 0, 354, 'ACTIVE', 'CRUZ', 'KATRINA MARIE', 'TERESA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '79-C Golden Hills Subdivision, Gen. T. de Leon, Valenzuela City', '+639533456789', 'katrina.cruz@example.com', NULL),
(32, 0, 355, 'ACTIVE', 'CRUZ', 'MIGUEL ANGELO', 'DELA CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '666 Parkview Street, Malinta, Valenzuela City', '+639554567890', 'miguel.cruz@example.com', NULL),
(33, 0, 356, 'ACTIVE', 'CRUZ', 'MIGUEL CARLOS', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN SOCIAL WORK', '4562 Stella Maris Street, Punturin, Valenzuela City', '+639435678901', 'miguel.cruz@example.com', NULL),
(34, 0, 357, 'ACTIVE', 'DALISAY', 'FRANCIS ANDREW', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '123 J. Cruz Street, Canumay West, Valenzuela City', '+639846789012', 'francisandrew.dalisay@example.com', NULL),
(35, 0, 358, 'ACTIVE', 'DE GUZMAN', 'MARIA LOURDES', 'SANTOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '1476 Morales Avenue, Marulas, Valenzuela City', '+639717890123', 'marialourdes_santos.deguzman@example.com', NULL),
(36, 0, 359, 'ACTIVE', 'DE GUZMAN', 'SOFIA ISABEL', 'ANTONIA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN SOCIAL WORK', '2586 San Antonio Street, Mapulang Lupa, Valenzuela City', '+639278901234', 'sofia.deguzman@example.com', NULL),
(37, 0, 360, 'ACTIVE', 'DE LEON', 'SOFIA ANTONIA', 'CRUZ', 'MAP?A UNIVERSITY', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '7896 Ortiz Street, Ugong, Valenzuela City', '+639529012345', 'sofia.deleon@example.com', NULL),
(38, 0, 361, 'ACTIVE', 'DEL ROSARIO', 'ELIAS GABRIEL', 'MENDOZA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '2022 D. Mu?oz Street, Veinte Reales, Valenzuela City', '+639460123456', 'eliasgabriel_mendoza.delrosario@example.com', NULL),
(39, 0, 362, 'ACTIVE', 'DEL ROSARIO', 'LUIS MIGUEL', 'VILLANUEVA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '450-B Blue Ridge Subdivision, Dalandanan, Valenzuela City', '+639551234567', 'luis.delrosario@example.com', NULL),
(40, 0, 363, 'ACTIVE', 'DEL ROSARIO', 'SOFIA CAMILLE', 'RODRIGUEZ', 'DE LA SALLE UNIVERSITY', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '99 Jose Abad Santos Street, Gen. T. de Leon, Valenzuela City', '+639432345678', 'sofia.delrosario@example.com', NULL),
(41, 0, 364, 'ACTIVE', 'DELA CRUZ', 'FRANCISCO JAVIER', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '7856 M.H. del Pilar Street, Malanday, Valenzuela City', '+639433456789', 'franciscojavier.delacruz@example.com', NULL),
(42, 0, 365, 'ACTIVE', 'DELA CRUZ', 'LUIS ANTONIO', 'RODRIGUEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT', '1234 Capulong Street, Polo, Valenzuela City', '+639374567890', 'luis.delacruz@example.com', NULL),
(43, 0, 366, 'ACTIVE', 'DELA CRUZ', 'MARIA LUISA', 'SANTIAGO', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '3456 Daisy Street, Lingunan, Valenzuela City', '+639735678901', 'maria.delacruz@example.com', NULL),
(44, 0, 367, 'ACTIVE', 'DELA CRUZ', 'SOFIA ANGELICA', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '4785 Sta. Rosa Street, Malinta, Valenzuela City', '+639896789012', 'sofia.delacruz@example.com', NULL),
(45, 0, 368, 'ACTIVE', 'DELOS REYES', 'BIANCA KATE', 'SANTOS', 'TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SCIENCE', '100-A Sta. Monica Subdivision, Maysan, Valenzuela City', '+639437890123', 'biancakate_santos.delosreyes@example.com', NULL),
(46, 0, 369, 'ACTIVE', 'DIAZ', 'SOFIA BEATRIZ', 'RAMIREZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '9013 P. Santos Street, Palasan, Valenzuela City', '+639628901234', 'sofia.diaz@example.com', NULL),
(47, 0, 370, 'ACTIVE', 'DOMINGO', 'JANELLE MAE', 'GARCIA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '78-B De Jesus Street, Tagalag, Valenzuela City', '+639919012345', 'janellemae_garcia.domingo@example.com', NULL),
(48, 0, 371, 'ACTIVE', 'ESCALANTE', 'VANESSA JOY', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '2347 Santolan Street, Karuhatan, Valenzuela City', '+639630123456', 'vanessajoy.escalante@example.com', NULL),
(49, 0, 372, 'ACTIVE', 'ESPINOSA', 'CARLOS MIGUEL', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '1237 Aurora Boulevard, Mabolo, Valenzuela City', '+639881234567', 'carlos.espinosa@example.com', NULL),
(50, 0, 373, 'ACTIVE', 'ESPINOSA', 'GABRIELLE LOURDES', 'MENDOZA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '500 Riverside Subdivision, Canumay East, Valenzuela City', '+639312345678', 'gabriellelourdes_mendoza.espinosa@example.com', NULL),
(51, 0, 374, 'ACTIVE', 'ESPIRITU', 'RAFAEL ENRIQUE', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '5679 I. Jacinto Street, Parada, Valenzuela City', '+639723456789', 'rafael.espiritu@example.com', NULL),
(52, 0, 375, 'ACTIVE', 'ESTRADA', 'ARIANNE GRACE', 'LOPEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '89-E Villa Alegre Subdivision, Gen. T. de Leon, Valenzuela City', '+639344567890', 'ariannegrace_lopez.estrada@example.com', NULL),
(53, 0, 376, 'ACTIVE', 'ESTRELLA', 'LUIS GABRIEL', 'FERNANDEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '1234 Mendoza Street, Mapulang Lupa, Valenzuela City', '+639615678901', 'luis.estrella@example.com', NULL),
(54, 0, 377, 'ACTIVE', 'FABIAN', 'JUSTINE LORRAINE', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT', '8901 Eastwood Street, Rincon, Valenzuela City', '+639786789012', 'justinelorraine.fabian@example.com', NULL),
(55, 0, 378, 'ACTIVE', 'FERNANDEZ', 'CARLOS MIGUEL', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '1011-B MacArthur Highway, Wawang Pulo, Valenzuela City', '+639347890123', 'carlosmiguel.fernandez@example.com', NULL),
(56, 0, 379, 'ACTIVE', 'FERNANDEZ', 'JOSE ANTONIO', 'SANTOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '7657 Tulip Street, Arkong Bato, Valenzuela City', '+639568901234', 'jose.fernandez@example.com', NULL),
(57, 0, 380, 'ACTIVE', 'FERNANDEZ', 'MIGUEL ANTONIO', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '2789 C. Villanueva Street, Malinta, Valenzuela City', '+639519012345', 'miguel.fernandez@example.com', NULL),
(58, 0, 381, 'ACTIVE', 'FERNANDEZ', 'SOFIA FRANCESCA', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT', '456-B Northfields Subdivision, Dalandanan, Valenzuela City', '+639360123456', 'sofia.fernandez@example.com', NULL),
(59, 0, 382, 'ACTIVE', 'FERRER', 'LUIS ANTONIO', 'RAMIREZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '789-A Magnolia Street, Coloong, Valenzuela City', '+639311234567', 'luis.ferrer@example.com', NULL),
(60, 0, 383, 'ACTIVE', 'FLORES', 'ANTONIO LUIS', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '4001 Rizal Street, Veinte Reales, Valenzuela City', '+639392345678', 'antonio.flores@example.com', NULL),
(61, 0, 384, 'ACTIVE', 'FLORES', 'ANTONIO VICTOR', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF ARTS IN COMMUNICATION', '301-B San Vicente Subdivision, Ugong, Valenzuela City', '+639553456789', 'antoniovictor_cruz.flores@example.com', NULL),
(62, 0, 385, 'ACTIVE', 'FLORES', 'JUAN CARLO', 'DELA CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '89 Camia Street, Polo, Valenzuela City', '+639784567890', 'juan.flores@example.com', NULL),
(63, 0, 386, 'ACTIVE', 'GALANG', 'DANIELLE CLAIRE', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '5678 P. Burgos Street, Malanday, Valenzuela City', '+639625678901', 'danielleclaire_cruz.galang@example.com', NULL),
(64, 0, 387, 'ACTIVE', 'GARCIA', 'ANDREI RAFAEL', 'CARLOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '345 G. Araneta Street, Gen. T. de Leon, Valenzuela City', '+639436789012', 'andrei.garcia@example.com', NULL),
(65, 0, 388, 'ACTIVE', 'GARCIA', 'JOSEPH NATHANIEL', 'LUNA', 'UNIVERSITY OF SANTO TOMAS', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '2345 Lopez Jaena Street, Karuhatan, Valenzuela City', '+639787890123', 'josephnathaniel_luna.garcia@example.com', NULL),
(66, 0, 389, 'ACTIVE', 'GARCIA', 'MARIA ANDREA', 'REYES', 'TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '654 A. Soriano Street, Maysan, Valenzuela City', '+639318901234', 'maria.garcia@example.com', NULL),
(67, 0, 390, 'ACTIVE', 'GARCIA', 'MIGUEL ANGELO', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '9012 Southridge Subdivision, Mapulang Lupa, Valenzuela City', '+639329012345', 'miguel.garcia@example.com', NULL),
(68, 0, 391, 'ACTIVE', 'GAVINO', 'LANCE EDWARD', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN HUMAN RESOURCE DEVELOPMENT MANAGEMENT', '567 J. Luna Street, Parada, Valenzuela City', '+639460123456', 'lanceedward_cruz.gavino@example.com', NULL),
(69, 0, 392, 'ACTIVE', 'GOMEZ', 'MARIA ISABEL', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '234-A Cattleya Street, Lingunan, Valenzuela City', '+639881234567', 'maria.gomez@example.com', NULL),
(70, 0, 393, 'ACTIVE', 'GOMEZ', 'RAYMOND MICHAEL', '', 'ST. PAUL UNIVERSITY MANILA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '7895 Jose Rizal Avenue, Malinta, Valenzuela City', '+639382345678', 'raymondmichael_perez.gomez@example.com', NULL),
(71, 0, 394, 'ACTIVE', 'GONZAGA', 'MIGUEL ANGELO', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '1201 El Grande Subdivision, Ugong, Valenzuela City', '+639733456789', 'miguel.gonzaga@example.com', NULL),
(72, 0, 395, 'ACTIVE', 'GONZALES', 'VICTORIA LYNN', 'PASCUAL', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '2345 Makabayan Street, Rincon, Valenzuela City', '+639414567890', 'victorialynn_pascual.gonzales@example.com', NULL),
(73, 0, 396, 'ACTIVE', 'GONZALEZ', 'MARIA CAMILLE', 'RODRIGUEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '8976 Dr. A. Santos Street, Dalandanan, Valenzuela City', '+639495678901', 'maria.gonzalez@example.com', NULL),
(74, 0, 397, 'ACTIVE', 'GONZALEZ', 'MIGUEL CARLOS', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '1005-B Villa Santos Subdivision, Mabolo, Valenzuela City', '+639396789012', 'miguel.gonzalez@example.com', NULL),
(75, 0, 398, 'ACTIVE', 'GONZALEZ', 'RAFAEL ENRIQUE', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '2358 San Fernando Street, Marulas, Valenzuela City', '+639757890123', 'rafael.gonzalez@example.com', NULL),
(76, 0, 399, 'ACTIVE', 'GONZALEZ', 'SOFIA ISABELLE', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '789 Camacho Street, Polo, Valenzuela City', '+639898901234', 'sofia.gonzalez@example.com', NULL),
(77, 0, 400, 'ACTIVE', 'GUZMAN', 'MARIA ANGELICA', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SCIENCE', '4567 Imelda Street, Gen. T. de Leon, Valenzuela City', '+639769012345', 'maria.guzman@example.com', NULL),
(78, 0, 401, 'ACTIVE', 'HERNANDEZ', 'JOHN PAUL', 'CASTILLO', 'NATIONAL UNIVERSITY', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '345-A Cherry Lane, Veinte Reales, Valenzuela City', '+639660123456', 'johnpaul_castillo.hernandez@example.com', NULL),
(79, 0, 402, 'ACTIVE', 'HERNANDEZ', 'MARIA CRISTINA', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '1238 West Avenue, Maysan, Valenzuela City', '+639751234567', 'maria.hernandez@example.com', NULL),
(80, 0, 403, 'ACTIVE', 'HERNANDEZ', 'MIGUEL ANTONIO', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN HUMAN RESOURCE DEVELOPMENT MANAGEMENT', '5001 P. Tuazon Boulevard, Arkong Bato, Valenzuela City', '+639912345678', 'miguel.hernandez@example.com', NULL),
(81, 0, 404, 'ACTIVE', 'HERRERA', 'DIANA MARIE', 'DELA CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '6789 Mango Street, Punturin, Valenzuela City', '+639453456789', 'dianamarie_fernandez.herrera@example.com', NULL),
(82, 0, 405, 'ACTIVE', 'LEGASPI', 'MARK EMMANUEL', 'FERNANDEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '90 Dela Rosa Compound, Tagalag, Valenzuela City', '+639464567890', 'markemmanuel_fernandez.legaspi@example.com', NULL),
(83, 0, 406, 'ACTIVE', 'LEGASPI', 'MIGUEL ANTONIO', 'GONZALEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '1007 Queen?s Row Subdivision, Mapulang Lupa, Valenzuela City', '+639735678901', 'miguel.legaspi@example.com', NULL),
(84, 0, 407, 'ACTIVE', 'LIM', 'ANGELA MARIE', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '7890 W. Llamas Street, Malanday, Valenzuela City', '+639676789012', 'angela.lim@example.com', NULL),
(85, 0, 408, 'ACTIVE', 'LIM', 'MARIA CRISTINA', 'RODRIGUEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '432 San Jose Street, Canumay West, Valenzuela City', '+639697890123', 'maria.lim@example.com', NULL),
(86, 0, 409, 'ACTIVE', 'LIM', 'MIA KATRINA', 'GOMEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '5674 Kalayaan Avenue, Ugong, Valenzuela City', '+639728901234', 'miakatrina_gomez.lim@example.com', NULL),
(87, 0, 410, 'ACTIVE', 'LIM', 'SOFIA ANTONIA', 'RODRIGUEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SCIENCE', '2398 Domingo Street, Polo, Valenzuela City', '+639879012345', 'sofia.lim@example.com', NULL),
(88, 0, 411, 'ACTIVE', 'LOPEZ', 'JOSHUA KYLE', 'RAMOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN SOCIAL WORK', '123 Sampaguita Street, Malinta, Valenzuela City', '+639680123456', 'joshuakyle_ramos.lopez@example.com', NULL),
(89, 0, 412, 'ACTIVE', 'LOPEZ', 'LUIS MIGUEL', 'ENRIQUEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT', '45-A Rose Avenue, Gen. T. de Leon, Valenzuela City', '+639721234567', 'luis.lopez@example.com', NULL),
(90, 0, 413, 'ACTIVE', 'LORENZO', 'JOHNATHAN ERIC', 'FERNANDEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '6785 Luna Street, Ugong, Valenzuela City', '+639522345678', 'johnathaneric_fernandez.lorenzo@example.com', NULL),
(91, 0, 414, 'ACTIVE', 'LU', 'MARTIN JOHN', 'ALVAREZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '12 San Miguel Subdivision, Marulas, Valenzuela City', '+639483456789', 'martinjohn_alvarez.lu@example.com', NULL),
(92, 0, 415, 'ACTIVE', 'LUNA', 'JUAN CARLOS', 'GONZALES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '89-B Gen. Luis Street, Paso de Blas, Valenzuela City', '+639824567890', 'juan.luna@example.com', NULL),
(93, 0, 416, 'ACTIVE', 'MABINI', 'LAWRENCE ANTHONY', 'PEREZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '47 Dela Cruz Compound, Mapulang Lupa, Valenzuela City', '+639875678901', 'lawrenceanthony_perez.mabini@example.com', NULL),
(94, 0, 417, 'ACTIVE', 'MACASAET', 'SOFIA BERNADETTE', 'RODRIGUEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '101 Rizal Avenue, Polo, Valenzuela City', '+639336789012', 'sofia.macasaet@example.com', NULL),
(95, 0, 418, 'ACTIVE', 'MALABANAN', 'MIGUEL CARLOS', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '5670 Washington Street, Karuhatan, Valenzuela City', '+639337890123', 'miguel.malabanan@example.com', NULL),
(96, 0, 419, 'ACTIVE', 'MALVAR', 'KATHLEEN CLAIRE', 'DE LEON', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '34 Lopez Street, Malanday, Valenzuela City', '+639398901234', 'kathleenclaire_deleon.malvar@example.com', NULL),
(97, 0, 420, 'ACTIVE', 'MANALANG', 'ANNA CLARISSE', 'RAMOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '256 Santos Street, Wawang Pulo, Valenzuela City', '+639879012345', 'annaclarisse_ramos.manalang@example.com', NULL),
(98, 0, 421, 'ACTIVE', 'MANGUBAT', 'SABRINA GRACE', 'VILLANUEVA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN SOCIAL WORK', '9 Villa Trinidad Subdivision, Ugong, Valenzuela City', '+639970123456', 'sabrinagrace_villanueva.mangubat@example.com', NULL),
(99, 0, 422, 'ACTIVE', 'MANUEL', 'ANDREA MARIE', 'CRUZ', 'PHILIPPINE NORMAL UNIVERSITY', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '765 Gomez Street, Dalandanan, Valenzuela City', '+639811234567', 'andrea.manuel@example.com', NULL),
(100, 0, 423, 'ACTIVE', 'MARIANO', 'RAFAEL JOHN', 'MENDOZA', 'PAMANTASAN NG LUNGSOD NG MAYNILA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '890 Morales Street, Maysan, Valenzuela City', '+639362345678', 'rafaeljohn_mendoza.mariano@example.com', NULL),
(101, 0, 424, 'ACTIVE', 'MARQUEZ', 'MIGUEL ANGELO', 'LUIS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '65-C Bustamante Street, Lingunan, Valenzuela City', '+639783456789', 'miguel.marquez@example.com', NULL),
(102, 0, 425, 'ACTIVE', 'MARQUEZ', 'RENATO LUIS', 'DELA CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN HUMAN RESOURCE DEVELOPMENT MANAGEMENT', '400 Rivera Compound, Canumay East, Valenzuela City', '+639254567890', 'renatoluis_delacruz.marquez@example.com', NULL),
(103, 0, 426, 'ACTIVE', 'MARTINEZ', 'ALICIA CLAIRE', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '178 Lopez Jaena Street, Parada, Valenzuela City', '+639345678901', 'aliciaclaire_reyes.martinez@example.com', NULL),
(104, 0, 427, 'ACTIVE', 'MENDOZA', 'CAMILLE ANTOINETTE', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '92-D Freedom Street, Gen. T. de Leon, Valenzuela City', '+639276789012', 'camilleantoinette.mendoza@example.com', NULL),
(105, 0, 428, 'ACTIVE', 'MENDOZA', 'LUIS MIGUEL', 'CRUZ', 'PHILIPPINE CHRISTIAN UNIVERSITY', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '333 E. Rodriguez Street, Malinta, Valenzuela City', '+639587890123', 'luis.mendoza@example.com', NULL),
(106, 0, 429, 'ACTIVE', 'MENDOZA', 'MIGUEL ANGELO', 'GARCIA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '8765 Bayani Street, Rincon, Valenzuela City', '+639318901234', 'miguel.mendoza@example.com', NULL),
(107, 0, 430, 'ACTIVE', 'MERCADO', 'JUAN PAOLO', 'LOPEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '1289 San Juan Street, Arkong Bato, Valenzuela City', '+639799012345', 'juan.mercado@example.com', NULL),
(108, 0, 431, 'ACTIVE', 'MERCADO', 'MARIA KRISTINA', 'SANTOS', 'UNIVERSITY OF THE PHILIPPINES DILIMAN', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '47-B Greenfields Subdivision, Malanday, Valenzuela City', '+639550123456', 'maria.mercado@example.com', NULL),
(109, 0, 432, 'ACTIVE', 'MERCADO', 'MARIO ANDREW', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '501 Valenzuela Street, Tagalag, Valenzuela City', '+639991234567', 'marioandrew_cruz.mercado@example.com', NULL),
(110, 0, 433, 'ACTIVE', 'MIRANDA', 'JAMES LORENZO', 'FERNANDEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '1002 Ta?ong Street, Bignay, Valenzuela City', '+639392345678', 'jameslorenzo_fernandez.miranda@example.com', NULL),
(111, 0, 434, 'ACTIVE', 'MIRANDA', 'SOFIA FRANCESCA', 'DELA CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT', '2000 A. Bonifacio Street, Palasan, Valenzuela City', '+639733456789', 'sofia.miranda@example.com', NULL),
(112, 0, 435, 'ACTIVE', 'MONTEVERDE', 'SAMANTHA CLAIRE', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF ARTS IN COMMUNICATION', '3456 S. Hernandez Street, Lawang Bato, Valenzuela City', '+639574567890', 'samanthaclaire.monteverde@example.com', NULL),
(113, 0, 436, 'ACTIVE', 'MORALES', 'NICOLE GRACE', 'DELA TORRE', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '432 J.P. Rizal Avenue, Malinta, Valenzuela City', '+639985678901', 'nicolegrace_delatorre.morales@example.com', NULL),
(114, 0, 437, 'ACTIVE', 'NAVARRO', 'MATTHEW JOHN', 'LIM', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '17 Goldenville Subdivision, Ugong, Valenzuela City', '+639526789012', 'matthewjohn_lim.navarro@example.com', NULL),
(115, 0, 438, 'ACTIVE', 'NAVARRO', 'SOFIA GABRIELLE', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT', '4561 Felix Avenue, Coloong, Valenzuela City', '+639747890123', 'sofia.navarro@example.com', NULL),
(116, 0, 439, 'ACTIVE', 'NOCOM', 'PAUL GABRIEL', 'SANTOS', 'NATIONAL UNIVERSITY', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '98-B Sto. Ni?o Street, Dalandanan, Valenzuela City', '+639978901234', 'paulgabriel_santos.nocom@example.com', NULL),
(117, 0, 440, 'ACTIVE', 'OCAMPO', 'ANDREA NICOLE', 'SANTOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SCIENCE', '300-B Reparo Street, Karuhatan, Valenzuela City', '+639349012345', 'andreanicole_santos.ocampo@example.com', NULL),
(118, 0, 441, 'ACTIVE', 'OCAMPO', 'PAOLO MIGUEL', 'DE GUZMAN', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '2904 Arnaldo Highway, Parada, Valenzuela City', '+639810123456', 'paolo.ocampo@example.com', NULL),
(119, 0, 442, 'ACTIVE', 'OLIVAR', 'MARCO ANTHONY', 'DELA CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '79-C Golden Hills Subdivision, Gen. T. de Leon, Valenzuela City', '+639331234567', 'marcoanthony_delacruz.olivar@example.com', NULL),
(120, 0, 443, 'ACTIVE', 'ORTEGA', 'KATHERINE ROSE', 'VILLANUEVA', 'UNIVERSITY OF THE EAST', 'BACHELOR OF ARTS IN COMMUNICATION', '666 Parkview Street, Malinta, Valenzuela City', '+639572345678', 'katherinerose_villanueva.ortega@example.com', NULL),
(121, 0, 444, 'ACTIVE', 'ORTEGA', 'MIGUEL ANGEL', 'FERNANDEZ', 'ARELLANO UNIVERSITY', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '4562 Stella Maris Street, Punturin, Valenzuela City', '+639753456789', 'miguel.ortega@example.com', NULL),
(122, 0, 445, 'ACTIVE', 'PADILLA', 'VINCE ADRIAN', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '123 J. Cruz Street, Canumay West, Valenzuela City', '+639444567890', 'vinceadrian_cruz.padilla@example.com', NULL),
(123, 0, 446, 'ACTIVE', 'PALMA', 'MARIA CLARA', 'HERNANDEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '1476 Morales Avenue, Marulas, Valenzuela City', '+639795678901', 'maria.palma@example.com', NULL),
(124, 0, 447, 'ACTIVE', 'PANGANIBAN', 'JULIETTE MARIE', 'REYES', 'MIRIAM COLLEGE', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '2586 San Antonio Street, Mapulang Lupa, Valenzuela City', '+639576789012', 'juliettemarie_reyes.panganiban@example.com', NULL),
(125, 0, 448, 'ACTIVE', 'PANGILINAN', 'ELIZABETH ANNE', 'GONZALES', 'MAP?A UNIVERSITY', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '7896 Ortiz Street, Ugong, Valenzuela City', '+639447890123', 'elizabethanne_gonzales.pangilinan@example.com', NULL),
(126, 0, 449, 'ACTIVE', 'PASCUAL', 'CHERRY ANN', 'DE LEON', 'DE LA SALLE UNIVERSITY', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '2022 D. Mu?oz Street, Veinte Reales, Valenzuela City', '+639358901234', 'cherryann_deleon.pascual@example.com', NULL),
(127, 0, 450, 'ACTIVE', 'PASCUAL', 'MIGUEL ANTONIO', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '450-B Blue Ridge Subdivision, Dalandanan, Valenzuela City', '+639899012345', 'miguel.pascual@example.com', NULL),
(128, 0, 451, 'ACTIVE', 'PERALTA', 'JUAN MIGUEL', 'GARCIA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '99 Jose Abad Santos Street, Gen. T. de Leon, Valenzuela City', '+639960123456', 'juan.peralta@example.com', NULL),
(129, 0, 452, 'ACTIVE', 'PERALTA', 'VICTORIA MAY', 'GARCIA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT', '7856 M.H. del Pilar Street, Malanday, Valenzuela City', '+639241234567', 'victoriamay_garcia.peralta@example.com', NULL),
(130, 0, 453, 'ACTIVE', 'PEREZ', 'CELINE MARIE', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '1234 Capulong Street, Polo, Valenzuela City', '+639862345678', 'celinemarie.perez@example.com', NULL),
(131, 0, 454, 'ACTIVE', 'PEREZ', 'ENRIQUE JAVIER', 'FERNANDEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN HUMAN RESOURCE DEVELOPMENT MANAGEMENT', '3456 Daisy Street, Lingunan, Valenzuela City', '+639733456789', 'enrique.perez@example.com', NULL),
(132, 0, 455, 'ACTIVE', 'PEREZ', 'RAFAEL ENRIQUE', 'CRUZ', 'UNIVERSITY OF ASIA AND THE PACIFIC', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '4785 Sta. Rosa Street, Malinta, Valenzuela City', '+639294567890', 'rafael.perez@example.com', NULL),
(133, 0, 456, 'ACTIVE', 'PEREZ', 'SOFIA PATRICIA', 'REYES', 'FAR EASTERN UNIVERSITY', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '100-A Sta. Monica Subdivision, Maysan, Valenzuela City', '+639585678901', 'sofia.perez@example.com', NULL),
(134, 0, 457, 'ACTIVE', 'PIMENTEL', 'MARJORIE GRACE', 'RAMIREZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '9013 P. Santos Street, Palasan, Valenzuela City', '+639986789012', 'marjoriegrace_ramirez.pimentel@example.com', NULL),
(135, 0, 458, 'ACTIVE', 'QUIAMBAO', 'EUNICE MARIE', 'SANTOS', 'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '78-B De Jesus Street, Tagalag, Valenzuela City', '+639557890123', 'eunicemarie_santos.quiambao@example.com', NULL),
(136, 0, 459, 'ACTIVE', 'QUIROZ', 'KARL MICHAEL', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '2347 Santolan Street, Karuhatan, Valenzuela City', '+639478901234', 'karlmichael.quiroz@example.com', NULL),
(137, 0, 460, 'ACTIVE', 'RAMIREZ', 'LOUIS ANTHONY', 'RIVERA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '1237 Aurora Boulevard, Mabolo, Valenzuela City', '+639329012345', 'louisanthony_rivera.ramirez@example.com', NULL),
(138, 0, 461, 'ACTIVE', 'RAMOS', 'ALEJANDRO MIGUEL', 'PEREZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '500 Riverside Subdivision, Canumay East, Valenzuela City', '+639820123456', 'alejandro.ramos@example.com', NULL),
(139, 0, 462, 'ACTIVE', 'RAMOS', 'NOEL ANDREW', 'ALVAREZ', 'PHILIPPINE NORMAL UNIVERSITY', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN HUMAN RESOURCE DEVELOPMENT MANAGEMENT', '5679 I. Jacinto Street, Parada, Valenzuela City', '+639231234567', 'noelandrew_alvarez.ramos@example.com', NULL),
(140, 0, 463, 'ACTIVE', 'REMEDIOS', 'KENNETH RYAN', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '89-E Villa Alegre Subdivision, Gen. T. de Leon, Valenzuela City', '+639332345678', 'kennethryan.remedios@example.com', NULL),
(141, 0, 464, 'ACTIVE', 'REYES', 'JEROME ANDREI', 'TAN', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '1234 Mendoza Street, Mapulang Lupa, Valenzuela City', '+639893456789', 'jeromeandrei_tan.reyes@example.com', NULL),
(142, 0, 465, 'ACTIVE', 'REYES', 'MARIA CLARA', 'ANTONINA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '8901 Eastwood Street, Rincon, Valenzuela City', '+639964567890', 'maria.reyes@example.com', NULL),
(143, 0, 466, 'ACTIVE', 'REYES', 'MARIA ISABEL', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF ARTS IN COMMUNICATION', '1011-B MacArthur Highway, Wawang Pulo, Valenzuela City', '+639375678901', 'maria.reyes@example.com', NULL),
(144, 0, 467, 'ACTIVE', 'REYES', 'SOFIA BEATRIZ', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '7657 Tulip Street, Arkong Bato, Valenzuela City', '+639286789012', 'sofia.reyes@example.com', NULL),
(145, 0, 468, 'ACTIVE', 'RIVERA', 'ANGELA MONIQUE', 'BAUTISTA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '2789 C. Villanueva Street, Malinta, Valenzuela City', '+639257890123', 'angelamonique_bautista.rivera@example.com', NULL),
(146, 0, 469, 'ACTIVE', 'RIVERA', 'LUIS MIGUEL', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '456-B Northfields Subdivision, Dalandanan, Valenzuela City', '+639498901234', 'luis.rivera@example.com', NULL),
(147, 0, 470, 'ACTIVE', 'RIVERA', 'MARIA ANGELICA', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF ARTS IN COMMUNICATION', '789-A Magnolia Street, Coloong, Valenzuela City', '+639379012345', 'maria.rivera@example.com', NULL),
(148, 0, 471, 'ACTIVE', 'RIVERA', 'MARIA LUISA', 'RODRIGUEZ', 'ST. PAUL UNIVERSITY MANILA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '4001 Rizal Street, Veinte Reales, Valenzuela City', '+639950123456', 'maria.rivera@example.com', NULL),
(149, 0, 472, 'ACTIVE', 'ROCO', 'NATALIE ROSE', 'MENDOZA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '301-B San Vicente Subdivision, Ugong, Valenzuela City', '+639461234567', 'natalierose_mendoza.roco@example.com', NULL),
(150, 0, 473, 'ACTIVE', 'RODRIGUEZ', 'ANDREA PATRICIA', 'DE LEON', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '89 Camia Street, Polo, Valenzuela City', '+639372345678', 'andrea.rodriguez@example.com', NULL),
(151, 0, 474, 'ACTIVE', 'RODRIGUEZ', 'LUIS GABRIEL', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '5678 P. Burgos Street, Malanday, Valenzuela City', '+639753456789', 'luis.rodriguez@example.com', NULL),
(152, 0, 475, 'ACTIVE', 'RODRIGUEZ', 'MARIA ANGELICA', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '345 G. Araneta Street, Gen. T. de Leon, Valenzuela City', '+639834567890', 'maria.rodriguez@example.com', NULL),
(153, 0, 476, 'ACTIVE', 'RODRIGUEZ', 'SEBASTIAN MIGUEL', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN SOCIAL WORK', '2345 Lopez Jaena Street, Karuhatan, Valenzuela City', '+639855678901', 'sebastianmiguel_alonzo.rodriguez@example.com', NULL),
(154, 0, 477, 'ACTIVE', 'ROXAS', 'BENJAMIN MARK', 'SANTOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF ARTS IN COMMUNICATION', '654 A. Soriano Street, Maysan, Valenzuela City', '+639786789012', 'benjaminmark_santos.roxas@example.com', NULL),
(155, 0, 478, 'ACTIVE', 'SALVADOR', 'PATRICIA LOUISE', 'FERNANDEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '9012 Southridge Subdivision, Mapulang Lupa, Valenzuela City', '+639897890123', 'patricialouise_fernandez.salvador@example.com', NULL),
(156, 0, 479, 'ACTIVE', 'SAMPAGUITA', 'ERIC JAMES', 'CASTRO', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '567 J. Luna Street, Parada, Valenzuela City', '+639548901234', 'ericjames_castro.sampaguita@example.com', NULL),
(157, 0, 480, 'ACTIVE', 'SANTIAGO', 'ISABELLA JADE', 'CASTRO', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '234-A Cattleya Street, Lingunan, Valenzuela City', '+639899012345', 'isabellajade_castro.santiago@example.com', NULL),
(158, 0, 481, 'ACTIVE', 'SANTIAGO', 'RAFAEL ANTONIO', 'GARCIA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '7895 Jose Rizal Avenue, Malinta, Valenzuela City', '+639540123456', 'rafael.santiago@example.com', NULL),
(159, 0, 482, 'ACTIVE', 'SANTOS', 'ISABELA MAYA', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '1201 El Grande Subdivision, Ugong, Valenzuela City', '+639941234567', 'isabelamaya_cruz.santos@example.com', NULL),
(160, 0, 483, 'ACTIVE', 'SANTOS', 'JUAN CARLOS', 'DELA CRUZ', 'MIRIAM COLLEGE', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '2345 Makabayan Street, Rincon, Valenzuela City', '+639532345678', 'juan.santos@example.com', NULL),
(161, 0, 484, 'ACTIVE', 'SANTOS', 'JUAN MIGUEL', 'GABRIEL', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '8976 Dr. A. Santos Street, Dalandanan, Valenzuela City', '+639923456789', 'juan.santos@example.com', NULL),
(162, 0, 485, 'ACTIVE', 'SANTOS', 'MARIA ANGELICA', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '1005-B Villa Santos Subdivision, Mabolo, Valenzuela City', '+639234567890', 'maria.santos@example.com', NULL),
(163, 0, 486, 'ACTIVE', 'SANTOS', 'MARIA ISABELLA', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '2358 San Fernando Street, Marulas, Valenzuela City', '+639985678901', 'maria.santos@example.com', NULL),
(164, 0, 487, 'ACTIVE', 'SANTOS', 'SOFIA DANIELLE', 'GONZALES', 'LYCEUM OF THE PHILIPPINES UNIVERSITY', 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '789 Camacho Street, Polo, Valenzuela City', '+639436789012', 'sofia.santos@example.com', NULL),
(165, 0, 488, 'ACTIVE', 'SANTOS', 'SOFIA GABRIELLE', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '4567 Imelda Street, Gen. T. de Leon, Valenzuela City', '+639737890123', 'sofia.santos@example.com', NULL),
(166, 0, 489, 'ACTIVE', 'SILVA', 'CLAIRE PATRICIA', '', 'ADAMSON UNIVERSITY', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '345-A Cherry Lane, Veinte Reales, Valenzuela City', '+639288901234', 'clairepatricia.silva@example.com', NULL),
(167, 0, 490, 'ACTIVE', 'SISON', 'CATHY ROSE', 'GONZALES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '1238 West Avenue, Maysan, Valenzuela City', '+639579012345', 'cathyrose_gonzales.sison@example.com', NULL),
(168, 0, 491, 'ACTIVE', 'SISON', 'RAFAEL GABRIEL', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '5001 P. Tuazon Boulevard, Arkong Bato, Valenzuela City', '+639370123456', 'rafael.sison@example.com', NULL),
(169, 0, 492, 'ACTIVE', 'SISON', 'SOFIA ISABELLA', 'RODRIGUEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '6789 Mango Street, Punturin, Valenzuela City', '+639271234567', 'sofia.sison@example.com', NULL),
(170, 0, 493, 'ACTIVE', 'SOLIS', 'MELISSA ROSE', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '90 Dela Rosa Compound, Tagalag, Valenzuela City', '+639852345678', 'melissarose_cruz.solis@example.com', NULL),
(171, 0, 494, 'ACTIVE', 'SORIANO', 'IAN JAMES', 'RAMOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '1007 Queen?s Row Subdivision, Mapulang Lupa, Valenzuela City', '+639343456789', 'ianjames_ramos.soriano@example.com', NULL),
(172, 0, 495, 'ACTIVE', 'SY', 'RAFAEL ANDREI', 'DELA CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '7890 W. Llamas Street, Malanday, Valenzuela City', '+639934567890', 'rafael.sy@example.com', NULL),
(173, 0, 496, 'ACTIVE', 'TAN', 'FELICITY ANNE', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '432 San Jose Street, Canumay West, Valenzuela City', '+639755678901', 'felicityanne_cruz.tan@example.com', NULL),
(174, 0, 497, 'ACTIVE', 'TAN', 'MARIA CRISTINA', '', 'PHILIPPINE CHRISTIAN UNIVERSITY', 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '5674 Kalayaan Avenue, Ugong, Valenzuela City', '+639396789012', 'maria.tan@example.com', NULL),
(175, 0, 498, 'ACTIVE', 'TORRALBA', 'MIRANDA LOUISE', '', 'ARELLANO UNIVERSITY', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '2398 Domingo Street, Polo, Valenzuela City', '+639567890123', 'mirandalaouise_santos.torralba@example.com', NULL),
(176, 0, 499, 'ACTIVE', 'TORRES', 'ANNA SOFIA', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SCIENCE', '123 Sampaguita Street, Malinta, Valenzuela City', '+639878901234', 'annasofia_deleon.torres@example.com', NULL),
(178, 0, 501, 'ACTIVE', 'TORRES', 'JUAN MIGUEL', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF ARTS IN COMMUNICATION', '6785 Luna Street, Ugong, Valenzuela City', '+639860123456', 'juan.torres@example.com', NULL),
(179, 0, 502, 'ACTIVE', 'TORRES', 'LUIS ANTONIO', 'RODRIGUEZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', '12 San Miguel Subdivision, Marulas, Valenzuela City', '+639981234567', 'luis.torres@example.com', NULL),
(180, 0, 503, 'ACTIVE', 'TUASON', 'JOSHUA ALEXANDER', 'SANTOS', 'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT', '89-B Gen. Luis Street, Paso de Blas, Valenzuela City', '+639572345678', 'joshuaalexander_santos.tuason@example.com', NULL),
(181, 0, 504, 'ACTIVE', 'URBANO', 'BENJAMIN PHILIP', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG MAYNILA', 'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION', '47 Dela Cruz Compound, Mapulang Lupa, Valenzuela City', '+639233456789', 'benjaminphilip_cruz.urbano@example.com', NULL),
(182, 0, 505, 'ACTIVE', 'VASQUEZ', 'ANGELA VICTORIA', 'RIVERA', 'UNIVERSITY OF THE PHILIPPINES DILIMAN', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN HUMAN RESOURCE DEVELOPMENT MANAGEMENT', '101 Rizal Avenue, Polo, Valenzuela City', '+639684567890', 'angelavictoria_rivera.vasquez@example.com', NULL),
(183, 0, 506, 'ACTIVE', 'VASQUEZ', 'CHRISTINE JOY', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '5670 Washington Street, Karuhatan, Valenzuela City', '+639375678901', 'christinejoy_vasquez@example.com', NULL),
(185, 0, 508, 'ACTIVE', 'VELASCO', 'MICHAEL RAY', 'SANTOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '256 Santos Street, Wawang Pulo, Valenzuela City', '+639227890123', 'michaelray_santos.velasco@example.com', NULL),
(186, 0, 509, 'ACTIVE', 'VELASCO', 'RAFAEL ENRIQUE', 'GARCIA', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', '9 Villa Trinidad Subdivision, Ugong, Valenzuela City', '+639858901234', 'rafael.velasco@example.com', NULL),
(187, 0, 510, 'ACTIVE', 'VERGARA', 'ELISA MARIE', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '765 Gomez Street, Dalandanan, Valenzuela City', '+639999012345', 'elisamarie_garcia.vergara@example.com', NULL),
(188, 0, 511, 'ACTIVE', 'VILLANUEVA', 'CHRISTIAN LEO', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '890 Morales Street, Maysan, Valenzuela City', '+639440123456', 'christianleo_perez.villanueva@example.com', NULL),
(189, 0, 512, 'ACTIVE', 'VILLANUEVA', 'JUAN MIGUEL', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SCIENCE', '65-C Bustamante Street, Lingunan, Valenzuela City', '+639342345678', 'juan.villanueva@example.com', NULL),
(190, 0, 513, 'ACTIVE', 'VILLANUEVA', 'MARCO ANTONIO', 'REYES', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF ARTS IN COMMUNICATION', '400 Rivera Compound, Canumay East, Valenzuela City', '+639773456789', 'marco.villanueva@example.com', NULL),
(191, 0, 514, 'ACTIVE', 'VILLANUEVA', 'MARIA ANDREA', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '178 Lopez Jaena Street, Parada, Valenzuela City', '+639264567890', 'maria.villanueva@example.com', NULL),
(192, 0, 515, 'ACTIVE', 'VILLAR', 'CHLOE ELIZABETH', 'DE LA CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', '92-D Freedom Street, Gen. T. de Leon, Valenzuela City', '+639415678901', 'chloeelizabeth_delacruz.villar@example.com', NULL);
INSERT INTO `scholar` (`scholar_id`, `batch_num`, `user_id`, `status`, `last_name`, `first_name`, `middle_name`, `school`, `course`, `_address`, `contact`, `email`, `remarks`) VALUES
(193, 0, 516, 'ACTIVE', 'VILLAR', 'MIGUEL LORENZO', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '333 E. Rodriguez Street, Malinta, Valenzuela City', '+639886789012', 'miguel.villar@example.com', NULL),
(194, 0, 517, 'ACTIVE', 'VILLARUEL', 'ALDRICH PAUL', '', 'FAR EASTERN UNIVERSITY', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '8765 Bayani Street, Rincon, Valenzuela City', '+639287890123', 'aldrichpaul.villaruel@example.com', NULL),
(195, 0, 518, 'ACTIVE', 'YAP', 'SOFIA ALESSANDRA', 'CRUZ', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '1289 San Juan Street, Arkong Bato, Valenzuela City', '+639668901234', 'sofia.yap@example.com', NULL),
(196, 0, 519, 'ACTIVE', 'YU', 'STEPHANIE MAE', 'SANTOS', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', '47-B Greenfields Subdivision, Malanday, Valenzuela City', '+639559012345', 'stephaniemae_yu@example.com', NULL),
(197, 0, 520, 'ACTIVE', 'ZAMORA', 'SOFIA ANGELICA', 'CRUZ', 'ATENEO DE MANILA UNIVERSITY', 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '501 Valenzuela Street, Tagalag, Valenzuela City', '+639770123456', 'sofia.zamora@example.com', NULL),
(27001, 27, 301, 'ACTIVE', 'JACINTO', 'ALEXIS ROVIC JOHN', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', '1070 A VINCHY ST. GEN T DE LEON VALENZUELA CITY', '+639694272029', 'sail.havenfield@gmail.com', NULL),
(28001, 28, 521, 'GRADUATED', 'MARCOS', 'DANNAH LEI', '', 'PAMANTASAN NG LUNGSOD NG VALENZUELA', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '1070 A VINCHY VALENZUELA', '+631234567890', 'dnnhmrcs@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `scholar_id` int(11) NOT NULL,
  `_status` int(11) NOT NULL,
  `acad_year` varchar(10) NOT NULL,
  `sem` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `submit_id` int(11) NOT NULL,
  `scholar_id` int(11) NOT NULL,
  `sub_date` date NOT NULL,
  `doc_name` varchar(150) NOT NULL,
  `doc_type` varchar(50) NOT NULL,
  `acad_year` varchar(10) NOT NULL,
  `sem` int(1) NOT NULL,
  `doc_status` varchar(10) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`submit_id`, `scholar_id`, `sub_date`, `doc_name`, `doc_type`, `acad_year`, `sem`, `doc_status`, `reason`) VALUES
(138, 28001, '2024-05-30', 'MARCOS_DANNAH LEI__Year2_Sem2_COR.pdf', 'COR', '2024-2025', 2, 'APPROVED', ''),
(139, 28001, '2024-05-30', 'MARCOS_DANNAH LEI__Year2_Sem2_TOR.pdf', 'TOR', '2024-2025', 2, 'DECLINED', 'BLANK'),
(140, 28001, '2024-05-30', 'MARCOS_DANNAH LEI__Year2_Sem2_SCF.pdf', 'SCF', '2024-2025', 2, 'PENDING', '');

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
(301, 2, '27-001', 'JACINTO'),
(324, 2, '29-001', 'AGUILAR'),
(325, 2, '29-002', 'AGUILAR'),
(326, 2, '29-003', 'ALONZO'),
(327, 2, '29-004', 'ALVAREZ'),
(328, 2, '29-005', 'AQUINO'),
(329, 2, '29-006', 'AQUINO'),
(330, 2, '29-007', 'AQUINO'),
(331, 2, '29-008', 'AQUINO'),
(332, 2, '29-009', 'ARCEO'),
(333, 2, '29-010', 'BACANI'),
(334, 2, '29-011', 'BAGONGAHAS'),
(335, 2, '29-012', 'BASA'),
(336, 2, '29-013', 'BAUTISTA'),
(337, 2, '29-014', 'BAUTISTA'),
(338, 2, '29-015', 'BUENAVENTURA'),
(339, 2, '29-016', 'BULALACAO'),
(340, 2, '29-017', 'CARLOS'),
(341, 2, '29-018', 'CASTILLO'),
(342, 2, '29-019', 'CASTRO'),
(343, 2, '29-020', 'CASTRO'),
(344, 2, '29-021', 'CAVILES'),
(345, 2, '29-022', 'CAYETANO'),
(346, 2, '29-023', 'CHUA'),
(347, 2, '29-024', 'CHUA'),
(348, 2, '29-025', 'CHUA'),
(349, 2, '29-026', 'CONCEPCION'),
(350, 2, '29-027', 'CORONEL'),
(351, 2, '29-028', 'CORTEZ'),
(352, 2, '29-029', 'CORTEZ'),
(353, 2, '29-030', 'CRUZ'),
(354, 2, '29-031', 'CRUZ'),
(355, 2, '29-032', 'CRUZ'),
(356, 2, '29-033', 'CRUZ'),
(357, 2, '29-034', 'DALISAY'),
(358, 2, '29-035', 'DE GUZMAN'),
(359, 2, '29-036', 'DE GUZMAN'),
(360, 2, '29-037', 'DE LEON'),
(361, 2, '29-038', 'DEL ROSARIO'),
(362, 2, '29-039', 'DEL ROSARIO'),
(363, 2, '29-040', 'DEL ROSARIO'),
(364, 2, '29-041', 'DELA CRUZ'),
(365, 2, '29-042', 'DELA CRUZ'),
(366, 2, '29-043', 'DELA CRUZ'),
(367, 2, '29-044', 'DELA CRUZ'),
(368, 2, '29-045', 'DELOS REYES'),
(369, 2, '29-046', 'DIAZ'),
(370, 2, '29-047', 'DOMINGO'),
(371, 2, '29-048', 'ESCALANTE'),
(372, 2, '29-049', 'ESPINOSA'),
(373, 2, '29-050', 'ESPINOSA'),
(374, 2, '29-051', 'ESPIRITU'),
(375, 2, '29-052', 'ESTRADA'),
(376, 2, '29-053', 'ESTRELLA'),
(377, 2, '29-054', 'FABIAN'),
(378, 2, '29-055', 'FERNANDEZ'),
(379, 2, '29-056', 'FERNANDEZ'),
(380, 2, '29-057', 'FERNANDEZ'),
(381, 2, '29-058', 'FERNANDEZ'),
(382, 2, '29-059', 'FERRER'),
(383, 2, '29-060', 'FLORES'),
(384, 2, '29-061', 'FLORES'),
(385, 2, '29-062', 'FLORES'),
(386, 2, '29-063', 'GALANG'),
(387, 2, '29-064', 'GARCIA'),
(388, 2, '29-065', 'GARCIA'),
(389, 2, '29-066', 'GARCIA'),
(390, 2, '29-067', 'GARCIA'),
(391, 2, '29-068', 'GAVINO'),
(392, 2, '29-069', 'GOMEZ'),
(393, 2, '29-070', 'GOMEZ'),
(394, 2, '29-071', 'GONZAGA'),
(395, 2, '29-072', 'GONZALES'),
(396, 2, '29-073', 'GONZALEZ'),
(397, 2, '29-074', 'GONZALEZ'),
(398, 2, '29-075', 'GONZALEZ'),
(399, 2, '29-076', 'GONZALEZ'),
(400, 2, '29-077', 'GUZMAN'),
(401, 2, '29-078', 'HERNANDEZ'),
(402, 2, '29-079', 'HERNANDEZ'),
(403, 2, '29-080', 'HERNANDEZ'),
(404, 2, '29-081', 'HERRERA'),
(405, 2, '29-082', 'LEGASPI'),
(406, 2, '29-083', 'LEGASPI'),
(407, 2, '29-084', 'LIM'),
(408, 2, '29-085', 'LIM'),
(409, 2, '29-086', 'LIM'),
(410, 2, '29-087', 'LIM'),
(411, 2, '29-088', 'LOPEZ'),
(412, 2, '29-089', 'LOPEZ'),
(413, 2, '29-090', 'LORENZO'),
(414, 2, '29-091', 'LU'),
(415, 2, '29-092', 'LUNA'),
(416, 2, '29-093', 'MABINI'),
(417, 2, '29-094', 'MACASAET'),
(418, 2, '29-095', 'MALABANAN'),
(419, 2, '29-096', 'MALVAR'),
(420, 2, '29-097', 'MANALANG'),
(421, 2, '29-098', 'MANGUBAT'),
(422, 2, '29-099', 'MANUEL'),
(423, 2, '29-100', 'MARIANO'),
(424, 2, '29-101', 'MARQUEZ'),
(425, 2, '29-102', 'MARQUEZ'),
(426, 2, '29-103', 'MARTINEZ'),
(427, 2, '29-104', 'MENDOZA'),
(428, 2, '29-105', 'MENDOZA'),
(429, 2, '29-106', 'MENDOZA'),
(430, 2, '29-107', 'MERCADO'),
(431, 2, '29-108', 'MERCADO'),
(432, 2, '29-109', 'MERCADO'),
(433, 2, '29-110', 'MIRANDA'),
(434, 2, '29-111', 'MIRANDA'),
(435, 2, '29-112', 'MONTEVERDE'),
(436, 2, '29-113', 'MORALES'),
(437, 2, '29-114', 'NAVARRO'),
(438, 2, '29-115', 'NAVARRO'),
(439, 2, '29-116', 'NOCOM'),
(440, 2, '29-117', 'OCAMPO'),
(441, 2, '29-118', 'OCAMPO'),
(442, 2, '29-119', 'OLIVAR'),
(443, 2, '29-120', 'ORTEGA'),
(444, 2, '29-121', 'ORTEGA'),
(445, 2, '29-122', 'PADILLA'),
(446, 2, '29-123', 'PALMA'),
(447, 2, '29-124', 'PANGANIBAN'),
(448, 2, '29-125', 'PANGILINAN'),
(449, 2, '29-126', 'PASCUAL'),
(450, 2, '29-127', 'PASCUAL'),
(451, 2, '29-128', 'PERALTA'),
(452, 2, '29-129', 'PERALTA'),
(453, 2, '29-130', 'PEREZ'),
(454, 2, '29-131', 'PEREZ'),
(455, 2, '29-132', 'PEREZ'),
(456, 2, '29-133', 'PEREZ'),
(457, 2, '29-134', 'PIMENTEL'),
(458, 2, '29-135', 'QUIAMBAO'),
(459, 2, '29-136', 'QUIROZ'),
(460, 2, '29-137', 'RAMIREZ'),
(461, 2, '29-138', 'RAMOS'),
(462, 2, '29-139', 'RAMOS'),
(463, 2, '29-140', 'REMEDIOS'),
(464, 2, '29-141', 'REYES'),
(465, 2, '29-142', 'REYES'),
(466, 2, '29-143', 'REYES'),
(467, 2, '29-144', 'REYES'),
(468, 2, '29-145', 'RIVERA'),
(469, 2, '29-146', 'RIVERA'),
(470, 2, '29-147', 'RIVERA'),
(471, 2, '29-148', 'RIVERA'),
(472, 2, '29-149', 'ROCO'),
(473, 2, '29-150', 'RODRIGUEZ'),
(474, 2, '29-151', 'RODRIGUEZ'),
(475, 2, '29-152', 'RODRIGUEZ'),
(476, 2, '29-153', 'RODRIGUEZ'),
(477, 2, '29-154', 'ROXAS'),
(478, 2, '29-155', 'SALVADOR'),
(479, 2, '29-156', 'SAMPAGUITA'),
(480, 2, '29-157', 'SANTIAGO'),
(481, 2, '29-158', 'SANTIAGO'),
(482, 2, '29-159', 'SANTOS'),
(483, 2, '29-160', 'SANTOS'),
(484, 2, '29-161', 'SANTOS'),
(485, 2, '29-162', 'SANTOS'),
(486, 2, '29-163', 'SANTOS'),
(487, 2, '29-164', 'SANTOS'),
(488, 2, '29-165', 'SANTOS'),
(489, 2, '29-166', 'SILVA'),
(490, 2, '29-167', 'SISON'),
(491, 2, '29-168', 'SISON'),
(492, 2, '29-169', 'SISON'),
(493, 2, '29-170', 'SOLIS'),
(494, 2, '29-171', 'SORIANO'),
(495, 2, '29-172', 'SY'),
(496, 2, '29-173', 'TAN'),
(497, 2, '29-174', 'TAN'),
(498, 2, '29-175', 'TORRALBA'),
(499, 2, '29-176', 'TORRES'),
(500, 2, '29-177', 'TORRES'),
(501, 2, '29-178', 'TORRES'),
(502, 2, '29-179', 'TORRES'),
(503, 2, '29-180', 'TUASON'),
(504, 2, '29-181', 'URBANO'),
(505, 2, '29-182', 'VASQUEZ'),
(506, 2, '29-183', 'VASQUEZ'),
(507, 2, '29-184', 'VEGA'),
(508, 2, '29-185', 'VELASCO'),
(509, 2, '29-186', 'VELASCO'),
(510, 2, '29-187', 'VERGARA'),
(511, 2, '29-188', 'VILLANUEVA'),
(512, 2, '29-189', 'VILLANUEVA'),
(513, 2, '29-190', 'VILLANUEVA'),
(514, 2, '29-191', 'VILLANUEVA'),
(515, 2, '29-192', 'VILLAR'),
(516, 2, '29-193', 'VILLAR'),
(517, 2, '29-194', 'VILLARUEL'),
(518, 2, '29-195', 'YAP'),
(519, 2, '29-196', 'YU'),
(520, 2, '29-197', 'ZAMORA'),
(521, 2, '28-001', 'MARCOS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announce_id`),
  ADD KEY `status` (`_status`);

--
-- Indexes for table `batch_year`
--
ALTER TABLE `batch_year`
  ADD UNIQUE KEY `batch_no` (`batch_no`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `notif-user` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

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
  ADD KEY `scholar-status` (`status`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`scholar_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submit_id`),
  ADD KEY `submission-scholar` (`scholar_id`);

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
  MODIFY `announce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=522;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notif-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scholar`
--
ALTER TABLE `scholar`
  ADD CONSTRAINT `scholar-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission-scholar` FOREIGN KEY (`scholar_id`) REFERENCES `scholar` (`scholar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user-role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
