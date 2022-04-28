<!-- 3. Generar un tablero de ajedrez -->
<?php

$figura = ["Torre", "Caballo", "Alfil", "Rey", "Reina", "Alfil", "Caballo", "Torre"];

echo<<<END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 class="heading-primary">
        Tablero de ajedrez
    </h1>
    <section class="section-table">
    <div class="table--div">
END;
echo "<table class='board'>";
for($j = 0; $j < 8; $j++){
    echo "<tr>";
    for($i = 0; $i < 8; $i++){
        /*if($j%2 == 0){
            if($i%2 == 0){
                echo "<td class='white'></td>";
            } else echo "<td class='black'></td>";
        } else {
            if($i%2 == 0){
                echo "<td class='black'></td>";
            } else echo "<td class='white'></td>";
        }  */
        
        /*if($j == 0 or $j == 7){
            if($j%2 == 0){
                if($i%2 == 0){
                    echo "<td class='white'>$figura[$i]</td>";
                } else echo "<td class='black'>$figura[$i]</td>";
            } else {
                if($i%2 == 0){
                    echo "<td class='black'>$figura[$i]</td>";
                } else echo "<td class='white'>$figura[$i]</td>";
            }
        } else if($j == 1 or $j == 6){
            if($j%2 == 0){
                if($i%2 == 0){
                    echo "<td class='white'>Peón</td>";
                } else echo "<td class='black'>Peón</td>";
            } else {
                if($i%2 == 0){
                    echo "<td class='black'>Peón</td>";
                } else echo "<td class='white'>Peón</td>";
            }
        } else {
            if($j%2 == 0){
                if($i%2 == 0){
                    echo "<td class='white'></td>";
                } else echo "<td class='black'></td>";
            } else {
                if($i%2 == 0){
                    echo "<td class='black'></td>";
                } else echo "<td class='white'></td>";
            }
        }*/

        if($j%2 == 0){
            if($j == 0 or $j == 7){
                if($i%2 == 0){
                    echo "<td class='white'>$figura[$i]</td>";
                } else echo "<td class='black'>$figura[$i]</td>";
            }else if($j == 1 or $j == 6){
                if($i%2 == 0){
                    echo "<td class='white'>Peón</td>";
                } else echo "<td class='black'>Peón</td>";
            } else {
                if($i%2 == 0){
                    echo "<td class='white'></td>";
                } else echo "<td class='black'></td>";
            }
        } else {
            if($j == 0 or $j == 7){
                if($i%2 == 0){
                    echo "<td class='black'>$figura[$i]</td>";
                } else echo "<td class='white'>$figura[$i]</td>";
            }else if($j == 1 or $j == 6){
                if($i%2 == 0){
                    echo "<td class='black'>Peón</td>";
                } else echo "<td class='white'>Peón</td>";
            } else {
                if($i%2 == 0){
                    echo "<td class='black'></td>";
                } else echo "<td class='white'></td>";  
            }
        }
    }
    echo "</tr>";
}

echo<<<END
        </table>
    </div>
    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button> 
</section>
</body>
</html>

END;

?>