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
    return ($b != 0) ? $a / $b : "Ошибка! Деление на 0 запрещено! Введите корректный делитель!";
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation){
        case "summ":
            return summ($arg1, $arg2);

        case "substr":
            return subtraction($arg1, $arg2);

        case "mul":
            return mul($arg1, $arg2);

        case "div":
            return div($arg1, $arg2);

        default:
            return "Ошибка оператора!";
    }
}
