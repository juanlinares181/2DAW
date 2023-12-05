<?php
require_once './persona.php';

class empleado extends persona {
    protected $salario;
    
    public function __construct($nom = "Antonio", $apell = "Rosa", $edad = 66) {
        parent::__construct($nom, $apell, $edad);
    }

    public function __toString() {
        parent::__toString()." Y mi salario es ".$this->salario;
    }
  
}
