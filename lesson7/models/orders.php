<?php
function getOrders()
{
    $sql = 'SELECT orders.id, orders.customer_name AS customer, orders.phone_number AS phone, cart.session_id AS cart, cart
.goods_id FROM orders LEFT JOIN cart ON cart.session_id = orders.cart_session';
    return getAssocResult($sql);
}
