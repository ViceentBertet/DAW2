<?php
    $filename = $_FILES['userfile']['name'];
    $rutaSubidos = "D:\Repositorios\DAW2\SUBIR_ARCHIVOS\up_";
    $nomFinalArchivo = $_FILES['userfile']['name'];
    
    $noUpload = $_FILES['userfile']['tmp_name'] == 'none';
    $noSize = $_FILES['userfile']['size'] == 0;
    
    if ($noUpload || $noSize) {
        echo "Error en la carga del fichero <br>";
    } else {
        $subir = move_uploaded_file($_FILES['userfile']['tmp_name'],
                $rutaSubidos . $nomFinalArchivo);
        
        if ($subir) {
            $tempname = $_FILES['userfile']['tmp_name'];
            echo "Se ha subido con éxito<br>";
            echo "Nombre temporal: $tempname<br>";
            echo "Nombre final: up_$nomFinalArchivo<br>";
        } else {
            echo "No se ha pudido subir el archivo";
        }
    }
    
?>