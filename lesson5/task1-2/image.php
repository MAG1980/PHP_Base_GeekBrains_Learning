<?php
include_once 'db.php';

$id = (int)$_GET[ 'id' ];
$result_img = mysqli_query( $db, "SELECT * FROM images WHERE id={$id}" );

if ($result_img -> num_rows !== 0) {
	$image = mysqli_fetch_assoc( $result_img );
	mysqli_query( $db, "UPDATE images  SET views = views + 1 WHERE id = {$id}" );
} else {
	header( 'Location: /404.php' );
	die( 'Error' );
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/css/styles.css">
	<title>Document</title>
</head>
<body>
<section class="container">
	<div class="card">
		<h1>Название файла: <?= $image[ 'name' ] ?></h1>
		<img src="<?= $image[ 'path_to_big' ] . $image[ 'name' ] ?>"><?= $image[ 'name' ] ?></img>
		<p>Количество просмотров: <?= $image[ 'views' ] ?></p>
	</div>
</section>
</body>
</html>
