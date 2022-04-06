<div class="cart">
	<?php if (empty($cart)): ?>
		<div class="cart__message"><?= $message ?></div>
		<p>Ваша корзина пуста!</p>
	<?php else: ?>
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
					<input type="text" name="goods_count" value="<?= $cartLine['number'] ?>" hidden>
					<button class="cart__button" type="submit">Удалить</button>
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
		<div class="cart__checkout">
			<div class="cart__checkout-space">
				<form class="cart__checkout-form dn" action="/cart/checkout/" method="post">
					<input type="text" name="checkout" value="<?= $cartLine['session_id'] ?>" hidden>
					<input class="cart__checkout-input" type="text" name="customer_name" placeholder="Имя"
					       value="<?= $_SESSION['login'] ?>">
					<input class="cart__checkout-input" type="tel" name="phone_number" placeholder="Номер телефона">
					<button class="cart__button cart__checkout-button" type="submit">Отправить сведения о заказе</button>
				</form>
			</div>
			<button class="cart__button cart__button-checkout">Оформить</button>
		</div>
	<?php endif; ?>
</div>

<script src="/js/script.js"></script>
