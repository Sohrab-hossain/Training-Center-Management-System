-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 06:36 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbuscoaching`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `countryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `countryId`) VALUES
(1, 'Thakurgaon', 1),
(2, 'Dinajpur', 1),
(3, 'Rangpur', 1),
(4, 'Katmundu', 7),
(5, 'Panchagarh', 1),
(6, 'Nilphamari', 1),
(7, 'Lalmonirhat', 1),
(8, 'Kurigram', 1),
(9, 'Gaibandha', 1),
(10, 'Sylhet', 1),
(11, 'Sunamganj', 1),
(12, 'Moulvibazar', 1),
(13, 'Habiganj', 1),
(14, 'Sirajganj', 1),
(15, 'Rajshahi', 1),
(16, 'Pabna', 1),
(17, 'Chapai Nawabganj', 1),
(18, 'Natore', 1),
(19, 'Naogaon', 1),
(20, 'Joypurhat', 1),
(21, 'Bogura ', 1),
(22, 'Sherpur', 1),
(23, 'Netrokona', 1),
(24, 'Mymensingh', 1),
(25, 'Jamalpur', 1),
(26, 'Satkhira ', 1),
(27, 'Narail', 1),
(28, 'Meherpur', 1),
(29, 'Magura', 1),
(30, 'Khulna', 1),
(31, 'Jhenaidah', 1),
(32, 'Jashore', 1),
(33, 'Chuadanga', 1),
(34, 'Bagerhat', 1),
(35, 'Tangail', 1),
(36, 'Shariatpur', 1),
(37, 'Rajbari', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Bangladesh'),
(2, 'India'),
(3, 'Pakistan'),
(4, 'Japan'),
(6, 'USA'),
(7, 'Nepal');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `description` varchar(8000) DEFAULT NULL,
  `fee` float DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `syllabus` varchar(500) DEFAULT NULL,
  `website` varchar(500) DEFAULT NULL,
  `departmentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `fee`, `duration`, `syllabus`, `website`, `departmentId`) VALUES
(1, 'php web development', 'Na', 22000, 120, 'mySql Syntex.txt', 'www.php.org', 1),
(2, 'Web Development', 'NA', 15000, 130, 'php IP address finder veriable.txt', 'w3school.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`) VALUES
(1, 'Computer Science', 'DCC'),
(2, 'BBA', 'NA'),
(3, 'Mathematics', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `regNo` varchar(12) DEFAULT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `createIp` varchar(200) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `type` varchar(5) NOT NULL DEFAULT 'U',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `active_date` date NOT NULL DEFAULT '2018-06-05'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `regNo`, `tag`, `contact`, `email`, `password`, `gender`, `dateOfBirth`, `address`, `createDate`, `createIp`, `cityId`, `type`, `active`, `active_date`) VALUES
(1, 'Sohrab Hossain', '121212', 'php', '01722968534', 's.h56789@yahoo.com', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 2, '1994-02-03', 'Paharbhanga', '2018-05-08', '::1', 1, 'U', 1, '2018-06-05'),
(2, 'Zafran', '735423595', 'hjfsjdfklsd', 'erw875385', 'fhsjdfhjk@jdsfjkskf', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 2, '0000-00-00', 'Dinajpur', '2018-05-09', '::1', 2, 'U', 0, '2018-06-05'),
(3, 'tiktak', '512436', 'php, java', '01289378911', 'dkjfshj@gmail.com', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 2, '2001-03-02', 'kustiya, khulna', '2018-05-23', '::1', 30, 'U', 0, '2018-06-05'),
(4, 'Toufik', '23642', 'web, asp.net, php, sql', '01293098613', 'soh@gmail.com', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 2, '1998-05-05', 'porishodpara', '2018-06-01', '::1', 1, 'U', 0, '2018-06-05'),
(5, 'Suchi', '123456', 'boos', '08342582935', 'hfgjds@gmail.com', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 1, '1998-05-05', 'dhakail', '2018-06-04', '::1', 1, 'U', 0, '2018-06-05'),
(6, 'Mokbul', '2656362', 'abul', '237498723984', 'adc@gmail.com', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 2, '1998-06-05', 'iuiewrt', '2018-06-04', '::1', 15, 'U', 0, '2018-06-05'),
(7, 'Zafu', '1322125', 'php', '03212216565', 'adc1232@gmail.com', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 2, '1994-02-03', 'paharbhanga', '2018-06-05', '::1', 1, 'U', 1, '0000-00-00'),
(8, 'Tamim', '2132152', 'web, asp.net, php, sql', '0132545213265', 'adc123@gmail.com', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 2, '1994-02-03', 'jhdsfjkhs', '2018-06-05', '::1', 1, 'U', 1, '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `studentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`studentId`, `courseId`, `date`, `remarks`) VALUES
(1, 1, '2018-04-10', 'na'),
(2, 2, '2018-05-10', 'sdkjfhsd');

-- --------------------------------------------------------

--
-- Table structure for table `student_cv`
--

CREATE TABLE `student_cv` (
  `studentId` int(11) NOT NULL,
  `cv` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_cv`
--

INSERT INTO `student_cv` (`studentId`, `cv`, `date`) VALUES
(1, 'file upload er jonno php te.txt', '2018-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `student_image`
--

CREATE TABLE `student_image` (
  `id` int(11) NOT NULL,
  `studentId` int(11) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_image`
--

INSERT INTO `student_image` (`id`, `studentId`, `image`, `date`, `title`) VALUES
(2, 1, 'IMG_9644.JPG', '2018-05-23', 'php'),
(3, 2, 'microphone choice 01.JPG', '2018-05-23', 'sdjfkljsdklfj'),
(4, 1, 'man3.png', '2018-06-01', 'cartoon'),
(5, 4, 'man1.jpg', '2018-06-01', 'janina'),
(6, 4, 'man3.png', '2018-06-01', 'janina2'),
(7, 3, 'man3.png', '2018-06-01', 'hxjvhs'),
(8, 1, 'Cartoon-monkey_6.png', '2018-06-01', 'blaa blaa'),
(9, 1, 'Dale_KHII.png', '2018-06-01', 'hahahaha'),
(10, 1, 'jdhv.png', '2018-06-01', 'php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryId` (`countryId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `departmentId` (`departmentId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regNo` (`regNo`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `cityId` (`cityId`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`studentId`,`courseId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `student_cv`
--
ALTER TABLE `student_cv`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `student_image`
--
ALTER TABLE `student_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentId` (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_image`
--
ALTER TABLE `student_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `country` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`cityId`) REFERENCES `city` (`id`);

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`id`);

--
-- Constraints for table `student_cv`
--
ALTER TABLE `student_cv`
  ADD CONSTRAINT `student_cv_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`);

--
-- Constraints for table `student_image`
--
ALTER TABLE `student_image`
  ADD CONSTRAINT `student_image_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
