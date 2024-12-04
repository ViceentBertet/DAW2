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
    $arrDatos = [
        'id' => 14,
        'desc' => 'Linterna2',
        'prec' => 10.5,
        'stoc' => 3
    ];
    $insert_query = 'INSERT INTO articulo '
            . '(idArticulo, Descripcion, Precio, Stock) '
            . 'VALUES (:id,:desc,:prec,:stoc)';
    $stmt = $pdo->prepare($insert_query);
    $stmt->execute($arrDatos);
    $n_filas = $stmt->rowCount();
    printf("Registros insertados: %d\n<br>", $n_filas);
    $pdo = null; //Así se cierra la conexión
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
?>

