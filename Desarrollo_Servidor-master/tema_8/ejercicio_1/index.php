<!--1. Cree un archivo llamado index.php que muestre en formulario de acreditación y cuyo action sea él mismo . 
Si las credenciales son correctas se redirigirá al usuario a la página verdatos .php .
En caso contrario se le mostrará un mensaje de 10 segundos de espera y, a continuación, le redirige a una nuevamente el formulario. 

2.Cambia el ejercicio anterior, y redirige al ficherro error.php , donde indicará con un mensaje 
que el usuario XXX no ha podido registrarse y de nuevo le envía al formulario-->


<?php

include("php/functions.php");

if(empty($_POST['user_id'])){
    printForm();
} else authenthicate();


?>