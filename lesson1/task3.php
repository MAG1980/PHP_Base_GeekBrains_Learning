<?php
$a = 5;
$b = '05';

//В случае, если оба операнда являются строками, содержащими числа
//или один операнд является числом, а другой - строкой, содержащей числа,
//то сравнение выполняется численно.
//В данном случае при сравнении с числом строка в переменной $b неявно приводится к числу
var_dump($a == $b);         // Почему true?

//Для явного преобразования строкового значения в тип integer использовано приведение (int)
var_dump((int)'012345');     // Почему 12345?

//При строгом сравнении не выполняется приведение типов.
//В данном случае оператор строгого сравнения требует, чтобы оба операнда были одного типа.
//(float) приводит свой операнд к типу "число с плавающей точкой", а (integer) - "целое число".
var_dump((float)123.0 === (int)123.0); // Почему false?

//В данном случае сравниваются операнды одного типа: "целое число".
//При приведении строки к числу, первые символы которой не являются цифрами,
//получаем число 0.
var_dump((int)0 === (int)'hello, world'); // Почему true?

