<?php

class Citas {

    public $matricula;
    public $id_itv;
    public $fecha;
    public $hora;
    public $ficha;
    
    public function __construct($matricula, $id_itv, $fecha, $hora, $ficha) {
        $this->matricula = $matricula;
        $this->id_itv = $id_itv;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ficha = $ficha;
    }

    public function __nuevaCita($matricula, $id_itv, $fecha, $hora, $ficha) {
        $this->matricula = $matricula;
        $this->id_itv = $id_itv;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->ficha = $ficha;
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