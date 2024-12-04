<?php
$hostname = 'localhost';
$usuario = 'root';
$pwd = '';
$database = 'clientesdb_dwes';
$port = 3306;
$cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;";
try {
    $pdo = new PDO($cadena_conexion, $usuario, $pwd);
    $id = 1;
    $query = 'SELECT * FROM articulo WHERE idArticulo=?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $n_filas = $stmt->rowCount();
    printf("Filas seleccionadas %d<br><br>", $n_filas);
    if ($n_filas > 0) {
        echo "Visualizar datos:<br>";
        $datos = $stmt->fetchAll();
        foreach ($datos as $registro) {
            print_r($registro);
        }
    }
    $pdo = null; //Así se cierra la conexión
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
?>