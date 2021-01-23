-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 04:10 AM
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
(10001, 'Rahul', 'Kishore', 'Male', '1999-10-01', '7894561230', 'rahul.k.gorai@gmail.com', 'Indian', 'Srinagar,Garia, Kolkata', 43400),
(10002, 'Piyush', 'Kumar', 'Male', '1999-01-22', '7894123502', 'piyush@gmail.com', 'Indian', 'Ranabhutia,Garia, Kolkata', 44000),
(10003, 'Rakesh', 'Kumar', 'Male', '2000-08-20', '7410258963', 'rakesh@gmail.com', 'Indian', 'Rani Kudar, Jamshedpur', 55100),
(10004, 'Anish', 'Ranjan', 'Male', '1999-12-18', '9877412530', 'anish@gmail.com', 'Indian', 'IVB, Piska More, Ranchi', 52510),
(10005, 'Aditi', 'Kumari', 'Female', '2000-05-25', '9987445202', 'aditik@gmail.com', 'Indian', 'Ratu Road, Ranchi', 40000),
(10006, 'Raghu', 'Kumar', 'Male', '1999-02-14', '7788996655', 'raghu@gmail.com', 'Indian', 'Gandhi Chowk, Asansol', 50000),
(10007, 'Ashutosh', 'Sharma', 'Male', '1999-04-12', '9966899577', 'ash889@gmail.com', 'Indian', 'Main Road, Gaya', 69990),
(10008, 'Priya', 'Kumari', 'Female', '1999-03-15', '7777777999', 'priya@gmail.com', 'Indian', 'Howrah, Kolkata', 18000),
(10009, 'Aakash', 'Singh', 'Male', '1999-09-19', '7795752959', 'aakash@gmail.com', 'Indian', 'Salt Lake, Kolkata', 28000),
(10010, 'Riya', 'Kumari', 'Female', '1995-03-05', '7258877999', 'riya@gmail.com', 'Indian', 'Howrah, Kolkata', 95000),
(10011, 'Ravi', 'Kumar', 'Male', '1999-05-21', '7589637999', 'ravi@gmail.com', 'Indian', 'Garia, Kolkata', 38000),
(10012, 'Rajni', 'Kumari', 'Female', '1999-05-21', '7545598999', 'rajni@gmail.com', 'Indian', 'Garia, Kolkata', 35000),
(10013, 'Joy', 'Kumar', 'Male', '1999-08-26', '9989637959', 'enjoy@gmail.com', 'Indian', 'NSEC, Kolkata', 38000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(6) NOT NULL,
  `sender` int(5) NOT NULL,
  `reciever` int(5) NOT NULL,
  `amount` float NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `sender`, `reciever`, `amount`, `date`) VALUES
(1, 10001, 10002, 1000, '2021-01-07 12:34:52'),
(2, 10002, 10001, 1000, '2021-01-07 12:36:27'),
(3, 10002, 10003, 5000, '2021-01-07 20:36:38'),
(4, 10003, 10001, 10000, '2021-01-07 20:42:15'),
(5, 10001, 10001, 3000, '2021-01-07 21:13:54'),
(6, 10001, 10001, 2000, '2021-01-07 21:15:45'),
(7, 10007, 10004, 10, '2021-01-07 21:16:28'),
(8, 10002, 10001, 1000, '2021-01-19 09:05:04'),
(9, 10001, 10007, 10000, '2021-01-19 09:25:15'),
(10, 10001, 10002, 1000, '2021-01-19 18:54:21'),
(11, 10001, 10004, 2500, '2021-01-19 19:28:25'),
(12, 10002, 10001, 300, '2021-01-19 19:29:17'),
(13, 10001, 10003, 1300, '2021-01-20 00:05:04'),
(14, 10003, 10002, 1200, '2021-01-20 00:06:42'),
(15, 10001, 10002, 1500, '2021-01-20 08:38:18'),
(16, 10001, 10002, 1600, '2021-01-20 09:10:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transaction_ibfk_1` (`sender`),
  ADD KEY `transaction_ibfk_2` (`reciever`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `account_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10014;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `members` (`account_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`reciever`) REFERENCES `members` (`account_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
