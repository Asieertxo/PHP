<!--Realizar un formulario en el que nos pide el nombre de un cliente, edad, 
fecha de nacimiento y todos los idiomas hable indicando nivel medio, alto o bajo.
Los posibles idiomas serán Ingles, Frances, Español, Italiano, Portugués-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" type="text/css" href="../../css/index.css">
</head>
<body>
    <h1>Datos personales</h1>
    <?php

    $languages_array = ["english" => "Inglés", "french" => "Francés", "spanish" => "Español", "italian" => "Italiano", "portuguese" => "Portugués"];
    $languages_level_array = ["high" => "alto", "medium" => "medio", "low" => "bajo", "null_level" => "nulo"];

    function printForm($languages_array, $languages_level_array){
        echo<<<END
        <div>
        <form action="." method="POST" enctype="application/x-www-form-urlencoded">
            <label for="user_name">Introduzca su nombre: </label>
            <input type="text" name="user_name" id="user_name"><br><br>
            <label for="user_age">Introduzca su edad: </label>
            <input type="number" name="user_age" id="user_age"><br><br>
            <label for="user_birthday">Introduzca su fecha de nacimiento: </label>
            <input type="date" name="user_birthday" id="user_birthday"><br><br>
END;
            foreach($languages_array as $language_key => $language){
                echo "<span><b>$language</b></span><br><br>";
                foreach($languages_level_array as $language_level_key => $language_level){
                    if($language_level == "nulo"){
                        echo "<label for='user_languages[]'>Nivel $language_level: </label>";
                        echo "<input type='checkbox' name='user_languages[]' id='user_languages[]' value='$language - $language_level' checked><br><br>";
                    } else{
                        echo "<label for='user_languages[]'>Nivel $language_level: </label>";
                        echo "<input type='checkbox' name='user_languages[]' id='user_languages[]' value='$language - $language_level'><br><br>";
                    }
                }
            }
        echo "<input type='submit' name='save'>";
        echo "</form>";
        echo "</div>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='..'>Atrás</a></button>";
    }

    function printInfo(){
        echo "<div>";
            echo "<br><br>";
            echo "<span><b>Nombre:</b> " . $_POST['user_name'] . "</span><br><br>";
            echo "<span><b>Edad:</b> " . $_POST['user_age'] . "</span><br><br>";
            echo "<span><b>Fecha de nacimiento:</b> " . $_POST['user_birthday'] . "</span><br><br>";
            echo "<span><b>Idiomas:</b></span><br><br>";
            foreach($_POST['user_languages'] as $language){
                echo "<span>$language</span><br><br>";
            }
            echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }

    function printError($error_message){
        echo "<div>";
        echo "<span>$error_message</span><br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }

    if(!isset($_POST['save'])){
        printForm($languages_array, $languages_level_array);
    } else if(empty($_POST['user_name']) or empty($_POST['user_age']) or empty($_POST['user_birthday'])){
        printError("Introduzca todos los datos por favor");
    } else{
        printInfo();
    }

    ?>
</body>
</html>
