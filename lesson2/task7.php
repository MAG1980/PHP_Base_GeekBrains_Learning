<?php
function timeToSring($hours, $minutes)
{
    return "{$hours} " . numToWord($hours, array('час', 'часа', 'часов')) . " {$minutes} " .
        numToWord($minutes, array('минута', 'минуты', 'минут')) . PHP_EOL;

}

function numToWord($value, $words)
{
    $selector = $value % 10;
    if ($value >= 10 && $value <= 19) $selector = 5;
    switch ($selector) {
        case 1:
            return $words[0];

        case 2:
        case 3:
        case 4:
            return $words[1];

        default:
            return $words[2];
    }
}

echo timeToSring(1, 1);
echo timeToSring(11, 11);
echo timeToSring(22, 15);
echo timeToSring(9, 9);

$item = array('яблоко', 'яблока', 'яблок');
echo 1 . " " . numToWord(1, $item) . PHP_EOL;
echo 9 . " " . numToWord(9, $item) . PHP_EOL;
echo 11 . " " . numToWord(11, $item) . PHP_EOL;
echo 23 . " " . numToWord(23, $item) . PHP_EOL;