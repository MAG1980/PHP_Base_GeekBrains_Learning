<?php
echo "Вариант №1. Решение с использованием арифметических действий" . PHP_EOL;
 $a=1;
 $b=2;
 echo "Исходные значения переменных" . PHP_EOL;
echo "\$a: {$a} ";
echo "\$b: {$b}" . PHP_EOL;
$a=$a+$b; //3
$b=$a-$b; //1
$a=$a-$b;
echo "Итоговые значения переменных" . PHP_EOL;
echo "\$a: {$a} ";
echo "\$b: {$b}" . PHP_EOL. PHP_EOL;

echo "Вариант №2. Решение в одну строку" . PHP_EOL;
 $c=1;
 $d=2;
echo "Исходные значения переменных" . PHP_EOL;
echo "\$c: {$c} ";
echo "\$d: {$d} ". PHP_EOL;
$c= $c + $d - ($d = $c);
echo "Итоговые значения переменных" . PHP_EOL;
echo "\$c: {$c} ";
echo "\$d: {$d}" . PHP_EOL. PHP_EOL;

echo "Вариант №3. Решение с использованием битовых операций" . PHP_EOL;
echo "Исходные значения переменных" . PHP_EOL;
 $e=1;
 $f=2;
echo "\$e: {$e} ";
echo "\$f: {$f} " . PHP_EOL;
$e = $e ^ $f;
$f = $e ^ $f;
$e = $e ^ $f;
echo "Итоговые значения переменных" . PHP_EOL;
echo "\$e: {$e} ";
echo "\$f: {$f} " . PHP_EOL. PHP_EOL;

echo "Вариант №4. Решение путём деструктуризации массива" . PHP_EOL;
echo "Исходные значения переменных" . PHP_EOL;
$g = 1;
$h = 2;
echo "\$g: {$g} ";
echo "\$h: {$h} " . PHP_EOL;
[$g, $h] = [$h, $g];
echo "Итоговые значения переменных" . PHP_EOL;
echo "\$g: {$g} ";
echo "\$h: {$h} ";