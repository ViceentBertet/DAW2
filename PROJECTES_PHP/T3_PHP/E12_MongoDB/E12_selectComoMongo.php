<?php
    $fitx_autoload = '../vendor/autoload.php';
    require_once $fitx_autoload;
    try {
        $cadenaConexion = 'mongodb://127.0.0.1:27017';
        
        $cliente = new MongoDB\Client($cadenaConexion);
        $bd = $cliente->userblogdb;
        
        echo "Mostrar a los usuarios que se llamen Peter:<br>";
        $usuarios = $bd->userblog->find(['nombre' => 'Peter']);
        
        foreach ($usuarios as $usuario) {
            print_r($usuario);
            echo "<br><br>";
        }
    } catch (Exception $e) {
        echo `Ha habido un error\n\n`;
        print($e);
    }
?>