<?php
$h1 = "Информация обо мне";
$year = 2018;
$img = 'plane';

$content = file_get_contents("./site.html");

$content = str_replace("{{ h1 }}", $h1, $content);
$content = str_replace("{{ year }}", $year, $content);
$content = str_replace("{{ img }}", $img, $content);


echo $content;