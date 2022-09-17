-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table payroll.bankinfo: 9 rows
DELETE FROM `bankinfo`;
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
	(238, '4568', '4568', 'qwet', 257, 'A', '2022-01-01');
/*!40000 ALTER TABLE `bankinfo` ENABLE KEYS */;

-- Dumping data for table payroll.company: ~6 rows (approximately)
DELETE FROM `company`;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`companyId`, `companyName`, `salaryDate`, `lastUpdateDate`, `userId`, `BRI`, `status`) VALUES
	(1, 'abc', '2022-08-09', '2022-07-10', 10, '123', 'A');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- Dumping data for table payroll.company_wise_categories: ~4 rows (approximately)
DELETE FROM `company_wise_categories`;
/*!40000 ALTER TABLE `company_wise_categories` DISABLE KEYS */;
INSERT INTO `company_wise_categories` (`companyWiseCategoriesId`, `salaryCategoryCode`, `companyId`, `status`) VALUES
	(1, 'BS', 1, 'A'),
	(2, 'ETF', 1, 'A'),
	(3, 'EPF', 1, 'A'),
	(4, 'FA', 1, 'A'),
	(5, 'OA', 1, 'A');
/*!40000 ALTER TABLE `company_wise_categories` ENABLE KEYS */;

-- Dumping data for table payroll.employee: 11 rows
DELETE FROM `employee`;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`employeeId`, `employeeName`, `joinDate`, `address`, `nic`, `dob`, `cantactNo`, `jobTitle`, `userId`, `email`, `companyId`, `status`) VALUES
	(1, 'a', '2022-08-08', 'q', 's', '2022-08-08', 'd', 'd', 10, 'd', 1, ''),
	(2, 'hansi', '2021-03-03', 'ss', '995671425V', '2222-03-03', '011-012365', 'mr', 10, 'wijesekera@gmail.com', 1, 'I'),
	(5, 'Dilki', '2022-01-01', 'horana', '998954623V', '2022-03-03', '0112056985', 'Teacher', 10, 'hansi.kingdom360@gmail.com', 1, 'A'),
	(10, 'kalpa', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 10, 'hansi.kingdom360@gmail.com', 1, 'A'),
	(11, 'kalpa', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 10, 'hansi.kingdom360@gmail.com', 1, 'A'),
	(16, 'kalpa', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 10, 'kingdom360@gmail.com', 1, 'I'),
	(18, 'kalpa', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 10, 'kin360@gmail.com', 1, 'I'),
	(19, 'kalpa', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 10, '360@gmail.com', 2, 'I'),
	(20, 'kalpaViraj', '2022-02-02', 'nugegoda', '669568754V', '2000-08-09', '2233333333', 'ss', 1200, 'kin360@gmail.com', 1, 'A'),
	(255, 'chamil', '2022-05-02', 'Mathara', '991212345V', '1956-05-01', '118765428', 'Mr.', 275, 'kin360@gmail.com', 1, 'R'),
	(257, 'Ashan', '2022-05-02', 'Malabe', '895567452V', '1956-05-01', '118895428', 'Mr.', 280, 'kin360@gmail.com', 8, 'A');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping data for table payroll.employee_vise_categories: ~0 rows (approximately)
DELETE FROM `employee_vise_categories`;
/*!40000 ALTER TABLE `employee_vise_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_vise_categories` ENABLE KEYS */;

-- Dumping data for table payroll.errors: 0 rows
DELETE FROM `errors`;
/*!40000 ALTER TABLE `errors` DISABLE KEYS */;
/*!40000 ALTER TABLE `errors` ENABLE KEYS */;

-- Dumping data for table payroll.salary: 8 rows
DELETE FROM `salary`;
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

-- Dumping data for table payroll.salary_advance: 6 rows
DELETE FROM `salary_advance`;
/*!40000 ALTER TABLE `salary_advance` DISABLE KEYS */;
INSERT INTO `salary_advance` (`advanceId`, `salaryNo`, `employeeId`, `amount`, `date`, `approvedDate`, `status`) VALUES
	(1, 20, 1, 2000, '2022-09-02', NULL, 'P'),
	(2, 20, 1, 5000, '2022-09-02', NULL, 'I'),
	(3, 5, 6, 1500, '2022-09-02', NULL, 'I'),
	(4, 20, 2, 1500, '2022-09-02', NULL, 'R'),
	(5, 20, 1, 1000, '2022-09-02', NULL, 'I'),
	(6, 1, 20, 5000, '2022-09-15', '2022-09-15', 'P');
/*!40000 ALTER TABLE `salary_advance` ENABLE KEYS */;

-- Dumping data for table payroll.salary_brakedown: 2 rows
DELETE FROM `salary_brakedown`;
/*!40000 ALTER TABLE `salary_brakedown` DISABLE KEYS */;
INSERT INTO `salary_brakedown` (`brakedownId`, `salaryId`, `companyWiseCategoriesID`, `amount`, `status`) VALUES
	(1, 79, 1, 2000, 'A'),
	(2, 79, 2, 2000, NULL);
/*!40000 ALTER TABLE `salary_brakedown` ENABLE KEYS */;

-- Dumping data for table payroll.salary_category: 5 rows
DELETE FROM `salary_category`;
/*!40000 ALTER TABLE `salary_category` DISABLE KEYS */;
INSERT INTO `salary_category` (`code`, `description`, `type`, `common`, `commonValue`, `status`) VALUES
	('ETF', 'EFT SALARY', 'Company', 'Rate', 8, 'G'),
	('EPF', 'EPF SALARY', 'Deduction', 'Rate', 10, 'G'),
	('FA', 'FIX ALLOWANCE', 'Addition', 'Amount', NULL, 'C'),
	('BS', 'BASIC SALARY', 'Addition', 'Amount', NULL, 'E'),
	('OA', 'Other Allowance', 'Addition', 'Amount', NULL, 'C');
/*!40000 ALTER TABLE `salary_category` ENABLE KEYS */;

-- Dumping data for table payroll.salary_settlement: 1 rows
DELETE FROM `salary_settlement`;
/*!40000 ALTER TABLE `salary_settlement` DISABLE KEYS */;
INSERT INTO `salary_settlement` (`settlementId`, `salaryId`, `amount`, `paidDate`, `paymentType`) VALUES
	(0, 79, 23000, '2022-09-17', 'System Payment');
/*!40000 ALTER TABLE `salary_settlement` ENABLE KEYS */;

-- Dumping data for table payroll.salary_settlement_brakedown: 0 rows
DELETE FROM `salary_settlement_brakedown`;
/*!40000 ALTER TABLE `salary_settlement_brakedown` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_settlement_brakedown` ENABLE KEYS */;

-- Dumping data for table payroll.user: 21 rows
DELETE FROM `user`;
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
	(280, 'Asho', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(12001, 'Admin12345', '900150983cd24fb0d6963f7d28e17f72', '2');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
