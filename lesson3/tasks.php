<?php
//1.С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.

echo PHP_EOL . 'Задание 1:<br>';

$i = 0;

while ( $i <= 100 ) {
    if ( $i % 3 === 0 ) echo $i . " ";
    $i++;
}
?>
<?= '<br>' ?>

<?php
echo '<br>Задание 2 вариант 1:<br>';
$i = 0;
do {
    if ( $i === 0 ) {
        echo $i . " - ноль.<br>";
    } else if ( $i % 2 === 0 ) {
        echo $i . " - четное число.<br>";
    } else {
        echo $i . " - нечетное число.<br>";
    }
    $i++;
} while ( $i <= 10 );
?>
<?= '<br>' ?>
<?php

echo '<br>Задание 2 вариант 2:<br>';

define( 'EVEN', 1 << 1 );
$i = 0;
do {
    if ( $i === 0 ) {
        echo $i . " - ноль." . PHP_EOL;
    } else if ( $i & EVEN ) {
        echo $i . " - четное число." . PHP_EOL;
    } else {
        echo $i . " - нечетное число." . PHP_EOL;
    }
    $i++;
} while ( $i <= 10 );

?>
<?= '<br>' ?>
<?php

echo '<br>Задание 3 вариант 1:<br>';

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
    echo $region . ': ' . implode( ', ', $cities ) . '.<br>';
}


echo '<br>Задание 3 вариант 2:<br>';

foreach ( $regions as $region => $cities ) {
    $finalString = '';
    for ( $j = 0, $arrLength = count( $cities ); $j < $arrLength; $j++ ) {
        $citiesString = &$finalString;
        $citiesString .= $cities[ $j ] . ', ';

    }

    $finalString = substr_replace( $finalString, '.', -2, 2 );
    echo $region . ': ' . $finalString . '<br>';
}
?>
<?= '<br>' ?>
<?php

echo '<br>Задание 4:<br>';

include './alfavit.php';

function translate( string $str, array $dictionary ): string
{
    for ( $k = 0; $k < mb_strlen( $str ); $k++ ) {
        $letter = mb_substr( $str, $k, 1 );
        $letterToLowerCase = mb_strtolower( $letter );
        if ( $dictionary[ $letterToLowerCase ] ) {
            $upperCase = !( $letterToLowerCase === $letter );
            $str = mb_substr_replace( $str, $upperCase, mb_strlen( $str ), $dictionary[ $letterToLowerCase ], $k );
        } else {
            continue;
        }
    }
    return $str;
}

//Нативная функция mb_substr_replace() в PHP отсутствует, поэтому пришлось искать кастомную
function mb_substr_replace( string $string, bool $upperCase, int $strLength, string $newSymbol, int $newSymbolPosition ):
string
{
    $startString = mb_substr( $string, 0, $newSymbolPosition );
    $newSymbol = $upperCase ? ucfirst( $newSymbol ) : $newSymbol;
    $endString = mb_substr( $string, $newSymbolPosition + 1, $strLength - 1 );
    return $newString = $startString . $newSymbol . $endString;
}

echo translate( 'Хочу щаВеля. Щавель кислый. Тебе нужен йод. Йода нет! Бери H20.', $alfabet );
?>
<?= '<br>' ?>
<?php

echo '<br>Задание 5:<br>';

function spacesToUnderscore( $search, $replace, string $string ): string
{
    return str_replace( $search, $replace, $string );
}

$stringTack5 = 'Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку. Можно через str_replace.';
echo "Оригинальная строка: $stringTack5<br>" . "Изменённая строка: " . spacesToUnderscore( ' ', '_', $stringTack5 )
    . '<br>';