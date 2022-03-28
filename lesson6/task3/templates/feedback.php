<h2>Отзывы</h2>

<? if ($message): ?>
	<p>Статус действия: <?= $message ?></p>
<? endif; ?>

<form action="/feedback/add/" method="post">
	Оставьте отзыв: <br>
	<input type="text" name="name" placeholder="Ваше имя"><br>
	<input type="textarea" name="text" placeholder="Ваш отзыв"><br>
	<input type="submit" value="Добавить">
</form>

<?php foreach ($feedbacks as $item): ?>
	<div class="feedback__item">
		<strong><?= $item['name'] ?></strong>: <?= $item['text'] ?>
		<form action="/feedback/edit/?id=<?= $item['id'] ?>" method="post">
			<input type="submit" value="Edit">
		</form>
		<form action="/feedback/delete/?id=<?= $item['id'] ?>" method="post" method="post">
			<input type="submit" value="Delete">
		</form>
	</div>
<?php endforeach; ?>


