<?php

function conection(){
    $SERVERNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD1 = "root";
    $PASSWORD2 = "";
    $DBNAME = "libros";

    //Crear conexion, le pongo @ ya que despues compruebo si la conexion se ha realizaqdo bien
    @$conection1 = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD1, $DBNAME);
    @$conection2 = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD2, $DBNAME);
    //Comprobar la conexion la conexion
    if (!$conection1) {
        if(!$conection2){
            echo "<h2 class='rojo'>Error de conexion: </h1>" . mysqli_connect_error();
            die();
        }else{
            echo "<h2 class='verde'>Conexion satisfactoria</h1>";
            $conection = $conection2;
        }
    }else{
        echo "<h2 class='verde'>Conexion satisfactoria</h1>";
        $conection = $conection1;
    }

    return $conection;
}


function closeconection($conection){
    mysqli_close($conection);
}
    

?>