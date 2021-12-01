<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./../css/estilos.css">
</head>
<body>

    <?php

    function pintar($ciclo){
        $hora = array('08:30', '09:25', '10:20', '11:40', '12:35', '13:30');

        echo<<<EOD
            <div class='caja'>
            <table>
            <caption>$ciclo</caption>
                <tr>
                    <td></td>
                    <td>Lunes</td>
                    <td>Martes</td>
                    <td>Miercoles</td>
                    <td>Jueves</td>
                    <td>Viernes</td>
                </tr>

EOD;

        for($j=0; $j<6; $j++){
            echo "<tr>";
            echo "<td>$hora[$j]</td>";

            for($i=0; $i<5; $i++){
                echo "<td>Asignatura</td>";
            }

            echo "</tr>";
            if($j==2){
                echo "<tr>";
                echo "<td colspan='6' style='background-color:#ffae00'>Descanso</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "</div>";
        echo "</br>";
        echo "<hr>";
    }

    ?>
    
</body>