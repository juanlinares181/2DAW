<?php

require_once './Animal.php';

class Ave extends Animal {
    private $alas;

    public function __construct($nombre, $alas) {
        parent::__construct($nombre);
        $this->alas = $alas;
    }

    public function getAlas() {
        return $this->alas;
    }

    public function setAlas($alas) {
        $this->alas = $alas;
    }

    public function volar() {
        return "El ave está volando";
    }

    public function hacerSonido() {
        return "El ave emite un sonido de ave";
    }

    public function moverse() {
        return "El ave se mueve de una manera de ave";
    }

    public function __toString() {
        return "Ave: " . parent::__toString() . ", Alas: " . $this->alas;
    }
}

