<?php
$hostname = 'localhost';
$usuario = 'root';
$pwd = '';
$database = 'clientesdb_dwes';
$port = 3306;
$cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;";
try {
    $pdo = new PDO($cadena_conexion, $usuario, $pwd);
    $query = 'DROP TABLE articulo2';
    $stmt = $pdo->prepare($query); 
    $n_filas = $stmt->rowCount();
 
    if ($stmt->execute()) {
        echo "Tabla eliminada satisfactoriamente";
    } else {
        print_r($stmt->errorInfo());
    }
    $pdo = null; //Así se cierra la conexión
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
?>