-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 12:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p1`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration1`
--

CREATE TABLE `registration1` (
  `id` int(11) NOT NULL,
  `std_image` varchar(400) NOT NULL,
  `college` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `course` varchar(20) NOT NULL,
  `caste` varchar(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration1`
--

INSERT INTO `registration1` (`id`, `std_image`, `college`, `name`, `course`, `caste`, `language`, `country`, `state`, `email`, `password`) VALUES
(19, 'images/download (1).jpeg', 'JECRC', 'Bhawna', 'MCA', 'General', 'Hindi,Marwadi', '', '', 'bhawna@gmail.com', '74577335b4a220d9605d8218d8b39d5b'),
(20, 'images/arthesh.jpg', 'PIET', 'Arthesh', 'BTECH', 'General', 'Hindi,English,Marwadi', '', '', 'arthesh@gmail.com', 'ca70cb0d91bc6ca6bc45c68bbc88ec8a'),
(21, 'images/images.png', 'JECRC', 'Ram', 'MCA', 'SC', 'Hindi', '', '', 'ram@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc'),
(32, 'images/download (1).jpeg', 'PIET', 'Aarav', 'MA', 'OBC', 'Hindi', '', '', 'aarav@gmail.com', 'ee0bc1870a78abc9ac9d78619c6d1163'),
(33, 'images/download (3).jpeg', 'JECRC', 'Harsh', 'BBA', 'OBC', 'English', '', '', 'harsh@gmail.com', 'acd704f06629c641012f704973b0eb4e'),
(34, 'images/images.jpeg', 'PIET', 'Divy', 'MA', 'OBC', 'Hindi', '', '', 'divy@gmail.com', '6616cfc30636d87dc2060d7d71066bdf'),
(35, 'images/download (3).jpeg', 'PCE', 'deepak', 'MA', 'General', 'English,Marwadi', '', '', 'deepak@gmail.com', '498b5924adc469aa7b660f457e0fc7e5'),
(37, 'images/download (2).jpeg', 'JECRC', 'Aashi', 'MCA', 'General', 'Hindi', '', '', 'aashi@gmail.com', '3208a3497eb38368d049eb592d33dc35'),
(38, 'images/DSC_5897.JPG', 'efsd', 'sdsa', 'dscd', 'General', 'Hindi', '1', '42', 'wsad@gmail.com', '92d90275f39e8ce86eb5068fe5c35912'),
(39, 'images/', 'dsfdc', 'edccsedcs', 'edscsd', 'General', 'Hindi', '2', '74', '123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration1`
--
ALTER TABLE `registration1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration1`
--
ALTER TABLE `registration1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
