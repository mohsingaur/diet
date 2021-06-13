-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 12:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydocworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admnid` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `joiningdate` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `password1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admnid`, `username`, `fullname`, `email`, `mobileno`, `status`, `joiningdate`, `password`, `password1`) VALUES
(1, 'mohsin', 'Mohsin Gaur', 'mohsin.sabir1@gmail.com', '9871048306', 1, '2017-04-24', '5d41402abc4b2a76b9719d911017c592', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comdate` date NOT NULL,
  `likes` int(11) NOT NULL,
  `dlikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comid`, `uid`, `fid`, `comment_text`, `comdate`, `likes`, `dlikes`) VALUES
(1, 5, 76, 'hello dear this is testing', '0000-00-00', 0, 0),
(2, 5, 77, 'Hi Dear, This is testing', '0000-00-00', 0, 0),
(3, 5, 91, 'Awesome work...', '0000-00-00', 0, 0),
(4, 8, 76, 'Good Article', '0000-00-00', 0, 0),
(5, 5, 76, 'What an asset. Testing Now?>..', '0000-00-00', 0, 0),
(6, 5, 88, 'Where is the title of this document.', '0000-00-00', 0, 0),
(7, 5, 105, 'meta cool tere.', '0000-00-00', 0, 0),
(8, 8, 96, 'hello', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(5) NOT NULL COMMENT 'course id',
  `c_name` varchar(222) NOT NULL COMMENT 'course name',
  `crs_image` varchar(255) NOT NULL,
  `mime_type` varchar(30) NOT NULL,
  `fid` int(5) NOT NULL COMMENT 'faculty id i.e. 1=Architecture & ekistics, 2=Denist, 4=Engg and tech, 5=Humanities and lang,  6=Finearts, 7=Law, 8=Natural sciences, 9=Social Sciences',
  `lid` int(5) NOT NULL COMMENT 'level id i.e. 1=diploma 2=graduate 3=pg 4=phd',
  `crs_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `c_name`, `crs_image`, `mime_type`, `fid`, `lid`, `crs_status`) VALUES
(1, 'Diploma In Computer Engineering', 'im1.JPG', 'image/jpeg', 4, 1, 1),
(2, 'Diploma in Civil Engineering', 'civil1.jpg', 'image/jpeg', 4, 1, 0),
(3, 'Diploma in Electronics Engineering', '', '', 4, 1, 0),
(4, 'Diploma in Electrical Engineering', '', '', 4, 1, 0),
(5, 'Diploma in Mechanical Engineering', '', '', 4, 1, 0),
(6, 'BTech in Civil Engg', '', '', 4, 2, 0),
(7, 'BTech in Computer Science & Engg', '', '', 4, 2, 0),
(8, 'BTech in Electrical Engg', '', '', 4, 2, 0),
(9, 'BTech in Electronics Engg', '', '', 4, 2, 0),
(10, 'BTech in Mechanical Engg', '', '', 4, 2, 0),
(11, 'Bachelor of Business administration (BBA/BBs)', 'im9.jpg', 'image/jpeg', 10, 2, 1),
(12, 'Master of Business Administration (MBA)', '', '', 10, 3, 0),
(13, 'Master in International Business (MIB)', '', '', 10, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `downloadstatus`
--

CREATE TABLE `downloadstatus` (
  `did` int(11) NOT NULL COMMENT 'downliad id',
  `uid` int(11) NOT NULL COMMENT 'user id',
  `fid` int(11) NOT NULL COMMENT 'document id',
  `cid` int(11) NOT NULL COMMENT 'category id',
  `credit` int(11) NOT NULL,
  `downloaddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloadstatus`
--

INSERT INTO `downloadstatus` (`did`, `uid`, `fid`, `cid`, `credit`, `downloaddate`) VALUES
(19, 1, 97, 1, 0, '2017-05-08'),
(22, 9, 91, 1, 10, '2017-05-25'),
(23, 9, 89, 2, 10, '2017-05-25'),
(24, 9, 96, 2, 0, '2017-05-25'),
(64, 1, 87, 1, 10, '2017-05-25'),
(65, 1, 87, 1, 10, '2017-05-25'),
(66, 1, 2, 3, 4, '2017-05-25'),
(67, 1, 2, 3, 4, '2017-05-25'),
(68, 1, 2, 3, 4, '2017-05-25'),
(69, 5, 2, 3, 0, '2017-05-25'),
(70, 1, 87, 1, 10, '2017-05-25'),
(71, 1, 87, 1, 10, '2017-05-25'),
(72, 1, 94, 1, 0, '2017-05-25'),
(73, 9, 87, 1, 10, '2017-05-25'),
(74, 9, 90, 1, 10, '2017-05-25'),
(75, 9, 95, 1, 0, '2017-05-25'),
(76, 9, 100, 1, 10, '2017-05-25'),
(77, 9, 103, 6, 60, '2017-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `downvote`
--

CREATE TABLE `downvote` (
  `downid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `dcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downvote`
--

INSERT INTO `downvote` (`downid`, `uid`, `fid`, `dcount`) VALUES
(14, 9, 89, 1),
(15, 9, 87, 1),
(16, 9, 87, 1),
(17, 9, 87, 1),
(18, 9, 91, 1),
(19, 9, 94, 1),
(20, 9, 94, 1),
(21, 9, 94, 1),
(22, 9, 87, 1),
(23, 9, 90, 1),
(24, 9, 95, 1),
(25, 9, 97, 1),
(26, 9, 100, 1),
(27, 5, 76, 1),
(28, 5, 77, 1),
(29, 5, 88, 1),
(30, 5, 95, 1),
(31, 5, 104, 1),
(32, 9, 105, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `fid` int(2) NOT NULL,
  `facultyname` varchar(255) DEFAULT NULL,
  `fac_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`fid`, `facultyname`, `fac_status`) VALUES
(1, 'Faculty of Architecture and Ekistics', 1),
(2, 'Faculty of Dentistry', 1),
(4, 'Faculty of Engineering and Technology', 1),
(5, 'Faculty of Humanities and languages', 0),
(6, 'Faculty of Fine Arts', 0),
(7, 'Faculty of Law', 0),
(8, 'Faculty of Natural Sciences', 0),
(9, 'Faculty of social Sciences', 0),
(10, 'Faculty of Management Studies', 1),
(11, 'My Faculty', 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fileid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tags` text NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `filesize` int(11) NOT NULL,
  `filetmpname` varchar(255) NOT NULL,
  `ctid` varchar(255) NOT NULL COMMENT 'category id from document category table',
  `status` int(11) NOT NULL COMMENT '1=public, 0=private',
  `credit` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `courseid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `approve` int(2) NOT NULL COMMENT '1=approve, 0=disapprove',
  `accstatus` int(11) NOT NULL COMMENT '0=activate and 1=deactivate',
  `postdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileid`, `uid`, `title`, `description`, `tags`, `filetype`, `filesize`, `filetmpname`, `ctid`, `status`, `credit`, `url`, `courseid`, `subjectid`, `semester`, `year`, `approve`, `accstatus`, `postdate`) VALUES
(76, 1, 'Difference between Pseudo Class and Pseudo Elements', '<p><strong>Difference between Pseudo Class and Pseudo Elements</strong></p><p><strong>Pseudo Class :</strong></p><p><strong>Pseudo Class </strong>generally targets elements that match the certain criteria or state.</p><p><strong>Pseudo Element :</strong></p><p><strong>Pseudo Element </strong>generally targets a certain part of an element.</p><p>&nbsp;</p>', 'Pseaudo elements and pseudo class', 'image/png', 9283, '788311652Screenshot (27) (2).png', '7', 1, 0, 'douments/788311652Screenshot (27) (2).png', 0, 0, 0, 0, 1, 0, '2017-04-06 00:00:00'),
(77, 1, 'Make USB as a bootable device', '<p>How to make a usb drive or pendrive as a bootable device</p><p><strong>Steps</strong></p><ol><li>Open Command prompt as administrator</li><li>Type Diskpart in command prompt window</li><li>Type list disk</li><li>Select disk no</li><li>Type clean</li><li>Type Create Partition Primary</li><li>Select Partition 1</li><li>active</li><li>format fs=ntfs quick</li><li>assign</li><li>exit</li><li>&nbsp;</li></ol>', '', 'image/jpeg', 22743, '13604sas2.jpg', '7', 1, 0, 'douments/13604sas2.jpg', 0, 0, 0, 0, 1, 0, '2017-04-07 00:00:00'),
(87, 10, 'My new assignment', '', '', 'application/pdf', 0, '14571Mohsin Resume1.pdf', '1', 1, 10, '../documents/14571Mohsin Resume1.pdf', 1, 2, 1, 2013, 1, 0, '2017-04-28 00:00:00'),
(88, 10, '', '', '', 'application/pdf', 0, '6672Mohsin Resume1.pdf', '3', 1, 10, '../documents/6672Mohsin Resume1.pdf', 1, 9, 2, 2014, 1, 0, '2017-04-28 00:00:00'),
(89, 10, 'New Notes', '', '', 'application/pdf', 0, '25758Mohsin Resume1.pdf', '2', 1, 10, '../documents/25758Mohsin Resume1.pdf', 1, 3, 3, 2016, 1, 0, '2017-05-08 00:00:00'),
(90, 10, 'New Assignment', '', '', 'docx', 0, '32325NADEEM SULTAN.docx', '1', 1, 10, '../documents/32325NADEEM SULTAN.docx', 3, 1000, 2, 2017, 1, 0, '2017-05-08 00:00:00'),
(94, 10, 'My latest Assignment', '', '', 'image/jpeg', 19696, '16688111111111.jpg', '1', 1, 0, '../documents/16688111111111.jpg', 1, 12, 4, 2017, 1, 0, '2017-05-08 00:00:00'),
(95, 10, 'Latest One Document', '', '', 'doc', 162816, '452112b_cerere-recunoastere-terti.doc', '1', 1, 0, '../documents/452112b_cerere-recunoastere-terti.doc', 1, 18, 5, 2017, 1, 0, '2017-05-08 00:00:00'),
(97, 10, 'Hello Man', '', '', 'pdf', 440053, '19283NADEEM SULTAN.pdf', '1', 1, 0, '../documents/19283NADEEM SULTAN.pdf', 12, 1000, 3, 2014, 1, 0, '2017-05-08 00:00:00'),
(104, 1, 'New Document', '', '', 'application/pdf', 129902, '21645201617 International Year 1 Schedule.pdf', '6', 1, 60, 'documents/201617 International Year 1 Schedule.pdf', 0, 0, 0, 0, 1, 0, '2017-05-25 00:00:00'),
(107, 0, 'Mohsin', '<p>Cool</p>', 'gaur', 'image/png', 215424, '26171Screenshot (6).png', '7', 1, 0, 'douments/26171Screenshot (6).png', 0, 0, 0, 0, 0, 0, '2017-06-12 00:00:00'),
(109, 1, 'Kya cool hai Hum', '', '', 'image/png', 5168, '6177IMG_0457.PNG', '1', 1, 10, 'documents/IMG_0457.PNG', 0, 0, 0, 0, 0, 0, '2017-06-13 00:00:00'),
(110, 9, 'test', '', '', 'image/png', 5168, '23513IMG_0457.PNG', '6', 1, 60, 'documents/IMG_0457.PNG', 0, 0, 0, 0, 0, 0, '2017-06-13 00:00:00'),
(111, 9, 'test', '', '', 'image/png', 5168, '27038IMG_0457.PNG', '6', 1, 60, 'documents/IMG_0457.PNG', 0, 0, 0, 0, 0, 0, '2017-06-13 00:00:00'),
(112, 9, 'test', '', '', 'image/png', 5168, '19583IMG_0457.PNG', '6', 1, 60, 'documents/IMG_0457.PNG', 0, 0, 0, 0, 0, 0, '2017-06-13 00:00:00'),
(113, 9, 'test', '', '', 'image/png', 5168, '29772IMG_0457.PNG', '6', 1, 60, 'documents/IMG_0457.PNG', 0, 0, 0, 0, 0, 0, '2017-06-13 00:00:00'),
(117, 9, 'test', '', '', 'image/png', 5168, '2360IMG_0457.PNG', '6', 1, 60, 'documents/IMG_0457.PNG', 0, 0, 0, 0, 0, 0, '2017-06-13 00:00:00'),
(118, 9, 'test', '', '', 'image/png', 5168, '11537IMG_0457.PNG', '6', 1, 60, 'documents/IMG_0457.PNG', 0, 0, 0, 0, 0, 0, '2017-06-13 00:00:00'),
(119, 9, 'test', '', '', 'image/png', 5168, '3702IMG_0457.PNG', '6', 1, 60, 'documents/IMG_0457.PNG', 0, 0, 0, 0, 0, 0, '2017-06-13 00:00:00'),
(120, 9, 'test', '', '', 'image/png', 5168, '31022IMG_0457.PNG', '6', 1, 60, 'documents/IMG_0457.PNG', 0, 0, 0, 0, 0, 0, '2017-06-13 00:00:00'),
(121, 1, 'testing', '', '', 'image/jpeg', 24049, '17201IMG_0510.JPG', '6', 0, 60, 'documents/IMG_0510.JPG', 0, 0, 0, 0, 0, 0, '2017-06-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `od_category`
--

CREATE TABLE `od_category` (
  `catid` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL,
  `points` int(11) NOT NULL,
  `catstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `od_category`
--

INSERT INTO `od_category` (`catid`, `categoryname`, `points`, `catstatus`) VALUES
(1, 'Notes', 10, 1),
(2, 'Assignment', 20, 1),
(3, 'Sessional Papers', 30, 1),
(4, 'Semester Papers', 40, 1),
(5, 'Synopsis', 50, 1),
(6, 'Projects', 80, 1),
(7, 'Articles', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `od_users`
--

CREATE TABLE `od_users` (
  `uid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `uemail` varchar(40) NOT NULL,
  `ufname` varchar(25) NOT NULL,
  `umname` varchar(25) NOT NULL,
  `ulname` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `umobile` varchar(15) NOT NULL,
  `uaddress` text NOT NULL,
  `ucity` varchar(50) NOT NULL,
  `uaddpin` varchar(50) NOT NULL,
  `ustate` varchar(50) NOT NULL,
  `ucountry` varchar(50) NOT NULL,
  `udob` date NOT NULL,
  `uoccupation` varchar(50) NOT NULL,
  `udepartment` varchar(100) NOT NULL,
  `ucourse` varchar(50) NOT NULL,
  `ustudyingyear` varchar(10) NOT NULL,
  `upwd` varchar(255) NOT NULL,
  `upwd1` varchar(255) NOT NULL,
  `udp` varchar(255) NOT NULL COMMENT 'user display/profile picture',
  `upicsize` varchar(255) NOT NULL,
  `upictype` varchar(50) NOT NULL,
  `uaccopendate` date NOT NULL,
  `uaccstatus` int(5) NOT NULL COMMENT '0=deactivate, 1=activate',
  `ustatus` int(5) NOT NULL COMMENT '0=account terminated, 1=means account working',
  `fcredits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `od_users`
--

INSERT INTO `od_users` (`uid`, `username`, `uemail`, `ufname`, `umname`, `ulname`, `gender`, `umobile`, `uaddress`, `ucity`, `uaddpin`, `ustate`, `ucountry`, `udob`, `uoccupation`, `udepartment`, `ucourse`, `ustudyingyear`, `upwd`, `upwd1`, `udp`, `upicsize`, `upictype`, `uaccopendate`, `uaccstatus`, `ustatus`, `fcredits`) VALUES
(1, 'mohsin', 'mohsin.sabir1@gmail.com', 'Mujeeb', 'Ur', 'Rehman', '', '98710486306', '', '', '', '', '', '0000-00-00', 'Software Engineer', '', '', '', '6345a8a1d2d04d5e9f0b3fea202bbfb2', 'mohsin', '20425IMG_0515.JPG', '17599', 'image/jpeg', '2017-06-05', 0, 1, 0),
(8, 'mohsingauri', 'mohsin.sabir1@gmail.com', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '5d41402abc4b2a76b9719d911017c592', 'hello', 'userpic.png', '', '', '2017-06-08', 0, 1, 0),
(9, 'aas', 'aas.shameem@gmail.com', 'Aas', '', 'Muhammad', '', '9999999999', '', '', '', '', '', '2000-01-01', 'Software Developer in Google', '', '', '', '37f31694ce2528a64cfacc73c612ef06', 'aas', '17748IMG_0512.JPG', '25664', 'image/jpeg', '2017-06-06', 0, 1, 0),
(10, 'mohsingaur', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 'hello', 'userpic.png', '', '', '0000-00-00', 1, 1, 0),
(11, 'test', '123@123.com', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '202cb962ac59075b964b07152d234b70', '123', '19709IMG_0516.JPG', '16291', 'image/jpeg', '2017-06-13', 0, 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `qid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `querydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`qid`, `name`, `email`, `message`, `querydate`) VALUES
(1, 'mohsin', 'mohsin.sabir1@gmail.com', 'Hello man this is testing', '2017-06-13'),
(2, 'mohsin', 'hello', 'hello testing', '2017-06-13'),
(3, 'mohsin', 'hello', 'hello testing', '2017-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sid` int(10) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `cid` int(10) NOT NULL,
  `sub_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sid`, `sname`, `cid`, `sub_status`) VALUES
(1, 'Applied Mathematics-I', 1, 1),
(2, 'Communication Skill-I', 1, 1),
(3, 'Fundamental of Computer', 1, 0),
(4, 'Electrical & Electronics Engg', 1, 0),
(5, 'Elements of Mechanical Engg', 1, 0),
(6, 'Applied Mathematics-II', 1, 1),
(7, 'Engg Chemistry and Environmental Science', 1, 0),
(8, 'Programming in C', 1, 0),
(9, 'Electronics devices and Application', 1, 0),
(10, 'Applied Physics', 1, 0),
(11, 'Computer Oriented Numerical Method', 1, 0),
(12, 'Object Oriented Programming', 1, 0),
(13, 'Signal and System', 1, 0),
(14, 'Computer Architecture', 1, 0),
(15, 'Digital Electronics', 1, 0),
(17, 'Communication Skill-II', 1, 0),
(18, 'Database Management System', 1, 0),
(19, 'Operating System', 1, 0),
(20, 'Data Structure', 1, 0),
(21, 'Microprocessor And Microcontroller', 1, 0),
(22, 'Computer Graphics', 1, 0),
(23, 'Web Technology', 1, 0),
(24, 'Data Communcation and Computer Networks', 1, 0),
(25, 'Software Engineering', 1, 0),
(26, 'Java Programming', 1, 0),
(27, 'Advanced RDBMS', 1, 0),
(28, 'Visual Programming', 1, 0),
(29, 'Information Security and Cyber Law', 1, 0),
(30, 'ICT Management and enterpreneurship development', 1, 0),
(31, 'Embedded System|Embedded System', 1, 0),
(32, 'Artificial Intelligence', 1, 0),
(33, 'Mobile Computing', 1, 0),
(34, 'Compiler Design', 7, 0),
(35, 'Quantitative Techniques in Management', 11, 1),
(36, 'Marketing Research', 11, 1),
(37, 'Human Resource Management', 11, 1),
(38, 'Financial Management', 11, 1),
(39, 'Cost Accounting', 11, 1),
(40, 'Applied Macro economics', 11, 1),
(41, 'Business Environment', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `upvote`
--

CREATE TABLE `upvote` (
  `upvoteid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvote`
--

INSERT INTO `upvote` (`upvoteid`, `uid`, `count`, `fid`) VALUES
(178, 1, 1, 87),
(179, 1, 1, 91),
(180, 1, 1, 90),
(181, 1, 1, 97),
(182, 1, 1, 95),
(183, 9, 1, 87),
(184, 2, 1, 87),
(185, 2, 1, 91),
(186, 2, 1, 97),
(187, 2, 1, 94),
(188, 2, 1, 95),
(189, 2, 1, 90),
(190, 2, 1, 96),
(191, 2, 1, 88),
(192, 2, 1, 89),
(193, 9, 1, 100),
(194, 9, 1, 97),
(195, 9, 1, 95),
(196, 9, 1, 94),
(197, 9, 1, 90),
(198, 9, 1, 91),
(199, 9, 1, 105),
(200, 9, 1, 96),
(201, 9, 1, 89),
(202, 5, 1, 77),
(203, 5, 1, 76),
(204, 5, 1, 88),
(205, 5, 1, 95),
(206, 5, 1, 104);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admnid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `downloadstatus`
--
ALTER TABLE `downloadstatus`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `downvote`
--
ALTER TABLE `downvote`
  ADD PRIMARY KEY (`downid`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileid`);

--
-- Indexes for table `od_category`
--
ALTER TABLE `od_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `od_users`
--
ALTER TABLE `od_users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `upvote`
--
ALTER TABLE `upvote`
  ADD PRIMARY KEY (`upvoteid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admnid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT COMMENT 'course id', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `downloadstatus`
--
ALTER TABLE `downloadstatus`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT COMMENT 'downliad id', AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `downvote`
--
ALTER TABLE `downvote`
  MODIFY `downid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `fid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `od_category`
--
ALTER TABLE `od_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `od_users`
--
ALTER TABLE `od_users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `upvote`
--
ALTER TABLE `upvote`
  MODIFY `upvoteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
