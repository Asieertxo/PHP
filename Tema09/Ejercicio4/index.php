<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        include "./php/ciclos.php";
        include "./php/horario.php";
        global $ciclos;

        array_map("pintar", $ciclos);
    ?>
    
</body>