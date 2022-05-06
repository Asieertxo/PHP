<?php

$base = $_GET['base'];
$altura = $_GET['altura'];
$color = $_GET['color'];
$rgb = hexArgb($color);

function hexArgb($hex){
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    return [$r, $g, $b];
}

header("Content-Type: image/png");

$img = imagecreatetruecolor($base+1, $altura+1);

$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);

imagefill($img, 0, 0, $white);

imagefilledrectangle($img, 0, 0, $base, $altura, $red);

imagerectangle($img, 0, 0, $base, $altura, $red);

imagepng($img);

?>