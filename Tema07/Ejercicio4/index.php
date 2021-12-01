<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

<?php
        include "./php/calendario_funciones.php";
        include "./php/funciones.php";

        global $meses;
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        array_walk($meses, 'calendario_anual');
?>
    
</body>