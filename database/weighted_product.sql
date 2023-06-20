-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2023 at 01:15 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weighted_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `user_uuid`, `criteria_id`, `value`, `month`, `year`, `created_at`, `updated_at`) VALUES
(2, '1d19a309-a59c-46ae-a6de-02984c746a04', 1, '80', '6', '2023', '2023-06-18 19:37:19', '2023-06-18 19:37:19'),
(3, '1d19a309-a59c-46ae-a6de-02984c746a04', 2, '82', '6', '2023', '2023-06-18 19:37:42', '2023-06-18 19:37:42'),
(4, '1d19a309-a59c-46ae-a6de-02984c746a04', 3, '80', '6', '2023', '2023-06-18 19:38:03', '2023-06-18 19:38:03'),
(5, '1d19a309-a59c-46ae-a6de-02984c746a04', 4, '85', '6', '2023', '2023-06-18 19:38:28', '2023-06-18 19:38:28'),
(6, '1d19a309-a59c-46ae-a6de-02984c746a04', 5, '88', '6', '2023', '2023-06-18 19:40:50', '2023-06-18 19:40:50'),
(7, '1d19a309-a59c-46ae-a6de-02984c746a04', 6, '90', '6', '2023', '2023-06-18 19:41:03', '2023-06-18 19:41:03'),
(8, '1d19a309-a59c-46ae-a6de-02984c746a04', 7, '8', '6', '2023', '2023-06-18 19:41:13', '2023-06-18 19:41:13'),
(10, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 1, '80', '6', '2023', '2023-06-18 19:41:45', '2023-06-18 19:41:45'),
(11, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 2, '90', '6', '2023', '2023-06-18 19:41:57', '2023-06-18 19:41:57'),
(12, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 3, '85', '6', '2023', '2023-06-18 19:42:10', '2023-06-18 19:42:10'),
(13, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 4, '82', '6', '2023', '2023-06-18 19:42:29', '2023-06-18 19:43:25'),
(14, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 5, '90', '6', '2023', '2023-06-18 19:43:43', '2023-06-18 19:44:07'),
(15, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 6, '85', '6', '2023', '2023-06-18 19:43:59', '2023-06-18 19:43:59'),
(16, 'face50dd-d119-4a68-a2dc-5e217771a0d4', 7, '6', '6', '2023', '2023-06-18 19:44:28', '2023-06-18 19:44:28'),
(18, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 1, '80', '6', '2023', '2023-06-18 19:46:03', '2023-06-18 19:46:03'),
(19, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 2, '89', '6', '2023', '2023-06-18 19:46:57', '2023-06-18 19:46:57'),
(20, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 3, '85', '6', '2023', '2023-06-18 19:47:11', '2023-06-18 19:47:11'),
(21, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 4, '90', '6', '2023', '2023-06-18 19:47:26', '2023-06-18 19:47:26'),
(22, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 5, '80', '6', '2023', '2023-06-18 19:47:39', '2023-06-18 19:47:39'),
(23, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 6, '88', '6', '2023', '2023-06-18 19:47:52', '2023-06-18 19:47:52'),
(24, '8d601826-7e9f-47cc-b756-770f3c03b8d5', 7, '7', '6', '2023', '2023-06-18 19:48:02', '2023-06-18 19:48:02'),
(26, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 1, '78', '6', '2023', '2023-06-18 19:48:34', '2023-06-18 19:48:34'),
(27, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 2, '85', '6', '2023', '2023-06-18 19:48:45', '2023-06-18 19:48:45'),
(28, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 3, '80', '6', '2023', '2023-06-18 19:48:57', '2023-06-18 19:48:57'),
(29, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 4, '90', '6', '2023', '2023-06-18 19:49:11', '2023-06-18 19:49:11'),
(30, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 5, '90', '6', '2023', '2023-06-18 19:49:30', '2023-06-18 19:49:30'),
(31, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 6, '85', '6', '2023', '2023-06-18 19:49:46', '2023-06-18 19:49:46'),
(32, '2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 7, '6', '6', '2023', '2023-06-18 19:49:58', '2023-06-18 19:49:58'),
(34, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 1, '82', '6', '2023', '2023-06-18 19:53:05', '2023-06-18 19:53:05'),
(35, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 2, '84', '6', '2023', '2023-06-18 19:53:16', '2023-06-18 19:53:16'),
(36, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 3, '92', '6', '2023', '2023-06-18 19:53:27', '2023-06-18 19:53:27'),
(37, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 4, '82', '6', '2023', '2023-06-18 19:53:39', '2023-06-18 19:53:39'),
(38, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 5, '85', '6', '2023', '2023-06-18 19:53:53', '2023-06-18 21:27:42'),
(39, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 6, '82', '6', '2023', '2023-06-18 19:54:05', '2023-06-18 19:54:05'),
(40, '39ccd1e2-2cea-46b4-9681-c617a0fa0725', 7, '3', '6', '2023', '2023-06-18 19:54:18', '2023-06-18 19:54:18'),
(42, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 1, '82', '6', '2023', '2023-06-18 19:56:10', '2023-06-18 19:56:10'),
(43, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 2, '80', '6', '2023', '2023-06-18 19:56:21', '2023-06-18 19:56:21'),
(44, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 3, '75', '6', '2023', '2023-06-18 19:56:32', '2023-06-18 19:56:32'),
(45, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 4, '80', '6', '2023', '2023-06-18 19:56:43', '2023-06-18 19:56:43'),
(46, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 5, '85', '6', '2023', '2023-06-18 19:56:55', '2023-06-18 19:56:55'),
(47, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 6, '80', '6', '2023', '2023-06-18 19:57:13', '2023-06-18 19:57:13'),
(48, '6f0cc33f-4f7f-4488-9a32-5908652f5941', 7, '1', '6', '2023', '2023-06-18 19:57:24', '2023-06-18 19:57:24'),
(50, '7046c342-79e2-4863-8762-11cfc5dc8612', 1, '85', '6', '2023', '2023-06-18 19:57:52', '2023-06-18 19:57:52'),
(51, '7046c342-79e2-4863-8762-11cfc5dc8612', 2, '80', '6', '2023', '2023-06-18 19:58:05', '2023-06-18 19:58:05'),
(52, '7046c342-79e2-4863-8762-11cfc5dc8612', 3, '90', '6', '2023', '2023-06-18 19:58:18', '2023-06-18 19:58:18'),
(53, '7046c342-79e2-4863-8762-11cfc5dc8612', 4, '85', '6', '2023', '2023-06-18 19:58:29', '2023-06-18 19:58:29'),
(54, '7046c342-79e2-4863-8762-11cfc5dc8612', 5, '85', '6', '2023', '2023-06-18 19:58:40', '2023-06-18 19:58:40'),
(55, '7046c342-79e2-4863-8762-11cfc5dc8612', 6, '88', '6', '2023', '2023-06-18 19:58:51', '2023-06-18 19:58:51'),
(56, '7046c342-79e2-4863-8762-11cfc5dc8612', 7, '7', '6', '2023', '2023-06-18 19:59:03', '2023-06-18 19:59:03'),
(58, '5128018d-bac6-4313-bede-af4cb320bbef', 1, '88', '6', '2023', '2023-06-18 19:59:39', '2023-06-18 19:59:39'),
(59, '5128018d-bac6-4313-bede-af4cb320bbef', 2, '80', '6', '2023', '2023-06-18 19:59:52', '2023-06-18 19:59:52'),
(60, '5128018d-bac6-4313-bede-af4cb320bbef', 3, '92', '6', '2023', '2023-06-18 20:00:02', '2023-06-18 20:00:02'),
(61, '5128018d-bac6-4313-bede-af4cb320bbef', 4, '90', '6', '2023', '2023-06-18 20:00:11', '2023-06-18 20:00:11'),
(62, '5128018d-bac6-4313-bede-af4cb320bbef', 5, '80', '6', '2023', '2023-06-18 20:00:21', '2023-06-18 20:00:21'),
(63, '5128018d-bac6-4313-bede-af4cb320bbef', 6, '85', '6', '2023', '2023-06-18 20:00:32', '2023-06-18 20:00:32'),
(64, '5128018d-bac6-4313-bede-af4cb320bbef', 7, '6', '6', '2023', '2023-06-18 20:00:44', '2023-06-18 20:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `name`, `description`, `category`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'Kedisiplinan', 'Kedisiplinan Pegawai', 'Benefit', '10', '2023-06-17 06:26:57', '2023-06-18 19:29:53'),
(2, 'Kerja Sama', 'Kerja Sama Antar Karyawan', 'Benefit', '15', '2023-06-18 19:30:16', '2023-06-18 19:30:16'),
(3, 'Sikap', 'Sikap Karyawan', 'Benefit', '15', '2023-06-18 19:30:44', '2023-06-18 19:30:44'),
(4, 'Kehadiran', 'Kehadiran Karyawan di Kantor', 'Benefit', '10', '2023-06-18 19:31:08', '2023-06-18 19:31:08'),
(5, 'Skill', 'Skill Karyawan', 'Benefit', '30', '2023-06-18 19:31:42', '2023-06-18 19:31:42'),
(6, 'Loyalitas', 'Loyalitas Karyawan', 'Benefit', '10', '2023-06-18 19:32:14', '2023-06-18 19:32:14'),
(7, 'Masa Kerja', 'Masa Kerja Karyawan', 'Benefit', '10', '2023-06-18 19:32:37', '2023-06-20 06:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(3, '2023_06_13_005627_create_criterias_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(9, '2023_06_14_010839_drop_personal_access_tokens_table', 2),
(10, '2023_06_14_004326_create_assessments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('karyawan','hr') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uuid`, `name`, `email`, `password`, `phone_number`, `address`, `role`, `created_at`, `updated_at`) VALUES
('1d19a309-a59c-46ae-a6de-02984c746a04', 'Deni', 'deni@gmail.com', '$2y$10$2ulKY2tO0YtQeNVwwkUpnu9amhFnF0d4LShwa8tjlHJI1iQZFoqh2', '082340352704', 'JL. Anggrek No 7', 'karyawan', '2023-06-18 18:47:43', '2023-06-18 19:34:24'),
('2c105b2a-f2c2-484b-ad49-9aa2c9adba81', 'Sari', 'sari@gmail.com', '$2y$10$1KZvKZswicQqyo.KkYS6bOr736klgjR13rBzFLgXBVYqUSfpnoqfC', '082340358702', 'JL. Anggrek No 7', 'karyawan', '2023-06-18 19:35:18', '2023-06-18 19:35:18'),
('39ccd1e2-2cea-46b4-9681-c617a0fa0725', 'Fajar', 'fajar@gmail.com', '$2y$10$pgNIdlIpbdonZpotqlC38.R7nzk8K43YLfKqSZCRKRElUHgzEm3cy', '082340352709', 'JL. Anggrek No 18', 'karyawan', '2023-06-18 19:35:41', '2023-06-18 19:35:41'),
('5128018d-bac6-4313-bede-af4cb320bbef', 'Ali', 'ali@gmail.com', '$2y$10$8VSCj9.HmNMAqCflyiT9u.kWVsZwde6DhjN5fqMt2/kLMmxRpUnuu', '081340358787', 'JL. Anggrek No 6', 'karyawan', '2023-06-18 19:36:52', '2023-06-18 19:36:52'),
('6f0cc33f-4f7f-4488-9a32-5908652f5941', 'Putra', 'putra@gmail.com', '$2y$10$paXVOWx7xkBEP0HzgRs5buHf29oUzIhgE7N6rNN2FkL860ClF3hRK', '082346352709', 'JL. Anggrek No 45', 'karyawan', '2023-06-18 19:36:06', '2023-06-18 19:36:06'),
('7046c342-79e2-4863-8762-11cfc5dc8612', 'Dini', 'dini@gmail.com', '$2y$10$dR8bzz7hWlXhq8ZEH0x63umL.ZoL1PqHECAvYlIpCeFGitgPiOS.a', '081340358702', 'JL. Anggrek No 12', 'karyawan', '2023-06-18 19:36:29', '2023-06-18 19:36:29'),
('8d601826-7e9f-47cc-b756-770f3c03b8d5', 'Doni', 'doni@gmail.com', '$2y$10$tsf7sF7QoHIUj2bsMzetMe2vUGxwYWL30AU7QnVPrRSo7Zm/rtmjC', '082340612702', 'JL. Anggrek No 18', 'karyawan', '2023-06-18 19:34:53', '2023-06-18 19:34:53'),
('dd483a1c-0d0b-11ee-9696-d05f643b5f59', 'admin', 'admin@gmail.com', '$2y$10$dR8bzz7hWlXhq8ZEH0x63umL.ZoL1PqHECAvYlIpCeFGitgPiOS.a', '082340372701', 'Jl Subandi 12', 'hr', NULL, NULL),
('face50dd-d119-4a68-a2dc-5e217771a0d4', 'Hari', 'hari@gmail.com', '$2y$10$36QTV9bN2MUlTpqSLjYJmeb90RrP5awAEexqmIZZWho30C5rQfqg2', '082340352702', 'JL. Anggrek No 4', 'karyawan', '2023-06-18 04:33:55', '2023-06-18 19:34:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessments_user_uuid_foreign` (`user_uuid`),
  ADD KEY `assessments_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assessments_user_uuid_foreign` FOREIGN KEY (`user_uuid`) REFERENCES `users` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
