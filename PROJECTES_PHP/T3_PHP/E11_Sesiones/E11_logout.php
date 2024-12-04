<?php
    session_start();
    $usu = $_SESSION['usu'];
    unset($_SESSION['usu']);
    session_destroy();
    echo "Has cerrado la sesion de $usu";
    //Si hacemos el if de los apuntes nos da una expcepcion, no tiene
    // sentido que podamos acceder a esta pagina si no se puede deslogear
    echo "<br><a href='E11_login_valida.php'>Volver a la pagina de inicio</a>";
?>