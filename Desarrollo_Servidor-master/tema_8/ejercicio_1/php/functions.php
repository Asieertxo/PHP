<?php

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
    <body style="background-color:lightblue">
    <h1 style="background-color: lightcoral; color:white; border-left: white solid 5px">Log In</h1>
    <div style="background-color:white; border-left: lightcoral solid 5px">
        <img src="img/user.jpg" style="width:200px"><br><br>
        <form action="." method="POST" enctype="" style="width: 50%; margin: 0 auto; text-align: right">
            <label for="user_id">ID: </label>
            <input class="edited" type="text" id="user_id" name="user_id"><br><br>

            <label for="user_password">Contraseña: </label>
            <input class="edited" type="password" id="user_password" name="user_password"><br><br>
            <input class="button-text" type="submit" name="check"">
        </form>
        
    </div>  
    </body>
    </html>
END;
}


function authenthicate(){
    include("php/variables.php");

    if($_POST['user_password'] === $user_passwords_array[$_POST['user_id']]){
        header("Refresh: 1; url=php/verDatos.php");
    } else {
        $user_id = $_POST['user_id'];
        header("Refresh: 1; url=php/error.php?id=$user_id");
    }
}

?>
