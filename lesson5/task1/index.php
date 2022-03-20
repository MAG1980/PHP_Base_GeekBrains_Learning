<?php
include_once 'db.php';
$result = mysqli_query( $db, "SELECT * FROM news WHERE id>0" );
if ($_GET[ 'action' ] === 'delete') {
	$id = (int)$_GET [ 'id' ];
	$result = mysqli_query( $db, "DELETE  FROM news WHERE id={$id}" );
	header( "Location: /" ); //редирект нужен для очистки строки адреса браузера
	die();                         //для корректной работы скрипта
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>

<!--	Вариант 1-->
<?php //while ($row = mysqli_fetch_assoc( $result )): ?>
<!--	<a href="/?id=--><? //= $row[ 'id' ] ?><!--"><h3>--><? //= $row[ 'title' ] ?><!-- </h3></a>-->
<!---->
<!--	<p>--><? //= $row[ 'content' ] ?><!--</p>-->
<!--	<hr>-->
<?php //endwhile ?>

<!--	Вариант 2-->
<? // foreach ($result as $row): ?>
<!--	<a href="/?id=--><? //= $row[ 'id' ] ?><!--"><h3>--><? //= $row[ 'title' ] ?><!-- </h3></a>-->
<!--	<p>--><? //= $row[ 'content' ] ?><!--</p>-->
<!--	<hr>-->
<? // endforeach ?>

<!--	Вариант 3-->
<?php
if ($result -> num_rows !== 0):
	while ($row = mysqli_fetch_assoc( $result )): ?>
		<a href="/news.php?id=<?= $row[ 'id' ] ?>"><h3><?= $row[ 'title' ] ?></h3></a>
		<a href="/?id=<?= $row[ 'id' ] ?>&action=delete">x</a>
		<hr>
	<?php endwhile; ?>
<?php else : ?>
	<p>Ошибка</p>
<? endif ?>


</body>
</html>
