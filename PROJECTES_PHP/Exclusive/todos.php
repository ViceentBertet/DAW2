<?php
include("header.php");
include("gestionConexion.php");

if (isset($_GET["idProd"]) && isset($_GET['cant']) && isset($_GET['img']) && isset($_GET['precio']) && isset($_GET['nomProd'])) {
    $registro = array(
        "idProd" => $_GET["idProd"], 
        "cant" => $_GET["cant"], 
        "img" => $_GET['img'], 
        "precio" => $_GET['precio'],
        "nomProd" => $_GET['nomProd']);

    $_SESSION["carrito"][] = $registro;
?>
    <p class="margen">Se ha añadido al carrito</p>
<?php
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