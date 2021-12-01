<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
    echo "<h1>Pintrar el tablero de ejedrez</h1>";
        echo "<table>";
            for($row=1; $row<=8; $row++){
                echo "<tr>";
                for($col=1; $col<=8; $col++){
                    $t_cell=$row+$col;
                    if($t_cell%2 == 0){
                        echo "<td class='blanco'></td>";
                    }else{
                        echo "<td class='negro'></td>";
                    }
                }
                echo "<tr>";
            }
        echo "</table>";
    ?>
    
</body>