<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./../css/estilos.css">
</head>
<body>

    <?php
        echo "<h3>Error de Login</h3>";
        echo "<p>El usuario " . $_GET['nombre'] . " no ha podido registrarse, sera redirigido, espere</p>";
        header("refresh:10; url=./../index.php");

    ?>
    
</body>