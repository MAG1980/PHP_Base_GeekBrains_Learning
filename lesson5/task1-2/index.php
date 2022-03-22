<?php

include "config/config.php";
$small_img_path = GALLERY_SMALL_PUBLIC_PATH;
$big_img_path = GALLERY_BIG_PUBLIC_PATH;
$image_name = $_FILES[ 'picture' ][ 'name' ];

$small_img_size = filesize( GALLERY_SMALL_PATH . $image_name );
$big_img_size = filesize( GALLERY_BIG_PATH . $image_name );

$result_images = mysqli_query( $db, "SELECT * FROM images WHERE id>0" );

if ($_GET[ 'action' ] === 'delete') {
	$id = (int)$_GET [ 'id' ];
	$result_images = mysqli_query( $db, "DELETE  FROM images WHERE id={$id}" );
	header( "Location: /" ); //редирект нужен для очистки строки адреса браузера
	die();                         //для корректной работы скрипта
}

////////////////////////////
$formMessage = '';


$formMessage = $uploading[ $_GET[ 'status' ] ];

if (!empty( $_FILES )) {
	$uploadingStatus = uploadFileWithChecking(
		$_FILES[ 'picture' ][ 'tmp_name' ],
		GALLERY_BIG_PATH . $image_name
	);

	$status = $uploadingStatus ? 'ok' : 'error';

	if ($uploadingStatus) {
		imageResizeAndCopy(
			GALLERY_BIG_PATH . $image_name,
			GALLERY_SMALL_PATH . $image_name
		);

		mysqli_query( $db, "INSERT INTO `images`(`name`, `path_to_small`, `path_to_big`, `small_size`, `big_Size` )
VALUES
       ('{$image_name}', '{$small_img_path}', '{$big_img_path}', '{$small_img_size}', '{$big_img_size}')" );

	}
	header( 'Location: index.php?status=' . $status );
	$formMessage = $uploading[ $_GET[ 'status' ] ];
	die();
}

function renderImagesGallery( array $result_images, string $imagesPath ): string
{
	$ImagesGallery = "";
	foreach ($result_images as $image) {
		$ImagesGallery .=
			'<a href="/img/big/' . $image . '">
			<img class="gallery__small-img" src="' . $imagesPath . $image . '" width="300" alt="' . $image . '">
		</a>';
	}
	return $ImagesGallery;
}


function uploadFileWithChecking( $file, $path ): bool
{
	if ($_FILES[ 'picture' ][ 'size' ] > 512000 || $_FILES[ 'picture' ][ 'type' ] != 'image/jpeg') {
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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/css/styles.css">
	<title>Gallery</title>
</head>
<body>
<div class="container">
	<h1 class="heading__title">Галерея изображений</h1>

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
			<?php
			if ($result_images -> num_rows !== 0):
				while ($row = mysqli_fetch_assoc( $result_images )): ?>
					<a href="/image.php?id=<?= $row[ 'id' ] ?>">
						<h3><?= $row[ 'name' ] ?></h3>
						<img class="gallery__small-img" src="<?= $row[ 'path_to_small' ] . $row[ 'name' ] ?>"
						     alt="<?= $row[ 'name' ] ?>">
					</a>
					<a href="/?id=<?= $row[ 'id' ] ?>&action=delete">x</a>
				<?php endwhile; ?>
			<?php else : ?>
				<p>Ошибка</p>
			<? endif ?>
		</div>
	</section>
</div>


</body>
</html>
