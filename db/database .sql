-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
-- user: Isaac zack Tsienyane
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2014 at 02:06 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `middlename`, `address`, `email`, `contact_no`, `age`, `gender`, `username`, `password`) VALUES
(11, 'tshiamo', 'molefe', '', 'kempton park', 'ts@gmail.com', '0723659874', 26, 'Male', 'tshiamo', 'tshiamo'),
(12, 'Isaac', 'Tsienyane', 'Zack', 'methewson str', 'zack@gmail.com', '0843434869', 22, 'Male', 'zack', 'zack'),
(13, 'Tshegofatso', 'Mogale', '', 'methewson str', 'tshego@yahoo.com', '071 2323 564', 19, 'Female', 'tshego', 'tshego');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`note_id`, `date`, `message`) VALUES
(6, '', 'Doctor Makoti will be  out on October 3 2014');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `service_id` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `member_id`, `date`, `service_id`, `Number`, `status`) VALUES
(82, 11, '09/09/2014', 5, 1, 'Pending'),
(83, 12, '05/09/2014', 3, 1, 'Pending'),
(84, 12, '08/09/2014', 27, 1, 'Pending'),
(85, 12, '08/09/2014', 27, 1, 'Pending'),
(86, 12, '09/09/2014', 26, 1, 'Pending'),
(87, 13, '05/09/2014', 13, 1, 'Pending'),
(88, 13, '10/09/2014', 7, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_offer` varchar(100) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_offer`, `price`) VALUES
(3, 'Consultation', '200.00'),
(5, 'Subcutaneous Injection', '155.00'),
(6, 'Pre-anaesthetic assessment of patient / other consultative service.', '380.00'),
(7, 'For elective after-hours services on request of the patient or family', '230.00'),
(8, 'First consultation/visit of long duration and/or high complexity.', '250.00'),
(9, 'Inhalation sedation: Use of analgesic nitrous oxide for alcohol and other withdrawal states:', '290.00'),
(10, 'Inhalation sedation:', '110.00'),
(11, 'Completion of chronic medication forms with or without the physical presence of the patient requeste', '375.00'),
(12, 'Collection of blood specimen(s) by medical practitioner for pathology examination,', '63.00'),
(13, 'Allergy: Skin-prick tests: Immediate hypersensitivity testing (Type I reaction): Per antigen: Inhala', '33.00'),
(14, 'Allergy: Patch tests: Each additional patch', '24.00'),
(15, 'Allergy: Patch tests: First patch', '43.00'),
(16, 'Drainage of subcutaneous abscess onychia, paronychia, pulp space or avulsion of nail', '233.00'),
(17, 'Drainage of major hand/foot infection', '522.00'),
(18, 'Joint: Dislocation', '556.00'),
(19, 'Tendon synovectomy', '1769.00'),
(20, 'Elbow: Excision head of radius', '1222.00'),
(21, 'Elbow: Excision', '1256.00'),
(22, 'Elbow: Partial replacement', '1722.00'),
(23, 'Elbow: Total replacement', '2256.00'),
(24, 'Wrist: Excision distal end of ulna', '1142.00'),
(25, 'Wrist: Excision single bone', '1326.00'),
(26, 'Wrist: Excision proximal row', '2589.00'),
(27, 'Cardiac examination plus Doppler colour mapping', '552.00'),
(28, 'Cardiac examination (MMode)', '545.00'),
(29, 'Cardiac examination: 2 Dimensional', '519.00'),
(30, 'Cardiac examination + effort', '489.00'),
(31, 'Cardiac examinations + contrast', '323.00'),
(32, 'Cardiac examination + phonocardiography', '328.00'),
(33, 'Neonatal head scan', '628.00'),
(34, 'Fungus identification', '78.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(5, 'admin', 'admin'),
(9, 'isaac', 'isaac');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
