<?php

function autocarga($clase){
    require "./class/" . $clase . ".php";
}
spl_autoload_register('autocarga');

$obj1 = new Obj1();
$obj2 = new Obj2();

echo $obj1->x;
echo $obj2->y;

?>