-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 08:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyber crime`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(45) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `case_details`
--

CREATE TABLE `case_details` (
  `fir_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `case_desc` varchar(255) NOT NULL,
  `date_filed` date NOT NULL DEFAULT current_timestamp(),
  `date_solved` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `inv_id` int(255) NOT NULL,
  `c_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_details`
--

INSERT INTO `case_details` (`fir_id`, `user_id`, `case_desc`, `date_filed`, `date_solved`, `status`, `domain`, `amount`, `inv_id`, `c_id`) VALUES
(1, 20, 'explained', '2024-02-25', '2024-02-27', 'success', 'Online Fraud', '90000', 2, 4),
(2, 21, 'explained', '2024-02-25', '2024-02-27', 'success', 'Malware and Virus Complaints', '0', 2, 5),
(3, 22, 'explained', '2024-02-25', '2024-02-27', 'success', 'Phishing', '0', 1, 6),
(4, 23, 'explained', '2024-02-25', '2024-02-27', 'success', 'Online Fraud', '25000', 2, 7),
(6, 24, 'explained', '2024-03-11', '2024-03-11', 'success', 'Hacking and Unauthorized Access', '1000', 2, 8),
(7, 25, 'explained', '2024-03-11', '2024-03-11', 'success', 'Online Fraud', '20000', 2, 9),
(8, 26, 'explained', '2024-03-12', '2024-03-12', 'success', 'Online Fraud', '30000', 1, 11),
(9, 27, 's', '2024-03-22', '2024-03-22', 'success', 'Phishing', '1000', 2, 12),
(10, 28, 'sms', '2024-03-22', '2024-03-22', 'success', 'Online Fraud', '90000', 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `criminal_database`
--

CREATE TABLE `criminal_database` (
  `c_id` int(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_pic` mediumblob NOT NULL,
  `c_dob` date NOT NULL,
  `c_sex` varchar(255) NOT NULL,
  `assoc_fir_id` int(255) NOT NULL,
  `noc` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criminal_database`
--

INSERT INTO `criminal_database` (`c_id`, `c_name`, `c_pic`, `c_dob`, `c_sex`, `assoc_fir_id`, `noc`) VALUES
(4, 'Md. Ashraf Hussain', 0x75706c6f6164732f312e6a706567, '1992-02-12', 'Male', 1, 1),
(5, 'Chris D souza', 0x75706c6f6164732f362e6a706567, '2000-10-28', 'Male', 2, 1),
(6, 'Shilpa Rao', 0x75706c6f6164732f696d61676573202831292e6a706567, '1989-01-12', 'Female', 3, 1),
(7, 'Pratap Singh', 0x75706c6f6164732f392e6a7067, '1991-02-04', 'Male', 4, 1),
(8, 'Babundas M', 0x75706c6f6164732f63312e6a706567, '1993-11-12', 'Male', 6, 1),
(9, 'Richard b', 0x75706c6f6164732f696d616765732e6a706567, '1985-11-29', 'Male', 7, 1),
(11, 'santhosh', 0x75706c6f6164732f646f776e6c6f61642e6a706567, '1111-11-11', 'Male', 26, 1),
(12, 'sarthak', 0x75706c6f6164732f342e6a706567, '1111-11-11', 'Male', 9, 1),
(13, 'xyz', 0x75706c6f6164732f362e6a706567, '1111-11-11', 'Male', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `investigator`
--

CREATE TABLE `investigator` (
  `inv_id` int(255) NOT NULL,
  `inv_name` varchar(255) NOT NULL,
  `inv_sex` varchar(255) NOT NULL,
  `inv_phone` varchar(255) NOT NULL,
  `inv_pass` varchar(255) NOT NULL,
  `position` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `investigator`
--

INSERT INTO `investigator` (`inv_id`, `inv_name`, `inv_sex`, `inv_phone`, `inv_pass`, `position`) VALUES
(1, 'M RAHUL BHAT', 'male', '9019721662', 'rahul', 'standard'),
(2, 'DEEKSHA D', 'female', '9945184300', 'deeksha', 'standard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_sex` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_dob`, `user_sex`, `phone`, `address`, `email`) VALUES
(20, 'Deeksha Divakar', '2003-07-25', 'Female', '9945184300', 'Ashraya, perlaguri 3rd cross padavinagadi mangaluru', 'deekshu@gmail.com'),
(21, 'Ahan Rao', '2000-12-11', 'Male', '801972110', 'xyz', 'ahan@gmail.com'),
(22, 'Ramu', '1987-12-05', 'Male', '9827826221', 'Mahrastra', 'Ramu@gmail.com'),
(23, 'Arun Malhotra', '1996-03-22', 'Male', '7259582312', 'abcd', 'arun@gmail.com'),
(24, 'Srijal', '2004-03-19', 'Female', '9632556799', 'kodikal', 'srijal@gmail.com'),
(25, 'Shivani', '2003-02-12', 'Female', '1223232323', 'bondel', 'shivani@gmail.com'),
(26, 'Supriya', '1992-11-11', 'Female', '1234567898', 'puttur', 'supriya@gmail.com'),
(27, 'anoop', '2003-04-23', 'Male', '9876543210', 'x', 'anoop@gmail.com'),
(28, 'Siju', '2000-12-19', 'Male', '123456789', 'mangalore', 'siju@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_details`
--
ALTER TABLE `case_details`
  ADD PRIMARY KEY (`fir_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_inv_id` (`inv_id`),
  ADD KEY `fk_c_id` (`c_id`);

--
-- Indexes for table `criminal_database`
--
ALTER TABLE `criminal_database`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `investigator`
--
ALTER TABLE `investigator`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_details`
--
ALTER TABLE `case_details`
  MODIFY `fir_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `criminal_database`
--
ALTER TABLE `criminal_database`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `investigator`
--
ALTER TABLE `investigator`
  MODIFY `inv_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_details`
--
ALTER TABLE `case_details`
  ADD CONSTRAINT `fk_c_id` FOREIGN KEY (`c_id`) REFERENCES `criminal_database` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inv_id` FOREIGN KEY (`inv_id`) REFERENCES `investigator` (`inv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
