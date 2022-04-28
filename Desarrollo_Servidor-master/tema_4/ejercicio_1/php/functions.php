<?php

function search($needle, $haystack){
    $ocurrences_array = [];
    $number_of_ocurrences = substr_count($haystack, $needle);
    $initial_position = 0;
    while ($number_of_ocurrences > 0){
        $next_position = strpos($haystack, $needle, $initial_position);
        if($next_position !== false){
            $ocurrence_position = $next_position;
            $ocurrences_array[count($ocurrences_array)] = $next_position;
            $initial_position = $next_position + 1;
            $number_of_ocurrences--;
        }
    }
    printOcurrences($ocurrences_array);
}

function printForm(){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>
        <link rel="stylesheet" type="text/css" href="../css/index.css">
    </head>
    <body>
    <h1>Búsqueda de palabras</h1>
    <div>
        <form action="." method="post" enctype="multipart/form-data">
            <label for="word_to_search">Introduzca la palabra a buscar: </label><br>
            <input type="text" id="word_to_search" name="word_to_search"><br><br>
            <label for="text_to_search">Introduzca el texto en el que buscar: </label><br>
            <textarea name="text_to_search" id="text_to_search" cols="30" rows="10"></textarea><br><br>
            <input type="submit" name="save" id="save">
        </form> 
    </div> 
    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button>      
    </body>
    </html>
END;
}

function printOcurrences($ocurrences_array){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>
        <link rel="stylesheet" type="text/css" href="../css/index.css">
    </head>
    <body>
    <h1>Búsqueda de palabras</h1>
    <div>
END;
    if(empty($ocurrences_array)){
        echo "<span>No se han encontrado coincidencias</span><br><br>";
    }else {
        echo "<span>Posiciones en las que ha encontrado la palabra: </span><br><br>";
        foreach($ocurrences_array as $ocurrence){
            echo "<span>Posición: $ocurrence</span><br><br>";
        }
    }
    echo "<br><br>";
    echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</div>"; 
    echo "<br><br>";
    echo "<button class='bottom-btn'><a href='..'>Atrás</a></button>";    
    echo "</body>";
    echo "</html>";
}

?>