-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2015 at 08:00 AM
-- Server version: 5.6.22
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oamsdb`
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
  `status` enum('Accepted','Returned','Pending','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomtbl`
--

INSERT INTO `accomtbl` (`accom_ID`, `user_ID`, `yearmonth`, `date_submitted`, `status`, `remarks`, `document`) VALUES
(1, 4, '2014-01-01', '2015-03-05', 'Saved', 'None', '1234000000114.pdf'),
(3, 39, '2015-02-01', '2015-03-02', 'Accepted', 'Accepted by Thomas W. Seay (07 May 2015)<br>Accepted by Thomas W. Seay (07 May 2015)<br>Checked by Troy E. Keller (02 Mar 2015)<br>Checked by Troy E. Keller (02 Mar 2015)<br>Checked by Thomas W. Seay (05 Feb 2015)', '1234000310215.pdf'),
(4, 39, '2014-12-01', '2015-02-04', 'Returned', 'Please review your publications. - Thomas W. Seay (07 May 2015)<br>Accepted by Thomas W. Seay (07 May 2015)<br>Checked by Troy E. Keller (02 Mar 2015)<br>Checked by Troy E. Keller (05 Feb 2015)', '1234000311215.pdf'),
(5, 40, '2015-03-01', '2015-02-04', 'Accepted', 'Accepted by Troy E. Keller (07 May 2015)<br>Checked by Troy E. Keller (02 Mar 2015)<br>Checked by Troy E. Keller (05 Feb 2015)', '1234000320315.pdf'),
(6, 39, '2015-03-01', '2015-02-04', 'Draft', 'None', '1234000310315.pdf'),
(7, 12, '2015-03-01', '2015-05-07', 'Saved', 'w - Troy E. Keller (05 Mar 2015)<br>q - Troy E. Keller (05 Mar 2015)<br>Checked by Troy E. Keller (05 Feb 2015)', '1234000080315.pdf'),
(8, 5, '2015-04-01', '2015-03-11', 'Saved', 'None', '1234000010415.pdf'),
(9, 4, '2015-02-01', NULL, 'Draft', 'None', NULL),
(11, 12, '2014-02-01', '2015-03-24', 'Saved', 'None', '1234000080215.pdf'),
(12, 5, '2015-01-01', NULL, 'Draft', 'None', NULL),
(13, 38, '2015-01-01', '2015-03-03', 'Returned', 'Returned by Troy E. Keller (07 May 2015)<br>Approved by Thomas W. Seay (10 Apr 2015)<br>s - Thomas W. Seay (10 Apr 2015)<br>a - Thomas W. Seay (10 Apr 2015)<br>Rejected by Thomas W. Seay (10 Apr 2015)<br>Approved by Thomas W. Seay (10 Apr 2015)', '1234000300115.pdf'),
(14, 38, '2015-02-01', '2015-04-21', 'Pending', 'Approved by Thomas W. Seay (21 Apr 2015)<br>Rejected by Thomas W. Seay (21 Apr 2015)', '1234000300215.pdf'),
(15, 12, '2015-04-01', '2015-04-21', 'Saved', 'None', '1234000080415.pdf'),
(16, 5, '2014-04-01', NULL, 'Draft', 'None', NULL),
(17, 38, '2015-03-01', NULL, 'Draft', 'None', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accom_awdtbl`
--

INSERT INTO `accom_awdtbl` (`award_ID`, `award`, `start`, `end`, `source`, `type`) VALUES
(1, 'a', '2015-03-12', '2015-03-17', 'aa', 'Academe');

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
  `year` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accom_mattbl`
--

INSERT INTO `accom_mattbl` (`material_ID`, `author`, `year`, `title`) VALUES
(1, NULL, '2015', 'Test Other'),
(3, NULL, '2015', 'Avatar: Legend of Korra'),
(4, NULL, '2014', 'Bad Teacher'),
(5, NULL, '2015', 'The Big Bang Theory'),
(7, '', '2015', 'Family Guys'),
(9, NULL, '2010', 'Test'),
(10, NULL, '1994', 'Friends'),
(11, NULL, '2000', 'Dexter''s Laboratory'),
(13, '', '2015', 'Friendship With Better Lives'),
(14, NULL, '1990', 'Test'),
(16, '', '1111', 'qa'),
(18, '', '1111', 'New'),
(22, '', '1111', 'News'),
(23, NULL, '1111', 'qa'),
(24, NULL, '2222', 'q'),
(25, NULL, '2222', 'w'),
(26, '', '1992', 'Toad the Wet Sprocket'),
(27, NULL, '2010', 'Family Guy'),
(28, NULL, '1234', 'q'),
(29, NULL, '2012', 'Until');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accom_pprtbl`
--

INSERT INTO `accom_pprtbl` (`paper_ID`, `author`, `title`, `activity`, `venue`, `start`, `end`) VALUES
(1, '', 'Try', 'Conference', 'hellop', '2015-03-03', '2015-03-19');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accom_pubtbl`
--

INSERT INTO `accom_pubtbl` (`publication_ID`, `author`, `year`, `title`, `type`, `journal_volume`, `journal_issue`, `book_publisher`, `book_place`, `page`, `isi`, `peer_reviewed`, `refereed`, `popular`) VALUES
(1, NULL, 2015, 'q', 'Book', NULL, NULL, 'q', 'q', 'q', 'No', 'No', 'No', 'No'),
(2, NULL, 2016, 'w', 'Book', NULL, NULL, 'w', 'w', 'w', 'No', 'No', 'No', 'No'),
(3, NULL, 2010, 'w', 'Chapter in a Book', NULL, NULL, 'w', 'w', 'w', 'No', 'No', 'No', 'No'),
(4, NULL, 2015, 'w', 'Chapter in a Book', NULL, NULL, 'w', 'w', 'w', 'No', 'No', 'No', 'No'),
(5, NULL, 1111, 'q', 'Book', NULL, NULL, 'q', 'q', 'q', 'No', 'No', 'No', 'No'),
(6, NULL, 2015, 'Test', 'Book', NULL, NULL, 'pub', 'pub', 'pub', 'Yes', 'No', 'No', 'Yes');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accom_rchtbl`
--

INSERT INTO `accom_rchtbl` (`research_ID`, `title`, `nature`, `fund_external`, `start`, `end`, `fund_amount`, `fund_up`) VALUES
(3, 'Test', 'Basic', 'try', '2014-12-10', '2014-12-12', '213.00', NULL),
(4, 'Title', 'Basic', NULL, '2015-03-01', '2015-03-11', NULL, NULL),
(5, 'a', 'Basic', 'test', '2015-04-13', '2015-04-22', '102', '20.00'),
(6, 'a', 'Basic', NULL, '2015-05-05', '2015-05-05', NULL, '0.00'),
(7, 'All I Want', 'Applied', NULL, '2015-04-18', '2015-04-18', NULL, '10.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connect_accomtbl`
--

INSERT INTO `connect_accomtbl` (`connect_ID`, `accom_ID`, `accom_specID`, `type`, `attachment`) VALUES
(3, 1, 3, 'rch', NULL),
(4, 1, 1, 'mat', NULL),
(6, 3, 3, 'mat', NULL),
(7, 4, 4, 'mat', NULL),
(8, 5, 5, 'mat', NULL),
(10, 6, 5, 'mat', NULL),
(16, 8, 7, 'mat', NULL),
(18, 9, 9, 'mat', NULL),
(19, 8, 10, 'mat', NULL),
(20, 8, 5, 'mat', NULL),
(21, 12, 11, 'mat', NULL),
(23, 13, 13, 'mat', NULL),
(24, 14, 1, 'pub', NULL),
(25, 14, 2, 'pub', NULL),
(26, 14, 3, 'pub', NULL),
(27, 14, 4, 'pub', NULL),
(28, 14, 14, 'mat', NULL),
(29, 9, 5, 'pub', NULL),
(48, 7, 22, 'mat', NULL),
(49, 7, 23, 'mat', NULL),
(50, 7, 24, 'mat', NULL),
(51, 7, 25, 'mat', 'rihr9eupz4pubchlgjw57mat1425556517.jpg'),
(52, 9, 1, 'ppr', NULL),
(53, 11, 1, 'awd', NULL),
(54, 11, 4, 'rch', NULL),
(55, 11, 26, 'mat', 'evbfykgrhvdsrhpkdv9y11mat1426823394.jpg'),
(56, 15, 27, 'mat', NULL),
(61, 15, 5, 'rch', NULL),
(62, 15, 7, 'rch', NULL),
(63, 15, 6, 'pub', NULL),
(64, 17, 28, 'mat', 'wdaghutzjq4kwv83ifdm171430736457.jpg rntknp3kqrkpgomm53za171430736457.jpg lzbhfmbrvkgc3kexi0lk171430736457.jpg'),
(65, 15, 29, 'mat', 'mzu7omkqyazcjlbovpqa151430885278.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cumatbl`
--

INSERT INTO `cumatbl` (`cuma_ID`, `user_ID`, `period_from`, `period_to`, `date_submitted`, `status`, `document`, `current`) VALUES
(2, 12, '2013-01-01', '2015-12-31', '2015-05-08', 'Submitted', '12340000820132015.pdf', 8),
(6, 12, '2010-01-01', '2012-12-31', NULL, 'Draft', '12340000820102012.pdf', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ipcrtbl`
--

CREATE TABLE IF NOT EXISTS `ipcrtbl` (
  `ipcr_ID` int(11) NOT NULL,
  `opcr_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `status` enum('Accepted','Returned','Pending','Saved','Draft') NOT NULL DEFAULT 'Draft',
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `document` varchar(255) DEFAULT NULL,
  `version` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipcrtbl`
--

INSERT INTO `ipcrtbl` (`ipcr_ID`, `opcr_ID`, `user_ID`, `date_submitted`, `status`, `remarks`, `document`, `version`) VALUES
(3, 2, 12, '2015-04-02', 'Saved', 'None', '12340000801150415.pdf', 0),
(4, 2, 38, '2015-04-04', 'Pending', 'Checked by Thomas W. Seay (04 May 2015)<br>Accepted by Thomas W. Seay (27 Mar 2015)<br><br>Checked by Thomas W. Seay (25 Mar 2015)', '12340003002150415.pdf', 3),
(5, 3, 12, '2015-03-27', 'Saved', 'None', '05150815.pdf', 0),
(6, 4, 10, '2015-03-30', 'Saved', 'None', NULL, 0),
(7, 4, 25, '2015-03-31', 'Pending', 'Checked by Sharon D. Call (31 Mar 2015)', '12340002101150415.pdf', 1),
(8, 3, 38, '2015-05-04', 'Returned', 'Returned by Thomas W. Seay (07 May 2015)<br>Accepted by Thomas W. Seay (07 May 2015)<br>Checked by Thomas W. Seay (07 May 2015)<br>Checked by Thomas W. Seay (07 May 2015)<br>Checked by Thomas W. Seay (07 May 2015)', '12340003005150815.pdf', 0),
(9, 5, 12, '2015-04-06', 'Saved', 'None', '12340000801140414.pdf', 0),
(10, 4, 5, '2015-04-06', 'Saved', 'None', '12340000101150415.pdf', 0),
(11, 5, 38, '2015-04-22', 'Pending', 'Checked by Thomas W. Seay (22 Apr 2015)', '12340003009141214.pdf', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipcr_targettbl`
--

INSERT INTO `ipcr_targettbl` (`target_ID`, `output_ID`, `ipcr_ID`, `target`, `indicators`, `actual_accom`, `r_quantity`, `r_efficiency`, `r_timeliness`, `remarks`, `attachment`) VALUES
(3, 4, 4, 'Hello', 'World', 'a', 4, 3, 4, 'None', 'Screen Shot 2015-05-04 at 10.28.06 AM.png => d9qh0olttb4akdxcqrhs41430749254.jpg'),
(5, 7, 5, 'Double click to edit.', 'Double click to edit. a', 'yes', 2, 3, 3, 'None', 'Screen Shot 2015-05-02 at 9.19.08 PM.png => xhywmij6rmr6wjuozylq51430929830.jpg; Screen Shot 2015-05-04 at 10.28.06 AM.png => p4mhcxau9fhnmywaduzx51430937226.jpg'),
(6, 9, 6, 'Yellow Bus', 'Double click to edit.', 'Hello', 3, 3, 3, 'None', NULL),
(7, 8, 7, 'Holiday', 'Digos', NULL, 0, 0, 0, 'None', NULL),
(8, 5, 8, 'Double click to edit.', 'Double click to edit.', NULL, 0, 0, 0, 'None', NULL),
(9, 4, 3, 'Double click to edit.', 'Double click to edit.', NULL, 0, 0, 0, 'None', NULL),
(10, 10, 9, 'Double click to edit.', 'Double click to edit.', NULL, 0, 0, 0, 'None', NULL),
(11, 9, 10, 'Double click to edit.', 'Double click to edit.', NULL, 0, 0, 0, 'None', NULL),
(12, 10, 11, 'p', 'Double click to edit.', NULL, 0, 0, 0, 'None', NULL);

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
-- Table structure for table `oams_announcementtbl`
--

CREATE TABLE IF NOT EXISTS `oams_announcementtbl` (
  `announcement_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `type` enum('univ','coll','dept') NOT NULL,
  `subject` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  `attachment` text,
  `edited` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oams_announcementtbl`
--

INSERT INTO `oams_announcementtbl` (`announcement_ID`, `user_ID`, `type`, `subject`, `date`, `content`, `attachment`, `edited`) VALUES
(1, NULL, 'univ', 'test', '2015-05-07 14:18:32', '1', NULL, 0),
(2, 12, 'dept', 'test', '2015-05-07 14:32:11', '2ab', NULL, 1);

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
  `date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `star` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oams_messagetbl`
--

INSERT INTO `oams_messagetbl` (`message_ID`, `name`, `contact`, `subject`, `message`, `date`, `seen`, `star`, `deleted`) VALUES
(2, 'Jamaica', 'jam@a.c', 'test uleit', 'message', '2014-09-21 06:17:00', 1, 0, 0),
(3, 'Kiyoko B. Blanton', '123400000', 'testing', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2014-09-21 15:47:00', 1, 0, 0),
(4, 'Kiyoko B. Blanton', '123400000', 'testing', 'uleeet2', '2014-09-22 00:00:00', 1, 0, 1),
(5, 'Gloria V. Hubbard', '123400013', 'hello', 'phoesz', '2014-09-21 00:00:00', 1, 0, 0);

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
  `status` enum('Accepted','Returned','Pending','Published','Draft') NOT NULL DEFAULT 'Draft',
  `remarks` varchar(255) NOT NULL DEFAULT 'None',
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opcrtbl`
--

INSERT INTO `opcrtbl` (`opcr_ID`, `user_ID`, `period_from`, `period_to`, `date_published`, `date_submitted`, `status`, `remarks`, `document`) VALUES
(1, 5, '2015-01-01', '2015-04-01', NULL, NULL, 'Draft', 'None', NULL),
(2, 12, '2015-02-01', '2015-04-01', '2015-03-14', '2015-04-06', 'Returned', 'Returned by Troy E. Keller (07 May 2015)<br>Accepted by Troy E. Keller (07 May 2015)<br>Checked by Troy E. Keller (02 Apr 2015)', '12340000802150415.pdf'),
(3, 12, '2015-05-01', '2015-08-01', '2015-04-01', '2015-05-07', 'Published', 'None', '12340000805150815.pdf'),
(4, 10, '2015-01-01', '2015-04-01', '2015-03-30', '2015-03-31', 'Pending', 'Checked by Troy E. Keller (02 Apr 2015)', '12340000601150415.pdf'),
(5, 12, '2014-09-01', '2014-12-01', '2015-04-22', '2015-04-22', 'Pending', 'None', '12340000809141214.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `opcr_categorytbl`
--

CREATE TABLE IF NOT EXISTS `opcr_categorytbl` (
  `category_ID` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opcr_categorytbl`
--

INSERT INTO `opcr_categorytbl` (`category_ID`, `category`, `deleted`) VALUES
(1, 'Strategic Priority', 0),
(2, 'Core Functions', 0),
(3, 'Support Functions', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opcr_outputtbl`
--

INSERT INTO `opcr_outputtbl` (`output_ID`, `category_ID`, `opcr_ID`, `output`, `indicators`, `accountable`, `actual_accom`, `r_quantity`, `r_efficiency`, `r_timeliness`, `remarks`) VALUES
(1, 1, 1, 'BSCS Curricular revision to address the requirements of the industry, K-12 and ASEAN integration', 'Targets: (1) Acquired list of courses that will be transferred to K-12; (2) reviewed the old revision proposal; (3) identified gap between existing curriculum and industry needs. Measures: only (1) is acquired = 3; (1) and (2) were obtained = 4; (1) and (2) and (3) are obtained = 5.', NULL, NULL, NULL, NULL, NULL, 'None'),
(2, 2, 1, 'Organise   Teaching           Pedagogy Workshop on student-centered teaching for the DMPCS faculty', '100% faculty participation = 5; 90% faculty participation = 4; 80% faculty participation = 3', NULL, NULL, NULL, NULL, NULL, 'None'),
(3, 3, 1, 'Online administration of SATE and automated generation of SATE report', '10% done = 3; 20% done = 4;  and 30% done = 5', NULL, NULL, NULL, NULL, NULL, 'None'),
(4, 1, 2, 'BSCS Curricular revision to address the requirements of the industry, K-12 and ASEAN integration.', 'Targets: (1) Acquired list of courses that will be transferred to K-12; (2) reviewed the old revision proposal; (3) identified gap between existing curriculum and industry needs. Measures: only (1) is acquired=3; (1) and (2) were obtained = 4; (1) and (2) and (3) were obtained = 5', 'TWSeay & RTFerrell', 'TEST', 2, 4, 3, 'None'),
(5, 2, 3, 'hello', 'test', 'a', 'a', 4, 4, 4, 'a'),
(7, 2, 3, 'kitty', 'world', 'TWSeay', 'a', 5, 5, 5, 'None'),
(8, 2, 4, 'Upgrading of laboratories for research, extension and instruction', 'Creation of a committee that will look into the requirements to upgrade the laboratories of the department and recommendation was made = 3; 10% of the recommendation was met = 4; 20% of the recommendation was met = 5', 'CCBrown', 'a', 3, 3, 3, 'None'),
(9, 2, 4, 'Research Projects and Outputs', '1 research project conducted = 3; 2 research projects conducted = 4; and 3 research projects conducted = 5;', 'SDCall', 'a', 1, 2, 3, 'None'),
(10, 3, 5, 'a', 'a', 'p', 'p', 3, 3, 3, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(24) NOT NULL,
  `last_active` int(10) unsigned NOT NULL,
  `contents` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
('university', 'University of the Philippines Mindanao'),
('vision', 'The vision of UP Mindanao is expressed in the word EXCELLENCE, an acronym that means,\n"EXCEL in\nL-eadership,\nE-ducation,\nN-ationalism,\nC-ultural sensitivity, and \nE-nvironmental nurturance".\n');

-- --------------------------------------------------------

--
-- Table structure for table `univ_collegetbl`
--

CREATE TABLE IF NOT EXISTS `univ_collegetbl` (
  `college_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `college` varchar(100) NOT NULL,
  `short` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `univ_departmenttbl`
--

INSERT INTO `univ_departmenttbl` (`department_ID`, `college_ID`, `user_ID`, `department`, `short`) VALUES
(1, 1, 7, 'Department of Architecture', 'DA'),
(2, 1, 8, 'Department of Humanities', 'DH'),
(3, 1, NULL, 'Department of Human Kinetics', 'DHK'),
(4, 1, 9, 'Department of Social Sciences', 'DSS'),
(5, 2, 10, 'Department of Biological Sciences and Environmental Studies', 'DBSES'),
(6, 2, 11, 'Department of Food Science and Chemistry', 'DFSC'),
(7, 2, 12, 'Department of Mathematics, Physics and Computer Science', 'DMPCS');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `univ_programtbl`
--

INSERT INTO `univ_programtbl` (`program_ID`, `college_ID`, `department_ID`, `program`, `program_short`, `short`, `date_instituted`, `type`, `vision`, `goals`, `accreditation`) VALUES
(1, 1, 1, 'Bachelor of Science in Architecture', 'BS Architecture', 'BSA', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals', ''),
(2, 1, 2, 'Bachelor of Arts in Communication Arts', 'BA Communication Arts', 'BACA', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals', ''),
(3, 1, 2, 'Bachelor of Arts in English', 'BA English', 'BAE', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals', ''),
(4, 1, 1, 'Bachelor of Arts in Anthropology', 'BA Anthropology', 'BAA', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals', ''),
(5, 2, 5, 'Bachelor of Science in Biology', 'BS Biology', 'BSB', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals', ''),
(6, 2, 6, 'Bachelor of Science in Food Technology', 'BS Food Technology', 'BSFT', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals', ''),
(7, 2, 7, 'Bachelor of Science in Applied Mathematics', 'BS Applied Mathematics', 'BSAM', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals', ''),
(8, 2, 7, 'Bachelor of Science in Computer Science', 'BS Computer Science', 'BSCS', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals', ''),
(9, 3, NULL, 'Bachelor of Science in Agribusiness Economics', 'BS Agribusiness Economics', 'BSABE', '1995-02-20', 'Undergraduate', 'Sample vision', 'Sample goals', ''),
(10, 3, NULL, 'Master in Management', 'Master in Management', 'MM', '1995-02-20', 'Graduate', 'Sample vision', 'Sample goals', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_educationtbl`
--

INSERT INTO `user_educationtbl` (`education_ID`, `user_ID`, `major`, `minor`, `qualification`, `continuing`, `date_obtained`, `institution`, `thesis`, `city`, `country`, `notes`, `value`) VALUES
(1, 4, 'BA Communication Arts', '', 'bachelor', 'No', NULL, 'University of the Philippines', 'Thesis', 'Davao City', 'Philippines', 'notes', 2),
(2, 4, 'Master of Distance Educationa', '', 'master', 'No', NULL, 'UP Open University', '', 'Los BaÃ±os', 'Philippines', '', 3),
(7, 12, 'Test', '', 'certificate', 'No', '2015-04-09', 'a', '', 'b', 'c', '', 1),
(8, 12, 'Hey', '', 'master', 'No', '2015-03-10', 'q', '', 'w', 'e', '', 4);

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
(2, '000112345', '$2y$10$6Lsd9xt5tEmDb8OdalYiG.8wycTJ0DSH07lgYgGlNkRl1/CHUCd/O', 0),
(3, '000212345', '$2y$10$AytJ2Shdqb3xDRHTQ/Qty.nw3o3zhxCdT2MLNq6tZ87ROg3KOsbiS', 0),
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
(15, '123400011', '$2y$10$fMKYyeNVEwi1/aqH/A1aDue9zUkV17kIrNk2cUjHNvTNymxapZVwW', 0),
(16, '123400012', '$2y$10$CqkB.3gBGerb35z4WKUIKu7nIrhPmOCoBrH7HUNLnCHzuboaKzHYW', 0),
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
(31, '143860113', '$2y$10$ofuLNO/ICgQe7BY5KwJazO3c/MlOeREnhSgCrTJLjAEz92dWG/WjS', 1),
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
(47, '000312345', '$2y$10$oDHtdmfjTuGStFHo7LlV/.B44z6YgzH0pW.GrnkwJGm11EdMSUeri', 0),
(48, '123400039', '$2y$10$HJrraHBRmkFjaSXFOVVgWuzCSMt4xF9p4CfQpCBMwGXVTYEiBtw22', 0),
(49, '000412345', '$2y$10$OQCgO85dKRLExX2hHNA65eBIKFv7ADL2pyUTMp7Xqjk6Uon4by7Fa', 0),
(50, '123400040', '$2y$10$SEbUUxODlvttu/G9q3PJBOM8JC8fTCotckcINgoCWX/DjjNfdkziO', 0),
(51, '111122222', '$2y$10$b8.jBx2oOHz2ZW/6p.CZY.FrQbh7iGJBdNXgz.3Eksh54N3XY4dK2', 0);

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
  `average_set` float DEFAULT NULL,
  `students_mentored` int(11) DEFAULT NULL,
  `faculty_code` varchar(30) DEFAULT NULL,
  `program_ID` int(11) DEFAULT NULL,
  `rank` enum('Prof.','Assoc. Prof.','Asst. Prof.','Inst.') NOT NULL,
  `position` enum('dean','chair','none') DEFAULT NULL,
  `birthday` date NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profiletbl`
--

INSERT INTO `user_profiletbl` (`user_ID`, `employee_code`, `title`, `first_name`, `middle_name`, `last_name`, `suffix`, `user_type`, `average_set`, `students_mentored`, `faculty_code`, `program_ID`, `rank`, `position`, `birthday`, `pic`, `deleted`) VALUES
(1, '000012345', NULL, 'Jenny', 'M', 'Galino', NULL, 'Admin', NULL, NULL, NULL, NULL, 'Inst.', NULL, '1994-07-08', NULL, 0),
(2, '000112345', NULL, 'Catherine', 'Kay', 'Gastone', NULL, 'Admin', NULL, NULL, NULL, NULL, 'Inst.', NULL, '1963-12-14', NULL, 0),
(3, '000212345', NULL, 'John', 'E', 'Parsons', NULL, 'Admin', NULL, NULL, NULL, NULL, 'Inst.', NULL, '1968-02-18', NULL, 0),
(4, '123400000', NULL, 'Kiyoko', 'B', 'Blantons', NULL, 'Faculty', NULL, NULL, 'KBBlanton', 2, 'Inst.', 'dean', '1982-01-06', NULL, 0),
(5, '123400001', 'Assoc. Prof.', 'Troy', 'E', 'Keller', NULL, 'Faculty', NULL, NULL, 'TEKeller', 5, 'Inst.', 'dean', '1962-02-24', NULL, 0),
(6, '123400002', NULL, 'Martha', 'K', 'Stutts', NULL, 'Faculty', NULL, NULL, 'MKStutts', 9, 'Inst.', 'dean', '1991-02-01', NULL, 0),
(7, '123400003', NULL, 'Evan', 'L', 'Woodrow', NULL, 'Faculty', NULL, NULL, 'ELWoodrow', 1, 'Inst.', 'chair', '1964-02-18', NULL, 0),
(8, '123400004', NULL, 'Karen', 'T', 'Brickey', NULL, 'Faculty', NULL, NULL, 'KTBrickey', 2, 'Inst.', 'chair', '1967-08-10', NULL, 0),
(9, '123400005', NULL, 'Jacqueline', 'A', 'Morales', NULL, 'Faculty', NULL, NULL, 'JAMorales', 4, 'Inst.', 'chair', '1987-03-22', NULL, 0),
(10, '123400006', NULL, 'Sharon', 'D', 'Call', NULL, 'Faculty', NULL, NULL, 'SDCall', 5, 'Inst.', 'chair', '1970-12-07', NULL, 0),
(11, '123400007', NULL, 'Pedro', 'R', 'Morales', NULL, 'Faculty', NULL, NULL, 'PRMorales', 6, 'Inst.', 'none', '1971-01-01', NULL, 0),
(12, '123400008', '', 'Thomas', 'W', 'Seay', '', 'Faculty', 1.11, 200, 'TWSeay', 8, 'Prof.', 'chair', '1974-03-03', NULL, 0),
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
(38, '123400030', '', 'Richard', 'T', 'Ferrell', '', 'Faculty', NULL, NULL, 'RTFerrell', 8, 'Prof.', 'none', '1975-12-20', NULL, 0),
(39, '123400031', '', 'Allison', 'M', 'McLain', '', 'Faculty', NULL, NULL, 'AMMcLain', 8, 'Prof.', 'none', '1965-04-03', NULL, 0),
(40, '123400032', '', 'Johnny', 'B', 'Mitchell', '', 'Faculty', NULL, NULL, 'JBMitchell', 8, 'Prof.', 'none', '1960-04-03', NULL, 0),
(41, '123400034', NULL, 'Deborah', 'H', 'Jensen', NULL, 'Faculty', NULL, NULL, 'DHJensen', 9, 'Inst.', 'none', '1976-01-17', NULL, 0),
(42, '123400035', NULL, 'Kathleen', 'M', 'Thomas', NULL, 'Faculty', NULL, NULL, 'KMThomas', 9, 'Inst.', 'none', '1985-04-01', NULL, 0),
(43, '123400033', NULL, 'Hilda', 'K', 'Martinez', NULL, 'Faculty', NULL, NULL, 'HKMartinez', 9, 'Inst.', 'none', '1977-06-04', NULL, 0),
(44, '123400036', NULL, 'Joyce', 'D', 'Carter', NULL, 'Faculty', NULL, NULL, 'JDCarter', 10, 'Inst.', 'none', '1992-04-12', NULL, 0),
(45, '123400037', NULL, 'Joseph', 'L', 'Duke', NULL, 'Faculty', NULL, NULL, 'JLDuke', 10, 'Inst.', 'none', '1993-12-23', NULL, 0),
(46, '123400038', NULL, 'Lisa', 'A', 'Gray', NULL, 'Faculty', NULL, NULL, 'LAGray', 10, 'Inst.', 'none', '1985-06-21', NULL, 0),
(47, '000312345', NULL, 'Lori', 'K', 'Shoffner', NULL, 'Admin', NULL, NULL, NULL, NULL, 'Inst.', NULL, '1982-02-24', NULL, 0),
(48, '123400039', NULL, 'New', 'Sample', 'User', NULL, 'Faculty', NULL, NULL, 'NSUser', 13, 'Inst.', 'none', '2014-11-02', NULL, 0),
(49, '000412345', NULL, 'George', 'Lee', 'Sanchez', NULL, 'Admin', NULL, NULL, NULL, NULL, 'Inst.', NULL, '1972-10-16', 'mwopglycewf6nayciciuSanchez.jpg', 0);

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
  ADD PRIMARY KEY (`target_ID`), ADD KEY `ipcr_ID` (`ipcr_ID`), ADD KEY `output_ID` (`output_ID`);

--
-- Indexes for table `oamstbl`
--
ALTER TABLE `oamstbl`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `oams_announcementtbl`
--
ALTER TABLE `oams_announcementtbl`
  ADD PRIMARY KEY (`announcement_ID`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`), ADD KEY `last_active` (`last_active`);

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
  MODIFY `accom_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `accom_awdtbl`
--
ALTER TABLE `accom_awdtbl`
  MODIFY `award_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `accom_ctvtbl`
--
ALTER TABLE `accom_ctvtbl`
  MODIFY `creative_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accom_mattbl`
--
ALTER TABLE `accom_mattbl`
  MODIFY `material_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
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
  MODIFY `paper_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `accom_pubtbl`
--
ALTER TABLE `accom_pubtbl`
  MODIFY `publication_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `accom_rchtbl`
--
ALTER TABLE `accom_rchtbl`
  MODIFY `research_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `connect_accomtbl`
--
ALTER TABLE `connect_accomtbl`
  MODIFY `connect_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `cumatbl`
--
ALTER TABLE `cumatbl`
  MODIFY `cuma_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ipcrtbl`
--
ALTER TABLE `ipcrtbl`
  MODIFY `ipcr_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ipcr_targettbl`
--
ALTER TABLE `ipcr_targettbl`
  MODIFY `target_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `oams_announcementtbl`
--
ALTER TABLE `oams_announcementtbl`
  MODIFY `announcement_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oams_messagetbl`
--
ALTER TABLE `oams_messagetbl`
  MODIFY `message_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `opcrtbl`
--
ALTER TABLE `opcrtbl`
  MODIFY `opcr_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `opcr_categorytbl`
--
ALTER TABLE `opcr_categorytbl`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `opcr_outputtbl`
--
ALTER TABLE `opcr_outputtbl`
  MODIFY `output_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
-- AUTO_INCREMENT for table `user_educationtbl`
--
ALTER TABLE `user_educationtbl`
  MODIFY `education_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_profiletbl`
--
ALTER TABLE `user_profiletbl`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
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
ADD CONSTRAINT `ipcr_targettbl_ibfk_1` FOREIGN KEY (`output_ID`) REFERENCES `opcr_outputtbl` (`output_ID`),
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
