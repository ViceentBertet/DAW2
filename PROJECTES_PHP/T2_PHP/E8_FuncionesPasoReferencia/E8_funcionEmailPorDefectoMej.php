<?php
    function creaEmail(&$nombre, $nomDominio = "gmail", $ext = "es") {
        $coincide = false;
        define("EXPRESIONES", array ("es", "com"));
        if (func_num_args() == 3) {
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
        } else {
            $nombre = $nombre . "@" . $nomDominio . "." . $ext;
        }
        
    }
    echo "Invocando a función...<br><br>";
    $nombre = "vicentDominio";
    $nomDominio = "outlook";
    $ext = "uk";
    creaEmail($nombre);
    
    if ($nombre == false) {
        echo "Extension incorrecta: <b>$ext</b>";
    } else {
        echo "Email completo es...<br><br>";
        echo "<b>$nombre</b>";
    }
    
?>
