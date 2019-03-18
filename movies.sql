-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 10:15 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`, `value`) VALUES
(1, 'Language', 'English'),
(2, 'Language', 'Hindi'),
(3, 'Genre', 'Action'),
(4, 'Genre', 'Comedy'),
(5, 'Genre', 'Horror'),
(6, 'Genre', 'Superhero'),
(7, 'Genre', 'Fantasy'),
(8, 'Genre', 'Drama'),
(9, 'Genre', 'Sci-Fi'),
(10, 'Genre', 'Thriller'),
(11, 'Genre', 'Historic');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Description` text NOT NULL,
  `Image` text NOT NULL,
  `Length` int(11) NOT NULL,
  `Release_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `Title`, `Description`, `Image`, `Length`, `Release_Date`) VALUES
(1, 'Justice League', 'Superhero Team-up Movie, Based on DC Characters', 'img/img_1.jpg', 121, '2017-11-16'),
(2, 'Blade', 'Based on the Comics, Part Vampire, Part Human Vampire Hunter', 'img/img_2.jpg', 120, '1998-10-28'),
(3, 'Harry Potter and Chamber of Secrets', 'Part 2 of Harry Potter', 'img/img_3.jpg', 143, '2003-05-21'),
(4, 'Captain Marvel', 'Pilot gets Powers from Kree Device, Super strength and all...', 'img/img_4.jpg', 133, '2019-03-08'),
(5, 'Maze Runner: The Death Cure', 'part 2 or 3 of Maze runner, I don\'t know.. ', 'img/img_5.jpg', 117, '2015-03-09'),
(6, 'Scary Movie', 'Actually a comedy, not Scary one...', 'img/img_6.jpg', 99, '2002-03-08'),
(7, 'The Terminator', 'Movie on Robot time-traveling for doing something.', 'img/img_7.jpg', 136, '1989-08-24'),
(8, 'Anchorman: The Legend of Ron Burgundy ', 'Will Ferrell\'s only Watchable movie', 'img/img_8.jpg', 117, '2007-01-25'),
(9, 'The Lord of The Rings: Return of the King', 'The Longest movie ever, which is enjoyable.', 'img/img_9.jpg', 251, '2003-12-01'),
(10, 'Antman and the Wasp', 'The poster says it all... ', 'img/img_10.jpeg', 118, '2018-07-20'),
(11, 'Pulp Fiction', 'Quentin Tarantino\'s Finest Movie. ', 'img/img_11.jpg', 152, '1993-11-26'),
(12, 'The Martian', 'Saving Matt Damon, Space Edition...', 'img/img_12.jpg', 127, '2016-06-08'),
(13, 'Thor Ragnarok', 'Thor 3: Reboot, Ft. Korg', 'img/img_13.jpg', 119, '2017-11-03'),
(14, 'Black Panther', 'Oscar Winning Marvel Movie', 'img/img_14.jpg', 122, '2018-02-09'),
(15, 'Life of PI', 'Unrealistic Movie on Some Tiger in Boat', 'img/img_15.png', 145, '2016-01-16'),
(16, 'Rush', 'Based on Real Life F1 Racing Rivals', 'img/img_16.jpg', 133, '2014-07-11'),
(17, 'Spiderman: Homecoming', 'Spiderman comes Home, that\'s all...', 'img/img_17.jpg', 134, '2017-08-11'),
(18, 'Titanic', 'Spoilers, Boat Sinks...\r\n(But the stars are aligned astronomically accurately.. )', 'img/img_18.jpg', 155, '2001-04-08'),
(19, 'Antman', 'The smallest superhero to shake the MCU science to its core', 'img/img_19.jpg', 129, '2016-06-16'),
(20, 'Star Wars: The Last Jedi', 'A Movie so controversial, No Description Available', 'img/img_20.jpg', 145, '2018-12-09'),
(21, 'Hunger Games: Catching FIre', 'Fire in the District 13...', 'img/img_21.jpg', 122, '2014-01-06'),
(22, 'The Guardians of the Galaxy: Vol 2', 'Oddest Superhero Team-up Movie, which is about as good as the 1st one', 'img/img_22.jpg', 127, '2017-05-12'),
(23, 'The Shining ', 'Some say, this movie is Stanley Kubrick\'s way of apologizing for faking the moon landing', 'img/img_23.jpg', 140, '1990-05-04'),
(24, 'Beauty and the Beast', 'The one with Emma Watson', 'img/img_24.jpg', 122, '2019-04-12'),
(25, 'Jaws', 'The movie which made everyone hate Sharks Worldwide', 'img/img_25.jpg', 144, '1994-06-24'),
(26, 'Blade runner 2049', 'Best Movie of 2017. (Saw it with 9 people in theater)', 'img/img_26.jpg', 152, '2017-10-06'),
(27, 'Tomb Raider', 'Great Game, Okay Movie', 'img/img_27.jpg', 115, '2018-03-09'),
(28, 'Fight Club', '1st Rule of Fight club, We don\'t talk about it.. ', 'img/img_28.jpg', 127, '2001-03-09'),
(29, 'Jurassic Park', 'Dinosaurs with best effects ever', 'img/img_29.jpg', 136, '1993-06-25'),
(30, 'Padmavat', 'It was Padmavati, then they removed i from title...', 'img/img_30.jpg', 166, '2018-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`id`, `category_id`, `movie_id`) VALUES
(181, 1, 1),
(182, 1, 2),
(183, 1, 3),
(184, 1, 4),
(185, 1, 5),
(186, 1, 6),
(187, 1, 7),
(188, 1, 8),
(189, 1, 9),
(190, 1, 10),
(191, 1, 11),
(192, 1, 12),
(193, 1, 13),
(194, 1, 14),
(195, 1, 15),
(196, 1, 16),
(197, 1, 17),
(198, 1, 18),
(199, 1, 19),
(200, 1, 20),
(201, 1, 21),
(202, 1, 22),
(203, 1, 23),
(204, 1, 24),
(205, 1, 25),
(206, 1, 26),
(207, 1, 27),
(208, 1, 28),
(209, 1, 29),
(210, 2, 30),
(211, 6, 1),
(212, 6, 2),
(213, 7, 3),
(214, 6, 4),
(215, 9, 5),
(216, 4, 6),
(217, 9, 7),
(218, 4, 8),
(219, 7, 9),
(220, 6, 10),
(221, 8, 11),
(222, 8, 12),
(223, 6, 13),
(224, 6, 14),
(225, 8, 15),
(226, 8, 16),
(227, 6, 17),
(228, 3, 18),
(229, 6, 19),
(230, 9, 20),
(231, 9, 21),
(232, 6, 22),
(233, 5, 23),
(234, 7, 24),
(235, 5, 25),
(236, 9, 26),
(237, 3, 27),
(238, 10, 28),
(239, 3, 29),
(240, 11, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
