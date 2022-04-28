<!--Ejercicio 5
Almacenar la notas de todos los alumnos que deseemos introducir.
El programa nos pide notas, curso y nombre hasta que en un momento dado digamos
que no deseamos continuar.
Cuando terminamos de meter datos, visualizaremos todas las notas tecleadas.
La notas deben almacenarse en un array asociativo.<br>
Al final nos visualizara la media por cursos y la media final del centro.-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <h1>Almacén de notas</h1>
    <?php

    function createArrays(){
        $names_array = array();
        $grades_array = array();
        $classes_array = array();
    }

    /*$studentsArray = array($names_array, $grades_array, $classes_array);*/

    function createForm(){
    echo<<<END
        <div class="form_div">
        <form action="." method="GET" enctype="application/x-www-form-urlencoded">
            <label for="student_name">Nombre del alumno: </label>
            <input type="text" id="student_name" name="student_name"><br><br>
            <label for="student_grade">Nota del alumno: </label>
            <input type="text" id="student_grade" name="student_grade"><br><br>
            <label for="student_class">Curso: </label>
            <input type="text" id="student_class" name="student_class"><br><br>
            <input type="submit" name="save"><br><br>
            <input type="submit" name="view" value="Ver datos">
        </form>
    </div>
END;
    }

    function createTable(){
    echo "<div class='table_div'>";
    echo "<table>";
        echo "<tr>";
            echo "<th class='blue'>Nombre</th>";
            echo "<th class='blue'>Nota</th>";
            echo "<th class='blue'>Curso</th>";
        echo "</tr>";
        echo " <tr>";
            echo "<td class='white'>$names_array[0]</td>";
            echo "<td class='white'></td>";
            echo "<td class='white'></td>";
        echo "</tr>";
    echo "</table>";
    echo "<br><br>";
    echo "<button><a href='.'>Volver</a></button>";
    echo "</div>";
    }

    function saveStudent(){
        $student_name = $_GET['student_name'];
        $names_array[0] = $student_name; 
        echo "<p>$names_array[0]</p>";
        /*$grades_array += ["key_grade_$i" => $student_grade];
        $classes_array += ["key_class_$i" => $student_class];*/
    }

    if(isset($_GET['view'])){
        createTable();
    }else {
        createForm();
        if(isset($_GET['save'])){
            /*$student_name = $_GET['student_name'];
            $student_grade = $_GET['student_grade'];
            $student_class = $_GET['student_class'];*/
            saveStudent();
        }   
    }

    ?>
</body>

</html>