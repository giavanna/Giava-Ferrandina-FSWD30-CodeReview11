-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 11:48 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_giava_ferrandina_php_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `car_licence_plate` varchar(20) NOT NULL,
  `car_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_model`, `car_licence_plate`, `car_img`) VALUES
(1, 'Ferrari Testa Rossa', 'X124', 'testarossa.jpg'),
(2, 'Lamborghini Diablo', 'Y894', 'lamborghini.jpg'),
(3, 'Aston-martin', 'LKI98P', 'Aston-martin.jpg'),
(4, 'Bentley Continental GT', 'LKIJE3', 'Bentley_Continental_GT.jpg'),
(5, 'Ferrari', 'JLLIK34', 'ferrari.jpg'),
(6, 'Ferrari 458', 'LOKE32', 'ferrari-458-spider.jpg'),
(7, 'Ferrari Berlinetta', '34GRIK', 'ferrari-berlinetta.jpg'),
(8, 'Lamborghini Gallardo', '3GRLO4', 'Lambo_Gallardo.jpg'),
(9, 'Lamborghini Aventador', '9GRK5', 'Lambo-Aventador.jpg'),
(10, 'McLaren', '11GRI7', 'McLaren.jpg'),
(11, 'Mercedes Benz SLS', '98GKE2', 'Mercedes-Benz-SLS-AMG-Black.jpg'),
(12, 'Porsche', 'KDIEK1', 'Porsche.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_first_name` varchar(50) NOT NULL,
  `customer_second_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_first_name`, `customer_second_name`) VALUES
(1, 'Alex', 'Doe'),
(2, 'David', 'Robinson');

-- --------------------------------------------------------

--
-- Table structure for table `gps_location`
--

CREATE TABLE `gps_location` (
  `gps_location_id` int(11) NOT NULL,
  `gps_latitude` float DEFAULT NULL,
  `gps_longitude` float DEFAULT NULL,
  `fk_car_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gps_location`
--

INSERT INTO `gps_location` (`gps_location_id`, `gps_latitude`, `gps_longitude`, `fk_car_id`) VALUES
(1, 48.2203, 16.3556, 1),
(2, 48.1969, 16.3654, 2),
(3, 48.1828, 16.3522, 3),
(4, 48.2155, 16.3855, 4),
(5, 47.0737, 15.4325, 5),
(6, 49.4354, 11.872, 6),
(7, 48.1924, 16.3572, 7),
(8, 48.1828, 16.375, 8),
(9, 48.2265, 16.3633, 9),
(10, 48.2013, 16.3432, 10),
(11, 48.2221, 16.3506, 11),
(12, 48.1606, 11.5864, 12);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `office_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `office_address`) VALUES
(1, 'Johannesgasse,24'),
(2, 'Berggasse,41'),
(3, 'Brauergasse,20 '),
(4, 'Michaelaplatz, 35'),
(5, 'Wattgasse, 10'),
(6, 'Lazarettgasse, 109');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `fk_customer_id` int(11) DEFAULT NULL,
  `fk_car_id` int(11) DEFAULT NULL,
  `fk_office_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `pickup_date`, `return_date`, `fk_customer_id`, `fk_car_id`, `fk_office_id`) VALUES
(1, '2018-01-07', NULL, 1, 2, 1),
(2, '2018-02-12', NULL, 2, 1, 2),
(3, '2018-02-10', '2018-02-15', 1, 8, 5),
(4, '2018-01-18', '2018-01-24', 2, 5, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `gps_location`
--
ALTER TABLE `gps_location`
  ADD PRIMARY KEY (`gps_location_id`),
  ADD KEY `gps_location_ibfk_1` (`fk_car_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `rent_ibfk_1` (`fk_customer_id`),
  ADD KEY `rent_ibfk_2` (`fk_car_id`),
  ADD KEY `rent_ibfk_3` (`fk_office_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gps_location`
--
ALTER TABLE `gps_location`
  ADD CONSTRAINT `gps_location_ibfk_1` FOREIGN KEY (`fk_car_id`) REFERENCES `car` (`car_id`);

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`fk_customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`fk_car_id`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `rent_ibfk_3` FOREIGN KEY (`fk_office_id`) REFERENCES `office` (`office_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
