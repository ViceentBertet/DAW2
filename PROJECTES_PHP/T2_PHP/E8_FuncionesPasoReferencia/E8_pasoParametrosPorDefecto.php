<?php
function porDefecto($param1 = "YOU", $param2 = "MY", $param3 = "BLUE") {
    return $param1 . " " . $param2 . " " . $param3;
}
$argum1 = "Hola";
$argum2 = "Adios";
$argum3 = "Si";
echo "3: <br>";
echo porDefecto($argum1,$argum2,$argum3);
echo "<br>2: <br>";
echo porDefecto($argum1,$argum2);
echo "<br>1: <br>";
echo porDefecto($argum1);
echo "<br>0: <br>";
echo porDefecto();
?>
