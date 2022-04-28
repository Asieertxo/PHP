<?php
/*EjERCICIOS DE COOKIES
1. Se debe hacer una pequeña aplicación donde al entrar nos pegunta el idioma con el que vamos a trabajar, el color de la fuente y el color de fondo de toda nuestra aplicación.

Una vez seleccionado todo, accedemos a ver_formulario.php  que nos visualiza el mismo formulario en distintos idiomas según el valor de la cookie que hemos creado.

La cookie no debe ser eliminada cuando cerramos el navegador, así tendremos configurado el entorno siempre que entremos en nuestra maquina.

El formulario debe ser pintado dinámicamente, cogiendo las palabras de un array , que estarán en distintos idiomas según la cookie que nos pidió.*/

include("php/variables.php");
include("php/functions.php");

function cookiesForm(){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio cookies</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Cookies configuration</h1>
        <div>
            <form action="." method="post" enctype="application/x-www-form-urlencoded">
                <span>Select a language: </span><br>
                <label>Spanish: 
                    <input type="radio" name="user_language" value="spanish">
                </label><br>
                
                <label>English: 
                    <input type="radio" name="user_language" value="english">
                </label><br>
                
                <label>French: 
                    <input type="radio" name="user_language" value="french">
                </label><br>
                
                <label>Italian: 
                    <input type="radio" name="user_language" value="italian">
                </label><br>
                
                <label>German: 
                    <input type="radio" name="user_language" value="german">
                </label><br><br>
                
                <label for="user_color">Text color: </label>
                <input type="color" name="user_color" id="user_color"><br><br>
                <label for="user_bcolor">Background color: </label>
                <input type="color" name="user_bcolor" id="user_bcolor"><br><br>
                <input type="submit" name="send" value="Send">
            </form>
        </div>
    </body>
    </html>
END;
    if(isset($_POST['send'])){
        setUserCookies();
    }
}

if(!isset($_COOKIE['preferences'])){
    cookiesForm();
} else printForm();

?>