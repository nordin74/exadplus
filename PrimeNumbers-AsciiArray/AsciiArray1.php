<?php

declare(strict_types=1);

$asciiChars = range(',', '|');
shuffle($asciiChars);

$firstChar = ord(',');
$lastChar = ord('|');
$totalChars = $lastChar - $firstChar + 1;
$sumA = ($firstChar + $lastChar) * ($totalChars) / 2;

echo "Random Array\n";
print_r($asciiChars);

$indexToRemove = random_int(0, $totalChars - 1);
$previousAsciiChars = $asciiChars;
unset($asciiChars[$indexToRemove]);
echo "Random Array after removed element:\n";
print_r($asciiChars);

$sumB = 0;
foreach($asciiChars as $char) {
    $sumB += ord($char);
}

$charRemoved = chr($sumA - $sumB);
echo "Random element removed $charRemoved\n";











