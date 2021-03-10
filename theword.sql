-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 10:22 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theword`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_userid` int(5) NOT NULL,
  `article_title` varchar(100) NOT NULL,
  `article_unique` varchar(15) NOT NULL,
  `article_url` varchar(200) NOT NULL,
  `article_content` varchar(10000) NOT NULL,
  `article_featureimg` blob NOT NULL,
  `article_comment` int(5) NOT NULL,
  `article_commentreply` int(5) NOT NULL,
  `article_sharing` int(5) NOT NULL,
  `article_tags` varchar(100) NOT NULL,
  `article_description` varchar(300) NOT NULL,
  `article_status` int(5) NOT NULL,
  `article_featured` int(5) NOT NULL,
  `article_date` int(20) NOT NULL,
  `article_modifieddate` int(20) NOT NULL,
  `article_count` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_userid`, `article_title`, `article_unique`, `article_url`, `article_content`, `article_featureimg`, `article_comment`, `article_commentreply`, `article_sharing`, `article_tags`, `article_description`, `article_status`, `article_featured`, `article_date`, `article_modifieddate`, `article_count`) VALUES
(1, 1, 'I love to go to the gymn and do some stuff & she', '', 'i-love-to-go-to-the-gymn-and-do-some-stuff-she-1501', '<p>I love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; sheI love to go to the gymn and do some stuff &amp; she</p>\r\n', 0x35353936375f36373537323132345f323431393736323437383130373938305f343733313636383138303430343031313030385f6f2e6a7067, 1, 1, 1, '', 'I love to go to the gymn and do some stuff & sheI love to go to the gymn and do some stuff & sheI love to go to the gymn and do some stuff & sheI love to go to the gymn and do some stuff & sheI love to go to the gymn and do some stuff & sheI love to go to the ', 5, 0, 1571564178, 1571583855, 450),
(2, 1, 'god is good to me', '', 'god-is-good-to-me-1502', '', 0x36303930315f496d61676520312e706e67, 0, 0, 0, '', '', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `article_likes`
--

CREATE TABLE `article_likes` (
  `likes_id` int(11) NOT NULL,
  `likes_articleId` int(10) NOT NULL,
  `likes_userId` int(10) NOT NULL,
  `likes_date` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_likes`
--

INSERT INTO `article_likes` (`likes_id`, `likes_articleId`, `likes_userId`, `likes_date`) VALUES
(25, 1, 2, 1571591523),
(26, 1, 1, 1571673099);

-- --------------------------------------------------------

--
-- Table structure for table `article_save`
--

CREATE TABLE `article_save` (
  `save_id` int(11) NOT NULL,
  `save_articleId` int(11) NOT NULL,
  `save_userId` int(11) NOT NULL,
  `save_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_save`
--

INSERT INTO `article_save` (`save_id`, `save_articleId`, `save_userId`, `save_date`) VALUES
(11, 1, 2, 1571591524),
(14, 1, 1, 1571673098);

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `attachment_id` int(11) NOT NULL,
  `attachment_userID` int(10) NOT NULL,
  `attachment_article_id` int(10) NOT NULL,
  `attachment_url` blob NOT NULL,
  `attachment_type` int(5) NOT NULL,
  `attachment_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`attachment_id`, `attachment_userID`, `attachment_article_id`, `attachment_url`, `attachment_type`, `attachment_date`) VALUES
(4, 1, 2, 0x38373039335f4265636f6d696e672d612d467265656c616e63652d41727469636c652d5772697465722e6a7067, 1, '1571678818'),
(6, 1, 2, 0x31333332355f4d6963726f62696f6c6f677920312e706e67, 1, '1571678829'),
(8, 1, 2, 0x37373433375f496d61676520342e706e67, 1, '1571678841'),
(12, 1, 2, 0x34343038315f4265636f6d696e672d612d467265656c616e63652d41727469636c652d5772697465722e6a7067, 1, '1571697434');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_articleId` int(10) NOT NULL,
  `comment_userId` int(10) NOT NULL,
  `comment_content` varchar(502) NOT NULL,
  `comment_type` int(5) NOT NULL,
  `comment_type_id` int(10) NOT NULL,
  `comment_status` int(5) NOT NULL,
  `comment_date` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_articleId`, `comment_userId`, `comment_content`, `comment_type`, `comment_type_id`, `comment_status`, `comment_date`) VALUES
(8, 1, 2, 'How are we doing today How are we doing today How are we doing today How are we doing today How are we doing today How are we doing today \\n\\nHow are we doing today How are we doing today How are we doing today How are we doing today How are we doing today How are we doing\\n today How are we doing today How are we doing today How are we doing today How are \\now are we doing today ', 0, 0, 0, 1571589439),
(11, 1, 2, 'How are we doing today How are we doing today How are we doing today How are we doing today How are we doing today How are we doing today \\n\\nHow are we doing today How are we doing today How are we doing today How are we doing today How are we doing today\\n\\nw are we doing\\n today How are we d\\noing today How are we doing today How are we doing today How are \\now are we doing today ', 0, 0, 1, 1571589680),
(42, 1, 2, 'ssssssssssssssss sssssssssssssssssssssss sssssssssssssss', 0, 0, 0, 1571640667),
(82, 1, 1, ' dsds sdvdsdvs ', 0, 0, 0, 1571650150),
(84, 1, 1, 'ggggggggggg fffffffffffffff', 0, 0, 1, 1571650762),
(85, 1, 1, 'dddddddddddddd', 0, 0, 1, 1571650766),
(86, 1, 1, 'dfds ds', 0, 0, 0, 1571650775),
(105, 1, 1, 'fff', 3, 82, 0, 1571657607),
(106, 1, 1, 'ffff', 3, 82, 0, 1571657611),
(107, 1, 1, 'fff', 3, 82, 0, 1571657614),
(108, 1, 1, 'isaac toyim', 3, 82, 0, 1571657621),
(109, 1, 1, 'lover', 3, 83, 0, 1571657629),
(111, 1, 2, 'okay', 3, 83, 0, 1571657750),
(112, 1, 1, 'xxx', 0, 0, 1, 1571664086),
(113, 1, 1, 'cdc', 0, 0, 1, 1571664192),
(114, 1, 1, 'dd', 0, 0, 1, 1571664194),
(115, 1, 1, 'ccc', 0, 0, 1, 1571664206),
(116, 1, 1, 'ccc', 0, 0, 1, 1571664209),
(117, 1, 1, 'xxx', 0, 0, 1, 1571664225),
(118, 1, 1, 'sss', 0, 0, 1, 1571664233),
(125, 1, 1, 'hi', 3, 7, 0, 1571673104),
(126, 1, 1, 'okay', 3, 7, 0, 1571673109),
(129, 1, 2, 'How are we doing today How are we doing today How are we doing today How are we doing today How are we doing today How are we doing today<br />\n<br />\nHow are we doing today How are we doing today How are we doing today How are we doing today How are we doing today How are we doing.<br />\ntoday How are we doing today How are we doing today How are we doing today How are <br />\nnow are we doing today ', 0, 0, 0, 1571676701),
(130, 1, 2, 'How are we doing today How are we doing today How are we doing today How are we doing today How are we doing today How are we doing today<br />\n<br />\nHow are we doing today How are we doing today How are we doing today How are we doing today How are we doing today How are we doing.<br />\n<br />\ntoday How are we doing today How are we doing today How are we doing today How are<br />\nnow are we doing today ', 0, 0, 0, 1571676715);

-- --------------------------------------------------------

--
-- Table structure for table `main_user`
--

CREATE TABLE `main_user` (
  `user_id` int(11) NOT NULL,
  `user_unique` int(50) NOT NULL,
  `user_firstname` varchar(20) NOT NULL,
  `user_lastname` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(70) NOT NULL,
  `user_passReset` varchar(70) NOT NULL,
  `user_pasQuestion` varchar(65) NOT NULL,
  `user_pasAnswer` varchar(20) NOT NULL,
  `user_status` int(5) NOT NULL,
  `user_regDate` varchar(20) NOT NULL,
  `user_totalLogin` int(200) NOT NULL,
  `user_ip` varchar(20) NOT NULL,
  `user_country` varchar(20) NOT NULL,
  `user_socialLink` varchar(20) NOT NULL,
  `user_count` int(6) NOT NULL,
  `user_cookiesID` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_user`
--

INSERT INTO `main_user` (`user_id`, `user_unique`, `user_firstname`, `user_lastname`, `user_email`, `user_pass`, `user_passReset`, `user_pasQuestion`, `user_pasAnswer`, `user_status`, `user_regDate`, `user_totalLogin`, `user_ip`, `user_country`, `user_socialLink`, `user_count`, `user_cookiesID`) VALUES
(1, 1, 'isaac', 'opera', 'isaacopera@gmail.com', '$2y$10$jnrU19HMEE1E398hFIwQIeb54ummJyiADxFKAuEFA.DxQ3sW/OvDe', '', 'What is your favorite color?', 'blue', 10, '1571523815', 0, '', '', '', 0, '2e2yd9w20yx34_1566453480_65108'),
(2, 1, 'isaac', 'mozila', 'isaacp788@yahoo.com', '$2y$10$HzvISQfW99KYmkZk7L393eTtADdlolRw0QkJbecJAK0sIlXmdxy8G', '', 'What is your favorite color?', 'red', 0, '1571574556', 0, '', '', '', 0, 'sejs4rv5wmwwh_1566430984'),
(3, 1, 'isaacp788', 'isaacp', 'dgame80@gmail.com', '$2y$10$dE.nRo8jpp2ZvTA7WimerOsTCCQ2l7.ye/l18L.8zeuVkvkJvenaW', '', 'What is your favorite color?', 'red', 0, '1571849238', 0, '', '', '', 0, 'sejs4rv5wmwwh_1566430984'),
(5, 1, 'isaac', 'infinix', 'isaacinfinix@gmail.com', '$2y$10$y2As/huJIK02yp15.V3v2OGpMn2hQPez79sX6oDZ7IUV0cg9B64zW', '', 'What is your favorite color?', 'red', 0, '1571908098', 0, '', '', '', 0, 'j1xdcnq7rsydt_1571086781_24051'),
(7, 1, 'isaac@gmail.com', 'isaac@gmail.com', 'isaac@gmail.com', '$2y$10$9oCI0L/MJoQOsStRlsb0KuGcrPhI3HQaG8TcTj28FuR1n698J5URG', '', 'What city were you born in?', 'Isaac@gmail.com', 0, '1571912521', 0, '', '', '', 0, 'sejs4rv5wmwwh_1566430984'),
(8, 1, 'mickeyss@gmail.com', 'mickeyss@gmail.com', 'mickeyss@gmail.com', '$2y$10$SFgHcftPROjz0yzbPdbFSuyQDVRXYWLpvx4k36pK1fzGiRJdpvtwm', '', 'What is your favorite color?', 'Mickeyss@gmail.com', 0, '1571912578', 0, '', '', '', 0, 'sejs4rv5wmwwh_1566430984');

-- --------------------------------------------------------

--
-- Table structure for table `temp_users`
--

CREATE TABLE `temp_users` (
  `temp_users_id` int(11) NOT NULL,
  `temp_users_cookies` varchar(50) NOT NULL,
  `temp_users_ip` varchar(30) NOT NULL,
  `temp_users_count` int(30) NOT NULL,
  `temp_users_date` int(20) NOT NULL,
  `temp_users_lastdate` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_users`
--

INSERT INTO `temp_users` (`temp_users_id`, `temp_users_cookies`, `temp_users_ip`, `temp_users_count`, `temp_users_date`, `temp_users_lastdate`) VALUES
(1, '3gh9mf8eluc2f_1566453930_51770', '197.210.57.212', 12, 1571568330, 1571642855),
(2, '7977tb8z3hw04_1571577348_34471', '197.210.55.203', 4, 1571579919, 1571579926),
(3, '2e2yd9w20yx34_1566453480_65108', '197.210.55.203', 9, 1571579981, 1582983423),
(4, 'j1xdcnq7rsydt_1571086781_24051', '41.203.78.2', 25, 1571899670, 1571908099);

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE `testimony` (
  `testimony_id` int(11) NOT NULL,
  `testimony_userId` int(20) NOT NULL,
  `testimony_name` varchar(50) NOT NULL,
  `testimony_content` varchar(2500) NOT NULL,
  `testimony_status` int(5) NOT NULL,
  `testimony_view` int(5) NOT NULL,
  `testimony_count` int(5) NOT NULL,
  `testimony_date` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `article_likes`
--
ALTER TABLE `article_likes`
  ADD PRIMARY KEY (`likes_id`);

--
-- Indexes for table `article_save`
--
ALTER TABLE `article_save`
  ADD PRIMARY KEY (`save_id`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attachment_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `main_user`
--
ALTER TABLE `main_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `temp_users`
--
ALTER TABLE `temp_users`
  ADD PRIMARY KEY (`temp_users_id`);

--
-- Indexes for table `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`testimony_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article_likes`
--
ALTER TABLE `article_likes`
  MODIFY `likes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `article_save`
--
ALTER TABLE `article_save`
  MODIFY `save_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `main_user`
--
ALTER TABLE `main_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp_users`
--
ALTER TABLE `temp_users`
  MODIFY `temp_users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `testimony_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
