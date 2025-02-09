<?php
    include("gestionConexion.php");
    if (isset($_GET['prod'])) {
        header('Content-Type: application/json; charset=utf-8');
        $registros = selectIdValNom($_GET['prod']);
        echo json_encode($registros);
    } else {
        return json_encode([]);
    }
?>