<?php foreach ($gallery as $filename): ?>
<a rel="gallery" class="photo" href="gallery_img/big/<?= $filename ?>"><img src="gallery_img/small/<?= $filename ?>" width="150"/></a>
<? endforeach; ?>
<?=$message?>
