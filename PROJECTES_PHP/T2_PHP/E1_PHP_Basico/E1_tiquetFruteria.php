<?php
    define("PRECIO_JUDIAS", 3.50);
    define("PRECIO_PATATAS", 0.40);
    define("PRECIO_TOMATES", 1);
    define("PRECIO_MANZANAS", 1.20);
    define("PRECIO_UVAS", 2.50);
    
    $peso_judias = 1.21;
    $peso_patatas = 1.73;
    $peso_tomates = 2.08;
    $peso_manzanas = 2.15;
    $peso_uvas = 0.77;
    
    $coste_judias = PRECIO_JUDIAS * $peso_judias;
    $coste_patatas = PRECIO_PATATAS * $peso_patatas;
    $coste_tomates = PRECIO_TOMATES * $peso_tomates;
    $coste_manzanas = PRECIO_MANZANAS * $peso_manzanas;
    $coste_uvas = PRECIO_UVAS * $peso_uvas;
    $total = $coste_judias + $coste_patatas + $coste_tomates + $coste_manzanas + $coste_uvas;
    
    echo '<h4>PRODUCTO - PRECIO Euros/KG - PESO - PRECIO concepto</h4>';
    echo '<p>JUDIAS ---------------- ' . PRECIO_JUDIAS . ' -------------- ' . $peso_judias . ' ----------- ' . number_format($coste_judias, 2) . '<br>';
    echo 'PATATAS ---------------- ' . PRECIO_PATATAS . ' -------------- ' . $peso_patatas . ' ----------- ' . number_format($coste_patatas, 2) . '<br>';
    echo 'TOMATES ---------------- ' . PRECIO_TOMATES . ' -------------- ' . $peso_tomates . ' ----------- ' . number_format($coste_tomates, 2) . '<br>';
    echo 'MANZANAS ------------ ' . PRECIO_MANZANAS . ' -------------- ' . $peso_manzanas . ' ----------- ' . number_format($coste_manzanas, 2) . '<br>';
    echo 'UVAS ------------------- ' . PRECIO_UVAS . ' -------------- ' . $peso_uvas . ' ----------- ' . number_format($coste_uvas, 2) . '</p>';
    
    echo '<h4>TOTAL:' . number_format($total, 2) . '</h4>';
    echo '<p>Gracias por su compra</p>'
?>

