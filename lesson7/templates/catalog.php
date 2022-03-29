<h2>Каталог товаров:</h2>

<? if (count($catalog) != 0): ?>
	<?php foreach ($catalog as $item): ?>
		<div>
			<h2><?= $item["name"] ?></h2>
			<a class="catalog__link" href="/catalog_item/?id=<?= $item['id'] ?>">
				<img class="catalog__item" src="/catalog_img/<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
				<p><?= $item["description"] ?></p>
				<p>Стоимость: <?= $item["price"] ?></p>
			</a>

			<form action="/cart/" method="post">
				<input type="text" name="id" value="<?= $item['id'] ?>" hidden>
				<button type="submit">Купить</button>
			</form>
			<hr>
		</div>
	<?php endforeach; ?>
<? else: ?>
	Каталог товаров пуст!
<? endif; ?>
