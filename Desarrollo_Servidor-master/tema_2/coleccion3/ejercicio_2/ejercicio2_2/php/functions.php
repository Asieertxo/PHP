<?php

function printForm($right_answers, $wrong_answers, $total_answers){ 
        global $verbs_array;
        if(isset($_POST['user_answer'])){
            if(checkAnswers($_POST['user_answer'], $total_answers)){
                $right_answers+=1;
            } else $wrong_answers+=1;
        }
        $total_answers++;
        $url = $_SERVER['PHP_SELF'] . "?right=$right_answers&wrong=$wrong_answers&total=$total_answers";

        echo "<div>";
        echo "<span>Verb: <b>".$verbs_array[$total_answers-1]['spanish_form']."</b></span><br><br>";
        echo<<<END
            <form action="$url" method="POST" enctype="application/x-www-form-urlencoded">
                <label for="user_answer[]">Base form: </label>
                <input type="text" name="user_answer[]" id="user_answer[]"><br><br>
                <label for="user_answer[]">Past simple: </label>
                <input type="text" name="user_answer[]" id="user_answer[]"><br><br>
                <label for="user_answer[]">Past participle: </label>
                <input type="text" name="user_answer[]" id="user_answer[]"><br><br>
                <input type='submit' name='next_answer' value='Next'>
                <input type='submit' name='check_answers' value='Check'>
            </form>
        </div
        <br><br>
        <button class='bottom-btn'><a href='..'>Back</a></button>
END;
    }

    function checkAnswers($user_answers, $total_answers){
        global $verbs_array;
        $bool = true;
        for($i = 0; $i<3; $i++){
            if ($verbs_array[$total_answers-1][$i] != $user_answers[$i]){
                $bool = false;
            } 
        }
        return $bool;
    }

    function printStatistics($right_answers, $wrong_answers, $total_answers){
        if(checkAnswers($_POST['user_answer'], $total_answers)){
            $right_answers+=1;
        } else $wrong_answers+=1;
        echo "<div>";
        echo "<span>Aciertos: $right_answers</span><br><br>";
        echo "<span>Fallos: $wrong_answers</span><br><br>";
        echo "<span>Nº de preguntas: $total_answers</span><br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }
?>