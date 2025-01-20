<?php
    $fitx_autoload = '../vendor/autoload.php';
    require_once $fitx_autoload;
    try {
        $cadenaConexion = 'mongodb://127.0.0.1:27017';
        
        $cliente = new MongoDB\Client($cadenaConexion);
        $bd = $cliente->userblogdb;
        echo 'Conectado correctamente';
    } catch (Exception $e) {
        echo `Ha habido un error\n\n`;
        print($e);
    }
?>