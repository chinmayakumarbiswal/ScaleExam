-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 08:22 PM
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
-- Table structure for table `assignementfilelog`
--

CREATE TABLE `assignementfilelog` (
  `id` int(11) NOT NULL,
  `UniqueId` varchar(255) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `studentEmail` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignementfilelog`
--

INSERT INTO `assignementfilelog` (`id`, `UniqueId`, `studentName`, `studentEmail`, `pdf`) VALUES
(2, 'ikKZrazg2023vBiO3lSJ', 'Chinmaya Kumar Biswal', '210720100009@cutm.ac.in', '17-02-2023-22-03Solution Architect Associate.pdf'),
(3, 'ikKZrazg2023vBiO3lSJ', 'Chinmaya Kumar Biswal', '210720100009@cutm.ac.in', '17-02-2023-22-12AWS Certified Cloud Practitioner certificate.pdf'),
(4, 'ikKZrazg2023vBiO3lSJ', 'Chinmaya Kumar Biswal', '210720100009@cutm.ac.in', '18-02-2023-15-34AWS Certified Cloud Practitioner score.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `assignementlog`
--

CREATE TABLE `assignementlog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roomIdAuto` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `UniqueId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignementlog`
--

INSERT INTO `assignementlog` (`id`, `name`, `roomIdAuto`, `teacherEmail`, `details`, `UniqueId`) VALUES
(1, 'Create Ec2 Instance', '2023vBiO3lSJ', 'situ@chinmayakumarbiswal.in', 'Create ec2 instance submit by 10 march', 'ikKZrazg2023vBiO3lSJ');

-- --------------------------------------------------------

--
-- Table structure for table `documentlog`
--

CREATE TABLE `documentlog` (
  `id` int(11) NOT NULL,
  `roomIdAuto` varchar(255) NOT NULL,
  `teachersEmail` varchar(255) NOT NULL,
  `documentName` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documentlog`
--

INSERT INTO `documentlog` (`id`, `roomIdAuto`, `teachersEmail`, `documentName`, `filename`) VALUES
(1, '2023vBiO3lSJ', 'situ@chinmayakumarbiswal.in', 'aws note', '17-02-2023-22-24Solution Architect Associate.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `examName` varchar(255) NOT NULL,
  `examdetails` varchar(255) NOT NULL,
  `examDate` varchar(255) NOT NULL,
  `examStartTime` varchar(255) NOT NULL,
  `examEndTime` varchar(255) NOT NULL,
  `examUniqueId` varchar(255) NOT NULL,
  `teacherEmail` varchar(255) NOT NULL,
  `roomIdAuto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `examName`, `examdetails`, `examDate`, `examStartTime`, `examEndTime`, `examUniqueId`, `teacherEmail`, `roomIdAuto`) VALUES
(1, 'aws Test1', 'aws exam', '2023-02-18', '10:00', '11:00', 'of9BGWJy2023vBiO3lSJ', 'situ@chinmayakumarbiswal.in', '2023vBiO3lSJ'),
(2, 'exam 2', 'exam 2', '2023-02-18', '13:02', '14:06', 'pLVUHw8t2023vBiO3lSJ', 'situ@chinmayakumarbiswal.in', '2023vBiO3lSJ'),
(3, 'test 3', 'test 3 for aws', '2023-02-18', '01:17', '17:20', '6odkJjHK2023vBiO3lSJ', 'situ@chinmayakumarbiswal.in', '2023vBiO3lSJ'),
(4, 'test 4', ' ', '2023-02-24', '01:36', '03:37', 'aO3B9EuN2023vBiO3lSJ', 'situ@chinmayakumarbiswal.in', '2023vBiO3lSJ');

-- --------------------------------------------------------

--
-- Table structure for table `examresult`
--

CREATE TABLE `examresult` (
  `id` int(11) NOT NULL,
  `roomIdAuto` varchar(255) NOT NULL,
  `examUniqueId` varchar(255) NOT NULL,
  `studentEmail` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examresult`
--

INSERT INTO `examresult` (`id`, `roomIdAuto`, `examUniqueId`, `studentEmail`, `mark`) VALUES
(1, '2023vBiO3lSJ', 'aO3B9EuN2023vBiO3lSJ', '210720100009@cutm.ac.in', '1');

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
(9, 'Cloud Technology 2nd Sem', 'This is a cloud online class room which is used by MCA 2nd Sem.', 'situ@chinmayakumarbiswal.in', '2023vBiO3lSJ', '210720100009@cutm.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE `questionbank` (
  `id` int(11) NOT NULL,
  `roomIdAuto` varchar(255) NOT NULL,
  `examUniqueId` varchar(255) NOT NULL,
  `question` varchar(6000) NOT NULL,
  `option1` varchar(1000) NOT NULL,
  `option2` varchar(1000) NOT NULL,
  `option3` varchar(1000) NOT NULL,
  `option4` varchar(1000) NOT NULL,
  `ans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`id`, `roomIdAuto`, `examUniqueId`, `question`, `option1`, `option2`, `option3`, `option4`, `ans`) VALUES
(1, '2023vBiO3lSJ', 'aO3B9EuN2023vBiO3lSJ', 'A solutions architect is designing a solution where users will be directed to a backup static error page if the primary website is unavailable. The primary website\'s DNS records are hosted in Amazon Route 53 where their domain is pointing to an Application Load Balancer (ALB). Which configuration should the solutions architect use to meet the company\'s needs while minimizing changes and infrastructure overhead?', 'Point a Route 53 alias record to an Amazon CloudFront distribution with the ALB as one of its origins. Then, create custom error pages for the distribution.', 'Set up a Route 53 active-passive failover configuration. Direct traffic to a static error page hosted within an Amazon S3 bucket when Route 53 health checks determine that the ALB endpoint is unhealthy', ' Update the Route 53 record to use a latency-based routing policy. Add the backup static error page hosted within an Amazon S3 bucket to the record so the traffic is sent to the most responsive endpoints.', 'Set up a Route 53 active-active configuration with the ALB and an Amazon EC2 instance hosting a static error page as endpoints. Route 53 will only send requests to the instance if the health checks fail for the ALB.', 'b'),
(2, '2023vBiO3lSJ', 'aO3B9EuN2023vBiO3lSJ', 'A solutions architect is designing a high performance computing (HPC) workload on Amazon EC2. The EC2 instances need to communicate to each other frequently and require network performance with low latency and high throughput. Which EC2 configuration meets these requirements?', 'Launch the EC2 instances in a cluster placement group in one Availability Zone.', 'Launch the EC2 instances in a spread placement group in one Availability Zone.', 'Launch the EC2 instances in an Auto Scaling group in two Regions and peer the VPCs.', 'Launch the EC2 instances in an Auto Scaling group spanning multiple Availability Zones.', 'a'),
(3, '2023vBiO3lSJ', 'aO3B9EuN2023vBiO3lSJ', 'A company wants to host a scalable web application on AWS. The application will be accessed by users from different geographic regions of the world. Application users will be able to download and upload unique data up to gigabytes in size. The development team wants a cost-effective solution to minimize upload and download latency and maximize performance. What should a solutions architect do to accomplish this?', 'Use Amazon S3 with Transfer Acceleration to host the application.', 'Use Amazon S3 with CacheControl headers to host the application.', 'Use Amazon EC2 with Auto Scaling and Amazon CloudFront to host the application.', 'Use Amazon EC2 with Auto Scaling and Amazon ElastiCache to host the application.', 'c'),
(4, '2023vBiO3lSJ', '6odkJjHK2023vBiO3lSJ', 'test', 'test1', 'test2', 't3', 't5', 'c');

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
(6, '2023vBiO3lSJ', 'Cloud Technology 2nd Sem', 'This is a cloud online class room which is used by MCA 2nd Sem.', 'situ@chinmayakumarbiswal.in'),
(7, '2023uQr61Dzi', 'test room ', 'testing room', 'chinmayakumarbiswal16045@gmail.com');

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
(2, 'Swikruti Sar', 'swikretisar2000@gmail.com', 'my self swikruti ', 'liti', 'liti.jpeg'),
(3, 'Siki Sanu', '210720100014@cutm.ac.in', 'I am the best.....', 'siki123', '2a2ddfb5-7328-446a-851c-99d0f434b40d.jpg'),
(5, 'Chinmaya Kumar Biswal', '210720100009@cutm.ac.in', '', 'b0cdf1a710c2fbedb32adcc57aaf2b46', '24-02-2023-19-55chinmaya_white.jpg');

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
(4, 'Chinmaya Kumar Biswal', 'situ@chinmayakumarbiswal.in', '', 'public', '93d36a5e26f866ff3b71cebcdbaadf27', '17-02-2023-20-17chinmaya_white.jpg'),
(5, 'Chinmaya Kumar Biswal', 'chinmayakumarbiswal16045@gmail.com', '', '', '93d36a5e26f866ff3b71cebcdbaadf27', '18-02-2023-11-10210720100009.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignementfilelog`
--
ALTER TABLE `assignementfilelog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignementlog`
--
ALTER TABLE `assignementlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentlog`
--
ALTER TABLE `documentlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examresult`
--
ALTER TABLE `examresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joinroomstudent`
--
ALTER TABLE `joinroomstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionbank`
--
ALTER TABLE `questionbank`
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
-- AUTO_INCREMENT for table `assignementfilelog`
--
ALTER TABLE `assignementfilelog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assignementlog`
--
ALTER TABLE `assignementlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documentlog`
--
ALTER TABLE `documentlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `examresult`
--
ALTER TABLE `examresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `joinroomstudent`
--
ALTER TABLE `joinroomstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questionbank`
--
ALTER TABLE `questionbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
