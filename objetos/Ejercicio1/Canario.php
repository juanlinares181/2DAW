<?php

require_once './Ave.php';

class Canario extends Ave {
    private $colorPlumaje;

    public function __construct($nombre, $colorPlumaje) {
        parent::__construct($nombre, $colorPlumaje);
    }

    public function getColorPlumaje() {
        return $this->colorPlumaje;
    }

    public function setColorPlumaje($colorPlumaje) {
        $this->colorPlumaje = $colorPlumaje;
    }

    public function cantar() {
        return "El canario está cantando";
    }

    public function picotearSemillas() {
        return "El canario está picoteando semillas";
    }

    // Puedes sobrescribir otros métodos de Ave o Animal si es necesario

    public function __toString() {
        return "Canario: " . parent::__toString() . ", Color del Plumaje: " . $this->colorPlumaje;
    }
}

