<?php

function setUserCookies(){
    $user_preferences = ['user_language' => $_POST['user_language'], 'user_color' => $_POST['user_color'], 'user_bcolor' => $_POST['user_bcolor']];
    $url = $_SERVER['PHP_SELF'];
    /*setcookie("language", $_POST['user_language'], time() + 5);
    setcookie("textColor", $_POST['user_color'], time() + 5);
    setcookie("backgroundColor", $_POST['user_bcolor'], time() + 5);*/

    setcookie("preferences", json_encode($user_preferences), time() + 5); //En vez de crear tres cookies se puede crear solo una que contenga un array
    header("Location: $url");
}

function printForm(){
    global $nameLanguage, $passwordLanguage;
    $preferences = json_decode($_COOKIE['preferences'], true);
    $name = $nameLanguage[$preferences['user_language']];
    $password = $passwordLanguage[$preferences['user_language']];
    $textColor = $preferences['user_color'];
    $backgroundColor = $preferences['user_bcolor'];
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
        <h1 style="color: $backgroundColor; background-color: $textColor">Log In</h1>
        <div style="color: $textColor; background-color: $backgroundColor">
            <form action="." method="post" enctype="application/x-www-form-urlencoded">
                <label for="user_name">$name: </label>
                <input type="text" name="user_name" id="user_name"><br><br>
                <label for="user_password">$password: </label>
                <input type="text" name="user_password" id="user_password"><br><br>
                <input type="submit" name="check">
            </form>
        </div>
    </body>
    </html>
END;
}

?>