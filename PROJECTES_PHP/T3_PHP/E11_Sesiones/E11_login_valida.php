<?php
    session_start();
    if (isset($_SESSION['usu'])) {
        echo "Estás conectado como: " . $_SESSION['usu'] . '<br><br>';
        echo "<a href='E11_logout.php'>Salir (Log out)</a>";
    } else {
        echo "No estás conectado<br>";
        echo '<form method="post" action="E11_login_alumno.php"><table>';
            echo '<tr><td>Usuario:</td>';
            echo '<td><input type="text" name="usu"></td></tr>';
            echo '<tr><td>Password:</td>';
            echo '<td><input type="password" name="pwd"></td></tr>';
            echo '<tr><td colspan="2" align="center">';
            echo '<input type="submit" value="Conectar"></td></tr>';
        echo '</table></form><br>';
    }
    
    echo '<br><a href="E11_members_only.php">Sección privada</a>';

?>
