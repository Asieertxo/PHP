<?php

function createdeck(){
    $palos = ["oros", "bastos", "copas", "espadas"];

    for($j = 0; $j<count($palos); $j++){
        for($i = 0; $i<12; $i++){
            $deck[$palos[$j]][$i] = $i+1 . $palos[$j];
        }
    }
    return $deck;
}

function printForm(){
    include("php/variables.php");
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <h1 class='heading-primary'>
        Juego de cartas
    </h1>
    <body>
        <div class="div-form card-img">
            <span>Elija una de las siguientes opciones: </span><br><br>
            <form action="" method="post">
END;
    if(isset($_POST['select'])){
        echo "<div class='label'>";
        echo "<label for='cardsToView'>Seleccione el número de cartas: </label>";
        if(isset($_POST['cardsToView'])){
            echo "<input type='number' id='cardsToView' name='cardsToView' value='$_POST[cardsToView]'><br><br>"; 
        } else echo "<input type='number' id='cardsToView' name='cardsToView' placeholder='0'><br><br>";
        echo "<span>Seleccione el palo (opcional): </span><br><br>";
        /*if(isset($_POST['palo'])){
            echo "<input type='text' id='palo' name='palo' value='$_POST[palo]'><br><br>"; 
        } else echo "<input type='text' id='palo' name='palo' placeholder='oros'><br><br>";     
        echo "</div>";*/
        echo "<label for='palo'>Oros: </label>";
        echo "<input type='checkbox' id='oros' name='palo[]' value='oros'><br><br>";
        echo "<label for='palo'>Espadas: </label>";
        echo "<input type='checkbox' id='espadas' name='palo[]' value='espadas'><br><br>";
        echo "<label for='palo'>Bastos: </label>";
        echo "<input type='checkbox' id='bastos' name='palo[]' value='bastos'><br><br>";
        echo "<label for='palo'>Copas: </label>";
        echo "<input type='checkbox' id='copas' name='palo[]' value='copas'><br><br>";
        echo "</div>";
    }

    echo "<input class='form-button' type='submit' name='view' value='Ver baraja'>";
    echo "<input class='form-button' type='submit' name='select' value='Seleccionar cartas'>";
    echo "</form>";

    if(!isset($_POST['view']) and !isset($_POST['select'])){
        echo "<br><img src='img/1oros.jpg'>";
    }

    if(isset($_POST['cardsToView']) and $_POST['cardsToView'] < 49 and $_POST['cardsToView'] > 0){
        $usedCards = [];
        echo "<br><br>";
        if(empty($_POST['palo'])){
            for($i = 0; $i < $_POST['cardsToView']; $i++){
                $number = rand(1, 12);
                $palo = array_rand($deck, 1);
                while(in_array("$number$palo", $usedCards)){
                    $number = rand(1, 12);
                    $palo = array_rand($deck, 1);
                }
                echo "<img src='img/$number$palo.jpg'>";
                $usedCards[$i] = "$number$palo";
            } 
        } else {
            if($_POST['cardsToView'] > (count($_POST['palo']) * 12)){
                echo "<br><span class='error'>El número máximo de cartas de un palo es 12</span>";
            }else{
                for($i = 0; $i < $_POST['cardsToView']; $i++){
                    $palo = $_POST['palo'][rand(0, count($_POST['palo']) - 1)];//
                    $number = rand(1, 12);
                    while(in_array("$number$palo", $usedCards)){
                        $palo = $_POST['palo'][rand(0, count($_POST['palo']) - 1)];//
                        $number = rand(1, 12);
                    }
                    echo "<img src='img/$number$palo.jpg'>";
                    $usedCards[$i] = "$number$palo";
                }
            } 
        }
    } else if(isset($_POST['cardsToView']) and ($_POST['cardsToView'] > 48 or $_POST['cardsToView'] <= 0)){
        echo "<br><span class='error'>El número máximo de cartas es 48 y el mínimo 1</span>";
    }
    echo<<<END
        </div>    
    </body>
    </html>
END;
}

function viewDeck($deck){
    echo<<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <h1 class='heading-primary'>
        Ver baraja
    </h1>
    <body>
END;
    echo "<div class='card-img'>";
    foreach($deck as $palo){
        for($i = 0; $i<12; $i++){
            echo "<img src='img/$palo[$i].jpg'>";
        }
    }
    echo<<<END
            <br><br>
            <button class='back-button'><a href='.'>Volver</a></button>
        </div>       
    </body>
    </html>
END;
}

?>