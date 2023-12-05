<?php

require_once './Vehiculo.php';

class Bicicleta extends Vehiculo {

    private $tipo;

    public function __construct($marca, $modelo, $anno, $tipo) {
        parent::__construct($marca, $modelo, $anno);
        $this->tipo = $tipo;
    }

    // Métodos específicos para Bicicleta
    public function pedalear() {
        return "La bicicleta está pedaleando";
    }

    public function hacerCaballito() {
        return "La bicicleta está haciendo el caballito";
    }
    
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
 
    public function __toString() {
        return parent::__toString() . ", Tipo - " . $this->tipo;
    }
}
