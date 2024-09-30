<?php
function fArrayRef($nom, $ape, $edad, $array) {
    $array[0] = $nom;
    $array[1] = $ape;
    $array[2] = $edad;
}
$array = array(0,0,0);
$nom = "Vicent";
$ape = "Bertet";
$edad = 19;
echo "Contenido inicial array:<br>";
print_r($array);
echo "<br>";
echo "<br>Invocando a función...<br>";
fArrayRef($nom, $ape, $edad, $array);
echo "Contenido tras la ejecución de la función:<br>";
print_r($array)

?>