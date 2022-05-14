<?php

function insertXML(){

    if(file_exists('./log.xml')){
        $xmlFile = simplexml_load_file('./log.xml');
    }else{
        echo "FalloXML";
    }
    $id = date('Y-m-d-h-h-s');
    $registro = $xmlFile -> addChild('insertLogs');
    $registro = $registro -> addChild('insertLog');
    $registro -> addChild('title', 'hola');

    file_put_contents("./log.xml", $xmlFile -> asXML());
}

?>