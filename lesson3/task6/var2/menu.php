<?php
$menu =
	[ 'Главная' => '/link1',
		'Каталог' =>
			[
				'Яблоко' => '../img/apple.jpg',
				'Пицца' => '../img/pizza.jpg',
				'Чай' => '../img/tea.jpg',
			],
		'Галерея работ' =>
			[
				'Работа 1' => '/work1',
				'Работа 2' => '/work2',
				'Работа 3' => '/work3',
			],
		'Контакты' => '/link4',
		'О нас' => '/link5',
	]
?>
<a href="/">Главная</a>
<a href="/?page=catalog">Каталог</a>
<a href="/?page=about">О нас</a><br>
