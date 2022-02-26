<?php
//Вариант 1
$a = rand(0, 15);
a:
switch ($a) {
    case $a <= 15 :
    {
        echo "$a ";
        $a += 1;
        goto a;
    }
}

