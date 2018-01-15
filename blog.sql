-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2018 at 06:17 PM
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
  `publishdate` date NOT NULL,
  `tags` text NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 as active, 0 as inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `channelid`, `userid`, `slug`, `publishdate`, `tags`, `image`, `status`, `created_at`) VALUES
(6, 'Php Developemnt', 'Php  version since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 1, 4, 'php-developemnt', '2018-01-31', '', 'default.png', 1, '2018-01-15 12:04:08'),
(7, 'designing methods', 'ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 5, 2, 'designing-methods', '2018-01-19', '', 'default.png', 1, '2018-01-24 19:09:38'),
(8, 'designing bootsrtap', 'ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 5, 2, 'designing-bootsrtap', '2018-01-22', '', 'default.png', 1, '2018-01-30 11:59:57'),
(9, 'Javascipt developemnt', 'ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 2, 3, 'javascipt-developemnt', '2018-01-30', '', 'default.png', 1, '2018-01-15 12:04:46'),
(10, 'Css Styling', 'ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 5, 3, 'css-styling', '2018-01-25', '', 'default.png', 1, '2018-01-15 12:04:00'),
(11, 'Java Development', 'JAva ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of', 3, 4, 'java-development', '2018-01-31', '', 'post_img_p2lg7f.jpg', 1, '2018-01-15 12:03:55'),
(22, 'cake php developemnt', 'zxcvxzxz asfasf asfasf asfasfasf d df gdfgdfg dfgdsg dgsdgd gdsgdsg dsgds gsdgsd gdsg dsgdsgdsgds dsgsdd\r\nhjdf dfyhdfhdfdfgdfgstewtew urturt', 1, 4, 'cake-php-developemnt', '2018-01-14', '4,5,6', 'post_img_p32vqc.jpg', 1, '2018-01-15 12:10:57'),
(23, 'laravel development', 'and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', 1, 8, 'laravel-development', '2018-01-15', '4,5,6,7', 'post_img_p33oc8.jpg', 1, '2018-01-15 12:21:55'),
(25, 'gh gugh', 'yfvyg g', 1, 4, 'gh-gugh', '2018-01-09', '5,6', 'post_img_p2lg8n.jpg', 1, '2018-01-15 12:05:45');

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
(9, 'javascript', '2018-01-24 20:59:49'),
(10, 'Laravel', '2018-01-25 08:07:40');

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
(1, 'admin', 'admin@admin.com', '9544885554', '21232f297a57a5a743894a0e4a801fc3', 1, '2018-01-15 11:37:02'),
(2, 'sarath', 'sarath@gmail.com', '9544885553', '202cb962ac59075b964b07152d234b70', 2, '2018-01-24 12:56:29'),
(3, 'renish', 'renish@gmail.com', '9544885554', '202cb962ac59075b964b07152d234b70', 2, '2018-01-24 12:56:30'),
(4, 'dhaya', 'dhayams01@gmail.com', '9544885554', '202cb962ac59075b964b07152d234b70', 2, '2018-01-25 06:49:49'),
(7, 'priya', 'priya@gmail.com', '9544885554', '202cb962ac59075b964b07152d234b70', 2, '2018-01-25 06:37:34'),
(8, 'sruthy', 'sruthy@gmail.com', '9895234765', '202cb962ac59075b964b07152d234b70', 2, '2018-01-25 07:15:31');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
