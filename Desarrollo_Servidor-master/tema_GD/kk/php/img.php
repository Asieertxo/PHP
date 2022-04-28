<?php

header("Content-Type: image/png");

$img = imagecreatetruecolor(200, 200);

//Colors
$blanco = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);

/*$rgb = str_split(substr($new_color, 1), 2);
//$rgb = str_split(substr($_GET['color'], 1), 2);
//$rgb = array_map("hexdec", $rgb);
$r = hexdec($rgb[0]);
$g = hexdec($rgb[1]);
$b = hexdec($rgb[2]);*/

$user_color = imagecolorallocate($img, 100, 200, 100);

//Background
imagefill($img, 0, 0, $blanco);

//Square
imagefilledrectangle($img, 50, 50, 150, 150, $user_color);
imagerectangle($img, 50, 50, 150, 150, $black);



imagepng($img);

?>