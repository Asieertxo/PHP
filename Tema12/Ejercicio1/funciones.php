<?php


function formulario(){
        global $color_fondo;
        global $color_letra;
        global $idioma;
    
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
    
    
    $idiomas = array(
        'español' => array('Dime el idioma', 'español', 'ingles', 'frances', 'Color de fondo: ', 'Color de letra: '),
        'ingles' => array('Tell me the language', 'Spanish', 'English', 'French', 'Background color: ', 'Font color: '),
        'frances' => array('Dites-moi la langue', 'Espagnol', 'Anglais', 'Français', 'Couleur d\'arrière-plan: ', 'Couleur de la police: ')
    );
    //var_dump($idiomas);
    
    
    
    echo "<form action='./ver_formulario.php' method='POST' enctype='multipart/form-data'>";
        echo "<p>".$idiomas[$idioma][0]."</p>";
        echo "<select name='idioma' id='idioma'>";
            echo "<option value='español'>".$idiomas[$idioma][1]."</option>";
            echo "<option value='ingles'>".$idiomas[$idioma][2]."</option>";
            echo "<option value='frances'>".$idiomas[$idioma][3]."</option>";
        echo "</select></br>";
        echo "<label>".$idiomas[$idioma][4]."</label>";
            echo "<input type='color' name='color_fondo'></br>";
        echo "<label>".$idiomas[$idioma][5]."</label>";
            echo "<input type='color' name='color_letra'></br>";
    
                            
        echo "<input type='submit' name='enviar' value='enviar datos'/>";
    echo "</form>";
    
    
    }


?>