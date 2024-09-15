<?php
include 'classSimpleImage.php';
define( 'ROOT', $_SERVER[ 'DOCUMENT_ROOT' ] );
define( 'GALLERY_SMALL_PATH', ROOT . '/img/small/' );
define( 'GALLERY_BIG_PATH', ROOT . '/img/big/' );
$smallImagesPath = '/img/small/';

$uploading =
	[
		'ok' => "Загрузка прошла успешно!",
		'error' => 'Ошибка загрузки!'
	];

$formMessage = '';

$images = array_slice( scandir( GALLERY_SMALL_PATH ), 2 );

$formMessage = $uploading[ $_GET[ 'status' ] ];

if ( !empty( $_FILES ) ) {
	$uploadingStatus = uploadFileWithChecking(
		$_FILES[ 'picture' ][ 'tmp_name' ],
		GALLERY_BIG_PATH . $_FILES[ 'picture' ][ 'name' ]
	);

	$status = $uploadingStatus ? 'ok' : 'error';

	if ( $uploadingStatus ) {
		imageResizeAndCopy(
			GALLERY_BIG_PATH . $_FILES[ 'picture' ][ 'name' ],
			GALLERY_SMALL_PATH . $_FILES[ 'picture' ][ 'name' ]
		);
	}
	header( 'Location: index.php?status=' . $status );
	$formMessage = $uploading[ $_GET[ 'status' ] ];
	die();
}

function renderImagesGallery( array $images, string $imagesPath ): string
{
	$ImagesGallery = "";
	foreach ( $images as $image ) {
		$ImagesGallery .=
			'<a href="/img/big/' . $image . '">
			<img class="gallery__small-img" src="' . $imagesPath . $image . '" width="300" alt="' . $image . '">
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

?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/css/styles.css">
	<title>Gallery</title>
</head>
<body>
<h1 class="heading__title">Галерея фотографий</h1>
<section class="section__form">
	<h2>Форма для загрузки нового изображений галерею</h2>
	<form class="form" method="post" action="index.php" enctype="multipart/form-data">
		<label for="small-file">Загрузить изображение</label>
		<input class="form__input" type="file" name="picture">
		<p class="form__message"><?= $formMessage ?></p>
		<input type="submit" value="Отправить на сервер">
	</form>
</section>
<section class="section__gallery">
	<div class="gallery__layout">
		<?= renderImagesGallery( $images, $smallImagesPath ) ?>
	</div>
</section>
</body>
</html>
