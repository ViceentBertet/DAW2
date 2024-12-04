<?php
$hostname = 'localhost';
$usuario = 'root';
$pwd = '';
$database = 'clientesdb_dwes';
$port = 3306;
$cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;";
try {
    $pdo = new PDO($cadena_conexion, $usuario, $pwd);

    $query = 'UPDATE articulo '
            . 'SET descripcion=?, precio=?, stock=? '
            . 'WHERE idArticulo=?';
    $desc = 'modf';
    $prec = 12;
    $stoc = 11;
    $id = 1;
    
    $stmt = $pdo->prepare($query);
    
    $stmt->bindParam(1, $desc);
    $stmt->bindParam(2, $prec);
    $stmt->bindParam(3, $stoc);
    $stmt->bindParam(4, $id);  
    
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    printf("Registros actualizados: %d\n<br>", $n_filas);

    $pdo = null; //Así se cierra la conexión
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
?>