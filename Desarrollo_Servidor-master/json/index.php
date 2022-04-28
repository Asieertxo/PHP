<?php

$json1 = file_get_contents("colores1.json");

$array_json1 = json_decode($json1, true);

foreach($array_json1 as $color_array){
    foreach($color_array as $color){
        foreach($color as $key => $value){
            echo "$key : $value<br>";
        }
        echo "<br>";
    }
    echo "<br>";
}

$json2 = file_get_contents("colores2.json");

$array_json2 = json_decode($json2, true);

foreach($array_json2 as $color_array){
    foreach($color_array as $color){
        foreach($color as $key => $value){
            echo "$key : $value<br>";
        }
        echo "<br>";
    }
    echo "<br>";
}

$json3 = file_get_contents("colores3.json");

$json3_array = json_decode($json3, true);

foreach($json3_array as $key => $value){   
    echo "$key : $value<br>";    
}

?>