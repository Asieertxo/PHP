<?php
namespace lic\DeleteLibros;//siempre al principio

class DeleteLibros{//abrir la clase

public function deletelibros(){//funcion de la clase
    $SERVERNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD = "";
    $DBNAME = "libros";

    //Crear conexion, le pongo @ ya que despues compruebo si la conexion se ha realizaqdo bien
    @$conection = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);


    //Comprobar la conexion la conexion
    if (!$conection) {
        echo "<h2 class='rojo'>Error de conexion: </h1>" . mysqli_connect_error();
        die();
    }else{
        echo "<h2 class='verde'>Conexion satisfactoria</h1>";
    }
//////////////////////////////////////////////////////////////////////////////////////

    if(isset($_POST['delete'])){
        $sql = "DELETE FROM `book` WHERE `id`= {$_POST['id']}";

        if (mysqli_query($conection, $sql)) {
            echo "Se ha borrado correctamente el libro con ID: " . $_POST['id'];
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conection);
        }

    }else{
        echo formulario();
    }
    echo "<a class='atras' href='./index.php'>Atras</a>";

//////////////////////////////////////////////////////////////////////////////////////
    mysqli_close($conection);




}}








    function formulario(){
        echo<<<EOD
        <div class='contenedor'>
            <h2>Elije Opciones</h2></br>
            <form action="./index.php" method="POST" enctype="multipart/form-data">
                <p>Pon el ID del libro a borrar: </p>
                <input type="text" name="id" placeholder="ID"/>
                <input type="submit" name="delete" value="DELETE"/>
            </form>
        </div>
    EOD;
    }
?>