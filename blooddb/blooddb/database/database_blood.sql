-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 03:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'diyona ', 'abcd'),
(2, 'akhil', 'akhil');

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `Total_units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `blood_group`, `Total_units`) VALUES
(1, 'B+', 0),
(2, 'B-', 0),
(3, 'A+', 3),
(4, 'O+', 8),
(5, 'O-', 0),
(6, 'A-', 0),
(7, 'AB+', 4),
(8, 'AB-', 2);

-- --------------------------------------------------------

--
-- Table structure for table `date_of_examination`
--

CREATE TABLE `date_of_examination` (
  `date_id` int(11) NOT NULL,
  `donor_name` int(11) NOT NULL,
  `doc_name` int(11) NOT NULL,
  `dateexamined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `date_of_examination`
--

INSERT INTO `date_of_examination` (`date_id`, `donor_name`, `doc_name`, `dateexamined`) VALUES
(6, 1, 3, '2021-03-09'),
(7, 1, 5, '2021-03-09'),
(8, 1, 5, '2021-03-11'),
(9, 1, 4, '2022-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(20) NOT NULL,
  `doctor_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `doctor_phone`) VALUES
(3, 'Dr Vishwa', '9876543243'),
(4, 'Dr Radha', '9876787770'),
(5, 'Dr Ramchand', '9845623000'),
(8, 'Dr Ram', '8762244245');

-- --------------------------------------------------------

--
-- Table structure for table `donor_details`
--

CREATE TABLE `donor_details` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(20) NOT NULL,
  `donor_number` varchar(10) NOT NULL,
  `donor_mail` varchar(20) NOT NULL,
  `donor_DOB` date NOT NULL,
  `donor_gender` varchar(20) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `donor_weight` int(11) NOT NULL,
  `donor_doctor` varchar(20) NOT NULL,
  `donor_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_details`
--

INSERT INTO `donor_details` (`donor_id`, `donor_name`, `donor_number`, `donor_mail`, `donor_DOB`, `donor_gender`, `blood_group`, `donor_weight`, `donor_doctor`, `donor_date`) VALUES
(1, 'Gowthami', '987898789', 'gowth@gmail.com', '2022-01-14', 'Female', 'AB+', 45, ' 4', '2022-01-25'),
(3, 'Akhil', '989898', 'dfsd@gmail.com', '2022-01-06', 'Female', 'A+', 67, ' 5', '2022-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `PName` varchar(20) NOT NULL,
  `PPhone` varchar(10) NOT NULL,
  `PGender` varchar(20) NOT NULL,
  `PBlood_group` varchar(20) NOT NULL,
  `P_units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `PName`, `PPhone`, `PGender`, `PBlood_group`, `P_units`) VALUES
(1, 'Akhil', '9675675678', 'Female', 'O+', 3),
(3, 'Gowthami', '9876543212', 'Female', ' B+', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `date_of_examination`
--
ALTER TABLE `date_of_examination`
  ADD PRIMARY KEY (`date_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `donor_details`
--
ALTER TABLE `donor_details`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `date_of_examination`
--
ALTER TABLE `date_of_examination`
  MODIFY `date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donor_details`
--
ALTER TABLE `donor_details`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
