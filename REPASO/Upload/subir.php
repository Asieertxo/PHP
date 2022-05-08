<?php

if(is_uploaded_file($_FILES['fichero']['tmp_name'])){
    $directorio = '.\ficheros\\';
    $nombre = $_FILES['fichero']['name'];
    $fecha = date('Y-m-d-h-h-s');
    $nombreCompleto = $directorio.$fecha."--".$nombre;
    if(is_dir($directorio)){
        move_uploaded_file ($_FILES['fichero']['tmp_name'],$nombreCompleto);
        echo "Fichero " . $nombreCompleto . " se ha subido correctamente";
    }else{
        echo "Directorio invalido";
        header("refresh:3; url=index.php");
    }
}else{
    echo "No se ha subido bien el fichero";
    header("refresh:3; url=index.php");
}

?>