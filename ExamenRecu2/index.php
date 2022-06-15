<?php
function autocarga($clase){
    require "./class/" . $clase . ".php";
}
spl_autoload_register('autocarga');






if(isset($_POST['login'])){
    $user = new Usuario($_POST['user'], $_POST['pass']);
    if($user->UserExists() != null){
        session_start();
        header("Refresh:0; url=./php/Listar.php?origen=index");
    }else{
        echo "Usuario incorrecto";
    }
    
}else{
    formulario();
}



function formulario(){
    echo<<<EOD
        <form action="./index.php?boton=insert" method="POST" enctype="multipart/form-data">
            <p>Iniciar sesion</p>
            <input type="text" name="user" placeholder="usuario"/>
            <input type="number" name="pass" placeholder="pass"/>
            <input type="submit" name="login" value="LOGIN"/>
        </form>
    EOD;
}
?>