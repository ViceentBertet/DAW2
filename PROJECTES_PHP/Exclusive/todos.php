<?php
include("header.php");
include("gestionConexion.php");
try {
    $stmt = selectAll();
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    mostrarProductos($stmt, $n_filas);
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
include("footer.php");
?>