-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 05:22 PM
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
-- Database: `aurollo_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `exam_category_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `exam_description` longtext NOT NULL,
  `duration` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `exam_status` varchar(50) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_category_id`, `program_id`, `exam_description`, `duration`, `total_questions`, `member_id`, `date_created`, `exam_status`, `date_modified`) VALUES
(14, 2, 36, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', 1, 2, 'M-8665', '2022-12-27', 'Added', '0000-00-00 00:00:00'),
(15, 1, 37, '', 0, 0, 'M-8665', '2023-02-24', 'Added', '0000-00-00 00:00:00'),
(16, 1, 36, '', 0, 1, 'M-8665', '2023-02-24', 'Added', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `exam_category_id` int(11) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `exam_category` varchar(50) NOT NULL,
  `exam_cat_desc` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date-modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE `exam_details` (
  `exam_details_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `question_image` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`exam_details_id`, `exam_id`, `question_no`, `question`, `question_image`, `date_created`, `date_modified`) VALUES
(229, 14, 1, 'Question 1', '50-INTEGRITY.png', '2023-02-27 05:19:07', '0000-00-00 00:00:00'),
(230, 14, 2, 'Question 2', '40-AIA.png', '2023-02-27 05:19:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_details_answer`
--

CREATE TABLE `exam_details_answer` (
  `exam_details_ans_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `exam_details_id` int(11) NOT NULL,
  `answers` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_details_answer`
--

INSERT INTO `exam_details_answer` (`exam_details_ans_id`, `question_no`, `exam_details_id`, `answers`, `correct_answer`) VALUES
(623, 1, 229, 'option 1', '1'),
(624, 1, 229, 'option 2', '0'),
(625, 1, 229, 'option 3', '0'),
(626, 1, 229, 'option 4', '0'),
(627, 2, 230, 'fsdfsd', '0'),
(628, 2, 230, 'sdfsdf', '1'),
(629, 2, 230, 'fdgdfgsdfgsd', '0'),
(630, 2, 230, 'Reduces page download time', '0');

-- --------------------------------------------------------

--
-- Table structure for table `exam_essay`
--

CREATE TABLE `exam_essay` (
  `exam_essay_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `essay` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(50) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `short_desc` longtext NOT NULL,
  `with_exam` int(2) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `member_id`, `program_name`, `short_desc`, `with_exam`, `upload_image`, `date_created`, `date_modified`) VALUES
(36, 'M-8665', 'Test Program 4', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', 1, 'Merry Christmas.png', '2022-12-27 09:42:48', '0000-00-00 00:00:00'),
(37, 'M-8665', 'Test Program 5', '<p>This is an essay</p>', 1, '', '2023-02-24 04:11:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `program_additioonal_info`
--

CREATE TABLE `program_additioonal_info` (
  `program_info_id` int(11) NOT NULL,
  `program_id` int(50) NOT NULL,
  `program_uploaded_files` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_additioonal_info`
--

INSERT INTO `program_additioonal_info` (`program_info_id`, `program_id`, `program_uploaded_files`) VALUES
(31, 36, 'reservation_YHYNWVX94L.pdf'),
(32, 37, '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `student_member_id` varchar(50) NOT NULL,
  `program_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_attempt` int(11) NOT NULL,
  `stud_exam_status` int(11) NOT NULL,
  `exam_score` int(11) NOT NULL,
  `score_status` varchar(20) NOT NULL,
  `prof_comment_if_essay` longtext NOT NULL,
  `unenroll_student` int(11) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `account_id`, `member_id`, `student_member_id`, `program_id`, `exam_id`, `exam_attempt`, `stud_exam_status`, `exam_score`, `score_status`, `prof_comment_if_essay`, `unenroll_student`, `date_modified`) VALUES
(52, 35, 'M-8665', 'M-9506', 36, 14, 1, 2, 50, 'Failed', '', 0, '2023-02-27 04:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE `student_answers` (
  `student_answer_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_details_ans_id` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `exam_taken` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_answers`
--

INSERT INTO `student_answers` (`student_answer_id`, `exam_id`, `student_id`, `exam_details_ans_id`, `answer`, `status`, `exam_taken`) VALUES
(194, 14, 52, 567, 0, 'old', '2023-02-27 04:47:52'),
(195, 14, 52, 571, 1, 'new', '2023-02-27 04:50:37'),
(196, 14, 52, 567, 0, 'new', '2023-02-27 04:51:36'),
(197, 14, 52, 623, 0, 'new', '2023-02-27 05:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `student_essay_answer`
--

CREATE TABLE `student_essay_answer` (
  `essay_answer_id` int(11) NOT NULL,
  `exam_essay_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_answer` longtext NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_survey`
--

CREATE TABLE `student_survey` (
  `student_survey_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `student_member_id` varchar(50) NOT NULL,
  `survey_status` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_survey_answer`
--

CREATE TABLE `student_survey_answer` (
  `student_survey_answer_id` int(11) NOT NULL,
  `student_survey_id` int(11) NOT NULL,
  `survey_questions_id` int(11) NOT NULL,
  `survey_details_id` int(11) NOT NULL,
  `answers` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `survey_title` varchar(255) NOT NULL,
  `survey_description` text NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey_details`
--

CREATE TABLE `survey_details` (
  `survey_details_id` int(11) NOT NULL,
  `survey_questions_id` int(11) NOT NULL,
  `options` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE `survey_questions` (
  `survey_questions_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `survey_questions` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `date_updated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `member_id`, `email_address`, `firstname`, `last_name`, `phone_number`, `age`, `birthday`, `religion`, `blood_type`, `upload_image`, `gender`, `user_type`, `password`, `is_approved`, `date_created`, `date_updated`) VALUES
(32, 'M-8665', 'johndoemaster@gmail.com', 'John Master', 'Doe', 41465465, 0, '', '', '', '', '', 'Professor', 'password123', 1, '2022-12-27 09:39:27am', ''),
(33, 'M-2681', 'manalohelenjane@gmail.com', 'Helen Jane', 'Manalo', 41465465, 0, '', '', '', '', '', 'Student', 'password123', 1, '2022-12-29 02:04:10pm', ''),
(34, 'M-2495', 'manalohelenjane1@gmail.com', 'Helen Jane 1', 'Manalo 1', 41465465, 0, '', '', '', '', '', 'Student', 'password123', 0, '2023-01-03 12:56:12pm', ''),
(35, 'M-9506', 'manalohelendoe@gmail.com', 'Helen Jane', 'Doe', 41465465, 0, '', '', '', '', '', 'Student', 'password123', 1, '2023-02-24 09:19:02am', ''),
(36, 'M-0000admin', 'masteradmin@gmail.com', 'Super Admin', 'Super Admin', 0, 0, '', '', '', '', '', 'SuperAdmin', 'password123', 1, '', ''),
(38, 'M-2229', 'manalohelenjane2@gmail.com', 'Helen Jane 2', 'Manalo 2', 41465465, 0, '', '', '', '', '', 'Professor', 'password123', 0, '2023-02-24 01:29:40pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_additional_information`
--

CREATE TABLE `user_additional_information` (
  `user_account_id` int(11) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `academic_year` int(5) NOT NULL,
  `teaching_class` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `section` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`exam_category_id`);

--
-- Indexes for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD PRIMARY KEY (`exam_details_id`);

--
-- Indexes for table `exam_details_answer`
--
ALTER TABLE `exam_details_answer`
  ADD PRIMARY KEY (`exam_details_ans_id`);

--
-- Indexes for table `exam_essay`
--
ALTER TABLE `exam_essay`
  ADD PRIMARY KEY (`exam_essay_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `program_additioonal_info`
--
ALTER TABLE `program_additioonal_info`
  ADD PRIMARY KEY (`program_info_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD PRIMARY KEY (`student_answer_id`);

--
-- Indexes for table `student_essay_answer`
--
ALTER TABLE `student_essay_answer`
  ADD PRIMARY KEY (`essay_answer_id`);

--
-- Indexes for table `student_survey`
--
ALTER TABLE `student_survey`
  ADD PRIMARY KEY (`student_survey_id`);

--
-- Indexes for table `student_survey_answer`
--
ALTER TABLE `student_survey_answer`
  ADD PRIMARY KEY (`student_survey_answer_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `survey_details`
--
ALTER TABLE `survey_details`
  ADD PRIMARY KEY (`survey_details_id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD PRIMARY KEY (`survey_questions_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_additional_information`
--
ALTER TABLE `user_additional_information`
  ADD PRIMARY KEY (`user_account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `exam_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `exam_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `exam_details_answer`
--
ALTER TABLE `exam_details_answer`
  MODIFY `exam_details_ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=631;

--
-- AUTO_INCREMENT for table `exam_essay`
--
ALTER TABLE `exam_essay`
  MODIFY `exam_essay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `program_additioonal_info`
--
ALTER TABLE `program_additioonal_info`
  MODIFY `program_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `student_answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `student_essay_answer`
--
ALTER TABLE `student_essay_answer`
  MODIFY `essay_answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_survey`
--
ALTER TABLE `student_survey`
  MODIFY `student_survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_survey_answer`
--
ALTER TABLE `student_survey_answer`
  MODIFY `student_survey_answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `survey_details`
--
ALTER TABLE `survey_details`
  MODIFY `survey_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
  MODIFY `survey_questions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_additional_information`
--
ALTER TABLE `user_additional_information`
  MODIFY `user_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
