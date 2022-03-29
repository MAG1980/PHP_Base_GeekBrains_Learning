<p><?= $catalog_message ?></p>
<? if ($_GET['status'] != 'error'): ?>
	<h2 class="catalog__item-title"><?= $catalog_item["name"] ?></h2>
	<div class="catalog__link">
		<img class="catalog__item-img" src="/catalog_img/<?= $catalog_item['image'] ?>" alt="<?= $catalog_item['name'] ?>">
		<p><?= $catalog_item["description"] ?></p>
		<p>Стоимость: <?= $catalog_item["price"] ?></p>
	</div>

	<form action="/catalog_item/add_to_cart/" method="post">
		<input type="text" name="id" value="<?= $catalog_item['id'] ?>" hidden>
		<button type="submit">Купить</button>
	</form>
	<hr>
<? endif; ?>

