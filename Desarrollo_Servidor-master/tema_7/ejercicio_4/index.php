<!--4.Crear una función que nos visualiza en una tabla el array que contiene los meses del año.
Utilizar para el array_walk($meses,’escribir_tabla’).Generar la siguiente salida como un
calendario ..-->

<?php

include("php/general_functions.php");
include("php/specific_functions.php");
include("php/variables.php");

function calendario_anual(){
    global $week;
    global $monthsName;
    global $months;
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
    array_walk($months, 'calendario_mensual', $_POST['userYear']);
    echo "</tr>";  
    echo "</table><br><br>"; 
    echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</body>";
    echo "</html>";
}

if(!isset($_POST['send'])){
    printForm();
} else calendario_anual();


?>