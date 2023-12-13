-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 01:56 PM
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
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred_table`
--

CREATE TABLE `admin_cred_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred_table`
--

INSERT INTO `admin_cred_table` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_table`
--

CREATE TABLE `contact_us_table` (
  `id` int(11) NOT NULL,
  `icon` varchar(1500) NOT NULL,
  `contact_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us_table`
--

INSERT INTO `contact_us_table` (`id`, `icon`, `contact_content`) VALUES
(1, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-phone\" viewBox=\"0 0 16 16\">\r\n                <path d=\"M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z\" />\r\n                <path d=\"M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z\" />\r\n            </svg>', '09158033561'),
(2, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-phone\" viewBox=\"0 0 16 16\">\r\n                <path d=\"M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z\" />\r\n                <path d=\"M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z\" />\r\n            </svg>', '09268133264'),
(3, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-phone\" viewBox=\"0 0 16 16\">\r\n                <path d=\"M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z\" />\r\n                <path d=\"M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z\" />\r\n            </svg>', '09260123261'),
(4, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-facebook\" viewBox=\"0 0 16 16\">\r\n                    <path d=\"M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951\" />\r\n                </svg>', 'TEAL Residences '),
(5, '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-envelope\" viewBox=\"0 0 16 16\">\r\n                    <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z\" />\r\n                </svg>', 'support_teal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `credentials_table`
--

CREATE TABLE `credentials_table` (
  `id` int(11) NOT NULL,
  `who_we_are` varchar(700) NOT NULL,
  `location` varchar(700) NOT NULL,
  `site_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials_table`
--

INSERT INTO `credentials_table` (`id`, `who_we_are`, `location`, `site_title`) VALUES
(1, 'Set against the backdrop of Baguio\'s verdant pines, TEAL Residences is DMCI Homes\' latest leisure residential development. Find reason to celebrate life and more, as you explore the rich culture and heritage of Baguio City. Take delight in new gastronomic pleasures or be inspired with the works of art found at the local market. Sit back, relax and have a closer feel of nature everytime you wake up to the familiar scent of pine in the air.', '<iframe\r\n            src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1195.625030333825!2d120.62488887736721!3d16.412866310117458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a6ac6e245fc3%3A0xb66842d991e80254!2sOutlook%20Ridge%20Residences!5e1!3m2!1sen!2sph!4v1700546439952!5m2!1sen!2sph\"\r\n            width=\"100%\" height=\"500\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"\r\n            referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'TEAL Residences');

-- --------------------------------------------------------

--
-- Table structure for table `facilities_table`
--

CREATE TABLE `facilities_table` (
  `id` int(11) NOT NULL,
  `icon` varchar(1500) NOT NULL,
  `item` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities_table`
--

INSERT INTO `facilities_table` (`id`, `icon`, `item`) VALUES
(1, '<i class=\"bi bi-wifi\"></i>', 'Free Wi-Fi'),
(2, '<i class=\"bi bi-tv\"></i>', 'TV'),
(3, '<i class=\"bi bi-building\"></i>', 'Elevator'),
(4, '<i class=\"bi bi-water\"></i>', 'Laundry'),
(5, '<i class=\"bi bi-p-circle\"></i>', 'Free Parking'),
(6, '<i class=\"bi bi-cassette\"></i>', 'Kitchen Facilities'),
(7, '<i class=\"bi bi-wind\"></i>', 'Air Conditioning');

-- --------------------------------------------------------

--
-- Table structure for table `faq_table`
--

CREATE TABLE `faq_table` (
  `id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq_table`
--

INSERT INTO `faq_table` (`id`, `question`, `answer`) VALUES
(1, 'When is check-in time and check-out time at TEAL Residences apartments?', 'The check-in time at TEAL Residences apartments starts at 3 PM and check-out time is\n                 till 11 AM.'),
(2, 'Are there any restaurants close to TEAL Residences apartments?', 'Yes, you can have a meal at Le Vain Bakery and Chef\'s Home located about 750 feet away from\r\n                     TEAL Residences apartments.'),
(3, ' Can we request additional beds at these apartments?', 'These apartments do not offer extra beds.'),
(4, 'Are pets allowed at these apartments?', 'No, these apartments aren\'t pet-friendly. Please contact the property to learn more about the\r\n                     exact terms and conditions.'),
(5, ' Can we park our car near TEAL Residences apartments?', ' Yes, guests of TEAL Residences apartments can leave their car in free parking on site.'),
(6, 'How much does it cost to rent TEAL Residences apartments?', ' Prices at TEAL Residences apartments start at $179.');

-- --------------------------------------------------------

--
-- Table structure for table `ready_to_reserve_table`
--

CREATE TABLE `ready_to_reserve_table` (
  `id` int(11) NOT NULL,
  `room_picture` varchar(200) NOT NULL,
  `room_title` varchar(200) NOT NULL,
  `room_desc` varchar(600) NOT NULL,
  `room_max` tinyint(4) NOT NULL,
  `per_night` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ready_to_reserve_table`
--

INSERT INTO `ready_to_reserve_table` (`id`, `room_picture`, `room_title`, `room_desc`, `room_max`, `per_night`) VALUES
(19, 'fam_room.jpg', 'Family Room', 'Our Family Room provides a comfortable and spacious retreat for two persons, perfect for a couple\'s getaway. Enjoy a cozy atmosphere with thoughtful amenities to make your stay memorable.', 2, 3500),
(20, 'apartment.jpg', 'Apartment', 'Experience comfort and luxury in our Apartment, designed for a perfect retreat for two. This spacious and elegantly furnished apartment combines modern amenities with a touch of sophistication, ensuring a memorable stay for our guests.', 2, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_picture` varchar(500) NOT NULL,
  `room_title` varchar(100) NOT NULL,
  `room_description` varchar(450) NOT NULL,
  `room_max_person` tinyint(20) NOT NULL,
  `per_night` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_picture`, `room_title`, `room_description`, `room_max_person`, `per_night`) VALUES
(1, 'apartment.jpg', 'Apartment', 'Experience comfort and luxury in our Apartment, designed for a perfect retreat for two. This spacious and elegantly furnished apartment combines modern amenities with a touch of sophistication, ensuring a memorable stay for our guests.', 2, 4000),
(2, 'fam_room.jpg', 'Family Room', 'Our Family Room provides a comfortable and spacious retreat for two persons, perfect for a couple\'s getaway. Enjoy a cozy atmosphere with thoughtful amenities to make your stay memorable.', 2, 3500),
(3, 'fam_suite.jpg', 'Family Suite', 'Indulge in the comfort of our Family Suite, a spacious retreat designed to accommodate up to four persons. Perfect for family vacations or group getaways, this suite offers a blend of style and functionality to ensure a memorable stay for everyone.', 4, 6500),
(4, 'one_bed.jpg', 'One-Bedroom Suite', 'Experience the perfect blend of comfort and style in our One-Bedroom Suite, designed for couples seeking a spacious and private retreat. This suite offers a separate bedroom and living area, providing an ideal setting for a romantic getaway or a relaxing escape.', 2, 5000),
(55, 'Purple aesthetic phone wallpaper.jpg', 'Deluxe', 'Residential', 4, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `user_queries_table`
--

CREATE TABLE `user_queries_table` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_verified` tinyint(50) NOT NULL DEFAULT 0,
  `confirmation_code` varchar(60) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `token` varchar(64) NOT NULL,
  `expiration_time` datetime NOT NULL DEFAULT (current_timestamp() + interval 1 hour)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `name`, `email`, `password`, `is_verified`, `confirmation_code`, `created_at`, `token`, `expiration_time`) VALUES
(18, 'qwe', 'palisocericson87@gmail.com', '$2y$10$muIuLyRWlsEcqoSwZ2hSLumSZmnSnHvTxfA67u4WPmmITdO2g5cR2', 1, 'xXxXt18lAjBvsbUjFoC5ME2VH74BDQT8', '2023-11-26', '', '2023-11-26 19:11:51'),
(19, 'Leandro', 'hfffgh244@gmail.com', '$2y$10$Zn/GsfZfyl7Ffg4Jzh3IIet6q3CS6odFRqxQdkqxvl3qu1OYZ9l1S', 0, 'kIsZPN2ypyTsbdQuwNCYjEuRxDWaoas9', '2023-12-12', '', '2023-12-12 11:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us_table`
--

CREATE TABLE `why_choose_us_table` (
  `id` int(11) NOT NULL,
  `icon` varchar(1500) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_choose_us_table`
--

INSERT INTO `why_choose_us_table` (`id`, `icon`, `title`, `description`) VALUES
(1, '<i class=\"bi bi-arrow-90deg-down\"></i>', 'LOWEST PRICE GUARANTEE', 'We compare prices from over 50 hotel suppliers to ensure the best rates. If you happen to find the same room.'),
(2, '<i class=\"bi bi-fast-forward\"></i>', 'BOOKING IN 2 MINUTES', 'You can easily find any accommodation details to quickly choose the best option and make a reservation in less than 2 minutes.'),
(3, '<i class=\"bi bi-file-earmark-lock\"></i>', 'YOUR PAYMENT IS SECURED', 'Our servers and network are protected by up-to-date technology to keep your personal information and card details in strict confidence.'),
(4, '<i class=\"bi bi-ban\"></i>', 'NO HIDDEN FEES', 'We only display final prices and charge you no additional fees. Detailed and regularly updated terms of payment are always at your disposal.'),
(5, '<i class=\"bi bi-speedometer2\"></i>', 'INSTANT CONFIRMATION', 'We are efficient! Right after a reservation is made, you\'ll find a booking confirmation in your mailbox.'),
(6, '<i class=\"bi bi-duffle\"></i>', 'FLEXIBLE PAYMENT', 'Most accommodations have free cancellation, low rate and pay at hotel options. Choose the ones that suit your needs and wants for\r\nbetter exp.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred_table`
--
ALTER TABLE `admin_cred_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact_us_table`
--
ALTER TABLE `contact_us_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credentials_table`
--
ALTER TABLE `credentials_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities_table`
--
ALTER TABLE `facilities_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_table`
--
ALTER TABLE `faq_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ready_to_reserve_table`
--
ALTER TABLE `ready_to_reserve_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user_queries_table`
--
ALTER TABLE `user_queries_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `why_choose_us_table`
--
ALTER TABLE `why_choose_us_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred_table`
--
ALTER TABLE `admin_cred_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_table`
--
ALTER TABLE `contact_us_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `credentials_table`
--
ALTER TABLE `credentials_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities_table`
--
ALTER TABLE `facilities_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq_table`
--
ALTER TABLE `faq_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ready_to_reserve_table`
--
ALTER TABLE `ready_to_reserve_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user_queries_table`
--
ALTER TABLE `user_queries_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `why_choose_us_table`
--
ALTER TABLE `why_choose_us_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
