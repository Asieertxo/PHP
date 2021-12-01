<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <?php
        if(isset ($_POST['nombre']) && isset ($_POST['nota']) && !empty($_POST['nombre']) && !empty($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $nota = $_POST['nota'];
            if($nota >= 0 && $nota <= 10){
                if($nota >= 5){
                    echo "<div class='padre'><div class='hijo verde'>";
                        echo "<p><b>EnohoraBuena, $nombre ha aprobado.</b></p>";
                    echo "</div></div>";
                }else{
                    echo "<div class='padre'><div class='hijo rojo'>";
                        echo "<p><b>Lo siento, $nombre ha suspendido.</b></p>";
                    echo "</div></div>";
                }
            }
        }else{
            echo<<<EOD
            <h1>No ha enviado ningun dato, por favor vuelva y envie un dato<h1>
            <li><a href='../index.html'>Volver</a></li>
EOD;
        }
    ?>
</body>