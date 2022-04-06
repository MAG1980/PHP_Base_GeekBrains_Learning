<? //= ($_SERVER['REQUEST_URI'] != '/') ? '<p><a href=" / ">Главная</a></p>' : '' ?>

<?php if (!$is_auth): ?>
	<form action="" method="post">
		<input class="menu__input" type="text" name="login" placeholder="Login">
		<input class="menu__input" type="password" name="password" placeholder="Password">
		Save? <input type="checkbox" name="save">
		<button class="menu__button" type="submit" name="send">Sign In</button>
		<a class="menu__button menu__button-link" href="/registration/">Sign Up</a>
	</form>
<?php else: ?>
	Добро пожаловать, <?= $user ?>!  <a href="/?logout">Exit</a></br>
<?php endif; ?>

<ul class="menu">
	<li class="menu_item"><a class="menu__link" href="/">Главная</a></li>
	<li class="menu_item"><a class="menu__link" href="/catalog">Каталог</a></li>
	<li class="menu_item"><a class="menu__link" href="/about">О нас</a>
	</li>
	<li class="menu_item"><a class="menu__link" href="/gallery">Галерея</a>
	</li>
	<li class="menu_item"><a class="menu__link" href="/news">Новости</a>
	</li>
	<li class="menu_item"><a class="menu__link" href="/apicatalog">api Test</a>
	</li>
	<li class="menu_item"><a class="menu__link" href="/feedback">Отзывы</a>
	</li>
	<li class="menu_item"><a class="menu__link menu__cart" href="/cart/get">Корзина
			<?php if (isset($_SESSION['cartCounter']) && $_SESSION['cartCounter'] > 0): ?>
				<span class="menu__cart-span"><?= $_SESSION['cartCounter'] ?></span>
			<?php endif; ?>
		</a>
	</li>
	<?php if (isAuth()): ?>
		<li class="menu_item"><a class="menu__link" href="/orders">Заказы</a>
		</li>
	<?php endif; ?>
</ul>
