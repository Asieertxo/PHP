<?php
$color_fondo;
$color_letra;
$idioma = 'español';

include "./funciones.php";

if(isset($_POST["color_fondo"]) && isset($_POST["color_letra"]) && isset($_POST["idioma"])){
        $color_fondo = $_POST["color_fondo"];
        $color_letra = $_POST["color_letra"];
        $idioma = $_POST["idioma"];
        setcookie("color_fondo", $color_fondo, time()+3600*24*365);
        setcookie("color_letra", $color_letra, time()+3600*24*365);
        setcookie("idioma", $idioma, time()+3600);
        formulario();
}elseif(isset($_COOKIE["color_fondo"]) && isset($_COOKIE["color_letra"]) && isset($_COOKIE["idioma"])){
        $color_fondo = $_COOKIE["color_fondo"];
        $color_letra = $_COOKIE["color_letra"];
        $idioma = $_COOKIE["idioma"];
        formulario();
}else{
    formulario();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

</body>
</html>