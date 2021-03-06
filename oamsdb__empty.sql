-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2015 at 10:22 AM
-- Server version: 5.6.22
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oamsdb__empty`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomtbl`
--

CREATE TABLE IF NOT EXISTS `accomtbl` (
  `accom_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `yearmonth` date NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `status` enum('Accepted','Returned','Withdrawn','Pending','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accom_awdtbl`
--

CREATE TABLE IF NOT EXISTS `accom_awdtbl` (
  `award_ID` int(11) NOT NULL,
  `award` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `source` varchar(255) NOT NULL DEFAULT 'University of the Philppines',
  `type` enum('Academe','National','International') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accom_ctvtbl`
--

CREATE TABLE IF NOT EXISTS `accom_ctvtbl` (
  `creative_ID` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accom_mattbl`
--

CREATE TABLE IF NOT EXISTS `accom_mattbl` (
  `material_ID` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `year` int(4) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accom_othtbl`
--

CREATE TABLE IF NOT EXISTS `accom_othtbl` (
  `other_ID` int(11) NOT NULL,
  `participation` varchar(50) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accom_partbl`
--

CREATE TABLE IF NOT EXISTS `accom_partbl` (
  `participation_ID` int(11) NOT NULL,
  `participation` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accom_pprtbl`
--

CREATE TABLE IF NOT EXISTS `accom_pprtbl` (
  `paper_ID` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `activity` enum('Conference','Forum','Seminar','Workshop') NOT NULL,
  `venue` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accom_pubtbl`
--

CREATE TABLE IF NOT EXISTS `accom_pubtbl` (
  `publication_ID` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `year` int(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` enum('Book','Chapter in a Book','Journal') NOT NULL,
  `journal_volume` varchar(10) DEFAULT NULL,
  `journal_issue` varchar(10) DEFAULT NULL,
  `book_publisher` varchar(255) DEFAULT NULL,
  `book_place` varchar(255) DEFAULT NULL,
  `page` varchar(10) NOT NULL,
  `isi` enum('Yes','No') DEFAULT NULL,
  `peer_reviewed` enum('Yes','No') DEFAULT NULL,
  `refereed` enum('Yes','No') DEFAULT NULL,
  `popular` enum('Yes','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accom_rchtbl`
--

CREATE TABLE IF NOT EXISTS `accom_rchtbl` (
  `research_ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `nature` enum('Basic','Applied','Policy') NOT NULL,
  `fund_external` varchar(255) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `fund_amount` varchar(20) DEFAULT NULL,
  `fund_up` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apptbl`
--

CREATE TABLE IF NOT EXISTS `apptbl` (
  `name` varchar(255) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apptbl`
--

INSERT INTO `apptbl` (`name`, `value`) VALUES
('about', NULL),
('initials', 'OAMS'),
('page_title', 'UP Mindanao OAMS'),
('title', 'Online Accomplishment Management System');

-- --------------------------------------------------------

--
-- Table structure for table `app_announcementtbl`
--

CREATE TABLE IF NOT EXISTS `app_announcementtbl` (
  `announcement_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `type` enum('univ','coll','dept') NOT NULL,
  `subject` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `content` text NOT NULL,
  `attachment` text,
  `edited` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_messagetbl`
--

CREATE TABLE IF NOT EXISTS `app_messagetbl` (
  `message_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `star` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `connect_accomtbl`
--

CREATE TABLE IF NOT EXISTS `connect_accomtbl` (
  `connect_ID` int(11) NOT NULL,
  `accom_ID` int(11) NOT NULL,
  `accom_specID` int(11) NOT NULL,
  `type` enum('pub','awd','rch','ppr','ctv','par','mat','oth') NOT NULL,
  `attachment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cumatbl`
--

CREATE TABLE IF NOT EXISTS `cumatbl` (
  `cuma_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `period_from` date NOT NULL,
  `period_to` date NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `status` enum('Submitted','Draft') NOT NULL DEFAULT 'Draft',
  `document` varchar(255) DEFAULT NULL,
  `current` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrtbl`
--

CREATE TABLE IF NOT EXISTS `ipcrtbl` (
  `ipcr_ID` int(11) NOT NULL,
  `opcr_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `status` enum('Accepted','Returned','Withdrawn','Pending','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `document` varchar(255) DEFAULT NULL,
  `version` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipcr_targettbl`
--

CREATE TABLE IF NOT EXISTS `ipcr_targettbl` (
  `target_ID` int(11) NOT NULL,
  `output_ID` int(11) NOT NULL,
  `ipcr_ID` int(11) NOT NULL,
  `target` varchar(255) NOT NULL DEFAULT 'Double click to edit.',
  `indicators` varchar(255) NOT NULL DEFAULT 'Double click to edit.',
  `actual_accom` varchar(255) DEFAULT NULL,
  `r_quantity` int(1) DEFAULT '0',
  `r_efficiency` int(1) DEFAULT '0',
  `r_timeliness` int(1) DEFAULT '0',
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `attachment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opcrtbl`
--

CREATE TABLE IF NOT EXISTS `opcrtbl` (
  `opcr_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `period_from` date NOT NULL,
  `period_to` date NOT NULL,
  `date_published` date DEFAULT NULL,
  `date_submitted` date DEFAULT NULL,
  `status` enum('Accepted','Returned','Withdrawn','Pending','Published','Draft') NOT NULL DEFAULT 'Draft',
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opcr_categorytbl`
--

CREATE TABLE IF NOT EXISTS `opcr_categorytbl` (
  `category_ID` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opcr_outputtbl`
--

CREATE TABLE IF NOT EXISTS `opcr_outputtbl` (
  `output_ID` int(11) NOT NULL,
  `category_ID` int(11) NOT NULL,
  `opcr_ID` int(11) NOT NULL,
  `output` text NOT NULL,
  `indicators` text NOT NULL,
  `accountable` varchar(255) DEFAULT NULL,
  `actual_accom` varchar(255) DEFAULT NULL,
  `r_quantity` int(1) DEFAULT '0',
  `r_efficiency` int(1) DEFAULT '0',
  `r_timeliness` int(1) DEFAULT '0',
  `remarks` varchar(255) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `univtbl`
--

CREATE TABLE IF NOT EXISTS `univtbl` (
  `name` varchar(255) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `univtbl`
--

INSERT INTO `univtbl` (`name`, `value`) VALUES
('mission', NULL),
('university', ''),
('vision', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `univ_collegetbl`
--

CREATE TABLE IF NOT EXISTS `univ_collegetbl` (
  `college_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `college` varchar(100) NOT NULL,
  `short` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `univ_departmenttbl`
--

CREATE TABLE IF NOT EXISTS `univ_departmenttbl` (
  `department_ID` int(11) NOT NULL,
  `college_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `department` varchar(100) NOT NULL,
  `short` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `univ_programtbl`
--

CREATE TABLE IF NOT EXISTS `univ_programtbl` (
  `program_ID` int(11) NOT NULL,
  `college_ID` int(11) NOT NULL,
  `department_ID` int(11) DEFAULT NULL,
  `program` varchar(100) NOT NULL,
  `program_short` varchar(50) NOT NULL,
  `short` varchar(10) NOT NULL,
  `date_instituted` date NOT NULL,
  `type` enum('Undergraduate','Graduate','Certificate','Diploma') NOT NULL,
  `vision` text NOT NULL,
  `goals` text NOT NULL,
  `accreditation` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_educationtbl`
--

CREATE TABLE IF NOT EXISTS `user_educationtbl` (
  `education_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `major` varchar(255) NOT NULL,
  `minor` varchar(255) DEFAULT NULL,
  `qualification` enum('certificate','bachelor','honours','master','postgraduate','graduate','doctorate') NOT NULL,
  `continuing` enum('Yes','No') NOT NULL,
  `date_obtained` date DEFAULT NULL,
  `institution` varchar(255) NOT NULL,
  `thesis` varchar(255) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `value` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_logintbl`
--

CREATE TABLE IF NOT EXISTS `user_logintbl` (
  `user_ID` int(11) NOT NULL,
  `employee_code` varchar(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logintbl`
--

INSERT INTO `user_logintbl` (`user_ID`, `employee_code`, `password`, `deleted`) VALUES
(1, '000012345', '$2y$10$ulKxuSpkoORgumOjtA4aae/GvGNziNdksnodjrMb7Ka8tEsoJZU2.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiletbl`
--

CREATE TABLE IF NOT EXISTS `user_profiletbl` (
  `user_ID` int(11) NOT NULL,
  `employee_code` varchar(9) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `suffix` varchar(50) DEFAULT NULL,
  `user_type` enum('Faculty','Admin') NOT NULL,
  `average_sate` float DEFAULT NULL,
  `students_mentored` int(11) DEFAULT NULL,
  `faculty_code` varchar(30) DEFAULT NULL,
  `program_ID` int(11) DEFAULT NULL,
  `rank` enum('Prof.','Assoc. Prof.','Asst. Prof.','Inst.') DEFAULT NULL,
  `position` enum('dean','chair','none') DEFAULT NULL,
  `birthday` date NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profiletbl`
--

INSERT INTO `user_profiletbl` (`user_ID`, `employee_code`, `title`, `first_name`, `middle_name`, `last_name`, `suffix`, `user_type`, `average_sate`, `students_mentored`, `faculty_code`, `program_ID`, `rank`, `position`, `birthday`, `pic`, `deleted`) VALUES
(1, '000012345', NULL, 'Jenny', 'M', 'Galino', NULL, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, '1994-07-08', NULL, 0),
(2, '000112345', NULL, 'Catherine', 'Kay', 'Gastone', NULL, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, '1963-12-14', NULL, 0),
(3, '000212345', NULL, 'John', 'E', 'Parsons', NULL, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, '1968-02-18', NULL, 0),
(4, '123400000', NULL, 'Kiyoko', 'B', 'Blantons', NULL, 'Faculty', NULL, NULL, 'KBBlanton', 2, 'Inst.', 'dean', '1982-01-06', NULL, 0),
(5, '123400001', 'Assoc. Prof.', 'Troy', 'E', 'Keller', NULL, 'Faculty', NULL, NULL, 'TEKeller', 6, 'Inst.', 'dean', '1962-02-24', NULL, 0),
(6, '123400002', NULL, 'Martha', 'K', 'Stutts', NULL, 'Faculty', NULL, NULL, 'MKStutts', 9, 'Inst.', 'dean', '1991-02-01', NULL, 0),
(7, '123400003', NULL, 'Evan', 'L', 'Woodrow', NULL, 'Faculty', NULL, NULL, 'ELWoodrow', 4, 'Inst.', 'none', '1964-02-18', NULL, 0),
(8, '123400004', NULL, 'Karen', 'T', 'Brickey', NULL, 'Faculty', NULL, NULL, 'KTBrickey', 2, 'Inst.', 'chair', '1967-08-10', NULL, 0),
(9, '123400005', NULL, 'Jacqueline', 'A', 'Morales', NULL, 'Faculty', NULL, NULL, 'JAMorales', 4, 'Inst.', 'chair', '1987-03-22', NULL, 0),
(10, '123400006', NULL, 'Sharon', 'D', 'Call', NULL, 'Faculty', NULL, NULL, 'SDCall', 5, 'Inst.', 'chair', '1970-12-07', NULL, 0),
(11, '123400007', NULL, 'Pedro', 'R', 'Morales', NULL, 'Faculty', NULL, NULL, 'PRMorales', 6, 'Inst.', 'none', '1971-01-01', NULL, 0),
(12, '123400008', '', 'Thomas', 'W', 'Seay', '', 'Faculty', 1.1, 200, 'TWSeay', 8, 'Prof.', 'chair', '1974-03-03', NULL, 0),
(13, '123400009', NULL, 'Albert', 'A', 'Russell', NULL, 'Faculty', NULL, NULL, 'AARussell', 1, 'Inst.', 'none', '1977-08-10', NULL, 0),
(14, '123400010', NULL, 'Dianne', 'A', 'Farias', NULL, 'Faculty', NULL, NULL, 'DAFarias', 1, 'Inst.', 'none', '1993-04-15', NULL, 0),
(15, '123400011', NULL, 'Daniel', 'C', 'Daly', NULL, 'Faculty', NULL, NULL, 'DCDaly', 1, 'Inst.', 'none', '1975-12-31', NULL, 0),
(16, '123400012', NULL, 'Kristin', 'B', 'Morford', NULL, 'Faculty', NULL, NULL, 'KBMorford', 2, 'Inst.', 'none', '1983-10-16', NULL, 0),
(17, '123400013', NULL, 'Gloria', 'V', 'Hubbard', NULL, 'Faculty', NULL, NULL, 'GVHubbard', 2, 'Inst.', 'none', '1991-03-04', NULL, 0),
(18, '123400014', NULL, 'Anthony', 'C', 'Whitehill', NULL, 'Faculty', NULL, NULL, 'ACWhitehill', 2, 'Inst.', 'none', '1967-02-11', NULL, 0),
(19, '123400015', NULL, 'Richard', 'A', 'Savage', NULL, 'Faculty', NULL, NULL, 'RASavage', 3, 'Inst.', 'none', '1994-07-26', NULL, 0),
(20, '123400016', NULL, 'Dominic', 'R', 'Martinez', NULL, 'Faculty', NULL, NULL, 'DRMartinez', 3, 'Inst.', 'none', '1982-01-31', NULL, 0),
(21, '123400017', NULL, 'Lillian', 'R', 'Laberge', NULL, 'Faculty', NULL, NULL, 'LRLaberge', 3, 'Inst.', 'none', '1968-07-03', NULL, 0),
(22, '123400018', NULL, 'Jack', 'A', 'Hansen', NULL, 'Faculty', NULL, NULL, 'JAHansen', 4, 'Inst.', 'none', '1984-01-29', NULL, 0),
(23, '123400019', NULL, 'Peggy', 'L', 'Benedetto', NULL, 'Faculty', NULL, NULL, 'PLBenedetto', 4, 'Inst.', 'none', '2014-07-22', NULL, 0),
(24, '123400020', NULL, 'Jeffrey', 'K', 'Barraza', NULL, 'Faculty', NULL, NULL, 'JKBarraza', 4, 'Inst.', 'none', '1992-10-29', NULL, 0),
(25, '123400021', NULL, 'Carole', 'C', 'Brown', NULL, 'Faculty', NULL, NULL, 'CCBrown', 5, 'Inst.', 'none', '1966-08-12', NULL, 0),
(26, '123400023', NULL, 'Ben', 'P', 'Banks', NULL, 'Faculty', NULL, NULL, 'BPBanks', 5, 'Inst.', 'none', '1959-01-09', NULL, 0),
(27, '123400024', NULL, 'Hilda', 'D', 'Jones', NULL, 'Faculty', NULL, NULL, 'HDJones', 6, 'Inst.', 'none', '1986-12-25', NULL, 0),
(31, '143860113', NULL, 'Armacheska', 'River', 'Mesa', NULL, 'Faculty', NULL, NULL, 'Armesa', 8, 'Inst.', 'none', '2014-09-09', NULL, 1),
(32, '123400026', NULL, 'Ryan', 'C', 'Clark', NULL, 'Faculty', NULL, NULL, 'RCClark', 6, 'Inst.', 'none', '1983-06-18', NULL, 0),
(33, '123400028', '', 'Gwyn', 'J', 'Johnson', '', 'Faculty', NULL, NULL, 'GJJohnson', 7, 'Assoc. Prof.', 'none', '1985-02-18', NULL, 0),
(34, '123400025', NULL, 'Ralph', 'J', 'Harris', NULL, 'Faculty', NULL, NULL, 'RJHarris', 6, 'Inst.', 'none', '1972-03-12', NULL, 0),
(35, '123400027', '', 'Phyllis', 'K', 'May', '', 'Faculty', NULL, NULL, 'PKMay', 7, 'Inst.', 'none', '1990-04-03', NULL, 0),
(36, '123400029', '', 'Susan', 'J', 'Anderson', '', 'Faculty', NULL, NULL, 'SJAnderson', 7, 'Assoc. Prof.', 'none', '1981-02-13', NULL, 0),
(37, '123400022', NULL, 'Allen', 'D', 'Katz', NULL, 'Faculty', NULL, NULL, 'ADKatz', 5, 'Inst.', 'none', '1975-02-02', NULL, 0),
(38, '123400030', '', 'Richard', 'T', 'Ferrell', '', 'Faculty', 0, NULL, 'RTFerrell', 8, 'Prof.', 'none', '1975-12-20', NULL, 0),
(39, '123400031', '', 'Allison', 'M', 'McLain', '', 'Faculty', NULL, NULL, 'AMMcLain', 8, 'Prof.', 'none', '1965-04-03', NULL, 0),
(40, '123400032', '', 'Johnny', 'B', 'Mitchell', '', 'Faculty', NULL, NULL, 'JBMitchell', 8, 'Prof.', 'none', '1960-04-03', NULL, 0),
(41, '123400034', NULL, 'Deborah', 'H', 'Jensen', NULL, 'Faculty', NULL, NULL, 'DHJensen', 9, 'Inst.', 'none', '1976-01-17', NULL, 0),
(42, '123400035', NULL, 'Kathleen', 'M', 'Thomas', NULL, 'Faculty', NULL, NULL, 'KMThomas', 9, 'Inst.', 'none', '1985-04-01', NULL, 0),
(43, '123400033', NULL, 'Hilda', 'K', 'Martinez', NULL, 'Faculty', NULL, NULL, 'HKMartinez', 9, 'Inst.', 'none', '1977-06-04', NULL, 0),
(44, '123400036', NULL, 'Joyce', 'D', 'Carter', NULL, 'Faculty', NULL, NULL, 'JDCarter', 10, 'Inst.', 'none', '1992-04-12', NULL, 0),
(45, '123400037', NULL, 'Joseph', 'L', 'Duke', NULL, 'Faculty', NULL, NULL, 'JLDuke', 10, 'Inst.', 'none', '1993-12-23', NULL, 0),
(46, '123400038', NULL, 'Lisa', 'A', 'Gray', NULL, 'Faculty', NULL, NULL, 'LAGray', 10, 'Inst.', 'none', '1985-06-21', NULL, 0),
(47, '000312345', NULL, 'Lori', 'K', 'Shoffner', NULL, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, '1982-02-24', NULL, 0),
(49, '000412345', NULL, 'George', 'Lee', 'Sanchez', NULL, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, '1972-10-16', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomtbl`
--
ALTER TABLE `accomtbl`
  ADD PRIMARY KEY (`accom_ID`), ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `accom_awdtbl`
--
ALTER TABLE `accom_awdtbl`
  ADD PRIMARY KEY (`award_ID`);

--
-- Indexes for table `accom_ctvtbl`
--
ALTER TABLE `accom_ctvtbl`
  ADD PRIMARY KEY (`creative_ID`);

--
-- Indexes for table `accom_mattbl`
--
ALTER TABLE `accom_mattbl`
  ADD PRIMARY KEY (`material_ID`);

--
-- Indexes for table `accom_othtbl`
--
ALTER TABLE `accom_othtbl`
  ADD PRIMARY KEY (`other_ID`);

--
-- Indexes for table `accom_partbl`
--
ALTER TABLE `accom_partbl`
  ADD PRIMARY KEY (`participation_ID`);

--
-- Indexes for table `accom_pprtbl`
--
ALTER TABLE `accom_pprtbl`
  ADD PRIMARY KEY (`paper_ID`);

--
-- Indexes for table `accom_pubtbl`
--
ALTER TABLE `accom_pubtbl`
  ADD PRIMARY KEY (`publication_ID`);

--
-- Indexes for table `accom_rchtbl`
--
ALTER TABLE `accom_rchtbl`
  ADD PRIMARY KEY (`research_ID`);

--
-- Indexes for table `apptbl`
--
ALTER TABLE `apptbl`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `app_announcementtbl`
--
ALTER TABLE `app_announcementtbl`
  ADD PRIMARY KEY (`announcement_ID`);

--
-- Indexes for table `app_messagetbl`
--
ALTER TABLE `app_messagetbl`
  ADD PRIMARY KEY (`message_ID`);

--
-- Indexes for table `connect_accomtbl`
--
ALTER TABLE `connect_accomtbl`
  ADD PRIMARY KEY (`connect_ID`), ADD KEY `accom_ID` (`accom_ID`,`accom_specID`), ADD KEY `accom_specID` (`accom_specID`);

--
-- Indexes for table `cumatbl`
--
ALTER TABLE `cumatbl`
  ADD PRIMARY KEY (`cuma_ID`), ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `ipcrtbl`
--
ALTER TABLE `ipcrtbl`
  ADD PRIMARY KEY (`ipcr_ID`), ADD KEY `user_ID` (`user_ID`), ADD KEY `opcr_ID` (`opcr_ID`);

--
-- Indexes for table `ipcr_targettbl`
--
ALTER TABLE `ipcr_targettbl`
  ADD PRIMARY KEY (`target_ID`), ADD KEY `ipcr_ID` (`ipcr_ID`), ADD KEY `output_ID` (`output_ID`);

--
-- Indexes for table `opcrtbl`
--
ALTER TABLE `opcrtbl`
  ADD PRIMARY KEY (`opcr_ID`), ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `opcr_categorytbl`
--
ALTER TABLE `opcr_categorytbl`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `opcr_outputtbl`
--
ALTER TABLE `opcr_outputtbl`
  ADD PRIMARY KEY (`output_ID`), ADD KEY `category_ID` (`category_ID`), ADD KEY `opcr_ID` (`opcr_ID`);

--
-- Indexes for table `univtbl`
--
ALTER TABLE `univtbl`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `univ_collegetbl`
--
ALTER TABLE `univ_collegetbl`
  ADD PRIMARY KEY (`college_ID`), ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `univ_departmenttbl`
--
ALTER TABLE `univ_departmenttbl`
  ADD PRIMARY KEY (`department_ID`), ADD KEY `user_ID` (`user_ID`), ADD KEY `college_ID` (`college_ID`);

--
-- Indexes for table `univ_programtbl`
--
ALTER TABLE `univ_programtbl`
  ADD PRIMARY KEY (`program_ID`), ADD KEY `department_ID` (`department_ID`), ADD KEY `college_ID` (`college_ID`);

--
-- Indexes for table `user_educationtbl`
--
ALTER TABLE `user_educationtbl`
  ADD PRIMARY KEY (`education_ID`), ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `user_logintbl`
--
ALTER TABLE `user_logintbl`
  ADD PRIMARY KEY (`user_ID`), ADD KEY `user_ID` (`user_ID`), ADD KEY `employee_code` (`employee_code`);

--
-- Indexes for table `user_profiletbl`
--
ALTER TABLE `user_profiletbl`
  ADD PRIMARY KEY (`user_ID`), ADD KEY `program` (`program_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomtbl`
--
ALTER TABLE `accomtbl`
  MODIFY `accom_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accom_awdtbl`
--
ALTER TABLE `accom_awdtbl`
  MODIFY `award_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accom_ctvtbl`
--
ALTER TABLE `accom_ctvtbl`
  MODIFY `creative_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accom_mattbl`
--
ALTER TABLE `accom_mattbl`
  MODIFY `material_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accom_othtbl`
--
ALTER TABLE `accom_othtbl`
  MODIFY `other_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accom_partbl`
--
ALTER TABLE `accom_partbl`
  MODIFY `participation_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accom_pprtbl`
--
ALTER TABLE `accom_pprtbl`
  MODIFY `paper_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accom_pubtbl`
--
ALTER TABLE `accom_pubtbl`
  MODIFY `publication_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accom_rchtbl`
--
ALTER TABLE `accom_rchtbl`
  MODIFY `research_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_announcementtbl`
--
ALTER TABLE `app_announcementtbl`
  MODIFY `announcement_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_messagetbl`
--
ALTER TABLE `app_messagetbl`
  MODIFY `message_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `connect_accomtbl`
--
ALTER TABLE `connect_accomtbl`
  MODIFY `connect_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cumatbl`
--
ALTER TABLE `cumatbl`
  MODIFY `cuma_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrtbl`
--
ALTER TABLE `ipcrtbl`
  MODIFY `ipcr_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcr_targettbl`
--
ALTER TABLE `ipcr_targettbl`
  MODIFY `target_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opcrtbl`
--
ALTER TABLE `opcrtbl`
  MODIFY `opcr_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opcr_categorytbl`
--
ALTER TABLE `opcr_categorytbl`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opcr_outputtbl`
--
ALTER TABLE `opcr_outputtbl`
  MODIFY `output_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `univ_collegetbl`
--
ALTER TABLE `univ_collegetbl`
  MODIFY `college_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `univ_departmenttbl`
--
ALTER TABLE `univ_departmenttbl`
  MODIFY `department_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `univ_programtbl`
--
ALTER TABLE `univ_programtbl`
  MODIFY `program_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_educationtbl`
--
ALTER TABLE `user_educationtbl`
  MODIFY `education_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_profiletbl`
--
ALTER TABLE `user_profiletbl`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
