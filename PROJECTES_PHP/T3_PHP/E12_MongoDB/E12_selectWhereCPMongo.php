<?php
    $fitx_autoload = '../vendor/autoload.php';
    require_once $fitx_autoload;
    try {
        $cadenaConexion = 'mongodb://127.0.0.1:27017';
        
        $cliente = new MongoDB\Client($cadenaConexion);
        $bd = $cliente->userblogdb;
        
        echo "Mostrar usuarios con el cp 39005 o mayor:<br><br>";
        $usuarios = $bd->userblog->find(
                        ['cp' => ['$gte' => '39005']],
                        ['projection' => ['_id' => 0,
                        'nombre_usuario' => 1,
                        'cuenta_twitter' => 1]]);
        foreach ($usuarios as $usuario) {
            print_r($usuario);
            echo "<br><br>";
        }
    } catch (Exception $e) {
        echo `Ha habido un error\n\n`;
        print($e);
    }
?>