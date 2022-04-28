<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link rel="stylesheet" type="text/css" href="../../../css/index.css">
</head>
<body>
<h1>Ejercicio 4</h1>

    <?php
    
    define('RANDOM', rand(1, 10));

    function checkGuess($user_number){
        echo "<div>";
        if(RANDOM == $user_number){
            echo "<span>¡Felicidades! Lo has adivinado</span>";
        }else echo "<span>Has fallado, nuestro numero era el " . RANDOM . "</span>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='..'>Volver</a></button>";
        echo "</div>";
    }

    function printError($error_message){
        echo "<div>";
        echo "<span>$error_message</span>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='..'>Volver</a></button>";
        echo "</div>";
    }

    if (empty($_POST['user_number'])){
        printError("Introduce un número por favor");
    }else if ($_POST['user_number']<0 or $_POST['user_number']>10){
        printError("Introduce un número entre cero y diez por favor");
    }else if (isset($_POST['user_number'])){
        checkGuess($_POST['user_number']);
    }
    ?>
    
</body>
</html>



