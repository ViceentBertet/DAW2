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
        $tabla_borrada = "articulo2";
        echo "Realizando ACTUALIZACIÓN...<br>";
        $query = "DROP TABLE $tabla_borrada";
        $resultat = mysqli_query($link, $query);
        if ($resultat) {
            echo "Se ha borrado la tabla $tabla_borrada";
        } else {
            echo "No se ha podido borrar la tabla $tabla_borrada";
        }
        mysqli_close($link);
    }
?>
