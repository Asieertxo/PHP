<?php

$name = "Álvaro";

echo "<a href='$_SERVER[PHP_SELF]?nombre=$name'>Pincha aquí</a><br>";

if(isset($_GET['nombre'])){
    echo $_GET['nombre'];
}


?>