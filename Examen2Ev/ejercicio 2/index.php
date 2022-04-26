<?php
require "./php/conection.php";

$conection = conection();

if (file_exists('./xml/usuarios.xml')){
    $xmlFile = simplexml_load_file("./xml/usuarios.xml");
}else{
    die ("ERROR: no se ha encontrado el fichero");
}

$sql= "SELECT * FROM `usuarios`";
$result = mysqli_query($conection, $sql);

if(mysqli_num_rows($result) < 1){
    foreach($xmlFile as $user){
        $sql = "INSERT INTO `usuarios` (`mail`, `pass`, `nombreUser`) VALUES ('{$user -> mail}', '{$user -> pass}', '{$user -> nombreUser}')";
        if(mysqli_query($conection, $sql)){
        }else{
            echo "ERROR: no se ha podido subir usuario";
        }
    }
}

if (file_exists('./xml/viviendas.xml')){
    $xmlFile = simplexml_load_file("./xml/viviendas.xml");
}else{
    die ("ERROR: no se ha encontrado el fichero");
}

$sql= "SELECT * FROM `viviendas`";
$result = mysqli_query($conection, $sql);

if(mysqli_num_rows($result) < 1){
    foreach($xmlFile as $vivienda){
        $tipo= $vivienda -> tipo;
        $zona= $vivienda -> zona;
        $dormitorios= $vivienda -> dormitorios;
        $precio= $vivienda -> precio;
        $image= $vivienda -> image;
        foreach($vivienda->extras as $extra){
            $piscina= $extra -> piscina;
            $garage= $extra -> garage;
            $padel= $extra -> padel;
            $jardin= $extra -> jardin;
            $zonascomunes= $extra -> zonascomunes;
        }

        $sql = "INSERT INTO `viviendas` (`tipo`, `zona`, `dormitorios`, `precio`, `garage`, `jardin`, `padel`, `piscina`, `zonascomunes`, `imagen`) VALUES ('{$tipo}', '{$zona}', '{$dormitorios}', '{$precio}', '{$garage}', '{$jardin}', '{$padel}', '{$piscina}', '{$zonascomunes}', '{$image}')";
        if(mysqli_query($conection, $sql)){
        }else{
            echo "ERROR: no se ha podido subir vivienda";
        }
    }
}




echo <<<EOD
    <form action="./php/validar.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="user" placeholder="usuario" required/></br>
        <input type="password" name="pass" placeholder="contraseña" required/></br>
        <input type="submit" name"login" value="login" />
    </form>
EOD;


?>