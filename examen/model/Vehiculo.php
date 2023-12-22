<?php

class Vehiculo {

    public $matricula;
    public $marca;
    public $modelo;
    public $color;
    public $plazas;
    public $fecha_ultima_matriculacion;
    
    public function __construct($matricula, $marca, $modelo, $color, $plazas, $fecha_ultima_matriculacion) {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->plazas = $plazas;
        $this->fecha_ultima_matriculacion = $fecha_ultima_matriculacion;
    }

    public function __clone() {
        
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __toString() {
        return "Nombre: " . $this->nombre;
    }

   
}