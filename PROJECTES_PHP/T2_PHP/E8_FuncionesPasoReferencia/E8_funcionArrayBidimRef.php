<?php
include ("E8_mostrarArrayTabla.php");
function fArrayRef($nom, $ape, $edad, &$array) {
    $array[1][0] = $nom;
    $array[1][1] = $ape;
    $array[1][2] = $edad;
}
$array = array(array("Nombre", "Apellido", "Edad"),array(0,0,0));
$nom = "Vicent";
$ape = "Bertet";
$edad = 19;
echo "Contenido inicial array:<br>";
mostrarArray($array);
echo "<br><br>";
echo "Invocando a función...<br>";
fArrayRef($nom, $ape, $edad, $array);
echo "Contenido tras la ejecución de la función:<br><br>";
mostrarArray($array);

?>