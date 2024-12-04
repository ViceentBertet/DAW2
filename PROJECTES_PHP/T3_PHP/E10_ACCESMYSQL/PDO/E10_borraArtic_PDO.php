<?php
$hostname = 'localhost';
$usuario = 'root';
$pwd = '';
$database = 'clientesdb_dwes';
$port = 3306;
$cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;";
try {
    $pdo = new PDO($cadena_conexion, $usuario, $pwd);

    $query = 'DELETE FROM articulo '
            . 'WHERE idArticulo = ?';
    $id = 1;
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $id);  
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    printf("Registros borrados: %d\n<br>", $n_filas);

    $pdo = null; //Así se cierra la conexión
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
?>