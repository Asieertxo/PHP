<?php
echo "<link rel='stylesheet' type='text/css' href='./../css/estilos.css'>";//importar css

function autocarga($clase){
    require "./../class/" . $clase . ".php";
}
spl_autoload_register('autocarga');

require "./formularios.php";

if(isset($_GET['boton'])){
    formSearch();
}else{
    if(isset($_GET['search'])){
        if($_GET['search'] == 'option'){
            $option = $_POST['select'];
            $select = $_POST['option'];
            header("Refresh:0; url=./../index.php?option=$option&select=$select");
        }elseif($_GET['search'] == 'cant'){
            formSearchCant();
        }
    }elseif(isset($_POST['select']) && isset($_POST['signo']) && isset($_POST['option'])){
        $option = $_POST['option'];
        $select = $_POST['select'];
        $signo = $_POST['signo'];
        header("Refresh:0; url=./../index.php?option=$option&select=$select&signo=$signo");
    }else{
        echo "Error";
    }
}


?>