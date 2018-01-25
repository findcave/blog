-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 07:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 as active, 0 as inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id`, `name`, `description`, `status`, `created_at`) VALUES
(1, 'php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 1, '2018-01-09 14:10:08'),
(2, 'Javascript', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 1, '2018-01-09 05:43:47'),
(3, 'java', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 1, '2018-01-09 14:10:14'),
(5, 'html', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 1, '2018-01-11 11:04:15'),
(6, 'vue', 'ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 0, '2018-01-24 14:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `location` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `location`, `status`, `created_at`) VALUES
(1, 'HR', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 'Thrissur', 1, '2018-01-09 14:15:58'),
(2, 'Programming', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 'Palakkad', 0, '2018-01-09 14:16:02'),
(3, 'Designing', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 'west fort', 1, '2018-01-09 14:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `departmentid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `phone`, `email`, `departmentid`, `status`) VALUES
(1, 'Dhaya', '9544885554', 'dhayams01@gmail.com', 3, 0),
(2, 'Renish', '9544885551', 'renish@gmail.com', 3, 1),
(4, 'kannan', '9544885554', 'ka@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `channelid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `slug` text NOT NULL,
  `publishdate` datetime NOT NULL,
  `tags` text NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 as active, 0 as inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `channelid`, `userid`, `slug`, `publishdate`, `tags`, `image`, `status`, `created_at`) VALUES
(6, 'Php Developemnt', 'Php  version since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 1, 4, 'php-developemnt', '2018-01-17 00:00:00', '', 'default.png', 0, '2018-01-24 19:09:48'),
(7, 'designing methods', 'ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 5, 2, 'designing-methods', '2018-01-19 00:00:00', '', 'default.png', 1, '2018-01-24 19:09:38'),
(8, 'designing bootsrtap', 'ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 5, 2, 'designing-bootsrtap', '2018-01-22 00:00:00', '', 'default.png', 0, '2018-01-24 19:09:50'),
(9, 'Javascipt developemnt', 'ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 2, 3, 'javascipt-developemnt', '2018-01-09 00:00:00', '', 'default.png', 1, '2018-01-24 19:09:43'),
(10, 'Css Styling', 'ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 5, 3, 'css-styling', '2018-01-25 00:00:00', '', 'default.png', 1, '2018-01-24 19:09:41'),
(11, 'Java Development', 'JAva ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 3, 4, 'java-development', '2018-01-09 00:00:00', '', 'post_img_p32rrt.jpg', 1, '2018-01-24 19:35:53'),
(13, 'bgcxg dfgdfg', 'dfg dfgdgdsg', 2, 4, 'bgcxg-dfgdfg', '2018-01-26 00:00:00', '', 'post_img_p32rs2.jpg', 1, '2018-01-24 19:36:02'),
(15, 'yyy deve', 'dgfds dsfdsf', 1, 4, 'yyy-deve', '2018-01-26 00:00:00', '', 'default.png', 1, '2018-01-24 19:09:30'),
(16, 'hfh fhdfhf', 'dfgdfg dfg', 2, 4, 'hfh-fhdfhf', '2018-01-26 00:00:00', '', 'default.png', 1, '2018-01-24 19:09:28'),
(17, 'gdftgdfg dfgdfg', 'dfgdfg dfg', 2, 4, 'gdftgdfg-dfgdfg', '2018-01-26 00:00:00', '', 'default.png', 1, '2018-01-24 19:09:26'),
(18, 'gf dfgdfg', 'fdgdfg', 5, 4, 'gf-dfgdfg', '2018-01-26 00:00:00', '', 'default.png', 0, '2018-01-24 19:09:24'),
(19, 'gfhygf gfh', 'gfh', 1, 4, 'gfhygf-gfhgfhf', '2018-01-25 00:00:00', '', 'default.png', 0, '2018-01-24 19:09:21'),
(20, 'ghkjghghhghj ghjgh', 'ghjghj', 5, 4, 'ghkjghghhghj-ghjgh', '2018-01-25 00:00:00', '', 'default.png', 0, '2018-01-24 19:09:19'),
(21, 'nbmbv mbv', 'gfjgfj gfjgfj', 1, 4, 'nbmbv-mbv', '2018-01-26 00:00:00', '', 'post_img_p32q08.jpg', 0, '2018-01-24 18:57:44'),
(22, 'cake php developemnt', 'zxcvxzxz asfasf asfasf asfasfasf d df gdfgdfg dfgdsg dgsdgd gdsgdsg dsgds gsdgsd gdsg dsgdsgdsgds dsgsdd\r\nhjdf dfyhdfhdfdfgdfgstewtew urturt', 1, 4, 'cake-php-developemnt', '2018-01-12 00:00:00', '4,5,6,7', 'post_img_p32vqc.jpg', 1, '2018-01-24 21:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`) VALUES
(2, 'web developmet', '2018-01-24 20:24:21'),
(4, 'php', '2018-01-24 20:59:11'),
(5, 'html', '2018-01-24 20:59:17'),
(6, 'development', '2018-01-24 20:59:22'),
(7, 'designing', '2018-01-24 20:59:29'),
(8, 'java', '2018-01-24 20:59:42'),
(9, 'javascript', '2018-01-24 20:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `usertype` smallint(6) NOT NULL COMMENT '1 as admin, 2 as user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `usertype`, `created_at`) VALUES
(1, 'admin', 'admin@admin.com', '9544885554', '21232f297a57a5a743894a0e4a801fc3', 1, '2018-01-24 12:56:25'),
(2, 'sarath', 'sarath@gmail.com', '9544885553', '202cb962ac59075b964b07152d234b70', 2, '2018-01-24 12:56:29'),
(3, 'renish', 'renish@gmail.com', '9544885554', '202cb962ac59075b964b07152d234b70', 2, '2018-01-24 12:56:30'),
(4, 'dhaya', 'dhayams01@gmail.com', '9544885554', '202cb962ac59075b964b07152d234b70', 2, '2018-01-25 06:49:49'),
(7, 'priya', 'priya@gmail.com', '9544885554', '202cb962ac59075b964b07152d234b70', 2, '2018-01-25 06:37:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
