<?php
function getCatalogItemMessage($status)
{
    $messages = [
        'ok' => 'Товар добавлен в корзину!',
        'delete' => 'Сообщение удалено',
        'edit' => 'Сообщение изменено',
        'error' => 'Такого товара в каталоге не существует!'
    ];
    return $messages[$status];
}