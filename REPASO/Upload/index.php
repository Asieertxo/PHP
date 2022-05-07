<?php

echo <<<EOD
    <h1>Subir un fichero</h1>
    <form action="./subir.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fichero">cuadrado</br>
        <input type="submit" name"enviar" value="enviar" />
    </form>
EOD;

?>