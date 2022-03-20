<?php
include_once 'db.php';

$id = (int)$_GET[ 'id' ];
$result = mysqli_query( $db, "SELECT * FROM news WHERE id={$id}" );

if ($result -> num_rows !== 0) {
	$article = mysqli_fetch_assoc( $result );
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
	<title>Document</title>
</head>
<body>
<h1><?= $article[ 'title' ] ?></h1>
<p><?= $article[ 'content' ] ?></p>
</body>
</html>
