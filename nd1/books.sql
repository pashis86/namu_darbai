-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2016 at 07:09 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `Authors`
--

CREATE TABLE `Authors` (
  `authorId` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Authors`
--

INSERT INTO `Authors` (`authorId`, `name`) VALUES
(1, 'Chris Smith'),
(2, 'Steven Levithan'),
(3, ' Jan Goyvaerts'),
(4, 'Ryan Benedetti'),
(5, ' Al Anderson'),
(6, 'Clay Breshears'),
(7, 'Kevlin Henney'),
(10, 'Kazys'),
(13, 'Jonaitis');

-- --------------------------------------------------------

--
-- Table structure for table `bookAuthors`
--

CREATE TABLE `bookAuthors` (
  `id` int(11) NOT NULL,
  `bookId` int(11) DEFAULT NULL,
  `authorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookAuthors`
--

INSERT INTO `bookAuthors` (`id`, `bookId`, `authorId`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 4),
(4, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `bookId` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` year(4) DEFAULT NULL,
  `genre` char(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`bookId`, `title`, `year`, `genre`) VALUES
(1, 'Programming F# 3.0, 2nd Edition', 2012, NULL),
(2, 'Regular Expressions Cookbook, 2nd Edition', 2012, NULL),
(3, 'Head First Networking', 2009, NULL),
(4, 'The Art of Concurrency', 2009, NULL),
(5, '97 Things Every Programmer Should Know', 2010, NULL),
(9, 'Pakeliu maniakas', 2013, NULL),
(10, 'Knyga', 2013, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`authorId`);

--
-- Indexes for table `bookAuthors`
--
ALTER TABLE `bookAuthors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookId` (`bookId`),
  ADD KEY `authorId` (`authorId`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`bookId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Authors`
--
ALTER TABLE `Authors`
  MODIFY `authorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `bookAuthors`
--
ALTER TABLE `bookAuthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookAuthors`
--
ALTER TABLE `bookAuthors`
  ADD CONSTRAINT `bookAuthors_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `Books` (`bookId`),
  ADD CONSTRAINT `bookAuthors_ibfk_2` FOREIGN KEY (`authorId`) REFERENCES `Authors` (`authorId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
