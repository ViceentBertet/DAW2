<?php
    require_once "E11_interFiguraGeom.php";
    class Cuadrado implements iFigura{
        private $lado;
        public function __construct($lado) {
            $this->lado = $lado;
        }
        #[\Override]
        public function calcularArea() {
            $lado = $this->lado;
            return $lado * $lado;
        }
        #[\Override]
        public function calcularPerimetro() {
            $lado = $this->lado;
            return $lado * 4;
        }
    }
?>

