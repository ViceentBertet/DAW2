<?php
    include("E11_cuadrado.php");
    include("E11_pentagono.php");
    include("E11_hexagono.php");
    $c = new Cuadrado(5);
    $p = new Pentagono(5, 4);
    $h = new Hexagono(5, 4);
    echo "Area del cuadrado: " . $c->calcularArea();
    echo "<br>Perimetro del cuadrado: " . $c->calcularPerimetro();
    echo "<br><hr>Area del pentagono: " . $p->calcularArea();
    echo "<br>Perimetro del pentagono: " . $p->calcularPerimetro();
    echo "<br><hr>Area del hexagono: " . $h->calcularArea();
    echo "<br>Perimetro del hextagono: " . $h->calcularPerimetro();

?>