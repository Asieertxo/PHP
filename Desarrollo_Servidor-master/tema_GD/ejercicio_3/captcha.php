<?php

header("Content-Type: image/png");

$width = 200;
$height = 100;
$img = imagecreatetruecolor($width, $height);

//Colors
$grey = imagecolorallocate($img, 128, 128, 128);
$white = imagecolorallocate($img, 255, 255, 255);
$r = rand(0, 256);
$g = rand(0, 256);
$b = rand(0, 256);
$random_color = imagecolorallocate($img, $r, $g, $b);
$inverse_random_color = imagecolorallocate($img, 255 - $r, 255 - $g, 255 - $b);

//Background
imagefill($img, 0, 0, $random_color);

//Grid
$width_top = $width;
for($i = 1; $i < $width_top; $i++){
    imageline($img, 30 * $i, 100, 30 * $i, 0, $grey);
    $width_top -= 30;
}

$height_top = $height;
for($i = 1; $i < $height_top; $i++){
    imageline($img, 0, 25 * $i, 200, 25 * $i, $grey);
    $height_top -= 25;
}

//Background-noise
$pixelNumber = 777;
for($i = 0; $i < $pixelNumber; $i++){
    $x = rand(1, 200);
    $y = rand(1, 100);
    imagesetpixel($img, $x, $y, $inverse_random_color);
}

//Text
//$random = substr(str_replace("0", "", str_replace("O", "", strtoupper(md5(rand(9999, 99999))))), 0, 5);


//usar chr(rand(65,90))    o str_shuffle
$strLength = 5;
for($i = 0; $i < $strLength; $i++){
    $x = rand(0, 1);
    if($x === 1){
        rand("");
    } else {

    }
}
$random_captcha = substr(str_replace("0", "", str_replace("O", "", strtoupper(md5(rand(9999, 99999))))), 0, 5);
$font = "fonts/gunplay-rg.ttf";
$angle = rand(-10,10);
imagettftext($img, 20, 90, 30, 90, $inverse_random_color, $font, $random);
imagettftext($img, 35, $angle, 45, 70, $inverse_random_color, $font, $random_captcha);

imagepng($img);
imagedestroy($img);

?>