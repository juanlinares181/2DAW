<?php

require_once './Mamifero.php';

class Gato extends Mamifero {
    private $raza;

    public function __construct($nombre, $raza) {
        parent::__construct($nombre, $raza);
    }

    public function getRaza() {
        return $this->raza;
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function arañar() {
        return "El gato está arañando";
    }

    public function maullar() {
        return "El gato está maullando";
    }

    public function __toString() {
        return "Gato: " . parent::__toString() . ", Raza: " . $this->raza;
    }
}

