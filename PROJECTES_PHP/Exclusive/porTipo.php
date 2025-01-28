<?php
include("header.php");
include("gestionConexion.php");
$type = $_GET['type'];
try {
    $stmt = selectByType($type);
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    mostrarProductos($stmt, $n_filas);
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
include("footer.php");
?>