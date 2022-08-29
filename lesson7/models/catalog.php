<?php
function getCatalog()
{
    return getAssocResult("SELECT * FROM goods");
}

function getGatalogItem($id)
{
    return getOneResult("SELECT * FROM goods WHERE id={$id}");
}

function getCatalogMessage($status)
{
    $messages = [
        'ok' => 'Товар добавлен в корзину!',
        'error' => 'Такого товара в каталоге не существует!'
    ];
    return $messages[$status];
}