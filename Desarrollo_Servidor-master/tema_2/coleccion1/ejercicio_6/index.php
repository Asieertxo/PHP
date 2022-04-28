<!--Realizar un código html que nos pida el nombre de un alumno y su nota.
El fichero notas.php nos dirá EnhoraBuena “Luis Gómez” has aprobado o Lo
siento
“Luis Gómez” has suspendido-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
    <link rel="stylesheet" type="text/css" href="../../css/index.css">
</head>

<body>
    <h1>Comprobación de aprobado</h1>
    <div class="form_div">
        <form action="php/notas.php" enctype="application/x-www-form-urlencoded" method="POST">
            <label for="student_name">Introduce tu nombre: </label>
            <input type="text" id="student_name" name="student_name"><br><br>
            <label for="student_grade">Introduce tu nota: </label>
            <input type="number" id="student_grade" name="student_grade"><br><br>
            <input type="submit" name="save">
        </form>
    </div>
    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button>  
</body>

</html>