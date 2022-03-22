<?php

foreach ($gallery as $image): ?>
	<a rel="gallery" class="photo" href="gallery_img/big/<?= $image[ 'name' ] ?>">
		<img src="gallery_img/small/<?= $image[ 'name' ] ?>" width="150"/>
	</a>
<? endforeach; ?>
<?= $message ?>