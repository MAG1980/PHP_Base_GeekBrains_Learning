<?php
include "../task3.php";

$arg1 = 10;
$arg2 = 5;


function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "summ":
        {
            return summ($arg1, $arg2);
        }

        case "subtraction":
        {
            return subtraction($arg1, $arg2);
        }

        case "mul":
        {
            return mul($arg1, $arg2);
        }

        case "div":
        {
            return div($arg1, $arg2);
        }

        default:
            return "Ошибка оператора!";
    }
}

echo "mathOperation($arg1, $arg2, 'summ') = " . mathOperation($arg1, $arg2, "summ") . PHP_EOL;
echo "mathOperation($arg1, $arg2, 'subtraction') = " . mathOperation($arg1, $arg2, "subtraction") . PHP_EOL;
echo "mathOperation($arg1, $arg2, 'mul') = " . mathOperation($arg1, $arg2, "mul") . PHP_EOL;
echo "mathOperation($arg1, $arg2, 'div') = " . mathOperation($arg1, $arg2, "div") . PHP_EOL;
echo "mathOperation($arg1, $arg2, 'div') = " . mathOperation($arg1, 0, "div") . PHP_EOL;
echo "mathOperation($arg1, $arg2, 'div') = " . mathOperation($arg1, $arg2, "iv") . PHP_EOL;


