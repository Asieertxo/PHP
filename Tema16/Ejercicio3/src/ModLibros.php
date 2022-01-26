<?php
namespace lic\ModLibros;//siempre al principio

class ModLibros{//abrir la clase

public function modlibros($conection){//funcion de la clase
    

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




}}

















    function formulario(){
        $id=0;
        if (isset($_GET['id'])){
            $id = $_GET['id'];
        }

        echo<<<EOD
        <div class='contenedor'>
            <h2>Elije Opciones</h2></br>
            <form action="./index.php?update=yes" method="POST" enctype="multipart/form-data">
                <p>Pon el ID del libro a cambiar e introuce los datos</p>
                <input type="number" name="id" value="{$id}"/>
                <input type="number" name="isbn" placeholder="Isbn"/>
                <input type="text" name="title" placeholder="Title"/>
                <input type="text" name="author" placeholder="Author"/>
                <input type="number" name="stock" placeholder="Strock"/>
                <input type="number" name="price" placeholder="Price"/>
                <input type="submit" name="update" value="UPDATE"/>
            </form>
        </div>
    EOD;
    }
?>