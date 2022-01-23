<?php
namespace lic\ModLibros;//siempre al principio

class ModLibros{//abrir la clase

public function modlibros(){//funcion de la clase
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
        echo "<h2 class='verde'>Conexion satisfactorio</h1>";
    }
//////////////////////////////////////////////////////////////////////////////////////

    if(isset($_POST['update'])){
        $sql = "UPDATE book SET isbn='{$_POST['isbn']}', title='{$_POST['title']}', author='{$_POST['author']}', stock={$_POST['stock']}, price={$_POST['price']} WHERE ID={$_POST['id']}";

        if (mysqli_query($conection, $sql)) {
            echo "Cambiado";
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
            <form action="./index.php?update=yes" method="POST" enctype="multipart/form-data">
                <p>Pon el ID del libro a cambiar e introuce los datos</p>
                <input type="text" name="id" placeholder="ID"/>
                <input type="text" name="isbn" placeholder="Isbn"/>
                <input type="text" name="title" placeholder="Title"/>
                <input type="text" name="author" placeholder="Author"/>
                <input type="text" name="stock" placeholder="Strock"/>
                <input type="text" name="price" placeholder="Price"/>
                <input type="submit" name="update" value="UPDATE"/>
            </form>
        </div>
    EOD;
    }
?>