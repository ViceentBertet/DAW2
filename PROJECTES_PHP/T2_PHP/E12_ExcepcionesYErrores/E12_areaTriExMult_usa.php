<?php
include ("E12_areaTriExMult.php");
$t = new E12_areaTriExMult();
try {
    $t->areaTriangulo(-5, 10);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>