-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 03:29 PM
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
-- Database: `flightbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'Skyline Admin', 'admin', 'Skylineairways@gmail.com', '2024-03-19 22:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `Id` int(50) NOT NULL,
  `Departure` varchar(255) DEFAULT NULL,
  `Arrival` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`Id`, `Departure`, `Arrival`) VALUES
(232, 'Manila - MNL - Ninoy Aquino International Airport.', 'Manila - MNL - Ninoy Aquino International Airport.'),
(233, 'Cebu- CEB - Mactan Cebu International Airport.', 'Cebu- CEB - Mactan Cebu International Airport.'),
(234, 'Davao - DVO - Francisco Bangoy International Airport.', 'Davao - DVO - Francisco Bangoy International Airport.'),
(235, 'Tacloban -TAC - Daniel Z Romualdez Airport.', 'Tacloban -TAC - Daniel Z Romualdez Airport.'),
(236, 'Iloilo - ILO - Iloilo International Airport.', 'Iloilo - ILO - Iloilo International Airport.'),
(237, 'Boracay - MPH - Boracay Airport.', 'Boracay - MPH - Boracay Airport.'),
(238, 'Bacolod - BCD - Bacolod Silay International Airport.', 'Bacolod - BCD - Bacolod Silay International Airport.'),
(239, 'Cagayan de Oro- CGY - Laguindingan Airport.', 'Cagayan de Oro- CGY - Laguindingan Airport.'),
(240, 'Tagbilaran - TAG - Bohol Panglao International Airport.', 'Tagbilaran - TAG - Bohol Panglao International Airport.'),
(241, 'Puerto Princesa City- PPS - Puerto Princesa International Airport.', 'Puerto Princesa City- PPS - Puerto Princesa International Airport.'),
(242, 'Angeles - CRK - Clark International Airport.', 'Angeles - CRK - Clark International Airport.'),
(243, 'Kalibo - KLO - Kalibo International Airport.', 'Kalibo - KLO - Kalibo International Airport.');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `flight_id`, `departure_date`, `arrival_date`, `total_price`) VALUES
(1, NULL, NULL, NULL, 3617.00),
(2, NULL, NULL, NULL, 3617.00),
(3, NULL, NULL, NULL, 3617.00),
(4, NULL, NULL, NULL, 3617.00),
(5, NULL, NULL, NULL, 4643.00),
(6, NULL, NULL, NULL, 2985.00);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `flight_number` varchar(20) NOT NULL,
  `departure_location` varchar(100) NOT NULL,
  `arrival_location` varchar(100) NOT NULL,
  `Departure-Time` time NOT NULL,
  `Arrival-Time` time NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `flight_number`, `departure_location`, `arrival_location`, `Departure-Time`, `Arrival-Time`, `price`) VALUES
(1, 'FN001', 'Manila - Ninoy Aquino International Airport (MNL)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '07:12:00', 1500.00),
(2, 'FN002', 'Manila - Ninoy Aquino International Airport (MNL)', 'Davao - Francisco Bangoy International Airport (DVO)', '06:00:00', '07:45:00', 2985.00),
(3, 'FN003', 'Manila - Ninoy Aquino International Airport (MNL)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '07:13:00', 4643.00),
(4, 'FN004', 'Manila - Ninoy Aquino International Airport (MNL)', 'Iloilo - Iloilo International Airport (ILO)', '06:00:00', '07:05:00', 3036.00),
(5, 'FN005', 'Manila - Ninoy Aquino International Airport (MNL)', 'Boracay - Boracay Airport (MPH)', '06:00:00', '07:10:00', 3667.00),
(6, 'FN006', 'Manila - Ninoy Aquino International Airport (MNL)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '07:15:00', 2764.00),
(7, 'FN007', 'Manila - Ninoy Aquino International Airport (MNL)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '07:35:00', 2834.00),
(8, 'FN008', 'Manila - Ninoy Aquino International Airport (MNL)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '06:00:00', '07:25:00', 5862.00),
(9, 'FN009', 'Manila - Ninoy Aquino International Airport (MNL)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '07:30:00', 5583.00),
(11, 'FN011', 'Manila - Ninoy Aquino International Airport (MNL)', 'Kalibo - Kalibo International Airport (KLO)', '06:00:00', '07:15:00', 3195.00),
(12, 'FN0012', 'Manila - Ninoy Aquino International Airport (MNL)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:00', '11:12:00', 1500.00),
(13, 'FN0013', 'Manila - Ninoy Aquino International Airport (MNL)', 'Davao - Francisco Bangoy International Airport (DVO)', '10:00:00', '11:45:00', 2985.00),
(14, 'FN0014', 'Manila - Ninoy Aquino International Airport (MNL)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '11:13:00', 4643.00),
(15, 'FN0015', 'Manila - Ninoy Aquino International Airport (MNL)', 'Iloilo - Iloilo International Airport (ILO)', '10:00:00', '11:05:00', 3036.00),
(16, 'FN0016', 'Manila - Ninoy Aquino International Airport (MNL)', 'Boracay - Boracay Airport (MPH)', '10:00:00', '11:10:00', 3667.00),
(17, 'FN0017', 'Manila - Ninoy Aquino International Airport (MNL)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '11:15:00', 2764.00),
(18, 'FN0018', 'Manila - Ninoy Aquino International Airport (MNL)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '11:35:00', 2834.00),
(19, 'FN0019', 'Manila - Ninoy Aquino International Airport (MNL)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '10:00:00', '11:25:00', 5862.00),
(20, 'FN020', 'Manila - Ninoy Aquino International Airport (MNL)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '11:30:00', 5583.00),
(22, 'FN022', 'Manila - Ninoy Aquino International Airport (MNL)', 'Kalibo - Kalibo International Airport (KLO)', '10:00:00', '11:15:00', 3195.00),
(23, 'FN023', 'Manila - Ninoy Aquino International Airport (MNL)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '14:12:00', 1500.00),
(24, 'FN024', 'Manila - Ninoy Aquino International Airport (MNL)', 'Davao - Francisco Bangoy International Airport (DVO)', '13:00:00', '14:45:00', 2985.00),
(25, 'FN0025', 'Manila - Ninoy Aquino International Airport (MNL)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '14:13:00', 4643.00),
(26, 'FN0026', 'Manila - Ninoy Aquino International Airport (MNL)', 'Iloilo - Iloilo International Airport (ILO)', '13:00:00', '14:05:00', 3036.00),
(27, 'FN0027', 'Manila - Ninoy Aquino International Airport (MNL)', 'Boracay - Boracay Airport (MPH)', '13:00:00', '14:10:00', 3667.00),
(28, 'FN0028', 'Manila - Ninoy Aquino International Airport (MNL)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '14:15:00', 2764.00),
(29, 'FN0029', 'Manila - Ninoy Aquino International Airport (MNL)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '14:35:00', 2834.00),
(30, 'FN0030', 'Manila - Ninoy Aquino International Airport (MNL)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '13:00:00', '14:25:00', 5862.00),
(31, 'FN0031', 'Manila - Ninoy Aquino International Airport (MNL)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '14:30:00', 5583.00),
(33, 'FN033', 'Manila - Ninoy Aquino International Airport (MNL)', 'Kalibo - Kalibo International Airport (KLO)', '13:00:00', '14:15:00', 3195.00),
(34, 'FN034', 'Manila - Ninoy Aquino International Airport (MNL)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '18:12:00', 1500.00),
(35, 'FN035', 'Manila - Ninoy Aquino International Airport (MNL)', 'Davao - Francisco Bangoy International Airport (DVO)', '17:00:00', '18:45:00', 2985.00),
(36, 'FN036', 'Manila - Ninoy Aquino International Airport (MNL)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '18:13:00', 4643.00),
(37, 'FN037', 'Manila - Ninoy Aquino International Airport (MNL)', 'Iloilo - Iloilo International Airport (ILO)', '17:00:00', '18:05:00', 3036.00),
(38, 'FN038', 'Manila - Ninoy Aquino International Airport (MNL)', 'Boracay - Boracay Airport (MPH)', '17:00:00', '18:10:00', 3667.00),
(39, 'FN039', 'Manila - Ninoy Aquino International Airport (MNL)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '18:15:00', 2764.00),
(40, 'FN040', 'Manila - Ninoy Aquino International Airport (MNL)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '18:35:00', 2834.00),
(41, 'FN041', 'Manila - Ninoy Aquino International Airport (MNL)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '17:00:00', '18:25:00', 5862.00),
(42, 'FN042', 'Manila - Ninoy Aquino International Airport (MNL)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '18:30:00', 5583.00),
(44, 'FN044', 'Manila - Ninoy Aquino International Airport (MNL)', 'Kalibo - Kalibo International Airport (KLO)', '17:00:00', '18:15:00', 3195.00),
(45, 'FN045', 'Cebu - Mactan Cebu International Airport (CEB)', 'Davao - Francisco Bangoy International Airport (DVO)', '06:00:00', '07:15:00', 3331.00),
(46, 'FN046', 'Cebu - Mactan Cebu International Airport (CEB)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '06:55:00', 4051.00),
(47, 'FN047', 'Cebu - Mactan Cebu International Airport (CEB)', 'Iloilo - Iloilo International Airport (ILO)', '06:00:00', '06:55:00', 3727.00),
(48, 'FN048', 'Cebu - Mactan Cebu International Airport (CEB)', 'Boracay - Boracay Airport (MPH)', '06:00:00', '06:45:00', 3667.00),
(49, 'FN049', 'Cebu - Mactan Cebu International Airport (CEB)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '06:50:00', 3406.00),
(50, 'FN050', 'Cebu - Mactan Cebu International Airport (CEB)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '06:55:00', 2585.00),
(52, 'FN052', 'Cebu - Mactan Cebu International Airport (CEB)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '07:25:00', 3388.00),
(53, 'FN053', 'Cebu - Mactan Cebu International Airport (CEB)', 'Angeles - Clark International Airport (CRK)', '06:00:00', '07:30:00', 4155.00),
(54, 'FN054', 'Cebu - Mactan Cebu International Airport (CEB)', 'Kalibo - Kalibo International Airport (KLO)', '06:00:00', '07:00:00', 2500.00),
(55, 'FN055', 'Cebu - Mactan Cebu International Airport (CEB)', 'Davao - Francisco Bangoy International Airport (DVO)', '10:00:00', '11:30:00', 3331.00),
(56, 'FN056', 'Cebu - Mactan Cebu International Airport (CEB)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '11:00:00', 3675.00),
(57, 'FN057', 'Cebu - Mactan Cebu International Airport (CEB)', 'Iloilo - Iloilo International Airport (ILO)', '10:00:00', '11:00:00', 2667.00),
(58, 'FN058', 'Cebu - Mactan Cebu International Airport (CEB)', 'Boracay - Boracay Airport (MPH)', '10:00:00', '11:20:00', 6485.00),
(59, 'FN059', 'Cebu - Mactan Cebu International Airport (CEB)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '10:50:00', 3406.00),
(60, 'FN060', 'Cebu - Mactan Cebu International Airport (CEB)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '10:55:00', 2585.00),
(62, 'FN062', 'Cebu - Mactan Cebu International Airport (CEB)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '11:25:00', 3388.00),
(63, 'FN063', 'Cebu - Mactan Cebu International Airport (CEB)', 'Angeles - Clark International Airport (CRK)', '10:00:00', '11:30:00', 4155.00),
(64, 'FN064', 'Cebu - Mactan Cebu International Airport (CEB)', 'Kalibo - Kalibo International Airport (KLO)', '10:00:00', '11:00:00', 2500.00),
(65, 'FN065', 'Cebu - Mactan Cebu International Airport (CEB)', 'Davao - Francisco Bangoy International Airport (DVO)', '13:00:00', '14:30:00', 3331.00),
(66, 'FN066', 'Cebu - Mactan Cebu International Airport (CEB)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '14:00:00', 3675.00),
(67, 'FN067', 'Cebu - Mactan Cebu International Airport (CEB)', 'Iloilo - Iloilo International Airport (ILO)', '13:00:00', '14:00:00', 2667.00),
(68, 'FN068', 'Cebu - Mactan Cebu International Airport (CEB)', 'Boracay - Boracay Airport (MPH)', '13:00:00', '14:20:00', 6485.00),
(69, 'FN069', 'Cebu - Mactan Cebu International Airport (CEB)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '13:50:00', 3406.00),
(70, 'FN070', 'Cebu - Mactan Cebu International Airport (CEB)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '13:55:00', 2585.00),
(72, 'FN072', 'Cebu - Mactan Cebu International Airport (CEB)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '14:25:14', 3388.00),
(73, 'FN073', 'Cebu - Mactan Cebu International Airport (CEB)', 'Angeles - Clark International Airport (CRK)', '13:00:00', '14:30:00', 4155.00),
(74, 'FN074', 'Cebu - Mactan Cebu International Airport (CEB)', 'Kalibo - Kalibo International Airport (KLO)', '13:00:00', '14:00:00', 2500.00),
(75, 'FN075', 'Cebu - Mactan Cebu International Airport (CEB)', 'Davao - Francisco Bangoy International Airport (DVO)', '17:00:00', '18:30:00', 3331.00),
(76, 'FN076', 'Cebu - Mactan Cebu International Airport (CEB)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '18:00:00', 3784.00),
(77, 'FN077', 'Cebu - Mactan Cebu International Airport (CEB)', 'Iloilo - Iloilo International Airport (ILO)', '17:00:00', '18:00:00', 2667.00),
(78, 'FN078', 'Cebu - Mactan Cebu International Airport (CEB)', 'Boracay - Boracay Airport (MPH)', '17:00:00', '18:20:00', 6485.00),
(79, 'FN079', 'Cebu - Mactan Cebu International Airport (CEB)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '17:50:00', 3406.00),
(80, 'FN080', 'Cebu - Mactan Cebu International Airport (CEB)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '17:55:00', 2585.00),
(82, 'FN082', 'Cebu - Mactan Cebu International Airport (CEB)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '18:25:00', 3388.00),
(83, 'FN083', 'Cebu - Mactan Cebu International Airport (CEB)', 'Angeles - Clark International Airport (CRK)', '17:00:00', '18:00:00', 4155.00),
(84, 'FN084', 'Cebu - Mactan Cebu International Airport (CEB)', 'Kalibo - Kalibo International Airport (KLO)', '17:00:00', '18:20:00', 2500.00),
(85, 'FN085', 'Davao - Francisco Bangoy International Airport (DVO)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '07:05:00', 1795.00),
(86, 'FN086', 'Davao - Francisco Bangoy International Airport (DVO)', 'Manila - Ninoy Aquino International Airport (MNL)', '06:00:00', '07:50:00', 3773.00),
(87, 'FN087', 'Davao - Francisco Bangoy International Airport (DVO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '07:30:00', 3784.00),
(88, 'FN088', 'Davao - Francisco Bangoy International Airport (DVO)', 'Iloilo - Iloilo International Airport (ILO)', '06:00:00', '07:20:00', 3539.00),
(89, 'FN089', 'Davao - Francisco Bangoy International Airport (DVO)', 'Boracay - Boracay Airport (MPH)', '06:00:00', '07:25:00', 4046.00),
(90, 'FN090', 'Davao - Francisco Bangoy International Airport (DVO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '07:20:00', 3539.00),
(91, 'FN091', 'Davao - Francisco Bangoy International Airport (DVO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '07:00:00', 3110.00),
(92, 'FN092', 'Davao - Francisco Bangoy International Airport (DVO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '06:00:00', '07:05:00', 3429.00),
(93, 'FN093', 'Davao - Francisco Bangoy International Airport (DVO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '10:00:00', 4744.00),
(94, 'FN094', 'Davao - Francisco Bangoy International Airport (DVO)', 'Angeles - Clark International Airport (CRK)', '06:00:00', '07:55:00', 5590.00),
(95, 'FN095', 'Davao - Francisco Bangoy International Airport (DVO)', 'Kalibo - Kalibo International Airport (KLO)', '06:00:00', '08:12:00', 4113.00),
(96, 'FN096', 'Davao - Francisco Bangoy International Airport (DVO)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:00', '11:00:00', 1795.00),
(97, 'FN097', 'Davao - Francisco Bangoy International Airport (DVO)', 'Manila - Ninoy Aquino International Airport (MNL)', '10:00:00', '11:40:00', 3773.00),
(98, 'FN098', 'Davao - Francisco Bangoy International Airport (DVO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '11:30:00', 3784.00),
(99, 'FN099', 'Davao - Francisco Bangoy International Airport (DVO)', 'Iloilo - Iloilo International Airport (ILO)', '10:00:00', '11:20:00', 3539.00),
(100, 'FN100', 'Davao - Francisco Bangoy International Airport (DVO)', 'Boracay - Boracay Airport (MPH)', '10:00:00', '11:25:00', 4046.00),
(101, 'FN0101', 'Davao - Francisco Bangoy International Airport (DVO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '11:20:00', 3539.00),
(102, 'FN102', 'Davao - Francisco Bangoy International Airport (DVO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '11:00:00', 3110.00),
(103, 'FN103', 'Davao - Francisco Bangoy International Airport (DVO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '10:00:00', '11:05:00', 3429.00),
(104, 'FN104', 'Davao - Francisco Bangoy International Airport (DVO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '14:00:00', 4744.00),
(105, 'FN105', 'Davao - Francisco Bangoy International Airport (DVO)', 'Angeles - Clark International Airport (CRK)', '10:00:00', '11:55:00', 5590.00),
(106, 'FN106', 'Davao - Francisco Bangoy International Airport (DVO)', 'Kalibo - Kalibo International Airport (KLO)', '10:00:00', '12:12:00', 4113.00),
(107, 'FN107', 'Davao - Francisco Bangoy International Airport (DVO)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '14:00:00', 1795.00),
(108, 'FN108', 'Davao - Francisco Bangoy International Airport (DVO)', 'Manila - Ninoy Aquino International Airport (MNL)', '13:00:00', '14:40:00', 3773.00),
(109, 'FN109', 'Davao - Francisco Bangoy International Airport (DVO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '14:30:00', 3784.00),
(110, 'FN110', 'Davao - Francisco Bangoy International Airport (DVO)', 'Iloilo - Iloilo International Airport (ILO)', '13:00:00', '14:20:00', 3539.00),
(111, 'FN111', 'Davao - Francisco Bangoy International Airport (DVO)', 'Boracay - Boracay Airport (MPH)', '13:00:00', '14:25:00', 4046.00),
(112, 'FN112', 'Davao - Francisco Bangoy International Airport (DVO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '14:20:00', 3539.00),
(113, 'FN113', 'Davao - Francisco Bangoy International Airport (DVO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '14:00:00', 3110.00),
(114, 'FN114', 'Davao - Francisco Bangoy International Airport (DVO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '13:00:00', '14:05:00', 3429.00),
(115, 'FN115', 'Davao - Francisco Bangoy International Airport (DVO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '17:00:00', 4744.00),
(116, 'FN116', 'Davao - Francisco Bangoy International Airport (DVO)', 'Angeles - Clark International Airport (CRK)', '13:00:00', '14:45:00', 5590.00),
(117, 'FN117', 'Davao - Francisco Bangoy International Airport (DVO)', 'Kalibo - Kalibo International Airport (KLO)', '13:00:00', '15:12:00', 4113.00),
(118, 'FN118', 'Davao - Francisco Bangoy International Airport (DVO)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '18:00:00', 1795.00),
(119, 'FN119', 'Davao - Francisco Bangoy International Airport (DVO)', 'Manila - Ninoy Aquino International Airport (MNL)', '17:00:00', '18:40:00', 3773.00),
(120, 'FN120', 'Davao - Francisco Bangoy International Airport (DVO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '18:30:00', 3784.00),
(121, 'FN121', 'Davao - Francisco Bangoy International Airport (DVO)', 'Iloilo - Iloilo International Airport (ILO)', '17:00:00', '18:20:00', 3539.00),
(122, 'FN122', 'Davao - Francisco Bangoy International Airport (DVO)', 'Boracay - Boracay Airport (MPH)', '17:00:00', '18:25:00', 4046.00),
(123, 'FN123', 'Davao - Francisco Bangoy International Airport (DVO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '18:20:00', 3539.00),
(124, 'FN124', 'Davao - Francisco Bangoy International Airport (DVO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '18:00:00', 3110.00),
(125, 'FN125', 'Davao - Francisco Bangoy International Airport (DVO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '17:00:00', '18:05:00', 3429.00),
(126, 'FN126', 'Davao - Francisco Bangoy International Airport (DVO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '21:00:00', 4744.00),
(127, 'FN127', 'Davao - Francisco Bangoy International Airport (DVO)', 'Angeles - Clark International Airport (CRK)', '17:00:00', '18:45:00', 5590.00),
(128, 'FN128', 'Davao - Francisco Bangoy International Airport (DVO)', 'Kalibo - Kalibo International Airport (KLO)', '17:00:00', '19:12:00', 4113.00),
(129, 'FN129', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Manila - Ninoy Aquino International Airport (MNL)', '06:00:00', '07:15:00', 2516.00),
(130, 'FN130', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '06:25:00', 1562.00),
(131, 'FN131', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Davao - Francisco Bangoy International Airport (DVO)', '06:00:00', '07:25:00', 2568.00),
(132, 'FN132', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Iloilo - Iloilo International Airport (ILO)', '06:00:00', '06:45:00', 2653.00),
(133, 'FN133', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Boracay - Boracay Airport (MPH)', '06:00:00', '06:55:00', 3020.00),
(134, 'FN134', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '06:30:00', 2850.00),
(135, 'FN135', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '07:45:00', 3120.00),
(136, 'FN136', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '06:00:00', '06:25:00', 2020.00),
(137, 'FN137', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '08:15:00', 5305.00),
(138, 'FN138', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Angeles - Clark International Airport (CRK)', '06:00:00', '08:30:00', 5639.00),
(139, 'FN139', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Kalibo - Kalibo International Airport (KLO)', '06:00:00', '07:00:00', 2348.00),
(140, 'FN140', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Manila - Ninoy Aquino International Airport (MNL)', '10:00:00', '11:15:00', 2516.00),
(141, 'FN141', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:00', '10:25:00', 1562.00),
(142, 'FN142', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Davao - Francisco Bangoy International Airport (DVO)', '10:00:00', '11:25:00', 2568.00),
(143, 'FN143', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Iloilo - Iloilo International Airport (ILO)', '10:00:00', '10:45:00', 2653.00),
(144, 'FN144', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Boracay - Boracay Airport (MPH)', '10:00:00', '10:45:00', 3020.00),
(145, 'FN145', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '10:30:00', 2850.00),
(146, 'FN146', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '11:45:00', 3120.00),
(147, 'FN147', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '10:00:00', '10:25:00', 2020.00),
(148, 'FN148', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '12:15:00', 5305.00),
(149, 'FN149', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Angeles - Clark International Airport (CRK)', '10:00:00', '12:30:00', 5639.00),
(150, 'FN150', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Kalibo - Kalibo International Airport (KLO)', '10:00:00', '11:00:00', 2348.00),
(151, 'FN151', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Manila - Ninoy Aquino International Airport (MNL)', '13:00:00', '14:15:00', 2516.00),
(152, 'FN152', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '13:25:00', 1562.00),
(153, 'FN153', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Davao - Francisco Bangoy International Airport (DVO)', '13:00:00', '14:25:00', 2568.00),
(154, 'FN154', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Iloilo - Iloilo International Airport (ILO)', '13:00:00', '13:45:00', 2653.00),
(155, 'FN155', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Boracay - Boracay Airport (MPH)', '13:00:00', '13:45:00', 3020.00),
(156, 'FN156', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '13:30:00', 2850.00),
(157, 'FN157', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '14:45:00', 3120.00),
(158, 'FN158', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '13:00:00', '13:25:00', 2020.00),
(159, 'FN159', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '15:15:00', 5305.00),
(160, 'FN160', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Angeles - Clark International Airport (CRK)', '13:00:00', '15:30:00', 5639.00),
(161, 'FN161', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Kalibo - Kalibo International Airport (KLO)', '13:00:00', '14:00:00', 2348.00),
(162, 'FN162', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Manila - Ninoy Aquino International Airport (MNL)', '17:00:00', '18:15:00', 2516.00),
(163, 'FN163', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '17:25:00', 1562.00),
(164, 'FN164', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Davao - Francisco Bangoy International Airport (DVO)', '17:00:00', '18:25:00', 2568.00),
(165, 'FN165', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Iloilo - Iloilo International Airport (ILO)', '17:00:00', '17:45:00', 2653.00),
(166, 'FN166', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Boracay - Boracay Airport (MPH)', '17:00:00', '17:45:00', 3020.00),
(167, 'FN167', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '17:30:00', 2850.00),
(168, 'FN168', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '18:45:00', 3120.00),
(169, 'FN169', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '17:00:00', '17:25:00', 2020.00),
(170, 'FN170', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '19:15:00', 5305.00),
(171, 'FN171', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Angeles - Clark International Airport (CRK)', '17:00:00', '19:30:00', 5639.00),
(172, 'FN172', 'Tacloban - Daniel Z Romualdez Airport (TAC)', 'Kalibo - Kalibo International Airport (KLO)', '17:00:00', '18:00:00', 2348.00),
(173, 'FN173', 'Iloilo - Iloilo International Airport (ILO)', 'Manila - Ninoy Aquino International Airport (MNL)', '06:00:00', '07:10:00', 1759.00),
(174, 'FN174', 'Iloilo - Iloilo International Airport (ILO)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '06:25:00', 1569.00),
(175, 'FN175', 'Iloilo - Iloilo International Airport (ILO)', 'Davao - Francisco Bangoy International Airport (DVO)', '06:00:00', '07:10:00', 3661.00),
(176, 'FN176', 'Iloilo - Iloilo International Airport (ILO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '06:30:00', 1635.00),
(177, 'FN177', 'Iloilo - Iloilo International Airport (ILO)', 'Boracay - Boracay Airport (MPH)', '06:00:00', '06:20:00', 2056.00),
(178, 'FN178', 'Iloilo - Iloilo International Airport (ILO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '06:20:00', 1524.00),
(179, 'FN179', 'Iloilo - Iloilo International Airport (ILO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '07:00:00', 3663.00),
(180, 'FN180', 'Iloilo - Iloilo International Airport (ILO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '06:00:00', '06:25:00', 1543.00),
(181, 'FN181', 'Iloilo - Iloilo International Airport (ILO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '07:10:00', 2541.00),
(182, 'FN182', 'Iloilo - Iloilo International Airport (ILO)', 'Angeles - Clark International Airport (CRK)', '06:00:00', '07:15:00', 3430.00),
(184, 'FN184', 'Iloilo - Iloilo International Airport (ILO)', 'Manila - Ninoy Aquino International Airport (MNL)', '10:00:00', '11:10:00', 1759.00),
(185, 'FN185', 'Iloilo - Iloilo International Airport (ILO)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:00', '10:25:00', 1569.00),
(186, 'FN186', 'Iloilo - Iloilo International Airport (ILO)', 'Davao - Francisco Bangoy International Airport (DVO)', '10:00:00', '11:10:00', 3661.00),
(187, 'FN187', 'Iloilo - Iloilo International Airport (ILO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '10:30:00', 1635.00),
(188, 'FN188', 'Iloilo - Iloilo International Airport (ILO)', 'Boracay - Boracay Airport (MPH)', '10:00:00', '10:20:00', 2056.00),
(189, 'FN189', 'Iloilo - Iloilo International Airport (ILO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '10:20:00', 1524.00),
(190, 'FN190', 'Iloilo - Iloilo International Airport (ILO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '11:00:00', 3663.00),
(191, 'FN191', 'Iloilo - Iloilo International Airport (ILO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '10:00:00', '10:25:00', 1543.00),
(192, 'FN192', 'Iloilo - Iloilo International Airport (ILO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '11:10:00', 2541.00),
(193, 'FN193', 'Iloilo - Iloilo International Airport (ILO)', 'Angeles - Clark International Airport (CRK)', '10:00:00', '11:15:00', 3430.00),
(195, 'FN195', 'Iloilo - Iloilo International Airport (ILO)', 'Manila - Ninoy Aquino International Airport (MNL)', '13:00:00', '14:10:00', 1759.00),
(196, 'FN196', 'Iloilo - Iloilo International Airport (ILO)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '13:25:00', 1569.00),
(197, 'FN197', 'Iloilo - Iloilo International Airport (ILO)', 'Davao - Francisco Bangoy International Airport (DVO)', '13:00:00', '14:10:00', 3661.00),
(198, 'FN198', 'Iloilo - Iloilo International Airport (ILO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '13:30:00', 1635.00),
(199, 'FN199', 'Iloilo - Iloilo International Airport (ILO)', 'Boracay - Boracay Airport (MPH)', '13:00:00', '13:20:00', 2056.00),
(200, 'FN200', 'Iloilo - Iloilo International Airport (ILO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '13:20:00', 1524.00),
(201, 'FN201', 'Iloilo - Iloilo International Airport (ILO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '14:00:00', 3663.00),
(202, 'FN202', 'Iloilo - Iloilo International Airport (ILO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '13:00:00', '13:25:00', 1543.00),
(203, 'FN203', 'Iloilo - Iloilo International Airport (ILO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '14:10:00', 2541.00),
(204, 'FN204', 'Iloilo - Iloilo International Airport (ILO)', 'Angeles - Clark International Airport (CRK)', '13:00:00', '14:15:00', 3430.00),
(206, 'FN206', 'Iloilo - Iloilo International Airport (ILO)', 'Manila - Ninoy Aquino International Airport (MNL)', '17:00:00', '18:10:00', 1759.00),
(207, 'FN207', 'Iloilo - Iloilo International Airport (ILO)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '17:25:00', 1569.00),
(208, 'FN208', 'Iloilo - Iloilo International Airport (ILO)', 'Davao - Francisco Bangoy International Airport (DVO)', '17:00:00', '18:10:00', 3661.00),
(209, 'FN209', 'Iloilo - Iloilo International Airport (ILO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '17:30:00', 1635.00),
(210, 'FN210', 'Iloilo - Iloilo International Airport (ILO)', 'Boracay - Boracay Airport (MPH)', '17:00:00', '17:20:00', 2056.00),
(211, 'FN211', 'Iloilo - Iloilo International Airport (ILO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '17:20:00', 1524.00),
(212, 'FN212', 'Iloilo - Iloilo International Airport (ILO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '18:00:00', 3663.00),
(213, 'FN213', 'Iloilo - Iloilo International Airport (ILO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '17:00:00', '17:25:00', 1543.00),
(214, 'FN214', 'Iloilo - Iloilo International Airport (ILO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '18:10:00', 2541.00),
(215, 'FN215', 'Iloilo - Iloilo International Airport (ILO)', 'Angeles - Clark International Airport (CRK)', '17:00:00', '18:15:00', 3430.00),
(217, 'FN217', 'Boracay - Boracay Airport (MPH)', 'Manila - Ninoy Aquino International Airport (MNL)', '06:00:00', '07:00:00', 1839.00),
(218, 'FN218', 'Boracay - Boracay Airport (MPH)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '06:55:00', 2162.00),
(219, 'FN219', 'Boracay - Boracay Airport (MPH)', 'Davao - Francisco Bangoy International Airport (DVO)', '06:00:00', '09:10:00', 3923.00),
(220, 'FN220', 'Boracay - Boracay Airport (MPH)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '06:55:00', 1769.00),
(222, 'FN222', 'Boracay - Boracay Airport (MPH)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '06:45:00', 1532.00),
(223, 'FN223', 'Boracay - Boracay Airport (MPH)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '07:00:00', 2443.00),
(224, 'FN224', 'Boracay - Boracay Airport (MPH)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '06:00:00', '06:50:00', 1787.00),
(225, 'FN225', 'Boracay - Boracay Airport (MPH)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '07:00:00', 2540.00),
(226, 'FN226', 'Boracay - Boracay Airport (MPH)', 'Angeles - Clark International Airport (CRK)', '06:00:00', '07:05:00', 2461.00),
(228, 'FN228', 'Boracay - Boracay Airport (MPH)', 'Manila - Ninoy Aquino International Airport (MNL)', '10:00:00', '11:00:00', 1839.00),
(229, 'FN229', 'Boracay - Boracay Airport (MPH)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:10', '10:55:00', 2162.00),
(230, 'FN230', 'Boracay - Boracay Airport (MPH)', 'Davao - Francisco Bangoy International Airport (DVO)', '10:00:00', '14:10:00', 3923.00),
(231, 'FN331', 'Boracay - Boracay Airport (MPH)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '10:55:00', 1769.00),
(233, 'FN233', 'Boracay - Boracay Airport (MPH)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '10:45:00', 1532.00),
(234, 'FN234', 'Boracay - Boracay Airport (MPH)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '11:00:00', 2443.00),
(235, 'FN235', 'Boracay - Boracay Airport (MPH)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '10:00:00', '10:50:00', 1787.00),
(236, 'FN236', 'Boracay - Boracay Airport (MPH)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '11:00:00', 2540.00),
(237, 'FN237', 'Boracay - Boracay Airport (MPH)', 'Angeles - Clark International Airport (CRK)', '10:00:00', '11:05:00', 2461.00),
(239, 'FN239', 'Boracay - Boracay Airport (MPH)', 'Manila - Ninoy Aquino International Airport (MNL)', '13:00:00', '14:00:00', 1839.00),
(240, 'FN240', 'Boracay - Boracay Airport (MPH)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '13:55:00', 2162.00),
(241, 'FN241', 'Boracay - Boracay Airport (MPH)', 'Davao - Francisco Bangoy International Airport (DVO)', '13:00:00', '16:10:00', 3923.00),
(242, 'FN242', 'Boracay - Boracay Airport (MPH)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '13:55:00', 1769.00),
(244, 'FN244', 'Boracay - Boracay Airport (MPH)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '13:45:00', 1532.00),
(245, 'FN245', 'Boracay - Boracay Airport (MPH)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '14:00:00', 2443.00),
(246, 'FN246', 'Boracay - Boracay Airport (MPH)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '13:00:00', '13:50:00', 1787.00),
(247, 'FN247', 'Boracay - Boracay Airport (MPH)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '14:00:00', 2540.00),
(248, 'FN248', 'Boracay - Boracay Airport (MPH)', 'Angeles - Clark International Airport (CRK)', '13:00:00', '14:05:00', 2461.00),
(250, 'FN250', 'Boracay - Boracay Airport (MPH)', 'Manila - Ninoy Aquino International Airport (MNL)', '17:00:00', '18:00:00', 1839.00),
(251, 'FN251', 'Boracay - Boracay Airport (MPH)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '17:55:00', 2162.00),
(252, 'FN252', 'Boracay - Boracay Airport (MPH)', 'Davao - Francisco Bangoy International Airport (DVO)', '17:00:00', '20:10:00', 3923.00),
(253, 'FN253', 'Boracay - Boracay Airport (MPH)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '17:55:00', 1769.00),
(255, 'FN255', 'Boracay - Boracay Airport (MPH)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '17:45:00', 1532.00),
(256, 'FN256', 'Boracay - Boracay Airport (MPH)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '18:00:00', 2443.00),
(257, 'FN257', 'Boracay - Boracay Airport (MPH)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '17:00:00', '17:50:00', 1787.00),
(258, 'FN258', 'Boracay - Boracay Airport (MPH)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '18:00:00', 2540.00),
(259, 'FN259', 'Boracay - Boracay Airport (MPH)', 'Angeles - Clark International Airport (CRK)', '17:00:00', '18:05:00', 2461.00),
(261, 'FN261', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Manila - Ninoy Aquino International Airport (MNL)', '06:00:00', '07:10:00', 1778.00),
(262, 'FN262', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '06:30:00', 1320.00),
(263, 'FN263', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Davao - Francisco Bangoy International Airport (DVO)', '06:00:00', '07:15:00', 2906.00),
(264, 'FN264', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '06:45:00', 1407.00),
(265, 'FN265', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Iloilo - Iloilo International Airport (ILO)', '06:00:00', '06:20:00', 1570.00),
(266, 'FN266', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Boracay - Boracay Airport (MPH)', '06:00:00', '06:45:00', 1955.00),
(267, 'FN267', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '07:05:00', 2089.00),
(268, 'FN268', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '06:00:00', '06:45:00', 1540.00),
(269, 'FN269', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '07:00:00', 2048.00),
(270, 'FN270', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Angeles - Clark International Airport (CRK)', '06:00:00', '08:00:00', 2348.00),
(271, 'FN271', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Kalibo - Kalibo International Airport (KLO)', '06:00:00', '06:45:00', 1301.00),
(272, 'FN272', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Manila - Ninoy Aquino International Airport (MNL)', '10:00:00', '11:10:00', 1778.00),
(273, 'FN273', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:00', '10:30:00', 1320.00),
(274, 'FN274', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Davao - Francisco Bangoy International Airport (DVO)', '10:00:00', '11:15:00', 2906.00),
(275, 'FN275', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '10:45:00', 1407.00),
(276, 'FN276', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Iloilo - Iloilo International Airport (ILO)', '10:00:00', '10:20:00', 1570.00),
(277, 'FN277', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Boracay - Boracay Airport (MPH)', '10:00:00', '10:45:00', 1955.00),
(278, 'FN278', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '11:05:00', 2089.00),
(279, 'FN279', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '10:00:00', '10:45:00', 1540.00),
(280, 'FN280', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '11:00:00', 2048.00),
(281, 'FN281', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Angeles - Clark International Airport (CRK)', '10:00:00', '12:00:00', 2348.00),
(282, 'FN282', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Kalibo - Kalibo International Airport (KLO)', '10:00:00', '10:45:00', 1301.00),
(283, 'FN283', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Manila - Ninoy Aquino International Airport (MNL)', '13:00:00', '14:10:00', 1778.00),
(284, 'FN284', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '13:30:00', 1320.00),
(285, 'FN285', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Davao - Francisco Bangoy International Airport (DVO)', '13:00:00', '14:15:00', 2906.00),
(286, 'FN286', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '13:45:00', 1407.00),
(287, 'FN287', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Iloilo - Iloilo International Airport (ILO)', '13:00:00', '13:20:00', 1570.00),
(288, 'FN288', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Boracay - Boracay Airport (MPH)', '13:00:00', '13:45:00', 1955.00),
(289, 'FN289', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '14:05:00', 2089.00),
(290, 'FN290', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '13:00:00', '13:45:00', 1540.00),
(291, 'FN291', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '14:00:00', 2048.00),
(292, 'FN292', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Angeles - Clark International Airport (CRK)', '13:00:00', '15:00:00', 2348.00),
(293, 'FN293', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Kalibo - Kalibo International Airport (KLO)', '13:00:00', '13:45:00', 1301.00),
(294, 'FN294', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Manila - Ninoy Aquino International Airport (MNL)', '17:00:00', '18:10:00', 1778.00),
(295, 'FN295', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '17:30:00', 1320.00),
(296, 'FN296', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Davao - Francisco Bangoy International Airport (DVO)', '17:00:00', '18:15:00', 2906.00),
(297, 'FN297', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '17:45:00', 1407.00),
(298, 'FN298', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Iloilo - Iloilo International Airport (ILO)', '17:00:00', '17:20:00', 1570.00),
(299, 'FN299', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Boracay - Boracay Airport (MPH)', '17:00:00', '17:45:00', 1955.00),
(300, 'FN300', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '18:05:00', 2089.00),
(301, 'FN301', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '17:00:00', '17:45:00', 1540.00),
(302, 'FN302', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '18:00:00', 2048.00),
(303, 'FN303', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Angeles - Clark International Airport (CRK)', '17:00:00', '20:00:00', 2348.00),
(304, 'FN304', 'Bacolod - Bacolod Silay International Airport (BCD)', 'Kalibo - Kalibo International Airport (KLO)', '17:00:00', '17:45:00', 1301.00),
(305, 'FN305', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Manila - Ninoy Aquino International Airport (MNL)', '06:00:00', '07:30:00', 3617.00),
(306, 'FN306', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '06:45:00', 1403.00),
(308, 'FN308', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '07:00:00', 1597.00),
(309, 'FN309', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Iloilo - Iloilo International Airport (ILO)', '06:00:00', '07:00:00', 3293.00),
(310, 'FN310', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Boracay - Boracay Airport (MPH)', '06:00:00', '07:00:00', 2988.00),
(311, 'FN311', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '06:55:00', 1607.00),
(312, 'FN312', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '06:00:00', '06:25:00', 1443.00),
(313, 'FN0313', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '10:00:00', 4666.00),
(314, 'FN314', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Angeles - Clark International Airport (CRK)', '06:00:00', '09:55:00', 7334.00),
(315, 'FN315', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Kalibo - Kalibo International Airport (KLO)', '06:00:00', '07:00:00', 2445.00),
(316, 'FN316', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Manila - Ninoy Aquino International Airport (MNL)', '10:00:00', '11:30:00', 3617.00),
(317, 'FN317', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:00', '10:45:00', 1403.00),
(319, 'FN319', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '11:00:00', 1597.00),
(320, 'FN320', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Iloilo - Iloilo International Airport (ILO)', '10:00:00', '11:00:00', 3293.00),
(321, 'FN321', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Boracay - Boracay Airport (MPH)', '10:00:00', '11:00:00', 2988.00),
(322, 'FN322', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '10:55:00', 1607.00),
(323, 'FN323', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '10:00:00', '10:25:00', 1443.00),
(324, 'FN324', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '11:00:00', 4666.00),
(325, 'FN325', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Angeles - Clark International Airport (CRK)', '10:00:00', '13:55:00', 7334.00),
(326, 'FN326', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Kalibo - Kalibo International Airport (KLO)', '10:00:00', '11:00:00', 2445.00),
(327, 'FN327', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Manila - Ninoy Aquino International Airport (MNL)', '13:00:00', '14:30:00', 3617.00),
(328, 'FN328', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '13:45:00', 1403.00),
(330, 'FN330', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '14:00:00', 1597.00),
(331, 'FN331', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Iloilo - Iloilo International Airport (ILO)', '13:00:00', '14:00:00', 3293.00),
(332, 'FN332', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Boracay - Boracay Airport (MPH)', '13:00:00', '14:00:00', 2988.00),
(333, 'FN333', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '13:55:00', 1607.00),
(334, 'FN334', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '13:00:00', '13:25:00', 1443.00),
(335, 'FN335', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '14:00:00', 4666.00),
(336, 'FN336', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Angeles - Clark International Airport (CRK)', '13:00:00', '16:55:00', 7334.00),
(337, 'FN337', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Kalibo - Kalibo International Airport (KLO)', '13:00:00', '14:00:00', 2445.00),
(338, 'FN338', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Manila - Ninoy Aquino International Airport (MNL)', '17:00:00', '18:30:00', 3617.00),
(339, 'FN339', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '17:45:00', 1403.00),
(341, 'FN341', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '18:00:00', 1597.00),
(342, 'FN342', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Iloilo - Iloilo International Airport (ILO)', '17:00:00', '18:00:00', 3293.00),
(343, 'FN343', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Boracay - Boracay Airport (MPH)', '17:00:00', '18:00:00', 2988.00),
(344, 'FN344', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '17:55:00', 1607.00),
(345, 'FN345', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '17:00:00', '17:25:00', 1443.00),
(346, 'FN346', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '18:00:00', 4666.00),
(347, 'FN347', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Angeles - Clark International Airport (CRK)', '17:00:00', '20:55:00', 7334.00),
(348, 'FN348', 'Cagayan de Oro - Laguindingan Airport (CGY)', 'Kalibo - Kalibo International Airport (KLO)', '17:00:00', '18:00:00', 2445.00),
(349, 'FN349', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Manila - Ninoy Aquino International Airport (MNL)', '06:00:00', '07:20:00', 5334.00),
(350, 'FN350', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '06:30:00', 1547.00),
(351, 'FN351', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Davao - Francisco Bangoy International Airport (DVO)', '06:00:00', '07:00:00', 1471.00),
(352, 'FN352', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '06:45:00', 1878.00),
(353, 'FN353', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Iloilo - Iloilo International Airport (ILO)', '06:00:00', '06:45:00', 1773.00),
(354, 'FN354', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Boracay - Boracay Airport (MPH)', '06:00:00', '06:50:00', 1807.00),
(355, 'FN355', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '06:45:00', 1473.00),
(356, 'FN356', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '06:30:00', 1258.00),
(357, 'FN357', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '10:30:00', 9072.00),
(358, 'FN358', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Angeles - Clark International Airport (CRK)', '06:00:00', '11:00:00', 10862.00),
(359, 'FN359', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Kalibo - Kalibo International Airport (KLO)', '06:00:00', '06:50:00', 1872.00),
(360, 'FN360', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Manila - Ninoy Aquino International Airport (MNL)', '10:00:00', '11:20:00', 5334.00),
(361, 'FN360', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:00', '10:30:00', 1547.00),
(362, 'FN362', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Davao - Francisco Bangoy International Airport (DVO)', '10:00:00', '11:00:00', 1471.00);
INSERT INTO `flights` (`id`, `flight_number`, `departure_location`, `arrival_location`, `Departure-Time`, `Arrival-Time`, `price`) VALUES
(363, 'FN363', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '10:45:00', 1878.00),
(364, 'FN364', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Iloilo - Iloilo International Airport (ILO)', '10:00:00', '10:45:00', 1773.00),
(365, 'FN365', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Boracay - Boracay Airport (MPH)', '10:00:00', '10:50:00', 1807.00),
(366, 'FN366', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '10:45:00', 1473.00),
(367, 'FN367', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '10:30:00', 1258.00),
(368, 'FN368', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '14:30:00', 9072.00),
(369, 'FN369', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Angeles - Clark International Airport (CRK)', '10:00:00', '15:00:00', 10862.00),
(370, 'FN370', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Kalibo - Kalibo International Airport (KLO)', '10:00:00', '10:50:00', 1872.00),
(371, 'FN371', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Manila - Ninoy Aquino International Airport (MNL)', '13:00:00', '14:20:00', 5334.00),
(372, 'FN372', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '13:30:00', 1547.00),
(373, 'FN373', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Davao - Francisco Bangoy International Airport (DVO)', '13:00:00', '14:00:00', 1471.00),
(374, 'FN374', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '13:45:00', 1878.00),
(375, 'FN375', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Iloilo - Iloilo International Airport (ILO)', '13:00:00', '13:45:00', 1773.00),
(376, 'FN376', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Boracay - Boracay Airport (MPH)', '13:00:00', '13:50:00', 1807.00),
(377, 'FN377', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '13:45:00', 1473.00),
(378, 'FN378', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '13:30:00', 1258.00),
(379, 'FN379', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '17:30:00', 9072.00),
(380, 'FN380', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Angeles - Clark International Airport (CRK)', '13:00:00', '18:00:00', 10862.00),
(381, 'FN381', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Kalibo - Kalibo International Airport (KLO)', '13:00:00', '13:50:00', 1872.00),
(382, 'FN382', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Manila - Ninoy Aquino International Airport (MNL)', '17:00:00', '18:20:00', 5334.00),
(383, 'FN383', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '17:30:00', 1547.00),
(384, 'FN384', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Davao - Francisco Bangoy International Airport (DVO)', '17:00:00', '18:00:00', 1471.00),
(385, 'FN385', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '17:45:00', 1878.00),
(386, 'FN386', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Iloilo - Iloilo International Airport (ILO)', '17:00:00', '17:45:00', 1773.00),
(387, 'FN387', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Boracay - Boracay Airport (MPH)', '17:00:00', '17:50:00', 1807.00),
(388, 'FN388', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '17:45:00', 1473.00),
(389, 'FN389', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '17:30:00', 1258.00),
(390, 'FN390', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '21:30:00', 9072.00),
(391, 'FN391', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Angeles - Clark International Airport (CRK)', '17:00:00', '22:00:00', 10862.00),
(392, 'FN392', 'Tagbilaran - Bohol Panglao International Airport (TAG)', 'Kalibo - Kalibo International Airport (KLO)', '17:00:00', '17:50:00', 1872.00),
(393, 'FN393', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Manila - Ninoy Aquino International Airport (MNL)', '06:00:00', '07:20:00', 3724.00),
(394, 'FN394', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '07:15:00', 2919.00),
(395, 'FN395', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Davao - Francisco Bangoy International Airport (DVO)', '06:00:00', '09:20:00', 5215.00),
(396, 'FN396', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '09:05:00', 5305.00),
(397, 'FN397', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Iloilo - Iloilo International Airport (ILO)', '06:00:00', '07:10:00', 4860.00),
(398, 'FN398', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Boracay - Boracay Airport (MPH)', '06:00:00', '07:00:00', 3457.00),
(399, 'FN399', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '07:10:00', 4860.00),
(400, 'FN400', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '09:45:00', 5097.00),
(401, 'FN401', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '06:00:00', '10:20:00', 6869.00),
(402, 'FN402', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Angeles - Clark International Airport (CRK)', '06:00:00', '10:45:00', 7470.00),
(403, 'FN403', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Kalibo - Kalibo International Airport (KLO)', '06:00:00', '07:10:00', 3984.00),
(404, 'FN404', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Manila - Ninoy Aquino International Airport (MNL)', '10:00:00', '11:20:00', 3724.00),
(405, 'FN405', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:00', '11:15:00', 2919.00),
(406, 'FN406', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Davao - Francisco Bangoy International Airport (DVO)', '10:00:00', '13:20:00', 5215.00),
(407, 'FN407', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '13:05:00', 5305.00),
(408, 'FN408', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Iloilo - Iloilo International Airport (ILO)', '10:00:00', '11:10:00', 4860.00),
(409, 'FN409', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Boracay - Boracay Airport (MPH)', '10:00:00', '11:00:00', 3457.00),
(410, 'FN410', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '11:10:00', 4860.00),
(411, 'FN411', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '13:45:00', 5097.00),
(412, 'FN412', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '10:00:00', '14:20:00', 6869.00),
(413, 'FN413', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Angeles - Clark International Airport (CRK)', '10:00:00', '14:45:00', 7470.00),
(414, 'FN414', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Kalibo - Kalibo International Airport (KLO)', '10:00:00', '11:10:00', 3984.00),
(415, 'FN415', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Manila - Ninoy Aquino International Airport (MNL)', '13:00:00', '14:20:00', 3724.00),
(416, 'FN416', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '14:15:00', 2919.00),
(417, 'FN417', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Davao - Francisco Bangoy International Airport (DVO)', '13:00:00', '16:20:00', 5215.00),
(418, 'FN418', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '16:05:00', 5305.00),
(419, 'FN419', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Iloilo - Iloilo International Airport (ILO)', '13:00:00', '14:10:00', 4860.00),
(420, 'FN420', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Boracay - Boracay Airport (MPH)', '13:00:00', '14:00:00', 3457.00),
(421, 'FN421', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '14:10:00', 4860.00),
(422, 'FN422', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '16:45:00', 5097.00),
(423, 'FN423', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '13:00:00', '17:20:00', 6869.00),
(424, 'FN424', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Angeles - Clark International Airport (CRK)', '13:00:00', '17:45:00', 7470.00),
(425, 'FN425', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Kalibo - Kalibo International Airport (KLO)', '13:00:00', '14:10:00', 3984.00),
(426, 'FN426', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Manila - Ninoy Aquino International Airport (MNL)', '17:00:00', '18:20:00', 3724.00),
(427, 'FN427', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '18:15:00', 2919.00),
(428, 'FN428', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Davao - Francisco Bangoy International Airport (DVO)', '17:00:00', '20:20:00', 5215.00),
(429, 'FN429', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '20:05:00', 5305.00),
(430, 'FN430', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Iloilo - Iloilo International Airport (ILO)', '17:00:00', '18:10:00', 4860.00),
(431, 'FN431', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Boracay - Boracay Airport (MPH)', '17:00:00', '18:00:00', 3457.00),
(432, 'FN432', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '18:10:00', 4860.00),
(433, 'FN433', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '20:45:00', 5097.00),
(434, 'FN434', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '17:00:00', '21:20:00', 6869.00),
(435, 'FN435', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Angeles - Clark International Airport (CRK)', '17:00:00', '21:45:00', 7470.00),
(436, 'FN436', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', 'Kalibo - Kalibo International Airport (KLO)', '17:00:00', '18:10:00', 3984.00),
(438, 'FN438', 'Angeles - Clark International Airport (CRK)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '07:30:00', 4090.00),
(439, 'FN439', 'Angeles - Clark International Airport (CRK)', 'Davao - Francisco Bangoy International Airport (DVO)', '06:00:00', '08:00:00', 4329.00),
(440, 'FN440', 'Angeles - Clark International Airport (CRK)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '07:25:00', 1870.00),
(441, 'FN441', 'Angeles - Clark International Airport (CRK)', 'Iloilo - Iloilo International Airport (ILO)', '06:00:00', '07:05:00', 1349.00),
(442, 'FN442', 'Angeles - Clark International Airport (CRK)', 'Boracay - Boracay Airport (MPH)', '06:00:00', '07:05:00', 3021.00),
(443, 'FN443', 'Angeles - Clark International Airport (CRK)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '07:05:00', 1349.00),
(444, 'FN444', 'Angeles - Clark International Airport (CRK)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '07:25:00', 1380.00),
(445, 'FN445', 'Angeles - Clark International Airport (CRK)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '06:00:00', '08:25:00', 3578.00),
(446, 'FN446', 'Angeles - Clark International Airport (CRK)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '07:15:00', 3557.00),
(447, 'FN447', 'Angeles - Clark International Airport (CRK)', 'Kalibo - Kalibo International Airport (KLO)', '06:00:00', '07:00:00', 951.00),
(449, 'FN449', 'Angeles - Clark International Airport (CRK)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:00', '11:30:00', 4090.00),
(450, 'FN450', 'Angeles - Clark International Airport (CRK)', 'Davao - Francisco Bangoy International Airport (DVO)', '10:00:00', '12:00:00', 4329.00),
(451, 'FN451', 'Angeles - Clark International Airport (CRK)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '11:25:00', 1870.00),
(452, 'FN452', 'Angeles - Clark International Airport (CRK)', 'Iloilo - Iloilo International Airport (ILO)', '10:00:00', '11:05:00', 1349.00),
(453, 'FN453', 'Angeles - Clark International Airport (CRK)', 'Boracay - Boracay Airport (MPH)', '10:00:00', '11:05:00', 3021.00),
(454, 'FN454', 'Angeles - Clark International Airport (CRK)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '11:05:00', 1349.00),
(455, 'FN455', 'Angeles - Clark International Airport (CRK)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '11:25:00', 1380.00),
(456, 'FN456', 'Angeles - Clark International Airport (CRK)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '10:00:00', '12:25:00', 3578.00),
(457, 'FN457', 'Angeles - Clark International Airport (CRK)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '11:15:00', 3557.00),
(458, 'FN458', 'Angeles - Clark International Airport (CRK)', 'Kalibo - Kalibo International Airport (KLO)', '10:00:00', '11:00:00', 951.00),
(460, 'FN460', 'Angeles - Clark International Airport (CRK)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '14:30:00', 4090.00),
(461, 'FN461', 'Angeles - Clark International Airport (CRK)', 'Davao - Francisco Bangoy International Airport (DVO)', '13:00:00', '15:00:00', 4329.00),
(462, 'FN462', 'Angeles - Clark International Airport (CRK)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '14:25:00', 1870.00),
(463, 'FN463', 'Angeles - Clark International Airport (CRK)', 'Iloilo - Iloilo International Airport (ILO)', '13:00:00', '14:05:00', 1349.00),
(464, 'FN464', 'Angeles - Clark International Airport (CRK)', 'Boracay - Boracay Airport (MPH)', '13:00:00', '14:05:00', 3021.00),
(465, 'FN465', 'Angeles - Clark International Airport (CRK)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '14:05:00', 1349.00),
(466, 'FN466', 'Angeles - Clark International Airport (CRK)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '14:25:00', 1380.00),
(467, 'FN467', 'Angeles - Clark International Airport (CRK)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '13:00:00', '00:00:00', 3578.00),
(468, 'FN468', 'Angeles - Clark International Airport (CRK)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '00:00:00', 3557.00),
(469, 'FN469', 'Angeles - Clark International Airport (CRK)', 'Kalibo - Kalibo International Airport (KLO)', '13:00:00', '00:00:00', 951.00),
(471, 'FN471', 'Angeles - Clark International Airport (CRK)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '00:00:00', 4090.00),
(472, 'FN472', 'Angeles - Clark International Airport (CRK)', 'Davao - Francisco Bangoy International Airport (DVO)', '17:00:00', '00:00:00', 4329.00),
(473, 'FN473', 'Angeles - Clark International Airport (CRK)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '00:00:00', 1870.00),
(474, 'FN474', 'Angeles - Clark International Airport (CRK)', 'Iloilo - Iloilo International Airport (ILO)', '17:00:00', '00:00:00', 1349.00),
(475, 'FN475', 'Angeles - Clark International Airport (CRK)', 'Boracay - Boracay Airport (MPH)', '17:00:00', '00:00:00', 3021.00),
(476, 'FN476', 'Angeles - Clark International Airport (CRK)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '00:00:00', 1349.00),
(477, 'FN477', 'Angeles - Clark International Airport (CRK)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '00:00:00', 1380.00),
(478, 'FN478', 'Angeles - Clark International Airport (CRK)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '17:00:00', '00:00:00', 3578.00),
(479, 'FN479', 'Angeles - Clark International Airport (CRK)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '00:00:00', 3557.00),
(480, 'FN480', 'Angeles - Clark International Airport (CRK)', 'Kalibo - Kalibo International Airport (KLO)', '17:00:00', '00:00:00', 951.00),
(481, 'FN481', 'Kalibo - Kalibo International Airport (KLO)', 'Manila - Ninoy Aquino International Airport (MNL)', '06:00:00', '07:00:00', 2237.00),
(482, 'FN482', 'Kalibo - Kalibo International Airport (KLO)', 'Cebu - Mactan Cebu International Airport (CEB)', '06:00:00', '06:50:00', 1897.00),
(483, 'FN483', 'Kalibo - Kalibo International Airport (KLO)', 'Davao - Francisco Bangoy International Airport (DVO)', '06:00:00', '09:35:00', 6277.00),
(484, 'FN484', 'Kalibo - Kalibo International Airport (KLO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '06:00:00', '07:00:00', 2548.00),
(487, 'FN487', 'Kalibo - Kalibo International Airport (KLO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '06:00:00', '06:45:00', 1867.00),
(488, 'FN488', 'Kalibo - Kalibo International Airport (KLO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '06:00:00', '07:00:00', 2748.00),
(489, 'FN489', 'Kalibo - Kalibo International Airport (KLO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '06:00:00', '06:55:00', 1567.00),
(490, 'FN490', 'Kalibo - Kalibo International Airport (KLO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '06:00:00', '08:00:00', 2784.00),
(491, 'FN491', 'Kalibo - Kalibo International Airport (KLO)', 'Angeles - Clark International Airport (CRK)', '06:00:00', '07:05:00', 2547.00),
(492, 'FN492', 'Kalibo - Kalibo International Airport (KLO)', 'Manila - Ninoy Aquino International Airport (MNL)', '10:00:00', '11:00:00', 2237.00),
(493, 'FN493', 'Kalibo - Kalibo International Airport (KLO)', 'Cebu - Mactan Cebu International Airport (CEB)', '10:00:00', '10:50:00', 1897.00),
(494, 'FN494', 'Kalibo - Kalibo International Airport (KLO)', 'Davao - Francisco Bangoy International Airport (DVO)', '10:00:00', '13:35:00', 6277.00),
(495, 'FN495', 'Kalibo - Kalibo International Airport (KLO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '10:00:00', '11:00:00', 2548.00),
(498, 'FN498', 'Kalibo - Kalibo International Airport (KLO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '10:00:00', '10:45:00', 1867.00),
(499, 'FN499', 'Kalibo - Kalibo International Airport (KLO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '10:00:00', '11:00:00', 2748.00),
(500, 'FN500', 'Kalibo - Kalibo International Airport (KLO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '10:00:00', '10:55:00', 1567.00),
(501, 'FN501', 'Kalibo - Kalibo International Airport (KLO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '10:00:00', '12:00:00', 2784.00),
(502, 'FN502', 'Kalibo - Kalibo International Airport (KLO)', 'Angeles - Clark International Airport (CRK)', '10:00:00', '11:05:00', 2547.00),
(503, 'FN503', 'Kalibo - Kalibo International Airport (KLO)', 'Manila - Ninoy Aquino International Airport (MNL)', '13:00:00', '14:00:00', 2237.00),
(504, 'FN504', 'Kalibo - Kalibo International Airport (KLO)', 'Cebu - Mactan Cebu International Airport (CEB)', '13:00:00', '13:50:00', 1897.00),
(505, 'FN505', 'Kalibo - Kalibo International Airport (KLO)', 'Davao - Francisco Bangoy International Airport (DVO)', '13:00:00', '16:35:00', 6277.00),
(506, 'FN506', 'Kalibo - Kalibo International Airport (KLO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '13:00:00', '14:00:00', 2548.00),
(509, 'FN509', 'Kalibo - Kalibo International Airport (KLO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '13:00:00', '13:45:00', 1867.00),
(510, 'FN510', 'Kalibo - Kalibo International Airport (KLO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '13:00:00', '14:00:00', 2748.00),
(511, 'FN511', 'Kalibo - Kalibo International Airport (KLO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '13:00:00', '13:55:00', 1567.00),
(512, 'FN512', 'Kalibo - Kalibo International Airport (KLO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '13:00:00', '15:00:00', 2784.00),
(513, 'FN513', 'Kalibo - Kalibo International Airport (KLO)', 'Angeles - Clark International Airport (CRK)', '13:00:00', '14:05:00', 2547.00),
(514, 'FN514', 'Kalibo - Kalibo International Airport (KLO)', 'Manila - Ninoy Aquino International Airport (MNL)', '17:00:00', '18:00:00', 2237.00),
(515, 'FN516', 'Kalibo - Kalibo International Airport (KLO)', 'Cebu - Mactan Cebu International Airport (CEB)', '17:00:00', '17:50:00', 1897.00),
(516, 'FN517', 'Kalibo - Kalibo International Airport (KLO)', 'Davao - Francisco Bangoy International Airport (DVO)', '17:00:00', '20:35:00', 6277.00),
(517, 'FN518', 'Kalibo - Kalibo International Airport (KLO)', 'Tacloban - Daniel Z Romualdez Airport (TAC)', '17:00:00', '18:00:00', 2548.00),
(520, 'FN521', 'Kalibo - Kalibo International Airport (KLO)', 'Bacolod - Bacolod Silay International Airport (BCD)', '17:00:00', '17:45:00', 1867.00),
(521, 'FN522', 'Kalibo - Kalibo International Airport (KLO)', 'Cagayan de Oro - Laguindingan Airport (CGY)', '17:00:00', '08:00:00', 2748.00),
(522, 'FN523', 'Kalibo - Kalibo International Airport (KLO)', 'Tagbilaran - Bohol Panglao International Airport (TAG)', '17:00:00', '17:55:00', 1567.00),
(523, 'FN524', 'Kalibo - Kalibo International Airport (KLO)', 'Puerto Princesa City - Puerto Princesa International Airport (PPS)', '17:00:00', '19:00:00', 2784.00),
(524, 'FN525', 'Kalibo - Kalibo International Airport (KLO)', 'Angeles - Clark International Airport (CRK)', '17:00:00', '18:05:00', 2547.00);

-- --------------------------------------------------------

--
-- Table structure for table `logindata`
--

CREATE TABLE `logindata` (
  `Id` int(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logindata`
--

INSERT INTO `logindata` (`Id`, `firstname`, `lastname`, `password`, `Email`) VALUES
(29, 'Cloyd', 'Labininay ', '$2y$10$hgBxUQPOqWYY2kNWDGucGuqLeuL05hUfEBg3C7knEKbebuFW1/Rrm', 's@gmail.com'),
(39, 'z', 'y', 'z@gmail.com', '$2y$10$0FWzNMoVvhuMgszyvUNK0.FWofOexkkCrKtMIguXC9.'),
(40, 'z', 'c', '$2y$10$4hpF4RdrbkdfQbmYtvJ62.Odf7MhIcfx.F3Wk8YGKq2vKtWm9mBym', 'c@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passenger_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`passenger_id`, `booking_id`, `first_name`, `last_name`, `email`, `contact_number`, `dob`) VALUES
(1, 4, NULL, NULL, NULL, NULL, NULL),
(2, 5, NULL, NULL, NULL, NULL, NULL),
(3, 6, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD UNIQUE KEY `PK` (`Id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logindata`
--
ALTER TABLE `logindata`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passenger_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=525;

--
-- AUTO_INCREMENT for table `logindata`
--
ALTER TABLE `logindata`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
