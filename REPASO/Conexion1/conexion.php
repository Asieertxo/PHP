<?php




class conexion{
    private $user = "root";
    private $pass = "root";
    private $dbname = "inmobiliaria";
    private $server = "localhost";

    function conectar(){

        $busqueda = "piso";

        try{
            $pdo = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass);
            echo "Conexion correcta </br></br>";

            $pdo->exec("SET CHARACTER SET utf8");

            $sql = "SELECT tipo FROM viviendas WHERE tipo = ?";
            $resultado = $pdo->prepare($sql);
            $resultado->execute(array($busqueda));

            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                echo "Tipo " . $registro['tipo']. "</br>";
            }
            $resultado->closeCursor();
        }catch(PDOException $error){
            echo "No se conecto" . $error->getMessage();
        }
        
    }
}

$conexion = new conexion();
$conexion->conectar();

?>