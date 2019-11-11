<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {

  protected $saldo;
  protected $plus = 0;
  protected $ultimoBoleto;

  protected $metodo;

  public function __construct($saldo = 0, MetodoInterface $metodo = null) {
    $this->saldo = $saldo;
    $this->metodo = $metodo;
    if($metodo == null){
      $this->metodo = new MetodoNormal;
    }
  }

  public function obtenerSaldo(){
    return $this->saldo;
  }

  public function obtenerPlus(){
    return $this->plus;
  }

  public function obtenerUltimoBoleto(){
    return $this->ultimoBoleto;
  }

  public function guardarUltimoBoleto(BoletoInterface $boleto) {
    $this->ultimoBoleto = $boleto;
  }

  public function sumarSaldo($monto){
    $this->saldo += $monto;
  }

  public function sumarPlus(){
    $this->plus += 1;
  }

  public function restarSaldo($monto){
    $this->saldo -= $monto;
  }

  public function restarPlus($monto){
    $this->plus -= $monto;
  }
}
