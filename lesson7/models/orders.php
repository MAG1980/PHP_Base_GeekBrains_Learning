<?php
function doOrdersAction($action, $id)
{
    switch ($action){
        case 'more':
            return getOneOrder($id);

        default:
            break;
    }

}

function getOrders()
{
//    $sql = 'SELECT orders.id, orders.customer_name AS customer, orders.phone_number AS phone, cart.session_id AS cart, cart
//.goods_id FROM orders LEFT JOIN cart ON cart.session_id = orders.cart_session';

    $sql = 'SELECT * FROM orders';
    return getAssocResult($sql);

}

function getOneOrder($id)
{
    $sql = "SELECT * FROM cart,orders WHERE cart.session_id=orders.cart_session AND orders.id='{$id}' ";

    $sql = "SELECT cart.goods_id, COUNT(*) as number, COUNT(*) * goods.price as full_price, cart.session_id, goods.name AS good_name, goods.image AS good_image, goods.description AS good_description, goods.price AS good_price FROM cart  INNER JOIN goods ON cart.goods_id = goods.id WHERE cart.session_id = '{$id}' GROUP BY cart.goods_id";

    return getAssocResult($sql);
}