<?php

function conection(){
    $SERVERNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD1 = "";
    $PASSWORD2 = "root";
    $DBNAME = "inmobiliaria";

    //Crear conexion, le pongo @ ya que despues compruebo si la conexion se ha realizaqdo bien
    @$conection = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD1, $DBNAME);


    //Comprobar la conexion la conexion
    if (!$conection) {
        @$conection = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD2, $DBNAME);
        if (!$conection){
            echo "<h1 class='rojo'>Error de conexion: </h1>" . mysqli_connect_error();
            die();
        }else{
            echo "<p class='verde'>Conexion satisfactoria</p>";
        }
    }else{
        echo "<p class='verde'>Conexion satisfactoria</p>";
    }

    return $conection;
}


function closeconection($conection){
    mysqli_close($conection);
}
    

?>