<?php
require "./book.php";


$book1 = new Book('Asier','Libro1', null);
$book2 = new Book('Maria','Libro2', null);
$book3 = new Book('Juan','Libro3', null);

$books = array($book1, $book2, $book3);

for($i=0; $i<3; $i++){
    echo $books[$i];
}
?>