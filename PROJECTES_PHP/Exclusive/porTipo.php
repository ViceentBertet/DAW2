<?php
include("header.php");
include("gestionConexion.php");
$type = $_GET['type'];
try {
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
    //TODO Arreglar redireccionamiento;
    $stmt = selectByType($type);
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    $pagina = "./porTipo.php";
    mostrarProductos($stmt, $n_filas, $pagina);
} catch (PDOException $e) {
    echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
}
include("footer.php");
?>