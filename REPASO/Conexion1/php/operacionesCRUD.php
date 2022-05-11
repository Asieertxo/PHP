<?php

function selectBook($conexion){
    $sql = "SELECT id, isbn, title, author, stock, price FROM book";
    $num = $conexion->accion($sql);
    //$num = $result;
    $num = $num->fetchAll();
    $num = count($num);
    var_dump($num);
    $limit = 20;



    $sql = "SELECT id, isbn, title, author, stock, price FROM book LIMIT $limit";
    $result = $conexion->accion($sql);

    echo "<dic class='contenedor'>";
    echo "<a class='verde boton' href='./index.php?boton=insert'>ADD +</a>";
    echo "<table class='tabla'>";
    echo "<tr>";
        echo "<td><b>ID:</b></td>   ";
        echo "<td><b>ISBN:</b></td>";
        echo "<td><b>Title:</b></td>";
        echo "<td><b>Author:</b></td>";
        echo "<td><b>Stock:</b></td>";
        echo "<td><b>Price:</b></td>";
        echo "<td><b>Modificar:</b></td>";
    echo "</tr>";
    while($registro = $result->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
            echo "<td>$registro[id]</td>";
            echo "<td>$registro[isbn]</td>";
            echo "<td>$registro[title]</td>";
            echo "<td>$registro[author]</td>";
            echo "<td>$registro[stock]</td>";
            echo "<td>$registro[price]€</td>";
            echo "<td><a class='verde' href='./index.php?boton=modify&id=$registro[id]'>Modify</a><a class='rojo' href='./index.php?boton=delete&id=$registro[id]'>Delete</a></td>";
        echo "</tr>";
    }
    $result->closeCursor();
    echo "</table>";
    do{
        echo "<a>1</a>";
        $limit = $limit + 10;
    }while($num > $limit);
    echo "<div>";
}



function deleteBook($conexion){
    $id = $_GET['id'];
    $sql = "DELETE FROM `book` WHERE `id`= $id";
    $result = $conexion->accion($sql);

    if($result){
        echo "Libro borrado con exito";//da exito aun cuando borra un libro que no existia
        header("Refresh:3; url=index.php");
    }
}



function insertBook($conexion){
    if(!isset($_GET['insert'])){
        echo<<<EOD
            <div class='contenedor'>
                <h2>Elije Opciones</h2></br>
                <form action="./index.php?boton=insert&insert=yes" method="POST" enctype="multipart/form-data">
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
    }else{
        $sql = "INSERT INTO `book` ( `isbn`, `title`, `author`, `stock`, `price`) VALUES ('{$_POST['isbn']}', '{$_POST['title']}', '{$_POST['author']}', {$_POST['stock']}, {$_POST['price']})";
        $result = $conexion->accion($sql);

        if($result){
            echo "Libro subido con exito";//asi podemos meter las variables mas facil que sacando el texto desde la clase conexion
            header("Refresh:3; url=index.php");
        }//si falla ya da error el catch
    }
}



function modifyBook($conexion){
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