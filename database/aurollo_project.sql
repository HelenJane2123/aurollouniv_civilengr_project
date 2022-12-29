-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 05:41 PM
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
(14, 2, 36, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', 1, 2, 'M-8665', '2022-12-27', 'Added', '0000-00-00 00:00:00');

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
(132, 14, 1, 'Which of the following does not apply to external styles?', 'AMP.png', '2022-12-27 11:00:04', '0000-00-00 00:00:00'),
(133, 14, 2, 'sdfsdfsa', 'AIA.png', '2022-12-27 11:00:04', '0000-00-00 00:00:00');

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
(171, 1, 111, 'option 1', '1'),
(172, 1, 111, 'sdfgsdfa', '0'),
(173, 1, 111, 'fdgdfgsdfgsd', '0'),
(174, 1, 111, 'dxfsdfas', '0'),
(175, 2, 112, 'gdfgdfg', '0'),
(176, 2, 112, 'dfgdf', '0'),
(177, 2, 112, 'gdfg', '1'),
(178, 2, 112, 'dfgdfgd', '0'),
(179, 1, 113, 'fsdfsdf', '0'),
(180, 1, 113, 'sdfsd', '1'),
(181, 1, 113, 'fsdf', '0'),
(182, 1, 113, 'sdfsdfsd', '0'),
(183, 2, 114, 'fsdfsd', '0'),
(184, 2, 114, 'fsdf', '1'),
(185, 2, 114, 'fsdfsd', '0'),
(186, 2, 114, 'sdfsdfsd', '0'),
(187, 1, 115, 'gfdgdfgd', '1'),
(188, 1, 115, 'gdsgdsf', '0'),
(189, 1, 115, 'gdfg', '0'),
(190, 1, 115, 'dfsgdfg', '0'),
(191, 2, 116, 'gdfgd', '0'),
(192, 2, 116, 'fgdfgdf', '1'),
(193, 2, 116, 'gdfgds', '0'),
(194, 2, 116, 'fgdfgdf', '0'),
(195, 1, 117, 'fsdfsdf', '1'),
(196, 1, 117, 'sdf', '0'),
(197, 1, 117, 'sdfsd', '0'),
(198, 1, 117, 'fsdfsdfs', '0'),
(199, 2, 118, 'fdsdfsd', '0'),
(200, 2, 118, 'fsdf', '1'),
(201, 2, 118, 'sdf', '0'),
(202, 2, 118, 'sdfsdfs', '0'),
(203, 1, 119, 'fdsdfsd', '1'),
(204, 1, 119, 'fsdf', '0'),
(205, 1, 119, 'sdfsdf', '0'),
(206, 1, 119, 'sdfsdf', '0'),
(207, 1, 120, 'option 1', '1'),
(208, 1, 120, 'sdfgsdfa', '0'),
(209, 1, 120, 'dfsdf', '0'),
(210, 1, 120, 'sdfsdfsdfd', '0'),
(211, 1, 121, 'gdfgd', '1'),
(212, 1, 121, 'fgdf', '0'),
(213, 1, 121, 'gdfg', '0'),
(214, 1, 121, 'dfgdfgdf', '0'),
(215, 1, 122, 'vcbcv', '1'),
(216, 1, 122, 'bcvb', '0'),
(217, 1, 122, 'cvb', '0'),
(218, 1, 122, 'vcbcvbcvb', '0'),
(219, 1, 123, 'dfsdf', '1'),
(220, 1, 123, 'sdfsdf', '0'),
(221, 1, 123, 'sfsdf', '0'),
(222, 1, 123, 'sdfsdafs', '0'),
(223, 1, 124, 'clean separation of design & content', '1'),
(224, 1, 124, 'fsdfs', '0'),
(225, 1, 124, 'sdfsaf', '0'),
(226, 1, 124, 'dfsdf', '0'),
(227, 2, 125, 'fsdfsd', '0'),
(228, 2, 125, 'fsd', '1'),
(229, 2, 125, 'fsdfsdfs', '0'),
(230, 2, 125, 'fsdfsd', '0'),
(231, 1, 126, 'ghfg', '1'),
(232, 1, 126, 'hfgh', '0'),
(233, 1, 126, 'gfhfg', '0'),
(234, 1, 126, 'hfghfg', '0'),
(235, 1, 127, 'hgfh', '0'),
(236, 1, 127, 'fghfg', '1'),
(237, 1, 127, 'fghfghf', '0'),
(238, 1, 127, 'hfgh', '0'),
(239, 1, 128, 'fsdfsd', '0'),
(240, 1, 128, 'fsd', '1'),
(241, 1, 128, 'fsdf', '0'),
(242, 1, 128, 'sdfsdfsd', '0'),
(243, 2, 129, 'fsdfsd', '0'),
(244, 2, 129, 'fsdfsd', '0'),
(245, 2, 129, 'fsdf', '1'),
(246, 2, 129, 'sdfsdfsd', '0'),
(247, 1, 130, 'cxvcxvcx', '1'),
(248, 1, 130, 'vcxvxcv', '0'),
(249, 1, 130, 'cvcxvxcv', '0'),
(250, 1, 130, 'vcxvxcvx', '0'),
(251, 2, 131, 'fdsdfsd', '0'),
(252, 2, 131, 'fsdfsdf', '0'),
(253, 2, 131, 'dsfsdf', '1'),
(254, 2, 131, 'sdfsdfsdf', '0'),
(255, 1, 132, 'fsdf', '1'),
(256, 1, 132, 'sdfsd', '0'),
(257, 1, 132, 'fsdf', '0'),
(258, 1, 132, 'sdfsdfsd', '0'),
(259, 2, 133, 'fsdfsd', '0'),
(260, 2, 133, 'fsdf', '0'),
(261, 2, 133, 'sdfsd', '1'),
(262, 2, 133, 'fsdfsdfsd', '0');

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

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `member_id`, `program_name`, `short_desc`, `with_exam`, `upload_image`, `date_created`, `date_modified`) VALUES
(36, 'M-8665', 'Test Program 4', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', 1, 'Merry Christmas.png', '2022-12-27 09:42:48', '0000-00-00 00:00:00');

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
(31, 36, 'reservation_YHYNWVX94L.pdf');

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
-- Table structure for table `student_survey`
--

CREATE TABLE `student_survey` (
  `student_survey_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `student_member_id` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_survey_answer`
--

CREATE TABLE `student_survey_answer` (
  `student_survey_answer_id` int(11) NOT NULL,
  `student_survey_id` int(11) NOT NULL,
  `answers` int(11) NOT NULL
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

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `member_id`, `survey_title`, `survey_description`, `date_created`, `date_modified`) VALUES
(22, 'M-8665', 'Survey Title Test 1', '<p>Once you know their favorite product, you need to understand why they like it so much. The qualitative data will help your marketing and sales teams attract and engage customers. They\'ll know which features to advertise most and can seek out new leads similar to your existing customers.</p>', '2022-12-29', '2022-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `survey_details`
--

CREATE TABLE `survey_details` (
  `survey_details_id` int(11) NOT NULL,
  `survey_questions_id` int(11) NOT NULL,
  `options` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_details`
--

INSERT INTO `survey_details` (`survey_details_id`, `survey_questions_id`, `options`) VALUES
(89, 7, 'Yes'),
(90, 7, 'No'),
(94, 8, 'fsdfsdfs 1'),
(95, 8, 'dfsdfsd 2'),
(96, 8, 'sdfsdf 3');

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE `survey_questions` (
  `survey_questions_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `survey_questions` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_questions`
--

INSERT INTO `survey_questions` (`survey_questions_id`, `survey_id`, `survey_questions`, `date_created`) VALUES
(7, 22, 'Survey Question 1', '2022-12-29'),
(8, 22, 'Survey Question 2', '2022-12-29');

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
(32, 'M-8665', 'johndoemaster@gmail.com', 'John Master', 'Doe', 41465465, 0, '', '', '', '', '', 'Professor', 'password123', '2022-12-27 09:39:27am', ''),
(33, 'M-2681', 'manalohelenjane@gmail.com', 'Helen Jane', 'Manalo', 41465465, 0, '', '', '', '', '', 'Student', 'password123', '2022-12-29 02:04:10pm', '');

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
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `exam_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `exam_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `exam_details_answer`
--
ALTER TABLE `exam_details_answer`
  MODIFY `exam_details_ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `exam_essay`
--
ALTER TABLE `exam_essay`
  MODIFY `exam_essay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `program_additioonal_info`
--
ALTER TABLE `program_additioonal_info`
  MODIFY `program_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
-- AUTO_INCREMENT for table `student_survey`
--
ALTER TABLE `student_survey`
  MODIFY `student_survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_survey_answer`
--
ALTER TABLE `student_survey_answer`
  MODIFY `student_survey_answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `survey_details`
--
ALTER TABLE `survey_details`
  MODIFY `survey_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
  MODIFY `survey_questions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_additional_information`
--
ALTER TABLE `user_additional_information`
  MODIFY `user_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
