-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2017 at 09:28 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comaildb`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktb`
--

CREATE TABLE IF NOT EXISTS `feedbacktb` (
  `FID` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Feedback` text NOT NULL,
  `FeedbackDate` datetime NOT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `feedbacktb`
--

INSERT INTO `feedbacktb` (`FID`, `Firstname`, `LastName`, `Email`, `Feedback`, `FeedbackDate`) VALUES
(1, 'neeraj', 'chhabra', 'neeraj@gmail.com', 'good app', '2013-08-12 00:00:00'),
(2, 'ankush', 'sharma', 'ankush@gmail.com', 'good', '2016-08-26 00:00:00'),
(3, 'sapna', 'rani', 'sapna@gmail.com', 'nice', '2016-09-26 00:00:00'),
(4, 'kajal', 'sharma', 'kajal@gmail.com', 'good and nice', '2016-09-27 00:00:00'),
(5, 'gaurav', 'sharma', 'gaurav@gmail.com', 'good nice', '2016-10-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mailtb`
--

CREATE TABLE IF NOT EXISTS `mailtb` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `mailfrom` varchar(50) NOT NULL,
  `mailto` varchar(50) NOT NULL,
  `mailsubject` varchar(200) NOT NULL,
  `mailmessage` text NOT NULL,
  `maildate` datetime NOT NULL,
  `delfrom` char(1) NOT NULL,
  `delto` char(1) NOT NULL,
  `checkstatus` varchar(1) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `mailtb`
--

INSERT INTO `mailtb` (`mid`, `mailfrom`, `mailto`, `mailsubject`, `mailmessage`, `maildate`, `delfrom`, `delto`, `checkstatus`) VALUES
(1, 'neeraj@gmail.com', 'rubi@gmail.com', 'first mail', 'hello how are you', '2013-08-14 00:00:00', 'n', 'y', 'n'),
(2, 'neeraj@gmail.com', 'arti@gmail.com', 'test', 'hello', '2013-08-14 00:00:00', 'n', 'n', 'n'),
(3, 'neeraj@gmail.com', 'gourav@gmail.com', 'Again test mail', 'Hello Gourav how are you what are you doing now a days. i am fine here and what about you', '2013-08-15 00:00:00', 'n', 'n', 'n'),
(4, 'neeraj@gmail.com', 'anamika@gmail.com', 'Multiuser mail test', 'hello', '2013-08-15 05:39:13', 'n', 'n', 'n'),
(5, 'neeraj@gmail.com', 'akash@gmail.com', 'Multiuser mail test', 'hello', '2013-08-15 05:39:13', 'n', 'n', 'n'),
(6, 'neeraj@gmail.com', 'arti@gmail.com', 'Multiuser mail test', 'hello', '2013-08-15 05:39:13', 'n', 'n', 'n'),
(7, 'neeraj@gmail.com', 'anamika@gmail.com', 'first', 'hello how are you', '2013-08-16 05:07:41', 'n', 'n', 'n'),
(8, 'neeraj@gmail.com', 'gourav@gmail.com', 'first', 'hello how are you', '2013-08-16 05:07:41', 'n', 'n', 'n'),
(9, 'neeraj@gmail.com', 'rubi@gmail.com', 'test', 'hello how r y RUBI', '2013-08-16 05:09:53', 'n', 'n', 'n'),
(10, 'rubi@gmail.com', 'arti@gmail.com', 'test', 'hello how r y RUBI', '2013-08-16 05:11:18', 'n', 'n', 'n'),
(11, 'rubi@gmail.com', 'neeraj@gmail.com', 'Again test mail', 'hellooooooo  ooooo', '2013-08-16 05:21:36', 'n', 'y', 'n'),
(12, 'kanika@gmail.com', 'shivanki@gmail.com', 'testing mail', 'hello shivanki', '2016-04-14 10:44:19', 'n', 'n', 'n'),
(13, 'kanika@gmail.com', 'neeraj@gmail.com', 'testing', 'hello shivanki', '2016-04-14 10:44:40', 'n', 'y', 'n'),
(14, 'shivanki@gmail.com', 'kanika@gmail.com', 'reply', 'i am fine how are you', '2016-04-14 10:45:27', 'n', 'n', 'n'),
(15, 'priya@gmail.com', 'diksha@gmail.com', 'First Test Mail to Diksha', 'Hello Diksha!', '2016-08-01 10:38:33', 'n', 'n', 'n'),
(16, 'diksha@gmail.com', 'priya@gmail.com', 'Test Again', 'i am fine how are you, what are you doing now a days.........', '2016-08-01 10:39:48', 'n', 'n', 'n'),
(17, 'priya@gmail.com', 'neeraj@gmail.com', 'Test', 'i am fine how are you, what are you doing now a days.........', '2016-08-01 10:40:31', 'n', 'y', 'n'),
(18, 'priya@gmail.com', 'anamika@gmail.com', 'Test', 'i am fine how are you, what are you doing now a days.........', '2016-08-01 10:40:31', 'n', 'n', 'n'),
(19, 'priya@gmail.com', 'kanika@gmail.com', 'Test', 'i am fine how are you, what are you doing now a days.........', '2016-08-01 10:40:31', 'n', 'n', 'n'),
(20, 'ankush@gmail.com', 'diksha@gmail.com', 'First mail', 'hello how are you', '2016-08-26 05:03:08', 'n', 'n', 'n'),
(21, 'ankush@gmail.com', 'neeraj@gmail.com', 'First mail', 'hello how are you', '2016-08-26 05:03:08', 'n', 'y', 'n'),
(22, 'diksha@gmail.com', 'ankush@gmail.com', 'Reply', 'I am fine how are you\r\nwhere are you now a days', '2016-08-26 05:04:53', 'n', 'n', 'n'),
(23, 'neeraj@gmail.com', 'shivanki@gmail.com', 'fgfg', 'dfgsdfg', '2016-09-26 11:42:33', 'n', 'n', 'n'),
(24, 'neeraj@gmail.com', 'akash@gmail.com', 'fgfg', 'dfgsdfg', '2016-09-26 11:42:33', 'n', 'n', 'n'),
(25, 'neeraj@gmail.com', 'diksha@gmail.com', 'fgfg', 'dfgsdfg', '2016-09-26 11:42:33', 'n', 'n', 'n'),
(26, 'kajal@gmail.com', 'neeraj@gmail.com', 'first mail to all', 'hello how are you what are you doing now a days!', '2016-09-27 10:45:24', 'n', 'y', 'n'),
(27, 'kajal@gmail.com', 'ranjot@gmail.com', 'first mail to all', 'hello how are you what are you doing now a days!', '2016-09-27 10:45:24', 'n', 'n', 'n'),
(28, 'kajal@gmail.com', 'priya@gmail.com', 'first mail to all', 'hello how are you what are you doing now a days!', '2016-09-27 10:45:24', 'n', 'n', 'n'),
(29, 'kajal@gmail.com', 'anamika@gmail.com', 'first', 'hello how are you what are you doing now a days!', '2016-09-27 10:46:18', 'n', 'n', 'n'),
(30, 'kajal@gmail.com', 'kanika@gmail.com', 'first', 'hello how are you what are you doing now a days!', '2016-09-27 10:46:18', 'n', 'n', 'n'),
(31, 'jitender@gmail.com', 'anamika@gmail.com', 'sdfsdf', 'sdfsffsffs', '2016-10-15 04:34:36', 'y', 'n', 'n'),
(32, 'jitender@gmail.com', 'gourav@gmail.com', 'sdfsdf', 'sdfsffsffs', '2016-10-15 04:34:36', 'y', 'n', 'n'),
(33, 'gaurav@gmail.com', 'neeraj@gmail.com', 'first mail.', 'hello how are you what are you doing.......', '2016-10-27 03:57:48', 'n', 'n', 'y'),
(34, 'gaurav@gmail.com', 'diksha@gmail.com', 'first mail.', 'hello how are you what are you doing.......', '2016-10-27 03:57:48', 'n', 'n', 'n'),
(35, 'gaurav@gmail.com', 'kajal@gmail.com', 'first mail.', 'hello how are you what are you doing.......', '2016-10-27 03:57:48', 'n', 'n', 'n'),
(36, 'gaurav@gmail.com', 'jitender@gmail.com', 'first mail.', 'hello how are you what are you doing.......', '2016-10-27 03:57:48', 'n', 'n', 'n'),
(37, 'shikha@gmail.com', 'anshika@gmail.com', 'First Testing mail', 'hello how are you what are you doing', '2017-03-08 04:47:56', 'n', 'n', 'y'),
(38, 'shikha@gmail.com', 'neeraj@gmail.com', 'First Testing mail', 'hello how are you what are you doing', '2017-03-08 04:47:56', 'n', 'n', 'n'),
(39, 'shiv@gmail.com', 'shikha@gmail.com', 'test maining', 'hello how are you', '2017-05-23 02:41:09', 'n', 'n', 'n'),
(40, 'shiv@gmail.com', 'anshika@gmail.com', 'test maining', 'hello how are you', '2017-05-23 02:41:09', 'n', 'n', 'n'),
(41, 'shiv@gmail.com', 'kanika@gmail.com', 'test maining', 'hello how are you', '2017-05-23 02:41:09', 'n', 'n', 'n'),
(42, 'shiv@gmail.com', 'neeraj@gmail.com', 'test maining', 'hello how are you', '2017-05-23 02:41:09', 'n', 'n', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `regtb`
--

CREATE TABLE IF NOT EXISTS `regtb` (
  `RID` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `RegDate` datetime NOT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `regtb`
--

INSERT INTO `regtb` (`RID`, `Firstname`, `Lastname`, `Username`, `Password`, `Role`, `RegDate`) VALUES
(1, '', '', 'admin', '0192023a7bbd73250516f069df18b500', 'admin', '0000-00-00 00:00:00'),
(5, 'NEERAJ', 'CHHABRA', 'neeraj@gmail.com', 'ed2c24a8577c6ffa2661410a6d6f27d2', 'user', '2013-08-13 00:00:00'),
(6, 'RUBI', 'ALI', 'rubi@gmail.com', '1dc90e80c77fe245a82ea7ed30d1f849', 'user', '2013-08-14 00:00:00'),
(7, 'RANJOT', 'KAUR', 'ranjot@gmail.com', '1dc90e80c77fe245a82ea7ed30d1f849', 'user', '2013-08-14 00:00:00'),
(8, 'ARTI', 'SAINI', 'arti@gmail.com', '80c9ef0fb86369cd25f90af27ef53a9e', 'user', '2013-08-14 00:00:00'),
(9, 'ANAMIKA', 'BHATIA', 'anamika@gmail.com', '80c9ef0fb86369cd25f90af27ef53a9e', 'user', '2013-08-14 00:00:00'),
(10, 'GOURAV', 'SHARMA', 'gourav@gmail.com', '2ce4b2e3efcc473a6ed2d70b01c4d7e9', 'user', '2013-08-14 00:00:00'),
(11, 'AKASH', 'VIG', 'akash@gmail.com', '80c9ef0fb86369cd25f90af27ef53a9e', 'user', '2013-08-14 00:00:00'),
(12, 'SHIVANKI', 'BHARTI', 'shivanki@gmail.com', '7812e8b74f6837fba66f86fe86688a2b', 'user', '2016-04-14 00:00:00'),
(13, 'KANIKA', 'SHARMA', 'kanika@gmail.com', '1d430d0a0757ca4b16a57dbc5c436353', 'user', '2016-04-14 00:00:00'),
(14, 'PRIYA', 'BAKSHI', 'priya@gmail.com', '46bf36a7193438f81fccc9c4bcc8343e', 'user', '2016-08-01 00:00:00'),
(15, 'DIKSHA', 'JINDAL', 'diksha@gmail.com', '7097c422d46bb61fc4c169dbbae1c1e6', 'user', '2016-08-01 00:00:00'),
(16, 'ANKUSH', 'SHARMA', 'ankush@gmail.com', '80c9ef0fb86369cd25f90af27ef53a9e', 'user', '2016-08-26 00:00:00'),
(17, 'KAJAL', 'SHARMA', 'kajal@gmail.com', '1d430d0a0757ca4b16a57dbc5c436353', 'user', '2016-09-27 00:00:00'),
(20, 'JITINDER', 'NARANG', 'jitender@gmail.com', '3b29ba53c507b00a745ca7e2cbfd6acf', 'user', '2016-10-15 04:12:28'),
(21, 'GAURAV', 'SHARMA', 'gaurav@gmail.com', '2ce4b2e3efcc473a6ed2d70b01c4d7e9', 'user', '2016-10-27 03:56:35'),
(22, 'SHIKHA', 'SHARMA', 'shikha@gmail.com', '7812e8b74f6837fba66f86fe86688a2b', 'user', '2017-03-08 04:44:58'),
(23, 'ANSHIKA', 'SHARMA', 'anshika@gmail.com', '80c9ef0fb86369cd25f90af27ef53a9e', 'user', '2017-03-08 04:45:20'),
(24, 'SHIV', 'CHARAN', 'shiv@gmail.com', '2f8dd83a23b9ab0601e134123e9a0d9b', 'user', '2017-05-23 02:39:26');
