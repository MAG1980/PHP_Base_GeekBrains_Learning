<?php
if ( !empty ( $_FILES ) ) {
	$path = $_SERVER[ 'DOCUMENT_ROOT' ] . '/upload/' . $_FILES[ 'myfile' ][ 'name' ];
	var_dump( $path );
	if ( move_uploaded_file( $_FILES[ 'myfile' ][ 'tmp_name' ], $path ) ) {
		$message = 'Файл загружен!';

	} else {
		$message = 'Ошибка загрузки!';
	};

	header( "Location: index.php?message=$message" ); // Location позволяет осуществить редирект на указанную страницу
	//Использую query параметр ?message для передачи значения $message на страницу редиректа
	die();
}
$message = $_GET[ 'message' ];
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

<form method="post" enctype="multipart/form-data" action="index.php">
	<input type="file" name="myfile">
	<input type="submit" value="Отправить файл">
</form>
<p>
	<?= $message ?>
</p>
</body>
</html>