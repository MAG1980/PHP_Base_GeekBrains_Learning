<?php
include "../config/config.php";

$page = 'index';

if (isset( $_GET[ 'page' ] )) {
    $page = $_GET[ 'page' ];
}
$params = [];

switch ($page){
    case 'index':
        $params[ 'title' ] = 'Главная';
        break;

    case 'bux':
        /* if (!empty($_FILES)) {
            upload();
            header(/?page=bux);
        die();
        }*/

        $params[ 'title' ] = 'Бухи';
        $params[ 'message' ] = 'Файл загружен';
        $params[ 'files' ] = getFiles();
        _log( $params, 'bux' );
        break;

    case 'catalog':
        $params[ 'title' ] = 'Каталог';
        $params[ 'catalog' ] = getCatalog();
        break;

    case 'gallery':
        if (!empty( $_FILES )) {
            imagesUpload();
        }

        $images = array_slice( scandir( GALLERY_SMALL_PATH ), 2 );
        $params[ 'title' ] = 'Галерея фотографий';
        $params[ 'content' ] = $images;
        $params[ 'formMessage' ] = getFormMessage( $_GET[ 'status' ] );
        break;

    case 'about':
        $params[ 'title' ] = 'about';
        $params[ 'phone' ] = 444333;
        break;

    case 'apicatalog':
        echo json_encode( getCatalog(), JSON_UNESCAPED_UNICODE );
        die();

    default:
        echo "404";
        die();
}
echo render( $page, $params );



