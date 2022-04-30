<?php


class Circulo extends Figura{

    public function __construct($color, int $radio){
       $this->color = $color;
       $this->radio = $radio;
    }

    public function calculoArea(){
        return 3.15 * pow($this->radio, 2);
    }

    public function __toString(){
        return
            "<h4>" . parent::textoFigura() . "</h4>
            <p>Un triangulo de $this->radio y un area de " . self::calculoArea() . "</p>
            <div class='imagen'><img src='./img/imgc.php?radio=$this->radio'></div>"
        ;
    }
}

?>