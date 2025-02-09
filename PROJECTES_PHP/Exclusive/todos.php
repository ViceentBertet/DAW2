<?php
include("header.php");
include("gestionConexion.php");

if (isset($_GET["producto"]) && isset($_GET['cant'])) {
    unset($_SESSION["carrito"]);
    $_SESSION["carrito"][] = array("prod" => $_GET["producto"], "cant" => $_GET["cant"]);
    
}
print_r( $_SESSION["carrito"]);

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
$array = selectAll();
$pagina = "./todos.php";
mostrarProductos($array);
include("footer.php");
?>