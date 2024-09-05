-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 09:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `admin_id`, `user_id`, `user_name`, `comment`, `date`) VALUES
(2, 6, 1, 1, '\r\nWarning:  Undefined variable $fetch_profile in C', 'I also think that it will be a great innitiative..', '2024-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `admin_id`, `post_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 6),
(3, 1, 1, 5),
(4, 1, 1, 9),
(5, 1, 1, 14),
(6, 1, 1, 8),
(8, 1, 1, 22),
(9, 1, 1, 24),
(10, 1, 1, 10),
(12, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_id`, `name`, `title`, `content`, `category`, `image`, `date`, `status`) VALUES
(4, 1, 'admin', 'City ', 'A community based initiative to raise awareness and ensure preservation of natural water resources through sustainable drainage systems that will help eradicate water-logging in the city of Sylhet.', 'City Corporation', 'post19.png', '2024-02-13', 'active'),
(5, 1, 'admin', 'The Sylhet book fair has gathered', 'The fair which started on February 3 will end on February 17. The fair is open to all from 2 pm to 9 pm.', 'City Corporation', 'post20.webp', '2024-02-13', 'active'),
(6, 1, 'admin', 'Develop your city', 'Discussing platforms and initiatives that empower citizens to participate in decision-making processes, provide feedback to local government, and contribute to shaping the future of their city through technology-driven solutions.', 'Citizen Engagement', 'post7.webp', '2024-02-13', 'active'),
(7, 1, 'admin', 'Accessible City Planning', 'Providing information on accessibility initiatives, wheelchair-friendly routes, tactile paving installations, and other measures aimed at creating a more inclusive and accessible urban environment for all residents.', 'City Planning', 'post8.webp', '2024-02-13', 'active'),
(8, 1, 'admin', 'Secure your urban life', 'Providing information on neighborhood watch programs, crime prevention tips, updates on law enforcement initiatives, and emergency preparedness resources to help residents stay safe.', 'Safety and Security Updates', 'post9.webp', '2024-02-13', 'active'),
(9, 1, 'admin', 'Find healthcare services', 'Featuring articles on local healthcare services, wellness programs, fitness activities, mental health support groups, and initiatives promoting a healthy lifestyle within the city.', 'Health and Wellness Resources', 'post5.webp', '2024-02-13', 'active'),
(10, 1, 'admin', 'Bridge the digital divide', 'Highlighting efforts to bridge the digital divide, such as free public Wi-Fi zones, computer literacy programs, and initiatives to provide technology access to underserved communities.', 'Digital Inclusion Initiatives', 'post11.jpeg', '2024-02-13', 'active'),
(11, 1, 'admin', 'Urban development', 'Exploring the city&#39;s history, architectural heritage, and urban development over time, with articles on historic landmarks, preservation efforts, and stories that celebrate the city&#39;s rich cultural heritage.', 'Historical Urban Evolution', 'post3.jpeg', '2024-02-13', 'active'),
(12, 1, 'admin', 'The guests are not interested in dilapidated Sylhet tourist motels', 'Three decades ago, &#39;Tourist Motel&#39; was built in Sylhet&#39;s airport area for tourists visiting the country of tea. ', 'City Corporation', 'post21.webp', '2024-02-16', 'active'),
(13, 1, 'admin', 'Sylhet is the birthplace of the Bangladesh tea industry', 'Black tea cultivation was introduced in Bengal and Assam during the British Empire, particularly in Assam&#39;s Sylhet district.In 1834, Robert Bruce discovered tea plants in the Khasi and Jaintia Hills and other hilly areas in the northeast.', 'Authentic Offerings', 'post17.jpg', '2024-02-16', 'active'),
(14, 1, 'admin', ' Inside the colourful world of Kamalganj’s Monipuri weavers', 'For almost 400 years, Monipuris in the area have been cultivating cotton, making yarn, and weaving their own clothes. Starting in the 1980s, Radhabati Devi helped popularise Monipuri sarees among the larger population.', 'Authentic Offerings', 'post23.jpg', '2024-02-16', 'active'),
(15, 1, 'admin', 'Area specific development plans can help tap into the potentials of Sylhet', 'Before establishing an economic zone in any area, the environmental impact, community, and feasibility assessments have to be done properly. Development plans in Sylhet, especially those related to economic zones, have to be environment-friendly and suitable for the particular areas they are undertaken for, said stakeholders at a webinar.', 'City Planning', 'post24.jpg', '2024-02-16', 'active'),
(16, 1, 'admin', 'Citizen Engagement', 'They also demanded to create skilled manpower, community-based tourism, small scale industries, special economic zone for women entrepreneurs, proper feasibility assessments before implementing a development plan etc to ensure balanced development in the area.', 'Citizen Engagement', 'post10.webp', '2024-02-16', 'active'),
(17, 1, 'admin', 'History of Sylhet', 'In 1303, the Sultan of Lakhnauti Shamsuddin Firoz Shah conquered Sylhet by defeating Gour Govinda.Sylhet was a realm of the Bengal Sultanate. In the 16th-century, Sylhet was controlled by the Baro-Bhuyan zamindars and later became a sarkar (district) of the Mughal Empire.Sylhet emerged as the Mughals&#39; most significant imperial outpost in the east, and its importance remained as such throughout the seventeenth century.', 'Historical Urban Evolution', 'post25.png', '2024-02-16', 'active'),
(18, 1, 'admin', 'Sylhet Townscape', 'A principal idea of “Sylhet Next” is to restructure the conditions of the old and existing city center for more efficient and enjoyable urban experiences. The possibilities of renovating Surma riverbank areas adjacent to Keane Bridge and Kazir Bazar Bridge, and selected city intersections or nodes were studied.', 'Historical Urban Evolution', 'post13.jpeg', '2024-02-16', 'active'),
(19, 1, 'admin', 'Some characteristics of the Sylheti people ', 'Sylhetis are a multicultural and very prosperous group of people. Its scenic beauty is unparalleled with many hills, forests, streams, and rivers with emerald green water. People there are warm, hospitable and full of hearts. Their sense of humor is superb. It was a very hierarchical society before, where only a small elite group of people dominated every sphere of the economy, politics, and society. It has now changed. ', 'Lifestyle', 'post26.jpg', '2024-02-16', 'active'),
(20, 1, 'admin', 'Beef with citrus macroptera', 'This is the most popular beef item in Sylhet. Mostly famous for its great smell.\r\n\r\n', 'Food and Drinks', 'post27.jpg', '2024-02-16', 'active'),
(21, 1, 'admin', 'Akhni', 'This is a special Sylhety version of tahri(তেহারি). It’s also very delicious.\r\n\r\n', 'Food and Drinks', 'post28.jpg', '2024-02-16', 'active'),
(22, 1, 'admin', 'Seven layer tea', 'Seven-colour tea or seven-layer tea is a Bangladeshi beverage comprising layers of different teas.Tea is made in multiple permutations of concentration, tea leaf variety and adjuncts such as milk, sugar and flavourings and when combined separates according to density. Each layer contrasts in colour and taste, ranging from syrupy sweet to spicy clove. The result is an alternating dark/light band pattern throughout the drink, giving the tea its name.', 'Food and Drinks', 'post29.jpg', '2024-02-16', 'active'),
(23, 1, 'admin', 'Security beefed up in Sylhet to prevent train sabotage', 'Rapid Action Battalion (RAB) has strengthened security measures in Sylhet to prevent sabotage attempts on the rail tracks and trains.\r\nRAB-9 has strengthened security and surveillance on trains, especially at Sylhet railway station, to ensure the safety of passengers and prevent any untoward incidents amid arson and sabotage acts on trains in various parts of the country.', 'Safety and Security Updates', 'post30.jpg', '2024-02-16', 'active'),
(24, 1, 'admin', 'Best Hospitals and Health Centers in Sylhet Sadar', 'Noorjahan Hospital Pvt. ...\r\nOasis Hospital BD. ...\r\nSylhet MAG Osmani Medical College Hospital. ...\r\nJalalabad Ragib Rabeya Medical College & Hospital. ...\r\nGrameen Hospital. ...\r\nPioneer Hospital and Diagnostic Center. ...\r\nSylhet Diabetic and General Hospital. ...\r\nDiabetic Foot, Burn and Wound Healing Center..', 'Health and Wellness Resources', 'post31.jpg', '2024-02-16', 'active'),
(25, 1, 'admin', 'ggg', 'ggg', 'City Corporation', 'parkcar.jpg', '2024-02-17', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Arpita Roy', 'cse_2012020315@lus.ac.bd', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'Arpita Roy 1', 'mdkawserahmedpk@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
