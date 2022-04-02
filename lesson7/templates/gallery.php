<?php if (count($gallery) != 0): ?>
	<?php foreach ($gallery as $image): ?>
		<a rel="gallery" class="photo gallery__img" href="/image/?id=<?= $image['id'] ?>">
			<img class="gallery__small-img" src="/gallery_img/small/<?= $image['filename'] ?>" width="150"/>
			<span class="likes__count"><?= $image['likes'] ?></span>
		</a>
	<? endforeach; ?>

	<div>
		<p> <?= $upload_message ?></p>
		<p>Загрузить изображение:</p>
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="image">
			<input type="submit" value="Загрузить" name="load">
		</form>
	</div>
<? else: ?>
	<?= $message ?>
<? endif; ?>
