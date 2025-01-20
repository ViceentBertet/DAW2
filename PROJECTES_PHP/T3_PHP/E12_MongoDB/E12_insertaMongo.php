<?php
    $fitx_autoload = '../vendor/autoload.php';
    require_once $fitx_autoload;
    try {
        $cadenaConexion = 'mongodb://127.0.0.1:27017';
        
        $cliente = new MongoDB\Client($cadenaConexion);
        $bd = $cliente->userblogdb;
        
        $usuarios = $bd->userblog;
        
        $resultado = $usuarios->insertOne([
            "nombre_usuario" => "Juanillo",
            "nombre" => "Juan",
            "cuenta_twitter" => "Juanillo12",
            "descripcion" => "Streamer aficionado",
            "telefono1" => "123123123",
            "telefono2" => "234234234",
            "calle" => "Av. de la Mantis Religiosa",
            "numero" => "123",
            "cp" => "39006",
            "ciudad" => "Malaga",
        ]);
        
        echo "<br>Insertado con el ID: "
            . $resultado->getInsertedId() . "<br>";
    } catch (Exception $e) {
        echo `Ha habido un error\n\n`;
        print($e);
    }
?>
