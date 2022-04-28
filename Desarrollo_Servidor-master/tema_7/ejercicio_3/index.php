<!--3. Crear un archivo llamado calendario_funciones.php que contenga una función llamada
calendario_anual, que reciba como argumento un año y cree una tabla de 3 filas por 4
columnas.Para rellenar el contenido de cada celda, calendario_anual deberá llamar a otra función
llamada calendario_mensual enviándole como argumento el año y el número del mes.-->

<?php

include("php/general_functions.php");
include("php/specific_functions.php");
include("php/variables.php");

function calendario_anual($year){
    global $week;
    global $monthsName;
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 3</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
END;
    echo "<table class='allMonths'>";
    echo "<tr>";
    $rowSplit = 0;
    for($i = 1; $i <= 12; $i++){       
        if($rowSplit % 4 == 0){
            echo "</tr><tr>";
        }
        echo "<td class='month-cell'>";
        calendario_mensual($i, $year);
        echo "</td>";
        $rowSplit++;
    }
    echo "</tr>";  
    echo "</table><br><br>"; 
    echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</body>";
    echo "</html>";
}

if(!isset($_POST['send'])){
    printForm();
} else calendario_anual($_POST['userYear']);


?>