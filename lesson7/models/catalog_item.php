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
    $id = secureRequestPrepare($_POST['id']);
    $sql = "INSERT INTO cart (session_id, goods_id) VALUES ('{$session_id}', '{$id}')";
    var_dump($sql);
    executeSql($sql);
    header("Location:/catalog_item/?id={$id}&status=ok");
}

function getCatalogItemMessage($status)
{
    $messages = [
        'ok' => 'Товар добавлен в корзину!',
        'error' => 'Такого товара в каталоге не существует!'
    ];
    return $messages[$status];
}