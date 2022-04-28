<?php

header("Content-Type: image/png");

$img = imagecreatetruecolor(300, 200);


//colores
$blanco = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);

//lienzo
imagefill($img, 0, 0, $blanco);

//caja
imagefilledrectangle($img, 50, 50, 250, 150, $blanco);
imagerectangle($img, 50, 50, 250, 150, $black);

//Texto
//horizontal
$text = "horizontal";
imagestring($img, 4, 100, 100, $text, $black);

//vertical
$vertical = "vertical";
imagestringup($img, 3, 210, 130, $vertical, $red);

//True Type font
$trueTypeFont = "trueTypeFont";
$fontPath = __DIR__ . "/fonts/Hanged Letters.ttf";
imagettftext($img, 20, 10, 100, 40, $black, $fontPath, $trueTypeFont);

imagepng($img);

?>