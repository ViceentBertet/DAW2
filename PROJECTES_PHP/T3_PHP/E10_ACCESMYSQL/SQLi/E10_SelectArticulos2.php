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
        $query = "SELECT * FROM articulo";
        $resultat = mysqli_query($link, $query);
        printf("Filas seleccionadas: %d\n<br>", mysqli_affected_rows($link));
        $filas = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
        foreach ($filas as $filaActual) {
            
            echo $filaActual['idArticulo'] . "<br>";
            echo $filaActual['Descripcion'] . "<br>";
            echo $filaActual['Precio'] . "<br>";
            echo $filaActual['Stock'] . "<br>";
            echo "<br><br>";
        }
        mysqli_close($link);
    }
?>