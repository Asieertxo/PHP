<?php

header("Content-Type: image/png");

$img = imagecreatetruecolor(700, 700);

$blanco = imagecolorallocate($img, 255, 255, 255);
$negro = imagecolorallocate($img, 0, 0, 0);
$verde = imagecolorallocate($img, 0, 255, 0);
$rojo = imagecolorallocate($img, 255, 0, 0);
$azul = imagecolorallocate($img, 0, 0, 255);


//nos crea la imagen de fondo
imagefill($img, 0, 0, $blanco);

//base principal de la casa
imagefilledrectangle($img, 200, 600, 500, 300, $rojo);

//tejado de la casa
$puntos = array(500, 300, 200, 300, 350, 100);
imagefilledpolygon($img, $puntos, 3, $verde);

//ventanas y puerta
imagerectangle($img, 250, 400, 300, 350, $negro);
imagerectangle($img, 450, 400, 400, 350, $negro);
imagerectangle($img, 375, 600, 325, 500, $negro);

//ventana del tejado
imagefilledellipse($img, 350, 225, 50, 50, $azul);

//chimenea
$puntos = array(425, 200, 400, 165, 400, 100, 425, 100);
imagefilledpolygon($img, $puntos, 4, $azul);

//humo
imagefilledarc($img, 443, 75, 100, 100, 150, -120, $negro, IMG_ARC_NOFILL);
imagefilledarc($img, 443, 25, 100, 100, 150, -120, $negro, IMG_ARC_NOFILL);
imagefilledarc($img, 434, 51, 100, 100, 20, 100, $negro, IMG_ARC_NOFILL);
imagefilledarc($img, 492, 30, 200, 100, 10, 100, $negro, IMG_ARC_NOFILL);
imagefilledarc($img, 593, -10, 80, 110, 10, 100, $negro, IMG_ARC_NOFILL);

imagepng($img);
imagedestroy($img);

?>