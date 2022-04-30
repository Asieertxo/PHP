<?php


class Triangulo extends Figura{

    public function __construct($color, int $base, int $altura){
       $this->color = $color;
       $this->base = $base;
       $this->altura = $altura;
    }

    public function calculoArea(){
        return $this->base * $this->altura / 2;
    }

    public function __toString(){
        return
            "<h4>" . parent::textoFigura() . "</h4>
            <p>Un triangulo de $this->base x $this->altura y un area de " . self::calculoArea() . "</p>
            <div class='imagen'><img src='./img/imgt.php?base=$this->base&altura=$this->altura'></div>
            <a href='index.php'>Atras</a>"
        ;
    }
}

?>