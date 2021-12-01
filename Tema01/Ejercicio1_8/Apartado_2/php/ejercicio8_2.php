<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <?php
        if(isset($_POST['dni']) && !empty($_POST['dni'])){
          $num = $_POST['dni'];
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
        }else{
          echo<<<EOD
            <h1>No ha enviado ningun dato, por favor vuelva y envie un dato<h1>
            <a href='../index.html'>Volver</a>
EOD;
        }
    ?>
</body>