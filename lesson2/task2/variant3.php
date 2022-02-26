<?php
//Вариант 3. Рекурсия
$start = 0;
$end = 15;
printRangeNumbers($start, $end);

function printRangeNumbers($start, $end)
{
    $start = rand($start, $end);
    recursivePrint($start, $end);
}

function recursivePrint($start, $end)
{
    if ($start == $end) {
        echo "$start ";
        return;
    } else {
        echo "$start ";
    }
    recursivePrint(++$start, $end);
}
