<div class="cart">
	<div class="cart__header cart__row">
		<div class="cart__column cart__good-id">№</div>
		<div class="cart__column cart__good-name">Наименование</div>
		<div class="cart__column cart__goog-price">Стоимость единицы товара</div>
		<div class="cart__column cart__good-quantity">Количество</div>
		<div class="cart__column cart__good-total-price">Цена</div>
		<div class="cart__column cart__good-total-price"></div>
	</div>
	<?php foreach ($cart as $key => $cartLine): ?>
		<div class="cart__row">
			<div class="cart__column cart__good-id"><?= $key + 1 ?></div>
			<div class="cart__column cart__good-name"><?= $cartLine['good_name'] ?></div>
			<div class="cart__column cart__goog-price"><?= $cartLine['good_price'] ?></div>
			<div class="cart__column cart__good-quantity"><?= $cartLine['number'] ?></div>
			<div class="cart__column cart__good-total-price"><?= $cartLine['full_price'] ?></div>
			<form action="/cart/delete/" method="post">
				<input type="text" name="goods_id" value="<?= $cartLine['goods_id'] ?>" hidden>
				<button type="submit">Удалить</button>
			</form>
		</div>
	<? endforeach; ?>
	<div class="cart__header cart__row">
		<div class="cart__full-price">Итого</div>
		<div class="cart__column"><?= array_reduce($cart, function($carry, $item) {
				$carry += (float)$item['full_price'];
				return $carry;
			}) ?></div>
	</div>
</div>
