CREATE TABLE `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `current_page` int(4) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;