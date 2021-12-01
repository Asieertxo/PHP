<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>

    <?php

        function formulario(){
            echo<<<EOD
                    <form action="." method="POST" enctype="multipart/form-data">
                        <label for="cadena">Texto donde buscar</label>
                        <input type="textarea" name="cadena" placeholder="Cadena" rows='10' cols='10' required/>

                        <label for="caracter">Caracter a buscar</label>
                        <input type="text" name="caracter" placeholder="Caracter" required/>
                        
                        <input type="submit" name="enviar" value="enviar"/>
                    </form>
EOD;
        }


        function buscar($haystack, $needle, $offset = 0, &$results = array()) {                
            $offset = strpos($haystack, $needle, $offset);
            if($offset === false) {
                return $results;            
            } else {
                $results[] = $offset;
                return buscar($haystack, $needle, ($offset + 1), $results);
            }
        }

        function salida($pos, $op){
            if($op == 'vacio'){
                echo "<div class='padre'><div class='hijo'>";
                    echo "<h3>&nbsp;No se han encontrado ocurrencias<h3>";
                echo "</div></div>";
            }elseif($op == 'lleno'){
                echo "<div class='padre'><div class='hijo'>";
                    echo "<h3>Ocurrencias en el texto:";
                    for($i=0; $i<count($pos); $i++){
                        echo "<p>&nbsp;&nbsp;&nbsp;En la posicion: " .$pos[$i]. "</p>";
                    }
                echo "</div></div>";
            }
            
        }

    ?>

</body>