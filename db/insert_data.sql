--
-- Daten für Tabelle `rooms`
--

INSERT INTO `rooms` (`rooms_id`, `anreisedatum`, `abreisedatum`, `zimmer`, `fruehstueck`, `parkplatz`, `haustier`, `anmerkung`, `user_fk`, `zeit`, `preis`) VALUES
(1, '2022-12-01', '2022-12-07', 'Deluxe Villa', 1, 1, 1, NULL, 9, '2022-12-20 17:28:51', 1950),
(2, '2022-12-01', '2022-12-09', 'Mountain Sweet', 1, 1, 0, NULL, 9, '2022-12-20 17:29:13', 1000),
(3, '2022-12-01', '2022-12-07', 'Ozean Villa', 1, 0, 1, NULL, 9, '2022-12-20 17:29:36', 1290),
(4, '2022-12-01', '2022-12-07', 'Ozean Sweet', 1, 0, 0, NULL, 9, '2022-12-20 17:30:10', 810),
(5, '2022-10-06', '2022-10-10', 'Mountain Sweet', 1, 1, 0, NULL, 8, '2022-12-20 17:50:30', 500),
(6, '2022-12-29', '2023-01-03', 'Ozean Villa', 1, 0, 0, NULL, 8, '2022-12-20 17:52:15', 1075),
(7, '2022-09-06', '2022-09-15', 'Deluxe Villa', 1, 1, 0, NULL, 12, '2022-12-20 17:52:37', 2925),
(8, '2022-09-07', '2022-09-12', 'Mountain Sweet', 1, 1, 0, NULL, 12, '2022-12-20 17:53:01', 625),
(9, '2023-02-01', '2023-02-28', 'Ozean Villa', 1, 1, 0, NULL, 1, '2022-12-20 17:54:30', 6075),
(10, '2024-01-01', '2024-01-02', 'Deluxe Villa', 1, 1, 0, NULL, 9, '2023-01-01 11:09:06', 325),
(11, '2025-02-01', '2025-02-03', 'Mountain Sweet', 1, 1, 1, NULL, 9, '2023-01-01 11:10:00', 250),
(12, '2023-01-11', '2023-01-12', 'Ozean Sweet', 1, 0, 1, NULL, 9, '2023-01-01 11:10:59', 135);

-- --------------------------------------------------------
--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `useremail`, `admin`, `status`) VALUES
(1, 'montana', '$2y$10$.L8KbcyzwxBrVgAnDhC88eKZz.jJVBtdXOiv5DIhRPD.JQ8HuMJkO', 'montanauser@gmail.com', 0, 1),
(2, 'john.doe', '$2y$10$FoQy6X5zFbP/XI9gQkKrvu1D3vK0Cz0Wui/Iy8g0TY6I.jGJfgQGu', 'john.doe@gmail.de', 0, 1),
(3, 'altin', '$2y$10$59UB2Zo1QNdz.qKvxDpzuuAP6vgJWKVNrv0yrQ8RJuer8lc6.zMca', 'altin@altin.at', 1, 1),
(4, 'john_no', '$2y$10$8e23PuzGL1J9/ZHGGMcH/.BKp0XXsNbYHF7Uh4K38.jBee9/TGdMG', 'john.doe67@gmail.de', 0, 0),
(5, 'julian', '$2y$10$UBtX6KbiR5drZ92MVTq/GeyLKZmXGBdEV68cu/Mh8eeRhhb2AET6W', 'kjkj@gmail.com', 1, 1),
(6, 'test_1', '$2y$10$9N5C9Oct/sZh3qSKd7gkVuuHwvKiCz.Gzp8X5J3lwrDKyu1lknfIy', 'testuser@email.com', 0, 1);

-- --------------------------------------------------------