<?php
namespace lic\DeleteLibros;//siempre al principio

class DeleteLibros{//abrir la clase

public function deletelibros($conection){//funcion de la clase


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




}}






    

    function formulario(){
        $id=0;
        if (isset($_GET['id'])){
            $id = $_GET['id'];
        }

        echo<<<EOD
        <div class='contenedor'>
            <h2>Elije Opciones</h2></br>
            <form action="./index.php" method="POST" enctype="multipart/form-data">
                <p>Pon el ID del libro a borrar: </p>
                <input type="number" name="id" value="{$id}"/>
                <input type="submit" name="delete" value="DELETE"/>
            </form>
        </div>
EOD;
    }
?>