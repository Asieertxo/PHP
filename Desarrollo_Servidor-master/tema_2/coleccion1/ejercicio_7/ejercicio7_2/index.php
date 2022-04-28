<!--Realizar el ejercicio 2 mejorado con dos versiones:
2) Realizar un html donde nos presenta un pequeño formulario en el que nos pide
que tabla queremos ver. Por un método Get le pasamos la tabla que deseamos
ver y en otro php nos visualiza dicha tabla
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
    
    function printForm(){
        echo<<<END
        <div>
            <form action="." method="GET" enctype="application/x-www-form-urlencoded">
                <label for="user_table">Selecciona una tabla: </label>
                <input type="number" id="user_table" name="user_table"><br><br>
                <input type="submit" value="Enviar">
            </form>
        </div>
        <br><br>
        <button class='bottom-btn'><a href='..'>Atrás</a></button>
END;
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
        echo "<br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }

    function printError($error_message){
        echo "<div>";
        echo "<span></span>";
        echo "<br>$error_message<br>";
        echo "<br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }

    if(!isset($_GET['user_table'])){
        printForm();
    }else if(empty($_GET['user_table']) or $_GET['user_table'] < 0){
        printError("Por favor introduce una tabla válida");
    }else {
        printTable($_GET['user_table']);
    }

    ?>

</body>

</html>