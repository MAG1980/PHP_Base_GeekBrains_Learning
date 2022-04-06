<?php

function doCartAction($action, $session_id, $goods_id, $customer_name = '', $phone_number = '', $goods_count = '')
{

    if ($action == "get") {
        $result = getCart($session_id);
    }

    if ($action == "delete") {
        $_SESSION['cartCounter'] -= (int)$goods_count;
        deleteCartRow($session_id, $goods_id);
        header("Location: /cart/get/?message=delete-ok");
        die();
    }

    if ($action == "checkout") {
        $login = getUserLogin();
        cartCheckout($session_id, $customer_name, $phone_number, $login);
        $_SESSION['cartCounter'] = 0;
        session_regenerate_id();
        header("Location: /cart/get/?message=order-ok");
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

function cartCheckout($session_id, $customer_name, $phone_number, $login)
{
    $sql = "INSERT INTO orders (cart_session, customer_name, phone_number, login) VALUES ('{$session_id}', '{$customer_name}', '{$phone_number}', '{$login}') ";
    executeSql($sql);
}

function getCartMessage($status)
{
    $messages = [
        'order-ok' => 'Заказ успешно оформлен!',
        'delete-ok' => 'Товар удалён из заказа!'
    ];
    return $messages[$status];
}

