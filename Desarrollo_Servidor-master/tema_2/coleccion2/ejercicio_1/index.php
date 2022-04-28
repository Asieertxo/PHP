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
    <link rel="stylesheet" type="text/css" href="../../css/index.css">
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
        <br><br>
        <button class='bottom-btn'><a href='..'>Atrás</a></button>
END;
    }

    function checkValidMonth($user_month, $user_year){  
        $user_month = strtolower($user_month);  
        if(numberOfDaysOfTheMonth($user_month, $user_year) == 0){
            printError("Mes incorrecto, vuelva a escribirlo por favor");
        } else printTable(numberOfDaysOfTheMonth($user_month, $user_year), $user_month);
    }

    function numberOfDaysOfTheMonth($user_month, $user_year){       
        switch ($user_month){
            case "enero":
                $days_of_month = 31;
                break;
            case "febrero":
                if(checkLeapYear($user_year)){
                    $days_of_month = 29;
                }else $days_of_month = 28;
                break;
            case "marzo":
                $days_of_month = 31;
                break;
            case "abril":
                $days_of_month = 30;
                break;
            case "mayo":
                $days_of_month = 31;
                break;
            case "junio":
                $days_of_month = 30;
                break;
            case "julio":
                $days_of_month = 31;
                break;
            case "agosto":
                $days_of_month = 31;
                break;
            case "septiembre":
                $days_of_month = 30;
                break;
            case "octubre":
                $days_of_month = 31;
                break;
            case "noviembre":
                $days_of_month = 30;
                break;
            case "diciembre":
                $days_of_month = 31;
                break;
            default:
                $days_of_month = 0;
        }
        return $days_of_month;
    }

    function printError($error_message){
        echo "<h1>Selección de calendario</h1>";
        echo "<div>";
        echo "<span>$error_message</span>";
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
        echo "</div>";
    }
    
    function printTable($days_of_month, $user_month){
        echo "<h1>Calendario de $user_month</h1>";
        echo "<div class='table_div'>";
        echo "<br>";
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
        printDays($days_of_month);
        echo "</table>"; 
        echo "<br><br>";
        echo "<button class='bottom-btn'><a href='.'>Volver</a></button>";
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
    
    function checkLeapYear($user_year){
        $isLeapYear = false;
        if($user_year%4 == 0 && $user_year%100 != 0 ){
            $isLeapYear = true;
        }
        return $isLeapYear;
    }

    if(!isset($_GET['user_month']) && !isset($_GET['user_year'])){
        printForm();
    } else if(empty($_GET['user_month']) && empty($_GET['user_year'])){
        printError("Por favor, introduzca un mes y un año");
    } else if(empty($_GET['user_month'])){
        printError("Por favor, introduzca un mes");
    } else if(empty($_GET['user_year'])){
        printError("Por favor, introduzca un año");
    } else checkValidMonth($_GET['user_month'], $_GET['user_year']);
    ?>

</body>

</html>