<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

<?php
        include_once "./php/calendario_funciones.php";
        include_once "./php/funciones.php";


        if(!isset ($_POST['año'])){
            echo main();
        }elseif(empty ($_POST['año'])){
            echo main();
        }else{
            $año = $_POST['año'];
            echo calendario_anual($año);
        }
?>
    
</body>