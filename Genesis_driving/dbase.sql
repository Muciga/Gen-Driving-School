-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 11, 2018 at 08:05 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `ccat`
--

DROP TABLE IF EXISTS `ccat`;
CREATE TABLE IF NOT EXISTS `ccat` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `cat` char(1) NOT NULL,
  `lessons` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat` (`cat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ccat`
--

INSERT INTO `ccat` (`id`, `cat`, `lessons`) VALUES
(1, 'A', 10),
(2, 'B', 20),
(3, 'C', 20),
(4, 'D', 20),
(5, 'E', 20),
(6, 'G', 20);

-- --------------------------------------------------------

--
-- Table structure for table `ctype`
--

DROP TABLE IF EXISTS `ctype`;
CREATE TABLE IF NOT EXISTS `ctype` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `cat_id` int(1) NOT NULL,
  `type` varchar(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ctype`
--

INSERT INTO `ctype` (`id`, `cat_id`, `type`, `name`, `price`) VALUES
(1, 1, 'A1', 'mopad', 6000),
(2, 1, 'A2', 'light motorcycle', 7500),
(3, 1, 'A3', 'three wheel taxi', 9500),
(4, 2, 'B', 'light vehicle', 13500),
(5, 2, 'BA', 'light vehicle auto', 14000),
(6, 2, 'BP', 'light vehicle pro', 15000),
(7, 3, 'C1', 'light truck', 14500),
(8, 3, 'C2', 'medium truck', 14500),
(9, 4, 'D', 'van', 15000),
(10, 4, 'D1', 'minibus', 15000),
(11, 4, 'D2', 'large bus', 20000),
(12, 5, 'E', 'special pro dl', 30000),
(13, 6, 'G', 'industrial grade', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `log_time`) VALUES
(1, 1, '2018-09-10 18:54:18'),
(2, 1, '2018-09-10 20:51:40'),
(3, 1, '2018-09-11 08:04:59'),
(4, 1, '2018-09-11 10:00:06'),
(5, 5, '2018-09-11 10:03:04'),
(6, 5, '2018-09-11 10:04:00'),
(7, 1, '2018-09-11 10:04:13'),
(8, 1, '2018-09-11 10:10:18'),
(9, 1, '2018-09-11 10:44:39'),
(10, 1, '2018-09-11 10:52:20'),
(11, 1, '2018-09-11 14:52:33');

-- --------------------------------------------------------

--
-- Stand-in structure for view `logs`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
`id` int(5)
,`uname` varchar(10)
,`log_time` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `transact_id` int(5) NOT NULL,
  `paid_for` int(2) NOT NULL,
  `paid_by` int(5) NOT NULL,
  `paid_to` varchar(10) NOT NULL,
  `amount` int(5) NOT NULL,
  `paym_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transact_id` (`transact_id`),
  KEY `fk_payment_student` (`paid_by`),
  KEY `paid_for` (`paid_for`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `transact_id`, `paid_for`, `paid_by`, `paid_to`, `amount`, `paym_date`) VALUES
(1, 20328, 1, 1, 'bunduki', 14000, '2018-09-10 19:37:30'),
(2, 44556, 1, 3, 'bunduki', 14000, '2018-09-11 10:05:34'),
(3, 21242, 1, 1, 'bunduki', 12400, '2018-09-11 10:17:11'),
(5, 78657, 3, 2, 'bunduki', 14600, '2018-09-11 14:53:05'),
(6, 78656, 3, 2, 'bunduki', 14600, '2018-09-11 15:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `adm` varchar(12) NOT NULL,
  `natid` int(8) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `mname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `town` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `adm` (`adm`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `adm`, `natid`, `fname`, `mname`, `lname`, `gender`, `dob`, `email`, `phone`, `town`) VALUES
(1, 'A101', 35811986, 'Solomon', 'Kamau', 'Njoroge', 'M', '1997-06-24', 'skamau@genesis.co.ke', '254796144608', 'Maseno'),
(2, 'A102', 23094587, 'John', 'Kamau', 'Muiruri', 'M', '1981-09-03', 'johnkama@genesis.co.ke', '254739483920', 'Kiambu'),
(3, 'A103', 23093845, 'Eunice', 'Auma', 'Okoth', 'F', '1993-09-21', 'eunikoth@genesis.co.ke', '254704958734', 'Siaya'),
(4, 'A201', 19853245, 'Rashid', 'Kiplagat', 'Kiplagat', 'M', '1998-10-11', 'kiplarash@genesis.co.ke', '254784940394', 'Nairobi'),
(5, 'A202', 23394844, 'Okoth', 'Nelson', 'Okoth', 'M', '1987-01-20', 'okonel@genesis.co.ke', '254739403948', 'Eldoret'),
(6, 'D101', 20348374, 'Susan', '', 'Kigumo', 'F', '1995-04-12', 'skigumo@genesis.co.ke', '25494857685', 'Mandera'),
(7, 'G01', 30495849, 'Hosea', '', 'Wairimu', 'M', '1990-05-08', 'hoseaw@genesis.co.ke', '254729032334', 'Kaplong'),
(8, 'E01', 34934325, 'Kiplagat', 'Rashid', 'Kiplagat', 'M', '1995-08-29', 'rashkipla@genesis.co.ke', '254701929384', 'Maseno'),
(9, 'A104', 23940438, 'Solomon', 'Njoroge', 'Kamau', 'M', '1980-09-03', 'snjo@genesis.co.ke', '254702039494', 'Kiambu'),
(10, 'A105', 10029332, 'Solomon', 'Njoroge', 'Kimani', 'M', '1997-12-06', 'skimani@genesis.co.ke', '254734576554', 'Maseno');

-- --------------------------------------------------------

--
-- Stand-in structure for view `transactions`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
`id` int(5)
,`fname` varchar(10)
,`mname` varchar(10)
,`lname` varchar(10)
,`transact_id` int(5)
,`paid_to` varchar(10)
,`amount` int(5)
,`paym_date` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(12) NOT NULL,
  `nat_id` int(8) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `mname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `town` varchar(30) NOT NULL,
  `job` varchar(30) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uname` (`uname`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `nat_id`, `fname`, `mname`, `lname`, `gender`, `dob`, `email`, `phone`, `town`, `job`, `uname`, `pass`, `admin`) VALUES
(1, 'EM101', 10029339, 'John', 'Kane', 'Bunduki', 'M', '1997-12-06', 'johnkane@genesis.co.ke', '254700029334', 'MASENO', 'ADMIN', 'bunduki', '4a7d1ed414474e4033ac29ccb8653d9b', 1),
(3, 'EM103', 10029337, 'Johnieez', 'Khanit', 'Bones', 'M', '1997-09-10', 'khanit@genesis.co.ke', '254705934530', 'SEME', 'REGISTRAR', 'khanit', '4a7d1ed414474e4033ac29ccb8653d9b', 0),
(4, 'EM104', 10029336, 'Busy', 'Body', 'Nina', 'F', '1995-02-02', 'bodna@genesis.co.ke', '254796086899', 'MASENO', 'RECEPTIONIST', 'nina', '4a7d1ed414474e4033ac29ccb8653d9b', 0),
(5, 'EM105', 10029335, 'Bill', 'Duncan', 'Msanii', 'M', '1998-02-22', 'msanii@genesis.co.ke', '254739343424', 'MASENO', 'REGISTRAR', 'msanii', '4a7d1ed414474e4033ac29ccb8653d9b', 0);

-- --------------------------------------------------------

--
-- Structure for view `logs`
--
DROP TABLE IF EXISTS `logs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `logs`  AS  select `log`.`id` AS `id`,`users`.`uname` AS `uname`,`log`.`log_time` AS `log_time` from (`log` join `users` on((`log`.`user_id` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `transactions`
--
DROP TABLE IF EXISTS `transactions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transactions`  AS  select `payment`.`id` AS `id`,`student`.`fname` AS `fname`,`student`.`mname` AS `mname`,`student`.`lname` AS `lname`,`payment`.`transact_id` AS `transact_id`,`payment`.`paid_to` AS `paid_to`,`payment`.`amount` AS `amount`,`payment`.`paym_date` AS `paym_date` from (`payment` join `student` on((`payment`.`paid_by` = `student`.`id`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctype`
--
ALTER TABLE `ctype`
  ADD CONSTRAINT `fk_type_cat` FOREIGN KEY (`cat_id`) REFERENCES `ccat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_ctype` FOREIGN KEY (`paid_for`) REFERENCES `ccat` (`id`),
  ADD CONSTRAINT `fk_payment_student` FOREIGN KEY (`paid_by`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
