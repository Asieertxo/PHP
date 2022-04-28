<?php

header("Content-Type: image/png");

$img = imagecreatetruecolor(16, 16);

$blanco = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);

imagefill($img, 0, 0, $blanco);

imagefilledrectangle($img, 0, 0, 15, 15, $red);

imagerectangle($img, 0, 0, 15, 15, $black);

imagepng($img);

?>