<?php
namespace lic\SubirLibros;//siempre al principio

class SubirLibros{//abrir la clase

public function subirlibros(){//funcion de la clase
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

    if(isset($_POST['insert'])){
        $sql = "INSERT INTO `book` ( `isbn`, `title`, `author`, `stock`, `price`) VALUES ('{$_POST['isbn']}', '{$_POST['title']}', '{$_POST['author']}', {$_POST['stock']}, {$_POST['price']})";

        if (mysqli_query($conection, $sql)) {
            echo "Se ha subido correctamente el libro " . $_POST['title'] . " con ISBN: " . $_POST['isbn'] . " de " . $_POST['author'] . ", tenemos " . $_POST['stock'] . " a " . $_POST['price'] . "€";
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
            <form action="./index.php?insert=yes" method="POST" enctype="multipart/form-data">
                <p>Pon los datos del libro para subir</p>
                <input type="text" name="isbn" placeholder="Isbn"/>
                <input type="text" name="title" placeholder="Title"/>
                <input type="text" name="author" placeholder="Author"/>
                <input type="text" name="stock" placeholder="Strock"/>
                <input type="text" name="price" placeholder="Price"/>
                <input type="submit" name="insert" value="INSERT"/>
            </form>
        </div>
    EOD;
    }
?>