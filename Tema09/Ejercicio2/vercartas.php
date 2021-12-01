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

            if(!empty($_GET['num'])){
                $num = $_GET['num'];
                verCartas($num);
            }



            function verCartas($num){
                $baraja = barajar();
                echo "</br></br></br>";
                echo "<div class='padre'><div class='hijo'>";
                for($i=0; $i<$num; $i++){
                    $carta = array_pop($baraja);
                    echo "<img src='./img/$carta.png'>";
                }
                echo "</div></div>";
            }
    ?>
    
</body>