<?php

include("php/captcha.php");

function printForm(){
    $str = createCaptcha();
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 3</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div>
        <img src='img/img.png' alt='captcha'>
        <form action="." method='post' enctype="application/x-www-form-urlencoded">
        <label for="user_text">Introduzca el texto: </label>
        <input type="text" name="user_text" id="user_text">
        <input type="hidden" name="captcha_text" value="$str">
        <input type="submit" name="send">
    </form>
END;
    //echo $str;
    echo "</div>";      
    echo "</body>";
    echo "</html>";
}

function printSuccess(){
    echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
    echo "<img class='answer' src='img/good.jpg' alt='captcha'>";
}

function printError(){
    echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
    echo "<img class='answer' src='img/error.jpg' alt='captcha'>";
}

if(!isset($_POST['send'])){
    printForm();
} else if($_POST['user_text'] == $_POST['captcha_text']){
    printSuccess();
} else printError();

?>