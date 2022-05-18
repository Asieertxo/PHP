<?php

if(file_exists('./log.xml')){
    $xmlFile = simplexml_load_file('./log.xml');
}else{
    echo "FalloXML";
}

foreach($xmlFile as $books){
    foreach($books as $book){
        var_dump($book);
        var_dump($book->attributes());
        foreach($book->attributes() as $a => $b){
            if($b == 5){
                echo "bieeeen";
            }
        }
        echo "</br>----------------------------------------</br></br>";
    }
}


?>