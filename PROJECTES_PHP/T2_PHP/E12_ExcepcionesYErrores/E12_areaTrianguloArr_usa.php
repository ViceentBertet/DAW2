<?php
include ("E12_areaTrianguloArr.php");
$bases1 = array(1,6,4);
$bases2 = array(-1,6,4);
$alturas1 = array(2,6,4);
$alturas2 = array(2,-6,4);
$t1 = new E12_areaTrianguloArr();
$t2 = new E12_areaTrianguloArr();
$t1->areasTriangulos($bases1, $alturas1);
echo "<br>";
$t1->areasTriangulos($bases2, $alturas2);
?>

