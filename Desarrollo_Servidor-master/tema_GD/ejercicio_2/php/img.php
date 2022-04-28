<?php

$img = imagecreatetruecolor(200, 200);

$blanco = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);


$rgb = str_split(substr($_POST['user_color'], 1), 2);
//$rgb = array_map("hexdec", $rgb);
$r = hexdec($rgb[0]);
$g = hexdec($rgb[1]);
$b = hexdec($rgb[2]);

$user_color = imagecolorallocate($img, $r, $g, $b);

imagefill($img, 0, 0, $blanco);

imagefilledrectangle($img, 50, 50, 150, 150, $user_color);

imagerectangle($img, 50, 50, 150, 150, $black);

//header("Content-Type: image/png");
$file = "../img/img.png";
imagepng($img, $file);

//imagegd($img, "img/img.png");

header("Location: ..?image=true");

?>