<?php
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');

$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$params = [];

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        break;

    case 'catalog':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog();
        break;

    case 'about':
        $params['title'] = 'about';
        $params['phone'] = 444333;
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();

    default:
        echo "404";
        die();
}

echo render($page, $params);


function getCatalog() {
    return [
        [
            'name' => 'Яблоко',
            'price' => 24,
            'image' => 'apple.jpg'
        ],
        [
            'name' => 'Пицца',
            'price' => 1,
            'image' => 'pizza.jpeg'
        ],
        [
            'name' => 'Чай',
            'price' => 12,
            'image' => 'tea.png'
        ],
    ];
}



function render($page, $params = []) {
    return renderTemplate(LAYOUTS_DIR . 'main', [
        'title' => $params['title'],
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}


//$params = ['menu' => 'код меню', 'catalog' => ['чай'], 'content' => 'Код подшаблона']
function renderTemplate($page, $params = []) {

    /*    foreach ($params as $key => $value) {
            $$key = $value;
        }*/
    extract($params);

    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}