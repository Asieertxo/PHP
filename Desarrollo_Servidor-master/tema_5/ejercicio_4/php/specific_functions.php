<?php

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

function searchImg(){
    //include ("php/general_functions.php");
    $user_img = deleteAccentMark(str_replace(" ", "", $_POST['search_user_name']));
    echo $user_img;
    $img_folder_array = scandir("img/");
    print_r($img_folder_array);
    foreach ($img_folder_array as $folder_image){
        echo $folder_image;
        if(preg_match($folder_image, $user_img)){
            echo "sisisisisisissi";
            //printImg($user_img);
        }
    }
    printError("Imagen no encontrada");   
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
        $str 
    );

    $str = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $str 
    );

    $str = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $str 
    );

    $str = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $str 
    );

    $str = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C'),
        $str
    );
    return $str;
}

?>
