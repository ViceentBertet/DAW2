<?php
    include("header.php");
    include("gestionConexion.php");
    $array = "";
    if ($_SESSION['tpo_usu'] != "Cliente") {
        if (isset($_POST["accion"])) {
            $accion = $_POST['accion'];

            $correcto = "";
            if ($accion == 1) {
                $correcto = anyadirVal( $_POST['email'], $_POST['prod'], $_POST['descrip'], $_POST['eval']);
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
        $array = selectAllVal();
        
    } else {
        $array = selectUsuVal($_SESSION['usu']);
    }
    mostrarVal($array);
    include("footer.php");
?>