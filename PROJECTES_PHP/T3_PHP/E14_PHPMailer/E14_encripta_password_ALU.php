<?php
    $password = '';
    
    $encripted_password = base64_encode($password);
    
    echo "Contraseña encriptada:" . $encripted_password;
?>
