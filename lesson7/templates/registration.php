<?= var_dump($params) ?>
<?php if (is_null($message)): ?>
	<div class="registration container">
		<form class="registration__form" action="/registration/do" method="post">
			<input class="menu__input" type="text" name="login" placeholder="Введите логин">
			<input class="menu__input" type="password" name="password1" placeholder="Введите пароль">
			<input class="menu__input" type="password" name="password2" placeholder="Повторите пароль">
			<button class="menu__button" type="submit">Отправить</button>
		</form>
	</div>
<?php else: ?>
	<p><?= $message ?></p>
<?php endif;

