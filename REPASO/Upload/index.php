<?php

echo <<<EOD
    <h1>Subir un fichero</h1>
    <form action="./subir.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fichero" accept=".txt">Fichero</br>
        <input type="submit" name"enviar" value="enviar" />
    </form>
EOD;

?>