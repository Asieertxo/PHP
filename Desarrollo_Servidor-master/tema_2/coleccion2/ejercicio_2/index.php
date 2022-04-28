<!--2.	Suponemos que tenemos un array para almacenar los alumnos de 1º de DAW.
Elarray es asociativo y el índice es el numero de expediente. 
La información que contiene es el nombre y apellidos del alumnos.
Se pide realizar un formulario que nos pida el número de expediente y nos visualiza elnombre y apellidos del alumno.-->

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
    <h1>Buscador de alumnos</h1>

    <?php

        $students_array = ["EDAW101"=>"María Pérez Morales", "EDAW102" => "Juan Arguedas Sierra", "EDAW103" => "Mario García Jiménez"];
    
        function printForm(){
            echo<<<END
            <div>
            <form action="." method="GET" enctype="application/x-www-form-urlencoded">
                <label for="student_id">Introduzca el número de expediente (EDAW10_): </label>
                <input type="text" id="student_id" name="student_id">
                <input type="submit">
            </form>
            <br>
            </div>
            <br><br>
            <button class='bottom-btn'><a href='..'>Atrás</a></button>
END;
        }
    
        function searchArray($student_id, $students_array){   
            if(isset($students_array[$student_id])){
                printSearch($students_array[$student_id]);
            }else {
                $error_message = "Expediente no encontrado";
                printError($error_message);
            } 
        }
    
        function printSearch($student_name){
            echo "<div>";
                echo "<span>Nombre del estudiante: </span><br><br>";
                echo $student_name;       
                echo "<br>";
                echo "<br>";
                echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
            echo "</div>";
        }
    
        function printError($error_message){
            echo "<div>";           
                echo "<span>$error_message</span>";    
                echo "<br>";
                echo "<br>";
                echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
            echo "</div>";
        }
    
        if(!isset($_GET['student_id'])){
            printForm();
        }else if(empty($_GET['student_id'])){
            $error_message = "Introduzca un expediente";
            printError($error_message);
        }else {
            searchArray($_GET['student_id'], $students_array);
        }
    ?>

</body>
</html>