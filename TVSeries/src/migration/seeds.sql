INSERT INTO tv_series (id, title, channel, gender)
VALUES  (1, 'Saint Seiya', 11, 'anime'),
        (2, 'X-Files', 9, 'sci-fi'),
        (3, 'The StoryTeller', 7, 'sci-fi'),
        (4, 'Prison Break', 5, 'drama'),
        (5, 'The Simpsons', 3, 'comedy');

INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time)
VALUES  (1, 1, '08:00:00'),
        (1, 2, '08:00:00'),
        (1, 3, '08:00:00'),
        (1, 4, '08:00:00'),
        (1, 5, '08:00:00'),
        (2, 6, '09:00:00'),
        (2, 0, '09:00:00'),
        (3, 1, '10:00:00'),
        (3, 3, '10:00:00'),
        (3, 5, '10:00:00'),
        (4, 2, '11:00:00'),
        (4, 4, '11:00:00'),
        (5, 6, '12:00:00'),
        (5, 0, '23:00:00');