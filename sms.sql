-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 09:33 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `class` text NOT NULL,
  `subject` text NOT NULL,
  `teacher` text NOT NULL,
  `uploaddate` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `title`, `description`, `class`, `subject`, `teacher`, `uploaddate`, `file`) VALUES
(5, '1 SEM RESULT', 'jhkl', 'BCA/1SEM', 'Digital', 'BIJOY KUMAR DAS', '2019-03-13', 'upload/3150_Motorola-One.jpg'),
(6, '1 SEM RESULT', 'RAM', 'BCA/1SEM', 'Digital', 'BIJOY KUMAR DAS', '2019-03-13', 'upload/5365_Motorola-One.jpg'),
(7, 'final test', 'vyjguhj\nffghjk\nfcgvhbjk\nfxgchvb\nghf vfb \ndc', 'BCA/2SEM', 'PC Software', 'BIJOY KUMAR DAS', '2019-03-13', 'upload/1198_SSC GD.PDF'),
(8, 'Digital Assignment No 1', 'Submit Before On 20/03/2019', 'BCA/1 SEM', 'Digital Electronics', 'RUMPA PAL', '2019-03-16', 'upload/4869_cart.zip');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `sid` text NOT NULL,
  `type` text NOT NULL,
  `memono` text NOT NULL,
  `message` text NOT NULL,
  `applydate` text NOT NULL,
  `approvedate` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `sid`, `type`, `memono`, `message`, `applydate`, `approvedate`, `status`) VALUES
(1, '8', 'test', 'GIM/CER/584', 'test', 'test', 'test', '1'),
(2, '8', 'Character Certificate', 'GIM/CER/790', 'tets', '2019-03-18', 'Not Approve', 'Approve'),
(3, '7', 'Other Certificate', 'GIM/CER/668', 'amake ekta certificate deben...', '2019-03-18', '2019-03-18', 'Approve'),
(4, '7', 'Character Certificate', 'GIM/CER/111', 'test', '2019-03-18', '2019-03-18', 'Approve'),
(5, '7', 'Character Certificate', 'GIM/CER/111', 'test', '2019-03-18', '2019-03-18', 'Approve'),
(6, '8', 'Character Certificate', 'GIM/CER/592', 'TEST1', '2019-03-18', '2019-03-18', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `classname` text NOT NULL,
  `coursename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classname`, `coursename`) VALUES
(5, 'BBA/1 SEM', 'BBA'),
(6, 'BHM/1 SEM', 'BHM'),
(8, 'BCA/1 SEM', 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `coursename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `coursename`) VALUES
(18, 'BCA'),
(21, 'BBA'),
(22, 'BHM'),
(23, 'PGDM');

-- --------------------------------------------------------

--
-- Table structure for table `demofees`
--

CREATE TABLE `demofees` (
  `id` int(11) NOT NULL,
  `studentid` text NOT NULL,
  `amount` text NOT NULL,
  `type` text NOT NULL,
  `mode` text NOT NULL,
  `txnid` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `deptname` text NOT NULL,
  `deptcategory` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `deptname`, `deptcategory`) VALUES
(16, 'English', 'Teaching'),
(17, 'Computer', 'Teaching'),
(19, 'Mathematics', 'Teaching'),
(20, 'Statistics', 'Teaching'),
(21, 'Economics', 'Teaching'),
(22, 'Financial Accounting', 'Teaching'),
(23, 'Marketing', 'Teaching'),
(24, 'Human Resource', 'Teaching'),
(25, 'Accounts Staff', 'Non_Teaching'),
(26, 'Librarian', 'Non_Teaching'),
(27, 'Office Staff', 'Non_Teaching');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `examcode` text NOT NULL,
  `sid` int(11) NOT NULL,
  `examname` text NOT NULL,
  `examdate` text NOT NULL,
  `totalmarks` text NOT NULL,
  `marksobtain` text NOT NULL,
  `mode` text NOT NULL,
  `total_qus` text NOT NULL,
  `attempt_qus` text NOT NULL,
  `rightanswer` text NOT NULL,
  `wrong` text NOT NULL,
  `noanswer` text NOT NULL,
  `per` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `examcode`, `sid`, `examname`, `examdate`, `totalmarks`, `marksobtain`, `mode`, `total_qus`, `attempt_qus`, `rightanswer`, `wrong`, `noanswer`, `per`) VALUES
(36, 'GIM/EXAM/726', 4, 'PC SOF', '15-03-2019', '10', '0', 'Online', '5', '4', '0', '4', '1', '0'),
(37, 'GIM/EXAM/526', 4, 'PC SOF', '15-03-2019', '10', '0', 'Online', '5', '4', '0', '4', '1', '0'),
(38, 'GIM/EXAM/220', 4, 'PC SOF', '15-03-2019', '10', '6', 'Online', '5', '5', '3', '2', '0', '60'),
(39, 'GIM/EXAM/223', 4, 'PC SOF', '15-03-2019', '10', '6', 'Online', '5', '5', '3', '2', '0', '60'),
(40, 'GIM/EXAM/787', 0, '0', '15-03-2019', '0', '0', 'Online', '0', '0', '0', '0', '0', 'NAN'),
(41, 'GIM/EXAM/906', 8, 'PC Software Test 1', '16-03-2019', '20', '6', 'Online', '10', '5', '3', '2', '5', '30'),
(42, 'GIM/EXAM/573', 8, 'PC Software Test 1', '16-03-2019', '20', '6', 'Online', '10', '5', '3', '2', '5', '30'),
(43, 'GIM/EXAM/703', 8, 'PC Software Test 1', '16-03-2019', '20', '0', 'Online', '10', '0', '0', '0', '10', '0'),
(44, 'GIM/EXAM/744', 8, 'PC Software Test 1', '16-03-2019', '20', '0', 'Online', '10', '0', '0', '0', '10', '0'),
(45, 'GIM/EXAM/645', 8, 'PC Software Test 1', '18-03-2019', '20', '6', 'Online', '10', '8', '3', '5', '2', '30'),
(46, 'GIM/EXAM/944', 8, 'PC Software Test 1', '18-03-2019', '20', '10', 'Online', '10', '5', '5', '0', '5', '50'),
(47, 'GIM/EXAM/447', 8, 'PC Software Test 1', '18-03-2019', '20', '0', 'Online', '10', '2', '0', '2', '8', '0');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `studentid` text NOT NULL,
  `amount` text NOT NULL,
  `type` text NOT NULL,
  `mode` text NOT NULL,
  `txnid` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `studentid`, `amount`, `type`, `mode`, `txnid`, `date`, `status`) VALUES
(11, 'GIM_2019_STU4548', '100', 'Semester Fee', 'Other', 'CASH/2019-03-08/561', '2019-03-08 09:10:45pm', 1),
(13, 'GIM_2019_STU4548', '100', 'Semester Fee', 'Cash', 'CASH/2019-03-09/774', '2019-03-09 01:05:18pm', 1),
(28, 'GIM_2019_STU5931', '100', 'Exam Fee', 'Online', 'GIM44468426', '2019-03-15 10:11:30pm', 1),
(29, 'GIM_2019_STU2019', '500.00', 'Exam Fee', 'Online', 'GIM19836163', '2019-03-16 12:07:00pm', 1),
(30, 'GIM_2019_STU2019', '100.00', 'Exam Fee', 'Online', 'GIM45397698', '2019-03-16 12:16:30pm', 1),
(31, 'GIM_2019_STU2019', '50.00', 'Exam Fee', 'Online', 'GIM49977981', '2019-03-16 12:23:18pm', 1),
(32, 'GIM_2019_STU8596', '100', 'Exam Fee', 'Cash', 'CASH/2019-03-17/832', '2019-03-17 11:03:12am', 1),
(33, 'GIM_2019_STU8596', '900.00', 'Semester Fee', 'Online', 'GIM23065670', '2019-03-17 11:06:32am', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `noticefor` text NOT NULL,
  `publishdate` text NOT NULL,
  `lastupdate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `description`, `noticefor`, `publishdate`, `lastupdate`) VALUES
(3, 'Task', 'Testing', 'S', '2019-03-09 03:02:04pm', 'undefined'),
(4, '1 SEM RESULT', 'tdryftuvvvvvvvvvvvvvvvvv\ncylvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv\njkcffffff   tfiffggggggggk fkhjgjkfg vhjgkgk cfhgvjhbkjn gfhgvjhbkn fhvbn hcjvbn hjvkbn cvblnmnb nbvnbmhnghkjn cvbnm cvbnkm ckfvbnm vbjnkm cvbn', 'B', '2019-03-09 04:29:50pm', 'undefined'),
(6, 'Only For Staff', 'this Notice Only For Staff', 'T', '2019-03-16 09:02:34am', 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `testname` text NOT NULL,
  `question` text NOT NULL,
  `answer1` text NOT NULL,
  `answer2` text NOT NULL,
  `answer3` text NOT NULL,
  `answer4` text NOT NULL,
  `rightanswer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `testname`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `rightanswer`) VALUES
(6, 'test1', 'tets1223', 'cx', 'ds', 'ds', 'ds', 2),
(7, 'test 01', 'dfv', 'fd', 'fd', 'f', 'bf', 2),
(8, 'PC SOF', 'tets1223', '123', 'ds', 'ds', '12', 1),
(9, 'PC SOF', 'tets1223', 'cx', 'fd', '12', 'ds', 2),
(10, 'PC SOF', 'q 3', '3', '3', '3', '3', 3),
(11, 'PC SOF', '4', '4', '4', '4', '4', 4),
(12, 'PC SOF', '5', '5', '5', '5', '5', 4),
(13, 'PC Software Test 1', 'Which one of the following is not a Windows 98 feature ?', 'Microsoft Word.', 'FrontPage Express.', 'Outlook Express.', 'Internet Explorer.', 1),
(14, 'PC Software Test 1', 'A GUI based OS is', 'Windows 98', 'Windows XP', 'Windows 2000 server ', 'All of these', 4),
(15, 'PC Software Test 1', 'The Print Preview command is located in', 'Print Menu', 'File Menu', 'Edit Menu', 'None of these', 2),
(16, 'PC Software Test 1', 'Which is Correct?', 'A file can contain more than one folder', 'A file can contain only one folder', 'A folder can contain more than one file', 'Non of these', 3),
(17, 'PC Software Test 1', 'Windows provides a temporary area called', 'memory', 'clipboard', 'paste', 'all of these', 2),
(18, 'PC Software Test 1', 'What do folders enable a user to do ?', 'Organize the files on a disk', 'Ensure the computer starts properly', 'Name your files', 'Create a file allocation table', 1),
(19, 'PC Software Test 1', 'The output quality of a printer is measured by', 'dot per inch', 'dot per sq. inch', 'dots printed per unit time', 'all of these', 1),
(20, 'PC Software Test 1', 'Broder and Shading are', 'Check Box', 'Dialog Box', 'Run Box', 'All of these', 2),
(21, 'PC Software Test 1', 'Mail merge helps in', 'pasting a mail with envelope', 'creating a mail', 'creating a mail having multiple copies', 'posting', 3),
(22, 'PC Software Test 1', 'Which one is not a facility of MS Word', 'Spell check', 'Thesaurus', 'Slide Show', 'Auto sum', 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `empid` text NOT NULL,
  `name` text NOT NULL,
  `gender` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `dob` text NOT NULL,
  `address` text NOT NULL,
  `staff_category` text NOT NULL,
  `deptname` text NOT NULL,
  `qualification` text NOT NULL,
  `salary` text NOT NULL,
  `img` text NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `empid`, `name`, `gender`, `email`, `phone`, `dob`, `address`, `staff_category`, `deptname`, `qualification`, `salary`, `img`, `password`, `status`) VALUES
(79, 'GIM/2019/6562', 'RUMPA PAL', 'Male', 'me.bkdas@gmail', '9775435716', '1998-05-01', 'ANDI,ANDI, BURWAN', 'Teaching', 'English', 'MP', '<span>12000</span>', 'images/1940Passport-size-photo.jpg', '25d55ad283aa400af464c76d713c07ad', '0'),
(80, 'GIM/2019/4152', 'BIJOY DAS', 'Male', 'me.bkdas111@gmail.com', '7908032711', '1998-05-01', 'ANDI,MSD', 'Non_Teaching', 'Computer', 'Graduate', '<span>1200</span>', 'images/8061Photo 3.jpg', '25d55ad283aa400af464c76d713c07ad', '0'),
(81, 'GIM/2019/4303', 'Moumita Karmakar', 'Female', 'moumita@gmail.com', '8978458965', '1994-08-01', 'BERHAMPORE, MURSHIDABAD', 'Teaching', 'English', 'Post Graduate', '18000', 'images/3253_Pilli_0.jpg', 'ea74be92627ce469cc16edd2093d73ec', '0'),
(82, 'GIM/2019/8873', 'Sourav Mondal', 'Male', 'smondal@gmail.com', '7854965845', '1992-04-02', 'BERHAMPORE, MURSHIDABAD', 'Teaching', 'Mathematics', 'Post Graduate', '19800', 'images/9983_Passportsizephoto.JPG', '37a3a66ecba3331547893d7828f66c97', '0'),
(83, 'GIM/2019/2116', 'Nobonil Roy', 'Male', 'nrc@gmail.com', '6987485745', '1993-04-05', 'BERHAMPORE, MURSHIDABAD', 'Teaching', 'Computer', 'Post Graduate', '18700', 'images/9720_download.jpg', '87df1c7007b8a7dbb2f70e2bebda5dee', '0'),
(84, 'GIM/2019/6058', 'Susmita Pal', 'Female', 'spal@gim.com', '9878458957', '1993-04-06', 'Kolkata', 'Teaching', 'Statistics', 'Graduate', '16700', 'images/8456_531_AM-395.jpg', '1205d28904eed294af1fc48062f5d9eb', '0'),
(85, 'GIM/2019/7174', 'Pritam Karmakar', 'Male', 'pritam@gim.com', '8978458956', '1996-04-05', 'Krishnagar,Nadia', 'Teaching', 'Financial Accounting', 'Post Graduate', '19500', 'images/1837_120101119passport size pic.jpg', 'fc69e08b1a7175964a7afac69025e279', '0'),
(86, 'GIM/2019/6885', 'Sangita Dey Mitra', 'Female', 'sangita@gim.com', '7845895679', '1988-08-06', 'BERHAMPORE, MURSHIDABAD', 'Teaching', 'Computer', 'Post Graduate', '20500', 'images/3650_Passport-size-photo.jpg', 'dcd7cc0ca1ee80d1c8af885eaf4a56c3', '0'),
(87, 'GIM/2019/7754', 'Majar Ali', 'Male', 'majar.ali@gim.com', '8745985678', '1987-04-03', 'Suri', 'Teaching', 'Computer', 'Post Graduate', '30000', 'images/5586_Passportsizephoto.JPG', 'bc55e42bb63aeffaf4fd33b526f6346e', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `studentid` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `gender` text NOT NULL,
  `dob` text NOT NULL,
  `address` text NOT NULL,
  `course` text NOT NULL,
  `class` text NOT NULL,
  `totalfees` text NOT NULL,
  `feesdue` text NOT NULL,
  `img` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studentid`, `name`, `email`, `phone`, `gender`, `dob`, `address`, `course`, `class`, `totalfees`, `feesdue`, `img`, `password`, `status`) VALUES
(6, 'GIM_2019_STU4548', 'Bilash Aulia', 'bilash@gmail.com', '8977777777', 'Male', '1998-05-12', 'Kolkata', 'BCA', 'BCA/1SEM', '21000', '18000', '/images/7314', 'RRG5QBYQ', 0),
(7, 'GIM_2019_STU5931', 'BIJOY KUMAR DAS', 'me.bkdas@gmail', '9775435716', 'Male', '1998-05-01', '<span class=\"\">ANDI,MURSHIDABAD</span>', 'BHM', 'BHM/1 SEM', '21000', '20800', 'images/8161PHOTO 1.jpg', '25d55ad283aa400af464c76d713c07ad', 0),
(8, 'GIM_2019_STU2019', 'Farhad Ahamed', 'farhad@gim.com', '9897496647', 'Male', '1997-05-01', 'Berhampore', 'BCA', 'BCA/1 SEM', '21000', '20350', 'images/2182120101119passport size pic.jpg', '25d55ad283aa400af464c76d713c07ad', 0),
(10, 'GIM_2019_STU1420', 'Imran Nazir', 'imran@gim.com', '6587458944', 'Male', '1998-04-02', 'Faraka', 'BCA', 'BCA/1 SEM', '21000', '21000', 'images/4712Mahmudul Hasan Official Photo.jpg', '86093d72a22ecb0a444c08a3cee584de', 0),
(11, 'GIM_2019_STU8596', 'Nihar SK', 'nihar@gim.com', '8987457946', 'Male', '1997-09-07', 'BERHAMPORE, MURSHIDABAD', 'BCA', 'BCA/1 SEM', '21000', '20000', 'images/2759Passportsizephoto.JPG', 'd81f5bbede21881c7d59540d379ec551', 0),
(12, 'GIM_2019_STU5822', 'Bapan Pal', 'bapan@gim.com', '8974689976', 'Male', '1998-05-04', 'Kandi, Murshidabad', 'BBA', 'BBA/1 SEM', '21000', '21000', 'images/2194Kishore-passport-size-2.jpg', 'd7fed544de0279a393e77b26fbbebaf1', 0),
(13, 'GIM_2019_STU8308', 'Sumit Saha', 'sumit@gim.com', '9879469664', 'Male', '1998-04-03', '<span class=\"\">Kandi</span>', 'BBA', 'BBA/1 SEM', '21000', '21000', 'images/9741download.jpg', 'a05e40491814e4dcfc47aac33dcffa9f', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subjectname` text NOT NULL,
  `class` text NOT NULL,
  `teacher` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subjectname`, `class`, `teacher`) VALUES
(1, 'Digital', 'BCA/1Sem', 'Sangetaa'),
(2, 'Digital', 'BCA/1SEM', 'Sangeta'),
(3, 'PC Software', 'BCA/1SEM', 'BIJOY KUMAR DAS'),
(4, 'Basic Marketing', 'BBA/1 SEM', 'NRC'),
(5, 'Digital Electronics', 'BCA/1 SEM', 'Sangita Dey Mitra'),
(6, 'PC Software', 'BCA/1 SEM', 'Nobonil Roy'),
(7, 'Business System and Applications', 'BCA/1 SEM', 'Majar Ali'),
(8, 'Introduction to Programming', 'BCA/1 SEM', 'Majar Ali'),
(9, 'Basic Marketing', 'BBA/1 SEM', 'Pritam Karmakar'),
(10, 'Statistics -1', 'BBA/1 SEM', 'Susmita Pal'),
(11, 'Economics -1', 'BBA/1 SEM', 'Moumita Karmakar'),
(12, 'English - 1', 'BBA/1 SEM', 'Moumita Karmakar');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `testname` text NOT NULL,
  `description` text NOT NULL,
  `class` text NOT NULL,
  `subject` text NOT NULL,
  `time` text NOT NULL,
  `mode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `testname`, `description`, `class`, `subject`, `time`, `mode`) VALUES
(1, 'test1', 'testing', 'test', 'test', '5', 'Online'),
(5, 'test 01', 'test 01', 'Basic Marketing', 'BBA/1 SEM', '10', 'Online'),
(6, 'final test', 'fina test', 'BBA/1 SEM', 'Basic Marketing', '2', 'Online'),
(7, 'PC SOF 1', 'DEMO', 'BCA/1SEM', 'PC Software', '2', 'Online'),
(8, 'PC Software Test 1', 'No of Question 10.\nTime 3 min.', 'BCA/1 SEM', 'PC Software', '3', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `uid` int(11) NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `blood` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deptname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `catname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`uid`, `fname`, `lname`, `gender`, `blood`, `email`, `phone`, `mobile`, `password`, `cpassword`, `dob`, `address`, `deptname`, `catname`, `file`, `status`) VALUES
(21, 'Bijoy', 'Das', 'Male', 'A', 'admin@admin.com', '9775435716', '9775435716', 'admin', 'admin', '1998-05-01', 'Andi Murshidabad', 'Computer', 'Degree', '389923.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demofees`
--
ALTER TABLE `demofees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `demofees`
--
ALTER TABLE `demofees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
