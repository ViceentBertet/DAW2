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
                . "VALUES(?, ?, ?, ?)";
        $sentencia = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($sentencia, "isid", $val1, $val2, $val3, $val4);
        $val1 = 100;
        $val2 = 'Leche de Vaca';
        $val3 = 100.00;
        $val4 = 20;
        $res = mysqli_stmt_execute($sentencia);
        printf("Registros insertados: %d\n", mysqli_affected_rows($link));
        mysqli_stmt_close($sentencia);
        mysqli_close($link);
    }
?>