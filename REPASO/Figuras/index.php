<?php

echo <<<EOD
    <form action="./medidas.php" method="POST" enctype="multipart/form-data">
        <input type="radio" name="figura" value="cuadrado">cuadrado</br>
        <input type="radio" name="figura" value="rectangulo">rectangulo</br>
        <input type="radio" name="figura" value="triangulo">triangulo</br>
        <input type="radio" name="figura" value="circulo">circulo</br>
        <input type="submit" name"medidas" value="medidas" />
    </form>
EOD;


?>