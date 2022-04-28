<?php


function printSelectTool(){
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
            <span>Seleccione la herramienta a usar: </span><br><br>
            
            <input type="radio" name="text_tool" id="search" value="search" checked>
            <label for="search">Buscar </label><br><br>
            
            <input type="radio" name="text_tool" id="replace" value="replace">
            <label for="replace">Buscar y reemplazar </label><br><br>

            <input type="radio" name="text_tool" id="position" value="position">
            <label for="position">Buscar posiciones </label><br><br>

            <input type="radio" name="text_tool" id="exists" value="exists">
            <label for="exists">¿Está en el texto? </label><br><br>
            
            <label for="text_to_search">Introduzca el texto en el que buscar: </label><br><br>
            <textarea name="text_to_search" id="text_to_search" cols="60" rows="10">El hombre, paso a paso, ha hecho su paisaje, amoldándolo a sus exigencias. Con esto, el campo ha seguido siendo campo, pero ha dejado de ser Naturaleza. Mas, al seleccionar las plantas y animales que le son útiles, ha empobrecido la Naturaleza original, lo que equivale a decir que ha tomado una resolución precipitada porque el hombre sabe lo que le es útil hoy, pero ignora lo que le será útil mañana.</textarea><br><br>
            <input type="submit" name="save" id="save">
        </form> 
    </div> 
    <br><br>
    <button class='bottom-btn'><a href='..'>Atrás</a></button>      
    </body>
    </html>
END;
}

function printFormForTool($text_tool){
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
END;
    if($text_tool == "replace"){
        echo<<<END
        <h1>Buscar y reemplazar</h1>
        <div>
            <form action="." method="post" enctype="multipart/form-data">
                <label for="word_to_search">Introduzca la palabra a buscar: </label><br>
                <input type="text" id="word_to_search" name="word_to_search"><br><br>
                <label for="replace_string">Introduzca la palabra de reemplazo: </label><br>
                <input type="text" id="replace_string" name="replace_string"><br><br>
                <label for="text_to_search">Texto en el que buscar: </label><br>
                <textarea name="text_to_search" id="text_to_search" cols="60" rows="10">$_POST[text_to_search]</textarea><br><br>
                <input type="submit" name="replace" id="replace">
            </form> 
            <br><br>
            <button class='bottom-btn'><a href='.'>Volver</a></button>
        </div>
END;
    } else {
        echo<<<END
        <h1>Búsqueda de palabras</h1>
        <div>
            <form action="." method="post" enctype="multipart/form-data">
                <label for="word_to_search">Introduzca la palabra a buscar: </label><br>
                <input type="text" id="word_to_search" name="word_to_search"><br><br>
                <label for="text_to_search">Texto en el que buscar: </label><br>
                <textarea name="text_to_search" id="text_to_search" cols="60" rows="10">$_POST[text_to_search]</textarea><br><br>
END;
        if($text_tool == "search"){
            echo "<input type='submit' name='search' id='search'>";
        } else if($text_tool == "position"){
            echo "<input type='submit' name='position' id='position'>";
        } else if($text_tool == "exists"){
            echo "<input type='submit' name='exists' id='exists'>";
        }
        echo "</form>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }
 
    echo "<br><br>";
    echo "<button class='bottom-btn'><a href='..'>Atrás</a></button>"; 
    echo "</body>";
    echo "</html>";
}

function printEditedText($needle, $replace_string, $edited_text){
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
    <div class='search'>
        <form action="." method="post" enctype="multipart/form-data">
            <label for="word_to_search">Palabra a buscar: </label><br>
            <input type="text" id="word_to_search" name="word_to_search" value="$needle"><br><br>
END;
    if(isset($_POST['replace_string'])){
        echo "<label for='replace_string'>Palabra de reemplazo: </label><br>";
        echo "<input type='text' id='replace_string' name='replace_string' value='$replace_string'><br><br>";
    }
    
    echo "<span>Texto en el que buscar: </span><br><br>";
    echo "<div contenteditable='true' class='edited_text'>$edited_text</div>";
    echo<<<END
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


function printError($error_message){  
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
END;
    echo "<span>$error_message</span><br><br>";
    echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</div>";
    echo "<br><br>";
    echo "<button class='bottom-btn'><a href='..'>Atrás</a></button>"; 
    echo "</body>";
    echo "</html>";
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

function printIfItExists($number_of_ocurrences){
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
    if($number_of_ocurrences>0){
        echo "<span>La palabra se ha encontrado en el texto $number_of_ocurrences veces</span><br>";
    } else {
        echo "<span>La palabra no se ha encontrado en el texto</span><br>";
    }
    echo "<br><br>";
    echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</div>"; 
    echo "<br><br>";
    echo "<button class='bottom-btn'><a href='..'>Atrás</a></button>";    
    echo "</body>";
    echo "</html>";
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
?>



