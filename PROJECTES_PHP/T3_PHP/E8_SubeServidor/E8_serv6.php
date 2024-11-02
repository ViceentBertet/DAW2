<?php
    $filename = $_FILES['userfile']['name'];
    $rutaSubidos = "D:\Repositorios\DAW2\SUBIR_ARCHIVOS\\";
    $nomFinalArchivo = "up_" . $_FILES['userfile']['name'];
    $noUpload = $_FILES['userfile']['tmp_name'] == 'none';
    $noSize = $_FILES['userfile']['size'] == 0;
    $rutaDoc = $rutaSubidos . "doc\\";
    $rutaDsc = $rutaSubidos . "dsc\\";    
    $rutaExiste = @opendir($rutaSubidos);
    $docExiste = @opendir($rutaDoc);
    $dscExiste = @opendir($rutaDsc);
    echo "<h2>Comprueba si existe el directorio SUBIR_ARCHIVOS,"
    . "añade /doc y /dsc si es necesario</h2>";
    if (!$rutaExiste) {
        echo "Error: No existe el directorio <b>$rutaSubidos</b>";
    } else {
        echo "Vamos a intentar subir el archivo al directorio doc/<br>";
        if (!$docExiste) {
            echo "No existe el directorio doc<br>"
            . "Lo vamos a crear...<br><br>";
            mkdir($rutaDoc);
        }
        if (!$dscExiste) {
            echo "No existe el directorio dsc<br>"
            . "Lo vamos a crear...<br><br>";
            mkdir($rutaDsc);
        }
        if ($noUpload || $noSize) {
            echo "ERROR: El archivo no se ha podido guardar. Intentalo de nuevo";            
        } else if ($_POST['desc'] == null){
            echo "ERROR: La descripción se debe rellenar";            
        } else {
            $subir = move_uploaded_file($_FILES['userfile']['tmp_name'],
               $rutaDoc. $nomFinalArchivo);
            if ($subir) {
                echo "<br>El archivo se ha subido con éxito!<br>";                
            } else {
                echo "No se ha pudido subir el archivo";
            }
            $gestor = fopen($rutaDsc . "descripciones.txt", "a+");
            if ($gestor) {
                fwrite($gestor, date('d/m/Y (H:i)'). "\t"                   
                        . $_POST["desc"] . " <br>\n");
            } else {
                echo "No se ha podido abrir el archivo";
            }
        }
    }
?>
