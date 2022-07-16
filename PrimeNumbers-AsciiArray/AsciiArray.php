<?php

declare(strict_types=1);

/**
 * @param int $from
 * @param int $to
 *
 * @throws Exception
 * @return array<int, string>
 */
function generateRandomChars(int $from, int $to): array {
    if ($from >= $to) {
        throw new Exception('parameter $to must be greater than $from');
    }

    $asciiChars = [];
    for ($i = $from; $i <= $to; $i++) {
        $asciiChars[$i] = chr($i);
    }

    shuffle($asciiChars);

    return $asciiChars;
}

$asciiChars = generateRandomChars(ord(','), ord('|'));
echo "Random Array\n";
print_r($asciiChars);

$asciiCharsCount = count($asciiChars);
/** @phpstan-ignore-next-line */
$indexToRemove = random_int(0, $asciiCharsCount - 1);
$charRemoved = $asciiChars[$indexToRemove];
unset($asciiChars[$indexToRemove]);
echo "Random Array after removed element:\n";
print_r($asciiChars);

echo "Random element removed $charRemoved\n";











