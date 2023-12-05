<?php

require_once './Mamifero.php';

class Perro extends Mamifero {
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

    public function ladrar() {
        return "El perro está ladrando";
    }

    public function buscarPelota() {
        return "El perro está buscando la pelota";
    }

    public function __toString() {
        return "Perro: " . parent::__toString() . ", Raza: " . $this->raza;
    }
}

