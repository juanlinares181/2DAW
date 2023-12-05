<?php

class DadoPoker {

    private $caras;
    private $tiradasTotales = 0;
    private $ultimaTirada;

    public function __construct($caras = ['As', 'K', 'Q', 'J', '7', '8']) {
        $this->caras = $caras;
    }

    public function getCaras() {
        return $this->caras;
    }

    public function setCaras($caras) {
        $this->caras = $caras;
    }

    public function tira() {
        $this->tiradasTotales++;
        $caraAleatoria = array_rand($this->caras);
        $this->ultimaTirada = $this->caras[$caraAleatoria];
        return $this->ultimaTirada;
    }

    public function nombreFigura() {
        if ($this->ultimaTirada) {
            return "La última figura fue: {$this->ultimaTirada}";
        } else {
            return "Aún no se ha realizado ninguna tirada";
        }
    }

    public function getTiradasTotales() {
        return $this->tiradasTotales;
    }
}
