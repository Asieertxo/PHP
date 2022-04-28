<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 8</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <h1>Selecciona el ejercicio</h1>
    <div class="form_div">
        <?php

        define('EXERCISES', 1);

        for($i=1; $i<=EXERCISES; $i++){
            echo "<button class='btn'><a href='./ejercicio_$i/'>Ejercicio $i</a></button><br><br>";
        }

        ?> 
    </div>
    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button>

</body>

</html>