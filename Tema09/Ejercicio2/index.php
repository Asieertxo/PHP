<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        include './php/funciones.php';
        include './php/baraja.php';

        if(!isset ($_POST['ver_baraja']) && !isset ($_POST['ver_cartas']) && !isset ($_POST['barajar'])){
            echo formulario();
        }elseif(isset ($_POST['ver_cartas'])){
            echo formulario_vercartas();
            if(!empty($_POST['num'])){
                $num = $_POST['num'];
                header("Location: ./vercartas.php?num=$num");
            }  
        }elseif(isset ($_POST['ver_baraja'])){
            verBaraja();
        }else{
            barajar();
            echo formulario();
        }

    ?>
    
</body>