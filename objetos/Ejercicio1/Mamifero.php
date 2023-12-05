<?php

require_once './Animal.php';

class Mamifero extends Animal {
    private $comida;

    public function __construct($nombre, $comida) {
        parent::__construct($nombre);
        $this->comida = $comida;
    }

    public function getComida() {
        return $this->comida;
    }

    public function setComida($comida) {
        $this->comida = $comida;
    }

    public function darALuz() {
        return "El mamífero está dando a luz";
    }

    public function hacerSonido() {
        return "El mamífero emite un sonido mamífero";
    }

    public function moverse() {
        return "El mamífero se mueve de una manera mamífera";
    }

    public function __toString() {
        return "Mamífero: " . parent::__toString() . ", Comida: " . $this->comida;
    }
}

