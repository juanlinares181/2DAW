<?php

require_once './Ave.php';

class Pinguino extends Ave {
    private $tipoNado;

    public function __construct($nombre, $tipoNado) {
        parent::__construct($nombre, $tipoNado);
    }

    public function getTipoNado() {
        return $this->tipoNado;
    }

    public function setTipoNado($tipoNado) {
        $this->tipoNado = $tipoNado;
    }

    public function nadar() {
        return "El pingüino está nadando";
    }

    public function pescar() {
        return "El pingüino está pescando";
    }

    // Puedes sobrescribir otros métodos de Ave o Animal si es necesario

    public function __toString() {
        return "Pingüino: " . parent::__toString() . ", Tipo de Nado: " . $this->tipoNado;
    }
}

