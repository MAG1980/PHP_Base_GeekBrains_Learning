<h2>Каталог товаров:</h2>
<?= var_dump($catalog) ?>
<?php foreach ($catalog as $item): ?>
	<div>
		<h2><?= $item["name"] ?></h2>
		<a class="catalog__link" href="/catalog_item/?id=<?= $item['id'] ?>">
			<img class="catalog__item" src="/catalog_img/<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
			<p><?= $item["description"] ?></p>
			<p>Стоимость: <?= $item["price"] ?></p>
		</a>

		<button>Купить</button>
		<hr>
	</div>
<?php endforeach; ?>