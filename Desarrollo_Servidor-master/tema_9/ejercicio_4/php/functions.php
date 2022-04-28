<?php

function createArray($grade_name){
    $grade = file("txt/$grade_name.txt");
    for($i = 0; $i<count($grade); $i++){
        $grade[$i] = explode(" ", $grade[$i]);
    }
    return $grade;
    
}

function printTimetables($grade){
    global $horas;
    echo "<h2 class='heading-secondary'>$grade</h2>";
    $grade = createArray($grade);
    echo "<table class='timetable'>";
    echo "<tr>";
    echo "<th>Hora</th>";
    for($i = 0; $i<count($grade); $i++){
        echo "<th>".$grade[$i][0]."</th>";
    }
    echo "</tr>";
    
    for($j = 0; $j<count($horas); $j++){
        echo "<tr>";
        echo "<td>".$horas[$j]."</td>";
        for($i = 0; $i<count($grade); $i++){           
            echo "<td>".$grade[$i][$j + 1]."</td>";
        }
        echo "</tr>";
    }  
    echo "</table><br><br>";
}

?>