<?php
$hostname = 'localhost';
$usuario = 'root';
$pwd = '';
$database = 'clientesdb_dwes';
$port = 3306;
$cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;";
try {
    $pdo = new PDO($cadena_conexion, $usuario, $pwd);
    $query = 'SELECT * FROM articulo';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    printf("Filas seleccionadas %d<br><br>", $n_filas);
    echo "Visualizar datos:<br>";
    $datos = $stmt->fetchAll();
    foreach ($datos as $registro) {
        echo $registro[0] . "<br>";
        echo $registro[1] . "<br>";
        echo $registro[2] . "<br>";
        echo $registro[3] . "<br><br>";
    }
    
    $pdo = null; //Así se cierra la conexión
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
?>