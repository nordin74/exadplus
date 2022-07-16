<?php

declare(strict_types=1);

namespace ExadsPlus;

class TvSeries
{
    private \PDO $pdo;
    const DATETIME_FORMAT = 'Y-m-d H:i';

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * @param \DateTimeImmutable $dateTime
     * @param string|null $title
     *
     * @throws \Exception
     * @return array<\stdClass>
     */
    public function getShows(\DateTimeImmutable $dateTime, string $title = null): array
    {
        $sql = <<<'SQL'
SELECT ts.title, ts.channel, tsi.week_day, tsi.show_time
FROM tv_series ts
INNER JOIN tv_series_intervals tsi ON tsi.id_tv_series = ts.id
WHERE tsi.week_day = ? AND tsi.show_time >= ? 
SQL;

        $params = [$dateTime->format('w'), $dateTime->format(self::DATETIME_FORMAT)];
        if ($title) {
            $sql .= ' AND title LIKE ?';
            $params[] = '%' . $title . '%';
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        if(($result = $stmt->fetchAll(\PDO::FETCH_OBJ)) === false) {
            // TODO: Log error
            throw new \Exception('Error fetching shows');
        }

        return $result;
    }
}