<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="">
</head>
<body>
    <h1>Tablas de Multiplicar</h1>

    <?php
        if(!isset ($_GET['num'])){
            for($i=1; $i<=10; $i++){
                $URL = "index.php?num=$i";
                echo "<li><a href='$URL'>TABLA DEL $i</a></li>";
            }
        }else{
            $num = $_GET['num'];
            echo "<div>";
            echo "<table>";
            echo "<tr><th>Tabla del $num</br></th></tr>";
            for($i=1; $i<=10; $i++){
                $resul = $i*$num;
                echo "<tr>";
                echo "<td>$num</td>";
                echo "<td>x</td>";
                echo "<td>$i</td>";
                echo "<td>=</td>";
                echo "<td>$resul</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
    ?>

</body>