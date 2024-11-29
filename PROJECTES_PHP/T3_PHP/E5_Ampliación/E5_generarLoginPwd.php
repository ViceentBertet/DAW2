<?php
    function crearCadena($nLetras, $caracteres) {
        $cadena = '';
        for ($i = 0; $i < $nLetras; $i++) {
            $pos = rand(0, strlen($caracteres) - 1);
            $cadena = $cadena . $caracteres[$pos];
        }
        return $cadena;
    }
    function crearLogin($nom, $ape1, $ape2) {
        $basicos = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrstuvwxyz0123456789";
        $parte1 = "";
        if (strlen($nom) < 4) {
            $parte1 = substr($nom, 0, strlen($nom));
            while(strlen($parte1) < 4) {
                $pos = rand(0, strlen($basicos) - 1);
                $parte1 = $parte1 . $basicos[$pos];
            }
             
        } else {
            $parte1 = substr($nom, 0, 3);
        }
        $parte2 = substr($ape1, 0, 3);
        $parte3 = substr($ape2, strlen($ape2) - 2 , 2);
        
        return $parte1 . $parte2 . $parte3;
    }
    $basicos = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrstuvwxyz0123456789";
    $especiales = "!?#$%&@_-";
    $cadenaBasicos = crearCadena(4, $basicos);
    $cadenaEspeciales = crearCadena(4, $especiales);
    $contrasenya = $cadenaBasicos . $cadenaEspeciales;
    $login = crearLogin($_GET['nom'],$_GET['ape1'],$_GET['ape2']);
    echo "Login: $login<br> Contraseña: $contrasenya";
    $ruta = "./login.txt";
    $fitx = fopen($ruta, "a+");
    if ($fitx) {
        fwrite($fitx,"$login\t$contrasenya\t<br>\n");
    }
    fclose($fitx);
       
?>

