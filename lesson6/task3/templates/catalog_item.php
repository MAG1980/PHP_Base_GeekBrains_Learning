<h2 class="catalog__item-title"><?= $catalog_item["name"] ?></h2>
<a class="catalog__link" href="/catalog?id=<?= $catalog_item['id'] ?>">
	<img class="catalog__item-img" src="/catalog_img/<?= $catalog_item['image'] ?>" alt="<?= $catalog_item['name'] ?>">
	<p><?= $catalog_item["description"] ?></p>
	<p>Стоимость: <?= $catalog_item["price"] ?></p>
</a>

<button>Купить</button>
<hr>

