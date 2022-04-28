<?php

header("Content-Type: image/png");

$img = imagecreatetruecolor(200, 200);

$blanco = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);

imagefill($img, 0, 0, $blanco);

imagefilledrectangle($img, 0, 50, 150, 150, $red);

imagerectangle($img, 50, 50, 150, 150, $black);

imagepng($img);

?>