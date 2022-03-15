<?php
function imagesUpload()
{
    $uploadingStatus = uploadFileWithChecking(
        $_FILES[ 'picture' ][ 'tmp_name' ],
        GALLERY_BIG_PATH . $_FILES[ 'picture' ][ 'name' ]
    );

    if ( $uploadingStatus ) {
        imageResizeAndCopy(
            GALLERY_BIG_PATH . $_FILES[ 'picture' ][ 'name' ],
            GALLERY_SMALL_PATH . $_FILES[ 'picture' ][ 'name' ]
        );
    }

    $status = $uploadingStatus ? 'ok' : 'error';

    header( 'Location: /?page=gallery&status=' . $status );
    die();
}

function uploadFileWithChecking( $file, $path ): bool
{
    if ( $_FILES[ 'picture' ][ 'size' ] > 1024000 || $_FILES[ 'picture' ][ 'type' ] != 'image/jpeg' ) {
        return false;
    } else {
        return ( move_uploaded_file( $file, $path ) );
    }
}

function imageResizeAndCopy( string $oldPath, string $newPath ): void
{
    $image = new SimpleImage();
    $image -> load( $oldPath );
    $image -> resizeToWidth( 250 );
    $image -> save( $newPath );
}

function getFormMessage( $status )
{
    $uploading =
        [
            'ok' => "Загрузка прошла успешно!",
            'error' => 'Ошибка загрузки!'
        ];

    return $uploading[ $status ];
}


