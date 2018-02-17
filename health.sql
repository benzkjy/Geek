-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2018 at 06:41 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Hospital_ID` int(11) NOT NULL,
  `Hospital_Name` varchar(200) NOT NULL,
  `Hospital_Address` text NOT NULL,
  `Hospital_Phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`Hospital_ID`, `Hospital_Name`, `Hospital_Address`, `Hospital_Phone`) VALUES
(1, 'Thammasat University Hospital', 'Thammasat University Rangsit Campus, No. 95, Village 8, Khlong Nueng Subdistrict, Khlong Luang, Pathum Thani, Thailand', '029269999'),
(2, 'Siriraj Hospital', 'Faculty of Medicine Siriraj Hospital, Mahidol University\r\nInternational Relations Division Jainadnarendhranusorn Bld. (Bld. No. 59), 3rd Floor, Room No. 323,2 Wanglang Road Bangkoknoi, Bangkok 10700, Thailand', '024199465');

-- --------------------------------------------------------

--
-- Table structure for table `labinfo`
--

CREATE TABLE `labinfo` (
  `Labinfo_ID` int(11) NOT NULL,
  `Typeinfo` varchar(50) NOT NULL,
  `Labinfo_Result` text NOT NULL,
  `Hospital_ID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Patient_ID` int(11) NOT NULL,
  `Patient_Fname` varchar(50) NOT NULL,
  `Patient_Lname` varchar(50) NOT NULL,
  `Patient_Gender` varchar(10) NOT NULL,
  `Patient_Birth` date NOT NULL,
  `Patient_Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Patient_ID`, `Patient_Fname`, `Patient_Lname`, `Patient_Gender`, `Patient_Birth`, `Patient_Address`) VALUES
(1, 'Pasin', 'Jiratthiticheep', 'Male', '2018-02-07', 'SIIT,TU'),
(2, 'Nuttapol', 'Saiboonruen', 'Male', '2018-02-13', 'SIIT,TU');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `Rec_ID` int(11) NOT NULL,
  `Patient_ID` int(11) NOT NULL,
  `Rec_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Weight` int(100) NOT NULL,
  `Height` int(100) NOT NULL,
  `Desc` text NOT NULL,
  `Prescription` text,
  `Doctor_ID` int(11) NOT NULL,
  `Rec_Name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`Rec_ID`, `Patient_ID`, `Rec_Date`, `Weight`, `Height`, `Desc`, `Prescription`, `Doctor_ID`, `Rec_Name`) VALUES
(1, 1, '2018-02-17 23:21:33', 65, 160, 'DEAD ALREADY', '', 1, 'Heart Disease');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Doctor_ID` int(11) NOT NULL,
  `Hospital_ID` int(11) NOT NULL,
  `Doctor_Fname` varchar(50) NOT NULL,
  `Doctor_Lname` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Doctor_ID`, `Hospital_ID`, `Doctor_Fname`, `Doctor_Lname`, `Username`, `Password`) VALUES
(1, 2, 'Sirichai', 'Khomleart', 'sirichai', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`Hospital_ID`);

--
-- Indexes for table `labinfo`
--
ALTER TABLE `labinfo`
  ADD PRIMARY KEY (`Labinfo_ID`),
  ADD KEY `Hospital_ID` (`Hospital_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Patient_ID`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`Rec_ID`),
  ADD KEY `Patient_ID` (`Patient_ID`),
  ADD KEY `Doctor_ID` (`Doctor_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Doctor_ID`),
  ADD KEY `Hospital_ID` (`Hospital_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `Hospital_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labinfo`
--
ALTER TABLE `labinfo`
  MODIFY `Labinfo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Patient_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `Rec_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Doctor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `labinfo`
--
ALTER TABLE `labinfo`
  ADD CONSTRAINT `labinfo_ibfk_1` FOREIGN KEY (`Hospital_ID`) REFERENCES `hospital` (`Hospital_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`Patient_ID`) REFERENCES `patient` (`Patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`Doctor_ID`) REFERENCES `user` (`Doctor_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Hospital_ID`) REFERENCES `hospital` (`Hospital_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
