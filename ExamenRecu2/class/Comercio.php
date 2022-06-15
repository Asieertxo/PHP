<?php

class Comercio extends Conexion{
    public function __construct(){

        parent::__construct();
    }

    public function selectProducts(){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM ecomm_products");
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

    public function showProducts(){
        $result = self::selectProducts();
        echo "<table>";
            echo "<tr>";
                echo "<td>Code</td>";
                echo "<td>Name</td>";
                echo "<td>Description</td>";
                echo "<td>Price</td>";
                echo "<td>Comprar</td>";
                echo "<td>Comprar</td>";
            echo "</tr>";
        echo "<form action='./view_cart.php?comprar=anadir' method='POST' enctype='multipart/form-data'>";
        while($registro = $result->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
                echo "<td>$registro[product_code]</td>";
                echo "<td>$registro[name]</td>";
                echo "<td>$registro[description]</td>";
                echo "<td>$registro[price]</td>";
                echo "<td><input type='hidden' name='name[]' value='$registro[name]'/></td>";
                echo "<td><input type='hidden' name='description[]' value='$registro[description]'/></td>";
                echo "<td><input type='hidden' name='price[]' value='$registro[price]'/></td>";
                echo "<td><input type='number' name='cant[]'/></td>";
                echo "<td><input type='checkbox' name='codigo[]' value='$registro[product_code]'/></td>";
            echo "</tr>";

        }
        $result->closeCursor();
        echo "</table>";
        echo "<input type='submit' name='comprar' value='Comprar'/>";
        echo "</form>";
    }

    public function insertData(){
        require "./../php/sql.php";
        $query = query1();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $query = query3();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $query = query2();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $query = insert_productos();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        header("Refresh:0; url=./../php/Listar.php?origen=index");
    }

}

?>