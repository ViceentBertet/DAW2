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
        echo "Realizando ACTUALIZACIÓN...<br>";
        $query = "UPDATE articulo"
                . " SET Descripcion='Modificar'"
                . " WHERE idArticulo=1";
        mysqli_query($link, $query);
        printf("Filas MODIFICADAS: %d\n", mysqli_affected_rows($link));
        mysqli_close($link);
    }
?>