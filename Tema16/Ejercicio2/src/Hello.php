<?php
namespace lic\Hello;



class Hello{

public function sayHello($message){
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

    //determinamos los limites de la sentencia SQL
    $limit = 0;
    if(!empty($_GET['pag'])){
        $pag = $_GET['pag'];
    }else{
        $pag = 1;
    }
    $limit = $limit + (($pag -1) * 10);

    //vemos cuantas filas tiene en total
    $sql = "SELECT id, isbn, title, author, stock, price FROM book";
    $result = mysqli_query($conection, $sql);
    $n_rows = mysqli_num_rows($result);

    //sacamos solo 10 dependiendo del limit
    $sql_limit = "SELECT id, isbn, title, author, stock, price FROM book LIMIT $limit,10";
    $result_limit = mysqli_query($conection, $sql_limit);

    if ($n_rows > 0) {
        //pinta las filas sacadas con el limit
        echo "<div class='contenedor'>";
        echo "<table class='tabla'>";
        while($row = mysqli_fetch_assoc($result_limit)) {
            echo "<tr>";
                echo "<td><b>ID:</b> $row[id]</td>   ";
                echo "<td><b>ISBN:</b> $row[isbn]   </td>";
                echo "<td><b>Title:</b> $row[title]   </td>";
                echo "<td><b>Author:</b> $row[author]   </td>";
                echo "<td><b>Stock:</b> $row[stock]   </td>";
                echo "<td><b>Price:</b> $row[price]</td>";
            echo "</tr>";
        }
        echo "</table>";

        //determina cuantas paginas hay que añadir dependiendo de las filas totales
        if($n_rows > 10){
            $n_pag = 1;
            echo "<div class='paginas'>";
            echo "<a href='./index.php?pag=$n_pag'>$n_pag</a>";
            $n_rows = $n_rows -10;
            $n_pag = $n_pag + 1;
            do{
                echo "<a href='./index.php?pag=$n_pag'>$n_pag</a>";
                $n_rows = $n_rows -10;
                $n_pag = $n_pag + 1;
            }while($n_rows > 0);
            echo "</div>";
            
        }
        echo "</div>";
    }else{
        echo "0 results";
    }

    mysqli_close($conection);
        }
    }

?>

</body>