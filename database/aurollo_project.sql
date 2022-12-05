-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 05:04 PM
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
(10, 2, 32, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 3, 'M-1705', '2022-11-30', 'Added', '0000-00-00 00:00:00'),
(11, 2, 33, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>', 3, 2, 'M-1705', '2022-11-30', 'Added', '0000-00-00 00:00:00'),
(12, 2, 34, '<p>fsdfsdfsadfsadfsa</p>', 3, 2, 'M-1705', '2022-12-01', 'Added', '0000-00-00 00:00:00'),
(13, 1, 35, '', 0, 0, 'M-1705', '2022-12-01', 'Added', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`exam_details_id`, `exam_id`, `question_no`, `question`, `date_created`, `date_modified`) VALUES
(104, 10, 1, 'Question 1 sdfsafsdf', '2022-11-30 03:56:57', '0000-00-00 00:00:00'),
(105, 10, 2, 'Question 2 sdasdasd', '2022-11-30 03:56:58', '0000-00-00 00:00:00'),
(106, 10, 3, 'Question 3 sadasdfas', '2022-11-30 03:56:58', '0000-00-00 00:00:00'),
(107, 11, 1, 'Question 1 sdfsdfsd', '2022-11-30 03:59:22', '0000-00-00 00:00:00'),
(108, 11, 2, 'Question 2 sadasfdasedfs', '2022-11-30 03:59:23', '0000-00-00 00:00:00'),
(109, 12, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever', '2022-12-01 04:42:13', '0000-00-00 00:00:00'),
(110, 12, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever sdfsdfsadfsadfsa', '2022-12-01 04:42:14', '0000-00-00 00:00:00');

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
(132, 3, 101, 'ffsdfsdfsdf', '0'),
(133, 3, 101, 'dfsdfsdf', '1'),
(134, 3, 101, 'sdfsdfsdfsd', '0'),
(135, 4, 102, 'hfghfg', '1'),
(136, 4, 102, 'ghfghfdg', '0'),
(137, 4, 102, 'hfgh', '0'),
(138, 4, 102, 'fghfghfdghfd', '0'),
(139, 5, 103, 'fgfdghfgh', '1'),
(140, 5, 103, 'gfhfg', '0'),
(141, 5, 103, 'hfghfg', '0'),
(142, 5, 103, 'hfghfgd', '0'),
(143, 1, 104, 'Question 101', '1'),
(144, 1, 104, 'Question 102', '0'),
(145, 1, 104, 'Question 103', '0'),
(146, 1, 104, 'Question 104', '0'),
(147, 2, 105, 'Question 201', '0'),
(148, 2, 105, 'Question 202', '1'),
(149, 2, 105, 'Question 203', '0'),
(150, 2, 105, 'Question 204', '0'),
(151, 3, 106, 'Question 301', '0'),
(152, 3, 106, 'Question 302', '0'),
(153, 3, 106, 'Question 303', '1'),
(154, 3, 106, 'Question 304', '0'),
(155, 1, 107, 'dfsdfsd', '0'),
(156, 1, 107, 'fgsadfg', '1'),
(157, 1, 107, 'fgdfgdfsgds', '0'),
(158, 1, 107, 'fdgdfgdfgd', '0'),
(159, 2, 108, 'gdfg', '0'),
(160, 2, 108, 'dfgdg', '0'),
(161, 2, 108, 'dfgdsgdfsg', '0'),
(162, 2, 108, 'fgdfsgdsfg', '1'),
(163, 1, 109, 'fsdfsadf', '1'),
(164, 1, 109, 'sdfsad', '0'),
(165, 1, 109, 'fsadfsad', '0'),
(166, 1, 109, 'fasdfsadfsad', '0'),
(167, 2, 110, 'fsadfs', '0'),
(168, 2, 110, 'adfsdf', '1'),
(169, 2, 110, 'sdfsd', '0'),
(170, 2, 110, 'fsdfsdfsdaf', '0');

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

--
-- Dumping data for table `exam_essay`
--

INSERT INTO `exam_essay` (`exam_essay_id`, `exam_id`, `essay`, `date_created`, `date_modified`) VALUES
(4, 13, '<ol>\r\n<li class=\"p1\"><span class=\"s1\">Do you agree or disagree with the following statement? Parents are the best teachers. Use specific reasons and examples to support your answer.&nbsp;</span></li>\r\n</ol>', '2022-12-01 12:50:12', '0000-00-00 00:00:00');

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
(32, 'M-1705', 'Test Program 6', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.</p>', 1, '171142.jpg', '2022-11-30 03:53:02', '0000-00-00 00:00:00'),
(33, 'M-1705', 'Test Program 1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>', 1, '632900.jpg', '2022-11-30 03:58:27', '0000-00-00 00:00:00'),
(34, 'M-1705', 'Test Program 4', '<p>fsdfsdfsdfsdfsdfs</p>', 1, 'Spring-Images-Desktop-Wallpaper.jpg', '2022-12-01 04:41:09', '0000-00-00 00:00:00'),
(35, 'M-1705', 'Test Program 2', '<p>dfsdfsdfsdfsdfsdfsdfsdf</p>', 1, '20473183.png', '2022-12-01 12:48:50', '0000-00-00 00:00:00');

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
(27, 32, '05_Handout_19-Queues...pdf'),
(28, 33, '04_Handout_191-Stacks.pdf'),
(29, 34, 'medical.pdf'),
(30, 35, '06_Handout_16-Trees.pdf');

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

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `account_id`, `member_id`, `student_member_id`, `program_id`, `exam_attempt`, `stud_exam_status`, `exam_score`, `score_status`, `prof_comment_if_essay`, `unenroll_student`, `date_modified`) VALUES
(40, 27, 'M-1705', 'M-5882', 32, 3, 2, 67, 'Satisfactory', '', 0, '2022-12-05 04:11:18'),
(41, 27, 'M-1705', 'M-5882', 34, 3, 2, 50, 'Failed', '', 0, '2022-12-05 04:13:43'),
(42, 31, 'M-1705', 'M-486', 34, 3, 2, 100, 'Outstanding', '', 0, '2022-12-05 04:20:09'),
(43, 28, 'M-1705', 'M-3744', 35, 0, 0, 0, '', '', 0, '2022-12-05 04:21:05'),
(44, 31, 'M-1705', 'M-486', 35, 0, 0, 0, '', '', 0, '2022-12-05 05:02:31');

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
(151, 10, 40, 143, 1, 'old', '2022-12-05 03:39:10'),
(152, 10, 40, 147, 1, 'old', '2022-12-05 03:39:11'),
(153, 10, 40, 151, 1, 'old', '2022-12-05 03:39:12'),
(170, 10, 40, 143, 1, 'old', '2022-12-05 04:10:23'),
(171, 10, 40, 147, 0, 'old', '2022-12-05 04:10:31'),
(172, 10, 40, 151, 0, 'old', '2022-12-05 04:10:39'),
(173, 10, 40, 143, 1, 'new', '2022-12-05 04:10:56'),
(174, 10, 40, 147, 1, 'new', '2022-12-05 04:11:04'),
(175, 10, 40, 151, 0, 'new', '2022-12-05 04:11:10'),
(176, 12, 41, 163, 0, 'old', '2022-12-05 04:12:53'),
(177, 12, 41, 167, 0, 'old', '2022-12-05 04:12:54'),
(178, 12, 41, 163, 1, 'old', '2022-12-05 04:13:15'),
(179, 12, 41, 167, 0, 'old', '2022-12-05 04:13:22'),
(180, 12, 41, 163, 0, 'new', '2022-12-05 04:13:38'),
(181, 12, 41, 167, 1, 'new', '2022-12-05 04:13:40'),
(182, 12, 42, 163, 1, 'old', '2022-12-05 04:19:33'),
(183, 12, 42, 167, 0, 'old', '2022-12-05 04:19:35'),
(184, 12, 42, 163, 0, 'old', '2022-12-05 04:19:53'),
(185, 12, 42, 167, 1, 'old', '2022-12-05 04:19:56'),
(186, 12, 42, 163, 1, 'new', '2022-12-05 04:20:04'),
(187, 12, 42, 167, 1, 'new', '2022-12-05 04:20:06');

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

--
-- Dumping data for table `student_essay_answer`
--

INSERT INTO `student_essay_answer` (`essay_answer_id`, `exam_essay_id`, `student_id`, `student_answer`, `exam_id`) VALUES
(6, 4, 33, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 13);

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

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `member_id`, `email_address`, `firstname`, `last_name`, `phone_number`, `age`, `birthday`, `religion`, `blood_type`, `upload_image`, `gender`, `user_type`, `password`, `date_created`, `date_updated`) VALUES
(27, 'M-5882', 'manalohelenjane@gmail.com', 'Helen Jane', 'Manalo', 41465465, 30, '1991-07-23', 'test', 'A', '', 'Female', 'Student', 'password', '2022-10-24 10:53:40am', '2022-11-26 02:20:03pm'),
(28, 'M-3744', 'johndoe@gmail.com', 'John', 'Doe', 41465465, 0, '', '', '0', '0', '', 'Student', 'password', '2022-10-24 10:54:35am', ''),
(29, 'M-4299', 'manalohelenjane1@gmail.com', 'Helen Jane 1', 'Manalo', 41465465, 0, '', '', '0', '0', '', 'Student', 'password', '2022-10-24 10:55:50am', ''),
(30, 'M-1705', 'johndoemaster@gmail.com', 'John Master', 'Doe 1', 41465465, 30, '2022-11-11', 'test', 'A+', '', 'Male', 'Professor', 'password', '2022-10-24 01:20:28pm', '2022-11-30 01:37:14pm'),
(31, 'M-486', 'hecer01@gmail.com', 'Hecer', 'Test ', 41465465, 20, '2002-11-30', 'Test', 'A', '', 'Male', 'Student', 'password', '2022-11-30 01:22:46pm', '2022-11-30 01:26:03pm');

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
-- Dumping data for table `user_additional_information`
--

INSERT INTO `user_additional_information` (`user_account_id`, `member_id`, `academic_year`, `teaching_class`, `course`, `section`, `class`) VALUES
(1, 'M-1705', 2022, 'test', '', 'test', ''),
(2, 'M-5882', 2022, '', 'Electical Engineering', 'Test', '1B'),
(3, 'M-486', 2022, '', 'Information Technology', 'Testing', '1B');

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
