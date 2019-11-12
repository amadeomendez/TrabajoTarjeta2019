<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface {

    protected $valor;

    protected $colectivo;

    protected $tarjeta;

    protected $fecha;

    public function __construct($valor, ColectivoInterface $colectivo, TarjetaInterface $tarjeta, $fecha) {
        $this->valor = $valor;
        $this->colectivo = $colectivo;
        $this->tarjeta = $tarjeta;
        $this->fecha = $fecha;
    }

    public function obtenerValor() {
        return $this->valor;
    }

    public function obtenerTarjeta() {
        return $this->tarjeta;
    }

    public function obtenerFecha() {
        return $this->fecha;
    }

    public function obtenerTipoTarjeta() {
        return get_class($this->tarjeta);
    }

    public function obtenerColectivo() {
        return $this->colectivo;
    }
}
