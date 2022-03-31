<?php

//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$action = $url_array[2];

if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

///$page = $_GET['page'] ?? "index";

$params = prepareVariables($page, $action);

echo render($page, $params);


