-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 02:16 PM
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
(8, 1, 24, 'test', 0, 0, 'M-1705', '2022-11-28', 'Added', '0000-00-00 00:00:00'),
(9, 2, 30, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.</p>', 2, 5, 'M-1705', '2022-11-30', 'Added', '0000-00-00 00:00:00');

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
(95, 5, 1, 'Which of the following does not apply to external styles?', '2022-11-28 11:27:30', '0000-00-00 00:00:00'),
(96, 5, 2, 'sdfsdfsa', '2022-11-28 11:27:30', '0000-00-00 00:00:00'),
(97, 5, 3, 'fgdfsgdfsgdf', '2022-11-28 11:27:31', '0000-00-00 00:00:00'),
(98, 5, 4, 'fghfghfgdhfdg', '2022-11-28 11:27:31', '0000-00-00 00:00:00'),
(99, 9, 1, 'Test 1', '2022-11-30 01:50:37', '0000-00-00 00:00:00'),
(100, 9, 2, 'Test 2', '2022-11-30 01:50:37', '0000-00-00 00:00:00'),
(101, 9, 3, 'Test 3', '2022-11-30 01:50:37', '0000-00-00 00:00:00'),
(102, 9, 4, 'Test 4', '2022-11-30 01:50:37', '0000-00-00 00:00:00'),
(103, 9, 5, 'Test 5', '2022-11-30 01:50:38', '0000-00-00 00:00:00');

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
(107, 1, 95, 'clean separation of design & content', '1'),
(108, 1, 95, 'minimal code duplication', '0'),
(109, 1, 95, 'Highest priority', '0'),
(110, 1, 95, 'Reduces page download time', '0'),
(111, 2, 96, 'fdgdfgfdgdfsg', '0'),
(112, 2, 96, 'gfdg', '1'),
(113, 2, 96, 'dfgdsfg', '0'),
(114, 2, 96, 'dfsgdsfgds', '0'),
(115, 3, 97, 'gdfg', '0'),
(116, 3, 97, 'dfgd', '0'),
(117, 3, 97, 'fsgdfgdfg', '0'),
(118, 3, 97, 'fdgdfgdsfgds', '1'),
(119, 4, 98, 'dfgdfg', '1'),
(120, 4, 98, 'dfg', '0'),
(121, 4, 98, 'dfgdf', '0'),
(122, 4, 98, 'gdgfds', '0'),
(123, 1, 99, 'a. 1', '1'),
(124, 1, 99, 'B. SDFASDFSD', '0'),
(125, 1, 99, 'C.dfsdfsdf', '0'),
(126, 1, 99, 'D. DFRSDFTSDFTGSD', '0'),
(127, 2, 100, 'a. dsfhsjkdfhjskdfh', '0'),
(128, 2, 100, 'b. hsjdhjasdhasdf', '0'),
(129, 2, 100, 'c. hsjdhsafdhsdf', '0'),
(130, 2, 100, 'd. hsdjfhsdjfgsdjkf', '1'),
(131, 3, 101, 'dfsdfsd', '0'),
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
(142, 5, 103, 'hfghfgd', '0');

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
(3, 8, '<ol>\r\n<li class=\"p1\">\r\n<p class=\"p1\"><span class=\"s1\">It has been said, \"Not everything that is learned is contained in books.\" Compare and contrast knowledge gained from experience with knowledge gained from books. In your opinion, which source is more important? Why?&nbsp;</span></p>\r\n</li>\r\n</ol>', '2022-11-28 02:42:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_essay_answer`
--

CREATE TABLE `exam_essay_answer` (
  `essay_answer_id` int(11) NOT NULL,
  `exam_essay_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `essay_score` int(11) NOT NULL,
  `date_exam_taken` date NOT NULL,
  `date_modified` date NOT NULL
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
(24, 'M-1705', 'Program 01', '<h2 class=\"h4 pt3\">What is Civil Engineering?</h2>\r\n<p>One of the oldest engineering disciplines, civil engineering is the applied science of physics and mathematics to address the infrastructural needs of human civilization. This includes construction engineering, bridge engineering, highway engineering, and the basic maintenance of roads, canals, dams, and buildings. Throughout history civil engineers have not only been key to advancing societies, but their work has produced some of our most enduring artifacts - take, for example, the Ancient Egyptian pyramids or the Roman aqueducts &ndash; both stand as enormous feats of civil engineering.</p>', 1, '1.jpg', '2022-11-26 04:30:20', '0000-00-00 00:00:00'),
(25, 'M-1705', 'Program 02', '<h2 class=\"h4 pt3\">What is a Civil Engineer?</h2>\r\n<p>A civil engineer helps to design and build public works infrastructure including roads, bridges, canals, dams, airports, sewerage systems, pipelines, buildings, and railways.</p>', 1, '2.jpg', '2022-11-26 05:00:28', '0000-00-00 00:00:00'),
(27, 'M-1705', 'Program 03', '<p>Beyond the study of structural engineering books, today most civil engineers work in offices designing structural plans that can withstand changes in our environment including earthquakes and hurricanes. Civil engineers are also often responsible for the construction management of civil engineering projects in the field.</p>', 2, '3.jpg', '2022-11-26 05:18:49', '0000-00-00 00:00:00'),
(28, 'M-1705', 'Program 04', '<h2 class=\"h4 pt3\">Jobs in Civil Engineering</h2>\r\n<p>According to the United States Bureau of Employment Statistics, the median income for civil engineers in 2016 was over $80,000 per year. According to the same report, employment opportunities for civil engineers is projected to grow by 11 percent from 2016 to 2026, exceeding the growth average for all occupations.</p>', 2, '4.jpg', '2022-11-26 05:19:38', '0000-00-00 00:00:00'),
(30, 'M-1705', 'Test Program 6', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>', 1, 'Spring-Images-Desktop-Wallpaper.jpg', '2022-11-30 01:41:06', '0000-00-00 00:00:00'),
(31, 'M-1705', 'Test Program 4', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.&nbsp;</p>', 2, '171142.jpg', '2022-11-30 01:41:38', '0000-00-00 00:00:00');

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
(19, 24, '04_Handout_191-Stacks.pdf'),
(20, 25, 'medical.pdf'),
(21, 26, '06_Handout_16-Trees.pdf'),
(22, 27, '06_Handout_16-Trees.pdf'),
(23, 28, '05_Handout_19-Queues...pdf'),
(25, 30, '04_Handout_191-Stacks.pdf'),
(26, 31, 'medical.pdf');

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
  `exam_status` int(11) NOT NULL,
  `exam_score` int(11) NOT NULL,
  `score_status` varchar(20) NOT NULL,
  `unenroll_student` int(11) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `account_id`, `member_id`, `student_member_id`, `program_id`, `exam_status`, `exam_score`, `score_status`, `unenroll_student`, `date_modified`) VALUES
(8, 27, 'M-1705', 'M-5882', 25, 0, 0, '', 0, '2022-11-26 02:45:14'),
(9, 27, 'M-1705', 'M-5882', 24, 2, 25, 'Failed', 0, '2022-11-30 01:05:44'),
(11, 27, 'M-1705', 'M-5882', 28, 0, 0, '', 0, '2022-11-26 03:18:22'),
(13, 31, 'M-1705', 'M-486', 24, 2, 50, 'Failed', 1, '2022-11-30 01:57:29'),
(14, 31, 'M-1705', 'M-486', 31, 0, 0, '', 1, '2022-11-30 01:57:29'),
(15, 28, 'M-1705', 'M-3744', 27, 0, 0, '', 0, '2022-11-30 01:59:16'),
(18, 28, 'M-1705', 'M-3744', 25, 0, 0, '', 0, '2022-11-30 02:02:13'),
(19, 28, 'M-1705', 'M-3744', 28, 0, 0, '', 0, '2022-11-30 02:02:24'),
(20, 28, 'M-1705', 'M-3744', 30, 0, 0, '', 0, '2022-11-30 02:02:35');

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
-- Indexes for table `exam_essay_answer`
--
ALTER TABLE `exam_essay_answer`
  ADD PRIMARY KEY (`essay_answer_id`);

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
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `exam_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `exam_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `exam_details_answer`
--
ALTER TABLE `exam_details_answer`
  MODIFY `exam_details_ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `exam_essay`
--
ALTER TABLE `exam_essay`
  MODIFY `exam_essay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_essay_answer`
--
ALTER TABLE `exam_essay_answer`
  MODIFY `essay_answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `program_additioonal_info`
--
ALTER TABLE `program_additioonal_info`
  MODIFY `program_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
