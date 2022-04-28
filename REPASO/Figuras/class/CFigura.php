<?php

class Figura{
    public $color;
    public $base;
    public $altura;

    public function textoFigura(){
        return
        "Esto es una figura de la clase Figura"
        ;
    }

    public function calculoArea(){
        return $this->base * $this->altura;
    }
}

?>