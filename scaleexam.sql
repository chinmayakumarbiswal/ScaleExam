-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 07:50 AM
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
-- Database: `scaleexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `joinroomstudent`
--

CREATE TABLE `joinroomstudent` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL,
  `roomIdAuto` varchar(255) NOT NULL,
  `studentEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joinroomstudent`
--

INSERT INTO `joinroomstudent` (`id`, `name`, `details`, `teacherEmail`, `roomIdAuto`, `studentEmail`) VALUES
(1, 'AWS', 'This testing room for Aws', 'situ@chinmayakumarbiswal.in', 'AWS03yTvYc9', '210720100009@cutm.ac.in'),
(4, 'testroom', 'This is a testing room by devloper', 'situ@chinmayakumarbiswal.in', 'testroom6YdmKztN', '210720100009@cutm.ac.in'),
(5, 'ML', 'Ml by saneev', 'situ@chinmayakumarbiswal.in', 'MLcsW7w0MC', 'swikretisar2000@gmail.com'),
(6, 'ML', 'ML by saneev', 'saneev@cutm.ac.in', 'MLUAER6e0Z', '210720100014@cutm.ac.in'),
(7, 'testroom', 'This is a testing room by devloper', 'situ@chinmayakumarbiswal.in', 'testroom6YdmKztN', '210720100014@cutm.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `roomassignement`
--

CREATE TABLE `roomassignement` (
  `id` int(11) NOT NULL,
  `roomIdAuto` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `roomName` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roomdocument`
--

CREATE TABLE `roomdocument` (
  `id` int(11) NOT NULL,
  `roomIdAuto` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `roomName` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roomexam`
--

CREATE TABLE `roomexam` (
  `id` int(11) NOT NULL,
  `roomIdAuto` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `roomName` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `roomIdAuto` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomIdAuto`, `name`, `details`, `teacherEmail`) VALUES
(1, 'testroom6YdmKztN', 'testroom', 'This is a testing room by devloper', 'situ@chinmayakumarbiswal.in'),
(2, 'AWS03yTvYc9', 'AWS', 'This testing room for Aws', 'situ@chinmayakumarbiswal.in'),
(4, 'MLUAER6e0Z', 'ML', 'ML by saneev', 'saneev@cutm.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profileimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `bio`, `password`, `profileimage`) VALUES
(1, 'Chinmaya Kumar Biswal', '210720100009@cutm.ac.in', 'Cloud Student', 'situ', 'chinmaya_white.jpg'),
(2, 'Swikruti Sar', 'swikretisar2000@gmail.com', 'my self swikruti ', 'liti', 'liti.jpeg'),
(3, 'Siki Sanu', '210720100014@cutm.ac.in', 'I am the best.....', 'siki123', '2a2ddfb5-7328-446a-851c-99d0f434b40d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `public` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profileimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `bio`, `public`, `password`, `profileimage`) VALUES
(1, 'Chinmaya', 'situ@chinmayakumarbiswal.in', 'Cloud Teacher', 'private', 'situ', 'chinmaya.jpg'),
(2, 'Saneev Das', 'saneev@cutm.ac.in', 'i am saneev', 'public', 'saneev', 'f40b81ab-42c8-406f-9341-9f207162ad4a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `joinroomstudent`
--
ALTER TABLE `joinroomstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomassignement`
--
ALTER TABLE `roomassignement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomdocument`
--
ALTER TABLE `roomdocument`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomexam`
--
ALTER TABLE `roomexam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `joinroomstudent`
--
ALTER TABLE `joinroomstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roomassignement`
--
ALTER TABLE `roomassignement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomdocument`
--
ALTER TABLE `roomdocument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomexam`
--
ALTER TABLE `roomexam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
