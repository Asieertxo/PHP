<?php

if(!isset($_POST['user']) && !isset($_POST['pass'])){
    echo formulario();
}else{
    if (file_exists('./usuarios.xml')){
        $xmlFile = simplexml_load_file("./usuarios.xml");
    }else{
        die ("Error al abrir el archivo XML");
    }

    foreach($xmlFile as $user){
        if($user -> pass == $_POST['pass']){
            if($user -> nombreUser == $_POST['user']){
                echo "validado";
                header("refresh:2; url=./selecion.php");
                die();
            }
        }
    }
    echo "Credenciales incorrectas";
}

function formulario(){
    echo <<<EOD
        <form action="./index.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="user" placeholder="usuario" required/></br>
            <input type="password" name="pass" placeholder="contraseña" required/></br>
            <input type="submit" name"login" value="login" />
        </form>
    EOD;
    }

?>