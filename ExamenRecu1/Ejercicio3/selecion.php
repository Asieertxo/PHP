<?php

if(!isset($_POST['navegador'])){
    echo formulario();
}else{
    if($_COOKIE["navegador"] == $_POST['navegador']){
        echo "La cookie es la misma";
    }else{
        setcookie("navegador", $_POST['navegador'], time() + 3600*24*30);

        $fecha = getdate();
        $fecha = $fecha['mday'] . "-" . $fecha['mon'] . "-" . $fecha['year'];
  
        if (file_exists('./usuarios.xml')){
            $xmlFile = simplexml_load_file("./usuarios.xml");

            $cookie = $xmlFile->addChild('cookie');
            $cookie -> addChild('navegador', $_POST['navegador']);
            $cookie -> addChild('fecha', $fecha);
            file_put_contents("./usuarios.xml", $xmlFile -> asXML());
            echo "añadido";
        }else{
            die ("Error al abrir el archivo XML");
        }
    }
}






function formulario(){
echo <<<EOD
<form action="./selecion.php" method="POST" enctype="multipart/form-data">
    <select name="navegador" id="navegador">
        <option value="Chrome">Chrome</option>
        <option value="Firefox">Firefox</option>
        <option value="Edge">Edge</option>
    </select>
    <input type="submit" name"Elegir" value="Elegir" />
</form>
EOD;
}
?>