-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 02, 2005 at 11:09 PM
-- Server version: 4.0.15
-- PHP Version: 5.1.0-dev
-- 
-- Database: `usr_web7_1`
-- 
CREATE DATABASE `usr_web7_1`;
USE usr_web7_1;

-- --------------------------------------------------------

-- 
-- Table structure for table `pages`
-- 

CREATE TABLE `pages` (
  `ID` int(10) NOT NULL default '0',
  `title` varchar(50) NOT NULL default '',
  `pagekey` varchar(50) NOT NULL default '',
  `masterpage` varchar(50) default NULL,
  `view` int(10) NOT NULL default '1',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `pages`
-- 

INSERT INTO `pages` VALUES (0, 'Home Page', 'index', NULL, 1);
INSERT INTO `pages` VALUES (1, 'Events', 'events', NULL, 2);
INSERT INTO `pages` VALUES (6, 'Elections', 'elections', NULL, 2);
INSERT INTO `pages` VALUES (10, 'Login Failed', 'loginfailure', 'elections', 2);
INSERT INTO `pages` VALUES (12, 'Vote Submission', 'votesubmit', 'elections', 2);
INSERT INTO `pages` VALUES (11, 'Election System', 'login', 'elections', 2);
INSERT INTO `pages` VALUES (13, 'Vote Verification', 'verifyvote', 'elections', 2);
INSERT INTO `pages` VALUES (15, 'Logout', 'logout', 'elections', 2);
INSERT INTO `pages` VALUES (17, 'Forgotten Password?', 'emailpassword', 'elections', 2);
INSERT INTO `pages` VALUES (47, 'Election Results', 'ballottotal', 'elections', 2);
INSERT INTO `pages` VALUES (7, 'Documents', 'documents', NULL, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `views`
-- 

CREATE TABLE `views` (
  `ID` int(4) NOT NULL auto_increment,
  `view` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`ID`),
  FULLTEXT KEY `view` (`view`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `views`
-- 

INSERT INTO `views` VALUES (1, 'view1');
INSERT INTO `views` VALUES (2, 'view2');
-- 
-- Database: `usr_web7_2`
-- 
CREATE DATABASE `usr_web7_2`;
USE usr_web7_2;

-- --------------------------------------------------------

-- 
-- Table structure for table `categories`
-- 

CREATE TABLE `categories` (
  `ID` int(10) NOT NULL auto_increment,
  `class` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `categories`
-- 

INSERT INTO `categories` VALUES (1, 'Freshmen');
INSERT INTO `categories` VALUES (2, 'Sophomores');
INSERT INTO `categories` VALUES (3, 'Juniors');
INSERT INTO `categories` VALUES (4, 'Seniors');
INSERT INTO `categories` VALUES (5, 'Announcements');

-- --------------------------------------------------------

-- 
-- Table structure for table `events`
-- 

CREATE TABLE `events` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(200) NOT NULL default '',
  `tagline` varchar(255) default NULL,
  `class` int(10) unsigned NOT NULL default '0',
  `text` text NOT NULL,
  `location` text,
  `meetingplace` text,
  `contactinfo` text,
  `posttime` datetime default NULL,
  `modifytime` timestamp(14) NOT NULL,
  `eventdate` date default '0000-00-00',
  `eventtime` time default '00:00:00',
  `postuser` int(11) NOT NULL default '0',
  `viewings` int(10) unsigned NOT NULL default '0',
  `imagelink` int(10) unsigned default NULL,
  `gallerylink` int(10) unsigned default NULL,
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `events`
-- 

INSERT INTO `events` VALUES (4, 'Election Announcement', NULL, 0, 'Elections for [Class] will be held [time] and will continue through [end time]', 'Location', NULL, 'Email', '2047-04-07 04:47:47', '20470402121137', '2047-04-07', '00:00:00', 47, 20, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `eventsbackup`
-- 

CREATE TABLE `eventsbackup` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(200) NOT NULL default '',
  `tagline` varchar(255) default NULL,
  `class` int(10) unsigned NOT NULL default '0',
  `text` text NOT NULL,
  `location` text,
  `meetingplace` text,
  `contactinfo` text,
  `posttime` datetime default NULL,
  `modifytime` timestamp(14) NOT NULL,
  `eventdate` date default '0000-00-00',
  `eventtime` time default '00:00:00',
  `postuser` int(11) NOT NULL default '0',
  `viewings` int(10) unsigned NOT NULL default '0',
  `imagelink` int(10) unsigned default NULL,
  `gallerylink` int(10) unsigned default NULL,
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=29 ;

-- 
-- Dumping data for table `eventsbackup`
-- 

INSERT INTO `eventsbackup` VALUES (1, 'Looking Forward to a New Semester', NULL, 0, 'As students are at home and resting, the staff and faculty are busily preparing for a whole new year. Academic Vice-President commented recently.', NULL, '', '', '2005-01-15 16:12:28', '20150927212714', NULL, '00:00:00', 1, 67, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (2, 'Merry Christmas and Happy New Year!', NULL, 0, 'The entire school wishes you and yours all the best this holiday season. For more information on holiday celebrations, please be sure to view the events section where a variety of information pertaining to the makeup of the known universe can be easily parsed at your convience.', NULL, '', '', '2005-01-15 16:12:37', '20150927212909', NULL, '00:00:00', 3, 68, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (3, 'New Website', NULL, 3, 'We are proud to announce a new website, providing greater functionality and access to vital student information. Please be sure to surf around and discover what is new.  Though many sections may not yet be complete, you can look forward to many exciting changes in the coming days.', NULL, '', '', '2005-01-15 16:12:43', '20151014232905', NULL, '00:00:00', 5, 65, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (4, 'Newest Article on the Block', NULL, 0, 'This is the primary text of the article as it appears in the universe of this realm.', NULL, '', '', '2005-01-15 16:12:49', '20151014233102', NULL, '00:00:00', 0, 65, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (6, 'Stuff going on', 'Really fun stuff, I tell you', 0, 'This is the text', 'It is happeing in a very interesting place.', 'We are meeting somewhere', 'Contact Gioardio.', '2005-01-16 15:50:49', '20050311212141', '2005-01-18', '15:50:49', 50, 74, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (7, 'Fun stuff', 'Fun as all creation.', 0, 'More fun stuff abounds.', 'Spencer, MA', 'Domingoville, CA', 'Gerry Clairance McGuiver', '2005-01-16 15:54:34', '20050306040744', '2006-09-01', '08:29:00', 47, 76, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (8, '47 Society Member Banquet', 'All the numbers you can eat.', 0, 'A feast of mathematics.  All the numbers you can eat.  OOOOOOooooh, 47 is a wonderful number, 47 is a wonderful number... oh 47 is a wonderful numBERRRR... that nobody can deny.  For the express purpose of expending the available entity of containment requisitioned for the use of placing linguistics-oriented characters in a MySQL enabled, PHP controlled internet-accessable online entity -- here goes nothin'':\r\n\r\n47\r\n\r\n42\r\n\r\n1729\r\n\r\n2112\r\n\r\nThanks a quadrillion for wasting your otherwise totally invaluable (a.k.a worthless) existance by exploring this entity.', 'This festive and fully homogenious event will be getting underway at the most symetrical and transflective location in the entire entity of the campus.  Guess.', 'We will be conjoining outiside the mathematics suite.  From here, we will make cursory runs among the two very interesting places that are located within the entity of the campus.', 'Contact the almighty number -- the holy number 47 -- to arrange a meeting with the greatest mathematically inclined mental entities in the extire expanse of the known and unknown universe.', '2005-01-12 02:47:47', '20350804121549', '2005-01-22', '17:47:47', 47, 132, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (9, 'Councelor''s meeting for the mentally unstable', 'Let the crazyness begin', 0, 'Meeting for those who need help.  Badly.', 'Counceling center.', 'A happy, happy place where everyone must go when they need to be happy to each other.', 'Howard Dean, current president of the Center for the Mentally Unstable.', '2005-01-16 16:02:56', '20160307121006', '2005-01-27', '00:00:00', 12, 101, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (10, 'Past event', 'If you see me, it is bad', 0, 'This event should not appear on any lists, because it''s time is already past.', 'Nowhere', 'Noplace', 'Somebody', '2005-01-16 16:52:27', '20111230200719', '2005-01-01', '01:00:00', 47, 66, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (12, 'National raise a hog day', NULL, 0, 'Time to raise a pig.', 'On the farm', NULL, 'Farmer Hogget', '2005-01-18 00:24:21', '20030125181329', '2005-01-26', '03:24:47', 0, 92, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (13, 'Movie night of the century', NULL, 0, '47 movies in 100 hours?  Bring it on!', 'Your neighborhood theater.', 'Uh... your parking lot.  Don''t have one?  Pave one, then meet there.', 'President (of the known universe, naturally), me.  Period.', '2005-01-18 00:27:29', '20060829040532', '2005-01-30', '07:00:00', 0, 99, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (14, 'TestTitle', NULL, 0, 'TestText', 'TestLocation', 'Location', NULL, NULL, '19921014125109', '0000-00-00', '00:00:00', 0, 0, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (15, 'What?', NULL, 0, 'What?', 'Where?', 'Huh?', 'Who?', '2005-01-18 21:01:12', '20630709001406', '2008-09-24', '15:00:00', 47, 10, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (16, 'Test Announcement', NULL, 1, 'Nothing.', 'Nowhere.', 'Noplace.', 'Nobody.', '2005-01-18 23:36:21', '20150722170917', '2008-09-24', '15:10:47', 47, 8, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (17, 'Senate Takeover', NULL, 1, 'Early this morning, agents of an unknown regime attempted an armed takeover of the senate.  Utilizing miniature nurf cannons, the attackers were set on totally usurping the government.  More details to come.', 'Senate Center.', '', '', '2005-01-18 23:58:18', '20150610175752', '0000-00-00', '00:00:00', 47, 1, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (18, 'Sad Story of my life', NULL, 1, 'Text', '', '', 'None', '2005-01-19 00:08:10', '20030407111404', '0000-00-00', '05:00:00', 47, 0, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (23, 'This is a better article', NULL, 3, 'Nothing.  Absolutely nothing.', 'Nowhere', 'Noplace', 'Nobody', '2005-01-19 17:34:58', '19900412051912', '2006-06-01', '05:00:00', 47, 8, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (22, 'Test Announcement 2', NULL, 1, 'Text', '', 'Testplace', 'Nobody', '2005-01-19 17:32:29', '19900310012713', '2008-09-25', '15:10:47', 47, 15, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (24, 'National Piglatin Songwriter Accompaniment Day', NULL, 1, 'Everyone must sing!  Accompany the school Piglatin Awareness team in their daily ritual of songwriting.', '', '', 'Billy Joe Phil', '2005-01-19 22:42:30', '20410223074900', '2005-09-24', '00:00:00', 47, 25, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (25, 'National Ungoy Day', NULL, 1, 'Play with the monkeys!', '', '', '', '2005-01-19 22:48:12', '20410328021746', '2005-10-28', '00:00:00', 47, 10, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (26, 'National Deforestation Day', NULL, 6, 'There must be something useful here.', 'Noplace at all, gents.', 'In the jungle, the mighty jungle, the expansive jungle, the deforrested jungle.', 'Kyle the logger.', '2005-01-23 13:56:40', '20200928174116', '2005-01-30', '05:00:00', 47, 16, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (27, 'National PHP Appreciation Day', NULL, 5, 'PHP Appreciation day will be the most important event of your otherwise insignificant lives.', '', '', '', '2005-01-23 15:37:22', '20050710201542', '0000-00-00', '15:47:47', 47, 3, NULL, NULL);
INSERT INTO `eventsbackup` VALUES (28, 'Time to eat llama squirrels', NULL, 1, 'The Llama Squirrels will rejoice at the elimination of the ethical and moral foundation of clam fish bait.', 'Llama Squirrel''s Corner', '', 'Contact the squirrel guild to arrange any meetings.', '2005-01-23 17:13:42', '19900608095902', '2005-03-06', '06:00:00', 47, 30, NULL, NULL);
-- 
-- Database: `usr_web7_3`
-- 
CREATE DATABASE `usr_web7_3`;
USE usr_web7_3;

-- --------------------------------------------------------

-- 
-- Table structure for table `authteam`
-- 

CREATE TABLE `authteam` (
  `id` int(4) NOT NULL auto_increment,
  `teamname` varchar(25) NOT NULL default '',
  `teamlead` varchar(25) NOT NULL default '',
  `status` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `teamname` (`teamname`,`teamlead`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `authteam`
-- 

INSERT INTO `authteam` VALUES (1, 'Admin', 'sa', 'active');
INSERT INTO `authteam` VALUES (2, 'Voters', 'sa', 'active');

-- --------------------------------------------------------

-- 
-- Table structure for table `authuser`
-- 

CREATE TABLE `authuser` (
  `id` int(11) NOT NULL auto_increment,
  `uname` varchar(25) NOT NULL default '',
  `uname2` varchar(25) NOT NULL default '',
  `uname3` varchar(25) NOT NULL default '',
  `passwd` varchar(32) NOT NULL default '',
  `firstname` varchar(255) NOT NULL default '',
  `lastname` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `team` varchar(25) NOT NULL default '',
  `level` int(4) NOT NULL default '0',
  `status` varchar(10) NOT NULL default '',
  `voted` int(1) NOT NULL default '0',
  `lastlogin` datetime default NULL,
  `logincount` int(11) default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=120 ;

-- 
-- Dumping data for table `authuser`
-- 

INSERT INTO `authuser` VALUES (1, 'uname1', 'uname2', 'uname3', 'password', 'First', 'Last', 'email', 'Voters', 11, 'active', 1, '2047-04-07 04:47:47', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `authuserOld`
-- 

CREATE TABLE `authuserOld` (
  `id` int(11) NOT NULL auto_increment,
  `uname` varchar(25) NOT NULL default '',
  `uname2` varchar(25) NOT NULL default '',
  `uname3` varchar(25) NOT NULL default '',
  `passwd` varchar(32) NOT NULL default '',
  `firstname` varchar(255) NOT NULL default '',
  `lastname` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `team` varchar(25) NOT NULL default '',
  `level` int(4) NOT NULL default '0',
  `status` varchar(10) NOT NULL default '',
  `voted` int(1) NOT NULL default '0',
  `lastlogin` datetime default NULL,
  `logincount` int(11) default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=480 ;

-- 
-- Dumping data for table `authuserOld`
-- 

INSERT INTO `authuserOld` VALUES (1, 'sa', 'sa', 'sa', 'adminpw', '', '', '', 'Admin', 1, 'active', 0, '2047-04-07 04:47:47', 0);
INSERT INTO `authuserOld` VALUES (2, 'admin', 'admin', 'admin', 'adminpw', '', '', '', 'Admin', 1, 'active', 0, '2047-04-07 04:47:47', 10);
INSERT INTO `authuserOld` VALUES (3, 'uname1', 'uname2', 'uname3', 'password', 'First', 'Last', 'email', 'Voters', 11, 'active', 1, '2047-04-07 04:47:47', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `candidates`
-- 

CREATE TABLE `candidates` (
  `ID` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `position` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `candidates`
-- 


INSERT INTO `candidates` VALUES (1, 'Candidate Name 1', '', 1);
INSERT INTO `candidates` VALUES (2, 'Candidate Name 2', '', 1);
INSERT INTO `candidates` VALUES (3, 'Candidate Name 3', '', 2);


-- --------------------------------------------------------

-- 
-- Table structure for table `elections`
-- 

CREATE TABLE `elections` (
  `ID` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `instructions` text,
  `positiontable` varchar(255) NOT NULL default '',
  `ballottable` varchar(255) NOT NULL default '',
  `open` int(1) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `elections`
-- 

INSERT INTO `elections` VALUES (1, 'Dummy Election', '<p><font class="ballotsize">Official Dummy Ballot</font></p>\r\n<p><font class="ballotsize">Please make your selection for the following positions. Use the radio buttons to select your preferred candidate. Where only one candidate is running for a particular position, please vote "yes" to approve of that candidate, or "no" to reject that candidate. After pressing "submit" at the bottom of this ballot, you will be asked to confirm your selections.</font></p>', 'dummylookup', 'dummyballot', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `logins`
-- 

CREATE TABLE `logins` (
  `ID` int(10) NOT NULL auto_increment,
  `firstname` varchar(255) NOT NULL default '',
  `lastname` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `password` varchar(47) NOT NULL default '',
  `enabled` int(1) NOT NULL default '0',
  `voted` int(1) NOT NULL default '0',
  `numlogins` int(10) NOT NULL default '0',
  `voteid` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `logins`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `positions`
-- 

CREATE TABLE `positions` (
  `ID` int(10) NOT NULL auto_increment,
  `positionname` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `positions`
-- 

INSERT INTO `positions` VALUES (1, 'President');
INSERT INTO `positions` VALUES (2, 'Vice President');

-- --------------------------------------------------------

-- 
-- Table structure for table `dummylookup`
-- 

CREATE TABLE `dummylookup` (
  `ID` int(10) NOT NULL auto_increment,
  `position` int(10) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `dummylookup`
-- 

INSERT INTO `dummylookup` VALUES (1, 1);
INSERT INTO `dummylookup` VALUES (2, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `dummyballot`
-- 

CREATE TABLE `dummyballot` (
  `ID` int(10) NOT NULL default '0',
  `1` int(10) default NULL,
  `2` int(10) default NULL,
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `dummyballot`
-- 

INSERT INTO `dummyballot` VALUES (1, 1, 3, );
