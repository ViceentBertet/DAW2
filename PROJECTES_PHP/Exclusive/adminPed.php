<?php
    include("header.php");
    include("gestionConexion.php");
    $array = "";
    if ($_SESSION['tpo_usu'] != "Cliente") {
        if (isset($_POST["accion"])) {
            $accion = $_POST['accion'];

            $correcto = "";
            if ($accion == 1) {
                $correcto = updatePed($_POST['id'], $_POST['opcion'], $_POST['newValue']);
            } else {
                $correcto = deletePed($_POST['id']);
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
            <div class="act" onclick="actPed()"><img src="img/editar.png" alt="Editar"></div>
            <div class="eli" onclick="delPed()">-</div>
        </div>
        <div id="protector" class="ocultar"></div>

<?php
        $array = selectAllPed();
        
    } else {
        $array = selectUsuPed($_SESSION['usu']);
    }
    mostrarPed($array);
    include("footer.php");
?>