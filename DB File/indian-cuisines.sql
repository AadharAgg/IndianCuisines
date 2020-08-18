-- Two accounts created:
-- india@mail.com and avi@gmail.com
-- Password : 123456 for both accounts

-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 03:52 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indian-cuisines`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `rcp_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(512) NOT NULL,
  `category` varchar(256) NOT NULL,
  `rcp_img` varchar(256) NOT NULL,
  `cook_id` int(11) NOT NULL,
  `ingredients` varchar(10000) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `process` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`rcp_id`, `title`, `description`, `category`, `rcp_img`, `cook_id`, `ingredients`, `date_posted`, `process`) VALUES
(9, 'Chole Bhature', 'Chole bhature recipe â€“ it is one of the most popular Punjabi recipe which is now liked almost all over India and even abroad. Chole stands for a spicy curry made with white chickpeas and Bhatura is fried leavened flat bread.', 'Regular', 'download.jpg', 1, '1)\r\nFor Pressure Cooking Chickpeas:\r\n1 cup dried white chickpeas (safed chana or chole) [canned chickpeas can also be used]\r\nwater as required for soaking\r\nÂ¼ teaspoon salt\r\n3 cups water for pressure cooking\r\na pinch or two of baking soda - optional\r\n2)\r\nOther Ingredients For Chana Masala Gravy:\r\n2 to 3 tablespoon oil or ghee\r\nÂ½ teaspoon turmeric powder\r\nÂ¼ teaspoon red chilli powder\r\n1 teaspoon coriander powder\r\n1 pinch asafoetida (hing) - optional\r\nÂ½ or 1 teaspoon dry mango powder (amchur powder)\r\n1 to 1.5 cups water to be added later\r\nsalt as required\r\n1 green chilli (hari mirch) - slit\r\n1 teaspoon garam masala powder or chole masala\r\n3)Ground Paste Ingredients:\r\n1 medium size onion - chopped\r\n2 medium size tomatoes - chopped\r\n1 inch ginger - chopped\r\n4 to 5 medium sized garlic cloves - chopped\r\n1 green chili - chopped\r\n', '2020-05-28 16:14:16', '1)in a grinder or blender take 1 medium sized chopped onion, 2 medium sized chopped tomatoes, 1 inch chopped ginger, 4 to 5 garlic cloves and 1 chopped green chili. \r\n2)Grind to a fine paste.\r\nNo need to add water while making the paste as the juice of the tomatoes will help in making the paste.\r\n3)Keep the paste aside.\r\n4)Heat 2 to 3 tablespoons oil in a pan or kadai/wok.\r\n5)in a grinder or blender take 1 medium sized chopped onion, 2 medium sized chopped tomatoes, 1 inch chopped ginger, 4 to 5 garlic cloves and 1 chopped green chili. \r\nGrind to a fine paste.\r\nNo need to add water while making the paste as the juice of the tomatoes will help in making the paste.\r\nServe chole with onion slices, lemon wedges along with bhatura. enjoy the chole bhature.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `password`) VALUES
(1, 'India', 'india@mail.com', '$2y$10$JWuwGKI4mvoCjubTX2CLLOoEjYSjpV3otNVQQaHK85vE5uFy5.UXi'),
(2, 'Aadhar Agarwal', 'avi@gmail.com', '$2y$10$ZdBQkWw98/TpIX9q7he2kODItvG3wsy4bFF9/yKOHrEZI/olA8IpW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`rcp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `rcp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
