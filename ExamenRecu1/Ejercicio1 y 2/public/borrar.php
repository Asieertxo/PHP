<?php

require "./../class/conection.php";
$conection = crearConexion();

$id = $_GET['id'];

$sql= "DELETE FROM `productos` WHERE id='$id'";
if (mysqli_query($conection, $sql)) {
    echo "Se ha borrado correctamente el libro con ID: " . $id;
    echo "<br><a href='./listado.php'>Atras</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conection);
    echo "<br><a href='./listado.php'>Atras</a>";
}
?>