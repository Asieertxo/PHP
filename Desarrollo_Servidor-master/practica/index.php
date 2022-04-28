<?php
/*
$array = scandir("fonts");
var_dump($array);

var_dump(array_slice($array, 2));

var_dump(file("./text.txt"));
*/

$width = 200;
$height = 200;

$img = imagecreatetruecolor($width, $height);

$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);

imagefill($img, 0, 0, $white);

$text = file_get_contents("./text.txt");
$font = __DIR__ . "/fonts/Hanged Letters.ttf";

imagettftext($img, 20, 0, 40, 20, $black, $font, $text);

header("Content-type: image/png");
imagepng($img);

?>