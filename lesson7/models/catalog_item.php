<?php
function doCatalogItemAction($action, $session_id)
{
    if ($action == "add_to_cart") {
        addItemToCart($session_id);
        die();
    }
}

function addItemToCart($session_id)
{
    $_SESSION['cartCounter'] += 1;
    $id = secureRequestPrepare($_POST['id']);
    $sql = "INSERT INTO cart (session_id, goods_id) VALUES ('{$session_id}', '{$id}')";
    executeSql($sql);
    $status = !empty($_GET) ? "" : "/?id={$id}&status=ok";
    header('Location:' . $_SERVER['HTTP_REFERER'] . $status);
    die();
}

function getCatalogItemMessage($status)
{
    $messages = [
        'ok' => 'Товар добавлен в корзину!',
        'error' => 'Такого товара в каталоге не существует!'
    ];
    return $messages[$status];
}