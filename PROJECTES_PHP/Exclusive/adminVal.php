<?php
    include("header.php");
    include("gestionConexion.php");
    if ($_SESSION['tpo_usu'] == "Admin") {
        if (isset($_POST["accion"])) {
            $accion = $_POST['accion'];

            $correcto = "";
            if ($accion == 1) {
                $correcto = anyadirVal($_POST['id'], $_POST['email'], $_POST['prod'], $_POST['descrip'], $_POST['eval']);
            } else if ($accion == 2) {
                $correcto = updateVal($_POST['id'], $_POST['email'], $_POST['prod'], $_POST['descrip'], $_POST['eval']);
            } else {
                $correcto = deleteVal($_POST['id'], $_POST['email'], $_POST['prod']);
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
            <div class="ins" onclick="addVal()">+</div>
            <div class="act" onclick="actVal()"><img src="img/editar.png" alt="Editar"></div>
            <div class="eli" onclick="delVal()">-</div>
        </div>
        <div id="protector" class="ocultar"></div>

<?php
        $stmt = selectAllVal();
        $stmt->execute();
        $n_filas = $stmt->rowCount();
        mostrarVal($stmt, $n_filas);
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