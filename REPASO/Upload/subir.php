<?php

if(is_uploaded_file($_FILES['fichero']['tmp_name'])){
    $directorio = '.\ficheros\\';
    $nombre = $_FILES['fichero']['name'];
    $fecha = date("d-m-y-H:i:s");
    $nombreCompleto = $directorio.$nombre."--".$fecha;
    if(is_dir($directorio)){
        move_uploaded_file ($_FILES['fichero']['tmp_name'],$nombreCompleto);
        echo "Fichero " . $nombreCompleto . " se ha subido correctamente";
    }else{
        echo "Directorio invalido";
    }
}else{
    echo "No se ha subido bien el fichero";
}

?>