<?php

function printForm(){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 4</title>
        <link rel="stylesheet" href="../css/index.css">
    </head>
    <body>
        <h1>Ejercicio 4</h1>
        <div>
        <h2>Registrar imagen: </h2><br>
        <form action="." method="post" enctype="multipart/form-data">
        <label for="user_name">Introduzca su nombre: </label>
        <input type="text" id="user_name" name="user_name"><br><br>
        <label for="user_img">Fichero con su fotografía:</label>
        <input type="file" name="user_img" id="user_img"><br><br>
        <input type='submit' name='register'><br><br>
        </form>
        </div>   
        <div style= "margin-top:2rem">
        <h2>Buscar imagen: </h2><br>
        <form action="." method="post" enctype="application/x-www-form-urlencoded">
        <label for="search_user_name">Introduzca su nombre: </label>
        <input type="text" id="search_user_name" name="search_user_name"><br><br>
        <input type='submit' name='search'><br><br>
        </form>
        </div>
        <br><br>
        <button class='bottom-btn'><a href='..'>Atrás</a></button> 
    </body>
    </html>
END;
}

function printImg($img_path){ 
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 4</title>
        <link rel="stylesheet" href="../css/index.css">
    </head>
    <body>
        <h1>Ejercicio 4</h1>
END;
    echo "<div>";
    echo "<h2>Imagen</h2>";
    echo "<br><br>";
    if(isset($_POST['user_name'])){
        echo "<span><b>Nombre:</b> $_POST[user_name]</span><br><br>";
    }else echo "<span><b>Nombre:</b> $_POST[search_user_name]</span><br><br>";
    
    echo "<img class='user_img' src='$img_path'><br><br>";
    echo "<br><br>";
    echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</div>";
    echo "<br><br>";
    echo "<button class='bottom-btn'><a href='..'>Atrás</a></button>";
    echo "</body>";
    echo "</html>";
}

function printError($error_message){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 4</title>
        <link rel="stylesheet" href="../css/index.css">
    </head>
    <body>
        <h1>Ejercicio 4</h1>
END;
    echo "<div>";
    echo "<span>$error_message</span><br><br>";
    echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</div>";
    echo "<br><br>";
    echo "<button class='bottom-btn'><a href='..'>Atrás</a></button>";
    echo "</body>";
    echo "</html>";
}

?>