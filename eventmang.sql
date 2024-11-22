-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 07:21 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventmang`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_event`
--

CREATE TABLE `booked_event` (
  `id` int(11) NOT NULL,
  `Your_Name` varchar(50) NOT NULL,
  `Your_ID` int(11) DEFAULT NULL,
  `Event_Name` varchar(50) NOT NULL,
  `Event_Date` varchar(100) DEFAULT NULL,
  `Start_Date` varchar(50) DEFAULT NULL,
  `Organizer` varchar(100) DEFAULT NULL,
  `End_Date` varchar(50) DEFAULT NULL,
  `Vanue` varchar(50) DEFAULT NULL,
  `Status` int(11) DEFAULT 0,
  `Event_des` varchar(255) DEFAULT NULL,
  `Event_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_event`
--

INSERT INTO `booked_event` (`id`, `Your_Name`, `Your_ID`, `Event_Name`, `Event_Date`, `Start_Date`, `Organizer`, `End_Date`, `Vanue`, `Status`, `Event_des`, `Event_img`) VALUES
(11, '', NULL, 'C Clininc', '13/04/2023', '3:00', 'UIU CCL', '4:40', 'auditorium', 0, 'dasdadwda', 'uploads/C-clinic.jpg'),
(13, '', NULL, 'Football Tournament', '14/01/2020', '2:00pm', 'UIU SC', '4:30pm', 'auditorium', 0, 'it will be a only freshers tournament. So, all the freshers should register.', 'uploads/football.jpg'),
(14, '', NULL, 'Therap', '13/02/2022', '2:00pm', 'UIU APP FORUM', '4:30', 'seminarroom-floor4-room2', 0, 'Hello Everyone, The therap event is one of the biggest event in this time. So, Enjoy with us', 'uploads/therap.jpg'),
(15, '', NULL, 'h', '23/11/2023', '2:00pm', 'g', '5:00pm', 'auditorium', 0, 'h', 'uploads/Git and Github.jpg'),
(16, '', NULL, 'Mock Model Union', '13/07/2023', '4:00pm', 'UIU COMPUTER CLUB', '7:00pm', 'seminarroom-floor10-room1', 0, 'Model Union Showcase: Where Creativity Meets Runway is a mesmerizing event that brings together the glamour of fashion and the artistry of modeling. Step into a world of elegance and expression as we present a captivating runway display featuring a diver', 'uploads/Mock Model Union.jpg'),
(17, '', NULL, 'Latex Work Shop', '20/09/2023', '2:00pm', '', '4:30pm', 'seminarroom-floor1-room1', 0, 'Everybody should know basic Latex, it will be very useful in future', 'uploads/latex.jpg'),
(18, '', NULL, 'Vice Chalcelor Cup', '12/02/2021', '12:00pm', 'UIU Sports Club', '4:40pm', 'auditorium', 0, 'this is a very big opurtunity ', 'uploads/vc cup.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Contact` varchar(11) DEFAULT NULL,
  `Email_Address` varchar(100) DEFAULT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `creat_event`
--

CREATE TABLE `creat_event` (
  `id` int(11) NOT NULL,
  `Your_Name` varchar(50) NOT NULL,
  `Your_ID` int(11) DEFAULT NULL,
  `Event_Name` varchar(50) NOT NULL,
  `Event_Date` varchar(10) DEFAULT NULL,
  `Start_Date` varchar(50) DEFAULT NULL,
  `Organizer` varchar(100) DEFAULT NULL,
  `End_Date` varchar(50) DEFAULT NULL,
  `Vanue` varchar(50) DEFAULT NULL,
  `Status` int(11) DEFAULT 0,
  `Event_img` varchar(255) DEFAULT NULL,
  `Event_des` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creat_event`
--

INSERT INTO `creat_event` (`id`, `Your_Name`, `Your_ID`, `Event_Name`, `Event_Date`, `Start_Date`, `Organizer`, `End_Date`, `Vanue`, `Status`, `Event_img`, `Event_des`) VALUES
(1, 'Muzahid Islam', 11201399, 'Mock Model Union', '13/07/2023', '4:00pm', 'UIU COMPUTER CLUB', '7:00pm', 'seminarroom-floor10-room1', 0, 'uploads/Mock Model Union.jpg', 'Model Union Showcase: Where Creativity Meets Runway\" is a mesmerizing event that brings together the glamour of fashion and the artistry of modeling. Step into a world of elegance and expression as we present a captivating runway display featuring a diver'),
(13, 'khan', 33123, 'dsads', '12/02/2022', '32', 'dadasddads', '33', 'auditorium', 0, 'uploads/Database.jpg', 'dad'),
(14, 'Kasfia Afrose', 11201375, 'C Clininc', '13/04/2023', '3:00', 'UIU CCL', '4:40', 'auditorium', 0, 'uploads/C-clinic.jpg', 'dasdadwda'),
(15, 'Ismail Aabrar', 11201181, 'Web Devlopment', '20/02/2023', '12:00pm', 'UIU CCL', '3:00pm', 'seminarroom-floor8-room1', 0, 'uploads/deep learning.jpg', 'This seminar will be a great one, try to attend the seminar'),
(16, 'Rahman', 110310, 'Football Tournament', '14/01/2020', '2:00pm', 'UIU SC', '4:30pm', 'auditorium', 0, 'uploads/football.jpg', 'it will be a only freshers tournament. So, all the freshers should register.'),
(17, 'Sahel', 11212200, 'Therap', '13/02/2022', '2:00pm', 'UIU APP FORUM', '4:30', 'seminarroom-floor4-room2', 0, 'uploads/therap.jpg', 'Hello Everyone, The therap event is one of the biggest event in this time. So, Enjoy with us'),
(18, 'Sakhon', 11201303, 'Python for AI', '15/04/2023', '12:00pm', 'UIU APP FORUM', '2:00pm', 'auditorium', 0, 'uploads/python for ai.jpg', 'Unleashing the Power of Code and Intelligence\" is a dynamic and informative event designed to explore the seamless integration of Python programming with artificial intelligence (AI) technologies. Whether you\'re a seasoned coder or just beginning your jou'),
(19, 'Ryhan', 11201293, 'Cricket', '15/06/2023', '10:10am', 'UIU SPORTS CLUB', '1:00pm', 'seminarroom-floor8-room1', 0, 'uploads/cricket.jpg', 'Cricket Fest: Celebrating the Spirit of the Game\" is a thrilling event that brings together cricket enthusiasts and fans for a day of excitement, camaraderie, and sportsmanship. Join us as we celebrate the rich legacy of cricket, from iconic moments to le'),
(20, 'Shourav', 11212203, 'Indoor For Everyone', '13/08/2023', '3:00pm', 'UIU SPORTS CLUB', '5:00pm', 'seminarroom-floor5-room2', 0, 'uploads/indoor.jpg', 'Indoor Oasis: Discover, Explore, Engage\" invites you to escape the elements and immerse yourself in a world of captivating indoor activities. Whether it\'s pouring rain or scorching heat, our event offers a haven of entertainment and engagement under a com'),
(22, 'Sazzad Hossain', 11201203, 'Latex Work Shop', '20/09/2023', '2:00pm', '', '4:30pm', 'seminarroom-floor1-room1', 0, 'uploads/latex.jpg', 'Everybody should know basic Latex, it will be very useful in future'),
(23, 's', 7, 'h', '23/11/2023', '2:00pm', 'g', '5:00pm', 'auditorium', 0, 'uploads/Git and Github.jpg', 'h'),
(25, 'Arif ', 1201304, 'CSE Week ', '12/12/2024', '12:00pm', 'UIU CCL', '2:00pm', 'auditorium', 0, 'uploads/UIU CSE WEEK.jpg', 'this is a very big event for all the CSE student '),
(26, 'Mir Akram', 1301310, 'Vice Chalcelor Cup', '12/02/2021', '12:00pm', 'UIU Sports Club', '4:40pm', 'auditorium', 0, 'uploads/vc cup.jpg', 'this is a very big opurtunity '),
(27, 'Tasdasd', 0, 'dsda', '12/03/2033', '12:00pm', 'adadw', '2:oopm', 'seminarroom-floor1-room2', 0, 'uploads/Excelist.jpg', 'dasd');

-- --------------------------------------------------------

--
-- Table structure for table `pending_event`
--

CREATE TABLE `pending_event` (
  `id` int(11) NOT NULL,
  `Your_Name` varchar(50) NOT NULL,
  `Your_ID` int(11) DEFAULT NULL,
  `Event_Name` varchar(50) NOT NULL,
  `Event_Date` varchar(100) DEFAULT NULL,
  `Start_Date` varchar(50) DEFAULT NULL,
  `Organizer` varchar(100) DEFAULT NULL,
  `End_Date` varchar(50) DEFAULT NULL,
  `Vanue` varchar(50) DEFAULT NULL,
  `Status` int(11) DEFAULT 0,
  `Event_des` varchar(255) DEFAULT NULL,
  `Event_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_event`
--

INSERT INTO `pending_event` (`id`, `Your_Name`, `Your_ID`, `Event_Name`, `Event_Date`, `Start_Date`, `Organizer`, `End_Date`, `Vanue`, `Status`, `Event_des`, `Event_img`) VALUES
(26, 'Tasdasd', 0, 'dsda', '12/03/20332', '12:00pm', 'adadw', '2:oopm', 'seminarroom-floor1-room2', 0, 'dasd', 'uploads/Excelist.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration_for_event`
--

CREATE TABLE `registration_for_event` (
  `id` int(11) NOT NULL,
  `Your_Name` varchar(50) NOT NULL,
  `Your_ID` int(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Event_name` varchar(50) NOT NULL,
  `Organizer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_for_event`
--

INSERT INTO `registration_for_event` (`id`, `Your_Name`, `Your_ID`, `Email`, `Event_name`, `Organizer`) VALUES
(1, 'Mir Akram', 1120134, 'hola@gmail.com', 'UIU VC CUP', 'UIU Sports club'),
(6, 'Sazzad Anik', 1213012, 'anik@gmail.com', 'asdkasd', 'adasdkas');

-- --------------------------------------------------------

--
-- Table structure for table `registration_for_volunteer`
--

CREATE TABLE `registration_for_volunteer` (
  `id` int(11) NOT NULL,
  `Your_Name` varchar(50) NOT NULL,
  `Your_ID` int(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Event_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rejected_event`
--

CREATE TABLE `rejected_event` (
  `id` int(11) NOT NULL,
  `Your_Name` varchar(50) NOT NULL,
  `Your_ID` int(11) DEFAULT NULL,
  `Event_Name` varchar(50) NOT NULL,
  `Event_Date` varchar(100) DEFAULT NULL,
  `Start_Date` varchar(50) DEFAULT NULL,
  `Organizer` varchar(100) DEFAULT NULL,
  `End_Date` varchar(50) DEFAULT NULL,
  `Vanue` varchar(50) DEFAULT NULL,
  `Status` int(11) DEFAULT 0,
  `Event_des` varchar(255) DEFAULT NULL,
  `Event_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejected_event`
--

INSERT INTO `rejected_event` (`id`, `Your_Name`, `Your_ID`, `Event_Name`, `Event_Date`, `Start_Date`, `Organizer`, `End_Date`, `Vanue`, `Status`, `Event_des`, `Event_img`) VALUES
(3, '', NULL, 'Cricket', '12/12/2022', '10:10am', 'UIU SPORTS CLUB', '1:00pm', 'seminarroom-floor8-room1', 0, 'Cricket Fest: Celebrating the Spirit of the Game is a thrilling event that brings together cricket enthusiasts and fans for a day of excitement, camaraderie, and sportsmanship. Join us as we celebrate the rich legacy of cricket, from iconic moments to le', 'uploads/cricket.jpg'),
(4, '', NULL, 'CSE Week ', '12/12/2024', '12:00pm', 'UIU CCL', '2:00pm', 'auditorium', 0, 'this is a very big event for all the CSE student ', 'uploads/UIU CSE WEEK.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `S_ID_T_ID` int(11) DEFAULT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Contact` varchar(11) NOT NULL,
  `Email_Address` varchar(100) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `S_ID_T_ID`, `Full_Name`, `Contact`, `Email_Address`, `Password`) VALUES
(1, 11201389, 'MD. Tanvir Hossain Khan', '01795488345', 'mkhan201389@bscse.uiu.ac.bd', 'notrightorokay'),
(2, 11201366, 'jhon china', '011031044', 'kjdkadawo', ''),
(6, 11201375, 'kasfia afrose', '0131231412', 'kafrose201389@bscse.uiu.ac.bd', 'kafrose'),
(7, 11201389, 'Md. Tanvir Hossain Khan', '01303946141', 'tanvirkhan88345@gmail.com', 'Tanvir'),
(8, 11201181, 'Ismail Aabrar', '019435623', 'aabrar@gmail.com', 'aabrar'),
(10, 11201182, 'Ismail khan', '0194353241', 'khanr@gmail.com', 'khan'),
(11, 11201183, 'arif khan', '019435342', 'arif@gmail.com', 'arfir'),
(12, 1139393, 'araf khan', '0139319312', 'araf@gmail.com', 'araf'),
(13, 11201001, 'Mir Akram', '01786492826', 'hola@gmail.com', 'mir'),
(14, 11201399, 'Asif Hossain', '012304343', 'asif@gmail.com', 'asif'),
(15, 11201324, 'Arif Ka', '02304012', 'ka@gmail..com', 'ka'),
(17, 11201367, 'Istiak Mondol', '0194353241', 'kha234r@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_event`
--
ALTER TABLE `booked_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email_Address` (`Email_Address`);

--
-- Indexes for table `creat_event`
--
ALTER TABLE `creat_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_event`
--
ALTER TABLE `pending_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_for_event`
--
ALTER TABLE `registration_for_event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `registration_for_volunteer`
--
ALTER TABLE `registration_for_volunteer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `rejected_event`
--
ALTER TABLE `rejected_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email_Address` (`Email_Address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_event`
--
ALTER TABLE `booked_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `creat_event`
--
ALTER TABLE `creat_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pending_event`
--
ALTER TABLE `pending_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `registration_for_event`
--
ALTER TABLE `registration_for_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration_for_volunteer`
--
ALTER TABLE `registration_for_volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejected_event`
--
ALTER TABLE `rejected_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
