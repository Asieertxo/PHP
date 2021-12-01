<?php

header("Content-Type: image/png");

$img = imagecreatetruecolor(600, 300);

$blanco = imagecolorallocate($img, 255, 255, 255);
$negro = imagecolorallocate($img, 0, 0, 0);
$verde = imagecolorallocate($img, 0, 255, 0);
$rojo = imagecolorallocate($img, 255, 0, 0);
$azul = imagecolorallocate($img, 0, 0, 255);


//nos crea la imagen de fondo
imagefill($img, 0, 0, $blanco);

//caja
imagefilledrectangle($img, 50, 50, 250, 150, $blanco);

//Texto
$texto = "Horizontal";
imagestring($img, 5, 60, 70, $texto, $negro);

$texto = "Vertical";
imagestringup($img, 5, 550, 230, $texto, $azul);

$texto = "OpenSans";
$ttf = __DIR__ . './ttf/OpenSans.ttf';
imagettftext($img, 20, 30, 400, 100, $rojo, $ttf, $texto);

$texto = "grasping";
$ttf = __DIR__ . './ttf/grasping.ttf';
imagettftext($img, 30, -30, 250,150, $negro, $ttf, $texto);

$texto = "sewer";
$ttf = __DIR__ . './ttf/sewer.ttf';
imagettftext($img, 40, 30, 50,250, $azul, $ttf, $texto);

imagepng($img);
imagedestroy($img);

?>