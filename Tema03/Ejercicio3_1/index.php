<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        include './php/funciones.php';

        if(!isset ($_POST['nombre']) || !isset ($_POST['apellido']) || !isset ($_POST['edad']) || !isset ($_POST['email']) || !isset ($_POST['fecha'])){
            echo formulario();
        }elseif(empty ($_POST['nombre']) || empty ($_POST['apellido']) || empty ($_POST['edad']) || empty ($_POST['email']) || empty ($_POST['fecha'])){
            echo formulario();
            echo error(1);
        }elseif(($_POST['edad']) < 18){
            echo formulario();
            echo error(2);
        }else{
            echo salida();
        }
    ?>

<!--el dos tiene que ser una tabla con los verbos, presenta pasado y fururo y luego comproblar te dice cuales estan bien  y cuales mal, guardar en array-->
    
</body>