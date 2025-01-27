<?php
    include("header.php");
    $hostname = 'localhost';
    $usuario = 'root';
    $pwd = '';
    $database = 'exclusivebddpruebas';
    $port = 3306;
    $cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;";
    try {
        $pdo = new PDO($cadena_conexion, $usuario, $pwd);
        $query = 'SELECT * FROM producto';
        $stmt = $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
        $stmt->execute();
        $n_filas = $stmt->rowCount();
        printf("Productos encontrados: %d<br><br>", $n_filas);
        echo "<div class='productos'>";
        while ($registro = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            echo "<div>";
                // Nom
                echo $registro[1] . "<br>";
                // Descripción
                echo $registro[2] . "<br>";
                // Ruta de imagen
                echo "<img src='" . $registro[3] . "' alt'" . $registro[1]. "'><br>";
                echo $registro[4] . "<br>";
                // Precio
                echo $registro[5] . "€ <br>";
                // Stock
                echo $registro[6] . "<br>";
            echo "</div>";

        }
        echo "</div>";
        $pdo = null; //Así se cierra la conexión
    } catch (PDOException $e) {
        echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
    }
    include("footer.php");
?>