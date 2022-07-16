CREATE TABLE tv_series (
  id      INT AUTO_INCREMENT PRIMARY KEY,
  title   VARCHAR(255) NOT NULL,
  channel INT          NOT NULL,
  gender  VARCHAR(255) NOT NULL
);

CREATE TABLE tv_series_intervals (
  id_tv_series INT        NOT NULL,
  week_day     TINYINT(1) NOT NULL,
  show_time    TIME       NOT NULL
);
