<?php
$title = renderTemplate( "title" );
$menu = renderTemplate( "menu" );
$content = renderTemplate( "content" );
$about = renderTemplate( "about", _, _, "8-800-111-33-55" );

echo renderTemplate( "layout", $title, $menu, $content, $about );

function renderTemplate( $page, $title = '', $menu = '', $content = '', $about = '' )
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

