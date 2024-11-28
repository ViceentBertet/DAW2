<?php
    session_start();
    $_SESSION['sess_var'] = "Hola Mundo!";
    echo 'Intentamos acceder al contenido de la variable $_SESSION...<br><br>'
    . 'El contenido de $_SESSION["sess_var"] es: ' . $_SESSION['sess_var'] . '<br><br>'
    . 'Ahora aplicamos unset($_SESSION["sess_var"])<br>'   
    . 'por lo que se pierde el valor de la variable...<br><br>';
    unset($_SESSION["sess_var"]);
    echo 'Pulsa SIGUIENTE PÁGINA, se ejecutrará page3...<br>'
    . '<a href="E9_page3.php">Siguiente página</a>';
?>

