<?php
function addToCart($session_id)
{
    $id = secureRequestPrepare($_POST['id']);
    $sql = "INSERT INTO cart (session_id, goods_id) VALUES ('{$session_id}', '{$id}')";
    var_dump($sql);
    executeSql($sql);
    header("Location:/catalog_item/?id={$id}&status=ok");
}

function getCartMessage($status)
{
    $messages = [
        'ok' => 'Товар добавлен в корзину',
        'delete' => 'Сообщение удалено',
        'edit' => 'Сообщение изменено',
        'error' => 'Такого товара в каталоге не существует!'
    ];
    return $messages[$status];
}