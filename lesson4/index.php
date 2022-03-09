<?php
define( 'ROOT', $_SERVER[ 'DOCUMENT_ROOT' ] );
define( 'GALLERY_SMALL_PATH', ROOT . '/img/small/' );
define( 'GALLERY_BIG_PATH', ROOT . '/img/big/' );
$smallImagesPath = '/img/small/';

$images = array_slice( scandir( GALLERY_SMALL_PATH ), 2 );

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
<section class="section__gallery">
	<div class="gallery__layout">
		<?= renderImagesGallery( $images, $smallImagesPath ) ?>
	</div>

</section>

<section class="section__form">
	<h2>Форма для загрузки нового изображений галерею</h2>
	<form class="form" method="post" action="index.php" enctype="multipart/form-data">
		<label for="small-file">Загрузить превью изображения</label>
		<input class="form__input" type="file" name="small-file">
		<label for="big-file">Загрузить изображение</label>
		<input class="form__input" type="file" name="big-file">
		<input type="submit" value="Отправить файлы на сервер">
	</form>
</section>

</body>
</html>
