<?php

class Costumer{
    private $id;
    private $nombre;
    private $apellidos;
    private $correo;

    public function __construct($id,$nombre, $apellidos, $correo){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
    }
}

$cliente1 = new Costumer(23458907, "Pablo", "Perez", "pablo@perez.com");
$cliente2 = new Costumer(76234767, "Ana", "Lopez", "ana@lopez.com");
$cliente3 = new Costumer(78236477, "Carlos", "Garcia", "carlos@garcia.com");


var_dump($cliente1);
var_dump($cliente2);
var_dump($cliente3);

?>