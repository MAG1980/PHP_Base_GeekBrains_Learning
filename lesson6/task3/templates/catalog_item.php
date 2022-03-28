<? if ($catalog_item != null): ?>
	<h2 class="catalog__item-title"><?= $catalog_item["name"] ?></h2>
	<div class="catalog__link">
		<img class="catalog__item-img" src="/catalog_img/<?= $catalog_item['image'] ?>" alt="<?= $catalog_item['name'] ?>">
		<p><?= $catalog_item["description"] ?></p>
		<p>Стоимость: <?= $catalog_item["price"] ?></p>
	</div>
	<?= var_dump($message) ?>
	<button>Купить</button>
	<hr>
<? else: ?>
	<?= $catalog_message ?>
<? endif; ?>

