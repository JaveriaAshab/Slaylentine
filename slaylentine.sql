-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2025 at 10:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slaylentine`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `trophy` varchar(255) DEFAULT NULL,
  `medal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `user_name`, `trophy`, `medal`) VALUES
(1, 'Itrat', '../images/1741940266_trophy_trophy01.jpg', '../images/1741940266_medal_medal01.jpg'),
(2, 'Alishba', '../images/1741940289_trophy_trophy02.jpg', '../images/1741940289_medal_medal02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `ID` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `passcode` varchar(255) DEFAULT NULL,
  `display_picture` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`ID`, `username`, `passcode`, `display_picture`) VALUES
(1, 'Javeria Ashab', '$2y$10$3FTgvC2EnVu/44.4fXNt1OrxWjZqAOifM5cPITD5fDYH64ER3iEtO', 'download (13).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dares`
--

CREATE TABLE `dares` (
  `id` int(11) NOT NULL,
  `dare_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dares`
--

INSERT INTO `dares` (`id`, `dare_text`) VALUES
(1, 'Send me a voice recording of you reenacting your favorite movie scene.'),
(2, 'Send me a video of you singing \"Let it go\" from \"Frozen\".'),
(3, 'Send me a video of you singing your favorite Taylor Swift song to your sibling with no explanation.'),
(4, 'Send a voice note doing your best impression of me…'),
(5, 'Change your Instagram bio to something ridiculous like, “I’m a Grammy-winning singer with her own cooking show” and leave it like that for 24 hours.'),
(6, 'Slide into your (single) celebrity crush’s DMs and (politely) tell them you’d love to take them out on a date some time.'),
(7, 'Take an ugly selfie and then set it as your profile photo on social media for 24 hours…'),
(8, 'Draw a terrible picture in pencil and post it onto your Instagram Story in the form of a poll that asks people if they like your art.'),
(9, 'Let me choose your hairstyle for class tomorrow.'),
(10, 'Write a paragraph confession about your celebrity crush and send it to me.'),
(11, 'Post \"I miss him.\" on your status and don\'t reply to anyone. 🌚'),
(12, 'Write a paragraph appreciation text for me 🫂'),
(13, 'Drop your most emotional playlist for me 👉🏼🥺👈🏼'),
(14, 'Send me a voice note hyping me up 🔥'),
(15, 'Give me a life-changing advice right now'),
(16, 'Tell me one thing you\'ve never told me before 👀'),
(17, 'Drop your first impression of me'),
(18, 'Expose your top 3 favorite things about me 👑'),
(19, 'Share your biggest fear with me'),
(20, 'Tell me one thing you\'re insecure about');

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sender` varchar(127) NOT NULL DEFAULT 'Javeria',
  `salutation` varchar(127) NOT NULL DEFAULT 'Dear',
  `signature` varchar(127) NOT NULL DEFAULT '- J',
  `title` varchar(127) NOT NULL DEFAULT 'Slaylentine',
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`id`, `name`, `sender`, `salutation`, `signature`, `title`, `body`) VALUES
(1, 'Alishba', 'Javeria', 'Dear', '- J', 'Slaylentine', 'I don\'t even know how to put this into words, but I\'m gonna try.\n\nYou walked into my life so casually, yet somehow ended up becoming one of the most precious parts of it. You\'re not just my friend, you\'re the younger sister I never had, the safe space I always needed, and the soul that understands me without words.\n\nFrom your chaotic rants to your soft moments of vulnerability, I\'ve seen it all, and I swear... I’ve never loved anyone more platonically than I love you.\n\nI know the world can be harsh sometimes, and people will try to dim your light, but I won’t let that happen. Ever. I\'ll be there, shielding you from the weirdos, hyping you up when you forget your worth, and pulling you out of situations that your heart deserves better than.\n\nYou\'re growing, you\'re learning, and you\'re glowing through it all. And I? I\'ll be right here, watching you bloom, supporting you, and protecting you like the unlicensed bodyguard I am.\n\nThank you for trusting me. Thank you for letting me in. Thank you for existing the way you do, so effortlessly beautiful and warm.\n\nIn this chaotic world, I found you. And bro... I’m never letting you go.\n\nWith all the love and protectiveness in my heart,\nYour biggest stan and biggest hater.'),
(2, 'Itrat', 'Javeria', 'Dear', '- J', 'Slaylentine', 'How do I even begin to describe what you mean to me?\r\n\r\nYou\'re not just my friend, you\'re my safe space, my comfort zone, and my biggest blessing in human form.\r\n\r\nIn a world full of temporary people, you stayed. Through my overthinking, my breakdowns, my weird phases, and my happiest moments, you’ve been there, holding me together without even realizing it.\r\n\r\nYou\'re that one person I can be my raw, unfiltered self with, and never feel judged. The one who knows me better than I know myself sometimes.\r\n\r\nI don’t say this enough, but I’m proud of you. Proud of your heart, proud of your growth, and proud of how beautifully you handle things, even when life tries to break you.\r\n\r\nI don’t know what I did to deserve you, but I\'m forever grateful that our paths crossed.\r\n\r\nYou\'re not just my best friend.\r\nYou\'re family. You\'re home.\r\n\r\nAnd I promise, as long as I\'m breathing,\r\nyou\'ll never face anything alone.\r\n\r\nWith all the love in my soul,\r\nYour forever person.');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_responses`
--

CREATE TABLE `quiz_responses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `q1` varchar(255) DEFAULT NULL,
  `q2` varchar(255) DEFAULT NULL,
  `q3` varchar(255) DEFAULT NULL,
  `q4` text DEFAULT NULL,
  `q5` text DEFAULT NULL,
  `q6` text DEFAULT NULL,
  `q7` text DEFAULT NULL,
  `q8` varchar(255) DEFAULT NULL,
  `q9` text DEFAULT NULL,
  `q10` text DEFAULT NULL,
  `q10_2` varchar(255) DEFAULT NULL,
  `q11` varchar(255) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_responses`
--

INSERT INTO `quiz_responses` (`id`, `name`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q10_2`, `q11`, `submitted_at`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-02-23 23:30:50'),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-02-23 23:30:54'),
(3, 'Javeria', 'Purple', 'Vanilla', 'Maldives', 'fr', 'sister', 'idk', 'husband', 'Zade', 'Hana', 'date', '', 'Clean shaved', '2025-02-24 00:41:15'),
(4, 'Javeria', 'Purple', 'Vanilla', 'Maldives', 'fr', 'sister', 'idk', 'husband', 'Zade', 'Hana', 'date', '', 'Clean shaved', '2025-02-24 00:41:34'),
(5, 'Kevs', 'Black', 'Chocolate', 'Japan', 'fr', 'sister', 'idk', 'husband', 'Kaz', 'Lisa', 'date', 'Someone Manly', 'Clean shaved', '2025-03-14 08:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `spin_results`
--

CREATE TABLE `spin_results` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `spin_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spin_results`
--

INSERT INTO `spin_results` (`id`, `user_name`, `result`, `spin_time`) VALUES
(1, 'Kevs', 'Slide into your (single) celebrity crush’s DMs and (politely) tell them you’d love to take them out on a date some time.', '2025-03-14 08:11:27'),
(2, 'Kebin', 'Write a paragraph appreciation text for me 🫂', '2025-03-15 06:33:22'),
(3, 'Kebin', 'Tell me one thing you\'re insecure about', '2025-03-15 06:33:29'),
(4, 'Kebin', 'Write a paragraph confession about your celebrity crush and send it to me.', '2025-03-15 06:33:34'),
(5, 'Kebin', 'Send me a voice recording of you reenacting your favorite movie scene.', '2025-03-15 06:33:39'),
(6, 'Kebin', 'Share your biggest fear with me', '2025-03-15 06:33:43'),
(7, 'Kebin', 'Give me a life-changing advice right now', '2025-03-15 06:33:47'),
(8, 'Kebin', 'Give me a life-changing advice right now', '2025-03-15 06:33:53'),
(9, 'Kebin', 'Expose your top 3 favorite things about me 👑', '2025-03-15 06:33:58'),
(10, 'Kebin', 'Write a paragraph appreciation text for me 🫂', '2025-03-15 06:34:02'),
(11, 'Kebin', 'Post \"I miss him.\" on your status and don\'t reply to anyone. 🌚', '2025-03-15 06:34:06'),
(12, 'Kebin', 'Send me a video of you singing your favorite Taylor Swift song to your sibling with no explanation.', '2025-03-15 06:34:12'),
(13, 'Kebin', 'Share your biggest fear with me', '2025-03-15 06:34:18'),
(14, 'Kebin', 'Write a paragraph confession about your celebrity crush and send it to me.', '2025-03-15 06:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `time_capsule`
--

CREATE TABLE `time_capsule` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `opening_year` year(4) NOT NULL,
  `message` text NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_capsule`
--

INSERT INTO `time_capsule` (`id`, `sender_name`, `recipient_name`, `title`, `opening_year`, `message`, `image1`, `image2`, `created_at`) VALUES
(1, 'Javeria', 'Alishba', 'To my forever slay bestie, Alishboo 🎀', '2028', 'Hey my love,\r\n\r\nIf you\'re reading this, that means we\'ve somehow survived this chaotic world together, slaying through life like the icons we are. ✨\r\n\r\nFrom our late-night rants to our \"bro what the actual f-\" moments, from crying over life\'s dumb situations to hyping each other up like true soulmates, we\'ve built something that\'s beyond just friendship. You\'re not just my best friend, Alishba... you\'re my person, my safe space, my partner-in-crime.\r\n\r\nI know life will change, we\'ll grow, and things might not always be as they are right now, but I want you to know... No matter where life takes us, I\'m always going to be here. Protecting you, supporting you, and reminding you that you\'re the most precious, talented, and slayest human being to ever exist.\r\n\r\nIn this moment, I\'m writing this with nothing but love in my heart for you. I want future us to look back at this and smile, remembering how deeply we cared, how loudly we laughed, and how beautifully we healed together.\r\n\r\nYou are my once-in-a-lifetime kind of person, and I thank the universe every day for giving me you.\r\n\r\nLet\'s keep slaying, loving, and building dreams together, forever and ever.\r\n\r\nYour biggest fan and your forever best friend,\r\nJaveria~', '../files/uploads/WhatsApp Image 2025-03-14 at 13.43.57_ff343253.jpg', '../files/uploads/WhatsApp Image 2025-03-14 at 13.43.57_963d5ed4.jpg', '2025-03-15 07:54:48'),
(2, 'Javeria', 'Itrat', 'To the sister my soul chose,  Itrat 🖤', '2028', 'My dearest Itrat,\r\n\r\nWhere do I even begin? You’ve been my calm in the chaos, my anchor through storms, and my biggest blessing in this world full of temporary people.\r\n\r\nFrom our deep talks to our uncontrollable laughter, from hyping each other up to protecting each other like real sisters, you’ve become a part of me that I never want to lose.\r\n\r\nI want you to know how proud I am of you, of your strength, your kindness, and your heart that loves so purely. You deserve all the love and light this world has to offer, and I’ll always be here to make sure you never forget that.\r\n\r\nThere will be times when life feels heavy, and the world won\'t understand you, but I will. I\'ll always be here to listen, to guide, to fight for you, and to remind you how precious you are. And even if the world changes, this bond of ours, it never will.\r\n\r\nI can\'t wait to look back at this in the future, laugh at our stupid convos, cry over the memories, and realize that even after all those years, we still kept our promise to never leave each other\'s side.\r\n\r\nIf future us is reading this, I hope we\'re still as close as we are now (if not closer), and I hope we’ve made all those little dreams we once talked about come true. No matter where life takes us, you’ll always have me by your side, protecting you, supporting you, and loving you endlessly.\r\n\r\nYou’re not just my best friend, Itrat... you\'re the sister I never had and the person I’ll cherish for a lifetime.\r\n\r\nForever your safe space,\r\nJaveria~', '../files/uploads/WhatsApp Image 2025-03-14 at 13.43.58_19115209.jpg', '../files/uploads/WhatsApp Image 2025-03-14 at 13.43.58_a3cc3d46.jpg', '2025-03-15 08:00:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dares`
--
ALTER TABLE `dares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `quiz_responses`
--
ALTER TABLE `quiz_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spin_results`
--
ALTER TABLE `spin_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_capsule`
--
ALTER TABLE `time_capsule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dares`
--
ALTER TABLE `dares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `letters`
--
ALTER TABLE `letters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_responses`
--
ALTER TABLE `quiz_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spin_results`
--
ALTER TABLE `spin_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `time_capsule`
--
ALTER TABLE `time_capsule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
