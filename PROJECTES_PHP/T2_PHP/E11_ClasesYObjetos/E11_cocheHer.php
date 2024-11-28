<?php
    include ("E11_cochePadre.php");
    class CocheHer extends Coche {
        public $color;
        public $extras;
        public function mostrarColor() {
            echo "<h3>" . $this->color . "</h3>";
        }
        public function mostrarExtras() {
            $lista = $this->extras;
            echo "<ul>";
            for ($i = 0; $i < count($lista); $i++) {
                echo "<li>" . $lista[$i] . "</li>";
            }
            echo "</ul>";
        }
    }
?>