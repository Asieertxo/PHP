<!--Realizar el ejercicio 2 mejorado con dos versiones:
1) Una en la que tendremos 10 enlaces con 10 números y según linkemos en uno u
otro nos presenta en otro php esa tabla de multiplicar (href)
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
    <link rel="stylesheet" type="text/css" href="../../../css/index.css">
</head>

<body>
    <h1>Seleccionador de tabla de multiplicar</h1>
    
    <?php

    define('LIMIT',10);

    function printLinksToTables(){
        echo "<div class='stand_alone'>";
        echo "<table>";
        echo "<tr>";
        echo "<th class='blue'>Tablas</th>";
        echo "</tr>";
        for ($i=1; $i<=LIMIT; $i++){
             echo "<tr>";
             echo "<td class='white'><a href='index.php?user_table=$i'>Tabla del $i</a></td>";
             echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='..'>Atrás</a></button>";
    }
    
    function printTable($table_number){
        $result = 0;  
        echo "<div>";     
        echo "<table>";
        echo "<tr>"; 
        echo "<th class='blue'>Tabla del $table_number</th>";          
        echo "</tr>";
        for($i=0; $i<=LIMIT; $i++){
            $result = $i * $table_number;
            echo "<tr>";
            echo "<td class='white'>$table_number x $i = $result</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }
    
    if(!isset($_GET['user_table'])){   
    printLinksToTables();
    } else printTable($_GET['user_table']);

    ?>
</body>

</html>