<!--Realizar el ejercicio 1 y 2 utilizando Nowdoc o Heredoc-->
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

    <?php
    $temperaturas=array();
    $temperaturas['Caja_1']=array(1,1,2,3,2,1,2,3,3,3,2,1,3,4);
    $temperaturas['Caja_2']=array(0,0,3,2,4,3,2,0,1,2,3,4,2,1);
    $temperaturas['Caja_3']=array(3,1,2,3,5,2,2,0,1,2,3,4,2,1);
    $temperaturas['Caja_4']=array(2,2,2,3,5,2,3,2,0,1,2,3,0,1);
    $temperaturas['Caja_5']=array(0,3,2,3,5,2,3,2,0,1,2,3,0,1);

    echo "<h1>Ejercicio 1</h1>";

    echo "<div class='big_div'>";
        foreach($temperaturas as $key => $caja){        
            foreach($caja as $valor){
                if($valor>4){
                    echo "<span>En la $key se ha registrado una temperatura de $valor</span><br>";
                }           
            }
        }
        echo "<br>";
        echo "<table>";     
        foreach($temperaturas as $key => $caja){   
            echo "<tr>"; 
            echo "<td class='blue'>$key</td>";    
            foreach($caja as $valor){
                if($valor>4){
                    echo "<td class='yellow'>$valor</td>";
                } else echo "<td class='white'>$valor</td>";       
            }
            echo "</tr>";
        }
       
        echo "</table>";
    echo "</div>";

    echo <<<END
        <h1>Ejercicio 2</h1>
        <div>
        <table>
        <tr>
END;
    define('LIMITE', 10);
    define('NUMTABLAS', 10);

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
    echo <<<END
    </table>
    </div>
    END;
    ?>

<br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button>
</body>
</html>