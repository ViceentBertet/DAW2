<?php
    if (!empty($_GET['nom'])) {
        echo "Bienvenido " . $_GET['nom'];
    } else {
        echo "No se ha introducido texto";
    }
    
?>

