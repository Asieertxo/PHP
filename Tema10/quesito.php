<?php

header("Content-Type: image/png");

$img = imagecreatetruecolor(800, 800);

$blanco = imagecolorallocate($img, 255, 255, 255);
$negro = imagecolorallocate($img, 0, 0, 0);
$verde = imagecolorallocate($img, 0, 255, 0);
$rojo = imagecolorallocate($img, 255, 0, 0);
$azul = imagecolorallocate($img, 0, 0, 255);
$amarillo = imagecolorallocate($img, 0, 255, 255);


//nos crea la imagen de fondo
imagefill($img, 0, 0, $blanco);

//quesitos
imagefilledarc($img, 400, 400, 200, 200, 0, 40, $negro, IMG_ARC_PIE);
imagefilledarc($img, 400, 400, 200, 200, 40, 100, $verde, IMG_ARC_PIE);
imagefilledarc($img, 400, 400, 200, 200, 100, 200, $azul, IMG_ARC_PIE);
imagefilledarc($img, 400, 400, 200, 200, 200, 260, $rojo, IMG_ARC_PIE);
imagefilledarc($img, 400, 400, 200, 200, 260, 360, $amarillo, IMG_ARC_PIE);


imagepng($img);
imagedestroy($img);

?>