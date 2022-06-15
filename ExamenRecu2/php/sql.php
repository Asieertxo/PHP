<meta charset="UTF-8" />
<?php

function query1(){
$query1 = 'CREATE TABLE IF NOT EXISTS ecomm_products (
        product_code  CHAR(5)      NOT NULL,
        name          VARCHAR(100) NOT NULL,
        description   MEDIUMTEXT,
        price         DEC(6,2)     NOT NULL,

        PRIMARY KEY(product_code)
    )';
    return $query1;
}
function query2(){
$query2 = 'CREATE TABLE IF NOT EXISTS ecomm_order_details (
        order_id     INTEGER UNSIGNED NOT NULL,
        order_qty    INTEGER UNSIGNED NOT NULL,
        product_code CHAR(5)          NOT NULL,
        PRIMARY KEY (order_id,product_code),
        FOREIGN KEY (order_id) REFERENCES ecomm_orders(order_id),
        FOREIGN KEY (product_code) REFERENCES ecomm_products(product_code)
    )';	
    return $query2;
}


function query3(){
$query3 = 'CREATE TABLE IF NOT EXISTS ecomm_orders (
         order_id     INTEGER UNSIGNED NOT NULL,
         order_date  TIMESTAMP NOT NULL,
         total INTEGER,

        PRIMARY KEY (order_id)
        
    )';	
    return $query3;
}
function insert_productos(){
$insert_productos = 'INSERT INTO ecomm_products
        (product_code, name, description, price)
    VALUES
        ("00001",
        "Camiseta de Zayas",
        "Esta camiseta es de 100% algodon y nos representa a nuestro Instituto",
         17.95),
         ("00002",
         "Pegatina para parachoques ", 
         "Con mucho color , esta pegatina nos permite identificarnos como alumnos del IES Maria de Zayas",
         5.95),
         ("00003",
         "Taza de Cafe",
         "Con nuestro logo podremos beber un cafe cada mañana en esta taza de buena porcelana. Se puede meter al lavaplatos y microhondas.",
         8.95),
         ("00004",
         "Disfraz de Superheroe",
         "Tenemos una selección completa de colores y tamaños para que usted elija . Este traje es elegante, con estilo , y muestra las  habilidades de lucha contra el crimen o habilidades intrigantes mal.",
         99.95),
         ("00005",
         "Gancho pequeño",
         "Este gancho especializado te sacará de los lugares más estrechos. Especialmente diseñado para la portabilidad y el sigilo .Tenga en cuenta Que este gancho viene con un límite de peso",
         139.95),
         ("00006",
         "Gancho grande", 
         "Gran versión de nuestro gancho de ataque y será seguro de transportar",
         199.95)';

    return $insert_productos;
}


?>