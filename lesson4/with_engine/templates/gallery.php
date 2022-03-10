<?php
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
?>
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
