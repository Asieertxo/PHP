<?php
include './php/funciones.php';


session_start();
if (!isset($_SESSION['id'])){//¿No está ya acreditado?
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni']) && isset($_POST['cp'])){//¿Ha rellenado el formulario?
        $_SESSION['iden']=$_REQUEST;
        if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['cp'])){//Son correctas las credenciales
            if(validardni($_POST['dni'])){
                $_SESSION['id']=$_REQUEST;
                header('Location: informacion.php'); 
            }else{
                header('Location: acreditacion.php');
            }
            
        }else{ //No son correctas las credenciales
            header('Location: acreditacion.php');
        }
    }else{ //No ha rellenado el formulario
        formulario();
    }
}else{//Sí está ya acreditado
    header('Location: informacion.php');
}

?>