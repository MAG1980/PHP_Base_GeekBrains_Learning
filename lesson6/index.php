<?php
include "operations.php";
$arg1 = 0;
$arg2 = 0;
$operation = '';
$result = 0;
$errors = [];
$errors_decode = [
	1 => 'Первый аргумент не является числом',
	2 => 'Второй аргумент не является числом',
	3 => 'Деление на ноль'
];

if (!empty($_GET)) {
	if (empty($_GET['errors'])) {
		$operation = $_GET['operation'];
		$arg1 = $_GET['arg1'];
		$arg2 = $_GET['arg2'];

		if (is_numeric($arg1)) {
		} else {
			$arg1 = 'Введите число!';
			$errors[] = 1;
		};

		if (is_numeric($arg2)) {
		} else {
			$arg2 = 'Введите число!';
			$errors[] = 2;
		};

		if ($arg2 == 0 && $operation === 'div') {
			$arg2 = 'Деление на 0!';
			$errors[] = 3;
		}

		if (empty($errors)) {
			$result = @mathOperation($arg1, $arg2, $operation);
		} else {

			$result = 'Ошибка в исходных данных!';
			header('Location: ?errors=' . json_encode($errors) . '&' . 'arg1=' . $arg1 . '&' . 'arg2=' . $arg2
				. '&' . 'operation=' . $operation . '&' . 'result=' . $result);
			die();
		}
	} else {
		$operation = $_GET['operation'];
		$arg1 = $_GET['arg1'];
		$arg2 = $_GET['arg2'];
		$result = $_GET['result'];
	}

}
//$result = ($_GET ?? false) ? mathOperation($_GET['arg1'], $_GET['arg2'], $_GET['operation']) : '';
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Calculator</title>
</head>
<body>
<?php
if (!empty($_GET['errors'])) { ?>
	<h3>Обнаружены ошибки!</h3>
	<?php
	$errors_encode = json_decode($_GET['errors']);
	foreach ($errors_encode as $error) {
		echo $errors_decode[$error] . "<br>";
	}
} ?>
<!-- Преднамеренное нарушение принципа идемпотентности для наглядности в строке браузера-->
<form action="" method="get">
	<input type="text" name="arg1" value="<?= $arg1 ?>">
	<select name="operation" value="<?= $_GET['operation'] ?>">
		<option value="summ" <?= $_GET['operation'] === "summ" ? 'selected' : '' ?> >+</option>
		<option value="substr" <?= $_GET['operation'] === "substr" ? 'selected' : '' ?> >-</option>
		<option value="mul" <?= $_GET['operation'] === "mul" ? 'selected' : '' ?> >*</option>
		<option value="div" <?= $_GET['operation'] === "div" ? 'selected' : '' ?> >/</option>
	</select>
	<input type="text" name="arg2" value="<?= $arg2 ?>">
	<input type="submit" value="=">
	<input type="text" name="result" value="<?= $result ?>" readonly>
</form>
</body>
</html>
