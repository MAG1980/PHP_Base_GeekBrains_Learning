<?php
$menu =
	[ 'Главная' => '/',
		'Каталог' =>
			[
				'Яблоко' => '../img/apple.jpg',
				'Пицца' => '../img/pizza.jpeg',
				'Чай' => '../img/tea.png',
			],
		'Галерея работ' =>
			[
				'Работа 1' => '/work1',
				'Работа 2' => '/work2',
				'Работа 3' => '/work3',
			],
		'Контакты' => '/link4',
		'О нас' => '/?page=about',
	];
function renderMenu( array $menu )
{
	$menuTemplate = '';
	foreach ( $menu as $menuItem => $menuLink ) {
		if ( is_array( $menuLink ) ) {
			$item = '
<li>' . $menuItem . '
	<ul>' . renderMenu( $menuLink ) . '</ul>
</li>';
		} else {
			$item = '
<li><a href="' . $menuLink . '">' . $menuItem . '</a></li>';
		}
		$menuTemplate .= $item;
	}
	return $menuTemplate;
}

?>

<ul class="menu_nav">
	<?= renderMenu( $menu ) ?>
</ul>



