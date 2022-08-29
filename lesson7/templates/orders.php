<h1>Заказы</h1>

<?php if (isset($current_order)): ?>
	<h2>Текущий заказ</h2>
	<div class="cart__checkout-form">
		<div class="cart__header cart__row">
			<div class="cart__column cart__good-id">№</div>
			<div class="cart__column cart__good-name">Наименование</div>
			<div class="cart__column cart__goog-price">Стоимость единицы товара</div>
			<div class="cart__column cart__good-quantity">Количество</div>
			<div class="cart__column cart__good-total-price">Цена</div>
			<div class="cart__column cart__good-total-price"></div>
		</div>
		<?php foreach ($current_order as $key => $current_order): ?>
			<div class="cart__row">
				<div class="cart__column cart__good-id"><?= $key + 1 ?></div>
				<div class="cart__column cart__good-name"><?= $current_order['good_name'] ?></div>
				<div class="cart__column cart__goog-price"><?= $current_order['good_price'] ?></div>
				<div class="cart__column cart__good-quantity"><?= $current_order['number'] ?></div>
				<div class="cart__column cart__good-total-price"><?= $current_order['full_price'] ?></div>
			</div>
		<? endforeach; ?>

	</div>
<?php endif; ?>

<div class="cart">
	<div class="cart__header cart__row">
		<div class="cart__column cart__good-id">№ заказа</div>
		<div class="cart__column cart__good-name">Клиент</div>
		<div class="cart__column cart__goog-price">Телефон</div>
		<div class="cart__column cart__good-quantity">Электронная почта</div>

	</div>
	<?php foreach ($orders as $order): ?>
		<div class="cart__row">
			<div class="cart__column cart__good-id"><?= $order['id'] ?></div>
			<div class="cart__column cart__good-name"><?= $order['customer_name'] ?></div>
			<div class="cart__column cart__good-quantity"><?= $order['phone_number'] ?></div>
			<div class="cart__column cart__good-total-price"></div>
			<form action="/orders/more/?order_id=<?= $order['cart_session'] ?>" method="post">
				<button class="cart__button" type="submit">Подробнее</button>
			</form>
		</div>
	<? endforeach; ?>
</div>