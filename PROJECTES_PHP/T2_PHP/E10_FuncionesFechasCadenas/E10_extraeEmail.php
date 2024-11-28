<?php
    function comprobarEmail($email) {
        echo "Email a analizar: <br> $email<br>";
        $length = strlen($email);
        echo "Tiene $length letras.<br>";
        $arroba = strpos($email,'@');
        $punto = strpos($email,'.');
        if (!$arroba || !$punto) {
           echo "No es una dirección de email valida<br><br>";
           if (!$arroba) {
               echo "Le falta el @<br>";
           }
           if (!$punto) {
               echo "Le falta el .";
           }
        } else {
           echo "Es una dirección email valida<br><br>";
           echo "El nombre de usuario es: <b>" . substr($email, 0, $arroba) . "</b><br>";
           echo "El dominio es: <b>" . substr($email, $arroba + 1) . "</b>";
            
        }
    }
    comprobarEmail("holagmailcom");
?>

