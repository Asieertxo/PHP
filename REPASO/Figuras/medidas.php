<?php

$figura = $_POST["figura"];

echo "<h1>Dime las medidas de tu figura</h1>";

if($figura == "cuadrado"){
    echo <<<EOD
    <form action="./dibujar.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="base" placeholder="base"></br>
        <input type="hidden" name="tipo" value="cuadrado">
        <input type="submit" name"dibujar" value="dibujar" />
    </form>
    EOD;
}elseif($figura == "rectangulo"){
    echo <<<EOD
    <form action="./dibujar.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="base" placeholder="base"></br>
        <input type="text" name="altura" placeholder="altura"></br>
        <input type="hidden" name="tipo" value="rectangulo">
        <input type="submit" name"dibujar" value="dibujar" />
    </form>
    EOD;
}elseif($figura == "triangulo"){
    echo <<<EOD
    <form action="./dibujar.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="base" placeholder="base"></br>
        <input type="text" name="altura" placeholder="altura"></br>
        <input type="hidden" name="tipo" value="triangulo">
        <input type="submit" name"dibujar" value="dibujar" />
    </form>
    EOD;
}elseif($figura == "circulo"){
    echo <<<EOD
    <form action="./dibujar.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="radio" placeholder="radio"></br>
        <input type="hidden" name="tipo" value="circulo">
        <input type="submit" name"dibujar" value="dibujar" />
    </form>
    EOD;
}

?>