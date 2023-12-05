<?php

class Vehiculo {
    private $marca;
    private $modelo;
    private $anno;
    private $kmRecorridos = 0; // Nueva propiedad para llevar el registro de los kilómetros recorridos
    private static $vehiculosCreados = 0; // Nueva propiedad estática para llevar el registro de los vehículos creados
    private static $kmTotales = 0; // Nueva propiedad estática para llevar el registro de los kilómetros totales recorridos por todos los vehículos

    public function __construct($marca, $modelo, $anno) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anno = $anno;
        self::$vehiculosCreados++;
    }

     public static function getVehiculosCreados() {
        return self::$vehiculosCreados;
    }

    public static function getKmTotales() {
        return self::$kmTotales;
    }

    // Método de instancia
    public function getKmRecorridos() {
        return $this->kmRecorridos;
    }
    
    // Método para registrar los kilómetros recorridos
    public function recorrerKm($kilometros) {
        $this->kmRecorridos += $kilometros;
        self::$kmTotales += $kilometros;
        return "Recorriendo $kilometros km.";
    }
    
    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getAnno() {
        return $this->anno;
    }

    public function setAnno($anno) {
        $this->anno = $anno;
    }

    public function __toString() {
        return "Vehículo: Marca - " . $this->marca . ", Modelo - " . $this->modelo . ", Año - " . $this->anno;
    }
}