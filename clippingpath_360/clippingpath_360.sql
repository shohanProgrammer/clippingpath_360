-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2021 at 05:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clippingpath_360`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_req`
--

CREATE TABLE `all_req` (
  `id` int(10) NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `budget` varchar(50) NOT NULL,
  `posted` varchar(10) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `client_id` int(10) NOT NULL,
  `extra_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `all_req`
--

INSERT INTO `all_req` (`id`, `service_type`, `job_title`, `description`, `attachment`, `budget`, `posted`, `duration`, `status`, `client_id`, `extra_status`) VALUES
(1, 'Background remove', 'Remove background of 200 images', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.', '', '80', '0000-00-00', '12-05-2017', 'onapproval', 2, 'all'),
(2, 'Background remove', 'Remove background of 200 images', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.', '', '80', '0000-00-00', '12-05-2017', 'completed', 2, 'completed'),
(3, 'Background remove', 'Remove background of 300 images', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.', '', '80', '0000-00-00', '12-05-2017', 'rejected', 2, ''),
(4, 'Client', 'Remove background of 200 images', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.', '', '80', '0000-00-00', '12-05-2017', 'rejected', 4, ''),
(5, 'Background remove', 'Remove background of 200 images', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.', '', '80', '0000-00-00', '12-05-2017', 'onapproval', 5, ''),
(6, 'Image Resize', 'Image resize korte hobe (100)', 'The ucfirst() function converts the first character of a string to uppercase. Related functions: lcfirst() - converts the first character of a string to lowercase. ucwords() - converts the first character of each word in a string to uppercase.', '19-21.jpg', '55', '0000-00-00', '07-06-2017', 'onapproval', 2, ''),
(11, 'Background Remove', 'sample11', 'sample descriptions', '2.jpg', '33', '0000-00-00', '05-07-2017', 'completed', 2, 'completed'),
(12, 'Background Remove', '44', 'dd', '13.jpg', '44', '0000-00-00', '04-07-2017', 'onapproval', 2, ''),
(13, 'Background Remove', 'dadad', 'gnfhtdg', 'a.jpg', '345', '0000-00-00', 'Category 1', 'onrevision', 2, 'onrevision'),
(14, 'Background Remove', 'good job', 'this is good', '1q.jpg', '40', '13-07-2017', 'Category 3', 'ongoing', 2, 'onapproval'),
(15, 'Background Remove', 'New job', 'This is the ultimate test before submitting the project', '170411_Benjamin_Banks.pdf', '34', '02-08-2017', 'Less than 24hours', 'pending', 2, ''),
(16, 'Background Remove', 'New job2', 'Test running', '127.jpg', '443', '02-08-2017', '1-3 weeks', 'pending', 2, ''),
(17, 'Background Remove', 'New job3', 'Test is still running', '128.jpg', '343', '02-08-2017', 'Less than 24hours', 'pending', 2, 'pending'),
(18, 'Background Remove', 'This is the last', 'This is the last', '23.jpg', '4545', '02-08-2017', 'Less than 24hours', 'pending', 2, ''),
(19, 'Image Resize', 'Sample 2017', 'casca', 'caxz.png', '34', '13-08-2017', 'Less than one week', 'pending', 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `star` int(10) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `job_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `star`, `comment`, `job_id`, `client_id`) VALUES
(1, 5, 'Wow.. amazing', 2, 2),
(7, 4, 'four stars', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `permission` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `job_status`
--

CREATE TABLE `job_status` (
  `id` int(10) NOT NULL,
  `screenshot` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `job_id` int(10) NOT NULL,
  `revision_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_status`
--

INSERT INTO `job_status` (`id`, `screenshot`, `comment`, `job_id`, `revision_number`) VALUES
(2, '110.jpg', 'yufyrdtrd', 11, 0),
(3, '114.jpg', 'dadada', 11, 0),
(4, '211.jpg', 'efefsv', 11, 0),
(5, 'screenshot.jpg', 'dododod', 11, 0),
(6, 'screenshot1.jpg', 'some info', 13, 0),
(7, 'screenshot2.jpg', 'Onak kotha', 13, 0),
(39, 'screenshot32.jpg', 'dilam', 13, 2),
(40, 'screenshot36.jpg', 'ddededeedpop', 14, 0),
(41, 'screenshot37.jpg', 'popopop', 13, 2),
(42, 'screenshot.png', 'aaaa', 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE `revision` (
  `id` int(10) NOT NULL,
  `message` varchar(200) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `job_id` varchar(10) NOT NULL,
  `client_id` varchar(10) NOT NULL,
  `posted` varchar(10) NOT NULL,
  `revision_limit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revision`
--

INSERT INTO `revision` (`id`, `message`, `attachment`, `status`, `job_id`, `client_id`, `posted`, `revision_limit`) VALUES
(1, 'dadada', '113.jpg', 'new', '2', '2', '', 1),
(2, 'dadada', '113.jpg', 'new', '2', '2', '', 2),
(3, 'dead', 'aaq.jpg', 'new', '11', '2', '20-07-2017', 1),
(4, 'dsds', '4Cm6mWH.jpg', 'new', '2', '2', '20-07-2017', 3),
(5, 'ddd', '17309300_759013040914641_4710099656642834989_n.jpg', 'new', '11', '2', '24-07-2017', 2),
(6, 'sestsy', '2_(1)1.jpg', 'new', '11', '2', '31-07-2017', 3),
(7, 'qerwrw', '120.jpg', 'new', '13', '2', '31-07-2017', 1),
(8, 'agsrh', '19-21_(2).jpg', 'new', '13', '2', '31-07-2017', 2);

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` int(10) NOT NULL,
  `service_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `service_name`) VALUES
(1, 'Background Remove'),
(2, 'Image Resize'),
(3, 'Manipulation ');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `posted` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `category`, `description`, `status`, `client_id`, `subject`, `posted`) VALUES
(1, 'Payment', 'Taka nai', 'all', 2, 'Serious issue', ''),
(3, 'Technical', 'sdgdhdtjht', 'new', 2, 'sfshd', '01-08-2017'),
(4, 'Payment', 'nakljoiahfa', 'new', 2, 'xsdasda', '01-08-2017'),
(5, 'Others', 'afsgwsr', 'all', 2, 'dfsgsdh', '01-08-2017');

-- --------------------------------------------------------

--
-- Table structure for table `user_section`
--

CREATE TABLE `user_section` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_section`
--

INSERT INTO `user_section` (`user_id`, `user_name`, `user_pass`, `user_type`, `first_name`, `last_name`, `email`, `phone`, `country`) VALUES
(1, 'admin', 'admin', 'admin', 'MD', 'Nayem', 'azizmahmud2014@gmail.com', '01776554571', ''),
(2, 'client', '12345', 'client', 'MD', 'Nayem', 'azizmahmud2013@gmail.com', '01776554571', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_req`
--
ALTER TABLE `all_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_status`
--
ALTER TABLE `job_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_section`
--
ALTER TABLE `user_section`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_req`
--
ALTER TABLE `all_req`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_status`
--
ALTER TABLE `job_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `revision`
--
ALTER TABLE `revision`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_section`
--
ALTER TABLE `user_section`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
