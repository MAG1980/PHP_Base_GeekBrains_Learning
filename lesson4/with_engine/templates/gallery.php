<h1 class="heading__title">Галерея фотографий</h1>
<section class="section__form">
	<h2>Форма для загрузки нового изображений галерею</h2>
	<form class="form" method="post" action="/?page=gallery" enctype="multipart/form-data">
		<label for="small-file">Загрузить изображение</label>
		<input class="form__input" type="file" name="picture">
		<p class="form__message"><?= $formMessage ?></p>
		<input type="submit" value="Отправить на сервер">
	</form>
</section>
<section class="section__gallery">
	<div class="gallery__layout">
		<?= $content ?>
	</div>
</section>
