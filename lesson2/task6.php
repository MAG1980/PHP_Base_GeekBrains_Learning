<?php

function power($val, $pow)
{
    if ($pow < 0) return "Введите положительное значение степени";
    if ($pow === 1) return $val;
    if ($pow === 0) return 1;
    return $val * power($val, --$pow);
}

echo power(3, 3);