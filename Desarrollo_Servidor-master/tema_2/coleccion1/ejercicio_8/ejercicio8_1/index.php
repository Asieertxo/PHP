<!--Realizar un pequeño programa en el que nos pida un DNI y nos visualiza la letra correspondiente.
Primera versión:
1)	Href-->
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
    $user_dni = "35674277";
    
    function printForm($user_dni){
        echo<<<END
        <div>
        <button><a href="index.php?user_dni=$user_dni">Pulse aquí para ver la letra de su DNI</a></button>       
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

    if(!isset($_GET['user_dni'])){
        printForm($user_dni);
    } else printAnswer($_GET['user_dni']);

    ?>
    
</body>
</html>