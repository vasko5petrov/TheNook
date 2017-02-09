-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `videosocial`
--

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(255) COLLATE utf8_bin NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `from` varchar(255) COLLATE utf8_bin NOT NULL,
  `birth_date` date NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8_bin NOT NULL,
  `poster_picture` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `from`, `birth_date`, `profile_picture`, `poster_picture`) VALUES
(24, 'Vivian', 'Dickens', 'vivianens', 'vivianens@example.com', '4d3773ba0022d3e9f2d36964d910eba953cd6b44', 'United States, Chicago', '1978-05-16', 'vivian_dickens.jpg', ''),
(25, 'Robin', 'Jackman', 'robman', 'robman@example.com', '5de5cef96ffd97400c6bf35a5b3239556b074306', 'England, Porthsmouth', '1960-04-23', 'robin_jackman.jpg', ''),
(26, 'Taylor', 'Edward', 'taylored', 'taylored@example.com', 'a2d15586d86031793fb4f47e1da3a384514d32de', 'Australia, Brisbane', '1988-04-30', 'taylor_edward.jpg', ''),
(27, 'Dany', 'Wighter', 'hcliff', 'hcliff@example.com', 'e4ea893ab0be6e69a69465fa0684f359cb20a617', 'Germany, Berlin', '1990-11-01', 'dany_wighter.jpg', ''),
(28, 'Eliza', 'Clifford', 'ecliff', 'ecliff@example.com', '529c5cacd529898907b3562a9ab4f7c7039ad5fc', 'Denmark, Horsens', '1993-05-15', 'eliza_clifford.jpg', ''),
(29, 'Nancy', 'Newman', 'nanman', 'nanman@example.com', '6e7e021c5107de526758f9bfaa2f9db80b9dc5be', 'England, London', '1991-03-19', 'nancy_newman.jpg', ''),
(30, 'George', 'Mihailov', 'mcliff', 'mcliff@example.com', 'dd528c54cf6e32407597568d668ce9d238e50dfa', 'Bulgaria, Ruse', '1995-08-15', 'george_mihailov.jpg', ''),
(31, 'Harley', 'Gilbert', 'hgil', 'hgil@example.com', 'bcef12808ea163fe9b693ef6950bee0344fc51b9', 'United States, New York', '1988-04-23', 'harley_gilbert.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
