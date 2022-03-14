<?php
define( 'TEMPLATES_DIR', '../templates/' );
define( 'LAYOUTS_DIR', 'layouts/' );
define( 'ROOT', $_SERVER[ 'DOCUMENT_ROOT' ] );
define( 'GALLERY_SMALL_PATH', ROOT . '/img/gallery/small/' );
define( 'GALLERY_BIG_PATH', ROOT . '/img/gallery/big/' );
$smallImagesPath = '/img/gallery/small/';

include "../engine/bux.php";
include "../engine/functions.php";
include "../engine/catalog.php";
include "../engine/gallery.php";
include "../engine/log.php";
include '../libs/classSimpleImage.php';