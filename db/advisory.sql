-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2023 at 09:32 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `advisory`
--
CREATE DATABASE IF NOT EXISTS `advisory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `advisory`;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `regno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advise` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetreaded` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datereg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `regno`, `course`, `level`, `contact`, `complaint`, `status`, `advise`, `datetreaded`, `datereg`) VALUES
(1, 'Carson', 'Computer Science', '100 Level', '1234567890', 'I am yet to receive my textbook..!', 'open', ' We suggest you visit the school authority for further directive..!', '2023-01-11', '3rd  January 2023 '),
(2, 'Samuel - 23M/0019/CS', 'Computer Science', '40 Level', '2234567890', 'My lodge was lock by my landlord for no reason.', 'open', '001 We suggest you visit the school authority for further directive..!', '2023-01-11', '3rd  January 2023 '),
(3, '23DE/0002/CS', 'CS', 'ND1', '123345678', 'I paid for textbook, but i am yet to receive it.', '', '', '', '11th  January 2023 '),
(4, '23DE/0002/CS', 'CS', 'ND1', '123345678', 'I paid for practical manual, but i am yet to receive it.', 'open', 'Kindly meet the course rep. for assistance.', '2023-01-11', '11th  January 2023 '),
(5, '23DE/0002/CS', 'CS', 'ND1', '123345678', 'How do i report a lecturer collecting bribe (sorting)?', '', '', '', '11th  January 2023 ');

-- --------------------------------------------------------

--
-- Table structure for table `feepaid`
--

CREATE TABLE IF NOT EXISTS `feepaid` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `regno` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `feepaid` varchar(100) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feepaid`
--

INSERT INTO `feepaid` (`id`, `regno`, `name`, `email`, `sex`, `dob`, `department`, `level`, `session`, `feepaid`, `address`, `date`, `status`) VALUES
(1, '', 'gghhfhg', 'hff', 'male', '2021-07-24', 'fg', 'ddfdf', 'dg', '', 'ggf', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datereg` varchar(30) NOT NULL,
  `admin` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `location`, `contact`, `password`, `datereg`, `admin`) VALUES
(1, 'Administrator', 'Imo - Owerri West', 'Admin', '12345', '23-Aug-2019', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `schoolfees`
--

CREATE TABLE IF NOT EXISTS `schoolfees` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `rnd1f` varchar(30) NOT NULL,
  `rnd1s` varchar(30) NOT NULL,
  `rnd2f` varchar(30) NOT NULL,
  `rnd2s` varchar(30) NOT NULL,
  `rhnd1f` varchar(30) NOT NULL,
  `rhnd1s` varchar(30) NOT NULL,
  `rhnd2f` varchar(30) NOT NULL,
  `rhnd2s` varchar(30) NOT NULL,
  `pnd1f` varchar(30) NOT NULL,
  `pnd1s` varchar(30) NOT NULL,
  `pnd2f` varchar(30) NOT NULL,
  `pnd2s` varchar(30) NOT NULL,
  `phnd1f` varchar(30) NOT NULL,
  `phnd1s` varchar(30) NOT NULL,
  `phnd2f` varchar(30) NOT NULL,
  `phnd2s` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `schoolfees`
--

INSERT INTO `schoolfees` (`id`, `rnd1f`, `rnd1s`, `rnd2f`, `rnd2s`, `rhnd1f`, `rhnd1s`, `rhnd2f`, `rhnd2s`, `pnd1f`, `pnd1s`, `pnd2f`, `pnd2s`, `phnd1f`, `phnd1s`, `phnd2f`, `phnd2s`) VALUES
(1, '10,000', '20,000', '40,000', '40,000', '50,000', '60,000', '70,000', '80,000', '90,000', '100,000', '110,000', '120,000', '130,000', '140,000', '150,000', '160,000');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `regno` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `waec` varchar(100) NOT NULL,
  `nd` varchar(100) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `birth` varchar(100) NOT NULL,
  `attestation` varchar(100) NOT NULL,
  `fees` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `petname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `regno`, `name`, `email`, `sex`, `dob`, `department`, `level`, `session`, `address`, `waec`, `nd`, `passport`, `birth`, `attestation`, `fees`, `date`, `status`, `petname`) VALUES
(1, '15H/0001/CS', 'James Michael', '07082251712', 'male', '2023-01-03', 'Computer Science', '100 Level', '2023/2024', 'Nekede', '20230107210503419329216.jpg', '202301072105031219562413.jpg', '202301072105031624634108.jpg', '20230107210503351093155.jpg', '202301072105031819789578.jpg', '202301072105031095253962.jpg', '1673125503', 'Approved', ''),
(2, '23DE/0002/CS', 'test1', '123345678', 'male', '2023-01-17', 'CS', 'ND1', '2017/2018', 'xss@sas', '202301111907151361301040.jpg', '202301111907151542127358.jpg', '202301111907151328528644.jpg', '202301111907157567622.jpg', '20230111190715431493313.jpg', '20230111190715882746752.jpg', '1673464035', 'Approved', 'sam');

-- --------------------------------------------------------

--
-- Table structure for table `studresult`
--

CREATE TABLE IF NOT EXISTS `studresult` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `studname` varchar(100) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `gp` varchar(20) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `datereg` varchar(50) NOT NULL,
  `fsrv` varchar(20) NOT NULL,
  `ssrv` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `studresult`
--

INSERT INTO `studresult` (`id`, `studname`, `regno`, `gp`, `remark`, `datereg`, `fsrv`, `ssrv`, `level`) VALUES
(15, 'Mr. Samson', '15H/0001/CS', '2.75', 'LOWER CREDIT', '8th  January 2023', '2', '3.5', '200 Level'),
(16, 'Mr. Samson', '15H/0001/CS', '2.75', 'LOWER CREDIT', '8th  January 2023', '2', '3.5', '100 Level'),
(17, 'Mr. Samson', '15H/0001/CS', '2.75', 'LOWER CREDIT', '8th  January 2023', '2', '3.5', '300 Level');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'Admin', '12345');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
