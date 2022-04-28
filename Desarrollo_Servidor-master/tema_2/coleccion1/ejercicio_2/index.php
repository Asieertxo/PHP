<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" type="text/css" href="../../css/index.css">
</head>
<body>
    <h1>Tablas de multiplicar</h1>

    <?php
        define('LIMITE', 10);
        define('NUMTABLAS', 10);

        echo "<table class='stand_alone'>";
        echo "<tr>";
        for ($i = 1; $i<=NUMTABLAS; $i++){ 
            echo "<th class='blue'>Tabla del $i</th>";
        }
        echo "</tr>";
        for ($j = 0; $j<=LIMITE; $j++){
            echo "<tr>";
            for ($i = 1; $i<=NUMTABLAS; $i++){
                $resultado = $j * $i;
                echo "<td class='white'>$j x $i = $resultado</td>";       
            }
            echo "</tr>";
        }
        echo "</table>";
    ?>

    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button>
</body>
</html>