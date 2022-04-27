<?php
require "./class/CFigura.php";

$base = $_POST['base'];
$altura = $_POST['altura'];

$figura1 = new Figura('blue', $base, $altura);

echo $figura1->textoFigura();
echo $figura1->base;

?>