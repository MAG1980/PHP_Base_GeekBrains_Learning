<div class="images_gallery">
	<?php
	foreach ($gallery as $image): ?>
		<a rel="gallery" class="photo card" href="gallery_img/big/<?= $image[ 'name' ] ?>">
			<div class="card">
				<img src="gallery_img/small/<?= $image[ 'name' ] ?>" width="150"/>
				<span> Количество просмотров: <?= $image[ 'views' ] ?></span>

				<a class="photo_link"
				   href="/?page=one_image_db&id=<?= $image[ 'id' ] ?>">Перейти на страницу: <?= $image[ 'name' ] ?>
				</a>

			</div>
		</a>

	<? endforeach; ?>
</div>
<?= $message ?>