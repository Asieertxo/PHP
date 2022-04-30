<?php

$base = $_GET['base'];
$altura = $_GET['altura'];

header("Content-Type: image/png");

$img = imagecreatetruecolor($base+1, $altura+1);

$blanco = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);

imagefill($img, 0, 0, $blanco);

$puntos = array(0, 0, 0, $altura, $base, $altura);
imagefilledpolygon($img, $puntos, 3, $red);

imagepng($img);

?>