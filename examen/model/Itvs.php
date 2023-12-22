<?php

class Itvs {

    public $provincia;
    public $localidad;
    public $direccion;
    public $telefono;
    
    public function __construct($provincia, $localidad, $direccion, $telefono) {
        $this->provincia = $provincia;
        $this->localidad = $localidad;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
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

