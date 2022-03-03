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
	];

function renderMenu( array $menu )
{
	$menuTemplate = '';
	foreach ( $menu as $menuItem => $menuLink ) {
		if ( is_array( $menuLink ) ) {
			$item = '<li>' . $menuItem . '<ul>' . renderMenu( $menuLink ) . '</ul></li>';
		} else {
			$item = '<li><a href="' . $menuLink . '">' . $menuItem . '</a></li>';
		}
		$menuTemplate .= $item;
	}
	return $menuTemplate;
}

?>

<ul>
	<?= renderMenu( $menu ) ?>
</ul>

<ul>
	<?php foreach ( $menu as $menuItem => $menuLink ): ?>

		<li><a href="<?= $menuLink ?>"><?= $menuItem ?></a></li>

	<?php endforeach; ?>
</ul>
