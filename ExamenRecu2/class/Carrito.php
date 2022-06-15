<?php

class Carrito{
    public  $productos = array();

    public function __construct($prod = array()){
        $this->productos = $prod;
    }

    public function añadir($id, $cant, $price, $name, $description){

        $i = 0;
        foreach($id as $selected){
            $prod = array($selected => array($id[$i], $name[$i], $description[$i],$cant[$i], $price[$i]));
            //var_dump($prod);
            $this->productos = array_merge($this->productos, $prod);
            $i++;
        }
        $this->productos = array_merge($this->productos, $prod);
        //var_dump($this->productos);
    }

    public function visualizar_carrito(){
        $_SESSION['productos'] = $this->productos;
        var_dump($this->productos);
        echo "<table>";
            echo "<tr>";
                echo "<td>Code</td>";
                echo "<td>Cantidad</td>";
                echo "<td>Price</td>";
                echo "<td>Borrar</td>";
            echo "</tr>";
            foreach($this->productos as $producto){
                echo "<tr>";
                    echo "<td>".$producto[0]."</td>";
                    echo "<td>".$producto[1]."</td>";
                    echo "<td>".$producto[2]."</td>";
                    echo "<td><a href='./view_cart.php?borrar=$producto[0]'>Borrar</a></td>";
                echo "</tr>";
            }
        echo "<table>";
        echo "<a href='./view_cart?generarxml=j'>Comprar Ya</a>";
    }

    public function borrar($id){
        unset($this->productos[$id]);
        header("Refresh:0; url=./php/Listar.php?origen=index");
    }

    public function generarXML(){
        var_dump($this->productos);
        $date = date('d-m-Y');
        $xmlFile = simplexml_load_file('./../xml/factura.xml');
        $ele = $xmlFile->addChild('fecha', $date);
        $ele = $xmlFile->addChild('cliente', 'cliente');
        $ele = $xmlFile->addChild('email','email');
        $ele = $xmlFile->addChild('direccion', 'direccion');
        $ele = $xmlFile->addChild('productos');
        foreach($this->productos as $producto){
            $ele = $xmlFile->productos->addChild('producto');
            $ele->addChild('nombre', $producto[1]);
            $ele->addChild('cantidad', $producto[3]);
            $ele->addChild('precio', $producto[4]);
        }

        file_put_contents("./../xml/factura.xml", $xmlFile -> asXML());
    }

}

?>