-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.18 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for payroll
CREATE DATABASE IF NOT EXISTS `payroll` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `payroll`;

-- Dumping structure for table payroll.bankinfo
CREATE TABLE IF NOT EXISTS `bankinfo` (
  `bankInfoId` int(11) NOT NULL AUTO_INCREMENT,
  `bankCode` varchar(50) DEFAULT NULL,
  `branchCode` varchar(50) DEFAULT NULL,
  `accoundHolder` varchar(50) DEFAULT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `initiatedDate` date DEFAULT NULL,
  PRIMARY KEY (`bankInfoId`),
  KEY `employeeid` (`employeeId`)
) ENGINE=MyISAM AUTO_INCREMENT=239 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.bankinfo: 9 rows
/*!40000 ALTER TABLE `bankinfo` DISABLE KEYS */;
INSERT INTO `bankinfo` (`bankInfoId`, `bankCode`, `branchCode`, `accoundHolder`, `employeeId`, `status`, `initiatedDate`) VALUES
	(1, '5', '2', 'jj', 2, 'A', '2022-08-08'),
	(2, '112', '1221', 'Yasanth', 5, 'A', '2022-02-02'),
	(11, '1230', '1250', 'hansiTW', 16, 'A', '2022-02-02'),
	(0, '2', '2', 'gihani', 20, 'A', '2022-02-02'),
	(8, '2', '2', 'gihani', 11, 'A', '2022-02-02'),
	(226, '1234', '1254', 'ABC', 256, 'A', '2022-03-04'),
	(227, '1234', '1254', 'ABC', 246, 'I', '2022-03-04'),
	(236, '1235', '1267', 'qwe', 255, 'R', '2022-01-01'),
	(238, '4568', '4568', 'qwet', 257, '', '2022-01-01');
/*!40000 ALTER TABLE `bankinfo` ENABLE KEYS */;

-- Dumping structure for table payroll.company
CREATE TABLE IF NOT EXISTS `company` (
  `companyId` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(50) DEFAULT NULL,
  `salaryDate` date DEFAULT NULL,
  `lastUpdateDate` date DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `BRI` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`companyId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.company: 5 rows
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`companyId`, `companyName`, `salaryDate`, `lastUpdateDate`, `userId`, `BRI`, `status`) VALUES
	(1, 'abc', '2022-08-09', '2022-07-10', 10, '123', 'a'),
	(4, 'Company1236', '2022-05-05', '2022-07-10', 13, '1235', 'A'),
	(5, 'COMPANY01', '2022-02-02', NULL, 62, '1234', 'Active'),
	(6, 'Abcd', '2022-09-08', NULL, 276, '123', 'Active'),
	(8, 'XYZ company', '2022-09-07', NULL, 279, '1234567', 'Active');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- Dumping structure for table payroll.company_wise_categories
CREATE TABLE IF NOT EXISTS `company_wise_categories` (
  `companyWiseCategoriesId` int(11) NOT NULL AUTO_INCREMENT,
  `salaryCategoryCode` varchar(50) DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`companyWiseCategoriesId`),
  KEY `company_id` (`companyId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.company_wise_categories: 5 rows
/*!40000 ALTER TABLE `company_wise_categories` DISABLE KEYS */;
INSERT INTO `company_wise_categories` (`companyWiseCategoriesId`, `salaryCategoryCode`, `companyId`, `status`) VALUES
	(1, 'epf', 8, 'null'),
	(2, 'etf', 8, 'null'),
	(3, 'FA', 8, 'E'),
	(4, 'OA', 8, NULL),
	(5, 'BS', 8, 'E');
/*!40000 ALTER TABLE `company_wise_categories` ENABLE KEYS */;

-- Dumping structure for table payroll.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `employeeId` int(11) NOT NULL AUTO_INCREMENT,
  `employeeName` varchar(50) DEFAULT NULL,
  `joinDate` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `nic` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `cantactNo` varchar(50) DEFAULT NULL,
  `jobTitle` varchar(50) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`employeeId`),
  KEY `company_id` (`companyId`)
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.employee: 11 rows
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`employeeId`, `employeeName`, `joinDate`, `address`, `nic`, `dob`, `cantactNo`, `jobTitle`, `userId`, `email`, `companyId`, `status`) VALUES
	(1, 'a', '2022-08-08', 'q', 's', '2022-08-08', 'd', 'd', 10, 'd', 1, 'd'),
	(2, 'hansi', '2021-03-03', 'ss', '995671425V', '2222-03-03', '011-012365', 'mr', 10, 'wijesekera@gmail.com', 1, 'I'),
	(5, 'Dilki', '2022-01-01', 'horana', '998954623V', '2022-03-03', '0112056985', 'Teacher', 10, 'hansi.kingdom360@gmail.com', 1, 'A'),
	(10, 'kalpa', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 10, 'hansi.kingdom360@gmail.com', 1, 'A'),
	(11, 'kalpa', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 10, 'hansi.kingdom360@gmail.com', 1, 'A'),
	(16, 'kalpa', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 10, 'kingdom360@gmail.com', 1, 'I'),
	(18, 'kalpa', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 10, 'kin360@gmail.com', 1, 'I'),
	(19, 'kalpa', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 10, '360@gmail.com', 2, 'I'),
	(20, 'kalpaViraj', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 1200, 'kin360@gmail.com', 1, 'A'),
	(255, 'chamil', '2022-05-02', 'Mathara', '991212345V', '1956-05-01', '118765428', 'Mr.', 275, 'Mr.', 1, 'R'),
	(257, 'Ashan', '2022-05-02', 'Malabe', '895567452V', '1956-05-01', '118895428', 'Mr.', 280, 'Mr.', 8, 'A');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table payroll.employee_vise_categories
CREATE TABLE IF NOT EXISTS `employee_vise_categories` (
  `companyWiseCategoriesId` int(11) DEFAULT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT '0',
  `InitiatedDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `expireDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.employee_vise_categories: 6 rows
/*!40000 ALTER TABLE `employee_vise_categories` DISABLE KEYS */;
INSERT INTO `employee_vise_categories` (`companyWiseCategoriesId`, `employeeId`, `amount`, `InitiatedDate`, `updateDate`, `expireDate`, `status`) VALUES
	(3, 1, 10000, '2022-09-02', NULL, NULL, 'A'),
	(3, 2, 10000, '2022-09-02', NULL, NULL, 'A'),
	(5, 1, 10000, '2022-09-02', NULL, NULL, 'A'),
	(5, 2, 10000, '2022-09-02', NULL, NULL, 'A'),
	(3, 20, 10000, '2022-09-09', NULL, '2022-09-17', 'E'),
	(5, 20, 20000, '2022-09-09', NULL, '2022-09-17', 'E');
/*!40000 ALTER TABLE `employee_vise_categories` ENABLE KEYS */;

-- Dumping structure for table payroll.errors
CREATE TABLE IF NOT EXISTS `errors` (
  `a` varchar(50) DEFAULT NULL,
  `b` varchar(50) DEFAULT NULL,
  `c` varchar(50) DEFAULT NULL,
  `d` varchar(50) DEFAULT NULL,
  `e` varchar(50) DEFAULT NULL,
  `f` varchar(50) DEFAULT NULL,
  `g` varchar(50) DEFAULT NULL,
  `h` varchar(50) DEFAULT NULL,
  `i` varchar(50) DEFAULT NULL,
  `j` varchar(50) DEFAULT NULL,
  `k` varchar(50) DEFAULT NULL,
  `l` varchar(50) DEFAULT NULL,
  `m` varchar(50) DEFAULT NULL,
  `n` varchar(50) DEFAULT NULL,
  `errors` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.errors: 0 rows
/*!40000 ALTER TABLE `errors` DISABLE KEYS */;
/*!40000 ALTER TABLE `errors` ENABLE KEYS */;

-- Dumping structure for table payroll.salary
CREATE TABLE IF NOT EXISTS `salary` (
  `salaryID` int(11) NOT NULL AUTO_INCREMENT,
  `salaryNo` int(11) DEFAULT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `payableAmount` decimal(10,0) DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `settledAmount` decimal(10,0) DEFAULT NULL,
  `paidDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`salaryID`),
  KEY `employeeid` (`employeeId`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.salary: 8 rows
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
INSERT INTO `salary` (`salaryID`, `salaryNo`, `employeeId`, `payableAmount`, `dueDate`, `settledAmount`, `paidDate`, `status`) VALUES
	(79, 1, 20, 23000, '2022-08-10', 23000, '2022-09-17', 'P'),
	(80, 1, 20, 23000, '2022-09-24', 5000, '2022-09-15', 'I'),
	(81, 1, 20, 23000, '2022-09-17', 10000, '2022-09-15', 'I'),
	(82, 10, 1, 23000, '2021-10-10', 0, '2022-09-14', 'I'),
	(83, 20, 1, 23000, '2021-01-01', 4000, '2022-09-15', 'I'),
	(84, 5, 2, 23000, '2023-07-31', 0, '0000-00-00', 'I'),
	(85, 1, 20, 23000, '2022-09-17', 344, '2022-09-17', 'I'),
	(86, 1, 20, 23000, '2022-10-10', 5000, '2022-09-15', 'I');
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;

-- Dumping structure for table payroll.salary_advance
CREATE TABLE IF NOT EXISTS `salary_advance` (
  `advanceId` int(11) NOT NULL AUTO_INCREMENT,
  `salaryNo` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `approvedDate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`advanceId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.salary_advance: 6 rows
/*!40000 ALTER TABLE `salary_advance` DISABLE KEYS */;
INSERT INTO `salary_advance` (`advanceId`, `salaryNo`, `employeeId`, `amount`, `date`, `approvedDate`, `status`) VALUES
	(1, 20, 1, 2000, '2022-09-02', NULL, 'P'),
	(2, 20, 1, 5000, '2022-09-02', NULL, 'I'),
	(3, 5, 6, 1500, '2022-09-02', NULL, 'I'),
	(4, 20, 2, 1500, '2022-09-02', NULL, 'R'),
	(5, 20, 1, 1000, '2022-09-02', NULL, 'I'),
	(6, 1, 20, 5000, '2022-09-15', '2022-09-15', 'P');
/*!40000 ALTER TABLE `salary_advance` ENABLE KEYS */;

-- Dumping structure for table payroll.salary_brakedown
CREATE TABLE IF NOT EXISTS `salary_brakedown` (
  `brakedownId` int(11) NOT NULL AUTO_INCREMENT,
  `salaryId` int(11) DEFAULT NULL,
  `companyWiseCategoriesID` int(11) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`brakedownId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.salary_brakedown: 2 rows
/*!40000 ALTER TABLE `salary_brakedown` DISABLE KEYS */;
INSERT INTO `salary_brakedown` (`brakedownId`, `salaryId`, `companyWiseCategoriesID`, `amount`, `status`) VALUES
	(1, 79, 1, 2000, 'A'),
	(2, 79, 2, 2000, NULL);
/*!40000 ALTER TABLE `salary_brakedown` ENABLE KEYS */;

-- Dumping structure for table payroll.salary_category
CREATE TABLE IF NOT EXISTS `salary_category` (
  `code` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `common` varchar(50) DEFAULT NULL,
  `commonValue` decimal(10,0) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.salary_category: 4 rows
/*!40000 ALTER TABLE `salary_category` DISABLE KEYS */;
INSERT INTO `salary_category` (`code`, `description`, `type`, `common`, `commonValue`, `status`) VALUES
	('etf', 'EFT SALARY', 'Company', 'Rate', 8, 'G'),
	('epf', 'EPF SALARY', 'Deduction', 'Rate', 10, 'G'),
	('FA', 'FIX ALLOWANCE', 'Addition', 'amount', NULL, 'A'),
	('BS', 'BASIC SALARY', 'Addition', 'amout', NULL, 'A');
/*!40000 ALTER TABLE `salary_category` ENABLE KEYS */;

-- Dumping structure for table payroll.salary_settlement
CREATE TABLE IF NOT EXISTS `salary_settlement` (
  `settlementId` int(11) NOT NULL,
  `salaryId` int(11) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `paidDate` date DEFAULT NULL,
  `paymentType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`settlementId`),
  KEY `salarysettlement` (`salaryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.salary_settlement: 1 rows
/*!40000 ALTER TABLE `salary_settlement` DISABLE KEYS */;
INSERT INTO `salary_settlement` (`settlementId`, `salaryId`, `amount`, `paidDate`, `paymentType`) VALUES
	(0, 79, 23000, '2022-09-17', 'System Payment');
/*!40000 ALTER TABLE `salary_settlement` ENABLE KEYS */;

-- Dumping structure for table payroll.salary_settlement_brakedown
CREATE TABLE IF NOT EXISTS `salary_settlement_brakedown` (
  `settlementBrakedownId` int(11) NOT NULL,
  `settlementId` int(11) DEFAULT NULL,
  `brakedownID` int(11) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`settlementBrakedownId`),
  KEY `stellementid` (`settlementId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.salary_settlement_brakedown: 0 rows
/*!40000 ALTER TABLE `salary_settlement_brakedown` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_settlement_brakedown` ENABLE KEYS */;

-- Dumping structure for table payroll.user
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `userType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=12001 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll.user: 20 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userID`, `userName`, `password`, `userType`) VALUES
	(1, 'hansi.kingdom360@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(2, 'hansi.kingdom360@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(3, 'hansi.kingdom360@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', '3'),
	(4, 'hansi.kingdom360@gmail.com', 'b24331b1a138cde62aa1f679164fc62f', '3'),
	(5, 'hansi.kingdom360@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(6, 'kingdom360@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(7, 'kin360@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(8, '360@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(9, '30@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(1200, 'k_viraj', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(11, 'Abc', '900150983cd24fb0d6963f7d28e17f72', '2'),
	(12, 'abcd', '900150983cd24fb0d6963f7d28e17f72', '2'),
	(10, 'TestComp', '900150983cd24fb0d6963f7d28e17f72', '2'),
	(276, 'yawfreitas', 'e86ccb972fb44b55ed2b4d9b4f9bce7a', '2'),
	(275, 'prasad', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(62, 'COMPANY01', '902fbdd2b1df0c4f70b4a5d23525e932', '2'),
	(20, 'Admin', '900150983cd24fb0d6963f7d28e17f72', '1'),
	(277, 'xyz', 'e86ccb972fb44b55ed2b4d9b4f9bce7a', '2'),
	(279, 'yawfreitas1234', '900150983cd24fb0d6963f7d28e17f72', '2'),
	(280, 'Asho', '421ddf95509c8844dfd0c2a0f3afa6ce', '3');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
