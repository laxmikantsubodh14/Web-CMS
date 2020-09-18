-- phpMyAdmin SQL Dump
-- version 2.11.11.1
-- http://www.phpmyadmin.net
--
-- Host: mysql50-90.wc2:3306
-- Generation Time: Jun 09, 2011 at 08:07 AM
-- Server version: 5.0.77
-- PHP Version: 5.2.13


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `588518_mtguardrecruiting`
--

-- --------------------------------------------------------

--
-- Table structure for table `ja_AarEvent`
--

CREATE TABLE IF NOT EXISTS `ja_AarEvent` (
  `AarId` int(11) NOT NULL auto_increment,
  `EventName` varchar(50) NOT NULL,
  `AssetRequest` varchar(255) NOT NULL,
  `EventType` varchar(50) NOT NULL,
  `SetUpDate` date NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `DateRequested` date NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Zipcode` varchar(50) NOT NULL,
  `SetUpTime` time NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `TeamMember` varchar(50) NOT NULL,
  `RrncoName` varchar(50) NOT NULL,
  `RrncoEmail` varchar(50) NOT NULL,
  `RrncoPhone` varchar(50) NOT NULL,
  `EventCancel` enum('Y','N') NOT NULL default 'N',
  `Attend` enum('Y','N') NOT NULL default 'N',
  `SituationArose` enum('Y','N') NOT NULL default 'N',
  `Lesson` text NOT NULL,
  `VisitorNumber` int(11) NOT NULL,
  `TargetNumber` int(11) NOT NULL,
  `RpiDistributed` varchar(50) NOT NULL,
  `Appointments` int(11) NOT NULL,
  `LeadsNumber` int(11) NOT NULL,
  `Comments` text NOT NULL,
  PRIMARY KEY  (`AarId`)
) TYPE=InnoDB  AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ja_AarEvent`
--

INSERT INTO `ja_AarEvent` (`AarId`, `EventName`, `AssetRequest`, `EventType`, `SetUpDate`, `StartDate`, `EndDate`, `DateRequested`, `Address`, `City`, `Zipcode`, `SetUpTime`, `StartTime`, `EndTime`, `TeamMember`, `RrncoName`, `RrncoEmail`, `RrncoPhone`, `EventCancel`, `Attend`, `SituationArose`, `Lesson`, `VisitorNumber`, `TargetNumber`, `RpiDistributed`, `Appointments`, `LeadsNumber`, `Comments`) VALUES
(1, 'ss', '', '01', '2011-02-03', '2011-03-02', '2011-04-02', '2012-08-09', 'ss', 'ss', '211', '00:13:20', '00:12:30', '00:13:40', '3', 'ss', 'ss@gmail.com', '1343544535435', 'Y', 'Y', 'Y', 'ewewewe', 0, 0, 'we', 3, 3, 'sdsfsfsf'),
(2, 'ss', '100'' Obstacle Course,100 Obstacle Course,Inflatable GI Johnny Costume,Inflatable GI Johnny Costume', '04', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'ss', 'ss', 'ss', '00:00:00', '00:00:00', '00:00:00', 'ss', 'ss', 'ss', 'ss', 'Y', 'N', 'Y', 'dd', 0, 0, 'dd', 3, 3, 'dfdhgfdh'),
(3, 'ss', '100'' Obstacle Course,100 Obstacle Course,Inflatable GI Johnny Costume,Inflatable GI Johnny Costume', '04', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'ss', 'ss', 'ss', '00:00:00', '00:00:00', '00:00:00', 'ss', 'ss', 'ss', 'ss', 'Y', 'N', 'Y', 'dd', 0, 0, 'dd', 3, 3, 'dfdhgfdh'),
(4, 'ss', '100'' Obstacle Course,100 Obstacle Course,Inflatable GI Johnny Costume,Inflatable GI Johnny Costume', '04', '2011-02-03', '2011-03-02', '2011-04-02', '2012-08-09', 'ss', 'ss', 'ss', '00:13:30', '00:12:30', '00:13:40', '3', 'ss', 'ss@gmail.com', 'ss', 'Y', 'N', 'Y', 'dd', 0, 0, 'dd', 3, 3, 'dfdhgfdh');

-- --------------------------------------------------------

--
-- Table structure for table `ja_EventRequest`
--

CREATE TABLE IF NOT EXISTS `ja_EventRequest` (
  `EventId` int(11) NOT NULL auto_increment,
  `Agree` enum('Y','N') NOT NULL,
  `EventName` varchar(50) NOT NULL,
  `AssetRequest` longtext NOT NULL,
  `EventType` varchar(50) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `EventLocation` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Zipcode` varchar(20) NOT NULL,
  `SetUpTime` time NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `CrowdSize` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `RoiExpected` varchar(20) NOT NULL,
  `LeadsExpected` varchar(20) NOT NULL,
  `EnlistmentExpected` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `RrncoName` varchar(50) NOT NULL,
  `RrncoEmail` varchar(50) NOT NULL,
  `RrncoPhone` varchar(50) NOT NULL,
  `VendorPoc` varchar(50) NOT NULL,
  `VendorPhone` varchar(50) NOT NULL,
  `LocalPlan` text NOT NULL,
  `LocalHotel` text NOT NULL,
  `Comments` text NOT NULL,
  `Status` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`EventId`)
) TYPE=InnoDB  AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ja_EventRequest`
--

INSERT INTO `ja_EventRequest` (`EventId`, `Agree`, `EventName`, `AssetRequest`, `EventType`, `StartDate`, `EndDate`, `EventLocation`, `Address`, `City`, `Zipcode`, `SetUpTime`, `StartTime`, `EndTime`, `CrowdSize`, `Age`, `RoiExpected`, `LeadsExpected`, `EnlistmentExpected`, `Description`, `RrncoName`, `RrncoEmail`, `RrncoPhone`, `VendorPoc`, `VendorPhone`, `LocalPlan`, `LocalHotel`, `Comments`, `Status`) VALUES
(3, 'Y', 'hh1', 'Big Glove Boxing System,Big Glove Boxing System', '01', '2011-03-02', '2011-04-02', 'ddgh', 'dd', 'dd', '', '00:13:30', '00:12:30', '00:00:00', '1', 23, '2', '2', '2', 'gfffg', 'dd', 'ss@gmail.com', '34353543', 'dd', '4546465', 'tgtfgf', 'fgfdgfdg', 'fgfdghfgf', 'N'),
(4, 'Y', 'hh', 'Big Glove Boxing System,Big Glove Boxing System', '01', '2011-03-02', '2011-04-02', 'dd', 'dd', 'dd', '', '00:13:30', '00:12:30', '00:00:00', '1', 23, '2', '2', '2', 'gfffg', 'dd', 'ss@gmail.com', '34353543', 'dd', '4546465', 'tgtfgf', 'fgfdgfdg', 'fgfdghfgf', 'Y'),
(6, 'Y', 'hh12', 'Big Glove Boxing System', '01', '2011-03-15', '2011-04-25', 'ddqwe', 'dd', 'dd', '', '00:13:30', '00:12:30', '00:00:00', '1', 23, '2', '2', '2', 'gfffg', 'dd', 'ss@gmail.com', '34353543', 'dd', '4546465', 'tgtfgf', 'fgfdgfdg', 'fgfdghfgf', 'Y'),
(7, 'Y', 'pppp', '50 Round Inflatable Spider Tent,50 Round Inflatable Spider Tent,3K Honda Generator,3K Honda Generator,30'' Rock Wall (5 Lane),30 Rock Wall (5 Lane),100'' Obstacle Course,100 Obstacle Course,Concessions Trailer,Concessions Trailer', '01', '2011-03-02', '2011-04-02', 'jjj', 'jjj', 'jj', '', '00:13:30', '00:12:30', '00:00:00', '4', 33, '2', '2', '2', 'dfddgdgdg', 'ff', 'ff@dd.com', '43543645645', '34324343', '343243243', '343243543', 'fdsfdsf', 'dfsfsdfsdf', 'Y'),
(8, 'Y', 'wer', '30 Round Inflatable Spider Tent,50 Round Inflatable Spider Tent,10 Pop Up Tent,8 Pop Up Tent,32 TV w/DVD Player,X-Box 360 Controllers & Games,Rock Band,Wii Systems,Speaker System,3K Honda Generator,5K Generator,24 Rock Wall (4 Lane),30 Rock Wall (5 Lane),Big Glove Boxing System,Jousting Inflatable System,100 Obstacle Course,80 Obstacle Course,Paintball System w/Trailer,CO2 T-Shirt Air Cannon,AT-4 T-Shirt Cannon,Inflatable Football Toss,Inflatable GI Johnny Costume,M-Set Shooting Simulator,Hoop Shot Baskbetball System,Game Show System,Concessions Trailer,Field Goal Challange,Dog Tag Machine,NASCAR Challenge w/Trailer,Push Up Mat,Pull Up Bar System,Folding Table w/Black Tablecloth,30 Inflatable Arch', '06', '2011-11-16', '2011-11-21', 'jjj', 'jjj', 'jj', '444', '00:13:30', '00:12:30', '00:00:00', '4', 33, '2', '2', '2', 'dfddgdgdg', 'ff', 'ff@ddd.com', '43543645645', '34324343', '343243243', '343243543', 'fdsfdsf', 'dfsfsdfsdf', 'Y'),
(9, 'N', 'testing event', '30 Round Inflatable Spider Tent,50 Round Inflatable Spider Tent,10 Pop Up Tent,8 Pop Up Tent,32 TV w/DVD Player,X-Box 360 Controllers & Games,Rock Band,Wii Systems,Speaker System,3K Honda Generator,5K Generator,24 Rock Wall (4 Lane)', '01', '2011-03-15', '2011-04-28', 'testing location', 'aaaa', 'delhi', '2222', '00:13:30', '00:12:30', '00:00:00', '3', 23, '22', '2', '2', 'XZC c', 'rank', 'aa@aa.aa', '324353454', 'sdfd', '454654765', 'sdsa', 'dsd', 'sdd', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ja_Marketing`
--

CREATE TABLE IF NOT EXISTS `ja_Marketing` (
  `RequestId` int(11) NOT NULL auto_increment,
  `RequestDate` date NOT NULL,
  `EventName` varchar(50) NOT NULL,
  `RequestName` varchar(50) NOT NULL,
  `RequestPhone` varchar(50) NOT NULL,
  `EventDate` date NOT NULL,
  `EventLocation` varchar(50) NOT NULL,
  `VendorName` varchar(50) NOT NULL,
  `VendorPhone` varchar(50) NOT NULL,
  `VendorFax` varchar(50) NOT NULL,
  `AcceptCard` enum('Y','N') NOT NULL default 'Y',
  `TaxIDNumber` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Comments` text NOT NULL,
  `Status` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`RequestId`)
) TYPE=InnoDB  AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ja_Marketing`
--

INSERT INTO `ja_Marketing` (`RequestId`, `RequestDate`, `EventName`, `RequestName`, `RequestPhone`, `EventDate`, `EventLocation`, `VendorName`, `VendorPhone`, `VendorFax`, `AcceptCard`, `TaxIDNumber`, `Description`, `Comments`, `Status`) VALUES
(1, '2011-06-15', 'ss', 'ss', '34354654765', '2011-11-28', 'ss', 'ss', '343534545', '', 'Y', 22, 'dsfdsgdfghfhf', 'dsfdsgfdgfdgfdfdfd', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ja_Options`
--

CREATE TABLE IF NOT EXISTS `ja_Options` (
  `OptionId` int(20) NOT NULL auto_increment,
  `SeriesId` int(20) NOT NULL default '0',
  `QuestionId` int(20) NOT NULL default '0',
  `opt_name` varchar(255) NOT NULL default '',
  `IsActive` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`OptionId`)
) TYPE=MyISAM  AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ja_Options`
--

INSERT INTO `ja_Options` (`OptionId`, `SeriesId`, `QuestionId`, `opt_name`, `IsActive`) VALUES
(9, 5, 6, 'Car', 'Y'),
(8, 5, 4, 'Option2', 'Y'),
(7, 5, 4, 'Option1', 'N'),
(6, 5, 4, 'Option3', 'Y'),
(10, 5, 6, 'Scooter', 'Y'),
(11, 5, 5, 'India', 'Y'),
(12, 5, 5, 'USA', 'Y'),
(13, 5, 4, 'Option3', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ja_Questionaire_Emails`
--

CREATE TABLE IF NOT EXISTS `ja_Questionaire_Emails` (
  `EmailID` int(20) NOT NULL auto_increment,
  `Email` varchar(200) NOT NULL default '',
  `Status` enum('Y','N') NOT NULL default 'N',
  `SeriesId` int(9) NOT NULL default '0',
  PRIMARY KEY  (`EmailID`)
) TYPE=MyISAM  AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ja_Questionaire_Emails`
--

INSERT INTO `ja_Questionaire_Emails` (`EmailID`, `Email`, `Status`, `SeriesId`) VALUES
(1, 'tobe@johnsons.net', 'Y', 2),
(3, 'ashish@johnsons.net', 'Y', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ja_Questionaire_Variables`
--

CREATE TABLE IF NOT EXISTS `ja_Questionaire_Variables` (
  `VariableID` int(20) NOT NULL auto_increment,
  `SubjectLead` varchar(50) NOT NULL default '',
  `Domain` varchar(100) NOT NULL default '',
  `Path` varchar(150) NOT NULL default '',
  `PageName` varchar(150) NOT NULL default '',
  `SeriesId` int(9) NOT NULL default '0',
  PRIMARY KEY  (`VariableID`)
) TYPE=MyISAM  AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ja_Questionaire_Variables`
--

INSERT INTO `ja_Questionaire_Variables` (`VariableID`, `SubjectLead`, `Domain`, `Path`, `PageName`, `SeriesId`) VALUES
(1, 'Event Request ', 'mtguard.com ', '/janda/', 'event_request.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ja_Questions`
--

CREATE TABLE IF NOT EXISTS `ja_Questions` (
  `QuestionId` int(20) NOT NULL auto_increment,
  `SeriesId` int(20) NOT NULL default '0',
  `question` varchar(255) NOT NULL default '',
  `type` enum('1','2','3','4','5') NOT NULL default '1',
  `SortOrder` int(20) NOT NULL default '0',
  `IsActive` enum('Y','N') NOT NULL default 'Y',
  `IsRequired` enum('N','Y') NOT NULL default 'N',
  PRIMARY KEY  (`QuestionId`)
) TYPE=MyISAM  AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ja_Questions`
--

INSERT INTO `ja_Questions` (`QuestionId`, `SeriesId`, `question`, `type`, `SortOrder`, `IsActive`, `IsRequired`) VALUES
(3, 5, 'wats ur aim', '1', 6, 'Y', 'N'),
(4, 5, 'What you like?', '3', 5, 'Y', ''),
(5, 5, 'where you live ?', '2', 3, 'Y', ''),
(6, 5, 'what vehicle you have?', '4', 4, 'Y', ''),
(7, 5, 'Your comments ?', '5', 7, 'Y', ''),
(8, 5, 'Name', '1', 1, 'Y', ''),
(9, 5, 'Email', '1', 2, 'Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `ja_QuestSeries`
--

CREATE TABLE IF NOT EXISTS `ja_QuestSeries` (
  `SeriesId` int(20) NOT NULL auto_increment,
  `SeriesName` varchar(255) NOT NULL default '',
  `SortOrder` int(20) NOT NULL default '0',
  `IsActive` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`SeriesId`)
) TYPE=MyISAM  AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ja_QuestSeries`
--

INSERT INTO `ja_QuestSeries` (`SeriesId`, `SeriesName`, `SortOrder`, `IsActive`) VALUES
(5, 'Series1', 2, 'N'),
(2, 'Events Request', 2, 'Y'),
(6, 'Series4', 4, 'N'),
(7, 'Marketing Request', 2, 'Y');
