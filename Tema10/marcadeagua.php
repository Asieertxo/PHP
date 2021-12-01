<?php

$marca_agua = imagecreatefromjpeg()



// Cargar la estampa y la foto para aplicarle la marca de agua
$img = imagecreatefromjpeg('./marcadeagua.jpg');

$estampa = imagecreatetruecolor(100, 70);
imagefilledrectangle($estampa, 0, 0, 99, 69, 0x0000FF);
imagefilledrectangle($estampa, 9, 9, 90, 60, 0xFFFFFF);
$img = imagecreatefromjpeg('./marcadeagua.jpg');
imagestring($estampa, 5, 20, 20, 'libGD', 0x0000F);
imagestring($estampa, 3, 20, 40, '(c) 2007-9', 0x0000FF);

$margen_dcho = 10;
$margen_inf = 10;

$sx = imagesx($estampa);
$sy = imagesy($estampa);

imagecopymerge($img, $estampa, imagesx($img) - $sx - $margen_dcho, imagesy($img) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa), 50);

imagepng($img, 'foto_estampa.png');
imagedestroy($img);


?>