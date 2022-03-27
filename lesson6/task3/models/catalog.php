<?php
function getCatalog()
{
    return getAssocResult("SELECT * FROM goods");
}

function getGatalogItem($id)
{
    return getOneResult("SELECT * FROM goods WHERE id={$id}");
}