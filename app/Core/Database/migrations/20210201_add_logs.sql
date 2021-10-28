CREATE TABLE `logs` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ip` varchar(50) COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE='InnoDB' COLLATE 'utf8mb4_unicode_ci';