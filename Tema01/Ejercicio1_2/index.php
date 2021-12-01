<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos2.css">
</head>
<body>
    <h1>Tablas de Multiplicar</h1>

    <?php
        $NUMTABLAS = 10;

        for($i=1; $i<=$NUMTABLAS; $i++){
            echo "<div class='caja'>";
            echo "<table class='tabla'>";
            echo "<tr><th>Tabla del $i</b></th></tr>";

            for($j=0; $j<=10; $j++){
                $resul = $i*$j;
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>x</td>";
                echo "<td>$j</td>";
                echo "<td>=</td>";
                echo "<td>$resul</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
        }
    ?>
</body>