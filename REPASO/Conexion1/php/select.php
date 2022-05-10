<?php

function select($conexion){
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

?>