<?php
include "config/config.php";
$db = mysqli_connect( 'lesson5:3307', 'test', '12345', 'test' );
$smallImages = array_slice( scandir( GALLERY_SMALL_PATH ), 2 );
$bigImages = array_slice( scandir( GALLERY_BIG_PATH ), 2 );

$newArr = array_map( function( $image ) {
    return [
        'name' => $image,
        'path_to_small' => GALLERY_SMALL_PATH,
        'path_to_big' => GALLERY_BIG_PATH,
        'small_Size' => filesize( GALLERY_SMALL_PATH . $image ),
        'big_Size' => filesize( GALLERY_BIG_PATH . $image )
    ];
}, $smallImages );

foreach ($newArr as $item) {
    $result = mysqli_query( $db, "INSERT INTO images (name, path_to_small,path_to_big, small_Size, big_Size) VALUES
    ('{$item['name']}', '{$item['path_to_small']}','{$item['path_to_big']}', '{$item['small_Size']}', '{$item['big_Size']}')" );
}

header( "Location: /" ); //редирект нужен для очистки строки адреса браузера
die();

