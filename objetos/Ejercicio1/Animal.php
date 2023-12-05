<?php
class Animal {
    protected $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function hacerSonido() {
        return "El animal emite un sonido genérico";
    }

    public function moverse() {
        return "El animal se mueve de una manera genérica";
    }

    public function __toString() {
        return "Nombre: " . $this->nombre;
    }
}