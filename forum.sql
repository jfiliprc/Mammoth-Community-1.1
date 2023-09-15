-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Set-2023 às 17:52
-- Versão do servidor: 8.0.31
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `forum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `topic_id` int NOT NULL,
  `user_id` int NOT NULL,
  `body` int NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `last_activity` datetime NOT NULL,
  `create_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `user_id`, `title`, `body`, `last_activity`, `create_date`) VALUES
(1, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 0, 0, '', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 0, 0, '', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 0, 0, '', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 0, 0, '', 'OLAA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 0, 0, '', 'a', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 0, 0, '', 'a', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 0, 0, '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 0, 0, '', '111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 0, 0, '', '1111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 0, 0, '', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 0, 0, '', '111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 0, 0, '', '111', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 0, 0, '', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 0, 0, '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 0, 0, '', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 0, 0, '', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 0, 4, '', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 0, 4, '', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 0, 4, '', 'oii', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 0, 5, '', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 0, 5, '', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 0, 5, '', 'hrrq', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 0, 1, '', 'oi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 0, 1, '', 'ioi\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 0, 1, '', '$userID = $_SESSION[\'user_id\'];\r\n\r\n    // Check if a file was uploaded\r\n    if (isset($_FILES[\'profile_picture\']) && $_FILES[\'profile_picture\'][\'error\'] === UPLOAD_ERR_OK) {\r\n        $uploadDir = \'uploads/\';\r\n        $uploadFile = $uploadDir . basename($_FILES[\'profile_picture\'][\'name\']);\r\n\r\n        ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 0, 1, '', 'human resources', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 0, 5, '', 'uyuirtyrtyryr', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 0, 17, '', 'user\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 0, 1, '', '15534', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 0, 1, '', 'userID = $_SESSION[\'user_id\']; // Check if a file was uploaded if (isset($_FILES[\'profile_picture\']) && $_FILES[\'profile_picture\'][\'error\'] === UPLOAD_ERR_OK) { $uploadDir = \'uploads/\'; $uploadFile = $uploadDir . basename($_FILES[\'profile_picture\'][\'name\']);', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 0, 1, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 0, 1, '', '1234', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 0, 1, '', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 0, 1, '', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 0, 1, '', 'teste', '0000-00-00 00:00:00', '2023-09-15 20:28:14'),
(48, 0, 1, '', '123', '0000-00-00 00:00:00', '2023-09-15 20:28:17'),
(49, 0, 1, '', 'oi\r\n', '0000-00-00 00:00:00', '2023-09-15 20:28:21'),
(50, 0, 1, '', '512541352356234', '0000-00-00 00:00:00', '2023-09-15 20:37:48'),
(51, 0, 1, '', 'lorem ipsum', '0000-00-00 00:00:00', '2023-09-15 20:37:53'),
(52, 0, 1, '', 'lorem ipsum\r\n123\r\n', '0000-00-00 00:00:00', '2023-09-15 20:38:29'),
(53, 0, 1, '', 'lorem ipsum', '0000-00-00 00:00:00', '2023-09-15 20:40:00'),
(54, 0, 1, '', 'eae edu', '0000-00-00 00:00:00', '2023-09-15 20:40:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `about` text NOT NULL,
  `last_activity` datetime NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `avatar`, `username`, `password`, `about`, `last_activity`, `join_date`) VALUES
(1, '123', '123', 'ti3@altasports.com.br', '', '', '$2y$10$KXuKw3LzsUNruDpW2oK1ZuUnNkf7hzlmV5Rdl0OvnT2t2iSa4fKp.', '', '0000-00-00 00:00:00', '2023-09-13 13:05:35'),
(2, '123', '123', 'ti3@altasports.com.br', '', '', '$2y$10$y9XLl43tG5UWYhuxJFGwJeULVd6ISaED0T1hxcHITwzNSmijAJZhq', '', '0000-00-00 00:00:00', '2023-09-13 13:05:37'),
(3, '', '', 'ti3@altasports.com.br', '', '', '$2y$10$yh1AitRN1yWP2McO4IT8SOuiQ5o3oCP3o5QlWHdIOJolmRbQgTuN6', '', '0000-00-00 00:00:00', '2023-09-13 13:12:46'),
(4, '1', '1', '1@altasports.com.br', '', '', '$2y$10$mpAT79DKNmWnTnsVuo2RAejhx5gAWH99AoD7IXKo8qtuf2Jy/HRV6', '', '0000-00-00 00:00:00', '2023-09-13 16:08:53'),
(5, '2', '2', '2@altasports.com.br', '', '', '$2y$10$t2lTAJMfbSaFtUivm2SF.erFCMLQOC0eORTsI4.Jyg6waG2cpudpm', '', '0000-00-00 00:00:00', '2023-09-13 16:10:00'),
(6, '2', '2', '2@altasports.com.br', '', '', '$2y$10$ZuFPSW4dLIY6wS7z1AZAHOYOasJBym.s33t6iSdu3RNQq9S58/7mO', '', '0000-00-00 00:00:00', '2023-09-13 16:11:07'),
(7, '2', '2', '2@altasports.com.br', '', '', '$2y$10$ID19iThZdPPUdUCZomMk..3X8mzMLWauzszQo4.MBeQF4ttRsl8Ti', '', '0000-00-00 00:00:00', '2023-09-13 16:11:13'),
(8, '5', '5', '5@altasports.com.br', '', '', '$2y$10$ayBYiqv6eee2bVjn8NLdzOyv.MSWtIXgH2j.hsBfTW5grnHsC.rUS', '', '0000-00-00 00:00:00', '2023-09-13 16:11:35'),
(9, '5', '5', '5@altasports.com.br', '', '', '$2y$10$FCijhpn7JfLqvWTQFjEiEO/ke5FaXdMtR5bmpzXJt5HsDIE9d3aVK', '', '0000-00-00 00:00:00', '2023-09-13 17:03:18'),
(10, '5', '5', '5@altasports.com.br', '', '', '$2y$10$6rdfxrgTc6JlCPtQq8JHueDhx69UM5gnZbBdfluFL.1v58wx6NztO', '', '0000-00-00 00:00:00', '2023-09-13 17:20:05'),
(11, '5', '5', '5@altasports.com.br', '', '', '$2y$10$UFhOl7rnidwutQ4vTUoJw.90lb2qm6i3gV5kwVRMCvwNs2E4GEDeO', '', '0000-00-00 00:00:00', '2023-09-13 17:22:01'),
(12, '789', '123', '123@123', '', '', '$2y$10$X6K6RjOUeBtqVPVudL13uepm27TKyYHAyWqHx6VZrkdx4ZPe.phNq', '', '0000-00-00 00:00:00', '2023-09-13 18:00:22'),
(13, '12', '12', '12@12', '', '', '$2y$10$5oMS6WffpKi4BFt/E.D8pON3SvgdqTt/BsJ3yuimyXKYIEMloj.ua', '', '0000-00-00 00:00:00', '2023-09-13 18:00:48'),
(14, '', '', 'ti3@altasports.com.br', '', '', '$2y$10$4EVRxIN.U9u0hWnmsaNiE.dvcT5JGzuH7g8cMxcKXo2AqI4xHGHyi', '', '0000-00-00 00:00:00', '2023-09-14 11:19:57'),
(15, '123', '123', 'ti3@altasports.com.br', '', '', '$2y$10$86djLcQTzy/06RRdgn7kBOEI5XUdNiHHp45WYXHC2j64SS1I0QHbO', '', '0000-00-00 00:00:00', '2023-09-14 12:22:10'),
(16, 'qer', 'qer', 'qer@altasports.com.br', '', '', '$2y$10$8VAiNs5o/LUbFyTLtj9TJ.FLDGaRKqJO0jqyh7VBGLEosc..c21PS', '', '0000-00-00 00:00:00', '2023-09-14 13:01:18'),
(17, 'user345', '1231321', 'user@altasports.com.br', '', '', '$2y$10$5m5Y1OgVkDgU0nhJQh478uj1VhDw.AYpeSsB.DRGmFVQDTB7KTreK', '', '0000-00-00 00:00:00', '2023-09-14 13:06:32'),
(18, '123', '123', 'ti3@altasports.com.br', '', '', '$2y$10$61E8nmq/0FDcP.I4qOjc8OtSe3uNHmtrGS7q7Wz9n9WCGyNgSwvHe', '', '0000-00-00 00:00:00', '2023-09-14 13:19:39'),
(19, '', '', 'ti3@altasports.com.br', '', '', '$2y$10$3O/lgrQkZMx6LRZDzJuA.u7emEpZ8.zRKzAplfHg5gbJccDM08E1i', '', '0000-00-00 00:00:00', '2023-09-14 14:06:34'),
(20, '', '', 'ti3@altasports.com.br', '', '', '$2y$10$x0ShOjcpWE47vznSlrtTCuiPdaRCfJNcIVqqw8lsLx7LOBj13OTje', '', '0000-00-00 00:00:00', '2023-09-14 17:33:19'),
(21, '', '', '', '', '', '$2y$10$CU3PuJHA/JykZNXDOT5bweFcdu9R2G3wTexeu3pXfWWdlQipD2jx.', '', '0000-00-00 00:00:00', '2023-09-14 17:41:15'),
(22, '123', '123', 'ti3@altasports.com.br', '', '', '$2y$10$iZyhPl3G5JDqPlc2FOYBKusiiv2e979OoSFNLUKllDs9lqVI0QcXS', '', '0000-00-00 00:00:00', '2023-09-14 17:57:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
