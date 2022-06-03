<?php

if(isset($_POST['birthday'])){
$kk = $_POST['birthday'];
var_dump($kk);
$kk = date("d-m-Y", strtotime($kk));
var_dump($kk);
$kk = base64_encode($kk);
var_dump($kk);
$kk = md5($kk);
var_dump($kk);
}else{


echo<<<EOD
            <div class='contenedor'>
                <h2>Elije Opciones</h2></br>
                <form action="./kk.php" method="POST" enctype="multipart/form-data">
                    <input type="date" name="birthday""/>
                    <input type="submit" name="register" value="Registrarse"/>
                </form>
                <a href= './index.php'>Atras</a>
            </div>
        EOD;

}
?>