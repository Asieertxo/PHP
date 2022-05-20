<?php

function logXML($id, $isbn, $title, $author, $action){
    $s = "s";

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
    }
}

function insertinXML($id, $isbn, $title, $author){
    if(file_exists('./xml/log.xml')){
        $xmlFile = simplexml_load_file('./xml/log.xml');
    }else{
        echo "FalloXML";
    }

    $date = date('Y-m-d-h-h-s');
    $registro = $xmlFile->books->addChild('book');
    $registro -> addAttribute('ID', $id);
    $registro -> addChild('isbn', $isbn);
    $registro -> addChild('title', $title);
    $registro -> addChild('author', $author);
    $registro -> addChild('date', $date);

    file_put_contents("./xml/log.xml", $xmlFile -> asXML());
}

function deleteinXML($id){
    if(file_exists('./xml/log.xml')){
        $xmlFile = simplexml_load_file('./xml/log.xml');
    }else{
        echo "FalloXML";
    }

    $i = 0;
    foreach($xmlFile as $books){
        foreach($books as $book){
            foreach($book->attributes() as $a => $b){
                if($b == $id){
                    unset($book[0]);
                    continue(3);
                }
            }
        }
        $i++;
    }

    file_put_contents("./xml/log.xml", $xmlFile -> asXML());
}

?>