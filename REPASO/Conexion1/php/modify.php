<?php

function modify($conexion){
    if(!isset($_GET['modify'])){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
        }

        $sql = "SELECT id, isbn, title, author, stock, price FROM book WHERE id=$id";
        $result = $conexion->accion($sql);

        $registro = $result->fetch(PDO::FETCH_ASSOC);
        var_dump($registro);

        echo<<<EOD
            <div class='contenedor'>
                <h2>Elije Opciones</h2></br>
                <form action="./index.php?boton=modify&modify=yes" method="POST" enctype="multipart/form-data">
                    <p>Pon los datos del libro para modificar</p>
                    <input type="hidden" name="id" value="{$_GET['id']}"/>
                    <input type="number" name="isbn" value="$registro[isbn]"/>
                    <input type="text" name="title" value="$registro[title]"/>
                    <input type="text" name="author" value="$registro[author]"/>
                    <input type="number" name="stock" value="$registro[stock]"/>
                    <input type="number" name="price" value="$registro[price]"/>
                    <input type="submit" name="modify" value="MODIFY"/>
                </form>
            </div>
        EOD;
    }else{
        $sql = "UPDATE book SET isbn='{$_POST['isbn']}', title='{$_POST['title']}', author='{$_POST['author']}', stock={$_POST['stock']}, price={$_POST['price']} WHERE ID={$_POST['id']}";
        $result = $conexion->accion($sql);

        if($result){
            echo "Libro modificado con exito";//asi podemos meter las variables mas facil que sacando el texto desde la clase conexion
            header("Refresh:3; url=index.php");
        }//si falla ya da error el catch
    }
}

?>