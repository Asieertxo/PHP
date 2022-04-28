<?php

function printForm(){
    include ("php/variables.php");
    echo <<<END
    <div>
    <h2>Registrar imagen: </h2><br>
    <form action="." method="post" enctype="multipart/form-data">
    <label for="user_name">Introduzca su nombre: </label>
    <input type="text" id="user_name" name="user_name"><br><br>
    <label for="user_img">Fichero con su fotografía:</label>
    <input type="file" name="user_img" id="user_img"><br><br>
    <input type='submit' name='register'><br><br>
    </form>
    </div>   
    <div style= "margin-top:2rem">
    <h2>Buscar imagen: </h2><br>
    <form action="." method="post" enctype="application/x-www-form-urlencoded">
    <label for="search_user_name">Introduzca su nombre: </label>
    <input type="text" id="search_user_name" name="search_user_name"><br><br>
    <input type='submit' name='search'><br><br>
    </form>
    </div>
END;
}

function uploadFile(){
    if(is_uploaded_file($_FILES['user_img']['tmp_name'])){
    $dirName = "img/";
        if(is_dir($dirName)){ 
            //$file_id = time();
            $userName = deleteAccentMark(str_replace(" ", "", $_POST['user_name']));
            $fileName =  $userName /*. "-" . $file_id . "-" . $_FILES['user_img']['name']*/;
            $fullName = $dirName . $fileName;
            move_uploaded_file($_FILES['user_img']['tmp_name'], $fullName);
            echo "<div>";
            echo "<span>Fichero subido con éxito con el nombre $fullName</span><br><br>";
            echo "</div>";
            printImg($fullName);              
        } else printError("Directorio inexistente"); 
    } else printError("Suba un archivo por favor");    
}

function printImg($img_path){   
    echo "<div>";
        echo "<h2>Imagen</h2>";
        echo "<br><br>";
        if(isset($_POST['user_name'])){
            echo "<span><b>Nombre:</b> $_POST[user_name]</span><br><br>";
        }else echo "<span><b>Nombre:</b> $_POST[search_user_name]</span><br><br>";
        
        echo "<img class='user_img' src='$img_path'><br><br>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</div>";
}

function searchImg(){
    $user_img = "img/" . str_replace(" ", "", $_POST['search_user_name']);
    printImg($user_img);   
}

function printError($error_message){
    echo "<div>";
    echo "<span>$error_message</span><br><br>";
    echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
    echo "</div>";
}

function deleteAccentMark($str){
    $str = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $str
    );

    $str = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $str );

    $str = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $str );

    $str = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $str );

    $str = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $str );

    $str = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C'),
        $str
    );
    return $str;
}

?>