<?php
include '../libs/classSimpleImage.php';

function renderImagesGallery( array $images, string $imagesPath ): string
{
    $ImagesGallery = "";
    foreach ( $images as $image ) {
        $ImagesGallery .=
            '<a href="/img/gallery/big/' . $image . '">
			<img class="gallery__small-img" src="' . $imagesPath . $image . '" alt="' . $image . '">
		</a>';
    }
    return $ImagesGallery;
}

function uploadFileWithChecking( $file, $path ): bool
{
    if ( $_FILES[ 'picture' ][ 'size' ] > 512000 || $_FILES[ 'picture' ][ 'type' ] != 'image/jpeg' ) {
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


