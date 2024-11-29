<?php
    function comprobarEmail($email) {
        echo "Email a analizar: <br> '$email'<br><br>";
        $length = strlen($email);
        echo "Tiene $length letras.<br>";
        if ($email[0] == ' ' || $email[$length - 1] == ' ') {
            echo "Se han encontrado blancos.<br>Los eliminamos<br>";
            $email = ltrim(rtrim($email));
        } else {
            echo "No se han encontrado blancos<br>";
        }
        echo "<br>Hasta ahora<br>email= $email<br>";
        
        echo "<br>Buscamos .com en email...<br>";
        if (substr($email, $length - 6) == '.com') {
            echo "Hemos encontrado <b>com</b>";
            $email = str_replace('.com', '.es', $email);
        } else {
            echo "No hemos encontrado <b>com</b>";
        }
        echo "<br>Dirección corregida: $email";
    }
    comprobarEmail(' nombreEmail@gmail.com ');
?>
