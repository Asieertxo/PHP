<?php

function createRandomArray($arraySize, $minValue, $maxValue){
    $randomArray = [];
    for($i = 0; $i<$arraySize; $i++){
        $number = rand($minValue, $maxValue);
        while(in_array($number, $randomArray)){
            $number = rand($minValue, $maxValue);
        }
        $randomArray[$i] = $number;
    }
    return $randomArray;   
}

function printForm(){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1 class="heading-primary">
            Visualizar una matriz de 400 números aleatorios
        </h1>
        <section class="section-form">
            <form action="." method="post" enctype="application/x-www-form-urlencoded">
                <div class="form--labels">
                    <label for="number_cols">Introduzca el número de columnas: </label>
                    <input type="number" name="number_cols" id="number_cols" placeholder="20"><br><br>
                    <label for="number_rows">Introduzca el número de filas: </label>
                    <input type="number" name="number_rows" id="number_rows" placeholder="20"><br><br>
                    <input type="submit" name="save">
                </div>               
            </form>
        </section>
        
    </body>
    </html>
END;
}

function printArray($array, $cols, $rows){
    $contador = 0;
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1 class="heading-primary">
            Visualizar una matriz de 400 números aleatorios
        </h1>
        <section class="section-table">
        <div class="table--div">
            <table class="randomNumbers">
END;
    for($j = 0; $j<$_POST['number_cols']; $j++){
        echo "<tr>";
        for($i = 0; $i<$_POST['number_rows']; $i++){ 
                echo "<td>".$array[$i+$contador]."</td>";              
        }
        $contador += $_POST['number_rows'];
        echo "</tr>";
    }  
    echo<<<END
            </table>
        </div>
    </section>
    
    </body>
    </html>
END;
}

?>