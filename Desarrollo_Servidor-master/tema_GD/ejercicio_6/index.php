<?php

header("Content-Type: image/png");

$img = imagecreatetruecolor(500, 500);
//colores
$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);
$blue = imagecolorallocate($img, 0, 0, 255);
$green = imagecolorallocate($img, 0, 255, 0);

//fondo
imagefill($img, 0, 0, $white);

imagefilledarc($img, 250, 250, 200, 200, 0, 20, $white, IMG_ARC_PIE);
imagefilledarc($img, 250, 250, 200, 200, 20, 60, $red, IMG_ARC_PIE);
imagefilledarc($img, 250, 250, 200, 200, 60, 200, $blue, IMG_ARC_PIE);
imagefilledarc($img, 250, 250, 200, 200, 200, 360, $green, IMG_ARC_PIE);

imageellipse($img, 250, 250, 200, 200, $black);



imagepng($img);

?>