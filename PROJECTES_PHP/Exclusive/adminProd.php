<?php
    include("header.php");
    include("gestionConexion.php");

    if (isset($_POST["accion"])) {
        $accion = $_POST['accion'];
        
        $correcto = "";
        if ($accion == 1) {
            $correcto = anyadirProd($_POST['id'], $_POST['nom'], $_POST['descrip'], $_POST['img'], $_POST['precio'], $_POST['stock'], $_POST['tipo']);
        } else if ($accion == 2) {
            $correcto = updateProd($_POST['id'], $_POST['nom'], $_POST['descrip'], $_POST['img'], $_POST['precio'], $_POST['stock'], $_POST['tipo']);
        } else {
            $correcto = deleteProd($_POST['id']);
        }
        if ($correcto) {
?>
            <p class="margen">La operación se ha realizado con exito</p>
<?php
        } else {
?>
            <p class="margen">La operación no se ha podido realizar</p>
<?php
        }
    }
?>
    <div class="opciones">
        <div class="ins" onclick="addProd()">+</div>
        <div class="act" onclick="actProd()"><img src="img/editar.png" alt="Editar"></div>
        <div class="eli" onclick="delProd()">-</div>
    </div>
    <div id="protector" class="ocultar"></div>

<?php
    $stmt = selectAll();
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    mostrarTablaProd($stmt, $n_filas);
    include("footer.php");
?>