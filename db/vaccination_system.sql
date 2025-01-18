-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 10:41 AM
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
-- Database: `vaccination_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `child_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` enum('pending','completed','cancelled','next_dose') DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `child_id`, `hospital_id`, `vaccine_id`, `appointment_date`, `appointment_time`, `status`, `notes`, `created_at`) VALUES
(5, 5, 5, 5, '2024-01-10', '10:00:00', 'completed', NULL, '2025-01-14 07:19:55'),
(6, 6, 6, 6, '2024-02-05', '11:00:00', 'completed', NULL, '2025-01-14 07:19:55'),
(7, 7, 1, 2, '2024-02-07', '09:00:00', 'completed', NULL, '2025-01-14 07:19:55'),
(8, 8, 2, 1, '2024-02-10', '10:00:00', 'completed', NULL, '2025-01-14 07:19:55'),
(9, 9, 3, 3, '2024-02-12', '11:00:00', 'completed', NULL, '2025-01-14 07:19:55'),
(11, 11, 5, 5, '2024-03-05', '10:00:00', 'completed', NULL, '2025-01-14 07:19:55'),
(12, 12, 6, 6, '2024-03-07', '11:00:00', 'completed', NULL, '2025-01-14 07:19:55'),
(13, 13, 1, 1, '2024-03-10', '09:00:00', 'cancelled', NULL, '2025-01-14 07:19:55'),
(14, 14, 2, 2, '2024-03-12', '10:00:00', 'pending', NULL, '2025-01-14 07:19:55'),
(15, 15, 3, 3, '2024-03-15', '11:00:00', 'completed', NULL, '2025-01-14 07:19:55'),
(16, 16, 4, 4, '2024-04-05', '09:00:00', 'cancelled', 'fds', '2025-01-14 07:19:55'),
(17, 17, 5, 5, '2024-04-07', '10:00:00', 'cancelled', 'dsad', '2025-01-14 07:19:55'),
(18, 18, 6, 6, '2024-04-10', '11:00:00', 'pending', 'dfsdf', '2025-01-14 07:19:55'),
(19, 19, 1, 1, '2024-04-12', '09:00:00', 'cancelled', 'fsdfsdf', '2025-01-14 07:19:55'),
(20, 20, 2, 2, '2024-04-15', '10:00:00', 'pending', 'dsfs', '2025-01-14 07:19:55'),
(21, 21, 3, 3, '2024-05-05', '11:00:00', 'pending', 'dsassa', '2025-01-14 07:19:55'),
(22, 22, 4, 4, '2024-05-07', '09:00:00', 'cancelled', 'sasdsa', '2025-01-14 07:19:55'),
(23, 23, 5, 5, '2024-05-10', '10:00:00', 'next_dose', NULL, '2025-01-14 07:19:55'),
(24, 24, 6, 6, '2024-05-12', '11:00:00', 'next_dose', NULL, '2025-01-14 07:19:55'),
(25, 25, 1, 1, '2024-05-15', '09:00:00', 'next_dose', NULL, '2025-01-14 07:19:55'),
(26, 26, 2, 2, '2024-06-05', '10:00:00', 'pending', NULL, '2025-01-14 07:19:55'),
(27, 27, 3, 3, '2024-06-07', '11:00:00', 'next_dose', 'dfssdf', '2025-01-14 07:19:55'),
(28, 28, 4, 4, '2024-06-10', '09:00:00', 'pending', NULL, '2025-01-14 07:19:55'),
(29, 29, 5, 5, '2024-06-12', '10:00:00', 'completed', NULL, '2025-01-14 07:19:55'),
(33, 28, 4, 4, '2025-01-17', '11:00:00', 'cancelled', 'vaccine not avaliable', '2025-01-15 10:44:06'),
(35, 39, 5, 5, '2025-01-16', '10:00:00', 'completed', '', '2025-01-15 14:38:12'),
(37, 28, 4, 9, '2025-01-17', '11:00:00', 'cancelled', 'vaccine not avaliable', '2025-01-15 10:44:06'),
(38, 39, 5, 1, '2025-01-16', '10:00:00', 'cancelled', 'out of stock\r\n', '2025-01-15 14:38:12'),
(39, 42, 1, 2, '2025-01-18', '09:00:00', 'pending', '', '2025-01-16 16:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `parent_id`, `name`, `dob`, `gender`, `blood_group`, `created_at`) VALUES
(5, 10, 'Aisha Ali', '2021-11-30', 'female', 'B-', '2025-01-13 10:09:52'),
(6, 10, 'Yusuf Ali', '2023-02-14', 'male', 'O+', '2025-01-13 10:09:52'),
(7, 11, 'Fatima Khan', '2022-07-25', 'female', 'A+', '2025-01-13 10:09:52'),
(8, 11, 'Ahmad Khan', '2021-12-03', 'male', 'B+', '2025-01-13 10:09:52'),
(9, 11, 'Zainab Khan', '2023-03-20', 'female', 'O-', '2025-01-13 10:09:52'),
(11, 12, 'Sara Malik', '2021-09-28', 'female', 'B+', '2025-01-13 10:09:52'),
(12, 12, 'Usman Malik', '2023-04-05', 'male', 'A+', '2025-01-13 10:09:52'),
(13, 13, 'Amina Syed', '2022-04-30', 'female', 'O+', '2025-01-13 10:09:52'),
(14, 13, 'Bilal Syed', '2021-10-15', 'male', 'B+', '2025-01-13 10:09:52'),
(15, 13, 'Hania Syed', '2023-01-25', 'female', 'AB+', '2025-01-13 10:09:52'),
(16, 14, 'Omar Qureshi', '2022-06-08', 'male', 'A-', '2025-01-13 10:09:52'),
(17, 14, 'Ayesha Qureshi', '2021-11-19', 'female', 'O+', '2025-01-13 10:09:52'),
(18, 14, 'Ali Qureshi', '2023-02-28', 'male', 'B+', '2025-01-13 10:09:52'),
(19, 15, 'Saad Rizvi', '2022-08-14', 'male', 'AB+', '2025-01-13 10:09:52'),
(20, 15, 'Mehwish Rizvi', '2021-12-22', 'female', 'O+', '2025-01-13 10:09:52'),
(21, 15, 'Asad Rizvi', '2023-03-10', 'male', 'A+', '2025-01-13 10:09:52'),
(22, 16, 'Rabia Shah', '2022-02-28', 'female', 'B+', '2025-01-13 10:09:52'),
(23, 16, 'Imran Shah', '2021-09-11', 'male', 'O-', '2025-01-13 10:09:52'),
(24, 16, 'Sana Shah', '2023-04-18', 'female', 'AB+', '2025-01-13 10:09:52'),
(25, 17, 'Danish Hassan', '2022-05-01', 'male', 'A+', '2025-01-13 10:09:52'),
(26, 17, 'Noor Hassan', '2021-10-25', 'female', 'B+', '2025-01-13 10:09:52'),
(27, 17, 'Talha Hassan', '2023-01-30', 'male', 'O+', '2025-01-13 10:09:52'),
(28, 18, 'Maham Baig', '2022-07-19', 'female', 'B+', '2025-01-13 10:09:52'),
(29, 18, 'Farhan Baig', '2021-12-08', 'male', 'B+', '2025-01-13 10:09:52'),
(39, 19, 'hafsa', '2022-02-12', 'female', 'A-', '2025-01-15 14:36:13'),
(42, 19, 'anus', '2025-01-07', 'male', 'B+', '2025-01-16 16:18:44'),
(43, 19, 'Ibrahim Ali 2', '2024-12-30', 'male', 'A-', '2025-01-16 16:27:44'),
(46, 1, 'Ibrahim Ali 2', '2025-01-06', 'male', 'A+', '2025-01-17 05:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `registration` varchar(555) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `Rating` enum('1','2','3','4','5') NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `email`, `registration`, `phone`, `address`, `city`, `Rating`, `status`, `created_at`) VALUES
(1, 'Shifa International Hospital', 'info@shifa.pk', 'REG-2024-001', '051-8464646', 'H-8/4, Pitras Bukhari Road', 'Islamabad', '5', 'Active', '2025-01-14 07:23:13'),
(2, 'Aga Khan University Hospital', 'contact@aku.edu.pk', 'REG-2024-002', '021-34930051', 'Stadium Road, P.O. Box 3500', 'Karachi', '5', 'Active', '2025-01-14 07:23:13'),
(3, 'Doctors Hospital', 'info@doctorshospital.com.pk', 'REG-2024-003', '042-35862931', '152 Johar Town', 'Lahore', '4', 'Active', '2025-01-14 07:23:13'),
(4, 'Fauji Foundation Hospital', 'contact@ffh.pk', 'REG-2024-004', '051-5788150', 'Jhelum Road', 'Rawalpindi', '4', 'Active', '2025-01-14 07:23:13'),
(5, 'Liaquat National Hospital', 'info@lnh.edu.pk', 'REG-2024-005', '021-34412271', 'National Stadium Road', 'Karachi', '3', 'Active', '2025-01-14 07:23:13'),
(6, 'CMH Hospital', 'info@cmh.gov.pk', 'REG-2024-006', '042-99201111', 'Abdul Rehman Road', 'Lahore', '5', 'Active', '2025-01-14 07:23:13'),
(7, 'PIMS Hospital', 'contact@pims.gov.pk', 'REG-2024-007', '051-9261170', 'G-8/3', 'Islamabad', '3', 'Active', '2025-01-14 07:23:13'),
(8, 'Jinnah Hospital', 'info@jinnah.pk', 'REG-2024-008', '042-99231443', 'Allama Iqbal Road', 'Lahore', '4', 'Active', '2025-01-14 07:23:13'),
(9, 'Ziauddin Hospital', 'info@ziauddin.pk', 'REG-2024-009', '021-35862937', 'Block B, North Nazimabad', 'Karachi', '3', 'Active', '2025-01-14 07:23:13'),
(10, 'Al-Shifa Trust Eye Hospital', 'contact@alshifa.org.pk', 'REG-2024-010', '051-5487820', 'Jhelum Road', 'Rawalpindi', '4', 'Inactive', '2025-01-14 07:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_vaccines`
--

CREATE TABLE `hospital_vaccines` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `current_stock` enum('Available','Low Stock','Out of Stock') NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital_vaccines`
--

INSERT INTO `hospital_vaccines` (`id`, `hospital_id`, `vaccine_id`, `quantity`, `current_stock`, `last_updated`) VALUES
(1, 1, 1, 280, 'Available', '2025-01-14 07:33:52'),
(2, 1, 2, 145, 'Low Stock', '2025-01-14 07:33:52'),
(3, 1, 3, 90, 'Out of Stock', '2025-01-14 07:33:52'),
(4, 1, 4, 200, 'Available', '2025-01-14 07:33:52'),
(5, 1, 5, 170, 'Available', '2025-01-14 07:33:52'),
(6, 1, 6, 120, 'Out of Stock', '2025-01-14 07:33:52'),
(7, 1, 7, 140, 'Low Stock', '2025-01-14 07:33:52'),
(8, 1, 8, 250, 'Available', '2025-01-14 07:33:52'),
(9, 1, 9, 95, 'Out of Stock', '2025-01-14 07:33:52'),
(10, 1, 10, 180, 'Available', '2025-01-14 07:33:52'),
(11, 2, 1, 190, 'Available', '2025-01-14 07:33:52'),
(12, 2, 2, 130, 'Low Stock', '2025-01-14 07:33:52'),
(13, 2, 3, 220, 'Available', '2025-01-14 07:33:52'),
(14, 2, 4, 85, 'Out of Stock', '2025-01-14 07:33:52'),
(15, 2, 5, 145, 'Low Stock', '2025-01-14 07:33:52'),
(16, 2, 6, 270, 'Available', '2025-01-14 07:33:52'),
(17, 2, 7, 110, 'Out of Stock', '2025-01-14 07:33:52'),
(18, 2, 8, 160, 'Available', '2025-01-14 07:33:52'),
(19, 2, 9, 140, 'Low Stock', '2025-01-14 07:33:52'),
(20, 2, 10, 95, 'Out of Stock', '2025-01-14 07:33:52'),
(21, 3, 1, 150, 'Available', '2025-01-14 07:33:52'),
(22, 3, 2, 180, 'Available', '2025-01-14 07:33:52'),
(23, 3, 3, 130, 'Low Stock', '2025-01-14 07:33:52'),
(24, 3, 4, 290, 'Available', '2025-01-14 07:33:52'),
(25, 3, 5, 80, 'Out of Stock', '2025-01-14 07:33:52'),
(26, 3, 6, 145, 'Low Stock', '2025-01-14 07:33:52'),
(27, 3, 7, 230, 'Available', '2025-01-14 07:33:52'),
(28, 3, 8, 120, 'Out of Stock', '2025-01-14 07:33:52'),
(29, 3, 9, 170, 'Available', '2025-01-14 07:33:52'),
(30, 3, 10, 140, 'Low Stock', '2025-01-14 07:33:52'),
(31, 4, 1, 95, 'Out of Stock', '2025-01-14 07:33:52'),
(32, 4, 2, 260, 'Available', '2025-01-14 07:33:52'),
(33, 4, 3, 140, 'Low Stock', '2025-01-14 07:33:52'),
(34, 4, 4, 170, 'Available', '2025-01-14 07:33:52'),
(35, 4, 5, 130, 'Low Stock', '2025-01-14 07:33:52'),
(36, 4, 6, 85, 'Out of Stock', '2025-01-14 07:33:52'),
(37, 4, 7, 190, 'Available', '2025-01-14 07:33:52'),
(38, 4, 8, 145, 'Low Stock', '2025-01-14 07:33:52'),
(39, 4, 9, 240, 'Available', '2025-01-14 07:33:52'),
(40, 4, 10, 120, 'Out of Stock', '2025-01-14 07:33:52'),
(41, 5, 1, 160, 'Available', '2025-01-14 07:33:52'),
(42, 5, 2, 90, 'Out of Stock', '2025-01-14 07:33:52'),
(43, 5, 3, 280, 'Available', '2025-01-14 07:33:52'),
(44, 5, 4, 145, 'Low Stock', '2025-01-14 07:33:52'),
(45, 5, 5, 220, 'Available', '2025-01-14 07:33:52'),
(46, 5, 6, 130, 'Low Stock', '2025-01-14 07:33:52'),
(47, 5, 7, 95, 'Out of Stock', '2025-01-14 07:33:52'),
(48, 5, 8, 180, 'Available', '2025-01-14 07:33:52'),
(49, 5, 9, 140, 'Low Stock', '2025-01-14 07:33:52'),
(50, 5, 10, 250, 'Available', '2025-01-14 07:33:52'),
(51, 6, 1, 130, 'Low Stock', '2025-01-14 07:33:52'),
(52, 6, 2, 210, 'Available', '2025-01-14 07:33:52'),
(53, 6, 3, 85, 'Out of Stock', '2025-01-14 07:33:52'),
(54, 6, 4, 160, 'Available', '2025-01-14 07:33:52'),
(55, 6, 5, 140, 'Low Stock', '2025-01-14 07:33:52'),
(56, 6, 6, 270, 'Available', '2025-01-14 07:33:52'),
(57, 6, 7, 120, 'Out of Stock', '2025-01-14 07:33:52'),
(58, 6, 8, 145, 'Low Stock', '2025-01-14 07:33:52'),
(59, 6, 9, 190, 'Available', '2025-01-14 07:33:52'),
(60, 6, 10, 130, 'Low Stock', '2025-01-14 07:33:52'),
(61, 7, 1, 240, 'Available', '2025-01-14 07:33:52'),
(62, 7, 2, 140, 'Low Stock', '2025-01-14 07:33:52'),
(63, 7, 3, 170, 'Available', '2025-01-14 07:33:52'),
(64, 7, 4, 95, 'Out of Stock', '2025-01-14 07:33:52'),
(65, 7, 5, 260, 'Available', '2025-01-14 07:33:52'),
(66, 7, 6, 130, 'Low Stock', '2025-01-14 07:33:52'),
(67, 7, 7, 180, 'Available', '2025-01-14 07:33:52'),
(68, 7, 8, 85, 'Out of Stock', '2025-01-14 07:33:52'),
(69, 7, 9, 145, 'Low Stock', '2025-01-14 07:33:52'),
(70, 7, 10, 220, 'Available', '2025-01-14 07:33:52'),
(71, 8, 1, 120, 'Out of Stock', '2025-01-14 07:33:52'),
(72, 8, 2, 190, 'Available', '2025-01-14 07:33:52'),
(73, 8, 3, 145, 'Low Stock', '2025-01-14 07:33:52'),
(74, 8, 4, 230, 'Available', '2025-01-14 07:33:52'),
(75, 8, 5, 90, 'Out of Stock', '2025-01-14 07:33:52'),
(76, 8, 6, 160, 'Available', '2025-01-14 07:33:52'),
(77, 8, 7, 140, 'Low Stock', '2025-01-14 07:33:52'),
(78, 8, 8, 270, 'Available', '2025-01-14 07:33:52'),
(79, 8, 9, 130, 'Low Stock', '2025-01-14 07:33:52'),
(80, 8, 10, 85, 'Out of Stock', '2025-01-14 07:33:52'),
(81, 9, 1, 180, 'Available', '2025-01-14 07:33:52'),
(82, 9, 2, 130, 'Low Stock', '2025-01-14 07:33:52'),
(83, 9, 3, 250, 'Available', '2025-01-14 07:33:52'),
(84, 9, 4, 140, 'Low Stock', '2025-01-14 07:33:52'),
(85, 9, 5, 190, 'Available', '2025-01-14 07:33:52'),
(86, 9, 6, 125, 'Low Stock', '2025-01-15 10:49:47'),
(87, 9, 7, 220, 'Available', '2025-01-14 07:33:52'),
(88, 9, 8, 130, 'Low Stock', '2025-01-14 07:33:52'),
(89, 9, 9, 110, 'Low Stock', '2025-01-14 07:34:47'),
(90, 9, 10, 160, 'Available', '2025-01-14 07:33:52'),
(91, 10, 1, 145, 'Low Stock', '2025-01-14 07:33:52'),
(92, 10, 2, 280, 'Available', '2025-01-14 07:33:52'),
(93, 10, 3, 120, 'Out of Stock', '2025-01-14 07:33:52'),
(94, 10, 4, 170, 'Available', '2025-01-14 07:33:52'),
(95, 10, 5, 140, 'Low Stock', '2025-01-14 07:33:52'),
(96, 10, 6, 240, 'Available', '2025-01-14 07:33:52'),
(97, 10, 7, 90, 'Out of Stock', '2025-01-14 07:33:52'),
(98, 10, 8, 190, 'Available', '2025-01-14 07:33:52'),
(99, 10, 9, 160, 'Available', '2025-01-17 08:53:53'),
(100, 10, 10, 260, 'Available', '2025-01-14 07:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(555) NOT NULL,
  `city` varchar(255) NOT NULL,
  `role` enum('admin','parent','hospital') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `name`, `email`, `password`, `contact`, `address`, `city`, `role`, `created_at`) VALUES
(1, 'default.png', 'Admin User', 'admin@example.com', 'admin123', '+1 3562453286', '4775 N Tumbleweed Rd', 'dummy city 1', 'admin', '2024-12-25 14:42:21'),
(2, 'default.png', 'John Parent', 'john@example.com', 'parent123', '+1 3265324956', '529 Washington St', 'dummy city 2', 'parent', '2024-12-25 14:42:21'),
(3, 'default.png', 'admin Zahid', 'city@hospital.com', 'hospital123', '+1 3265324956', '346 Roycroft Ave', 'dummy city 3', 'hospital', '2024-12-25 14:42:21'),
(9, 'default.png', 'Muhammad Ahmed', 'mahmed@gmail.com', 'pass123', '0321-1234567', 'House 123, Block F, Johar Town', 'Lahore', 'parent', '2025-01-13 10:04:51'),
(10, 'default.png', 'Fatima Khan ', 'fatima.k@yahoo.com', 'secure456', '0333-9876543', 'Flat 45, Al-Habib Heights, Gulshan', 'Karachi', 'parent', '2025-01-13 10:04:51'),
(11, 'default.png', 'Ali Raza', 'aliraza@hotmail.com', 'raza789', '0300-1122334', '789 Street, Satellite Town', 'Rawalpindi', 'parent', '2025-01-13 10:04:51'),
(12, 'default.png', 'Ayesha Malik', 'amalik@gmail.com', 'malik123', '0345-5544332', 'House 56, Phase 2, DHA', 'Islamabad', 'parent', '2025-01-13 10:04:51'),
(13, 'default.png', 'Zainab Hussain', 'zhussain@yahoo.com', 'zain567', '0312-8899776', 'Plot 34, Block C, Gulberg', 'Lahore', 'parent', '2025-01-13 10:04:51'),
(14, 'default.png', 'Omar Sheikh', 'omar.s@gmail.com', 'omar890', '0333-4455667', 'House 789, Block 13-D, Gulshan', 'Karachi', 'parent', '2025-01-13 10:04:51'),
(15, 'default.png', 'Saima Nawaz', 'snawaz@hotmail.com', 'saima123', '0321-6677889', 'Flat 12, Al-Fatah Heights, Model Town', 'Lahore', 'parent', '2025-01-13 10:04:51'),
(16, 'default.png', 'Imran Qureshi', 'iqureshi@gmail.com', 'imran456', '0345-1122334', 'House 45, Street 7, F-7', 'Islamabad', 'parent', '2025-01-13 10:04:51'),
(17, 'default.png', 'Nadia Ahmed', 'nadia.a@yahoo.com', 'nadia789', '0300-8877665', '123 Street, Askari Colony', 'Rawalpindi', 'parent', '2025-01-13 10:04:51'),
(18, 'default.png', 'Kamran Ali', 'kamran@gmail.com', 'kam123', '0333-2233445', 'House 67, Block B, Valencia', 'Lahore', 'parent', '2025-01-13 10:04:51'),
(19, 'default.png', 'ahmed', 'ahmed@gmail.com', 'admin', '24324', '213 asbjadsb', ' karachi', 'parent', '2025-01-15 14:35:02'),
(21, 'default.png', 'Ibrahim Ali 2', 'ad321min@example.com', 'admin', 'sdfdsfsd453', '213 asbjadsb', 'fsdsd', 'admin', '2025-01-15 20:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_history`
--

CREATE TABLE `vaccination_history` (
  `id` int(11) NOT NULL,
  `child_id` int(11) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `administered_date` date NOT NULL,
  `administered_by` varchar(100) DEFAULT NULL,
  `next_due_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccination_history`
--

INSERT INTO `vaccination_history` (`id`, `child_id`, `vaccine_id`, `hospital_id`, `administered_date`, `administered_by`, `next_due_date`, `notes`, `created_at`) VALUES
(1, 32, 4, 1, '2025-01-16', 'admin@example.com', NULL, '', '2025-01-15 09:33:22'),
(2, 29, 5, 5, '2024-06-12', 'admin@example.com', NULL, '', '2025-01-15 09:33:40'),
(3, 27, 3, 3, '2024-06-07', 'admin@example.com', NULL, 'dfsddsf', '2025-01-15 09:33:47'),
(4, 27, 3, 3, '2024-06-07', 'admin@example.com', NULL, 'dsfdsd', '2025-01-15 09:33:56'),
(5, 27, 3, 3, '2024-06-07', 'admin@example.com', NULL, 'sdfsdf', '2025-01-15 09:34:04'),
(6, 33, 2, 1, '2025-01-17', 'admin@example.com', NULL, '', '2025-01-15 10:25:17'),
(7, 28, 4, 4, '2025-01-17', 'city@hospital.com', NULL, 'vbd', '2025-01-15 10:45:18'),
(8, 35, 3, 1, '2025-01-10', 'city@hospital.com', NULL, '', '2025-01-15 10:45:24'),
(9, 39, 5, 5, '2025-01-16', 'city@hospital.com', NULL, '', '2025-01-15 14:39:19'),
(10, 39, 1, 5, '2025-01-16', 'city@hospital.com', NULL, '', '2025-01-16 18:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `doses_required` int(11) DEFAULT 1,
  `gap_between_doses` varchar(50) DEFAULT NULL,
  `age_group` varchar(50) DEFAULT NULL,
  `status` enum('Available','Low Stock','Out of Stock') DEFAULT 'Available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id`, `name`, `description`, `doses_required`, `gap_between_doses`, `age_group`, `status`, `created_at`) VALUES
(1, 'BCG', 'Bacillus Calmette-Guerin vaccine for tuberculosis prevention', 1, '0', '0-1 month', 'Available', '2025-01-14 07:26:44'),
(2, 'OPV', 'Oral Polio Vaccine for polio prevention', 4, '4 weeks', '0-14 weeks', 'Available', '2025-01-14 07:26:44'),
(3, 'Pentavalent', 'Combined vaccine for diphtheria, tetanus, pertussis, hepatitis B and Hib', 3, '4 weeks', '6-14 weeks', 'Low Stock', '2025-01-14 07:26:44'),
(4, 'PCV', 'Pneumococcal Conjugate Vaccine for pneumonia prevention', 3, '4 weeks', '6-14 weeks', 'Available', '2025-01-14 07:26:44'),
(5, 'Measles', 'Vaccine for measles prevention', 2, '12 months', '9-15 months', 'Available', '2025-01-14 07:26:44'),
(6, 'Rotavirus', 'Vaccine for prevention of severe diarrhea in infants', 2, '4 weeks', '6-12 weeks', 'Out of Stock', '2025-01-14 07:26:44'),
(7, 'IPV', 'Inactivated Polio Vaccine for additional polio protection', 1, '0', '14 weeks', 'Low Stock', '2025-01-14 07:26:44'),
(8, 'MMR', 'Combined vaccine for measles, mumps, and rubella', 2, '3 months', '12-15 months', 'Available', '2025-01-14 07:26:44'),
(9, 'DPT', 'Combined vaccine for diphtheria, pertussis, and tetanus', 3, '4 weeks', '6-14 weeks', 'Available', '2025-01-14 07:26:44'),
(10, 'Hepatitis A', 'Vaccine for hepatitis A prevention', 2, '6 months', '12-18 months', 'Low Stock', '2025-01-14 07:26:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `vaccine_id` (`vaccine_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `hospital_vaccines`
--
ALTER TABLE `hospital_vaccines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `vaccine_id` (`vaccine_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vaccination_history`
--
ALTER TABLE `vaccination_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hospital_vaccines`
--
ALTER TABLE `hospital_vaccines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vaccination_history`
--
ALTER TABLE `vaccination_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccines` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`);

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
