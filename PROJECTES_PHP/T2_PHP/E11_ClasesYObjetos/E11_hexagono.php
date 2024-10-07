<?php
    require_once "E11_interFiguraGeom.php";
    class Hexagono implements iFigura{
        private $lado;
        private $apotema;
        public function __construct($lado, $apotema) {
            $this->lado = $lado;
            $this->apotema = $apotema;
        }
        #[\Override]
        public function calcularArea() {
            $lado = $this->lado;
            $apotema = $this->apotema;
            return $lado * $apotema * 3;
        }
        #[\Override]
        public function calcularPerimetro() {
            $lado = $this->lado;
            return $lado * 6;
        }
    }
?>