<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>

    <?php

        function formulario(){
            $verbos = [
                array("be","was","been"),
                array("begin","began","begun"),
                array("bend","bent","bent"),
            ];
            
            echo<<<EOD
                        <form action="./index.php" method="POST" enctype="multipart/form-data">
                            <table>
                                <caption>Irregular Verbs</caption>
                                <tr>
                                    <td>Castellano</td>
                                    <td>Infinitive</td>
                                    <td>Past Simple</td>
                                    <td>Participle</td>
                                </tr>
                                <tr>
                                    <td>ser</td>
                                    <td><input type="text" name="verbs[0][]" id="infinitive"></td>
                                    <td><input type="text" name="verbs[0][]" id="past_simple"></td>
                                    <td><input type="text" name="verbs[0][]" id="participle"></td>
                                <tr>
                                <tr>
                                    <td>empezar</td>
                                    <td><input type="text" name="verbs[1][]" id="infinitive"></td>
                                    <td><input type="text" name="verbs[1][]" id="past_simple"></td>
                                    <td><input type="text" name="verbs[1][]" id="participle"></td>
                                </tr>
                                <tr>
                                    <td>doblar</td>
                                    <td><input type="text" name="verbs[2][]" id="infinitive"></td>
                                    <td><input type="text" name="verbs[2][]" id="past_simple"></td>
                                    <td><input type="text" name="verbs[2][]" id="participle"></td>
                                </tr>
                            </table>
                            
                            <input type="submit" name="enviar" value="enviar datos"/>
                        </form>
            EOD;
        }

        function salida($aciertos, $errores){
            echo "<div class='padre'><div class='hijo'>";
            echo "&nbsp;<p class='txt'>- Nº de aciertos: " . $aciertos."</p></br>";
            echo "&nbsp;<p class='txt'>- Nº de errores: " . $errores."</p></br>";
            echo "</div></div>";
        }

    ?>


    
</body>
