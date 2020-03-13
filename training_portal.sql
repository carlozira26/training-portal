-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 01:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_information`
--

CREATE TABLE `agent_information` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `contactnumber` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `municipality` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `civilstatus` varchar(50) DEFAULT NULL,
  `educationallevel` varchar(255) DEFAULT NULL,
  `coursetaken` varchar(255) DEFAULT NULL,
  `fdexperience` enum('Yes','No') DEFAULT NULL,
  `ccexperience` enum('Yes','No') DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `batchnumber` varchar(50) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `site` varchar(50) DEFAULT NULL,
  `trainer` varchar(50) DEFAULT NULL,
  `ctstartdate` date DEFAULT NULL,
  `ctenddate` date DEFAULT NULL,
  `nhipstartdate` date DEFAULT NULL,
  `nhipenddate` date DEFAULT NULL,
  `pbdate` date DEFAULT NULL,
  `trainingstatus` varchar(50) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `aht` varchar(255) DEFAULT NULL,
  `qagrade` int(11) DEFAULT NULL,
  `totaltc` int(11) DEFAULT NULL,
  `avetc` int(11) DEFAULT NULL,
  `complaintcount` int(11) DEFAULT NULL,
  `complaintovertc` int(11) DEFAULT NULL,
  `absencescount` int(11) DEFAULT NULL,
  `tardinesscount` int(11) DEFAULT NULL,
  `reliability` varchar(255) DEFAULT NULL,
  `agentsite` varchar(50) DEFAULT NULL,
  `ngucc` varchar(50) DEFAULT NULL,
  `ironman` varchar(50) DEFAULT NULL,
  `xavier` varchar(50) DEFAULT NULL,
  `crm` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent_information`
--

INSERT INTO `agent_information` (`id`, `firstname`, `middlename`, `lastname`, `birthday`, `contactnumber`, `address`, `municipality`, `gender`, `civilstatus`, `educationallevel`, `coursetaken`, `fdexperience`, `ccexperience`, `reference`, `batchnumber`, `account`, `site`, `trainer`, `ctstartdate`, `ctenddate`, `nhipstartdate`, `nhipenddate`, `pbdate`, `trainingstatus`, `reason`, `aht`, `qagrade`, `totaltc`, `avetc`, `complaintcount`, `complaintovertc`, `absencescount`, `tardinesscount`, `reliability`, `agentsite`, `ngucc`, `ironman`, `xavier`, `crm`) VALUES
(1, 'Test', 'Test', 'Test', '0000-00-00', '+639000000000', 'test1', 'test', 'Male', 'Single', 'College Grad', 'null', '', '', 'Walk In', 'Batch 2', 'Jollibee', 'Ortigas', 'Arthur Mercado', '2020-01-01', '2020-01-01', '2020-01-01', '2020-01-01', '2020-01-01', 'PB Regular', 'AWOL', 'test', 90, 0, 0, 0, 0, 0, 0, 'test', 'admin', 'admin', 'admin', 'admin', 'admin'),
(2, 'Test', 'Test', 'Test', '0000-00-00', 'null', 'test', 'test', 'Male', 'Single', 'College Grad', 'null', 'Yes', 'Yes', 'Walk In', 'Batch 2', 'Jollibee', 'Ortigas', 'Arthur Mercado', '2020-01-01', '2020-01-01', '2020-01-01', '2020-01-01', '2020-01-01', 'PB Regular', 'Health Issue', 'test', 90, 0, 0, 0, 0, 0, 0, 'test', 'admin', 'admin', 'admin', 'admin', 'admin'),
(3, 'Test', 'Test', 'Test', '0000-00-00', 'null', 'test', 'test', 'Male', 'Single', 'College Grad', 'BSIT', 'Yes', 'Yes', 'Walk In', '0', 'Jollibee', 'Ortigas', 'Arthur Mercado', '2020-01-01', '2020-01-01', '2020-01-01', '2020-01-01', '2020-01-01', 'PB Regular', 'Domestic Problem', 'test', 90, 0, 0, 0, 0, 5, 0, 'test', 'admin', 'admin', 'admin', 'admin', 'admin'),
(4, 'test', 'test', 'test', '1995-05-22', '0911111111', 'test', 'test', 'Male', 'Single', 'College Grad', 'BSIT', 'Yes', 'Yes', 'Referral', '0', 'Jollibee', 'Ortigas', 'Bryan Robleza', '1995-05-22', '1995-05-22', '1995-05-22', '1995-05-22', '1995-05-22', 'PB Regular', 'Domestic Problem', '90', 90, 500, 500, 3, 3, 1, 1, '90', 'admin', 'admin', 'admin', 'admin', 'admin'),
(5, 'test', 'test', 'test', '1995-05-22', '0911111111', 'test', 'test', 'Male', 'Single', 'College Grad', 'BSIT', 'Yes', 'Yes', 'Referral', '0', 'Chowking', 'Ortigas', 'Bryan Robleza', '1995-05-22', '1995-05-22', '1995-05-22', '1995-05-22', '1995-05-22', 'PB Regular', 'Domestic Problem', '90', 90, 500, 500, 3, 3, 1, 1, '90', 'admin', 'admin', 'admin', 'admin', 'admin'),
(6, 'test', 'test', 'test', '1995-05-22', '0911111111', 'test', 'test', 'Male', 'Single', 'College Grad', 'BSIT', 'Yes', 'Yes', 'Referral', '0', 'Greenwich', 'Marilao', 'Bryan Robleza', '1995-05-22', '1995-05-22', '1995-05-22', '1995-05-22', '1995-05-22', 'PB Regular', 'Domestic Problem', '90', 90, 500, 500, 3, 3, 1, 1, '90', 'admin', 'admin', 'admin', 'admin', 'admin'),
(7, 'test', 'test', 'test', '1995-05-22', '0911111111', 'test', 'test', 'Male', 'Single', 'College Grad', 'BSIT', 'Yes', 'Yes', 'Referral', '0', 'Jollibee', 'Ortigas', 'Bryan Robleza', '1995-05-22', '1995-05-22', '1995-05-22', '1995-05-22', '1995-05-22', 'PB Regular', 'Domestic Problem', '90', 90, 500, 500, 3, 3, 1, 1, '90', 'admin', 'admin', 'admin', 'admin', 'admin'),
(8, 'John Christian', 'Santos', 'Obille', '1995-05-22', '+639055383442', 'M. Vasquez St.,', 'Mandaluyong', 'Male', 'Single', 'College Grad', 'BSIT', 'Yes', 'Yes', 'SGCC Site/FB', '0', 'Jollibee', 'Ortigas', 'Arthur Mercado', '2020-03-11', '2020-03-31', '2020-03-31', '2020-04-01', '2020-04-30', 'PB Regular', 'Health Issue', 'test', 90, 90, 90, 0, 0, 0, 0, 'test', 'admin', 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `lookup`
--

CREATE TABLE `lookup` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lookup`
--

INSERT INTO `lookup` (`id`, `type`, `name`, `is_active`) VALUES
(1, 'gender', 'Male', 'Y'),
(2, 'gender', 'Female', 'Y'),
(3, 'civilstatus', 'Single', 'Y'),
(4, 'civilstatus', 'Married', 'Y'),
(5, 'civilstatus', 'Widowed', 'Y'),
(6, 'educationallevel', 'HS Undergrad', 'Y'),
(7, 'educationallevel', 'HS Grad', 'Y'),
(8, 'educationallevel', 'Senior HS Undergrad', 'Y'),
(9, 'educationallevel', 'Senior HS Grad', 'Y'),
(10, 'educationallevel', 'College Undergrad', 'Y'),
(11, 'educationallevel', 'College Grad', 'Y'),
(12, 'educationallevel', 'Vocational Course', 'Y'),
(13, 'course', 'AB Psychology', 'Y'),
(14, 'course', 'BS Criminology', 'Y'),
(15, 'course', 'BS Food Science', 'Y'),
(16, 'course', 'BS Med Tech', 'Y'),
(17, 'course', 'BS Psychology', 'Y'),
(18, 'course', 'BSA', 'Y'),
(19, 'course', 'BSBA', 'Y'),
(20, 'course', 'BSBA-MK', 'Y'),
(21, 'course', 'BSBA-MM', 'Y'),
(22, 'course', 'BSCE', 'Y'),
(23, 'course', 'BSED', 'Y'),
(24, 'course', 'BSFM', 'Y'),
(25, 'course', 'BSHRM', 'Y'),
(26, 'course', 'BSIT', 'Y'),
(27, 'course', 'BSN', 'Y'),
(28, 'course', 'BSOA', 'Y'),
(29, 'course', 'BSTM', 'Y'),
(30, 'course', 'HRM', 'Y'),
(31, 'course', 'HRS', 'Y'),
(32, 'reference', 'Referral', 'Y'),
(33, 'reference', 'SGCC Site/FB', 'Y'),
(34, 'reference', 'Walk In', 'Y'),
(35, 'account', 'Jollibee', 'Y'),
(36, 'account', 'Chowking', 'Y'),
(37, 'account', 'Greenwich', 'Y'),
(38, 'account', 'Red Ribbon', 'Y'),
(39, 'account', 'Mang Inasal', 'Y'),
(40, 'account', 'Burger King', 'Y'),
(41, 'site', 'Ortigas', 'Y'),
(42, 'site', 'Marilao', 'Y'),
(43, 'site', 'Dapitan', 'Y'),
(44, 'trainer', 'Ariel Gayoso', 'Y'),
(45, 'trainer', 'Bryan Robleza', 'Y'),
(46, 'trainer', 'Ronaldo Rapirap', 'Y'),
(47, 'trainer', 'Arthur Mercado', 'Y'),
(48, 'trainingstatus', 'PB Seasonal', 'Y'),
(49, 'trainingstatus', 'PB Regular', 'Y'),
(50, 'trainingstatus', 'Discontinue', 'Y'),
(51, 'trainingstatus', 'Transferred To Other Dept', 'Y'),
(52, 'trainingstatus', 'Transferred To Other Account', 'Y'),
(53, 'attrition', 'N/A', 'Y'),
(54, 'attrition', 'AWOL', 'Y'),
(55, 'attrition', 'Dehired/Failed Performance', 'Y'),
(56, 'attrition', 'Terminated', 'Y'),
(57, 'attrition', 'Health Issue', 'Y'),
(58, 'attrition', 'Domestic Problem', 'Y'),
(59, 'batch', 'Batch 1', 'Y'),
(60, 'batch', 'Batch 2', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `token`, `is_active`) VALUES
(1, 'Administrator', 'admin', '2faccd6c650d29f1f817662029a8dc56', 'jkqwejsiquwbnmbzz', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_information`
--
ALTER TABLE `agent_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup`
--
ALTER TABLE `lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_information`
--
ALTER TABLE `agent_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lookup`
--
ALTER TABLE `lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
