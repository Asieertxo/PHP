<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <h1>Selecciona la colección de ejercicios</h1>
    <div class="form_div">
        <?php

        define('COLLECTIONS', 3);

        for($i=1; $i<=COLLECTIONS; $i++){
            echo "<button class='btn'><a href='./coleccion$i/'>Colección $i</a></button><br><br>";
        }
        ?> 
    </div>

</body>

</html>