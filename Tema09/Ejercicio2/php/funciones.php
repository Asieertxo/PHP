<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
    include './php/baraja.php';

        function formulario(){
            echo<<<EOD
                <h3>Elije ver la baraja entera o solo unas cartas</h3></br>
                <div class="contenedor">
                <form action="." method="POST" enctype="multipart/form-data">
                    <input type="submit" name="ver_baraja" value="Ver Baraja"/>
                    <input type="submit" name="ver_cartas" value="Ver Cartas"/>
                    <input type="submit" name="barajar" value="Barajar"/>
                </form>
                </div>
EOD;
        }



        function formulario_vercartas(){
            echo<<<EOD
                <h3>Dime el numero de cartas que quieres ver</h3></br>
                <div class="contenedor">
                <form action="." method="POST" enctype="multipart/form-data">
                    <input type="number" name="num">
                    <input type="submit" name="ver_cartas" value="Ver Cartas"/>
                </form>
                </div>
EOD;
        }




        function barajar(){
            global $baraja;
            shuffle($baraja);
            return $baraja;
        }



        function verBaraja(){
            global $baraja;
            echo "<h3>Esta es la baraja entera por palos<h3>";
            echo "<div class='padre'><div class='hijo'>";
            for($i=0; $i<count($baraja); $i++){
                    echo "<img src='./img/$baraja[$i].png'>";
                if($i==11 || $i==23 || $i==35){
                    echo "</div><div class='hijo'>";
                }
            }
            echo "</div></div>";
        }
        
    ?>
    
</body>