<?php

function formulario(){
    $datos = validardatos();//devuelve los datos del formulario y pinta rojo los que no esten
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $dni = $datos['dni'];
    $cp = $datos['cp'];

    echo<<<EOD
    <form action="acreditacion.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value=$nombre>
        <br />
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value=$apellido>
        <br />
        <label for="ciudad">Ciudad:</label>
        <select name="ciudad">
            <option value="Madrid" selected>Madrid</option>
            <option value="Paris">Paris</option>
            <option value="Berlin">Berlin</option>
        </select>
        <br />
EOD;    //nos pinta que el DNI esta mal si no lo valida, si existe la sesion y si esta puesto algun DNI
        if(validardni($dni) == false && (isset($_SESSION['iden'])) &&  !empty($_POST['dni'])){
            echo "<label for='dni'>DNI:</label>";
            echo "<input type='text' id='dni' name='dni' placeholder='DNI mal'>";
            echo "<br/>";
        }else{
            echo "<label for='dni'>DNI:</label>";
            echo "<input type='text' id='dni' name='dni' value=$dni>";
            echo "<br/>";
        }
echo<<<EOD
        <label for="cp">CP:</label>
        <input type="number" id="cp" name="cp" value=$cp>
        <br />
        <input type="submit" value="Entrar"/>
    </form>

EOD;
}




function validardni($dni){
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);
    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
      return true;
    }else{
      return false;
    }
}




function validardatos(){
    $x = array('nombre', 'apellido', 'dni', 'cp');
    $nombre =  "";
    $apellido =  "";
    $dni =  "";
    $cp =  "";

    for($i=0; $i<4; $i++){
        if(!empty($_SESSION['iden'][$x[$i]])){
            $$x[$i] = $_SESSION['iden'][$x[$i]];
        }elseif(isset($_SESSION['iden'])){
            echo<<<EOD
                <style>
                    #$x[$i] {
                       border-color: red;
                    }
                </style>
EOD;
        }
    }

    $datos = [
        'nombre' => $nombre,
        'apellido' => $apellido,
        'dni' => $dni,
        'cp' => $cp,
    ];
    return $datos;
}



?>