<?php
function invertir($fecha){
    $fecha = explode("-", $fecha);
    $fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
    return $fecha;
}

function formulario(){
echo<<<EOD
    <h1>Dime una fecha en formato americano</h1>
    <form action="./index.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="fecha">
        <input type="submit" name="enviar" value="enviar"/>
    </form>
EOD;
}

function salida(){
    $fecha = $_POST['fecha'];
    $fecha = invertir($fecha);
    echo "<h1>Esta es la fecha en formato español</h1>";
    echo $fecha;
}

?>