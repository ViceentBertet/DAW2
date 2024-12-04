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
        $query = "INSERT INTO articulo "
                . "(idArticulo, Descripcion, Precio, Stock)"
                . "VALUES(14, 'Linterna2', 10.5, 3)";
        mysqli_query($link, $query);
        printf("Filas insertadas: %d\n", mysqli_affected_rows($link));
        mysqli_close($link);
    }
?>

