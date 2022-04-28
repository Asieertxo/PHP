<!--1, Sacar la fecha de hoy, mañana, la hora de ahora, la del próximo Lunes-->
<?php

date_default_timezone_set('Europe/Madrid'); //para definir el huso horario
setlocale(LC_ALL, "es_ES");
$today = getdate();
var_dump($today);

echo "La fecha de hoy es ". date("d-m-Y", strtotime("today"));
echo "<br>";
echo "La fecha de ma&ntildeana es " . date("d-m-Y", strtotime("tomorrow"));
echo "<br>";
echo "La hora actual es " . date("H:i", time());
echo "<br>"; 
echo "La fecha del pr&oacuteximo lunes es " . date("d-m-Y", strtotime("next Monday"));

?>