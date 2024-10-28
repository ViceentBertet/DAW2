
<?php
    echo "<h1>Listado del contenido del directorio actual</h1>
            <h2>Varias Formas de hacerlo</h2>
            <h3>Versión mediante exec</h3>";
    $resultat = "";
    exec("dir", $resultat);
    echo "<pre>";
    foreach ($resultat as $line) {
        echo $line . "<br>";
    }
    echo "</pre>";
    echo "<br><h3>Versión mediante system</h3>";
    echo "<pre>";
        $resultat = system("dir", );
    echo "</pre>";
    echo "<br><h3>Versión mediante comilla invertida</h3>";
    $resultat = `dir`;
    echo "<pre>$resultat</pre>";
?>