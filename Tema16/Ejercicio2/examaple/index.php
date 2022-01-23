<?php
include __DIR__ .  "/../vendor/autoload.php";
echo "<link rel='stylesheet' type='text/css' href='./estilos.css'>";

$hello = new \lic\hello\Hello();

$hello->sayHello('composer');
?>