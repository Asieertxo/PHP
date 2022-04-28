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
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Pinta un cuadrado del color que quieras</h1>
        <div>
            <form action="php/img.php" method="POST" enctype="application/x-www-form-urlencoded">
                <label for="user_color"></label>
                <input type="color" name="user_color" id="user_color">
                <input type="submit">
            </form>
END;
    if(isset($_GET['image'])){
            printImg();
    }
    echo<<<END
        </div>   
    </body>
    </html>
END;
}

function printImg(){
    echo "<img src='img/img.png' style='margin:  0 35%'>";
}




 if(isset($_GET['image'])){
    printForm();
} else if(!isset($_POST['user_color'])){
    printForm();
}
?>