<?php

class Figura{
    public $color;
    public $base;
    public $altura;

    public function __construct($color, int $base, int $altura){
       $this->color = $color;
       $this->base = $base;
       $this->altura = $altura; 
    }

    public function textoFigura(){
        return
        "Esto es una figura de la clase Figura"
        ;
    }
}

?>