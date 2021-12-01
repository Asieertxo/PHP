<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        function main(){
            echo<<<EOD
                <div class="padre">
                <form class="hijo" action="./index.php" method="POST" enctype="multipart/form-data">
                    <h1>Dime el numero de un mes</h1>
                    <input type="number" id="mes" name="mes">
                    <h1>Dime un año</h1>
                    <input type="number" id="año" name="año">
                    <input type="submit" value="Enviar">
                    <h1></h1>
                </form>
                </div>
EOD;
        }
    ?>

</body>