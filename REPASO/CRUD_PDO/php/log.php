<?php
//solo hay que pasarle los datos a guardar y la accion a realizar
function logXML($id, $isbn, $title, $author, $action){
    $s = "s";
    $action = $action."Log";

    if(file_exists('./xml/log.xml')){
        $xmlFile = simplexml_load_file('./xml/log.xml');
    }else{
        echo "FalloXML";
    }
    $date = date('Y-m-d-h-h-s');
    $registro = $xmlFile->logs->{$action.$s}->addChild($action);
    $registro -> addAttribute('ID', $id);
    $registro -> addChild('isbn', $isbn);
    $registro -> addChild('title', $title);
    $registro -> addChild('author', $author);
    $registro -> addChild('date', $date);

    file_put_contents("./xml/log.xml", $xmlFile -> asXML());

    if($action == "insertLog"){
        insertinXML($id, $isbn, $title, $author);
    }elseif($action == "deleteLog"){
        deleteinXML($id);
    }elseif($action == "updateLog"){
        updateinXML($id, $isbn, $title, $author);
    }
}

function insertinXML($id, $isbn, $title, $author){
    if(file_exists('./xml/log.xml')){
        $xmlFile = simplexml_load_file('./xml/log.xml');
    }else{
        echo "FalloXML";
    }

    $registro = $xmlFile->books->addChild('book');
    $registro -> addAttribute('ID', $id);
    $registro -> addChild('isbn', $isbn);
    $registro -> addChild('title', $title);
    $registro -> addChild('author', $author);

    file_put_contents("./xml/log.xml", $xmlFile -> asXML());
}

function deleteinXML($id){
    if(file_exists('./xml/log.xml')){
        $xmlFile = simplexml_load_file('./xml/log.xml');
    }else{
        echo "FalloXML";
    }

    foreach($xmlFile as $books){
        foreach($books as $book){
            foreach($book->attributes() as $a => $b){
                if($b == $id){
                    unset($book[0]);
                    continue(3);
                }
            }
        }
    }

    file_put_contents("./xml/log.xml", $xmlFile -> asXML());
}

function updateinXML($id, $isbn, $title, $author){
    if(file_exists('./xml/log.xml')){
        $xmlFile = simplexml_load_file('./xml/log.xml');
    }else{
        echo "FalloXML";
    }

    foreach($xmlFile as $books){
        foreach($books as $book){
            foreach($book->attributes() as $a => $b){
                if($b == $id){
                    $book->isbn = $isbn;
                    $book->title = $title;
                    $book->author = $author;
                    continue(3);
                }
            }
        }
    }

    file_put_contents("./xml/log.xml", $xmlFile -> asXML());
}

?>