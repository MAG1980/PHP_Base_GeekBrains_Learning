<?php

include "../task3.php";

$arg1 = 10;
$arg2 = 5;


function mathOperation( $arg1, $arg2, $operation )
{
    if ( !function_exists( $operation ) ) return "Ошибка оператора!";
    return $operation( $arg1, $arg2 );
}

echo "mathOperation($arg1, $arg2, 'summ') = " . mathOperation( $arg1, $arg2, "summ" ) . PHP_EOL;
echo "mathOperation($arg1, $arg2, 'subtraction') = " . mathOperation( $arg1, $arg2, "subtraction" ) . PHP_EOL;
echo "mathOperation($arg1, $arg2, 'mul') = " . mathOperation( $arg1, $arg2, "mul" ) . PHP_EOL;
echo "mathOperation($arg1, $arg2, 'div') = " . mathOperation( $arg1, $arg2, "div" ) . PHP_EOL;
echo "mathOperation($arg1, $arg2, 'div') = " . mathOperation( $arg1, 0, "div" ) . PHP_EOL;
echo "mathOperation($arg1, $arg2, 'div') = " . mathOperation( $arg1, $arg2, "iv" ) . PHP_EOL;



