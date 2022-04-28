<?php

function printForm(){
    include ("php/variables.php");
    echo<<<END
    <div class="cv_form_title">
    <form action="" method="post" enctype="multipart/form-data">
    <h2>Nombre y apellidos</h2>
    </div>
    <div class="cv_form">
    <label for="user_name">Introduzca su nombre: </label>
    <input type="text" id="user_name" name="user_name"><br><br>
    </div>
    <div class="cv_form_title">
    <h2>Fotografía</h2>
    </div>
    <div class="cv_form">
    <label for="user_img">Añadir un fichero con su fotografía:</label>
    <input type="file" name="user_img" id="user_img"><br><br>
    </div>
    <div class="cv_form_title">
    <h2>Sexo</h2>
    </div>
    <div class="cv_form">
    <span>Introduzca su sexo:</span><br><br>
    <input type='radio' name='user_gender' id='user_gender' value='hombre'>
    <label for='user_gender'> Hombre </label><br><br>
    <input type='radio' name='user_gender' id='user_gender' value='mujer'>
    <label for='user_gender'> Mujer </label><br><br>
    <input type='radio' name='user_gender' id='user_gender' value='NS/NC'>
    <label for='user_gender'> NS/NC </label><br><br>
    </div>
    <div class="cv_form_title">
    <h2>Edad</h2>
    </div>
    <div class="cv_form">
    <label for="user_age">Introduzca su edad: </label>
            <input type="number" name="user_age" id="user_age" placeholder='31'><br><br>
            <label for="user_birthday">Introduzca su fecha de nacimiento: </label>
            <input type="date" name="user_birthday" id="user_birthday" value='1990-10-09'><br><br>
    </div>
    <div class="cv_form_title">
    <h2>Idiomas</h2>
    </div>
    <div class="cv_form">
    <span>Introduzca su nivel en los siguientes idiomas: </span><br><br>
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
    echo<<<END
    </div>
    <div class="cv_form_title">
    <h2>Formación</h2>
    </div>
    <div class="cv_form">
    <label for="academic_data">Introduzca sus datos académicos: </label><br><br>
    <textarea name="academic_data" id="academic_data" rows="10" cols="80"></textarea>
    </div>
    <div class="cv_form_title">
    <h2>Experiencia laboral</h2>
    </div>
    <div class="cv_form">
    <label for="work_experience">Introduzca su experiencia laboral: </label><br><br>
    <textarea name="work_experience" id="work_experience" rows="10" cols="80"></textarea>
END;
    echo "<br><br>";
    echo "<input class='bottom-btn' type='submit' name='save'><br><br>";
    echo "</form>";
    echo "</div>";
}

function uploadFile(){
    if(is_uploaded_file($_FILES['user_img']['tmp_name'])){
    $dirName = "img/";
        if(is_dir($dirName)){ 
            $file_id = time();
            $fileName = $file_id . "-" . $_FILES['user_img']['name'];
            $fullName = $dirName . $fileName;
            move_uploaded_file($_FILES['user_img']['tmp_name'], $fullName);
            /*echo "<div>";
            echo "<span>Fichero subido con éxito con el nombre $fullName</span><br><br>";
            echo "</div>";*/
            printDetails($fullName);              
        } else printError("Directorio inexistente"); 
    } else printError("Suba un archivo por favor");    
}

function printDetails($img_path){   
    echo "<div style='min-width: 35%'>";
        echo "<h2>Datos personales</h2>";
        echo "<br><br>";
        echo "<div class='cv_display'>";
            echo "<div class='col-1-of-2'>";
                echo "<img class='user_img' src='$img_path'><br><br>";
            echo "</div>";
            echo "<div class='col-1-of-2'>";
                echo "<span><b>Nombre:</b> $_POST[user_name]</span><br><br>";
                echo "<span><b>Sexo:</b> $_POST[user_gender] </span><br><br>";
                echo "<span><b>Edad:</b> $_POST[user_age]</span><br><br>";
                echo "<span><b>Fecha de nacimiento:</b> $_POST[user_birthday]</span>";
            echo "</div>";
        echo "</div>";     
        echo "<div class='cv_display'>";
        echo "<hr>";
            echo "<div class='col-1-of-1'>";
                echo "<span><b>Idiomas:</b></span><br><br>";
                foreach($_POST['user_languages'] as $language){
                    echo "<span>$language</span><br><br>";
                }
                echo "<br><hr><br>";
                echo "<span><b>Datos académicos:</b></span><br><br>";
                echo "<span>". str_replace("\n", "<br>", $_POST['academic_data']) . "</span><br><br>";
                echo "<br><hr><br>";
                echo "<span><b>Experiencia laboral:</b></span><br><br>";
                echo "<span> ". str_replace("\n", "<br>", $_POST['work_experience']) . "</span><br>";
            echo "</div>";
            echo "<br><br>";
        echo "</div>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</div>";
}

function printError($error_message){
    echo "<div>";
    echo "<span>$error_message</span><br><br>";
    echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</div>";
}

?>