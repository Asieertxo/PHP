<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <?php
        if(isset ($_POST['num'])){
            $aleatorio = rand(1,10);
            $num = $_POST['num'];
            if ($num > 0 && $num <= 10){
                if($num == $aleatorio){
                    echo "<div class='padre'>";
                        echo "<div class='hijo verde'>";
                            echo "<p>Numero que has enviado $num</p></br>";
                            echo "<p>Has adivinado el numero!!!";
                        echo "</div>";
                    echo "</div>";
                }else{
                    echo "<div class='padre'>";
                        echo "<div class='hijo rojo'>";
                            echo "<p>Numero que has enviado $num</p></br>";
                            echo "<p>No has adivinado el numero, era el $aleatorio";
                        echo "</div>";
                    echo "</div>";
                }
            }else{
                echo<<<EOD
                <h1>El numero tiene que estar entre 1 y 10<h1>
                <li><a href='../index.html'>Volver</a></li>
EOD;
            }
        }else{
            echo<<<EOD
                <h1>No ha enviado ningun dato, por favor vuelva y envie un dato<h1>
                <li><a href='../index.html'>Volver</a></li>
EOD;
        }
    ?>
</body>