<!--Realizar un pequeño programa en el que nos pida un DNI y nos visualiza la letra correspondiente.
Tercera versión:
3)	Un único php que visualiza el formulario y lo procesa-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
    <link rel="stylesheet" type="text/css" href="../../../css/index.css">
</head>

<body>
    <h1>Asignación de letra del DNI</h1>

    <?php

    function printForm(){
        echo<<<END
        <div>
        <form action="." method="GET" enctype="application/x-www-form-urlencoded">
            <label for="dni">Introduzca su DNI: </label>
            <input type="text" id="dni" name="dni">
            <input type="submit" name="save">
        </form>
        </div>
        <br><br>
        <button class='bottom-btn'><a href="..">Atrás</a></button>
END;
    }

    function printAnswer($user_dni){
        echo "<div>";
        echo "<p>La letra que le corresponde a su dni es: " . checkLetterOfDni($user_dni). "</p>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }   

    function checkLetterOfDni($user_dni){       
        $dni_letter = 0;
        $str_letters = "TRWAGMYFPDXBNJZSQVHLCKE";

        $dni_letter_key = $user_dni % 23;
        $dni_letter = $str_letters[$dni_letter_key];
        
        return $dni_letter;
    }

    function printError($error_message){
        echo "<div>";
        echo "<span>$error_message</span>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }

    if(!isset($_GET['dni'])){ 
        printForm();
    }else if (empty($_GET['dni'])){
        printError("Introduzca su DNI por favor");
    }else if (!is_numeric($_GET['dni'])){
        printError("Introduzca solo los números de su DNI por favor");
    }else printAnswer($_GET['dni']);
    ?>

</body>

</html>