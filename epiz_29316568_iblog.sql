-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql108.byetcluster.com
-- Generation Time: Jun 06, 2022 at 05:50 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_29316568_iblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `slug` varchar(250) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`id`, `title`, `content`, `meta_description`, `meta_keywords`, `slug`, `image_url`) VALUES
(6, 'Privacy Policy', '<h2>Privacy Policy for iBlog</h2>\r\n<p>At iBlog, accessible from https://iblogsikar.ga, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by iBlog and how we use it.</p>\r\n<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to Contact through email at <strong>pulkitpareek18@gmail.com</strong></p>\r\n<h2>Log Files</h2>\r\n<p>iBlog follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.</p>\r\n<h2>Cookies and Web Beacons</h2>\r\n<p>Like any other website, iBlog uses \'cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.</p>\r\n<h2>Google DoubleClick DART Cookie</h2>\r\n<p>Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL &ndash; <a href=\"https://policies.google.com/technologies/ads\">https://policies.google.com/technologies/ads</a></p>\r\n<h2>Privacy Policies</h2>\r\n<p>You may consult this list to find the Privacy Policy for each of the advertising partners of iBlog. Our Privacy Policy was created with the help of the <a href=\"https://webbeast.in\">GDPR Privacy Policy Generator</a></p>\r\n<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on iBlog, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>\r\n<p>Note that iBlog has no access to or control over these cookies that are used by third-party advertisers.</p>\r\n<h2>Third Pary Privacy Policies</h2>\r\n<p>iBlog\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.</p>\r\n<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites. What Are Cookies?</p>\r\n<h2>Children\'s Information</h2>\r\n<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>\r\n<p>iBlog does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to Contact immediately and we will do our best efforts to promptly remove such information from our records.</p>\r\n<h2>Online Privacy Policy Only</h2>\r\n<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in iBlog. This policy is not applicable to any information collected offline or via channels other than this website.</p>\r\n<h2>Consent</h2>\r\n<p>By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.</p>\r\n<p>&nbsp;</p>', '\r\n          \r\n        ', '\r\n            \r\n  \r\n', 'privacy-policy', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `category_description` text NOT NULL,
  `category_url` text NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_url`, `image_url`) VALUES
(44, 'LEAKED MOVIES', '            HAR TARAH KI MOVIE MILEGI YAHAN    ', 'https://iblog.rf.gd/video/KGF-1', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdaMJIlYVEfvMFVq2GW1HDbGFy3vuhgOKT4g&usqp=CAU'),
(45, 'GOC BY SHASHIKANT CHOUDHARY SIR', '            GOC BY SHASHIKANT CHOUDHARY SIR\r\nSPECIAL REQUEST BY: <b>HARSHIT GARG</b>      ', 'https://iblog.rf.gd/video/GOC-1', 'https://shashikantchoudhary.rf.gd/IMG/CHOUDHARY%20ICON.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `comment_content` text NOT NULL,
  `comment_post_id` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `username`, `comment_content`, `comment_post_id`, `date`) VALUES
(1, 'admin', '', '6', '2022-04-19'),
(2, 'admin', 'comment', '6', '2022-04-19'),
(3, 'Pulkit Pare', 'Yi', '6', '2022-04-19'),
(4, 'admin', 'sf', '6', '2022-04-19'),
(5, 'admin', '&lt;script&gt;alert(\\\"xss\\\");&lt;\\/script&gt;', '6', '2022-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phoneno` text NOT NULL,
  `email` text NOT NULL,
  `concern` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phoneno`, `email`, `concern`, `date`) VALUES
(5, 'Pulkit Pareek', '+919950193240', 'pulkitpareek18@gmail.com', 'fg', '2021-08-03 14:16:14'),
(6, 'Pulkit Pareek', '+919950193240', 'pulkitpareek18@gmail.com', 'vc', '2021-08-04 01:53:42'),
(7, 'Pulkit Pareek', '+919950193240', 'demo@aiovideodl.ml', 'kn', '2021-08-04 03:48:11'),
(8, 'Pulkit Pareek', '+919950193240', 'demo@aiovideodl.ml', 'kn', '2021-08-04 03:49:37'),
(9, 'Pulkit Pareek', '+919950193240', 'hj@h', '<script>alert(\"df\")</script>', '2021-08-17 02:53:10'),
(10, 'Pulkit Pareek', '+919950193240', 'demo@aiovideodl.ml', '<script>alert(\"fd\");</script>', '2021-08-17 02:55:02'),
(11, 'Pulkit Pareek', '+919950193240', 'demo@aiovideodl.ml', '<script>alert(\"fd\");</script>', '2021-08-17 02:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `category_name` text NOT NULL,
  `player_url` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `title`, `content`, `category_id`, `slug`, `category_name`, `player_url`, `meta_description`, `meta_keywords`) VALUES
(88, 'KFG CHAPTER 1', '', 44, 'KGF-1', 'LEAKED MOVIES', 'https://www.youtube.com/embed/gKizDojsdvs', '\r\n          \r\n          \r\n          \r\n          \r\n          \r\n          \r\n        \r\n        \r\n        \r\n        \r\n        \r\n        ', '\r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n\r\n\r\n\r\n\r\n\r\n'),
(90, 'GOC PART 1', '<p><a href=\"https://drive.google.com/drive/folders/1kE5SXWhnVPFCR_K0wCgS8e6-PbuB5yGb\">LOCKDOWN KA PAAP DHONE KE LIYE NOTES</a></p>\r\n<p>&nbsp;</p>', 45, 'GOC-1', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547071148958209-LECTURE%201.mp4', '\r\n          \r\n          \r\n          \r\n          \r\n          \r\n          \r\n          \r\n        \r\n        \r\n        \r\n        \r\n        \r\n        \r\n        ', '\r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(91, 'GOC PART 2', '', 45, 'GOC-2', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547863589651789-Lecture%202-1.mp4', '', ''),
(92, 'GOC PART 3', '', 45, 'GOC-3', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547864125991580-Lecture%203-1.mp4', '', ''),
(93, 'GOC PART 4', '', 45, 'GOC-4', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547864416821971-Lecture%204-1.mp4', '', ''),
(94, 'GOC PART 5', '', 45, 'GOC-5', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547864771545913-Lecture%205-1.mp4', '', ''),
(95, 'GOC PART 6', '', 45, 'GOC-6', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547865109599495-Lecture%206-1.mp4', '\r\n          \r\n        ', '\r\n            \r\n  \r\n'),
(96, 'GOC PART 7', '', 45, 'GOC-7', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547865380764326-Lecture%207-1.mp4', '\r\n          \r\n        ', '\r\n            \r\n  \r\n'),
(97, 'GOC PART 8', '', 45, 'GOC-8', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547865706371053-Lecture%208-1.mp4', '\r\n          \r\n        ', '\r\n            \r\n  \r\n'),
(99, 'GOC PART 9', '', 45, 'GOC-9', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547866054184414-Lecture%209-1.mp4', '\r\n          \r\n        ', '\r\n            \r\n  \r\n'),
(100, 'GOC PART 10', '', 45, 'GOC-10', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547866436604602-Lecture%2010-1.mp4', '\r\n          \r\n        ', '\r\n            \r\n  \r\n'),
(101, 'GOC PART 11', '', 45, 'GOC-11', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547866803891833-Lecture%2011-1.mp4', '\r\n          \r\n        ', '\r\n            \r\n  \r\n'),
(102, 'GOC PART 12', '', 45, 'GOC-12', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547867197441850-Lecture%2012-1.mp4', '\r\n          \r\n        ', '\r\n            \r\n  \r\n'),
(103, 'GOC PART 13', '', 45, 'GOC-13', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547867494990688-Lecture%2013-1.mp4', '\r\n          \r\n          \r\n        \r\n        ', '\r\n            \r\n  \r\n            \r\n  \r\n\r\n'),
(104, 'GOC PART 14', '', 45, 'GOC-14', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547867874655484-Lecture%2014-1.mp4', '\r\n          \r\n        ', '\r\n            \r\n  \r\n'),
(105, 'GOC PART 15', '', 45, 'GOC-15', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547868212053730-Lecture%2015-1.mp4', '\r\n          \r\n        ', '\r\n            \r\n  \r\n'),
(106, 'GOC PART 16', '', 45, 'GOC-16', 'GOC BY SHASHIKANT CHOUDHARY SIR', 'https://d307rhh4vo161h.cloudfront.net/637547868601080921-Lecture%2016-1.mp4', '', ''),
(108, 'ANSWER KEY AAJ KE PAPER KI ', '', 44, 'answer-key', 'LEAKED MOVIES', 'https://pulkitpareek18.github.io/happy-birthday/Ohooo.mp4', '\r\n          \r\n        ', '\r\n            \r\n  \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `reply_comments`
--

CREATE TABLE `reply_comments` (
  `id` int(11) NOT NULL,
  `replied_comment_id` int(11) NOT NULL,
  `reply_comment_content` text NOT NULL,
  `username` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_comments`
--

INSERT INTO `reply_comments` (`id`, `replied_comment_id`, `reply_comment_content`, `username`, `date`) VALUES
(1, 2, 'comment ka reply 1', 'admin', '2022-04-19'),
(2, 2, 'comment ka reply 2\\n', 'admin', '2022-04-19'),
(3, 2, 'a\\nh\\ng', 'admin', '2022-04-19'),
(4, 2, 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'admin', '2022-04-19'),
(5, 3, 'Yo hota hai vo', 'Pulkit Pare', '2022-04-19'),
(6, 1, 'A', 'Pulkit Pare', '2022-04-19'),
(7, 4, 'mg', 'admin', '2022-04-19'),
(8, 5, '&lt;script&gt;alert(\\\"xss\\\");&lt;\\/script&gt;', 'admin', '2022-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `max_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`max_post`) VALUES
(11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1100) NOT NULL,
  `password` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`) VALUES
(1, 'admin', '$2y$10$hbJdDi7ncrrbg.VR7IsJuexZyZvTcfRcHJMOtlyvT9drHzM7Hu.Sa', '2022-04-19 06:26:39'),
(2, 'Pulkit Pare', '$2y$10$YQU2X/j3jZvFOCLq7saTOO8TVtwPyK3BkNkKu5jSZTR23HCIVQoiq', '2022-04-19 09:34:06'),
(3, 'Pulkit Pareek', '$2y$10$BmUKEN3nP4/Q2DEb8hCI5eQMbijLRI4RE/LXAV1kPuAKAROW5M9D.', '2022-04-19 13:06:37'),
(4, 'Vaibhav', '$2y$10$LyIieIPjRb4iLtPhCNfxrOcJ.Oeqki0B9u0H/hpNVIw6kDWcMZUA.', '2022-04-19 13:07:51'),
(5, 'Priyanshu sharma', '$2y$10$D0Ppd4mUCZ5TtvRvAKTd5ekbp8fuaTyVbvQg8uJZXfGpRbYIly8rC', '2022-04-21 07:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `video_comments`
--

CREATE TABLE `video_comments` (
  `comment_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `comment_content` text NOT NULL,
  `comment_post_id` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_comments`
--

INSERT INTO `video_comments` (`comment_id`, `username`, `comment_content`, `comment_post_id`, `date`) VALUES
(1, 'admin', 'Kaisi lagi website', '44', '2022-04-19'),
(2, 'admin', 'comment jaroor karna ', '44', '2022-04-19'),
(4, 'admin', 'test comment', '44', '2022-04-19'),
(5, 'admin', 'AALSI LOG SK CHOUDHARY KE NAAM SE BHI JAANTE HAI', '45', '2022-04-19'),
(6, 'admin', 'SF', '90', '2022-04-19'),
(7, 'admin', 'AALSI LOG SK CHOUDHARY KE NAAM SE BHI JAANTE HAI', '90', '2022-04-19'),
(8, 'admin', 'Aur batao konsi movie chahiye', '88', '2022-04-19'),
(9, 'Pulkit Pareek', 'Harshit Attendance Laga', '90', '2022-04-19'),
(10, 'vaibhav ', 'Wow that\'s greatâ¤ï¸â¤ï¸', '88', '2022-04-19'),
(11, 'vaibhav ', 'â¤ï¸â¤ï¸â¤ï¸excellent', '90', '2022-04-19'),
(12, 'admin', 'Bhai Harshit abhi tak attendance nahi lagayi tune', '90', '2022-04-19'),
(13, 'admin', '&lt;script&gt;alert(\\\"xss\\\");&lt;\\/script&gt;', '90', '2022-04-20'),
(14, 'Priyanshu sharma', 'Mast h\\n', '88', '2022-04-21'),
(15, 'Priyanshu sharma', 'Mast h\\n', '88', '2022-04-21'),
(16, 'Priyanshu sharma', 'Rs jindabaad\\n', '90', '2022-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `video_reply_comments`
--

CREATE TABLE `video_reply_comments` (
  `id` int(11) NOT NULL,
  `replied_comment_id` int(11) NOT NULL,
  `reply_comment_content` text NOT NULL,
  `username` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_reply_comments`
--

INSERT INTO `video_reply_comments` (`id`, `replied_comment_id`, `reply_comment_content`, `username`, `date`) VALUES
(1, 1, 'Mujhe toh acchi lag rahi hai phone me kaisi chal rahi hai vo batana', 'admin', '2022-04-19'),
(2, 1, 'Badhiya h', '', '2022-04-19'),
(3, 1, 'ok', 'admin', '2022-04-19'),
(4, 4, 'test reply', 'admin', '2022-04-19'),
(5, 4, 'test reply 2', 'admin', '2022-04-19'),
(6, 8, '6may ko Dr strange aaygi vo ðŸ˜', 'vaibhav ', '2022-04-19'),
(7, 11, 'Thanks bro', 'admin', '2022-04-19'),
(8, 6, 'time zone check', 'admin', '2022-04-19'),
(9, 6, 'time zone check', 'admin', '2022-04-19'),
(10, 6, 'time zone check', 'admin', '2022-04-19'),
(11, 6, 'df', 'admin', '2022-04-19'),
(12, 8, 'ok', 'admin', '2022-04-19'),
(13, 6, 'df', 'admin', '2022-04-19'),
(14, 13, '&lt;script&gt;alert(\\\"xss\\\")&lt;\\/script&gt;', 'admin', '2022-04-20'),
(15, 16, 'Haan bhai hai kya koi', 'admin', '2022-04-21'),
(16, 15, 'hmmmm', '', '2022-04-21'),
(17, 15, 'timezone check', 'admin', '2022-04-21'),
(18, 15, 'sf', 'admin', '2022-04-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `reply_comments`
--
ALTER TABLE `reply_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`max_post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video_comments`
--
ALTER TABLE `video_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `video_reply_comments`
--
ALTER TABLE `video_reply_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `reply_comments`
--
ALTER TABLE `reply_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `video_comments`
--
ALTER TABLE `video_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `video_reply_comments`
--
ALTER TABLE `video_reply_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
