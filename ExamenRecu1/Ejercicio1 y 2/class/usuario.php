<?php
require "./../class/conection.php";

class usuario{
    private $usuario;
    private $contraseña;

    public function isValido($usuario, $constraseña){
        $conexion = crearConexion();
        $sql = "SELECT * FROM `usuarios`";
        $result = mysqli_query($conexion, $sql);

        try{
            while($row = mysqli_fetch_assoc($result)){
                $this->usuario = $row['usuario'];
                $this->contraseña = $row['pass'];
                if($this->usuario == $usuario  &&  $this->contraseña == $constraseña){
                    return true;
                }else{
                    return false;
                }
            }
            //echo "usuarios bien";
        }catch(Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage();
        }
    }
}

//$usuarios = new usuario();
//$validar = $usuarios->isValido("admin", "df733656293a19c54f69093ba916f0a1a2a3c151fc95c13f3a794c2631eeb3a6");


?>