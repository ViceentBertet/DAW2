<?php
    $filename = $_FILES['userfile']['name'];
    $rutaSubidos = "D:\Repositorios\DAW2\SUBIR_ARCHIVOS\\";
    $nomFinalArchivo = "up_" . $_FILES['userfile']['name'];
    $noUpload = $_FILES['userfile']['tmp_name'] == 'none';
    $noSize = $_FILES['userfile']['size'] == 0;
    $rutaDoc = $rutaSubidos . "doc\\";
    $rutaExiste = @opendir($rutaSubidos);
    $docExiste = @opendir($rutaDoc);

    echo "<h2>Comprueba si existe el directorio SUBIR_ARCHIVOS,"
    . "añade /doc si es necesario</h2>";
    if (!$rutaExiste) {
        echo "Error: No existe el directorio <b>$rutaSubidos</b>";
    } else {
        echo "Vamos a intentar subir el archivo al directorio doc/<br>";
        if (!$docExiste) {
            echo "No existe el directorio doc<br>"
            . "Lo vamos a crear...<br>";
            mkdir($rutaDoc);
        }
        $subir = move_uploaded_file($_FILES['userfile']['tmp_name'],
               $rutaDoc. $nomFinalArchivo);
        if ($subir) {
            echo "<br>El archivo se ha subido con éxito!<br>";                
        } else {
            echo "No se ha pudido subir el archivo";
        } 
    }
?>