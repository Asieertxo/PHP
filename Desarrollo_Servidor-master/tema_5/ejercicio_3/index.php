<!--3. Realizar un curriculum , para lo cual nos pide una serie de información
sobre nosotros , incluida la foto y genera el cv-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <h1 style="min-width: 35%">Constructor de CV</h1>

    <?php

    
    include ("php/functions.php");
    
    if(!isset($_POST['save'])){
        printForm();
    } else if(empty($_POST['user_name']) or empty($_POST['user_age']) or empty($_POST['user_birthday']) or empty($_POST['user_gender'])){
        printError("Introduzca al menos una opción de todos los datos por favor");
    } else if($_POST['user_age']<0 or $_POST['user_age']>120){
        printError("Introduzca una edad válida por favor");
    } else {
        uploadFile();
    }
    
    ?>

    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button>

</body>
</html>