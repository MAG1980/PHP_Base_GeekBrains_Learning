<?= var_dump($image) ?>
<div class="gallery__img">
	<img src="/gallery_img/big/<?= $image['filename'] ?>"/>
	<span class="likes__count"><?= $image['likes'] ?></span>
</div>
<?= $message ?>
