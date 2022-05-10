<?php

function delete($conexion){
    $id = $_GET['id'];
    $sql = "DELETE FROM `book` WHERE `id`= $id";
    $result = $conexion->accion($sql);

    if($result){
        echo "Libro borrado con exito";//da exito aun cuando borra un libro que no existia
        header("Refresh:3; url=index.php");
    }
}

?>