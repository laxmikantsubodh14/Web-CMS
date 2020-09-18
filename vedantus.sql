-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2015 at 10:28 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vedantus`
--

-- --------------------------------------------------------

--
-- Table structure for table `imp_admin`
--

CREATE TABLE IF NOT EXISTS `imp_admin` (
  `adm_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `adm_login_id` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `adm_password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `adm_conpwd` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `adm_name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `adm_status` enum('Active','Inactive') COLLATE latin1_general_ci NOT NULL DEFAULT 'Active',
  `adm_privi` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `adm_email` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `adm_address` text COLLATE latin1_general_ci NOT NULL,
  `adm_city` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `adm_state` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `adm_zipcode` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `adm_phone` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status` enum('O','S') COLLATE latin1_general_ci NOT NULL DEFAULT 'S',
  PRIMARY KEY (`adm_id`,`adm_login_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `imp_admin`
--

INSERT INTO `imp_admin` (`adm_id`, `adm_login_id`, `adm_password`, `adm_conpwd`, `adm_name`, `adm_status`, `adm_privi`, `adm_email`, `adm_address`, `adm_city`, `adm_state`, `adm_zipcode`, `adm_phone`, `status`) VALUES
(1, 'admin', 'vedantus', 'vedantus', 'ajay', 'Active', 'Utility', 'ewnsd@yahoo.com', '98,sec-15,ue,karnal', 'karnal', 'haryana', '132001', '9876354211', 'O'),
(2, 'laxmi', 'laxmi', 'laxmi', '', 'Active', '', 'laxmi@us-creations.com', 'F-31 Vinod Nagar East', 'New Delhi', 'Delhi', '110091', 'laxmi', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `imp_applyjob`
--

CREATE TABLE IF NOT EXISTS `imp_applyjob` (
  `ResumeId` int(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `CompCity` text COLLATE latin1_general_ci NOT NULL,
  `CurrentDesignation` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `EmailID` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ContactNumber` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `CCTC` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Resume` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Details` longtext COLLATE latin1_general_ci NOT NULL,
  `JobID` int(20) NOT NULL,
  `Applydate` date NOT NULL,
  PRIMARY KEY (`ResumeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=70 ;

--
-- Dumping data for table `imp_applyjob`
--

INSERT INTO `imp_applyjob` (`ResumeId`, `Name`, `CompCity`, `CurrentDesignation`, `EmailID`, `ContactNumber`, `CCTC`, `Resume`, `Details`, `JobID`, `Applydate`) VALUES
(69, 'eweeww', '110043d', 'gfdgdf', 'gfdgfd@gmail.com', '8882372485', '', '', 'sadasdsa', 24, '2015-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `imp_banner`
--

CREATE TABLE IF NOT EXISTS `imp_banner` (
  `bannerid` int(11) NOT NULL AUTO_INCREMENT,
  `PageID` int(11) NOT NULL,
  `LocationID` int(10) NOT NULL,
  `photo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `target` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `atext` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `stext` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `below` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`bannerid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `imp_banner`
--


-- --------------------------------------------------------

--
-- Table structure for table `imp_bannerlocations`
--

CREATE TABLE IF NOT EXISTS `imp_bannerlocations` (
  `LocationID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Location` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Price` float(50,2) NOT NULL,
  `PageID` int(11) NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `Width` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Hight` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`LocationID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `imp_bannerlocations`
--


-- --------------------------------------------------------

--
-- Table structure for table `imp_bannerpages`
--

CREATE TABLE IF NOT EXISTS `imp_bannerpages` (
  `PageID` int(10) NOT NULL AUTO_INCREMENT,
  `PageTitle` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`PageID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `imp_bannerpages`
--


-- --------------------------------------------------------

--
-- Table structure for table `imp_branch`
--

CREATE TABLE IF NOT EXISTS `imp_branch` (
  `BanchID` int(20) NOT NULL AUTO_INCREMENT,
  `BranchName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `CityID` int(20) NOT NULL,
  `StatesID` int(20) NOT NULL,
  `Phone` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Address` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ZipCode` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `IsActive` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`BanchID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `imp_branch`
--


-- --------------------------------------------------------

--
-- Table structure for table `imp_categories`
--

CREATE TABLE IF NOT EXISTS `imp_categories` (
  `category_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `category_status` int(20) NOT NULL DEFAULT '0',
  `categorydescription` text COLLATE latin1_general_ci,
  `smaller_picture` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `bigger_picture` varchar(100) COLLATE latin1_general_ci DEFAULT '',
  `submittime` date DEFAULT NULL,
  `status` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `meta_title` text COLLATE latin1_general_ci NOT NULL,
  `meta_description` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `meta_keyword` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `meta_abstract` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `SortOrder` int(20) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `imp_categories`
--

INSERT INTO `imp_categories` (`category_id`, `category_name`, `category_status`, `categorydescription`, `smaller_picture`, `bigger_picture`, `submittime`, `status`, `meta_title`, `meta_description`, `meta_keyword`, `meta_abstract`, `SortOrder`) VALUES
(1, 'Raw Material', 0, 'Raw Material', '', '', '2010-10-16', 'Y', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imp_city`
--

CREATE TABLE IF NOT EXISTS `imp_city` (
  `city_id` int(20) NOT NULL AUTO_INCREMENT,
  `country_id` int(20) NOT NULL,
  `StatesID` int(20) NOT NULL,
  `city` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `district_id` int(9) NOT NULL,
  `MetaTitle` text COLLATE latin1_general_ci NOT NULL,
  `MetaDescription` text COLLATE latin1_general_ci NOT NULL,
  `MetaKeyword` text COLLATE latin1_general_ci NOT NULL,
  `IsViewHome` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `CityJobDesc` longtext COLLATE latin1_general_ci NOT NULL,
  `CityConsultentDesc` longtext COLLATE latin1_general_ci NOT NULL,
  `CityEducation` longtext COLLATE latin1_general_ci NOT NULL,
  `ShortCityJobDesc` text COLLATE latin1_general_ci NOT NULL,
  `cityshort` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `IsLeftMenu` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=59 ;

--
-- Dumping data for table `imp_city`
--

INSERT INTO `imp_city` (`city_id`, `country_id`, `StatesID`, `city`, `Status`, `district_id`, `MetaTitle`, `MetaDescription`, `MetaKeyword`, `IsViewHome`, `CityJobDesc`, `CityConsultentDesc`, `CityEducation`, `ShortCityJobDesc`, `cityshort`, `IsLeftMenu`) VALUES
(57, 99, 65, 'Lucknow', 'Y', 0, '', '', '', '', '', '', '', '', '', ''),
(56, 99, 64, 'New Delhi', 'Y', 0, '', '', '', 'N', '', '', '', '', '', 'N'),
(58, 99, 65, 'Noida', 'Y', 0, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `imp_contactus`
--

CREATE TABLE IF NOT EXISTS `imp_contactus` (
  `ContactID` int(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Telephone` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Messenger` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Mess_add` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `findus` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `inforeq` longtext COLLATE latin1_general_ci NOT NULL,
  `Addeddate` date NOT NULL,
  PRIMARY KEY (`ContactID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `imp_contactus`
--

INSERT INTO `imp_contactus` (`ContactID`, `Name`, `Email`, `Telephone`, `Messenger`, `Mess_add`, `findus`, `country`, `inforeq`, `Addeddate`) VALUES
(1, 'Ajay', 'ajay@us-creations.com', '09876543212', 'MSN', 'uscreationsdev3@hotmail.com', 'Google search', 'India', 'dfsd dsf sd', '2011-09-06'),
(2, 'Sudeshna', 'sudeshnad@neuronimbus.com', '9555214398', 'MSN', 'sudeshna.neuronimbus@hotmail .com', 'Search Engine', 'India', 'Hi,\r\n\r\nThis message is concerned to the person who handles Alliances for the company.\r\n\r\nSo please forward the message to the concerned person.\r\n\r\n', '2011-09-13'),
(3, 'Mike Sanders', 'Mike@promotionalvideos.us', '216-220-4588 ', 'Yahoo', 'Mike@promotionalvideos.us', 'google', 'United States', 'Hey Guys Ã¢â‚¬â€œ\r\n Just thought that you should know that there are a lot of people out there who claim to do web design. I checked out your site and it looks hot ( you are a web design company after all!) but I do not see how you will convince new clients that they should go with your company instead of a much cheaper option. Allow me to introduce myself. My name is Dave and I work for a company called promotionalvideos.us and we do... PROMOTIONAL VIDEOS! There is no better way to sum up a complicated business or value solution than with a promotional video. Please just love seeing a strong yet simple promotional video on a home page. It says them tons of time reading and is much more entertaining and engaging. Check out some of the vids that we have done on our website www.promotionalvideos.us and see our sample videos link. I look forward to working together and building your team an amazing promotional video.\r\n Dave Sanders\r\n\r\n', '2011-09-14'),
(4, 'Mike Sanders', 'Mike@promotionalvideos.us', '6465978886', 'Yahoo', ' Mike@promotionalvideos.us', 'google', 'United States', 'Hey Guys Ã¢â‚¬â€œ\r\n Just thought that you should know that there are a lot of people out there who claim to do web design. I checked out your site and it looks hot ( you are a web design company after all!) but I do not see how you will convince new clients that they should go with your company instead of a much cheaper option. Allow me to introduce myself. My name is Dave and I work for a company called promotionalvideos.us and we do... PROMOTIONAL VIDEOS! There is no better way to sum up a complicated business or value solution than with a promotional video. Please just love seeing a strong yet simple promotional video on a home page. It says them tons of time reading and is much more entertaining and engaging. Check out some of the vids that we have done on our website www.promotionalvideos.us and see our sample videos link. I look forward to working together and building your team an amazing promotional video.\r\n Dave Sanders		\r\n\r\n', '2011-09-16'),
(5, 'shels', 'myboobooshop@gmail.com', '9196585689', 'Yahoo', 'usa', 'google', 'United Kingdom', 'Request Link exchange\r\n\r\n\r\nHello Sir/Madam,  \r\n \r\nI am seeking out possible link partners that our visitors would be interesting in visiting.\r\n \r\nI''ve found your website information and advice to be a very good fit for our visitors so I would like to exchange links with your sites.\r\n    \r\n\r\nHere is our linking detail :    \r\n======================================================================================\r\n\r\nTitle:- hire wordpress designer\r\n\r\nURL:-   http://www.freelancer.com/hire/wordpress\r\n \r\nDesc:-  Hire wordpress developers and designers on Freelancer.com. Choose from over 76,521 wordpress developers for a fraction of what you would pay locally.\r\n\r\n======================================================================================\r\n\r\nYour link will be added after your response at any of these link page below which you want :\r\n\r\n[http://www.search-the-world.com/links/internet5.html]\r\n[http://www.flashpixels.com/internet_marketing_first.html]\r\n[http://www.clippingpathspecialist.com/web-links.html?task=all_category_links&cid=15m]\r\n\r\nI hope for an early and positive response from your side . We respect you for your time and effortÃ¢â‚¬Â¦..\r\n \r\n\r\nBest Regards\r\n\r\nEmail: myboobooshop@gmail.com', '2011-09-23'),
(6, 'abdul', 'a910king@hotmail.com', '00249922857562', 'MSN', 'a910king@hotmail.com', 'google', 'Sudan', 'I would like to know you web design cost. In addition to that I would like my website to contain a map,would like to look like a map to  http://www.starbucks.com/store-locator including other normal sites features', '2011-09-23'),
(8, 'chanchal', 'imcks92@gmail.com', '8826486984', 'Yahoo', 'google', 'google', 'India', 'i have requirement e commerce site', '2011-09-27'),
(9, 'upendra', 'upendra@hsjdsd.com', '997', 'Yahoo', 'khk', 'jkh', 'India', 'kjhk', '2011-09-30'),
(10, 'jjjjjjjjj', 'hhhhhhh@hhhhhhhhh.com', '876867', 'Yahoo', 'hkjkhk', 'khkj', 'India', 'kkhk', '2011-10-06'),
(11, 'Phyllis Palacios', 'phillipbabb369@gmail.com', '0120120120', 'Yahoo', 'SEO', 'gogole', 'United States', 'Do you want to grow your business?  Do you have serious, defined sales goals?\r\n', '2011-11-05'),
(12, 'andreas', 'ar.johan@gmail.com', '0401523239', 'MSN', 'ccnat@hotmail.com', 'google', 'Australia', 'Hi \r\n\r\nI need SEO help with keyword Ã¢â‚¬Å“mortgage brokerÃ¢â‚¬Â or Ã¢â‚¬Å“home loan(s)Ã¢â‚¬Â in Australia or especially Sydney\r\n\r\nMy website www.expresshomeloan.com.au\r\n\r\nPlease quote what you can do for me (detail of your white hat SEO strategy) and the cost\r\n\r\nAlso if you place me in top 10, how long can you guarantee that I will stay in top 10? \r\n\r\nBecause there are many short term strategy to put me in top 10 for a short time only.\r\n\r\nThank you.\r\n', '2011-11-10'),
(13, 'sunil', 'purusingh2004@gmail.com', '919347045052', 'AQL/AIM', 'purusingh2004@gmail.com', 'google', 'Singapore', 'http://websitedesigningsingapore.com/\r\nSub. : Business Proposal for web design, PHP development and SEO Services\r\n				\r\n				\r\n				\r\nName : Ruchi\r\n\r\n\r\nHi,\r\n This is business development officer from websitedesigningsingapore,\r\n\r\nTo introduce, we are an singapore Web Design, PHP web Development firm and SEO company. We have over 7 years of experience in professional web designing, PHP and mysql development, web hosting with domain registration and seo services.\r\nVisite our Website: http:// websitedesigningsingapore.com/\r\n\r\nWe have been partnering various web market companies all over USA, UK, Australia Europe and Malaysia.\r\n \r\nwebsitedesigningsingapore can offer Web Design, PHP development and SEO projects on a white label basis for you at a much lower cost than what it might be in house - No compromise on quality!\r\n\r\nNote that we have good and professional manpower and we are looking for work or project.\r\n\r\nThis is Html static website::\r\n---------------------------------------\r\n&#61607;	http://dwarakahighschoolhyd.com/\r\n&#61607;	http://gdcs.ws/\r\n&#61607;	http://www.sowminet.com/\r\n&#61607;	http://shrgroup.in/\r\n&#61607;	http://www.vikramskishtionthelake.com\r\n&#61607;	http://www.benfranklin.in/\r\n&#61607;	http://www.americanouk.com/index.html\r\n&#61607;	http://afrohairshow.com/\r\n&#61607;	http://sudiksha.in/\r\n\r\n \r\nOur Primary Services includes:-\r\n \r\n&#61607;	Web Design \r\n&#61607;	PHP and mysql web Development\r\n&#61607;	Seo training(Online SEO training too)\r\n&#61607;	Joomla\r\n&#61607;	Drupal\r\n&#61607;	Wordpress\r\n&#61607;	All type of SEO services\r\n&#61607;	Ecommerce\r\n&#61607;	Flash Designs\r\n&#61607;	Adwords\r\n \r\nDo let me know if you are interested and I would be happy to share our Methodologies, past work details and client Testimonials.\r\n \r\nI look forward to your mail.\r\n \r\nFore more information please visit: - http:// websitedesigningsingapore.com   \r\nKind Regards,\r\nRuchi , \r\nSingapore\r\nBusiness Development Manager\r\nE_Mail: purusingh2004@gmail.com\r\nSkype:purnendu_ranjan\r\nmob: 91-9347045052\r\n', '2011-11-18'),
(14, 'Marty', 'mrmartymartin@gmail.com', '8005551212', 'Yahoo', 'mrnobody', 'google', 'United States', 'I am an SEO professional who works for a 150 million dollar company, but I''m looking to start my own SEO company using resources offered by companies like yours.  Do you have a white-label reseller program for business owners?', '2011-11-22'),
(15, 'Adeolu ajadi', 'adecasper1@yahoo.com', '2348024241705', 'Yahoo', 'adecasper1@yahoo.com', 'search', 'Nigeria', 'The idea is to have a promotional website aimed at promoting our brand name and to be able to sell this brand name online; also I would like to have an online community that registration is basically by referral (but not limited to it) and for people to see their down line (as people they refer register). There will also be a segment called CRAZY HITS: this segment will show how popular an individual is, the popularity will be show in numbers and it can be added to by clicking on a button under the name of the individual. The popularity numbers will be converted to dollars but it will not be redeemable in cash but can be used to purchase products on the website.\r\nThere will also be a segment called FACE OF 8SINS.COM: this will feature popular artiste selected by our board or by popular demands.\r\nThere will also be an adverts section where members of the community can advertise their products and services. \r\nWe would like the website to be very catchy, evocative of a fashion and style website with the functionality of facebook.com but we donÃ¢â‚¬â„¢t want to be limited to that and we are not limiting you and your creativity. \r\nFacebook and twitter integration will be added so you can post and twit from the site and back from the social networks.  \r\nPlease send us your price and if it includes hosting and domain. If it does not please suggest.\r\n', '2011-11-24'),
(16, 'Marcia DaleÃ‚ ', 'marciadale.seo37@gmail.com', '012-345-6789', 'Yahoo', '1', 'yahoo', 'Uruguay', 'The internet has become the worldÃ¢â‚¬â„¢s marketplace.  You can do business all over the world. But you have to stand out from your competition.  ItÃ¢â‚¬â„¢s all in the website, linking, keywords --  all the tools of Search Engine Optimization.  We know them. Let us show you how we can help you.\r\n', '2011-12-05'),
(17, 'ankit pandey', 'ankitpandey09@gmail.com', '9049958803', 'Yahoo', 'ankit_nmims@yahoo.in', 'campus recruitment  ', 'India', 'respected sir,\r\n\r\ni am student of B.tech final year (comp-sci). i am intrested to join your company. Sir can u please provide me  the recruitment process of your company.\r\n \r\nkindly provide me recruitment information', '2011-12-05'),
(18, 'Chintan Parikh', 'chintan@archisys.in', '9327199271', 'MSN', 'archisys@live.com', 'Web', 'India', 'Hi,\r\nGreetings from Stallion Archisys Limited!\r\n\r\nWe would like to take an opportunity to introduce ourselves as a web development firm which is based in India. We welcome you to Outsource your web design as well as programming needs to us at affordable prices.\r\n\r\nFollowing is the list of services we offer:\r\n- PSD to HTML (jpg, png , AI all image formats can do)\r\n- Document to HTML\r\n- PSD to Joomla Template\r\n- PSD to Wordpress Template\r\n- CMS Development (Joomla , Wordpress , Drupal)\r\n- Shopping Cart Development (Virtumart , OSCommerce etc)\r\n- Php , ASP.net , Mysql , MSSQL etc core programming\r\n- JQuery , CSS3 , Ajax etc Scripting programming\r\n\r\nWe are into this outsourcing business for the past 5 years.We challenge, every 1 of 2 outsourcing clients will return back to us for more business with more gain.\r\n\r\nWe have a technically rich team with adequate experience to turn targets to reality.  We are young and dynamic. Learning new trends and technologies has always been our passion. We would like to work with a company or client who can offer challenges and appreciate quality.\r\n\r\nPlease get in Touch with us on\r\nchintan@archisys.in\r\n\r\nYour queries and questions all are invited. Trust us , We wonÃ¢â‚¬â„¢t disappoint You.\r\n\r\nRegards,\r\nChintan Parikh\r\nStallion Archisys Limited', '2011-12-08'),
(19, 'Marcia Dale', 'marciadale.seo30@gmail.com', '0120120120', 'MSN', 'West Waterman Street', 'Increase Leads and Sales', 'United States', 'The internet has become the worldÃ¢â‚¬â„¢s marketplace.  You can do business all over the world. But you have to stand out from your competition.  ItÃ¢â‚¬â„¢s all in the website, linking, keywords --  all the tools of Search Engine Optimization.  We know them. Let us show you how we can help you.\r\n', '2011-12-14'),
(20, 'shivam pandey', 'info@semmiami.com', '979-553-7786', 'Yahoo', 'christisem', 'google', 'United States', 'Dear Sir,\r\n\r\n\r\n\r\nWe would like to introduce ourselves as a Search Engine Optimization company based out of the National Capital Region in India.\r\n\r\n\r\n\r\nTo give you a quick background on Zoro Communications - we are a ISO 9001:2000 certified company located in New Delhi. We have been in business for the last 4 years and currently our team consists of web developers ( inclusive of programmers in .NET and PHP), designers, content writers, link builders, SEO & SEM experts.\r\n\r\n\r\n\r\nAt the moment we employ over a 100 people all located out of one development center in India. The majority of the work that we do is with offshore customers and therefore we are well accustomed to working across different time zones.\r\n\r\n\r\n\r\nWe are looking for specific alliances and partnerships with companies like yourselves wherein the a some of the SEO work can be outsourced to our team in India; our fundamental business model is to work with partners and hence we can safely guarantee complete confidentiality of the work being done for you. We also believe in working in a completely transparent manner and hence you would have completed access to our team at all times; we feel that a partnership between our companies could prove to be mutually beneficial as we could assist you in expanding your team in a cost effective manner.\r\n\r\n\r\n\r\nPlease do let me know if you would be interested in taking this discussion further and we would be happy to provide additional information about our scope of services.\r\n\r\n\r\n\r\nWe will look forward to hearing from you.\r\n\r\n\r\n\r\nBest\r\n\r\nShivam\r\n\r\nSkype: semmiami | Zoro Communications India', '2011-12-17'),
(21, 'NAVNIT', 'nksingh@whitenetgroup.com', '9540055144', 'Yahoo', 'google', 'google', 'India', 'hello sir \r\nmy name is navnit singh i am from the sales department of whitenetgroup basically we are service provider company and we are ready to work on new projects of web site.we have 12 developer on the php technology so we are feeling good about taking web site project of the local market. ', '2011-12-20'),
(22, 'manoj', 'manojklaur@gmail.com', '9899010801', 'Yahoo', 'manoj_dewdrops@yahoo.co.in', 'google search', 'India', '   \r\n                                                                              OSB\r\nOSB is a website which promised todayÃ¢â‚¬â„¢s modern age consumer to deliver convenience of shopping most of their needs.\r\nOSB has planned to come in Grocery items, Shoes, Apparels, Electronics, Cosmetics, Medicine, Home DÃƒÂ©cor and many others which are under consideration.\r\nDeliverables Expected\r\nHome Page designing\r\nWe require aesthetic design with good navigation skill.\r\nThe home page should be design in such a way that visitor should never lose their interest and can have the complete synopsis of the site from the main page itself.\r\nSite should have all the basic links like\r\nÃ¢â‚¬Â¢	Category/subcategory = All categories should be presented in very aesthetic way with images and includes the subcategory \r\n Admin should be able to add unlimited no of categories and subcategories.\r\nAdmin should be able to change banners at both category and subcategory pages.\r\nÃ¢â‚¬Â¢	Chat box =Visitor should be able to talk to customer care executive 24*7 and if executive is not available it should show offline.\r\nÃ¢â‚¬Â¢	Feedback/Suggestion/complaint box = It should be available at the home page only, for easy feedback of our customer. And we value our customer the most.\r\nÃ¢â‚¬Â¢	Search option= Main search /advanced search /category search option\r\nÃ¢â‚¬Â¢	Sort option    = low price to high, High price to low, New, relevance,discount,\r\nÃ¢â‚¬Â¢	Sign in/ sign out option\r\nAdmin should be able to add/change banners at sign in and sign out page. \r\nÃ¢â‚¬Â¢	New user Register option\r\no	Mandatory= Name(first,middle,last), Address(line 1, city,pincode, near by landmark) , Mobile no, email-id\r\no	Non-mandatory =Image, Qualification,Salaried /business man, Field, Salary ranges, Designation, Designation description, office address,  Marital status, Wife name, wife occupation, Dob, Dom, Gender, Children=yes/no, No of children (only if he click yes),  Annual household income, From where you heard about us\r\no	Visitor should be able to add 4 more address and alternate e-mail id.\r\nÃ¢â‚¬Â¢	Super sale option=Should show all the discounted products category wise.\r\nÃ¢â‚¬Â¢	Super combo deals =Admin should able to banners of combo deals and should be able to add to two/three products to form a combo deals.\r\nÃ¢â‚¬Â¢	Full screen view \r\no	Each visitor should be able to view single item with ability to buy and scroll next items.\r\no	Should also have an option of magnifier\r\nÃ¢â‚¬Â¢	WhatÃ¢â‚¬â„¢s new option\r\no	Show all the new products added category wise.\r\nÃ¢â‚¬Â¢	Hot product \r\no	Show products marked as hot by admin\r\nÃ¢â‚¬Â¢	Shopping cart \r\no	Easily accessible from all pages and show their no of items added in their cart.\r\nAnd all the other necessary and suggested by you options. \r\n Product Page\r\nVisitor should be able to view all products under one category on a single page only or atleast 200 items on a single page.\r\nProduct listing page\r\nÃ¢â‚¬Â¢	Product name\r\nÃ¢â‚¬Â¢	Brand\r\nÃ¢â‚¬Â¢	Add to shopping cart\r\nÃ¢â‚¬Â¢	Thumbnail image/Full screen view \r\nÃ¢â‚¬Â¢	Price tag\r\nÃ¢â‚¬Â¢	Discounted price\r\nÃ¢â‚¬Â¢	Price % off\r\nÃ¢â‚¬Â¢	Price amount saved\r\nÃ¢â‚¬Â¢	Buy button\r\nÃ¢â‚¬Â¢	Quantity option\r\nProduct detail page\r\nÃ¢â‚¬Â¢	Name\r\nÃ¢â‚¬Â¢	Brand\r\nÃ¢â‚¬Â¢	Add to shopping cart\r\nÃ¢â‚¬Â¢	Product big image \r\nÃ¢â‚¬Â¢	Thumbnail image\r\nÃ¢â‚¬Â¢	E-mail to friend \r\nÃ¢â‚¬Â¢	Description\r\nÃ¢â‚¬Â¢	Price tag\r\nÃ¢â‚¬Â¢	Offer price\r\nÃ¢â‚¬Â¢	Size \r\nÃ¢â‚¬Â¢	Quantity\r\nÃ¢â‚¬Â¢	Related product\r\nÃ¢â‚¬Â¢	Model\r\nÃ¢â‚¬Â¢	Enlarged preview option\r\nÃ¢â‚¬Â¢	Price % saved\r\nÃ¢â‚¬Â¢	Price amount saved\r\nÃ¢â‚¬Â¢	Product shipment days\r\nShopping cart\r\nÃ¢â‚¬Â¢	Add unlimited products\r\nÃ¢â‚¬Â¢	Manage quantity of individual product\r\nÃ¢â‚¬Â¢	Sub total\r\nÃ¢â‚¬Â¢	Total cost (Tax, OSB warranty, Delivery cost)  \r\nÃ¢â‚¬Â¢	Remove items from the cart\r\nÃ¢â‚¬Â¢	Empty cart\r\nÃ¢â‚¬Â¢	Confirm their order by checking out\r\nÃ¢â‚¬Â¢	Accessible from all pages\r\nÃ¢â‚¬Â¢	Apply coupon\r\nÃ¢â‚¬Â¢	Apply gift voucher\r\nÃ¢â‚¬Â¢	Continue shopping or check out\r\nUser Account\r\nÃ¢â‚¬Â¢	Personal information /Edit option /Change password/ Add new address\r\nÃ¢â‚¬Â¢	Shopping cart-continue order Ã¢â‚¬â€œconfirm order \r\nÃ¢â‚¬Â¢	Order history\r\nÃ¢â‚¬Â¢	Newsletter subscription\r\nÃ¢â‚¬Â¢	Add other address\r\nÃ¢â‚¬Â¢	Order status /payment status/ delivery status\r\nÃ¢â‚¬Â¢	Cancel orders and refunds\r\nÃ¢â‚¬Â¢	Print option\r\nÃ¢â‚¬Â¢	Invite friends/refer to friends\r\nÃ¢â‚¬Â¢	Bookmark us\r\nÃ¢â‚¬Â¢	Rewards points/Redeem rewards points\r\nÃ¢â‚¬Â¢	Wish list \r\nÃ¢â‚¬Â¢	Share your likes with your friends\r\nÃ¢â‚¬Â¢	Use facebook account to simplify setting up your account\r\nAdmin \r\nÃ¢â‚¬Â¢	Sales stats( order reports/deli very report /area wise report/profit wise report)\r\nÃ¢â‚¬Â¢	Traffic stats \r\nÃ¢â‚¬Â¢	News letter reports\r\nÃ¢â‚¬Â¢	Add banners at category page/subcategory page/log in page\r\nÃ¢â‚¬Â¢	Newsletter/banners\r\nÃ¢â‚¬Â¢	Add unlimited categories/subcategories/\r\nÃ¢â‚¬Â¢	Minimum order value restriction\r\nÃ¢â‚¬Â¢	Area restriction  = \r\nÃ¢â‚¬Â¢	Set product pricing to multiple customer types =  \r\nÃ¢â‚¬Â¢	Copy to other categories/subcategories\r\nÃ¢â‚¬Â¢	Manage  banners /testimonial/faqs\r\nÃ¢â‚¬Â¢	Different themes for different occasion =require at  least 5-6 themes to change the outlook of the website on different occasion like Diwali, Valentine day, Holi, \r\nÃ¢â‚¬Â¢	Register Mobile confirmation \r\nÃ¢â‚¬Â¢	Register e-mail confirmation \r\nÃ¢â‚¬Â¢	Invoice generation\r\nÃ¢â‚¬Â¢	MemberÃ¢â‚¬â„¢s management\r\nÃ¢â‚¬Â¢	Product management\r\nÃ¢â‚¬Â¢	OrderÃ¢â‚¬â„¢s management\r\nÃ¢â‚¬Â¢	Manage testimonial/Manage faqÃ¢â‚¬â„¢s\r\nÃ¢â‚¬Â¢	Manage shipping\r\nÃ¢â‚¬Â¢	Manage admin settings\r\nÃ¢â‚¬Â¢	Print options\r\nÃ¢â‚¬Â¢	Manage coupons system \r\nÃ¢â‚¬Â¢	Mange gift voucher\r\nÃ¢â‚¬Â¢	Mange OSB warranty\r\nÃ¢â‚¬Â¢	Manage all three delivery  \r\nOTHERÃ¢â‚¬â„¢S\r\nHome delivery =Free home delivery 3 days/ Express within 24 hours/Fast=within 2 days\r\nOSB warranty on all products= silver pack 5% of total cost for 1 year , Gold pack 8 % of total cost for 2 year\r\nCoupon system /Discount voucher/Gift voucher\r\nFront page lower end\r\nAbout us\r\nContact us\r\nTerms and condition\r\nFaqÃ¢â‚¬â„¢s & Help\r\nReturns & cancellation policy\r\nShpping policy & charges\r\nBolg\r\nFace book & twitter\r\n\r\n Other service offered by you \r\nPayment gateway integration cost\r\nSms gateway\r\nSsl certificate integration cost\r\nSEO/SMO cost\r\nWeb hosting cost\r\nTotal cost\r\nTime to design and final deployment of website\r\nOtherÃ¢â‚¬â„¢s related services You offer or Suggest\r\nFinally why should we select you \r\n1.	\r\n2.	\r\n3.	\r\n4.	\r\n5.	\r\n6.	\r\n\r\nDisclaimer:\r\nThis document is for reference only and these deliverables are not finalized yet. Changes in these deliverables are possible. Suggestions from your side will be appreciated.\r\nContact \r\nAmit Tyagi       = 9868640860\r\nManoj K. Laur = 9899010801\r\n \r\n Logistic\r\nSms\r\n', '2011-12-22'),
(23, 'Dheeraj Thakur', 'support@kangaroowings.com', '-', 'Yahoo', '-', 'GOGLE', 'India', 'please, this is request to exchange links...\r\n\r\nOur details:\r\n\r\nTitle - Internet Marketing training \r\nDescription - Internet Marketing Advanced Training institute in delhi noida ncr offering advance \r\n\r\ndigital marketing ppc training affiliate marketing & email marketing courses with google adwords \r\n\r\ncertification exam and much more. Get complete online & offline internet marketing classes at our \r\n\r\ninstitute.\r\nURL - http://www.kangaroowings.com/internet-marketing-course.html\r\n\r\nWe will put your link here...\r\n\r\nhttp://www.kangaroowings.com/links/\r\n\r\nhttp://www.kangaroowings.com/contactus.html\r\n\r\nwe are waiting for your positive and quick reply.\r\n\r\nThanks\r\n\r\nDheeraj\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '2011-12-22'),
(24, 'Wissam', 'info@itessentials.me', '0502648691', 'MSN', 'itessentialsme', 'Google', 'United Arab Emirates', 'Hi,\r\n\r\nMy company in UAE is currently overwhelmed with Web Development projects. I need to outsource projects to release my load and delegate ativitites.\r\n\r\nI need to be contacted by you to agree on the procedure of quoting and proposing and some time frames.\r\n\r\nI usually promise my customers with 3 homepage designs and a detailed proposal in 1 week.\r\nI also promise them to deliver their project in timeframes like 1 week to 2 months max.\r\n\r\nCan you comply to those restrictions ?? If so, please contact me. \r\n\r\nRegards,\r\nWissam', '2011-12-25'),
(25, 'pramod dabhade', 'peter_pan3553@yahoo.com', '8976429943', 'Yahoo', 'peter_pan3553', 'google', 'India', 'Hello sir/madam\r\n     \r\n  We deals in all software, website design, SEO, mass mailing, bulk sms, email campain as well as domain parking work. We are Maharastra based IT co. We have experienced staff of php, jumla, drupal, wordpress, .axps devlopers with MCA, BE, BCS etc etc. We provide 24 hours customer support to our clients.. If u willing to give us your website work than we assure u about the service n quality.\r\nThank n Regards\r\nPramod Dabhade\r\nMarketing Head\r\nPrime Infonet\r\nwww.primeinfonet.comYahoo Id- peter_pan3553\r\nGtalk- primeinfontt\r\nskype - primeinfonet', '2011-12-25'),
(26, 'stephen smith', 'stephen.smith@infinity-intellectual.com', '13023534442', 'ICQ', 'stephen', 'google', 'United States', 'Hi, \r\n\r\n        My name is Stephen smith and I am curious to know if you have any Email Marketing or Email Lists requirement for your company to increase your ROI. \r\n\r\nWe are a Global Database Company with  Multi Channel  Marketing Services,  Specialized in B2B lists, B2C lists, Direct Marketing Lists, Consumer Lists, Tele-Prospecting Lists, Email Lists, etc. across the Globe for all major Industry verticals with a data pool of over 20 Million records with OPT-IN and  double verified Emails.\r\n\r\nOur list comes with complete information such as: Company Name, URL, First Name, Last Name, Title, Opt-in Email Address, and Mailing Address with City, State, Zip Code, Country, Phone Number, Fax Number, Industry, and Revenue Size & Employee Size\r\n\r\nLet me know if you are interested in any of the below mentioned Pre-Packaged Global Email Lists:\r\nAll BUSINESSES LISTS	COUNTS	INDUSTRY SPECIFIC LISTS	COUNTS	INDUSTRY SPECIFIC LISTS	COUNTS\r\nFortune 1000 companies	20,000+	Biotechnology	7,500+	Retail	100,000+\r\nGlobe Businesses	20 Million+	Business Services	100,000+	Schools, Colleges & Universities	450,000+\r\nAmerican Businesses	10 Million	Construction & Materials	35,000+	Sports & Entertainment	10,000+\r\nAustralian Executives	150,000+	Finance & Banking	250,000+	Technology Companies	80,000+\r\nCanadian Executives	250,000+	Food & Beverage	6,000+	Telecom	25,000+\r\nEurope Executives	500,000+	Government & Public Sector	12,000+	Transportation & Logistics	25,000+\r\nUK Executives	400,000+	Hospitality	65,000+	Veterinary	10,000+\r\nAfrican Executives	12,500+	HR & Recruiting	150,000+	TITLE SPECIFIC LISTS	COUNTS\r\nAsia Pac Executives	25,000+	Insurance	60,000+	C-Level Executives	1Million+\r\nIndian Executives	200,000+	Legal Services	40,000+	Sales & Marketing Executives	500,000+\r\nMiddle East	12,500+	Manufacturing	100,000+	IT Executives	150,000+\r\nTechnology Users	350,000+	Media and Publishing	40,000+	Health Care Executives	250,000+\r\nINDUSTRY SPECIFIC	COUNTS	Metal & Mining	10,000+	Doctors, Physicians & Dentists	350,000+\r\nAdvertising	75,000+	Non-Profit Org.	100,000+	Real Estate Agents	500,000+\r\nAerospace	5,000+	Oil, Gas & Energy	15,000+	Engineers	45,000+\r\nAgriculture	10,000+	Pharmaceutical	100,000+	CONSUMERS LISTS	COUNTS\r\nAutomotive	20,000+	Real Estate	120,000+	North American Consumers	40 Million\r\n\r\nOur Primary Services Include Ã¢â‚¬â€œ Email Lists, Email and Data Appending, Reverse Appending, Data Cleansing, Email Marketing, Data Entry Projects and many more. \r\n\r\nCustomized Email List Ã¢â‚¬â€œ We can help you in building & sourcing contacts for your specific target criteria such as : Geography, Industry, Titles if any etc , so that I can come up with the counts for the same.\r\n\r\nAppending Ã¢â‚¬â€œ If you''ve built a database of your customers, and want to start to communicate with them via email, but you don''t have their email addresses then we will allow you to build your online customer database by giving you your customers most current email address.\r\n\r\nWeÃ¢â‚¬â„¢d like to help you grow your business.\r\n\r\nThanks and waiting for your reply.\r\n\r\nStephen Smith |Business Development Executive |\r\n Phone: 1-302-353-4442 |\r\nEmail: Stephen.smith@infinity-intellectual.com 		   \r\nWebsite: www.infinity-intellectual.com \r\n \r\n&#61520; Before printing, think about the environment          \r\n\r\nTO unsubscribe from our Mailing list please reply REMOVE to  Stephen.smith@infinity-intellectual.com  \r\n************************************************************************ NOTICE ***********************************************************************\r\nThis email message, including any attachments, may contain important information exclusively provided for intended recipients or authorized representatives of the intended recipients.  Any dissemination of this e-mail by anyone other than an intended recipient or authorized representatives of the intended recipients is strictly prohibited. If you are not a named recipient or authorized representatives of the intended recipients, you are prohibited from any further viewing of the e-mail or any attachments or from making any use of the e-mail or attachments. If you believe you have received this e-mail in error, notify the sender immediately and permanently delete the e-mail, any attachments, and all copies thereof from any drives or storage media and any printouts of the e-mail or attachments.\r\n******************************************************************************************************************************************************\r\n\r\n', '2011-12-27'),
(27, 'hlkjb', 'khvb lkjb@j.com', '54545465465', 'Yahoo', 'vkjh@g.o', 'hg kjhv kjh', 'Aruba', 'jh kjb lkjblkjbkjbkjbklj', '2012-01-13'),
(28, ' Syed Ahmed ', 'syedahmedsahar@gmail.com', '+91-9958212692', 'Yahoo', 'syedahmedsahar@gmail.com', 'Internet', 'India', 'As we are a company in India looking for Business Relationship with a cost effective way currently we are working with IT & US Healthcare.', '2012-01-19'),
(29, 'krishna mehta', 'krishna@k3webcreation.com', '9819051707', 'Yahoo', 'km001_ta', 'website', 'India', 'call me', '2012-01-30'),
(30, 'Ricky Williams', 'ricky.williams@infinityintellectuals5.com', '302-353-4442', 'ICQ', 'infinity.rickywilliams@gmail.com', 'google', 'United States', 'Hi,\r\nMy name is Ricky Williams from a leading list management & lead generation company.\r\nWe help our clients in Demand generation and Lead generation by using our B2B and B2C email lists along with our Data and Email Appending services.\r\nOur core services include: Email Lists, Data Appending, Email Appending, Telemarketing, Direct Mail marketing etc.\r\nUSPÃ¢â‚¬â„¢s of our company: Faster Deliverability, affordability, works based on clientÃ¢â‚¬â„¢s budget, global coverage, guarantee on services, unlimited usage on our lists etc.\r\nDATABASES\r\nÃ¢â‚¬Â¢	US & UK Business List \r\nÃ¢â‚¬Â¢	International database  \r\nÃ¢â‚¬Â¢	American Business Executives List \r\nÃ¢â‚¬Â¢	Technology List \r\nÃ¢â‚¬Â¢	IT Professionals List \r\nÃ¢â‚¬Â¢	HR & Recruiting Executives List \r\nÃ¢â‚¬Â¢	C-Level Executives List \r\nÃ¢â‚¬Â¢	Health Care Industry List \r\nÃ¢â‚¬Â¢	Marketing Executives List \r\nÃ¢â‚¬Â¢	Sales Executives List \r\nÃ¢â‚¬Â¢	Finance & Banking Industry List \r\nÃ¢â‚¬Â¢	Legal Services Industry List \r\nÃ¢â‚¬Â¢	Manufacturing Industry List \r\nÃ¢â‚¬Â¢	Insurance Industry Executives List \r\n\r\nOr you can also get a readymade list where you just define your target audience and give us any of the following data, as per your needs:\r\nÃ¢â‚¬Â¢	Industry \r\nÃ¢â‚¬Â¢	Titles \r\nÃ¢â‚¬Â¢	Geographical Area \r\nÃ¢â‚¬Â¢	Contact type \r\nÃ¢â‚¬Â¢	Revenue type \r\nÃ¢â‚¬Â¢	Size of Company \r\n\r\nI hope you are the right person to discuss about this in your company, if not please refer me to the right person so that I can discuss more about our services.\r\nIf you are the right person, I am sure you will be looking for email lists for marketing purpose; if yes let me what kind of list you are looking for and the type of list so that I can send you more details on the same.\r\nLooking forward to working with you.\r\nThank you & regards,\r\nRicky Williams | Business Development Executive \r\n Office: 302-353-4442 | \r\nEmail: ricky.williams@infintiyintellectuals5.com  | infinity.rickywilliams@gmail.com \r\nWeb-sites: www.infinity-intellectuals.com\r\n&#61520; . Please consider the environment before printing this e-mail\r\nThis email and its attachments may be confidential and are intended solely for the use of the individual to whom it is addressed. Any views or opinion expressed are solely those of the author and do not necessarily represent those of "[business name]". If you are not the intended recipient of this email and its attachments, you must take no action based upon them, nor must you copy or show them to anyone. Please contact the sender if you believe you have received this email in error.\r\n-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\r\nIf you''re not interested to receive further emails, please reply with the subject line as "UNSUBSCRIBE"\r\n', '2012-02-02'),
(31, 'Priyanka', 'priyanka@zni.co.in', '9935004641', 'ICQ', 'priyanka@zni.co.in', 'search engine', 'India', 'Dear sir,\r\nwe provide tollfree number,bulk sms,bulk e-mail,ivr etc.contact on given no.if required', '2012-02-07'),
(32, 'Erol Kavas', 'ekavas@kure.tv', '+905303947018', 'Yahoo', 'erolkavas', 'Search', 'Turkey', 'Our company is leading media group in Turkey. Next week group of our tech staff will be in New Delhi and Mumbai, we want to meet local companies, which we can work for our ongoing project. Specially php - mysql - mobile development. Looking for urgent answers. Thanks', '2012-02-09'),
(33, 'amit shevkar', 'ashevkar9@gmail.com', '8975555053', 'Yahoo', 'sdfhgljsdf', 'google', 'India', 'hii\r\ni am best visualizer & designer', '2012-02-13'),
(34, 'ranja', 'ranjan.kumar@nirvanainfocom.in', '9971624972', 'Yahoo', 'ranjanpurnea5@yahoo.om', 'Google', 'India', 'Web Development', '2012-03-03'),
(35, 'Chintan Shah', 'info@sgcwebs.com', '9427385250', 'Yahoo', 'sgcwebs', 'Search Engine', 'India', 'Hello,\r\n\r\nHope you are doing well...!\r\n\r\nIf your are thinks that, don''t hire any SEO Professional permanent but choose or hire any dedicated SEO firm \r\n\r\nfrom outside as project based. We are ready to dedicated work for you.\r\n\r\nWe at SGC Webs are dedicated individual SEO Services provider. For better your website & business SEO can take \r\n\r\nseriously and make YOU better in your business. We provides all kind of on-site optimization and off-site \r\n\r\noptimization, blogger creation & promote the blog,PPC, Web Development Services with organic SEO and We are also \r\n\r\nprovide all kinds of Link Building services within your budget.\r\n\r\nTry our services once. Stay with us and be in number one position in Google or any major search engine. With \r\n\r\nprovide you better services at budget rate the social bookmarking, link building, Forum Posting, Article \r\n\r\nwriting, Article Submission, Pay Per Click Services, Blog creation as well as comments and all kind of on-page & \r\n\r\noff-page optimization services. We Specialized in Social media optimization.\r\n\r\nI have implemented several planningÃ¢â‚¬â„¢s and strategies which resulted in boosted competitive market positioning, \r\n\r\nstrengthened profits, improved business value.\r\n\r\nIn the meantime, if you have any questions, please feel free to contact me via email at info@sgcwebs.com OR call \r\n\r\nme +91 94273 85250.\r\n\r\nRegards,\r\nChintan Shah\r\ninfo@sgcwebs.com\r\n+91 94273 85250', '2012-03-06'),
(36, 'Semantic Solution', 'semanticsol.india@gmail.com', '91-120-4210654', 'MSN', 'semanticsol@hotmail.com', 'mail', 'India', 'Dear Site owner\r\n\r\nWe are professional link building company with 15+ Link Building Team. We are having experienced link builders with\r\nsound knowledge of all kind of activities. We use Ethical and Manual Link Building techniques like HTML LINKS of your\r\nspecific keywords. We use good anchor text which is use for proper optimization of website. We have some good clients\r\nfrom UK, USA, Australia and Canada; they are fully satisfied to our work. Our company also providing Complete Search Engine\r\nOptimization, Website Designing and Website Development Services in HTLM, PHP and Open Source.\r\nWe have well solid on-going client base who welcomes you to contact for reference with 100% positive feedback.\r\n\r\nPlease let me know if I can be any assistance to you in any of your existing or future projects.\r\n\r\nOur One way link Building Package detail is mention below:\r\n\r\nOne Way Link Building Package (Mix PR from PR1 to PR4)\r\n\r\nPR 1 = $ 1\r\nPR 2 = $ 2\r\nPR 3 = $ 3\r\nPR 4 = $ 4\r\n\r\nPackages --\r\n\r\n50 links = $100\r\n100 links = $200\r\n150 links = $ 300\r\n200 links = $ 400\r\n\r\nSo give us a chance to build our long term business relationship, I am looking forward for your positive response Ã¢â‚¬Â¦.\r\n\r\nThanks & Regards\r\n\r\nRambabu,Semantic Solution\r\n\r\n', '2012-03-15'),
(37, 'abdulla', 'aalbaghli@gmail.com', '0096566666077', 'MSN', 'tampawi@hotmail.com', 'google', 'Kuwait', 'Dear Sir , \r\n\r\nwe want to selling your services in Kuwait for our clients \r\n\r\nhere are out packages that we are quire out sourcing for \r\n\r\n\r\nplease provides us the a quot :-\r\n\r\n \r\n\r\n1- Package A\r\n\r\n. Up to 5 HTML pages\r\n\r\n. 2 design concpts\r\n\r\n. 1 contact form\r\n\r\n. content ( no word limit)\r\n\r\n. cross browser tested design\r\n\r\n+ how many working days would you need to provide this project ?\r\n\r\n \r\n\r\n\r\n\r\n2- Package B\r\n\r\n. Up to 15 HTML pages\r\n. 2 design concpts\r\n\r\n. 1 contact form\r\n\r\n.1 feedback form\r\n\r\n. content ( no word limit)\r\n\r\n. cross browser tested design\r\n\r\n+ how many working days would you need to provide this project ?\r\n\r\n \r\n\r\n\r\n\r\n3- package C\r\n\r\nUp to 25 HTML pages\r\n. 3 design concpts\r\n\r\n. 1 contact form\r\n\r\n.1 feedback form\r\n\r\n. content ( no word limit)\r\n\r\n. cross browser tested design\r\n\r\n+ how many working days would you need to provide this project ?\r\n\r\n\r\n \r\n\r\n\r\n\r\nQuestions and Options\r\n\r\n \r\n\r\n1- how much is the of the shelf CMS per package ? do you provide systems such as joomla and wordpress . \r\n\r\n\r\n\r\n2- how much does a job application form cost if a client want this option to be included in one of the mentioned packages ?\r\n\r\n \r\n\r\n3- what happens the clients rejects all concept design provided ? , is there any extra charge for an additional concept design \r\n\r\n\r\n\r\n4- does your service support arabic for example if there are a client want same this website www.albaghli-united.com\r\n\r\n \r\n\r\n5- is there a free maintenance ? if not how much does a maintenace cost \r\n\r\n\r\n\r\n6- of the cleint dosent like the project what will happen is there fee or refund ?\r\n\r\n \r\n\r\n7- what is the payment method between us per project ?\r\n\r\n \r\n\r\n8 - how many website you can design for us if packages A per week , package B per week , and package C per week ?\r\n\r\n \r\n\r\n\r\n\r\n\r\n\r\n\r\n* Logo packages\r\n\r\n \r\n\r\nLogo package A\r\n\r\n. Customized to your business need\r\n\r\n. web and print ready format\r\n\r\n. you own the copy right\r\n\r\n. 5 design concepts\r\n\r\n.up to 3 revisions on the selected design\r\n\r\n \r\n\r\n\r\n\r\n\r\n\r\n\r\nLogo package B\r\n\r\n\r\n. Customized to your business need\r\n\r\n. web and print ready format\r\n\r\n. you own the copy right\r\n\r\n. 8 design concepts\r\n\r\n.up to 4 revisions on the selected design\r\n\r\n \r\n\r\n\r\n\r\n\r\nLogo package C\r\n\r\n\r\n. Flasg animated Logo\r\n\r\n. Customized to your business need\r\n\r\n. Formats ready for web presentations\r\n\r\n. you own the copy right\r\n\r\n. 1 design concepts \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nhope to hear from you soon\r\n\r\n \r\n\r\nbest regards ,\r\n\r\nAbdullah\r\n', '2012-03-18'),
(38, 'Vikram Singh', 'svikram1978@gmail.com', '8010824002', '', 'Messenger Address', 'Google', 'India', 'website developmnet for selling books online. example site : flipkart.com, uread.com, bookadda.com', '2012-03-27'),
(39, 'Mark William', 'sales@infyways.com', '+1 619 534 8980', 'Yahoo', 'sales@infyways.com', ' link request', 'India', 'Dear Sir \\ Madam,\r\n             \r\n             I am Mark, Sales and Support Head at Infyways Solutions Private Limited (ISPL)\r\nWe are an INDIA based Web Services Company with primary focus on Website Designing & Development with PHP and CMS like Joomla, Magento and Wordpress.\r\n\r\nWe have a dedicated team of 50 professionals designers, developers and SEO especially for all of our client needs and projects.\r\nWe believe in QUALITY OVER PRICE hence we provide all our service at very affordable price.\r\n\r\nWe can provide you various services like\r\nJOOMLA SERVICES\r\nMAGENTO SERVICES\r\nWORDPRESS SERVICES    \r\n\r\nYou can visit our official website at www.infyways.com you can have the idea of the services, what we provide.\r\n\r\nI would like to request you for an opportunity to work and AMAZE you with our service.\r\n\r\nWe are looking forward to a long and healthy business relationship with you and your company. If you have any query, we will be more than happy to provide you our quick assistance.\r\n', '2012-03-29'),
(40, 'Dan Trinidad', 'dan@freelancer.com', '0000000000', 'Yahoo', 'dantrinidad08', 'Google Search Engine', 'Australia', 'Hello,\r\n\r\nI head and manage advertising opportunities for Freelancer.com\r\n\r\nCan you get me in touch with someone whom I can discuss a proposal with regarding an advertising solution which may be beneficial to your company?\r\n\r\nAny action from your end will be much appreciated.\r\n\r\nThanks', '2012-04-16'),
(41, 'Srinivas', 'srinivas@vemuri.in', '8141366775', 'Yahoo', 'srinivas@vemuri.in', 'google', 'India', 'Hi,\r\n\r\nThis is Srinivas. I am a freelance Web Developer. \r\nI develop websites and web applications in PHP/Mysql.I am good with WordPress too. \r\nI am looking for any work that could be outsourced. I am inexpensive to hire, and great at work.\r\n\r\nI am also looking for full time offshore employment. \r\nYou can hire me for as low as $950/month (8hours a day 5 days a week).\r\nI am fluent in English. (both verbal and written) . I can work in any US time zone. \r\n\r\nPlease see my website www.vemuri.in for details.\r\n\r\n\r\n\r\nRegards,\r\nSrinivas', '2012-04-17'),
(42, 'Pratap', 'liverfp@gmail.com', '+919762478272', 'Yahoo', 'liverfp', 'Google', 'India', 'I would like to speak with someone to discuss possibilities of a tie-up to supply similar leads as the following in the future? Feel free to reach me at +919762478272. \r\n\r\nhttp://theemerson.org/pdfs/EmersonWebsiteRFP.pdf \r\n\r\nhttp://www.theatrefrancais.com/attachments/RFP_Theatre_francais_de_Toronto.pdf', '2012-04-18'),
(43, 'Nina Lauc ', 'nina@sloaneinvestments.co.uk', '00447736955684', 'MSN', 'ninalauc', 'google ', 'Croatia (Hrvatska', 'SEO Company Partnership email\r\n\r\nTo whom it may concern,\r\n\r\nWe are currently urgently looking to outsource our SEO requirements.\r\n\r\nIn my other business we work with a number of Croatian individuals in Croatia, and continually have client requests for SEO service however we have not found the right company to partner with.\r\n\r\nThe issue is that Croatia labour is cheap and they offer a really cost effective SEO options but reliability is a factor.\r\n\r\nBasically we are looking to partner with a professional effective SEO company that offers a comprehensive package that we can white label.   \r\n\r\nWe have looked at a number of outsource option via Odesk etc, but we liked the look of your offering / service so we decided to see if this is something you would consider looking at.\r\n\r\nIdeally we would like a competitive quote that ranges from 1 key word through to 10 + at the best possible price.\r\n\r\nI would really appreciate if you would be kind enough to touch base, \r\n\r\nI look forward to your suggestions and best price guidelines\r\n\r\nThanking you in advance\r\n', '2012-04-20'),
(44, 'Aahif Hawladar', 'ashifhawl@yahoo.com', '+8801711209898', 'Yahoo', 'ashifhawl', 'google.com', 'Bangladesh', 'I am a web programmer and want to work. Please, see below my developing websites, if you like, I can work over internet.\r\n\r\nOnly HTML\r\nhttp://10pixelit.com/neemtreestudio/\r\n\r\nStatic Site\r\nhttp://10pixel.net/abal/\r\nhttp://10pixelit.com/ikonic/  (the support page is dynamic)\r\nDynamic Part\r\nhttp://10pixelit.com/ikonic/admin.php\r\nUser ID : ikonic\r\nPassword : ikonic123\r\n\r\nA pure and live static sites\r\nhttp://www.viptooling.com/\r\n\r\nhttp://www.viptooling.com/ project in Wordpress\r\nhttp://webbuildersbd.com/viptool/\r\nhttp://webbuildersbd.com/viptool/wp-admin\r\nUser ID : admin\r\nPassword : admin\r\nI developed wordpress very simple and non-professionally, it was not client requirements. this is only to show i can develop wordpress and custom plugins. the gallery page is my own developed plugin. You can see under tool menu in admin part.\r\n\r\nJoomla Website\r\nhttp://webbuildersbd.com/spiritgate/\r\nthis website is being developed following and modifying the live site http://www.spiritgate.com as client demand. (though\r\n\r\nthe look is not so pretty, whatever this is the best site if client likes). I do feel interesting to develop Custom Component.\r\n\r\n\r\nI have developed over 100 of Excellent Wordpress and joomla Websites, I didn''t mentioned as client agreement.\r\n\r\n+880 1711209898\r\n+880 1611309898\r\nThank you', '2012-04-27'),
(45, 'Jaweriya', 'info@ruchiwebsolutions.com', '9032803895', 'Yahoo', 'msk 23', 'on google', 'India', 'Hi,\r\nThis is business development officer from Ruchiwebsolutions,\r\n\r\nTo introduce, we are an Indian Web Design, PHP web Development firm and SEO consulant. We have over 7 years of experience in professional web designing, PHP and mysql development, web hosting with domain registration and seo services. We give real time training in PHP and SEO.\r\n\r\nVisite our Website: http://ruchiwebsolutions.com/\r\n\r\nWe have been partnering various web market and digital agencies all over USA, UK, Australia Europe and Malaysia.\r\n \r\nRuchiwebsolutions can offer Web Design, PHP development and SEO projects on a white label basis for you at a much lower cost than what it might be in house - No compromise on quality!\r\n\r\nNote that we have good and professional manpower and we are looking for work or project.\r\n \r\nOur Primary Services includes:-\r\n \r\n&#61607;	Web Design \r\n&#61607;	PHP and mysql web Development\r\n&#61607;	PHP training (Online PHP training too)\r\n&#61607;	Seo training(Online SEO training too)\r\n&#61607;	Joomla\r\n&#61607;	Drupal\r\n&#61607;	Wordpress\r\n&#61607;	All type of SEO services\r\n&#61607;	Ecommerce\r\n&#61607;	Flash Designs\r\n&#61607;	Adwords\r\n \r\nDo let me know if you are interested and I would be happy to share our Methodologies, past work details and client Testimonials.\r\n \r\nI look forward to your mail.\r\n \r\nÃ¢â‚¬Å“Fore more information please visit: - Ã¢â‚¬Â   \r\nKind Regards,\r\nRuchi , \r\nHyderabad, India\r\nBusiness Development Manager\r\nE_Mail: info@ruchiwebsolutions.com\r\n\r\nmob: 91-9032803895\r\n', '2012-05-03'),
(46, 'Ravi', 'support@filetruth.com', '+919616713936', 'ICQ', 'truth', 'call now', 'India', 'call now ', '2012-05-16'),
(47, 'Ravi', 'support@filetruth.com', '+919616713936', 'ICQ', 'truth', 'call now', 'India', 'call now ', '2012-05-16'),
(48, 'Dhiraj', 'a_dhiru@yahoo.com', '000-000-0000', 'Yahoo', 'a_dhiru', 'Google', 'India', 'Hello,\r\n\r\nI just visited your website which I found on Google. We feel that your site provides excellent complementary content to our client''s site and that a link exchange would be mutually beneficial to both the sites. \r\n\r\nHere my website details.\r\n\r\nLink Text/Title:  New York SEO.\r\n\r\nLink Description = Our directory provides a wide list of SEO Companies. You may start your search by city, state or zip. If you are a SEO company and would like to be a member of our directory then click on SEO Company Registration now. \r\n\r\nLink URL = http://searchengineoptimization1.net/directory/membersCounty1856.htm \r\n\r\nI will place your link on www.SearchEngineOptimization1.net/DisplayLinkList.aspx\r\n\r\nSo let me know if you are interested for link exchange I hope your will get lots of business benefits from link exchange.\r\n\r\nWarm regards,\r\nDhiraj Agrawal. \r\n', '2012-05-30');
INSERT INTO `imp_contactus` (`ContactID`, `Name`, `Email`, `Telephone`, `Messenger`, `Mess_add`, `findus`, `country`, `inforeq`, `Addeddate`) VALUES
(49, 'Eden Fernsby', 'edenfernsby@blcarolina.com', '5136659487', 'Yahoo', 'edenfernsby', 'Google', 'United States', 'Hi there,\r\n\r\nI came across your website as I was searching for web hosting sites, and your site seems to have exactly what I''m looking for, being web hosting related, etc. I am looking to build up links for my website, and am wondering if you would be open to placing a small section of additional text content in the "Web Hosting" section of your site? (http://www.us-creations.com/web-hosting.htm#.T8ZbaLBYvLo). I could send you $50 through PayPal in exchange for the text placement. If this is something that interests you, please let me know and I can send you the details :) If you think the content would fit better in a different section, let me know :) I am flexible!\r\n\r\nThanks so much!!!\r\nEden Fernsby', '2012-05-30'),
(50, 'vinay', 'webmaster@buypctools.com', '0000000000', 'Yahoo', '.......', '.....................', 'India', 'Hi \r\n\r\nHope you are fine.\r\n\r\nWould you be interested in exchanging links as this will help us to rank in search engines ?\r\n\r\nOur Details \r\n\r\nURL -   http://www.techmowgli.com\r\n\r\nBacklinks\r\nhttp://www.techmowgli.com/resource.html\r\nhttp://www.techmowgli.com/resource1.html\r\nhttp://www.techmowgli.com/resource2.html\r\nhttp://www.techmowgli.com/resource3.html\r\n\r\n\r\nThanks\r\nVINAY', '2012-06-04'),
(51, 'Jeff Bridges', 'Jeff1@sparkreferrals.org', '07723876523', 'MSN', 'Jeff1@sparkreferrals.org', 'google', 'United Kingdom', 'We Could Save Your Business and send you a few Thousand clients\r\n\r\nhttp://Sparkreferrals.org Would you like a few thousand shopaholic clients. For as low as Ã‚Â£8 we''ll send you 10,000 customers today. If you have any questions do not hesitate to contact us', '2012-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `imp_country`
--

CREATE TABLE IF NOT EXISTS `imp_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Code` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `country_iso_code_2` char(2) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`country_id`),
  KEY `IDX_COUNTRIES_NAME` (`country`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=243 ;

--
-- Dumping data for table `imp_country`
--

INSERT INTO `imp_country` (`country_id`, `country`, `Code`, `country_iso_code_2`, `sort_order`, `Status`) VALUES
(1, 'Afghanistan', '', 'AF', 2, 'Y'),
(2, 'Albania', '', 'AL', 2, 'Y'),
(3, 'Algeria', '', 'DZ', 2, 'Y'),
(4, 'American Samoa', '', 'AS', 2, 'Y'),
(5, 'Andorra', '', 'AD', 2, 'Y'),
(6, 'Angola', '', 'AO', 2, 'Y'),
(7, 'Anguilla', '', 'AI', 2, 'Y'),
(8, 'Antarctica', '', 'AQ', 2, 'Y'),
(9, 'Antigua and Barbuda', '', 'AG', 2, 'Y'),
(10, 'Argentina', '', 'AR', 2, 'Y'),
(11, 'Armenia', '', 'AM', 2, 'Y'),
(12, 'Aruba', '', 'AW', 2, 'Y'),
(13, 'Australia', '', 'AU', 2, 'Y'),
(14, 'Austria', '', 'AT', 2, 'Y'),
(15, 'Azerbaijan', '', 'AZ', 2, 'Y'),
(16, 'Bahamas', '', 'BS', 2, 'Y'),
(17, 'Bahrain', '', 'BH', 2, 'Y'),
(18, 'Bangladesh', '', 'BD', 2, 'Y'),
(19, 'Barbados', '', 'BB', 2, 'Y'),
(20, 'Belarus', '', 'BY', 2, 'Y'),
(21, 'Belgium', '', 'BE', 2, 'Y'),
(22, 'Belize', '', 'BZ', 2, 'Y'),
(23, 'Benin', '', 'BJ', 2, 'Y'),
(24, 'Bermuda', '', 'BM', 2, 'Y'),
(25, 'Bhutan', '', 'BT', 2, 'Y'),
(26, 'Bolivia', '', 'BO', 2, 'Y'),
(27, 'Bosnia and Herzegowina', '', 'BA', 2, 'Y'),
(28, 'Botswana', '', 'BW', 2, 'Y'),
(29, 'Bouvet Island', '', 'BV', 2, 'Y'),
(30, 'Brazil', '', 'BR', 2, 'Y'),
(31, 'British Indian Ocean Territory', '', 'IO', 2, 'Y'),
(32, 'Brunei Darussalam', '', 'BN', 2, 'Y'),
(33, 'Bulgaria', '', 'BG', 2, 'Y'),
(34, 'Burkina Faso', '', 'BF', 2, 'Y'),
(35, 'Burundi', '', 'BI', 2, 'Y'),
(36, 'Cambodia', '', 'KH', 2, 'Y'),
(37, 'Cameroon', '', 'CM', 2, 'Y'),
(38, 'Canada', '', 'CA', 1, 'Y'),
(39, 'Cape Verde', '', 'CV', 2, 'Y'),
(40, 'Cayman Islands', '', 'KY', 2, 'Y'),
(41, 'Central African Republic', '', 'CF', 2, 'Y'),
(42, 'Chad', '', 'TD', 2, 'Y'),
(43, 'Chile', '', 'CL', 2, 'Y'),
(44, 'China', '', 'CN', 2, 'Y'),
(45, 'Christmas Island', '', 'CX', 2, 'Y'),
(46, 'Cocos (Keeling) Islands', '', 'CC', 2, 'Y'),
(47, 'Colombia', '', 'CO', 2, 'Y'),
(48, 'Comoros', '', 'KM', 2, 'Y'),
(49, 'Congo', '', 'CG', 2, 'Y'),
(50, 'Cook Islands', '', 'CK', 2, 'Y'),
(51, 'Costa Rica', '', 'CR', 2, 'Y'),
(52, 'Cote D''Ivoire', '', 'CI', 2, 'Y'),
(53, 'Croatia', '', 'HR', 2, 'Y'),
(54, 'Cuba', '', 'CU', 2, 'Y'),
(55, 'Cyprus', '', 'CY', 2, 'Y'),
(56, 'Czech Republic', '', 'CZ', 2, 'Y'),
(57, 'Denmark', '', 'DK', 2, 'Y'),
(58, 'Djibouti', '', 'DJ', 2, 'Y'),
(59, 'Dominica', '', 'DM', 2, 'Y'),
(60, 'Dominican Republic', '', 'DO', 2, 'Y'),
(61, 'East Timor', '', 'TP', 2, 'Y'),
(62, 'Ecuador', '', 'EC', 2, 'Y'),
(63, 'Egypt', '', 'EG', 2, 'Y'),
(64, 'El Salvador', '', 'SV', 2, 'Y'),
(65, 'Equatorial Guinea', '', 'GQ', 2, 'Y'),
(66, 'Eritrea', '', 'ER', 2, 'Y'),
(67, 'Estonia', '', 'EE', 2, 'Y'),
(68, 'Ethiopia', '', 'ET', 2, 'Y'),
(69, 'Falkland Islands (Malvinas)', '', 'FK', 2, 'Y'),
(70, 'Faroe Islands', '', 'FO', 2, 'Y'),
(71, 'Fiji', '', 'FJ', 2, 'Y'),
(72, 'Finland', '', 'FI', 2, 'Y'),
(73, 'France', '', 'FR', 2, 'Y'),
(74, 'France, Metropolitan', '', 'FX', 2, 'Y'),
(75, 'French Guiana', '', 'GF', 2, 'Y'),
(76, 'French Polynesia', '', 'PF', 2, 'Y'),
(77, 'French Southern Territories', '', 'TF', 2, 'Y'),
(78, 'Gabon', '', 'GA', 2, 'Y'),
(79, 'Gambia', '', 'GM', 2, 'Y'),
(80, 'Georgia', '', 'GE', 2, 'Y'),
(81, 'Germany', '', 'DE', 2, 'Y'),
(82, 'Ghana', '', 'GH', 2, 'Y'),
(83, 'Gibraltar', '', 'GI', 2, 'Y'),
(84, 'Greece', '', 'GR', 2, 'Y'),
(85, 'Greenland', '', 'GL', 2, 'Y'),
(86, 'Grenada', '', 'GD', 2, 'Y'),
(87, 'Guadeloupe', '', 'GP', 2, 'Y'),
(88, 'Guam', '', 'GU', 2, 'Y'),
(89, 'Guatemala', '', 'GT', 2, 'Y'),
(90, 'Guinea', '', 'GN', 2, 'Y'),
(91, 'Guinea-bissau', '', 'GW', 2, 'Y'),
(92, 'Guyana', '', 'GY', 2, 'Y'),
(93, 'Haiti', '', 'HT', 2, 'Y'),
(94, 'Heard and Mc Donald Islands', '', 'HM', 2, 'Y'),
(95, 'Honduras', '', 'HN', 2, 'Y'),
(96, 'Hong Kong', '', 'HK', 2, 'Y'),
(97, 'Hungary', '', 'HU', 2, 'Y'),
(98, 'Iceland', '', 'IS', 2, 'Y'),
(99, 'India', '+91', 'IN', 2, 'Y'),
(100, 'Indonesia', '', 'ID', 2, 'Y'),
(101, 'Iran (Islamic Republic of)', '', 'IR', 2, 'Y'),
(102, 'Iraq', '', 'IQ', 2, 'Y'),
(103, 'Ireland', '', 'IE', 2, 'Y'),
(104, 'Israel', '', 'IL', 2, 'Y'),
(105, 'Italy', '', 'IT', 2, 'Y'),
(106, 'Jamaica', '', 'JM', 2, 'Y'),
(107, 'Japan', '', 'JP', 2, 'Y'),
(108, 'Jordan', '', 'JO', 2, 'Y'),
(109, 'Kazakhstan', '', 'KZ', 2, 'Y'),
(110, 'Kenya', '', 'KE', 2, 'Y'),
(111, 'Kiribati', '', 'KI', 2, 'Y'),
(112, 'Korea', '', 'KP', 2, 'Y'),
(113, 'Korea, Republic of', '', 'KR', 2, 'Y'),
(114, 'Kuwait', '', 'KW', 2, 'Y'),
(115, 'Kyrgyzstan', '', 'KG', 2, 'Y'),
(116, 'Lao People''s ', '', 'LA', 2, 'Y'),
(117, 'Latvia', '', 'LV', 2, 'Y'),
(118, 'Lebanon', '', 'LB', 2, 'Y'),
(119, 'Lesotho', '', 'LS', 2, 'Y'),
(120, 'Liberia', '', 'LR', 2, 'Y'),
(121, 'Libyan Arab Jamahiriya', '', 'LY', 2, 'Y'),
(122, 'Liechtenstein', '', 'LI', 2, 'Y'),
(123, 'Lithuania', '', 'LT', 2, 'Y'),
(124, 'Luxembourg', '', 'LU', 2, 'Y'),
(125, 'Macau', '', 'MO', 2, 'Y'),
(126, 'Macedonia', '', 'MK', 2, 'Y'),
(127, 'Madagascar', '', 'MG', 2, 'Y'),
(128, 'Malawi', '', 'MW', 2, 'Y'),
(129, 'Malaysia', '', 'MY', 2, 'Y'),
(130, 'Maldives', '', 'MV', 2, 'Y'),
(131, 'Mali', '', 'ML', 2, 'Y'),
(132, 'Malta', '', 'MT', 2, 'Y'),
(133, 'Marshall Islands', '', 'MH', 2, 'Y'),
(134, 'Martinique', '', 'MQ', 2, 'Y'),
(135, 'Mauritania', '', 'MR', 2, 'Y'),
(136, 'Mauritius', '', 'MU', 2, 'Y'),
(137, 'Mayotte', '', 'YT', 2, 'Y'),
(138, 'Mexico', '', 'MX', 2, 'Y'),
(139, 'Micronesia', '', 'FM', 2, 'Y'),
(140, 'Moldova', '', 'MD', 2, 'Y'),
(141, 'Monaco', '', 'MC', 2, 'Y'),
(142, 'Mongolia', '', 'MN', 2, 'Y'),
(143, 'Montserrat', '', 'MS', 2, 'Y'),
(144, 'Morocco', '', 'MA', 2, 'Y'),
(145, 'Mozambique', '', 'MZ', 2, 'Y'),
(146, 'Myanmar', '', 'MM', 2, 'Y'),
(147, 'Namibia', '', 'NA', 2, 'Y'),
(148, 'Nauru', '', 'NR', 2, 'Y'),
(149, 'Nepal', '', 'NP', 2, 'Y'),
(150, 'Netherlands', '', 'NL', 2, 'Y'),
(151, 'Netherlands Antilles', '', 'AN', 2, 'Y'),
(152, 'New Caledonia', '', 'NC', 2, 'Y'),
(153, 'New Zealand', '', 'NZ', 2, 'Y'),
(154, 'Nicaragua', '', 'NI', 2, 'Y'),
(155, 'Niger', '', 'NE', 2, 'Y'),
(156, 'Nigeria', '', 'NG', 2, 'Y'),
(157, 'Niue', '', 'NU', 2, 'Y'),
(158, 'Norfolk Island', '', 'NF', 2, 'Y'),
(159, 'Northern Mariana Islands', '', 'MP', 2, 'Y'),
(160, 'Norway', '', 'NO', 2, 'Y'),
(161, 'Oman', '', 'OM', 2, 'Y'),
(162, 'Pakistan', '', 'PK', 2, 'Y'),
(163, 'Palau', '', 'PW', 2, 'Y'),
(164, 'Panama', '', 'PA', 2, 'Y'),
(165, 'Papua New Guinea', '', 'PG', 2, 'Y'),
(166, 'Paraguay', '', 'PY', 2, 'Y'),
(167, 'Peru', '', 'PE', 2, 'Y'),
(168, 'Philippines', '', 'PH', 2, 'Y'),
(169, 'Pitcairn', '', 'PN', 2, 'Y'),
(170, 'Poland', '', 'PL', 2, 'Y'),
(171, 'Portugal', '', 'PT', 2, 'Y'),
(172, 'Puerto Rico', '', 'PR', 2, 'Y'),
(173, 'Qatar', '', 'QA', 2, 'Y'),
(174, 'Reunion', '', 'RE', 2, 'Y'),
(175, 'Romania', '', 'RO', 2, 'Y'),
(176, 'Russian Federation', '', 'RU', 2, 'Y'),
(177, 'Rwanda', '', 'RW', 2, 'Y'),
(178, 'Saint Kitts and Nevis', '', 'KN', 2, 'Y'),
(179, 'Saint Lucia', '', 'LC', 2, 'Y'),
(180, 'Saint Vincent', '', 'VC', 2, 'Y'),
(181, 'Samoa', '', 'WS', 2, 'Y'),
(182, 'San Marino', '', 'SM', 2, 'Y'),
(183, 'Sao Tome and Principe', '', 'ST', 2, 'Y'),
(184, 'Saudi Arabia', '', 'SA', 2, 'Y'),
(185, 'Senegal', '', 'SN', 2, 'Y'),
(186, 'Seychelles', '', 'SC', 2, 'Y'),
(187, 'Sierra Leone', '', 'SL', 2, 'Y'),
(188, 'Singapore', '', 'SG', 2, 'Y'),
(189, 'Slovakia (Slovak Republic)', '', 'SK', 2, 'Y'),
(190, 'Slovenia', '', 'SI', 2, 'Y'),
(191, 'Solomon Islands', '', 'SB', 2, 'Y'),
(192, 'Somalia', '', 'SO', 2, 'Y'),
(193, 'South Africa', '', 'ZA', 2, 'Y'),
(194, 'South Georgia', '', 'GS', 2, 'Y'),
(195, 'Spain', '', 'ES', 2, 'Y'),
(196, 'Sri Lanka', '', 'LK', 2, 'Y'),
(197, 'St. Helena', '', 'SH', 2, 'Y'),
(198, 'St. Pierre and Miquelon', '', 'PM', 2, 'Y'),
(199, 'Sudan', '', 'SD', 2, 'Y'),
(200, 'Suriname', '', 'SR', 2, 'Y'),
(201, 'Svalbard ', '', 'SJ', 2, 'Y'),
(202, 'Swaziland', '', 'SZ', 2, 'Y'),
(203, 'Sweden', '', 'SE', 2, 'Y'),
(204, 'Switzerland', '', 'CH', 2, 'Y'),
(205, 'Syrian Arab Republic', '', 'SY', 2, 'Y'),
(206, 'Taiwan', '', 'TW', 2, 'Y'),
(207, 'Tajikistan', '', 'TJ', 2, 'Y'),
(208, 'Tanzania', '', 'TZ', 2, 'Y'),
(209, 'Thailand', '', 'TH', 2, 'Y'),
(210, 'Togo', '', 'TG', 2, 'Y'),
(211, 'Tokelau', '', 'TK', 2, 'Y'),
(212, 'Tonga', '', 'TO', 2, 'Y'),
(213, 'Trinidad and Tobago', '', 'TT', 2, 'Y'),
(214, 'Tunisia', '', 'TN', 2, 'Y'),
(215, 'Turkey', '', 'TR', 2, 'Y'),
(216, 'Turkmenistan', '', 'TM', 2, 'Y'),
(217, 'Turks and Caicos Islands', '', 'TC', 2, 'Y'),
(218, 'Tuvalu', '', 'TV', 2, 'Y'),
(219, 'Uganda', '', 'UG', 2, 'Y'),
(220, 'Ukraine', '', 'UA', 2, 'Y'),
(221, 'United Arab imp', '', 'AE', 2, 'Y'),
(222, 'United Kingdom', '', 'GB', 2, 'Y'),
(223, 'United States', '', 'US', 0, 'Y'),
(224, 'United States Minor Outlying Islands', '', 'UM', 2, 'Y'),
(225, 'Uruguay', '', 'UY', 2, 'Y'),
(226, 'Uzbekistan', '', 'UZ', 2, 'Y'),
(227, 'Vanuatu', '', 'VU', 2, 'Y'),
(228, 'Vatican City State (Holy See)', '', 'VA', 2, 'Y'),
(229, 'Venezuela', '', 'VE', 2, 'Y'),
(230, 'Viet Nam', '', 'VN', 2, 'Y'),
(231, 'Virgin Islands (British)', '', 'VG', 2, 'Y'),
(232, 'Virgin Islands (U.S.)', '', 'VI', 2, 'Y'),
(233, 'Wallis and Futuna Islands', '', 'WF', 2, 'Y'),
(234, 'Western Sahara', '', 'EH', 2, 'Y'),
(235, 'Yemen', '', 'YE', 2, 'Y'),
(236, 'Yugoslavia', '', 'YU', 2, 'Y'),
(237, 'Zaire', '', 'ZR', 2, 'Y'),
(238, 'Zambia', '', 'ZM', 2, 'Y'),
(239, 'Zimbabwe', '', 'ZW', 2, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `imp_customer`
--

CREATE TABLE IF NOT EXISTS `imp_customer` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(25) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_lname` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `user_email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `user_loginid` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_passwd` varchar(225) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_address1` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_address2` varchar(255) COLLATE latin1_general_ci DEFAULT '',
  `user_city` varchar(55) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_zip` varchar(55) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_state` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_country` varchar(55) COLLATE latin1_general_ci DEFAULT '',
  `user_sid` varchar(225) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_validated` enum('1','0') COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `user_created` date NOT NULL DEFAULT '0000-00-00',
  `user_lastupdated` date NOT NULL DEFAULT '0000-00-00',
  `user_isactive` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `user_status` enum('A','U') COLLATE latin1_general_ci NOT NULL DEFAULT 'U',
  `title` varchar(55) COLLATE latin1_general_ci DEFAULT '',
  `user_phone` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Business` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Image` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `imp_customer`
--


-- --------------------------------------------------------

--
-- Table structure for table `imp_emails`
--

CREATE TABLE IF NOT EXISTS `imp_emails` (
  `EMAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAILS` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `SUBMITTIME` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `APPROVE` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`EMAIL_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `imp_emails`
--

INSERT INTO `imp_emails` (`EMAIL_ID`, `EMAILS`, `SUBMITTIME`, `APPROVE`) VALUES
(10, 'test@vedantus', '0000-00-00 00:00:00', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `imp_file`
--

CREATE TABLE IF NOT EXISTS `imp_file` (
  `File_id` int(10) NOT NULL AUTO_INCREMENT,
  `File_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pdf` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `CurrentDate` date NOT NULL,
  `Description` longtext COLLATE latin1_general_ci NOT NULL,
  `Sortorder` int(10) NOT NULL,
  `view` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `download` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`File_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `imp_file`
--

INSERT INTO `imp_file` (`File_id`, `File_name`, `pdf`, `CurrentDate`, `Description`, `Sortorder`, `view`, `download`, `Status`) VALUES
(14, 'file test', '1315489390_password.txt', '2012-06-19', ' testing description   ', 2, 'Y', 'Y', 'Y'),
(13, 'impetusit file', '1315488063_letter_of_acceptance.pdf', '2012-06-19', 'this is the file of impetusit', 1, 'Y', '', 'Y'),
(15, 'new', '1340093903_Sunset.jpg', '2012-06-19', ' ddf', 0, 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `imp_filecust`
--

CREATE TABLE IF NOT EXISTS `imp_filecust` (
  `File_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `imp_filecust`
--

INSERT INTO `imp_filecust` (`File_id`, `user_id`) VALUES
(15, 5),
(12, 4),
(11, 4),
(10, 4),
(1, 4),
(1, 3),
(1, 1),
(8, 4),
(6, 4),
(5, 3),
(9, 3),
(9, 4),
(7, 3),
(6, 1),
(6, 3),
(8, 3),
(8, 1),
(14, 5),
(13, 5),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `imp_filemanage`
--

CREATE TABLE IF NOT EXISTS `imp_filemanage` (
  `file_id` int(10) NOT NULL AUTO_INCREMENT,
  `file_title` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Sortorder` int(10) NOT NULL,
  `CurrentDate` date NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `imp_filemanage`
--

INSERT INTO `imp_filemanage` (`file_id`, `file_title`, `Description`, `Sortorder`, `CurrentDate`, `Status`) VALUES
(1, 'test file', ' this is the testing file.', 2, '2012-06-19', '');

-- --------------------------------------------------------

--
-- Table structure for table `imp_inquiry`
--

CREATE TABLE IF NOT EXISTS `imp_inquiry` (
  `Enq_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `Organization` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ContactWork` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ContactCell` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `BestTimeContact` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `PrefferedWayPhone` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `PrefferedWayEmail` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `Staffing` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `Outsourcing` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `Contactrecruitment` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `Address` longtext COLLATE latin1_general_ci NOT NULL,
  `city` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `state` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `Telephone` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `clientType` enum('N','E') COLLATE latin1_general_ci NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Enq_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `imp_inquiry`
--


-- --------------------------------------------------------

--
-- Table structure for table `imp_job`
--

CREATE TABLE IF NOT EXISTS `imp_job` (
  `apply_id` int(9) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `DateOfBirth` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sex` enum('M','F') COLLATE latin1_general_ci NOT NULL DEFAULT 'M',
  `contactNo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `address` text COLLATE latin1_general_ci NOT NULL,
  `UsCitizen` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `GreenCard` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `HIB` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `EAD` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `OPT` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `CPT` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `resume` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `newreq` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `mission` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `profile` text COLLATE latin1_general_ci NOT NULL,
  `rech` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `remun` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`apply_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `imp_job`
--

INSERT INTO `imp_job` (`apply_id`, `job_id`, `name`, `DateOfBirth`, `sex`, `contactNo`, `address`, `UsCitizen`, `GreenCard`, `HIB`, `EAD`, `OPT`, `CPT`, `resume`, `newreq`, `mission`, `profile`, `rech`, `remun`, `email`, `status`) VALUES
(5, 0, 'aa', 'sdas', 'F', '454', 'dfdsf', '', '', '', '', '', '', 'Array', '', '', 'dfsf', '', '', 's', NULL),
(4, 0, 'aa', 'sdas', 'F', '454', 'dfdsf', '', '', '', '', '', '', 'Array', '', '', 'dfsf', '', '', 's', NULL),
(6, 0, 'sf', 'sdf', 'F', 's', 'sd', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Array', '', '', 'dfdsfdsfsdfdsfdsfsdfsd', '', '', 'd', NULL),
(7, 0, 'sf', 'sdf', 'F', 's', 'sd', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Array', '', '', 'dfdsfdsfsdfdsfdsfsdfsd', '', '', 'd', NULL),
(8, 0, 'sf', 'sdf', 'F', 's', 'sd', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Array', '', '', 'dfdsfdsfsdfdsfdsfsdfsd', '', '', 'd', NULL),
(9, 0, 'sf', 'sdf', 'F', 's', 'sd', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Array', '', '', 'dfdsfdsfsdfdsfdsfsdfsd', '', '', 'd', NULL),
(10, 9, 'fsd', 'dsf', 'F', 'ds456', 'fgbvfdgfd', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Array', '', '', 'fgfdgfdgfd', '', '', 'ds', NULL),
(11, 5, '', '', '', '', '', '', '', '', '', '', '', 'Array', '', '', '', '', '', '', NULL),
(12, 5, 'Auay', '3-4-1984', 'M', '09818284809', 'xz zd cvc vc', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Array', '', '', '', '', '', 'ajay@us-creations.com', NULL),
(13, 9, 'd', 'sdf', 'M', 'ds', 'sd', '', '', '', '', '', '', '1314860186_1312475094_UrbanUmbrella.doc', '', '', '', '', '', 'ajay@us-creations.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imp_jobs`
--

CREATE TABLE IF NOT EXISTS `imp_jobs` (
  `JobsId` int(11) NOT NULL AUTO_INCREMENT,
  `JobId` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `JobsTitle` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `Location` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Duration` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Salary` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Travel` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `UsCitizen` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `GreenCard` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `HIB` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `EAD` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `OPT` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `CPT` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `JobsAddedDate` date NOT NULL DEFAULT '0000-00-00',
  `JobsExpirationDate` date NOT NULL DEFAULT '0000-00-00',
  `JobsLastUpdated` date NOT NULL DEFAULT '0000-00-00',
  `JobsIsActive` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `JobsContactInfo` longtext COLLATE latin1_general_ci,
  `JobsEmail` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `JobsDescription` longtext COLLATE latin1_general_ci,
  `JobsPdf` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `JobCat` int(9) NOT NULL DEFAULT '0',
  `SortOrder` float(12,2) NOT NULL DEFAULT '0.00',
  `StartDate` date NOT NULL DEFAULT '0000-00-00',
  `JobType` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `OtherDetail` longtext COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`JobsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `imp_jobs`
--

INSERT INTO `imp_jobs` (`JobsId`, `JobId`, `JobsTitle`, `Location`, `Duration`, `Salary`, `Travel`, `UsCitizen`, `GreenCard`, `HIB`, `EAD`, `OPT`, `CPT`, `JobsAddedDate`, `JobsExpirationDate`, `JobsLastUpdated`, `JobsIsActive`, `JobsContactInfo`, `JobsEmail`, `JobsDescription`, `JobsPdf`, `JobCat`, `SortOrder`, `StartDate`, `JobType`, `OtherDetail`, `Status`) VALUES
(24, '', 'Php Developer', '', '', '', '', 'N', 'N', 'N', 'N', 'N', 'N', '2015-10-26', '2015-12-17', '0000-00-00', 'N', 'abc', '', 'php developer can apply with minimum 1 year experience', '', 1, 0.00, '2015-11-10', '', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `imp_job_category`
--

CREATE TABLE IF NOT EXISTS `imp_job_category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `SortOrder` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `IsDefaultCat` enum('N','Y') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `Image` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`CategoryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `imp_job_category`
--

INSERT INTO `imp_job_category` (`CategoryID`, `CategoryName`, `Status`, `SortOrder`, `IsDefaultCat`, `Image`) VALUES
(1, 'Category 1', 'Y', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `imp_link`
--

CREATE TABLE IF NOT EXISTS `imp_link` (
  `LinkId` int(10) NOT NULL AUTO_INCREMENT,
  `LinkTitle` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `LinkUrl` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `LinkCategory` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `LinkDescription` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `LinkAddedDate` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`LinkId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `imp_link`
--


-- --------------------------------------------------------

--
-- Table structure for table `imp_link_category`
--

CREATE TABLE IF NOT EXISTS `imp_link_category` (
  `CatID` int(10) NOT NULL AUTO_INCREMENT,
  `Category` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`CatID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `imp_link_category`
--

INSERT INTO `imp_link_category` (`CatID`, `Category`, `Status`) VALUES
(1, 'Category1', 'Y'),
(2, 'Category2', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `imp_members`
--

CREATE TABLE IF NOT EXISTS `imp_members` (
  `MembersId` int(20) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `CompanyName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `LoginID` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Address` text COLLATE latin1_general_ci NOT NULL,
  `Zip` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `Phone` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `City` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `State` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Country` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `WebLink` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `MemType` enum('B','S','A') COLLATE latin1_general_ci NOT NULL,
  `Image` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`MembersId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `imp_members`
--

INSERT INTO `imp_members` (`MembersId`, `FirstName`, `CompanyName`, `Email`, `LoginID`, `Password`, `Address`, `Zip`, `Status`, `Phone`, `City`, `State`, `Country`, `WebLink`, `MemType`, `Image`) VALUES
(1, 'Ajay Bhardwaj', 'US Creations Inc.', 'ajay@us-creations.com', 'ajay', 'ajay', 'sadfadsf', '', 'Y', '123654789', 'New Delhi', 'Delhi', '', 'http://www.us-creations.com', 'A', '1287230216_David.bmp');

-- --------------------------------------------------------

--
-- Table structure for table `imp_menu`
--

CREATE TABLE IF NOT EXISTS `imp_menu` (
  `MenuID` int(11) NOT NULL AUTO_INCREMENT,
  `MenuName` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `MenuTitle` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `MenuKeyword` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Image` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `URL` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ParentID` int(11) NOT NULL,
  `IsActive` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `Ordering` int(11) NOT NULL,
  `view` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `linkpage` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `openin` enum('s','n') COLLATE latin1_general_ci NOT NULL,
  `Target` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `MetaTitle` text COLLATE latin1_general_ci NOT NULL,
  `MetaDescription` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`MenuID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=68 ;

--
-- Dumping data for table `imp_menu`
--

INSERT INTO `imp_menu` (`MenuID`, `MenuName`, `MenuTitle`, `MenuKeyword`, `Image`, `URL`, `ParentID`, `IsActive`, `Ordering`, `view`, `linkpage`, `openin`, `Target`, `MetaTitle`, `MetaDescription`) VALUES
(36, 'How We Do', 'How We Do', 'How We Do', '1314699274_services.jpg', 'how_we_do.php', 0, 'Y', 11, 'N', '', '', '', 'How We Do', 'How We Do'),
(35, 'ERP Solutions', 'ERP SOLUTIONS', 'ERP SOLUTIONS', '1314697746_services.jpg', 'erp_solution.php', 25, 'Y', 10, 'Y', '', '', '', 'ERP SOLUTIONS', 'ERP SOLUTIONS'),
(34, 'Staffing', 'Staffing', 'Staffing', '1314697350_services.jpg', 'staffing.php', 0, 'Y', 9, 'N', '', '', '', 'Staffing', 'Staffing'),
(33, 'Home', 'Home', 'Home', '', 'index.php', 0, 'Y', 1, 'Y', '', '', '', 'Home', 'Home'),
(28, 'Job Seeker', 'Job Seeker', 'Job Seeker', '1317104647_jobseeker_header.jpg', 'job_seek.php', 0, 'Y', 7, 'Y', '', '', '', 'Job Seeker', 'Job Seeker'),
(29, 'Contact Us', 'Contact Us', 'Contact Us', '1315304163_contactus_header.jpg', 'contactus.php', 0, 'Y', 8, 'Y', '', '', '', 'Contact Us', 'Contact Us'),
(27, 'Industries Served', 'Industries Served', 'Industries Served', '1314688386_services.jpg', 'industrial_served.php', 0, 'Y', 5, 'Y', '', '', '', 'Industries Served', 'Industries Served'),
(26, 'IT Training', 'IT Training', 'IT Training', '1314767260_it_traning_header.jpg', 'it_training.php', 0, 'Y', 4, 'Y', '', '', '', 'It Training', 'It Training'),
(25, 'Services', 'Services', 'Services', '1314688048_services.jpg', 'sevvices.php', 0, 'Y', 3, 'Y', '', '', '', 'Services', 'Services'),
(24, 'About Us', 'About Us', 'About Us', '1314687332_services.jpg', 'aboutus.php', 0, 'Y', 2, 'Y', '', '', '', 'About Us', 'About Us'),
(37, 'News', 'News', 'News', '1314875643_news_header.jpg', 'news.php', 0, 'Y', 12, 'N', '', '', '', 'News', 'News'),
(38, 'All News', 'All News', 'All News', '1314875693_news_header.jpg', 'allnews.php', 0, 'Y', 13, 'N', '', '', '', 'All News', 'All News'),
(43, 'Project Management', 'Project Management', 'Project Management', '1314870923_projectmanagement_header.jpg', 'projectmanagement.php', 25, 'Y', 0, 'Y', '', '', '', 'Project Management', 'Project Management'),
(40, 'Introduction', 'Introduction', 'Introduction', '', 'introduction.php', 0, 'Y', 14, 'N', '', '', '', 'Introduction', 'Introduction'),
(41, 'Job Detail', 'Job Detail', 'Job Detail', '', 'job.php', 0, 'Y', 15, 'N', '', '', '', 'Job Detail', 'Job Detail'),
(42, 'Apply Now', 'Apply Now', 'Apply Now', '', 'apply_now.php', 0, 'Y', 16, 'N', '', '', '', 'Apply Now', 'Apply Now'),
(44, 'IT Staffing', 'IT Staffing', 'IT Staffing', '1314871615_it_staffing_header.jpg', 'itstaffing.php', 25, 'Y', 0, 'Y', '', '', '', 'IT Staffing', 'IT Staffing'),
(45, 'Culture & History', 'Culture & History', 'Culture & History', '1315304057_culture&history_header.jpg', 'culture&history.php', 24, 'Y', 0, 'Y', '', '', '', 'Culture & History', 'Culture & History'),
(46, 'Management Team', 'Management Team', 'Management Team', '1315304088_management_header.jpg', 'managementteam.php', 24, 'Y', 0, 'Y', '', '', '', 'Management Team', 'Management Team'),
(47, 'Our Mission', 'Our Mission', 'Our Mission', '1314875377_mission_header.jpg', 'ourmission.php', 24, 'Y', 0, 'Y', '', '', '', 'Our Mission', 'Our Mission'),
(48, 'Java/J2EE', 'Java/J2EE', 'Java/J2EE', '1315304003_java_header.jpg', 'javaj2ee.php', 26, 'Y', 0, 'Y', '', '', '', 'Java/J2EE', 'Java/J2EE'),
(49, 'PHP/Web Development', 'PHP/Web Development', 'PHP/Web Development', '1314872809_php_development_header.jpg', 'phpwebdevelopment.php', 26, 'Y', 0, 'Y', '', '', '', 'PHP/Web Development', 'PHP/Web Development'),
(50, 'C#/ASP.Net', 'C#/ASP.Net', 'C#/ASP.Net', '1314873035_asp.net.jpg', 'cnet.php', 26, 'Y', 0, 'Y', '', '', '', 'C#/ASP.Net', 'C#/ASP.Net'),
(51, 'SQL Server', 'SQL Server', 'SQL Server', '1314873108_sqlserver_header.jpg', 'sqlserver.php', 26, 'Y', 0, 'Y', '', '', '', 'SQL Server', 'SQL Server'),
(52, 'ETL Data Warehousing', 'ETL Data Warehousing', 'ETL Data Warehousing', '1314873211_etldata_header.jpg', 'etldatawarehousing.php', 26, 'Y', 0, 'Y', '', '', '', 'ETL Data Warehousing', 'ETL Data Warehousing'),
(53, 'Benefits', 'Benefits', 'Benefits', '1314873357_benefits_header.jpg', 'benefits.php', 28, 'Y', 0, 'Y', '', '', '', 'Benefits', 'Benefits'),
(54, 'FAQs', 'FAQs', 'FAQs', '1314873498_faq_header.jpg', 'faq.php', 28, 'Y', 0, 'Y', '', '', '', 'FAQs', 'FAQs'),
(55, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', '1314876695_privacypolicy_header.jpg', 'privacypolicy.php', 0, 'Y', 17, 'N', '', '', '', 'Privacy Policy', 'Privacy Policy'),
(56, 'Help', 'Help', 'Help', '', 'help.php', 0, 'Y', 18, 'N', '', '', '', 'Help', 'Help'),
(58, 'Link', 'Link', 'Link', '', 'link.php', 0, 'Y', 19, 'N', '', '', '', 'Link', 'Link'),
(60, 'Benefits', 'Benefits', 'Benefits', '1317110851_benefits_header.jpg', 'benifit.php', 59, 'Y', 0, 'Y', '', '', '', 'Benefits', 'Benefits'),
(61, 'FAQs', 'FAQs', 'FAQs', '1317110994_faq_header.jpg', 'faqs.php', 59, 'Y', 0, 'Y', '', '', '', 'FAQs', 'FAQs');

-- --------------------------------------------------------

--
-- Table structure for table `imp_menu2`
--

CREATE TABLE IF NOT EXISTS `imp_menu2` (
  `MenuID` int(11) NOT NULL AUTO_INCREMENT,
  `MenuName` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `MenuTitle` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `MenuKeyword` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Image` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `URL` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ParentID` int(11) NOT NULL,
  `IsActive` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `Ordering` int(11) NOT NULL,
  `view` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `linkpage` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `openin` enum('s','n') COLLATE latin1_general_ci NOT NULL,
  `Target` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `MetaTitle` text COLLATE latin1_general_ci NOT NULL,
  `MetaDescription` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`MenuID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `imp_menu2`
--

INSERT INTO `imp_menu2` (`MenuID`, `MenuName`, `MenuTitle`, `MenuKeyword`, `Image`, `URL`, `ParentID`, `IsActive`, `Ordering`, `view`, `linkpage`, `openin`, `Target`, `MetaTitle`, `MetaDescription`) VALUES
(2, 'Work Injury Claims', 'Work Claims', 'Work Injury Claims', '', 'workclaim.php', 0, 'Y', 1, 'Y', '', '', '', 'Work Injury Claims', 'Work Injury Claims'),
(1, 'Home', 'Home', 'Home', '', 'index.php', 0, 'Y', 0, 'Y', 'Y', '', '', 'Home', 'Home'),
(3, 'Negligence Claims', 'Negligence Claims', 'Negligence Claims', '', 'negligence.php', 0, 'Y', 2, 'Y', '', '', '', 'Negligence Claims', 'Negligence Claims'),
(4, 'Liability Claims', 'Liability Claims', 'Liability Claims', '', 'liability.php', 0, 'Y', 3, 'Y', '', '', '', 'Liability Claims', 'Liability Claims'),
(5, 'Motor Claims', 'Motor Claims', 'Motor Claims', '', 'motor.php', 0, 'Y', 4, 'Y', '', '', '', 'Motor Claims', 'Motor Claims'),
(6, 'Compensation', 'Compensation', 'Compensation', '', 'compensation.php', 0, 'Y', 5, 'Y', '', '', '', 'Compensation', 'Compensation');

-- --------------------------------------------------------

--
-- Table structure for table `imp_module`
--

CREATE TABLE IF NOT EXISTS `imp_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `modulename` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ModuleStatus` int(9) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `imp_module`
--


-- --------------------------------------------------------

--
-- Table structure for table `imp_moreimage`
--

CREATE TABLE IF NOT EXISTS `imp_moreimage` (
  `ImageId` int(9) NOT NULL AUTO_INCREMENT,
  `ProId` int(9) NOT NULL,
  `Image` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ImageId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `imp_moreimage`
--

INSERT INTO `imp_moreimage` (`ImageId`, `ProId`, `Image`) VALUES
(1, 1, '1287817130_Sunset.jpg'),
(2, 1, '1287817131_Water lilies.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `imp_morenwesimg`
--

CREATE TABLE IF NOT EXISTS `imp_morenwesimg` (
  `ImageId` int(9) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `NewsId` int(9) NOT NULL,
  PRIMARY KEY (`ImageId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `imp_morenwesimg`
--


-- --------------------------------------------------------

--
-- Table structure for table `imp_news`
--

CREATE TABLE IF NOT EXISTS `imp_news` (
  `NewsId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `heading` text COLLATE latin1_general_ci,
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `addeddate` datetime NOT NULL,
  `photo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `IsHeadline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `IsBreakingNews` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `category_id` int(11) NOT NULL,
  `MediaId` int(9) NOT NULL,
  `View` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`NewsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `imp_news`
--

INSERT INTO `imp_news` (`NewsId`, `heading`, `description`, `addeddate`, `photo`, `Status`, `IsHeadline`, `IsBreakingNews`, `category_id`, `MediaId`, `View`) VALUES
(7, 'Delivering the complex Enterprise Portal solutions.', 'Vedantus Solutions has been consistent in delivering the complex Enterprise Portal solutions to the customer.', '2015-10-26 09:09:29', '1445846969-fmw4.jpg', 'Y', '', 'Y', 0, 0, 'Y'),
(6, 'Performing meticulously in delivering the applications on Oracle ADF', 'Vedantus Solutions is performing meticulously in delivering the applications on Oracle Application Development Framework 12c platform which is the latest released version from Oracle.', '2015-10-26 09:07:45', '1445846865-fmw4.jpg', 'Y', '', 'Y', 0, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `imp_portfolio`
--

CREATE TABLE IF NOT EXISTS `imp_portfolio` (
  `ClientId` int(9) NOT NULL AUTO_INCREMENT,
  `ClientName` varchar(255) DEFAULT NULL,
  `SubClient` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `addeddate` date DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `Status` enum('Y','N') DEFAULT NULL,
  `Type` enum('K','I','V') DEFAULT NULL,
  `Kanvas` enum('Y','N') DEFAULT NULL,
  `Imagine` enum('Y','N') DEFAULT NULL,
  `Vivid` enum('Y','N') DEFAULT NULL,
  `LoginID` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ClientId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `imp_portfolio`
--

INSERT INTO `imp_portfolio` (`ClientId`, `ClientName`, `SubClient`, `description`, `addeddate`, `photo`, `Status`, `Type`, `Kanvas`, `Imagine`, `Vivid`, `LoginID`, `Password`) VALUES
(45, 'dgdg', 0, 'dgdfg', '2012-06-14', '1339662543_iocn.jpg', 'Y', '', '', '', '', 'fgdg', 'dfgdg');

-- --------------------------------------------------------

--
-- Table structure for table `imp_product`
--

CREATE TABLE IF NOT EXISTS `imp_product` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(9) NOT NULL,
  `ProductName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Length` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Width` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Height` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `MaterialGrade` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ItemSize` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Quantity` int(9) NOT NULL,
  `Price` float(7,2) NOT NULL,
  `Manufacturer` int(11) NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `Image` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `MembersId` int(9) NOT NULL,
  `Description` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `imp_product`
--

INSERT INTO `imp_product` (`ProductId`, `CategoryId`, `ProductName`, `Length`, `Width`, `Height`, `MaterialGrade`, `ItemSize`, `Quantity`, `Price`, `Manufacturer`, `Status`, `Image`, `MembersId`, `Description`) VALUES
(1, 1, 'Testing Product', '100', '100', '100', 'khkhv', '12', 123, 98767.99, 1, 'Y', '1287819334_Winter.jpg', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `imp_rssdetail`
--

CREATE TABLE IF NOT EXISTS `imp_rssdetail` (
  `RssdetId` int(20) NOT NULL AUTO_INCREMENT,
  `URL` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Status` enum('Y','N') NOT NULL,
  `View` enum('Y','N') NOT NULL DEFAULT 'N',
  `Sortorder` int(20) NOT NULL,
  PRIMARY KEY (`RssdetId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `imp_rssdetail`
--

INSERT INTO `imp_rssdetail` (`RssdetId`, `URL`, `Description`, `Status`, `View`, `Sortorder`) VALUES
(5, 'http://www.computerworld.com/news/xml/0,5000,54,00.xml', 'dgd dfgd ', 'Y', 'N', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imp_states`
--

CREATE TABLE IF NOT EXISTS `imp_states` (
  `StatesID` int(11) NOT NULL AUTO_INCREMENT,
  `StatesName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `country_id` int(9) NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `MetaTitle` text COLLATE latin1_general_ci NOT NULL,
  `MetaDescription` text COLLATE latin1_general_ci NOT NULL,
  `MetaKeyword` text COLLATE latin1_general_ci NOT NULL,
  `StateJobDesc` longtext COLLATE latin1_general_ci NOT NULL,
  `StateConsultent` longtext COLLATE latin1_general_ci NOT NULL,
  `ShortStateJobDesc` text COLLATE latin1_general_ci NOT NULL,
  `Statesshort` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `IsLeftMenu` enum('N','Y') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`StatesID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=66 ;

--
-- Dumping data for table `imp_states`
--

INSERT INTO `imp_states` (`StatesID`, `StatesName`, `country_id`, `Status`, `MetaTitle`, `MetaDescription`, `MetaKeyword`, `StateJobDesc`, `StateConsultent`, `ShortStateJobDesc`, `Statesshort`, `IsLeftMenu`) VALUES
(65, 'UttarPradesh', 99, 'Y', '', '', '', '', '', '', '', ''),
(64, 'Delhi', 99, 'Y', '', '', '', '', '', '', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `imp_static_pages`
--

CREATE TABLE IF NOT EXISTS `imp_static_pages` (
  `page_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `header_image` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `page_name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `page_description` blob,
  `page_dateadded` date DEFAULT NULL,
  `page_datemodified` date DEFAULT NULL,
  `page_admin_id` int(10) unsigned DEFAULT '0',
  UNIQUE KEY `page_id` (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=73 ;

--
-- Dumping data for table `imp_static_pages`
--

INSERT INTO `imp_static_pages` (`page_id`, `header_image`, `page_name`, `page_description`, `page_dateadded`, `page_datemodified`, `page_admin_id`) VALUES
(8, '', 'Portal and Content Management', 0x3c703e566564616e74757320536f6c7574696f6e7320686173206265656e20636f6e73697374656e7420696e2064656c69766572696e672074686520636f6d706c657820456e746572707269736520506f7274616c20736f6c7574696f6e7320746f2074686520637573746f6d65722e2057652068617665206f757220657870657274732077697468206f75747374616e64696e6720736b696c6c7320696e2064657369676e696e672074686520617263686974656374757265206f662074686520637573746f6d657220666163696e6720706f7274616c2077656273697465732061732077656c6c2061732073656c662d7365727669636520656d706c6f79656520706f7274616c2077656273697465732077697468696e20616e206f7267616e697a6174696f6e2e204f7572207465616d206f662065787065727426727371756f3b732068656c7073206f7267616e697a6174696f6e20696e20756e6465727374616e64696e6720746865206c6966652d6379636c65206f6620636f6e74656e7420616e6420726574656e74696f6e20616e6420646973706f736974696f6e20637269746572696126727371756f3b732e2057652068617665206f757220636f72652065787065727469736520696e204f7261636c652057656243656e74657220506f7274616c2c204f7261636c652057656243656e74657220436f6e74656e742c204f7261636c6520496d6167696e672026616d703b2050726f63657373204d616e6167656d656e742c204f7261636c652057656243656e74657220446f63756d656e7420436170747572652c204f7261636c652057656243656e74657220446973747269627574656420446f63756d656e7420436170747572652c204f7261636c65204469676974616c204173736574204d616e6167656d656e742e266e6273703b3c2f703e0d0a3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c696d67207372633d222f7573657266696c65732f696d6167652f696d6167653030332e6a7067222077696474683d2235303022206865696768743d223437362220616c743d2222202f3e3c2f703e, NULL, '2015-10-24', 0),
(9, '', 'Oracle Application Development Framework', 0x3c703e566564616e74757320536f6c7574696f6e7320697320706572666f726d696e67206d65746963756c6f75736c7920696e2064656c69766572696e6720746865206170706c69636174696f6e73206f6e204f7261636c65204170706c69636174696f6e20446576656c6f706d656e74204672616d65776f726b2031326320706c6174666f726d20776869636820697320746865206c61746573742072656c65617365642076657273696f6e2066726f6d204f7261636c652e204f7572207465616d206f66206578706572747320686173206275696c74206e756d626572206f6620636f6d706c6578206170706c69636174696f6e7320776869636820696e766f6c76657320696e746567726174696f6e207769746820766172696f7573206f7468657220467573696f6e204d6964646c657761726520746563686e6f6c6f677920636f6d706f6e656e74732e204f7572204f7261636c6520414446205370656369616c6973747320686176652064656c69766572656420746865206d697373696f6e20637269746963616c206170706c69636174696f6e7320746f206f757220637573746f6d65727320616e642068656c706564206175746f6d6174696e672074686520495420696e66726173747275637475726520616e6420736572766963657320666f72206f75722076616c7561626c6520637573746f6d6572732e2057652070726f76696465206f757220617373697374616e636520746f2068656c7020637573746f6d6572206d696772617465207468656972206578697374696e67206c6567616379206170706c69636174696f6e73206261736564206f6e204f7261636c6520466f726d7320746f20746865204f7261636c652041444620526963682046616365732057656220322e3020656e61626c6564206170706c69636174696f6e732e266e6273703b3c2f703e, NULL, '2015-10-24', 0),
(11, '', 'Enterprise Integration SOA/BPM/OSB/AIA', 0x3c703e566564616e74757320536f6c7574696f6e7320697320657370656369616c6c7920657175697070656420776974682074686520636f726520746563686e6963616c2065787065727469736520696e207468652061726561206f6620456e7465727072697365204170706c69636174696f6e20696e746567726174696f6e732e204f7572207465616d2c2077697468206974732070726f6c6f6e67656420616e6420646564696361746564206566666f72747320696e207468652061726561206f6620696d706c656d656e74696e672074686520696e746567726174696f6e7320686173207468652070726f76656e20747261636b207265636f7264206f662065787472656d6520737563636573732e205765206861766520636f72652065787065727469736520696e204f7261636c6520534f412c204f7261636c652053657276696365204275732c204f7261636c65204149412c204f7261636c652042504d2e266e6273703b3c2f703e0d0a3c703e3c696d67207372633d222f7573657266696c65732f696d6167652f666d7731325f706e672e6a7067222077696474683d2236353022206865696768743d223430332220616c743d2222202f3e3c2f703e, NULL, '2015-10-24', 0),
(13, '1339999179_sitemap.jpg', 'Sitemap', '', NULL, '2012-06-18', 0),
(5, '', 'Contact Us', 0x3c64697620636c6173733d22636f6e746163747573223e0d0a3c64697620636c6173733d22636f6e7461637475735f61646472657373223e0d0a3c64697620636c6173733d22636f6e7461637475735f61646472657373223e3c623e4865616471756172746572733a3c2f623e3c2f6469763e0d0a3c64697620636c6173733d22636f6e7461637475735f61646472657373223e3c623e3c6272202f3e0d0a3c2f623e3c2f6469763e0d0a3c64697620636c6173733d22636f6e7461637475735f61646472657373223e3c7370616e207374796c653d22666f6e742d73697a653a20736d616c6c3b223e3c7370616e207374796c653d22636f6c6f723a207267622835312c2035312c203531293b223e4c6576656c20322c203432302c20436f6c6c696e73205374726565742c204d656c626f75726e652c204342442c20566963746f72696120266e646173683b20333030302c204175737472616c69613c2f7370616e3e3c2f7370616e3e3c2f6469763e0d0a3c2f6469763e0d0a3c64697620636c6173733d22636f6e7461637475735f61646472657373223e3c7370616e207374796c653d22636f6c6f723a20726762283235352c203235352c20323535293b223e203c2f7370616e3e0d0a3c703e3c7374726f6e673e50686f6e65204e6f2e3c2f7374726f6e673e3a3c2f703e0d0a3c64697620636c6173733d22636f6e7461637475735f6164647265737331223e3c7370616e207374796c653d22666f6e742d73697a653a20736d616c6c3b223e2b3c7370616e207374796c653d22636f6c6f723a207267622835312c2035312c203531293b223e36312e3437303736363039353c2f7370616e3e3c2f7370616e3e3c2f6469763e0d0a3c2f6469763e0d0a3c2f6469763e0d0a3c64697620636c6173733d22636f6e74616374757331223e0d0a3c64697620636c6173733d22636f6e7461637475735f61646472657373223e266e6273703b3c2f6469763e0d0a3c2f6469763e, NULL, '2015-10-29', 0),
(3, '', 'Services', 0x3c703e566564616e74757320536f6c7574696f6e732073657276696365206f66666572696e677320656e636f6d70617373657320656e74697265204f7261636c6520467573696f6e204d6964646c657761726520546563686e6f6c6f677920737461636b20627920657874656e64696e67206f757220636f6e73756c74696e672026616d703b20696d706c656d656e746174696f6e20736572766963657320696e204f7261636c6520534f412c204f7261636c652042504d2c204f53422c204f7261636c65204149412c204f7261636c65204461746120496e7465677261746f722c204f7261636c65204144462c204f7261636c652057656243656e74657220506f7274616c2c204f7261636c6520456e746572707269736520436f6e74656e74204d616e6167656d656e742070726f64756374732e2057652068617665206f7572207465616d206f66207370656369616c69737420776974682062726f616420657870657269656e636520696e2074686520636f6e73756c74696e6720616e6420696d706c656d656e746174696f6e2070726f6a6563747320776974682074686520637573746f6d6572732061726f756e642074686520676c6f62652e204f757220537065637472756d206f66207365727669636573206172653a3c2f703e0d0a3c703e2662756c6c3b20456e746572707269736520496e746567726174696f6e205365727669636520506f7274666f6c696f20284f7261636c6520534f412c204f7261636c652053657276696365204275732c204f7261636c6520427573696e6573732050726f63657373204d616e6167656d656e742c204f7261636c65204170706c69636174696f6e20496e746567726174696f6e204172636869746563747572652c204f7261636c65204449293c2f703e0d0a3c703e2662756c6c3b20456e746572707269736520506f7274616c2026616d703b20436f6e74656e74204d616e6167656d656e74205365727669636520506f7274666f6c696f20284f7261636c652057656243656e74657220506f7274616c2c204f7261636c652057656243656e74657220436f6e74656e742c204f7261636c6520576562436f6e74656e74204d616e6167656d656e742c204f7261636c6520492f504d293c2f703e0d0a3c703e2662756c6c3b204f7261636c65204170706c69636174696f6e20446576656c6f706d656e74204672616d65776f726b205365727669636520506f7274666f6c696f20284f7261636c652041444620616e6420496e746567726174696f6e293c2f703e0d0a3c703e2662756c6c3b204f7261636c65204d6f62696c65204170706c69636174696f6e204672616d65776f726b205365727669636520506f7274666f6c696f20284f7261636c65204d41462c204f7261636c65204d6f62696c652042726f77736572204170706c69636174696f6e732c204f7261636c6520414446204d6f62696c65293c2f703e0d0a3c703e3c696d67207372633d222f7573657266696c65732f696d6167652f666d7731312e706e67222077696474683d2236353022206865696768743d223239392220616c743d2222202f3e3c2f703e, NULL, '2015-10-24', 0),
(4, '', 'Careers', '', NULL, '2015-10-26', 0),
(1, '', 'HomePage', NULL, NULL, NULL, 0),
(2, '', 'About Us', 0x3c703e3c7374726f6e673e566564616e74757320536f6c7574696f6e7320507479204c74643c2f7374726f6e673e20697320636f6d6d697474656420746f2068656c702065766f6c766520796f757220627573696e65737320696e206d756c7469706c652064696d656e73696f6e7320616e6420756e666f6c64206b6579206f70706f7274756e697469657320746f2072656475636520796f757220636f73742c20696d70726f766520706572666f726d616e63652c20696d62696265206167696c69747920616e642061636869657665207375627374616e7469616c206175746f6d6174696f6e20696e20796f7572204f7267616e697a6174696f6e2e204f757220495420536572766963657320656e636f6d706173736573204f7261636c6520467573696f6e204d6964646c657761726520546563686e6f6c6f677920737461636b20627920657874656e64696e67206f757220636f6e73756c74696e672026616d703b20696d706c656d656e746174696f6e206f66666572696e677320696e204f7261636c6520534f412c204f7261636c652042504d2c204f53422c204f7261636c65204149412c204f7261636c65204461746120496e7465677261746f722c204f7261636c65204144462c204f7261636c652057656243656e74657220506f7274616c2c204f7261636c6520456e746572707269736520436f6e74656e74204d616e6167656d656e742e3c2f703e0d0a3c703e3c7374726f6e673e4f757220466f756e646174696f6e3c2f7374726f6e673e3c2f703e0d0a3c703e466f726d6174696f6e206f6620566564616e7475732077617320616e206f7574636f6d65206f66207365766572616c206d696e647320776f726b696e672064697363726574656c7920666f722074686520636f6d6d6f6e20676f616c2077686963682069732074686520616c6c6576696174696f6e206f6620636f6d6d756e69747920616e64206275696c6420737563636573732073746f726965732077697468206f757220637573746f6d6572732e2057652062656c69657665207468617420677265617420706c616e7320646f206d616e6966657374206f6e207468656972206f776e206f6e63652074686520636f6d62696e6174696f6e206f662072696768742074696d652c207269676874206d696e647320616e642072696768742077696c6c20697320696e20706c6163652e20576520617420566564616e74757320656e73757265207468652064656c69766572616e6365206f6620626573742d696e2d636c61737320736572766963657320746f206f75722076616c7561626c6520637573746f6d6572732e2057652076616c7565207468652073756363657373206f66206f757220637573746f6d65727320616e6420666f6c6c6f77207468652072656375727369766520617070726f61636820746f20656e73757265207468652068696768206167696c6974792c206d6178696d756d2062656e656669742c206869676820706572666f726d616e636520616e64206f7074696d616c207574696c697a6174696f6e206f66207265736f75726365732e266e6273703b3c2f703e0d0a3c703e3c7374726f6e673e4f75722056616c7565733c2f7374726f6e673e3c2f703e0d0a3c703e2d204c65616465727368697020616e6420457863656c6c656e63653c2f703e0d0a3c703e2d20416e74696369706174696f6e2c204167696c69747920616e6420466c65786962696c6974793c2f703e0d0a3c703e2d20436f6e74696e756f75732067726f77746820616e6420696d70726f76656d656e743c2f703e0d0a3c703e2d205472616e73706172656e637920616e6420496e746567726974793c2f703e0d0a3c703e2d20436f6e74696e756f757320496e6e6f766174696f6e3c2f703e0d0a3c703e3c7374726f6e673e4f757220566973696f6e3c2f7374726f6e673e3c2f703e0d0a3c703e5765207374726f6e676c79206665656c20746865206e6563657373697479206f66206265696e6720636f6d706574656e7420696e207468652061726561206f6620736572766963657320746861742077652070726f7669646520746f206f757220637573746f6d65727320616e64206174207468652073616d652074696d65206d61696e7461696e696e6720746865206861726d6f6e792077697468206f757220616c6c69616e63657320616e64206e6f6e2d616c6c69616e63657320696e20657665727920706f737369626c65207761792e2057652062656c6965766520696e2074686520757068656176616c206f662074686520736f63696574792077697468206f757220637573746f6d6572732061742069747320666f63616c20706f696e742e3c2f703e, NULL, '2015-10-26', 0),
(72, '', 'Oracle Mobility Services', 0x3c703e4f7572205465616d2069732064656c696265726174656c7920776f726b696e67206f6e206275696c64696e6720736f6c7574696f6e732061726f756e64204f7261636c65204d41462073706163652e20576520686176652067726f77696e672071756974652072617069646c7920696e206275696c64696e67206f757420746865206e617469766520646576696365206170706c69636174696f6e7320746f206d65657420757020746865206e65656473206f66207468652066617374207061636564206f7267616e697a6174696f6e73207768657265206d6f62696c69747920697320617420686967682064656d616e642e266e6273703b3c2f703e0d0a3c703e3c696d67207372633d222f7573657266696c65732f696d6167652f6d6f62696c652d6164662e706e67222077696474683d2236353022206865696768743d223235342220616c743d2222202f3e3c2f703e, NULL, '2015-10-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `imp_static_pages2`
--

CREATE TABLE IF NOT EXISTS `imp_static_pages2` (
  `page_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `page_description` blob,
  `page_dateadded` date DEFAULT NULL,
  `page_datemodified` date DEFAULT NULL,
  `page_admin_id` int(10) unsigned DEFAULT '0',
  UNIQUE KEY `page_id` (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `imp_static_pages2`
--

INSERT INTO `imp_static_pages2` (`page_id`, `page_name`, `page_description`, `page_dateadded`, `page_datemodified`, `page_admin_id`) VALUES
(1, 'testing', 0x506c656173652055706461746520596f757220436f6e74656e742046726f6d20434d5320466f7220546869732050616765, NULL, NULL, 0),
(2, 'Work Injury Claims', 0x3c703e496620796f752061726520612066756c6c2d74696d652c20706172742d74696d65206f722063617375616c20656d706c6f79656520616e64206861766520737566666572656420616e20696e6a757279206173206120726573756c74206f6620796f7572206a6f622c206f72206576656e20696620796f7526727371756f3b7665206265656e20696e6a7572656420676f696e6720746f206f722066726f6d20796f757220776f726b706c6163652c20796f75206d6967687420626520656c696769626c6520746f206d616b65206120776f726b657226727371756f3b7320636f6d70656e736174696f6e20636c61696d2066726f6d20796f757220656d706c6f796572206f7220576f726b436f76657220756e6465722074686520576f726b657226727371756f3b7320436f6d70656e736174696f6e204163742e3c2f703e0d0a3c703e4974206973206f6674656e2074686520636173652074686174206120776f726b706c61636520636f6d70656e736174696f6e20636c61696d2077696c6c20636f766572206d65646963616c20657870656e73657320666f722074726561746d656e742c20776167657320616e64206c756d702073756d20636f6d70656e736174696f6e20666f7220796f757220696e6a7572792e20496620796f75207468696e6b20796f75206d617920626520656c696769626c6520746f206d616b65206120776f726b657226727371756f3b7320636f6d70656e736174696f6e20636c61696d2c20697426727371756f3b7320696d706f7274616e7420746f20737065616b207769746820657870657274732e203c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e436f6e7461637420746f20434d43204c61777965727320746f6461793c2f7374726f6e673e3c2f7370616e3e20616e64206c6574207468656d2068656c7020796f752064657465726d696e6520746865206265737420636f75727365206f6620616374696f6e213c2f703e0d0a3c703e266e6273703b3c7370616e207374796c653d22636f6c6f723a2023343536336163223e3c7374726f6e673e576f726b65727320436f6d70656e736174696f6e204c6177796572733c2f7374726f6e673e3c2f7370616e3e3c2f703e0d0a3c703e496620796f7526727371756f3b7265207468696e6b696e67206f66206d616b696e67206120776f726b65727326727371756f3b20636f6d70656e736174696f6e20636c61696d2c206275742061726520756e73757265207768617420746f20646f2c20696620796f752061726520656c696769626c652c206f72206576656e207768657468657220796f7526727371756f3b726520636f766572656420756e64657220576f726b436f766572206f7220627920796f757220656d706c6f79657226727371756f3b7320696e737572616e63652c207468656e203c7370616e207374796c653d22636f6c6f723a2023666630303030223e636f6e7461637420434d43204c61777965727320746f6461793c2f7370616e3e20616e642067657420746865207269676874206164766963652e3c2f703e0d0a3c703e434d43204c6177796572732061726520686967686c7920657870657269656e63656420696e20616c6c206172656173206f6620776f726b65727320636f6d70656e736174696f6e20616e642077696c6c206769766520796f75207468652072696768742061647669636520666f7220796f757220736974756174696f6e2e20434d43204c6177796572732068617665206120646564696361746564207465616d206f66206c6567616c20657870657274732077686f2063616e20616476697365206f6e20616c6c20666f726d73206f6620776f726b657226727371756f3b7320636f6d70656e736174696f6e2e3c2f703e, NULL, '2010-12-11', 2),
(3, 'Negligence Claims', 0x3c703e4e65676c6967656e636520636c61696d7320617265206120636f6d706c69636174656420617265612e205768656e2061646472657373696e6720616e79206973737565732072656c6174696e6720746f206e65676c6967656e63652c20697420697320696d706f7274616e74207468617420796f7520776f726b20776974682061206c6567616c206578706572742077686f20756e6465727374616e647320657665727920617370656374206f66206e65676c6967656e636520636c61696d732c20696e636c7564696e6720616c6c20676f7665726e6d656e7420726567756c6174696f6e7320616e6420737065636966696320696e74657276656e74696f6e732e3c2f703e0d0a3c703e4173206e65676c6967656e636520636173657320617265207479706963616c6c7920646966666963756c7420616e6420636f6d706c6963617465642c20697426727371756f3b7320696d706f7274616e7420746f20656e67616765206c6567616c20726570726573656e746174696f6e20746861742066756c6c7920756e6465727374616e647320746865206c6567616c20626f756e64617269657320616e642077686574686572206f72206e6f7420796f7520686176652061206368616e6365206f6620726563656976696e6720636f6d70656e736174696f6e2e20434d43204c6177796572732061726520757020746f2064617465206f6e20616c6c2061737065637473206f66206e65676c6967656e636520636c61696d7320696e636c7564696e6720616e7920676f7665726e6d656e74206368616e6765732e203c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e436f6e7461637420434d43204c6177796572733c2f7374726f6e673e3c2f7370616e3e20746f206469736375737320796f7572206e65676c6967656e636520636c61696d2e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023343536336163223e3c7374726f6e673e4d65646963616c204e65676c6967656e6365204c6177796572733c2f7374726f6e673e3c2f7370616e3e3c2f703e0d0a3c703e496620796f75206861766520657870657269656e636564206d65646963616c206e65676c6967656e6365206f6620616e79206b696e642c203c7374726f6e673e3c7370616e207374796c653d22636f6c6f723a2023666630303030223e636f6e7461637420434d43204c6177796572733c2f7370616e3e3c2f7374726f6e673e20746f206469736375737320796f757220736974756174696f6e2e3c2f703e0d0a3c703e4d65646963616c206e65676c6967656e6365206973206120686967686c7920636f6d706c65782061726561206f66206c61772c20736f20697420697320696d706f7274616e74207468617420796f752067657420746865207269676874206164766963652072696768742066726f6d207468652073746172742e20434d43204c6177796572732068617665206120646564696361746564207465616d206f66206c6567616c20657870657274732077686f2063616e2070726f766964652073706563696669632061647669636520726567617264696e6720616c6c20666f726d73206f66206d65646963616c206e65676c6967656e636520636f6d70656e736174696f6e2e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e436f6e7461637420434d43204c6177796572733c2f7374726f6e673e3c2f7370616e3e20746f2066696e64206f75742074686520706f74656e7469616c206f6620796f757220706572736f6e616c20736974756174696f6e2e20434d43204c6177796572732063616e2068656c7020796f7520746f2064657465726d696e65207768617420737465707320796f75206d69676874206e65656420746f2074616b6520746f20646f63756d656e7420796f757220636c61696d2c2077686574686572206f72206e6f7420796f75722070726163746974696f6e6572206578657263697365642070726f70657220266c6471756f3b64757479206f66206361726526726471756f3b2c20616e64206a75737420686f7720717569636b6c7920796f75206d6179207265636569766520636f6d70656e736174696f6e20696620796f7520617265207375636365737366756c2e3c2f703e0d0a3c703e546865207465616d206f6620686967686c7920657870657269656e636564206d65646963616c206e65676c6967656e6365206c61777965727320617420434d432063616e2070726f7669646520616363757261746520616e642064657461696c65642061647669636520726567617264696e6720796f757220736974756174696f6e2c20616e642068656c7020796f752064657465726d696e6520746865206265737420706f737369626c6520636f75727365206f6620616374696f6e2e3c2f703e, NULL, '2010-12-11', 3),
(4, 'Liability Claims', 0x3c703e5075626c6963204c696162696c69747920636c61696d73206172652067656e6572616c6c79206d616465207768656e20616e20696e6a757279206973207375666665726564206f7574736964652074686520686f6d652c20616e20696e6a75727920697320737566666572656420696e736964652074686520686f6d652064756520746f206661756c747920776f726b6d616e736869702c206f7220696620696e6a757279206973206361757365642064756520746f206661756c74792070726f64756374732e20536f6d6574696d657320726f616420616e6420776f726b20696e6a75726965732063616e20616c736f20626520636f6e7369646572656420666f72207075626c6963206c696162696c69747920636c61696d732e3c2f703e0d0a3c703e496620796f7526727371756f3b766520737566666572656420616e20696e6a75727920696e2061207075626c696320706c616365207468656e203c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e636f6e7461637420434d43204c6177796572733c2f7374726f6e673e3c2f7370616e3e20746f64617920617320796f75206d617920626520656c696769626c6520666f722061207075626c6963206c696162696c69747920636f6d70656e736174696f6e20636c61696d2e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023343536336163223e3c7374726f6e673e536c697020616e642046616c6c20496e6a75727920436c61696d733c2f7374726f6e673e3c2f7370616e3e3c2f703e0d0a3c703e496620796f7526727371756f3b766520657870657269656e63656420616e20696e6a757279206173206120726573756c74206f6620736f6d656f6e6520656c736526727371756f3b73206e65676c6967656e636520616e642061726520636f6e7369646572696e67207365656b696e6720706572736f6e616c20696e6a75727920636f6d70656e736174696f6e2c20627574206172656e26727371756f3b74207375726520696620796f752061726520656c696769626c652c207468656e203c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e636f6e7461637420434d43204c61777965727320746f6461793c2f7374726f6e673e3c2f7370616e3e2e3c2f703e0d0a3c703e5468656972207465616d206f6620657870657274732077696c6c206769766520796f75207468652072696768742061647669636520666f7220796f757220706172746963756c617220736974756174696f6e20696e636c7564696e672068656c70696e6720796f752064657465726d696e6520696620796f757220706572736f6e616c20696e6a75727920636c61696d20697320656c696769626c6520666f7220636f6d70656e736174696f6e2c207768617420736f7274206f66206368616e636520796f752068617665206f6620726563656976696e6720636f6d70656e736174696f6e20616e64206a75737420686f7720717569636b6c7920796f75206d69676874207265636569766520636f6d70656e736174696f6e2e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023343536336163223e3c7374726f6e673e4163636964656e7420436f6d70656e736174696f6e3c2f7374726f6e673e3c2f7370616e3e3c2f703e0d0a3c703e496620796f7526727371756f3b76652068616420616e206163636964656e742c207468656e20737065616b207769746820746865207075626c6963206c696162696c697479206578706572747320617420434d43204c61777965727320746f6461792e2054686520657870657274206163636964656e74206c61777965727320617420434d432063616e2061647669736520696620796f7572206d6f746f72206163636964656e7420636c61696d20697320656c696769626c6520616e6420746865206c696b656c69686f6f64206f6620796f7520726563656976696e6720636f6d70656e736174696f6e20666f7220616e7920696e6a7572696573206f722064616d616765732e3c2f703e0d0a3c703e496620796f7526727371756f3b76652068616420616e206163636964656e742c20796f75206d617920626520656c696769626c6520666f7220636f6d70656e736174696f6e2e2054686520667269656e646c7920616e642065787065727420737461666620617420434d43204c6177796572732063616e2070726f766964652074686520726967687420616476696365206f6e2077686574686572206f72206e6f7420796f7572206163636964656e74207175616c69666965732e203c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e436f6e74616374207468656d20746f6461793c2f7374726f6e673e3c2f7370616e3e20746f206469736375737320796f757220706572736f6e616c20736974756174696f6e2e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023343536336163223e3c7374726f6e673e4163636964656e74204c6177796572732057686f20556e6465727374616e643c2f7374726f6e673e3c2f7370616e3e3c2f703e0d0a3c703e486176696e6720616e206163636964656e742063616e20626520616e20656d6f74696f6e616c6c7920646966666963756c7420657870657269656e63652e2054686520636172696e67206578706572747320617420434d43204c617779657273206170707265636961746520796f7572206e65656420666f7220636f6d70656e736174696f6e2c20706172746963756c61726c7920696620796f752077657265206e6f74207468652061742d6661756c74206472697665722c206f7220696620746865206163636964656e742063617573656420796f7520657874656e736976652066696e616e6369616c206f75746c61792e3c2f703e0d0a3c703e434d43204c6177796572732068617320616e20657870657274207465616d206f66207370656369616c697374206163636964656e74206c61777965727320696e204272697362616e652077686f2063616e2068656c7020796f75207769746820796f7572206163636964656e7420636c61696d732e20536f20696620796f7526727371756f3b726520756e737572652c206f72206a757374206e65656420736f6d6520616476696365206f6e20686f77206265737420746f2070726f636565642c207468656e203c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e636f6e7461637420434d43204c61777965727320746f6461793c2f7374726f6e673e3c2f7370616e3e2e20546865792077696c6c2068656c7020796f7520746f20756e6465727374616e6420776869636820636f75727365206f6620616374696f6e20697320726967687420666f7220796f752e3c2f703e, NULL, '2010-12-11', 4),
(5, 'Motor Claims', 0x3c703e496620796f7526727371756f3b7665206861642061206d6f746f722076656869636c65206163636964656e742c207468656e20697426727371756f3b7320696d706f7274616e74207468617420796f7520737065616b207769746820616e20657870657274207465616d206f66206c617779657273207468617420756e6465727374616e64206576657279206c6567616c2061737065637420746f20646f2077697468206d6f746f722076656869636c65206163636964656e747320616e64206d6f746f722076656869636c6520636f6d70656e736174696f6e2e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e436f6e7461637420434d43204c61777965727320746f6461793c2f7374726f6e673e3c2f7370616e3e20696620796f75206861766520737566666572656420696e6a757279206f7220657870656e73652064756520746f2061206d6f746f722076656869636c65206163636964656e742e20546865697220657870657274207465616d206f66206d6f746f722076656869636c65206163636964656e74206c6177796572732077696c6c2068656c7020796f752066696e6420776869636820636f75727365206f6620616374696f6e206973206a75737420726967687420666f7220796f752e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023343536336163223e3c7374726f6e673e436172204163636964656e74204c6177796572733c2f7374726f6e673e3c2f7370616e3e3c2f703e0d0a3c703e496620796f75206861766520686164206120636172206163636964656e74206f722063617220637261736820616e642077657265206e6f74207468652061742d6661756c74206472697665722c20796f7520636f756c6420626520656c696769626c6520746f206d616b6520616e206163636964656e7420636c61696d20616e64207365656b20636f6d70656e736174696f6e2e20497426727371756f3b7320766974616c6c7920696d706f7274616e74207468617420796f752067657420746865207269676874206164766963652072696768742066726f6d207468652073746172742e3c2f703e0d0a3c703e54686520657870657274207465616d206f6620636172206163636964656e74206c61777965727320617420434d43204c6177796572732077696c6c2070726f76696465207468652072696768742061647669636520746f2068656c7020796f7520756e6465727374616e6420696620796f7572206d6f746f722076656869636c6520636c61696d20697320656c696769626c6520616e6420746865206c696b656c69686f6f64206f6620796f7520726563656976696e6720636f6d70656e736174696f6e2e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e436f6e7461637420434d43204c61777965727320746f6461793c2f7374726f6e673e3c2f7370616e3e20666f7220612072656c6961626c652c2070726f76656e20616e64207472757374656420636172206163636964656e74206c61777965722e20546865792068617665206f766572207477656e747920796561727320657870657269656e636520696e20746865206c6f63616c206d61726b65742c20616e642068617665207468652070726f76656e2072657075746174696f6e20666f7220737563636573732e3c2f703e, NULL, '2010-12-11', 5),
(6, 'Compensation', 0x3c703e496620796f7520617265206c6f6f6b696e6720666f7220636f6d70656e736174696f6e20666f7220616e206163636964656e74206f7220696e6a7572792c203c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e7468656e20737065616b20746f2074686520657870657274207465616d20617420434d43204c61777965727320746f6461793c2f7374726f6e673e3c2f7370616e3e2e2057697468206f766572207477656e747920796561727326727371756f3b20657870657269656e636520696e20746865206c6f63616c206d61726b65742c20434d43204c617779657273206b6e6f7720686f7720746f2067657420796f7520746865206265737420706f737369626c6520726573756c74732e205468656972207465616d206f6620657870657274206c6177796572732061726520736b696c6c656420696e20616c6c2061737065637473206f6620636f6d70656e736174696f6e20636c61696d732e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023343536336163223e3c7374726f6e673e496e6a75727920436f6d70656e736174696f6e3c2f7374726f6e673e3c2f7370616e3e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e436f6e7461637420434d43204c6177796572733c2f7374726f6e673e3c2f7370616e3e20696620796f75206e65656420616476696365206f6e20616e79206c6576656c206f6620696e6a75727920636f6d70656e736174696f6e2e20546865792077696c6c2070726f7669646520796f752077697468207468652072696768742061647669636520726567617264696e6720796f757220696e6a75727920616e64206769766520796f7520736f6d652067756964616e6365206f6e2074686520657874656e7420746f20776869636820796f75206d617920626520636f7665726564206279207075626c6963206c696162696c69747920726567756c6174696f6e732e3c2f703e0d0a3c703e434d43204c6177796572732077696c6c2068656c7020796f7520746f20756e6465727374616e6420696620796f757220696e6a75727920636f6d70656e736174696f6e20636c61696d20697320656c696769626c6520616e6420746865206c696b656c69686f6f64206f6620796f7520726563656976696e6720636f6d70656e736174696f6e2e3c2f703e0d0a3c703e496620796f7526727371756f3b766520737566666572656420616e20696e6a757279206f6620616e79206b696e642c207768657468657220617420776f726b2c207768696c652064726976696e672c206f72206576656e207669736974696e6720796f7572206c6f63616c2073686f7070696e672063656e7472652c207468656e203c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e636f6e7461637420434d43204c61777965727320746f6461793c2f7374726f6e673e3c2f7370616e3e20746f2066696e64206f757420696620796f752061726520656c696769626c6520666f7220696e6a75727920636f6d70656e736174696f6e2e3c2f703e0d0a3c703e3c7370616e207374796c653d22636f6c6f723a2023343536336163223e3c7374726f6e673e436f6d70656e736174696f6e204c6177796572733c2f7374726f6e673e3c2f7370616e3e3c2f703e0d0a3c703e436f6d70656e736174696f6e20697320616e20656d6f74696f6e616c20616e64206368616c6c656e67696e672061726561206f66206c61772e205768656e20697420636f6d657320746f20636f6d70656e736174696f6e2c20697426727371756f3b7320696d706f7274616e74207468617420796f752067657420746865207269676874206164766963652066726f6d2061207472757374656420616e6420657870657269656e636564206f7267616e69736174696f6e2e20434d43204c6177796572732068617665206f766572207477656e7479207965617273206f6620657870657269656e63652068656c70696e67204175737472616c69616e73206d616b65207375636365737366756c20636f6d70656e736174696f6e20636c61696d732e3c2f703e0d0a3c703e3c7374726f6e673e3c7370616e207374796c653d22636f6c6f723a2023666630303030223e436f6e7461637420746865206578706572747320617420434d43204c6177796572733c2f7370616e3e3c2f7374726f6e673e20746f20756e6465727374616e6420696620796f757220636f6d70656e736174696f6e20636c61696d20697320656c696769626c6520616e6420746f20636c6561726c7920756e6465727374616e6420746865206c696b656c69686f6f64206f6620796f7520726563656976696e6720636f6d70656e736174696f6e20666f7220796f757220706172746963756c617220636c61696d2e3c2f703e0d0a3c703e496620796f7526727371756f3b7265207365656b696e6720636f6d70656e736174696f6e206275742061726520756e73757265207768617420746f20646f206e6578742c203c7370616e207374796c653d22636f6c6f723a2023666630303030223e3c7374726f6e673e636f6e74616374207468652065787065727420636f6d70656e736174696f6e206c61777965727320617420434d433c2f7374726f6e673e3c2f7370616e3e20746f20676574207468652072696768742061647669636520616e642067657420746865207265616c206b6e6f772d686f77207468617420796f75206e65656420666f7220746865206265737420706572736f6e616c20726573756c7420666f7220796f757220636f6d70656e736174696f6e20636c61696d2e3c2f703e, NULL, '2010-12-11', 6);

-- --------------------------------------------------------

--
-- Table structure for table `imp_tempemails`
--

CREATE TABLE IF NOT EXISTS `imp_tempemails` (
  `EMAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAILS` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `SUBMITTIME` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `APPROVE` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`EMAIL_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `imp_tempemails`
--


-- --------------------------------------------------------

--
-- Table structure for table `imp_testimonialtitle`
--

CREATE TABLE IF NOT EXISTS `imp_testimonialtitle` (
  `TestimonialId` int(10) NOT NULL AUTO_INCREMENT,
  `TestimonialTitle` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `TestimonialDescription` text COLLATE latin1_general_ci NOT NULL,
  `TestimonialDate` date NOT NULL DEFAULT '0000-00-00',
  `TestimonialNumber` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ClientName` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `URL` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `City` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `State` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Country` varchar(150) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Photo` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Category` int(11) NOT NULL DEFAULT '0',
  `Featured` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`TestimonialId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `imp_testimonialtitle`
--

INSERT INTO `imp_testimonialtitle` (`TestimonialId`, `TestimonialTitle`, `TestimonialDescription`, `TestimonialDate`, `TestimonialNumber`, `ClientName`, `URL`, `City`, `State`, `Country`, `Photo`, `Category`, `Featured`, `Status`) VALUES
(15, 'Testimonial Title', 'Vedantus take the necessary steps to provide solutions that meet the current and future requirements of our clients.....', '2015-10-26', '', 'Testimonial Client', 'http://abcd', 'New Delhi', '', '', '1445848230_fmw9.png', 0, '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `imp_video`
--

CREATE TABLE IF NOT EXISTS `imp_video` (
  `video_id` int(10) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `video` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `CurrentDate` date NOT NULL,
  `Sortorder` int(10) NOT NULL,
  `Customer` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`video_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `imp_video`
--

INSERT INTO `imp_video` (`video_id`, `video_name`, `video`, `Description`, `CurrentDate`, `Sortorder`, `Customer`, `Status`) VALUES
(8, 'video2', '1315483995_homepage.flv', ' fdgdkjg gsgsgsg  ', '2012-06-19', 1, '', 'Y'),
(9, 'video3', '1318571607_mediacov.flv', ' gdfgdgfdgdfgdfgghgg     ', '2012-06-19', 2, '', 'Y'),
(10, 'ggggggghhh', '1340186678_Winter.jpg', 'sdfsf', '2012-06-20', 0, '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `imp_videocust`
--

CREATE TABLE IF NOT EXISTS `imp_videocust` (
  `video_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `imp_videocust`
--

INSERT INTO `imp_videocust` (`video_id`, `user_id`) VALUES
(8, 5),
(6, 4),
(7, 4),
(7, 3),
(7, 1),
(9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `urban_customer`
--

CREATE TABLE IF NOT EXISTS `urban_customer` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(25) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_lname` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `user_email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `user_loginid` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_passwd` varchar(225) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_address1` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_address2` varchar(255) COLLATE latin1_general_ci DEFAULT '',
  `user_city` int(10) NOT NULL,
  `user_zip` varchar(55) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_state` int(10) NOT NULL,
  `user_country` int(10) DEFAULT NULL,
  `user_sid` varchar(225) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_validated` enum('1','0') COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `user_created` date NOT NULL DEFAULT '0000-00-00',
  `user_lastupdated` date NOT NULL DEFAULT '0000-00-00',
  `user_isactive` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `user_status` enum('A','U') COLLATE latin1_general_ci NOT NULL DEFAULT 'U',
  `title` varchar(55) COLLATE latin1_general_ci DEFAULT '',
  `user_phone` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Business` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `urban_customer`
--

INSERT INTO `urban_customer` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_loginid`, `user_passwd`, `user_address1`, `user_address2`, `user_city`, `user_zip`, `user_state`, `user_country`, `user_sid`, `user_validated`, `user_created`, `user_lastupdated`, `user_isactive`, `user_status`, `title`, `user_phone`, `Business`) VALUES
(1, 'swati', 'saraswat', 'swati@us-creations.com', 'swati', 'swati', '       Noida', '       UP', 55, '22222', 63, 99, '', '0', '0000-00-00', '0000-00-00', 'Y', 'U', '', '2222222222', '');

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `meta_value` longtext COLLATE latin1_general_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wp_commentmeta`
--


-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE latin1_general_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE latin1_general_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_approved` (`comment_approved`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Mr WordPress', '', 'http://wordpress.org/', '', '2011-09-06 10:28:35', '2011-09-06 10:28:35', 'Hi, this is a comment.<br />To delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, '1', '', '', 0, 0),
(2, 10, 'admin', 'swati@us-creations.com', '', '192.168.1.223', '2011-09-08 12:44:26', '2011-09-08 12:44:26', 'f dsdf dfsfdg', 0, '1', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; msn OptimizedIE8;ENUS; BTRS7219)', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE latin1_general_ci NOT NULL,
  `link_rss` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `wp_links`
--

INSERT INTO `wp_links` (`link_id`, `link_url`, `link_name`, `link_image`, `link_target`, `link_description`, `link_visible`, `link_owner`, `link_rating`, `link_updated`, `link_rel`, `link_notes`, `link_rss`) VALUES
(1, 'http://codex.wordpress.org/', 'Documentation', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(2, 'http://wordpress.org/development/', 'Development Blog', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', 'http://wordpress.org/development/feed/'),
(3, 'http://wordpress.org/extend/ideas/', 'Suggest Ideas', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(4, 'http://wordpress.org/support/', 'Support Forum', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(5, 'http://wordpress.org/extend/plugins/', 'Plugins', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(6, 'http://wordpress.org/extend/themes/', 'Themes', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(7, 'http://planet.wordpress.org/', 'WordPress Planet', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(8, 'http://hfhfghfghfg.com', 'fghfghfghfghf', '', '', ' ertet ete eet etetete', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL DEFAULT '0',
  `option_name` varchar(64) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE latin1_general_ci NOT NULL,
  `autoload` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=185 ;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `blog_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 0, '_transient_random_seed', '93c74f403aeda35151d6541a65b58eb1', 'yes'),
(2, 0, 'siteurl', 'http://192.168.1.70/companyprojects/synergyit/blog', 'yes'),
(3, 0, 'blogname', 'SynergisticIT', 'yes'),
(4, 0, 'blogdescription', 'SynergisticIT Blog', 'yes'),
(5, 0, 'users_can_register', '0', 'yes'),
(6, 0, 'admin_email', 'swati@us-creations.com', 'yes'),
(7, 0, 'start_of_week', '1', 'yes'),
(8, 0, 'use_balanceTags', '0', 'yes'),
(9, 0, 'use_smilies', '1', 'yes'),
(10, 0, 'require_name_email', '1', 'yes'),
(11, 0, 'comments_notify', '1', 'yes'),
(12, 0, 'posts_per_rss', '10', 'yes'),
(14, 0, 'rss_use_excerpt', '0', 'yes'),
(15, 0, 'mailserver_url', 'mail.example.com', 'yes'),
(16, 0, 'mailserver_login', 'login@example.com', 'yes'),
(17, 0, 'mailserver_pass', 'password', 'yes'),
(18, 0, 'mailserver_port', '110', 'yes'),
(19, 0, 'default_category', '1', 'yes'),
(20, 0, 'default_comment_status', 'open', 'yes'),
(21, 0, 'default_ping_status', 'open', 'yes'),
(22, 0, 'default_pingback_flag', '1', 'yes'),
(23, 0, 'default_post_edit_rows', '10', 'yes'),
(24, 0, 'posts_per_page', '10', 'yes'),
(25, 0, 'date_format', 'F j, Y', 'yes'),
(26, 0, 'time_format', 'g:i a', 'yes'),
(27, 0, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(28, 0, 'links_recently_updated_prepend', '<em>', 'yes'),
(29, 0, 'links_recently_updated_append', '</em>', 'yes'),
(30, 0, 'links_recently_updated_time', '120', 'yes'),
(31, 0, 'comment_moderation', '0', 'yes'),
(32, 0, 'moderation_notify', '1', 'yes'),
(33, 0, 'permalink_structure', '', 'yes'),
(34, 0, 'gzipcompression', '0', 'yes'),
(35, 0, 'hack_file', '0', 'yes'),
(36, 0, 'blog_charset', 'UTF-8', 'yes'),
(37, 0, 'moderation_keys', '', 'no'),
(38, 0, 'active_plugins', 'a:0:{}', 'yes'),
(39, 0, 'home', 'http://192.168.1.70/companyprojects/synergyit/blog', 'yes'),
(40, 0, 'category_base', '', 'yes'),
(41, 0, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(42, 0, 'advanced_edit', '0', 'yes'),
(43, 0, 'comment_max_links', '2', 'yes'),
(44, 0, 'gmt_offset', '0', 'yes'),
(45, 0, 'default_email_category', '1', 'yes'),
(46, 0, 'recently_edited', 'a:5:{i:0;s:99:"D:\\Program Files\\xampp\\htdocs\\CompanyProjects\\synergyit\\blog/wp-content/themes/twentyten/footer.php";i:2;s:98:"D:\\Program Files\\xampp\\htdocs\\CompanyProjects\\synergyit\\blog/wp-content/themes/twentyten/style.css";i:3;s:96:"D:\\Program Files\\xampp\\htdocs\\CompanyProjects\\synergyit\\blog/wp-content/themes/twentyten/rtl.css";i:4;s:96:"D:\\Program Files\\xampp\\htdocs\\CompanyProjects\\synergyit\\blog/wp-content/themes/twentyten/404.php";i:5;s:98:"D:\\Program Files\\xampp\\htdocs\\CompanyProjects\\synergyit\\blog/wp-content/themes/twentyten/index.php";}', 'no'),
(48, 0, 'template', 'twentyten', 'yes'),
(49, 0, 'stylesheet', 'twentyten', 'yes'),
(50, 0, 'comment_whitelist', '1', 'yes'),
(51, 0, 'blacklist_keys', '', 'no'),
(52, 0, 'comment_registration', '0', 'yes'),
(53, 0, 'rss_language', 'en', 'yes'),
(54, 0, 'html_type', 'text/html', 'yes'),
(55, 0, 'use_trackback', '0', 'yes'),
(56, 0, 'default_role', 'subscriber', 'yes'),
(57, 0, 'db_version', '17516', 'yes'),
(58, 0, 'uploads_use_yearmonth_folders', '1', 'yes'),
(59, 0, 'upload_path', 'D:\\Program Files\\xampp\\htdocs\\CompanyProjects\\synergyit\\blog/wp-content/uploads', 'yes'),
(61, 0, 'blog_public', '1', 'yes'),
(62, 0, 'default_link_category', '2', 'yes'),
(63, 0, 'show_on_front', 'posts', 'yes'),
(64, 0, 'tag_base', '', 'yes'),
(65, 0, 'show_avatars', '1', 'yes'),
(66, 0, 'avatar_rating', 'G', 'yes'),
(67, 0, 'upload_url_path', '', 'yes'),
(68, 0, 'thumbnail_size_w', '150', 'yes'),
(69, 0, 'thumbnail_size_h', '150', 'yes'),
(70, 0, 'thumbnail_crop', '1', 'yes'),
(71, 0, 'medium_size_w', '300', 'yes'),
(72, 0, 'medium_size_h', '300', 'yes'),
(73, 0, 'avatar_default', 'mystery', 'yes'),
(74, 0, 'enable_app', '0', 'yes'),
(75, 0, 'enable_xmlrpc', '0', 'yes'),
(76, 0, 'large_size_w', '1024', 'yes'),
(77, 0, 'large_size_h', '1024', 'yes'),
(78, 0, 'image_default_link_type', 'file', 'yes'),
(79, 0, 'image_default_size', '', 'yes'),
(80, 0, 'image_default_align', '', 'yes'),
(81, 0, 'close_comments_for_old_posts', '0', 'yes'),
(82, 0, 'close_comments_days_old', '14', 'yes'),
(83, 0, 'thread_comments', '0', 'yes'),
(84, 0, 'thread_comments_depth', '5', 'yes'),
(85, 0, 'page_comments', '1', 'yes'),
(86, 0, 'comments_per_page', '50', 'yes'),
(87, 0, 'default_comments_page', 'newest', 'yes'),
(88, 0, 'comment_order', 'asc', 'yes'),
(89, 0, 'sticky_posts', 'a:0:{}', 'yes'),
(90, 0, 'widget_categories', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(91, 0, 'widget_text', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(92, 0, 'widget_rss', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 0, 'timezone_string', '', 'yes'),
(94, 0, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(124, 0, '_transient_rewrite_rules', '', 'yes'),
(96, 0, 'cron', 'a:3:{i:1318242593;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1318248205;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(97, 0, '_transient_doing_cron', '1318226153', 'yes'),
(98, 0, '_transient_update_core', 'O:8:"stdClass":3:{s:7:"updates";a:1:{i:0;O:8:"stdClass":5:{s:8:"response";s:7:"upgrade";s:3:"url";s:30:"http://wordpress.org/download/";s:7:"package";s:40:"http://wordpress.org/wordpress-3.2.1.zip";s:7:"current";s:5:"3.2.1";s:6:"locale";s:5:"en_US";}}s:12:"last_checked";i:1315478449;s:15:"version_checked";s:5:"2.8.4";}', 'yes'),
(99, 0, '_transient_update_plugins', 'O:8:"stdClass":3:{s:12:"last_checked";i:1315472666;s:7:"checked";a:3:{s:19:"akismet/akismet.php";s:5:"2.2.6";s:49:"delete-duplicate-posts/delete-duplicate-posts.php";s:3:"1.1";s:9:"hello.php";s:5:"1.5.1";}s:8:"response";a:1:{s:49:"delete-duplicate-posts/delete-duplicate-posts.php";O:8:"stdClass":5:{s:2:"id";s:5:"10022";s:4:"slug";s:22:"delete-duplicate-posts";s:11:"new_version";s:5:"2.2.2";s:3:"url";s:59:"http://wordpress.org/extend/plugins/delete-duplicate-posts/";s:7:"package";s:70:"http://downloads.wordpress.org/plugin/delete-duplicate-posts.2.2.2.zip";}}}', 'yes'),
(148, 0, 'nest_theme_options', 'a:12:{s:11:"sidebar_pos";s:5:"right";s:8:"logo_url";s:0:"";s:22:"is_display_author_info";s:1:"0";s:19:"is_display_by-nc-sa";s:1:"1";s:30:"is_display_random_posts_widget";s:0:"";s:28:"is_display_post_meta_in_page";s:1:"0";s:37:"is_display_posts_navi_links_in_single";s:1:"1";s:7:"rss_url";s:0:"";s:11:"twitter_url";s:0:"";s:12:"facebook_url";s:0:"";s:8:"sina_url";s:0:"";s:13:"code_siteinfo";s:0:"";}', 'yes'),
(101, 0, 'auth_salt', 'W&#p$M^VW68Bkq8OO2PV^tgin9B!7IVSfhzyPTGQM^TxBvpjW^^UBC^YtxMVwdQE', 'yes'),
(102, 0, 'logged_in_salt', '7U*bw5rxAvOm#50N9&oXTT6X&IOsU0w$H%z4crOoSkm#9sqD0BkCncz6iRgj)4xl', 'yes'),
(103, 0, 'widget_pages', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(104, 0, 'widget_calendar', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(105, 0, 'widget_archives', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(106, 0, 'widget_links', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(107, 0, 'widget_meta', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(108, 0, 'widget_search', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(109, 0, 'widget_recent-posts', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(110, 0, 'widget_recent-comments', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(111, 0, 'widget_tag_cloud', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(112, 0, 'dashboard_widget_options', 'a:4:{s:24:"dashboard_incoming_links";a:5:{s:4:"home";s:50:"http://192.168.1.70/companyprojects/synergyit/blog";s:4:"link";s:126:"http://blogsearch.google.com/blogsearch?scoring=d&partner=wordpress&q=link:http://192.168.1.70/companyprojects/synergyit/blog/";s:3:"url";s:170:"http://blogsearch.google.com/blogsearch_feeds?hl=en&scoring=d&ie=utf-8&num=20&output=rss&partner=wordpress&q=link:http://192.168.1.70/companyprojects/synergyit/wordpress/";s:5:"items";i:10;s:9:"show_date";b:0;}s:17:"dashboard_primary";a:7:{s:4:"link";s:33:"http://wordpress.org/development/";s:3:"url";s:38:"http://wordpress.org/development/feed/";s:5:"title";s:26:"WordPress Development Blog";s:5:"items";i:2;s:12:"show_summary";i:1;s:11:"show_author";i:0;s:9:"show_date";i:1;}s:19:"dashboard_secondary";a:4:{s:4:"link";s:28:"http://planet.wordpress.org/";s:3:"url";s:33:"http://planet.wordpress.org/feed/";s:5:"title";s:20:"Other WordPress News";s:5:"items";i:5;}s:25:"dashboard_recent_comments";a:1:{s:5:"items";i:5;}}', 'yes'),
(113, 0, 'nonce_salt', 'dZY1413DGhF)d4v*dX(j25UtSw$bxGWB^C7mSHn3GZRvhcvsu0qQze2k2tthTcWU', 'yes'),
(152, 0, 'current_theme', 'Twenty Ten', 'yes'),
(116, 0, '_transient_timeout_plugin_slugs', '1315910462', 'no'),
(117, 0, '_transient_plugin_slugs', 'a:2:{i:0;s:19:"akismet/akismet.php";i:1;s:9:"hello.php";}', 'no'),
(169, 0, 'recently_activated', 'a:0:{}', 'yes'),
(144, 0, '_transient_timeout_wporg_theme_feature_list', '1315488051', 'no'),
(145, 0, '_transient_wporg_theme_feature_list', 'a:5:{s:6:"Colors";a:15:{i:0;s:5:"black";i:1;s:4:"blue";i:2;s:5:"brown";i:3;s:4:"gray";i:4;s:5:"green";i:5;s:6:"orange";i:6;s:4:"pink";i:7;s:6:"purple";i:8;s:3:"red";i:9;s:6:"silver";i:10;s:3:"tan";i:11;s:5:"white";i:12;s:6:"yellow";i:13;s:4:"dark";i:14;s:5:"light";}s:7:"Columns";a:6:{i:0;s:10:"one-column";i:1;s:11:"two-columns";i:2;s:13:"three-columns";i:3;s:12:"four-columns";i:4;s:12:"left-sidebar";i:5;s:13:"right-sidebar";}s:5:"Width";a:2:{i:0;s:11:"fixed-width";i:1;s:14:"flexible-width";}s:8:"Features";a:18:{i:0;s:8:"blavatar";i:1;s:10:"buddypress";i:2;s:17:"custom-background";i:3;s:13:"custom-colors";i:4;s:13:"custom-header";i:5;s:11:"custom-menu";i:6;s:12:"editor-style";i:7;s:21:"featured-image-header";i:8;s:15:"featured-images";i:9;s:20:"front-page-post-form";i:10;s:19:"full-width-template";i:11;s:12:"microformats";i:12;s:12:"post-formats";i:13;s:20:"rtl-language-support";i:14;s:11:"sticky-post";i:15;s:13:"theme-options";i:16;s:17:"threaded-comments";i:17;s:17:"translation-ready";}s:7:"Subject";a:3:{i:0;s:7:"holiday";i:1;s:13:"photoblogging";i:2;s:8:"seasonal";}}', 'no'),
(130, 0, 'sidebars_widgets', 'a:2:{s:19:"wp_inactive_widgets";a:13:{i:0;s:10:"nav_menu-2";i:1;s:7:"pages-2";i:2;s:10:"calendar-2";i:3;s:10:"archives-2";i:4;s:7:"links-2";i:5;s:6:"meta-2";i:6;s:8:"search-2";i:7;s:6:"text-2";i:8;s:12:"categories-2";i:9;s:14:"recent-posts-2";i:10;s:17:"recent-comments-2";i:11;s:5:"rss-2";i:12;s:11:"tag_cloud-2";}s:13:"array_version";i:3;}', 'yes'),
(129, 0, 'category_children', 'a:0:{}', 'yes'),
(149, 0, '_transient_update_themes', 'O:8:"stdClass":2:{s:12:"last_checked";i:1315482696;s:8:"response";a:1:{s:6:"ahimsa";a:3:{s:11:"new_version";s:3:"3.2";s:3:"url";s:41:"http://wordpress.org/extend/themes/ahimsa";s:7:"package";s:58:"http://wordpress.org/extend/themes/download/ahimsa.3.2.zip";}}}', 'yes'),
(139, 0, 'kubrick_header_image', 'header-img.php?upper=3366FF&lower=4180b6', 'yes'),
(160, 0, 'db_upgraded', '', 'yes'),
(161, 0, '_site_transient_update_core', 'O:8:"stdClass":3:{s:7:"updates";a:1:{i:0;O:8:"stdClass":7:{s:8:"response";s:7:"upgrade";s:3:"url";s:30:"http://wordpress.org/download/";s:7:"package";s:40:"http://wordpress.org/wordpress-3.2.1.zip";s:7:"current";s:5:"3.2.1";s:6:"locale";s:5:"en_US";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";}}s:12:"last_checked";i:1318226155;s:15:"version_checked";s:5:"3.1.3";}', 'yes'),
(162, 0, '_site_transient_update_plugins', 'O:8:"stdClass":3:{s:12:"last_checked";i:1318226156;s:7:"checked";a:2:{s:19:"akismet/akismet.php";s:5:"2.5.3";s:9:"hello.php";s:3:"1.6";}s:8:"response";a:0:{}}', 'yes'),
(183, 0, '_site_transient_timeout_theme_roots', '1318233357', 'yes'),
(184, 0, '_site_transient_theme_roots', 'a:1:{s:9:"twentyten";s:7:"/themes";}', 'yes'),
(165, 0, '_site_transient_update_themes', 'O:8:"stdClass":1:{s:12:"last_checked";i:1318226158;}', 'yes'),
(166, 0, 'can_compress_scripts', '1', 'yes'),
(170, 0, 'theme_mods_twentyten', 'a:1:{s:12:"header_image";s:93:"http://192.168.1.70/companyprojects/synergyit/blog/wp-content/uploads/2011/09/blog_header.jpg";}', 'yes'),
(175, 0, '_transient_timeout_feed_a5420c83891a9c88ad2a4f04584a5efc', '1315863430', 'no'),
(176, 0, '_transient_feed_a5420c83891a9c88ad2a4f04584a5efc', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n	\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:72:"\n		\n		\n		\n		\n		\n		\n				\n\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n\n	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:39:"WordPress Plugins Â» View: Most Popular";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"http://wordpress.org/extend/plugins/browse/popular/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:39:"WordPress Plugins Â» View: Most Popular";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:5:"en-US";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 12 Sep 2011 09:39:51 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:36:"http://bbpress.org/?v=1.1-alpha-2855";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:15:{i:0;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"uberdose on "All in One SEO Pack"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:65:"http://wordpress.org/extend/plugins/all-in-one-seo-pack/#post-753";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 30 Mar 2007 20:08:18 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:40:"753@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:92:"Automatically optimizes your Wordpress blog for Search Engines (Search Engine Optimization).";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"uberdose";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:29:"Arne on "Google XML Sitemaps"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:70:"http://wordpress.org/extend/plugins/google-sitemap-generator/#post-132";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Mar 2007 22:31:32 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:40:"132@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:105:"This plugin will generate a special XML sitemap which will help search engines to better index your blog.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Arne";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:66:"eight7teen on "SexyBookmarks | email, bookmark, and share buttons"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:60:"http://wordpress.org/extend/plugins/sexybookmarks/#post-9249";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 22 Feb 2009 11:30:11 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"9249@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:104:"Adds an attractive social bookmarking menu to your posts, pages, index, or any combination of the three.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"eight7teen";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:36:"Takayuki Miyoshi on "Contact Form 7"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:61:"http://wordpress.org/extend/plugins/contact-form-7/#post-2141";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 02 Aug 2007 12:45:03 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"2141@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:54:"Just another contact form plugin. Simple but flexible.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:16:"Takayuki Miyoshi";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"Alex Rabe on "NextGEN Gallery"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:62:"http://wordpress.org/extend/plugins/nextgen-gallery/#post-1169";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 23 Apr 2007 20:08:06 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"1169@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:108:"NextGEN Gallery is a full integrated Image Gallery plugin for WordPress with dozens of options and features.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"Alex Rabe";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:38:"Brian Colinger on "WordPress Importer"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:66:"http://wordpress.org/extend/plugins/wordpress-importer/#post-18101";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 20 May 2010 17:42:45 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"18101@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:101:"Import posts, pages, comments, custom fields, categories, tags and more from a WordPress export file.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Brian Colinger";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:34:"flash gallery on "1 Flash Gallery"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:63:"http://wordpress.org/extend/plugins/1-flash-gallery/#post-24163";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 03 Feb 2011 14:02:51 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"24163@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:146:"1 Flash Gallery is a Photo Gallery with slideshow function, many skins and powerfull admin to manage your image gallery without any program skills";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"flash gallery";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"BraveNewCode Inc. on "WPtouch"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:54:"http://wordpress.org/extend/plugins/wptouch/#post-5468";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 01 May 2008 04:58:09 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"5468@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:150:"WPtouch: A simple, powerful and elegant mobile theme for your website.\n\nWPtouch automatically transforms your WordPress blog into an iPhone applicatio";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:17:"BraveNewCode Inc.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:28:"casibus on "ourSTATS Widget"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:65:"http://wordpress.org/extend/plugins/ourstatsde-widget/#post-18282";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 29 May 2010 14:16:19 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"18282@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:51:"create a widget for the ourstats.de counter service";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"casibus";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:36:"Frederick Townes on "W3 Total Cache"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:62:"http://wordpress.org/extend/plugins/w3-total-cache/#post-12073";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 29 Jul 2009 18:46:31 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"12073@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:135:"Improve site performance and user experience via caching: browser, page, object, database, minify and content delivery network support.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:16:"Frederick Townes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:10;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:37:"Andy Skelton on "WordPress.com Stats"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"http://wordpress.org/extend/plugins/stats/#post-1355";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 06 May 2007 02:15:03 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"1355@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:150:"Simple, concise stats with no additional load on your server. Plug into WordPress.com&#039;s stats system with this plugin or use Jetpack to bring eve";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Andy Skelton";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:11;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:38:"mdawaffe on "Jetpack by WordPress.com"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/extend/plugins/jetpack/#post-23862";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 20 Jan 2011 02:21:38 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"23862@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:104:"Supercharge your WordPress site with powerful features previously only available to WordPress.com users.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"mdawaffe";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:12;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:41:"Joost de Valk on "WordPress SEO by Yoast"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:60:"http://wordpress.org/extend/plugins/wordpress-seo/#post-8321";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 01 Jan 2009 20:34:44 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"8321@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:135:"Yoast&#039;s all in one SEO solution for your WordPress blog: SEO titles, meta descriptions, XML sitemaps, breadcrumbs &#38; much more.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Joost de Valk";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:13;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:27:"Matt Mullenweg on "Akismet"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"http://wordpress.org/extend/plugins/akismet/#post-15";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Mar 2007 22:11:30 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:39:"15@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:98:"Akismet checks your comments against the Akismet web service to see if they look like spam or not.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Matt Mullenweg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:14;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:49:"Joost de Valk on "Google Analytics for WordPress"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:77:"http://wordpress.org/extend/plugins/google-analytics-for-wordpress/#post-2316";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 14 Sep 2007 12:15:27 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"2316@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:145:"Track your WordPress site easily and with lots of metadata: views per author &#38; category, automatic tracking of outbound clicks and pageviews.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Joost de Valk";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:52:"http://wordpress.org/extend/plugins/rss/view/popular";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:8:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Mon, 12 Sep 2011 09:53:32 GMT";s:12:"content-type";s:23:"text/xml; charset=UTF-8";s:10:"connection";s:5:"close";s:4:"vary";s:15:"Accept-Encoding";s:13:"last-modified";s:19:"2007-03-30 20:08:18";s:14:"content-length";s:4:"8003";s:4:"x-nc";s:11:"HIT luv 139";}s:5:"build";s:14:"20090627192103";}', 'no'),
(153, 0, 'widget_nav_menu', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(154, 0, 'embed_autourls', '1', 'yes'),
(155, 0, 'embed_size_w', '', 'yes'),
(156, 0, 'embed_size_h', '600', 'yes'),
(157, 0, 'page_for_posts', '0', 'yes'),
(158, 0, 'page_on_front', '0', 'yes'),
(159, 0, 'default_post_format', '0', 'yes'),
(177, 0, '_transient_timeout_feed_mod_a5420c83891a9c88ad2a4f04584a5efc', '1315863430', 'no'),
(178, 0, '_transient_feed_mod_a5420c83891a9c88ad2a4f04584a5efc', '1315820230', 'no'),
(179, 0, '_transient_timeout_feed_57bc725ad6568758915363af670fd8bc', '1315863432', 'no');
INSERT INTO `wp_options` (`option_id`, `blog_id`, `option_name`, `option_value`, `autoload`) VALUES
(180, 0, '_transient_feed_57bc725ad6568758915363af670fd8bc', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n	\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:72:"\n		\n		\n		\n		\n		\n		\n				\n\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n\n	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"WordPress Plugins Â» View: Newest";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:47:"http://wordpress.org/extend/plugins/browse/new/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:33:"WordPress Plugins Â» View: Newest";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:5:"en-US";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 12 Sep 2011 09:52:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:36:"http://bbpress.org/?v=1.1-alpha-2855";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:15:{i:0;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"bhoogterp on "Scripture Cloud"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:63:"http://wordpress.org/extend/plugins/scripture-cloud/#post-30026";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 10 Sep 2011 13:18:19 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30026@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:66:"Creates a Scripture Cloud of referenced Bible verses in your blog.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"bhoogterp";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:39:"hebeisenconsulting on "Authorize by IP"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:63:"http://wordpress.org/extend/plugins/authorize-by-ip/#post-29959";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 08 Sep 2011 09:15:19 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"29959@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:150:"Authorize by IP is a tool that allows access to the wordpress website based on specified IP addresses. This is most ideal when the wordpress website i";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:18:"hebeisenconsulting";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:46:"hebeisenconsulting on "iOs Icon for Wordpress"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:71:"http://wordpress.org/extend/plugins/ios-icons-for-wordpress/#post-29954";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 08 Sep 2011 07:34:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"29954@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:144:"iOS icons for Wordpress allows an image to be set as an iPhone, iPod Touch or iPad icon when &#34;Add to Home Screen&#34; is used on the device.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:18:"hebeisenconsulting";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:38:"iandunn on "Re-Abolish Slavery Ribbon"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://wordpress.org/extend/plugins/re-abolish-slavery-ribbon/#post-29732";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 31 Aug 2011 02:53:09 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"29732@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:129:"Adds a &#34;re-abolish slavery&#34; ribbon to the upper right-hand corner of your site, which links to the Not For Sale campaign.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"iandunn";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:34:"lupka on "Admin Collapse Subpages"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:71:"http://wordpress.org/extend/plugins/admin-collapse-subpages/#post-30042";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 11 Sep 2011 04:46:14 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30042@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:116:"jQuery-powered plugin that allows expansion/collapse of subpages within pages admin (/edit.php?post_type=page) menu.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"lupka";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"SpamCaptcher on "WP-SpamCaptcher"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:60:"http://wordpress.org/extend/plugins/spamcaptcher/#post-29885";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 05 Sep 2011 23:01:50 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"29885@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:125:"Integrates SpamCaptcher anti-spam methods with WordPress including comment and registration spam protection. WPMU Compatible.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"SpamCaptcher";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:37:"viniciusgomes on "Simple Admin Posts"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:66:"http://wordpress.org/extend/plugins/simple-admin-posts/#post-30044";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 11 Sep 2011 07:50:34 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30044@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:87:"Plugin para gerenciar as postagens(visualizaÃ§Ã£o/deleÃ§Ã£o) de seu blog de forma facil";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"viniciusgomes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:37:"Kevin Dees on "FitVids for WordPress"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:69:"http://wordpress.org/extend/plugins/fitvids-for-wordpress/#post-30041";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 11 Sep 2011 04:27:29 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30041@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:81:"This plugin makes videos responsive using the FitVids jQuery plugin on WordPress.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Kevin Dees";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"Nurul Imam on "Style Replacement"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:65:"http://wordpress.org/extend/plugins/style-replacement/#post-30040";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 11 Sep 2011 04:17:31 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30040@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:133:"Change the style of your posts with options drop down menu.\nYou can also implement a blog-azine with a different style in every post.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Nurul Imam";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:25:"tfardella on "Post Ender"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:58:"http://wordpress.org/extend/plugins/post-ender/#post-30021";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 10 Sep 2011 05:47:39 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30021@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:145:"Post Ender is a simple plugin that allows you to add text either at the end of \nevery post or on selected posts using the [post_ender] shortcode.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"tfardella";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:10;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:32:"claudiosanches on "PowerComment"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:60:"http://wordpress.org/extend/plugins/powercomment/#post-30020";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 10 Sep 2011 04:42:17 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30020@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:112:"Valide os coment&#225;rios do seu blog, evitando que o usu&#225;rio envie coment&#225;rios com campos em branco.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"claudiosanches";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:11;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:28:"GraphicEdit on "Real Sticky"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:59:"http://wordpress.org/extend/plugins/real-sticky/#post-30039";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 11 Sep 2011 03:51:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30039@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:36:"Import a Sticky page to top of site.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:11:"GraphicEdit";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:12;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:56:"ab-tools on "Facebook, Twitter & Google+ Social Widgets"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:86:"http://wordpress.org/extend/plugins/facebook-twitter-google-social-widgets/#post-30009";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Sep 2011 22:02:11 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30009@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:150:"A simple plug-in that displays the most important social widgets from Facebook, Twitter and Google+ below your posts. Very easy to setup: just activat";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"ab-tools";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:13;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:44:"songsthatsaved on "8tracks Shortcode Plugin"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:65:"http://wordpress.org/extend/plugins/8tracks-shortcode/#post-30019";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 10 Sep 2011 03:20:11 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30019@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:62:"Allows you to embed mixtapes from 8tracks.com via a shortcode.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"songsthatsaved";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:14;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"benatkin on "MyOpenID Delegation"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:67:"http://wordpress.org/extend/plugins/myopenid-delegation/#post-30022";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 10 Sep 2011 10:12:59 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30022@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:41:"This plugin delegates OpenID to MyOpenID.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"benatkin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:48:"http://wordpress.org/extend/plugins/rss/view/new";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:8:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Mon, 12 Sep 2011 09:53:34 GMT";s:12:"content-type";s:23:"text/xml; charset=UTF-8";s:10:"connection";s:5:"close";s:4:"vary";s:15:"Accept-Encoding";s:13:"last-modified";s:19:"2011-09-10 13:18:19";s:14:"content-length";s:4:"7957";s:4:"x-nc";s:11:"HIT luv 139";}s:5:"build";s:14:"20090627192103";}', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `meta_value` longtext COLLATE latin1_general_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(8, 1, '_edit_lock', '1315391126'),
(9, 1, '_edit_last', '1'),
(13, 8, '_wp_attached_file', '2011/09/cropped-industries_header.jpg'),
(14, 8, '_wp_attachment_context', 'custom-header'),
(15, 8, '_wp_attachment_metadata', 'a:6:{s:5:"width";s:3:"940";s:6:"height";s:3:"198";s:14:"hwstring_small";s:23:"height=''26'' width=''128''";s:4:"file";s:37:"2011/09/cropped-industries_header.jpg";s:5:"sizes";a:2:{s:9:"thumbnail";a:3:{s:4:"file";s:37:"cropped-industries_header-150x150.jpg";s:5:"width";s:3:"150";s:6:"height";s:3:"150";}s:6:"medium";a:3:{s:4:"file";s:36:"cropped-industries_header-300x63.jpg";s:5:"width";s:3:"300";s:6:"height";s:2:"63";}}s:10:"image_meta";a:10:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";}}'),
(16, 10, '_edit_last', '1'),
(17, 10, '_edit_lock', '1315485840:1'),
(28, 16, '_wp_attached_file', '2011/09/cropped-blog_header.jpg'),
(29, 16, '_wp_attachment_context', 'custom-header'),
(30, 16, '_wp_attachment_metadata', 'a:6:{s:5:"width";s:3:"940";s:6:"height";s:3:"198";s:14:"hwstring_small";s:23:"height=''26'' width=''128''";s:4:"file";s:31:"2011/09/cropped-blog_header.jpg";s:5:"sizes";a:2:{s:9:"thumbnail";a:3:{s:4:"file";s:31:"cropped-blog_header-150x150.jpg";s:5:"width";s:3:"150";s:6:"height";s:3:"150";}s:6:"medium";a:3:{s:4:"file";s:30:"cropped-blog_header-300x63.jpg";s:5:"width";s:3:"300";s:6:"height";s:2:"63";}}s:10:"image_meta";a:10:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";}}'),
(31, 17, '_wp_attached_file', '2011/09/blog_header.jpg'),
(32, 17, '_wp_attachment_context', 'custom-header'),
(33, 17, '_wp_attachment_metadata', 'a:6:{s:5:"width";s:3:"940";s:6:"height";s:3:"198";s:14:"hwstring_small";s:23:"height=''26'' width=''128''";s:4:"file";s:23:"2011/09/blog_header.jpg";s:5:"sizes";a:2:{s:9:"thumbnail";a:3:{s:4:"file";s:23:"blog_header-150x150.jpg";s:5:"width";s:3:"150";s:6:"height";s:3:"150";}s:6:"medium";a:3:{s:4:"file";s:22:"blog_header-300x63.jpg";s:5:"width";s:3:"300";s:6:"height";s:2:"63";}}s:10:"image_meta";a:10:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";}}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE latin1_general_ci NOT NULL,
  `post_title` text COLLATE latin1_general_ci NOT NULL,
  `post_excerpt` text COLLATE latin1_general_ci NOT NULL,
  `post_status` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE latin1_general_ci NOT NULL,
  `pinged` text COLLATE latin1_general_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` text COLLATE latin1_general_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2011-09-06 10:28:35', '2011-09-06 10:28:35', 'Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2011-09-06 10:28:35', '2011-09-06 10:28:35', '', 0, 'http://192.168.1.70/companyprojects/synergyit/wordpress/?p=1', 0, 'post', '', 1),
(5, 1, '2011-09-08 12:03:41', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2011-09-08 12:03:41', '0000-00-00 00:00:00', '', 0, 'http://192.168.1.70/companyprojects/synergyit/blog/?p=5', 0, 'post', '', 0),
(8, 1, '2011-09-08 12:41:37', '2011-09-08 12:41:37', 'http://192.168.1.70/companyprojects/synergyit/blog/wp-content/uploads/2011/09/cropped-industries_header.jpg', 'cropped-industries_header.jpg', '', 'inherit', 'closed', 'open', '', 'cropped-industries_header-jpg', '', '', '2011-09-08 12:41:37', '2011-09-08 12:41:37', '', 0, 'http://192.168.1.70/companyprojects/synergyit/blog/wp-content/uploads/2011/09/cropped-industries_header.jpg', 0, 'attachment', 'image/jpeg', 0),
(9, 1, '2011-09-08 12:42:49', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2011-09-08 12:42:49', '0000-00-00 00:00:00', '', 0, 'http://192.168.1.70/companyprojects/synergyit/blog/?p=9', 0, 'post', '', 0),
(10, 1, '2011-09-08 12:43:57', '2011-09-08 12:43:57', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing', 'Testing blog entery', '', 'publish', 'open', 'open', '', 'testing-blog-entery', '', '', '2011-09-08 12:43:57', '2011-09-08 12:43:57', '', 0, 'http://192.168.1.70/companyprojects/synergyit/blog/?p=10', 0, 'post', '', 1),
(11, 1, '2011-09-08 12:43:23', '2011-09-08 12:43:23', '', 'Testing blog entery', '', 'inherit', 'open', 'open', '', '10-revision', '', '', '2011-09-08 12:43:23', '2011-09-08 12:43:23', '', 10, 'http://192.168.1.70/companyprojects/synergyit/blog/?p=11', 0, 'revision', '', 0),
(16, 1, '2011-09-08 12:58:11', '2011-09-08 12:58:11', 'http://192.168.1.70/companyprojects/synergyit/blog/wp-content/uploads/2011/09/cropped-blog_header.jpg', 'cropped-blog_header.jpg', '', 'inherit', 'closed', 'open', '', 'cropped-blog_header-jpg', '', '', '2011-09-08 12:58:11', '2011-09-08 12:58:11', '', 0, 'http://192.168.1.70/companyprojects/synergyit/blog/wp-content/uploads/2011/09/cropped-blog_header.jpg', 0, 'attachment', 'image/jpeg', 0),
(17, 1, '2011-09-08 12:59:07', '2011-09-08 12:59:07', 'http://192.168.1.70/companyprojects/synergyit/blog/wp-content/uploads/2011/09/blog_header.jpg', 'blog_header.jpg', '', 'inherit', 'open', 'open', '', 'blog_header-jpg', '', '', '2011-09-08 12:59:07', '2011-09-08 12:59:07', '', 0, 'http://192.168.1.70/companyprojects/synergyit/blog/wp-content/uploads/2011/09/blog_header.jpg', 0, 'attachment', 'image/jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'Blogroll', 'blogroll', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 2, 0),
(2, 2, 0),
(3, 2, 0),
(4, 2, 0),
(5, 2, 0),
(6, 2, 0),
(7, 2, 0),
(1, 1, 0),
(3, 1, 0),
(4, 1, 0),
(8, 2, 0),
(10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 2),
(2, 2, 'link_category', '', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `meta_value` longtext COLLATE latin1_general_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'rich_editing', 'true'),
(3, 1, 'comment_shortcuts', 'false'),
(4, 1, 'admin_color', 'fresh'),
(5, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(7, 1, 'wp_user_level', '10'),
(8, 1, 'wp_usersettings', 'm0=o&m1=c&m2=c&m3=o&m4=o&m5=o&m6=c&m7=o&m8=c'),
(9, 1, 'wp_usersettingstime', '1315477367'),
(10, 1, 'wp_autosave_draft_ids', 'a:2:{i:-1315305713;i:3;i:-1315305773;i:4;}'),
(11, 1, 'wp_dashboard_quick_press_last_post_id', '5'),
(12, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(13, 1, 'metaboxhidden_nav-menus', 'a:2:{i:0;s:8:"add-post";i:1;s:12:"add-post_tag";}'),
(14, 1, 'wp_user-settings', 'm0=o&m1=o&m2=c&m3=c&m4=c&m5=o&m6=o&m7=c&m8=o&m9=o'),
(15, 1, 'wp_user-settings-time', '1315824101');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_pass` varchar(64) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wp_users`
--

