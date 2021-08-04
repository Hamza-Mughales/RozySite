-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: pdb50.awardspace.net
-- Generation Time: Jun 06, 2020 at 08:03 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3454623_amataddali`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `name` varchar(100) NOT NULL,
  `colored_head` varchar(100) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`name`, `colored_head`, `headline`, `text`, `img`, `phone`, `email`, `location`) VALUES
('Amat-Alrahman Addali', 'Amat Addali', ' A Professional artist ', '            A talented, passionate and hardworking Artist who has a long track record of creating original pieces of art work, comes to you from a strong artistic background, with a history of excellent craftsmanship. I can work with a wide variety of materials such as stone, glass and metal to create superb work. To me the customer’s needs are my number one focus, and to this end I work hard to stay current with the latest artistic tools and technologies. Right now I\'m looking for an opportunity to work for an exciting organisation that is keen to employ artists who have excellent creative, technical and visual skills.            ', 'about-img01.jpg', '+967-775975908', 'amataddali@gmail.com', 'Yemen - Sana\'a - Sawan');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `img` varchar(255) NOT NULL,
  `text` varchar(200) NOT NULL,
  `colored_word` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`img`, `text`, `colored_word`) VALUES
('home1.jpg', 'AMAT ADDALI for', 'DRAWING');

-- --------------------------------------------------------

--
-- Table structure for table `navs`
--

CREATE TABLE `navs` (
  `nav_id` int(11) NOT NULL,
  `nav_name` varchar(100) NOT NULL,
  `nav_order` int(11) NOT NULL,
  `nav_parent` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `navs`
--

INSERT INTO `navs` (`nav_id`, `nav_name`, `nav_order`, `nav_parent`) VALUES
(14, 'myworks', 6, 1),
(12, 'services', 3, 1),
(13, 'skills', 4, 1),
(11, 'about', 2, 1),
(10, 'home', 1, 1),
(15, 'contact', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `number`, `order`) VALUES
(9, 'Pictures', 100, 3),
(8, 'Drawing', 400, 1),
(7, 'Designing', 200, 2),
(10, 'Coloring & Editing', 200, 4);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `percent` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `percent`, `order`, `color`) VALUES
(5, 'Illustrator', 90, 2, '#f39016'),
(4, 'Photoshope', 95, 1, '#008cba'),
(6, 'Indesign', 90, 3, '#ce2350'),
(7, 'Adobe Premiere', 70, 6, '#d82bd8e0'),
(9, 'After Effect', 85, 4, 'purple'),
(10, '3D MAX', 85, 5, '#0fa0a7e0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'hamza', 'hamza@hamza.hamza', '202cb962ac59075b964b07152d234b70'),
(5, 'amat', 'amataddali@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `title`, `description`, `img`, `order`, `view`) VALUES
(17, 'Girl', 'رسم رقمي', 'خربشات-بنوتة.png', 2, 1),
(16, 'Lion', 'مشروع الرسم سنة ثانية الترم الثاني', 'FB_IMG_154275205278015941.jpg', 1, 1),
(18, 'Anime girl', '     رسم بالكرتون    ', 'FB_IMG_15418765051290873.jpg', 3, 1),
(21, 'خوف', 'رسم حبر ورصاص', 'FB_IMG_15910831633628552.jpg', 4, 1),
(22, 'اوس العملاق ', '     دمج فوتوشوب    ', 'اوس-العملاق.png', 5, 1),
(23, 'Rose', 'تصوير', 'IMG_7835_-_Copy.jpg', 6, 1),
(24, 'بنوتة الفضاء', 'رسم رقمي', 'FB_IMG_15911792222153686.jpg', 7, 1),
(25, 'عبد الرحمن الورد', 'يوتيوبر اليمن', 'FB_IMG_15910853464771420.jpg', 8, 1),
(26, 'طاؤوس', 'رسم زجاج', 'FB_IMG_15427530961237513_(1).jpg', 9, 1),
(27, 'شعر', 'الوان خشبية', 'FB_IMG_15427520974378871.jpg', 10, 1),
(28, 'دمج', 'دبل اكسبلوشر', 'FB_IMG_15910834189778063.jpg', 11, 1),
(29, 'حشرة', 'تصويري', 'IMG_7821_(1).JPG', 12, 1),
(31, 'اكاديمية الابطال', 'رسم الوان خشبية', 'FB_IMG_15910854253432313.jpg', 13, 1),
(32, 'ارنب', 'رسم خشب ب اكريليك', 'FB_IMG_15910837921200324.jpg', 14, 1),
(33, 'شخصيه ابتكارية', 'رسم رقمي', 'FB_IMG_15910827317822504.jpg', 15, 1),
(34, 'الشخصية الابتكارية', 'رسم رقمي', 'FB_IMG_15910827704517037.jpg', 16, 1),
(35, 'الشخصية الابتكارية 2', 'رسم رقمي', 'FB_IMG_15910827436125177.jpg', 17, 1),
(36, 'ابتكار الشخصية ٢', 'اسكتش رصاص', 'FB_IMG_15910827635190142.jpg', 18, 1),
(37, 'جمجمة', 'مشروع الرسم الرصاص', 'FB_IMG_15427524178575230.jpg', 19, 1),
(38, 'نعامة', 'الوان خشبية', 'FB_IMG_15427520821176149.jpg', 20, 1),
(39, 'فتاة الفطر', 'دمج فوتوشوب', 'FB_IMG_15910828206126876.jpg', 21, 1),
(40, 'flower  2', 'تصوير', 'IMG_7903.JPG', 22, 1),
(41, 'ماندالا', 'رسم حبر', 'FB_IMG_15418765805363478.jpg', 23, 1),
(42, 'كمان', 'رسم ب الوان طبشورية', 'FB_IMG_15427519747918283.jpg', 24, 1),
(43, 'جوري', 'رسم رصاص', 'selfiecamera_2019-06-08-00-36-54-977_(1).jpg', 25, 1),
(44, 'البنت الملونه', 'رسم رقمي', 'FB_IMG_15914319271708254.jpg', 26, 1),
(45, 'نيفرلاند', 'حبر والوان خشبية', 'FB_IMG_15910842928893272.jpg', 27, 1),
(46, 'النحلة اللطيفة', 'تصميم مجلة اطفال', 'غلاف-النحلة-اللطيفة.png', 28, 1),
(55, 'النحلة اللطيفة ٥', 'تصميم مجلة', 'النحلة-اللطيفة-5.png', 32, 1),
(53, 'النحلة اللطيفة 3', 'تصميم مجلة', 'النحلة-اللطيفة-31.png', 30, 1),
(54, 'النحلة اللطيفة 4', 'تصميم مجلة', 'النحلة-اللطيفه-4.png', 31, 1),
(52, 'النحلة اللطيفة 2', 'تصميم مجلة', 'النحلة-اللطيفة-21.png', 29, 1),
(56, 'النحلة اللطيفه ٦', 'تصميم مجلة', 'النحلة-اللطيفةز-6.png', 33, 1),
(57, 'النحلة اللطيفة ٧', 'تصميم مجلة', 'النحلة-اللطيفة-7.png', 34, 1),
(58, 'الغلاف الخلفي', 'تصميم مجلة', 'الغلاف-الخلفي.png', 35, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `navs`
--
ALTER TABLE `navs`
  ADD PRIMARY KEY (`nav_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `navs`
--
ALTER TABLE `navs`
  MODIFY `nav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
