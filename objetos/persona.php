<?php

class persona {

    protected $nombre;
    protected $apellidos;
    protected $edad;
    protected static $numperson = 0;

    public function __construct($nom = "luis", $apell = "flores", $ed = 23) {
        $this->nombre = $nom;
        $this->apellidos = $apell;
        $this->edad = $ed;
        self::$numperson++;
    }

    public static function getNumPerson() {
        return self::$numperson;
    }

    /* public function __destruct() {
      self::$numperson--;
      } */

    public function __call($metodo, $argumentos) {
        if ($metodo == "modificar") {
            if (count($argumentos) == 1) {
                $this->nombre = $argumentos[0];
                $this->apellidos = $argumentos[1];
            }
            
            if (count($argumentos) == 2) {
                $this->nombre = $argumentos[0];
                $this->apellidos = $argumentos[1];
            }
            
            if (count($argumentos) == 3) {
                $this->nombre = $argumentos[0];
                $this->apellidos = $argumentos[1];
                $this->edad = $argumentos[2];
            }
        }
        if ($metodo == "calcular") {
            
        }
    }
    
    public static function BorrarPersona() {
        self::$numperson--;
    }

    //este metodo sustituye todos los getters
    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __toString() {
        return "hola, me llamo " . $this->nombre . " " . $this->apellidos . " y tengo " . $this->edad . " años<br>";
    }

    public function __clone() {
        self::$numperson++;
        $this->edad = 0;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEdad() {
        return $this->edad;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    function setEdad($edad): void {
        $this->edad = $edad;
    }
}
