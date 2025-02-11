<?php
include("header.php");
include("gestionConexion.php");

if (isset($_POST["idProd"]) && isset($_POST['cant']) && isset($_POST['img']) && isset($_POST['precio']) && isset($_POST['nomProd'])) {
    $registro = array(
        "idProd" => $_POST["idProd"], 
        "cant" => $_POST["cant"], 
        "img" => $_POST['img'], 
        "precio" => $_POST['precio'],
        "nomProd" => $_POST['nomProd']
    );

    $encontrado = false;
    if (isset($_SESSION["carrito"])) {
        for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
            if (in_array($registro['idProd'], $_SESSION['carrito'][$i])) {
?>
                <p class="margen">El producto ya esta en el carrito</p>
<?php           
                $encontrado = true;
                break;
            }
        }

    } 

    if (!$encontrado) {
        $_SESSION["carrito"][] = $registro;
?>
        <p class="margen">Se ha añadido al carrito</p>
<?php
    }
}

if (isset($_POST['valoracion']) && isset($_POST['eval']) && isset($_POST['idProd'])) {
    $correcto = anyadirVal($_SESSION["usu"], $_POST["idProd"], $_POST["valoracion"], $_POST["eval"]);
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
try {
    $array = selectAll();
    $pagina = "./todos.php";
    mostrarProductos($array);
} catch (Exception $e) {
    ?>
        <p class="margen">No se han podido mostrar los productos</p>
    <?php
    }
include("footer.php");
?>