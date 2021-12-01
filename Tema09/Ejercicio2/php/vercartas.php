<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        include './funciones.php';

            if(!empty($_POST['num'])){
                $num = $_POST['num'];
                verCartas($baraja, $num);
    

    ?>
    
</body>