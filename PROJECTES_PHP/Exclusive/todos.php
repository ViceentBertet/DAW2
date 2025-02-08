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
    if (isset($_POST['valoracion']) && isset($_POST['eval']) && isset($_POST['producto'])) {
        $correcto = anyadirVal($_SESSION["usu"], $_POST["producto"], $_POST["valoracion"], $_POST["eval"]);
        if ($correcto) {
?>
            <p class="margen">Se ha añadido correctamente su reseña</p>
<?php
        } else {
?>
            <p class="margen">No se ha podido añadir la reseña</p>
<?php
        }
    }
    $stmt = selectAll();
    $pagina = "./todos.php";
    mostrarProductos($stmt);
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
include("footer.php");
?>