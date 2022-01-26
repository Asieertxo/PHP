<?php
namespace lic\SubirLibros;//siempre al principio

class SubirLibros{//abrir la clase

public function subirlibros($conection){//funcion de la clase
    

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

}}
//////////////////////////////////////////////////////////////////////////////////////







    function formulario(){
        echo<<<EOD
        <div class='contenedor'>
            <h2>Elije Opciones</h2></br>
            <form action="./index.php?insert=yes" method="POST" enctype="multipart/form-data">
                <p>Pon los datos del libro para subir</p>
                <input type="number" name="isbn" placeholder="Isbn"/>
                <input type="text" name="title" placeholder="Title"/>
                <input type="text" name="author" placeholder="Author"/>
                <input type="number" name="stock" placeholder="Strock"/>
                <input type="number" name="price" placeholder="Price"/>
                <input type="submit" name="insert" value="INSERT"/>
            </form>
        </div>
    EOD;
    }
?>