<?php
    $fitx_autoload = '../vendor/autoload.php';
    require_once $fitx_autoload;
    try {
        $cadenaConexion = 'mongodb://127.0.0.1:27017';
        
        $cliente = new MongoDB\Client($cadenaConexion);
        $bd = $cliente->userblogdb;
        $newUsuarios = [
            [
                'nombre_usuario' => 'Frank_blog',
                'nombre' => 'Frank',
                'cuenta_twitter' => 'Frank_USA',
                'descripcion' => 'blogger aficionado',
                'telefono' => [73128989, 11111111],
                'direccion' => [
                    'calle' => 'Av. de los Castros',
                    'numero' => 2256,
                    'cp' => 39005,
                    'ciudad' => 'Santander',
                ],
            ],
            [
                'nombre_usuario' => 'Peter_blog',
                'nombre' => 'Peter',
                'cuenta_twitter' => 'Pete',
                'descripcion' => 'blogger aficionado',
                'telefono' => [808080, 4323424],
                'direccion' => [
                    'calle' => 'Av. de los Castros',
                    'numero' => '289s',
                    'cp' => 39005,
                    'ciudad' => 'Santander',
                ],
            ],
        ];
        $resultado = $bd->userblog->insertMany($newUsuarios);
        echo "Se han insertado todos correctamente";
    } catch (Exception $e) {
        echo `Ha habido un error\n\n`;
        print($e);
    }
?>
