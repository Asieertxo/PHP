<?php

header("Content-Type: image/png");

$img = imagecreatetruecolor(500, 500);
//colores
$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);
$blue = imagecolorallocate($img, 0, 0, 255);
//fondo
imagefill($img, 0, 0, $white);
//estructura
imagefilledrectangle($img, 150, 200, 350, 350, $white);
imagerectangle($img, 150, 200, 350, 350, $black);
//puerta
imagefilledrectangle($img, 220, 270, 280, 350, $red);
imagerectangle($img, 220, 270, 280, 350, $black);
imageline($img, 250, 270, 250, 350, $black);
//ventana
imagefilledrectangle($img, 170, 220, 210, 260, $blue);
imagerectangle($img, 170, 220, 210, 260, $black);
imageline($img, 170, 240, 210, 240, $white);
imageline($img, 190, 220, 190, 260, $white);
//tejado
$points = [350, 200, 250, 120, 150, 200];
imagefilledpolygon($img, $points, count($points)/2, $red);
imagepolygon($img, $points, count($points)/2, $black);
//ventana circular



imagepng($img);

?>