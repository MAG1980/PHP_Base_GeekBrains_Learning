<?php
$menu = [
	[
		'url' => '/link1',
		'name' => 'Главная' ],
	[
		'url' => '/catalog',
		'name' => "Каталог",
		'submenu' => [
			[
				'url' => '../img/apple.jpg',
				'name' => 'Яблоко'
			],
			[
				'url' => '../img/pizza.jpg',
				'name' => 'Пицца'
			],
			[
				'url' => '../img/tea.jpg',
				'name' => 'Чай'
			],
		]
	],
	[
		'url' => '/gallery',
		'name' => 'Галерея работ',
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
		'url' => '/link5',
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
//		if ( is_array( $menuItem[ 'submenu' ] ) ) {
//			$menuItemSubMenu = '<ul>' . renderMenu( $menuItem[ 'submenu' ] ) . '</ul>';
//		} else {
//			$menuItemSubMenu = '';
//		}
//		if ( isset( $menuItem[ 'url' ] ) ) {
//			$menuItemLink = '<a href=' . $menuItem[ 'url' ] . ' "> ' . $menuItem[ 'name' ] . '</a>';
//		} else {
//			$menuItemLink = '';
//		}
		$menuItemTemplate = '<li>' . $menuItemLink . $menuItemSubMenu . '</li>';

		$menuTemplate .= $menuItemTemplate;
	}
	return $menuTemplate;
}

?>

<ul>
	<?= renderMenu( $menu ) ?>
</ul>


