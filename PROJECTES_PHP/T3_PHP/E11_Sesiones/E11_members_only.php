<?php
    session_start();
    echo "<h1>Unicamente socios</h1>";
    if (isset($_SESSION['usu'])) {
        echo "<p>Conectado como ". $_SESSION['usu'] . "</p>";
        echo "<p>Aqui iria el contenido de Socios</p>";
    } else {
        echo "<p>No estás conectado</p>";
        echo "<p>Solo los socios pueden visualizar aquesta pagina</p>";
    }
    echo "<a href='E11_login_valida.php'>Volver a la pagina de inicio</a>";
?>
