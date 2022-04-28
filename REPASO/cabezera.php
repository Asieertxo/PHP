<?php

class Cabezera{
    const ASIGNATURA = "Desarrollo Servidor";
    public $tema;
    public $ejercicio;
    public $titulo;
    const COLOR = 'green';

    public function __construct($tema, $ejercicio, $titulo){
       $this->tema = $tema;
       $this->ejercicio = $ejercicio;
       $this->titulo = $titulo;
    }

    public function __toString(){
        return
        "<style>
        *{
            margin: 0;
            padding: 10px 100px;
            box-sizing: boder-box;
          }
            .cabezera{
                padding: 0;
                display: flex;
                justify-content: center;
                background-color: ".self::COLOR.";
            }
            h3{
                padding: 30px;
                margin: 30px;
                color: black;
            }
        </style>
        <div class='cabezera'>
            <h3>".self::ASIGNATURA."</h3>
            <h3>$this->tema</h3>
            <h3>$this->ejercicio</h3>
            <h3>$this->titulo</h3>
        </div>
        ";
    }
    /*public function ff(){
        var_dump(self::ASIGNATURA);
    }*/
    

}


//$cabezera = new Cabezera('Repaso', 'Ejercicio 2', 'Cabezera');
//echo $cabezera;
//$cabezera->ff();


?>