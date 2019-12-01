-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2019 at 09:05 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amh4wk_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `college_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_name`) VALUES
(1, 'CLAS'),
(2, 'SEAS'),
(3, 'COMM');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `major_id` int(11) NOT NULL,
  `dept_name` varchar(10) NOT NULL,
  `college_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_id`, `dept_name`, `college_id`) VALUES
(1, 'CS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `major_check_table`
--

CREATE TABLE `major_check_table` (
  `student_id` int(11) DEFAULT NULL,
  `major_requirement_id` int(11) DEFAULT NULL,
  `checked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major_check_table`
--

INSERT INTO `major_check_table` (`student_id`, `major_requirement_id`, `checked`) VALUES
(2, 1, 1),
(2, 2, 0),
(2, 3, 0),
(2, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `major_requirements`
--

CREATE TABLE `major_requirements` (
  `major_requirement_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  `requirement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major_requirements`
--

INSERT INTO `major_requirements` (`major_requirement_id`, `major_id`, `requirement`) VALUES
(1, 1, 'CS 1110'),
(2, 1, 'CS 2110'),
(3, 1, 'CS 2102'),
(4, 1, 'CS 2150'),
(5, 1, 'CS 3330'),
(6, 1, 'CS 4102'),
(7, 1, 'Computing Electives'),
(8, 1, 'Integrative Electives');

-- --------------------------------------------------------

--
-- Table structure for table `school_requirements`
--

CREATE TABLE `school_requirements` (
  `school_requirement_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `requirement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_requirements`
--

INSERT INTO `school_requirements` (`school_requirement_id`, `college_id`, `requirement`) VALUES
(1, 1, 'Foreign Language Requirement'),
(2, 1, 'First Writing Requirement'),
(3, 1, 'Second Writing Requirement'),
(4, 1, 'Social Sciences'),
(5, 1, 'Humanities'),
(6, 1, 'Historical Studies'),
(7, 1, 'Non-Western Perspective'),
(8, 1, 'Natural Science and Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `computing_id` varchar(6) NOT NULL,
  `college_name` varchar(50) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `computing_id`, `college_name`, `dept_name`, `first_name`, `last_name`, `password`) VALUES
(1, 'amh4wk', 'CLAS', 'PSYC', 'Ashley', 'Hoang', '123'),
(2, 'mty5yj', 'CLAS', 'CS', 'Michael', 'Young', '456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `major_requirements`
--
ALTER TABLE `major_requirements`
  ADD PRIMARY KEY (`major_requirement_id`);

--
-- Indexes for table `school_requirements`
--
ALTER TABLE `school_requirements`
  ADD PRIMARY KEY (`school_requirement_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `major_requirements`
--
ALTER TABLE `major_requirements`
  MODIFY `major_requirement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_requirements`
--
ALTER TABLE `school_requirements`
  MODIFY `school_requirement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
