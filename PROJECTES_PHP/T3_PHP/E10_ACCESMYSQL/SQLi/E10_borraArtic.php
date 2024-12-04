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
        $query = "DELETE FROM articulo"
                . " WHERE idArticulo=14";
        mysqli_query($link, $query);
        printf("Filas BORRADOS: %d\n", mysqli_affected_rows($link));
        mysqli_close($link);
    }
?>
