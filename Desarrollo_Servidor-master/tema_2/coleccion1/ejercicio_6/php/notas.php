<!--Realizar un código html que nos pida el nombre de un alumno y su nota.
El fichero notas.php nos dirá EnhoraBuena “Luis Gómez” has aprobado o 
Lo siento “Luis Gómez” has suspendido -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
    <link rel="stylesheet" type="text/css" href="../../../css/index.css">
</head>

<body>
    <h1>Comprobación de aprobado</h1>
        <?php

        function printStudent($student_name, $student_grade){
            echo "<div>";
            if($student_grade >= 5){
                echo "<span>Enhorabuena $student_name, has aprobado</span>";
            } else echo "<span>Lo siento $student_name, has suspendido</span>";
            echo "</div>";
        }

        function printError($error_message){
            echo "<div>";
            echo "<span>$error_message</span>";
            echo "</div>";
        }

        if(empty($_POST['student_name']) && empty($_POST['student_grade'])){
            printError("Por favor, introduce tu nombre y tu nota");
        } else if(empty($_POST['student_name'])){
            printError("Por favor, introduce tu nombre");
        } else if(empty($_POST['student_grade']) or $_POST['student_grade']<0 or $_POST['student_grade']>10){
            printError("Nota incorrecta, recuerda que no puede ser menor que cero ni mayor que diez."); 
        } else if(isset($_POST['student_name']) && isset($_POST['student_grade'])){
            printStudent($_POST['student_name'], $_POST['student_grade']);
        }
        echo "<br>";
        echo "<button class='bottom-btn'><a href='..'>Volver</a></button>";       
        ?>
</body>

</html>