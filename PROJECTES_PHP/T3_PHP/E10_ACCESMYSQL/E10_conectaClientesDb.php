<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'clientesdb_dwes';
    
    $link = mysqli_connect($hostname, $username, $password, $database);
    
    if (!$link) {
        echo "Error: No se pudo conectar a MYSQL" . PHP.EOL;
        echo "Error de depuracion: " . mysqli_connect_errno() . "<br>";
    } else {
        echo "Conexión exitosa a bd:<br><b>" . $database . "</b><br>";
        mysqli_close($link);
    }
?>
