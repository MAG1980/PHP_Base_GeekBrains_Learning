<?php
function summ($a, $b)
{
    return $a + $b;
}

function subtraction($a, $b)
{
    return $a - $b;
}

function mul($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
//    if ($b === 0) return "Ошибка! Деление на 0 запрещено! Введите корректный делитель!";
//    return $a / $b;
    return ($b === 0) ? "Ошибка! Деление на 0 запрещено! Введите корректный делитель!" : $a / $b;
}

$a = 10;
$b = 5;

//echo "summ($a, $b) = " . summ($a, $b) . PHP_EOL;
//echo "subtraction($a, $b) = " . subtraction($a, $b) . PHP_EOL;
//echo "mul($a, $b) = " . mul($a, $b) . PHP_EOL;
//echo "div($a, $b) = " . div($a, $b) . PHP_EOL;
//echo "div($a, 0) = " . div($a, 0) . PHP_EOL;
