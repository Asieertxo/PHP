<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>
    <?php
        if(!isset ($_GET['dni'])){
            echo<<<EOD
                <div class='padre'>
                    <a class="hijo" href="./index.php?dni=12345678">Pincha aqui para ver la letra del DNI</a>
                </div>
EOD;
        }else{
            $num = $_GET['dni'];
            $resto = $num%23;
            $opciones = 'TRWAGMYFPDXBNJZSQVHLCKE';
            $letra = $opciones{$resto};
          
            echo "<div class='padre'>";
                echo "<div class='hijo'>";
                    echo "<p>Con tu nº de DNI la letra es la: <b>$letra</b> </p>";
                    echo "<p><b> $letra </b></p>";
                    echo "$num<b>$letra</b>";
                echo "</div>";
            echo "</div>";
        }
    ?>

</body>