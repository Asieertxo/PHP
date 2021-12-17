<?php

class Header{
    private $titulo;
    private $color;

    public function __construct($titulo, $tema){
        $this->titulo = $titulo;
        $this->tema = $tema;
    }

    public function __toString(){
        return 
            "<style>
            *{
                margin: 0;
                padding: 10px 100px;
                box-sizing: boder-box;
              }
                div{
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    background-color: #C1BCDF;
                }
                h3{
                    padding: 30px;
                    margin: 30px;
                    color: blue;
                }
             </style>
            <div>
                <h3>$this->titulo</h3>
                <h3>$this->tema</h3>
            </div>";
    }
}

$header = new Header('Ejercicio1', 'Tema 15');

echo $header;

?>