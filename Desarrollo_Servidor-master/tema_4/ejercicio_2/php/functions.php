<?php

function replace($needle, $replace_string, $haystack){
    $edited_text = str_replace($needle, $replace_string, $haystack);       
    printOcurrences($edited_text);
}

/*function search_recur($needle, $haystack, $position){
    $ocurrences_array = [];
    $next_position = strpos($haystack, $needle, $position);
    echo $next_position;
    if($next_position === false){
        return [];
    }
    return array_merge($ocurrences_array, search_recur($needle, $haystack, $next_position++));
}*/

function selectOption(){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
        <link rel="stylesheet" type="text/css" href="../css/index.css">
    </head>
    <body>
    <h1>Editor de textos</h1>
    <div>
        <form action="." method="post" enctype="multipart/form-data">
            <span for="tool">Seleccione la herramienta a usar: </span><br><br>
            
            <input type="radio" name="tool" id="tool" value="search">
            <label for="tool">Buscar </label><br><br>
            
            <input type="radio" name="tool" id="tool" value="replace">
            <label for="tool">Buscar y rremplazar </label><br><br>
            
            <label for="text_to_search">Introduzca el texto en el que buscar: </label><br>
            <textarea name="text_to_search" id="text_to_search" cols="60" rows="10"></textarea><br><br>
            <input type="submit" name="save" id="save">
        </form> 
    </div> 
    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button>      
    </body>
    </html>
END;  
}



function printOcurrences($edited_text){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
        <link rel="stylesheet" type="text/css" href="../css/index.css">
    </head>
    <body>
    <h1>Búsqueda de palabras</h1>
    <div>
        <form action="." method="post" enctype="multipart/form-data">
            <label for="word_to_search">Introduzca la palabra a buscar: </label><br>
            <input type="text" id="word_to_search" name="word_to_search"><br><br>
            <label for="replace_string">Introduzca la palabra de reemplazo: </label><br>
            <input type="text" id="replace_string" name="replace_string"><br><br>
            <label for="text_to_search">Introduzca el texto en el que buscar: </label><br>
            <textarea name="text_to_search" id="text_to_search" cols="60" rows="10">$edited_text</textarea><br><br>
        </form> 
        <br><br>
        <button class='bottom-btn'><a href='.'>Volver</a></button> 
    </div> 
    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button>      
    </body>
    </html>
END;
}


function printForm(){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
        <link rel="stylesheet" type="text/css" href="../css/index.css">
    </head>
    <body>
    <h1>Búsqueda de palabras</h1>
    <div>
        <form action="." method="post" enctype="multipart/form-data">
            <label for="word_to_search">Introduzca la palabra a buscar: </label><br>
            <input type="text" id="word_to_search" name="word_to_search"><br><br>
            <label for="replace_string">Introduzca la palabra de reemplazo: </label><br>
            <input type="text" id="replace_string" name="replace_string"><br><br>
            <label for="text_to_search">Introduzca el texto en el que buscar: </label><br>
            <textarea name="text_to_search" id="text_to_search" cols="60" rows="10"></textarea><br><br>
            <input type="submit" name="save" id="save">
        </form> 
    </div> 
    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button>      
    </body>
    </html>
END;
}

?>