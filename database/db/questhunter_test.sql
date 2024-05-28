-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 May 2024, 01:26:58
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `questhunter_test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quests`
--

CREATE TABLE `quests` (
  `quest_id` int(11) NOT NULL,
  `quest_name` varchar(255) NOT NULL,
  `quest_difficulty` varchar(50) NOT NULL DEFAULT 'unknown',
  `quest_point` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `quests`
--

INSERT INTO `quests` (`quest_id`, `quest_name`, `quest_difficulty`, `quest_point`) VALUES
(1, 'two sum', 'easy', 10),
(2, 'factorial', 'medium', 30),
(3, 'digit', 'hard', 100);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `point` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `point`) VALUES
(16, 'deneme', 'deneme', 110),
(17, 'abc', 'def', 0),
(18, '123', '123', 0);

--
-- Tetikleyiciler `users`
--
DELIMITER $$
CREATE TRIGGER `after_user_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    DECLARE question_count INT;
    DECLARE i INT;
    
    -- Sistemdeki toplam soru sayısını al
    SELECT COUNT(*) INTO question_count FROM quests;
    
    -- Her bir soru için user_question tablosuna yeni kayıt ekle
    SET i = 1;
    WHILE i <= question_count DO
        INSERT INTO users_quests (user_id, quest_id, status)
        VALUES (NEW.user_id, i, 0); -- status default olarak 0
        
        SET i = i + 1;
    END WHILE;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users_quests`
--

CREATE TABLE `users_quests` (
  `user_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users_quests`
--

INSERT INTO `users_quests` (`user_id`, `quest_id`, `status`) VALUES
(16, 1, 1),
(16, 2, 0),
(16, 3, 1),
(17, 1, 0),
(17, 2, 0),
(17, 3, 0),
(18, 1, 0),
(18, 2, 0),
(18, 3, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`quest_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `users_quests`
--
ALTER TABLE `users_quests`
  ADD KEY `users_quests_ibfk_1` (`user_id`),
  ADD KEY `users_quests_ibfk_2` (`quest_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `quests`
--
ALTER TABLE `quests`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `users_quests`
--
ALTER TABLE `users_quests`
  ADD CONSTRAINT `users_quests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `users_quests_ibfk_2` FOREIGN KEY (`quest_id`) REFERENCES `quests` (`quest_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
