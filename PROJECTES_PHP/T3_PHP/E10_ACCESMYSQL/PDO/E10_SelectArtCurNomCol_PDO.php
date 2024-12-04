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
    $stmt = $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    printf("Filas seleccionadas %d<br><br>", $n_filas);
    echo "Visualizar datos:<br>";
    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
        echo $registro['idArticulo'] . "<br>";
        echo $registro['Descripcion'] . "<br>";
        echo $registro['Precio'] . "<br>";
        echo $registro['Stock'] . "<br><br>";
    }
    
    $pdo = null; //Así se cierra la conexión
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
?>
