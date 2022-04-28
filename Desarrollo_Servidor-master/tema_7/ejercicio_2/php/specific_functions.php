<?php

function getFirstDayPosition($month, $year){
    $firstDayInfo = getdate(mktime(12, 30, 0, $month, 1, $year)); 
    return $firstDayInfo['wday'];
}

function getMonthDays($month, $year){
    return date("t", mktime(0, 0, 0, $month, 1, $year));
}

function calendario_mensual($month, $year){
    $counterDaysPerWeek = 0;       
    $dayNumber = 1 - getFirstDayPosition($month, $year);
    $positionInCalendar = 0;
    while($dayNumber < getMonthDays($month, $year)){ 
        $counterDaysPerWeek += 7;
        echo "<tr>";
        while($positionInCalendar < $counterDaysPerWeek){ //crea las filas, cada siete días que pasan hace una fila nueva
            if($dayNumber >= 0 and $dayNumber < 31 and $dayNumber < getMonthDays($month, $year)){
                echo "<td>" . ($dayNumber + 1) . "</td>";
            } else echo "<td></td>";
            $positionInCalendar++;
            $dayNumber++;
        }
    }
    echo "</tr>"; 
}

?>