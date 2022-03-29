<?php

function doCartAction($action, $session_id, $goods_id)
{

    if ($action == "get") {
        $result = getCart($session_id);
    }

    if ($action == "delete") {
        deleteCartRow($session_id, $goods_id);
        header("Location: /cart/get");
        die();
    }
    return $result;
}

function getCart($session_id)
{
    $sql = "SELECT cart.goods_id, COUNT(*) as number, COUNT(*) * goods.price as full_price, cart.session_id, goods.name AS good_name, goods.image AS good_image, goods.description AS good_description, goods.price AS good_price FROM cart  INNER JOIN goods ON cart.goods_id = goods.id WHERE cart.session_id = '{$session_id}' GROUP BY cart.goods_id";
//    $sql = "SELECT id, goods_id, number FROM cart WHERE session_id='{$session_id}'";
    return getAssocResult($sql);
//    header("Location:/cart/?status=ok");
//    header("Location:/cart/");
}

function deleteCartRow($session_id, $goods_id)
{

    $goods_id = secureRequestPrepare($goods_id);
    $sql = "DELETE FROM cart WHERE session_id ='{$session_id}' AND goods_id = '{$goods_id}'";
    executeSql($sql);
}

function getCartMessage($status)
{
    $messages = [
        'ok' => 'Товар добавлен в корзину',
        'error' => 'Такого товара в каталоге не существует!'
    ];
    return $messages[$status];
}

