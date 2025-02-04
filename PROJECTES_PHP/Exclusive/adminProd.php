<?php
    include("header.php");
    include("gestionConexion.php");

<<<<<<< HEAD
    if ($_SESSION['tpo_usu'] != "Cliente") {
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
=======
    if (isset($_POST["accion"])) {
        $accion = $_POST['accion'];
        
        $correcto = "";
        if ($accion == 1) {
            $correcto = anyadirProd($_POST['id'], $_POST['nom'], $_POST['descrip'], $_FILES['img'], $_POST['precio'], $_POST['stock'], $_POST['tipo']);
        } else if ($accion == 2) {
            $correcto = updateProd($_POST['id'], $_POST['nom'], $_POST['descrip'], $_FILES['img'], $_POST['precio'], $_POST['stock'], $_POST['tipo']);
        } else {
            $correcto = deleteProd($_POST['id']);
        }
        if ($correcto) {
>>>>>>> d71cbb446bd4cc83ca592a7ec4b8a79242043d4f
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
    } else {
?>
        <div class="formulari">
            <p>Usted no tiene permisos para estar aquí</p>
            <a href="administrar.php">Pulsa aquí para volver</a>
        </div>
<?php
    }
    include("footer.php");
?>