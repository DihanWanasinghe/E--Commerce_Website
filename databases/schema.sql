-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 06:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w2054987`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNo` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `orderTotal` decimal(8,2) NOT NULL DEFAULT 0.00,
  `orderStatus` varchar(50) DEFAULT NULL,
  `shippingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNo`, `userId`, `orderDateTime`, `orderTotal`, `orderStatus`, `shippingDate`) VALUES
(1, 4, '2025-03-14 09:47:44', 0.00, 'Placed', NULL),
(2, 4, '2025-03-14 10:35:17', 0.00, 'Placed', NULL),
(3, 4, '2025-03-14 10:37:51', 9965.00, 'Placed', NULL),
(4, 4, '2025-03-14 10:42:27', 0.00, 'Placed', NULL),
(5, 4, '2025-03-14 10:42:29', 0.00, 'Placed', NULL),
(6, 4, '2025-03-14 10:43:04', 10562.00, 'Placed', NULL),
(7, 4, '2025-03-14 10:45:48', 0.00, 'Placed', NULL),
(8, 4, '2025-03-14 10:46:13', 6631.00, 'Placed', NULL),
(9, 4, '2025-03-14 11:30:37', 0.00, 'Placed', NULL),
(10, 4, '2025-03-14 11:30:41', 0.00, 'Placed', NULL),
(11, 4, '2025-03-14 11:31:05', 0.00, 'Placed', NULL),
(12, 4, '2025-03-14 11:31:30', 17064.00, 'Placed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `orderLineId` int(11) NOT NULL,
  `orderNo` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `quantityOrdered` int(11) NOT NULL,
  `subTotal` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`orderLineId`, `orderNo`, `prodId`, `quantityOrdered`, `subTotal`) VALUES
(1, 3, 1, 20, 6980.00),
(2, 3, 2, 15, 2985.00),
(3, 6, 1, 20, 6980.00),
(4, 6, 2, 18, 3582.00),
(5, 8, 1, 19, 6631.00),
(6, 12, 1, 18, 6282.00),
(7, 12, 3, 18, 10782.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodId` int(4) NOT NULL,
  `prodName` varchar(30) NOT NULL,
  `prodPicNameSmall` varchar(100) NOT NULL,
  `prodPicNameLarge` varchar(100) NOT NULL,
  `prodDescripShort` varchar(1000) DEFAULT NULL,
  `prodDescripLong` varchar(3000) DEFAULT NULL,
  `prodPrice` decimal(6,2) NOT NULL,
  `prodQuantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodId`, `prodName`, `prodPicNameSmall`, `prodPicNameLarge`, `prodDescripShort`, `prodDescripLong`, `prodPrice`, `prodQuantity`) VALUES
(1, 'AppleWatch', 'appleWatchSmall.jpg', 'appleWatchLarge.jpg', 'Apple Watch Series 10 GPS 42mm Jet Black Sport Band - M/L', 'Thinstant classic. Biggest display. Thinnest design. Ever. Biggest display. Big-time upgrade. Meet Apple Watch Series 10. A bigger display with more screen area and a thinner, lighter design. Get advanced fitness and health features with Sleep Apnoea Notifications, faster charging. Why Apple Watch Series 10 - Bigger display with up to 30 percent more screen area. Advanced health and fitness features provide invaluable insights. Safety features connect you to help when you need it. Faster charging gives you 80 percent battery in about 30 minutes.\r\n\r\nA Powerful Fitness Partner - Measure all the ways you move with Activity rings, which are customisable to match your lifestyle. Get advanced metrics for a range of workouts with the Workout app. Track the intensity of your workouts with training load. And Apple Watch comes with three months of Apple Fitness+ free.\r\n\r\nAdvanced Health Insights - Take an ECG anytime. Get notifications if you have high or low heart rate or an irregular heart rhythm. Understand your menstrual cycle and get retrospective ovulation estimates. Track sleep and get notifications if signs of sleep apnoea are detected.\r\n\r\nInnovative Safety Features - Fall Detection and Crash Detection can connect you to emergency services in the event of a hard fall or a serious car crash. Emergency SOS lets you call for help with the press of a button. Automatically notifies a loved one when you\'ve arrived at your destination.\r\n\r\nStay Connected - Send a text, take a call, listen to music and podcasts, use Siri and get notifications on the go. Apple Watch Series 10 (GPS) works with your iPhone or Wi-Fi to keep you connected.\r\n\r\nConnectivity\r\n\r\nS10 SiP.\r\n64GB memory.\r\nCompatible with iPhone Xs or later with iOS 18 or later and iPhone SE (2nd generation or later).\r\nWatchOS 11 operating system.\r\nBluetooth 5.3 connection.\r\nWi-Fi.\r\nDisplay information\r\n\r\n42mm Always-On Retina LTPO3 OLED screen.\r\nTouchscreen.\r\n416 x 496 screen resolution.\r\nBattery\r\n\r\n1 hour charge.\r\nPhysical specification\r\n\r\nSize: M/L .\r\nWatch size H42, W36, D9.7mm.\r\nStrap can be removed and replaced.\r\nFeatures\r\n\r\nWater resistant.\r\nSwimproof.\r\nDust resistant.\r\nScratch resistant.\r\nCompatible with apps from the Apple app store.\r\nMake calls.\r\nReceive social network notifications.\r\nDisplays weather.\r\nMusic player.\r\nHeart rate monitor.\r\nAccelerometer.\r\nGPS.\r\nSleep.\r\nAccessories included: Strap, Apple Watch Magnetic Fast Charger to USBC Cable (1m), .\r\nManufacturer\'s 1 year guarantee.\r\nEAN: 195949562204.', 349.00, 50),
(2, 'AirPods', 'airpodsSmall.jpg', 'airpodsLarge.jpg', 'Apple AirPods Pro with USB-C MagSafe Case (2nd Generation)', 'This product is supplied without a charging device.\nThe required output of a suitable charging device is 2.5W minimum and 5W maximum.\nThis product does not support PD fast charging (harmonised fast charging).\nGroundbreaking audio performance - Apple-designed H2 chip, the force behind AirPods Pro, pushes advanced audio performance even further. From smarter noise cancellation to superior three-dimensional sound and battery life, it improves on the best features of AirPods Pro in a big way.\n\nUnheard-of sound - Adaptive Audio dynamically blends Transparency mode and Active Noise Cancellation to deliver the best listening experience for you in any environment. Transparency mode lets outside sound in, so you can hear what\'s going on around you.\n\nA higher level of control - Touch control lets you swipe the stem to adjust volume. Press the stem once to answer, mute or unmute yourself on calls, press it twice to end a call, or hold it to switch between listening modes.\n\nHeadphone Features\n\nSilicone ear pieces.\nConnection: true wireless.\nBluetooth enabled for a wireless connection to your devices .\nConnects to devices via Bluetooth 5.3.\nTouch controls on side controls.\nActive noise cancellation.\nWater-resistant.\nCompatible with iOS smartphones.\nBatteries required 1 x rechargeable battery (included) .\n6 hour battery life.\n120 minute charging time.\nFast charge to boost battery life.\nCharging case included.\nIn the box: AirPods Pro, MagSafe Charging Case (USBC) with speaker and lanyard loop8, Silicone ear tips (four sizes: XS, S, M, L), USBC Charge Cable, Documentation.\nGeneral Information\n\nModel number: Apple Airpods Pro 2nd Gen.\nManufacturer\'s 1 year guarantee.\nEAN: 195949052637.\nWarning - Not suitable for children under the age of 3 years due to small parts and entanglement hazard.\nCaution – To prevent possible hearing damage, do not listen at high volume for long periods.', 199.00, 25),
(3, 'AppleIpad', 'appleIpadSmall.jpg', 'appleIpadLarge.jpg', 'Apple iPad Air 2024 11 Inch Wi-Fi 128GB - Blue', 'This product is supplied without a charging device.\r\nThe required output of a suitable charging device is 15W minimum and 45W maximum.\r\nThis product supports PD fast charging (harmonised fast charging).\r\nFresh Air. Light Speed. Dream Big.\r\nEAN: 195949188428.', 599.00, 20),
(4, 'AppleHomePod', 'appleHomePodSmall.jpg', 'appleHomePodLargejpg.jpg', 'Apple HomePod Smart Speaker - Midnight', 'Spatial Audio provides even more immersive sound. Works seamlessly with all your Apple devices. Connect and control your smart home, privately and securely.\r\n\r\nCreate a stereo pair to amplify all the music you love. Just place two HomePod speakers in the same room, and you\'ll be asked if you want to pair them up. Get ready for a wider soundstage and even more enveloping audio than that of traditional stereo speakers.\r\n\r\nWith room sensing, HomePod automatically understands its location in a room by using its mics to listen for sound reflections. It tunes sound accordingly, so you\'ll enjoy the best listening experience possible no matter where it\'s placed.\r\n\r\n1 internal speaker.\r\nCompatible with iPhone and iPad.\r\nBluetooth compatible.\r\n1amplifier channel.\r\nAlexa compatible.\r\nSiri compatible.\r\nGeneral information\r\n\r\nModel number: MQJ73B/A.\r\nSize H16.8, W14.2, .\r\nMains operated.\r\n(Not included).\r\nManufacturer\'s 1 year guarantee.\r\nEAN: 194253467649.', 299.00, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userType` varchar(1) NOT NULL,
  `userFName` varchar(100) NOT NULL,
  `userSName` varchar(100) NOT NULL,
  `userAddress` varchar(200) NOT NULL,
  `userPostCode` varchar(20) NOT NULL,
  `userTelNo` varchar(20) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userType`, `userFName`, `userSName`, `userAddress`, `userPostCode`, `userTelNo`, `userEmail`, `userPassword`) VALUES
(3, 'C', 'DIhan', 'Wanasinghe', 'kurunduwatta,yakkala', '11870', '0765808137', 'dihan.20232101@iit.ac.lk', 'Phantomsla'),
(4, 'C', 'DIhan', 'Wanasinghe', 'kurunduwatta,yakkala', '11870', '0765808137', 'dihanhansaja360@gmail.com', 'dihan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNo`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`orderLineId`),
  ADD KEY `orderNo` (`orderNo`),
  ADD KEY `prodId` (`prodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `orderLineId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderNo`),
  ADD CONSTRAINT `order_line_ibfk_2` FOREIGN KEY (`prodId`) REFERENCES `product` (`prodId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
