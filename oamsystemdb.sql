-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2014 at 07:14 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oamsystemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomtbl`
--

CREATE TABLE IF NOT EXISTS `accomtbl` (
  `accom_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('Approved','Pending','Rejected','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`accom_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accom_awdtbl`
--

CREATE TABLE IF NOT EXISTS `accom_awdtbl` (
  `award_ID` int(11) NOT NULL AUTO_INCREMENT,
  `award` varchar(50) NOT NULL,
  `duration_from` date NOT NULL,
  `duration_to` date NOT NULL,
  `source` varchar(50) NOT NULL DEFAULT 'University of the Philppines',
  `type` enum('Academe','National','International') NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`award_ID`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accom_ctvtbl`
--

CREATE TABLE IF NOT EXISTS `accom_ctvtbl` (
  `creative_ID` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`creative_ID`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accom_mattbl`
--

CREATE TABLE IF NOT EXISTS `accom_mattbl` (
  `material_ID` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`material_ID`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accom_othtbl`
--

CREATE TABLE IF NOT EXISTS `accom_othtbl` (
  `other_ID` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(50) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`other_ID`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accom_partbl`
--

CREATE TABLE IF NOT EXISTS `accom_partbl` (
  `participation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `participation` enum('Coordinator','Facilitator','Moderator','Participant','Trainer','Other') NOT NULL,
  `title` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`participation_ID`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accom_pprtbl`
--

CREATE TABLE IF NOT EXISTS `accom_pprtbl` (
  `paper_ID` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `activity` enum('Conference','Forum','Seminar','Workshop') NOT NULL,
  `venue` varchar(50) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`paper_ID`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accom_pubtbl`
--

CREATE TABLE IF NOT EXISTS `accom_pubtbl` (
  `publication_ID` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) DEFAULT NULL,
  `year` int(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` enum('book','chapter','journal') NOT NULL,
  `book_publisher` varchar(50) DEFAULT NULL,
  `book_place` varchar(50) DEFAULT NULL,
  `journal_volume` int(10) DEFAULT NULL,
  `journal_issue` int(11) DEFAULT NULL,
  `page` varchar(10) NOT NULL,
  `isi` int(1) NOT NULL DEFAULT '0',
  `peer_reviewed` int(1) NOT NULL DEFAULT '0',
  `refereed` int(1) NOT NULL DEFAULT '0',
  `popular` int(1) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL,
  PRIMARY KEY (`publication_ID`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accom_rchtbl`
--

CREATE TABLE IF NOT EXISTS `accom_rchtbl` (
  `research_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `nature` enum('Basic','Applied','Policy','Other') NOT NULL,
  `fund_up` int(10) NOT NULL DEFAULT '0',
  `fund_external` varchar(50) NOT NULL DEFAULT 'External',
  `fund_amount` int(10) NOT NULL DEFAULT '0',
  `duration_from` date NOT NULL,
  `duration_to` date NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`research_ID`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `connect_accom-reporttbl`
--

CREATE TABLE IF NOT EXISTS `connect_accom-reporttbl` (
  `connect_ID` int(11) NOT NULL AUTO_INCREMENT,
  `accom_ID` int(11) NOT NULL,
  `accom_specID` int(11) NOT NULL,
  `type` enum('pub','awd','rch','ppr','ctv','par','mat','oth') NOT NULL,
  PRIMARY KEY (`connect_ID`),
  KEY `accom_ID` (`accom_ID`,`accom_specID`),
  KEY `accom_specID` (`accom_specID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cumatbl`
--

CREATE TABLE IF NOT EXISTS `cumatbl` (
  `cuma_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `period_from` date NOT NULL,
  `period_to` date NOT NULL,
  `date_assessed` date DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cuma_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrtbl`
--

CREATE TABLE IF NOT EXISTS `ipcrtbl` (
  `ipcr_ID` int(11) NOT NULL AUTO_INCREMENT,
  `opcr_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `evaluator_ID` int(11) DEFAULT NULL,
  `date_submitted` date DEFAULT NULL,
  `date_evaluated` date DEFAULT NULL,
  `status` enum('Approved','Pending','Rejected','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `comment` text,
  `document` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ipcr_ID`),
  KEY `user_ID` (`user_ID`),
  KEY `evaluator_ID` (`evaluator_ID`),
  KEY `opcr_ID` (`opcr_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ipcr_targettbl`
--

CREATE TABLE IF NOT EXISTS `ipcr_targettbl` (
  `itarget_ID` int(11) NOT NULL AUTO_INCREMENT,
  `otarget_ID` int(11) NOT NULL,
  `ipcr_ID` int(11) NOT NULL,
  `indicator` text NOT NULL,
  `accom` varchar(255) DEFAULT NULL,
  `r_quantity` enum('Outstanding','Very Satisfactory','Satisfactory','Unsatisfactory','Poor') DEFAULT NULL,
  `r_efficiency` enum('Outstanding','Very Satisfactory','Satisfactory','Unsatisfactory','Poor') DEFAULT NULL,
  `r_timeliness` enum('Outstanding','Very Satisfactory','Satisfactory','Unsatisfactory','Poor') DEFAULT NULL,
  `r_average` enum('Outstanding','Very Satisfactory','Satisfactory','Unsatisfactory','Poor') DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`itarget_ID`),
  KEY `ipcr_ID` (`ipcr_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oamstbl`
--

CREATE TABLE IF NOT EXISTS `oamstbl` (
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oamstbl`
--

INSERT INTO `oamstbl` (`name`, `content`) VALUES
('about', 'OAMS is an online document management system that will facilitate automated report generation, submission and evaluation.\r\n	As of the moment, OAMS can generate Accomplishment Reports, Individual Performance Commitment and Review (IPCR),\r\n	Office Performance Commitment and Review (OPCR) and Constituent Unit (CU) Management Assessment Forms.'),
('title', 'Online Accomplishment Management System');

-- --------------------------------------------------------

--
-- Table structure for table `opcrtbl`
--

CREATE TABLE IF NOT EXISTS `opcrtbl` (
  `opcr_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `evaluator_ID` int(11) DEFAULT NULL,
  `period_from` date NOT NULL,
  `period_to` date NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `date_evaluated` date DEFAULT NULL,
  `r_overall` int(11) DEFAULT NULL,
  `r_average` float DEFAULT NULL,
  `r_adjectival` varchar(20) DEFAULT NULL,
  `status` enum('Approved','Pending','Rejected','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `comment` text,
  `document` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`opcr_ID`),
  KEY `user_ID` (`user_ID`,`evaluator_ID`),
  KEY `evaluator_ID` (`evaluator_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opcr_targettbl`
--

CREATE TABLE IF NOT EXISTS `opcr_targettbl` (
  `otarget_ID` int(11) NOT NULL AUTO_INCREMENT,
  `category_ID` int(11) NOT NULL,
  `opcr_ID` int(11) NOT NULL,
  `output` text NOT NULL,
  `accountable` varchar(255) DEFAULT NULL,
  `r_quantity` enum('Outstanding','Very Satisfactory','Satisfactory','Unsatisfactory','Poor') DEFAULT NULL,
  `r_efficiency` enum('Outstanding','Very Satisfactory','Satisfactory','Unsatisfactory','Poor') DEFAULT NULL,
  `r_timeliness` enum('Outstanding','Very Satisfactory','Satisfactory','Unsatisfactory','Poor') DEFAULT NULL,
  `r_average` enum('Outstanding','Very Satisfactory','Satisfactory','Unsatisfactory','Poor') DEFAULT NULL,
  `remarks` text,
  `_indicator` text,
  PRIMARY KEY (`otarget_ID`),
  KEY `category_ID` (`category_ID`),
  KEY `opcr_ID` (`opcr_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sessiontbl`
--

CREATE TABLE IF NOT EXISTS `sessiontbl` (
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `univtbl`
--

CREATE TABLE IF NOT EXISTS `univtbl` (
  `mission` text NOT NULL,
  `vision` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `univ_categorytbl`
--

CREATE TABLE IF NOT EXISTS `univ_categorytbl` (
  `category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`category_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `univ_categorytbl`
--

INSERT INTO `univ_categorytbl` (`category_ID`, `category`) VALUES
(1, 'Strategic Priority'),
(2, 'Core Functions'),
(3, 'Support Functions');

-- --------------------------------------------------------

--
-- Table structure for table `univ_collegetbl`
--

CREATE TABLE IF NOT EXISTS `univ_collegetbl` (
  `college_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) DEFAULT NULL,
  `college` varchar(100) NOT NULL,
  `short` varchar(10) NOT NULL,
  PRIMARY KEY (`college_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `univ_collegetbl`
--

INSERT INTO `univ_collegetbl` (`college_ID`, `user_ID`, `college`, `short`) VALUES
(1, NULL, ' College of Humanities and Social Sciences', 'CHSS'),
(2, NULL, 'College of Science and Mathematics', 'CSM'),
(3, NULL, 'School of Management', 'SOM');

-- --------------------------------------------------------

--
-- Table structure for table `univ_departmenttbl`
--

CREATE TABLE IF NOT EXISTS `univ_departmenttbl` (
  `department_ID` int(11) NOT NULL AUTO_INCREMENT,
  `college_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `department` varchar(100) NOT NULL,
  `short` varchar(10) NOT NULL,
  PRIMARY KEY (`department_ID`),
  KEY `user_ID` (`user_ID`),
  KEY `college_ID` (`college_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `univ_departmenttbl`
--

INSERT INTO `univ_departmenttbl` (`department_ID`, `college_ID`, `user_ID`, `department`, `short`) VALUES
(1, 1, NULL, 'Department of Architecture', 'DA'),
(2, 1, NULL, 'Department of Humanities', 'DH'),
(3, 1, NULL, 'Department of Human Kinetics', 'DHK'),
(4, 1, NULL, 'Department of Social Sciences', 'DSS'),
(5, 2, NULL, 'Department of Biological Sciences and Environmental Studies', 'DBSES'),
(6, 2, NULL, 'Department of Food Science and Chemistry', 'DFSC'),
(7, 2, NULL, 'Department of Mathematics, Physics and Computer Science', 'DMPCS');

-- --------------------------------------------------------

--
-- Table structure for table `univ_messagetbl`
--

CREATE TABLE IF NOT EXISTS `univ_messagetbl` (
  `message_ID` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `univ_programtbl`
--

CREATE TABLE IF NOT EXISTS `univ_programtbl` (
  `program_ID` int(11) NOT NULL AUTO_INCREMENT,
  `college_ID` int(11) NOT NULL,
  `department_ID` int(11) DEFAULT NULL,
  `program` varchar(100) NOT NULL,
  `program_short` varchar(50) NOT NULL,
  `short` varchar(10) NOT NULL,
  `date_instituted` date NOT NULL,
  `type` enum('Undergraduate','Graduate','Certificate','Diploma') NOT NULL,
  `vision` text NOT NULL,
  `goals` text NOT NULL,
  PRIMARY KEY (`program_ID`),
  KEY `department_ID` (`department_ID`),
  KEY `college_ID` (`college_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `univ_programtbl`
--

INSERT INTO `univ_programtbl` (`program_ID`, `college_ID`, `department_ID`, `program`, `program_short`, `short`, `date_instituted`, `type`, `vision`, `goals`) VALUES
(1, 1, 1, 'Bachelor of Science in Architecture', 'BS Architecture', 'BSA', '0000-00-00', 'Undergraduate', '', ''),
(2, 1, 2, 'Bachelor of Arts in Communication Arts', 'BA Communication Arts', 'BACA', '0000-00-00', 'Undergraduate', '', ''),
(3, 1, 2, 'Bachelor of Arts in English', 'BA English', 'BAE', '0000-00-00', 'Undergraduate', '', ''),
(4, 1, 4, 'Bachelor of Arts in Anthropology', 'BA Anthropology', 'BAA', '0000-00-00', 'Undergraduate', '', ''),
(5, 2, 5, 'Bachelor of Science in Biology', 'BS Biology', 'BSB', '0000-00-00', 'Undergraduate', '', ''),
(6, 2, 6, 'Bachelor of Science in Food Technology', 'BS Food Technology', 'BSFT', '0000-00-00', 'Undergraduate', 'An active partner of different stakeholders in the food industry not only as a source of technologically and scientifically equipped human resource but also as a source of new developments thru our R and D efforts.', 'An active partner of different stakeholders in the food industry not only as a source of technologically and scientifically equipped human resource but also as a source of new developments thru our R and D efforts.'),
(7, 2, 7, 'Bachelor of Science in Applied Mathematics', 'BS Applied Mathematics', 'BSAM', '0000-00-00', 'Undergraduate', '', ''),
(8, 2, 7, 'Bachelor of Science in Computer Science', 'BS Computer Science', 'BSCS', '0000-00-00', 'Undergraduate', '', ''),
(9, 3, NULL, 'Bachelor of Science in Agribusiness Economics', 'BS Agribusiness Economics', 'BSABE', '0000-00-00', 'Undergraduate', '', ''),
(10, 3, NULL, 'Master in Management', 'Master in Management', 'MM', '0000-00-00', 'Graduate', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `univ_review-facultytbl`
--

CREATE TABLE IF NOT EXISTS `univ_review-facultytbl` (
  `review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `cuma_ID` int(11) NOT NULL,
  `no_mentored` int(11) NOT NULL,
  PRIMARY KEY (`review_ID`),
  KEY `cuma_ID` (`cuma_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `univ_review-programtbl`
--

CREATE TABLE IF NOT EXISTS `univ_review-programtbl` (
  `review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `program_ID` int(11) NOT NULL,
  `date_reviewed` date NOT NULL,
  `passing_rate` int(11) DEFAULT NULL,
  `revisions` text NOT NULL,
  `desription_instituions` text NOT NULL,
  PRIMARY KEY (`review_ID`),
  KEY `program_ID` (`program_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `univ_review-studentstbl`
--

CREATE TABLE IF NOT EXISTS `univ_review-studentstbl` (
  `review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `cuma_ID` int(11) NOT NULL,
  `program_ID` int(11) NOT NULL,
  `no_freshmen` int(11) NOT NULL,
  `graduate_honors` int(11) DEFAULT NULL,
  `percent_honors` int(11) DEFAULT NULL,
  `no_leaders` int(11) DEFAULT NULL,
  `no_thesis_isi` int(11) DEFAULT NULL,
  `no_thesis_refereed` int(11) DEFAULT NULL,
  `no_postgrad_ph` int(11) NOT NULL,
  `no_postgrad_foreign` int(11) NOT NULL,
  `employed_academe` int(11) NOT NULL,
  `employed_industry` int(11) NOT NULL,
  `employed_research` int(11) NOT NULL,
  `employed_kpo` int(11) NOT NULL,
  `employed_cc` int(11) NOT NULL,
  PRIMARY KEY (`review_ID`),
  KEY `program_ID` (`program_ID`),
  KEY `cuma_ID` (`cuma_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_educbgtbl`
--

CREATE TABLE IF NOT EXISTS `user_educbgtbl` (
  `educ_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `education` varchar(50) NOT NULL,
  `date_obtained` date NOT NULL,
  `where_obtained` varchar(50) NOT NULL,
  `continuing` int(1) NOT NULL DEFAULT '0',
  `average_set` int(11) NOT NULL,
  PRIMARY KEY (`educ_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_logintbl`
--

CREATE TABLE IF NOT EXISTS `user_logintbl` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_logintbl`
--

INSERT INTO `user_logintbl` (`user_ID`, `employee_code`, `password`, `deleted`) VALUES
(1, '000012345', 'upmin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiletbl`
--

CREATE TABLE IF NOT EXISTS `user_profiletbl` (
  `user_ID` int(11) NOT NULL,
  `employee_code` varchar(9) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_initial` varchar(1) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_type` enum('faculty','admin') NOT NULL,
  `faculty_code` varchar(30) DEFAULT NULL,
  `program_ID` int(11) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `position` enum('dean','dept_chair','none') DEFAULT NULL,
  `birthday` date NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT 'assets/files/pic/default.jpg',
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_ID`),
  KEY `program` (`program_ID`),
  KEY `employee_code` (`employee_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profiletbl`
--

INSERT INTO `user_profiletbl` (`user_ID`, `employee_code`, `first_name`, `middle_initial`, `last_name`, `user_type`, `faculty_code`, `program_ID`, `rank`, `position`, `birthday`, `pic`, `deleted`) VALUES
(1, '000012345', 'Jenny', 'M', 'Galino', 'admin', NULL, NULL, NULL, NULL, '1994-07-08', 'assets/files/pic/default.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_pubtbl`
--

CREATE TABLE IF NOT EXISTS `user_pubtbl` (
  `publication_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `year` int(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` enum('book','chapter','journal') NOT NULL,
  `book_publisher` varchar(50) DEFAULT NULL,
  `book_place` varchar(50) DEFAULT NULL,
  `journal_volume` int(10) DEFAULT NULL,
  `journal_issue` int(11) DEFAULT NULL,
  `page` varchar(10) NOT NULL,
  `isi` int(1) NOT NULL DEFAULT '0',
  `peer_reviewed` int(1) NOT NULL DEFAULT '0',
  `refereed` int(1) NOT NULL DEFAULT '0',
  `popular` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`publication_ID`),
  KEY `user` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_rchtbl`
--

CREATE TABLE IF NOT EXISTS `user_rchtbl` (
  `research_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `nature` enum('Basic','Applied','Policy','Other') NOT NULL,
  `fund_up` int(10) NOT NULL DEFAULT '0',
  `fund_external` varchar(50) NOT NULL DEFAULT 'External',
  `fund_amount` int(10) NOT NULL DEFAULT '0',
  `duration_from` date NOT NULL,
  `duration_to` date NOT NULL,
  PRIMARY KEY (`research_ID`),
  KEY `user` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomtbl`
--
ALTER TABLE `accomtbl`
  ADD CONSTRAINT `accomtbl_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `accom_awdtbl`
--
ALTER TABLE `accom_awdtbl`
  ADD CONSTRAINT `accom_awdtbl_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `accom_ctvtbl`
--
ALTER TABLE `accom_ctvtbl`
  ADD CONSTRAINT `accom_ctvtbl_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `accom_mattbl`
--
ALTER TABLE `accom_mattbl`
  ADD CONSTRAINT `accom_mattbl_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `accom_othtbl`
--
ALTER TABLE `accom_othtbl`
  ADD CONSTRAINT `accom_othtbl_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `accom_partbl`
--
ALTER TABLE `accom_partbl`
  ADD CONSTRAINT `accom_partbl_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `accom_pprtbl`
--
ALTER TABLE `accom_pprtbl`
  ADD CONSTRAINT `accom_pprtbl_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `accom_pubtbl`
--
ALTER TABLE `accom_pubtbl`
  ADD CONSTRAINT `accom_pubtbl_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `accom_rchtbl`
--
ALTER TABLE `accom_rchtbl`
  ADD CONSTRAINT `accom_rchtbl_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `connect_accom-reporttbl`
--
ALTER TABLE `connect_accom-reporttbl`
  ADD CONSTRAINT `connect_accom-reporttbl_ibfk_1` FOREIGN KEY (`accom_ID`) REFERENCES `accomtbl` (`accom_ID`);

--
-- Constraints for table `cumatbl`
--
ALTER TABLE `cumatbl`
  ADD CONSTRAINT `cumatbl_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `ipcrtbl`
--
ALTER TABLE `ipcrtbl`
  ADD CONSTRAINT `ipcrtbl_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`),
  ADD CONSTRAINT `ipcrtbl_ibfk_2` FOREIGN KEY (`evaluator_ID`) REFERENCES `user_profiletbl` (`user_ID`),
  ADD CONSTRAINT `ipcrtbl_ibfk_3` FOREIGN KEY (`opcr_ID`) REFERENCES `opcrtbl` (`opcr_ID`);

--
-- Constraints for table `ipcr_targettbl`
--
ALTER TABLE `ipcr_targettbl`
  ADD CONSTRAINT `ipcr_targettbl_ibfk_2` FOREIGN KEY (`ipcr_ID`) REFERENCES `ipcrtbl` (`ipcr_ID`);

--
-- Constraints for table `opcrtbl`
--
ALTER TABLE `opcrtbl`
  ADD CONSTRAINT `opcrtbl_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`),
  ADD CONSTRAINT `opcrtbl_ibfk_2` FOREIGN KEY (`evaluator_ID`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `opcr_targettbl`
--
ALTER TABLE `opcr_targettbl`
  ADD CONSTRAINT `opcr_targettbl_ibfk_1` FOREIGN KEY (`opcr_ID`) REFERENCES `opcrtbl` (`opcr_ID`),
  ADD CONSTRAINT `opcr_targettbl_ibfk_2` FOREIGN KEY (`category_ID`) REFERENCES `univ_categorytbl` (`category_ID`);

--
-- Constraints for table `univ_collegetbl`
--
ALTER TABLE `univ_collegetbl`
  ADD CONSTRAINT `univ_collegetbl_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `univ_departmenttbl`
--
ALTER TABLE `univ_departmenttbl`
  ADD CONSTRAINT `univ_departmenttbl_ibfk_1` FOREIGN KEY (`college_ID`) REFERENCES `univ_collegetbl` (`college_ID`),
  ADD CONSTRAINT `univ_departmenttbl_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `univ_programtbl`
--
ALTER TABLE `univ_programtbl`
  ADD CONSTRAINT `univ_programtbl_ibfk_1` FOREIGN KEY (`college_ID`) REFERENCES `univ_collegetbl` (`college_ID`);

--
-- Constraints for table `univ_review-facultytbl`
--
ALTER TABLE `univ_review-facultytbl`
  ADD CONSTRAINT `univ_review-facultytbl_ibfk_2` FOREIGN KEY (`cuma_ID`) REFERENCES `cumatbl` (`cuma_ID`),
  ADD CONSTRAINT `univ_review-facultytbl_ibfk_3` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `univ_review-programtbl`
--
ALTER TABLE `univ_review-programtbl`
  ADD CONSTRAINT `univ_review-programtbl_ibfk_2` FOREIGN KEY (`program_ID`) REFERENCES `univ_programtbl` (`program_ID`);

--
-- Constraints for table `univ_review-studentstbl`
--
ALTER TABLE `univ_review-studentstbl`
  ADD CONSTRAINT `univ_review-studentstbl_ibfk_1` FOREIGN KEY (`cuma_ID`) REFERENCES `cumatbl` (`cuma_ID`);

--
-- Constraints for table `user_educbgtbl`
--
ALTER TABLE `user_educbgtbl`
  ADD CONSTRAINT `user_educbgtbl_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `user_logintbl`
--
ALTER TABLE `user_logintbl`
  ADD CONSTRAINT `user_logintbl_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `user_profiletbl`
--
ALTER TABLE `user_profiletbl`
  ADD CONSTRAINT `user_profiletbl_ibfk_2` FOREIGN KEY (`program_ID`) REFERENCES `univ_programtbl` (`program_ID`);

--
-- Constraints for table `user_pubtbl`
--
ALTER TABLE `user_pubtbl`
  ADD CONSTRAINT `user_pubtbl_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`);

--
-- Constraints for table `user_rchtbl`
--
ALTER TABLE `user_rchtbl`
  ADD CONSTRAINT `user_rchtbl_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_profiletbl` (`user_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
