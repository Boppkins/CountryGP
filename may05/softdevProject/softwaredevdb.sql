-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3377
-- Generation Time: May 04, 2025 at 12:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softwaredevdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `name`, `email`, `password`, `role`) VALUES
(36, 'Noah Brown', 'NBrown@gmail.com', '$2y$10$ypXWdtohxZM.MRb7edY47eUDWJ.rFbM9xRogyoOtWNbuHrboQ4t.2', 'staff'),
(37, 'Mary Smith', 'MSmith@gmail.com', '$2y$10$8uhRFM9mbF1xVtNFyZuFF.xcrKYit8vgDX6IIZySzr2lS.0aQfEwK', 'staff'),
(38, 'Joe James', 'JJames@gmail.com', '$2y$10$p8cWGnEryD.yZqREEkkfKeG2At8GF2Yd2S/y.4OruoSSdFgyRXfD6', 'staff'),
(39, 'Ben Smith', 'BSmith@gmail.com', '$2y$10$B9Vvp4pfAB4SJSWJkaydreWZcPZnIFZkC.qaTl2x7xs488TuiA12.', 'staff'),
(45, 'John Dill', 'JDill@gmail.com', '$2y$10$M10OGfK.IlkzgYGMCb4exOQI.xp0VmUMoKLwmnBjpTkrMPakZuYUu', 'patient'),
(54, 'Mark Hopkins', 'MHopkins@gmail.com', '$2y$10$REV465dsQuS2NioAY4lpbO8kHnA195dE4OuZbbyNimOqrpQajO86q', 'patient'),
(56, 'Mark Hopkins', 'MHopkins@gmail.com', '$2y$10$eumyf8r3OvnJteM0ArTsuOHPUttwoc2DoqV45OcujrHeuzMbMdmQ6', 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `employeeID` int(11) NOT NULL,
  `status` enum('Pending','Confirmed','Completed','Cancelled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(11) NOT NULL,
  `empJobTitle` varchar(45) NOT NULL,
  `employeeName` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `hireDate` text NOT NULL,
  `uni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `empJobTitle`, `employeeName`, `age`, `hireDate`, `uni`) VALUES
(1, 'General Practicioner', 'Noah Brown', 37, '22-09-2016', 'Northeast Specialist Training Programme for General Practice'),
(2, 'General Practicioner', 'Mary Smith', 33, '06-04-2017', 'University College Dublin'),
(3, 'General Practicioner', 'Joe James', 55, '07-08-2020', 'University College Dublin'),
(4, 'General Practicioner', 'Ben Smith', 44, '19-02-2022', 'University College Dublin');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `q` text NOT NULL,
  `a` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `q`, `a`) VALUES
(1, 'What are your opening hours?', 'We are open from Monday to Friday, 9:00 AM to 5:00 PM.'),
(2, 'How can I order a prescription refill?', 'You can order a prescription refill through our Order Prescriptions above'),
(3, 'How do I contact for support?', 'Go to our Help page above or email CountryGPSupport@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`id`, `name`, `description`) VALUES
(1, 'Antibiotics', 'Inhibiting germ growth'),
(2, 'Antiseptics', 'Prevention of germ growth near burns, cuts,and wounds');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `patientName` varchar(255) DEFAULT NULL,
  `dob` varchar(255) NOT NULL,
  `persc` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `emcon` varchar(255) NOT NULL,
  `accountID` int(11) DEFAULT NULL,
  `medication_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `patientName`, `dob`, `persc`, `address`, `emcon`, `accountID`, `medication_id`) VALUES
(24, 'Noah Brown', '1990-05-11', 'Antibiotics', '123 Home Street', 'Spouse - 555 5555 555', 36, 2),
(25, 'Mary Smith', '1977-11-14', 'Antiseptics', '555 Street Street', 'Family - 777 7777 777', 37, 2),
(26, 'Joe James', '1969-09-15', '', 'Apartment Street 44', 'Spouse - 888 8888 888', 38, 2),
(27, 'Ben Smith', '1991-02-22', '', 'Home Street ', 'Family - 999 9999 999', 39, 2),
(33, 'John Dill', '2000-05-23', '', '123 Street street', '555-5555-55', 45, 2),
(35, 'Mark Hopkins', '2005-01-26', 'Antiseptics', '18 House House', 'None', 54, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patientID` (`patientID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`),
  ADD KEY `fk_medication_id` (`medication_id`),
  ADD KEY `fk_account_id` (`accountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medications`
--
ALTER TABLE `medications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_accountID` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_account_id` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_medication_id` FOREIGN KEY (`medication_id`) REFERENCES `medications` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
