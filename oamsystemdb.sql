-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2014 at 08:55 PM
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
`accom_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `yearmonth` date NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `status` enum('Approved','Pending','Rejected','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `accomtbl`
--

INSERT INTO `accomtbl` (`accom_ID`, `user_ID`, `yearmonth`, `date_submitted`, `status`, `remarks`, `document`) VALUES
(2, 7, '2014-07-29', '2014-08-05', 'Pending', 'None', NULL),
(3, 17, '2014-03-03', '2014-08-13', 'Approved', 'Ok - Karen T. Brickey (13 Aug 2014)', 'files/document_accom/1234000130314.pdf'),
(5, 17, '2014-05-01', NULL, 'Draft', 'None', NULL),
(7, 17, '2014-04-01', '2014-08-06', 'Approved', 'Checked by Karen T. Brickey (14 Aug 2014)<br>Checked by Karen T. Brickey (12 Aug 2014)<br>Checked by Kiyoko B. Blanton (07 Aug 2014)', 'files/document_accom/1234000130414.pdf'),
(8, 5, '2014-02-01', NULL, 'Draft', 'None', NULL),
(10, 4, '2014-04-01', NULL, 'Draft', 'None', NULL),
(11, 17, '2014-08-01', NULL, 'Draft', 'None', NULL),
(15, 4, '2014-08-01', NULL, 'Draft', 'None', NULL),
(16, 8, '2014-01-01', '2014-08-12', 'Pending', 'None', 'files/document_accom/1234000040114.pdf'),
(17, 8, '2014-03-01', '2014-08-12', 'Pending', 'None', 'files/document_accom/1234000040314.pdf'),
(18, 7, '2014-08-01', NULL, 'Draft', 'None', NULL),
(19, 24, '2014-01-01', NULL, 'Draft', 'None', NULL),
(20, 8, '2014-02-01', '2014-08-14', 'Pending', 'None', 'files/document_accom/1234000040214.pdf'),
(21, 8, '2014-04-01', NULL, 'Draft', 'None', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accom_awdtbl`
--

CREATE TABLE IF NOT EXISTS `accom_awdtbl` (
`award_ID` int(11) NOT NULL,
  `award` varchar(50) NOT NULL,
  `type` enum('Academe','National','International') NOT NULL,
  `source` varchar(50) NOT NULL DEFAULT 'University of the Philppines',
  `start` date NOT NULL,
  `end` date NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accom_awdtbl`
--

INSERT INTO `accom_awdtbl` (`award_ID`, `award`, `type`, `source`, `start`, `end`, `user_ID`) VALUES
(3, 'asd', 'Academe', 'asd', '2014-08-05', '2014-08-05', 17);

-- --------------------------------------------------------

--
-- Table structure for table `accom_ctvtbl`
--

CREATE TABLE IF NOT EXISTS `accom_ctvtbl` (
`creative_ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accom_ctvtbl`
--

INSERT INTO `accom_ctvtbl` (`creative_ID`, `title`, `venue`, `start`, `end`, `user_ID`) VALUES
(2, 'asd', 'asd', '2014-08-05', '2014-08-05', 17),
(3, 'Work', 'Venu', '2014-08-07', '2014-08-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accom_mattbl`
--

CREATE TABLE IF NOT EXISTS `accom_mattbl` (
`material_ID` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `accom_mattbl`
--

INSERT INTO `accom_mattbl` (`material_ID`, `year`, `title`, `user_ID`) VALUES
(4, 1234, 'asd', 17),
(5, 1234, 'a', 4),
(6, 1234, 'asdd', 0),
(8, 1234, 'p', 0),
(9, 2122, 'Title', 0),
(10, 2012, 'title', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accom_othtbl`
--

CREATE TABLE IF NOT EXISTS `accom_othtbl` (
`other_ID` int(11) NOT NULL,
  `participation` varchar(50) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `accom_othtbl`
--

INSERT INTO `accom_othtbl` (`other_ID`, `participation`, `activity`, `venue`, `start`, `end`, `user_ID`) VALUES
(3, 'sf', 'q', 'as', '2014-08-05', '2014-08-05', 17),
(4, 'Participant', 'Activity', 'Venue', '2014-08-08', '2014-08-09', 0),
(5, 'Participant', 'Activity', 'Venue', '2014-08-07', '2014-08-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accom_partbl`
--

CREATE TABLE IF NOT EXISTS `accom_partbl` (
`participation_ID` int(11) NOT NULL,
  `participation` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accom_partbl`
--

INSERT INTO `accom_partbl` (`participation_ID`, `participation`, `title`, `venue`, `start`, `end`, `user_ID`) VALUES
(3, 'adas', 'asd', 'asd', '2014-08-05', '2014-08-05', 17);

-- --------------------------------------------------------

--
-- Table structure for table `accom_pprtbl`
--

CREATE TABLE IF NOT EXISTS `accom_pprtbl` (
`paper_ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `activity` enum('Conference','Forum','Seminar','Workshop') NOT NULL,
  `venue` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accom_pprtbl`
--

INSERT INTO `accom_pprtbl` (`paper_ID`, `title`, `activity`, `venue`, `start`, `end`, `user_ID`) VALUES
(2, 'add', 'Conference', 'as', '2014-08-05', '2014-08-05', 17);

-- --------------------------------------------------------

--
-- Table structure for table `accom_pubtbl`
--

CREATE TABLE IF NOT EXISTS `accom_pubtbl` (
`publication_ID` int(11) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `type` enum('Book','Chapter in a Book','Journal') NOT NULL,
  `book_publisher` varchar(50) DEFAULT NULL,
  `book_place` varchar(50) DEFAULT NULL,
  `journal_volume` int(10) DEFAULT NULL,
  `journal_issue` int(11) DEFAULT NULL,
  `page` varchar(10) NOT NULL,
  `isi` int(1) NOT NULL DEFAULT '0',
  `peer_reviewed` int(1) NOT NULL DEFAULT '0',
  `refereed` int(1) NOT NULL DEFAULT '0',
  `popular` int(1) NOT NULL DEFAULT '0',
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `accom_pubtbl`
--

INSERT INTO `accom_pubtbl` (`publication_ID`, `author`, `title`, `year`, `type`, `book_publisher`, `book_place`, `journal_volume`, `journal_issue`, `page`, `isi`, `peer_reviewed`, `refereed`, `popular`, `user_ID`) VALUES
(1, '', 'a', 1234, 'Book', 'b', 'c', 0, 0, '1', 0, 0, 0, 0, 17),
(2, '', 'Title', 2122, 'Chapter in a Book', 'Publisher', 'Place', 0, 0, '12-21', 0, 0, 0, 0, 0),
(3, '', 'Hey', 1234, 'Chapter in a Book', 'Publisher', 'Place', 0, 0, '12-23', 0, 0, 0, 0, 0),
(5, '', 'Title', 1234, 'Book', 'Publisher', 'Place', 0, 0, '1234', 0, 0, 0, 0, 0),
(6, '', 'Title', 1234, 'Book', 'Publisher', 'Place', 0, 0, '123', 0, 0, 0, 0, 0),
(7, '', 'Title', 1234, 'Journal', '', '', 0, 2, '12-23', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `accom_rchtbl`
--

CREATE TABLE IF NOT EXISTS `accom_rchtbl` (
`research_ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `nature` enum('Basic','Applied','Policy','Other') NOT NULL,
  `fund_up` int(10) DEFAULT NULL,
  `fund_external` varchar(50) DEFAULT NULL,
  `fund_amount` int(10) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accom_rchtbl`
--

INSERT INTO `accom_rchtbl` (`research_ID`, `title`, `nature`, `fund_up`, `fund_external`, `fund_amount`, `start`, `end`, `user_ID`) VALUES
(2, 'ad', 'Basic', 0, 'a', 0, '2014-08-05', '2014-08-05', 17);

-- --------------------------------------------------------

--
-- Table structure for table `connect_accomtbl`
--

CREATE TABLE IF NOT EXISTS `connect_accomtbl` (
`connect_ID` int(11) NOT NULL,
  `accom_ID` int(11) NOT NULL,
  `accom_specID` int(11) NOT NULL,
  `type` enum('pub','awd','rch','ppr','ctv','par','mat','oth') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `connect_accomtbl`
--

INSERT INTO `connect_accomtbl` (`connect_ID`, `accom_ID`, `accom_specID`, `type`) VALUES
(1, 7, 1, 'pub'),
(16, 7, 3, 'awd'),
(17, 7, 2, 'rch'),
(18, 7, 2, 'ppr'),
(19, 7, 2, 'ctv'),
(20, 7, 3, 'par'),
(22, 7, 3, 'oth'),
(23, 5, 4, 'mat'),
(30, 7, 8, 'mat'),
(31, 10, 5, 'mat'),
(32, 16, 3, 'ctv'),
(33, 17, 2, 'pub'),
(34, 18, 4, 'oth'),
(35, 17, 9, 'mat'),
(36, 5, 5, 'oth'),
(37, 17, 4, 'oth'),
(41, 3, 3, 'pub'),
(42, 3, 5, 'pub'),
(43, 20, 6, 'pub'),
(44, 20, 7, 'pub'),
(45, 21, 10, 'mat');

-- --------------------------------------------------------

--
-- Table structure for table `cumatbl`
--

CREATE TABLE IF NOT EXISTS `cumatbl` (
`cuma_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `period_from` date NOT NULL,
  `period_to` date NOT NULL,
  `date_assessed` date DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ipcrtbl`
--

CREATE TABLE IF NOT EXISTS `ipcrtbl` (
`ipcr_ID` int(11) NOT NULL,
  `opcr_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `status` enum('Checked','Accepted','Rejected','Pending','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `comments` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ipcrtbl`
--

INSERT INTO `ipcrtbl` (`ipcr_ID`, `opcr_ID`, `user_ID`, `date_submitted`, `status`, `comments`, `remarks`, `document`) VALUES
(6, 1, 8, '2014-08-13', 'Saved', NULL, 'None', 'files/document_ipcr/12340000401140414.pdf'),
(10, 1, 17, '2014-08-13', 'Accepted', NULL, 'Checked by Karen T. Brickey (13 Aug 2014)', 'files/document_ipcr/12340001301140414.pdf'),
(11, 1, 4, '2014-08-13', 'Saved', NULL, 'None', 'files/document_ipcr/12340000001140414.pdf'),
(12, 1, 18, '2014-08-13', 'Accepted', NULL, 'Checked by Karen T. Brickey (13 Aug 2014)', 'files/document_ipcr/12340001401140414.pdf'),
(13, 1, 19, '2014-08-13', 'Accepted', NULL, 'Improve this - Karen T. Brickey (13 Aug 2014)', 'files/document_ipcr/12340001501140414.pdf'),
(14, 1, 20, '2014-08-13', 'Accepted', NULL, 'Checked by Karen T. Brickey (13 Aug 2014)', 'files/document_ipcr/12340001601140414.pdf'),
(15, 1, 21, '2014-08-13', 'Rejected', NULL, 'This is unacceptable! - Karen T. Brickey (13 Aug 2014)', 'files/document_ipcr/12340001701140414.pdf'),
(16, 1, 22, NULL, 'Draft', NULL, 'None', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ipcr_targettbl`
--

CREATE TABLE IF NOT EXISTS `ipcr_targettbl` (
`target_ID` int(11) NOT NULL,
  `output_ID` int(11) NOT NULL,
  `ipcr_ID` int(11) NOT NULL,
  `_indicators` varchar(255) DEFAULT NULL,
  `actual_accom` varchar(255) DEFAULT NULL,
  `r_quantity` int(1) DEFAULT NULL,
  `r_efficiency` int(1) DEFAULT NULL,
  `r_timeliness` int(1) DEFAULT NULL,
  `remarks` varchar(255) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `ipcr_targettbl`
--

INSERT INTO `ipcr_targettbl` (`target_ID`, `output_ID`, `ipcr_ID`, `_indicators`, `actual_accom`, `r_quantity`, `r_efficiency`, `r_timeliness`, `remarks`) VALUES
(6, 7, 6, NULL, NULL, NULL, NULL, NULL, 'None'),
(7, 14, 6, NULL, NULL, NULL, NULL, NULL, 'None'),
(8, 19, 6, NULL, NULL, NULL, NULL, NULL, 'None'),
(9, 15, 6, NULL, NULL, NULL, NULL, NULL, 'None'),
(10, 7, 10, NULL, NULL, NULL, NULL, NULL, 'None'),
(11, 8, 10, NULL, NULL, NULL, NULL, NULL, 'None'),
(12, 7, 11, NULL, NULL, NULL, NULL, NULL, 'None'),
(13, 7, 12, NULL, NULL, NULL, NULL, NULL, 'None'),
(14, 8, 12, NULL, NULL, NULL, NULL, NULL, 'None'),
(15, 19, 12, NULL, NULL, NULL, NULL, NULL, 'None'),
(16, 7, 13, NULL, NULL, NULL, NULL, NULL, 'None'),
(17, 8, 13, NULL, NULL, NULL, NULL, NULL, 'None'),
(18, 21, 13, NULL, NULL, NULL, NULL, NULL, 'None'),
(19, 14, 14, NULL, NULL, NULL, NULL, NULL, 'None'),
(20, 15, 14, NULL, NULL, NULL, NULL, NULL, 'None'),
(21, 19, 14, NULL, NULL, NULL, NULL, NULL, 'None'),
(22, 17, 15, NULL, NULL, NULL, NULL, NULL, 'None'),
(23, 7, 15, NULL, NULL, NULL, NULL, NULL, 'None'),
(24, 11, 15, NULL, NULL, NULL, NULL, NULL, 'None'),
(25, 7, 16, NULL, NULL, NULL, NULL, NULL, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `oamstbl`
--

CREATE TABLE IF NOT EXISTS `oamstbl` (
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oamstbl`
--

INSERT INTO `oamstbl` (`name`, `content`) VALUES
('about', 'OAMS is an online document management system that will facilitate automated report generation, submission and evaluation.\r\n	As of the moment, OAMS can generate Accomplishment Reports, Individual Performance Commitment and Review (IPCR),\r\n	Office Performance Commitment and Review (OPCR) and Constituent Unit (CU) Management Assessment Forms.'),
('title', 'Online Accomplishment Management System');

-- --------------------------------------------------------

--
-- Table structure for table `oams_messagetbl`
--

CREATE TABLE IF NOT EXISTS `oams_messagetbl` (
`message_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `oams_messagetbl`
--

INSERT INTO `oams_messagetbl` (`message_ID`, `name`, `contact`, `subject`, `message`, `seen`, `deleted`) VALUES
(1, 'Jenny', 'jmgalino@up.edu.ph', 's', 'm', 0, 0),
(2, 'Jamaica', 'jmg@up.edu.ph', 's', 'message', 0, 0),
(3, 'Karen T. Brickey', '123400004', 'Test', 'message', 0, 0),
(4, 'Karen T. Brickey', '123400004', 'test2', 'message', 0, 0);

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
  `status` enum('Checked','Approved','Pending','Published','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `document` varchar(255) DEFAULT NULL,
  `document_consolidated` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `opcrtbl`
--

INSERT INTO `opcrtbl` (`opcr_ID`, `user_ID`, `period_from`, `period_to`, `date_published`, `date_submitted`, `status`, `remarks`, `document`, `document_consolidated`) VALUES
(1, 8, '2014-01-01', '2014-04-01', '2014-08-13', NULL, 'Published', 'None', 'files/document_opcr/12340000401140414.pdf', NULL),
(2, 4, '2014-01-01', '2014-04-01', '2014-08-09', NULL, 'Draft', 'None', NULL, NULL),
(7, 8, '2014-05-01', '2014-08-01', NULL, NULL, 'Draft', 'None', NULL, NULL),
(8, 7, '2014-09-01', '2014-12-01', '2014-08-13', NULL, 'Published', 'None', 'files/document_opcr/12340000309141214.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `opcr_categorytbl`
--

CREATE TABLE IF NOT EXISTS `opcr_categorytbl` (
`category_ID` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `opcr_categorytbl`
--

INSERT INTO `opcr_categorytbl` (`category_ID`, `category`) VALUES
(1, 'Strategic Priority'),
(2, 'Core Functions'),
(3, 'Support Functions');

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
  `r_quantity` int(1) DEFAULT NULL,
  `r_efficiency` int(1) DEFAULT NULL,
  `r_timeliness` int(1) DEFAULT NULL,
  `remarks` varchar(255) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `opcr_outputtbl`
--

INSERT INTO `opcr_outputtbl` (`output_ID`, `category_ID`, `opcr_ID`, `output`, `indicators`, `accountable`, `r_quantity`, `r_efficiency`, `r_timeliness`, `remarks`) VALUES
(7, 1, 1, 'BSCSCurricular revision to address the requirements of the industry, K-12 and ASEAN integration', 'Targets:(1) Acquired list of courses that will be transferred to K-12; (2) reviewed the old revision proposal; (3) identified gap between existing curriculum and industry needs. Measures: only (1) is acquired = 3;  (1) and (2) were obtained = 4; (1) and (2) and (3) are obtained = 5', NULL, NULL, NULL, NULL, 'None'),
(8, 1, 1, 'BSAMat Curricular revision to address the requirements of the industry, K-12 and ASEAN integration', 'Targets:(1) Acquired list of courses that will be transferred to K-12; (2) reviewed the old revision proposal; (3) identified gap between existing curriculum and industry needs. Measures: only (1) is acquired = 3;  (1) and (2) were obtained = 4; (1) and (2) and (3) are obtained = 5', NULL, NULL, NULL, NULL, 'None'),
(9, 1, 1, 'Integration of Smart Devices Programming in the existing BSCS Courses', 'Targets:(1) Procurement of needed eqpt; (2) revised course outline; (3) attendance of faculty to trainings . Measures: only (1) is acquired = 3;  (1) and (2) were obtained = 4; (1) and (2) and (3) are obtained = 5', NULL, NULL, NULL, NULL, 'None'),
(10, 1, 1, 'Integration of Geographic Information System in the existing BSAMat Courses', 'Targets:(1) Procurement of needed eqpt; (2) revised course outline; (3) attendance of faculty to trainings . Measures: only (1) is acquired = 3;  (1) and (2) were obtained = 4; (1) and (2) and (3) are obtained = 5', NULL, NULL, NULL, NULL, 'None'),
(11, 1, 1, 'Integration of Computer Software Applications in teaching of Statistics and Applied Mathematics Courses ', 'Targets:(1) Procurement of needed eqpt; (2) revised course outline; (3) attendance of faculty to trainings . Measures: only (1) is acquired = 3;  (1) and (2) were obtained = 4; (1) and (2) and (3) are obtained = 5', NULL, NULL, NULL, NULL, 'None'),
(13, 1, 1, 'Establish linkage with the  industry and other agencies.', 'Targets:(1) 2 linkages; (2) 3 linkages; (3) 4 linkages.  Measures: only (1) is acquired = 3;  (2) was acquired = 4; (3) was acquired = 5', NULL, NULL, NULL, NULL, 'None'),
(14, 2, 1, 'OrganizeTeaching Pedagogy Workshop on student-centered teaching for the DMPCS faculty', '100% faculty participation = 5; 90% faculty participation = 4; 80% faculty participation = 3', NULL, NULL, NULL, NULL, 'None'),
(15, 2, 1, 'Attendance of Faculty members to  workshops and conferences', '2 facuty attended = 3; 3 faculty attended = 4; and 5 faculty attended = 5', NULL, NULL, NULL, NULL, 'None'),
(16, 2, 1, 'Upgrading of Laboratories for Research, Extension and Instruction', 'Creation of a Committee that will look into the requirements to upgrade the laboratories of the department and recommendation was made = 3; 10% of the recommendation was met = 4; 20% of the recommendation was met = 5', NULL, NULL, NULL, NULL, 'None'),
(17, 2, 1, 'Sustain Extension activities of the department', '1 training conducted = 4; 2 trainings conducted = 5', NULL, NULL, NULL, NULL, 'None'),
(19, 3, 1, 'On-line Administration of SATE and automated generation of SATE report ', '10% done = 3; 20% done = 4; and 30% done = 5', NULL, NULL, NULL, NULL, 'None'),
(20, 3, 1, 'On-line Reporting of Faculty''s Accomplishment with automated compilation and generation of report', '10% done = 3; 20% done = 4; and 30% done = 5', NULL, NULL, NULL, NULL, 'None'),
(21, 3, 1, 'Automated compilation DMPCS students'' Special Problem', '10% done = 3; 20% done = 4; and 30% done = 5', NULL, NULL, NULL, NULL, 'None'),
(23, 1, 1, 'Participation in the Regional Statistics Quiz', 'Champion = 5; 1st runner up = 4; 2nd runner up = 3', NULL, NULL, NULL, NULL, 'None'),
(24, 1, 1, 'Participation in the MSITE activities', 'Champion = 5; 1st runner up = 4; 2nd runner up = 3', NULL, NULL, NULL, NULL, 'None'),
(26, 2, 1, 'Research Projects and Outputs', '1 research project conducted = 3; 2 research projects conducted = 4; and 3 research projects conducted = 5', NULL, NULL, NULL, NULL, 'None'),
(27, 1, 8, 'strategy 1', 'strategy 1 - style 2', NULL, NULL, NULL, NULL, 'None'),
(28, 1, 8, 'strategy 2', 'strategy 2 - style 2', NULL, NULL, NULL, NULL, 'None'),
(29, 2, 8, 'core 1', 'abc', NULL, NULL, NULL, NULL, 'None'),
(30, 2, 8, 'core 2', 'def', NULL, NULL, NULL, NULL, 'None'),
(31, 2, 8, 'core 3', 'ghi', NULL, NULL, NULL, NULL, 'None'),
(32, 2, 8, 'core 4', 'jkl', NULL, NULL, NULL, NULL, 'None');

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
-- Table structure for table `univ_collegetbl`
--

CREATE TABLE IF NOT EXISTS `univ_collegetbl` (
`college_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `college` varchar(100) NOT NULL,
  `short` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `univ_collegetbl`
--

INSERT INTO `univ_collegetbl` (`college_ID`, `user_ID`, `college`, `short`) VALUES
(1, 4, ' College of Humanities and Social Sciences', 'CHSS'),
(2, 5, 'College of Science and Mathematics', 'CSM'),
(3, 6, 'School of Management', 'SOM');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `univ_departmenttbl`
--

INSERT INTO `univ_departmenttbl` (`department_ID`, `college_ID`, `user_ID`, `department`, `short`) VALUES
(1, 1, 7, 'Department of Architecture', 'DA'),
(2, 1, 8, 'Department of Humanities', 'DH'),
(3, 1, 9, 'Department of Human Kinetics', 'DHK'),
(4, 1, 10, 'Department of Social Sciences', 'DSS'),
(5, 2, 11, 'Department of Biological Sciences and Environmental Studies', 'DBSES'),
(6, 2, 12, 'Department of Food Science and Chemistry', 'DFSC'),
(7, 2, 13, 'Department of Mathematics, Physics and Computer Science', 'DMPCS');

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
  `goals` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `univ_programtbl`
--

INSERT INTO `univ_programtbl` (`program_ID`, `college_ID`, `department_ID`, `program`, `program_short`, `short`, `date_instituted`, `type`, `vision`, `goals`) VALUES
(1, 1, 1, 'Bachelor of Science in Architecture', 'BS Architecture', 'BSA', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals'),
(2, 1, 2, 'Bachelor of Arts in Communication Arts', 'BA Communication Arts', 'BACA', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals'),
(3, 1, 2, 'Bachelor of Arts in English', 'BA English', 'BAE', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals'),
(4, 1, 4, 'Bachelor of Arts in Anthropology', 'BA Anthropology', 'BAA', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals'),
(5, 2, 5, 'Bachelor of Science in Biology', 'BS Biology', 'BSB', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals'),
(6, 2, 6, 'Bachelor of Science in Food Technology', 'BS Food Technology', 'BSFT', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals'),
(7, 2, 7, 'Bachelor of Science in Applied Mathematics', 'BS Applied Mathematics', 'BSAM', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals'),
(8, 2, 7, 'Bachelor of Science in Computer Science', 'BS Computer Science', 'BSCS', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals'),
(9, 3, NULL, 'Bachelor of Science in Agribusiness Economics', 'BS Agribusiness Economics', 'BSABE', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals'),
(10, 3, NULL, 'Master in Management', 'Master in Management', 'MM', '1995-02-20', 'Graduate', 'Sample vision', 'Sample goals');

-- --------------------------------------------------------

--
-- Table structure for table `univ_review-facultytbl`
--

CREATE TABLE IF NOT EXISTS `univ_review-facultytbl` (
`review_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `cuma_ID` int(11) NOT NULL,
  `no_mentored` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `univ_review-programtbl`
--

CREATE TABLE IF NOT EXISTS `univ_review-programtbl` (
`review_ID` int(11) NOT NULL,
  `program_ID` int(11) NOT NULL,
  `date_reviewed` date NOT NULL,
  `passing_rate` int(11) DEFAULT NULL,
  `revisions` text NOT NULL,
  `desription_instituions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `univ_review-studentstbl`
--

CREATE TABLE IF NOT EXISTS `univ_review-studentstbl` (
`review_ID` int(11) NOT NULL,
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
  `employed_cc` int(11) NOT NULL
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
  `average_set` int(11) NOT NULL
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
(1, '000012345', '$2y$10$yvAleeO0N5N8ihZ89hCB1OWMMSTMmkgUfk4pDUUFHt3UYnBntsLLu', 0),
(2, '000112345', '$2y$10$hN0N3F9epEd0ptWjoBXh4eg8KEBsdufplLvRCECEUl88WIhkZs1yi', 0),
(3, '000212345', '$2y$10$bLmvx7vkID.oXMFiiwoNVu12Y/eovcHirNIQT42em0Z9YWAHpoDx2', 0),
(4, '123400000', '$2y$10$B7erv/a9j5OHPli8T7ESle7WpF9pm12NrgHXHJEijO/jfz7ZYf4ym', 0),
(5, '123400001', '$2y$10$w95iTC2Il6aXytapnKqf0OjrphH2jtl.owySAXBOwPhs6ty8ZIU/6', 0),
(6, '123400002', '$2y$10$TBODwFR1rFW/RFnSGyAtduqks7xjnyP8oEWNrCfkYVLwHZjgJvSFm', 0),
(7, '123400003', '$2y$10$cSza7WOFYdzf8OvJv/w39O.1EeTfaJELWq0A7GUS2GF9szSMPHqnm', 0),
(8, '123400004', '$2y$10$rppi4l9hw14tFK9Qvm0n0.Ld0xPQ/ozVREYZV0dBLI9QpVOG6vYtO', 0),
(9, '123400005', 'upmin', 0),
(10, '123400006', '$2y$10$FFKYIUjtiaYCG6aUL3WLyuIODWeYvQeSriXfVBZLjAPycUY4QVJYS', 0),
(11, '123400007', '$2y$10$EkQJPig07h41Q3xewEjhmeO8x80MbFfLbTri71WO1AszIM7j2qr9C', 0),
(12, '123400008', '$2y$10$dzFnMXjJ8PZrW4eFbuEVMOhqNyZNb9N.BzExgzq/4c5QYLhsmzAbe', 0),
(13, '123400009', '$2y$10$Gt4MxWmHI5nkFy05q6lmlOiMsq/yVHoKgGR8E5VheCw081BDVEr7O', 0),
(14, '123400010', '$2y$10$oIfulC3H9QiS5dtl2enK8uLeq6tN8CpG03rcrszYgKkPgMnsNB6ZG', 0),
(15, '123400011', 'upmin', 0),
(16, '123400012', 'upmin', 0),
(17, '123400013', '$2y$10$U/e/7E0LVi9PPQM0OGoAN./rw4w9aP2T/YO.KzuhBHqAeS.pVM3Dq', 0),
(18, '123400014', '$2y$10$vUjPjShw8jdxXMfZ4YCTGOEdYvFLyC19ZuP7LL/BInqfg6GSTEJ6C', 0),
(19, '123400015', '$2y$10$3MIU2k4Y6fuRLUffY/AERuv731/iEOW4YtAdFhy7U/YxCF1uyCgsa', 0),
(20, '123400016', '$2y$10$wQTgK7gc30Xqc7Xj1PLRWOcl4h2OXAXLzLSI43Nq/NyIHDWZyV72.', 0),
(21, '123400017', '$2y$10$4k.9FCCLDcGiDlMrOFbl/OT5fH4kVWKvRJ5FHsqxwIsOrucrDLp6y', 0),
(22, '123400018', '$2y$10$e5T6ftx48M4AKV70diKSF.dIWH0zmT4n13hrxdpO0fLRpgEvIVt/2', 0),
(23, '123400019', '$2y$10$d6biN.hWZHYGvOOCIebxr.CfuVuvk2CWppM7dBQunLo4j5Ieinl9m', 0),
(24, '123400020', '$2y$10$IAIVW3Gg2F56aNIGbiiTN.mdO/EnI9iOnxnInF88KIrTFZZQ6EtYK', 0),
(25, '123400021', '$2y$10$.IlTLUYiaGNMorpsL/jnAuhdvylfVl1c.T8k.kMvW.JZ5SffiLf.q', 0),
(26, '123400023', '$2y$10$BqqpOcGzWTNiRj8q7w2oQOEuZPrnqYxIIHjmLi6mnDAYYYIH1JCWi', 0),
(27, '123400024', '$2y$10$9Ib2RPOYUFzsH5Q/Q3O/uuwgvC02JGiFbKFkiiOUc45Q2TY.8AYRS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiletbl`
--

CREATE TABLE IF NOT EXISTS `user_profiletbl` (
`user_ID` int(11) NOT NULL,
  `employee_code` varchar(9) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_initial` varchar(5) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_type` enum('Faculty','Admin') NOT NULL,
  `faculty_code` varchar(30) DEFAULT NULL,
  `program_ID` int(11) DEFAULT NULL,
  `department_ID` int(11) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `position` enum('dean','dept_chair','none') DEFAULT NULL,
  `birthday` date NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT 'assets/img/default.jpg',
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `user_profiletbl`
--

INSERT INTO `user_profiletbl` (`user_ID`, `employee_code`, `first_name`, `middle_initial`, `last_name`, `user_type`, `faculty_code`, `program_ID`, `department_ID`, `rank`, `position`, `birthday`, `pic`, `deleted`) VALUES
(1, '000012345', 'Jenny', 'M', 'Galino', 'Admin', NULL, NULL, NULL, NULL, NULL, '1994-07-08', 'assets/img/default.jpg', 0),
(2, '000112345', 'Catherine', 'K', 'Gastone', 'Admin', NULL, NULL, NULL, NULL, NULL, '1963-12-14', 'assets/img/default.jpg', 0),
(3, '000212345', 'John', 'E', 'Parsons', 'Admin', NULL, NULL, NULL, NULL, NULL, '1968-02-18', 'assets/img/default.jpg', 0),
(4, '123400000', 'Kiyoko', 'B', 'Blanton', 'Faculty', 'KBBlanton', 2, 2, '-', 'dean', '1982-01-06', 'assets/img/default.jpg', 0),
(5, '123400001', 'Troy', 'E', 'Keller', 'Faculty', 'TEKeller', 5, 5, '-', 'dean', '1962-02-24', 'assets/img/default.jpg', 0),
(6, '123400002', 'Martha', 'K', 'Stutts', 'Faculty', 'MKStutts', 9, NULL, '-', 'dean', '1991-02-01', 'assets/img/default.jpg', 0),
(7, '123400003', 'Evan', 'L', 'Woodrow', 'Faculty', 'ELWoodrow', 1, 1, '-', 'dept_chair', '1964-02-18', 'assets/img/default.jpg', 0),
(8, '123400004', 'Karen', 'T', 'Brickey', 'Faculty', 'KTBrickey', 2, 2, '-', 'dept_chair', '1967-08-10', 'assets/img/default.jpg', 0),
(9, '123400005', 'Jacqueline', 'A', 'Morales', 'Faculty', 'JAMorales', NULL, 3, '-', 'dept_chair', '1987-03-22', 'assets/img/default.jpg', 0),
(10, '123400006', 'Sharon', 'D', 'Call', 'Faculty', 'SDCall', 4, 4, '-', 'dept_chair', '1970-12-07', 'assets/img/default.jpg', 0),
(11, '123400007', 'Pedro', 'R', 'Morales', 'Faculty', 'PRMorales', 5, 5, '-', 'dept_chair', '1971-01-01', 'assets/img/default.jpg', 0),
(12, '123400008', 'Thomas', 'W', 'Seay', 'Faculty', 'TWSeay', 6, 6, '-', 'dept_chair', '1974-03-03', 'assets/img/default.jpg', 0),
(13, '123400009', 'Albert', 'A', 'Russell', 'Faculty', 'AARussell', 7, 7, '-', 'dept_chair', '1977-08-10', 'assets/img/default.jpg', 0),
(14, '123400010', 'Dianne', 'A', 'Farias', 'Faculty', 'DAFarias', 1, 1, '-', 'none', '1993-04-15', 'assets/img/default.jpg', 0),
(15, '123400011', 'Daniel', 'C', 'Daly', 'Faculty', 'DCDaly', 1, 1, '-', 'none', '1975-12-31', 'assets/img/default.jpg', 0),
(16, '123400012', 'Kristin', 'B', 'Morford', 'Faculty', 'KBMorford', 1, 1, '-', 'none', '1983-10-16', 'assets/img/default.jpg', 0),
(17, '123400013', 'Gloria', 'V', 'Hubbard', 'Faculty', 'GVHubbard', 2, 2, 'Some rank', 'none', '1991-03-04', 'assets/img/default.jpg', 0),
(18, '123400014', 'Anthony', 'C', 'Whitehill', 'Faculty', 'ACWhitehill', 2, 2, '-', 'none', '1967-02-11', 'assets/img/default.jpg', 0),
(19, '123400015', 'Richard', 'A', 'Savage', 'Faculty', 'RASavage', 2, 2, '-', 'none', '1994-07-26', 'assets/img/default.jpg', 0),
(20, '123400016', 'Dominic', 'R', 'Martinez', 'Faculty', 'DRMartinez', 3, 2, '-', 'none', '1982-01-31', 'assets/img/default.jpg', 0),
(21, '123400017', 'Lillian', 'R', 'Laberge', 'Faculty', 'LRLaberge', 3, 2, '-', 'none', '1968-07-03', 'assets/img/default.jpg', 0),
(22, '123400018', 'Jack', 'A', 'Hansen', 'Faculty', 'JAHansen', 3, 2, '-', 'none', '1984-01-29', 'assets/img/default.jpg', 0),
(23, '123400019', 'Peggy', 'L', 'Benedetto', 'Faculty', 'PLBenedetto', 4, 4, '-', 'none', '2014-07-22', 'assets/img/default.jpg', 0),
(24, '123400020', 'Jeffrey', 'K', 'Barraza', 'Faculty', 'JKBarraza', 4, 4, '-', 'none', '1992-10-29', 'assets/img/default.jpg', 0),
(25, '123400021', 'Carole', 'C', 'Brown', 'Faculty', 'CCBrown', 4, 4, '-', 'none', '1966-08-12', 'assets/img/default.jpg', 0),
(26, '123400023', 'Ben', 'P', 'Banks', 'Faculty', 'BPBanks', 5, 5, '-', 'none', '1959-01-09', 'assets/img/default.jpg', 0),
(27, '123400024', 'Hilda', 'D', 'Jones', 'Faculty', 'HDJones', 5, 5, '-', 'none', '1986-12-25', 'assets/img/default.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_pubtbl`
--

CREATE TABLE IF NOT EXISTS `user_pubtbl` (
`publication_ID` int(11) NOT NULL,
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
  `popular` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_rchtbl`
--

CREATE TABLE IF NOT EXISTS `user_rchtbl` (
`research_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `nature` enum('Basic','Applied','Policy','Other') NOT NULL,
  `fund_up` int(10) NOT NULL DEFAULT '0',
  `fund_external` varchar(50) NOT NULL DEFAULT 'External',
  `fund_amount` int(10) NOT NULL DEFAULT '0',
  `duration_from` date NOT NULL,
  `duration_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
 ADD PRIMARY KEY (`award_ID`), ADD KEY `user` (`user_ID`);

--
-- Indexes for table `accom_ctvtbl`
--
ALTER TABLE `accom_ctvtbl`
 ADD PRIMARY KEY (`creative_ID`), ADD KEY `user` (`user_ID`);

--
-- Indexes for table `accom_mattbl`
--
ALTER TABLE `accom_mattbl`
 ADD PRIMARY KEY (`material_ID`), ADD KEY `user` (`user_ID`);

--
-- Indexes for table `accom_othtbl`
--
ALTER TABLE `accom_othtbl`
 ADD PRIMARY KEY (`other_ID`), ADD KEY `user` (`user_ID`);

--
-- Indexes for table `accom_partbl`
--
ALTER TABLE `accom_partbl`
 ADD PRIMARY KEY (`participation_ID`), ADD KEY `user` (`user_ID`);

--
-- Indexes for table `accom_pprtbl`
--
ALTER TABLE `accom_pprtbl`
 ADD PRIMARY KEY (`paper_ID`), ADD KEY `user` (`user_ID`);

--
-- Indexes for table `accom_pubtbl`
--
ALTER TABLE `accom_pubtbl`
 ADD PRIMARY KEY (`publication_ID`), ADD KEY `user` (`user_ID`);

--
-- Indexes for table `accom_rchtbl`
--
ALTER TABLE `accom_rchtbl`
 ADD PRIMARY KEY (`research_ID`), ADD KEY `user` (`user_ID`);

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
 ADD PRIMARY KEY (`target_ID`), ADD KEY `ipcr_ID` (`ipcr_ID`);

--
-- Indexes for table `oamstbl`
--
ALTER TABLE `oamstbl`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `oams_messagetbl`
--
ALTER TABLE `oams_messagetbl`
 ADD PRIMARY KEY (`message_ID`);

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
-- Indexes for table `univ_review-facultytbl`
--
ALTER TABLE `univ_review-facultytbl`
 ADD PRIMARY KEY (`review_ID`), ADD KEY `cuma_ID` (`cuma_ID`), ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `univ_review-programtbl`
--
ALTER TABLE `univ_review-programtbl`
 ADD PRIMARY KEY (`review_ID`), ADD KEY `program_ID` (`program_ID`);

--
-- Indexes for table `univ_review-studentstbl`
--
ALTER TABLE `univ_review-studentstbl`
 ADD PRIMARY KEY (`review_ID`), ADD KEY `program_ID` (`program_ID`), ADD KEY `cuma_ID` (`cuma_ID`);

--
-- Indexes for table `user_educbgtbl`
--
ALTER TABLE `user_educbgtbl`
 ADD PRIMARY KEY (`educ_ID`), ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `user_logintbl`
--
ALTER TABLE `user_logintbl`
 ADD PRIMARY KEY (`user_ID`), ADD KEY `user_ID` (`user_ID`), ADD KEY `employee_code` (`employee_code`);

--
-- Indexes for table `user_profiletbl`
--
ALTER TABLE `user_profiletbl`
 ADD PRIMARY KEY (`user_ID`), ADD KEY `program` (`program_ID`), ADD KEY `department_ID` (`department_ID`);

--
-- Indexes for table `user_pubtbl`
--
ALTER TABLE `user_pubtbl`
 ADD PRIMARY KEY (`publication_ID`), ADD KEY `user` (`user_ID`);

--
-- Indexes for table `user_rchtbl`
--
ALTER TABLE `user_rchtbl`
 ADD PRIMARY KEY (`research_ID`), ADD KEY `user` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomtbl`
--
ALTER TABLE `accomtbl`
MODIFY `accom_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `accom_awdtbl`
--
ALTER TABLE `accom_awdtbl`
MODIFY `award_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `accom_ctvtbl`
--
ALTER TABLE `accom_ctvtbl`
MODIFY `creative_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `accom_mattbl`
--
ALTER TABLE `accom_mattbl`
MODIFY `material_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `accom_othtbl`
--
ALTER TABLE `accom_othtbl`
MODIFY `other_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `accom_partbl`
--
ALTER TABLE `accom_partbl`
MODIFY `participation_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `accom_pprtbl`
--
ALTER TABLE `accom_pprtbl`
MODIFY `paper_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `accom_pubtbl`
--
ALTER TABLE `accom_pubtbl`
MODIFY `publication_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `accom_rchtbl`
--
ALTER TABLE `accom_rchtbl`
MODIFY `research_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `connect_accomtbl`
--
ALTER TABLE `connect_accomtbl`
MODIFY `connect_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `cumatbl`
--
ALTER TABLE `cumatbl`
MODIFY `cuma_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrtbl`
--
ALTER TABLE `ipcrtbl`
MODIFY `ipcr_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ipcr_targettbl`
--
ALTER TABLE `ipcr_targettbl`
MODIFY `target_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `oams_messagetbl`
--
ALTER TABLE `oams_messagetbl`
MODIFY `message_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `opcrtbl`
--
ALTER TABLE `opcrtbl`
MODIFY `opcr_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `opcr_categorytbl`
--
ALTER TABLE `opcr_categorytbl`
MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `opcr_outputtbl`
--
ALTER TABLE `opcr_outputtbl`
MODIFY `output_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `univ_collegetbl`
--
ALTER TABLE `univ_collegetbl`
MODIFY `college_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `univ_departmenttbl`
--
ALTER TABLE `univ_departmenttbl`
MODIFY `department_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `univ_programtbl`
--
ALTER TABLE `univ_programtbl`
MODIFY `program_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `univ_review-facultytbl`
--
ALTER TABLE `univ_review-facultytbl`
MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `univ_review-programtbl`
--
ALTER TABLE `univ_review-programtbl`
MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `univ_review-studentstbl`
--
ALTER TABLE `univ_review-studentstbl`
MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_profiletbl`
--
ALTER TABLE `user_profiletbl`
MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user_pubtbl`
--
ALTER TABLE `user_pubtbl`
MODIFY `publication_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_rchtbl`
--
ALTER TABLE `user_rchtbl`
MODIFY `research_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `connect_accomtbl`
--
ALTER TABLE `connect_accomtbl`
ADD CONSTRAINT `connect_accomtbl_ibfk_1` FOREIGN KEY (`accom_ID`) REFERENCES `accomtbl` (`accom_ID`);

--
-- Constraints for table `ipcrtbl`
--
ALTER TABLE `ipcrtbl`
ADD CONSTRAINT `ipcrtbl_ibfk_3` FOREIGN KEY (`opcr_ID`) REFERENCES `opcrtbl` (`opcr_ID`);

--
-- Constraints for table `ipcr_targettbl`
--
ALTER TABLE `ipcr_targettbl`
ADD CONSTRAINT `ipcr_targettbl_ibfk_2` FOREIGN KEY (`ipcr_ID`) REFERENCES `ipcrtbl` (`ipcr_ID`);

--
-- Constraints for table `opcr_outputtbl`
--
ALTER TABLE `opcr_outputtbl`
ADD CONSTRAINT `opcr_outputtbl_ibfk_1` FOREIGN KEY (`opcr_ID`) REFERENCES `opcrtbl` (`opcr_ID`),
ADD CONSTRAINT `opcr_outputtbl_ibfk_2` FOREIGN KEY (`category_ID`) REFERENCES `opcr_categorytbl` (`category_ID`);

--
-- Constraints for table `univ_departmenttbl`
--
ALTER TABLE `univ_departmenttbl`
ADD CONSTRAINT `univ_departmenttbl_ibfk_1` FOREIGN KEY (`college_ID`) REFERENCES `univ_collegetbl` (`college_ID`);

--
-- Constraints for table `univ_programtbl`
--
ALTER TABLE `univ_programtbl`
ADD CONSTRAINT `univ_programtbl_ibfk_1` FOREIGN KEY (`college_ID`) REFERENCES `univ_collegetbl` (`college_ID`);

--
-- Constraints for table `univ_review-facultytbl`
--
ALTER TABLE `univ_review-facultytbl`
ADD CONSTRAINT `univ_review-facultytbl_ibfk_2` FOREIGN KEY (`cuma_ID`) REFERENCES `cumatbl` (`cuma_ID`);

--
-- Constraints for table `univ_review-programtbl`
--
ALTER TABLE `univ_review-programtbl`
ADD CONSTRAINT `univ_review-programtbl_ibfk_2` FOREIGN KEY (`program_ID`) REFERENCES `univ_programtbl` (`program_ID`);

--
-- Constraints for table `user_profiletbl`
--
ALTER TABLE `user_profiletbl`
ADD CONSTRAINT `user_profiletbl_ibfk_2` FOREIGN KEY (`program_ID`) REFERENCES `univ_programtbl` (`program_ID`),
ADD CONSTRAINT `user_profiletbl_ibfk_3` FOREIGN KEY (`department_ID`) REFERENCES `univ_departmenttbl` (`department_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
