<!--2.	Vamos realizar un juego para que los alumnos de primaria estudien los verbos irregulares de Inglés.
El programa mostrará el verbo en español y  tendremos tres caja de texto para teclear las tres formas verbales. 
Existirá un botón para finalizar cuando deseemos.
Cuando finaliza el juego te muestra una estadística de aciertos, fallos, cantidad de preguntas hechas, etc.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" type="text/css" href="../../../css/index.css">
</head>
<body>
    <h1>Irregular verbs</h1>
    <?php

    $verbs_array = ["Ir", "Dormir", "Venir", "Comer", "Beber"];
    $base_form_array = ["go", "sleep", "come", "eat", "drink"];
    $past_simple_array = ["went", "slept", "came", "ate", "drank"];
    $past_participle_array = ["gone", "slept", "come", "eaten", "drunk"];
    $all_tenses_array = ['base_form' => $base_form_array, 'past_simple' => $past_simple_array, 'past_participle' => $past_participle_array];

    define('NUMBER_OF_QUESTIONS', count($verbs_array)*3);

    function printForm($verbs_array){        
        echo "<div>";
       
        foreach($verbs_array as $verb){
            echo "<span>Verb: <b>$verb</b></span><br><br>";
            echo<<<END
            <form action="." method="POST" enctype="application/x-www-form-urlencoded">
                <label for="base_form[]">Base form: </label>
                <input type="text" name="base_form[]" id="base_form[]"><br><br>
                <label for="past_simple[]">Past simple: </label>
                <input type="text" name="past_simple[]" id="past_simple[]"><br><br>
                <label for="past_participle[]">Past participle: </label>
                <input type="text" name="past_participle[]" id="past_participle[]"><br><br>
END;
        }
        echo "<input type='submit' name='check_answers' value='Check'>";
        echo "</form>";
        echo "</div>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='..'>Back</a></button>";
    }

    function checkAnswers($all_tenses_array, $number_of_questions){
        $right_answers = 0;
        foreach($all_tenses_array as $tense_key => $verb_tense){
            foreach($verb_tense as $key => $verb){
                if($verb == strtolower($_POST[$tense_key][$key])){
                    $right_answers += 1;
                }
            }
        }
        printStatistics($right_answers, $number_of_questions);
    }

    function printStatistics($right_answers, $number_of_questions){
        $wrong_answers = $number_of_questions - $right_answers;
        echo "<div>";
        echo "<span>Aciertos: $right_answers</span><br><br>";
        echo "<span>Fallos: $wrong_answers</span><br><br>";
        echo "<span>Nº de preguntas: $number_of_questions</span><br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }

    if(!isset($_POST['check_answers'])){
        printForm($verbs_array);
    } else {
        checkAnswers($all_tenses_array, NUMBER_OF_QUESTIONS);
    }
    ?>
</body>
</html>