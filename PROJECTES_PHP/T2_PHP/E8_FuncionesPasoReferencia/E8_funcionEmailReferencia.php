<?php
    function creaEmail(&$nombre, $nomDominio, $ext) {
        $coincide = false;
        define("EXPRESIONES", array ("es", "com"));
        for ($i = 0; $i < count(EXPRESIONES); $i++) {
            if ($ext == EXPRESIONES[$i]) {
                $coincide = true;
                break;
            }
        }
        if ($coincide) {
            $nombre = $nombre . "@" . $nomDominio . "." . $ext;
        } else {
            $nombre = $coincide;
        }
    }
    echo "Invocando a función...<br><br>";
    $nombre = "vicent1234";
    $nomDominio = "gmail";
    $ext = "es";
    creaEmail($nombre, $nomDominio, $ext);
    
    if ($nombre == false) {
        echo "Extension incorrecta: <b>$ext</b>";
    } else {
        echo "Email completo es...<br><br>";
        echo "<b>$nombre</b>";
    }
    
?>

