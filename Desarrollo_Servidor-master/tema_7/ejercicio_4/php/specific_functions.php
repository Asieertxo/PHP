<?php

function getFirstDayPosition($month, $year){
    $firstDayInfo = getdate(mktime(12, 30, 0, $month, 1, $year)); 
    return $firstDayInfo['wday'];
}

function getMonthDays($month, $year){
    return date("t", mktime(0, 0, 0, $month, 1, $year));
}

function calendario_mensual($month, $year){
    global $week;
    global $monthsName;     
    echo "<td class='month-cell'>";
    echo "<h1 class='heading-primary'>" . $monthsName[$month - 1] . "</h1>";
    echo "<table class='calendar'>";
    echo "<tr>";
    for($i = 0; $i < 7; $i++){
        echo "<th class='letters-cells'>$week[$i]</th>";
    }
    $counterDaysPerWeek = 0;       
    $dayNumber = 1 - getFirstDayPosition($month, $year);
    $positionInCalendar = 0;
    while($dayNumber < getMonthDays($month, $year)){ 
        $counterDaysPerWeek += 7;
        echo "</tr><tr>";
        while($positionInCalendar < $counterDaysPerWeek){ //crea las filas, cada siete días que pasan hace una fila nueva
            if($dayNumber >= 0 and $dayNumber < 31 and $dayNumber < getMonthDays($month, $year)){
                echo "<td class='normal-cells'>" . ($dayNumber + 1) . "</td>";
            } else echo "<td class='normal-cells'></td>";
            $positionInCalendar++;
            $dayNumber++;
        }
    }
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    if($month % 4 === 0){
        echo "</tr><tr>";
    }
}

?>