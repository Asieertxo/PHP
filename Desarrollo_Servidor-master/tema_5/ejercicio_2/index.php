<!--2. Modificar el ejercicio anterior para que solo permita 
subir ficheros .gif y .jpg-->
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
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

    
</body>
</html>