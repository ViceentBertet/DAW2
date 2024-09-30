<?php
include ("E8_mostrarArrayTabla.php");
function fArrayRef($nom, $ape, $edad, &$array) {
    $nArray = count($array);
    $array[$nArray][0] = $nom;
    $array[$nArray][1] = $ape;
    $array[$nArray][2] = $edad;
}
$array = array(array("Nombre", "Apellido", "Edad"),array("Jordi","Domenech",21));
$nom = "Vicent";
$ape = "Bertet";
$edad = 19;
echo "Contenido inicial array:<br>";
mostrarArray($array);
echo "<br>";
echo "Invocando a función...<br>";
fArrayRef($nom, $ape, $edad, $array);
echo "Contenido tras la ejecución de la función:<br><br>";
mostrarArray($array);

?>