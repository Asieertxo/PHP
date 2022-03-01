<?php

function conection(){
    $SERVERNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD = "root";
    $DBNAME = "inmobiliaria";

    //Crear conexion, le pongo @ ya que despues compruebo si la conexion se ha realizaqdo bien
    @$conection = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);


    //Comprobar la conexion la conexion
    if (!$conection) {
        echo "<h1 class='rojo'>Error de conexion: </h1>" . mysqli_connect_error();
        die();
    }else{
        echo "<p class='verde'>Conexion satisfactoria</p>";
    }

    return $conection;
}


function closeconection($conection){
    mysqli_close($conection);
}
    

?>