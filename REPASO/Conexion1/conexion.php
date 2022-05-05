<?php



class Conexion{
    private $user = "root";
    private $pass1 = "root";
    private $pass2 = "";
    private $dbname = "libros";
    private $server = "localhost";

    private $pdo;
    private $sql;
    private $resultado;

    function conectar(){
        try{
            $this->pdo = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass1);
            echo "Conexion correcta </br></br>";
        }catch(PDOException $error){
            try{
                $this->pdo = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass2);
                echo "Conexion correcta </br></br>";
            }catch(PDOException $error){
                echo "No se conecto" . $error->getMessage();
            }
        }
    }

    function accion($sql){
        try{
            $this->sql = $sql;
            $this->resultado = $this->pdo->prepare($this->sql);
            $this->resultado->execute();

            return $this->resultado;
        }catch(PDOException $error){
            die("Error en la accion ---- " . $error->getMessage());
        }
    }
}












/*class conexion{
    private $user = "root";
    private $pass = "root";
    private $dbname = "inmobiliaria";
    private $server = "localhost";

    function conectar(){
        $busqueda1 = "piso";
        $busqueda2 = "Pozuelo";

        try{
            $pdo = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass);
            echo "Conexion correcta </br></br>";

            $pdo->exec("SET CHARACTER SET utf8");

            $sql = "SELECT tipo, zona FROM viviendas WHERE tipo = :tipo AND zona = :zona";
            $resultado = $pdo->prepare($sql);
            $resultado->execute(array(":tipo"=>$busqueda1, ":zona"=>$busqueda2));

            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                echo "Tipo " . $registro['tipo'] . ", zona " . $registro['zona'] .   "</br>";
            }
            $resultado->closeCursor();
            
        }catch(PDOException $error){
            echo "No se conecto" . $error->getMessage();
        }
    }
}*/
?> 