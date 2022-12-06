-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 02:48 AM
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
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `program_additioonal_info`
--

CREATE TABLE `program_additioonal_info` (
  `program_info_id` int(11) NOT NULL,
  `program_id` int(50) NOT NULL,
  `program_uploaded_files` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `exam_attempt` int(11) NOT NULL,
  `stud_exam_status` int(11) NOT NULL,
  `exam_score` int(11) NOT NULL,
  `score_status` varchar(20) NOT NULL,
  `prof_comment_if_essay` longtext NOT NULL,
  `unenroll_student` int(11) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `date_created` varchar(100) NOT NULL,
  `date_updated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `exam_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `exam_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `exam_details_answer`
--
ALTER TABLE `exam_details_answer`
  MODIFY `exam_details_ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `exam_essay`
--
ALTER TABLE `exam_essay`
  MODIFY `exam_essay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `program_additioonal_info`
--
ALTER TABLE `program_additioonal_info`
  MODIFY `program_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `student_answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `student_essay_answer`
--
ALTER TABLE `student_essay_answer`
  MODIFY `essay_answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_additional_information`
--
ALTER TABLE `user_additional_information`
  MODIFY `user_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
