<?php
global $color_fondo;
global $color_letra;

if(isset($_POST["color_fondo"]) && isset($_POST["color_letra"])){
    $color_fondo = $_POST["color_fondo"];
    $color_letra = $_POST["color_letra"];
    setcookie("color_fondo", $color_fondo, time()+3600*24*365);
    setcookie("color_letra", $color_letra, time()+3600*24*365);
    formulario();
}elseif(isset($_COOKIE["color_fondo"]) && isset($_COOKIE["color_letra"])){
    $color_fondo = $_COOKIE["color_fondo"];
    $color_letra = $_COOKIE["color_letra"];
    formulario();
}else{
formulario();
}


function formulario(){
    global $color_fondo;
        global $color_letra;

if(isset($_COOKIE["color_fondo"]) && isset($_COOKIE["color_letra"])){  
    echo<<<COLR
    <style>
        body{
            background-color: $color_fondo;
            color: $color_letra;
        }
    </style>
COLR;
}


echo "<form action='./kk.php' method='POST' enctype='multipart/form-data'>";
    echo "<label>color de fondo</label>";
        echo "<input type='color' name='color_fondo'></br>";
    echo "<label>color de letra</label>";
        echo "<input type='color' name='color_letra'></br>";

                        
    echo "<input type='submit' name='enviar' value='enviar datos'/>";
echo "</form>";


}
?>