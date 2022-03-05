<?php
$menu = [
	[
		'url' => '/',
		'name' => 'Главная'
	],
	[
		'url' => '/?page=catalog',
		'name' => 'Каталог',
		'submenu' => [
			[
				'url' => '../img/apple.jpg',
				'name' => 'Яблоко'
			],
			[
				'url' => '../img/pizza.jpeg',
				'name' => 'Пицца'
			],
			[
				'url' => '../img/tea.png',
				'name' => 'Чай'
			],
		]
	],
	[
		'url' => '/work',
		'name' => 'Наши работы',
		'submenu' => [
			[
				'url' => '/work1',
				'name' => 'Работа 1',
			],
			[
				'url' => '/work2',
				'name' => 'Работа 2',
			],
			[
				'url' => '/work3',
				'name' => 'Работа 3',
			]
		]
	],
	[
		'url' => '/link4',
		'name' => 'Контакты'
	],
	[
		'url' => '/?page=about',
		'name' => 'О нас'
	]
];

function renderMenu( array $menu )
{
	$menuTemplate = '';
	foreach ( $menu as $menuItem ) {
		$subMenu = '';
		$menuItemSubMenu = is_array( $menuItem[ 'submenu' ] ) ? '<ul>' . renderMenu( $menuItem[ 'submenu' ] ) . '</ul>' : '';
		$menuItemLink = isset( $menuItem[ 'url' ] ) ? '<a href=' . $menuItem[ 'url' ] . ' "> ' . $menuItem[ 'name' ] . '</a>' : '';

		$menuItemTemplate = '<li>' . $menuItemLink . $menuItemSubMenu . '</li>';

		$menuTemplate .= $menuItemTemplate;
	}
	return $menuTemplate;
}

?>

<ul class="menu_nav">
	<?= renderMenu( $menu ) ?>
</ul>



