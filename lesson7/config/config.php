<?php
//TODO сделать пути абсолютными
define("ROOT", dirname(__DIR__));
define("IMG_BIG", $_SERVER['DOCUMENT_ROOT'] . "/gallery_img/big/");
define("IMG_SMALL", $_SERVER['DOCUMENT_ROOT'] . "/gallery_img/small/");
define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', 'localhost:3307');
define('USER', 'root');
define('PASS', '');
define('DB', 'shop');

include ROOT . "/engine/render.php";
include ROOT . "/engine/controller.php";
include ROOT . "/engine/db.php";
include ROOT . "/models/log.php";
include ROOT . "/models/feedback.php";
include ROOT . "/models/gallery.php";
include ROOT . "/models/news.php";
include ROOT . "/models/catalog.php";
include ROOT . "/models/catalog_item.php";
include ROOT . "/models/cart.php";
include ROOT . "/models/classSimpleImage.php";
include ROOT . "/models/auth.php";
include ROOT . "/models/registration.php";