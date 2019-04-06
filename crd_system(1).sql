-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2019 at 06:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crd_system`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `countroutine` (INOUT `pri_id` INT(11), OUT `times` INT(11))  NO SQL
BEGIN
select pri_id, count(pri_id) AS times from cases 
GROUP BY pri_id having times > 1 INTO pri_id, times;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `percent` (IN `totalrows` INT(5), IN `searchedrows` INT(5), OUT `percentage` FLOAT(5) UNSIGNED)  NO SQL
BEGIN
SELECT (searchedrows / totalrows)*100 INTO percentage;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `case_id` int(10) NOT NULL,
  `pri_id` int(10) NOT NULL,
  `crt_id` int(10) NOT NULL,
  `hearing_date` date NOT NULL,
  `arrests` tinytext,
  `fir_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `crt_id` int(10) NOT NULL,
  `crt_name` tinytext NOT NULL,
  `crt_place` tinytext NOT NULL,
  `crt_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`crt_id`, `crt_name`, `crt_place`, `crt_type`) VALUES
(1, 'calcutta', 'kolkata', 'high court'),
(2, 'bangalore high court', 'bangaluru', 'HighCourt');

-- --------------------------------------------------------

--
-- Table structure for table `dailyreport`
--

CREATE TABLE `dailyreport` (
  `did` int(11) NOT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `dage` varchar(2) DEFAULT NULL,
  `dgender` varchar(10) DEFAULT NULL,
  `ddate` date DEFAULT NULL,
  `dreason` tinytext,
  `ddescription` tinytext,
  `daddress` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyreport`
--

INSERT INTO `dailyreport` (`did`, `dname`, `dage`, `dgender`, `ddate`, `dreason`, `ddescription`, `daddress`) VALUES
(2, 'sanjeet', '21', 'Male', '1997-03-11', 'lost personal belongings', 'asdfadsfa', 'asdfafdas'),
(3, 'apeksha', '21', 'Female', '1997-11-02', 'lost personal belongings', 'asdfadsf', 'asdfadfa');

-- --------------------------------------------------------

--
-- Table structure for table `fir`
--

CREATE TABLE `fir` (
  `fir_id` int(10) NOT NULL,
  `victim` tinytext NOT NULL,
  `fir_date` date NOT NULL,
  `fir_time` varchar(8) NOT NULL,
  `dscrptn` longtext NOT NULL,
  `region` tinytext,
  `area` tinytext,
  `suspect` tinytext,
  `station` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fir`
--

INSERT INTO `fir` (`fir_id`, `victim`, `fir_date`, `fir_time`, `dscrptn`, `region`, `area`, `suspect`, `station`) VALUES
(14, 'sanjeet', '2020-05-06', '07:32', 'aaaapeksha singh thakur\r\nbirthday (11/02)', 'Raipur', 'Raipur', 'apeksha', 'modhapara');

-- --------------------------------------------------------

--
-- Table structure for table `prisoner`
--

CREATE TABLE `prisoner` (
  `pri_id` int(10) NOT NULL,
  `name` tinytext NOT NULL,
  `address` tinytext NOT NULL,
  `age` int(2) NOT NULL,
  `gender` tinytext NOT NULL,
  `arrest_date` date NOT NULL,
  `arrest_time` varchar(8) NOT NULL,
  `crime` longtext NOT NULL,
  `description` longtext NOT NULL,
  `sttus` tinytext NOT NULL,
  `image` longblob NOT NULL,
  `agegrp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `prisoner`
--
DELIMITER $$
CREATE TRIGGER `priagegrp` BEFORE INSERT ON `prisoner` FOR EACH ROW BEGIN 
IF new.age >=18 THEN
SET new.agegrp = 'Adult';
else 
SET new.agegrp ='Minor';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatepritrigger` BEFORE UPDATE ON `prisoner` FOR EACH ROW BEGIN 
IF new.age >=18 THEN
SET new.agegrp = 'Adult';
else 
SET new.agegrp ='Minor';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `privilege` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `privilege`) VALUES
(1, 'test1', 'test@gmail.com', '$2y$10$RN/8zhcUi58fMEVCnWguuuIiwPRn2hqzRyxMX6.XV0Yx3SMXy5cVy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `victim`
--

CREATE TABLE `victim` (
  `vict_id` int(10) NOT NULL,
  `case_id` int(10) NOT NULL,
  `vict_name` tinytext NOT NULL,
  `vict_address` longtext NOT NULL,
  `vict_age` int(2) NOT NULL,
  `vict_gender` tinytext NOT NULL,
  `vict_image` longblob NOT NULL,
  `vict_statement` longtext NOT NULL,
  `agegrp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `victim`
--
DELIMITER $$
CREATE TRIGGER `agegrp` BEFORE INSERT ON `victim` FOR EACH ROW BEGIN 
IF new.vict_age >=18 THEN
SET new.agegrp = 'Adult';
else 
SET new.agegrp ='Minor';
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateagegrp` BEFORE UPDATE ON `victim` FOR EACH ROW BEGIN 
IF new.vict_age >=18 THEN
SET new.agegrp = 'Adult';
else 
SET new.agegrp ='Minor';
END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`case_id`),
  ADD KEY `pri_id` (`pri_id`),
  ADD KEY `fir_id` (`fir_id`),
  ADD KEY `crt_id` (`crt_id`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`crt_id`);

--
-- Indexes for table `dailyreport`
--
ALTER TABLE `dailyreport`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `fir`
--
ALTER TABLE `fir`
  ADD PRIMARY KEY (`fir_id`);

--
-- Indexes for table `prisoner`
--
ALTER TABLE `prisoner`
  ADD PRIMARY KEY (`pri_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- Indexes for table `victim`
--
ALTER TABLE `victim`
  ADD PRIMARY KEY (`vict_id`),
  ADD KEY `case_id` (`case_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `case_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `crt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dailyreport`
--
ALTER TABLE `dailyreport`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fir`
--
ALTER TABLE `fir`
  MODIFY `fir_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `prisoner`
--
ALTER TABLE `prisoner`
  MODIFY `pri_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `victim`
--
ALTER TABLE `victim`
  MODIFY `vict_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`pri_id`) REFERENCES `prisoner` (`pri_id`),
  ADD CONSTRAINT `cases_ibfk_2` FOREIGN KEY (`fir_id`) REFERENCES `fir` (`fir_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cases_ibfk_3` FOREIGN KEY (`crt_id`) REFERENCES `court` (`crt_id`);

--
-- Constraints for table `victim`
--
ALTER TABLE `victim`
  ADD CONSTRAINT `victim_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `cases` (`case_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
