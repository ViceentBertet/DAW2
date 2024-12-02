<?php
    if (!empty($_POST['isbn']) && !empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['price'])) {
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'bookorama';

        $link = mysqli_connect($hostname, $username, $password, $database);

        if (!$link) {
            echo "Error: No se pudo conectar a MYSQL" . PHP.EOL;
            echo "Error de depuracion: " . mysqli_connect_errno() . "<br>";
        } else {
            $query = "INSERT INTO books "
                    . "VALUES(?, ?, ?, ?)";
            $sentencia = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($sentencia, "isid", $_POST['isbn'], $_POST['author'], $_POST['title'], $_POST['price']);                                         
            $res = mysqli_stmt_execute($sentencia);
            if ($res) {
                echo "Se ha insertado el libro<br>";
                printf("Registros insertados: %d\n", mysqli_affected_rows($link));
            } else {
                echo "No se ha podido insertar el libro";
            }
            mysqli_stmt_close($sentencia);
            mysqli_close($link);
        }
    } else {
        echo "ERROR: HAS DE RELLENAR TODOS LOS CAMPOS<br>";
        echo "<a href='newBook.html'>Volver</a>";
    }
?>