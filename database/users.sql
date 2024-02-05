-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 08:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `synkrama_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('Employee','Dealer') NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `city`, `state`, `zip_code`, `created_at`) VALUES
(1, 'test', 'test', 'test@gmail.com', '$2y$10$2ob5lPR25UhdUW7dfY3VzupoKSBwW8l6UWWri/NyOvzMnNTDk145K', 'Employee', '', '', '', '2024-02-04 17:26:37'),
(2, 'delaer', 'deal', 'dealer@gmail.com', '$2y$10$F75eThz7vXGbkk5a7oSe7.UuulUiTMHbWNhbq2dZmZPDKGFYCyPra', 'Dealer', 'Pune', 'Maharashtra', '411007', '2024-02-04 17:28:20'),
(3, 'Rakhshit', 'Roy', 'rakhshit@gmail.com', '$2y$10$LJ0.CS7MKZgMyble9FNKkuM06/TxN7LO6VdWrijYey4jVqJ7ZD6de', 'Dealer', 'Noida', 'UPradesh', '201301', '2024-02-05 05:44:54'),
(4, 'Amit', 'Bishwas', 'amit@gmail.com', '$2y$10$PzC23rDq1TZhVlyuFo68WOvQsQBMahuh9NOnpBdFSiK7O1LU2CSqC', 'Dealer', 'Raiganj', 'WB', '733134', '2024-02-05 05:47:15'),
(5, 'Vipin', 'Deshmukh', 'vipin@gmail.com', '$2y$10$FhbeWDoLUxfU.FvgG78jQ.Fv/XPSGCKcKL8KDIhCgFGeTQc54grjm', 'Dealer', 'Mumbai', 'Maharashtra', '400001', '2024-02-05 05:50:37'),
(6, 'logi', 'tech', 'logi@gmail.com', '$2y$10$RZqv8/zuX22/46lK6rDowerxvwagzvbKTAMaaENkPaoVY4pUbtoeO', 'Employee', '', '', '', '2024-02-05 06:05:10'),
(7, 'Rakesh', 'Tantiya', 'rakesh@gmail.com', '$2y$10$yHSV1mCRNjECukLolPlYIOQQTa/W7DqRCM4g.RsDiIUfhxyTmzd3K', 'Employee', '', '', '', '2024-02-05 06:09:05'),
(8, 'Alex', 'Havens', 'alex@gmail.com', '$2y$10$AobYFY6zgON.l7BdNYtWLeE8zYADd7wEdIwxpfJRnHX21deuIFnMW', 'Employee', '', '', '', '2024-02-05 06:10:14'),
(9, 'Amrita', 'Sharma', 'amrita@gmail.com', '$2y$10$KAA8GK2tB/Ao1p7Nbg..geQX2mdlDlQ8oXmPlZCZvHAUbewV5GzGq', 'Employee', '', '', '', '2024-02-05 06:15:05'),
(10, 'Misha ', 'Rajput', 'misha@gmail.com', '$2y$10$PgJecGWLxRYWg8lMH9mcrOlZQIHPmrfUlTYt/tO8xjI05iFSFiwgi', 'Employee', '', '', '', '2024-02-05 06:16:03'),
(11, 'RK', 'Enterprise', 'rk@gmail.com', '$2y$10$2tXBSIqY7UMgrj/CZ6NuO.hBcQoKcGqOZkRx2v7msso50hOLztKcq', 'Dealer', 'Bengaluru', 'Karnataka', '560004', '2024-02-05 06:18:07'),
(12, 'Aman', 'Honda', 'aman@gmail.com', '$2y$10$pGbCAcU/dVHr8rZyQ1gd.OyV/sM0kEfWPt2UkojEURltUTI7eqaPO', 'Employee', '', '', '', '2024-02-05 06:19:31'),
(13, 'Avijit', 'Mndal', 'avi@gmail.com', '$2y$10$swqMyVZLCVwcebNSSsOAf.sXNusdJH7RhP1bFQeYF6pqV0.4yJ/6u', 'Employee', '', '', '', '2024-02-05 06:21:19'),
(14, 'Rohan', 'Roy', 'rohan@gmail.com', '$2y$10$RaNya6t0CsrxhdWSjS.mg.XA0R1mEwrDAB51xhRMHns8jbr3V92tK', 'Employee', '', '', '', '2024-02-05 06:32:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
