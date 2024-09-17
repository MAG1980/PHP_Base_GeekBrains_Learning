<?php
$menu = renderTemplate( "menu" );

echo renderTemplate( "layout", $menu );

function renderTemplate( $page, $menu = '', $title = '', $content = '', $about = '' )
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

?>


