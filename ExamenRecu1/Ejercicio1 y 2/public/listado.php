<?php
require "./../class/conection.php";
echo "<link rel='stylesheet' type='text/css' href='./estilos.css'>";//importar css

$conection = crearConexion();

$sql= "SELECT * FROM `productos`";
$result = mysqli_query($conection, $sql);

session_start();
echo "Usuario: " . $_SESSION['user'];
echo "<br><br><br>";

if (mysqli_num_rows($result) > 0) {
    echo "<td><a class='boton' href='./crear.php'>Crear</a></td>";
    echo "<table class='tabla'>";
    echo "<tr>";
        echo "<td><b>detalle</b></td>   ";
        echo "<td><b>ID</b></td>   ";
        echo "<td><b>Nombre</b></td>";
        echo "<td><b>pvp</b></td>";
        echo "<td><b>familia</b></td>";
        echo "<td><b>Acciones:</b></td>";
        echo "<td><b>Acciones:</b></td>";
    echo "</tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
            echo "<td><a class='boton' href='./detalle.php?id=$row[id]'>Detalle</a></td>";
            echo "<td>$row[id]</td>   ";
            echo "<td>$row[nombre]</td>";
            echo "<td>$row[pvp]</td>";
            echo "<td>$row[familia]</td>";
            echo "<td><a class='boton' href='./index.php?id=$row[id]'>Actualizar</a></td>";
            echo "<td><a class='boton' href='./borrar.php?id=$row[id]'>Borrar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}else{

}


echo "listado";



?>