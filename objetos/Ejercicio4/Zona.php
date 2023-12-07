<?php

class Zona {
    private $nombre_zona;
    private $plazas_totales;
    private $plazas_restantes;

    public function __construct($nombre_zona, $plazas_totales) {
        $this->nombre_zona = $nombre_zona;
        $this->plazas_totales = $plazas_totales;
        $this->plazas_restantes = $plazas_totales;
    }

    public function getNombreZona() {
        return $this->nombre_zona;
    }

    public function getPlazasTotales() {
        return $this->plazas_totales;
    }

    public function getPlazasRestantes() {
        return $this->plazas_restantes;
    }

    public function vender($cantidad) {
        if ($cantidad <= $this->plazas_restantes) {
            $this->plazas_restantes -= $cantidad;
            echo "Venta realizada: $cantidad entradas para la zona {$this->nombre_zona}\n";
        } else {
            echo "No hay suficientes entradas disponibles en la zona {$this->nombre_zona}\n";
        }
    }

    public function __toString() {
        return "Zona: {$this->nombre_zona}, Plazas Totales: {$this->plazas_totales}, Plazas Restantes: {$this->plazas_restantes}";
    }
}