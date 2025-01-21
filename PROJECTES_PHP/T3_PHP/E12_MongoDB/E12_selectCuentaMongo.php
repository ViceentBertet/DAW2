<?php
    $fitx_autoload = '../vendor/autoload.php';
    require_once $fitx_autoload;
    try {
        $cadenaConexion = 'mongodb://127.0.0.1:27017';
        
        $cliente = new MongoDB\Client($cadenaConexion);
        $bd = $cliente->userblogdb;
        
        echo "Contar y mostrar usuarios con el cp 39005:";
        $usuarios = $bd->userblog->find(['cp' => '39005'])->toArray();
        echo count($usuarios) . "<br>";
        foreach ($usuarios as $usuario) {
            print_r($usuario);
            echo "<br><br>";
        }
    } catch (Exception $e) {
        echo `Ha habido un error\n\n`;
        print($e);
    }
?>-