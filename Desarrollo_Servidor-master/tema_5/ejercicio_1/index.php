<!--1. Realizar un formulario básico para subir un unico fichero -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <h1>Subir un fichero</h1>
    <?php

    include ("php/functions.php");
    
    if(!isset($_POST['save'])){
        printForm();
    } else uploadFile();
    
    ?>
    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button> 
    
</body>
</html>