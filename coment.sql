-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2016 at 02:40 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coment`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(140) NOT NULL,
  `image` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`) VALUES
(15, 'Stan is an ancient Persian word meaning â€œlandâ€ or â€œnation,â€ and Kazakh means â€œwanderer,â€ â€œadventurer,â€ or â€œoutlaw.â€ Ther', 'img/'),
(16, 'Kazakhstan is the 9th largest country by area in the world, but it has one of the lowest population densities at 6 people per square mile.d', 'img/'),
(17, 'The people who live in Kazakhstan represent more than 120 nationalities', 'img/'),
(18, 'Ancient Kazakhs were the first people in the world to domesticate and ride horses.', 'img/');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `text`) VALUES
(92, '0000-00-00 00:00:00', 'djghjg'),
(96, '0000-00-00 00:00:00', 'kbnkfnvkjf'),
(97, '0000-00-00 00:00:00', 'jhvbnbfdjvsbjvdvas'),
(98, '0000-00-00 00:00:00', 'vdjhvhhjwvbjhdbvw'),
(99, '0000-00-00 00:00:00', 'bejkwvhdjkbcjklw'),
(100, '0000-00-00 00:00:00', 'wbgjvdfjebmv,wkj'),
(101, '0000-00-00 00:00:00', ',mqhjkdff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `email`, `password`, `status`) VALUES
(29, 'dian', 'aaaa', 'z@com', '202cb962ac59075b964b07152d234b70', 1),
(30, 'do', 'aaaa', 'd@com', '202cb962ac59075b964b07152d234b70', 1),
(31, 'sag', 'inzhu', 'inzhu@com', '9cdfb439c7876e703e307864c9167a15', 1),
(32, 'omarova', 'aaaa', 'inzhu@com', 'bd36f8038724581db562ca2bb8f8800a', 1),
(33, 'as', 's', 'q@com', '7f94dd413148ff9ac9e9e4b6ff2b6ca9', 1),
(34, 'aaaaaaaaaaaaaa', 'aaaaaaaaaaa', 'asa@com', '9cdfb439c7876e703e307864c9167a15\r\n', 0),
(47, 'aaaa', 'aaaa', 'asa@com.com', '202cb962ac59075b964b07152d234b70', 1),
(48, 'uuuu', 'hhh', 'QQ@Com.xi', '202cb962ac59075b964b07152d234b70', 1),
(49, 'linara', 'omarova', 'linara@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(52, 'to', 'to', 'to@com.com', '21232f297a57a5a743894a0e4a801fc3', 0),
(61, 'aaaaa', 'aaa', 'a@com.com', 'bd36f8038724581db562ca2bb8f8800a', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
