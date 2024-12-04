<?php
    session_start();
    $_SESSION['sess_var'] = "Hola Mundo!";
    echo 'El contenido de $_SESSION["sess_var"] es Hola Mundo!<br><br>'
    . 'Veamos cómo se mantiene su valor al enlazar con la siguiente página...<br><br>'
    . 'Pulsa SIGUIENTE PÁGINA, se ejecutrará page2... <br><br><br>'
    . '<a href="E11_page2.php">Siguiente página</a>';
?>
