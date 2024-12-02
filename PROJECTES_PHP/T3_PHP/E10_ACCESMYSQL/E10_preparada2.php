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
        $query = "SELECT idArticulo FROM articulo "
                . "WHERE Descripcion=?";
        if ($stmt = mysqli_prepare($link, $query)) {
            $descrip = 'Mochila M28';        
            mysqli_stmt_bind_param($stmt, "s", $descrip);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $idArt);
            mysqli_stmt_fetch($stmt);
            printf("%s es el idArticulo del producto %s\n", $idArt, $descrip);
            mysqli_stmt_close($stmt); 
        }        
        mysqli_close($link);
    }
?>