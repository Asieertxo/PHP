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


        if(!isset ($_POST['año']) && !isset ($_POST['mes'])){
            echo main();
        }elseif(empty ($_POST['año']) || empty ($_POST['mes'])){
            echo main();
        }else{
            $mes = $_POST['mes'];
            $año = $_POST['año'];
            echo calendario_mensual($año, $mes);
        }

    ?>

</body>