<?php
function precioConIva(&$precio,$iva = 0.21) {
       echo "<br>El precio INICIAL sin IVA es: <b>$precio</b><br>";
       $precio = $precio + $precio * $iva;
   }
   $precio = 100;
   echo "<b>Programa Principal</b><br>";
   echo "Invocamos a la funcion<br>";
   precioConIva($precio);
   echo "El precio con iva es: <b>$precio</b>"
?>