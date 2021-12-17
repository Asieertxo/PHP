<?php

class Book{
    private $id;
    private $titulo;
    private $editorial;
    private $año;

    public function __construct($id,$titulo, $editorial, $año){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->editorial = $editorial;
        $this->año = $año;
    }
}

$libro1 = new Book(1, "Libro1", "Anaya", 2013);
$libro2 = new Book(2, "Libro2", "Planeta", 2008);
$libro3 = new Book(3, "Libro3", "Santillana", 2002);


var_dump($libro1);
var_dump($libro2);
var_dump($libro3);

?>