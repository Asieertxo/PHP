<?php


class Cuadrado extends Figura{

    public function __construct($color, int $base, int $altura){
       $this->color = $color;
       $this->base = $base;
       $this->altura = $altura;
    }

    public function __toString(){
        return
            "<h4>" . parent::textoFigura() . "</h4>
            <p>Un cuadrado de $this->base x $this->altura y un area de " . parent::calculoArea() . $this->color. "</p>
            <div class='imagen'><img src='./img/img.php?base=$this->base&altura=$this->altura&color=$this->color'></div>
            <a href='index.php'>Atras</a>"
        ;
    }
}

?>