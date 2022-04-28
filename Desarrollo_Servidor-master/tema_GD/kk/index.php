<?php

function printForm(){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <h1>Pinta un cuadrado del color que quieras</h1>
        <div>
            <form action="." method="POST" enctype="application/x-www-form-urlencoded">
                <label for="user_color"></label>
                <input type="color" name="user_color" id="user_color">
                <input type="submit">
            </form>
        </div>   
    </body>
    </html>
END;
}

function printImg(){
    var_dump($_POST);
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div style="background-color: grey; padding: 1rem">
END;
    echo "<img src='php/img.php?color=" . $_POST['user_color'] . "' style='margin:  0 43.8%'>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
}



if(!isset($_POST['user_color'])){
    printForm();
} else {
    printImg();
}

?>