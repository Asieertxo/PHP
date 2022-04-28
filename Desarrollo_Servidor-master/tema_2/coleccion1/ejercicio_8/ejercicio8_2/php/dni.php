<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../../../css/index.css">
</head>

<body>
    <h1>Comprobación DNI</h1>
 
    <?php
    function printAnswer($user_dni){
        echo "<div>";
        echo "<p>La letra que le corresponde a su dni es: " . checkLetterOfDni($user_dni). "</p>";
        echo "<button class='bottom-btn'><a href='..'>Volver</a></button>";
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
        echo "<button class='bottom-btn'><a href='..'>Volver</a></button>";
        echo "</div>";
    }

    if(!isset($_POST['dni'])){ 
        printForm();
    }else if (empty($_POST['dni'])){
        printError("Introduzca su DNI por favor");
    }else if (!is_numeric($_POST['dni'])){
        printError("Introduzca solo los números de su DNI por favor");
    }else printAnswer($_POST['dni']);
    ?>
</body>

</html>