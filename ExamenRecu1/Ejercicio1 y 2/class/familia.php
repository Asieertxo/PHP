<?php


require "./conection.php";

class familia{
    private $codigo;
    private $nombreFamilia;

    public function recuperarFamilias(){
        $conexion = crearConexion();
        $sql = "SELECT * FROM `familias`";
        $result = mysqli_query($conexion, $sql);

        try{
            while($row = mysqli_fetch_assoc($result)){
                $this->codigo = $row['cod'];
                $this->nombreFamilia = $row['cod'];
                echo $this->codigo . " - " . $this->nombreFamilia . "<br>";
                
            }
            //echo "familias bien";
        }catch(Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }
}

$familia = new familia();
echo $familia->recuperarFamilias();
?>