-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 04:38 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `username`, `password`, `email`, `address`, `contact`) VALUES
(1, 'Pia', 'piacassy', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'piacasiano@hotmail.com', 'Sampa Dorm', '09123456789'),
(2, 'Jimin', 'jiminsshi', '912ec803b2ce49e4a541068d495ab570', 'jimin@gmail.com', 'korea', '1234567890'),
(3, 'Gorg', 'georginna', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'gorgy@gmail.com', 'haus', '1234'),
(4, 'Admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com', 'Manila', '0912345902'),
(5, 'Hannah Magno', 'hannahmagno', '83e8ef518174e1eb6be4a0778d050c9d', 'hannah.magno15@gmail.com', 'Bacoor, Cavitee', '09157837106'),
(6, 'User', 'user', 'e2fc714c4727ee9395f324cd2e7f331f', 'user@gmail.com', 'Imus, Cavite', '09987654321');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `itemDesc` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `itemType` varchar(100) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `itemDesc`, `price`, `itemType`, `image`) VALUES
(1, 'Bike Diskbreak 26', 9500, 'bike', 'bike diskbreak 26.jpg'),
(2, 'MTB 26 Jackal', 9500, 'bike', 'mtb jackal alloy.jpg'),
(3, 'MTB 26 Speedway', 7500, 'bike', 'mtb speedway.jpg'),
(4, 'Bike BMX 20', 4400, 'bike', 'bmx 20 bullet.jpg'),
(5, 'Mountain Bike', 3700, 'bike', 'mountain bike.jpg'),
(6, 'MTB 26 Xyclone Alloy', 3700, 'bike', 'mtb 26 alloy.jpg'),
(7, 'MTB 26 Xyclone', 3100, 'bike', 'mtb 26 xyclone.jpg'),
(8, 'Hub SRAM', 2700, 'parts', 'hub sram.jpg'),
(9, 'BMX 16 barbie', 2600, 'bike', 'bmx barbie.jpg'),
(10, 'BMX 20 Bullet', 2600, 'bike', 'bmx 20 bullet.jpg'),
(11, 'Fork MOB', 2400, 'parts', 'fork mob.jpg'),
(12, 'Bike BMX 16', 2300, 'bike', 'bike bmx 16.jpg'),
(13, 'BMX 16 Boy', 2300, 'bike', 'bmx 16 boy.jpg'),
(14, 'Hub Cassette Type', 2300, 'parts', 'hub cassette type.jpg'),
(15, 'BMX 14 Spoke Type', 2000, 'bike', 'bmx spoke type.jpg'),
(16, 'BMX 12 Bullet', 1800, 'bike', 'bmx 12 bullet.jpg'),
(17, 'Sprocket 10 Speed', 1300, 'parts', 'sprocket 10 speed.jpg'),
(18, 'Shifter Alivio', 1200, 'parts', 'shifter alivio.jpg'),
(19, 'Disk Break Caliper', 1000, 'parts', 'disk break caliper.jpg'),
(20, 'Rapid Fire', 950, 'parts', 'rapid fire.jpg'),
(21, 'Rim DID 18X3', 915, 'parts', 'rim did 18x3.jpg'),
(22, 'Rear Hub TMX', 850, 'parts', 'rear hub tmx.jpg'),
(23, 'Roller Shimano Acera', 750, 'parts', 'roller shimano acera.jpg'),
(24, 'Shimano Roller', 750, 'parts', 'shimano roller.jpg'),
(25, 'Handle Bar', 650, 'parts', 'handle bar.jpg'),
(26, 'Helmet', 650, 'parts', 'helmet.jpg'),
(27, 'Chain 10 speed', 550, 'parts', 'chain 10 speed.jpg'),
(28, 'Pedal GTS Alloy', 550, 'parts', 'pedal gts alloy.jpg'),
(29, 'Stem', 550, 'parts', 'stem.jpg'),
(30, 'Stem Oversize', 550, 'parts', 'stem oversize.jpg'),
(31, 'Headlight Police', 500, 'parts', 'C:xampphtdocsv6product-imagesheadlight police.jpg'),
(32, 'Headlight MachFally', 450, 'parts', 'C:xampphtdocsv6product-imagesheadlight machfally.jpg'),
(33, 'Seat Post Truvativ', 450, 'parts', 'seat post truvativ.jpg'),
(34, 'BMX 20 Boxter', 440, 'bike', 'bmx 20 boxter.jpg'),
(35, 'Pump', 420, 'parts', 'pump.jpg'),
(36, 'Bicycle Phone Holder', 350, 'parts', 'bicycle phone holder.jpg'),
(37, 'Bottom Bracket', 275, 'parts', 'bottom bracket.jpg'),
(38, 'Bike Lock', 250, 'parts', 'bike lock.jpg'),
(39, 'Frame Adaptor', 250, 'parts', 'frame adaptor.jpg'),
(40, 'Headlight Dynamo', 250, 'parts', 'headlight dynamo.jpg'),
(41, 'Saddle Banana', 250, 'parts', 'saddle banana.jpg'),
(42, 'Saddle', 235, 'parts', 'saddle.jpg'),
(43, 'Hub Side Wheel', 230, 'parts', 'hub side wheel.jpg'),
(44, 'Bell', 200, 'parts', 'bell.jpg'),
(45, 'Seat Clamp', 190, 'parts', 'seat clamp.jpg'),
(46, 'Bartape', 180, 'parts', 'bar tape.jpg'),
(47, 'Sprocket', 175, 'parts', 'sprocket.jpg'),
(48, 'Water Bottle', 170, 'parts', 'water bottle.jpg'),
(49, 'Skewer', 160, 'parts', 'skewer.jpg'),
(50, 'Tire 26x1.38 leo', 160, 'parts', 'tire26x1.38.jpg'),
(51, 'CST Tube', 155, 'parts', 'cst tube.jpg'),
(52, 'Chain connector 10 speed', 150, 'parts', 'chain connector 10 speed.jpg'),
(53, 'Crank Cover Venzo', 150, 'parts', 'crank cover venzo.jpg'),
(54, 'Handle Grip', 150, 'parts', 'handle grip.jpg'),
(55, 'Handle Grip Giant', 150, 'parts', 'handle grip giant.jpg'),
(56, 'Headlight Holder', 150, 'parts', 'headlight holder.jpg'),
(57, 'Break Shoe Road Bike', 140, 'parts', 'break shoe road bike.jpg'),
(58, 'Rapid X', 140, 'parts', 'rapid x.jpg'),
(59, 'Chain Cutter', 135, 'parts', 'chain cutter.jpg'),
(60, 'Step Nut', 130, 'parts', 'step nut.jpg'),
(61, 'Pedal', 120, 'parts', 'pedal.jpg'),
(62, 'Rim Tape Zepal', 120, 'parts', 'rim tape zepal.jpg'),
(63, 'Sealed Bearing 6205', 120, 'parts', 'sealed bearing.jpg'),
(64, 'Sprocket Single Speed', 120, 'parts', 'sprocket single speed.jpg'),
(65, 'Allen Wrench', 100, 'parts', 'allen wrench.jpg'),
(66, 'Bosny Spray Paint', 100, 'parts', 'bosny spray paint.jpg'),
(67, 'Bottle Cage', 80, 'parts', 'bottle cage.jpg'),
(68, 'Chain Wheel', 80, 'parts', 'chain wheel.jpg'),
(69, 'Grease', 70, 'parts', 'grease.jpg'),
(70, 'Shifter Cable Shimano', 65, 'parts', 'shifter cable shimano.jpg'),
(71, 'Changer Shimano', 50, 'parts', 'changer shimano.jpg'),
(72, 'Rear Axle', 50, 'parts', 'rear axle.jpg'),
(73, 'Vulcanizing Kit', 45, 'parts', 'vulcanizing kit.jpg'),
(74, 'Crank Bolt Allen', 40, 'parts', 'crank bolt allen.jpg'),
(75, 'Seat Post Clamp', 35, 'parts', 'seat post clamp.jpg'),
(76, 'Bulb Cap Cover Presta', 20, 'parts', 'bulb cap cover presta.jpg'),
(77, 'Cable Frame Protector', 20, 'parts', 'cable frame protector.jpg'),
(78, 'Spacer Alloy', 20, 'parts', 'spacer alloy.jpg'),
(79, 'Rear Cap', 15, 'parts', 'rear cap.jpg'),
(80, 'Bulb Cap Cover Alloy', 10, 'parts', 'bulb cap cover alloy.jpg'),
(81, 'Rear Cone', 7, 'parts', 'rear cone.jpg'),
(82, 'Cable End', 3, 'parts', 'cable end.jpg'),
(83, 'Steel Ball', 1, 'parts', 'steel ball.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ordercart`
--

CREATE TABLE `ordercart` (
  `custid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordercart`
--

INSERT INTO `ordercart` (`custid`, `itemid`, `quantity`, `unitPrice`) VALUES
(1, 2, 1, 9500),
(1, 6, 1, 3700),
(1, 12, 1, 2300),
(5, 1, 1, 9500),
(5, 2, 1, 9500);

-- --------------------------------------------------------

--
-- Table structure for table `orderin`
--

CREATE TABLE `orderin` (
  `orderid` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `totalAmount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderin`
--

INSERT INTO `orderin` (`orderid`, `custid`, `orderDate`, `totalAmount`) VALUES
(1, 5, '2018-11-30', 8835),
(2, 5, '2018-11-30', 10415),
(3, 1, '2018-12-02', 10590),
(4, 1, '2018-12-02', 7500),
(5, 1, '2018-12-02', 3550);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `orderid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`orderid`, `itemid`, `quantity`, `unitPrice`) VALUES
(1, 3, 1, 7500),
(1, 28, 1, 550),
(1, 29, 1, 550),
(1, 42, 1, 235),
(2, 2, 1, 9500),
(2, 21, 1, 915),
(3, 3, 1, 7500),
(3, 9, 1, 2600),
(3, 41, 1, 250),
(3, 50, 1, 160),
(3, 67, 1, 80),
(4, 3, 1, 7500),
(5, 10, 1, 2600),
(5, 20, 1, 950);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordercart`
--
ALTER TABLE `ordercart`
  ADD PRIMARY KEY (`custid`,`itemid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `orderin`
--
ALTER TABLE `orderin`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `custid` (`custid`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`orderid`,`itemid`),
  ADD KEY `itemid` (`itemid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `orderin`
--
ALTER TABLE `orderin`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordercart`
--
ALTER TABLE `ordercart`
  ADD CONSTRAINT `ordercart_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordercart_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderin`
--
ALTER TABLE `orderin`
  ADD CONSTRAINT `orderin_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orderin` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
