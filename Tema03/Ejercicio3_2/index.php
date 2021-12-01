<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        include './php/funciones.php';

        $verbos = [
            array("be","was","been"),
            array("begin","began","begun"),
            array("bend","bent","bent"),
        ];
        $aciertos = 0;
        $errores = 0;


        if(!isset($_POST['verbs'])){
            echo formulario();
        }else{
            for($i=0; $i<(count($_POST['verbs'])); $i++){
                for($j=0; $j<(count($_POST['verbs'])); $j++){
                    if($_POST['verbs'][$i][$j] == $verbos[$i][$j]){
                        $aciertos++;
                    }else{
                        $errores++;
                    }
                }
            }
            echo salida($aciertos, $errores);
        }
    ?>

<!--el dos tiene que ser una tabla con los verbos, presenta pasado y fururo y luego comproblar te dice cuales estan bien  y cuales mal, guardar en array-->
    
</body>