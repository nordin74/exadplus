<?php

declare(strict_types=1);

use ExadsPlus\TvSeries;

require_once __DIR__ . '/src/TvSeries.php';
require_once __DIR__ . '/src/TvSeriesCLIPresenter.php';
$pdo = require_once __DIR__ . '/src/Connection.php';

$inputDateTime = $argv[1] ?? null;
$inputTitle = $argv[2] ?? null;

if ($inputDateTime) {
    $dateTime = DateTimeImmutable::createFromFormat(TvSeries::DATETIME_FORMAT, $inputDateTime);
    if (!$dateTime || ($dateTime->format(TvSeries::DATETIME_FORMAT) !== $inputDateTime)) {
        echo "Please introduce a valid date/time in the format: 'Y-m-d H:i'\n";

        return;
    }
} else {
    $dateTime = new DateTimeImmutable();
}

$tvSeries = new TvSeries($pdo);
$shows = $tvSeries->getShows($dateTime, $inputTitle);
TvSeriesCLIPresenter::print($shows);