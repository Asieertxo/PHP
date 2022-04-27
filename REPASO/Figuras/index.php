<?php

echo <<<EOD
    <form action="./dibujar.php" method="POST" enctype="multipart/form-data">
        <input type="radio" name="triangulo"></br>
        <input type="radio" name="cuadrado"></br>
        <input type="radio" name="rectangulo"></br>
        <input type="radio" name="circulo"></br>
        <input type="text" name="base" placeholder="base" required/></br>
        <input type="text" name="altura" placeholder="altura" required/></br>
        <input type="submit" name"dibujar" value="dibujar" />
    </form>
EOD;


?>