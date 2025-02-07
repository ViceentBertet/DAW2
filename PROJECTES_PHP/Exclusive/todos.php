<?php
include("header.php");
include("gestionConexion.php");
try {
    if (isset($_GET["producto"])) {
        unset($_SESSION["carrito"]);
        if (isset($_SESSION["carrito"])) {
            $_SESSION["carrito"][count($_SESSION["carrito"])] = $_GET["producto"];

        } else {
            $_SESSION["carrito"] = [];
            $_SESSION["carrito"][0] = $_GET["producto"];
        }

        print_r( $_SESSION["carrito"]);
    }
    $stmt = selectAll();
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    mostrarProductos($stmt, $n_filas);
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
include("footer.php");
?>