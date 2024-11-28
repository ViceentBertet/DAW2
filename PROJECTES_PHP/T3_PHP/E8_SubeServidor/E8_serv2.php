<?php
    $filename = $_FILES['userfile']['name'];
    $rutaSubidos = "D:\Repositorios\DAW2\SUBIR_ARCHIVOS\\";
    $nomFinalArchivo = "up_" . $_FILES['userfile']['name'];
    
    $noUpload = $_FILES['userfile']['tmp_name'] == 'none';
    $noSize = $_FILES['userfile']['size'] == 0;
    
    $rutaExiste = @opendir($rutaSubidos);
    echo "<h2>Comprueba si existe el directorio SUBIR_ARCHIVOS</h2>";
    if (!$rutaExiste) {
        echo "Error: No existe el directorio <b>$rutaSubidos</b>";
    } else {
        if ($noUpload || $noSize) {
          echo "Error en la carga del fichero <br>";
        } else {
            $subir = move_uploaded_file($_FILES['userfile']['tmp_name'],
                    $rutaSubidos . $nomFinalArchivo);
            if ($subir) {
                $tempname = $_FILES['userfile']['tmp_name'];
                echo "Nombre y ruta completa del archivo <b>$rutaSubidos$nomFinalArchivo</b><br>";
                echo "Si existe el directorio: <b>$rutaSubidos</b><br>";  
                echo "Nombre de Fichero: <b>$nomFinalArchivo</b> válido.<br>";
                echo "Se ha subido con éxito<br>";                
            } else {
                echo "No se ha pudido subir el archivo";
            }
        }
    }
?>