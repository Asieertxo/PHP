<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $empleados = array(
        '7722' => array('nombre'=>'Raul Ayuso', 'posicion'=>'Administrador', 'depno'=>'20'),
        '7733' => array('nombre'=>'Ana Romeu', 'posicion'=>'Programador Senior', 'depno'=>'10'),
        '7744' => array('nombre'=>'Carlos Diaz', 'posicion'=>'Presidente', 'depno'=>'20'),
        '7755' => array('nombre'=>'Ricardo Ruiz', 'posicion'=>'Financiero', 'depno'=>'30'),
        '7711' => array('nombre'=>'Jaime Mantilla', 'posicion'=>'Administrador', 'depno'=>'20'),
        '7766' => array('nombre'=>'Monica Garcia', 'posicion'=>'Programador Senior', 'depno'=>'10'),
        '7777' => array('nombre'=>'Belen Diaz', 'posicion'=>'Financiero', 'depno'=>'20'),
        '7788' => array('nombre'=>'Esther Abad', 'posicion'=>'Financiero', 'depno'=>'30'),
    );
    var_dump($empleados);

    $json = json_encode($empleados);
    file_put_contents("./../JSON/empleados.json", $json)
    ?>
</body>
</html>