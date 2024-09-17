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
		<?php foreach ( $content as $image ): ?>
			<a href="/img/gallery/big/<?= $image ?>">
				<img class="gallery__small-img" src="/img/gallery/small/<?= $image ?>" alt="<?= $image ?>">
			</a>
		<? endforeach ?>
	</div>
</section>
