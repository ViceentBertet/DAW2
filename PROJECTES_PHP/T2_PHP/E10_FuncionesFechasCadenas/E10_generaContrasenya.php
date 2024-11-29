<?php
    function crearCadena($nLetras, $caracteres) {
        $cadena = '';
        for ($i = 0; $i < $nLetras; $i++) {
            $pos = rand(0, strlen($caracteres) - 1);
            $cadena = $cadena . $caracteres[$pos];
        }
        return $cadena;
    }
    $basicos = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrstuvwxyz0123456789";
    $especiales = "!?#$%&@_-";
    $pos = 0; //Si la pos = 0 será basicos izquierda, especiales derecha, si es otro n, será lo contrario

    $nBasicos = 5;
    $nEspeciales = 3;
    
    $cadenaBasicos = crearCadena($nBasicos, $basicos);
    $cadenaEspeciales = crearCadena($nEspeciales, $especiales);
    $contrasenya = '';
    
    if($pos == 0) {
        $contrasenya = $contrasenya . $cadenaBasicos;
        $contrasenya = $contrasenya . $cadenaEspeciales;
    } else {
        $contrasenya = $contrasenya . $cadenaEspeciales;
        $contrasenya = $contrasenya . $cadenaBasicos;
    }
    echo "<b> El password generado aleatoriamente es: <br> $contrasenya</b>";
?>