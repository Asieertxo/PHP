<?php

class Book extends Conexion{
    public $isbn;
    public $title;
    public $author;
    public $stock;
    public $price;
    
    public function __construct($isbn, $title, $author, $stock, $price){
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->stock = $stock;
        $this->price = $price;
    }

    public function connect(){
        try{
            $conn = new Conexion('./config.json');
            $conn = $conn->getConn();
            return $conn;
        }catch(PDOException $error){
            echo "No se pudo conectar" . $error->getMessage();
        }
    }

    public function selectBook($tabla){
        try{
            $conn = self::connect();
            $stmt = $conn->prepare("SELECT * FROM book");//saber si se puede meter book como parametro
                //$stmt->bindParam(':tabla', $tabla);
            $stmt->execute();
            return $stmt;
        }catch(PDOException $error){
            echo "No se han podido acceder a los datos" . $error->getMessage();
        }
    }

    public function selectByID($id){
        try{
            $conn = self::connect();
            $stmt = $conn->prepare("SELECT * FROM book WHERE id = :id");//saber si se puede meter book como parametro
                $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt;
        }catch(PDOException $error){
            echo "No se han podido acceder a los datos" . $error->getMessage();
        }
    }

    public function showBook(){
        $result = self::selectBook(10);

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
                    echo "<td><a class='verde' href='./index.php?boton=update&id=$registro[id]'>Modify</a><a class='rojo' href='./index.php?boton=delete&id=$registro[id]'>Delete</a></td>";
                echo "</tr>";
            }
            $result->closeCursor();
            echo "</table>";
        echo "<div>";
    }

    public function insertBook(){
        try{
            $conn = self::connect();
            $stmt = $conn->prepare("INSERT INTO book (isbn, title, author, stock, price) VALUES (:isbn, :title, :author, :stock, :price)");
                $stmt->bindParam(':isbn', $this->isbn);
                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':author', $this->author);
                $stmt->bindParam(':stock', $this->stock);
                $stmt->bindParam(':price', $this->price);
            $stmt->execute();

            echo "Libro subido con exito";
        }catch(PDOException $error){
            echo "No se subio" . $error->getMessage();
        }
    }

    public function deleteBook($id){
        try{
            $conn = self::connect();
            $stmt = $conn->prepare("DELETE FROM book WHERE id = :id");
                $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo "Libro borrado con exito";
        }catch(PDOException $error){
            echo "No se pudo borrar" . $error->getMessage();
        }
    }

    public function updateBook($id){
        try{
            $conn = self::connect();
            $stmt = $conn->prepare("UPDATE book SET isbn = :isbn, title = :title, author = :author, stock = :stock, price = :price WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':isbn', $this->isbn);
                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':author', $this->author);
                $stmt->bindParam(':stock', $this->stock);
                $stmt->bindParam(':price', $this->price);
            $stmt->execute();

            echo "Libro modificado con exito";
        }catch(PDOException $error){
            echo "No se subio" . $error->getMessage();
        }
    }

}

?>