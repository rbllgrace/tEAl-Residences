-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 03:14 PM
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
(1, '<i class=\"bi bi-phone\"></i>', '09158033561'),
(2, '<i class=\"bi bi-phone\"></i>', '09268133264'),
(3, '<i class=\"bi bi-phone\"></i>', '09260123261'),
(4, '<i class=\"bi bi-facebook\"></i>', 'TEAL Residences '),
(5, '<i class=\"bi bi-envelope\"></i>', 'support_teal@gmail.com');

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
(1, 'Set against the backdrop of Baguio\'s verdant pines, TEAL Residences is DMCI Homes\' latest leisure residential development. Find reason to celebrate life and more, as you explore the rich culture and heritage of Baguio City. Take delight in new gastronomic pleasures or be inspired with the works of art found at the local market. Sit back, relax and have a closer feel of nature every time you wake up to the familiar scent of pine in the air.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d976.7747069742804!2d120.62485224811782!3d16.41294724435101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a6ac6e245fc3:0xb66842d991e80254!2sOutlook Ridge Residences!5e1!3m2!1sen!2sph!4v1702822880805!5m2!1sen!2sph\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'TEAL Residences');

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
(7, '<i class=\"bi bi-wind\"></i>', 'Air Conditioning'),
(11, '<i class=\"bi bi-0-circle\"></i>', 'qwe qwe qwe');

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
-- Table structure for table `password_reset_table`
--

CREATE TABLE `password_reset_table` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiration_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `per_night` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_picture`, `room_title`, `room_description`, `room_max_person`, `per_night`, `updated_at`, `created_at`) VALUES
(1, 'apartment.jpg', 'Apartment', 'Experience comfort and luxury in our Apartment, designed for a perfect retreat for two. This spacious and elegantly furnished apartment combines modern amenities with a touch of sophistication, ensuring a memorable stay for our guests.', 2, 4000, '2023-12-19 15:16:48', '2023-12-19 15:33:52'),
(2, 'fam_room.jpg', 'Family Room', 'Our Family Room provides a comfortable and spacious retreat for two persons, perfect for a couple\'s getaway. Enjoy a cozy atmosphere with thoughtful amenities to make your stay memorable.', 2, 3500, '2023-12-19 15:16:48', '2023-12-19 15:33:52'),
(3, 'fam_suite.jpg', 'Family Suite', 'Indulge in the comfort of our Family Suite, a spacious retreat designed to accommodate up to four persons. Perfect for family vacations or group getaways, this suite offers a blend of style and functionality to ensure a memorable stay for everyone.', 4, 6500, '2023-12-19 15:16:48', '2023-12-19 15:33:52'),
(4, 'one_bed.jpg', 'One-Bedroom Suite', 'Experience the perfect blend of comfort and style in our One-Bedroom Suite, designed for couples seeking a spacious and private retreat. This suite offers a separate bedroom and living area, providing an ideal setting for a romantic getaway or a relaxing escape.', 2, 5000, '2023-12-19 15:16:48', '2023-12-19 15:33:52');

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
(18, 'qwe', 'palisocericson87@gmail.com', '$2y$10$QrxSN.G8bsb8ofzj/RsAIuqT6UjSJWodSOjE8/CP/FFGRUuk1peei', 1, 'eePGaxCjWu4wmM8E8bKMTGLame1KV4bG', '2023-11-26', '', '2023-11-26 19:11:51'),
(22, 'Arabella', 'arabel@gmail.com', '$2y$10$zXLuZ910MyFgdRVdg4xBzeBzF3pa9BTHcDbTLsjSM2jvIeGi1KvS6', 1, 'UdXnChUUsfg2Hf93K4YrQMyexqFkjxnm', '2023-12-19', '', '2023-12-19 01:09:12'),
(23, 'Leandro', 'leandro@gmail.com', '$2y$10$azsnbBx73OMhS5vpG5032.ObvnLiZWn2qpDVNiFuizMBjq9dxuEBW', 1, 'DnMrAZhZaA1l1f2O9gtDGKye8kT52PtE', '2023-12-19', '', '2023-12-19 11:01:24'),
(24, 'Twinkle', 'twinkle@gmail.com', '$2y$10$XF/TCm.6CX4EPbwThSwyFepWHkj7eTZKOrzFfHPnWLpxQWUcTE2Hm', 0, 'MuX9HgsUJaQ3T7GSz7ZoecUTClQuz4yh', '2023-12-19', '', '2023-12-19 11:01:53'),
(25, 'test', 'test1@gmail.com', '$2y$10$Z3h3rxix/OUI9YaAxVFfFO5Afx8bf1IMCpzWKFRWorR.uh3Qrg3Z6', 1, 'ruSb7ZC8yoKLDLTWEbmCwLaCGSwtO4Zw', '2023-12-19', '', '2023-12-19 11:02:21'),
(27, 'Nica', 'nica@gmail.com', '$2y$10$ZRERRIyGWxG1bDt5O3Nfw.B.pwO8VzUMQUzFfoTfDAgCP.A7D1nCG', 0, '0ELPXKZKAjV3FC61VjZA6AC3BIcACiP3', '2023-12-19', '', '2023-12-19 12:45:49'),
(28, 'Nica', 'nica@gmail.com', '$2y$10$mfSnuVNpR6CCLQh/FM01nOhym41SFoALAR.dgoNNpIBRRtBJpok8.', 0, 'msNHn5C6kG4gx86WarkOKKZalrdTzN1k', '2023-12-19', '', '2023-12-19 12:45:49'),
(29, 'miah', 'miah@gmail.com', '$2y$10$Lj2fR0rOcVAgL.A8e8gLLOoJD0KG490aPqMwGf6OZ4Pa/zfVI2YJy', 0, 'kfUmetQWibGYSevUm44sn0tqq4Y02VWQ', '2023-12-19', '', '2023-12-19 12:46:03'),
(30, 'erica', 'erica@gmail.com', '$2y$10$tORtFUW7wgaagHyJQC9fvuu4IspiZgoelxdBs29aK8AVb1gowRVjK', 0, 'cNnn1TUsEl8seoTOX7L0atdFJZRTwPXs', '2023-12-19', '', '2023-12-19 12:46:17'),
(31, 'madz', 'madelyn@gmail.com', '$2y$10$iaKMkNE01RN98lW/4/kkeu3RAxR08oHG.DJi1GHpSF5IVV9KYY6Fa', 0, 'b8l8keKqgDF11ANE7pI7iSxv1Kv0YEA5', '2023-12-19', '', '2023-12-19 12:46:33'),
(32, 'Warlito', 'warlito@gmail.com', '$2y$10$1b/1sswcCUwU.XSke7Ga9.GbpRMYHV.qZ1XZDMnsJ94r7ItwIXBqq', 0, 'jOoaRX3OhHDIwIldubtlqog9hSlSc765', '2023-12-19', '', '2023-12-19 12:46:49'),
(33, 'Gina', 'gina@gmail.com', '$2y$10$vWiVQuzceuhKutqS2LfJ3eDyv5oUzP7jEZIx.evW949LKoZ6/AxFa', 0, 'ZjrFMrhIf73qDvZA6QwbOwzZ8VvPhnnc', '2023-12-19', '', '2023-12-19 12:47:00');

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
-- Indexes for table `password_reset_table`
--
ALTER TABLE `password_reset_table`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `credentials_table`
--
ALTER TABLE `credentials_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities_table`
--
ALTER TABLE `facilities_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faq_table`
--
ALTER TABLE `faq_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `password_reset_table`
--
ALTER TABLE `password_reset_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ready_to_reserve_table`
--
ALTER TABLE `ready_to_reserve_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_queries_table`
--
ALTER TABLE `user_queries_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `why_choose_us_table`
--
ALTER TABLE `why_choose_us_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
