<?php
   function precioConIva($iva, &$precio) {
       echo "<br>El precio INICIAL sin IVA es: <b>$precio</b><br>";
       $precio = $precio + $precio * $iva;
   }
   $precio = 100;
   $iva = 0.21;
   echo "<b>Programa Principal</b><br>";
   echo "El valor del IVA lo establecemos desde él.<br>";
   echo "El valor del IVA es: $iva<br>";
   echo "Invocamos a la funcion<br>";
   precioConIva($iva, $precio);
   echo "El precio con iva es: <b>$precio</b>"
?>

