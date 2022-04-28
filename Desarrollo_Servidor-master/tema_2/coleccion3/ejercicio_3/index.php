<!--Realizar un formulario en el que nos pide el nombre de un cliente, edad, 
fecha de nacimiento y todos los idiomas hable indicando nivel medio, alto o bajo.
Los posibles idiomas serán Ingles, Frances, Español, Italiano, Portugués
3.	Vamos a realizar un formulario de registro con los siguientes campos 

Nombre:
Direccion:
Fecha_naciminet:
Idiomas (check)
Sexo (radio)
Aficiones (Selectmultiple)
Color de fondo de la presentación 
Color de la letra

Cuando pulsa el botón enviar nos visualiza los datos con los colores seleccionados.
-->

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
    
    <?php

    $languages_array = ["english" => "Inglés", "french" => "Francés", "spanish" => "Español", "italian" => "Italiano", "portuguese" => "Portugués"];
    $languages_level_array = ["high" => "alto", "medium" => "medio", "low" => "bajo", "null_level" => "nulo"];
    $hobbies_array = ["Libros", "Deporte", "Naturaleza", "Cine/TV", "Viajes", "Jardinería", "Otras"];
    $passwords_array = ["11265" => "contraseña"];

    function printForm(){
        global $languages_array, $languages_level_array, $hobbies_array;
        echo<<<END
        <h1>Datos personales</h1>
        <div>
        <form action="." method="POST" enctype="application/x-www-form-urlencoded">
            <label for="user_name">Introduzca su nombre: </label>
            <input type="text" name="user_name" id="user_name" placeholder='Juan Gómez Sierra'><br><br>
            <label for="user_id">Introduzca su ID: </label>
            <input type="text" name="user_id" id="user_id" placeholder='12345'><br><br>
            <label for="user_password">Introduzca su contraseña: </label>
            <input type="password" name="user_password" id="user_password" placeholder='******'><br><br>
            <label for="user_age">Introduzca su edad: </label>
            <input type="number" name="user_age" id="user_age" placeholder='31'><br><br>
            <label for="user_birthday">Introduzca su fecha de nacimiento: </label>
            <input type="date" name="user_birthday" id="user_birthday" value='1990-10-09'><br><br>
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
        echo "<span>Introduzca su sexo:</span><br><br>";
        echo "<input type='radio' name='user_gender' id='user_gender' value='hombre'>";
        echo "<label for='user_gender'> Hombre </label><br><br>";
        echo "<input type='radio' name='user_gender' id='user_gender' value='mujer'>";
        echo "<label for='user_gender'> Mujer </label><br><br>";
        echo "<label for='user_hobbies[]'>Indique una o varias de sus aficiones (Control+click): </label>";
        echo "<select name='user_hobbies[]' size='". count($hobbies_array). "' multiple='multiple'>";
        foreach($hobbies_array as $hobbie){
            echo "<option selected='selected' value='$hobbie'>$hobbie</option>";
        }
        echo "</select><br><br>";
        echo "<label for='header_color'>Elija un color para la aplicación: </label>";
        echo "<input type='color' id='header_color' name='header_color' value='#3c7c9e'><br><br>";
        echo "<label for='letter_color'>Elija un color para la letra: </label>";
        echo "<input type='color' id='letter_color' name='letter_color' value='#dcfcf5'><br><br>";
        echo "<label for='music_volume'>Elija el volumen de la música: </label>";
        echo "<input type='range' id='music_volume' name='music_volume' min='0' max='10' value='5'><br><br>";
        echo "<input type='submit' name='save'>";
        echo "</form>";
        echo "</div>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='..'>Atrás</a></button>";
    }

    function printInfo(){
        echo "<h1 style='background-color: ". $_POST['header_color'] . "; color: ". $_POST['letter_color'] . "'>Datos personales</h1>";
        echo "<div>";
            echo "<br><br>";
            echo "<span><b>Nombre:</b> $_POST[user_name]</span><br><br>";
            echo "<span><b>Edad:</b> $_POST[user_age]</span><br><br>";
            echo "<span><b>Fecha de nacimiento:</b> $_POST[user_birthday]</span><br><br>";
            echo "<span><b>Idiomas:</b></span><br><br>";
            foreach($_POST['user_languages'] as $language){
                echo "<span>$language</span><br><br>";
            }
            echo "<span><b>Sexo:</b> " . $_POST['user_gender'] . "</span><br><br>";
            echo "<span><b>Aficiones: </b></span>";
            foreach($_POST['user_hobbies'] as $key => $hobbie){
                if($key == count($_POST['user_hobbies'])-1){
                    echo "<span>$hobbie.</span>";
                }else echo "<span>$hobbie, </span>";
            }
            echo "<br><br>";
            echo "<span><b>Volumen de la música:</b> $_POST[music_volume]</span>";
            echo "<br><br>";
            echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }

    function printError($error_message){
        echo "<h1>Datos personales</h1>";
        echo "<div>";
        echo "<span>$error_message</span><br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }

    function checkUser($user_id, $user_password, $passwords_array){
        if($passwords_array[$user_id] == $user_password){
            printInfo();
        }
        else printError("Fallo de autenticación, vuelva a intentarlo por favor");
    }

    if(!isset($_POST['save'])){
        printForm();
    } else if(empty($_POST['user_name']) or empty($_POST['user_age']) or empty($_POST['user_birthday']) or empty($_POST['user_gender']) or empty($_POST['user_hobbies'])){
        printError("Introduzca al menos una opción de todos los datos por favor");
    } else if($_POST['user_age']<0 or $_POST['user_age']>120){
        printError("Introduzca una edad válida por favor");
    } else{
        checkUser($_POST['user_id'], $_POST['user_password'], $passwords_array);
    }

    ?>
</body>
</html>