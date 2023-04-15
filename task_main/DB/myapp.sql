-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 11:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Employee_ID` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `empDOB` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `empGender` varchar(255) NOT NULL,
  `empAddress` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `remember` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Employee_ID`, `name`, `empDOB`, `email`, `password`, `empGender`, `empAddress`, `Country`, `State`, `City`, `remember`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '4168', 'sharp', '2023-03-30', 'sharb123@gamil.com', '$2y$10$CSaMjn6JdL2Xh1F.VQLppurDJqUR1w9K7ILgoJ/pzuufSzGJqclXS', 'Male', 'kjtk7i8i8i', 'india', 'tamil', 'tirutani', 'on', NULL, NULL, '2023-04-12 23:51:02', '2023-04-12 23:51:02'),
(3, '4165', 'sharpgh', '2023-03-27', 'sharb13@gamil.com', '$2y$10$DuZXiMYrZpUI4cKCKjv6IurmN0xR2WBoWxeMc6ZcW8rQRDSupLtD6', 'Male', 'efqeqqd', 'india', 'tamil', 'tirutani', 'on', NULL, NULL, '2023-04-13 00:21:31', '2023-04-13 00:21:31'),
(4, 'SIPL4168', 'sharp', '2023-04-12', 'sharb23@gamil.com', '$2y$10$LneZGsKJRjGH89/3/HQqx.ehruH/LU7PO614jKG20NsFW5Uv0zUVu', 'Male', 'fhrthrt', 'india', 'tamil', 'tirutani', 'on', NULL, NULL, '2023-04-13 02:02:54', '2023-04-13 02:02:54'),
(5, 'SIPL3907', 'kowsalya V', '2001-03-23', 'kowsalyakowsi424@gmail.com', '$2y$10$zsaqcDveJa24VbD6fnyLc.iOKjlJqpoQgQpnlYGZmOX4dlsgDIM0O', 'Female', '573, bazzar street , sholinghur', 'India', 'Tamil Nadu', 'Ranipet', 'on', NULL, NULL, '2023-04-13 03:55:35', '2023-04-13 03:55:35'),
(6, 'SIPL4166', 'Monisha.K', '2001-08-20', 'monishakumar2081@gmail.com', '$2y$10$PIdnTsF1SjbHwMRsoimSKOdxcovtL0ZP4oX.5xhmesykxsgWGbHzG', 'Female', '3/620, Keezh street, Pudur,', 'India', 'Tamil Nadu', 'tirutani', 'on', NULL, NULL, '2023-04-13 04:01:10', '2023-04-13 04:01:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
