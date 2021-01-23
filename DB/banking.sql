-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 04:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `account_no` int(5) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nationality` varchar(30) NOT NULL,
  `Address` varchar(120) NOT NULL,
  `balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`account_no`, `FirstName`, `LastName`, `Gender`, `DOB`, `Mobile`, `Email`, `Nationality`, `Address`, `balance`) VALUES
(10001, 'Rahul', 'Kishore', 'Male', '1999-10-01', '7894561230', 'rahul.k.gorai@gmail.com', 'Indian', 'Srinagar,Garia, Kolkata', 50000),
(10002, 'Piyush', 'Kumar', 'Male', '1999-01-22', '7894123502', 'piyush@gmail.com', 'Indian', 'Ranabhutia,Garia, Kolkata', 45000),
(10003, 'Rakesh', 'Kumar', 'Male', '2000-08-20', '7410258963', 'rakesh@gmail.com', 'Indian', 'Rani Kudar, Jamshedpur', 60000),
(10004, 'Anish', 'Ranjan', 'Male', '1999-12-18', '9877412530', 'anish@gmail.com', 'Indian', 'IVB, Piska More, Ranchi', 50000),
(10005, 'Aditi', 'Kumari', 'Female', '2000-05-25', '9987445202', 'aditik@gmail.com', 'Indian', 'Ratu Road, Ranchi', 40000),
(10006, 'Raghu', 'Kumar', 'Male', '1999-02-14', '7788996655', 'raghu@gmail.com', 'Indian', 'Gandhi Chowk, Asansol', 50000),
(10007, 'Ashutosh', 'Sharma', 'Male', '1999-04-12', '9966899577', 'ash889@gmail.com', 'Indian', 'Main Road, Gaya', 60000),
(10008, 'Priya', 'Kumari', 'Female', '1999-03-15', '7777777999', 'priya@gmail.com', 'Indian', 'Howrah, Kolkata', 18000),
(10009, 'Aakash', 'Singh', 'Male', '1999-09-19', '7795752959', 'aakash@gmail.com', 'Indian', 'Salt Lake, Kolkata', 28000),
(10010, 'Riya', 'Kumari', 'Female', '1995-03-05', '7258877999', 'riya@gmail.com', 'Indian', 'Howrah, Kolkata', 95000),
(10011, 'Ravi', 'Kumar', 'Male', '1999-05-21', '7589637999', 'ravi@gmail.com', 'Indian', 'Garia, Kolkata', 38000),
(10012, 'Rajni', 'Kumari', 'Female', '1999-05-21', '7545598999', 'rajni@gmail.com', 'Indian', 'Garia, Kolkata', 35000),
(10013, 'Joy', 'Kumar', 'Male', '1999-08-26', '9989637959', 'enjoy@gmail.com', 'Indian', 'NSEC, Kolkata', 38000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`account_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `account_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10014;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
