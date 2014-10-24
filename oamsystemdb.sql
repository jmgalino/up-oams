-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2014 at 02:16 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `accomtbl`
--

INSERT INTO `accomtbl` (`accom_ID`, `user_ID`, `yearmonth`, `date_submitted`, `status`, `remarks`, `document`) VALUES
(2, 7, '2014-07-01', '2014-08-05', 'Pending', 'None', NULL),
(3, 17, '2014-03-01', '2014-08-28', 'Pending', 'None', '1234000130314.pdf'),
(5, 17, '2014-05-01', NULL, 'Draft', 'None', ''),
(7, 17, '2014-04-01', '2014-08-28', 'Pending', 'None', '1234000130414.pdf'),
(8, 5, '2014-02-01', NULL, 'Draft', 'None', NULL),
(10, 4, '2014-04-01', '2014-08-28', 'Saved', 'None', '1234000000414.pdf'),
(11, 17, '2014-08-01', NULL, 'Draft', 'None', ''),
(15, 4, '2014-08-01', NULL, 'Draft', 'None', NULL),
(16, 8, '2014-01-01', '2014-08-28', 'Approved', 'None', '1234000040114.pdf'),
(17, 8, '2014-03-01', '2014-08-29', 'Pending', 'None', '1234000040314.pdf'),
(18, 7, '2014-08-01', NULL, 'Draft', 'None', NULL),
(19, 24, '2014-01-01', NULL, 'Draft', 'None', NULL),
(20, 8, '2014-02-01', '2014-08-28', 'Pending', 'None', '1234000040214.pdf'),
(21, 8, '2014-04-01', '2014-08-29', 'Pending', 'None', '1234000040414.pdf'),
(22, 19, '2014-01-01', '2014-08-28', 'Pending', 'Checked by Karen T. Brickey (28 Aug 2014)', '1234000150114.pdf'),
(23, 8, '2014-05-01', '2014-10-22', 'Pending', 'None', '1234000040514.pdf'),
(24, 8, '2014-06-01', '2014-10-22', 'Pending', 'None', '1234000040614.pdf'),
(25, 31, '2014-09-01', '2014-09-16', 'Pending', 'None', '1438601130914.pdf'),
(26, 8, '2014-07-01', '2014-10-23', 'Pending', 'None', '1234000040714.pdf'),
(27, 8, '2014-08-01', '2014-10-23', 'Draft', 'None', '1234000040814.pdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `accom_awdtbl`
--

INSERT INTO `accom_awdtbl` (`award_ID`, `award`, `start`, `end`, `source`, `type`) VALUES
(3, 'asd', '2014-08-05', '2014-08-05', 'asd', 'Academe'),
(4, 's', '2014-07-17', '2014-07-31', 's', 'Academe'),
(5, 'Award', '2014-08-28', '2014-08-30', 'Source', 'Academe'),
(6, 'aa', '2014-09-09', '2014-09-25', 'aa', 'Academe'),
(8, 'a', '2014-09-16', '2014-09-08', 'a', 'Academe'),
(9, 'Change Award', '2014-09-02', '2014-09-11', 'awarder', 'Academe'),
(10, 's', '2014-09-03', '2014-09-12', 's', 'Academe'),
(11, 'awd', '2014-10-09', '2014-10-16', 'asd', 'Academe'),
(12, 'Award', '2014-07-03', '2014-07-03', 'Sources', 'Academe');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `accom_ctvtbl`
--

INSERT INTO `accom_ctvtbl` (`creative_ID`, `author`, `title`, `venue`, `start`, `end`) VALUES
(2, NULL, 'asd', 'asd', '2014-08-05', '2014-08-05'),
(3, NULL, 'Work', 'Venu', '2014-08-07', '2014-08-07'),
(4, NULL, 'Title', 'Venue', '2014-08-28', '2014-08-30'),
(5, '', 'Art', 'Venue', '2014-10-11', '2014-10-15'),
(6, NULL, 'Try', 'Venue', '2014-07-10', '2014-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `accom_mattbl`
--

CREATE TABLE IF NOT EXISTS `accom_mattbl` (
`material_ID` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `year` text NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `accom_mattbl`
--

INSERT INTO `accom_mattbl` (`material_ID`, `author`, `year`, `title`) VALUES
(5, NULL, '1234', 'a'),
(6, NULL, '1234', 'asdd'),
(8, NULL, '1234', 'p'),
(9, NULL, '2122', 'Title'),
(10, NULL, '2012', 'title'),
(11, NULL, '1998', 'tite'),
(12, NULL, '0000', 'k'),
(13, NULL, '2010', 'Title'),
(14, NULL, '2010', 'Title'),
(16, NULL, '0', 'a'),
(20, NULL, 'Author', 'asd'),
(21, NULL, '2014', 'Title'),
(22, NULL, '1872', 'aaah'),
(23, '', '2010', 'News'),
(24, '', '2010', 'Titlesa a'),
(27, '', '1111', 'Subokan'),
(29, NULL, '1234', 'weee'),
(30, NULL, '1234', 'test'),
(31, 'sWe', '2014', 'Yeah'),
(32, NULL, '2014', 'Attach');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `accom_othtbl`
--

INSERT INTO `accom_othtbl` (`other_ID`, `participation`, `activity`, `venue`, `start`, `end`) VALUES
(3, 'sf', 'q', 'as', '2014-08-05', '2014-08-05'),
(4, 'Participant', 'Activity', 'Venue', '2014-08-08', '2014-08-09'),
(5, 'Participant', 'Activity', 'Venue', '2014-08-07', '2014-08-09'),
(6, 'Other', 'Activity', 'Venue', '2014-08-01', '2014-08-04'),
(7, 'pa', 'pbb', 'pc', '2014-10-17', '2014-10-17'),
(8, 'Administrator', 'Trekking', 'Mt. Gawler', '2014-07-10', '2014-07-12');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `accom_partbl`
--

INSERT INTO `accom_partbl` (`participation_ID`, `participation`, `title`, `venue`, `start`, `end`) VALUES
(3, 'adas', 'asd', 'asd', '2014-08-05', '2014-08-05'),
(4, 'Facilitator', 'Seminar Title', 'Venue', '2014-08-28', '2014-08-30'),
(5, 'wa', 'wb', 'wc', '2014-10-09', '2014-10-09'),
(6, 'Guardian', 'Dance', 'Court', '2014-07-14', '2014-07-14');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `accom_pprtbl`
--

INSERT INTO `accom_pprtbl` (`paper_ID`, `author`, `title`, `activity`, `venue`, `start`, `end`) VALUES
(2, NULL, 'add', 'Conference', 'as', '2014-08-05', '2014-08-05'),
(4, NULL, 'Title', 'Conference', 'Venue', '2014-08-28', '2014-08-30'),
(5, 'Author', 'Title', 'Conference', 'Venue', '2014-08-28', '2014-08-30'),
(6, NULL, 'Title', 'Forum', 'Venue', '2014-08-28', '2014-08-30'),
(10, '', 't', 'Conference', 't', '2014-08-04', '2014-08-04'),
(11, NULL, 't', 'Conference', 'w', '2014-08-06', '2014-08-08'),
(12, '', 'Title', 'Conference', 'b', '2014-10-01', '2014-10-08'),
(13, 'Author', 'Titles', 'Conference', 'Venues', '2014-07-03', '2014-07-04');

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
  `isi` int(1) NOT NULL DEFAULT '0',
  `peer_reviewed` int(1) NOT NULL DEFAULT '0',
  `refereed` int(1) NOT NULL DEFAULT '0',
  `popular` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `accom_pubtbl`
--

INSERT INTO `accom_pubtbl` (`publication_ID`, `author`, `year`, `title`, `type`, `journal_volume`, `journal_issue`, `book_publisher`, `book_place`, `page`, `isi`, `peer_reviewed`, `refereed`, `popular`) VALUES
(1, NULL, 1234, 'a', 'Book', '0', '0', 'b', 'c', '1', 0, 0, 0, 0),
(2, NULL, 2122, 'Title', 'Chapter in a Book', '0', '0', 'Publisher', 'Place', '12-21', 0, 0, 0, 0),
(3, NULL, 1234, 'Hey', 'Chapter in a Book', '0', '0', 'Publisher', 'Place', '12-23', 0, 0, 0, 0),
(5, NULL, 1234, 'Title', 'Book', '0', '0', 'Publisher', 'Place', '1234', 0, 0, 0, 0),
(6, NULL, 1234, 'Title', 'Book', '0', '0', 'Publisher', 'Place', '123', 0, 0, 0, 0),
(7, NULL, 1234, 'Title', 'Journal', '0', '2', NULL, NULL, '12-23', 0, 0, 0, 0),
(8, NULL, 1234, 'Title', 'Journal', '1', '1', NULL, NULL, '12-23', 0, 0, 0, 0),
(9, '', 2010, 'Book', 'Chapter in a Book', 'a', 'a', 'a', 'a', 'p', 0, 0, 0, 0),
(10, 'Nobody', 2014, 'This', 'Book', NULL, NULL, 'is', 'Sparta', '300', 0, 0, 0, 0),
(11, NULL, 2014, 'Some', 'Chapter in a Book', NULL, NULL, 'Cheesy', 'Book', '1', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `accom_rchtbl`
--

CREATE TABLE IF NOT EXISTS `accom_rchtbl` (
`research_ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `nature` enum('Basic','Applied','Policy','Other') NOT NULL,
  `fund_external` varchar(255) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `fund_amount` varchar(20) DEFAULT NULL,
  `fund_up` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `accom_rchtbl`
--

INSERT INTO `accom_rchtbl` (`research_ID`, `title`, `nature`, `fund_external`, `start`, `end`, `fund_amount`, `fund_up`) VALUES
(2, 'ad', 'Basic', 'a', '2014-08-05', '2014-08-05', '12.50', '0'),
(3, '1', 'Basic', '', '2014-08-13', '2014-08-22', '0', '1234500'),
(4, 'TITLE', 'Basic', 'EXTERNAL', '2014-08-06', '2014-08-21', '123', '111'),
(5, 'Title', 'Basic', 'With external', '2014-08-28', '2014-08-30', '100.00', '200.00'),
(6, 'Title', 'Basic', NULL, '2014-08-28', '2014-08-30', '0', '200.00'),
(7, 'w', 'Basic', 'w', '2014-09-17', '2014-09-26', NULL, '1212312.05'),
(8, 'hello', 'Basic', NULL, '2014-10-15', '2014-10-16', NULL, '1221.22'),
(9, 'How To', 'Basic', 'Heyy', '2014-07-01', '2015-07-01', '122211.11', '11111.00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `connect_accomtbl`
--

INSERT INTO `connect_accomtbl` (`connect_ID`, `accom_ID`, `accom_specID`, `type`, `attachment`) VALUES
(1, 7, 1, 'pub', NULL),
(16, 7, 3, 'awd', NULL),
(17, 8, 2, 'rch', NULL),
(18, 7, 2, 'ppr', NULL),
(19, 7, 2, 'ctv', NULL),
(20, 7, 3, 'par', NULL),
(22, 7, 3, 'oth', NULL),
(30, 7, 8, 'mat', NULL),
(31, 10, 5, 'mat', NULL),
(32, 16, 3, 'ctv', NULL),
(33, 17, 2, 'pub', NULL),
(34, 18, 4, 'oth', NULL),
(35, 17, 9, 'mat', NULL),
(36, 5, 5, 'oth', NULL),
(37, 17, 4, 'oth', NULL),
(41, 3, 3, 'pub', NULL),
(42, 3, 5, 'pub', NULL),
(43, 20, 6, 'pub', NULL),
(44, 20, 7, 'pub', NULL),
(45, 21, 10, 'mat', NULL),
(46, 10, 11, 'mat', NULL),
(47, 5, 12, 'mat', 'f8bvoliiuilhrklk6gxm.jpg tl2jix34xhtndfxiguqn.jpg'),
(48, 5, 4, 'awd', '2r3e87wjod0uk3j5bde8.jpg'),
(49, 5, 3, 'rch', NULL),
(50, 5, 4, 'rch', NULL),
(53, 7, 12, 'mat', 'wqmuxaa8kiiru1b6efjx7mat1409159002.jpg'),
(54, 20, 12, 'mat', NULL),
(55, 3, 8, 'pub', NULL),
(56, 3, 5, 'awd', NULL),
(57, 3, 5, 'rch', NULL),
(58, 3, 6, 'rch', NULL),
(60, 3, 4, 'ppr', NULL),
(61, 3, 5, 'ppr', NULL),
(62, 3, 6, 'ppr', 'ivxnwkgbdwl52pcvhmtt3ppr1409216844.jpg'),
(63, 3, 4, 'ctv', NULL),
(64, 3, 4, 'par', NULL),
(65, 3, 13, 'mat', NULL),
(66, 3, 14, 'mat', NULL),
(67, 3, 6, 'oth', 't6mfbxcbgcqrpikypkpx3oth1409217174.jpg'),
(72, 22, 20, 'mat', NULL),
(79, 22, 12, 'mat', NULL),
(85, 17, 4, 'ppr', NULL),
(87, 17, 8, 'pub', NULL),
(88, 21, 21, 'mat', 'wf3o1kurwvqt02h8zglf21mat1409302908.jpg'),
(89, 25, 6, 'awd', 'os5ufwfvnja80cwmoc4g25awd1410854004.jpg'),
(90, 25, 22, 'mat', NULL),
(93, 24, 24, 'mat', ''),
(96, 24, 27, 'mat', NULL),
(98, 24, 29, 'mat', '5c9zyw0duf4rxajpzzcn24mat1411330331.jpg'),
(99, 24, 30, 'mat', NULL),
(101, 24, 8, 'awd', NULL),
(102, 24, 9, 'awd', NULL),
(103, 24, 10, 'awd', NULL),
(104, 24, 9, 'pub', NULL),
(105, 24, 7, 'rch', NULL),
(107, 24, 12, 'ppr', NULL),
(108, 24, 5, 'ctv', 'fjneaq41bduwuggjn9ky24ctv1413804227.jpg'),
(109, 24, 5, 'par', NULL),
(110, 24, 7, 'oth', NULL),
(111, 23, 11, 'awd', NULL),
(112, 26, 8, 'rch', NULL),
(113, 27, 12, 'awd', NULL),
(114, 27, 9, 'rch', NULL),
(115, 27, 13, 'ppr', 'tyw2jxyfjetl3qlrecwb27ppr1414060135.jpg'),
(116, 27, 6, 'ctv', NULL),
(117, 27, 8, 'oth', NULL),
(118, 27, 6, 'par', NULL),
(119, 27, 31, 'mat', NULL),
(120, 27, 10, 'pub', NULL),
(121, 27, 11, 'pub', NULL),
(122, 27, 32, 'mat', '0ofm190orl1tdjblwehg27mat1414064445.jpg');

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
  `document` varchar(255) DEFAULT NULL,
  `version` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ipcrtbl`
--

INSERT INTO `ipcrtbl` (`ipcr_ID`, `opcr_ID`, `user_ID`, `date_submitted`, `status`, `comments`, `remarks`, `document`, `version`) VALUES
(6, 1, 8, '2014-09-11', 'Pending', NULL, 'None', '12340000401140414.pdf', 3),
(10, 1, 17, '2014-09-11', 'Pending', NULL, 'Checked by Karen T. Brickey (05 Sep 2014)<br>Checked by Karen T. Brickey (13 Aug 2014)', '12340001301140414.pdf', 1),
(11, 1, 4, '2014-08-13', 'Saved', NULL, 'None', '12340000001140414.pdf', 1),
(12, 1, 18, '2014-08-13', 'Pending', NULL, 'Checked by Karen T. Brickey (13 Aug 2014)', '12340001401140414.pdf', 1),
(13, 1, 19, '2014-08-13', 'Accepted', NULL, 'Improve this - Karen T. Brickey (13 Aug 2014)', '12340001501140414.pdf', 1),
(14, 1, 20, '2014-08-13', 'Accepted', NULL, 'Checked by Karen T. Brickey (13 Aug 2014)', '12340001601140414.pdf', 1),
(15, 1, 21, '2014-08-13', 'Rejected', NULL, 'This is unacceptable! - Karen T. Brickey (13 Aug 2014)', '12340001701140414.pdf', 1),
(16, 1, 22, NULL, 'Draft', NULL, 'None', NULL, 1),
(17, 7, 8, '2014-09-24', 'Pending', NULL, 'None', '12340000405140814.pdf', 0);

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
  `r_quantity` int(1) DEFAULT NULL,
  `r_efficiency` int(1) DEFAULT NULL,
  `r_timeliness` int(1) DEFAULT NULL,
  `remarks` varchar(255) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `ipcr_targettbl`
--

INSERT INTO `ipcr_targettbl` (`target_ID`, `output_ID`, `ipcr_ID`, `target`, `indicators`, `actual_accom`, `r_quantity`, `r_efficiency`, `r_timeliness`, `remarks`) VALUES
(6, 7, 6, 'ajust once', 'can we figure out', '1', 1, 2, 3, 'None'),
(7, 14, 6, 'Double click to edit.', 'Double click to edit.', '2', 2, 3, 4, 'None'),
(8, 19, 6, 'Double click to edit.', 'Double click to edit.', '3', 3, 4, 5, 'None'),
(9, 15, 6, 'Double click to edit.', 'Double click to edit.', '4', 4, 5, 1, 'None'),
(10, 7, 10, 'Hello', 'is it me you''re looking for', 'a', 5, 2, 1, 'None'),
(11, 8, 10, 'Double click to edit.', 'Double click to edit.', 'hey', 3, 4, 3, 'None'),
(12, 7, 11, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(13, 7, 12, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(14, 8, 12, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(15, 19, 12, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(16, 7, 13, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(17, 8, 13, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(18, 21, 13, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(19, 14, 14, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(20, 15, 14, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(21, 19, 14, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(22, 17, 15, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(23, 7, 15, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(24, 11, 15, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(25, 7, 16, 'Double click to edit.', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None'),
(26, 8, 6, 'Double click to edit.', 'Double click to edit.', '5', 5, 1, 2, 'None'),
(27, 34, 17, 'hello', 'Double click to edit.', NULL, NULL, NULL, NULL, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `oamstbl`
--

CREATE TABLE IF NOT EXISTS `oamstbl` (
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oamstbl`
--

INSERT INTO `oamstbl` (`name`, `value`) VALUES
('about', 'UP Mindanao Online Accomplishment Management System (OAMS) is an online document management system that will facilitate automated report generation, submission and evaluation. At the moment, OAMS can generate Accomplishment Reports, Individual Performance Commitment and Review (IPCR), and Office Performance Commitment and Review (OPCR) Forms.'),
('initials', 'OAMS'),
('page_title', 'UP Mindanao OAMS'),
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
  `date` date NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `oams_messagetbl`
--

INSERT INTO `oams_messagetbl` (`message_ID`, `name`, `contact`, `subject`, `message`, `date`, `seen`, `deleted`) VALUES
(2, 'Jamaica', 'jam@a.c', 'test uleit', 'message', '2014-09-21', 1, 0),
(3, 'Kiyoko B. Blanton', '123400000', 'testing', 'uleeet', '2014-09-21', 0, 0),
(4, 'Kiyoko B. Blanton', '123400000', 'testing', 'uleeet2', '2014-09-21', 1, 0),
(5, 'Gloria V. Hubbard', '123400013', 'hello', 'phoesz', '2014-09-21', 0, 0);

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
  `status` enum('Checked','Accepted','Pending','Published','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `document` varchar(255) DEFAULT NULL,
  `document_consolidated` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `opcrtbl`
--

INSERT INTO `opcrtbl` (`opcr_ID`, `user_ID`, `period_from`, `period_to`, `date_published`, `date_submitted`, `status`, `remarks`, `document`, `document_consolidated`) VALUES
(1, 8, '2014-01-01', '2014-04-01', '2014-09-03', '2014-08-29', 'Published', 'None', '12340000401140414.pdf', NULL),
(2, 4, '2014-01-01', '2014-04-01', '2014-08-09', NULL, 'Draft', 'None', NULL, NULL),
(7, 8, '2014-05-01', '2014-08-01', '2014-09-22', NULL, 'Published', 'None', '12340000405140814.pdf', NULL),
(8, 7, '2014-09-01', '2014-12-01', '2014-08-13', NULL, 'Published', 'None', 'files/document_opcr/12340000309141214.pdf', NULL),
(9, 8, '2014-01-01', '2014-03-01', NULL, NULL, 'Draft', 'None', NULL, NULL),
(10, 4, '2014-01-01', '2014-05-01', NULL, NULL, 'Draft', 'None', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `opcr_categorytbl`
--

CREATE TABLE IF NOT EXISTS `opcr_categorytbl` (
`category_ID` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `opcr_categorytbl`
--

INSERT INTO `opcr_categorytbl` (`category_ID`, `category`, `deleted`) VALUES
(1, 'Strategic Priority', 0),
(2, 'Core Functions', 0),
(3, 'Support Functions', 0),
(4, 'New', 0),
(5, 'New 2', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `opcr_outputtbl`
--

INSERT INTO `opcr_outputtbl` (`output_ID`, `category_ID`, `opcr_ID`, `output`, `indicators`, `accountable`, `r_quantity`, `r_efficiency`, `r_timeliness`, `remarks`) VALUES
(7, 1, 1, 'BSCSCurricular revision to address the requirements of the industry, K-12 and ASEAN integration.', 'Targets: (1) Acquired list of courses that will be transferred to K-12; (2) reviewed the old revision proposal; (3) identified gap between existing curriculum and industry needs. Measures: only (1) is acquired = 3;  (1) and (2) were obtained = 4; (1) and (2) and (3) are obtained = 5', NULL, NULL, NULL, NULL, 'None'),
(8, 1, 1, 'BSAMat Curricular revision to address the requirements of the industry, K-12 and ASEAN integration', 'Targets: (1) Acquired list of courses that will be transferred to K-12; (2) reviewed the old revision proposal; (3) identified gap between existing curriculum and industry needs. Measures: only (1) is acquired = 3;  (1) and (2) were obtained = 4; (1) and (2) and (3) are obtained = 5', NULL, NULL, NULL, NULL, 'None'),
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
(32, 2, 8, 'core 4', 'jkl', NULL, NULL, NULL, NULL, 'None'),
(33, 1, 2, 'test', 'test2', NULL, NULL, NULL, NULL, 'None'),
(34, 1, 7, 'atest', 'at', NULL, NULL, NULL, NULL, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `univtbl`
--

CREATE TABLE IF NOT EXISTS `univtbl` (
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `univtbl`
--

INSERT INTO `univtbl` (`name`, `value`) VALUES
('mission', 'The University of the Philippines Mindanao is committed to lead in providing affordable quality education, scholarly research, and responsive and relevant extension services to diverse, marginalized, and deserving sectors in Mindanao and neighboring regions through its programs in the sciences and the arts, inculcating a passion for excellence, creative thinking, and nationalism in the context of cultural diversity in a global community.'),
('vision', 'The vision of UP Mindanao is expressed in the word EXCELLENCE, an acronym that means,\n"EXCEL in \nL-eadership, \nE-ducation, \nN-ationalism, \nC-ultural sensitivity, and \nE-nvironmental nurturance".');

-- --------------------------------------------------------

--
-- Table structure for table `univ_collegetbl`
--

CREATE TABLE IF NOT EXISTS `univ_collegetbl` (
`college_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `college` varchar(100) NOT NULL,
  `short` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `univ_collegetbl`
--

INSERT INTO `univ_collegetbl` (`college_ID`, `user_ID`, `college`, `short`) VALUES
(1, 4, ' College of Humanities and Social Sciences', 'CHSS'),
(2, 5, 'College of Science and Mathematics', 'CSM'),
(3, 6, 'School of Management', 'SOM'),
(4, 31, 'College Test', 'CT');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `univ_departmenttbl`
--

INSERT INTO `univ_departmenttbl` (`department_ID`, `college_ID`, `user_ID`, `department`, `short`) VALUES
(1, 1, 7, 'Department of Architecture', 'DA'),
(2, 1, 8, 'Department of Humanities', 'DH'),
(3, 1, 9, 'Department of Human Kinetics', 'DHK'),
(4, 1, 10, 'Department of Social Sciences', 'DSS'),
(5, 2, 11, 'Department of Biological Sciences and Environmental Studies', 'DBSES'),
(6, 2, 11, 'Department of Food Science and Chemistry', 'DFSC'),
(7, 2, 12, 'Department of Mathematics, Physics and Computer Science', 'DMPCS'),
(8, 4, 31, 'Department Test', 'DT'),
(9, 4, 27, 'Department Again', 'DAg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
(10, 3, NULL, 'Master in Management', 'Master in Management', 'MM', '1995-02-20', 'Graduate', 'Sample vision', 'Sample goals'),
(11, 4, 8, 'Degree Program Test', 'DP Test', 'DPT', '2014-09-11', 'Undergraduate', 'Sample vision', 'Sample goals');

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
(1, '000012345', '$2y$10$ulKxuSpkoORgumOjtA4aae/GvGNziNdksnodjrMb7Ka8tEsoJZU2.', 0),
(2, '000112345', '$2y$10$hN0N3F9epEd0ptWjoBXh4eg8KEBsdufplLvRCECEUl88WIhkZs1yi', 0),
(3, '000212345', '$2y$10$bLmvx7vkID.oXMFiiwoNVu12Y/eovcHirNIQT42em0Z9YWAHpoDx2', 0),
(4, '123400000', '$2y$10$B7erv/a9j5OHPli8T7ESle7WpF9pm12NrgHXHJEijO/jfz7ZYf4ym', 0),
(5, '123400001', '$2y$10$w95iTC2Il6aXytapnKqf0OjrphH2jtl.owySAXBOwPhs6ty8ZIU/6', 0),
(6, '123400002', '$2y$10$TBODwFR1rFW/RFnSGyAtduqks7xjnyP8oEWNrCfkYVLwHZjgJvSFm', 0),
(7, '123400003', '$2y$10$cSza7WOFYdzf8OvJv/w39O.1EeTfaJELWq0A7GUS2GF9szSMPHqnm', 0),
(8, '123400004', '$2y$10$Sz2CN29qxnNFuDMabvnxn.E2oogdLJMzB43LizMJcIxdwyHZtAomi', 0),
(9, '123400005', '$2y$10$lCo2R46aJLWK.UpuouyBvOLSC2tUqRn0qG3fHAVPwJ5AcZZ80h.r6', 0),
(10, '123400006', '$2y$10$FFKYIUjtiaYCG6aUL3WLyuIODWeYvQeSriXfVBZLjAPycUY4QVJYS', 0),
(11, '123400007', '$2y$10$EkQJPig07h41Q3xewEjhmeO8x80MbFfLbTri71WO1AszIM7j2qr9C', 0),
(12, '123400008', '$2y$10$dzFnMXjJ8PZrW4eFbuEVMOhqNyZNb9N.BzExgzq/4c5QYLhsmzAbe', 0),
(13, '123400009', '$2y$10$Gt4MxWmHI5nkFy05q6lmlOiMsq/yVHoKgGR8E5VheCw081BDVEr7O', 0),
(14, '123400010', '$2y$10$oIfulC3H9QiS5dtl2enK8uLeq6tN8CpG03rcrszYgKkPgMnsNB6ZG', 0),
(15, '123400011', 'upmin', 0),
(16, '123400012', 'upmin', 0),
(17, '123400013', '$2y$10$Wk4Y8SsMc/339N2jmrvV..q1px1i9e2jS9b8vr5SkwcecGnH2i4EO', 0),
(18, '123400014', '$2y$10$vUjPjShw8jdxXMfZ4YCTGOEdYvFLyC19ZuP7LL/BInqfg6GSTEJ6C', 0),
(19, '123400015', '$2y$10$3MIU2k4Y6fuRLUffY/AERuv731/iEOW4YtAdFhy7U/YxCF1uyCgsa', 0),
(20, '123400016', '$2y$10$wQTgK7gc30Xqc7Xj1PLRWOcl4h2OXAXLzLSI43Nq/NyIHDWZyV72.', 0),
(21, '123400017', '$2y$10$4k.9FCCLDcGiDlMrOFbl/OT5fH4kVWKvRJ5FHsqxwIsOrucrDLp6y', 0),
(22, '123400018', '$2y$10$e5T6ftx48M4AKV70diKSF.dIWH0zmT4n13hrxdpO0fLRpgEvIVt/2', 0),
(23, '123400019', '$2y$10$d6biN.hWZHYGvOOCIebxr.CfuVuvk2CWppM7dBQunLo4j5Ieinl9m', 0),
(24, '123400020', '$2y$10$IAIVW3Gg2F56aNIGbiiTN.mdO/EnI9iOnxnInF88KIrTFZZQ6EtYK', 0),
(25, '123400021', '$2y$10$.IlTLUYiaGNMorpsL/jnAuhdvylfVl1c.T8k.kMvW.JZ5SffiLf.q', 0),
(26, '123400023', '$2y$10$BqqpOcGzWTNiRj8q7w2oQOEuZPrnqYxIIHjmLi6mnDAYYYIH1JCWi', 0),
(27, '123400024', '$2y$10$9Ib2RPOYUFzsH5Q/Q3O/uuwgvC02JGiFbKFkiiOUc45Q2TY.8AYRS', 0),
(31, '143860113', '$2y$10$ofuLNO/ICgQe7BY5KwJazO3c/MlOeREnhSgCrTJLjAEz92dWG/WjS', 0),
(32, '123400026', '$2y$10$2fEmUz3.7JkrdHc.1LfQGusGNza08VDxoQJtMJCLjxMl4xk7TMmyS', 0),
(33, '123400028', '$2y$10$X6rBZiWOq8Z83GbGO273T.OLJev4C4L2eiCmcBwuwG3YNb8sq0q.6', 0),
(34, '123400025', '$2y$10$LqqdYG21psJNw5kTbJr3oemX4VvVQ4.Iarw3y1K05VQGM9TN/wMpS', 0),
(35, '123400027', '$2y$10$J5zsDNeqGaqGoBxjaLQtaeset6ExUeVtH9SXW7ggn.jKMSQ1Vovbu', 0),
(36, '123400029', '$2y$10$iDIrxjQAHZQstRETIpRtGurm6Ez3Dq9ev7ZPBfIbJZUX7n52n86uC', 0),
(37, '123400022', '$2y$10$ZlAIISWW9OidGoAo8UMEu.KgQx2tAZktrg.0xEyia7DJePnGk1K0y', 0),
(38, '123400030', '$2y$10$dZrNFhEd1O0dxlwWLeq32eQTm7krIBo9zJAqi5nKrBzCl7LYuXDnO', 0),
(39, '123400031', '$2y$10$qWNmvXmTKnwKWskOdW8AB.j7HFb3hUieFYIXAt.KPq.FylnlUMOg.', 0),
(40, '123400032', '$2y$10$LpkQaik9xX/H8YvThFkeLuhE4yC8DIkYBZ/lIBpJdxz6ddJGCIAdq', 0),
(41, '123400034', '$2y$10$CabRuEiqb7aj5gsGM9VyJOqyx19.IJH5ZsczM1hQimhZQip9.q2VG', 0),
(42, '123400035', '$2y$10$4jj72Ld40Sv21/SFhTg8WerhnSj7ixdfug.PJ0idLFzQQGjMtUJ76', 0),
(43, '123400033', '$2y$10$Vy7fEwVrccG/tnp21p0dyupoFgey6D9iZpHknMYcckyQ5qEpr5mhq', 0),
(44, '123400036', '$2y$10$w6r36LhVqV..Tv7WXfVqQum36oMX/fAVTFzu.aHIpX9O06eCyfw6i', 0),
(45, '123400037', '$2y$10$Ddvwhf1N6X5gxxFdc5Uy3edcknjW7ofczEU0.xacqiO9m05Fsy8Gq', 0),
(46, '123400038', '$2y$10$fT4.Lnj2N3HRmtfwuJBJiOhla.B2XXzPOR4xZkd.MHXRxXwjDT8z.', 0),
(47, '000312345', '$2y$10$WQTV8YHrW3N.a3DnVHXf/uRAaa9oleUefPvaGCMJVbIxS..1Nu.N2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiletbl`
--

CREATE TABLE IF NOT EXISTS `user_profiletbl` (
`user_ID` int(11) NOT NULL,
  `employee_code` varchar(9) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_type` enum('Faculty','Admin') NOT NULL,
  `faculty_code` varchar(30) DEFAULT NULL,
  `program_ID` int(11) DEFAULT NULL,
  `department_ID` int(11) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `position` enum('dean','dept_chair','none') DEFAULT NULL,
  `birthday` date NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `user_profiletbl`
--

INSERT INTO `user_profiletbl` (`user_ID`, `employee_code`, `first_name`, `middle_name`, `last_name`, `user_type`, `faculty_code`, `program_ID`, `department_ID`, `rank`, `position`, `birthday`, `pic`, `deleted`) VALUES
(1, '000012345', 'Jenny', 'M', 'Galino', 'Admin', NULL, NULL, NULL, NULL, NULL, '1994-07-08', NULL, 0),
(2, '000112345', 'Catherine', 'Kay', 'Gastone', 'Admin', NULL, NULL, NULL, NULL, NULL, '1963-12-14', 'yrfm4lregtfxnoqypmtvGastone.jpg', 0),
(3, '000212345', 'John', 'E', 'Parsons', 'Admin', NULL, NULL, NULL, NULL, NULL, '1968-02-18', NULL, 0),
(4, '123400000', 'Kiyoko', 'B', 'Blanton', 'Faculty', 'KBBlanton', 2, 2, '-', 'dean', '1982-01-06', NULL, 0),
(5, '123400001', 'Troy', 'E', 'Keller', 'Faculty', 'TEKeller', 5, 5, '-', 'dean', '1962-02-24', NULL, 0),
(6, '123400002', 'Martha', 'K', 'Stutts', 'Faculty', 'MKStutts', 9, NULL, '-', 'dean', '1991-02-01', NULL, 0),
(7, '123400003', 'Evan', 'L', 'Woodrow', 'Faculty', 'ELWoodrow', 1, 1, '-', 'dept_chair', '1964-02-18', NULL, 0),
(8, '123400004', 'Karen', 'T', 'Brickey', 'Faculty', 'KTBrickey', 2, 2, '-', 'dept_chair', '1967-08-10', NULL, 0),
(9, '123400005', 'Jacqueline', 'A', 'Morales', 'Faculty', 'JAMorales', 4, 4, '-', 'dept_chair', '1987-03-22', NULL, 0),
(10, '123400006', 'Sharon', 'D', 'Call', 'Faculty', 'SDCall', 5, 5, '-', 'dept_chair', '1970-12-07', NULL, 0),
(11, '123400007', 'Pedro', 'R', 'Morales', 'Faculty', 'PRMorales', 6, 6, '-', 'dept_chair', '1971-01-01', NULL, 0),
(12, '123400008', 'Thomas', 'W', 'Seay', 'Faculty', 'TWSeay', 8, 7, '-', 'dept_chair', '1974-03-03', NULL, 0),
(13, '123400009', 'Albert', 'A', 'Russell', 'Faculty', 'AARussell', 1, 1, '-', 'none', '1977-08-10', NULL, 0),
(14, '123400010', 'Dianne', 'A', 'Farias', 'Faculty', 'DAFarias', 1, 1, '-', 'none', '1993-04-15', NULL, 0),
(15, '123400011', 'Daniel', 'C', 'Daly', 'Faculty', 'DCDaly', 1, 1, '-', 'none', '1975-12-31', NULL, 0),
(16, '123400012', 'Kristin', 'B', 'Morford', 'Faculty', 'KBMorford', 2, 2, '-', 'none', '1983-10-16', NULL, 0),
(17, '123400013', 'Gloria', 'V', 'Hubbard', 'Faculty', 'GVHubbard', 2, 2, 'Some rank', 'none', '1991-03-04', NULL, 0),
(18, '123400014', 'Anthony', 'C', 'Whitehill', 'Faculty', 'ACWhitehill', 2, 2, '-', 'none', '1967-02-11', NULL, 0),
(19, '123400015', 'Richard', 'A', 'Savage', 'Faculty', 'RASavage', 3, 2, '-', 'none', '1994-07-26', NULL, 0),
(20, '123400016', 'Dominic', 'R', 'Martinez', 'Faculty', 'DRMartinez', 3, 2, '-', 'none', '1982-01-31', NULL, 0),
(21, '123400017', 'Lillian', 'R', 'Laberge', 'Faculty', 'LRLaberge', 3, 2, '-', 'none', '1968-07-03', NULL, 0),
(22, '123400018', 'Jack', 'A', 'Hansen', 'Faculty', 'JAHansen', 4, 4, '-', 'none', '1984-01-29', NULL, 0),
(23, '123400019', 'Peggy', 'L', 'Benedetto', 'Faculty', 'PLBenedetto', 4, 4, '-', 'none', '2014-07-22', NULL, 0),
(24, '123400020', 'Jeffrey', 'K', 'Barraza', 'Faculty', 'JKBarraza', 4, 4, '-', 'none', '1992-10-29', NULL, 0),
(25, '123400021', 'Carole', 'C', 'Brown', 'Faculty', 'CCBrown', 5, 5, '-', 'none', '1966-08-12', NULL, 0),
(26, '123400023', 'Ben', 'P', 'Banks', 'Faculty', 'BPBanks', 5, 5, '-', 'none', '1959-01-09', NULL, 0),
(27, '123400024', 'Hilda', 'D', 'Jones', 'Faculty', 'HDJones', 6, 6, '-', 'none', '1986-12-25', NULL, 0),
(31, '143860113', 'Armacheska', 'River', 'Mesa', 'Faculty', 'Armesa', 8, 7, 'Intructor', 'none', '2014-09-09', NULL, 0),
(32, '123400026', 'Ryan', 'C', 'Clark', 'Faculty', 'RCClark', 6, 6, '-', 'none', '1983-06-18', NULL, 0),
(33, '123400028', 'Gwyn', 'J', 'Johnson', 'Faculty', 'GJJohnson', 7, 7, '-', 'none', '1985-02-18', NULL, 0),
(34, '123400025', 'Ralph', 'J', 'Harris', 'Faculty', 'RJHarris', 6, 6, '-', 'none', '1972-03-12', NULL, 0),
(35, '123400027', 'Phyllis', 'K', 'May', 'Faculty', 'PKMay', 7, 7, '-', 'none', '1990-04-03', NULL, 0),
(36, '123400029', 'Susan', 'J', 'Anderson', 'Faculty', 'SJAnderson', 7, 7, '-', 'none', '1981-02-13', NULL, 0),
(37, '123400022', 'Allen', 'D', 'Katz', 'Faculty', 'ADKatz', 5, 5, '-', 'none', '1975-02-02', NULL, 0),
(38, '123400030', 'Richard', 'T', 'Ferrell', 'Faculty', 'RTFerrell', 8, 7, '-', 'none', '1975-12-20', NULL, 0),
(39, '123400031', 'Allison', 'M', 'McLain', 'Faculty', 'AMMcLain', 8, 7, '-', 'none', '1965-04-03', NULL, 0),
(40, '123400032', 'Johnny', 'B', 'Mitchell', 'Admin', NULL, NULL, NULL, NULL, NULL, '1960-04-03', NULL, 0),
(41, '123400034', 'Deborah', 'H', 'Jensen', 'Faculty', 'DHJensen', 9, NULL, '-', 'none', '1976-01-17', NULL, 0),
(42, '123400035', 'Kathleen', 'M', 'Thomas', 'Faculty', 'KMThomas', 9, NULL, '-', 'none', '1985-04-01', NULL, 0),
(43, '123400033', 'Hilda', 'K', 'Martinez', 'Faculty', 'HKMartinez', 9, NULL, '-', 'none', '1977-06-04', NULL, 0),
(44, '123400036', 'Joyce', 'D', 'Carter', 'Faculty', 'JDCarter', 10, NULL, '-', 'none', '1992-04-12', NULL, 0),
(45, '123400037', 'Joseph', 'L', 'Duke', 'Faculty', 'JLDuke', 10, NULL, '-', 'none', '1993-12-23', NULL, 0),
(46, '123400038', 'Lisa', 'A', 'Gray', 'Faculty', 'LAGray', 10, NULL, '-', 'none', '1985-06-21', NULL, 0),
(47, '000312345', 'Lori', 'K', 'Shoffner', 'Admin', NULL, NULL, NULL, NULL, NULL, '1982-02-24', NULL, 0);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomtbl`
--
ALTER TABLE `accomtbl`
MODIFY `accom_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `accom_awdtbl`
--
ALTER TABLE `accom_awdtbl`
MODIFY `award_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `accom_ctvtbl`
--
ALTER TABLE `accom_ctvtbl`
MODIFY `creative_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `accom_mattbl`
--
ALTER TABLE `accom_mattbl`
MODIFY `material_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `accom_othtbl`
--
ALTER TABLE `accom_othtbl`
MODIFY `other_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `accom_partbl`
--
ALTER TABLE `accom_partbl`
MODIFY `participation_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `accom_pprtbl`
--
ALTER TABLE `accom_pprtbl`
MODIFY `paper_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `accom_pubtbl`
--
ALTER TABLE `accom_pubtbl`
MODIFY `publication_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `accom_rchtbl`
--
ALTER TABLE `accom_rchtbl`
MODIFY `research_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `connect_accomtbl`
--
ALTER TABLE `connect_accomtbl`
MODIFY `connect_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `cumatbl`
--
ALTER TABLE `cumatbl`
MODIFY `cuma_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipcrtbl`
--
ALTER TABLE `ipcrtbl`
MODIFY `ipcr_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ipcr_targettbl`
--
ALTER TABLE `ipcr_targettbl`
MODIFY `target_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `oams_messagetbl`
--
ALTER TABLE `oams_messagetbl`
MODIFY `message_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `opcrtbl`
--
ALTER TABLE `opcrtbl`
MODIFY `opcr_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `opcr_categorytbl`
--
ALTER TABLE `opcr_categorytbl`
MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `opcr_outputtbl`
--
ALTER TABLE `opcr_outputtbl`
MODIFY `output_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `univ_collegetbl`
--
ALTER TABLE `univ_collegetbl`
MODIFY `college_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `univ_departmenttbl`
--
ALTER TABLE `univ_departmenttbl`
MODIFY `department_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `univ_programtbl`
--
ALTER TABLE `univ_programtbl`
MODIFY `program_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_profiletbl`
--
ALTER TABLE `user_profiletbl`
MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
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
-- Constraints for table `user_profiletbl`
--
ALTER TABLE `user_profiletbl`
ADD CONSTRAINT `user_profiletbl_ibfk_2` FOREIGN KEY (`program_ID`) REFERENCES `univ_programtbl` (`program_ID`),
ADD CONSTRAINT `user_profiletbl_ibfk_3` FOREIGN KEY (`department_ID`) REFERENCES `univ_departmenttbl` (`department_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
