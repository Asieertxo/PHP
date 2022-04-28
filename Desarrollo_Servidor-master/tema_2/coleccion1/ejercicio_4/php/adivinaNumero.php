<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link rel='stylesheet' type='text/css' href='../css/index.css'>
</head>
<body>
<h1>Ejercicio 4</h1> 
<br>
<div>
<?php

define('RANDOM', rand(1, 10));
define('GUESS', $_POST['guess_number']);

if(RANDOM == GUESS){
echo "<p>¡Felicidades! Lo has adivinado</p>";
}else echo "<p>Has fallado, has elegido el numero " . GUESS . "</p>";


echo "<p>Nuestro numero era el " . RANDOM . "</p>";
echo "</div>";

?>
</body>
</html>



