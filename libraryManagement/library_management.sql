-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 03:01 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_reg`
--

CREATE TABLE `admin_reg` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_reg`
--

INSERT INTO `admin_reg` (`admin_id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Sumanta', 'Banerjee', 'sumantabanerjee111@gmail.com', 'admin_12345');

-- --------------------------------------------------------

--
-- Table structure for table `availed_book`
--

CREATE TABLE `availed_book` (
  `av_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `book_id` int(11) NOT NULL,
  `av_user_id` int(11) NOT NULL,
  `av_user_fname` varchar(100) NOT NULL,
  `av_user_lname` varchar(100) NOT NULL,
  `issue_date` varchar(50) NOT NULL,
  `sub_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availed_book`
--

INSERT INTO `availed_book` (`av_id`, `book_name`, `author_name`, `book_id`, `av_user_id`, `av_user_fname`, `av_user_lname`, `issue_date`, `sub_date`) VALUES
(8, 'Tom Jones', 'Henry Fielding', 3, 6, 'Subhadeep', 'Banerjee', '29/08/2017', '08/09/2017'),
(9, 'Tom Jones', 'Henry Fielding', 3, 3, 'Sulagna', 'Sengupta', '01/08/2017', '11/08/2017'),
(10, 'Wuthering Heights', 'Emily Bronte', 8, 6, 'Subhadeep', 'Banerjee', '29/08/2017', '08/09/2017'),
(11, 'One Night at the Call Center: A Novel', 'Chetan Bhagat', 2, 1, 'Sumanta', 'Banerjee', '29/08/2017', '08/09/2017');

-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

CREATE TABLE `book_info` (
  `book_id` int(11) NOT NULL,
  `name_book` varchar(100) NOT NULL,
  `auther_book` varchar(100) NOT NULL,
  `avs_book` varchar(10) NOT NULL,
  `av_book` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`book_id`, `name_book`, `auther_book`, `avs_book`, `av_book`) VALUES
(1, 'Five Point Someone', 'Chetan Bhagat', 'y', '100'),
(2, 'One Night at the Call Center: A Novel', 'Chetan Bhagat', 'y', '9'),
(3, 'Tom Jones', 'Henry Fielding', 'n', '1'),
(4, 'Pride and Prejudice', 'Jane Austen', 'n', '0'),
(5, 'Le Rouge et le Noir', 'Stendhal', 'n', '0'),
(6, 'David Copperfield', 'Charles Dickens', 'y', '120'),
(7, 'Madame Bovary', 'Gustave Flaubert', 'n', '0'),
(8, 'Wuthering Heights', 'Emily Bronte', 'y', '29'),
(9, 'War and Peace', 'Tolstoy', 'y', '56'),
(10, 'The Brothers Karamazov', 'Dostoevsky', 'n', '0');

-- --------------------------------------------------------

--
-- Table structure for table `fine_info`
--

CREATE TABLE `fine_info` (
  `fine_id` int(11) NOT NULL,
  `fine_amount` varchar(30) NOT NULL DEFAULT '100',
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine_info`
--

INSERT INTO `fine_info` (`fine_id`, `fine_amount`, `book_id`, `book_name`, `fname`, `lname`, `u_id`) VALUES
(12, '100', 3, 'Tom Jones', 'Sulagna', 'Sengupta', 3);

-- --------------------------------------------------------

--
-- Table structure for table `req_book`
--

CREATE TABLE `req_book` (
  `req_id` int(11) NOT NULL,
  `req_book` varchar(100) NOT NULL,
  `req_auther` varchar(100) NOT NULL,
  `req_book_id` int(11) NOT NULL,
  `req_fname` varchar(100) NOT NULL,
  `req_lname` varchar(100) NOT NULL,
  `req_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_book`
--

INSERT INTO `req_book` (`req_id`, `req_book`, `req_auther`, `req_book_id`, `req_fname`, `req_lname`, `req_user_id`) VALUES
(27, 'Five Point Someone', 'Chetan Bhagat', 1, 'Sumanta', 'Banerjee', 1),
(28, 'One Night at the Call Center: A Novel', 'Chetan Bhagat', 2, 'Sumanta', 'Banerjee', 1),
(30, 'Wuthering Heights', 'Emily Bronte', 8, 'Sumanta', 'Banerjee', 1),
(31, 'War and Peace', 'Tolstoy', 9, 'Sumanta', 'Banerjee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`user_id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Sumanta', 'Banerjee', 'sumantabanerjee111@gmail.com', '12345'),
(2, 'Sukanta', 'Dutta', 'sukanta@gmail.com', '12345'),
(3, 'Sulagna', 'Sengupta', 'sulagna@gmail.com', '12345'),
(4, 'Sulagna', 'Sengupta', 'sulagna@gmail.com', '12345'),
(5, 'Moumita', 'Gayen', 'moumita@gmail.com', '12345'),
(6, 'Subhadeep', 'Banerjee', 'subha@gmail.com', '12345'),
(7, 'Sushrik', 'Chandra', 'sushrik@gmail.com', '12345'),
(8, 'Saheli', 'Saha', 'saheli@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_reg`
--
ALTER TABLE `admin_reg`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `availed_book`
--
ALTER TABLE `availed_book`
  ADD PRIMARY KEY (`av_id`);

--
-- Indexes for table `book_info`
--
ALTER TABLE `book_info`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `fine_info`
--
ALTER TABLE `fine_info`
  ADD PRIMARY KEY (`fine_id`);

--
-- Indexes for table `req_book`
--
ALTER TABLE `req_book`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_reg`
--
ALTER TABLE `admin_reg`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `availed_book`
--
ALTER TABLE `availed_book`
  MODIFY `av_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `book_info`
--
ALTER TABLE `book_info`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `fine_info`
--
ALTER TABLE `fine_info`
  MODIFY `fine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `req_book`
--
ALTER TABLE `req_book`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
