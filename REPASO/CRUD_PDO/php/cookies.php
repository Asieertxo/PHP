<?php

function formcookies(){
    echo "<form action='./index.php?cookies=putcookies' method='POST' enctype='multipart/form-data'>";
        echo "<label>color de fondo</label>";
        echo "<input type='color' name='color_fondo'></br>";
        echo "<input type='submit' name='cookies' value='enviar datos'/>";
    echo "</form>";
}

function cookies(){
    if(isset($_POST["color_fondo"])){
        $color_fondo = $_POST["color_fondo"];
        setcookie("color_fondo", $color_fondo, time()+3600*24*365);

        header("Refresh:0; url=index.php");
    }
}


function setColor(){
    if(isset($_COOKIE["color_fondo"])){
        $color_fondo = $_COOKIE["color_fondo"];
        echo<<<COLR
            <style>
                body{
                    background-color: $color_fondo;
                }
            </style>
        COLR;
    }
}


?>