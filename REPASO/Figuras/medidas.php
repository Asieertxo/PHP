<?php
var_dump($_REQUEST);

$figura = $_POST["figura"];

if($figura == "cuadrado"){
    echo <<<EOD
    <form action="./medidas.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="base" placeholder="base"></br>
        <input type="submit" name"dibujar" value="dibujar" />
    </form>
    EOD;
}elseif($figura == "rectangulo"){
    echo <<<EOD
    <form action="./medidas.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="base" placeholder="base"></br>
        <input type="text" name="altura" placeholder="altura"></br>
        <input type="submit" name"dibujar" value="dibujar" />
    </form>
    EOD;
}elseif($figura == "triangulo"){
    echo <<<EOD
    <form action="./medidas.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="base" placeholder="base"></br>
        <input type="text" name="altura" placeholder="altura"></br>
        <input type="submit" name"dibujar" value="dibujar" />
    </form>
    EOD;
}elseif($figura == "circulo"){
    echo <<<EOD
    <form action="./medidas.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="base" placeholder="radio"></br>
        <input type="submit" name"dibujar" value="dibujar" />
    </form>
    EOD;
}

?>