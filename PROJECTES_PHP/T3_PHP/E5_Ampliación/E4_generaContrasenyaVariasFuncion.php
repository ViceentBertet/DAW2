<?php
    function crearCadena($nLetras, $caracteres) {
        $cadena = '';
        for ($i = 0; $i < $nLetras; $i++) {
            $pos = rand(0, strlen($caracteres) - 1);
            $cadena = $cadena . $caracteres[$pos];
        }
        return $cadena;
    }
    function generarArray($nBasicos, $nEspeciales, $nPwd) {
        $basicos = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrstuvwxyz0123456789";
        $especiales = "!?#$%&@_-";
        $pos = $_GET['ord'];
        $contrasenyas[0] = '';
        
        for ($i = 0; $i < $nPwd; $i++) {
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
        $contrasenyas[$i] = $contrasenya;
    }
        return $contrasenyas;
    }
    $ruta = "./" . $_GET['ruta'] . ".txt";
    $nPwd = $_GET['nPwd'];
    $nBasicos = $_GET['bas'];
    $nEspeciales = $_GET['esp'];
    

    if ($nBasicos < 4){$nBasicos = 4;}
    if ($nBasicos > 8){$nBasicos = 8;}
    if ($nEspeciales < 4){$nEspeciales = 4;}
    if ($nEspeciales > 8){$nEspeciales = 8;}
   
    $contrasenyas = generarArray($nBasicos, $nEspeciales, $nPwd);
    $fitx = fopen($ruta, "a+");
    if ($fitx) {
        fwrite($fitx, "");
        for ($i = 0; $i < count($contrasenyas); $i++) {
            echo $contrasenyas[$i] . "<br>";
            
         }
    }
    fclose($fitx);
?>
