<h2>Отзывы</h2>
<?= $message ?>
<form action="/feedback/add/" method="post">
	Оставьте отзыв: <br>
	<input type="text" name="name" placeholder="Ваше имя"><br>
	<input type="textarea" name="text" placeholder="Ваш отзыв"><br>
	<input type="submit" value="Добавить">
</form>

<?php foreach ($feedbacks as $item): ?>
	<div><strong><?= $item['name'] ?></strong>: <?= $item['text'] ?></div>
<?php endforeach; ?>


