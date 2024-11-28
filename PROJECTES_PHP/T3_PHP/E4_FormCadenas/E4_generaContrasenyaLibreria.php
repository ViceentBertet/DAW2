<?php
    include ("E4_libGeneraContrasenya.php"); 
    $nBasicos = $_GET['bas'];
    $nEspeciales = $_GET['esp'];
    
     
    if ($nBasicos < 4){$nBasicos = 4;}
    if ($nBasicos > 8){$nBasicos = 8;}
    if ($nEspeciales < 4){$nEspeciales = 4;}
    if ($nEspeciales > 8){$nEspeciales = 8;}
    
    $contrasenya = generarPassword($nBasicos, $nEspeciales);

    echo "<b> El password generado aleatoriamente es: <br> $contrasenya</b>";
?>