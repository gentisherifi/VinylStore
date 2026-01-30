-- Database: projekti

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS projekti DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE projekti;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Password: admin123
INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'User', 'admin@vinylstore.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');



DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `news` (`title`, `content`, `image_url`, `created_by`) VALUES
('Vinyl Revival', 'Vinyl records are making a huge comeback in modern music culture. Audiophiles and casual listeners alike are rediscovering the warmth and authenticity of analog sound.', 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4', 1),
('New Store Opening', 'Our vinyl store is opening soon with rare collections from classic rock, jazz, and blues. Join us for the grand opening next month!', 'https://images.unsplash.com/photo-1516981442399-a91139e20ff8', 1),
('Limited Edition Pressings', 'We just received limited edition vinyl pressings of classic albums. These are numbered and come with exclusive artwork. First come, first served!', 'https://images.unsplash.com/photo-1483412033650-1015ddeb83d1', 1);



DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;