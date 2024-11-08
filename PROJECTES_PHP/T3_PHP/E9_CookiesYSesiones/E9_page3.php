<?php
    session_start();
    echo 'El contenido de $_SESSION["sess_var"] es ' . $_SESSION["sess_var"]
            . "<br>Hemos visto que se ha perdido el valor de la variable<br><br>"
            . "<i>A continuación vamos a destruir el id de la sesión<br>"
            . "mediante session_destroy()</i><br><br>";
    session_destroy();
    echo "<b>Sesión destruida!!</b>";
?>

