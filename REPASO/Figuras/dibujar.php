<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>


<?php
require "./class/CFigura.php";
require "./class/CCuadrado.php";
require "./class/CRectangulo.php";
require "./class/CTriangulo.php";
require "./class/CCirculo.php";
require "./../cabezera.php";

if(isset($_POST['base'])){
   $base = $_POST['base']; 
}
if(isset($_POST['altura'])){
    $altura = $_POST['altura']; 
}
if(isset($_POST['radio'])){
    $radio = $_POST['radio']; 
}

$cabecera = new Cabezera("Repaso", "Ejercicio3", "Figuras");
echo $cabecera;

if($_POST['tipo'] == "cuadrado"){
    $figura = new Cuadrado('blue', $base, $base);
    echo $figura;
}elseif($_POST['tipo'] == "rectangulo"){
    $figura = new Rectangulo('blue', $base, $altura);
    echo $figura;
}elseif($_POST['tipo'] == "triangulo"){
    $figura = new Triangulo('blue', $base, $altura);
    echo $figura;
}elseif($_POST['tipo'] == "circulo"){
    $figura = new Circulo('blue', $radio);
    echo $figura;
}


//diferencias entre this y self (ejemplo en triangulo)

?>

</body>
</html>