<?php

declare(strict_types=1);

final class TvSeriesCLIPresenter
{
    /**
     * @param array<\stdClass> $shows
     *
     * @return void
     */
    public static function print(array $shows): void
    {
        printf("+%'-77s", "+\n");
        $mask = "| %-40s | %-7s | %-9s | %-8s |\n";
        printf($mask, 'Title', 'Channel', 'Weekday', 'ShowTime');
        printf("%'-78s", "\n");
        foreach ($shows as $show) {
            $weekDay = jddayofweek($show->week_day - 1, CAL_DOW_LONG);
            printf($mask, $show->title, $show->channel, $weekDay, substr($show->show_time, 0, -3));
        }
        printf("+%'-77s", "+\n");
    }
}