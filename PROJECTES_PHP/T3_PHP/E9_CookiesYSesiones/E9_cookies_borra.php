<?php
    function borra_cookie($nombre_cookie) {
        if(isset($_COOKIE[$nombre_cookie])) {
            setcookie($nombre_cookie);
            unset($_COOKIE[$nombre_cookie]);
            return true;
        }
        return false;
    }
    $nombre_cookie = "contador";
    echo "Intentamos borra manualmente la cookie...<br>";
    if (isset($_COOKIE[$nombre_cookie])) {
        borra_cookie($nombre_cookie);
        echo  "Borrado la cookie <b>$nombre_cookie</b><br>" 
                . "Intentamos ver su contenido...<br><br>";
        echo "No tiene contenido<br><br>";
    } else {
        echo "No se ha podido borrar la cookie<br><br>";
    }
    
?>