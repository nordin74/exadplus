<?php

declare(strict_types=1);

/**
 * @param int $number
 *
 * @return array<int>
 */
function getMultiples(int $number): array {
    $multiples = $multiplesToReverse = [];
    $sqrt = sqrt($number);
    for ($i = 1; $i <= $sqrt; $i++) {
        if ($number % $i === 0) {
            $multiples[] = $i;
            /** @var int $division */
            $division = $number / $i;
            if ($division !== $i) {
                $multiplesToReverse[] = $division;
            }
        }
    }

    //To avoid sorting
    return array_merge($multiples, array_reverse($multiplesToReverse));
}


for ($i = 1; $i <= 100; $i++) {
    $multiples = getMultiples($i);
    $prime = count($multiples) === 2 ? ' [PRIME]' : '';
    echo $i . ' (' . implode(',', $multiples) . ')' . $prime . "\n";
}
