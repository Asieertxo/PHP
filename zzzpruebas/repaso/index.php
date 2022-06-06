<?php

function autocarga($clase){
    require "./" . $clase . ".php";
}
spl_autoload_register('autocarga');

$emp = new Empleado();

$emp->showEmp();

?>