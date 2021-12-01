<?php

function login(){
echo<<<EOD
        <h1>Dime el numero de departamento</h1>
        <form action="./listado.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="empleado" placeholder="Numero de empleado"></br>
            <input type="number" name="depart" placeholder="Numero de departamento"></br>
            <input type="radio" id="visor" name="visor" value="pantalla">pantalla</br>
            <input type="radio" id="visor" name="visor" value="fichero">fichero</br>
            <input type="submit" name="enviar" value="enviar"/>
        </form>
EOD;
}
    


function formulario(){
echo<<<EOD
    <h1>Dime el numero de departamento</h1>
    <form action="./listado.php" method="POST" enctype="multipart/form-data">
        <input type="number" name="dep" placeholder="Numero de departamento"></br>
        <input type="radio" id="visor" name="visor" value="pantalla">pantalla</br>
        <input type="radio" id="visor" name="visor" value="fichero">fichero</br>
        <input type="submit" name="enviar" value="enviar"/>
    </form>
EOD;
}

function salida(){

    $empleados = array(
        7722 => array('nombre'=>'Raul Ayuso', 'posicion'=>'Administrador', 'depno'=>'20'),
        7733 => array('nombre'=>'Ana Romeu', 'posicion'=>'Programador Senior', 'depno'=>'10'),
        7744 => array('nombre'=>'Carlos Diaz', 'posicion'=>'Presidente', 'depno'=>'20'),
        7755 => array('nombre'=>'Ricardo Ruiz', 'posicion'=>'Financiero', 'depno'=>'30'),
        7711 => array('nombre'=>'Jaime Mantilla', 'posicion'=>'Administrador', 'depno'=>'20'),
        7766 => array('nombre'=>'Monica Garcia', 'posicion'=>'Programador Senior', 'depno'=>'10'),
        7777 => array('nombre'=>'Belen Diaz', 'posicion'=>'Financiero', 'depno'=>'20'),
        7788 => array('nombre'=>'Esther Abad', 'posicion'=>'Financiero', 'depno'=>'30'),
    );

    $visor = $_POST['visor'];

    if($visor == 'pantalla'){
        $dep = $_POST['dep'];
        echo "<table>";
        echo "<caption>$dep</caption>";
        foreach($empleados as $valor){
            $nombre = $valor['nombre'];
            $posicion = $valor['posicion'];
            $depno = $valor['depno'];
            if($dep == $depno){
                echo "<tr>";
                    echo "<th>$nombre</th>";
                    echo "<th><img src='./../Ejercicio4/img/$nombre.png'></th>";
                    echo "<th>$posicion</th>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }


    



    
}

?>