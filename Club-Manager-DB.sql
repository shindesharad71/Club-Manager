-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2016 at 01:47 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(5) NOT NULL,
  `session_id` int(5) NOT NULL,
  `id_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `session_id`, `id_array`) VALUES
(1, 1, 'a:1:{i:0;s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `postTitle` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `auther` varchar(25) NOT NULL,
  `catinfo` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `postTitle`, `description`, `content`, `post_date`, `auther`, `catinfo`) VALUES
(6, 'Hello World!', 'This is a sample post for Club Manager. A short summary of your blog post write here.', '<h1 align="justify"><b>Club Manager!</b><br></h1><p align="justify">&nbsp;I am feeling very happy while writing this post. It feels very amazing when you writing blog post on your own created blogging platform!</p><p align="justify"> Blogging is one of the feature of Club Manager. The Club Manager&nbsp; can do lot of things.</p><p align="justify"><b>Features of Club Manager -</b></p><div align="justify"><ul><li><b>Beautiful Dashboard</b></li><li><b>Member Management (for Admin)</b></li><li><b>Blogging Platform (for Admin &amp; Members) </b></li><li><b>Notice Board (for Club Notice and Announcements)</b></li><li><b>Schedule Events &amp; Sessions</b></li><li><b>Attendance for Sessions</b></li></ul></div><p align="justify"><b><br>more features coming soon...</b></p><p align="justify"><br></p>', '2016-09-08 11:46:10', 'admin', 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(5) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `title`, `description`, `date`) VALUES
(2, 'This is Sample Notice Title', 'Description of notice in 250 characters. Explain All notice details in this section. ', '08-09-2016 16:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(5) NOT NULL,
  `session_name` varchar(150) NOT NULL,
  `session_details` varchar(250) NOT NULL,
  `session_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session_name`, `session_details`, `session_date`) VALUES
(1, 'New Event Title Here', 'Event Description goes here. Explain all about your event in here. ', '08-09-2016 16:53');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `dob` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `currunt_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `otp` varchar(10) NOT NULL,
  `pic` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `name`, `email`, `dob`, `username`, `password`, `role`, `last_login`, `currunt_login`, `otp`, `pic`) VALUES
(1, 'Admin', 'admin@somepanel.com', '', 'admin', '12345', 'President', '2016-09-07 23:32:55', '2016-09-08 10:43:59', '389531', 'imgs/17241-200.png'),
(2, 'Member', 'member', '', 'member', 'member', 'Member', '2016-09-06 23:22:26', '2016-09-06 17:52:52', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
