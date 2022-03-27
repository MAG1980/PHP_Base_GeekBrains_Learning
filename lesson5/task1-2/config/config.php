<?php
define( 'ROOT', $_SERVER[ 'DOCUMENT_ROOT' ] );
include ROOT . '/classSimpleImage.php';
include_once ROOT . '/db.php';
$uploading =
    [
        'ok' => "Загрузка прошла успешно!",
        'error' => 'Ошибка загрузки!'
    ];


define( 'GALLERY_SMALL_PUBLIC_PATH', '/img/small/' );
define( 'GALLERY_SMALL_PATH', ROOT . GALLERY_SMALL_PUBLIC_PATH );

define( 'GALLERY_BIG_PUBLIC_PATH', '/img/big/' );
define( 'GALLERY_BIG_PATH', ROOT . GALLERY_BIG_PUBLIC_PATH );

