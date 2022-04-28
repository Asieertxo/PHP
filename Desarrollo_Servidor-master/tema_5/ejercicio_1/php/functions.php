<?php

function printForm(){
        echo<<<END
        <div>
            <span>Inserción de la fotografía del usuario:</span>
            <br><br>
            <form action="." method="POST" enctype="multipart/form-data">
            <label for="user_name">Nombre usuario:</label>
            <input type="text" id="user_name" name="user_name"><br><br>
            <label for="user_img">Fichero con su fotografía:</label>
            <input type="file" name="user_img" id="user_img"><br><br>
            <input type="submit" name="save">  
            </form>
        </div>
END;
}

function uploadFile(){

    if(is_uploaded_file($_FILES['user_img']['tmp_name'])){
        echo "<div>";
        echo "<span>Name: " . $_FILES['user_img']['name'] . "</span><br><br>";
        echo "<span>Tmp_name: " . $_FILES['user_img']['tmp_name'] . "</span><br><br>";
        echo "<span>Type: " . $_FILES['user_img']['type'] . "</span><br><br>";
        echo "<span>Size: " . $_FILES['user_img']['size'] . "</span><br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button><br>";      
        $dirName = "img/";
        if(is_dir($dirName)){
            $file_id = time();
            $fileName = $file_id . "-" . $_FILES['user_img']['name'];
            $fullName = $dirName . $fileName;
            move_uploaded_file($_FILES['user_img']['tmp_name'], $fullName);
            echo "<span>Fichero subido con éxito con el nombre $fullName</span>";
            echo "</div>";
        }else printError("Directorio inexistente");       
    } else printError("Suba un archivo por favor");
    
}

function printError($error_message){
    echo "<div>";
    echo "<span>$error_message</span><br><br>";
    echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</div>";
}

?>