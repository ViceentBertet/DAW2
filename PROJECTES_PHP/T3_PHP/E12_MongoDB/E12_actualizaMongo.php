<?php
    $fitx_autoload = '../vendor/autoload.php';
    require_once $fitx_autoload;
    try {
        $cadenaConexion = 'mongodb://127.0.0.1:27017';
        
        $cliente = new MongoDB\Client($cadenaConexion);
        $bd = $cliente->userblogdb;
        
        $usuarios = $bd->userblog;
        
        $resultado = $usuarios->updateOne(
            ["cp" => "39006"],
            ['$set' => ['numero' => '456']]
        );
        
        echo "Nº modificados: "
            . $resultado->getModifiedCount() . "<br>";
    } catch (Exception $e) {
        echo `Ha habido un error\n\n`;
        print($e);
    }
?>