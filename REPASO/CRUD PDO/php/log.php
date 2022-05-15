<?php

function logXML($id, $isbn, $action){
    $s = "s";

    if(file_exists('./log.xml')){
        $xmlFile = simplexml_load_file('./log.xml');
    }else{
        echo "FalloXML";
    }
    $date = date('Y-m-d-h-h-s');
    $registro = $xmlFile->{$action.$s}->addChild($action);
    $registro -> addAttribute('ID', $id);
    $registro -> addChild('date', $date);
    $registro -> addChild('isbn', $isbn);
    $registro -> addChild('user', 'asier');

    file_put_contents("./log.xml", $xmlFile -> asXML());
}

?>