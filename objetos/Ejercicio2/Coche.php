<?php

require_once './Vehiculo.php';

class Coche extends Vehiculo {

    private $numeroPuertas;

    public function __construct($marca, $modelo, $anno, $numeroPuertas) {
        parent::__construct($marca, $modelo, $anno);
        $this->numeroPuertas = $numeroPuertas;
    }
    
    // Métodos específicos para Coche
    public function conducir() {
        return "El coche está en marcha";
    }

    public function quemarRueda() {
        return "El coche está quemando rueda";
    }


    public function getNumeroPuertas() {
        return $this->numeroPuertas;
    }

    public function setNumeroPuertas($numeroPuertas) {
        $this->numeroPuertas = $numeroPuertas;
    }

    public function __toString() {
        return parent::__toString() . ", Número de Puertas - " . $this->numeroPuertas;
    }
}
