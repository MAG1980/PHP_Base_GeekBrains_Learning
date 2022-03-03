<?php
//1.С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.

echo PHP_EOL . 'Задание 1:' . PHP_EOL;

$i = 0;

while ( $i <= 100 ) {
    if ( $i % 3 === 0 ) echo $i . " ";
    $i++;
}

echo PHP_EOL;


//2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
//0 – ноль.
//1 – нечетное число.
//2 – четное число.
//3 – нечетное число.
//…
//10 – четное число.
//
//использовать битовые операции
//вывести как по шаблону в задании

echo PHP_EOL . 'Задание 2 вариант 1:' . PHP_EOL;

$i = 0;
do {
    if ( $i === 0 ) {
        echo $i . " - ноль." . PHP_EOL;
    }
    else if ( $i % 2 === 0 ) {
        echo $i . " - четное число." . PHP_EOL;
    }
    else {
        echo $i . " - нечетное число." . PHP_EOL;
    }
    $i++;
} while ( $i <= 10 );

echo PHP_EOL . 'Задание 2 вариант 2:' . PHP_EOL;

define( 'EVEN', 1 << 1 );
$i = 0;
do {
    if ( $i === 0 ) {
        echo $i . " - ноль." . PHP_EOL;
    }
    else if ( $i & EVEN ) {
        echo $i . " - четное число." . PHP_EOL;
    }
    else {
        echo $i . " - нечетное число." . PHP_EOL;
    }
    $i++;
} while ( $i <= 10 );

echo PHP_EOL;

//3. Объявить вложенный массив
//
//Собрать список городов в строку с помощью функции, которая возвращает строку.
//запятую в конце заменить на точку, используя документацию php (функция замены строк).

echo PHP_EOL . 'Задание 3 вариант 1:' . PHP_EOL;

$regions = [
    'Московская область' => [ 'Москва', 'Зеленоград', 'Клин' ],
    'Ленинградская область' => [ 'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт' ],
    'Рязанская область' => [ 'Рязань', 'Михайлов', 'Скопин', 'Касимов' ],
];


foreach ( $regions as $region => $cities ) {
    printCitiesOfRegions( $region, $cities );
}

function printCitiesOfRegions( $region, $cities )
{
    echo $region . ': ' . implode( ', ', $cities ) . '.' . PHP_EOL;
}


echo PHP_EOL . 'Задание 3 вариант 2:' . PHP_EOL;

foreach ( $regions as $region => $cities ) {
    $finalString = '';
    for ( $j = 0, $arrLength = count( $cities ); $j < $arrLength; $j++ ) {
        $citiesString = &$finalString;
        $citiesString .= $cities[ $j ] . ', ';

    }

    $finalString = substr_replace( $finalString, '.', -2, 2 );
    echo $region . ': ' . $finalString . PHP_EOL;
}


//4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк. Она должна учитывать и заглавные буквы.

echo 'Задание 4:' . PHP_EOL;

include './alfavit.php';

function translate( $str, $dictionary )
{
    echo 'Длина строки ' . $strLength . ' <br>';
    for ( $k = 0; $k < mb_strlen( $str ); $k++ ) {
        $letter = mb_substr( $str, $k, 1 );
        echo $letter . " - буква №$k <br>";
        $letterToLowerCase = mb_strtolower( $letter );
        echo $letterToLowerCase . " - буква №$k в нижнем регистре <br>";
        if ( $dictionary[ $letterToLowerCase ] ) {
            $upperCase = !( $letterToLowerCase === $letter );
            echo $letter . ' $letter <br>';
            echo $upperCase . ' $upperCase <br>';
            $str = mb_substr_replace( $str, $upperCase, mb_strlen( $str ), $dictionary[ $letterToLowerCase ], $k );
//            echo "Строка после замены буквы - $str <br>";
        }
        else {
            continue;
        }
    }
    return $str;
}

//Нативная функция mb_substr_replace() в PHP отсутствует, поэтому пришлось искать кастомную
function mb_substr_replace( string $string, bool $upperCase, int $strLength, string $newSymbol, int $newSymbolPosition ):
string
{
    echo "mb_substr_replace " . $string . " " . $strLength . " " . $newSymbol . " " . $newSymbolPosition . "<br>";
    $startString = mb_substr( $string, 0, $newSymbolPosition );
    $newSymbol = $upperCase ? mb_strtoupper( $newSymbol ) : $newSymbol;
    $endString = mb_substr( $string, $newSymbolPosition + 1, $strLength - 1 );
    echo "mb_substr_replace return: " . $startString . ' $startString ' . $newSymbol . ' $newSymbol ' . $endString .
        ' $endString ' . "<br>";
    return $newString = $startString . $newSymbol . $endString;
}

echo translate( 'Хочу щаВеля', $alfabet );
