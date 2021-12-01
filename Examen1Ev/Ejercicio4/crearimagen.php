<?php

header("Content-Type: image/png");

$img = imagecreatetruecolor(600, 300);

$blanco = imagecolorallocate($img, 255, 255, 255);
$negro = imagecolorallocate($img, 0, 0, 0);


//nos crea la imagen de fondo
imagefill($img, 0, 0, $blanco);

//caja
imagefilledrectangle($img, 50, 50, 250, 150, $blanco);

//Texto
$nombre = $_GET['nombre'];
imagestring($img, 5, 60, 70, $nombre, $negro);

imagepng($img, "./img/$nombre.png");

?>