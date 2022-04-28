<!--4. Realizar un programa para visualizar los horarios de los ciclos del IES Zayas que
aparecen en la web. Los ciclos los tendremos en un array que le pasamos a la
función array_walk o array_map y obtendrá una serie de enlaces que cuando los
pulsamos nos permiten ver el horario. Los periodos de clases se los debe
inventar el alumno-->

<?php

include("php/functions.php");
include("php/variables.php");

function printPage(){
    include("php/variables.php");
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 4</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1 class='heading-primary'>
            Horarios ciclos IES ZAYAS
        </h1>
        <div class="gradesTimetables">
            
END;

/*foreach($grades as $grade){
    echo "<h2 class='heading-secondary'>$grade</h2>";
    printTimetables(createArray($grade));
    echo "<br><br>";
}*/

    array_walk($grades, "printTimetables");

    echo<<<END
            </table>
        </div> 
    <button class='bottom-btn'><a href='..'>Atrás</a></button>  
    </body>
    </html>
END;
}

printPage();


?>