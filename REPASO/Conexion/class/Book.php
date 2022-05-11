<?php

class Book extends Conexion{
    public $isbn;
    public $title;
    public $author;
    public $stock;
    public $price;
    
    public function __construct($title){
        $this->title = $title;
    }

    public function selectBook(){
        echo $this->title;
    }
}

?>