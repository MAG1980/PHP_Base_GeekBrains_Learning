<?php
$db = mysqli_connect('localhost:3307', 'root', '', 'shop');

$messages = [
	'ok' => 'Сообщение добавлено',
	'delete' => 'Сообщение удалено',
	'edit' => 'Сообщение изменено',
	'error' => 'Ошибка'
];
$buttonText = "Добавить";
$action = "add";
$row = [];

if ($_GET['action'] == 'add') {
	$name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
	$feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
	$sql = "INSERT INTO feedback(name, feedback) VALUES ('{$name}','{$feedback}')";
	mysqli_query($db, $sql);
	header('Location: /?message=ok');
	die();
}


if ($_GET['action'] == 'edit') {
	$id = (int)$_GET['id'];
	$result = mysqli_query($db, "SELECT * FROM feedback WHERE id = {$id}");
	if ($result) $row = mysqli_fetch_assoc($result);
	$buttonText = "Править";
	$action = "save";
}

if ($_GET['action'] == 'save') {
	$id = (int)$_POST['id'];
	$name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
	$feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
	$sql = "UPDATE feedback SET name='{$name}', feedback='{$feedback}' WHERE id = {$id}";
	mysqli_query($db, $sql);

	header('Location: /?message=edit');
	die();
}

if ($_GET['action'] == 'delete') {
	$id = (int)$_GET['id'];
	$sql = "DELETE from feedback  WHERE id = {$id}";
	mysqli_query($db, $sql);
	header('Location: /');
	die();
}

$feedbacks = mysqli_query($db, "SELECT * FROM feedback ORDER BY id DESC");

if (isset($_GET['message'])) {
	$message = $messages[$_GET['message']];
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h2>Отзывы</h2>
<?= $message ?><br>
<form action="index.php?action=<?= $action ?>" method="post">
	<input type="text" hidden name="id" value="<?= $row['id'] ?>">
	<input type="text" name="name" placeholder="Ваше имя" value="<?= $row['name'] ?>"><br>
	<input type="text" name="feedback" placeholder="Ваш отзыв" value="<?= $row['feedback'] ?>"><br>
	<input type="submit" value="<?= $buttonText ?>">
</form>
<hr>
<?php foreach ($feedbacks as $feedback): ?>
	<b><?= $feedback['name'] ?> :</b>
	<?= $feedback['feedback'] ?>
	<a href="index.php?action=edit&id=<?= $feedback['id'] ?>">[edit]</a>
	<a href="index.php?action=delete&id=<?= $feedback['id'] ?>">[X]</a><br>
<?php endforeach; ?>
</body>
</html>
