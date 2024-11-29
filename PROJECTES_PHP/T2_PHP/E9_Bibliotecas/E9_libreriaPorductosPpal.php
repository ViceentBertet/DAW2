<?php
include ("E9_libreriaProductos.php");
echo "Estamos en Principal<br>";
$a = 10;
$b = 20;
$prod = producto($a, $b);
echo "<br>Producto de $a y $b = $prod<br>";
productoVariosValores(2,3,4,6);
?>