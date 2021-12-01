<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        include './php/funciones.php';

        if(!isset ($_POST['nombre']) || !isset ($_POST['direccion']) || !isset ($_POST['fecha']) || !isset ($_POST['idioma']) || !isset ($_POST['genero'])){
            echo formulario();
        }elseif(empty ($_POST['nombre']) || empty ($_POST['direccion']) || empty ($_POST['fecha']) || empty ($_POST['genero'])){
            echo formulario();
            echo error(1);
        }else{
            echo salida();
        }
    ?>

<!--el dos tiene que ser una tabla con los verbos, presenta pasado y fururo y luego comproblar te dice cuales estan bien  y cuales mal, guardar en array-->
    
</body>