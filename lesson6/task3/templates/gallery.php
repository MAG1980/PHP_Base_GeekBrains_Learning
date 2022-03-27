<?php

foreach ($gallery as $image): ?>
	<?= var_dump($image); ?>
	<a rel="gallery" class="photo" href="/image/?id=<?= $image['id']
	?>"><img src="/gallery_img/small/<?= $image['filename'] ?>"
	         width="150"/></a>
<? endforeach; ?>
<?= $message ?>
