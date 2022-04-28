<!--. Realizar un programa php, con una página autoprocesada donde nos pide el nombre
de un mes y en función del mes que tecleamos nos pinta un calendario del mes con
los días que correspondan. Nota:Utilizar un switch -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 tanda 2</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <?php

    function printForm(){
        echo<<<END
        <h1>Selección de calendario</h1>
        <div class="form_div">
            <form action="." method="GET" enctype="application/x-www-form-urlencoded">
                <label for="user_month">Introduzca el mes: </label>
                <input type="text" name="user_month" id="user_month"><br><br>
                <label for="user_year">Introduzca el año: </label>
                <input type="text" name="user_year" id="user_year"><br><br>
                <input type="submit" name="save">
            </form>
        </div>
END;
    }
    
    function printTable(){
        echo "<h1>Calendario de " . $_GET['user_month'] . "</h1>";
        echo "<div class='table_div'>";
        echo "<br>";
        if(checkValidMonth(checkDaysOfMonth())){   
            echo<<<END
            <table>
                <tr>
                    <th class="blue">Lunes</th>
                    <th class="blue">Martes</th>
                    <th class="blue">Miércoles</th>
                    <th class="blue">Jueves</th>
                    <th class="blue">Viernes</th>
                    <th class="blue">Sábado</th>
                    <th class="blue">Domingo</th>
                </tr>
END;
            printDays(checkDaysOfMonth());
            echo "</table>";
        }else {
            echo "<p>Fecha inválida, vuelva a introducirla por favor</p>";
        }  
        echo "<br>";
        echo "<br>";
        echo "<button><a href='.'>Volver</a></button>";
        echo "</div>";    
    }

    function printDays($days_of_month){
        $days_of_week = 7;
        $weeks = $days_of_month/$days_of_week;
        $last_week_of_month = $days_of_month%$days_of_week;
        $day_to_print = 0;
        for($i=1; $i<=$weeks; $i++){
            echo "<tr>";
            for($j=1; $j<=$days_of_week; $j++){
                $day_to_print += 1;
                echo "<td class='white'>$day_to_print</td>";
            }
            echo "</tr>";
        }
        echo "<tr>";
        while($last_week_of_month > 0){
            $day_to_print += 1;
            echo "<td class='white'>$day_to_print</td>";
            $last_week_of_month -=1;
        } 
        echo "</tr>";      
    }

    function checkDaysOfMonth(){       
        switch ($_GET['user_month']){
            case "Enero":
                $dias = 31;
                break;
            case "Febrero":
                if(checkLeapYear()){
                    $dias = 29;
                }else $dias = 28;
                break;
            case "Marzo":
                $dias = 31;
                break;
            case "Abril":
                $dias = 30;
                break;
            case "Mayo":
                $dias = 31;
                break;
            case "Junio":
                $dias = 30;
                break;
            case "Julio":
                $dias = 31;
                break;
            case "Agosto":
                $dias = 31;
                break;
            case "Septiembre":
                $dias = 30;
                break;
            case "Octubre":
                $dias = 31;
                break;
            case "Noviembre":
                $dias = 30;
                break;
            case "Diciembre":
                $dias = 31;
                break;
            default:
                $dias = 0;
        }
        return $dias;
    }

    function checkValidMonth($days_of_month){
        $valid_month = true;
        if($days_of_month == 0){
            $valid_month = false;
        }
        return $valid_month;
    }
    
    function checkLeapYear(){
        $isLeapYear = false;
        if($_GET['user_year']%4 == 0 && $_GET['user_year']%100 == 0 && $_GET['user_year']%400 == 0){
            $isLeapYear = true;
        }
        return $isLeapYear;
    }

    if(isset($_GET['user_month']) && isset($_GET['user_year']) && is_numeric($_GET['user_year']) && !empty($_GET['user_month']) && !empty($_GET['user_year'])){
        printTable();
    }else {
        printForm();
    }
    ?>

</body>

</html>