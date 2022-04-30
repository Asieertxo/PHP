<?php

$radio = $_GET['radio'];

header("Content-Type: image/png");

$img = imagecreatetruecolor($radio*2+1, $radio*2+1);

$blanco = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);

imagefill($img, 0, 0, $blanco);

imagefilledellipse($img, $radio, $radio, $radio, $radio, $red);

imagepng($img);

?>