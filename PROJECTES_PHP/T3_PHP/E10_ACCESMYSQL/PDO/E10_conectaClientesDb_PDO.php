<?php
$hostname = 'localhost';
$usuario = 'root';
$pwd = '';
$database = 'clientesdb_dwes';
$port = 3306;
$cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;";
try {
    $pdo = new PDO($cadena_conexion, $usuario, $pwd);
    echo "Conexión exitosa a bd:<br><b>$database</b><br>";
    $pdo = null; //Así se cierra la conexión
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
?>
