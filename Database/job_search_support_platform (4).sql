-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 09:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_search_support_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'valentin', 'valentin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(12) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `company_name`, `job_title`, `description`, `summary`, `cv`) VALUES
(0, '', 'mtn', 'accountant', 'accountanthy', 'HABAKUBAHO Fidele221014369.pdf'),
(0, '', '', 'accountant', 'accountantbite', 'HABAKUBAHO Fidele221014369.pdf'),
(0, '', '', 'accountant', 'accountantbite', 'HABAKUBAHO Fidele221014369.pdf'),
(0, '', '', 'accountant', 'accountantbite', 'HABAKUBAHO Fidele221014369.pdf'),
(0, '', 'mtn', 'accountant', 'accountantAn accountant manages financial records, prepares financial reports, and ensures accuracy in financial transactions. They analyze financial data to guide decision-making and ensure compliance with regulations. Accountants play a crucial role in ', 'Business registration (3).pdf'),
(0, '', 'Akagera Business Group', 'human resource', 'you my have experience in this of 3 yearsHuman resources professionals oversee recruitment, employee relations, and training within organizations. They develop and implement HR policies and procedures to support organizational goals and ensure compliance ', 'Projects to be done.pdf'),
(0, '', 'Akagera Business Group', 'human resource', 'you my have experience in this of 3 yearsHuman resources professionals oversee recruitment, employee relations, and training within organizations. They develop and implement HR policies and procedures to support organizational goals and ensure compliance ', 'Business registration (3).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `employer_id` int(11) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `owner_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `certificate` varchar(1000) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`employer_id`, `company_name`, `owner_name`, `email`, `phone`, `certificate`, `country`, `city`, `experience`) VALUES
(1, 'MTN RWANDA', 'MTN', 'mtn@gmail.com', '0793266558', 'Work experience_2024.docx', 'Rwanda', 'Kigali', '(5+ years of experiance)'),
(2, 'Akagera Business Group', 'Akagera Business Group', 'akagera@gmail.com', '0788907632', 'Business registration.pdf', 'Rwanda', 'huye', '(5+ years of experiance)');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_Id` int(11) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `offer_job` varchar(100) DEFAULT NULL,
  `contract_type` varchar(100) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_Id`, `company_name`, `employer_id`, `email`, `phone`, `job_title`, `offer_job`, `contract_type`, `description`, `date`, `time`) VALUES
(2, 'mtn', 1, 'mtn@gmail.com', '078654456', 'accountant', 'job', 'ntayo', 'accountant', '2024-05-22', '17:38:51'),
(6, 'mtn', 1, 'fred29@gmail.com', '0789958754', 'it', 'internship', 'full', 'IT', '2024-05-07', '14:29:00'),
(7, 'Airtel', 1, 'gisa@gmail.com', '0782345765', 'human resource', 'job', 'full', 'human resource', '2024-05-21', '22:34:00'),
(8, 'Akagera Business Group', 2, 'akagera@gmail.com', '0788907632', 'human resource', 'job', 'contract', 'you my have experience in this of 3 years', '2024-06-13', '23:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobhiring`
--

CREATE TABLE `jobhiring` (
  `jobhiring_Id` int(11) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `jobseeker_id` int(11) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `offer_job` varchar(100) DEFAULT NULL,
  `contract_type` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobhiring`
--

INSERT INTO `jobhiring` (`jobhiring_Id`, `company_name`, `job_id`, `jobseeker_id`, `job_title`, `offer_job`, `contract_type`, `date`, `country`, `city`) VALUES
(6, 'MTN', 6, 1, 'IT', 'internship', 'part', '2024-05-14', 'ug', 'Jinja'),
(7, 'TIGO', 6, 1, 'clean', 'job', 'contract', '2024-05-15', 'ug', 'Kampala');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `Jobseeker_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `gender` varchar(13) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `biography` varchar(300) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `certificate` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`Jobseeker_id`, `first_name`, `last_name`, `email`, `phone`, `country`, `city`, `gender`, `birth_date`, `biography`, `experience`, `education`, `certificate`) VALUES
(1, 'jeanne', 'uwase', 'jeanne@gmail.com', '0789958754', 'Rwanda', 'Kigali', 'Female', '2000-03-19', 'i was head boy in secondry', 'Internship(0 to 1 year of experiance)', 'Bachelor', 'Work experience_2024.docx'),
(2, 'uwimana ', 'j pierre', 'uwajpierre@gmail.com', '0782345765', 'Rwanda', 'Kigali', 'Male', '2024-05-21', 'youth volenteer', 'Mid career(3 to 5 years of experiance)', 'None', 'Business registration (2).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `trainee`
--

CREATE TABLE `trainee` (
  `trainee_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `gender` varchar(13) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainee`
--

INSERT INTO `trainee` (`trainee_id`, `first_name`, `last_name`, `email`, `phone`, `country`, `city`, `gender`, `birth_date`, `position`) VALUES
(1, 'Valentin', 'KWIZERA', 'makuza@gmail.com', '+250793266558', 'ug', 'Entebbe', 'm', '2024-05-14', 'Accountant'),
(2, 'gatete', 'james', 'gatetejames02@gmail.com', '0798907632', 'ug', 'Jinja', 'm', '2024-05-14', 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Fred', 'Kamu', 'fred29@gmail.com', '12345'),
(2, 'uwamwezi', ' jeanne', 'uwajeanne@gmail.com', '12345'),
(3, 'patrick', 'gisa', 'gisa@gmail.com', '1234'),
(4, 'Lisa ', 'keza', 'lisa@gmail.com', '1234'),
(5, 'Valentin', 'KWIZERA', 'makuza@gmail.com', '12345'),
(6, 'james', 'gatete', 'gatetejames02@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`employer_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_Id`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `jobhiring`
--
ALTER TABLE `jobhiring`
  ADD PRIMARY KEY (`jobhiring_Id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `jobseeker_id` (`jobseeker_id`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`Jobseeker_id`);

--
-- Indexes for table `trainee`
--
ALTER TABLE `trainee`
  ADD PRIMARY KEY (`trainee_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobhiring`
--
ALTER TABLE `jobhiring`
  MODIFY `jobhiring_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `Jobseeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainee`
--
ALTER TABLE `trainee`
  MODIFY `trainee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`employer_id`);

--
-- Constraints for table `jobhiring`
--
ALTER TABLE `jobhiring`
  ADD CONSTRAINT `jobhiring_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_Id`),
  ADD CONSTRAINT `jobhiring_ibfk_2` FOREIGN KEY (`jobseeker_id`) REFERENCES `jobseeker` (`Jobseeker_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
