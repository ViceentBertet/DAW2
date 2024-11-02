<?php
    $filename = $_FILES['userfile']['name'];
    $rutaSubidos = "D:\Repositorios\DAW2\SUBIR_ARCHIVOS\\";
    $nomFinalArchivo = "up_" . $_FILES['userfile']['name'];
    $noUpload = $_FILES['userfile']['tmp_name'] == 'none';
    $noSize = $_FILES['userfile']['size'] == 0;
    $rutaExiste = @opendir($rutaSubidos);
    echo "<h2>Comprueba si existe el directorio SUBIR_ARCHIVOS, "
    . "el size inferior a 100k y "
    . "controla el tipo de fichero PDF/PS</h2>";
    if (!$rutaExiste) {
        echo "Error: No existe el directorio <b>$rutaSubidos</b>";
    } else {
        $sizeFile = $_FILES['userfile']['size'];
        $maxSize = 102400;
        $linea = explode('.', $filename);
        echo "<b>El tipo de fichero escogido es:</b> .$linea[1]<br>";
        if ($sizeFile > $maxSize) {
            echo "Fichero excede límite. Supera $maxSize <br>"
                . "<b>No se podemos realizar la operacion de subida</b><br>"
                . "El archivo tiene un tamaño de $sizeFile bytes"; 
        } else if ($noUpload || $noSize) {
          echo "Error en la carga del fichero <br>";
        } else if ($linea[1] != "pdf" && $linea[1] != "ps") {
            echo "Solo se pueden subir los ficheros pdf y ps.";                
        } else {
            $subir = move_uploaded_file($_FILES['userfile']['tmp_name'],
                    $rutaSubidos . $nomFinalArchivo);
            if ($subir) {
                echo "Fichero válido. Se ha subido con éxito!<br>";                
            } else {
                echo "No se ha pudido subir el archivo";
            }
        }
    }
?>

