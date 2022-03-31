<?php
function installImages()
{
    $smallImages = array_slice( scandir( IMG_SMALL ), 2 );
    $newArr = array_map( function( $image ) {
        return [
            'name' => $image
        ];
    }, $smallImages );

    foreach ($newArr as $item) {
        executeSql( "INSERT INTO images (name) VALUES ('{$item['name']}')" );
    }
}