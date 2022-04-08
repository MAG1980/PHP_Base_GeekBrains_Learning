<?php
//TODO сделать пути абсолютными
define( "ROOT", dirname( __DIR__ ) );
define( "IMG_BIG", $_SERVER[ 'DOCUMENT_ROOT' ] . "/gallery_img/big/" );
define( "IMG_SMALL", $_SERVER[ 'DOCUMENT_ROOT' ] . "/gallery_img/small/" );
define( 'TEMPLATES_DIR', ROOT . '/templates/' );
define( 'LAYOUTS_DIR', 'layouts/' );

/* DB config */
define( 'HOST', 'localhost:3307' );
define( 'USER', 'test' );
define( 'PASS', '12345' );
define( 'DB', 'lesson5' );

include ROOT . "/engine/functions.php";
include ROOT . "/engine/db.php";
include ROOT . "/engine/log.php";
include ROOT . "/engine/gallery.php";
include ROOT . "/engine/news.php";
include ROOT . "/engine/install.php";
include ROOT . "/engine/classSimpleImage.php";