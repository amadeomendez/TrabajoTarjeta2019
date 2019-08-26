<?php

namespace TrabajoTarjeta;

class Colectivo implements ColectivoInterface {
    protected $linea;
    protected $empresa;
    protected $numero;
    protected $tiempo;

    public function __construct($linea, $empresa, $numero, $tiempo) {
        $this->linea = $linea;
        $this->empresa = $empresa;
        $this->numero = $numero;
        $this->tiempo = $tiempo;
    }

    public function linea() {
        return $this->linea;
    }

    public function empresa() {
        return $this->empresa;
    }

    public function numero() {
        return $this->numero;
    }

    public function tiempo() {
        return $this->tiempo->time();
    }

    public function pagarCon(TarjetaInterface $tarjeta) {
        switch ($tarjeta->puedePagar($this->linea, $this->empresa, $this->numero)) {
            case "normal":
                $tarjeta->$ultimoBoleto = new Boleto($tarjeta->precio, $this, $tarjeta, $this->tiempo->time(), "normal");
                return $tarjeta->$ultimoBoleto;
                break;
            case "usa plus":
                $tarjeta->$ultimoBoleto = new Boleto(0, $this, $tarjeta, $this->tiempo->time(), "usa plus");
                return $tarjeta->$ultimoBoleto;
                break;
            case "paga un plus":
                $tarjeta->$ultimoBoleto = new Boleto($tarjeta->precio, $this, $tarjeta, $this->tiempo->time(), "un plus");
                return $tarjeta->$ultimoBoleto;
                break;
            case "paga dos plus":
                $tarjeta->$ultimoBoleto = new Boleto($tarjeta->precio, $this, $tarjeta, $this->tiempo->time(), "dos plus");
                return $tarjeta->$ultimoBoleto;
                break;
            case "transbordo normal":
                $tarjeta->$ultimoBoleto = new Boleto(($tarjeta->precio)/3, $this, $tarjeta, $this->tiempo->time(), "transbordo");
                return $tarjeta->$ultimoBoleto;
                break;
            case "transbordo y paga un plus":
                $tarjeta->$ultimoBoleto = new Boleto(($tarjeta->precio)/3, $this, $tarjeta, $this->tiempo->time(), "transbordo y un plus");
                return $tarjeta->$ultimoBoleto;
                break;
            case "transbordo y paga dos plus":
                $tarjeta->$ultimoBoleto = new Boleto(($tarjeta->precio)/3, $this, $tarjeta, $this->tiempo->time(), "transbordo y dos plus");
                return $tarjeta->$ultimoBoleto;
                break;
            default:
                return false;
        }
    }
}
