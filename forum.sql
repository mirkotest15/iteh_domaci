-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 06:08 PM
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
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(16) NOT NULL,
  `commentContents` varchar(200) NOT NULL,
  `commentTime` datetime(5) NOT NULL,
  `commentAuthor` int(16) NOT NULL,
  `commentPost` int(16) NOT NULL,
  `commentReply` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likedBy` int(16) NOT NULL,
  `likedPost` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likedBy`, `likedPost`) VALUES
(2, 4),
(2, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(16) NOT NULL,
  `postTitle` varchar(50) NOT NULL,
  `postTime` datetime NOT NULL,
  `postContents` varchar(500) NOT NULL,
  `postAuthor` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `postTime`, `postContents`, `postAuthor`) VALUES
(3, 'Mirko2-ov novi post', '2022-11-12 21:34:37', 'Post#3 mirko2 se sign inovao, novi account napravljen, da li sada rade CRUD operacije', 2),
(4, 'mirko2 treci post', '2022-11-12 21:54:42', 'mirko\r\nje \r\ndanas\r\nulogovan\r\nsa\r\npfp-a', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(16) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `admin` bit(1) NOT NULL DEFAULT b'0',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `admin`, `email`) VALUES
(1, 'mirko', 'mirko', b'1', 'mirko@gmail.com'),
(2, 'mirko2', 'mirko2', b'0', 'mirko2@gmail.com'),
(3, 'mirko3', 'mirko3', b'0', 'mirko3@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `author_user_fk` (`commentAuthor`),
  ADD KEY `post_commented_fk` (`commentPost`),
  ADD KEY `replied_to_fk` (`commentReply`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `user_fk_liked_by` (`likedBy`),
  ADD KEY `posts_fk_liked_post` (`likedPost`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `foreign_key` (`postAuthor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `author_user_fk` FOREIGN KEY (`commentAuthor`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `post_commented_fk` FOREIGN KEY (`commentPost`) REFERENCES `posts` (`postID`),
  ADD CONSTRAINT `replied_to_fk` FOREIGN KEY (`commentReply`) REFERENCES `comments` (`commentID`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `posts_fk_liked_post` FOREIGN KEY (`likedPost`) REFERENCES `posts` (`postID`),
  ADD CONSTRAINT `user_fk_liked_by` FOREIGN KEY (`likedBy`) REFERENCES `users` (`userID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`postAuthor`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
