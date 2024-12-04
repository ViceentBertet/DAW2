<?php
    $searchtype = $_POST['searchtype'];
    $searchterm = trim($_POST['searchterm']);
    if (!$searchtype || !$searchterm) {
        echo "No has intruducido patrón de búsqueda";
    } else {
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'bookorama';

        $link = mysqli_connect($hostname, $username, $password, $database);

        if (!$link) {
            echo "Error: No se pudo conectar a MYSQL" . PHP.EOL;
            echo "Error de depuracion: " . mysqli_connect_errno() . "<br>";
        } else {
            echo "Seleccionando filas...<br>";
            $query = "SELECT * FROM books WHERE $searchtype LIKE '%$searchterm%'";
            $resultat = mysqli_query($link, $query);
            printf("Filas seleccionadas: %d\n<br>", mysqli_affected_rows($link));
            $filas = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
            foreach ($filas as $filaActual) {
                print_r($filaActual);
                echo "<br>";
            }
            mysqli_close($link);
        }
    }
    
?>