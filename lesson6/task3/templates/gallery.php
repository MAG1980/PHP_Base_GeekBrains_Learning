<?php
var_dump($gallery);
foreach ($gallery as $image): ?>
	<a rel="gallery" class="photo" href="gallery_img/big/<?= $image['filename'] ?>"><img
			src="gallery_img/small/<?= $image['filename']
			?>"
			width="150"/></a>
<? endforeach; ?>
<?= $message ?>
