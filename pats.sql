-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 11:54 AM
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
-- Database: `pats`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_sessions`
--

CREATE TABLE `active_sessions` (
  `session_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `active_sessions`
--

INSERT INTO `active_sessions` (`session_id`, `user_id`, `last_activity`) VALUES
('e6j3brr1lu4p73jcv5khhumj33', 1, '2024-09-17 09:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`log_id`, `user_id`, `action`, `description`, `created_at`) VALUES
(879, 98, 'Login', 'User logged in successfully!', '2024-09-16 13:29:16'),
(880, 98, 'Logout', 'User logged out successfully.', '2024-09-16 13:30:42'),
(881, 97, 'Login', 'User logged in successfully!', '2024-09-16 13:30:52'),
(882, 98, 'Login', 'User logged in successfully!', '2024-09-16 13:32:17'),
(883, 97, 'Enroll', 'Student enrolled in a course.', '2024-09-16 13:32:39'),
(884, 97, 'Enroll', 'Student enrolled in a course.', '2024-09-16 13:44:18'),
(885, 97, 'Enroll', 'Student enrolled in a course.', '2024-09-16 13:46:50'),
(886, 97, 'Enroll', 'Student enrolled in a course.', '2024-09-16 13:48:50'),
(887, 97, 'Enroll', 'Student enrolled in a course.', '2024-09-16 13:56:42'),
(888, 97, 'Enroll', 'Student enrolled in a course.', '2024-09-16 13:59:13'),
(889, 97, 'Logout', 'User logged out successfully.', '2024-09-16 14:00:16'),
(890, 98, 'Login', 'User logged in successfully!', '2024-09-16 14:00:25'),
(891, 98, 'Logout', 'User logged out successfully.', '2024-09-16 14:00:49'),
(892, 97, 'Login', 'User logged in successfully!', '2024-09-16 14:00:58'),
(893, 97, 'Enroll', 'Student enrolled in a course.', '2024-09-16 14:01:37'),
(894, 97, 'Enroll', 'Student enrolled in a course.', '2024-09-16 14:08:09'),
(895, 97, 'Enroll', 'Student enrolled in a course.', '2024-09-16 14:17:45'),
(896, 98, 'Login', 'User logged in successfully!', '2024-09-16 14:35:34'),
(897, 97, 'Login', 'User logged in successfully!', '2024-09-16 14:44:34'),
(898, 98, 'Login', 'User logged in successfully!', '2024-09-16 14:44:45'),
(899, 98, 'Add Task Sheets', 'Added new task sheet: Assignment No.1', '2024-09-16 14:47:54'),
(900, 98, 'Add Quiz', 'Added new quiz: Quiz 1 ', '2024-09-16 14:48:07'),
(901, 98, 'Added a question to the quiz', 'Quiz 1', '2024-09-16 14:48:15'),
(902, 98, 'Add Learning Material', 'Added new learning material: Intro to Web', '2024-09-16 14:49:01'),
(903, 97, 'Enroll', 'Student enrolled in a course.', '2024-09-16 14:50:19'),
(904, 98, 'Graded task sheet submission', '90', '2024-09-16 14:51:45'),
(905, 1, 'Login', 'User logged in successfully!', '2024-09-16 14:55:03'),
(906, 97, 'Logout', 'User logged out successfully.', '2024-09-16 14:55:22'),
(907, 97, 'Login', 'User logged in successfully!', '2024-09-16 14:55:48'),
(908, 98, 'Logout', 'User logged out successfully.', '2024-09-16 14:55:57'),
(909, 98, 'Login', 'User logged in successfully!', '2024-09-16 14:56:02'),
(910, 98, 'Logout', 'User logged out successfully.', '2024-09-16 14:58:27'),
(911, 97, 'Login', 'User logged in successfully!', '2024-09-17 09:47:17'),
(912, 97, 'Logout', 'User logged out successfully.', '2024-09-17 09:48:05'),
(913, 98, 'Login', 'User logged in successfully!', '2024-09-17 09:48:14'),
(914, 98, 'Logout', 'User logged out successfully.', '2024-09-17 09:49:13'),
(915, 1, 'Login', 'User logged in successfully!', '2024-09-17 09:49:26'),
(916, 1, 'Logout', 'User logged out successfully.', '2024-09-17 09:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `instructor_id`, `title`, `content`, `course_id`, `created_at`) VALUES
(33, 98, 'UIWDHAihaedwef', 'fefwf', 16, '2024-09-16 14:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessment_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `assessment_title` varchar(50) NOT NULL,
  `assessment_description` text DEFAULT NULL,
  `assessment_type` enum('pre','post') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessment_id`, `course_id`, `assessment_title`, `assessment_description`, `assessment_type`, `created_at`) VALUES
(899, 16, 'Pre-Assessment', '', 'pre', '2024-09-16 14:47:04'),
(7736, 16, 'Exam', 'qwewed', 'post', '2024-09-16 14:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_questions`
--

CREATE TABLE `assessment_questions` (
  `question_id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `question_name` text NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `correct_option` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment_questions`
--

INSERT INTO `assessment_questions` (`question_id`, `assessment_id`, `question_name`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `created_at`) VALUES
(17, 899, 'what is wdwd', 'wdwdw', 'dwdwdw', 'dwdwd', 'dwdw', 'A', '2024-09-16 14:47:16'),
(18, 7736, '3', '3r3r3r', '3r3r', 'r3r', '3r3r', 'A', '2024-09-16 14:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batch_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch_id`, `course_id`, `batch_name`, `start_date`, `end_date`, `capacity`, `created_at`, `updated_at`) VALUES
(18, 16, 'FrontEnd', '2024-09-16', '2024-09-18', 5, '2024-09-16 14:45:42', '2024-09-16 14:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `certificate_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `certificate_path` varchar(100) NOT NULL,
  `generated_at` datetime NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`certificate_id`, `student_id`, `course_id`, `certificate_path`, `generated_at`, `is_verified`) VALUES
(102, 97, 16, './certificates/download-certificates/1726498642.pdf', '2024-09-16 22:57:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_img` varchar(100) NOT NULL,
  `course_desc` text NOT NULL,
  `course_duration` int(11) NOT NULL,
  `course_code` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `user_id`, `course_name`, `course_img`, `course_desc`, `course_duration`, `course_code`) VALUES
(16, 98, 'Web Development 2024', 'course_photo/436a395f27e529cc71f4473f3dcdb9b2.jpg', 'ewr3r3r34r34r34r43r43r', 3600, 'tesda');

-- --------------------------------------------------------

--
-- Table structure for table `course_material`
--

CREATE TABLE `course_material` (
  `material_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `material_title` varchar(50) NOT NULL,
  `material_desc` text NOT NULL,
  `material_file` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_material`
--

INSERT INTO `course_material` (`material_id`, `course_id`, `material_title`, `material_desc`, `material_file`, `created_at`) VALUES
(5060, 16, 'Lesson 2', 'qsqs', 'm2-res_1080p.mp4', '2024-09-16 22:48:29'),
(8808, 16, 'Outro', 'qsqs', 'IMG20240308084542.jpg', '2024-09-16 22:48:53'),
(9831, 16, 'Intro to Web', '', 'm2-res_1080p.mp4', '2024-09-16 22:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `course_registrations`
--

CREATE TABLE `course_registrations` (
  `registration_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tvl_name` varchar(100) DEFAULT NULL,
  `scholarship_type` enum('twsp','ttsp','pesfa','step') DEFAULT NULL,
  `trainer_name` varchar(100) DEFAULT NULL,
  `training_schedule` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL,
  `civil_status` enum('single','married','divorced','widowed') DEFAULT NULL,
  `sex` enum('male','female','other') DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `highest_education_attainment` varchar(50) DEFAULT NULL,
  `is_pwd` tinyint(1) NOT NULL DEFAULT 0,
  `disability_type` varchar(100) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `pic_path` varchar(255) NOT NULL,
  `birthCert_path` varchar(255) NOT NULL,
  `status` enum('declined','approved','resubmit','pending') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_registrations`
--

INSERT INTO `course_registrations` (`registration_id`, `course_id`, `student_id`, `tvl_name`, `scholarship_type`, `trainer_name`, `training_schedule`, `first_name`, `middle_name`, `middle_initial`, `last_name`, `extension`, `date_of_birth`, `place_of_birth`, `civil_status`, `sex`, `mobile_number`, `email_address`, `highest_education_attainment`, `is_pwd`, `disability_type`, `reason`, `pic_path`, `birthCert_path`, `status`, `created_at`) VALUES
(41, 16, 97, 'haha', 'ttsp', 'hhhh', 'hhh', 'h', 'Santos', '', 'Veneracion', '', '2024-06-11', 'hehe', 'divorced', 'other', '64646464', 'heuehshsh@heheheh', 'college', 0, '', 'idk', '../instructor/course_registrations/2x2_pic/66e844dc79c01_FB_IMG_1726464077750.jpg', '../instructor/course_registrations/birth_certificate/66e844dc79d87_IMG_20240911_224945.jpg', 'approved', '2024-09-16 14:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `discussion_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`discussion_id`, `course_id`, `user_id`, `message`, `created_at`, `parent_id`) VALUES
(51, 16, 97, 'yo hirap nung lesson 1', '2024-09-16 14:50:48', NULL),
(52, 16, 98, 'tanga ka pala e', '2024-09-16 14:52:06', 51);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('In Progress','Completed') NOT NULL,
  `completion_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `user_id`, `course_id`, `batch_id`, `enrollment_date`, `status`, `completion_date`) VALUES
(57, 97, 16, 18, '2024-09-16 14:50:19', 'Completed', '2024-09-17 17:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `learning_materials`
--

CREATE TABLE `learning_materials` (
  `material_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learning_materials`
--

INSERT INTO `learning_materials` (`material_id`, `course_id`, `title`, `description`, `file_path`, `created_at`) VALUES
(1426, 13, 'wsd', 'wdwdwd', 'njven_resume (1).docx', '2024-09-14 14:15:53'),
(4623, 13, 'review this', '', 'Veneracion Nelson Jay  S. (3).pdf', '2024-09-14 20:25:01'),
(6665, 13, 'hihihihih', 'edef', 'Veneracion Nelson Jay  S. (3).pdf', '2024-09-14 13:58:49'),
(9988, 6, 'Introduction', 'sqs', '1725968327.pdf', '2024-09-15 08:09:51'),
(8567, 13, 'a', 'a', 'GROUP-2-NSTP.pdf', '2024-09-16 06:54:52'),
(9711, 14, 'LESSON 1: Use of Farm Tools and Equipment', '', '12+Rules+to+Learn+to+Code+[2nd+Edition]+2022.pdf', '2024-09-16 08:52:20'),
(7872, 16, 'Intro to Web', 'wdw', 'Activity.docx', '2024-09-16 14:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `recipient_type` enum('student','instructor','admin') NOT NULL,
  `course_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `instructor_id`, `recipient_type`, `course_id`, `message`, `status`, `created_at`) VALUES
(306, 97, 98, 'student', 16, 'yo', 'read', '2024-09-16 14:49:20'),
(307, 97, 0, 'student', 16, 'Your course registration for Web Development 2024 has been approved. tesda is the enrollment key.', 'read', '2024-09-16 14:50:02'),
(308, 98, 0, 'instructor', 16, 'New submission on 2024-09-16 16:51:38: Nelson Jay Veneracion has submitted the task sheet \'Assignment No.1\' for the course \'Web Development 2024\'.', 'read', '2024-09-16 14:51:38'),
(309, 97, 98, 'student', 16, 'Your task sheet submission for \'\' has been graded. Status: Passed', 'read', '2024-09-16 14:51:45'),
(310, 97, 0, 'student', 16, 'Congratulations! You have completed the course. Please wait for the instructor to verify your completion.', 'read', '2024-09-16 14:57:22'),
(311, 97, 0, 'student', 16, 'Your certificate for the course has been generated.', 'read', '2024-09-16 14:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `token` varchar(6) NOT NULL,
  `expiration` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`id`, `email`, `token`, `expiration`, `created_at`) VALUES
(8, 'admin101@gmail.com', '903254', '2024-09-11 08:52:38', '2024-09-11 06:37:38'),
(35, 'njveneracion.042803@gmail.com', '676633', '2024-09-14 18:50:49', '2024-09-14 16:35:49'),
(39, 'njveneracion.gwapo28@gmail.com', '810941', '2024-09-14 21:49:05', '2024-09-14 19:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `quiz_name` varchar(50) NOT NULL,
  `quiz_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `course_id`, `quiz_name`, `quiz_description`, `created_at`) VALUES
(7430, 16, 'Quiz 1 ', 'wdwdwd', '2024-09-16 14:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_name` text NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `correct_option` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`question_id`, `quiz_id`, `question_name`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `created_at`) VALUES
(15, 7430, 'wqdwdw', 'dwdwd', 'wdw', 'wdwdwdwdwd', 'rtyg5h', 'A', '2024-09-16 14:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `last_activity` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE `student_answers` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_answer` char(1) NOT NULL,
  `correct_answer` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_answers`
--

INSERT INTO `student_answers` (`id`, `student_id`, `quiz_id`, `question_id`, `student_answer`, `correct_answer`, `created_at`) VALUES
(69, 97, 7430, 15, 'A', 'A', '2024-09-16 14:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_assessment_answers`
--

CREATE TABLE `student_assessment_answers` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_answer` char(1) NOT NULL,
  `correct_answer` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_assessment_answers`
--

INSERT INTO `student_assessment_answers` (`id`, `student_id`, `assessment_id`, `question_id`, `student_answer`, `correct_answer`, `created_at`) VALUES
(85, 97, 899, 17, 'A', 'A', '2024-09-16 14:50:29'),
(86, 97, 7736, 18, 'A', 'A', '2024-09-16 14:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `student_progress`
--

CREATE TABLE `student_progress` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `content_type` enum('Material','Quiz','Task Sheet','pre-assessment','post-assessment') DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT 0,
  `completed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_progress`
--

INSERT INTO `student_progress` (`id`, `student_id`, `course_id`, `content_id`, `content_type`, `is_completed`, `completed_at`) VALUES
(451, 97, 16, 899, 'pre-assessment', 1, '2024-09-16 22:50:29'),
(452, 97, 16, 9831, 'Material', 1, '2024-09-16 22:51:21'),
(453, 97, 16, 1897, 'Task Sheet', 0, NULL),
(454, 97, 16, 1897, 'Task Sheet', 1, '2024-09-16 22:51:45'),
(455, 97, 16, 1897, 'Task Sheet', 1, '2024-09-16 22:51:45'),
(456, 97, 16, 7430, 'Quiz', 1, '2024-09-16 22:51:53'),
(457, 97, 16, 5060, 'Material', 1, '2024-09-16 22:52:44'),
(458, 97, 16, 7736, 'post-assessment', 1, '2024-09-16 22:57:16'),
(459, 97, 16, 8808, 'Material', 1, '2024-09-16 22:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `task_sheets`
--

CREATE TABLE `task_sheets` (
  `task_sheet_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `task_sheet_title` varchar(50) NOT NULL,
  `task_sheet_description` text DEFAULT NULL,
  `task_sheet_file` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_sheets`
--

INSERT INTO `task_sheets` (`task_sheet_id`, `course_id`, `task_sheet_title`, `task_sheet_description`, `task_sheet_file`, `created_at`) VALUES
(1897, 16, 'Assignment No.1', '', 'VeneracionNelsonJay-essay.docx', '2024-09-16 14:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `task_sheet_submissions`
--

CREATE TABLE `task_sheet_submissions` (
  `submission_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `task_sheet_id` int(11) NOT NULL,
  `submission` text NOT NULL,
  `submitted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `file_path` varchar(100) DEFAULT NULL,
  `status` enum('pending','passed','failed') DEFAULT 'pending',
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_sheet_submissions`
--

INSERT INTO `task_sheet_submissions` (`submission_id`, `student_id`, `task_sheet_id`, `submission`, `submitted_at`, `file_path`, `status`, `feedback`) VALUES
(90, 97, 1897, 'this is my ass', '2024-09-16 22:51:38', 'students_submissions/66e845fa12ca9_VeneracionNelsonJay-essay.docx', 'passed', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(70) NOT NULL,
  `role` varchar(15) NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_expiration` datetime DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `profile_picture`, `email`, `password`, `role`, `otp`, `otp_expiration`, `is_verified`, `created_at`) VALUES
(1, 'Pats Cabanatuan', 'patscab', 'PATS logo.jpg', 'patscabanatuan@gmail.com', 'Patscab1@', 'admin', NULL, NULL, 1, '2024-09-16 22:43:28'),
(97, 'Nelson Jay Veneracion', 'njven', '-nd5ces.jpg', 'njvenxxviii@gmail.com', '2fa13879ac5cadbfbd0a017043d49cf837b18dd9830dedc9192e1602c5f70bba', 'student', NULL, NULL, 1, '2024-09-16 15:27:06'),
(98, 'Juan Dela Cruz', 'bakalako', 'b066c21af84771926bf006a98030c912.jpg', 'takeriissk@gmail.com', '2fa13879ac5cadbfbd0a017043d49cf837b18dd9830dedc9192e1602c5f70bba', 'instructor', NULL, NULL, 1, '2024-09-16 15:28:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_sessions`
--
ALTER TABLE `active_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessment_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `assessment_questions`
--
ALTER TABLE `assessment_questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `assessment_id` (`assessment_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `certificates_ibfk_1` (`student_id`),
  ADD KEY `certificates_ibfk_2` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `courses_ibfk_1` (`user_id`);

--
-- Indexes for table `course_material`
--
ALTER TABLE `course_material`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `course_material_ibfk_1` (`course_id`);

--
-- Indexes for table `course_registrations`
--
ALTER TABLE `course_registrations`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `course_registrations_ibfk_1` (`course_id`),
  ADD KEY `course_registrations_ibfk_2` (`student_id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`discussion_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `discussions_ibfk_3` (`parent_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `enrollments_ibfk_1` (`user_id`),
  ADD KEY `enrollments_ibfk_2` (`course_id`),
  ADD KEY `enrollments_ibfk_3` (`batch_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `quiz_ibfk_1` (`course_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_student_course` (`student_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_answers_ibfk_1` (`student_id`),
  ADD KEY `student_answers_ibfk_2` (`quiz_id`),
  ADD KEY `student_answers_ibfk_3` (`question_id`);

--
-- Indexes for table `student_assessment_answers`
--
ALTER TABLE `student_assessment_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `assessment_id` (`assessment_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `student_progress`
--
ALTER TABLE `student_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `student_progress_ibfk_1` (`student_id`),
  ADD KEY `student_progress_ibfk_2` (`course_id`);

--
-- Indexes for table `task_sheets`
--
ALTER TABLE `task_sheets`
  ADD PRIMARY KEY (`task_sheet_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `task_sheet_submissions`
--
ALTER TABLE `task_sheet_submissions`
  ADD PRIMARY KEY (`submission_id`),
  ADD UNIQUE KEY `student_id` (`student_id`,`task_sheet_id`),
  ADD KEY `task_sheet_id` (`task_sheet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=917;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9450;

--
-- AUTO_INCREMENT for table `assessment_questions`
--
ALTER TABLE `assessment_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course_material`
--
ALTER TABLE `course_material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9832;

--
-- AUTO_INCREMENT for table `course_registrations`
--
ALTER TABLE `course_registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `discussion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_activity`
--
ALTER TABLE `student_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `student_assessment_answers`
--
ALTER TABLE `student_assessment_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `student_progress`
--
ALTER TABLE `student_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT for table `task_sheets`
--
ALTER TABLE `task_sheets`
  MODIFY `task_sheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7362;

--
-- AUTO_INCREMENT for table `task_sheet_submissions`
--
ALTER TABLE `task_sheet_submissions`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_3` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `announcements_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `assessment_questions`
--
ALTER TABLE `assessment_questions`
  ADD CONSTRAINT `assessment_questions_ibfk_1` FOREIGN KEY (`assessment_id`) REFERENCES `assessments` (`assessment_id`) ON DELETE CASCADE;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificates_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_material`
--
ALTER TABLE `course_material`
  ADD CONSTRAINT `course_material_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_registrations`
--
ALTER TABLE `course_registrations`
  ADD CONSTRAINT `course_registrations_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_registrations_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussions_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `discussions` (`discussion_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollments_ibfk_3` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_9` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD CONSTRAINT `student_activity_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `student_activity_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD CONSTRAINT `student_answers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_answers_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_answers_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `quiz_questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_assessment_answers`
--
ALTER TABLE `student_assessment_answers`
  ADD CONSTRAINT `student_assessment_answers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_assessment_answers_ibfk_2` FOREIGN KEY (`assessment_id`) REFERENCES `assessments` (`assessment_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_assessment_answers_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `assessment_questions` (`question_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_progress`
--
ALTER TABLE `student_progress`
  ADD CONSTRAINT `student_progress_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_progress_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_sheets`
--
ALTER TABLE `task_sheets`
  ADD CONSTRAINT `task_sheets_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `task_sheet_submissions`
--
ALTER TABLE `task_sheet_submissions`
  ADD CONSTRAINT `task_sheet_submissions_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_sheet_submissions_ibfk_4` FOREIGN KEY (`task_sheet_id`) REFERENCES `task_sheets` (`task_sheet_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
