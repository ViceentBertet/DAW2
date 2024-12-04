<?php
$hostname = 'localhost';
$usuario = 'root';
$pwd = '';
$database = 'clientesdb_dwes';
$port = 3306;
$cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;";
try {
    $pdo = new PDO($cadena_conexion, $usuario, $pwd);
    $matDatos = [
        [20, 'art1', 20, 20],
        [21, 'art', 21,21]
    ];
    $insert_query = 'INSERT INTO articulo '
            . '(idArticulo, Descripcion, Precio, Stock) '
            . 'VALUES (?,?,?,?)';
    $stmt = $pdo->prepare($insert_query);
    $pdo->beginTransaction();
    foreach ($matDatos as $row) {
        $stmt->execute($row);
    }
    $pdo->commit();
    echo "Datos introducidos correctamente";
    $pdo = null; //Así se cierra la conexión
} catch (PDOException $e) {
    $pdo->rollBack();
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
?>

