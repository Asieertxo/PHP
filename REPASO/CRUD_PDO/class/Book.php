<?php

class Book extends Conexion{
    public $isbn;
    public $title;
    public $author;
    public $stock;
    public $price;
    
    public function __construct($isbn = null, $title = null, $author = null, $stock = null, $price = null){
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->stock = $stock;
        $this->price = $price;

        parent::__construct();
    }


    public function selectBook($order, $option, $select, $signo){
        try{
            if($option == null && $select == null){
                $stmt = $this->conn->prepare("SELECT * FROM book ORDER BY $order");//order no deja meterlo como parametro
            }else{
                if($signo == null){
                    $stmt = $this->conn->prepare("SELECT * FROM book WHERE $option = :select");//option no deja meterlo como parametro
                    $stmt->bindParam(':select', $select);
                }else{
                    $stmt = $this->conn->prepare("SELECT * FROM book WHERE $option $signo :select");//signo no deja meterlo como parametro
                    $stmt->bindParam(':select', $select);
                }
            }
            $stmt->execute();
            return $stmt;
        }catch(PDOException $e){
            if($e->getCode() == '42S02'){
                echo "NO SE HAN ENCONTRADO DATOS, introduciendo...<br><br>" . $e->getMessage();
                sleep(3);
                self::insertData();
                die();
            }else{
                echo $e->getCode();
            }
            
        }
    }

    public function selectByID($id){
        try{    
            $stmt = $this->conn->prepare("SELECT * FROM book WHERE id = :id");//saber si se puede meter book como parametro
                $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt;
        }catch(PDOException $e){
            echo "No se han podido acceder a los datos" . $e->getMessage();
        }
    }

    public function showBook($order, $option = null, $select = null, $signo = null){
        $result = self::selectBook($order, $option, $select, $signo);
        echo "<h1>Bienvenido " . $_SESSION['name'] . "</h1>";
        echo "<div class='contenedor'>";
            if($_SESSION['name'] == 'asier'){
                echo "<a class='verde boton' href='./index.php?boton=insert'>ADD +</a>";
            }
            echo "<a class='verde boton' href='./index.php?boton=search'>Search</a>";
            echo "<table class='tabla'>";
                echo "<tr>";
                    echo "<td><b><a href='./index.php?order=id'>ID:</a></b></td>";
                    echo "<td><b><a href='./index.php?order=isbn'>ISBN:</a></b></td>";
                    echo "<td><b><a href='./index.php?order=title'>Title:</a></b></td>";
                    echo "<td><b><a href='./index.php?order=author'>Author:</a></b></td>";
                    echo "<td><b><a href='./index.php?order=stock'>Stock:</a></b></td>";
                    echo "<td><b><a href='./index.php?order=price'>Price:</a></b></td>";
                    if($_SESSION['name'] == 'asier'){
                        echo "<td><b>Modificar:</b></td>";
                    }
                echo "</tr>";
            while($registro = $result->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                    echo "<td>$registro[id]</td>";
                    echo "<td>$registro[isbn]</td>";
                    echo "<td>$registro[title]</td>";
                    echo "<td>$registro[author]</td>";
                    echo "<td>$registro[stock]</td>";
                    echo "<td>$registro[price]???</td>";
                    if($_SESSION['name'] == 'asier'){
                        echo "<td><a class='verde' href='./index.php?boton=update&id=$registro[id]'>Modify</a><a class='rojo' href='./index.php?boton=delete&id=$registro[id]&isbn=$registro[isbn]&title=$registro[title]&author=$registro[author]'>Delete</a></td>";
                    }
                echo "</tr>";
            }
            $result->closeCursor();
            echo "</table>";
        echo "<div>";
        echo "<a href='./index.php?sdestroy=destroy'>Cerrar Sesion</a>";
        echo "<a href='./index.php?cookies=getcookies'>Conf</a>";
        echo "<a href='./index.php'>Refresh</a>";
    }

    public function insertBook(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO book (isbn, title, author, stock, price) VALUES (:isbn, :title, :author, :stock, :price)");
                $stmt->bindParam(':isbn', $this->isbn);
                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':author', $this->author);
                $stmt->bindParam(':stock', $this->stock);
                $stmt->bindParam(':price', $this->price);
            $stmt->execute();

            $id = $this->conn->prepare("SELECT MAX(id) FROM book");//obetener el id del libro subido para el XML
            $id->execute();
            $id = $id->fetchAll();
            $id =$id[0][0];

            logXML($id, $this->isbn, $this->title, $this->author, 'insertLog');
            echo "Libro subido con exito";
        }catch(PDOException $error){
            echo "No se subio" . $error->getMessage();
        }
    }

    public function deleteBook($id, $isbn, $title, $author){
        try{
            $stmt = $this->conn->prepare("DELETE FROM book WHERE id = :id");
                $stmt->bindParam(':id', $id);
            $stmt->execute();

            logXML($id, $isbn, $title, $author, 'deleteLog');
            echo "Libro borrado con exito";
        }catch(PDOException $error){
            echo "No se pudo borrar" . $error->getMessage();
        }
    }

    public function updateBook($id){
        try{
            $stmt = $this->conn->prepare("UPDATE book SET isbn = :isbn, title = :title, author = :author, stock = :stock, price = :price WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':isbn', $this->isbn);
                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':author', $this->author);
                $stmt->bindParam(':stock', $this->stock);
                $stmt->bindParam(':price', $this->price);
            $stmt->execute();

            logXML($id, $this->isbn, $this->title, $this->author, 'updateLog');
            echo "Libro modificado con exito";
        }catch(PDOException $error){
            echo "No se subio" . $error->getMessage();
        }
    }

    public function insertData(){
        $query = '';
        $sqlScript = file('./Libros.sql');
        foreach ($sqlScript as $line)   {
        
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
        
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '*/' || $startWith == '//') {
                continue;
            }
                
            $query = $query . $line;
            if ($endWith == ';') {
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                $query= '';            
            }
        }

        $result = self::selectBook('id');//hay que decirle que lo ordene por el ID
        while($registro = $result->fetch(PDO::FETCH_ASSOC)){
            insertinXML($registro['id'], $registro['isbn'], $registro['title'], $registro['author']);
        }

        echo '<div class="success-response sql-import-response">SQL file imported successfully</div>';
        header("Refresh:3; url=index.php");
    }

}

?>