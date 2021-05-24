CREATE TABLE `books` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `year` int(1) NOT NULL,
  `pages` int(1) NOT NULL,
  `description` text NOT NULL,
  `views` int(6) NOT NULL,
  `clicks` int(6) NOT NULL,
  `soft_delete` int(1) NOT NULL,
  `image_link` varchar(30) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;