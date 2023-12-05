<?php

require_once './Animal.php'; // Incluir la clase Animal antes de extenderla

class Lagarto extends Animal {
    private $tipoEscamas;

    public function __construct($nombre, $tipoEscamas) {
        parent::__construct($nombre, $tipoEscamas);
        $this->tipoEscamas = $tipoEscamas;
    }

    public function getTipoEscamas() {
        return $this->tipoEscamas;
    }

    public function setTipoEscamas($tipoEscamas) {
        $this->tipoEscamas = $tipoEscamas;
    }

    public function tomarSol() {
        return "El lagarto está tomando el sol";
    }

    public function camuflarse() {
        return "El lagarto está camuflándose";
    }

    // Puedes sobrescribir otros métodos de Animal si es necesario

    public function __toString() {
        return "Lagarto: " . parent::__toString() . ", Tipo de Escamas: " . $this->tipoEscamas;
    }
}