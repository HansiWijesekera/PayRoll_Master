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

-- Dumping data for table payroll.bankinfo: ~3 rows (approximately)
/*!40000 ALTER TABLE `bankinfo` DISABLE KEYS */;
INSERT INTO `bankinfo` (`bankInfoId`, `bankCode`, `branchCode`, `accoundHolder`, `accountNo`, `employeeId`, `status`, `initiatedDate`) VALUES
	(1, '7432', '3421', 'Kalpa ayia', '23223233', 1, 'A', '2022-09-18'),
	(2, '7432', '4342', 'Toshan Beya', '43234234', 2, 'A', '2022-09-18'),
	(3, '7432', '4232', 'Addesha', '43224334', 3, 'A', '2022-09-18');
/*!40000 ALTER TABLE `bankinfo` ENABLE KEYS */;

-- Dumping data for table payroll.company: ~2 rows (approximately)
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`companyId`, `companyName`, `salaryDate`, `lastUpdateDate`, `userId`, `BRI`, `status`) VALUES
	(1, 'Openarc Systems', '2022-08-09', '2022-07-10', 2, '123', 'A'),
	(2, 'AMF', '2022-05-05', '2022-07-10', 5, '1235', 'A');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- Dumping data for table payroll.company_wise_categories: ~9 rows (approximately)
/*!40000 ALTER TABLE `company_wise_categories` DISABLE KEYS */;
INSERT INTO `company_wise_categories` (`companyWiseCategoriesId`, `salaryCategoryCode`, `companyId`, `status`) VALUES
	(1, 'BS', 1, 'A'),
	(2, 'ETF', 1, 'A'),
	(3, 'EPF', 1, 'A'),
	(4, 'FA', 1, 'A'),
	(5, 'OA', 1, 'A'),
	(6, 'BS', 2, 'A'),
	(7, 'ETF', 2, 'A'),
	(8, 'EPF', 2, 'A'),
	(9, 'FA', 2, 'A');
/*!40000 ALTER TABLE `company_wise_categories` ENABLE KEYS */;

-- Dumping data for table payroll.employee: ~3 rows (approximately)
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`employeeId`, `employeeName`, `joinDate`, `address`, `nic`, `dob`, `cantactNo`, `jobTitle`, `userId`, `email`, `companyId`, `status`) VALUES
	(1, 'Kalpa', NULL, 'Anogoda', '98332', NULL, NULL, 'Software Developer', 3, NULL, 1, 'A'),
	(2, 'Toshan', NULL, 'Anogoda', NULL, NULL, NULL, 'Software Developer', 4, NULL, 1, 'A'),
	(3, 'Adeesha', NULL, NULL, NULL, NULL, NULL, 'Assoicated Accountant', 6, NULL, 2, 'A');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping data for table payroll.employee_vise_categories: ~8 rows (approximately)
/*!40000 ALTER TABLE `employee_vise_categories` DISABLE KEYS */;
INSERT INTO `employee_vise_categories` (`companyWiseCategoriesId`, `employeeId`, `amount`, `InitiatedDate`, `updateDate`, `expireDate`, `status`) VALUES
	(1, 1, 12000, '2022-09-18', NULL, NULL, 'A'),
	(1, 2, 12000, '2022-09-18', NULL, NULL, 'A'),
	(4, 1, 15000, '2022-09-18', NULL, NULL, 'A'),
	(4, 2, 75000, '2022-09-18', NULL, NULL, 'A'),
	(5, 1, 3000, '2022-09-18', NULL, NULL, 'A'),
	(5, 2, 12000, '2022-09-18', NULL, NULL, 'A'),
	(6, 3, 45000, '2022-09-18', NULL, NULL, 'A'),
	(9, 3, 15000, '2022-09-18', NULL, NULL, 'A');
/*!40000 ALTER TABLE `employee_vise_categories` ENABLE KEYS */;

-- Dumping data for table payroll.errors: 0 rows
/*!40000 ALTER TABLE `errors` DISABLE KEYS */;
/*!40000 ALTER TABLE `errors` ENABLE KEYS */;

-- Dumping data for table payroll.salary: ~0 rows (approximately)
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;

-- Dumping data for table payroll.salary_advance: ~0 rows (approximately)
/*!40000 ALTER TABLE `salary_advance` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_advance` ENABLE KEYS */;

-- Dumping data for table payroll.salary_brakedown: ~0 rows (approximately)
/*!40000 ALTER TABLE `salary_brakedown` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_brakedown` ENABLE KEYS */;

-- Dumping data for table payroll.salary_category: ~5 rows (approximately)
/*!40000 ALTER TABLE `salary_category` DISABLE KEYS */;
INSERT INTO `salary_category` (`code`, `description`, `type`, `common`, `commonValue`, `status`) VALUES
	('BS', 'BASIC SALARY', 'Addition', 'Amount', NULL, 'E'),
	('EPF', 'EPF SALARY', 'Deduction', 'Rate', 10, 'G'),
	('ETF', 'EFT SALARY', 'Company', 'Rate', 8, 'G'),
	('FA', 'FIX ALLOWANCE', 'Addition', 'Amount', NULL, 'C'),
	('OA', 'Other Allowance', 'Addition', 'Amount', NULL, 'C');
/*!40000 ALTER TABLE `salary_category` ENABLE KEYS */;

-- Dumping data for table payroll.salary_settlement: ~0 rows (approximately)
/*!40000 ALTER TABLE `salary_settlement` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_settlement` ENABLE KEYS */;

-- Dumping data for table payroll.salary_settlement_brakedown: ~0 rows (approximately)
/*!40000 ALTER TABLE `salary_settlement_brakedown` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_settlement_brakedown` ENABLE KEYS */;

-- Dumping data for table payroll.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userID`, `userName`, `password`, `userType`) VALUES
	(1, 'Admin', '900150983cd24fb0d6963f7d28e17f72', '1'),
	(2, 'Daya', '900150983cd24fb0d6963f7d28e17f72', '2'),
	(3, 'Kalpa', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(4, 'Toshan', '900150983cd24fb0d6963f7d28e17f72', '3'),
	(5, 'Assosiated Motor Finance', '900150983cd24fb0d6963f7d28e17f72', '2'),
	(6, 'Adeesha', 'e86ccb972fb44b55ed2b4d9b4f9bce7a', '3');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
