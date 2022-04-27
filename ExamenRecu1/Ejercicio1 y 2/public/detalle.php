<?php

require "./../class/conection.php";
$conection = crearConexion();

$id = $_GET['id'];

$sql= "SELECT * FROM `productos` WHERE id='$id'";
$result = mysqli_query($conection, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo $row['descripcion'];
}

echo "<br><a href='./listado.php'>Atras</a>"
?>